$(document).ready(function(){
		/*
		 * Load data into active tab
		 */
		if($('#happening-now a[href="#context"]').hasClass('disabled'))
			$('#stream').loadData({'tab':'stream'});
		else
		{
			if($('#main-content-box').find('#usr-prf').length)
				$('#context').loadData({'tab':'context','usr':$('#usr-prf .ref-name a').attr('href').substr(1).toLowerCase(),'htg':$('#context').find('textarea.quickpost').val().substr(1)});
			else if($('#context').find('textarea.quickpost').length)
				$('#context').loadData({'tab':'context','htg':$('#context').find('textarea.quickpost').val().substr(1)});
		}
		
		$('#aux-content-box .task').live('click',function(e){
			$('#left-bar').find('.jspPane').css('left','0px');
		});
		/*
		 * Add margin to divs inside main-content-box to increase readability
		 */		
		$('#main-content-box').find('.row-fluid > div').not(':first').not('div.clearfix').css('margin-top','16px');
		
		/* Show scroll to top button when user scrolls down 250px from the top */
		$(window).scroll(function(){
			if($(window).scrollTop() > 300)
			{
				if(!($('#goTop').length))
					$('body').append('<div id="goTop"><a class="stt" href="#"><i class="icon-chevron-up"></i></a></div>');
				else
					$('#goTop').fadeIn(500);
			}
			if($(window).scrollTop() < $(window).height())
				$('#goTop').fadeOut(500);
		});
		
		/* Scrolling page back to top on clicking "scroll to top" button */
		$('.stt').live('click',function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop: "0px"},'slow','easeInOutCubic',function(){$('#goTop').fadeOut(500);});
		});
		
		/* Auto suggestions for location from google maps api */
		$(window).load(function(){
			var input = document.getElementById('location');
			//var autocomplete = new google.maps.places.Autocomplete(input);
			$('.tab-content').find('.active .happening').animateElements(); // Animate elements on right bar on page load
			$('#main-content-box ul.main-list li').animateElements();

		});
		/*Left and right bars changing background color of the divs in left and righ bar on hover */
		$('.happening p').not($('.response p,.voted p,.posted p')).append("<ul class='unfold'><li class='unfold-ul'><i class='icon-arrow-down'></i>unfold</li></ul><div class='clearfix'></div>");
		
		/*Showing up react and voteup buttons on hovering over a particular quickpost in right bar */
		$('.happening').live('hover',function(e){
			var str = '';
			var $this = $(this);
			var flag = $this.hasClass('posted') && $this.find('.pst-stng').length;
			if(e.type == 'mouseenter')
			{
				$this.find('ul.unfold li:not(:first)').removeClass('hideElement');
				if(flag)
					$this.find('.pst-stng, .tmsp').toggleClass('hideElement');
			}
			else if(e.type == 'mouseleave')
			{
				$this.find('ul.unfold li:not(:first)').addClass('hideElement');
				if(flag)
					$this.find('.pst-stng, .tmsp').toggleClass('hideElement');
			}
		});
		
		/* Change content in the right bar on clicking the tab links */
		$("#happening-now a").click(function(e){
			e.preventDefault();
			if(!$(this).hasClass('disabled'))
			{
				$(this).tab('show');
				$('.tab-content').find('.active .happening').animateElements();
				var elementId = $(this).attr('href');
				$(elementId).jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false,hideFocus:true});
				$("#tab-content-holder .active").hideScroller();
				
				// Loading content into active tabs based on the corresponding anchor click
				var actTab = ($(this).attr('href')).substr(1);
				if($('#'+actTab).find('ul.right-comments li').length <= 1)
					$('#'+actTab).loadData({'tab':actTab});
			}
			
		});
		$('#happening-now a').live('hover',function(e){
			if($(this).hasClass('disabled'))
				$(this).css('color','#65727C !important');
		});
		/* Drop down to show the responses/comments of user on clicking a particular element. */
		$('.happening, .comment').live('click',function(e){
				if(e.target.className == 'know-more' || $(e.target).hasClass('user-small') || e.target.nodeName == 'TEXTAREA' || e.target.nodeName == 'I' || e.target.className == 'delete_quickpost' || e.target.className == 'u-tag' || e.target.className == 'rt')
				{
					if(e.target.className != 'know-more')
						e.preventDefault();
				}
				else
				{	
					e.preventDefault();
					
					//Edited by Venu
					var $this = $(this);
					var response = $this.parents('li').find('.response');
					if(!($this.hasClass('event') || response.hasClass('unfolded')))
					{
						var type = $this.attr('type');
						var id = $this.attr('art_ev_id');
//						$.post('/Blog/Post/getComments', { 'id': id }, 
//								function(data){
//									d = JSON.parse(data);
//									var str = '';
//									$.each(d, function(k, v){
//										str += '<a href="/'+v.CommentedBy+'">'+v.CommentedBy+'</a><br/>'+v.C_Content+'<br/>';
//									});
//									
//									if(str == ''){
//										str = 'No comments';
//									}
//									$this.parent().find('.response .response-content').html(str);
//								}
//						);
					}					
					if(response.hasClass('unfolded') && (e.target.className != 'react' && e.target.className != 'vote' && e.target.className != 'vote-down'))
					{
						var li = response.parent().find('ul.unfold li:first-child').not('.response ul.unfold li:first-child');
						$(e.target).parents('li.list').animate({'margin':'0px'},400,'easeOutExpo');
						li.html("<i class='icon-long-arrow-down'></i>unfold");
						response.slideUp(300);
						response.removeClass('unfolded');
						$(this).parent().next('li').css('border-top','none');
						$(this).parents('li').css('background-color','#FFF');						
					}
					else
					{
						response.slideDown(400);
						response.addClass("unfolded");
						$(e.target).parents('li.list').animate({'margin':'8px 0px'},400,'easeOutExpo');
						var li = response.parent().find('ul.unfold li:first-child').not('.response ul.unfold li:first-child');
						li.html("<i class='icon-long-arrow-up'></i>fold");
						$(this).parents('li').css('background-color','#FAFAFA');
					}
					$(this).parents('.tab-pane').jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false,hideFocus:true});
				}
			});
			
			$('.yes,.no').live('hover',function(e){
				$(this).formatButton({'btn':$(this),'event':e});
			});
			/* Focusing into quick post input field on clicking react button */
			$('.react, .rt').live('click',function(){
				var responseHolder = $(this).parents('li').find('.response');
					$(this).parents('ul.unfold').find('li:first').html("<i class='icon-resize-small'></i> fold");
					if(!responseHolder.hasClass('unfolded'))
					{
						responseHolder.slideDown(400,function(){
							responseHolder.addClass('unfolded');
							if(responseHolder.parents('ul').hasClass('comments'))
							{
								responseHolder.find('#quickpost-form textarea').animate({height:56},'slow','easeOutExpo',function(){$(this).focus();});
							}
							else
								responseHolder.find('.list:first form textarea').animate({height:90},'slow','easeOutExpo',function(){$(this).focus();});
						});
					}
					else
						responseHolder.find('#quickpost-form textarea').focus();
			});
			/*Expand textbox on click*/
			$('.quickpost,.add-comment, #notification-msg, .reaction, .add-rxn').live('click',function(e){
				var $this = $(this);
				if(($this.hasClass('add-comment') || $this.hasClass('add-rxn')) && !($this.hasClass('expanded')))
					$this.animate({height:56},'slow','easeOutExpo',function(){$(this).parent().siblings('div.txt-lmt').fadeIn(300);}).addClass('expanded');
				else if(!(($this.hasClass('add-comment')) && $this.hasClass('expanded')))
					$this.animate({height:90},'slow','easeOutExpo').addClass('expanded');
	
					$("#stream,#suggest").jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false,hideFocus:true});				
			});
			/*
			 * Quickpost vote up button
			 */
			$('.qp_rating').live('click',function(){
        var $this = $(this);
				$.post('/ajax/rateqp',{'qpid':$(this).attr('qpostid')},
          function(d){
					$this.parent().siblings(".number").text(d);
					return false;
				});
			});
			/* resize textbox on blur */
			$('.quickpost,.add-comment, #notification-msg, .reaction, .add-rxn').live('blur',function(e){
				var $this = $(this);
				if($this.val() == '')
				{
					if($this.hasClass('add-comment') || $())
					{
						$this.parent().siblings('.txt-lmt').fadeOut(300);
						$this.animate({height:32},'slow','easeOutExpo');
					}
					else if ($this.attr('id') == 'notification-msg')
						$this.animate({height:48},'slow','easeOutExpo');
					else
						$this.animate({height:32},'slow','easeOutExpo');
					$("#stream,#suggest").jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false,hideFocus:true});
					$this.removeClass('expanded');
				}
			});
			
			/* Delete quickpost on clicking delete button in dropdown list */
			$('.delete_quickpost').live('click',
					function(){
						var delpost = $(this);
						var qpid = delpost.attr('qpid');
						var qpuser = delpost.attr('qpuser');

						$.post('/ajax/deleteqp', { 'qpid': qpid, 'qpusr': qpuser },function(){
							delpost.parents('.happening').parent().remove();
						});
					}
			);
			/* Character counting in quickpost */
			$('.quickpost, .reaction').live('keyup',function(e){
				quickpost = $(this);
				var txt = $(this).val();
				var user = $('#user-nav .usrname').attr('href').substr(1);
				if(e.which == 13)
				{
					if(txt == '')
					{
						return false;
					}
					else
					{
						quickpost.attr({'disabled':'disabled','value':''});
						quickpost.attr({'disabled':'disabled','value':''});
						
						if(quickpost.hasClass('quickpost') && !(quickpost.hasClass('blgtxt')))
						{
							$.post('/ajax/addqp', { "text": txt }, function(qpost){
								$('.qptext').html(qpost);
								txt = qpost;
								quickpost.blur();
							});
						}
						else if(quickpost.hasClass('blgtxt'))
						{
							var pid = quickpost.attr("pid");
							$.post('/ajax/lbaddpost', {"text" : txt, "pid": pid }, function(qpost){
								if(qpost)
								{
									quickpost.animate({height:32},'slow','easeOutExpo');
									quickpost.blur();
								}
							});
						}
						var tmp = txt.split(' ');
						var tmpstr = '';
						var isBlgtxt = quickpost.hasClass('blgtxt');
						var isRxn = quickpost.hasClass('reaction');
						for(var t = 0; t < tmp.length ; t++)
						{
							if((tmp[t]).search('@') != -1)
							{
								tmpstr += "<a class='u-tag' href='/"+(tmp[t].substr(1))+"'>"+tmp[t]+"</a>"+" ";
							}
							else
								tmpstr += tmp[t] + " ";
						}
						var qp = "<li><div class='";
						if(isRxn)
							qp += "span14 offset1";
						else
							qp += "happening posted";
						qp += "'  style='left:0px'><div class='span16'><span class='tmsp ";
						if(isBlgtxt)
							qp += "pull-right span2";
						qp += "'>A few sec ago</span></div><div class='clearfix'></div><p class='span16'><span class='";
						if(isBlgtxt)
							qp += "thumb-holder span1";
						else
							qp += "thumb-holder span3";
						qp += "'><span class='block'><a href='#' class='qpost_rating' qpostid='' qpnum='0'><i class='icon-chevron-sign-up'></i></a></span>" +
								"<span class='block number'>0</span><span class='block txt'>votes</span>";
						qp += "</span><span class='content ";
						if(isBlgtxt)
							qp += "span15 offset1";
						else
							qp += "span12";
						qp += "'><a class='user-small' href='/"+user+"'>"+user+"</a><br/>"+
									"<span class='italicText'>posted</span>"+
									"<span class='content'>"+$.trim(tmpstr)+"</span>"+
								"</span></p><div class='clearfix'></div>";
						if(isBlgtxt && !isRxn)
						{
							qp += "<div class='response span16'>"+
							"<div class='response-holder'><ul>" +
							"<li><textarea rows='1' class='reaction span14 offset1 blgtxt' placeholder='Reply to "+user+"\'s post'></textarea></li>"+
							"</ul></div></div><div class='clearfix'></div></li>";
						}
						qp += "</div>";
						if(isRxn)
							qp += "<div class='clearfix'></div>";
						quickpost.parents('li:first').after(qp);
						e.preventDefault();
						quickpost.removeAttr('disabled');
						$("#stream,#suggest").jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false,hideFocus:true});
					}					
				}
			});
			$('.quickpost').keydown(function(e){
				if(e.keyCode == 13 && !e.shiftKey)
					e.preventDefault();
			});
			/* Scaling images */
			$('#article .tile-image').each(function(){
				var img = $(this);
				setTimeout(function(){
					img.scaleImages({'dw':img.parents('div.image-holder').width(),'dh':img.parents('div.image-holder').height()});
				},300);
			});

			/* Thumbnails scaling and adjustment */
			$('.thumb-holder img').load(function(){
				var thumb_width = $(this).width();
				var thumb_height = $(this).width();
				var scale = 1;
				if(thumb_width > thumb_height)
					scale = thumb_width/48;
				else if(thumb_width < thumb_height)
					scale = thumb_height/48;
				$(this).css({'width': thumb_width/scale, 'height':thumb_height/scale});
				$(this).fadeIn(200);
			});
			/* Functions to run on loading window */
			$(window).load(function(){
				positionPopOver();
			});
			/* Show article stats on hover */
			$('.tile1, .tile2, .tile3,.tile4').live('hover',function(e){
				var $this = $(this);
				var container = $this.find('.article-stats');
				var title = $this.find('.title');
				if(e.type == 'mouseenter')
				{
					var timer = container.data("timer") || 0;
					clearTimeout(timer);
					timer = setTimeout(function(){
						if(title.hasClass('crpd'))
							title.text(title.attr('ttl'));
						$this.find('.heading .hvr-bg').animate({'opacity':1},'slow','easeOutExpo',function(){container.fadeIn(300);});
						$this.find('.heading').animate({'height':'100%'},'slow','easeOutExpo');
					},300);
					container.data("timer",timer);
				}	
				else
				{
					var width = '35%';
					if(screen.width < 1199)
						width = '50%';
					
					var timer = container.data("timer") || 0;
					container.fadeOut(300,function(){
						$this.find('.heading .hvr-bg').animate({'opacity':0},'slow','easeInExpo');
						$this.find('.heading').animate({'height':'40%'},'slow','easeInExpo',function(){
							if(title.hasClass('crpd'))
								title.text(title.attr('ttl').substr(0,35)+'...');
						});
					});
					clearTimeout(timer);
				}
			});
			/*Adjust height of left-bar to screen height */
			$('#main-content-box,#aux-content-box').css('height',($(window).height()-100));
			$('#stream,#posts,#reactions,#context').css('height',($(window).height()-150));
			/*Animate left-bar on button click */
			$('.more a').click(function(e){ 
				e.preventDefault();
				var margin = $('#left-bar').width();
				var cb = $('#aux-content-box');
				var eb = cb.find('#aux-events-box');
				eb.find('ul li').remove();
				$('#aux-events-box, #aux-articles-box, #aux-attending-data,#aux-invited-data,#invite-box').css('display','none');
				if($(this).hasClass('t-evts'))
				{
					eb.css('display','inline-block');
					eb.find('h3').text("All today's events");
					// For displaying today's events
					var ctgy = $(location).attr('href').split('/'); 
					$.post('/ajax/ldmreevnts', { 'type': 'T', 'ctgy': ctgy[3] }, function(d){
						populateEvents(d);
						eb.find('ul.main-list li').animateElements();
					});
				}
				else if($(this).hasClass('u-evts'))
				{
					$('#aux-events-box').css('display','inline-block');
					eb.find('h3').text("All upcoming events");
					//For displaying upcoming events
					var ctgy = $(location).attr('href').split('/'); 
					$.post('/ajax/ldmreevnts', { 'type': 'U', 'ctgy': ctgy[3] }, function(d){
						populateEvents(d);
						eb.find('ul.main-list li').animateElements();
					});
				}
				else if($(this).hasClass('articles'))
					$('#aux-articles-box').css('display','inline-block');
				else if($(this).hasClass('attending'))
					$('#aux-attending-data').css('display','block');
				else if($(this).hasClass('invited'))
					$('#aux-invited-data').css('display','block');
				$('#aux-content-box').slideLeftBar({'direction' : 'left','margin':margin});
				cb.$('#aux-content-box ul.main-list li').animateAuxContent();
			});
			$('#back').click(function(){
				$('#main-content-box').slideLeftBar({'direction':'right'});
				$('#main-content-box ul.main-list li').animateElements();
			});
			
			function populateEvents(d)
			{
				var data = JSON.parse(d);
				var str = '';
				for(var i = 0; i < data.length ; i++)
				{
					var date = $(this).getDateTime(data[i].E_Time);
					var color = '';
					switch(data[i].E_Category)
					{
						case 'Politics':
							color = 'orange';
							break;
						case 'Technology':
							color = 'yellow';
							break;
						case 'Sports':
							color = 'blue';
							break;
						case 'Entertainment':
							color = 'red';
							break;
						default:
							color = 'green';
							break;
					}
					str = "<li class='list'>" +
							"<div class='task event " + color +"'>" +
							"<a href='/Events/" +data[i].E_Category+"/"+data[i].E_SubCategory+"/"+data[i].E_Title_ID+"'>" +
								"<div>" +
									"<h2>"+data[i].E_Title+"</h2>" +
									"<p>" +
										 date.d + ", " + date.t + "<br/>" + data[i].E_Location +
									"</p>"+
								"</div>" +
							"</a>"+
							"</div>" +
						   "</li>";
					$('#aux-events-box').find('ul.main-list').append(str);
					$('#aux-content-box').jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false});
				}
			}
			function positionPopOver()
			{
				var offSet = $("#right-bar #context .quickpost-form").position();
				var left = ($('#qp-popover').width()+13);
				if($(window).width() >= 1360)
					$('#qp-popover').css({'top':'85px','left':left,'display':'block','width':130});
			}
			
			$('.search-query').keyup(function(e){
				
				var txt = $(this).val();
				
				if(e.which == 13)
				{
					window.location = '/Search/'+txt;
				}
			});
			
		});