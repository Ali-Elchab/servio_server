<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderController extends Controller
{
    use ApiResponder;

    public function index(Request $request)
    {
        $query = Provider::query()->where('is_active', true);

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
                $q->where('location_en', 'like', "%$location%")
                    ->orWhere('location_ar', 'like', "%$location%");
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
                $q->where('name_en', 'like', "%$search%")
                    ->orWhere('name_ar', 'like', "%$search%")
                    ->orWhere('bio_en', 'like', "%$search%")
                    ->orWhere('bio_ar', 'like', "%$search%");
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
        abort_if(!$provider->is_active, 404);
        return $this->success(
            new ProviderResource($provider),
            ResponseMessages::FETCH_SUCCESS,
            Response::HTTP_OK
        );
    }
}
