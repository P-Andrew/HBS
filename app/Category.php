<?php

namespace App;

use Baum;

class Category extends Baum\Node
{

    protected $table = 'categories';

    protected $guarded = array('id','parent_id','kft','rgt','depth');

    public function Article(){
        return $this->hasMany('App\Article','categories_id');
    }
}
