<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Resources\RatingResource;
use App\Models\Provider;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    use ApiResponder;

    public function index(Provider $provider)
    {
        $ratings = $provider->ratings()
            ->approved()
            ->latest()
            ->paginate(10);

        return $this->success(
            RatingResource::collection($ratings),
            ResponseMessages::FETCH_SUCCESS,
            Response::HTTP_OK
        );
    }

    public function store(Request $request, Provider $provider)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'rating'  => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);



        if ($validator->fails()) {
            return $this->error(ResponseMessages::VALIDATION_FAILURE, Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        }

        $rating = $provider->ratings()->create([
            'name'     => $request->name,
            'rating'   => $request->rating,
            'comment'  => $request->comment,
            'approved' => false,
        ]);

        return $this->success([
            new RatingResource($rating)
        ], ResponseMessages::RATING_SUBMITTED, Response::HTTP_OK);
    }
}
