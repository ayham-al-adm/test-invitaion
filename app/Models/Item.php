<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $fillable = ['name', 'image', 'category_id'];

    // -------------------- Relationships -------------------
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // -------------------- Overrides -------------------
    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $category = $item->category;
            if ($category && !$category->canContainItems()) {
                abort(400, 'Sorry, this category can\'t contain items');
            }
        });

        static::updating(function ($item) {
            $category = $item->category;
            if ($category && !$category->canContainItems()) {
                abort(400, 'Sorry, this category can\'t contain items');
            }
        });
    }
}
