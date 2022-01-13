<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlockList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'block_user_id',
        'block',
        'report_message',
        'report_message_time'
    ];

   

    public function userId()
    {
         return $this->belongsTo(User::class, 'user_id');
    }

    public function blockUserId()
    {
         return $this->belongsTo(User::class, 'block_user_id');
    }
}
