<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = ['title','question','answer','customerId'];
    protected $guarded = ['id','created_at','updated_at','customerId'];
    protected $casts = ['title'=>'string','question'=>'string','answer'=>'string','customerId'=>'integer'];
}
