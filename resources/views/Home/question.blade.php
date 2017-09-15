<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <!-- 引入YDUI样式 -->
    <link rel="stylesheet" href="{{asset('ydui/css/ydui.css')}}" />
    <script src="{{asset('ydui/js/ydui.flexible.js')}}"></script>
</head>
<body>
<header class="m-navbar navbar-fixed" >
    <a href="javascript:history.go(-1);" class="navbar-item"><i class="back-ico"></i></a>
    <div class="navbar-center"><span class="navbar-title" style="color:#fff">{{$form->name}}</span></div>
</header>
<div class="g-view">

@foreach($question as $item)
   @if($item->type == 'text')
             <div class="m-celltitle">{{$item->question}}</div>
             <div class="m-cell">
                 <div class="cell-item">
                     <div class="cell-right">
                         <input type="text" name="{{$item->id}}" class="cell-input" >
                     </div>
                 </div>
             </div>
    @elseif($item->type == 'select')
          <div class="m-celltitle">{{$item->question}}</div>
           @foreach($item->select as $value)

                <div class="m-cell">
                    <label class="cell-item">
                        <span class="cell-left">{{$value->select_content}}</span>
                        <label class="cell-right">
                            <input type="checkbox" name="{{$value->id}}"/>
                            <i class="cell-checkbox-icon"></i>
                        </label>
                    </label>
                    @endforeach
   @elseif($item->type == 'time') 
   @eles
   @endif     
@endforeach

</div>
<footer class="m-tabbar tabbar-fixed">

</footer>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('ydui/js/ydui.js')}}"></script>
</body>
</html>