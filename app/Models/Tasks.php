<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tasks extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    //Set size for image in CKEditor
    // public function registerMediaConversions(Media $media=null){
    //     $this->addMediaConversion(name:'thumb')->width(width:100000);
    // }
}
