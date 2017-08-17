<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $node = Category::roots()->paginate();
        return view('Admin.category', ['node' => $node]);
    }

    public function create()
    {
        $node = Category::roots()->get();
        return view('Admin.addcategory', ['node' => $node]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'icon' => 'required|dimensions:max_width=2000,max_height=2000'
        ]);
        $file = $request->file('icon');
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalName();
            $newName = md5(date('Y-m-d H:i:s') . $clientName) . "." . $extension;
            $path = $file->move($_SERVER['DOCUMENT_ROOT'] . '/upload', $newName);
            $url = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $path));
        }
        if ($request['pid'] == null) {
            Category::create(['name' => $request['title'], 'order' => $request['sort'], 'icon' => $url]);
        } else {
            $category = Category::find($request['pid']);
            $category->children()->create(['name' => $request['title'], 'order' => $request['sort'], 'icon' => $url]);
        }
        return redirect('category');
    }

    public function edit($category)
    {
        $categories = Category::find($category);
        $parent = $categories->parent;
        return view('Admin.updatecategory', ['category' => $categories, 'parent' => $parent]);
    }
    public function update(Request$request,$category){
        if($request['icon']!=null){
            $this->validate($request,['icon'=>'required|dimensions:max_width=2000,max_height=2000']);
        }
        if($file=$request->file('icon')){
            if($file->isValid()){
                $clientName = $file->getClientOriginalName();
                $entension = $file->getClientOriginalExtension();
                $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
                $path = $file->move($_SERVER['DOCUMENT_ROOT'] . '/upload', $newName);
                $url = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $path));

            }
        }else{
            $url = $request['img'];
        }
        $cate = Category::find($category);
        $cate->update(['name'=>$request['title'],'icon'=>$url,'order'=>$request['order']]);
        return redirect('category');
    }
    public function destroy($category)
    {
        $categories = Category::find($category);
        $result = $categories->delete();
        return new JsonResponse($result);
    }
}
