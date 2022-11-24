<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'slug'];


    public function getLinkAttribute()
    {
        return url('/invitations/accept/' . urlencode($this->slug));
    }
}
