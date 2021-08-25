<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    'user_id',
    'title',
    'content',
    'slug',
    'cover',
    'visibility',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }


}
