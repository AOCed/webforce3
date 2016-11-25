'use strict';

var playerApplication = angular.module('playerApp', []);

playerApplication.controller('loginController', ['$scope', '$http', 
	function($scope, $http){
		/* Déclaration du formulaire au niveau du scope et
		récupération de celu-ci dans une variable */
		var formulaire = $scope.formulaire;

		$scope.access = false;

		$scope.loginData;
		$http.get('phpRessource/users.php').success(function(data){
			$scope.loginData = data;
		});

		$scope.connect = function(){
			if ($scope.login === $scope.loginData[0].log && $scope.password === $scope.loginData[0].pass){
				$scope.access = !$scope.access;
			}
		}
	}













]);

playerApplication.controller('listeController', ['$scope',
	function($scopee){

}])