<?php

namespace App\Http\Controllers\Admin;

use App\Attach;
use App\Question;
use App\Select;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function index($attach)
    {

        $question = Attach::find($attach)->question()->paginate();
        return view('Admin.question',['attach'=>$attach,'question'=>$question]);
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

    public function edit($attach,$question)
    {
        $questions = Question::find($question);

        return view('Admin.updatequestion',['attach'=>$attach,'question'=>$questions]);

    }

    public function show()
    {

    }

    public function update(Request$request, $attach,$question)
    {
        $isNeed = empty($request['is_need'])?0:1;

        $questions = Question::find($question);

        if($request['type'] == 'select')
        {

             $questions->update(['question'=>$request['question'],'is_need'=>$isNeed,'type'=>$request['type']]);

             foreach($request['select_content'] as  $value){
                  $select = Select::find($value);
                 $select->update(['select_content'=>$request['select_content ']]);
            }
        }else{

            $questions->update(['question'=>$request['question'],'is_need'=>$isNeed,'type'=>$request['type']]);
        }

        return redirect()->route('question.index',['attach'=>$attach]);
    }

    public function destroy($attach,$question)
    {

        $question = Question::find($question);
        $result =  $question->delete();
        return  new JsonResponse($result);
    }
}
