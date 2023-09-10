<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table = 'users';

    protected $hidden = ['password','phone','isAdmin','remember_token'];
    protected $fillable = ['fullName','email','phone','password','avatarUrl','address','isAdmin','remember_token'];
    protected $guarded = ['id','isAdmin','phone','created_at','updated_at','remember_token','password'];
    protected $casts = ['name'=>'string','email'=>'string','password'=>'string','phone'=>'string','avatarUrl'=>'string','address'=>'string','remember_token'=>'string'];

}
