var home = angular.module('home', ['ui.router']);

home.config(function($stateProvider, $urlRouterProvider, $locationProvider) {
	$urlRouterProvider.otherwise('/');

	$locationProvider.html5Mode(true);

	$stateProvider.state('home', {
		url: '/',
		views: {
			'left@': {
				template: 'this is left from home',
			},
			'main@': {
				template: 'this is main from home'
			},
		},
		controller: ['$scope', function ($scope) {
            $scope.name = "World";
        }],
	});
});