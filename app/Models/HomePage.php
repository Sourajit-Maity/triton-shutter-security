<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
        'banner_heading',
        'banner_sub_heading',
        'banner_description',
        'banner_image'
    ];
}
