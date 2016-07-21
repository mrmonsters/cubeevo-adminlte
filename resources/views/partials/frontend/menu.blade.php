<div id="cd-nav">
    <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

    @if(isset($backbtn))
        <a href="{{$backbtn}}" class="smart-object btn-back">
            <div class="arrow-left arrow">
                <div class="arrow-bar-1 smart-transition"></div>
                <div class="arrow-bar-2 smart-transition"></div>
            </div>
        </a>
    @endif

    <div id="cd-main-nav">
        <div class="inner">

            <div class="logo">
                <div class="row">
                    <div class="col-sm-push-7 col-sm-5 col-md-12  col-md-push-0 hidden-xs">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('img/Programmer Needs-17.png') }}" width="110%"
                                 class="logo-nav" style="margin-left: -5%;" alt="logo"/>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-push-2 col-xs-10 visible-xs">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('img/Programmer Needs-18.png')}}"
                                 width="100%" alt="logo"/>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="list-unstyled">
                <li><a class="@if(Request::url() === url('/cubeevo-dna')) active @endif "
                       href="{{ url('/cubeevo-dna') }}">{{ (Session::get('locale') == 'en') ? 'CUBEEVO\'S DNA' : '形立方性格' }}</a>
                </li>
                <li><a class="@if(Request::url() === url('/about-us')) active @endif "
                       href="{{ url('/about-us') }}">{{ (Session::get('locale') == 'en') ? 'ABOUT US' : '关于我们' }}</a>
                </li>
                <li>
                    <a class="@if(substr(Route::currentRouteAction(), (strpos(Route::currentRouteAction(), '@') + 1) ) == 'getCredential' || substr(Route::currentRouteAction(), (strpos(Route::currentRouteAction(), '@') + 1) ) == 'getCredentialProject' )) active @endif "
                       href="{{ url('/credential') }}">{{ (Session::get('locale') == 'en') ? 'CREDENTIALS' : '案例与反馈' }}</a>
                </li>
                <li><a class="@if(Request::url() === url('/solution')) active @endif "
                       href="{{ url('/solution') }}">{{ (Session::get('locale') == 'en') ? 'SOLUTIONS' : '专业服务' }}</a>
                </li>
                <li><a class="@if(Request::url() === url('/insights')) active @endif "
                       href="{{ url('/insights') }}">{{ (Session::get('locale') == 'en') ? 'INSIGHTS' : '品牌洞察' }}</a>
                </li>
                <li><a class="@if(Request::url() === url('/process')) active @endif "
                       href="{{ url('/process') }}">{{ (Session::get('locale') == 'en') ? 'PROCESS' : '合作流程' }}</a>
                </li>
                <li><a class="@if(Request::url() === url('/join-the-team')) active @endif "
                       href="{{ url('/join-the-team') }}">{{ (Session::get('locale') == 'en') ? 'JOIN THE TEAM' : '加入我们' }}</a>
                </li>
                <li><a class="@if(Request::url() === url('/contact-us')) active @endif "
                       href="{{ url('/contact-us') }}">{{ (Session::get('locale') == 'en') ? 'CONTACT US' : '联络我们' }}</a>
                </li>
                <li class="locale"><a href="{{ url('locale/en') }}">EN</a> | <a href="{{ url('locale/cn') }}">中文</a>
                </li>
            </ul>

            <div class="social-block">
                <div class="cd-social">
                    <ul class="list-inline">
                        <?php use App\Models\Setting; ?>
                        @if(!empty(Setting::where('code', '=', 'facebook_link')->first()->value))
                            <li>
                                <a href="{{Setting::where('code', '=', 'facebook_link')->first()->value}}"
                                   target="_blank"><i class="cd-scfb"></i></a>
                            </li>
                        @endif
                        @if(!empty(Setting::where('code', '=', 'youtube_link')->first()->value))
                            <li>
                                <a href="{{Setting::where('code', '=', 'youtube_link')->first()->value}}"
                                   target="_blank"><i class="cd-scyt"></i></a>
                            </li>
                        @endif
                        @if(!empty(Setting::where('code', '=', 'instagram_link')->first()->value))
                            <li>
                                <a href="{{Setting::where('code', '=', 'instagram_link')->first()->value}}"
                                   target="_blank"><i class="cd-scin"></i></a>
                            </li>
                        @endif

                        @if(!empty(Setting::where('code', '=', 'twitter_link')->first()->value))
                            <li>
                                <a href="{{Setting::where('code', '=', 'twitter_link')->first()->value}}"
                                   target="_blank"><i class="cd-sctt"></i></a>
                            </li>
                        @endif

                        @if(!empty(Setting::where('code', '=', 'google_plus_link')->first()->value))
                            <li>
                                <a href="{{Setting::where('code', '=', 'google_plus_link')->first()->value}}"
                                   target="_blank"><i class="cd-scgp"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="smalltext">
                    &copy; {{ date('Y') }} COPYRIGHT BY <br>
                    CUBEEVO ADVERTISING SDN. BHD.
                </div>
            </div>
        </div>
    </div>
</div>