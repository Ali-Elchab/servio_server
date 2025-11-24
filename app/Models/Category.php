<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'slug', 'image', 'parent_id', 'priority', 'is_active'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('priority');
    }

    // Backwards-compatible alias
    public function subcategories()
    {
        return $this->children();
    }
    
    public function providers()
    {
        return $this->hasMany(Provider::class, 'category_id');
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}
