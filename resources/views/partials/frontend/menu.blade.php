<div id="cd-nav">
	<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

    @if(isset($backbtn))
    <a href="{{$backbtn}}" style="position: fixed;
    top: 20px;
    left: 7%;
    width: 44px;
    height: 44px;
    background: white;
    border-radius: 0.25em; 
    text-indent: 100%;
    white-space: nowrap;
    z-index: 10;"> 
        <div class="arrow-left">
            <div class="arrow-left__top smart-transition"></div>
            <div class="arrow-left__bottom smart-transition"></div>
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
            
            <div style="position: absolute;bottom: 5px;">   
                <div class="cd-social">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#0" class="cd-scfb">FB</a>
                        </li>
                        <li>
                            <a href="#0" class="cd-scyt">Youtube</a>
                        </li>
                        <li>
                            <a href="#0" class="cd-scin">Instagram</a>
                        </li>
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
            </div> 
    	</div>
    </div>
</div> 