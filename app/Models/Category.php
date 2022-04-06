<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'parent_id', 'status'];

    // subcategories relationship
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('subcategories');
    }

    // categories relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    // scoping function
    /**
     * GET ALL CATEGORY OF PARENT WITH SUBCATEGORIES AS CHILD
     */
    public function scopeTree($query)
    {
        return     $query->with(['subcategories' => function ($q) {
            $q->where('status', 0)->get();
        }])
            ->where('status', 0)->where('parent_id', null);
    }



    public function scopeAllCategories($query)
    {
        return $query->with(['subcategories' => function ($q) {
            $q->where('status', 0)->get();
        }])
            ->where('status', 0);
    }
}
