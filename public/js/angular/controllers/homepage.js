'use strict';

app.controller('HomepageCtrl', function ($scope, $http, $sce) {

    $scope.sectionData = 'test';

    $scope.leftcontent = '';

    $scope.mainOptions = {
        navigation: true,
        navigationPosition: 'right',
        scrollingSpeed: 1000,
        afterLoad: function (anchorLink, index) {
            if(index == 1){
                $scope.leftcontentFontColor = 'text-black';
                $scope.leftcontent = $sce.trustAsHtml('<h4>Ever Evolving CUBEevo</h4><br/><h1 class="h2">An Advertising Agency <br/> in Malaysia and Singapore.</h1><p class="">Ready to transform your brand with infinite posibilities <br/>by our transformed Thinking Caps.</p>');
            }
            $('.js-left-content').removeClass('hide animated fadeOutUp').addClass('animated fadeInUp');
        },
        onLeave: function(page, next){
            $('.js-left-content').removeClass('animated fadeInUp').addClass('animated fadeOutUp');
        }
    };

});

app.filter('html', function($sce) {
    return function(val) {
        return $sce.trustAsHtml(val);
    };
});