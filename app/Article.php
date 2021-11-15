<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'slug',
        'cover',
        'visibility',
      ];
    
      public function user()
      {
        return $this->belongsTo('App\User');
      }

      public function artImgs()
      {
        return $this->hasMany('App\ArtImg');
      }
      
      public function artContents()
      {
        return $this->hasMany('App\ArtContent');
      }
    
    
}
