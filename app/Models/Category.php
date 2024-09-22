<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "image",
        "parent_id",
    ];


    public function parent(){
        return $this->belongsTo(Category::class,"parent_id");
    }



    public function setImageAttribute($image)
    {
        if ($image) {
            $this->attributes['image'] = Storage::disk('public')->put('categories',  $image);
        }
    }

    public function getImageAttribute($image)
    {
        if ($image) {
            return asset('storage/' . $image);
        }
    }

}
