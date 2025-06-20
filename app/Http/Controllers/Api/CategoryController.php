<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\CategoryResource as ResourcesCategoryResource;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('priority')
            ->get();

        return CategoryResource::collection($categories);
    }
}