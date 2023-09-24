<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = ['total','products','tax','discount','status','customerId'];
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = ['total'=>'integer','products'=>"array",'tax'=>'integer','discount'=>"integer",'status'=>'integer','customerId'=>'integer'];

}
