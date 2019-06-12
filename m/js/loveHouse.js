var loveHouseModule = angular.module('loveHouseModule', []);
loveHouseModule.controller("loveHouseCtrl", ['$scope', '$state','$interval', function($scope,$state, $interval) {
	var pregNum = 0;	
	var MarryNum = 0;	
	var recallNum = 0;
	var travelNum = 0;



     $(document).ready(function() {
        $scope.upgrade(0,0);
        var loveHeightH = $(document.body).width() / (414 / 403) - 10;
        var loveHeightF = $(document.body).height() - $(document.body).width() / (414 / 403);
        $('.loveHouseHeader').css({
            'width': $(document.body).width() + "px",
            'height': loveHeightH + 'px'
        });
        $('.loveHouseFooter').css({
            'height': loveHeightF + "px",
            'top': loveHeightH + "px"
        });



         $scope.litimgBox();



    });
    $scope.userName = USER.nickname || USER.phone; //当前用户的名字
    $scope.userImg = USER.head_img; //当前用户的头像

	//		打开以及关闭爱情小屋说明弹窗
	$scope.openLhExp = function(){
		$scope.islh_dec = true;
	}

    if(CARD.brideName||CARD.groomName){
        $scope.wedOfName=CARD.groomName+'与'+CARD.brideName+"的"
    }else if(CARD.brideName||CARD.groomName){
        $scope.wedOfName = CARD.groomName+CARD.brideName+"的"; //谁的请柬
    }else{
        $scope.wedOfName='返回';
    }

	$scope.islh_dec = false;
	$scope.closeLhExp = function() {
		$scope.islh_dec = false;
	}
	$scope.retuenIndex=function () {
       $state.go("MyIndex");
        $scope.iSADBox=false;
    }




    $scope.DIYMsgS=function() {
        if($scope.needleLogin()){
            $scope.onerrorHeadImg='/mobile/user-card/images/index/headImg/headImg'+parseInt(Math.random() * 4 + 1)+'.jpg';//出错时用户头像
            $scope.sendMsgNum++;
            var myDate = new Date();
            var NewDate = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate();
            var NewHours = myDate.getHours() + ":" + myDate.getMinutes();
            $scope.randomNum = parseInt(Math.random() * 13 + 1);
            if($scope.MyDIYMsg) {
                $scope.indexMsg.push({
                    userName: $scope.userName,
                    randomNum: $scope.randomNum,
                    userImg: $scope.userImg,
                    txt:  $scope.MyDIYMsg,
                    ImgSrc: '',
                    type:'msg',
                    isemoji_img: false
                });


                if(!$scope.BarMsg[NewDate]) {
                    $scope.BarMsgDate.unshift(NewDate);
                    $scope.BarMsg[NewDate] =[];
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
                    type:"msg",
                    isemoji_img: false,
                    userId: USER.id
                };
                $scope.BarMsg[NewDate].unshift(msg);
                $scope.MSG.unshift(msg)


                $scope.isDanmaku = true;
                $('.input_diyMsg').val("");
            }
            if($scope.sendMsgNum < 4) {
                $scope.upgrade(1,1);
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
            })
        }


    };

	
	// S 男猪脚与女猪脚动画
	var pregNan = $interval(function() {
		if(pregNum % 2 == 0) {
		$(".loveHouse_girlEye1").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_girlEye.png");
			$(".loveHouse_girlEye2").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_girlEye.png");
			$(".loveHouse_girlEye1").css("width", "3.5%");
			$(".loveHouse_girlEye2").css("width", "3.5%");
			$(".loveHouse_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_mouth1.png")
			$(".loveHouse_mouth").css({
				"width": "2%",
				"left": "53%"
			});

			//怀孕场景男猪脚	
			$(".pregNan_boy_eye").attr("src", "/mobile/user-card/images/index/loveHouse/pregNan/pregNan_boy_eye.png");
			$(".pregNan_boy_eye").css({
				"width": '4%',
				'top': '78%'
			});
			$(".pregNan_girl_eye").attr("src", "/mobile/user-card/images/index/loveHouse/pregNan/pregNan_girl_eye.png");
			$(".pregNan_girl_eye").css("width", '17%');

			$(".newLife_gril_eye").attr("src", "/mobile/user-card/images/index/loveHouse/newLife/newLife_gril_eye1.png");
			$(".newLife_gril_eye").css('top', '55%');
			$(".meetPar_Ded_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/meetPar/meetPar_Ded_mouth1.png");
			$(".meetPar_boy_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/meetPar/meetPar_boy_mouth2.png");
			

			pregNum++;
		} else {
			$(".loveHouse_girlEye1").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_girlEye1.png")
			$(".loveHouse_girlEye2").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_girlEye2.png")
			$(".loveHouse_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_mouth2.png")
			$(".loveHouse_girlEye1").css("width", "4.5%");
			$(".loveHouse_girlEye2").css("width", "4.5%");
			$(".loveHouse_mouth").css({
				"width": "2.5%",
				"left": "53%"
			})
			$(".loveHouse_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_mouth1.png")
			
			
			//怀孕场景男猪脚	
			$(".pregNan_boy_eye").attr("src", "/mobile/user-card/images/index/loveHouse/pregNan/pregNan_boy_eye2.png");
			$(".pregNan_boy_eye").css({
				"width": "3%",
				"top": "79%"
			});
			$(".pregNan_girl_eye").attr("src", "/mobile/user-card/images/index/loveHouse/pregNan/pregNan_girl_eye2.png");
			$(".pregNan_girl_eye").css("width", '16%');
			
		$(".newLife_gril_eye").attr("src", "/mobile/user-card/images/index/loveHouse/newLife/newLife_gril_eye2.png");
			$(".newLife_gril_eye").css('top', '55.5%');
			$(".meetPar_Ded_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/meetPar/meetPar_Ded_mouth2.png");
			$(".meetPar_boy_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/meetPar/meetPar_boy_mouth1.png");
			
			pregNum++;

		}
	}, 1500);

	var MarryScene = $interval(function() {
		if(MarryNum % 2 == 0) {
			$(".MarryScene_speak1").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak2.png");
			$(".MarryScene_speak2").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak2.png");
			$(".MarryScene_speak3").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak4.png");
			//男配角动画
			$(".MarryScene_Boy_eye1").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Boy_eye1.png");
			$(".MarryScene_Boy_eye2").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Boy_eye1.png");

			$(".MarryScene_speak6").css('width', '2%');
			//女配角动画
			$(".MarryScene_girl_eye1").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_girl_eye1.png");
			$(".MarryScene_girl_eye2").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_girl_eye1.png");
			MarryNum++;
		} else {
			$(".MarryScene_speak1").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak1.png");
			$(".MarryScene_speak2").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak1.png");
			$(".MarryScene_speak3").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_speak3.png");
			//男配角动画
			$(".MarryScene_Boy_eye1").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Boy_eye2.png");
			$(".MarryScene_Boy_eye2").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_Boy_eye2.png");

			//女配角动画
			$(".MarryScene_girl_eye1").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_girl_eye2.png");
			$(".MarryScene_girl_eye2").attr("src", "/mobile/user-card/images/index/loveHouse/MarryScene/MarryScene_girl_eye3.png");
			MarryNum++;
		}
	}, 500)

	var recall = $interval(function() {
		if(recallNum % 2 == 0) {
			$("#recall_girl_eye").css("top", "38.5%");
			$("#recall_girl_eye").attr("src", "/mobile/user-card/images/index/loveHouse/recall/recall_girl_eye2.png");
			$("#recall_boy_eye").attr("src", "/mobile/user-card/images/index/loveHouse/recall/recall_boy_eye2.png");
			$("#recall_child_eye").attr("src", "/mobile/user-card/images/index/loveHouse/recall/recall_child_eye2.png");
			$("#family_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/family/family_mouth1.png");

			$(".loveHouse_boyEye").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_boyEye.png")
			recallNum++;
		} else {
			$("#recall_girl_eye").css("top", "37%");
			$("#recall_girl_eye").attr("src", "/mobile/user-card/images/index/loveHouse/recall/recall_girl_eye1.png");
			$("#recall_boy_eye").attr("src", "/mobile/user-card/images/index/loveHouse/recall/recall_boy_eye1.png");
			$("#recall_child_eye").attr("src", "/mobile/user-card/images/index/loveHouse/recall/recall_child_eye1.png");
			$("#family_mouth").attr("src", "/mobile/user-card/images/index/loveHouse/family/family_mouth2.png");
			
			$(".loveHouse_boyEye").attr("src", "/mobile/user-card/images/index/loveHouse/loveHouse1/loveHouse_boyEye2.png")
			recallNum++;
		}
	}, 2000);
	
	var travel = $interval(function() {
		if(travelNum % 2 == 0) {
			$("#travel_child_eye").attr("src", "/mobile/user-card/images/index/loveHouse/travel/travel_child_eye1.png");
			$("#family_girl_eye").attr("src", "/mobile/user-card/images/index/loveHouse/family/family_girl_eye1.png");
			travelNum++;

		} else {
			$("#travel_child_eye").attr("src", "/mobile/user-card/images/index/loveHouse/travel/travel_child_eye2.png");
			$("#family_girl_eye").attr("src", "/mobile/user-card/images/index/loveHouse/family/family_girl_eye2.png");

			travelNum++;

		}
	}, 1000);


	$scope.$on('$destroy', function() {
		$interval.cancel(pregNan);
		$interval.cancel(MarryScene);		
		$interval.cancel(recall);
		$interval.cancel(travel);
	})
	// 男猪脚与女猪脚动画 E 

}])