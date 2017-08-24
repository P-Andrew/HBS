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
            <form method="post" class="form-x" action="{{route('article.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="label">
                        <label>文章标题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="title" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>文章缩略图：</label>
                    </div>
                    <div class="field">
                        <div class="uploader blue">
                            <input type="text" class="filename" readonly/>
                            <input type="button" name="icon" style="height:40px" class="button" value="点击上传..."/>
                            <input type="file" size="40" name="thumb"/>
                        </div>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>文章概要：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="summary" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>所属分类：</label>
                    </div>
                    <div class="field">
                        <select name="category_id" class="input w50">
                            <option value="">请选择分类</option>
                            @foreach($node as $cate)
                                <option value="{{old($cate->id)??$cate->id}}">{!!str_repeat('├',$cate->depth)!!}{{old($cate->name)??$cate->name}}</option>
                                @include('Admin.option',['cateid'=>$cate->id])
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>文章关键词：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="keyword" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>是否推荐：</label>
                    </div>
                    <div class="field">
                        <ul class="dowebok">
                            <li><input type="checkbox"  name="recommend" data-labelauty="推荐" checked="checked"></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>文章类型：</label>
                    </div>
                    <div class="field">
                       <ul class="doweboke">
                           <li><input type="radio" name="attr" value="1" data-labelauty="图文" checked="checked"></li>
                           <li><input type="radio" name="attr" value="2" data-labelauty="PPT"></li>
                           <li><input type="radio" name="attr" value="3" data-labelauty="视屏"></li>
                       </ul>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>分享奖励：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="gift" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>排序：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" name="sort" value="0"  data-validate="number:排序必须为数字" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>文章内容：</label>
                    </div>
                    <div class="field">
                        <textarea id="desc" name='content' type="text/plain" style="width:980px;height:350px;"></textarea>
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
<script type="text/javascript" charset="utf-8" src="{{asset('js/jquery-labelauty.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>

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