<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{
    protected $table = 'questionnaires';

    protected $fillable = ['id','name','article_id','desc','is_sale','price','cash_back'];

    public function article()
    {
        return $this->belongsTo('App\Article','article_id');
    }

    public function question(){
        return $this->hasMany('App\Question','questionnaire_id');
    }
}
