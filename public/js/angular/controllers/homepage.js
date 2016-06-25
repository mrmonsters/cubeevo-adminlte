'use strict';

app.controller('HomepageCtrl', function ($scope, $http, $sce) {

    $scope.sectionData = 'test';

    $scope.leftcontent = '';
    $scope.projects = [];
    $scope.post = [];
    $scope.$watch('projects', function () {

        $scope.mainOptions = {
            navigation: true,
            navigationPosition: 'right',
            scrollingSpeed: 1000,
            // easingcss3: 'cubic-bezier(1.000, 0.000, 0.000, 1.005) 0.5s',
            afterLoad: function (anchorLink, index) {
                if (index == 1) {
                    $scope.leftcontentFontColor = 'text-black';
                    $('.leftcontent_heading').html('An Advertising Agency <br/> in Malaysia and Singapore.');
                    $('.leftcontent_client').hide();
                }

                if (index == 2) {
                    $scope.leftcontentFontColor = 'text-white';
                    $('.leftcontent_client_name').html($scope.projects[0].client_name);
                    $('.leftcontent_heading').html($scope.projects[0].label);
                    $('.leftcontent_topheading').hide();
                    $('.leftcontent_client').show();
                }
                if (index == 3) {
                    $scope.leftcontentFontColor = 'text-black';
                    $('.leftcontent_client_name').html($scope.projects[0].client_name);
                    $('.leftcontent_heading').html($scope.projects[1].label);
                    $('.leftcontent_topheading').hide();
                    $('.leftcontent_client').show();
                }

                if (index == 4) {
                    $('.leftcontent_heading').html($scope.post[0].label);
                    $('.leftcontent_client').hide();
                    $('.leftcontent_desc').html($scope.post[0].desc + '...');
                    $('.leftcontent_topheading').hide();
                }

                if (index == 5) {
                    $scope.leftcontentFontColor = 'text-black';
                    $('.leftcontent_heading').html('CONTACT US');
                    $('.leftcontent_client').hide();
                    $('.leftcontent_topheading').hide();
                }

                $('.js-left-content').removeClass('hide animated fadeOutUp').addClass('animated fadeInUp');
            },
            onLeave: function (page, next) {

                $('.js-left-content').removeClass('animated fadeInUp').addClass('animated fadeOutUp');
                $('.wrapper__home-left .content-wrapper').removeClass('post_0_background').removeClass('leftcontentbackgroundImage_1').removeClass('leftcontentbackgroundImage_2');
                $('.leftcontent_heading,.leftcontent_desc').removeClass('text-white');

                if (next == 1) {
                    $('.leftcontent_topheading').show();
                }
                if (next == 2) {
                    $('.wrapper__home-left .content-wrapper').addClass('leftcontentbackgroundImage_1');
                    $('.leftcontent_heading,.leftcontent_desc').addClass('text-white');
                }
                if (next == 3) {
                    $('.wrapper__home-left .content-wrapper').addClass('leftcontentbackgroundImage_2');
                    $('.leftcontent_heading,.leftcontent_desc').addClass('text-white');
                }
                if (next == 4) {
                    $('.wrapper__home-left .content-wrapper').addClass('post_0_background');
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