<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Keywords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::paginate();
        return view('Admin.article',['article'=>$article]);
    }

    public function create()
    {

        $node = Category::roots()->get();
        return view('Admin.addarticle',['node'=>$node]);
    }

    public function store(Request$request)
    {
        $recommend = empty($request['recommend'])?0:1;
        $this->validate($request,[
            'title'=>'required|max:255',
            'category_id'=>'required',
            'keyword'=>'required|max:255',
            'summary'=>'required|max:255',
            'gift'=>'required|numeric',
            'content'=>'required',
            'thumb'=>'required|image',
        ]);
        $file = $request->file('thumb');
        if($file->isValid()){
            $clientName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $newName = md5(date("Y-m-d H:i:s").$clientName).".".$extension;
            $path = $file->move($_SERVER['DOCUMENT_ROOT'].'/upload',$newName);
            $url = trim(str_replace($_SERVER['DOCUMENT_ROOT'],'',$path));
        }
        $result =  Article::create(['title'=>$request['title'],'categories_id'=>$request['category_id'],'summary'=>$request['summary'],
            'attr'=>$request['attr'],'share_gift'=>$request['gift'],'order'=>$request['sort'],
            'content'=>$request['content'],'thumb'=>$url,'is_recommend'=>$recommend,
            ]);
        $keywords = explode(" ",$request['keyword']);
        foreach($keywords as $keyword)
        {
            $create = Keywords::firstOrCreate(['keyword'=>$keyword]);
            if(!$result->keywords()->find($create->id)){
                $create->article()->attach($result);
            }
        }
        return redirect('article');

    }
    public function edit($article)
    {
        $articles = Article::find($article);
        $keyword = $articles->keywords;
        $key = array();
        foreach($keyword as $value){
            $key[] =$value['keyword'];
        }
        $keywords = implode('',$key);
        $node = Category::roots()->get();
        return view('Admin.updatearticle',['article'=>$articles,'node'=>$node,'keywords'=>$keywords]);
    }

    public function update(Request$request,$article)
    {
        $recommend = empty($request['recommend'])?0:1;
        if($request['thumb']==null){
            $this->validate($request,[
                'title'=>'required|max:255',
                'category_id'=>'required',
                'keyword'=>'required|max:255',
                'summary'=>'required|max:255',
                'gift'=>'required|numeric',
                'content'=>'required',
            ]);
        }else{
            $this->validate($request,[
                'title'=>'required|max:255',
                'category_id'=>'required',
                'keyword'=>'required|max:255',
                'summary'=>'required|max:255',
                'gift'=>'required|numeric',
                'content'=>'required',
                'thumb'=>'required|image',
            ]);
        }

        if($file=$request->file('thumb')){
            $clientName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $newName = md5(date("Y-m-d H:i:s").$clientName).".".$extension;
            $path = $file->move($_SERVER['DOCUMENT_ROOT'].'/upload',$newName);
            $url = trim(str_replace($_SERVER['DOCUMENT_ROOT'],'',$path));
        }else{
            $url = $request['img'];
        }
        $articles = Article::find($article);
        $keywords = explode(' ',$request['keyword']);
        foreach($keywords as $keyword){
            $articles->keywords()->update(['keyword'=>$keyword]);
        }
        $articles->update(['title'=>$request['title'],'categories_id'=>$request['category_id'],'summary'=>$request['summary'],
            'attr'=>$request['attr'],'share_gift'=>$request['gift'],'order'=>$request['sort'],
            'content'=>$request['content'],'thumb'=>$url,'is_recommend'=>$recommend,]);
        return redirect('article');
    }
    public function destroy($article)
    {
        $articles = Article::find($article);
        $result =  $articles->delete();
        return  new JsonResponse($result);
    }
}
