var excMapModule = angular.module('excMapModule', []);
excMapModule.controller("excMapCtrl", ['$scope','$sce', function($scope,$sce) {
	 $scope.screenW=$(document.body).width()*1.2;
	if((CARD.bridePhone&&CARD.brideName)||(CARD.groomPhone&&CARD.groomName)){
        $scope.screenH=$(document.body).height()*0.8;
        $scope.MapBox=true;
	}else{
		$scope.MapBox=false;
		$('.excMapiF').css('height','100%');
        $scope.screenH=$(document.body).height();
	}
    $scope.weddingLocation="https://api.map.baidu.com/staticimage/v2?ak=ll6QejlPyspx35VS4B1ZTlPPZztIvoGC&width="+$scope.screenW+"&height="+$scope.screenH+"&markers="+CARD.address.point.lng+","+CARD.address.point.lat+"&center="+CARD.address.point.lng+","+CARD.address.point.lat+"";
	$scope.jumpBaiDu=function () {
		window.location="https://api.map.baidu.com/marker?location="+CARD.address.point.lat + ',' + CARD.address.point.lng+"&title=位置信息&content="+(CARD.address.text || '宴会地址')+"&output=html";
	}
    $scope.GoToIndex=function () {
        window.history.go(-1);
    }

}])

//"https://map.baidu.com/mobile/webapp/place/marker/qt=inf&vt=map&act=read_share&code=75/third_party=uri_api&point="+CARD.address.point.lat + ',' + CARD.address.point.lng+"&title=位置信息&content="+(CARD.address.text || '宴会地址')
//"https://api.map.baidu.com/marker?location="+CARD.address.point.lat + ',' + CARD.address.point.lng+"&title=位置信息&content="+(CARD.address.text || '宴会地址')+"&output=html"
// https://api.map.baidu.com/marker?s=1&location=30.620322,104.104972&title=%E4%BD%8D%E7%BD%AE%E4%BF%A1%E6%81%AF&content=diy%E9%A5%B0%E5%93%81&output=html&coord_type=bd09