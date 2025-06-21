<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use App\Models\ProviderMedia;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderController extends Controller
{
    use ApiResponder;

    public function index(Request $request)
    {
        $query = Provider::query()->where('is_active', true)->where('approval_status', 'approved');

        // Sanitize inputs
        $subcategoryId = trim($request->get('subcategory_id'));
        $search = trim($request->get('search'));
        $location = trim($request->get('location'));
        $perPage = min((int) $request->get('per_page', 10), 50);
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $radius = $request->get('radius', 20);

        // Filter by subcategory
        if ($subcategoryId) {
            $query->where('subcategory_id', $subcategoryId);
        }

        // Filter by location
        if ($location) {
            $query->where(function ($q) use ($location) {
                $q->where('location', 'like', "%$location%");
            });
        }

        // Filter by latitude and longitude for distance calculation
        if ($latitude && $longitude) {
            $haversine = "(6371 * acos(cos(radians($latitude)) 
                 * cos(radians(latitude)) 
                 * cos(radians(longitude) - radians($longitude)) 
                 + sin(radians($latitude)) 
                 * sin(radians(latitude))))";

            $query->select('*')
                ->selectRaw("$haversine AS distance")
                ->having('distance', '<=', $radius)
                ->orderBy('distance');
        }

        // Search 
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('bio', 'like', "%$search%");
            });
        }

        // Default sorting (newest first)
        $query->orderByDesc('created_at');
        $providers = $query->with('subcategory')->paginate($perPage);

        return $this->success(
            ProviderResource::collection($providers),
            ResponseMessages::FETCH_SUCCESS,
            Response::HTTP_OK
        );
    }


    public function show(Provider $provider)
    {
        abort_if(!$provider->is_active || $provider->approval_status !== 'approved', 404);
        return $this->success(
            new ProviderResource($provider),
            ResponseMessages::FETCH_SUCCESS,
            Response::HTTP_OK
        );
    }

    public function store(Request $request)
    {
        $data = $request->validated();

        // Save provider
        $provider = Provider::create([
            'user_id'        => $data['user_id'],
            'subcategory_id' => $data['subcategory_id'],
            'name'        => $data['name'],
            'is_active'      => false,
            'is_verified'    => false,
            'is_featured'    => false,
            'approval_status' => 'pending',
        ]);

        $provider->profile()->create([
            'bio'      => $data['bio'] ?? null,
            'phone'       => $data['phone'],
            'whatsapp'    => $data['whatsapp'] ?? null,
            'city'        => $data['city'],
            'area'        => $data['area'],
            'location' => $data['location'] ?? null,
            'latitude'    => $data['latitude'] ?? null,
            'longitude'   => $data['longitude'] ?? null,
        ]);

        // For files, still use $request since files aren't included in $validated
        $media = new ProviderMedia();
        $media->provider_id = $provider->id;

        if ($request->hasFile('profile_image')) {
            $media->profile_image = $request->file('profile_image')->store('provider/profile_images', 'public');
        }

        if ($request->hasFile('work_images')) {
            $paths = [];
            foreach ($request->file('work_images') as $img) {
                $paths[] = $img->store('provider/work_images', 'public');
            }
            $media->work_images = json_encode($paths);
        }

        if ($request->hasFile('portfolio_file')) {
            $media->portfolio_file = $request->file('portfolio_file')->store('provider/portfolio', 'public');
        }

        $media->save();

        // Create stats
        $provider->stats()->create();

        return $this->success(new ProviderResource($provider), 'Provider created successfully.', Response::HTTP_CREATED);
    }

    public function update(Request $request, Provider $provider)
    {
        $data = $request->validate([
            'subcategory_id' => 'sometimes|exists:subcategories,id',
            'name'           => 'sometimes|string|max:255',

            // Profile
            'bio'       => 'nullable|string',
            'phone'     => 'sometimes|string|max:20',
            'whatsapp'  => 'nullable|string|max:20',
            'city'      => 'sometimes|string|max:100',
            'area'      => 'sometimes|string|max:100',
            'location'  => 'nullable|string|max:255',
            'latitude'  => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

            // Media
            'profile_image'  => 'nullable|image',
            'work_images'    => 'nullable|array',
            'work_images.*'  => 'image',
            'portfolio_file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        // --- Update provider ---
        $provider->update(array_filter([
            'subcategory_id' => $data['subcategory_id'] ?? $provider->subcategory_id,
            'name'           => $data['name'] ?? $provider->name,
            'approval_status' => 'pending',

        ]));

        // --- Update profile ---
        $provider->profile()->update(array_filter([
            'bio'       => $data['bio'] ?? $provider->profile->bio,
            'phone'     => $data['phone'] ?? $provider->profile->phone,
            'whatsapp'  => $data['whatsapp'] ?? $provider->profile->whatsapp,
            'city'      => $data['city'] ?? $provider->profile->city,
            'area'      => $data['area'] ?? $provider->profile->area,
            'location'  => $data['location'] ?? $provider->profile->location,
            'latitude'  => $data['latitude'] ?? $provider->profile->latitude,
            'longitude' => $data['longitude'] ?? $provider->profile->longitude,
        ]));

        // --- Update media ---
        $media = $provider->media ?? new ProviderMedia(['provider_id' => $provider->id]);

        if ($request->hasFile('profile_image')) {
            $media->profile_image = $request->file('profile_image')->store('provider/profile_images', 'public');
        }

        if ($request->hasFile('work_images')) {
            $paths = [];
            foreach ($request->file('work_images') as $img) {
                $paths[] = $img->store('provider/work_images', 'public');
            }
            $media->work_images = json_encode($paths);
        }

        if ($request->hasFile('portfolio_file')) {
            $media->portfolio_file = $request->file('portfolio_file')->store('provider/portfolio', 'public');
        }

        $media->save();

        return $this->success(new ProviderResource($provider->refresh()), 'Provider updated successfully.');
    }
}
