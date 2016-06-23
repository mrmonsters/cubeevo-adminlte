@extends('partials.frontend.app')

@section('angular-script')
    <script src="{{asset('js/angular/libs/angular-fullpage/angular-fullpage.js')}}"></script>
    <script src="{{asset('js/angular/app.js')}}"></script>
    <script src="{{asset('js/angular/controllers/homepage.js')}}"></script>
@endsection

@section('frontend-content')
    <style>
    </style>

    <div ng-controller="HomepageCtrl" class="home">
        <div class="wrapper wrapper__home col-xs-12 col-md-6 col-sm-6">
            <div class="content-wrapper no-margin">
                <div class="col-md-push-5 col-md-6 col-xs-11 col-sm-push-5 col-sm-6 left-content">
                    <div class="js-left-content hide @{{ leftcontentFontColor }}" ng-bind-html="leftcontent">
                    </div>
                </div>
            </div>
        </div>
        <div full-page options="mainOptions">
            <div class="section" id="section0">
            </div>
            <div class="section" id="section1">
            </div>
            <div class="section" id="section2">
            </div>
            <div class="section" id="section3">
            </div>
        </div>
    </div>

@endsection