$(document).ready(function() {

	if($('.scene').length > 0){ 
		$('.scene').parallax(); 
  	}

	$('.cd-nav-trigger').click(function(){
		return false;
	});
	if($('#fullpage').length > 0){ 
		$('#fullpage').fullpage({
		  sectionsColor: ['#efefef', '#f7941e', '#eee80a', '#f04e58', '#8f53a1', '#27bdbe', '#45b97c'],
		  afterLoad :  function(anchorLink, index){
	        var loadedSection = $(this); 
	        //using index
	        if(index == 1){ 
	        	$('.cd-prev').parent().addClass('hide');
	        }else{ 
	        	$('.cd-prev').parent().removeClass('hide');
	        }
	        //using index
	        if(index == 7){ 
	        	$('.cd-next').parent().addClass('hide');
	        }else{ 
	        	$('.cd-next').parent().removeClass('hide');
	        }
	    }
		});
	}
	$('.cd-next').click(function(){ 
    	$.fn.fullpage.moveSectionDown();
    	return false;
  	});
	$('.cd-prev').click(function(){
    	$.fn.fullpage.moveSectionUp();
    	return false;
  	});


  	var cube = $('#cube');
   	function runIt() { 
       cube.animate({top:'+=20'}, 1000);
       cube.animate({top:'-=20'}, 1000, runIt);
   	} 
    runIt();

  	$('#light').sprite({fps: 9, no_of_frames: 16});
  	$('#orangemascott').sprite({fps: 9, no_of_frames: 10}); 

  	$('#yellowmascott').sprite({fps: 9, no_of_frames: 10});

  	$('#redmascott').sprite({fps: 9, no_of_frames: 10});
  	$('#knife').sprite({fps: 9, no_of_frames: 10});

  	$('#bluemascott').sprite({fps: 9, no_of_frames: 10});
  	$('#blink').sprite({fps: 9, no_of_frames: 10});

  	$('#greenmascott').sprite({fps: 9, no_of_frames: 10});
  	$('#bird').sprite({fps: 9, no_of_frames: 10});
});
