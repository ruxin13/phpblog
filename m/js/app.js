angular.module('Myapp', ['ionic', 'ui.router','PublicModule', 'MyIndexModule','FSKModule', 'KissEffectsModule', 'lockScrModule', 'voiceCallsModule', 'fingerPrintModule', 'excMapModule', 'loveHouseModule','scrubModule'])

	.run(function($ionicPlatform) {
		$ionicPlatform.ready(function() {
            // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
            // for form inputs)
            if (window.cordova && window.cordova.plugins.Keyboard) {
                console.log("|||++|+");
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
            }
            if (window.StatusBar) {
                StatusBar.styleDefault();
            }
        })
	})
	  .filter('changeHTML', ['$sce', function($sce){
        return function(text) {
            return $sce.trustAsHtml(text);
        };
    }])
	.config(function($stateProvider, $urlRouterProvider) {
		$stateProvider
			.state("MyIndex", {
				url: "/MyIndex",
				templateUrl: "/mobile/user-card/MyIndex.html",
				controller: "MyIndexCtrl" //控制器名字
			}) //主页路由
			.state("KissEffects", {
				url: "/KissEffects",
				templateUrl: "/mobile/user-card/KissEffects.html",
				controller: "KissEffectsCtrl" //控制器名字
			}) //亲吻特效路由
			.state("FSK", {
				url: "/FSK",
				templateUrl: "/mobile/user-card/FSK.html",
				controller: "FSKCtrl" //控制器名字
			}) //来电显示路由
			.state("lockScr", {
				url: "/lockScr",
				templateUrl: "/mobile/user-card/lockScr.html",
				controller: "lockScrCtrl" //控制器名字
			}) //锁屏通知路由
			.state("voiceCalls", {
				url: "/voiceCalls",
				templateUrl: "/mobile/user-card/voiceCalls.html",
				controller: "voiceCallsCtrl" //控制器名字
			}) //语音通话路由
			.state("fingerPrint", {
				url: "/fingerPrint",
				templateUrl: "/mobile/user-card/fingerPrint.html",
				controller: "fingerPrintCtrl" //控制器名字
			}) //指纹扫描路由
			.state("excMap", {
				url: "/excMap",
				templateUrl: "/mobile/user-card/excMap.html",
				controller: "excMapCtrl" //控制器名字
			}) //指纹扫描路由
			.state("loveHouse", {
				url: "/loveHouse",

				templateUrl: "/mobile/user-card/loveHouse.html",
				controller: "loveHouseCtrl" //控制器名字
			}) //指纹扫描路由
			.state("scrub", {
				url: "/scrub",				
				templateUrl: "/mobile/user-card/scrub.html",
				controller: "scrubCtrl" //控制器名字
			}) //指纹扫描路由
		$urlRouterProvider.otherwise('/'+window.ROUTE);
		
	})
	
