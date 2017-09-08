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
    <style>
        .detail-header{text-align:center;height:2rem;font-size:.35rem;color:#000;background:#d9d9d9;padding:.3rem 1.4rem}
        .detail-header h1{overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;}
        .detail-aside{text-align:center;width:100%;}
        .detail-aside img{display:inline-block;margin-top:-.57rem;width:.9rem ;height:.9rem;border-radius:50%;}
        .detail-aside h3{font-size:.23rem;color:#000;}
        .detail-article{margin:.6rem auto;padding:0 .1rem;color:#000;font-size:.32rem;word-spacing:.03rem;letter-spacing:.03rem;justify-content:flex-start}
        .detail-aside p{margin-top:.1rem;color:#8f8f8f;}
        .detail-article img[src ^= '/upload/']{width:100%}
    </style>
</head>
<body>
<header class="m-navbar navbar-fixed" >
    <a href="javascript:history.go(-1);" class="navbar-item"><i class="back-ico"></i></a>
    <div class="navbar-center"><span class="navbar-title" style="color:#fff">{{$detail->title}}</span></div>
    <a href="#" class="navbar-item" style="color:#fff;font-size:.38rem"><i class="icon-share1"></i></a>
</header>
<div class="g-view">
   <header class="detail-header">
      <h1>{{$detail->title}}</h1>
   </header>
    <aside class="detail-aside">
        <img src="{{$detail->category->icon}}" alt="" style=""><h3>{{$detail->category->name}}</h3><p>{{$detail->created_at}}</p>
    </aside>
    <article class="detail-article">
       {!!$detail->content!!}
    </article>
    
</div>

<footer class="m-tabbar tabbar-fixed">
    <a href="#" class="tabbar-item tabbar-active">
            <span class="tabbar-icon">
                <i class="icon-home"></i>
            </span>
        <span class="tabbar-txt">首页</span>
    </a>
    <a href="#" class="tabbar-item">
            <span class="tabbar-icon">
                <i class="icon-shopcart-outline"></i>
            </span>
        <span class="tabbar-txt">购物车</span>
    </a>
    <a href="#" class="tabbar-item">
            <span class="tabbar-icon">
                <i class="icon-ucenter-outline"></i>
            </span>
        <span class="tabbar-txt">个人中心</span>
    </a>
</footer>
<script src="{{asset('js/jquery.js')}}"></script>

<script src="{{asset('ydui/js/ydui.js')}}"></script>
</body>
</html>