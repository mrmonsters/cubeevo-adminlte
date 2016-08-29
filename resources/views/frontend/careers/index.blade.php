@extends('partials.frontend.app')

@section('frontend-content')
    <div class="container-fluid height-full careers bg-grey">

        <div class="height-full">
            <div class="col-sm-6 no-padder height-full left-content-wrapper vcenter">
                <div class="row">
                    <div class="col-sm-8 col-lg-6 col-sm-push-2 col-lg-push-4 left-content">
                        <h2 class="text-orange">{{ (Session::get('locale') == 'en') ? 'Be Part of the Team' : '成为我们形立方一员吧' }}</h2>
                        <p>
                            {{ (Session::get('locale') == 'en') ? 'Working here is fun, the team members are friendly and helpful! Apart from work, we are
                            generally relaxed
                            because we believe great ideas creep in when our mind is free! Thinking outside the box is
                            good, but we
                            want someone can tear up the box!' : '公司环境舒适，同事关系融洽，在这里工作绝对会让你身心愉悦。既然是广告公司，我们欢迎各位有志青年加入我们，非但要你思维灵敏，更要你大胆破格，在广告创意事业攀上凌峰！' }}</p>
                        <div class="visible-xs" style="width: 100%;">
                            <svg class="arrows">
                                <path class="a1" d="M0 0 L20 22 L40 0"></path>
                                <path class="a2" d="M0 20 L20 42 L40 20"></path>
                                <path class="a3" d="M0 40 L20 62 L40 40"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 height-full no-padder">
                <div class="wrapper height-full">
                    <a href="{{url('/internship')}}">
                        <div class="row height-half" style="padding-bottom: 15px;">
                            <div class="bg-wrapper"
                                 style="background-image : url('{{asset('img/Career_Intern.jpg')}}')">
                                <div class="height-full content-wrapper__bg content-wrapper__bg-1">
                                    <div class="col-xs-12  visible-xs col-sm-11 col-md-7 content-wrapper__content vcenter vcenter-mobile">
                                        <div class="vcenter vcenter-mobile">
                                            <div>
                                            <h2 class="text-white">{{ (Session::get('locale') == 'en') ? 'INTERNSHIP' : '实习生' }}</h2>
                                            <p class="text-white hidden-xs">{{ (Session::get('locale') == 'en') ? 'Are you looking for a platform to showcase your brilliant
                                                ideas?
                                                We are looking for young talents who is hardworking with right attitudes. We
                                                provide
                                                exciting exposures while you provide your co-operation. Should you be the
                                                one?' : '在你迈入残酷社会之前，不如来我们这里体验小型社会吧。你能在这里发挥所长，验证你学习多年的技艺是否奏效。欢迎应聘！' }}</p>
                                            <p class="text-white hidden-xs"><i
                                                        class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                                        class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'See More' : '详情' !!}</span></p></div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 hidden-xs col-sm-11 col-md-7 content-wrapper__content">

                                                <h2 class="text-white">{{ (Session::get('locale') == 'en') ? 'INTERNSHIP' : '实习生' }}</h2>
                                                <p class="text-white hidden-xs">{{ (Session::get('locale') == 'en') ? 'Are you looking for a platform to showcase your brilliant
                                                ideas?
                                                We are looking for young talents who is hardworking with right attitudes. We
                                                provide
                                                exciting exposures while you provide your co-operation. Should you be the
                                                one?' : '在你迈入残酷社会之前，不如来我们这里体验小型社会吧。你能在这里发挥所长，验证你学习多年的技艺是否奏效。欢迎应聘！' }}</p>
                                                <p class="text-white hidden-xs"><i
                                                            class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                                            class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'See More' : '详情' !!}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{url('/full-employment')}}">
                        <div class="row height-half">
                            <div class="bg-wrapper"
                                 style="background-image : url('{{asset('img/Career_Permanent.jpg')}}')">
                                <div class="height-full content-wrapper__bg content-wrapper__bg-2">
                                    <div class="col-xs-12 col-sm-11 col-md-7 content-wrapper__content vcenter vcenter-mobile visible-xs">
                                        <div class="vcenter vcenter-mobile">
                                            <div>
                                            <h2 class="text-white">{{ (Session::get('locale') == 'en') ? 'FULL EMPLOYMENT' : '全职员工' }}</h2>
                                            <p class="text-white hidden-xs">{{ (Session::get('locale') == 'en') ? 'You are great, talented and passionate about your work?
                                                Convince
                                                me by showing your enthusiasm and commitment to contribute to our team.
                                                We’ll give
                                                you the opportunity to shine and enough support to climb. What say you?' : '凭一身好本领，便不愁找寻新工作新岗位。我们欢迎技艺满贯又满腔热诚的朋友加入我们团队，共创佳绩！' }}</p>
                                            <p class="text-white hidden-xs"><i
                                                        class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                                        class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'See More' : '详情' !!}</span></p></div>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-11 col-md-7 content-wrapper__content hidden-xs">
                                            <div>
                                                <h2 class="text-white">{{ (Session::get('locale') == 'en') ? 'FULL EMPLOYMENT' : '全职员工' }}</h2>
                                                <p class="text-white hidden-xs">{{ (Session::get('locale') == 'en') ? 'You are great, talented and passionate about your work?
                                                Convince
                                                me by showing your enthusiasm and commitment to contribute to our team.
                                                We’ll give
                                                you the opportunity to shine and enough support to climb. What say you?' : '凭一身好本领，便不愁找寻新工作新岗位。我们欢迎技艺满贯又满腔热诚的朋友加入我们团队，共创佳绩！' }}</p>
                                                <p class="text-white hidden-xs"><i
                                                            class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                                            class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'See More' : '详情' !!}</span></p>
                                        </div>
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