<?php

use Illuminate\Database\Seeder;
use App\Section;

class SectionTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('sections')->delete();

		$sections = array(
			// Sections (Home)
			array(
				'section_title'   => 'Section 0 (Home)',
				'section_desc'    => 'Section 0 for home page.',
				'section_content' => '<div class="section" id="section0">
					<div class="col-sm-6 maincol-right">
						<ul class="scene mob-hide">
							<li class="layer" data-depth="0.50"><img src="/img/Images-41-2.png" width="100%" /></li>
						</ul>
						<ul class="scene mob-visible">
							<li class="layer" data-depth="0.50"><img src="/img/Images-30.png" width="100%" /></li>
						</ul>
					</div>
					<div class="col-sm-6 maincol-left">
						<div class="content-wrapper">
							<div class="content-section">
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>形立方</h3>
										<p>形立方的标志概念和灵感是基于最基本的设计元素， 魔术方块，形状，格框以及线条所组成的。形立方追求【灵活】，聆听客户意见，灵活变通，跳脱不必要的框架；形立方也讲究【活力】，在打造品牌的过程中就是展现活力。</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 1 (Home)',
				'section_desc'    => 'Section 1 for home page.',
				'section_content' => '<div class="section" id="section1">
					<div class="col-sm-6 maincol-right">
						<ul class="scene orange">	
							<li class="layer" data-depth="1.00">	
								<div id="light">&nbsp;</div>	
							</li>	
							<li class="layer" data-depth="0.30">	
								<div id="orangemascott">&nbsp;</div>	
							</li>
						</ul>
					</div>
					<div class="col-sm-6 maincol-left">
						<div class="content-wrapper">
							<div class="content-section">
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>灵活</h3>
										<p>形立方追求灵活，弹性，务必让合作过程更加灵活，只为达致客户最理想的成果。</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 2 (Home)',
				'section_desc'    => 'Section 2 for home page.',
				'section_content' => '<div class="section" id="section2">
					<div class="col-sm-6 maincol-right">
						<ul class="scene">
							<li class="layer" data-depth="0.50"><img src="/img/Mascott/Light.gif" width="100%" /></li>
							<li class="layer" data-depth="0.70"><img src="/img/Mascott/Orange-Background_1.png" width="100%" /></li>
							<li class="layer" data-depth="0.80"><img src="/img/Mascott/Orange-Background_2.png" width="100%" /></li>
							<li class="layer" data-depth="1"><img src="/img/Mascott/Orange-Background_3.png" width="100%" /></li>
						</ul>
					</div>
					<div class="col-sm-6 maincol-left">
						<div class="content-wrapper">
							<div class="content-section">
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>活力</h3>
										<p>形立方无时无刻都精力充沛，为企业带来正能量！</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 3 (Home)',
				'section_desc'    => 'Section 3 for home page.',
				'section_content' => '<div class="section" id="section3">
					<div class="col-sm-6 maincol-right">
						<!--<img src="/img/Images-41-2.png" width="100%">-->
					</div>
					<div class="col-sm-6 maincol-left">
						<div class="content-wrapper">
							<div class="content-section">
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>破格</h3>
										<p>形立方在创业上不仅仅是大胆，还会打破框框，为客户打造专属形象！</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 4 (Home)',
				'section_desc'    => 'Section 4 for home page.',
				'section_content' => '<div class="section" id="section4">
					<div class="col-sm-6 maincol-right">
						<!--<img src="/img/Images-41-2.png" width="100%">-->
					</div>
					<div class="col-sm-6 maincol-left">
						<div class="content-wrapper">
							<div class="content-section">
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>美感</h3>
										<p>形立方的根本是创意设计，大前提必须是美感触觉，为客户建立完美形象！</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 5 (Home)',
				'section_desc'    => 'Section 5 for home page.',
				'section_content' => '<div class="section" id="section5">
					<div class="col-sm-6 maincol-right">
						<!--<img src="/img/Images-41-2.png" width="100%">-->
					</div>
					<div class="col-sm-6 maincol-left">
						<div class="content-wrapper">
							<div class="content-section">
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>创意</h3>
										<p>形立方的创意是一种天赋，精心打造独一无二的作品便是最大成就！</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 6 (Home)',
				'section_desc'    => 'Section 6 for home page.',
				'section_content' => '<div class="section" id="section6">
					<div class="col-sm-6 maincol-right">
						<!--<img src="/img/Images-41-2.png" width="100%">-->
					</div>
					<div class="col-sm-6 maincol-left">
						<div class="content-wrapper">
							<div class="content-section">
								<div class="row">
									<div class="col-sm-push-5 col-sm-6">
										<h3>贴心</h3>
										<p>形立方聆听客户声音，理解客户需求，务求和谐的合作关系，共创最好的作品！</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			// Section (Credential)
			array(
				'section_title'   => 'Section 0 (Credential)',
				'section_desc'    => 'Section 0 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-1" onClick="location.href=\'credential/content\';">
		        	<div class="contbox">
		                <div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/Credential Thumbnail/Hairdepot_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在零售业
		                    </p>
		                </div>  
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 1 (Credential)',
				'section_desc'    => 'Section 1 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-2" onClick="location.href=\'credential/content\';">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.50"><img src="/img/Credential Thumbnail/Greenology_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在餐饮业
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 2 (Credential)',
				'section_desc'    => 'Section 2 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-3" onClick="location.href=\'credential/content\';">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/Credential Thumbnail/PLT_Website_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在美容业
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 3 (Credential)',
				'section_desc'    => 'Section 3 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-4" onClick="location.href=\'credential/content\';">
		            <div class="contbox">
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/Credential Thumbnail/PLT_Website_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在电子业
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 4 (Credential)',
				'section_desc'    => 'Section 4 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-5" onClick="location.href=\'credential/content\';">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/Credential Thumbnail/HairMilk_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在金融业
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 5 (Credential)',
				'section_desc'    => 'Section 5 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-6" onClick="location.href=\'credential/content\';">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/Credential Thumbnail/Hairdepot_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在教学业
		                    </p>
		                </div> 
		            </div>
		        	</div> ',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 6 (Credential)',
				'section_desc'    => 'Section 6 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-7" onClick="location.href=\'credential/content\';">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/Credential Thumbnail/HairMilk_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在房产业
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 7 (Credential)',
				'section_desc'    => 'Section 7 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-8" onClick="location.href=\'credential/content\';">
		            <div class="contbox">
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/Credential Thumbnail/PLT_Website_Thumbnail.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        型在汽车业
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 8 (Credential)',
				'section_desc'    => 'Section 8 for credential page.',
				'section_content' => '<div class="col-sm-4 cre-9">
		            <div class="contbox comingsoon"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-12 hidden-text panel-title">
		                        敬请期待
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			// Section (Solution)
			array(
				'section_title'   => 'Section 0 (Solution)',
				'section_desc'    => 'Section 0 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-1">
		        	<div class="contbox">
		                <div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon1.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        品牌形象策划
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        从标志，采色，构图，字形到标语，我们的责任就是为客户塑造显著的品牌视觉形象。
		                    </p>
		                </div>  
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 1 (Solution)',
				'section_desc'    => 'Section 1 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-2">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.50"><img src="/img/solutionIcon2.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        广告方案策划
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        我们能按照客户需求与预算安排广告策划，包括平面媒体，户外媒体，广播媒体和网络媒体。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 2 (Solution)',
				'section_desc'    => 'Section 2 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-3">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon3.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        广播广告策划
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        包办广播电台广告与电视广告的脚本撰写，演员道具准备以及拍摄录制。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 3 (Solution)',
				'section_desc'    => 'Section 3 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-4">
		            <div class="contbox">
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon4.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        包装设计
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        我们为客户设计产品包装，无论是盒装或是标签设计都在服务范畴。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 4 (Solution)',
				'section_desc'    => 'Section 4 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-5">
		            <div class="contbox">
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon5.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        数码设计
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        泛指数码媒体上的设计，含括网页，手机应用程序网络宣传主图，以及动态图设计。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 5 (Solution)',
				'section_desc'    => 'Section 5 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-6">
		            <div class="contbox">
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon6.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        平面设计
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        我们平面设计包括宣传单，海报，折页，画册，布条，挂条，平面广告，招牌，广告牌，书刊等。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 6 (Solution)',
				'section_desc'    => 'Section 6 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-7">
		            <div class="contbox">
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon7.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        平面摄影
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        我们能为客户的产品，代言人和活动安排摄影。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 7 (Solution)',
				'section_desc'    => 'Section 7 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-8">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon8.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        文案撰写
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        我们能为可撰写活动流程，产品特性，品牌故事，新闻稿等等，也涵盖国语，英语与华语的翻译。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
			array(
				'section_title'   => 'Section 8 (Solution)',
				'section_desc'    => 'Section 8 for solution page.',
				'section_content' => '<div class="col-sm-4 sol-9">
		            <div class="contbox"> 
		            	<div class="greybox"></div>
		                <ul class="scene">
		                    <li class="layer" data-depth="0.30"><img src="/img/solutionIcon9.png" width="100%"/></li>
		                </ul> 
		                <div class="row panel-body overlap">
		                    <p class="col-sm-4 panel-title">
		                        打印服务
		                    </p>
		                    <p class="col-sm-8 hidden-text panel-title-desc">
		                        我们提供印刷服务，包括平面印刷，立体制作，布景制作，制服制作等。
		                    </p>
		                </div> 
		            </div>
		        	</div>',
				'section_locale'  => 'zh-cn',
				'status'          => '2'
			),
		);

		foreach ($sections as $section)
		{
			Section::create($section);
		}
	}

}