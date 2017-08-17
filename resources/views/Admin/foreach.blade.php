@foreach($cate->children()->get() as $cate)
    <tr>
        <td >{{$cate->id}}</td>
        <td align="left">{!!str_repeat('├',$cate->depth)!!}{{$cate->name}}</td>
        <td><img src="{{$cate->icon}}" alt="" style="width:45px;height:45px;border-radius:50%"></td>
        <td>{{$cate->order}}</td>
        <td><div class="button-group"> <a class="button border-main" href="{{route('category.edit',['category'=>$cate->id])}}"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del('{{$cate->id}}','{{count($cate->children)}}')"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>

    @if($cate->children)
      @include('Admin.foreach',['cate'=>$cate])
    @endif
@endforeach