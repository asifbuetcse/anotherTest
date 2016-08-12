var threads = angular.module('threads', ['ui.router']);

threads.config(function($stateProvider, $urlRouterProvider, $locationProvider) {
	$urlRouterProvider.otherwise('/');

	$locationProvider.html5Mode(true);

	$stateProvider.state('threads', {
		url: '/threads',
		views: {
			'left@': {
				template: 'this is left from threads',
			},
			'main@': {
				template: 'this is main from threads'
			},
			'right@': {
				template: 'this is right from threads'
			}
		},
		controller: ['$scope', function ($scope) {
            
        }],
	});
});