<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index($article)
    {

        return view('Home.comment',['article'=>$article]);
    }

    public function store(Request$request)
    {
        dd($request);
    }
}
