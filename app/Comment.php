<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['id','article_id','comment','star'];

    public function article()
    {
        return $this->belongsTo('App\article','article_id');
    }
}
