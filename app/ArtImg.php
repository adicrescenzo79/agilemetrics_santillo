<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtImg extends Model
{
    protected $fillable = [
        'article_id',
        'caption',
        'image',
        'order',

    ];

    public function article()
    {
      return $this->belongsTo('App\Article');
    }
  
}
