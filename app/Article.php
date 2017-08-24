<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['id','categories_id','title','summary','thumb','attr','share_gift','content','skim_num','praise','order','is_recommend'];

    public function category()
    {
        return $this->belongsTo('App\Category','categories_id');
    }
    public function keywords()
    {
        return $this->belongsToMany('App\Keywords','article_keywords','article_id','keywords_id');
    }
}
