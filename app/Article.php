<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'content_1',
        'content_2',
        'content_3',
        'slug',
        'visibility',
      ];
    
      public function user()
      {
        return $this->belongsTo('App\User');
      }
    
}
