@include('Admin.header')
<div class="admin">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder">问卷列表</strong></div>
        <div class="padding">
            <button type="button" class="button border-yellow" onclick="window.location.href='{{route('attach.create',['attach'=>$article])}}'"><span class="icon-plus-square-o"></span> 添加问卷</button>
        </div>
        <table class="table  text-center" id="cate">
            <tr>
                <th width="5%">ID</th>
                <th width="10%" style="text-align:left">问卷名称</th>
                <th width="30%">问卷描述</th>
                <th width="10%">是否购买</th>
                <th width="5%">价格</th>
                <th width="10%">购买奖励(积分)</th>
                <th width="15%">操作</th>
            </tr>
           @foreach($questionList as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td align="left" >{{$item->name}}</td>
                    <td>{!!$item->desc!!}</td>
                    <td>@if($item->is_sale ==0)否@else是@endif</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->cash_back}}</td>
                    <td><div class="button-group"><a class="button border-red" href="{{route('question.index',['attach'=>$item->id])}}"><span class="icon-edit"></span>添加问题</a><a class="button border-main" href="{{route('attach.edit',['attach'=>$item->id,'article'=>$article])}}"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del('{{$item->id}}','{{$article}}')"><span class="icon-trash-o"></span> 删除</a> </div></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('Admin.footer')
<script src="{{asset('layer/layer.js')}}"></script>
<script type="text/javascript">
    function del(id,article) {

        layer.msg('确定删除该问卷？', {
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
                        url: "{{route( 'attach.destroy', ['article'=>'%d','attach'=>'%d'] ) }}".replace('%d',article).replace('%d', id),
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
