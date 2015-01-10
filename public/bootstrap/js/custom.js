$(document).ready(function($){
	var variables = {
			prevText : '',
			ele_width : 69,
			ele_height : 65,
	};
	$.fn.animateElements = function()
	{
		//var elements = $('.tab-content').find('.active .happening');
		var positioned = false;
		if(!positioned)
		{
			//alert($(this).attr('class') + ":" + $(this).css('left'));
			this.each(function(index)
			{
				$(this).css({'left':'-10px','opacity':0});
			});
			positioned = true;
		}
		var delay = 0;
		this.each(function(index){
			if(positioned)
			{
				$(this).delay(delay).animate({left:0,opacity:1},'slow','easeOutExpo', function(){positioned = false;});
				delay += 40;
			}
		});
	};
	$.fn.extend({
		animateAuxContent : function()
		{
			var positioned = false;
			if(positioned != true)
			{
				this.each(function(index){
					$(this).css({'left':'20px','opacity':'0'});
				});
				positioned = true;
			}
			var delay = 0;
			this.each(function(index){
				if(positioned == true)
				{
					$(this).delay(delay).animate({'left':0,'opacity':'1'},'slow','easeOutExpo',function(){positioned = false;});
					delay += 20;
				}
			});
			$('#aux-content-box').jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false}).hideScroller();
		},
		slideLeftBar : function(options)
		{
			var main = $('#main-content-box');
			var aux  = $('#aux-content-box');
			if(options.direction == 'right')
			{
				main.find('.jspPane').removeClass('hideElement');
				main.animate({'opacity':1},'fast','easeOutExpo');
				aux.animate({'opacity':0},'fast','easeOutExpo');
				$('.left-container').animate({'margin-left':0},'slow','easeOutExpo',function(){
					aux.addClass('hideElement');
				});
			}
			else if(options.direction == 'left')
			{
				aux.removeClass('hideElement').jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false}).hideScroller();
				main.animate({'opacity':0},'fast','easeOutExpo');
				aux.animate({'opacity':1},'fast','easeOutExpo');
				$('.left-container').animate({'margin-left':'-'+options.margin},'slow','easeOutExpo',function(){
					main.find('.jspPane').addClass('hideElement');
				});
			}
		},
		scaleImages : function(options){
			var div_height = options.dh;
			var div_width = options.dw;
			var img_width = $(this).width();
			var img_height = $(this).height();
			var max_side = Math.max(img_width,img_height);
			var scale = (max_side == img_height)? img_height/div_height : img_width/div_width;
			var new_width = 0; var new_height = 0; var top = 0; var left = 0;
			if(!($(this).parents('div').hasClass('tile1') || $(this).parents('div').hasClass('tile4')))
			{
				if(max_side == img_height)
				{	
					new_width = img_width/scale;
					new_height = img_height/scale;
					top = 0;
					left = Math.round((div_width - new_width)/2);
				}
				else
				{
					new_height = img_height/scale;
					new_width = img_width/scale;
					top = Math.round((div_height - new_height)/2);
					left = 0;
				}
			}
			else
			{
				if(img_width > img_height)
				{
					scale = img_height/div_height;
					new_width = img_width/scale;
					new_height = img_height/scale;
					top = 0;
					left = Math.round((div_width-new_width)/2);
				}
				else
				{
					scale = img_width/div_width;
					new_height = img_height/scale;
					new_width = img_width/scale;
					top = Math.round((div_height - new_height)/2);
					left = 0;
				}
			}
			var delayTime = 50;
			if($(this).parents('div').hasClass('image-holder'))
			{
				new_width -= 4;
				delayTime = 100;
			}	
			$(this).css({'width':new_width,'height':new_height,'top':top,'left':left});
			$(this).delay(delayTime).fadeIn();
		},
		hideScroller : function(){
			$(this).mouseenter(function(){
				$(this).find('.jspVerticalBar').fadeIn('slow');
			});
			$(this).mouseleave(function(){
				$(this).find('.jspVerticalBar').fadeOut('slow');
			});
		},
		
		hoverEffect : function(options){
				var pclr = $(this).css('background-color');
				if(options.event.type == 'mouseenter')
				{
					if(!$(this).hasClass('more'))
						$(this).css('background-color',options.color);
				}
				else
				{
					if(!$(this).hasClass('more') && !$(this).hasClass('event'))	
						$(this).css('background-color',pclr);
				}
		},
		
		formatButton : function(options) {
			if(options.event.type == 'mouseenter')
			{
				variables.prevText = this.text();
				if(options.btn.hasClass('yes'))
				{
					this.text("Yes, I'm in");
				}
				else if(options.btn.hasClass('no'))
				{
					this.text("Sorry!");
				}
			}
			else
			{
				this.text(variables.prevText);
			}
		},
		// positionElement accepts the parent object as a parameter
		positionElement : function(options) {
			if(this.width() != 0 || this.height() != 0)
			{
				variables.ele_width = this.outerWidth();
				variables.ele_height = this.outerHeight();
			}
			else if(this.outerWidth() == 0)
				variables.ele_width = 1;
			else if(this.outerHeight() == 0)
				variables.ele_height = 1;
			var left = ((options.parent.outerWidth()-variables.ele_width)/2);
			var bot = ((options.parent.outerHeight()-variables.ele_height)/2);
			if(options.top)
				this.css({'left':left,'top': bot});
			else
				this.css({'left':left, 'bottom': bot});
			if($(this).hasClass('loading'))
				$(this).fadeIn(100);
		},		
		// printError is used for alerting the user with appropriate error message
		printError : function(msg){
			var $this = this
			var errorList = this.find('ul.error-list');
			if(msg != '')
			{
				errorList.append("<li>"+msg+"</li>");
				$(this).animate({opacity:1},'fast','easeOutExpo',function(){});
			}
			setTimeout(function(){
				errorList.find('li').remove();
				$this.animate({opacity:0},'slow','easeOutExpo',function(){
					errorList.find('li:not(:first)').remove();
				});
			},3000);
		},
		showStatus : function(msg,status) {
			var $this = $(this);
			if(status == 'scs')
			{
				$this.addClass(status);
				$this.find('.span1').addClass('scs-icon').find('i').addClass('icon-ok-sign');
				$this.find('.span5 p').text(msg);
				$('.sts-bx').fadeIn(300,function(){
					$this.fadeIn(400);
				});
			}
			else
			{
				$this.addClass(status);
				$this.find('.span1').addClass('err-icon').find('i').addClass('icon-exclamation-sign');
				$this.find('.span5 p').text(msg);
				$('.sts-bx').fadeIn(300,function(){
					$this.fadeIn(400);
				});
			}
			setTimeout(function(){
				$this.fadeOut(300,function(){
					$('.sts-bx').fadeOut(300);
					$('i.icon-spinner').remove();
				});
			},3000);
		},
		// Form reset
		resetForm : function()
		{
			this.find('textarea,input:not(:submit),password').each(function(){$(this).val('');});
			this.find('select').each(function(){$(this).val(0);});
			this.find('.opt-div:gt(1)').remove();
		},

		/* Showing image description and copyright content on hover */
		showImgDesc : function(e){
			var elem = $(this).find('.l-b,.c-b');
			if(e.type == 'mouseenter')
			{
				var timer = elem.data("timer") || 0;
				clearTimeout(timer);
				timer = setTimeout(function(){elem.fadeIn();},300);
				elem.data("timer",timer);
			}	
			else
			{
				var timer = elem.data("timer") || 0;
				clearTimeout(timer);
				elem.fadeOut();
			}
		},
		getMnth : function(m)
		{
			var month = new Array();
			month[0]="January";
			month[1]="February";
			month[2]="March";
			month[3]="April";
			month[4]="May";
			month[5]="June";
			month[6]="July";
			month[7]="August";
			month[8]="September";
			month[9]="October";
			month[10]="November";
			month[11]="December";
			
			return month[parseInt(m)];
		},
		setActiveTab : function() {
			$('#happening-now').find('li.menu i.icon-caret-up').addClass('hideElement');
			$('.tab-content').find('.tab-pane').removeClass('active');
			$('#happening-now').find('a[href="#'+$(this).attr('id')+'"] > i.icon-caret-up').removeClass('hideElement');
			$(this).addClass('active');
		},
		getDateTime : function(tmsp) {
			var d = new Date(tmsp*1000);
			var month=new Array();
			month[0]="Jan";
			month[1]="Feb";
			month[2]="Mar";
			month[3]="Apr";
			month[4]="May";
			month[5]="Jun";
			month[6]="Jul";
			month[7]="Aug";
			month[8]="Sep";
			month[9]="Oct";
			month[10]="Nov";
			month[11]="Dec";
			
			var hrs = d.getHours();
			var zn = 'AM';
			if(hrs > 12)
			{
				hrs -= 12;
				zn = 'PM';
			}
			else if(hrs < 10)
				hrs = '0' + hrs;
			
			var mins = d.getMinutes();
			if(mins < 10)
				mins = '0' + mins;
			var date = {};
			date.d = month[d.getMonth()] + " " + d.getDate() + " " + d.getFullYear();
			date.t = hrs + ":" + mins + " " + zn;
			return date;
		}
	});
});