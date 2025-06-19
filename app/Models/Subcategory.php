<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'slug', 'image', 'category_id', 'priority', 'is_active'];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   
    
    public function providers()
    {
        return $this->hasMany(Provider::class);
    }
}
