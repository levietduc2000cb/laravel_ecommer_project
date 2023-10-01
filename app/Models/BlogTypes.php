<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTypes extends Model
{
    use HasFactory;
    protected $table = 'blogtypes';
    protected $fillable = ['name'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = ['name'=>'string'];

}
