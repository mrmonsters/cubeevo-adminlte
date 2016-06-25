@extends('partials.frontend.app')

@section('frontend-content')
    <div class="container-fluid outerwrapper">
        <div class="row" style="position:relative;">
            @include('frontend.careers.internship.directorspeech')
        </div>
    </div>
    <div class="bg-darkgrey internship-section-2">
        <div class="container-fluid outerwrapper">
            <div class="row" style="position:relative;">
                <div class="col-sm-10 col-sm-push-1 col-md-8 col-md-push-2">
                    @include('frontend.careers.internship.qna')
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        </div>
    </div>
    <div class="container-fluid outerwrapper">
        <div class="row" style="position:relative;">
            @include('frontend.careers.internship.view')
        </div>
    </div>
@endsection