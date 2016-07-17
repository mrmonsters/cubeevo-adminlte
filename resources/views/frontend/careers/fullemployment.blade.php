@extends('partials.frontend.app')

@section('frontend-content')
    <div class="container-fluid outerwrapper">
        <div class="row" style="position:relative;">
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="padder-xxl">{{ (Session::get('locale') == 'en') ? 'For Full Employment' : 'For Full Employment' }}
                </h1>
                <div class="fullemployemnt-line"></div>
            </div>
            <div class="col-sm-5 col-sm-offset-3 m-t-lg col-lg-4">
                <p>You are great, talented and passionate about your work? Convince me by showing your enthusiasm and
                    commitment to contribute to our team. We’ll give you the opportunity to shine and enough support to
                    climb. What say you?</p>
            </div>
            <div class="col-sm-4 col-sm-offset-6 m-t-lg">
                <small class="pull-right text-right">
                    “Design is not just what it looks like and feels like.<br/>
                    Design is how it works.”<br/><br/>

                    - STEVE JOBS
                </small>
            </div>
        </div>
        <div class="row m-t-xxl">
            <div class="col-md-12 col-lg-10 col-lg-offset-1 m-t-xxl">
                <div class="row">
                    @include('frontend.careers.employment.listing')
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    </div>
@endsection