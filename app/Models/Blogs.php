<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = ['title','written_by','abstract','image_title','content','blog_type_id'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = ['name'=>'string','written_by'=>'string','abstract'=>'string','image_title'=>'string','content'=>'string','blog_type_id'=>'integer'];

}
