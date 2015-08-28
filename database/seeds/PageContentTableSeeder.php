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
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Orange/CubeEvo_Mascot-Orange_Body.png" width="150%" ></li> 
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Orange/CubeEvo_Mascot-Orange_Legs.png" width="150%" ></li> 
		                    <li class="layer" data-depth="0.8"><img src="img/Mascott/Orange/CubeEvo_Mascot-Orange_Hands.png" width="150%" ></li> 
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
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Body.png" width="150%" ></li> 
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Legs.png" width="150%" ></li> 
		                    <li class="layer" data-depth="0.8"><img src="img/Mascott/Yellow/CubeEvo_Mascot-Yellow_Hands.png" width="150%" ></li> 
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
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Red/CubeEvo_Mascot-Red_Body.png" width="150%" ></li>  
		                    <li class="layer" data-depth="0.8"><img src="img/Mascott/Red/CubeEvo_Mascot-Red_Hands.png" width="150%" ></li> 
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
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Purple/CubeEvo_Mascot-Purple_Body.png" width="150%" ></li>
		                    <li class="layer" data-depth="0.5"><img src="img/Mascott/Purple/CubeEvo_Mascot-Purple_Hands.png" width="150%" ></li> 
		                    <li class="layer" data-depth="1"><img src="img/Mascott/Purple/CubeEvo_Mascot-Purple_Cube.png" id="cube" style="position:relative;" width="150%" ></li> 
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
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Blue/CubeEvo_Mascot-Blue_body.png" width="150%" ></li> 
		                    <li class="layer" data-depth="0.8"><img src="img/Mascott/Blue/CubeEvo_Mascot-Blue_Hands.png" width="150%" ></li> 
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
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Green/CubeEvo_Mascot-Green_Hands.png" width="150%" ></li>  
		                    <li class="layer" data-depth="0.3"><img src="img/Mascott/Green/CubeEvo_Mascot-Green_Body.png" width="150%" ></li> 
		                    <li class="layer" data-depth="0.8"><img src="img/Mascott/Green/CubeEvo_Mascot-Green_Plants.png" width="150%" ></li> 
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
					<div class="col-sm-9 col-sm-offset-2">
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
						<p>魔方的魅力在于三三不尽、六六无穷、九九归一的组合变化,这如同品牌形象塑造与广告设计的借镜,既可以天马行空,却不会不切实际。</p>
						</div>
						<div class="col-sm-6">
						<h4>形立方与别的广告公司有什么不一样？</h4>
						<p>形立方是一家品牌兼广告设计公司，务求达致客户期待的目标，遵守一个字【活】。魔方是活的，品牌是活的，形立方也是活的。形立方追求【灵活】，聆听客户意见，灵活变通，跳脱不必要的框架，形立方也讲究【活力】，在打造品牌的过程中就是展现活力。</p>
						</div>
					</div>
					<div class="col-lg-12 mob-hide">
						<div class="about-img2"></div>
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<div class="col-sm-6">
						<h4>为何取名“形立方”?</h4>
						<p>形立方之命名,除了表现我们擅长形象建立,更犹如魔方一样千变万化。</p>
						</div>
						<div class="col-sm-6">
						<h4>形立方的工作目标是什么?</h4>
						<p>聆听客户需求,规划客户需求,制作客户需求。不做无理花费,提供客户真正需要的方案。</p>
						</div>
					</div>
					</div>
					<div class="row"> 
					<div class="col-xs-12" style="background-color:#848383;">
						<div class="col-sm-9 col-sm-offset-2">
							<h1 class="txtwhite"><span></span>愿景</h1>
							<div class="tagline text-center">“创意因品牌而生,品牌因创新而活。”</div>
							<div class="sub-tagline text-center">形立方立意是要为品牌注入创新元素,激活品牌新生命。</div>
						</div>
					</div>
					</div>
					<div class="row"> 
					<div class="col-xs-12" style="background-color:#676464;">
						<div class="col-sm-9 col-sm-offset-2">
							<h1 class="txtwhite"><span></span>使命</h1>
							<div class="tagline text-center">“激活品牌,展现完美。”</div>
							<div class="sub-tagline text-center">形立方秉持“灵活”宗旨,为客户打造完美品牌。</div>
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
									数码设计<br>
									平面设计<br>
									平面摄影<br>
								</div>
								<div class="col-xs-12 col-sm-4 nopadding">
									包装<br>
									文案撰写<br>
									印刷服务<br>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row team hide"> 
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
					<div class="col-xs-12" style="background:#f7941a;">
					<hr class="whitehr hide">
					<div class="col-sm-10 col-sm-offset-1">
					<h1 class="txtwhite"><span></span>加入团队</h1>
					<p>找寻与众不同，勇於追求创新及卓越的挑战，不懈的学习与爱探索的您，欢迎您加入型立方。</p>
					</div>
					<div class="col-sm-10 col-sm-offset-1">
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">客户端服务及销售执行</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal1">加入型立方</button>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">平面设计师</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal2">加入型立方</button>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">平面及多媒体实习生</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal3">加入型立方</button>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="job">
								<p class="txtwhite">事务或行政实习生</p>
								<p>你了解广告设计？你有一年以上的工作经验？您是否能与客户和同事合作，实现销售收入和带领我们？如果以上介是，欢迎您加入型立方。</p>
								<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal4">加入型立方</button>
							</div>	
						</div> 
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
',
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