<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
class ChatDetails extends Model
{
    use HasFactory,SoftDeletes;
    use HasApiTokens;
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'accept',
        'chat_token',
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

    public function senderChatRequestId()
    {
         return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiverChatRequestId()
    {
         return $this->belongsTo(User::class, 'receiver_id');
    }


}
