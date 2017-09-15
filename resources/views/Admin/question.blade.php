@include('Admin.header')
<div class="admin">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder">问题列表</strong></div>
        <div class="padding">
            <button type="button" class="button border-yellow" onclick="window.location.href='{{route('question.create',['attach'=>$attach])}}'"><span class="icon-plus-square-o"></span>添加问题</button>
        </div>
        <table class="table  text-center" id="cate">
            <tr>
                <th width="5%">ID</th>
                <th width="10%" style="text-align:left">问题</th>
                <th width="30%">是否必填</th>
                <th width="10%">类型</th>

            </tr>
          @foreach($question as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td align="left" >{{$item->question}}</td>
                    <td>@if($item->is_need ==0)否@else是@endif</td>
                    <td><div class="button-group"><a class="button border-red" href="{{route('question.index',['attach'=>$item->id])}}"><span class="icon-edit"></span>查看回答</a><a class="button border-main" href="{{route('question.edit',['question'=>$item->id,'attach'=>$attach])}}"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del('{{$item->id}}','{{$attach}}')"><span class="icon-trash-o"></span> 删除</a> </div></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('Admin.footer')
<script src="{{asset('layer/layer.js')}}"></script>
<script type="text/javascript">
    function del(id,attach) {

        layer.msg('确定删除该问题？', {
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
                        url: "{{route( 'question.destroy', ['attach'=>'%d','question'=>'%d'] ) }}".replace('%d',attach).replace('%d', id),
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
