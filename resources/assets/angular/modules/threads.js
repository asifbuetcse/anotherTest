var threads = angular.module('threads', ['ui.router']);

threads.config(function($stateProvider, $urlRouterProvider, $locationProvider) {
	$urlRouterProvider.otherwise('/');

	$locationProvider.html5Mode(true);

	$stateProvider.state('threads', {
		url: '/',
		views: {
			'left@': {
				template: 'this is left from threads',
			},
			'main@': {
				template: 'this is main from threads'
			},
		},
		controller: ['$scope', function ($scope) {
            $scope.name = "World";
        }],
	});
});