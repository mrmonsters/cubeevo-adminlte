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
        <div class="wrapper wrapper__home wrapper__home-left col-xs-12 col-md-6 col-sm-6">
            <div class="content-wrapper no-margin">
                <div class="col-md-push-5 col-md-6 col-xs-11 col-sm-push-5 col-sm-6 left-content">
                    <div class="js-left-content hide @{{ leftcontentFontColor }}" ng-bind-html="leftcontent">
                    </div>
                </div>
            </div>
        </div>
        <div full-page options="mainOptions" class="home__background">
            <div class="section" id="section0">
            </div>
            <div class="section" id="section1">
            </div>
            <div class="section" id="section2">
            </div>
            <div class="section" id="section3">
                <div class="col-sm-6 col-sm-push-6 wrapper__right">
                    <div class="wrapper">
                        <div class="row content-wrapper-layer content-wrapper-first-layer">
                            <div class="content-wrapper" style="background-image : url('http://local.explorerlove.com/images/demo/c3.jpg')">
                                <div class="col-xs-12 content-wrapper__content">
                                    <h2 class="text-white">SEEING THROUGH AGENCY TITLES</h2>
                                    <p class="text-white">Ready to transform your brand with infinite posibilities
                                        by our transformed Thinking Caps.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row content-wrapper-layer content-wrapper-second-layer">
                            <div class="content-wrapper" style="background-color: #00a65a">
                                <div class="col-xs-12 content-wrapper__content">
                                    <h2>SEEING THROUGH AGENCY TITLES</h2>
                                    <p>Ready to transform your brand with infinite posibilities
                                        by our transformed Thinking Caps.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section5">
            </div>
        </div>
    </div>

@endsection