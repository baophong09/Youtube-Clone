// uniform init
var Uniform = function() {
	var handleInit = function() {
		$("input:checkbox, input:radio, input:file").uniform();
	};

	return {
		init: function() {
			handleInit();
		}
	};
}();

Uniform.init();

$(document).ready(function() {
	$('.loader-inner').loaders();
});

$(document).on('click', '.clone-video-btn', function(){
	var btn = $(this);
	$('.screen-loading').removeClass('hidden');
});

// Angular
var app = angular.module("app", [], function($interpolateProvider){
	$interpolateProvider.startSymbol('{%');
	$interpolateProvider.endSymbol('%}');
});

app.controller('CloneController', ['$scope', '$http', function($scope,$http) {

	$scope.changeAuth = function() {
		$scope.channelID = $scope.youtubeChannel;

		$http({
			'method' : 'GET',
			'url'	 : '/googleauth/'+($scope.channelID)
		}).then(function success(response) {
			var data = response.data;

			if(data.redirect === true) {
				window.location.assign(data.authUrl);
			}

		}, function error(response) {

		});
	}

}]);