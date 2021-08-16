<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $fillable = [
        'inviter_id',
        'invited_id',
        'active'
    ];


    public function usersinvitation()
    {
         return $this->belongsTo(User::class, 'inviter_id');
    }

    public function usersinvited()
    {
         return $this->belongsTo(User::class, 'invited_id');
    }
}
