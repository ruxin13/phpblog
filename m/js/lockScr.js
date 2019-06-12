var lockScrModule = angular.module('lockScrModule', ['voiceCallsModule']);
lockScrModule.controller("lockScrCtrl", ['$scope', '$state',"$filter", function($scope, $state,$filter) {
	var now1 = new Date();
//显示月份日期与星期
	var date = now1.getMonth() + "/" + now1.getDay() + "/" + now1.getYear(); //此处也可以写成 17/07/2014 一样识别    也可以写成 07-17-2014  但需要正则转换   
	var day = new Date(Date.parse(date)); //需要正则转换的则 此处为 ： var day = new Date(Date.parse(date.replace(/-/g, '/')));  
	var today = new Array('星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六');
	var week = today[day.getDay()];

	//让时间在页面显示
//	$scope.Now = now1.getHours() + ':' + now1.getMinutes();
	$scope.Now = $filter("date")(now1, "HH:mm");
	$scope.Year = now1.getMonth() + "月" + now1.getDay() + "日" + "  " + week;//显示月份日期与星期
	//写一个方法获取当前时间
	$scope.SetTimer = function() {
		//angularJs的特性，需要手动把变化映射到html元素上面
		$scope.$apply(function() {
			var now = new Date();
			//在控制台打印，可以不要
			//			console.log($scope.Now);
			$scope.Now = $filter("date")(now1, "HH:mm");
			$scope.Year = now.getMonth() + "月" + now.getDay() + "日" + "  " + week;//显示月份日期与星期
		});
	};
	//每隔1秒刷新一次时间
	$scope.SetTimerInterval = setInterval($scope.SetTimer, 1000);
	
	
	
	// S  拖拽
	var ox;
	$scope.onTouch = function($event) {
		ox = $event.target.offsetLeft;
	};
	$scope.onDrag = function($event) {

		var el, eLNum;
		if($event.target.parentElement.className == "LockScr_content disable-user-behavior") {
			el = $event.target.parentElement;
			dx = $event.gesture.deltaX;
			el.style.left = ox + dx + "px";
		} else if($event.target.parentElement.parentElement.className == "LockScr_content disable-user-behavior") {
			el = $event.target.parentElement.parentElement;
			dx = $event.gesture.deltaX;
			el.style.left = ox + dx + "px";
		}
		$scope.onRelease = function($event) {
			if(dx > 250) {

				$state.go("MyIndex"); //满足条件跳转到下一页
			} else {

				el.style.left = 0 + "px";

			}

		}

		//写一个方法获取当前时间
		$scope.SetTimer = function() {
			//angularJs的特性，需要手动把变化映射到html元素上面
			$scope.$apply(function() {
				//在控制台打印，可以不要	
				if(dx > 250) {
					clearInterval($scope.SetTimerInterval);
					$scope.show = true;
				} else {
					clearInterval($scope.SetTimerInterval);
					$scope.show = false;
				}

			});

		};
		//每隔1秒刷新一次时间
		$scope.SetTimerInterval = setInterval($scope.SetTimer, 500);

	};
	//  拖拽 E

}])