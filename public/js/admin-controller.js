(function() {
    "use strict";

    cubeevo
        .controller('ReviewCreateCtrl', ['$scope', function ($scope) {

            function resetReview() {

                $scope.review.question = '';
                $scope.review.answer   = '';
                $scope.review.sort     = 0;
            }

            $scope.init = function () {

                $scope.review   = {
                    question: '',
                    answer:   '',
                    sort:     0
                };
                $scope.reviewer = {
                    name:          '',
                    qualification: '',
                    date:          '',
                    reviews:       {
                        en: [],
                        cn: []
                    }
                };
            }

            $scope.addReview = function (review, lang) {

                switch (lang) {

                    case 'en':
                        $scope.reviewer.reviews.en.push({
                            question: review.question,
                            answer:   review.answer,
                            sort:     review.sort
                        });
                        break;
                    case 'cn':
                        $scope.reviewer.reviews.cn.push({
                            question: review.question,
                            answer:   review.answer,
                            sort:     review.sort
                        });
                        break;
                }

                resetReview();
            }

            $scope.delReview = function (review, lang) {

                var index;

                switch (lang) {

                    case 'en':
                        index = $scope.reviewer.reviews.en.indexOf(review);

                        $scope.reviewer.reviews.en.splice(index, 1);
                        break;
                    case 'cn':
                        index = $scope.reviewer.reviews.cn.indexOf(review);

                        $scope.reviewer.reviews.cn.splice(index, 1);
                        break;
                }
            }
        }]);
}) ();