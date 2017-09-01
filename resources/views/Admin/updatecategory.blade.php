@include('Admin.header')
<div class="admin">
    <div class="panel admin-panel margin-top">
        <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="{{route('category.update',['category'=>$category->id])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <div class="label">
                        <label>上级分类：</label>
                    </div>
                    <div class="field">
                        <select name="pid" class="input w50">
                            @if(count($parent))
                                <option >{{$parent->name}}</option>
                            @else
                                <option value="">无上级分类</option>
                            @endif
                           {{-- @foreach($node as $cate)
                                <option value="{{$cate->id}}">{!!str_repeat('├',$cate->depth)!!}{{$cate->name}}</option>
                                @include('admin.option',['cateid'=>$cate->id])
                            @endforeach--}}
                        </select>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>分类标题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="title" value="{{old('title')??$category->name}}"  />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>分类图标：</label>
                    </div>
                    <div class="field">
                        <div class="uploader blue">
                            <input type="hidden" name="img" value="{{$category->icon}}">
                                <input type="text" class="filename" readonly/>
                                <input type="button" name="icon" style="height:40px" class="button" value="点击上传..."/>
                                <input type="file" size="40" name="icon"/>
                        <span class="tips"><img src="{{$category->icon}}" alt="" style="margin-left:10px;height:65px;width:65px;border-radius:4px"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>分类排序：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="desc" value="{{old('desc')??$category->desc}}"  />
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
@include('Admin.footer')
<script>$(function(){
        $("input[type=file]").change(function(){$(this).parents(".uploader").find(".filename").val($(this).val());});
        $("input[type=file]").each(function(){
            if($(this).val()==""){$(this).parents(".uploader").find(".filename").val('{{$category->icon}}');}
        });
    });
</script>