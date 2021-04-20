<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function user(){
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    public function category(){
        return $this->belongsTo(Category::class);    
    }
    

    // public function category(){
    //     return $this->belongsTo(Category::class, 'catogory_id', 'id');
    // }

    //Relación muchos a muchos inversa
     
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // public function tags(){
    //     return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    // }

    //Relación uno a uno polimorfica

    public function image(){    
        return $this->morphOne(Image::class, 'imageable');
    }           
    
}   
