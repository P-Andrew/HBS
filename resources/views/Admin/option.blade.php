@foreach($cate->children()->get() as $cate)
    <option value="{{old($cate->id)??$cate->id}}" >{!!str_repeat('├',$cate->depth)!!}{{old($cate->name)??$cate->name}}</option>
    @if($cate->children)
        @include('Admin.option',['cate'=>$cate])
    @endif
@endforeach