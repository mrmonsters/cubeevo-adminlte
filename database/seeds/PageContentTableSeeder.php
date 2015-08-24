<?php

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentTableSeeder extends DatabaseSeeder 
{
	public function run()
	{
		DB::table('page_contents')->delete();

		$contents = array(
			// Home
			array(
				'page_id' => '1',
				'title'   => 'Home',
				'desc'    => 'Home page.',
				'content' => '<div class="section" id="section0">
					<div class="col-md-6 maincol-right">
						<ul class="scene mob-hide">
							<li class="layer" data-depth="0.50"><img src="/img/Images-41-2.png" width="100%"  class="home-dna"></li>
						</ul>
						<ul class="scene mob-visible">
							<li class="layer" data-depth="0.50"><img src="/img/Images-30.png" width="100%"></li>
						</ul>
					</div> 
					<div class="col-md-6 maincol-left clearfix">
						<div class="content-wrapper">
							<div class="content-section"> 
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>形立方</h3>
										<p>
										形立方的标志概念和灵感是基于最基本的设计元素， 魔术方块，形状，格框以及线条所组成的。形立方追求【灵活】，聆听客户意见，灵活变通，跳脱不必要的框架；形立方也讲究【活力】，在打造品牌的过程中就是展现活力。
										</p>
									</div> 
								</div>
							</div> 
						</div>
					</div>  
					</div>
					<div class="section" id="section1">
					<div class="col-md-6 maincol-right">
		                <ul class="scene mascott orange">  
		                    <li class="layer" data-depth="0.8"><div id="light"></div></li> 
		                    <li class="layer" data-depth="0.3"><div id="orangemascott"></div></li> 
		                </ul>
					</div> 
					<div class="col-md-6 maincol-left clearfix">
						<div class="content-wrapper">
							<div class="content-section"> 
							<div class="row">
								<div class="col-sm-push-5 col-sm-6">
									<h3>灵活</h3>
									<p>
									形立方追求灵活，弹性，务必让合作过程更加灵活，只为达致客户最理想的成果。
									</p>
								</div> 
							</div> 
							</div> 
						</div>
					</div>
					</div>
					<div class="section" id="section2">
					<div class="col-md-6 maincol-right">
		                <ul class="scene mascott yellow">  
		                    <li class="layer" data-depth="0.1"><div id="yellowmascott"></div></li>
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Yellow/Yellow_Mascot_02-Body.png" width="200%" ></li>
		                    <li class="layer" data-depth="0.8"><img src="img/Mascott/Yellow/Yellow_Mascot_03-Hands.png" width="200%" ></li> 
		                </ul>
					</div> 
					<div class="col-md-6 maincol-left clearfix">
						<div class="content-wrapper">
							<div class="content-section"> 
							<div class="row">
								<div class="col-sm-push-5 col-sm-6">
									<h3>活力</h3>
									<p>
									形立方无时无刻都精力充沛，为企业带来正能量！
									</p>
								</div> 
							</div> 
							</div> 
						</div>
					</div>
					</div>
					<div class="section" id="section3">
					<div class="col-md-6 maincol-right">
		                <ul class="scene mascott red">  
		                    <li class="layer" data-depth="0.3"><div id="redmascott"></div></li>
		                    <li class="layer" data-depth="0.8"><div id="knife"></div></li> 
		                </ul>
					</div>  
					<div class="col-md-6 maincol-left clearfix">
						<div class="content-wrapper">
							<div class="content-section"> 
							<div class="row">
								<div class="col-sm-push-5 col-sm-6">
									<h3>破格</h3>
									<p>
									形立方在创业上不仅仅是大胆，还会打破框框，为客户打造专属形象！
									</p>
								</div> 
							</div> 
							</div> 
						</div>
					</div>
					</div>
					<div class="section" id="section4">
					<div class="col-md-6 maincol-right">
		                <ul class="scene mascott purple">  
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Purple/Purple-Mascot_01-Body.png" width="200%" ></li>
		                    <li class="layer" data-depth="0.5"><img src="img/Mascott/Purple/Purple-Mascot_02-Hands.png" width="200%" ></li> 
		                    <li class="layer" data-depth="1"><img src="img/Mascott/Purple/Purple-Mascot_04-Cube.png" id="cube" style="position:relative;" width="200%" ></li> 
		                </ul>
					</div>
					<div class="col-md-6 maincol-left clearfix">
						<div class="content-wrapper">
							<div class="content-section"> 
							<div class="row">
								<div class="col-sm-push-5 col-sm-6">
									<h3>美感</h3>
									<p>
									形立方的根本是创意设计，大前提必须是美感触觉，为客户建立完美形象！
									</p>
								</div> 
							</div> 
							</div> 
						</div>
					</div>   
					</div>
					<div class="section" id="section5">
					<div class="col-md-6 maincol-right">  
						<ul class="scene mascott blue">  
		                    <li class="layer" data-depth="1.00"><div id="blink"></div></li>
		                    <li class="layer" data-depth="0.30"><div id="bluemascott"></div></li>  
		                </ul>
					</div>  
					<div class="col-md-6 maincol-left clearfix">
						<div class="content-wrapper">
							<div class="content-section"> 
							<div class="row">
								<div class="col-sm-push-5 col-sm-6">
									<h3>创意</h3>
									<p>
									形立方的创意是一种天赋，精心打造独一无二的作品便是最大成就！
									</p>
								</div> 
							</div> 
							</div> 
						</div>
					</div>
					</div>
					<div class="section" id="section6">
					<div class="col-md-6 maincol-right">
		                <ul class="scene mascott green">  
		                    <li class="layer" data-depth="1.00"><div id="bird"></div></li>
		                    <li class="layer" data-depth="0.30"><div id="greenmascott"></div></li>  
		                </ul>
					</div>  
					<div class="col-md-6 maincol-left clearfix">
						<div class="content-wrapper">
							<div class="content-section"> 
							<div class="row">
								<div class="col-sm-push-5 col-sm-6">
									<h3>贴心</h3>
									<p>
									形立方聆听客户声音，理解客户需求，务求和谐的合作关系，共创最好的作品！
									</p>
								</div> 
							</div> 
							</div> 
						</div>
					</div> 
					</div>',
				'locale_id'  => '1',
				'status'  => '2'
			),
			// About us
			array(
				'page_id' => '2',
				'title'   => 'About Us',
				'desc'    => 'About us page.',
				'content' => '<div class="row" style="position:relative;"> 
					<div class="col-sm-10 col-sm-offset-1">
						<h1 class="txtorange"><span></span>理念</h1>
						<p>形立方是由一群热爱生活追求梦想的优秀设计师组成，我们拒绝平庸，我们希望创造不凡！</p>
					</div>
					</div>
					<div class="row about-txt " style="position:relative;"> 
					<div class="col-lg-12 mob-visible">
						<div class="about-img3"><img src="/img/Images-08.png"></div>
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<div class="col-sm-6">
						<h4>为何形立方会用魔术方块【魔方】为标志？</h4>
						<p>魔方的魅力在于三三不尽，六六无穷，九九归一的组合变化，这如同品牌形象塑造与广告设计的借镜，既可以天马行空，却不会不切实际。
						</div>
						<div class="col-sm-6">
						<h4>形立方与别的广告公司有什么不一样？</h4>
						<p>形立方是一家品牌兼广告设计公司，务求达致客户期待的目标，遵守一个字【活】。魔方是活的，品牌是活的，形立方也是活的。形立方追求【灵活】，聆听客户意见，灵活变通，跳脱不必要的框架，形立方也讲究【活力】，在打造品牌的过程中就是展现活力。
						</div>
					</div>
					<div class="col-lg-12 mob-hide">
						<div class="about-img2"></div>
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<div class="col-sm-6">
						<h4>为何形立方会用魔术方块【魔方】为标志？</h4>
						<p>魔方的魅力在于三三不尽，六六无穷，九九归一的组合变化，这如同品牌形象塑造与广告设计的借镜，既可以天马行空，却不会不切实际。
						</div>
						<div class="col-sm-6">
						<h4>形立方与别的广告公司有什么不一样？</h4>
						<p>形立方是一家品牌兼广告设计公司，务求达致客户期待的目标，遵守一个字【活】。魔方是活的，品牌是活的，形立方也是活的。形立方追求【灵活】，聆听客户意见，灵活变通，跳脱不必要的框架，形立方也讲究【活力】，在打造品牌的过程中就是展现活力。
						</div>
					</div>
					</div>
					<div class="row"> 
					<div class="col-xs-12" style="background-color:#848383">
						<div class="col-sm-10 col-sm-offset-1">
							<h1 class="txtwhite"><span></span>愿景</h1>
							<div class="tagline text-center">"创意因品牌而生，品牌因创新而活。"</div>
							<div class="sub-tagline text-center">创立方立意要为品牌注入新元素，激活品牌新生命。</div>
						</div>
					</div>
					</div>
					<div class="row"> 
					<div class="col-xs-12" style="background-color:#676464">
						<div class="col-sm-10 col-sm-offset-1">
							<h1 class="txtwhite"><span></span>使命</h1>
							<div class="tagline text-center">"激活品牌，展现完美。"</div>
							<div class="sub-tagline text-center">创立方秉持"灵活"宗旨，为客户打造完美品牌。</div>
						</div>
						<div class="about-img1 mob-hide"><img src="/img/Images-17.png"></div>
					</div>
					</div>
					<div class="row about-369"> 
					<div class="col-sm-10 col-sm-offset-1 text-center">
						<div class="col-sm-4">
							<div class="col-xs-6 about-369heading"><img src="/img/Images-09.png" width="100%"></div>
							<div class="col-xs-6 about-369img"><img src="/img/Images-09-1.png" width="100%"></div>
						</div>
						<div class="col-sm-4">
							<div class="col-xs-6 about-369heading"><img src="/img/Images-10.png" width="100%"></div>
							<div class="col-xs-6 about-369img"><img src="/img/Transforming-Cube-2.gif" width="100%"></div>
						</div>
						<div class="col-sm-4">
							<div class="col-xs-6 about-369heading"><img src="/img/Images-11.png" width="100%"></div>
							<div class="col-xs-6 about-369img"><img src="/img/Images-11-1.png"  width="100%"></div>
							<div class="col-xs-6 about-369txt">
								<div class="col-xs-12 col-sm-4 nopadding">
									品牌形象策划<br>
									广告方案策划<br>
									广播广告策划<br>
								</div>
								<div class="col-xs-12 col-sm-4 nopadding">
									品牌形象策划<br>
									广告方案策划<br>
									广播广告策划<br>
								</div>
								<div class="col-xs-12 col-sm-4 nopadding">
									品牌形象策划<br>
									广告方案策划<br>
									广播广告策划<br>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row team"> 
					<div class="col-sm-10 col-sm-offset-1">
					<h1 class="txtwhite"><span></span>团队成员</h1>
					<p>形立方是由一群热爱生活追求梦想的优秀设计师组成，我们拒绝平庸，我们希望创造不凡!</p>
					</div>
					<div class="col-sm-10 col-sm-offset-1">
						<div class="col-xs-12 col-sm-3">
							<div class="profilepic"><img src="/img/Images-08.png"></div>
							<div class="profilename">ALVIN LEE / 策划总监</div>
							<div class="profiledesc">
							<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
							<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="profilepic"><img src="/img/Images-08.png"></div>
							<div class="profilename">ALVIN LEE / 策划总监</div>
							<div class="profiledesc">
							<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
							<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="profilepic"><img src="/img/Images-08.png"></div>
							<div class="profilename">ALVIN LEE / 策划总监</div>
							<div class="profiledesc">
							<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
							<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="profilepic"><img src="/img/Images-08.png"></div>
							<div class="profilename">ALVIN LEE / 策划总监</div>
							<div class="profiledesc">
							<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
							<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="profilepic"><img src="/img/Images-08.png"></div>
							<div class="profilename">ALVIN LEE / 策划总监</div>
							<div class="profiledesc">
							<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
							<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="profilepic"><img src="/img/Images-08.png"></div>
							<div class="profilename">ALVIN LEE / 策划总监</div>
							<div class="profiledesc">
							<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
							<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
							</div>	
						</div>
					</div> 
					</div>
					<div class="row career"> 
					<hr class="whitehr">
					<div class="col-sm-10 col-sm-offset-1">
					<h1 class="txtwhite"><span></span>加入团队</h1>
					<p>寻找与众不同，勇於追求创新及卓越的挑战，不懈的学习与爱探索的您，欢迎您加入型立方。</p>
					</div>
					<div class="col-sm-10 col-sm-offset-1">
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">客户端服务及销售执行</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default">加入型立方</button>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">客户端服务及销售执行</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default">加入型立方</button>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">客户端服务及销售执行</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default">加入型立方</button>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">客户端服务及销售执行</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default">加入型立方</button>
							</div>	
						</div>
					</div>
					</div>',
				'locale_id'  => '1',
				'status'  => '2'
			),
			// Process
			array(
				'page_id' => '3',
				'title'   => 'Process',
				'desc'    => 'Process page.',
				'content' => '<div class="row" style="position:relative;"> 
					<div class="col-sm-10 col-sm-offset-1 process-flow">
						<h1 class="txtorange"><span></span>合作流程次序</h1>
						<div class="flow">
							<div class="left"><div class="box">
								<span>01</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="right"><div class="box">
								<span>02</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="left"><div class="box">
								<span>03</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="right"><div class="box">
								<span>04</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="left"><div class="box">
								<span>05</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="right"><div class="box">
								<span>06</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="left"><div class="box">
								<span>07</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="right"><div class="box">
								<span>08</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="left"><div class="box">
								<span>09</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="right"><div class="box">
								<span>10</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="left"><div class="box">
								<span>11</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
							<div class="right"><div class="box">
								<span>12</span>
								请现在形立方的店，哦不，是形立方的网页，看看形立方的作品，服务以及评语。
							</div></div>
						</div>
					</div>
					</div>
					<div class="row"> 
					<div class="col-sm-8 col-sm-offset-2 hidden-xs">
						<img src="/img/Images-37.png" width="100%">
					</div>
					<div class="col-sm-8 col-sm-offset-2 visible-xs-block" style="padding-bottom:100px;">
						<img src="/img/Images-37-mob.png" width="100%">
					</div>
					</div>',
				'locale_id'  => '1',
				'status'  => '2'
			),
		);

		foreach ($contents as $content)
		{
			PageContent::create($content);
		}
	}

}