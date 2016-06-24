'use strict';

app.controller('HomepageCtrl', function ($scope, $http, $sce) {

    $scope.sectionData = 'test';

    $scope.leftcontent = '';
    $scope.projects = [];
    $scope.$watch('projects', function () {

        $scope.mainOptions = {
            navigation: true,
            navigationPosition: 'right',
            scrollingSpeed: 1000,
            afterLoad: function (anchorLink, index) {
                if (index == 1) {
                    $scope.leftcontentFontColor = 'text-black';
                    $('.leftcontent_heading').html('An Advertising Agency <br/> in Malaysia and Singapore.');
                }

                if (index == 2) {
                    $scope.leftcontentFontColor = 'text-white';
                    $('.leftcontent_heading').html($scope.projects[0].label);
                }
                if (index == 3) { 
                    $scope.leftcontentFontColor = 'text-black';
                    $('.leftcontent_heading').html($scope.projects[1].label);
                }

                $('.js-left-content').removeClass('hide animated fadeOutUp').addClass('animated fadeInUp');
            },
            onLeave: function (page, next) {
                $('.js-left-content').removeClass('animated fadeInUp').addClass('animated fadeOutUp');
                $('.wrapper__home-left .content-wrapper').removeClass('leftcontentbackgroundImage_1').removeClass('leftcontentbackgroundImage_2');

                if (next == 2) {
                    $('.wrapper__home-left .content-wrapper').addClass('leftcontentbackgroundImage_1');
                }
                if (next == 3) {
                    $('.wrapper__home-left .content-wrapper').addClass('leftcontentbackgroundImage_1');
                }
            }
        };
    });

});

app.filter('html', function ($sce) {
    return function (val) {
        return $sce.trustAsHtml(val);
    };
});