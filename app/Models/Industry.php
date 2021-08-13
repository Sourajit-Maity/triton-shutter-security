<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'industry_name',
        'industry_description',
        'active',
    ];

    public function usersindustry()
    {
         return $this->hasMany(User::class);
    }
}
