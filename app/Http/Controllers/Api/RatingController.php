<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RatingResource;
use App\Models\Provider;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function index(Provider $provider)
    {
        $ratings = $provider->ratings()
            ->approved()
            ->latest()
            ->paginate(10);

        return RatingResource::collection($ratings);
    }

    public function store(Request $request, Provider $provider)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'rating'  => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $rating = $provider->ratings()->create([
            'name'     => $request->name,
            'rating'   => $request->rating,
            'comment'  => $request->comment,
            'approved' => false, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rating submitted successfully and is pending approval.',
            'data'    => new RatingResource($rating),
        ]);
    }
}
