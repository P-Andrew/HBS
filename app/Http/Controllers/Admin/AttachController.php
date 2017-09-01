<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Attach;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AttachController extends Controller
{

    public function index($article)
    {
        $questionList = Article::find($article)->Attach()->paginate();
        return view('Admin.attach',['article'=>$article,'questionList'=>$questionList]);
    }
    public function create($article)
    { 

        return view('Admin.addattach',['article'=>$article]);
    }

    public function store(Request$request,$article)
    {
        $isSale = empty($request['is_sale'])?0:1;
        if($isSale){
            $this->validate($request,[
                'name'=>'required|max:255',
                'desc'=>'required',
                'price'=>'required|numeric',
                'cash_back'=>'required|numeric',
            ]);
            Attach::create(['name'=>$request['name'],'desc'=>$request['desc'],'price'=>$request['price'],'cash_back'=>$request['cash_back'],'is_sale'=>$isSale,'article_id'=>$article]);
        }else{
            $this->validate($request,[
                'name'=>'required|max:255',
                'desc'=>'required',
                ]);
            Attach::create(['name'=>$request['name'],'desc'=>$request['desc'],'is_sale'=>$isSale,'article_id'=>$article]);
        }

          return redirect()->route('attach.index',['article'=>$article]);
    }

    public function edit($article,$attach)
    {
        $attaches = Attach::find($attach);

        return view('Admin.updateattach',['attach'=>$attaches,'article'=>$article]);
    }

    public function update(Request$request,$article,$attach)
    {
        $isSale = empty($request['is_sale'])?0:1;
        $attaches = Attach::find($attach);
        if($isSale){
            $this->validate($request,[
                'name'=>'required|max:255',
                'desc'=>'required',
                'price'=>'required|numeric',
                'cash_back'=>'required|numeric',
            ]);
        }else{
            $this->validate($request,[
                'name'=>'required|max:255',
                'desc'=>'required',
            ]);

        }
        $attaches->update(['name'=>$request['name'],'desc'=>$request['desc'],'price'=>$request['price'],'cash_back'=>$request['cash_back'],'is_sale'=>$isSale]);
        return redirect()->route('attach.index',['article'=>$article]);
    }

    public function destroy($article,$attach)
    {

        $attaches = Attach::find($attach);
        $result =  $attaches->delete();
        return  new JsonResponse($result);
    }
}
