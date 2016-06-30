@extends('app')

@section('htmlheader_title')
    Career Review
@endsection

@section('contentheader_title')
    Career Review
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" ng-controller="ReviewCreateCtrl" ng-init="init()">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New Career Review</h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" ng-click="save(reviewer)">Save</button>
                    </div>
                </div>
                <form class="form-horizontal">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                    <div class="box-body">
                        <p class="lead">Reviewer's Details</p>
                        <div class="form-group">
                            <label for="reviewer_name" class="col-sm-2 control-label">Reviewer's Name</label>
                            <div class="col-sm-10">
                                <input id="reviewer_name" name="reviewer_name" type="text" class="form-control" ng-model="reviewer.name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reviewer_type" class="col-sm-2 control-label">Reviewer Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="reviewer_type" ng-model="reviewer.type" ng-options="option as option.label for option in reviewerType track by option.value"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reviewer_qualification" class="col-sm-2 control-label">Reviewer's Qualification</label>
                            <div class="col-sm-10">
                                <input id="reviewer_qualification" name="reviewer_qualification" type="text" class="form-control" ng-model="reviewer.qualification" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review_date" class="col-sm-2 control-label">Review Date</label>
                            <div class="col-sm-10">
                                <input id="review_date" name="review_date" type="date" class="form-control" ng-model="reviewer.date" />
                            </div>
                        </div>
                        <p class="lead">Review Questions & Answers</p>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                @if (isset($locales) && !$locales->isEmpty())
                                    @foreach ($locales as $index => $locale)
                                        <li class="{{ ($index != 0) ? : 'active' }}"><a href="#{{ $locale->language }}" data-toggle="tab">{{ strtoupper($locale->language) }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="tab-content">
                                @if (isset($locales) && !$locales->isEmpty())
                                    @foreach ($locales as $index => $locale)
                                        <div id="{{ $locale->language }}" class="tab-pane {{ ($index != 0) ? : 'active' }}">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="question_{{ $locale->id }}" class="col-sm-2 control-label">Question</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="question_{{ $locale->id }}" name="question[{{ $locale->id }}]" class="form-control" ng-model="review.question"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="answer_{{ $locale->id }}" class="col-sm-2 control-label">Answer</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="answer_{{ $locale->id }}" name="answer[{{ $locale->id }}]" class="form-control" ng-model="review.answer"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sort_{{ $locale->id }}" class="col-sm-2 control-label">Sort</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" id="sort_{{ $locale->id }}" name="sort[{{ $locale->id }}]" class="form-control" ng-model="review.sort" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-10 col-sm-offset-2">
                                                        <button type="button" class="btn btn-success pull-right" ng-click="addReview(review, '{{ $locale->language }}')">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($locale->language == 'en')
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>Question (EN)</th>
                                                        <th>Answer (EN)</th>
                                                        <th>Sort</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="review in reviewer.reviews.en | orderBy: 'sort'">
                                                            <td>@{{ review.question }}</td>
                                                            <td>@{{ review.answer }}</td>
                                                            <td>@{{ review.sort }}</td>
                                                            <td><button type="button" class="btn btn-danger" ng-click="delReview(review, 'en')">Delete</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p ng-show="reviewer.reviews.en.length < 1" class="text-center">No reviews.</p>
                                            @elseif ($locale->language == 'cn')
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>Question (CN)</th>
                                                        <th>Answer (CN)</th>
                                                        <th>Sort</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="review in reviewer.reviews.cn | orderBy: 'sort'">
                                                            <td>@{{ review.question }}</td>
                                                            <td>@{{ review.answer }}</td>
                                                            <td>@{{ review.sort }}</td>
                                                            <td><button type="button" class="btn btn-danger" ng-click="delReview(review, 'cn')">Delete</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p ng-show="reviewer.reviews.cn.length < 1" class="text-center">No reviews.</p>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('addon-script')
    <script type="text/javascript">
        {{--$(document).ready(function() {--}}

            {{--var cssSources = [--}}
                {{--'{{ asset('css/bootstrap.min.css') }}',--}}
                {{--'{{ asset('css/style.css') }}',--}}
                {{--'{{ asset('css/animate.css') }}',--}}
                {{--'{{ asset('css/jquery.fullPage.css') }}',--}}
                {{--'{{ asset('css/custom.css') }}'--}}
            {{--];--}}

            {{--CKEDITOR.config.contentsCss    = cssSources;--}}
            {{--CKEDITOR.config.allowedContent = true;--}}
            {{--CKEDITOR.config.height         = '450px';--}}
            {{--CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);--}}

            {{--@foreach ($locales as $locale)--}}
            {{--CKEDITOR.replace('description_{{ $locale->id }}');--}}
            {{--@endforeach--}}
        {{--});--}}
    </script>
@endsection