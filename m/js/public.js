var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var PublicModule = angular.module('PublicModule', []);
PublicModule.controller("PublicCtrl", ['$scope', '$interval', '$timeout', function ($scope, $interval, $timeout) {
    var myDate = new Date();
    var NewDate = myDate.getFullYear() + '-' + (myDate.getMonth() + 1) + '-' + myDate.getDate();
    $scope.dateYear = NewDate;
    var NewHours = myDate.getHours() + ":" + myDate.getMinutes();
    $scope.userName = window.USER.nickname || window.USER.phone; //当前用户的名字
    $scope.userImg = window.USER.head_img; //当前用户的头像
    var zanPics = ["/mobile/user-card/images/index/dianzan/live_icon_heart_1.png", "/mobile/user-card/images/index/dianzan/live_icon_heart_2.png", "/mobile/user-card/images/index/dianzan/live_icon_donut_pink.png", "/mobile/user-card/images/index/dianzan/live_icon_heart_3.png", "/mobile/user-card/images/index/dianzan/live_icon_donut_brown.png", "/mobile/user-card/images/index/dianzan/live_icon_heart_4.png", "/mobile/user-card/images/index/dianzan/live_icon_heart_5.png", "/mobile/user-card/images/index/dianzan/live_icon_heart_6.png", "/mobile/user-card/images/index/dianzan/live_icon_flower_purple.png", "/mobile/user-card/images/index/dianzan/live_icon_heart_7.png"]; //点赞图片

    // window.scope = $scope;
    $scope.isok1=false;
    $scope.isok2=false;
    $scope.isok3=false;
    $scope.isok4=false;
    $scope.isok5=false;
    $scope.isok6=false;
    $scope.isok7=false;
    $scope.isok8=false;
    $scope.isok9=false;
    $scope.isok10=false;
    $scope.LHSkip=false;
    if (!window.USER) {
        $scope.sendMsgNum = 0; //用户点赞的计数
        $scope.dianzanNum = 0; //用户点赞的计数
    } else {
        $scope.dianzanNum = MSG.filter(function (t) {
            return t.userId == window.USER.id && t.type === 'like';
        }).length;
        $scope.sendMsgNum = MSG.filter(function (t) {
            return t.userId == window.USER.id && t.type === 'msg';
        }).length;
    }

    $scope.needleLogin = function () {
        function isWeiXin(){
            return window.navigator.userAgent.toLowerCase().match(/MicroMessenger/i) == 'micromessenger';
        }

        if (!window.USER) {
            var route = window.location.hash.slice(2);
            window.location.href = isWeiXin() ? '/auth/weixin/' + CARD.id + '/' + route : '/auth/' + CARD.id + '/' + route;
            return false;
        }

        return true;
    };
    $scope.ss=function () {
        $scope.LHSkip=false;
    }
    $scope.changeCSS=function () {
        $('.iTooltipMes').css({
            'position': 'absolute',
            'color': '#eee',
            'font-size': '13px',
            'padding': '5px',
            'background': '#aaa',
            'border': '1px solid #aaa',
            'border-radius': '3px',
            'box-shadow': '0px 1px 3px rgba(0,0,0,0.3)',
            'z-index': '99'
        });
        $('.iToolTriTop').css({
            'left': '50%',
            'bottom': '-16px',
            'margin-left':'-8px',
            'border-color':'#aaa transparent transparent transparent',
            'border-style': 'solid dashed dashed dashed'
        });
        $('.iToolTriTop i').css({
            'left': '-6px',
            'bottom': '-4px',
            'border-color':'#aaa transparent transparent transparent',
            'border-style': 'solid dashed dashed dashed'
        })

    }
    $scope.changeCSSFan=function () {
        $('.iTooltipMes').css({
            'position': 'absolute',
            'color': '#d9717d',
            'font-size': '13px',
            'padding': '5px',
            'background': '#fff',
            'border': '1px solid #d9717d',
            'border-radius': '3px',
            'box-shadow': '0px 1px 3px rgba(0,0,0,0.3)',
            'z-index': '99'
        });
        $('.iToolTriTop').css({
            'left': '50%',
            'bottom': '-16px',
            'margin-left':'-8px',
            'border-color':'#d9717d transparent transparent transparent',
            'border-style': 'solid dashed dashed dashed'
        });
        $('.iToolTriTop i').css({
            'left': '-6px',
            'bottom': '-4px',
            'border-color':'#d9717d transparent transparent transparent',
            'border-style': 'solid dashed dashed dashed'
        })

    }


    $scope.litimgBox=function () {
        $scope.LHSkip=false;
        if($scope.count>=0){
            $("#center1 img").removeClass("gray");
            $scope.isok1=true;
            $scope.isok2=false;
            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.LHSkip1=function () {
                $scope.isok1=true;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun1(1);
                $scope.changeCSSFan();
            }

        }else{
            $scope.LHSkip1=function () {
                $scope.isok1=true;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.LHSkip=true;
                $scope.changeCSS();

            }
        }

        if($scope.count>=50){
            $scope.isok1=false;
            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.isok2=true;
            $("#center2 img").removeClass("gray");
            $("#center1").next("div").css("background", "#d9717d");
            $scope.LHSkip2=function () {
                $scope.isok1=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok2=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun2(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip2=function () {
                $scope.isok1=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok2=true;
                $scope.LHSkip=true;
                $scope.changeCSS();

            }
        }

        if($scope.count>=100){

            $scope.isok1=false;

            $scope.isok2=false;
            $scope.isok4=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.isok3=true;

            $("#center3 img").removeClass("gray");
            $("#center2").next("div").css("background", "#d9717d");
            $scope.LHSkip3=function () {
                $scope.isok1=false;

                $scope.isok2=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok3=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun3(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip3=function () {

                $scope.isok1=false;

                $scope.isok2=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok3=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }
        if($scope.count>=150){

            $scope.isok1=false;

            $scope.isok3=false;
            $scope.isok2=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.isok4=true;

            $("#center4 img").removeClass("gray");
            $("#center3").next("div").css("background", "#d9717d");
            $scope.LHSkip4=function () {
                $scope.isok1=false;

                $scope.isok3=false;
                $scope.isok2=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok4=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun4(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip4=function () {

                $scope.isok1=false;

                $scope.isok3=false;
                $scope.isok2=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok4=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }
        if($scope.count>=200){


            $scope.isok1=false;
            $scope.isok2=false;
            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.isok5=true;

            $("#center5 img").removeClass("gray");
            $("#center4").next("div").css("background", "#d9717d");
            $scope.LHSkip5=function () {
                $scope.isok1=false;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok5=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun5(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip5=function () {

                $scope.isok1=false;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok5=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }
        if($scope.count>=250){


            $scope.isok1=false;
            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok2=false;
            $scope.isok5=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.isok6=true;

            $("#center6 img").removeClass("gray");
            $("#center5").next("div").css("background", "#d9717d");
            $scope.LHSkip6=function () {
                $scope.isok1=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok2=false;
                $scope.isok5=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok6=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun6(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip6=function () {
                $scope.isok1=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok2=false;
                $scope.isok5=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok6=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }
        if($scope.count>=300){



            $scope.isok1=false;

            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok2=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.isok7=true;
            $("#center7 img").removeClass("gray");
            $("#center6").next("div").css("background", "#d9717d");
            $scope.LHSkip7=function () {
                $scope.isok1=false;

                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok2=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok7=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun7(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip7=function () {
                $scope.isok1=false;

                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok2=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok7=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }
        if($scope.count>=350){

            $scope.isok1=false;

            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok2=false;
            $scope.isok9=false;
            $scope.isok10=false;
            $scope.isok8=true;
            $("#center8 img").removeClass("gray");
            $("#center7").next("div").css("background", "#d9717d");
            $scope.LHSkip8=function () {
                $scope.isok1=false;

                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok2=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok8=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun8(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip8=function () {

                $scope.isok1=false;

                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok2=false;
                $scope.isok9=false;
                $scope.isok10=false;
                $scope.isok8=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }
        if($scope.count>=400){

            $scope.isok1=false;
            $scope.isok2=false;
            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok10=false;
            $scope.isok9=true;
            $("#center9 img").removeClass("gray");
            $("#center8").next("div").css("background", "#d9717d");
            $scope.LHSkip9=function () {
                $scope.isok1=false;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok10=false;
                $scope.isok9=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun9(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip9=function () {

                $scope.isok1=false;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok10=false;
                $scope.isok9=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }
        if($scope.count>=450){

            $scope.isok1=false;
            $scope.isok2=false;
            $scope.isok3=false;
            $scope.isok4=false;
            $scope.isok5=false;
            $scope.isok6=false;
            $scope.isok7=false;
            $scope.isok8=false;
            $scope.isok9=false;
            $scope.isok10=true;
            $("#center10 img").removeClass("gray");
            $("#center9").next("div").css("background", "#d9717d");
            $scope.LHSkip10=function () {
                $scope.isok1=false;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=true;
                $scope.LHSkip=false;
                $scope.levelFunc.rankFun10(1);
                $scope.changeCSSFan();
            }
        }else{
            $scope.LHSkip10=function () {

                $scope.isok1=false;
                $scope.isok2=false;
                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok9=false;
                $scope.isok10=true;
                $scope.LHSkip=true;
                $scope.changeCSS();
            }
        }

    }

    $scope.onerrorHeadImg = '/mobile/user-card/images/index/headImg/headImg' + parseInt(Math.random() * 4 + 1) + '.jpg';


    $scope.iSgift = false;
    $scope.iSgift_dec = false;
    $scope.isMsg = false;
    $scope.isCard = true;
    $scope.iSADBox = true; //广告弹窗
    $scope.EXPNum = 0; //默认经验值
    $scope.GiveXP = 50; //默认还差多少升级
    $scope.count = CARD.exp; //升级球经验值
    // $scope.count=425;
    $scope.rank1 = 0;
    $scope.rank2 = 0;
    $scope.rank3 = 0;
    $scope.rank4 = 0;
    $scope.rank5 = 0;
    $scope.rank6 = 0;
    $scope.rank7 = 0;
    $scope.rank8 = 0;
    $scope.rank9 = 0;
    $scope.rank10 = 0;
    $scope.CARD = window.CARD;
    $scope.USER = window.USER;
    $scope.SHARE = window.SHARE;
    $scope.Contact=false;
    $scope.MSG = MSG.sort(function (p, t) {
        return t.datetime - p.datetime;
    }).map(function (t) {
        t.randomNum = parseInt(Math.random() * 9 + 1);
        return t;
    });


    $scope.iSdelMSGBox = false; //打开删除框
    //弹幕自动跑
    $scope.isDanmaku = true;
    //默认礼物
    var giftPlace = 0;
    //默认礼物数量
    $scope.giftNum = 1;
    //默认礼物价格
    $scope.giftPrice = 12;
    //收到的礼物数组
    $scope.giftArray = [];
    //点赞数组
    $scope.add_zan = [];
    //礼物弹窗显示
    $scope.gift_Danmaku_box = false;
    $scope.isGift_Danmaku_box = false;
    //礼物数据
    $scope.giftItems = GIFTS.map(function (t) {
        return {
            giftImg: t.gift_picture + '/raw',
            giftPrice: t.gift_price,
            giftValue: t.gift_price
        };
    });

    //数据库留言数据
    if ($scope.CARD.cid == 4) {
        $scope.lhMessage = [{ txt: "猪终于拱到白菜了", ImgSrc: "/mobile/user-card/images/index/emoji/1-38.png" }, { txt: "我的女神就这样嫁了", ImgSrc: "/mobile/user-card/images/index/emoji/1-30.png" }, { txt: "早生贵子", ImgSrc: "/mobile/user-card/images/index/emoji/1-03.png" }, { txt: "百年好合，新婚快乐", ImgSrc: "/mobile/user-card/images/index/emoji/1-04.png" }, { txt: "儿子嫁出去了，爸爸终于放心了", ImgSrc: "/mobile/user-card/images/index/emoji/1-05.png" }, { txt: "新娘好美", ImgSrc: "/mobile/user-card/images/index/emoji/1-06.png" }, { txt: " 新娘如此可爱，新郎必定英俊不凡。", ImgSrc: "/mobile/user-card/images/index/emoji/1-07.png" }, { txt: "我是未来的隔壁老王", ImgSrc: "/mobile/user-card/images/index/emoji/1-08.png" }, { txt: "永！远！幸！福！", ImgSrc: "/mobile/user-card/images/index/emoji/1-09.png" }, { txt: "愿你们事事如愿，美满幸福。", ImgSrc: "/mobile/user-card/images/index/emoji/1-43.png" }, { txt: "抢我老婆", ImgSrc: "/mobile/user-card/images/index/emoji/1-23.png" }, { txt: "结婚不易，衷心祝福", ImgSrc: "/mobile/user-card/images/index/emoji/1-12.png" }, { txt: "日久见人心，大力出奇迹", ImgSrc: "/mobile/user-card/images/index/emoji/1-13.png" }, { txt: "新郎好帅", ImgSrc: "/mobile/user-card/images/index/emoji/1-14.png" }, { txt: "牛粪拉在鲜花上", ImgSrc: "/mobile/user-card/images/index/emoji/1-15.png" }, { txt: "新郎明明是我", ImgSrc: "/mobile/user-card/images/index/emoji/1-16.png" }, { txt: "有情人终成眷属", ImgSrc: "/mobile/user-card/images/index/emoji/1-17.png" }, { txt: "呵呵哒", ImgSrc: "/mobile/user-card/images/index/emoji/1-18.png" }, { txt: "哼，说好的一起做单身狗！", ImgSrc: "/mobile/user-card/images/index/emoji/1-24.png" }, { txt: "新娘美如画，我醉成诗", ImgSrc: "/mobile/user-card/images/index/emoji/1-20.png" }, { txt: "欢庆此日成佳偶，且喜今朝结良缘。", ImgSrc: "/mobile/user-card/images/index/emoji/1-21.png" }, { txt: "新手上路，小心驾驶", ImgSrc: "/mobile/user-card/images/index/emoji/1-22.png" }]; //结婚
    } else if ($scope.CARD.cid == 6) {
        $scope.lhMessage = [{ txt: "万事如意", ImgSrc: "/mobile/user-card/images/index/emoji/1-13.png" }, { txt: "顾客如川川流不息；生财有道道畅无穷", ImgSrc: "/mobile/user-card/images/index/emoji/1-02.png" }, { txt: "666", ImgSrc: "/mobile/user-card/images/index/emoji/1-25.png" }, { txt: "财源若海，顾客盈门", ImgSrc: "/mobile/user-card/images/index/emoji/1-04.png" }, { txt: "祝你开门大吉吧！", ImgSrc: "/mobile/user-card/images/index/emoji/1-03.png" }, { txt: "升临福地，祥集德门", ImgSrc: "/mobile/user-card/images/index/emoji/1-38.png" }, { txt: "财源通四海，生意畅三春", ImgSrc: "/mobile/user-card/images/index/emoji/1-29.png" }, { txt: "生意兴隆，财源广进。", ImgSrc: "/mobile/user-card/images/index/emoji/1-43.png" }, { txt: "恒心有恒业", ImgSrc: "/mobile/user-card/images/index/emoji/1-01.png" }, { txt: "隆德享隆名", ImgSrc: "/mobile/user-card/images/index/emoji/1-20.png" }, { txt: "恭祝贵公司事业蒸蒸日上，更上一层楼!", ImgSrc: "/mobile/user-card/images/index/emoji/1-45.png" }, { txt: "蓬勃发展，日胜一日", ImgSrc: "/mobile/user-card/images/index/emoji/1-28.png" }, { txt: "蒸蒸日上，如日中天", ImgSrc: "/mobile/user-card/images/index/emoji/1-17.png" }, { txt: "愿你818发一发，财源滚滚到你家", ImgSrc: "/mobile/user-card/images/index/emoji/1-06.png" }, { txt: "财源茂盛达三江", ImgSrc: "/mobile/user-card/images/index/emoji/1-22.png" }]; //商业请柬
    } else if ($scope.CARD.cid == 5) {
        $scope.lhMessage = [{ txt: "越长越俊俏！", ImgSrc: "/mobile/user-card/images/index/emoji/1-14.png" }, { txt: "生日快乐，幸福安康", ImgSrc: "/mobile/user-card/images/index/emoji/1-01.png" }, { txt: "年年今日，岁岁今朝", ImgSrc: "/mobile/user-card/images/index/emoji/1-02.png" }, { txt: "前程似锦，美梦成真", ImgSrc: "/mobile/user-card/images/index/emoji/1-05.png" }, { txt: "百事可乐，万事芬达", ImgSrc: "/mobile/user-card/images/index/emoji/1-08.png" }, { txt: "福如东海长流水，寿比南山不老松", ImgSrc: "/mobile/user-card/images/index/emoji/1-13.png" }, { txt: "愿所有的温馨、幸福围绕在你身边", ImgSrc: "/mobile/user-card/images/index/emoji/1-17.png" }, { txt: "生日快乐，青春常驻！", ImgSrc: "/mobile/user-card/images/index/emoji/1-27.png" }, { txt: "愿这特殊的日子里，你的每时每刻都充满欢乐", ImgSrc: "/mobile/user-card/images/index/emoji/1-20.png" }, { txt: "今天，像小鸟初展新翅;明天，像雄鹰鹏程万里", ImgSrc: "/mobile/user-card/images/index/emoji/1-22.png" }, { txt: " 愿平安幸福！", ImgSrc: "/mobile/user-card/images/index/emoji/1-28.png" }, { txt: "祝生日圆满，谱写壮丽诗篇", ImgSrc: "/mobile/user-card/images/index/emoji/1-38.png" }, { txt: "福寿安康，笑颜永驻", ImgSrc: "/mobile/user-card/images/index/emoji/1-42.png" }, { txt: "祝你生日最高兴，时刻都有新感动", ImgSrc: "/mobile/user-card/images/index/emoji/1-43.png" }, { txt: "生日快乐好心情，一生幸福乐悠悠", ImgSrc: "/mobile/user-card/images/index/emoji/1-45.png" }]; //生日请柬
    } else {
        $scope.lhMessage = [];
    }
    $scope.DANMSG = $scope.MSG.filter(function (t) {
        return t.type === 'msg';
    }).slice(0, 21);

    //存弹幕的数组；
    $scope.BarMsg = MSG.reduce(function (p, t) {
        var date = new Date(t.datetime);
        var Min = date.getMinutes();
        if (Min < 10) {
            Min = '0' + Min;
        }
        t.recordHours = date.getHours() + ":" + Min;
        date = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
        if (!p[date]) p[date] = [];
        p[date].push(t);
        return p;
    }, {});

    $scope.BarMsgDate = Object.keys($scope.BarMsg).sort(function (p, t) {
        return new Date(t) - new Date(p);
    });

    //主页弹幕数组
    $scope.indexMsg = [];
    var indexMsgArr = $interval(function () {
        $scope.indexMsg.splice(0, 1);
    }, 5000);
    var xx = $interval(function () {
        $scope.giftArray.splice(0, 1);
    }, 5000);

    $scope.$on('$destroy', function () {
        $interval.cancel(indexMsgArr);
        $interval.cancel(xx);
    });

    $scope.delMSG = function ($index, date) {
        $scope.iSdelMSGBox = true;
        $scope.DelIndex = $index;
        $scope.DelDate = date;
    };
    $scope.closeDelMSG = function () {
        $scope.iSdelMSGBox = false;
    };
    //级别函数


    var levelFun = function () {
        function levelFun() {
            _classCallCheck(this, levelFun);
        }

        _createClass(levelFun, [{
            key: "rankFun1",
            value: function rankFun1() {

                var addOne1 = $timeout(function () {
                    $('.loveHouseBox').html("<div class=\"MarryScene\">\n\t\t\t\t\t<div id=\"scene1\">\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_BG1.png\" alt=\"\u7ED3\u5A5A\u573A\u666F\u80CC\u666F1\" class=\"MarryScene_BG1\" />\n\t\t\t\t\t\t<img src=\" /mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_BG2.png \" alt=\"\u7ED3\u5A5A\u573A\u666F\u80CC\u666F1 \" class=\"MarryScene_BG2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png \" alt=\"\u4E91\u6735 \" class=\"MarryScene_cloud MarryScene_cloud1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png \" alt=\"\u4E91\u6735 \" class=\"MarryScene_cloud MarryScene_cloud2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png \" alt=\"\u4E91\u6735 \" class=\"MarryScene_cloud MarryScene_cloud3 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png \" alt=\"\u4E91\u6735 \" class=\"MarryScene_cloud MarryScene_cloud4 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png \" alt=\"\u4E91\u6735 \" class=\"MarryScene_cloud MarryScene_cloud5 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree1.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree1.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree2.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree3 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree2.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree4 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree3.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree5 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree3.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree6 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree3.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree7 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_tree3.png \" alt=\"\u6811\u6728 \" class=\"MarryScene_tree MarryScene_tree8 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_audienc1.png \" alt=\"\u89C2\u4F17 \" class=\"MarryScene_audienc1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_audienc1_hand1.png \" alt=\"\u624B \" class=\"MarryScene_audienc1_hand1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_audienc1_hand2.png \" alt=\"\u624B \" class=\"MarryScene_audienc1_hand2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Boy_eye2.png \" alt=\"\u773C\u775B \" class=\"MarryScene_Boy_eye1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Boy_eye2.png \" alt=\"\u773C\u775B \" class=\"MarryScene_Boy_eye2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_audienc2.png \" alt=\"\u89C2\u4F17 \" class=\"MarryScene_audienc2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_audienc1_hand1.png \" alt=\"\u624B \" class=\"MarryScene_audienc2_hand1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_audienc1_hand2.png \" alt=\"\u624B \" class=\"MarryScene_audienc2_hand2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_girl_eye2.png \" alt=\"\u773C\u775B \" class=\"MarryScene_girl_eye1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_girl_eye3.png \" alt=\"\u773C\u775B \" class=\"MarryScene_girl_eye2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak1.png \" alt=\"\u89C2\u4F17\u7279\u6548 \" class=\" MarryScene_speak1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak1.png \" alt=\"\u89C2\u4F17\u7279\u6548 \" class=\" MarryScene_speak2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak3.png \" alt=\"\u89C2\u4F17\u7279\u6548 \" class=\" MarryScene_speak3 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_lace.png \" alt=\"\u82B1\u8FB9 \" class=\"MarryScene_lace \" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" class=\"MarryScene_Butterfly MarryScene_Butterfly1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" class=\"MarryScene_Butterfly MarryScene_Butterfly2 \" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" class=\"MarryScene_Butterfly MarryScene_Butterfly3 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flowerA MarryScene_flower1 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flower MarryScene_flower2 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flowerA MarryScene_flower3 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flower MarryScene_flower4 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flowerA MarryScene_flower5 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flower MarryScene_flower6 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flowerA MarryScene_flower7 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flower MarryScene_flower8 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_flower.png \" alt=\"\u5C0F\u82B1\u82B1 \" class=\"MarryScene_flowerA MarryScene_flower9 \"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png \" alt=\"\u7231\u5FC3 \" class=\"MarryScene_Heart MarryScene_Heart1 \" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png \" alt=\"\u7231\u5FC3 \" class=\"MarryScene_Heart MarryScene_Heart2 \" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png \" alt=\"\u7231\u5FC3 \" class=\"MarryScene_Heart MarryScene_Heart3 \" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png \" alt=\"\u7231\u5FC3 \" class=\"MarryScene_Heart MarryScene_Heart4 \" />\n\t\t\t\t\t</div>\t\t\t\t\t\n\t\t</div>");
                }, 1);
                var addOne2 = $timeout(function () {
                    $('.MarryScene').append("<div class=\"marryPoP\" style=\"display:none;\">\n                    <div id=\"marryBoy\" >\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_boy.png \" alt=\"\u7537\u732A\u811A \" class=\"MarryScene_boy \"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_hands.png \" alt=\"\u624B \" class=\"MarryScene_hands1 \"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_hands.png \" alt=\"\u624B \" class=\"MarryScene_hands2 \"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_ring.png \" alt=\"\u6212\u6307 \" class=\"MarryScene_ring \"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png \" alt=\"\u95EA\u5149 \"class=\"MarryScene_shine \" />\n                    </div>\n                    <div id='marryGirl'>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_girl.png \" alt=\"\u5973\u732A\u811A \" class=\"MarryScene_girl \"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_tear.png \" alt=\"\u773C\u6CEA \" class=\"MarryScene_tear \"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png \" alt=\"\u816E\u7EA2 \" class=\"MarryScene__blusher \" />\n                    </div>\n                </div>\n                   ");
                }, 2000);
                var addOne3 = $timeout(function () {
                    $(".marryPoP").fadeIn(2000);
                }, 2001);
                $timeout.cancel([addOne1, addOne2]);
            }
        }, {
            key: "rankFun2",
            value: function rankFun2() {

                $("#scene1").fadeOut(3000); //过渡
                var addOne1 = $timeout(function () {
                    $('.loveHouseBox').html("<div class=\"loveHouseCartoon2\">\n\t\t\t\t<div class=\"marrySce\" style=\"display:none;\">\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_BGBG2.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_BGBG2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHourse_adorn.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHourse_adorn\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_BG2.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_BG2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_leftPurdah.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_leftPurdah\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_rightPurdah.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_rightPurdah\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_leftaDorn.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_leftaDorn\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_rightaDorn.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_rightaDorn\" />\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_lamplight.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_lamplight1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_lamplight.png\" alt=\"\u573A\u666F\u80CC\u666F\"class=\"loveHouse_lamplight2\" />\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_siteFloor.png\" alt=\"\u5730\u677F\u7816\"class=\"loveHouse_siteFloor\" />\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart5\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart5\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart6\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart6\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart7\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart7\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_heart.png\" alt=\"\u5C0F\u7EA2\u661F\"class=\"loveHouse_heart8\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u5C0F\u9EC4\u661F\"class=\"loveHouse_pinkHeart8\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine5\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine6\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine7\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine8\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine9\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\u706F\"class=\"loveHouse_shine10\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute1.png\" alt=\"\u6C14\u74031\"class=\"loveHouse_ballute1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute2.png\" alt=\"\u6C14\u74032\"class=\"loveHouse_ballute2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute3.png\" alt=\"\u6C14\u74033\"class=\"loveHouse_ballute3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute4.png\" alt=\"\u6C14\u74034\"class=\"loveHouse_ballute4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_father.png\" alt=\"\u7236\u4EB2\"class=\"loveHouse_father\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_tear.png\" alt=\"\u773C\u6CEA\"class=\"loveHouse_tear loveHouse_tear1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_tear.png\" alt=\"\u773C\u6CEA\"class=\"loveHouse_tear loveHouse_tear2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_mother.png\" alt=\"\u6BCD\u4EB2\"class=\"loveHouse_mother\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_tear.png\" alt=\"\u773C\u6CEA\"class=\"loveHouse_tear loveHouse_tear3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_tear.png\" alt=\"\u773C\u6CEA\"class=\"loveHouse_tear loveHouse_tear4\" />\n\t\t\t\t</div>\t\t\t\t\t\n\t\t\t\t</div>");
                }, 1000);
                var addOne2 = $timeout(function () {
                    $(".marrySce").fadeIn(2000);
                }, 1000);
                var addOne3 = $timeout(function () {
                    $(".loveHouseCartoon2").append("<div class=\"marryPop\" style=\"display:none;\">\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_boy.png\" alt=\"\u7537\u732A\u811A\"class=\"loveHouse_boy\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\"class=\"loveHouse_boyBlusher\" />\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_girl.png\" alt=\"\u5973\u732A\u811A\"class=\"loveHouse_girl\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\"class=\"loveHouse_girlBlusher\" />\t\t\t\n\t\t\t\t\t</div>\n                ");
                }, 3000);
                var addOne4 = $timeout(function () {
                    $(".marryPop").fadeIn(2000);
                }, 3000);

                $timeout.cancel([addOne1, addOne2, addOne3, addOne4]);
            }
        }, {
            key: "rankFun3",
            value: function rankFun3() {

                $(".marrySce").fadeOut(3000); //过渡
                var addTow1 = $timeout(function () {
                    $('.loveHouseBox').html("<div class=\"loveHouseCartoon1\">\t\t\t\t\n\t\t\t\t<div class=\"loveWorldCon\" style=\"display:none;\">\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_BG.png\" alt=\"\u80CC\u666F\" class=\"loveHouse_Bg\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blind.png\" alt=\"\u7A97\u5E18\" class=\"loveHouseBlind\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_window.png\" alt=\"\u7A97\u6237\" class=\"loveHouseWindow\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"loveHouseCloud\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cutlery.png\" alt=\"\u9910\u5177\" class=\"loveHouseCutlery\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_TV.png\" alt=\"\u7535\u89C6\" class=\"loveHouseTV\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_hearth.png\" alt=\"\u7076\u53F0\" class=\"loveHouseHearth\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_steam.png\" alt=\"\u84B8\u6C7D\" class=\"loveHouseSteam1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_steam.png\" alt=\"\u84B8\u6C7D\" class=\"loveHouseSteam2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_steam.png\" alt=\"\u84B8\u6C7D\" class=\"loveHouseSteam3\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_steam.png\" alt=\"\u84B8\u6C7D\" class=\"loveHouseSteam4\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_steam.png\" alt=\"\u84B8\u6C7D\" class=\"loveHouseSteam5\" />\t\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_foolr.png\" alt=\"\u5730\u677F\" class=\"loveHouseFoolr\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_rug.png\" alt=\"\u5730\u6BEF\" class=\"loveHouseRug\" />\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_carpet.png\" alt=\"\u5730\u6BEF\" class=\"loveHouseCarpet\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_desk.png\" alt=\"\u684C\u5B50\" class=\"loveHouseDesk\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cup.png\" alt=\"\u676F\u5B50\" class=\"loveHouseCup\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_dish.png\" alt=\"\u76D8\u5B50\" class=\"loveHouseDish\" />\n\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t</div>");
                }, 1000);
                var addTow2 = $timeout(function () {
                    $(".loveWorldCon").fadeIn(2000);
                }, 1000);
                var addTow3 = $timeout(function () {
                    $(".loveHouseCartoon1").append("<div class=\"loveWorldPop\"  style=\"display:none;\">\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_boy.png\" alt=\"\u7537\u732A\u811A\" class=\"loveHouseBoy\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_boyEye.png\" alt=\"\u773C\u775B\" class=\"loveHouse_boyEye loveHouse_boyEye1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_boyEye.png\" alt=\"\u773C\u775B\" class=\"loveHouse_boyEye loveHouse_boyEye2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_ladle.png\" alt=\"\u52FA\u5B50\" class=\"loveHouse_ladle\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u6C34\u84B8\u6C14\" class=\"loveHouseReek1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u6C34\u84B8\u6C14\" class=\"loveHouseReek2\" />\t\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_girl.png\" alt=\"\u5973\u732A\u811A\" class=\"loveHouseGirl\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_girlEye.png\" alt=\"\u5DE6\u773C\" class=\"loveHouse_girlEye1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_girlEye.png\" alt=\"\u53F3\u773C\" class=\"loveHouse_girlEye2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_mouth1.png\" alt=\"\u5634\u5DF4\" class=\"loveHouse_mouth\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_leftHand.png\" alt=\"\u5DE6\u624B\" class=\"loveHouse_leftHand\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_rightHand.png\" alt=\"\u53F3\u624B\" class=\"loveHouse_rightHand\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\" class=\"loveHouse_blusher loveHouse_blusher1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\" class=\"loveHouse_blusher loveHouse_blusher2\" />\t\t\t\t\n\t\t\t\t\t    <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png\" alt=\"\u7231\u5FC3\" class=\"loveHouseHeart1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png\" alt=\"\u7231\u5FC3\" class=\"loveHouseHeart2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png\" alt=\"\u7231\u5FC3\" class=\"loveHouseHeart3\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png\" alt=\"\u7231\u5FC3\" class=\"loveHouseHeart4\" />\t\t\t\t\t\t\n\t\t\t\t\t\n\t\t\t\t\t</div>");
                }, 3000);
                var addTow4 = $timeout(function () {
                    $(".loveWorldPop").fadeIn(2000);
                }, 3000);
                $timeout.cancel([addTow1, addTow2, addTow3, addTow4]);
            }
        }, {
            key: "rankFun4",
            value: function rankFun4() {

                $(".loveWorldCon").fadeOut(3000); //过渡
                var addthree1 = $timeout(function () {
                    $('.loveHouseBox').html("<div class=\"pregNan\">\n\t\t\t\t\t<div class=\"pregNanSce\" style=\"display:none;\">\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_bg.png\" alt=\"\u80CC\u666F\"class=\"pregNan_bg\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_foolr.png\" alt=\"\u5730\u677F\"class=\"pregNan_foolr\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_window.png\" alt=\"\u7A97\u6237\"class=\"pregNan_window\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"pregNan_cloud pregNan_cloud1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"pregNan_cloud pregNan_cloud2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"pregNan_cloud pregNan_cloud3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_blind.png\" alt=\"\u7A97\u5E18\"class=\"pregNan_blind\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_mural1.png\" alt=\"\u58C1\u753B\"class=\"pregNan_mural1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_mural2.png\" alt=\"\u58C1\u753B\"class=\"pregNan_mural2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_mural3.png\" alt=\"\u58C1\u753B\"class=\"pregNan_mural3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_lamp1.png\" alt=\"\u706F\"class=\"pregNan_lamp1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_face.png\" alt=\"\u5C0F\u7B11\u8138\"class=\"pregNan_face\" />\t\t\t\t\t\t\n\t\t\t\t\t<!-- \u6389\u7740\u7684\u661F\u661F -->\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star5\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star6\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star7\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star8\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star9\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_star.png\" alt=\"\u661F\u661F\"class=\"pregNan_star pregNan_star10\" />\t\t\t\t\t\n\t\t\t\t\t<!-- \u5730\u6BEF -->\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_rug.png\" alt=\"\u5730\u6BEF\"class=\"pregNan_rug\" />\n\t\t\t\t\t<!-- \u6795\u5934 -->\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_tomato.png\" alt=\"\u6795\u5934\"class=\"pregNan_tomato\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_pillow1.png\" alt=\"\u6795\u5934\"class=\"pregNan_pillow1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_pillow2.png\" alt=\"\u6795\u5934\"class=\"pregNan_pillow2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_pillow2.png\" alt=\"\u6795\u5934\"class=\"pregNan_pillow3\" />\n\t\t\t\t\t<!-- \u679C\u76D8 -->\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_compote.png\" alt=\"\u679C\u76D8\"class=\"pregNan_compote\" />\t\t\t\n\t\t\t\t<!-- \u4E66\u672C -->\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_book.png\" alt=\"\u4E66\u672C\"class=\"pregNan_book\" />\n\t\t\t\t<!-- \u7231\u5FC3 -->\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart5\" />\n\t\t\t\t<!-- \u8774\u8776 -->\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" class=\"pregNan_Butterfly pregNan_Butterfly1 \"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" class=\"pregNan_Butterfly pregNan_Butterfly2 \" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" class=\"pregNan_Butterfly pregNan_Butterfly3 \"/>\n\t\t\t\t</div>\n\t\t\t\t</div>");
                }, 1000);
                var addthree2 = $timeout(function () {
                    $(".pregNanSce").fadeIn(2000);
                }, 1000);

                var addthree3 = $timeout(function () {
                    $(".pregNan").append("<div class=pregNanPop\" style=\"display:none;\">\n\t\t\t\t\t\t<!-- \u7537\u732A\u811A -->\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_boy.png\" alt=\"\u7537\u732A\u811A\"class=\"pregNan_boy\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_foot.png\" alt=\"\u811A\"class=\"pregNan_foot\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_boy_eye.png\" alt=\"\u773C\u775B\"class=\"pregNan_boy_eye\" />\n\t\t\t\t\t\t<!-- \u5973\u732A\u811A -->\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_girl.png\" alt=\"\u5973\u732A\u811A\"class=\"pregNan_girl\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_hands.png\" alt=\"\u624B\"class=\"pregNan_hands\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_girl_eye.png\" alt=\"\u773C\u775B\"class=\"pregNan_girl_eye\" />\t\n\t\t\t\t\t</div>         ");
                }, 3000);
                var addthree4 = $timeout(function () {
                    $(".pregNanPop").fadeIn(2000);
                }, 3000);

                $timeout.cancel([addthree1, addthree2, addthree3, addthree4]);
            }
        }, {
            key: "rankFun5",
            value: function rankFun5() {

                $(".pregNanSce").fadeOut(3000); //过渡
                var addfour1 = $timeout(function () {
                    $('.loveHouseBox').html("<div class=\"newLife\">\n                   <div class=\"newLifeSce\" style=\"display:none;\">\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_bg1.png\" alt=\"\u80CC\u666F\" class=\"newLife_bg1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_bg2.png\" alt=\"\u80CC\u666F\" class=\"newLife_bg2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_floor.png\" alt=\"\u5730\u677F\" class=\"newLife_floor\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_window.png\" alt=\"\u7A97\u6237\" class=\"newLife_window\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"newLife_cloud1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/loveHouse_glass.png\" alt=\"\u73BB\u7483\" class=\"loveHouse_glass1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/loveHouse_glass.png\" alt=\"\u73BB\u7483\" class=\"loveHouse_glass2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"newLife_cloud\" />\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_lamp.png\" alt=\"\u706F\u5EA7\" class=\"newLife_lamp\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_pendantLamp1.png\" alt=\"\u540A\u706F\" class=\"newLife_pendantLamp1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_pendantLamp2.png\" alt=\"\u540A\u706F\" class=\"newLife_pendantLamp2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_pendantLamp3.png\" alt=\"\u540A\u706F\" class=\"newLife_pendantLamp3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_pendantLamp4.png\" alt=\"\u540A\u706F\" class=\"newLife_pendantLamp4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_table.png\" alt=\"\u684C\u5B50\" class=\"newLife_table\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_cup.png\" alt=\"\u676F\u5B50\" class=\"newLife_cup\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_steam.png\" alt=\"\u84B8\u6C7D\" class=\"newLife_Steam1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_steam.png\" alt=\"\u84B8\u6C7D\" class=\"newLife_Steam2\" />\t\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_pot.png\" alt=\"\u58F6\" class=\"newLife_pot\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_book.png\" alt=\"\u4E66\" class=\"newLife_book1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_book.png\" alt=\"\u4E66\" class=\"newLife_book2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_rug.png\" alt=\"\u5730\u6BEF\" class=\"newLife_rug\" />\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_shoe.png\" alt=\"\u978B\u5B50\" class=\"newLife_shoe1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_shoe.png\" alt=\"\u978B\u5B50\" class=\"newLife_shoe2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine5\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine6\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine7\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine8\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_shine.png\" alt=\"\u95EA\u5149\" class=\"newLife_shine newLife_shine9\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_star.png\" alt=\"\u661F\u661F\" class=\"newLife_star1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_star.png\" alt=\"\u661F\u661F\" class=\"newLife_star2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_star.png\" alt=\"\u661F\u661F\" class=\"newLife_star3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_star.png\" alt=\"\u661F\u661F\" class=\"newLife_star4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_cage.png\" alt=\"\u7F69\u7F69\" class=\"newLife_cage\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_kato.png\" alt=\"\u7AE0\u9C7C\" class=\"newLife_kato\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_pingpang.png\" alt=\"\u7AE0\u9C7C\" class=\"newLife_pingpang\" />\t\n\t\t\t\t</div>\n\t\t\t\t</div>");
                }, 1000);
                var addfour2 = $timeout(function () {
                    $(".newLifeSce").fadeIn(2000);
                }, 1000);
                var addfour3 = $timeout(function () {
                    $(".newLife").append("<div class=\"newLifePop\" style=\"display:none;\">\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_boy_cnt.png\" alt=\"\u7537\u732A\u811A_\u8EAB\u4F53\" class=\"newLife_boy_cnt\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_boy_head.png\" alt=\"\u7537\u732A\u811A_\u5934\u90E8\" class=\"newLife_boy_head\" />\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_boy_hands2.png\" alt=\"\u7537\u732A\u811A_\u624B\" class=\"newLife_boy_hands1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_boy_hands.png\" alt=\"\u7537\u732A\u811A_\u624B\" class=\"newLife_boy_hands2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_baby.png\" alt=\"BaBy\" class=\"newLife_baby\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_baby_mouth.png\" alt=\"\u5634\u5DF4\" class=\"newLife_baby_mouth\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_babyEye.png\" alt=\"\u773C\u775B\" class=\"newLife_babyEye\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_tear.png\" alt=\"\u773C\u6CEA\" class=\"newLife_tear1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_tear.png\" alt=\"\u773C\u6CEA\" class=\"newLife_tear2\" />\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_try.png\" alt=\"\u54ED\u58F0\" class=\"newLife_try\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_gril_head.png\" alt=\"\u5973\u732A\u811A_\u5934\u90E8\" class=\"newLife_gril_head\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_gril_eye1.png\" alt=\"\u5973\u732A\u811A_\u773C\u775B\" class=\"newLife_gril_eye\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_gril_cnt.png\" alt=\"\u5973\u732A\u811A_\u8EAB\u4F53\" class=\"newLife_gril_cnt\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_gril_hand.png\" alt=\"\u5973\u732A\u811A_\u624B\" class=\"newLife_gril_hand1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_gril_hand2.png\" alt=\"\u5973\u732A\u811A_\u624B\" class=\"newLife_gril_hand2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/newLife/newLife_nai.png\" alt=\"\u5976\" class=\"newLife_nai\"/>\n\t\t\t\t\t</div>");
                }, 3000);
                var addfour4 = $timeout(function () {
                    $(".newLifePop").fadeIn(2000);
                }, 3000);

                $timeout.cancel([addfour1, addfour2, addfour3, addfour4]);
            }
        }, {
            key: "rankFun6",
            value: function rankFun6() {

                $(".newLifeSce").fadeOut(3000); //过渡
                var addsix1 = $timeout(function () {
                    $('.loveHouseBox').html("<div id=\"travel\">\n                    <div class=\"travelSce\" style=\"display:none;\">\t\t\t\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_bg1.png\" alt=\"\u80CC\u666F1\"  id=\"travel_bg1\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_bg2.png\" alt=\"\u80CC\u666F2\"  id=\"travel_bg2\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_flower.png\" alt=\"\u5730\u677F\"  id=\"travel_flower\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_byobu.png\" alt=\"\u5C4F\u98CE\"  id=\"travel_byobu\"/>                        \n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_lamp.png\" alt=\"\u706F1\"  id=\"travel_lamp1\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_lamp2.png\" alt=\"\u706F2\"  id=\"travel_lamp2\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_lamp.png\" alt=\"\u706F3\"  id=\"travel_lamp3\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_Tlamp.png\" alt=\"\u706F3\"  id=\"travel_lamp4\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_click.png\" alt=\"\u949F\"  id=\"travel_click\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_second.png\" alt=\"\u949F\"  id=\"travel_second\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_mural.png\" alt=\"\u6302\u753B\"  id=\"travel_mural\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_rug.png\" alt=\"\u5730\u6BEF\"  id=\"travel_rug\"/>                        \n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_clothes1.png\" alt=\"\u8863\u670D\"  id=\"travel_clothes1\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_clothes2.png\" alt=\"\u8863\u670D\"  id=\"travel_clothes2\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_clothes3.png\" alt=\"\u8863\u670D\"  id=\"travel_clothes3\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_camera.png\" alt=\"\u76F8\u673A\"  id=\"travel_camera\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_box.png\" alt=\"\u7BB1\u5B50\"  id=\"travel_box\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_cable.png\" alt=\"\u6570\u636E\u7EBF\"  id=\"travel_cable\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_comb.png\" alt=\"\u68B3\u5B50\"  id=\"travel_comb\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_vial.png\" alt=\"\u836F\u74F6\"  id=\"travel_vial\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_cap.png\" alt=\"\u5E3D\u5B50\"  id=\"travel_cap\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_toothbrush.png\" alt=\"\u7259\u5237\"  id=\"travel_toothbrush\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_Flugkarte.png\" alt=\"\u98DE\u673A\u7968\"  id=\"travel_Flugkarte\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_star.png\" alt=\"\u661F\u661F\"  id=\"travel_star1\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_star.png\" alt=\"\u661F\u661F\"  id=\"travel_star2\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_star.png\" alt=\"\u661F\u661F\"  id=\"travel_star3\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_star.png\" alt=\"\u661F\u661F\"  id=\"travel_star4\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_star.png\" alt=\"\u661F\u661F\"  id=\"travel_star5\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_star.png\" alt=\"\u661F\u661F\"  id=\"travel_star6\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_star.png\" alt=\"\u661F\u661F\"  id=\"travel_star7\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart4\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_heart.png\" alt=\"\u7231\u5FC3\" class=\"pregNan_Heart pregNan_Heart5\" /> \n                    </div>\n\t\t\t</div>");
                }, 1000);
                var addsix2 = $timeout(function () {
                    $(".travelSce").fadeIn(2000);
                }, 1000);

                var addsix3 = $timeout(function () {
                    $('.newLife').css('background', '#edeed8');
                    $("#travel").append("<div class=\"travelPop\" style=\"display:none;\">\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_girl.png\" alt=\"\u5973\u732A\u811A\"  id=\"travel_girl\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_girl_hand.png\" alt=\"\u5973\u732A\u811A_\u624B\" id=\"travel_girl_hand\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_child.png\" alt=\"\u5C0F\u5B69\"  id=\"travel_child\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_child_eye1.png\" alt=\"\u5C0F\u5B69\u773C\u775B\"  id=\"travel_child_eye\"/>\t\t\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_boy.png\" alt=\"\u7537\u732A\u811A\"  id=\"travel_boy\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_boy_eye.png\" alt=\"\u7537\u773C\u775B\"  id=\"travel_boy_eye1\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_boy_eye.png\" alt=\"\u7537\u773C\u775B\"  id=\"travel_boy_eye2\"/>\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/travel/travel_bottle.png\" alt=\"\u74F6\u5B50\"  id=\"travel_bottle\"/>\n\t\t\t\t\t</div>");
                }, 3000);

                var addsix4 = $timeout(function () {
                    $(".travelPop").fadeIn(2000);
                }, 3000);
                $timeout.cancel([addsix1, addsix2, addsix3, addsix4]);
            }
        }, {
            key: "rankFun7",
            value: function rankFun7() {

                $(".newLifeSce").fadeOut(3000); //过渡
                var addseven1 = $timeout(function () {
                    $('.loveHouseBox').html("<div id=\"farewell\">\n\t\t\t\t\t\t<div class=\"farewellSec\" style=\"display:none;\">\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_clelo.png\" alt=\"\u80CC\u666F1\" id=\"farewell_clelo\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" id=\"farewell_cloud1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" id=\"farewell_cloud2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_tree1.png\" alt=\"\u8349\u4E1B\" id=\"farewell_tree1\" />\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_floor.png\" alt=\"\u5730\u677F\" id=\"farewell_floor\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_house.png\" alt=\"\u80CC\u666F1\" id=\"farewell_house\"/>\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_tree2.png\" alt=\"\u8349\u4E1B\" id=\"farewell_tree2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_tree5.png\" alt=\"\u8349\u4E1B\" id=\"farewell_tree3\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_tree3.png\" alt=\"\u8349\u4E1B\" id=\"farewell_tree4\" />\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_leaf1.png\" alt=\"\u53F6\u5B50\" id=\"farewell_leaf1\" />\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_leaf1.png\" alt=\"\u53F6\u5B50\" id=\"farewell_leaf2\" />\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_leaf1.png\" alt=\"\u53F6\u5B50\" id=\"farewell_leaf3\" />\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_leaf2.png\" alt=\"\u53F6\u5B50\" id=\"farewell_leaf4\" />\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_leaf2.png\" alt=\"\u53F6\u5B50\" id=\"farewell_leaf5\" />\t\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_girl_hand.png\" alt=\"\u5B69\u5B50_\u624B\" id=\"farewell_girl_hand\" />\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_girl_body.png\" alt=\"\u5B69\u5B50_\u8EAB\u4F53\" id=\"farewell_girl_body\" />\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_girl_head.png\" alt=\"\u5B69\u5B50_\u5934\" id=\"farewell_girl_head\" />\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" id=\"farewell_Butterfly1\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" id=\"farewell_Butterfly2\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" id=\"farewell_Butterfly3\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" id=\"farewell_Butterfly4\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png \" alt=\"\u8774\u8776 \" id=\"farewell_Butterfly5\"/>\t\t\t\t\t\n\t\t\t\t</div>\n\t\t\t</div>");
                }, 1000);
                var addseven2 = $timeout(function () {
                    $(".farewellSec").fadeIn(2000);
                }, 1000);

                var addseven3 = $timeout(function () {
                    $("#farewell").append("<div class=\"farewellPop\" style=\"display:none;\">\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Ded.png\" alt=\"\u7236\u4EB2\" id=\"farewell_Ded\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Ded_hand.png\" alt=\"\u7236\u4EB2_\u624B\" id=\"farewell_Ded_hand\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Mom.png\" alt=\"\u6BCD\u4EB2\" id=\"farewell_Mom\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Mom_eye.png\" alt=\"\u6BCD\u4EB2_\u773C\u775B\" id=\"farewell_Mom_eye\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Mom_eye2.png\" alt=\"\u6BCD\u4EB2_\u773C\u775B\" id=\"farewell_Mom_eye2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Mom_eye2.png\" alt=\"\u6BCD\u4EB2_\u773C\u775B\" id=\"farewell_Mom_eye3\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Mom_tear.png\" alt=\"\u6BCD\u4EB2_\u773C\u6CEA\" id=\"farewell_Mom_tear1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/farewell/farewell_Mom_tear.png\" alt=\"\u6BCD\u4EB2_\u773C\u6CEA\" id=\"farewell_Mom_tear2\" />\t\t\t\t\t\t\t\t\n\t\t\t\t\t</div>");
                }, 3000);
                var addseven4 = $timeout(function () {
                    $(".farewellPop").fadeIn(2000);
                }, 3000);

                $timeout.cancel([addseven1, addseven2, addseven3, addseven4]);
            }
        }, {
            key: "rankFun8",
            value: function rankFun8() {

                $(".farewellSec").fadeOut(3000); //过渡
                var addeight1 = $timeout(function () {
                    $('.loveHouseBox').html("<div class=\"MeetPar\">\t\t\t\t\t\t\n                    <div class=\"MeetParSce\" style=\"display:none;\">\t\t\t\t\t\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_bg.png\" alt=\"\u80CC\u666F\" class=\"meetpar_bg\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_window.png\" alt=\"\u7A97\u6237\" class=\"meetPar_window\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_blind.png\" alt=\"\u7A97\u5E18\" class=\"meetPar_blind\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"meetPar_cloud1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" class=\"meetPar_cloud2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/newLife/loveHouse_glass.png\" alt=\"\u5149\u5708\" class=\"meetPar_glass1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/newLife/loveHouse_glass.png\" alt=\"\u5149\u5708\" class=\"meetPar_glass2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/newLife/loveHouse_glass.png\" alt=\"\u5149\u5708\" class=\"meetPar_glass3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png\" alt=\"\u8774\u8776\" class=\"meetPar_Butterfly1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png\" alt=\"\u8774\u8776\" class=\"meetPar_Butterfly2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Butterfly.png\" alt=\"\u8774\u8776\" class=\"meetPar_Butterfly3\" />\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_lamp.png\" alt=\"\u706F1\" class=\"meetPar_lamp1\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_lamp.png\" alt=\"\u706F2\" class=\"meetPar_lamp2\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_lamp.png\" alt=\"\u706F3\" class=\"meetPar_lamp3\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_book.png\" alt=\"\u4E661\" class=\"meetPar_book1\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_book.png\" alt=\"\u4E662\" class=\"meetPar_book2\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_mural1.png\" alt=\"\u58C1\u753B\" class=\"meetPar_mural1\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_mural2.png\" alt=\"\u58C1\u753B\" class=\"meetPar_mural2\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_water.png\" alt=\"\u996E\u6C34\u673A\" class=\"meetPar_water\"/>\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_floor.png\" alt=\"\u5730\u677F\" class=\"meetPar_floor\"/>\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam4\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam5\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam6\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam7\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_reek.png\" alt=\"\u84B8\u6C7D\" class=\"meetPar_steam meetPar_steam8\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_rug.png\" alt=\"\u5730\u6BEF\" class=\"meetPar_rug\"/>\t\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u7231\u5FC3\" class=\"meetPar_heart1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png\" alt=\"\u7231\u5FC3\" class=\"meetPar_heart2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u7231\u5FC3\" class=\"meetPar_heart3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_heart.png\" alt=\"\u7231\u5FC3\" class=\"meetPar_heart4\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_pinkHeart.png\" alt=\"\u7231\u5FC3\" class=\"meetPar_heart5\" />\t\t\n                     </div>\n\t\t\t</div>");
                }, 1000);

                var addeight2 = $timeout(function () {
                    $(".MeetParSce").fadeIn(2000);
                }, 1000);
                var addeight3 = $timeout(function () {
                    $(".MeetPar").append("<div class=\"MeetParPop\" style=\"display:none;\">\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_sofa1.png\" alt=\"\u6C99\u53D11\" class=\"meetPar_sofa1\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_sofa2.png\" alt=\"\u6C99\u53D12\" class=\"meetPar_sofa2\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_sofa2.png\" alt=\"\u6C99\u53D13\" class=\"meetPar_sofa3\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_table.png\" alt=\"\u684C\u5B50\" class=\"meetPar_table\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_Mom.png\" alt=\"\u5988\u5988\" class=\"meetPar_Mom\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_Mom_hand.png\" alt=\"\u5988\u5988_\u624B\" class=\"meetPar_Mom_hand\"/>\t\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_Ded.png\" alt=\"\u7238\u7238\" class=\"meetPar_Ded\"/>\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_Ded_mouth1.png\" alt=\"\u7238\u7238_\u5634\u5DF4\" class=\"meetPar_Ded_mouth\"/>\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_boy.png\" alt=\"boy\" class=\"meetPar_boy\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_boy_mouth1.png\" alt=\"boy_\u5634\u5DF4\" class=\"meetPar_boy_mouth\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_boy_blusher.png\" alt=\"boy_\u816E\u7EA2\" class=\"meetPar_boy_blusher\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_girl_body.png\" alt=\"\u5973\u4E3B_\u8EAB\u4F53\" class=\"meetPar_girl_body\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_girl_head.png\" alt=\"\u5973\u4E3B_\u5934\" class=\"meetPar_girl_head\"/>\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_boy_blusher.png\" alt=\"girl_\u816E\u7EA2\" class=\"meetPar_girl_blusher\"/>\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/meetPar/meetPar_girl_hand.png\" alt=\"\u5973\u4E3B-\u624B\" class=\"meetPar_girl_hand\"/>\t\t\t\t\t\t\n\t\t\t\t\t</div>");
                }, 3000);
                var addeight4 = $timeout(function () {
                    $(".MeetParPop").fadeIn(2000);
                }, 3000);

                $timeout.cancel([addeight1, addeight2, addeight3, addeight4]);
            }
        }, {
            key: "rankFun9",
            value: function rankFun9() {
                $scope.isok1=false;

                $scope.isok3=false;
                $scope.isok4=false;
                $scope.isok5=false;
                $scope.isok6=false;
                $scope.isok7=false;
                $scope.isok8=false;
                $scope.isok2=false;
                $scope.isok10=false;
                $scope.isok9=true;
                $(".MeetParSce").fadeOut(3000); //过渡
                var addnine1 = $timeout(function () {
                    $('.loveHouseBox').html("<div id=\"family\">\n\t\t\t\t\t<div class=\"familySce\" style=\"display:none;\">\t\t\t\t\t\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/pregNan/pregNan_bg.png\" alt=\"\u80CC\u666F1\" id=\"family_bg\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_foolr.png\" alt=\"\u5730\u677F\" id=\"family_floor\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_lamp.png\" alt=\"\u706F1\" id=\"family_lamp1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_lamp.png\" alt=\"\u706F2\" id=\"family_lamp2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_lamp.png\" alt=\"\u706F3\" id=\"family_lamp3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_bookcase.png\" alt=\"\u4E66\u67DC\" id=\"family_bookcase\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_locker.png\" alt=\"\u62BD\u5C49\" id=\"family_locker\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_byobu.png\" alt=\"\u5C4F\u98CE\" id=\"family_byobu\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_mural.png\" alt=\"\u58C1\u753B\" id=\"family_mural\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star4\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star5\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star6\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star7\" />\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star9\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_star.png\" alt=\"\u7EA2\u661F\" id=\"family_star8\" />\t\t\t\t\t\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker.png\" alt=\"\u661F\u661F\" id=\"family_flicker1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker2.png\" alt=\"\u661F\u661F\" id=\"family_flicker5\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker.png\" alt=\"\u661F\u661F\" id=\"family_flicker2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker2.png\" alt=\"\u661F\u661F\" id=\"family_flicker6\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker.png\" alt=\"\u661F\u661F\" id=\"family_flicker3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker2.png\" alt=\"\u661F\u661F\" id=\"family_flicker7\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker2.png\" alt=\"\u661F\u661F\" id=\"family_flicker4\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker.png\" alt=\"\u661F\u661F\" id=\"family_flicker8\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker.png\" alt=\"\u661F\u661F\" id=\"family_flicker9\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/family/family_flicker2.png\" alt=\"\u661F\u661F\" id=\"family_flicker10\" />\n                    </div>\n\t\t\t</div>");
                }, 1000);
                var addnine2 = $timeout(function () {
                    $(".familySce").fadeIn(2000);
                }, 1000);
                var addnine3 = $timeout(function () {
                    $("#family").append("<div class=\"familyPop\" style=\"display:none;\">\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_Ded.png\" alt=\"Ded\" id=\"family_Ded\" />\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_boy_hand1.png\" alt=\"boy\u8EAB\u4F53\" id=\"family_boy_hand1\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_boy_hand2.png\" alt=\"boy\u8EAB\u4F53\" id=\"family_boy_hand2\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_boy_body.png\" alt=\"boy\u8EAB\u4F53\" id=\"family_boy_body\" />\t\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_rug_chair.png\" alt=\"\u5730\u6BEF\" id=\"family_rug_chair\" />\t\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_girl.png\" alt=\"\u5973\u732A\u811A\" id=\"family_girl\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_girl_eye2.png\" alt=\"\u5973\u732A\u811A_\u773C\u775B\" id=\"family_girl_eye\" />\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_mouth1.png\" alt=\"\u5C0F\u5B69\u5634\u5DF4\" id=\"family_mouth\" />\t\t\t\t\n\t\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/family/family_Mom.png\" alt=\"Mom\" id=\"family_Mom\" />\n\t\t\t\t\t</div>");
                }, 3000);

                var addnine4 = $timeout(function () {
                    $(".familyPop").fadeIn(2000);
                }, 3000);
                $timeout.cancel([addnine1, addnine2, addnine3, addnine4]);
            }
        }, {
            key: "rankFun10",
            value: function rankFun10() {

                $(".familySce").fadeOut(3000); //过渡
                var addten1 = $timeout(function () {
                    $('.loveHouseBox').html("<div id='recall'>\t\n\t\t\t\t <div class=\"recallSce\" style=\"display:none;\">\t\t\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_bg4.png\" alt=\"\u80CC\u666F1\" id=\"recall_bg4\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_bg3.png\" alt=\"\u80CC\u666F2\" id=\"recall_bg3\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_bg1.png\" alt=\"\u80CC\u666F1\" id=\"recall_bg1\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_bg2.png\" alt=\"\u80CC\u666F2\" id=\"recall_bg2\"/>\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_i.png\" alt=\"ILOVEYou\" id=\"recall_i\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_o.png\" alt=\"ILOVEYou\" id=\"recall_o1\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_l.png\" alt=\"ILOVEYou\" id=\"recall_l\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_v.png\" alt=\"ILOVEYou\" id=\"recall_v\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_e.png\" alt=\"ILOVEYou\" id=\"recall_e\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_y.png\" alt=\"ILOVEYou\" id=\"recall_y\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_o.png\" alt=\"ILOVEYou\" id=\"recall_o2\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_u.png\" alt=\"ILOVEYou\" id=\"recall_u\"/>\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" id=\"recall_cloud1\" />\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_cloud.png\" alt=\"\u4E91\u6735\" id=\"recall_cloud2\" />\t\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute1.png\" alt=\"\u6C14\u7403\" id=\"recall_ballute1\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute2.png\" alt=\"\u6C14\u7403\" id=\"recall_ballute2\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute3.png\" alt=\"\u6C14\u7403\" id=\"recall_ballute3\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/loveHouse2/loveHouse_ballute4.png\" alt=\"\u6C14\u7403\" id=\"recall_ballute4\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_tree1.png\" alt=\"\u6811\" id=\"recall_tree1\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_tree2.png\" alt=\"\u6811\" id=\"recall_tree2\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_tree3.png\" alt=\"\u6811\" id=\"recall_tree3\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_tree4.png\" alt=\"\u6811\" id=\"recall_tree4\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_tree5.png\" alt=\"\u6811\" id=\"recall_tree5\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_tree6.png\" alt=\"\u6811\" id=\"recall_tree6\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_flower.png\" alt=\"\u82B1\" id=\"recall_flower\"/>\t\t\t\t\t\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star1\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star2\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star3\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star4\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star5\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star6\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star7\"/>\n\t\t\t\t\t<img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_star.png\" alt=\"\u661F\u661F\" id=\"recall_star8\"/>\n\t\t\t     </div>\n\t\t\t</div>");
                }, 1000);
                var addten2 = $timeout(function () {
                    $(".recallSce").fadeIn(2000);
                }, 1000);
                var addten3 = $timeout(function () {
                    $("#recall").append("<div class=\"recallPop\" style=\"display:none;\">\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_seat.png\" alt=\"\u6905\u5B50\" id=\"recall_seat\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_boy.png\" alt=\"\u7537\u732A\u811A\" id=\"recall_boy\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_boy_hand.png\" alt=\"\u7537\u732A\u811A_\u624B\" id=\"recall_boy_hand\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_boy_eye1.png\" alt=\"\u7537\u732A\u811A_\u773C\u775B\" id=\"recall_boy_eye\"/>\n                        \n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_girl.png\" alt=\"\u5973\u732A\u811A\" id=\"recall_girl\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_girl_hand.png\" alt=\"\u5973\u732A\u811A_\u624B\" id=\"recall_girl_hand\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_girl_eye1.png\" alt=\"\u5973\u732A\u811A_\u773C\u775B\" id=\"recall_girl_eye\"/>\n                        \n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_Ded.png\" alt=\"\u7236\u4EB2\" id=\"recall_Ded\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_Ded_head.png\" alt=\"\u7236\u4EB2_\u5934\u90E8\" id=\"recall_Ded_head\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\" class=\"recall_blusher recall_blusher1\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\" class=\"recall_blusher recall_blusher2\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_Mom.png\" alt=\"\u6BCD\u4EB2\" id=\"recall_Mom\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_Mom_flower.png\" alt=\"\u5934\u82B1\" id=\"recall_Mom_flower\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_Mom_sasa.png\" alt=\"\u5934\u82B1\" id=\"recall_Mom_sasa\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\" class=\"recall_blusher recall_blusher3\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_blusher.png\" alt=\"\u816E\u7EA2\" class=\"recall_blusher recall_blusher4\" />\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_child.png\" alt=\"\u5B69\u5B50\" id=\"recall_child\"/>\n                        <img src=\"/mobile/user-card/images/index/loveHouse/recall/recall_child_eye1.png\" alt=\"\u5B69\u5B50_\u773C\u775B\" id=\"recall_child_eye\"/>\t\n                   </div>");
                }, 3000);
                var addten4 = $timeout(function () {
                    $(".recallPop").fadeIn(2000);
                }, 3000);
                $timeout.cancel([addten1, addten2, addten3, addten4]);
            }
        }]);

        return levelFun;
    }();

    $scope.levelFunc = new levelFun();

    //先行执行一次级别函数


    $scope.level = function (count, judge) {
        if (0 <= count && count < 50) {
            if (judge) {
                $scope.rank1 += 1;
                if ($scope.rank1 <= 1) {
                    $scope.levelFunc.rankFun1();
                }
            } else {
                $scope.levelFunc.rankFun1();
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);

            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (50 <= count && count < 100) {
            if (judge) {
                $scope.rank2 += 1;
                if ($scope.rank2 <= 1) {
                    $scope.levelFunc.rankFun2(2);
                }
            } else {
                $scope.levelFunc.rankFun2(2);
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (100 <= count && count < 150) {

            if (judge) {
                $scope.rank3 += 1;
                if ($scope.rank3 <= 1) {
                    $scope.levelFunc.rankFun3(2);
                }
            } else {
                $scope.levelFunc.rankFun3(2);
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (150 <= count && count < 200) {

            if (judge) {
                $scope.rank4 += 1;
                if ($scope.rank4 <= 1) {
                    $scope.levelFunc.rankFun4(2);
                }
            } else {
                $scope.levelFunc.rankFun4(2);
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (200 <= count && count < 250) {

            if (judge) {
                $scope.rank5 += 1;
                if ($scope.rank5 <= 1) {
                    $scope.levelFunc.rankFun5(2);
                }
            } else {
                $scope.levelFunc.rankFun5(2);
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (250 <= count && count < 300) {

            if (judge) {
                $scope.rank6 += 1;
                if ($scope.rank6 <= 1) {
                    $scope.levelFunc.rankFun6(2);
                }
            } else {
                $scope.levelFunc.rankFun6(2);
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (300 <= count && count < 350) {

            if (judge) {
                $scope.rank7 += 1;
                if ($scope.rank7 <= 1) {
                    $scope.levelFunc.rankFun7(2);
                }
            } else {
                $scope.levelFunc.rankFun7(2);
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (350 <= count && count < 400) {

            if (judge) {
                $scope.rank8 += 1;
                if ($scope.rank8 <= 1) {
                    $scope.levelFunc.rankFun8(2);
                }
            } else {
                $scope.levelFunc.rankFun8(2);
            }

            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (400 <= count && count < 450) {

            if (judge) {
                $scope.rank9 += 1;
                if ($scope.rank9 <= 1) {
                    $scope.levelFunc.rankFun9(2);
                }
            } else {
                $scope.levelFunc.rankFun9(2);
            }
            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        } else if (450 <= count) {

            if (judge) {
                $scope.rank10 += 1;
                if ($scope.rank10 <= 1) {
                    $scope.levelFunc.rankFun10(2);
                }
            } else {
                $scope.levelFunc.rankFun10();
            }
            $(".green .progress .inner .water").animate({ "top": 100 - $scope.EXPNum + "%" }, 100);
            $(".green .progress .inner .water.w2").animate({ "top": 97 - $scope.EXPNum + "%" }, 100);
        }
    };

    $scope.upgrade = function (Num, judge) {
		console.log('刷新执行upgrade'+judge)
        $scope.litimgBox();
        $scope.count = $scope.count + Num;
        if (Math.round($scope.count / 5 * 100) / 100 >= 100) {
            $scope.EXPNum = 100;
            $scope.GiveXP = 0;
        } else {
            $scope.EXPNum = Math.round($scope.count / 5 * 100) / 100;
            $scope.GiveXP = 50 - Math.round($scope.count * 100) / 100 % 50;
        }
     
        $scope.level($scope.count, judge);
    };
    //级别函数


    var xitiebaPublic = function () {
        function xitiebaPublic() {
            _classCallCheck(this, xitiebaPublic);
        }

        _createClass(xitiebaPublic, [{
            key: "openGiftWindow",

            //打开礼物窗口
            value: function openGiftWindow() {
                return $scope.iSgift = true;
            }
        }, {
            key: "closeGiftWindow",

            //关闭礼物窗口
            value: function closeGiftWindow() {
                return $scope.iSgift = false;
            }
        }, {
            key: "giftGet",

            //		改变礼物样式
            value: function giftGet($index) {
                giftPlace = $index;
                var arr = $(".gift_item");
                for (var i = 0; i < arr.length; i++) {
                    var a = arr[i];
                    a.style.border = "5px solid transparent";
                };
                arr[$index].style.border = "5px solid #feacad";
                $scope.giftPrice = $($(".gift_item")[$index]).val();
            }
        }, {
            key: "appendGiftNum",

            //     添加礼物数量
            value: function appendGiftNum() {
                $scope.giftNum += 1;
            }
        }, {
            key: "subGiftNum",

            //     减少礼物数量
            value: function subGiftNum() {
                $scope.giftNum -= 1;
                if ($scope.giftNum < 1) {
                    $scope.giftNum = 1;
                }
            }
        }, {
            key: "openDec",

            //		打开礼物说明
            value: function openDec() {
                return $scope.iSgift_dec = true;
            }
        }, {
            key: "closeDec",

            //关闭礼物说明
            value: function closeDec() {
                return $scope.iSgift_dec = false;
            }
        }, {
            key: "openMsg",

            //打开消息盒子
            value: function openMsg() {
                return $scope.isMsg = true;
            }
        }, {
            key: "openIndexMsg",
            value: function openIndexMsg() {
                return $scope.isMsg = true;
            }
        }, {
            key: "colosMsg",

            //关闭消息盒子
            value: function colosMsg() {
                return $scope.isMsg = false;
            }
        }, {
            key: "sendMsg",

            //	发送弹幕
            value: function sendMsg($index) {
                if ($scope.needleLogin()) {
                    $scope.sendMsgNum++;
                    var myDate = new Date();
                    var Min = myDate.getMinutes();
                    if (Min < 10) {
                        Min = '0' + Min;
                    }
                    var NewDate = '' + myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate();
                    var NewHours = '' + myDate.getHours() + ":" + Min;
                    var randomNum = parseInt(Math.random() * 9 + 1);
                    $($('.lhMessage').children()[$index]).css({ "background-color": "#FA4F51", "color": "#fff" });

                    $scope.indexMsg.push({
                        randomNum: randomNum,
                        userName: $scope.userName,
                        userImg: $scope.userImg,
                        txt: $scope.lhMessage[$index].txt,
                        ImgSrc: $scope.lhMessage[$index].ImgSrc,
                        isemoji_img: true
                    });
                    if (!$scope.BarMsg[NewDate]) {
                        $scope.BarMsgDate.unshift(NewDate);
                        $scope.BarMsg[NewDate] = [];
                    }
                    var msg = {
                        recordTime: NewDate,
                        randomNum: randomNum,
                        userName: $scope.userName,
                        userImg: $scope.userImg,
                        txt: $scope.lhMessage[$index].txt,
                        ImgSrc: $scope.lhMessage[$index].ImgSrc,
                        recordHours: NewHours,
                        isRecord: true,
                        type: "msg",
                        isemoji_img: true,
                        userId: window.USER.id
                    };
                    $scope.BarMsg[NewDate].unshift(msg);

                    $scope.MSG.unshift({
                        recordTime: NewDate,
                        randomNum: randomNum,
                        userName: $scope.userName,
                        userImg: $scope.userImg,
                        txt: $scope.lhMessage[$index].txt,
                        ImgSrc: $scope.lhMessage[$index].ImgSrc,
                        recordHours: NewHours,
                        isRecord: true,
                        type: "msg",
                        isemoji_img: true
                    });

                    if ($scope.sendMsgNum < 4) {
                        $scope.upgrade(1, 1);
                    }
                    $.ajax({
                        url: '/mobile/user-card/msg/' + CARD.id + '/' + window.USER.id,
                        dataType: 'json',
                        type: 'POST',
                        data: {
                            txt: $scope.lhMessage[$index].txt,
                            imgSrc: $scope.lhMessage[$index].ImgSrc,
                            type: 'msg',
                            _token: TOKEN
                        },
                        success: function success(res) {
                            msg.id = res.id;
                        },
                        error: console.error
                    });
                    $scope.DANMSG = $scope.MSG.filter(function (t) {
                        return t.type === 'msg';
                    }).slice(0, 21);
                }
            }
        }, {
            key: "sendMsgHold",
            value: function sendMsgHold($index) {
                $($('.lhMessage').children()[$index]).css({ "background-color": "#FA4F51", "color": "#fff" });
            }
        }, {
            key: "sendRelease",
            value: function sendRelease($index) {
                $($('.lhMessage').children()[$index]).css({ "background-color": "#fff", "color": "#000" });
            }
        }, {
            key: "sendGift",

            //发送礼物
            value: function sendGift() {
                if ($scope.needleLogin()) {

                    var myDate = new Date();
                    var Min = myDate.getMinutes();
                    if (Min < 10) {
                        Min = '0' + Min;
                    }
                    var NewDate = '' + myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate();
                    var NewHours = '' + myDate.getHours() + ":" + Min;

                    $.ajax({
                        type: 'post',
                        url: SEND_GIFT_URL,
                        data: {
                            gift_id: GIFTS[giftPlace].gift_id,
                            sum: $scope.giftNum,
                            temp_id: CARD.id,
                            receive_user_id: CARD.user_id,
                            _token: TOKEN
                        },
                        success: function success(data) {
                            if (data.msg != 'Error') {
                                callpay(data, function () {
                                    $scope.isGift_Danmaku_box = true;
                                    if ($scope.giftArray.length > 2) {
                                        $scope.giftArray.splice(0, 1);
                                    }
                                    $scope.giftArray.push({
                                        userImg: $scope.userImg,
                                        userName: $scope.userName,
                                        ImgSrc: $scope.giftItems[giftPlace].giftImg,
                                        giftNum: $scope.giftNum
                                    });

                                    if (!$scope.BarMsg[NewDate]) {
                                        $scope.BarMsgDate.unshift(NewDate);
                                        $scope.BarMsg[NewDate] = [];
                                    }
                                    var msg = {
                                        recordTime: NewDate,
                                        userName: $scope.userName,
                                        userImg: $scope.userImg,
                                        recordHours: NewHours,
                                        ImgSrc: $scope.giftItems[giftPlace].giftImg,
                                        isRecord: true,
                                        type: "gift",
                                        giftNum: $scope.giftNum,
                                        userId: window.USER.id
                                    };
                                    $scope.BarMsg[NewDate].unshift(msg);
                                    $scope.MSG.unshift(msg);
                                    $scope.gift_Danmaku_box = true;
                                    $scope.upgrade($scope.giftItems[giftPlace].giftPrice / 10 * $scope.giftNum, 1);
                                });
                            } else {
                                layer.msg('支付失败！·');
                            }
                        }
                    });
                }
            }
        }, {
            key: "removeArray",


            //删除数据
            value: function removeArray($index, date) {
                $scope.DANMSG = $scope.MSG.filter(function (t) {
                    return t.type === 'msg';
                }).slice(0, 21);
                $scope.MSG.splice($index, 1);
                var msg = $scope.BarMsg[date].splice($index, 1)[0];
                $scope.iSdelMSGBox = false;

                $.ajax({
                    url: '/mobile/user-card/msg/' + msg.id + '/delete',
                    type: 'GET',
                    success: console.log,
                    error: console.error
                });
            }
        }, {
            key: "DanmakuCount",
            value: function DanmakuCount() {
                if ($scope.MsgArray.length > 10) {
                    $scope.MsgArray.splice(1, 1);
                }
            }
        }, {
            key: "dianzan",            //点赞
            value: function dianzan() {
                if ($scope.needleLogin()) {
                    var myDate = new Date();
                    var Min = myDate.getMinutes();
                    if (Min < 10) {
                        Min = '0' + Min;
                    }
                    var NewDate = '' + myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate();
                    var NewHours = '' + myDate.getHours() + ":" + Min;

                    $scope.dianzanNum++;
                    if ($scope.dianzanNum < 10) {
                        $scope.upgrade(1, 1);
                        $.ajax({
                            url: '/mobile/user-card/msg/' + CARD.id + '/' + window.USER.id,
                            dataType: 'json',
                            type: 'POST',
                            data: {
                                type: 'like',
                                _token: TOKEN
                            },
                            success: console.log,
                            error: console.error
                        });
                    }
                    var zanImg = Math.floor(Math.random() * 10);
                    var zanClass = Math.floor(Math.random() * 3);

                    if (!$scope.BarMsg[NewDate]) {
                        $scope.BarMsgDate.unshift(NewDate);
                        $scope.BarMsg[NewDate] = [];
                    }
                    var msg = {
                        recordTime: NewDate,
                        userName: $scope.userName,
                        userImg: $scope.userImg,
                        recordHours: NewHours,
                        isRecord: true,
                        type: "like",
                        userId: window.USER.id
                    };
                    $scope.BarMsg[NewDate].unshift(msg);
                    $scope.add_zan.push({
                        zanClass: zanClass,
                        zanImg: zanPics[zanImg]
                    });
                    $scope.MSG.push({
                        type: "like"
                    });

                    var dianzan = $timeout(function () {
                        $scope.add_zan = [];
                    }, 3000);
                    $timeout.cancel([dianzan]);
                    $scope.DANMSG = $scope.MSG.filter(function (t) {
                        return t.type === 'msg';
                    }).slice(0, 21);
                }
            }
        }, {
            key: "openInvit",
            value: function openInvit() {
                $scope.isCard = false;
            }
        }, {
            key: "closeADBox",
            value: function closeADBox() {
                $scope.iSADBox = false;
            }
        }, {
            key: "openADBox",
            value: function openADBox() {
                $scope.iSADBox = false;
                window.location
            }
        }
        ,{
            key:"openContact",
            value:function () {
                $scope.Contact=!$scope.Contact;
            }
        }]);

        return xitiebaPublic;
    }();

    $scope.xitiebaPublic = new xitiebaPublic();
}]);

PublicModule.directive("dianzan", function () {
    return {
        restrict: "E",
        template: '<img ng-repeat="add_zan in add_zan track by $index" class="zan-pics zan-pics{{::add_zan.zanClass}}" ng-src="{{::add_zan.zanImg}}">',
        replace: true
    };
});

PublicModule.directive("allMsg", function () {
    return {
        restrict: "E",
        template: "<div >\n\t\t<div class=\"Bar_box_close\" on-tap=\"xitiebaPublic.colosMsg()\" ng-show=\"isMsg\"></div>\n\t\t<div class=\"lhMessage_box\" ng-show=\"isMsg\" ng-class=\"{true :'lhMsg'}[isMsg]\" >\n\t\t\t<div class=\"DIYMsgSend\">\n\t\t\t\t<input type=\"text\" ng-model=\"MyDIYMsg\" placeholder=\"\u70B9\u51FB\u81EA\u5B9A\u4E49\u7F16\u8F91\u5185\u5BB9\" class=\"input_diyMsg\"/><span class=\"DIYMsgS\" on-tap=\"DIYMsgS()\">\n\t\t\t\t\t\u53D1\u9001\n\t\t\t\t</span>\n\t\t\t</div>\n\t\t\t<ul class=\"lhMessage scroll\">\n\t\t\t\t<li ng-repeat=\"lhMessage in lhMessage track by $index\" class=\"lhmessageLi\" on-touch=\"xitiebaPublic.sendMsgHold($index)\" on-tap=\"xitiebaPublic.sendMsg($index)\" on-release=\"xitiebaPublic.sendRelease($index)\">\n\t\t\t\t\t<span>{{::lhMessage.txt}} </span>\n\t\t\t\t\t<img ng-src=\"{{::lhMessage.ImgSrc}}\" alt=\"\u8868\u60C5\u5305\" />\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>",
        replace: true
    };
});

PublicModule.directive("giftBox", function () {
    return {
        restrict: "E",
        template: "<div>\n<div class=\"gift_BigBox\" ng-show=\"iSgift\" ng-class=\"{true :'gift_show'}[iSgift]\">\n\t<div class=\"gift_closeBox\" on-tap=\"xitiebaPublic.closeGiftWindow()\"></div>\n\t<div class=\"gift_box\" >\n\t\t<!-- S \u5934\u90E8'\u793C\u7269\u8BF4\u660E' -->\n\t\t<div class=\"gift_box_head\">\n\t\t\t<span class=\"gift_box_head_W\">?</span>\n\t\t\t<span class=\"gift_box_head_T\" on-touch=\"xitiebaPublic.openDec()\">\u793C\u7269\u8BF4\u660E</span>\n\t\t</div>\n\t\t<!-- \u5934\u90E8'\u793C\u7269\u8BF4\u660E' E -->\n\t\t<ul class=\"gift_box_cnt\">\n\t\t\t<li class=\"gift_item\" ng-value=\"{{giftItem.giftValue}}\" ng-repeat=\"(k,giftItem) in giftItems\" style=\"{{k==0?'border:5px solid #feacad':''}}\" on-tap=\"xitiebaPublic.giftGet($index)\">\n\t\t\t\t<div class=\"gift_picture\">\n\t\t\t\t\t<img ng-src=\"{{::giftItem.giftImg}}\" alt=\"\u9C9C\u82B1\" />\n\t\t\t\t</div>\n\t\t\t\t<div class=\"gift_title\">\n\t\t\t\t\t<span class=\"gift_cost\">\n\t\t\t\t\t\t{{::giftItem.giftPrice}}\n\t\t\t\t\t</span>\n\t\t\t\t\t<span class=\"gift_cost_img\">\t\t\t\n\t\t\t\t\t</span>\n\t\t\t\t</div>\n\t\t\t</li>\n\t\t</ul>\n\t\t<!-- S \u52A0/\u51CF/\u53D1\u9001 -->\n\t\t<div class=\"gift_footer\">\n\t\t\t<div class=\"gift_footer_figure\">\n\t\t\t\t<div class=\"gift_footer_minus_p\" on-tap=\"xitiebaPublic.subGiftNum()\">\n\t\t\t\t\n\t\t\t\t\t<i class=\"icon iconfont gift_footer_minus\">&#xe63b;</i>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"gift_footer_Num\">{{giftNum}}</div>\n\t\t\t\t<div class=\"gift_footer_add_P\" on-tap=\"xitiebaPublic.appendGiftNum()\">\t\t\t\t\n\t\t\t\t\t <i class=\"icon iconfont gift_footer_add\">&#xe6e7;</i>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"gift_footer_price\">{{giftPrice*giftNum}} <span class=\"gift_footer_priceSpan\"></span> </div>\n\t\t\t<div class=\"gift_footer_send\" on-tap=\"xitiebaPublic.sendGift()\">\u8D60\u9001</div>\n\t\t</div>\n\t\t<!-- \u52A0/\u51CF/\u53D1\u9001 E -->\n\t</div>\t\n</div>\n\t\t\n\t\t\n\t<!-- S \u793C\u7269\u8BF4\u660E -->\n\t<div class=\"gift_dec_all\" ng-show=\"iSgift_dec\" >\n\t\t<div class=\"gift_dec\" ng-class=\"{true :'gift_dec2'}[iSgift_dec]\">\n\t\t\t<div class=\"gift_dec_top\">\n\t\t\t\t<div class=\"gift_dec_title\">\u793C\u7269\u8BF4\u660E</div>\n\t\t\t\t<div class=\"gift_dec_word\">\n\t\t\t\t\t<p>1. 1\u5143\u4EBA\u6C11\u5E01=10\u4E2A\u91D1\u5E01\u3002</p>\n\t\t\t\t\t<p>2. \u8D60\u9001\u7684\u793C\u7269\u5C06\u4F1A\u5728\u6263\u9664\u652F\u4ED8\u624B\u7EED\u8D39\u4EE5\u540E\u5230\u8FBE\u7528\u6237\u8D26\u6237\uFF0C\u7528\u6237\u53EF\u4EE5\u63D0\u73B0\u6216\u8005\u8D2D\u4E70\u5546\u57CE\u7269\u54C1\u3002</p>\n\t\t\t\t</div>\n\n\t\t\t</div>\n\t\t\t<button on-tap=\"xitiebaPublic.closeDec();\">\u5173\u95ED</button>\n\t\t</div>\n\t</div>\n\t</div>",
        replace: true
    };
});

