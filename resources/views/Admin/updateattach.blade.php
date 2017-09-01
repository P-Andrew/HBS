@include('Admin.header')
<style>
    ul { list-style-type: none;}
    li { display: inline-block;}
</style>
<link rel="stylesheet" href="{{asset('css/jquery-labelauty.css')}}">
<div class="admin">
    <div class="panel admin-panel margin-top">
        <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="{{route('attach.update',['article'=>$article,'attach'=>$attach->id])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <div class="label">
                        <label>问卷名称：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="name" value="{{old('name')??$attach->name}}" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>问卷描述：</label>
                    </div>
                    <div class="field">
                        <textarea id="desc" name='desc' type="text/plain" style="width:980px;height:350px;">{{old('desc')??$attach->desc}}</textarea>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>是否设置购买：</label>
                    </div>
                    <div class="field">
                        <ul class="dowebok">
                            <li><input type="checkbox"  name="is_sale" data-labelauty="购买" @if($attach->is_sale==0) @else checked="checked" @endif ></li>
                        </ul>
                    </div>
                </div>
                @if($attach->is_sale==0)
                <div class="form-group tog" style="display:none;">
                    <div class="label">
                        <label>购买价格：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50 " name="price" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group tog" style="display:none;">
                    <div class="label">
                        <label>购买反馈积分：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50 " name="cash_back"   data-validate="number:排序必须为数字" />
                        <div class="tips"></div>
                    </div>
                </div>
                @else
                    <div class="form-group " >
                        <div class="label">
                            <label>购买价格：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50 " name="price" value="{{old('price')??$attach->price}}" />
                            <div class="tips"></div>
                        </div>
                    </div>
                    <div class="form-group " >
                        <div class="label">
                            <label>购买反馈积分：</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input w50 " name="cash_back"  value="{{old('cash_back')??$attach->cash_back}}"  data-validate="number:排序必须为数字" />
                            <div class="tips"></div>
                        </div>
                   </div>
                @endif
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
<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script>
    $(function(){
        var check =  $('input[name="is_sale"]');
        check.change(function(){
            $('.tog').toggle();
        })
    })
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
<script>
    var desc = UE.getEditor('desc');
    desc.ready(function(){
        desc.execCommand('serverparam','_token','{{ csrf_token()}}');
    });
</script>