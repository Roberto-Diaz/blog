<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $guarded = [];    
    //Relación muchos a muchos inversa
    public function posts(){
        return $this->belongsToMany(Posts::class);
    }   

    // public function posts(){
    //     return $this->belongsToMany(Posts::class, 'post_tag', 'tag_id', 'post_id');
    // }
}
