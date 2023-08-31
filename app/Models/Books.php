<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = ['name','author','des','publisher','supplier','price','sale','cover','type','image'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = ['name'=>'string','author'=>"string",'des'=>'string','publisher'=>"string",'supplier'=>"string",'price'=>"float",'sale'=>"float",'cover'=>"string",'image'=>"array"];

}
