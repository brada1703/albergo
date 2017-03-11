var myApp = angular.module('myApp', ['ngCookies', 'pascalprecht.translate', 'ngSanitize']);
    myApp.config(['$translateProvider', function ($translateProvider) {
        $translateProvider
            .preferredLanguage('en')
            .useStaticFilesLoader({
                prefix: 'http://www.albergodiieri.com/data/',
                suffix: '.json'
            })
            .forceAsyncReload(true)
            .useSanitizeValueStrategy(null)
            .useLocalStorage();
    }]);
    myApp.controller('Ctrl', ['$translate', '$scope', function($translate, $scope){
            $scope.changeLanguage = function (langKey) {
                $translate.use(langKey);
            };
    }]);
   myApp.controller( 'contactController', ['$scope', '$http', function ($scope, $http) {
            $scope.formData = {};
    $scope.processForm = function() {
        $http({
            method  : 'POST',
            url     : 'sendemail.php',
            data    : $.param($scope.formData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
            .success(function(data) {
                console.log(data);

                if (!data.success) {
                    // if not successful, bind errors to error variables
                    $scope.errorName = data.errors.name;
                    $scope.errorSuperhero = data.errors.superheroAlias;
                } else {
                    // if successful, bind success message to message
                    $scope.message = data.message;
                                $scope.errorName = '';
                    $scope.errorSuperhero = '';
                }
            });
    };
    }]);