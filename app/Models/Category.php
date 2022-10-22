<?php

namespace App\Models;

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

    // -------------------- Methods -------------------
    public function canContainSubs()
    {
        return !$this->subs()->exists();
    }

    public function canContainItems()
    {
        return !$this->items()->exists();
    }
}
