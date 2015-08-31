<div id="cd-nav">
	<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

    @if(isset($backbtn))
    <a href="{{$backbtn}}" class="smart-object" style="position: fixed;
    top: 20px;
    left: 7%;
    width: 44px;
    height: 44px;
    background: white;
    border-radius: 0.25em; 
    text-indent: 100%;
    white-space: nowrap;
    z-index: 10;"> 
        <div class="arrow-left arrow">
            <div class="arrow-bar-1 smart-transition"></div>
            <div class="arrow-bar-2 smart-transition"></div>
        </div>
    </a>
    @endif

	<div id="cd-main-nav">
        <div class="inner">
        
        	<div class="logo">
            	<img src="{{ asset('img/Images-07.png') }}" width="110%" class="logo-nav" style="margin-left: -5%;">
                <img src="{{ asset('img/Images-07-mob.png')}}" class="logo-mob">
            </div>               
            
    		<ul class="list-unstyled">
    			<li><a href="{{ url('/') }}">形立方性格</a></li>
    			<li><a href="{{ url('/about-us') }}">关于我们</a></li>
    			<li><a href="{{ url('/credential') }}">案例与反馈</a></li>
    			<li><a href="{{ url('/solution') }}">专业服务</a></li>
    			<li><a href="{{ url('/research') }}" class="hide">品牌洞察</a></li>
                <li><a href="{{ url('/process') }}">合作流程</a></li>
                <li><a href="{{ url('/contact-us') }}">联络我们</a></li>
                <li><a href="#0">EN</a> | <a href="#0">中文</a></li>
    		</ul>  
            <div style="position: absolute;bottom: 5px;width: 70%;">   
                <div class="cd-social">
                    <ul class="list-inline">
                        @if(!empty($site_settings->where('code', 'facebook_link')->first()->value))
                        <li>
                            <a href="{{$site_settings->where('code', 'facebook_link')->first()->value}}" class="cd-scfb" target="_blank">FB</a>
                        </li>
                        @endif
                        @if(!empty($site_settings->where('code', 'youtube_link')->first()->value))
                        <li>
                            <a href="{{$site_settings->where('code', 'youtube_link')->first()->value}}" class="cd-scyt" target="_blank">Youtube</a>
                        </li>
                        @endif
                        @if(!empty($site_settings->where('code', 'instagram_link')->first()->value))
                        <li>
                            <a href="{{$site_settings->where('code', 'instagram_link')->first()->value}}" class="cd-scin" target="_blank">Instagram</a>
                        </li>
                        @endif
                    </ul>
                </div>
                
                <div class="smalltext">
                &copy; 2015 COPYRIGHT BY <br>
                CUBEEVO ADVERTISING SDN. BHD.
                </div>
                <br/>
                <br/>
                <br/>
                <p>www.cubeevo.com</p>
                <br/>
            </div> 
    	</div>
    </div>
</div> 