@include('Admin.header')
<div class="admin">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder">文章列表</strong></div>
        <div class="padding">
            <button type="button" class="button border-yellow" onclick="window.location.href='{{route('article.create')}}'"><span class="icon-plus-square-o"></span> 添加文章</button>
        </div>
        <table class="table  text-center" id="cate">
            <tr>
                <th width="5%">ID</th>
                <th width="10%" style="text-align:left">文章标题</th>
                <th width="10%">文章缩略图</th>
                <th width="10%">所属分类</th>
                <th width="15%">文章概要</th>
                <th width="10%">分享奖励(积分)</th>
                <th width="10%">是否推荐</th>
                <th width="10%">排序</th>

            </tr>
            @foreach($article as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td align="left" >{{$item->title}}</td>
                    <td><img src="{{$item->thumb}}" alt="" style="width:45px;height:45px;border-radius:50%"></td>
                    <td>{{\App\Category::find($item->categories_id)->name}}</td>
                    <td>{{$item->summary}}</td>
                    <td>{{$item->share_gift}}</td>
                    <td>@if($item->is_recommend==0)否@else是@endif</td>
                    <td>{{$item->order}}</td>
                    <td><div class="button-group"><a class="button border-red" href="{{route('attach.index',['article'=>$item->id])}}"><span class="icon-edit"></span>添加附件</a><a class="button border-main" href="{{route('article.edit',['article'=>$item->id])}}"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del('{{$item->id}}')"><span class="icon-trash-o"></span> 删除</a> </div></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('Admin.footer')
<script src="{{asset('layer/layer.js')}}"></script>
<script type="text/javascript">
    function del(id) {
        layer.msg('确定删除该文章？', {
            time: 0,
            btn: ['确定', '再想想'],
            yes: function (index) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                $.ajax({
                        type: 'DELETE',
                        url: "{{route( 'article.destroy', [ 'article'=>'%d' ] ) }}".replace('%d', id),
                        success: function (data) {
                            if (data) {
                                window.location.href = '';
                            }
                        },
                        error: function () {

                        }
                    }
                );
                layer.close(index);
            }
        })
    }
</script>
