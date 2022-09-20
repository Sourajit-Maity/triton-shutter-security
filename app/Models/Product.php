<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    use HasApiTokens;

    protected $fillable = [
        'sender_id',
        'verify_user_id',
        'profession_id',
        'accept',
        'product_token',
        'active'
    ];

    public function getStatusAttribute($value)
    {
        $accept = '';
        if($value == 1){
            $accept = 'request';
        }
        if($value == 2){
            $accept = 'accepted';
        }
        if($value == 3){
            $accept = 'cancel';
        }
        
        return $accept;
    }

    public function senderProductRequestId()
    {
         return $this->belongsTo(User::class, 'sender_id');
    }

    public function verifyUserProductRequestId()
    {
         return $this->belongsTo(User::class, 'verify_user_id');
    }
    public function productRequestId()
    {
         return $this->belongsTo(Profession::class, 'profession_id');
    }

}
