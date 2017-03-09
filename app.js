var myApp = angular.module('myApp', ['ngRoute', 'ngAnimate', 'ui.bootstrap', 'ngCookies', 'pascalprecht.translate', 'ngSanitize']);
    myApp.config(['$routeProvider', function($routeProvider) {
        $routeProvider
        .when('/', {
            templateUrl : 'main.html',
            controller: 'mainController'
        })
        .when('/gallery', {
            templateUrl : 'gallery.html',
            controller : 'galleryController'
        })
        .when('/contact', {
            templateUrl : 'contact.html',
            controller : 'contactController'
        })
        .otherwise({
            redirectTo: '/'
        });
    }]);
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
    }])
    myApp.controller( 'mainController', ['$scope', '$log', '$location', '$anchorScroll', function ($scope, $log, $location, $anchorScroll) {
        $scope.name = 'Main';
        $scope.maincarousel = function() {
            $location.hash('maincarousel');
            $anchorScroll();
            }
    }]);
    myApp.controller( 'galleryController', ['$scope', '$log', function ($scope, $log) {
        $scope.name = 'Gallery';
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
    myApp.controller('DatepickerDemoCtrl', function ($scope) {
        $scope.format = 'dd MMM yyyy';
        //startdate and enddate - added
          $scope.today = function() {
            $scope.formData.startDate = new Date();
          };
            $scope.today();
          $scope.today = function() {
            $scope.formData.endDate = new Date();
          };
            $scope.today();
        //mindate and maxdate
          $scope.toggleMin = function() {
            $scope.minDate = $scope.minDate ? null : new Date();
          };
            $scope.toggleMin();
          $scope.maxDate = new Date(2020, 5, 22);
        //open popups
          $scope.openStartDate = function() {
            $scope.popup1.opened = true;
          };
          $scope.openEndDate = function() {
            $scope.popup2.opened = true;
          };
        //options
          $scope.dateOptions = {
            formatYear: 'yy',
            startingDay: 1,
          };
        //keep popups closed at the beginning
          $scope.popup1 = {
            opened: false
          };
          $scope.popup2 = {
            opened: false
          };
    });
    myApp.controller('AlbergoPropertyCarousel', function($scope) {
        $scope.myInterval = 9000;
        $scope.slides = [
            {
                image: 'http://www.albergodiieri.com/img/property/building01.jpg',
                subtext: 'GALLERY_property_facade'
            }, {
                image: 'http://www.albergodiieri.com/img/property/decoration03.jpg',
                subtext: 'GALLERY_property_roses'
            }, {
                image: 'http://www.albergodiieri.com/img/property/hallway05.jpg',
                subtext: 'GALLERY_property_entrance'
            }, {
                image: 'http://www.albergodiieri.com/img/property/kitchen02.jpg',
                subtext: 'GALLERY_property_breakfast'
            }, {
                image: 'http://www.albergodiieri.com/img/property/flowers01.jpg',
                subtext: 'GALLERY_property_facadeandflowers'
            }, {
                image: 'http://www.albergodiieri.com/img/property/backyard02.jpg',
                subtext: 'GALLERY_property_garden'
            }, {
                image: 'http://www.albergodiieri.com/img/property/landscape02.jpg',
                subtext: 'GALLERY_property_landscape'
            }, {
                image: 'http://www.albergodiieri.com/img/property/landscape05.jpg',
                subtext: 'GALLERY_property_landscape'
            }, {
                image: 'http://www.albergodiieri.com/img/property/decoration01.jpg',
                subtext: 'GALLERY_property_reviews'
            }
        ];
    });
    myApp.controller('CameraTageteCarousel', function($scope) {
        $scope.myInterval = 9000;
        $scope.slides = [
                {
                class: 'item active',
                image: 'http://www.albergodiieri.com/img/laltracamera/01.jpg',
                subtext: 'GALLERY_camtagete_doublebed'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/laltracamera/02.jpg',
                subtext: 'GALLERY_camtagete_decoration'
            }, {
                class: 'item turnaround',
                image: 'http://www.albergodiieri.com/img/laltracamera/03.jpg',
                subtext: 'GALLERY_camtagete_doublebed'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/laltracamera/04.jpg',
                subtext: 'GALLERY_camtagete_curtains'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/laltracamera/05.jpg',
                subtext: 'GALLERY_camtagete_doublebed'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/laltracamera/06.jpg',
                subtext: 'GALLERY_camtagete_washroom'
            }, {
                class: 'item turnaround',
                image: 'http://www.albergodiieri.com/img/laltracamera/07.jpg',
                subtext: 'GALLERY_camtagete_washroom'
            }, {
                class: 'item turnaround',
                image: 'http://www.albergodiieri.com/img/laltracamera/08.jpg',
                subtext: 'GALLERY_camtagete_washroom'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/laltracamera/09.jpg',
                subtext: 'GALLERY_camtagete_pillow'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/laltracamera/10.jpg',
                subtext: 'GALLERY_camtagete_entrance'
            }
        ];
    });
    myApp.controller('CameraOleandroCarousel', function($scope) {
        $scope.myInterval = 9000;
        $scope.slides = [
            {   class: 'item active',
                image: 'http://www.albergodiieri.com/img/camerarosa/11bed-left.jpg',
                subtext: 'GALLERY_camoleandro_doublebed'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/camerarosa/12bed-right.jpg',
                subtext: 'GALLERY_camoleandro_doublebed'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/camerarosa/13bed.jpg',
                subtext: 'GALLERY_camoleandro_doublebed'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/camerarosa/14flowers.jpg',
                subtext: 'GALLERY_camoleandro_flowers'
            }, {
                class: 'item turnaround',
                image: 'http://www.albergodiieri.com/img/camerarosa/15chair-vertical.jpg',
                subtext: 'GALLERY_camoleandro_chairs'
            }, {
                class: 'item turnaround',
                image: 'http://www.albergodiieri.com/img/camerarosa/16bathroom-vertical.jpg',
                subtext: 'GALLERY_camoleandro_washroom'
            }, {
                class: 'item turnaround',
                image: 'http://www.albergodiieri.com/img/camerarosa/17mirror-vertical.jpg',
                subtext: 'GALLERY_camoleandro_washroom'
            }
        ];
    });
    myApp.controller('CameraGelsominoCarousel', function($scope) {
        $scope.myInterval = 9000;
        $scope.slides = [
            {   class: 'item active',
                image: 'http://www.albergodiieri.com/img/cameragialla/01keys.jpg',
                subtext: 'GALLERY_camgelsomino_keys'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/cameragialla/02bed.jpg',
                subtext: 'GALLERY_camgelsomino_flowers'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/cameragialla/03bedsidetable.jpg',
                subtext: 'GALLERY_camgelsomino_drawers'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/cameragialla/04desk.jpg',
                subtext: 'GALLERY_camgelsomino_drawers'
            }, {
                class: 'item',
                image: 'http://www.albergodiieri.com/img/cameragialla/05table.jpg',
                subtext: 'GALLERY_camgelsomino_glasses'
            }, {
                class: 'item turnaround',
                image: 'http://www.albergodiieri.com/img/cameragialla/06bathroom.jpg',
                subtext: 'GALLERY_camgelsomino_washroom'
            }
        ];
    });
    myApp.controller('MainPageCarousel', function($scope) {
        $scope.myInterval = 9000;
        $scope.slides = [
            {   image: 'http://www.albergodiieri.com/img/01.jpg',
                maintext: 'CAROUSEL_Welcome',
                subtext: 'CAROUSEL_to'
            }, {
                image: 'http://www.albergodiieri.com/img/02.jpg',
                maintext: 'CAROUSEL_Albergo',
                subtext: 'CAROUSEL_where'
            }, {
                image: 'http://www.albergodiieri.com/img/03.jpg',
                maintext: 'CAROUSEL_award',
                subtext: 'CAROUSEL_as'
            }, {
                image: 'http://www.albergodiieri.com/img/04.jpg',
                maintext: 'CAROUSEL_beautiful',
                subtext: 'CAROUSEL_fresh'
            }, {
                image: 'http://www.albergodiieri.com/img/05.jpg',
                maintext: 'CAROUSEL_rustic',
                subtext: 'CAROUSEL_and'
            }
        ];
    });
