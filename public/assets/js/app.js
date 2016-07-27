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

// Angular
var app = angular.module("app", [], function($interpolateProvider){
	$interpolateProvider.startSymbol('{%');
	$interpolateProvider.endSymbol('%}');
})