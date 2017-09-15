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
    <div class="navbar-center"><span class="navbar-title" style="color:#fff">评价</span></div>

</header>
<div class="g-view">

</div>
<footer class="m-tabbar tabbar-fixed">
    <form action="{{route('commit')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="comment" />
        <input type="hidden" name="article_id" value="{{$article}}">
    </form>
</footer>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('ydui/js/ydui.js')}}"></script>
</body>
</html>