<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'slug', 'image', 'parent_id', 'priority', 'is_active'];

    public function subcategories() 
    {
        return $this->hasMany(Subcategory::class);
    }
    
    public function providers()
    {
        return $this->hasMany(Provider::class);
    }
}
