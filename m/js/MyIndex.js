"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

angular.module('MyIndexModule', ['ionic']).controller("MyIndexCtrl", ['$scope', '$state', '$timeout', function ($scope, $state, $ionicPopup, $timeout) {
    var hb_money = 1; //红包金额
    $scope.userName = USER.nickname || USER.phone; //当前用户的名字
    $scope.userImg = USER.head_img; //当前用户的头像
    //谁发的红包
    $scope.packet = PACKET;
    $scope.hasQuestion = !!(PACKET && PACKET.question);
    $scope.isActive = true;
    $scope.hbBG = "images/index/popup/hb-1.png";

    $scope.popupName = CARD.groomName;
    $scope.PopNum = 1;
    $scope.iSseating = false; //赴宴弹窗
    $scope.iSseatingPopup = false; //弹窗
    $scope.Isfeast = true; //赴宴/有事
    $scope.iSseat = false; //座次查询弹窗
    $scope.SeatBox = false;
    $scope.iSrama = false; //桌号查询
    $scope.ramadhinName = $scope.popupName;
    $scope.seat = ""; //座次信息
    $scope.iSmusic = true; //音乐图标

    $scope.player = player;
    $scope.SONG = SONG;
    $scope.PACKET = PACKET;
    $scope.hbBG = false;
    $scope.openH = true;

    if (hb_money == '' || hb_money == undefined) {
        console.log(hb_money);
        $scope.showHb = false;
    } else {
        $scope.showHb = true;
    }
    $scope.SetTimer = function () {
        $scope.$apply(function () {
            for (var i = 0; i < $('.Bar_box_TXT').length; i++) {
                if ($($(".Bar_box_TXT")[i]).offset().top / $(window).height() < 0.77) {
                    $($(".Bar_box_TXT")[i]).addClass("Bar_box_TXT1");
                } else {
                    $($(".Bar_box_TXT")[i]).removeClass("Bar_box_TXT1");
                }
            }
        });
    };
    //每隔1秒刷新一次时间
    $scope.SetTimerInterval = setInterval($scope.SetTimer, 100);

    $scope.DIYMsgS = function () {

        if ($scope.needleLogin()) {
            $scope.onerrorHeadImg = '/mobile/user-card/images/index/headImg/headImg' + parseInt(Math.random() * 4 + 1) + '.jpg'; //出错时用户头像
            $scope.sendMsgNum++;
            var myDate = new Date();
            var NewDate = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate();
            var NewHours = myDate.getHours() + ":" + myDate.getMinutes();
            $scope.randomNum = parseInt(Math.random() * 13 + 1);
            if ($scope.MyDIYMsg) {
                $scope.indexMsg.push({
                    userName: $scope.userName,
                    randomNum: $scope.randomNum,
                    userImg: $scope.userImg,
                    txt: $scope.MyDIYMsg,
                    ImgSrc: '',
                    type: 'msg',
                    isemoji_img: false
                });

                if (!$scope.BarMsg[NewDate]) {
                    $scope.BarMsgDate.unshift(NewDate);
                    $scope.BarMsg[NewDate] = [];
                }
                var msg = {
                    recordTime: NewDate,
                    randomNum: $scope.randomNum,
                    userName: $scope.userName,
                    userImg: $scope.userImg,
                    txt: $scope.MyDIYMsg,
                    ImgSrc: '',
                    recordHours: NewHours,
                    isRecord: true,
                    type: "msg",
                    isemoji_img: false,
                    userId: USER.id
                };
                $scope.BarMsg[NewDate].unshift(msg);
                $scope.MSG.unshift(msg);

                $scope.isDanmaku = true;
                $('.input_diyMsg').val("");
            }
            if ($scope.sendMsgNum < 4) {
                $scope.upgrade(1, 1);
            }
            $.ajax({
                url: '/mobile/user-card/msg/' + CARD.id + '/' + USER.id,
                dataType: 'json',
                type: 'POST',
                data: {
                    txt: $scope.MyDIYMsg,
                    imgSrc: '',
                    type: 'msg',
                    _token: TOKEN
                },
                success: console.log,
                error: console.error
            });
        }
    };

    var index = function () {
        function index() {
            _classCallCheck(this, index);
        }

        _createClass(index, [{
            key: 'removeMusic',
            value: function removeMusic() {
                if (player.paused) {
                    player.play();
                } else {
                    player.pause();
                }
            }

            //谁跟谁的婚礼？

        }, {
            key: 'skip',
            value: function skip() {
                $state.go('loveHouse');
                $scope.upgrade(0, 0);
                $scope.LHSkip=false;
          
                // $(".iTooltipMes").remove();

            }

            //点击开启红包判读输入的答案是否正确。

        }, {
            key: 'openMoney',
            value: function openMoney() {
                $('.open_btn').addClass("open_btn1");
                if ($scope.hasQuestion && !this.hb_pw) {
                    $scope.hb_tips = '请输入答案';
                    $('.open_btn').removeClass("open_btn1");
                } else if ($scope.isActive) {
                    $scope.hb_tips = '';
                    $scope.isActive = false;
                    $scope.hbPw = PACKET.question;
                    $.ajax({
                        url: "/gifts/receiveRedPacket/" + PACKET.id,
                        method: 'POST',
                        data: { answer: $scope.hasQuestion ? this.hb_pw : '' },
                        dataType: 'json',
                        success: function success(res) {
                            if (res.code == 'success') {
                                $scope.hbPw = res.money;
                                $scope.hbBG = true;
                                $scope.openH = false;
                            }
                            if (res.msg == '答案错误') {
                                $scope.isActive = true;
                                $scope.hbPw = PACKET.question;
                                $scope.hbBG = false;
                            }
                            $scope.hb_tips = res.msg; //判断答案后的处理
                            $('.open_btn').removeClass("open_btn1");
                        }
                    });
                }
            }
        }, {
            key: 'onTopHB',
            value: function onTopHB() {
                if ($scope.needleLogin()) {
                    if (!$scope.hbBG) {
                        $scope.hb_tips = '';
                        $('.hb1_pw').val('');
                        $scope.hbPw = PACKET.question;
                    }
                    if ($scope.isActive && PACKET.question) $scope.hbPw = PACKET.question; //问题
                    $scope.openHb = true;
                }
            }
        }, {
            key: 'closeHB',
            //打开


            value: function closeHB() {
                $('.open_btn').removeClass("open_btn1");
                $scope.openHb = false;
            }
        }, {
            key: 'openSeating',
            //关闭红包


            //座位登记
            value: function openSeating() {
                $scope.iSseating = true;
            }
        }, {
            key: 'TopFeast1',
            //打开赴宴
            value: function TopFeast1() {
                $scope.Isfeast = true;
            }
        }, {
            key: 'TopFeast2',
            value: function TopFeast2() {
                $scope.Isfeast = false;
            }
        }, {
            key: 'seatingPopup',
            value: function seatingPopup() {
                if ($('#referName').val() == '') {
                    $('#referName').attr('placeholder', '姓名不能为空');
                } else {
                    $.ajax({
                        url: '/mobile/user-card/' + CARD.id + '/join/',
                        type: 'GET',
                        data: {
                            name: $('#referName').val(),
                            number_of: $scope.PopNum,
                            status: $scope.Isfeast ? 1 : 0,
                            _token: TOKEN
                        },
                        success: function success(res) {
                            $scope.iSseatingPopup = true;
                            $('#referName').attr('placeholder', '请输入您的姓名');
                        },
                        fail: console.error
                    });
                }
            }
        }, {
            key: 'closeSeating',
            //确认框
            value: function closeSeating() {
                $scope.iSseating = false;
                $scope.iSseatingPopup = false;
                $('#referName').val('');
            }
        }, {
            key: 'subreferNum',
            //打开赴宴

            value: function subreferNum() {
                if ($scope.PopNum <= 1) {
                    $scope.PopNum = 1;
                } else {
                    $scope.PopNum -= 1;
                }
            }
        }, {
            key: 'addreferNum',
            value: function addreferNum() {
                console.log($scope.PopNum);
                $scope.PopNum += 1;
            }

            //座次查询

        }, {
            key: 'openSeat',
            value: function openSeat() {
                $scope.iSseat = true;
                $scope.SeatBox = true;
            } //打开桌号查询

        }, {
            key: 'closeSeat',
            value: function closeSeat() {
                $scope.iSseat = false;
                $scope.SeatBox = false;
            } //关闭桌号查询

            //桌号

        }, {
            key: 'openRama',
            value: function openRama() {
                var name = $('#queryName').val();
                if (name == '') {
                    $('#queryName').attr('placeholder', '查询姓名不能为空');
                } else {
                    $.ajax({
                        url: '/member/SearchGuests',
                        dataType: 'json',
                        type: 'POST',
                        data: { key: name, template_id: CARD.id, _token: TOKEN },
                        success: function success(res) {
                            if (res.key.length > 0) {
                                var desk = res.key[0].detail[0];
                                $scope.iSrama = true;
                                $scope.iSseat = false;
                                $scope.ramadhinName = $('#queryName').val();
                                $scope.seat = res.key.reduce(function (p, t) {
                                    return p + '<br />"' + t.guestName + '"\u7684\u5EA7\u4F4D\u5728' + t.detail[0].desk + '\u53F7\u684C-' + t.detail[0].deskName + '\u684C';
                                }, res.msg);
                            } else {
                                $scope.iSrama = true;
                                $scope.iSseat = false;
                                $scope.ramadhinName = $('#queryName').val();
                                $scope.seat = "暂时没有您的座次信息";
                            }
                        },
                        fail: function fail() {
                            $scope.iSrama = true;
                            $scope.iSseat = false;
                            $scope.ramadhinName = $('#queryName').val();
                            $scope.seat = "暂时没有您的座次信息";
                        }
                    });
                }
            }
        }, {
            key: 'closeRama',
            value: function closeRama() {
                $scope.SeatBox = false;
                $scope.iSrama = false;
            }
        }]);
        return index;
    }();

    $scope.index = new index();
    $('body').trigger('card.rerender');
    CARD.autoPlay && player.play();
}]);

