<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fileable = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Category','categories_id');
    }
    public function keywords()
    {
        return $this->belongsToMany('App\Keywords','article_keywords','article_id','keywords_id');
    }
}
