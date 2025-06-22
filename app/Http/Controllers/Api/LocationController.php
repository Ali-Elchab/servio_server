<?php

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Traits\ApiResponder;

class LocationController extends Controller
{
    use ApiResponder;

    public function cities()
    {
        $locale = app()->getLocale();
        $cities = City::orderBy($locale === 'ar' ? 'name_ar' : 'name_en')
            ->get(['id', 'name_en', 'name_ar']);

        return $this->success($cities, 'Cities fetched successfully.');
    }

    public function areas(City $city)
    {
        $locale = app()->getLocale();
        $areas = $city->areas()
            ->orderBy($locale === 'ar' ? 'name_ar' : 'name_en')
            ->get(['id', 'city_id', 'name_en', 'name_ar']);

        return $this->success($areas, 'Areas for this city fetched.');
    }
}
