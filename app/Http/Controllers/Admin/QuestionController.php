<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Select;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index($attach)
    {
        return view('Admin.question',['attach'=>$attach]);
    }

    public function create($attach)
    {

        return view('Admin.addquestion',['attach'=>$attach]);
    }

    public function store(Request$request, $attach)
    {
        $isNeed = empty($request['is_need'])?0:1;
        if($request['type'] == 'select')
        {

            $result = Question::create(['question'=>$request['question'],'questionnaire_id'=>$attach,'is_need'=>$isNeed,'type'=>$request['type']]);
            foreach($request['select_content'] as $value){

                Select::create(['select_content'=>$value,'question_id'=>$result['id']]);
            }
        }else{

            Question::create(['question'=>$request['question'],'questionnaire_id'=>$attach,'is_need'=>$isNeed,'type'=>$request['type']]);
        }

        return redirect()->route('question.index',['attach'=>$attach]);
    }
}
