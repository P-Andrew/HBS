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
        input::-ms-input-placeholder{text-align: center;}
        input::-webkit-input-placeholder{text-align: center;}
    </style>
</head>
<body>
<header class="m-navbar navbar-fixed">
    <a href="javascript:;" class="navbar-item" style="color:#fff;font-size:.45rem">
      商学院
    </a>
    <div class="navbar-center">
        <span class="navbar-title"><input type="text" style="width:100%;border-radius:.07rem;border-style:none;height:.56rem;color:#888;font-size:.25rem" placeholder="输入需要搜索的内容"></span>
    </div>
    <a href="" class="navbar-item " >
      <i class="icon-search" style="font-size:.45rem;font-weight:bolder;color:#fff"></i>
    </a>
</header>
<div class="g-view">
    <div id="J_Tab" class="m-tab">
        <div style="position:fixed;z-index:100;width:100%">
        <ul class="tab-nav">
            <li class="tab-nav-item tab-active"><a href="javascript:;">推荐</a></li>
            <li class="tab-nav-item"><a href="javascript:;">最新</a></li>
            <li class="tab-nav-item"><a href="javascript:;">热门</a></li>
            <li class="tab-nav-item"><a href="javascript:;">发现</a></li>
        </ul>
        </div>
        <div class="tab-panel">
            <div class="tab-panel-item tab-active">
                <article class="m-list list-theme4">
                    @foreach($recommend as $item)
                    <a href="{{route('detail',['article'=>$item->id])}}" class="list-item">
                        <div class="list-img">
                            <img src="{{$item->thumb}}">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">{{$item->title}}</h3>
                            <div class="list-mes-item">
                                <div style="width:100%;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
                                    {{$item->summary}}
                                    <div style="margin:.1rem 0">
                                    <span ><em>{{$item->praise}}</em>赞</span>&nbsp;
                                    <span ><em>{{$item->praise}}</em>评论</span>
                                        <span style="float:right">分享奖励:<em>{{$item->share_gift}}</em>积分</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </a>
                    @endforeach
                </article>
            </div>
            <div class="tab-panel-item">
                <article class="m-list list-theme4">
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">标题标题标题标题标题</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                                <div>right</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/21/10172020923917672923.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">骆驼男装2016夏装男士短袖T恤 圆领衣服 印花男装体恤 半袖打底衫</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/23/15395220917905380014.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">条纹短袖T恤男士韩版衣服大码潮流男装夏季圆领体恤2016新款半袖</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/25/14244120933639105658.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">夏季青少年衣服男生潮牌t恤 男士 夏秋学生 日系棉短袖半袖男小衫</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                                <div>right</div>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
            <div class="tab-panel-item">
                <article class="m-list list-theme4">
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">标题标题标题标题标题</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                                <div>right</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/21/10172020923917672923.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">骆驼男装2016夏装男士短袖T恤 圆领衣服 印花男装体恤 半袖打底衫</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/23/15395220917905380014.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">条纹短袖T恤男士韩版衣服大码潮流男装夏季圆领体恤2016新款半袖</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/25/14244120933639105658.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">夏季青少年衣服男生潮牌t恤 男士 夏秋学生 日系棉短袖半袖男小衫</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                                <div>right</div>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
            <div class="tab-panel-item">
                <article class="m-list list-theme4">
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/19/09430120929215230041.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">标题标题标题标题标题</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                                <div>right</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/21/10172020923917672923.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">骆驼男装2016夏装男士短袖T恤 圆领衣服 印花男装体恤 半袖打底衫</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/23/15395220917905380014.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">条纹短袖T恤男士韩版衣服大码潮流男装夏季圆领体恤2016新款半袖</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-item">
                        <div class="list-img">
                            <img src="http://img1.shikee.com/try/2016/06/25/14244120933639105658.jpg_220x220.jpg">
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title">夏季青少年衣服男生潮牌t恤 男士 夏秋学生 日系棉短袖半袖男小衫</h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em>34.7</span>
                                    <span class="list-del-price">¥45.65</span>
                                </div>
                                <div>right</div>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        </div>
    </div>
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
<script>

    var $tab = $('#J_Tab');

    $tab.tab({
        nav: '.tab-nav-item',
        panel: '.tab-panel-item',
        activeClass: 'tab-active'
    });

    $tab.find('.tab-nav-item').on('open.ydui.tab', function (e) {
        console.log('索引：%s - [%s]正在打开', e.index, $(this).text());
    });

    $tab.find('.tab-nav-item').on('opened.ydui.tab', function (e) {
        console.log('索引：%s - [%s]已经打开了', e.index, $(this).text());
    });

</script>
</body>
</html>