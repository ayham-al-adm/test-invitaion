<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['name', 'parent_id'];

    // -------------------- Relationships -------------------
    public function subs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    // -------------------- Methods -------------------
    public function canContainSubs()
    {
        return !$this->items()->exists();
    }

    public function canContainItems()
    {
        return !$this->subs()->exists();
    }

    // -------------------- Overrides -------------------

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $parent = $item->parent;
            if ($parent && !$parent->canContainSubs()) {
                abort(400, 'Sorry, this parent can\'t contain subs');
            }
        });

        static::updating(function ($item) {
            $parent = $item->parent;
            if ($parent && !$parent->canContainSubs()) {
                abort(400, 'Sorry, this parent can\'t contain subs');
            }
        });
    }
}
