/**
 * This files contains angular js app
 */

let app = angular.module('FormApp', ['ngRoute', 'ngAnimate']);

app.config(function($routeProvider) {
    $routeProvider
        .when("/statwithincome", {
            templateUrl: "../angular routes/form1.php"
        })
        .when("/statwithnights", {
            templateUrl: "../angular routes/form2.php"
        })
        .otherwise({ "redirectTo": "/statwithincome" });
});

app.controller('appController', function appController($scope, $location) {
    $scope.getClass = function(path) {
        // set active link
        return ($location.path().substr(0, path.length) === path) ? 'active' : '';
    }
});