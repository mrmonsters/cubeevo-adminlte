@extends('partials.frontend.app')

@section('frontend-content')
    <div class="container-fluid height-full careers bg-grey">

        <div class="height-full">
            <div class="col-sm-6 no-padder height-full left-content-wrapper">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-4 left-content-wrapper__content">
                        <h2>Be Part of the Team</h2>
                        <p>Working here is fun, the team members are friendly and helpful! Apart from work, we are
                            generally relaxed
                            because we believe great ideas creep in when our mind is free! Thinking outside the box is
                            good, but we
                            want someone can tear up the box! </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 height-full no-padder">
                <div class="wrapper height-full">
                    <a href="{{url('/internship')}}">
                        <div class="row height-half" style="padding-bottom: 15px;">
                            <div class="bg-wrapper"
                                 style="background-image : url('{{asset('img/Career_Intern.jpg')}}')">
                                <div class="height-full content-wrapper__bg">
                                    <div class="col-xs-12 col-md-7 content-wrapper__content">
                                        <h2 class="text-white">INTERNSHIP</h2>
                                        <p class="text-white">Are you looking for a platform to showcase your brilliant
                                            ideas?
                                            We are looking for young talents who is hardworking with right attitudes. We
                                            provide
                                            exciting exposures while you provide your co-operation. Should you be the
                                            one?</p>
                                        <p class="text-white"><i
                                                    class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                                    class="hidden-xs">See More</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{url('/full-employment')}}">
                        <div class="row height-half">
                            <div class="bg-wrapper"
                                 style="background-image : url('{{asset('img/Career_Permanent.jpg')}}')">
                                <div class="height-full content-wrapper__bg">
                                    <div class="col-xs-12 col-md-7 content-wrapper__content">
                                        <h2 class="text-white">Full Employment</h2>
                                        <p class="text-white">You are great, talented and passionate about your work?
                                            Convince
                                            me by showing your enthusiasm and commitment to contribute to our team.
                                            We’ll give
                                            you the opportunity to shine and enough support to climb. What say you?</p>
                                        <p class="text-white"><i
                                                    class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                                    class="hidden-xs">See More</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection