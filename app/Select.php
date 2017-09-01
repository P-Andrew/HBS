<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Select extends Model
{
    protected $table = 'select';

    protected $fillable = ['id','question_id','select_content'];

    public function question()
    {
        return $this->belongsTo('App\Question','question_id');
    }


}
