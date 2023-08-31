<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = ['title','question','answer'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = ['title'=>'string','question'=>'string','answer'=>'string'];
}
