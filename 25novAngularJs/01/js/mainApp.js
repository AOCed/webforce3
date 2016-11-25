'use strict';

/* Déclaration du module angular qui fait référence à la propriété
"np-app" de la vue. */

var testApplication = angular.module('test', []);

testApplication.controller('testCtrl', ['$scope', 
	function($scope){
		$scope.titre = "(------)";
		$scope.changeTitre = false;
		$scope.listeTitre = [
			"Mon site qui déchire mon mec!!!",
			"YAHOOOOOO !! Ca marche !!",
			"C'est normal au Japon",
			"Jeux de merde !!!"
		];

		$scope.formtableau= [];

		$scope.modifTitre = function(index){
			$scope.titre = $scope.listeTitre[index];
			if (index === 2){
				$scope.changeTitre = !$scope.changeTitre;
			} else {
				$scope.changeTitre = false;
			}
		}

		$scope.testTwoWay = function($event){
			$event.preventDefault();
			$scope.formtableau.push({name : $scope.formdata});
		}
			
	}
])
