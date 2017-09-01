@include('Admin.header')
<div class="admin">
    <div class="panel admin-panel margin-top">
        <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="{{route('category.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="label">
                        <label>上级分类：</label>
                    </div>
                    <div class="field">
                        <select name="pid" class="input w50">
                            <option value="">请选择分类</option>
                            @foreach($node as $cate)
                                <option value="{{$cate->id}}">{!!str_repeat('├',$cate->depth)!!}{{$cate->name}}</option>
                                @include('Admin.option',['cateid'=>$cate->id])
                            @endforeach
                        </select>
                        <div class="tips">不选择上级分类默认为一级分类</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>分类标题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="title" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>分类图片：</label>
                    </div>
                    <div class="field">
                        <div class="uploader blue">
                            <input type="text" class="filename" readonly/>
                            <input type="button" name="icon" style="height:40px" class="button" value="点击上传..."/>
                            <input type="file" size="40" name="icon"/>
                        </div>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>分类描述：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="desc"  />
                        <div class="tips"></div>
                    </div>
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
<script>$(function(){
        $("input[type=file]").change(function(){$(this).parents(".uploader").find(".filename").val($(this).val());});
        $("input[type=file]").each(function(){
            if($(this).val()==""){$(this).parents(".uploader").find(".filename").val("未选择文件...");}
        });
    });
</script>