<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
        'contact_heading',
        'contact_sub_heading',
        'contact_description',
        'contact_banner_image'
    ];
}
