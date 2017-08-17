<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keywords extends Model
{
    protected $table = 'keywords';
    protected $fillable = ['keyword'];

    public function article()
    {
        return $this->belongsToMany('App\Keywords','article_keywords','keywords_id','article_id');
    }
}
