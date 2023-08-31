<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = ['fullName','email','phone','password','avatarUrl','address','isAdmin'];
    protected $guarded = ['id','isAdmin','phone','created_at','updated_at'];
    protected $casts = ['name'=>'string','email'=>'string','password'=>'string','phone'=>'string','avatarUrl'=>'string','address'=>'string'];

}
