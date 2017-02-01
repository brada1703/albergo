var app = angular.module('myApp', ['ngCookies', 'pascalprecht.translate']);
    app.config(['$translateProvider', function ($translateProvider) {
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
    app.controller('Ctrl', ['$translate', '$scope', function($translate, $scope){
        $scope.changeLanguage = function (langKey) {
            $translate.use(langKey);
        };
    }]);