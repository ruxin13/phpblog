var FSKModule = angular.module('FSKModule', []);
FSKModule.controller("FSKCtrl",['$scope', function($scope) {
	$scope.wedding=[{
	bride:"张三疯",
	Groom:"李四",
	greeting:"两情相悦的最高境界是相对两无厌，祝福一对新人真心相爱，相约永久恭贺新婚之禧！"
	}
	];}])
	
	
////	console.log("in  carManage");
////	$scope.bride= "张三111";
////	$scope.Groom="李四";
////	$scope.greeting="两情相悦的最高境界是相对两无厌，祝福一对新人真心相爱，相约永久恭贺新婚之禧！";	
//}])



//define(['app'], function(app) {
//	app.register
//		.controller('FSKCtrl', function($scope) {
//			$scope.wedding = [{
//			bride: "张三111",
//			Groom: "李四",
//			greeting: "两情相悦的最高境界是相对两无厌，祝福一对新人真心相爱，相约永久恭贺新婚之禧！"
//		}];
//		})
//})