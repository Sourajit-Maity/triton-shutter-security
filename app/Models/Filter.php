<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;
    protected $with=['user'];
    protected $fillable = [ 
        'user_id', 'latitude', 'longitude',
        'industry_id', 'profession_id', 'looking_for',
        'offering', 'radius', 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
