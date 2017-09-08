<?php

namespace App\Http\Controllers\Home;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function detail($article)
    {
        $articleDetail = Article::find($article);
        return view('Home.detail',['detail'=>$articleDetail]);
    }
}
