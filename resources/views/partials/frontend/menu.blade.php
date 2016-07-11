<div id="cd-nav">
	<a href="#0" class="cd-nav-trigger
    @if(Request::url() === url('/'))
        menu-is-open
    @endif">Menu<span></span></a>

    @if(isset($backbtn))
    <a href="{{$backbtn}}" class="smart-object btn-back">
        <div class="arrow-left arrow">
            <div class="arrow-bar-1 smart-transition"></div>
            <div class="arrow-bar-2 smart-transition"></div>
        </div>
    </a>
    @endif

	<div id="cd-main-nav"
    @if(Request::url() ===url('/'))
    class="is-visible"
    @endif>
        <div class="inner">

        	<div class="logo">
            	<a href="{{url('/')}}"><img src="{{ asset('img/Programmer Needs-17.png') }}" width="110%" class="logo-nav" style="margin-left: -5%;" alt="logo"/></a>

                <a href="{{url('/')}}"><img src="{{ asset('img/Programmer Needs-18.png')}}" class="logo-mob" alt="logo"/></a>
            </div>
    		<ul class="list-unstyled">
    			<li><a class="@if(Request::url() === url('/cubeevo-dna')) active @endif " href="{{ url('/cubeevo-dna') }}">{{ (Session::get('locale') == 'en') ? 'CUBEEVO\'S DNA' : '形立方性格' }}</a></li>
    			<li><a class="@if(Request::url() === url('/about-us')) active @endif " href="{{ url('/about-us') }}">{{ (Session::get('locale') == 'en') ? 'ABOUT US' : '关于我们' }}</a></li>
    			<li><a class="@if(substr(Route::currentRouteAction(), (strpos(Route::currentRouteAction(), '@') + 1) ) == 'getCredential' || substr(Route::currentRouteAction(), (strpos(Route::currentRouteAction(), '@') + 1) ) == 'getCredentialProject' )) active @endif " href="{{ url('/credential') }}">{{ (Session::get('locale') == 'en') ? 'CREDENTIALS' : '案例与反馈' }}</a></li>
    			<li><a class="@if(Request::url() === url('/solution')) active @endif " href="{{ url('/solution') }}">{{ (Session::get('locale') == 'en') ? 'SOLUTIONS' : '专业服务' }}</a></li>
    			<li><a class="@if(Request::url() === url('/insights')) active @endif " href="{{ url('/insights') }}">{{ (Session::get('locale') == 'en') ? 'INSIGHTS' : '品牌洞察' }}</a></li>
                <li><a class="@if(Request::url() === url('/process')) active @endif " href="{{ url('/process') }}">{{ (Session::get('locale') == 'en') ? 'LET\'S WORK TOGETHER' : '合作流程' }}</a></li>
                <li><a class="@if(Request::url() === url('/contact-us')) active @endif " href="{{ url('/contact-us') }}">{{ (Session::get('locale') == 'en') ? 'CONTACT US' : '联络我们' }}</a></li>
                <li><a class="@if(Request::url() === url('/join-the-team')) active @endif " href="{{ url('/join-the-team') }}">{{ (Session::get('locale') == 'en') ? 'JOIN THE TEAM' : '加入我们' }}</a></li>
                <li class="locale"><a href="{{ url('locale/en') }}">EN</a> | <a href="{{ url('locale/cn') }}">中文</a></li>
    		</ul>

            <div class="social-block">
                <div class="cd-social">
                    <ul class="list-inline">
                        <?php use App\Models\Setting; ?>
                        @if(!empty(Setting::where('code', '=', 'facebook_link')->first()->value))
                        <li>
                            <a href="{{Setting::where('code', '=', 'facebook_link')->first()->value}}" class="cd-scfb" target="_blank">FB</a>
                        </li>
                        @endif
                        @if(!empty(Setting::where('code', '=', 'youtube_link')->first()->value))
                        <li>
                            <a href="{{Setting::where('code', '=', 'youtube_link')->first()->value}}" class="cd-scyt" target="_blank">Youtube</a>
                        </li>
                        @endif
                        @if(!empty(Setting::where('code', '=', 'instagram_link')->first()->value))
                        <li>
                            <a href="{{Setting::where('code', '=', 'instagram_link')->first()->value}}" class="cd-scin" target="_blank">Instagram</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="smalltext">
                &copy; 2015 COPYRIGHT BY <br>
                CUBEEVO ADVERTISING SDN. BHD.
                </div>
            </div>
    	</div>
    </div>
</div>