<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    protected $fillable = ['id','questionnaire_id','question','is_need','type'];


    public function attach()
    {
        return $this->belongsTo('App\Attach','questionnaire_id');
    }

    public function select(){
        return $this->hasMany('App\Select','question_id');
    }
}
