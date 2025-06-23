<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    use ApiResponder;


    public function index(Request $request)
    {
        $user = $request->user();
        $favorites = $user->favorites()->with('subcategory')->get();

        return $this->success(
            ProviderResource::collection($favorites),
            ResponseMessages::FETCH_SUCCESS()
        );
    }

    public function toggle(Request $request, Provider $provider)
    {
        $user = $request->user();

        if ($user->favorites()->where('provider_id', $provider->id)->exists()) {
            $user->favorites()->detach($provider->id);
            return $this->success([], ResponseMessages::PROVIDER_REMOVED_FROM_FAVORITES());
        }

        $user->favorites()->attach($provider->id);
        return $this->success([], ResponseMessages::PROVIDER_ADDED_TO_FAVORITES());
    }
}
