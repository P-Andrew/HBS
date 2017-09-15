<?php

namespace App\Http\Controllers\Home;

use App\Article;
use App\Attach;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function detail($article)
    {
        $articleDetail = Article::find($article);
        return view('Home.detail',['detail'=>$articleDetail]);
    }

    public function question($attach)
    {
        $form = Attach::find($attach);

        $question = Attach::find($attach)->question;

        return view('Home.question',['question'=>$question,'form'=>$form]);
    }
}
