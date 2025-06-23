<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Traits\ApiResponder;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use ApiResponder;

    public function index()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('priority')
            ->get();

        return $this->success(
            CategoryResource::collection($categories),
            ResponseMessages::FETCH_SUCCESS(),
            Response::HTTP_OK
        );
    }
}
