<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments_book';
    protected $fillable = ['customer_id','book_id','comment','evaluate_stars'];
    protected $guarded = ['id','created_at'];
    protected $casts = ['customer_id'=>'string', 'book_id'=>'string', 'comment'=>'string', 'evaluate_stars'=>'integer'];
}
