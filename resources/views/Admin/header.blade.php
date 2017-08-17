<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="{{asset('css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1>商学院后台管理中心</h1>
    </div>
    <div class="head-l">&nbsp;&nbsp;<a class="button button-little bg-red" href="{{route('loginout')}}"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2><span class="icon-user"></span>基本设置</h2>
    <ul style="display:block">
        <li><a href="info.html" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
        <li><a href="pass.html" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
        <li><a href="page.html" target="right"><span class="icon-caret-right"></span>单页管理</a></li>
        <li><a href="adv.html" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>
        <li><a href="book.html" target="right"><span class="icon-caret-right"></span>留言管理</a></li>
        <li><a href="column.html" target="right"><span class="icon-caret-right"></span>栏目管理</a></li>
    </ul>
    <h2><span class="icon-list"></span>分类管理</h2>
    <ul>
        <li><a href="{{route('category.index')}}"><span class="icon-caret-right"></span>分类列表</a></li>
        <li><a href="{{route('category.create')}}"><span class="icon-caret-right"></span>添加分类</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>文章管理</h2>
    <ul>
        <li><a href="{{route('article.index')}}"><span class="icon-caret-right"></span>文章列表</a></li>
        <li><a href="{{route('article.create')}}"><span class="icon-caret-right"></span>添加文章</a></li>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<ul class="bread">
    <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</span>
        &nbsp;&nbsp;&nbsp; </li>
</ul>