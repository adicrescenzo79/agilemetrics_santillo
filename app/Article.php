<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
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