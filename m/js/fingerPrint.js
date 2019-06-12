var fingerPrintModule = angular.module('fingerPrintModule', ['ionic', 'FSKModule'])
fingerPrintModule.run(function($ionicPlatform) {
	$ionicPlatform.ready(function() {
		// Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
		// for form inputs)
		if(window.cordova && window.cordova.plugins.Keyboard) {
			cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
		}
		if(window.StatusBar) {
			StatusBar.styleDefault();
		}
	});
})
fingerPrintModule.controller("fingerPrintCtrl", ['$scope', '$state', '$timeout', function($scope, $state, $timeout) {
	// S  拖拽		
	var ox, oy;
	$scope.onTouch = function($event) {
		$scope.fingerCss = {
			'margin-top': '-450px',
			'opacity': '0.9',
			"transition": "all 2s linear"
		}

		//写一个方法获取当前时间
		$scope.SetTimer = function() {
			//angularJs的特性，需要手动把变化映射到html元素上面
			$scope.$apply(function() {
				//                  var now=new Date();
				//在控制台打印，可以不要
				$scope.FingWidth = $event.target.childNodes[3].offsetTop;
				if($scope.FingWidth <= 10) {
					var ss = $timeout(function() {						
						$state.go("MyIndex"); //满足条件跳转到下一页
					}, 1000);
					$scope.show = true;

				} else {
					$scope.show = false;
					$timeout.cancel(ss);
				}
				
			});
		};
		//每隔1秒刷新一次时间
		$scope.SetTimerInterval = setInterval($scope.SetTimer, 100);
	};
	//松开后，如果没有达到条件 ，则还原
	$scope.onRelease = function() {
		$scope.fingerCss = {
			'margin-top': '0px',
			'opacity': '0.1',
			"transition": "all 1s linear"
		}
	}

}])
