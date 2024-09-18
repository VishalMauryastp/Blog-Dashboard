<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug', 'content', 'image', 'image_alt','isEnable','meta_titile','meta_keyword','meta_discription',];
}
