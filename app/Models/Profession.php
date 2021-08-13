<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    protected $fillable = [
        'profession_name',
        'active'
    ];

    public function usersprofession()
    {
         return $this->hasMany(User::class);
    }
}
