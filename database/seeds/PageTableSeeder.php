<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Page;
use App\Models\PageTranslation;

class PageTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('pages')->delete();

		$pages = array(
			// Home
			array(
				'name'        => 'Home',
				'slug'        => '/',
				'translation' => array(
					'cn' => array(
						'desc'    => 'Home page.',
						'content' => '<div class="content-wrapper__fixed"></div>
							<div id="fullpage">
								<div class="section" id="section0">
									<div class="col-md-6 maincol-right"> 
										<ul class="scene visible-xs-block">
											<li class="layer" data-depth="0.50"><img src="/img/Images-30.png" width="100%"></li>
										</ul>
									</div> 
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
												<div class="row">
													<div class="col-sm-push-5 col-sm-7">
														<h3 class="text-black">形立方</h3>
														<p class="text-black">
														形立方的标志概念和灵感是基于最基本的设计元素， <br/>魔术方块，形状，格框以及线条所组成的。形立方<br/>追求【灵活】，聆听客户意见，灵活变通，跳脱<br/>不必要的框架；形立方也讲究【活力】，在打造<br/>品牌的过程中就是展现活力。
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Orange/CubeEvo_Mascot-Orange_Body.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Orange/CubeEvo_Mascot-Orange_Legs.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Orange/CubeEvo_Mascot-Orange_Hands.png" width="150%" ></li> 
						                </ul>
									</div> 
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-7">
													<h3>灵活</h3>
													<p>
													形立方追求灵活，弹性，务必让合作过程更加灵活，<br/>只为达致客户最理想的成果。
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Body.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Legs.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Hands.png" width="150%" ></li> 
						                </ul>
									</div> 
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-7">
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Red/CubeEvo_Mascot-Red_Body.png" width="150%" ></li>  
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Red/CubeEvo_Mascot-Red_Hands.png" width="150%" ></li> 
						                </ul>
									</div>  
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-7">
													<h3>破格</h3>
													<p>
													形立方在创业上不仅仅是大胆，还会打破框框，<br/>为客户打造专属形象！
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Purple/CubeEvo_Mascot-Purple_Body.png" width="150%" ></li>
						                    <li class="layer" data-depth="0.5"><img src="/img/Mascott/Purple/CubeEvo_Mascot-Purple_Hands.png" width="150%" ></li> 
						                    <li class="layer" data-depth="1"><img src="/img/Mascott/Purple/CubeEvo_Mascot-Purple_Cube.png" id="cube" style="position:relative;" width="150%" ></li> 
						                </ul>
									</div>
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-7">
													<h3>美感</h3>
													<p>
													形立方的根本是创意设计，大前提必须是美感触觉，<br/>为客户建立完美形象！
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Blue/CubeEvo_Mascot-Blue_LeftHand.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.5"><img src="/img/Mascott/Blue/CubeEvo_Mascot-Blue_body.png" width="150%" ></li>  
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Blue/CubeEvo_Mascot-Blue_RightHand.png" width="150%" ></li> 
						                </ul>
									</div>  
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-7">
													<h3>创意</h3>
													<p>
													形立方的创意是一种天赋，精心打造独一无二的作品<br/>便是最大成就！
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Green/CubeEvo_Mascot-Green_Body.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.5"><img src="/img/Mascott/Green/CubeEvo_Mascot-Green_Hands.png" width="150%" ></li>  
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Green/CubeEvo_Mascot-Green_Plants.png" width="150%" ></li> 
						                </ul>
									</div>  
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-7">
													<h3>贴心</h3>
													<p>
													形立方聆听客户声音，理解客户需求，务求和谐的<br/>合作关系，共创最好的作品！
													</p>
												</div> 
											</div> 
											</div> 
										</div>
									</div> 
								</div>
							</div>',
					),
					'en' => array(
						'desc'    => 'Home page.',
						'content' => '<div class="content-wrapper__fixed"></div>
							<div id="fullpage">
								<div class="section" id="section0">
									<div class="col-md-6 maincol-right"> 
										<ul class="scene visible-xs-block">
											<li class="layer" data-depth="0.50"><img src="/img/Images-30.png" width="100%"></li>
										</ul>
									</div> 
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
												<div class="row">
													<div class="col-sm-push-5 col-sm-6">
														<h3 class="text-black">CUBEEVO</h3>
														<p class="text-black">
														Cubeevo\'s logo design came from the concept of a Rubik\'s Cube. By adapting the element of using lines it formed the letter "E", for Evolution. See the irregular lengths of the lines? Yeah, we did that on purpose, with purpose. The philosophy behind this is our flexibility. Now, you might be thinking the lines are incomplete, but think flexibly - our flexibility allows as to adapt to various changes and challenges.
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Orange/CubeEvo_Mascot-Orange_Body.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Orange/CubeEvo_Mascot-Orange_Legs.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Orange/CubeEvo_Mascot-Orange_Hands.png" width="150%" ></li> 
						                </ul>
									</div> 
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-6">
													<h3>Flexibility</h3>
													<p>
													We at Cubeevo believe in flexibility is being both quick-witted and spontaneous when it comes to delivering the best for our clients. 
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Body.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Legs.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Hands.png" width="150%" ></li> 
						                </ul>
									</div> 
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-6">
													<h3>Energetic</h3>
													<p>
													Like a power source, we are a surge of positive energy flooding up Cubeevo ready to provide for your business.
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Red/CubeEvo_Mascot-Red_Body.png" width="150%" ></li>  
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Red/CubeEvo_Mascot-Red_Hands.png" width="150%" ></li> 
						                </ul>
									</div>  
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-6">
													<h3>Adventurous</h3>
													<p>
													Instead of thinking outside the box, we tear it up. So that ideas would not limit us in creating something special.
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Purple/CubeEvo_Mascot-Purple_Body.png" width="150%" ></li>
						                    <li class="layer" data-depth="0.5"><img src="/img/Mascott/Purple/CubeEvo_Mascot-Purple_Hands.png" width="150%" ></li> 
						                    <li class="layer" data-depth="1"><img src="/img/Mascott/Purple/CubeEvo_Mascot-Purple_Cube.png" id="cube" style="position:relative;" width="150%" ></li> 
						                </ul>
									</div>
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-6">
													<h3>Aesthetics</h3>
													<p>
													Aesthetics is a sense. Design is a craft. Combine those together and that\'s how Perfection is forged.
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Blue/CubeEvo_Mascot-Blue_LeftHand.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.5"><img src="/img/Mascott/Blue/CubeEvo_Mascot-Blue_body.png" width="150%" ></li>  
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Blue/CubeEvo_Mascot-Blue_RightHand.png" width="150%" ></li>
						                </ul>
									</div>  
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-6">
													<h3>Creativity</h3>
													<p>
													And yes, creativity is heavenly bestowed upon us. Our work is exceptionally wielded by its holliness.
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
						                    <li class="layer" data-depth="0.3"><img src="/img/Mascott/Green/CubeEvo_Mascot-Green_Body.png" width="150%" ></li> 
						                    <li class="layer" data-depth="0.5"><img src="/img/Mascott/Green/CubeEvo_Mascot-Green_Hands.png" width="150%" ></li>  
						                    <li class="layer" data-depth="0.8"><img src="/img/Mascott/Green/CubeEvo_Mascot-Green_Plants.png" width="150%" ></li> 
						                </ul>
									</div>  
									<div class="col-md-6 maincol-left clearfix">
										<div class="content-wrapper">
											<div class="content-section"> 
											<div class="row">
												<div class="col-sm-push-5 col-sm-6">
													<h3>Considerate</h3>
													<p>
													And Hey! We\'re good listeners too. We know that the way to maintain our trust with you, the CLIENT is by understanding what you need and delivering it so that you can have the BEST!
													</p>
												</div> 
											</div> 
											</div> 
										</div>
									</div> 
								</div>
							</div>',
					),
				),
			),
			// About Us
			array(
				'name'        => 'About Us',
				'slug'        => '/about-us',
				'translation' => array(
					'cn' => array(
						'desc'    => 'About us page.',
						'content' => '<div class="container-fluid aboutus">
							<div class="row" style="position:relative;"> 
								<div class="col-sm-9 col-sm-offset-2">
									<h2 class="txtorange"><span></span>理念</h2>
									<h5>人因梦想伟大，企业因理念而生。</h5>
								</div>
								</div>
								<div class="row about-txt " style="position:relative;"> 
								<div class="col-lg-12 mob-visible">
									<div class="about-img3"><img src="/img/Images-08.png"></div>
								</div>
								<div class="col-sm-9 col-sm-offset-2">
									<div class="col-sm-5">
									<h4>为何形立方会用魔术方块【魔方】为标志？</h4>
									<p>魔方的魅力在于三三不尽、六六无穷、九九归一的组合变化,这如同品牌形象塑造与广告设计的借镜,既可以天马行空,却不会不切实际。</p>
									</div>
									<div class="col-sm-5 col-sm-offset-1">
									<h4>形立方与别的广告公司有什么不一样？</h4>
									<p>形立方是一家品牌兼广告设计公司，务求达致客户期待的目标，遵守一个字【活】。魔方是活的，品牌是活的，形立方也是活的。形立方追求【灵活】，聆听客户意见，灵活变通，跳脱不必要的框架，形立方也讲究【活力】，在打造品牌的过程中就是展现活力。</p>
									</div>
								</div>
								<div class="col-lg-12 mob-hide">
									<div class="about-img2"></div>
								</div>
								<div class="col-sm-9 col-sm-offset-2">
									<div class="col-sm-5">
									<h4>为何取名“形立方”?</h4>
									<p>形立方之命名,除了表现我们擅长形象建立,更犹如魔方一样千变万化。</p>
									</div>
									<div class="col-sm-5 col-sm-offset-1">
									<h4>形立方的工作目标是什么?</h4>
									<p>聆听客户需求,规划客户需求,制作客户需求。不做无理花费,提供客户真正需要的方案。</p>
									</div>
								</div>
								</div>
								<div class="row"> 
								<div class="col-xs-12" style="background-color:#848383;padding:50px 0px;">
									<div class="col-sm-9 col-sm-offset-2">
									    <br/>
										<h2 class="txtwhite"><span></span>愿景</h2>
										<h1 class="tagline text-center">“创意因品牌而生, &nbsp;品牌因创新而活。”</h1>
										<h3 class="sub-tagline text-center">形立方立意是要为品牌注入创新元素, 激活品牌新生命。</h3>
									</div>
								</div>
								</div>
								<div class="row"> 
								<div class="col-xs-12" style="background-color:#676464;padding:50px 0px;">
									<div class="col-sm-9 col-sm-offset-2">
									    <br/>
										<h2 class="txtwhite"><span></span>使命</h2>
										<h1 class="tagline text-center">“激活品牌, &nbsp;展现完美。”</h1>
										<h3 class="sub-tagline text-center">形立方秉持 “灵活” 宗旨, 为客户打造完美品牌。</h3>
									</div>
									<div class="col-sm-2 hidden-xs pull-right">
										<div class="about-img1 "><img src="/img/Programmer Needs-03.png" width="100%" style="max-width: 519px;width: 185%;margin-left: -62%;margin-bottom: -21%;"></div>
									</div>
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
										<div class="col-xs-6 about-369img"><img src="/img/Transforming-Cube-Mandarin.gif" width="100%"></div>
									</div>
									<div class="col-sm-4">
										<div class="col-xs-6 about-369heading"><img src="/img/Images-11.png" width="100%"></div>
										<div class="col-xs-6 about-369img"><img src="/img/Images-11-1.png"  width="100%"></div>
										<div class="col-xs-6 about-369txt">
											<div class="col-xs-4 col-sm-4 nopadding">
												<p style="margin-left: -25px;">品牌形象策划<br>
												广告方案策划<br>
												广播广告策划<br></p>
											</div>
											<div class="col-xs-4 col-sm-4 nopadding">
												<p>数码设计<br>
												平面设计<br>
												平面摄影<br></p>
											</div>
											<div class="col-xs-4 col-sm-4 nopadding">
												<p>包装设计<br>
												文案撰写<br>
												印刷服务<br></p>
											</div>
										</div>
									</div>
								</div>
								</div>
								<div class="row team hide"> 
								<div class="col-sm-10 col-sm-offset-1">
								<h2 class="txtwhite"><span></span>团队成员</h2>
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
										<div class="profilename">CHARIS NG / 营运经理</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">KEITH PHANG / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">TIMOTHY TAI / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">FEIXIN LEW / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">DENYI SIOW / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">LEVAN ANG / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
								</div> 
								</div>
								<div class="row career"> 
								<div class="col-xs-12" style="background:#f7941a;padding-bottom: 50px;padding-top: 50px;">
								<hr class="whitehr hide">
								<div class="col-sm-9 col-sm-offset-2">  
									<div class="row">
										<div class="col-xs-12">
											<h2 class="txtwhite"><span></span>加入团队</h2>
											<h5>找寻与众不同，勇於追求创新及卓越的挑战，不懈的学习与爱探索的您，欢迎您加入形立方。</p>
											</h5>
											<br/>
											<br/>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">客户端服务及销售执行</h5>
												<p>你想不想体验为客户构思品牌和广告能带来多大的成就感？
				你想不想知道看见客户满意的笑容会让你快乐多久？那么你有没有跟客户感同身受的理解力？有没有跟设计师共享信息的沟通能力？别等，赶紧搭上我们品牌与广告的刺激旅途吧！</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal1">加入形立方</button>
											</div>	
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">平面设计师</h5>
												<p>你想不想体验成功勾画客户需要的品牌和广告蓝图的成就感？
				你想不想跟上形立方大胆创造力？那么你有没有跟内部同事共创灵感的沟通力？有没有设计师应有大胆创作小心细节的功力？
				别等，赶紧搭上我们品牌与广告的刺激旅途吧！</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal2">加入形立方</button>
											</div>	
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">平面及多媒体实习生</h5>
												<p>你还在学习课堂上的知识？给你机会看看企业社会的实际要求，你敢不敢来验证你的设计功力是否到家？别等，赶紧搭上我们
				品牌与广告的刺激旅途吧！</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal3">加入形立方</button>
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">事务或行政实习生</h5>
												<p>你喜欢品牌与广告吗？你对市场的了解深吗？你敢不敢来验证你的广告业务学问是否准确？别等，赶紧搭上我们品牌与广告的刺激旅途吧！</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal4">加入形立方</button>
											</div>	
										</div> 
									</div>  
							</div>
							<div class="row"> 
								<div class="col-xs-6 pull-right noppading hidden-xs">
								<img src="/img/Programmer Needs-04.png"  width="100%" style="margin-top:-150px;margin-left:15px;"/>
								</div>
							</div>
						</div>

						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">客户端服务及销售执行</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>

						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">平面设计师</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>
						<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">平面及多媒体实习生</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>
						<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">事务或行政实习生</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>
						</div>',
					),
					'en' => array(
						'desc'    => 'About us page.',
						'content' => '<div class="container-fluid aboutus">
							<div class="row" style="position:relative;"> 
								<div class="col-sm-9 col-sm-offset-2">
									<h2 class="txtorange"><span></span>PHILOSOPHY</h2>
									<h5>Dreams maketh men, Ideas maketh businesses.</h5>
								</div>
								</div>
								<div class="row about-txt " style="position:relative;"> 
								<div class="col-lg-12 mob-visible">
									<div class="about-img3"><img src="/img/Images-08.png"></div>
								</div>
								<div class="col-sm-9 col-sm-offset-2">
									<div class="col-sm-5">
									<h4>Why are we using Rubik\'s Cube as a symbol?</h4>
									<p>Just like the laws of physics, the Rubik\'s Cube is a law of CubeEvo. Dramatically, its code gave CubeEvo purpose. The cube\'s 3-Dness gave infinities, its hexad surfaces gave possibilities, and its nine faces gave unity and originality. In a world of Branding and Advertising, this code functions by giving every design infinite possibilities while retaining originality.</p>
									</div>
									<div class="col-sm-5 col-sm-offset-1">
									<h4>What makes us stand out from the rest?</h4>
									<p>Yeah ,we get that a lot. CubeEvo is a company that does Branding and Adveritisng. We believe in "life", giving "life" to the work we do, and putting smiles to our clients. To us, every brand has "life", the Rubik\'s cube has "life", and even CubeEvo has "life". We want to be flexible when it comes to understanding our clients needs, and fulfilling them. We also exercise passion and dedication when it comes to Branding for our clients.</p>
									</div>
								</div>
								<div class="col-lg-12 mob-hide">
									<div class="about-img2"></div>
								</div>
								<div class="col-sm-9 col-sm-offset-2">
									<div class="col-sm-5">
									<h4>Why name ourselves Cubeevo?</h4>
									<p>This shows that we are a firm establishment that is ever-evolving just like a Rubik\'s Cube.</p>
									</div>
									<div class="col-sm-5 col-sm-offset-1">
									<h4>What do we hope to achieve?</h4>
									<p>We listen to our clients, learn about them, study them. Then we come up with a hassle-free solution for our clients, without them having to spend more than intended. </p>
									</div>
								</div>
								</div>
								<div class="row"> 
								<div class="col-xs-12" style="background-color:#848383;padding:50px 0px;">
									<div class="col-sm-9 col-sm-offset-2">
									    <br/>
										<h2 class="txtwhite"><span></span>VISION</h2>
										<h1 class="tagline text-center">“Brands give creativity a definition, innovativity give Brands an evolution.”</h1>
										<h3 class="sub-tagline text-center">We at CubeEvo want our work to have the element of creativity to bring out the lifeliness of every brand.</h3>
									</div>
								</div>
								</div>
								<div class="row"> 
								<div class="col-xs-12" style="background-color:#676464;padding:50px 0px;">
									<div class="col-sm-9 col-sm-offset-2">
									    <br/>
										<h2 class="txtwhite"><span></span>MISSION</h2>
										<h1 class="tagline text-center">“Brands give creativity a definition, innovativity give Brands an evolution.”</h1>
										<h3 class="sub-tagline text-center">We at CubeEvo want our work to have the element of creativity to bring out the lifeliness of every brand. </h3>
									</div>
									<div class="col-sm-2 hidden-xs pull-right">
										<div class="about-img1 "><img src="/img/Programmer Needs-03.png" width="100%" style="max-width: 519px;width: 185%;margin-left: -62%;margin-bottom: -21%;"></div>
									</div>
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
										<div class="col-xs-6 about-369img"><img src="/img/Transforming-Cube-Mandarin.gif" width="100%"></div>
									</div>
									<div class="col-sm-4">
										<div class="col-xs-6 about-369heading"><img src="/img/Images-11.png" width="100%"></div>
										<div class="col-xs-6 about-369img"><img src="/img/Images-11-1.png"  width="100%"></div>
										<div class="col-xs-6 about-369txt">
											<div class="col-xs-12 col-sm-4 nopadding">
												<p class="text-left">Branding Strategy<br>
												Advertising Planning<br>
												Broadcast Ad Planning<br></p>
											</div>
											<div class="col-xs-12 col-sm-4 nopadding">
												<p class="text-left">Digital Graphic Design<br>
												Graphic Design<br>
												Photography<br></p>
											</div>
											<div class="col-xs-12 col-sm-4 nopadding">
												<p class="text-left">Packaging Design<br>
												Copywriting<br>
												Printing & Production<br></p>
											</div>
										</div>
									</div>
								</div>
								</div>
								<div class="row team hide"> 
								<div class="col-sm-10 col-sm-offset-1">
								<h2 class="txtwhite"><span></span>团队成员</h2>
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
										<div class="profilename">CHARIS NG / 营运经理</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">KEITH PHANG / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">TIMOTHY TAI / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">FEIXIN LEW / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">DENYI SIOW / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="profilepic"><img src="/img/Images-08.png"></div>
										<div class="profilename">LEVAN ANG / 策划总监</div>
										<div class="profiledesc">
										<p>形立方公司创始人，品牌人，设计师，CEO，多年来成功为国内外多个品牌设计终端形象，并获得客户一致好评及业内同行认可。</p>
										<p>自创建形立方品牌以来领导和培养了一批批优秀的设计师。</p>
										</div>	
									</div>
								</div> 
								</div>
								<div class="row career"> 
								<div class="col-xs-12" style="background:#f7941a;padding-bottom: 50px;padding-top: 50px;">
								<hr class="whitehr hide">
								<div class="col-sm-9 col-sm-offset-2">  
									<div class="row">
										<div class="col-xs-12">
											<h2 class="txtwhite"><span></span>JOIN THE TEAM</h2>
											<h5>Are you the one we are looking for? Is your will strong enough to brave new challenges? Do you wish to learn and discover the unknown? Well, you\'re in luck. Because we at Cubeevo are welcoming talents to join our cause.</p>
											</h5>
											<br/>
											<br/>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">CLIENT SERVICE & SALES EXECUTIVE</h5>
												<p>Do you hold knowledge about advertising? Have you forged your skills for more than 1 year? Are you able to work with clients and colleagues to achieve sales revenue and take us higher? Can you stand together with the clients and understand their needs? And put smiles on them after? If so, you may proceed with the details.</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal1">JOIN</button>
											</div>	
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">GRAPHIC DESIGNER</h5>
												<p>You are the light. You are the flame. You are the cache of ideas. Your creativity is only limited by the boundaries of your imagination. If you possess this illuminati, do proceed with further details.</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal2">JOIN</button>
											</div>	
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">INTERNSHIP FOR GRAPHIC DESIGN AND MULTIMEDIA</h5>
												<p>Want to experience hand-to-hand comba-…we mean first hand experience in the advertising field? Look no further, join us and we shall venture into the veil of creativity! Details at the click of the button below.</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal3">JOIN</button>
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="job">
												<h5 class="txtwhite">INTERNSHIP FOR BUSINESS OR ADMINISTRATION</h5>
												<p>Are your fluent in multi languages including English, Malay, Chinese, etc.? Are you looking to seek internship? Are you able to confront with clients? The button below will reveal more details.</p>
												<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal4">JOIN</button>
											</div>	
										</div> 
									</div>  
							</div>
							<div class="row"> 
								<div class="col-xs-6 pull-right noppading">
								<img src="/img/Programmer Needs-04.png"  width="100%" style="margin-top:-150px;margin-left:15px;"/>
								</div>
							</div>
						</div>

						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">CLIENT SERVICE & SALES EXECUTIVE</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>

						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">GRAPHIC DESIGNER</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>
						<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">INTERNSHIP FOR GRAPHIC DESIGN AND MULTIMEDIA</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>
						<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">INTERNSHIP FOR BUSINESS OR ADMINISTRATION</h4>
						      </div>
						      <div class="modal-body">
							      <ul>
							      	<li>Good understanding in advertising industries.</li>
							      	<li>Fresh graduates are encouraged to apply.</li>
							      	<li>Able to work closely with client and creative team.</li>
							      	<li>Result-oriented and strong organization skills.</li>
							      	<li>Achieve sales revenue through new sales and management of existing clientele.</li>
							      	<li>Fluent in written & spoken English.</li>
							      	<li>Possess a driving license and own vehicle.</li>
							      </ul> 
						      </div>
						      <div class="modal-footer"> 
						        <a href="mailto:enquire@cubeevo.com" class="btn btn-primary">Apply</a>
						      </div>
						    </div>
						  </div>
						</div>
						</div>',
					),
				),
			),
			// Process
			array(
				'name'        => 'Process',
				'slug'        => '/process',
				'translation' => array(
					'cn' => array(
						'desc'    => 'Process page.',
						'content' => '<div class="container-fluid process">
							<div class="row"> 
								<div class="col-sm-10 col-sm-offset-2">
									<h2 class="txtorange"><span></span>合作流程次序</h2>
								</div>
								</div>
								<div class="row">
								<div class="col-sm-11 col-sm-offset-1 process-flow">
									<div class="flow">
										<div class="left"><div class="box">
											<span>01</span>
											请先在形立方的店,哦不,是形立方的网页,看看形立方的作品、服务以及评语。
										</div></div>
										<div class="right"><div class="box">
											<span>02</span>
											了解之后,给形立方打个电话,发邮件也行。
										</div></div>
										<div class="left"><div class="box">
											<span>03</span>
											接下来就是形立方来了解你,你可以选择书面解释你的项目内容,或面谈也行。
										</div></div>
										<div class="right"><div class="box">
											<span>04</span>
											形立方不排斥竞标,但别期待投入的资源是最终作品品质,否则对现有客户不公平。
										</div></div>
										<div class="left"><div class="box">
											<span>05</span>
											在确认合作之前,形立方会按项目任务作出报价单。
										</div></div>
										<div class="right"><div class="box">
											<span>06</span>
											当合作意愿敲定之后,双方会先签订合同,以示委托确认。
										</div></div>
										<div class="left"><div class="box">
											<span>07</span>
											客户需在答应委托的3个工作天后先支付50%预付金,形立方才会正式开工。
										</div></div>
										<div class="right"><div class="box">
											<span>08</span>
											形立方会利用这3个工作天先做基本调研、理解与分析项目的工作。
										</div></div>
										<div class="left"><div class="box">
											<span>09</span>
											支付预付金之后,客户会收到形立方的工作表,任务也会按时完成。
										</div></div>
										<div class="right"><div class="box">
											<span>10</span>
											在形立方[灵活]的特性之下,客户可以随时来电或发电邮提出任何想法。
										</div></div>
										<div class="left"><div class="box">
											<span>11</span>
											形立方会将所有作品储存为PDF或Ai不可改的文档,源文件为素材版权恕不交付。此为形立方最不灵活之处。
										</div></div>
										<div class="right"><div class="box">
											<span>12</span>
											更详细的流程,因人而异,欢迎找我们试试看,你会发现与众不同的合作体验。
										</div></div>
									</div>
								</div>
								</div>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<div class="row"> 
								<div class="col-sm-8 col-sm-offset-2 hidden-xs">
									<img src="/img/Programmer Needs-02.png" width="100%">
								</div>
								<div class="col-sm-8 col-sm-offset-2 visible-xs-block" style="padding-bottom:100px;">
									<img src="/img/Images-37-mob.png" width="100%">
								</div>
								</div>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
							</div>',
					),
					'en' => array(
						'desc'    => 'Process page.',
						'content' => '<div class="container-fluid process">
							<div class="row"> 
								<div class="col-sm-10 col-sm-offset-2">
									<h2 class="txtorange"><span></span>Let\'s start working together</h2>
								</div>
								</div>
								<div class="row">
								<div class="col-sm-11 col-sm-offset-1 process-flow">
									<div class="flow">
										<div class="left"><div class="box">
											<span>01</span>
											Step inside, you are most welcome to browse around and see what people think about us.
										</div></div>
										<div class="right"><div class="box">
											<span>02</span>
											Give us a call, or by all means, send us an email once you learn about us.
										</div></div>
										<div class="left"><div class="box">
											<span>03</span>
											And now it\'s time for CubeEvo to get to know you. You can appoint us anytime to describe your business.
										</div></div>
										<div class="right"><div class="box">
											<span>04</span>
											CubeEvo promises to deliver exceptional results and surpass your expectations with the right amount of resources and we would not exclude the possibilities of a pitching job.
										</div></div>
										<div class="left"><div class="box">
											<span>05</span>
											Before we begin any project, we start by quoting the prices for all the tasks that you require us to do. 
										</div></div>
										<div class="right"><div class="box">
											<span>06</span>
											Once we have come to an agreement, a contract will be prepared for our confirmation.
										</div></div>
										<div class="left"><div class="box">
											<span>07</span>
											The client has to make a 50% down payment 3 working days after an agreement has been confirmed before we begin our work.
										</div></div>
										<div class="right"><div class="box">
											<span>08</span>
											We at CubeEvo will put this 3 working days to good use by analyzing, understanding and doing further research on an initial basis.
										</div></div>
										<div class="left"><div class="box">
											<span>09</span>
											The client will receive a project timeline once payment is received on CubeEvo\'s end. Rest assured, we deliver on time.
										</div></div>
										<div class="right"><div class="box">
											<span>10</span>
											You can ring us up or email us any time you like if you have any thoughts about the project. We are flexible about that.
										</div></div>
										<div class="left"><div class="box">
											<span>11</span>
											The only thing that is not flexible about us is our copyright material source files which will be stored as uneditable PDF or AI format  upon delivery.
										</div></div>
										<div class="right"><div class="box">
											<span>12</span>
											In the end, let\'s be clear. It all comes down to what you need, we engage you to work with us because we promise you it will be an unforgettable experience.
										</div></div>
									</div>
								</div>
								</div>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<div class="row"> 
								<div class="col-sm-8 col-sm-offset-2 hidden-xs">
									<img src="/img/Programmer Needs-02.png" width="100%">
								</div>
								<div class="col-sm-8 col-sm-offset-2 visible-xs-block" style="padding-bottom:100px;">
									<img src="/img/Images-37-mob.png" width="100%">
								</div>
								</div>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
							</div>',
					),
				),
			),
		);

		foreach ($pages as $page)
		{
			$pg = New Page;
			$pg->name = $page['name'];
			$pg->slug = $page['slug'];
			$pg->save();

			foreach ($page['translation'] as $key => $val)
			{
				$locale = Locale::where('language', '=', $key)->first();

				$pgTranslation = new PageTranslation;
				$pgTranslation->page_id   = $pg->id;
				$pgTranslation->locale_id = $locale->id;
				$pgTranslation->desc      = $val['desc'];
				$pgTranslation->content   = $val['content'];
				$pgTranslation->save();
			}
		}
	}

}