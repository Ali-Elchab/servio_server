<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubcategoryController extends Controller
{
    use ApiResponder;

    public function index(Request $request)
    {
        $query = Subcategory::with('category')
            ->orderBy('priority');

        if ($request->has('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        } else {
            $query->where('is_active', true);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                    ->orWhere('name_ar', 'like', "%{$search}%");
            });
        }
        return $this->success(
            SubcategoryResource::collection($query->get()),
            ResponseMessages::FETCH_SUCCESS,
            Response::HTTP_OK
        );
    }
}
