<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDistance extends Model
{
    use HasFactory;
    protected $with=['user'];
    protected $fillable = [ 
        'user_id', 'distance', 'share_current_loc','hide_profile',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
