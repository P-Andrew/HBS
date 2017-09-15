@include('Admin.header')
<style>
    ul { list-style-type: none;}
    li { display: inline-block;}
    .add{ height:30px;background: #3498db;color:#fff;padding: 10px 15px;border-radius: 2px}
    .radio{width:85px;height:35px;display: inline;}
    .removeclass{font-size:18px;font-weight:bolder;background:#3498db;padding:5px 10px;border-radius:2px;}
    #increment{margin-top:4px}
</style>
<link rel="stylesheet" href="{{asset('css/jquery-labelauty.css')}}">
<div class="admin">
    <div class="panel admin-panel margin-top">
        <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改内容</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="{{route('question.update',['question'=>$question->id,'attach'=>$attach])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <div class="label">
                        <label>问题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="question" value="{{old('question')??$question->question}}" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>是否必填：</label>
                    </div>
                    <div class="field">
                        <ul class="dowebok">
                            <li><input type="checkbox"  name="is_need" data-labelauty="必填" @if($question->is_need==0) @else checked="checked" @endif 　/></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group " >
                    <div class="label">
                        <label>问题类型：</label>
                    </div>
                    <div class="field">
                        <ul class="dowebok">
                         @if($question->type == 'text')
                            <li><input type="radio"  name="type" value="text" data-labelauty="文本" checked="checked" ></li>
                         @elseif($question->type == 'select')
                            <li><input type="radio"  name="type" value="select" data-labelauty="选择" checked="checked"  ></li>
                         @elseif($question->type == 'time')
                            <li><input type="radio"  name="type" value="time" data-labelauty="时间" checked="checked"  ></li>
                         @else
                            <li><input type="radio"  name="type" value="data" data-labelauty="日期" checked="checked"  ></li>
                         @endif
                        </ul>
                    </div>
                </div>
                <div class="form-group select"  >
                    <div class="label">
                        <label>选项：</label>
                    </div>
                    @foreach($question->select as $select)
                    <div class="field increment"  style="width:15%;display:block">
                        <input type="text" class="input radio" name="select_content[]" value="{{$select->id}}" />
                        <a href="javascript:;" style="color:#ffffff;" class="removeclass">x</a>
                    </div>
                    @endforeach
                    <a href="javascript:;" id="AddMoreFileBox" style="line-height:30px;color: #ffffff;" class="add">添加</a>

                </div>
                <div class="form-group">
                    <div class="label">
                        <label></label>
                    </div>
                    <div class="field">
                        <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('Admin.footer')
<script type="text/javascript" charset="utf-8" src="{{asset('js/jquery-labelauty.js')}}"></script>

<script>
    $(function(){

        $('input[name=type]').change(function(){
            var check = $('input[name="type"]:checked').val();
            if(check === 'select'){
                $('.select').show();
            }else{
                $('.select').hide();
            }

        });
        $(function(){
            var MaxInputs = 8;
            var InputsWrapper = $(".increment");
            var AddButton = $("#AddMoreFileBox");
            var x = InputsWrapper.length;
            var FieldCount = 1;
            $(AddButton).click(function(e){
                if(x<=MaxInputs)
                {
                    FieldCount++;
                    $(InputsWrapper).append(' <div class="field" id="increment"><input type="text" class="input radio" name="select_content[]" /><a href="javascript:;" style="color:#ffffff;margin-left:4px" class="removeclass">x</a></div>')
                    x++;
                }
                return false;
            });
            $("body").on("click",".removeclass",function(e){
                if(x>1){
                    $(this).parent('div').remove();
                    x--;
                }
                return false;
            })
        });
    });
</script>
<script>
    $(function(){
        $("input[type=file]").change(function(){$(this).parents(".uploader").find(".filename").val($(this).val());});
        $("input[type=file]").each(function(){
            if($(this).val()==""){$(this).parents(".uploader").find(".filename").val("未选择文件...");}
        });
    });
    $(function(){
        $(':input').labelauty();
    });
</script>
