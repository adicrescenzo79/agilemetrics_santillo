<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtContent extends Model
{
    protected $fillable = [
        'article_id',
        'title',
        'content',
        'order',
    ];

    public function article()
    {
      return $this->belongsTo('App\Article');
    }
}
