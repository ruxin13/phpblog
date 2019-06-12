var KissEffectsModule = angular.module('KissEffectsModule', []);
KissEffectsModule.controller("KissEffectsCtrl", ['$scope', '$state', '$timeout', function($scope, $state, $timeout) {
	$scope.onTouch = function($event) {
		$scope.curCss = {
			"width": "14.5rem",
			"height": "10rem",
			"transition": "all 2s linear"
		};	

		//写一个方法获取当前时间
		$scope.SetTimer = function() {

			//angularJs的特性，需要手动把变化映射到html元素上面
			$scope.$apply(function() {
		
				var KissWidth= $($event.target).width();
				if(KissWidth > 225) {
					$scope.show = true;
					var ss = $timeout(function() {
						clearInterval($scope.SetTimerInterval);
						$state.go("MyIndex"); //满足条件跳转到下一页
					}, 1000);

					
				} else {
//					clearInterval($scope.SetTimerInterval);
					$timeout.cancel(ss);
					$scope.show = false;
				}

				//				if($scope.KissWidth > 230) {
				//
				//					clearInterval($scope.SetTimerInterval);
				//					$state.go("FSK"); //满足条件跳转到下一页
				//				}
				$scope.Now = $($event.target).width();

			});

		};
		//每隔1秒刷新一次时间
		$scope.SetTimerInterval = setInterval($scope.SetTimer, 100);
	}

	$scope.onRelease = function($event) {
		$scope.curCss = {
			"width": "8.7rem",
			"height": "6rem",
			"transition": "all 2s linear"
		}

	}

}])