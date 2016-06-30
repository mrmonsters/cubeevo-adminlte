(function() {
    "use strict";

    var reviewerType = [
        {
            label: 'Internship',
            value: 1
        },
        {
            label: 'Full Time',
            value: 2
        }
    ];

    cubeevo
        .controller('ReviewIndexCtrl', ['$scope', 'ReviewService', function ($scope, ReviewService) {

            $scope.reviewerType = reviewerType;

            $scope.init = function () {

                var getReviewers = ReviewService.query();

                getReviewers.$promise.then(function (data) {

                    $scope.reviewers = data;
                }, function (data) {

                    $scope.reviewers = [];
                });
            }

            $scope.delReviewer = function (reviewer) {

                var confirmDelete = confirm('Are you sure you want to delete this reviewer?');
                var index         = $scope.reviewers.indexOf(reviewer);

                if (confirmDelete == true) {

                    ReviewService.remove({ id: reviewer.id }, function (data) {

                        $scope.reviewers.splice(index, 1);
                        alert('Reviewer [' + reviewer.id + '] has been deleted successfully.');
                    });
                } else {

                    alert('Reviewer [' + reviewer.id + '] is not deleted.');
                }
            }
        }])
        .controller('ReviewCreateCtrl', ['$scope', 'ReviewService', function ($scope, ReviewService) {

            function resetReview() {

                $scope.review = {
                    question: '',
                    answer:   '',
                    sort:     0
                };
            }

            $scope.reviewerType = reviewerType;

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
                    type:          {
                        value: 1
                    },
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

            $scope.save = function (review) {

                ReviewService.save(review, function (data) {

                    window.location.href = "http://" + location.host + "/admin/manage/job-review";
                }, function (data) {

                    alert(data['msg']);
                });
            }
        }])
        .controller('ReviewUpdateCtrl', ['$scope', 'ReviewService', function ($scope, ReviewService) {

            function resetReview() {

                $scope.review = {
                    question: '',
                    answer:   '',
                    sort:     0
                };
            }

            $scope.reviewerType = reviewerType;

            $scope.init = function () {

                $scope.review   = {
                    question: '',
                    answer:   '',
                    sort:     0
                };

                $scope.reviewer.date = new Date($scope.reviewer.date);
            }

            $scope.addReview = function (review, lang) {

                var index;

                switch (lang) {

                    case 'en':
                        if (review.id) {

                            index = $scope.reviewer.reviews.en.indexOf(review);

                            $scope.reviewer.reviews.en[index].question = review.question;
                            $scope.reviewer.reviews.en[index].answer   = review.answer;
                            $scope.reviewer.reviews.en[index].sort     = review.sort;
                        } else {

                            $scope.reviewer.reviews.en.push({
                                question: review.question,
                                answer:   review.answer,
                                sort:     review.sort
                            });
                        }
                        break;
                    case 'cn':
                        if (review.id) {

                            index = $scope.reviewer.reviews.cn.indexOf(review);

                            $scope.reviewer.reviews.cn[index].question = review.question;
                            $scope.reviewer.reviews.cn[index].answer   = review.answer;
                            $scope.reviewer.reviews.cn[index].sort     = review.sort;
                        } else {

                            $scope.reviewer.reviews.cn.push({
                                question: review.question,
                                answer:   review.answer,
                                sort:     review.sort
                            });
                        }
                        break;
                }

                resetReview();
            }
            
            $scope.editReview = function (review) {

                $scope.review = review;
            }

            $scope.delReview = function (review, lang) {

                var index;

                switch (lang) {

                    case 'en':
                        index = $scope.reviewer.reviews.en.indexOf(review);

                        $scope.reviewer.reviews.en[index].deleted = 1;
                        break;
                    case 'cn':
                        index = $scope.reviewer.reviews.cn.indexOf(review);

                        $scope.reviewer.reviews.cn[index].deleted = 1;
                        break;
                }
            }

            $scope.update = function (reviewer) {

                var confirmUpdate = confirm('Are you sure you want to save these changes?');
                var date;
                var reviewerData;
                var clone;

                if (confirmUpdate == true) {

                    clone                   = angular.copy(reviewer);
                    date                    = clone.date;
                    clone.date              = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                    reviewerData            = {
                        id:   reviewer.id,
                        data: JSON.stringify(clone)
                    };
                    reviewerData["_method"] = 'PUT';

                    ReviewService.update(reviewerData, function (data) {

                        window.location.href = "http://" + location.host + "/admin/manage/job-review";
                    }, function (data) {

                        alert(data['msg']);
                    });
                } else {

                    alert('Reviewer [' + reviewer.id + '] is not updated.');
                }
            }
        }]);
}) ();