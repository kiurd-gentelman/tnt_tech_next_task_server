<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['author_id','title','description'];

    public function comments(){
        return $this->hasMany(Comments::class,'post_id','id');
    }
}
