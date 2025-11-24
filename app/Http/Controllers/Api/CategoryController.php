<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use ApiResponder;

    public function index(Request $request)
    {
        $includeInactive = $request->boolean('include_inactive', false);

        $query = Category::query()
            ->orderBy('priority')
            ->when(!$includeInactive, fn ($q) => $q->where('is_active', true));

        // Default to top-level unless a parent_id is specified
        if ($request->filled('parent_id')) {
            $query->where('parent_id', $request->get('parent_id'));
        } else {
            $query->whereNull('parent_id');
        }

        if ($request->boolean('include_children')) {
            $query->with(['children' => function ($q) use ($includeInactive) {
                if (!$includeInactive) {
                    $q->where('is_active', true);
                }
                $q->orderBy('priority');
            }]);
        }

        $categories = $query->get();

        return $this->success(
            CategoryResource::collection($categories),
            ResponseMessages::FETCH_SUCCESS(),
            Response::HTTP_OK
        );
    }

    public function children(Request $request, ?Category $category = null)
    {
        $parentId = $category?->id ?? $request->get('category_id');

        abort_unless($parentId, Response::HTTP_BAD_REQUEST, 'A parent category_id is required.');

        $includeInactive = $request->boolean('include_inactive', false);

        $children = Category::query()
            ->where('parent_id', $parentId)
            ->when(!$includeInactive, fn ($q) => $q->where('is_active', true))
            ->orderBy('priority')
            ->get();

        return $this->success(
            CategoryResource::collection($children),
            ResponseMessages::FETCH_SUCCESS(),
            Response::HTTP_OK
        );
    }

    public function show(Category $category, Request $request)
    {
        $includeInactive = $request->boolean('include_inactive', false);

        $category->load(['children' => function ($q) use ($includeInactive) {
            if (!$includeInactive) {
                $q->where('is_active', true);
            }
            $q->orderBy('priority');
        }]);

        return $this->success(
            new CategoryResource($category),
            ResponseMessages::FETCH_SUCCESS(),
            Response::HTTP_OK
        );
    }
}
