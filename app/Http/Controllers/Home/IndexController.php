<?php

namespace App\Http\Controllers\Home;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $recommend = Article::where('is_recommend',1)->orderBy('created_at','desc')->take(10)->get();
        $mostNew = Article::orderBy('created_at','desc')->take(10)->get();
        $hot = Article::orderBy('praise','desc')->take(10)->get();
        return view('Home.index',['recommend'=>$recommend,'mostNew'=>$mostNew,'hot'=>$hot]);
    }
}
