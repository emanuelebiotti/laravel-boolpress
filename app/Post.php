<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'author', 'slug', 'category_id'];

    public function category() {
      return $this->belongsTo('App\Category');
    }
}
