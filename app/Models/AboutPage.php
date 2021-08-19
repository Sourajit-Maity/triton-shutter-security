<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
        'about_heading',
        'about_sub_heading',
        'about_description',
        'about_banner_image'
    ];
}
