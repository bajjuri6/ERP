$(document).ready(function(){
			/* Scroll bar */
			$('#main-content-box,#stream').jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false});
			var loading = false;
			/* Dynamic loading of data into stream on right bar when user hits the bottom of the corresponding pane. */
			$('.tab-pane').bind('jsp-arrow-change',
				function(event, isAtTop, isAtBottom, isAtLeft, isAtRight)
				{
					var id = $(this).attr('id');
					if(isAtBottom && !loading)
					{
						loading = true;
						loading = !($(this).loadData({'tab':id}));
					}
				});
			/* Hiding scroller */
			$('#main-content-box,#stream').hideScroller();
			$('#right-bar .navbar i').positionElement({'parent': $('#right-bar .navbar li.menu'), 'top': false});
			$('#right-bar .navbar ul li').click(function(){
				if(!$(this).find('a').hasClass('disabled'))
				{
					$(this).parent().find('i.icon-caret-up').addClass('hideElement');
					$(this).find('i').removeClass('hideElement');
				}
			});
			
			/* Search Bar animation */
			var inWdth = $('#srch-hdr').width();
			var toLft = $('#menubar').width();
			$('#srch-cls').css({'left':(toLft+15)+'px'});
			$('#srch-br').css({'left': inWdth+'px'});
			/*Show search bar */
			$('.s-icon').click(function(e){
				e.preventDefault();
				$(this).addClass('transparent');
				$('#menubar').find('.menu').addClass('transparent');
				$('.search-query').animate({opacity:1,'width':(toLft-inWdth-10)},'slow','easeOutExpo').focus();
				$('#srch-br').animate({'left': '-'+(toLft)},'slow','easeOutExpo', function(){
					$('#srch-cls').removeClass('transparent');
				});
				$(this).addClass('act');
			});
			
			$('#srch-cls').click(function(e){
				$(this).addClass('transparent');
				e.preventDefault();
				$('.s-icon').removeClass('transparent');
				$('.search-query').animate({opacity:0,'width':inWdth},'slow','easeOutExpo').val('');
				$('#srch-br').animate({'left': inWdth},100,'easeOutExpo', function() {
					$('#menubar').find('.menu').removeClass('transparent');
				});
			});
			/* Hide Search Bar */
			/* Form validations for empty fields */
			$('#newArticleForm, #login-form').submit(function(){
				var brk = 0;
				$(this).find("input[type='text'],input[type='password'],textarea, select").each(function(){
					if($(this).css('display') != 'none')
					{
						$(this).removeClass('error');
						if($(this).val() == '' || $(this).val() == 0)
						{
							$(this).addClass('error');
							brk = 1;
							return false;
						}
						else
							brk = 0;
						
					}
				});
				if(brk == 1)
				{
					$('.alert').printError('None of the fields can be empty');
					$(this).effect('shake',{times:3,distance:5},300);
					return false;
				}
			});		
			
			$(window).scroll(function(){
				
				if($('div.new-container').hasClass('container-dropped') && $(window).scrollTop() != 0)
				{
					$('#ui-datepicker-div').css('display','none');
					$('div.new-container').slideUp(400,'easeOutExpo',function(){});
				}
				else if($(window).scrollTop() == 0 && $('div.new-container').hasClass('container-dropped'))
				{
					$('div.new-container').slideDown(400,'easeOutExpo',function(){});
				}
				
			});
			
			// Datepicker plugin for date input field
			$('#newArticleForm #datepicker-date').datepicker({
				dateFormat:'dd/mm/yy',
				minDate : new Date(),
			});
			
		/*
		 * Loading first 7 news items based on the corresponding page
		 */
			var lc = ((window.location).toString()).split('/');
			if(lc.length == 4)
			{
				switch(lc[3])
				{
					case 'Politics':
					case 'Technology':
					case 'Entertainment':
					case 'Sports':
						$('#news-bar').loadNews({'cgry':lc[3]});
						break;
					case '':
						$('#news-bar').loadNews({'cgry':'All'});
						break;
				}
			}
		/* Load additional tiles when the user hits the bottom of the page */
			$(window).scroll(function(){
				if($('body').height() <= ($(window).height() + $(window).scrollTop()) && $('#news-bar').length)
				{
					switch(lc[3])
					{
						case 'Politics' :
						case 'Technology':
						case 'Entertainment':
						case 'Sports':
							$('#news-bar').addNews({'cgry':lc[3]});
							break;
						case '':
							$('#news-bar').addNews({'cgry':'All'});
							break;
					}
				}
			});
			/*
			 * Loading notifications when user clicks the notification button
			 */
			$('#usr-ntfy').find('img').positionElement({'parent': $('#usr-ntfy'), 'top': false});
			var loaded = false;
			$('#notify').click(function(){ 
				var usr = ($('#user-nav .usrname').attr('href')).slice(1);
				var str = '';
				if(!loaded){
					$.ajax('/ajax/getnotifications',{
						data : {},
						type : 'post',
						beforeSend : function() {
						},
						success : function(ndata) {
							d = $.parseJSON(ndata);
							var len = 5;
							if(!d.length)
								$('#usr-ntfy').append('<li class="nontf">No notifications</li>');
							else
							{
								if(d.length < 5)
									len = d.length;
								
								for(var i = 0; i < len; i++)
								{
									if(d[i].N_Article_Event_Title)
									{
										str += "<li>" +
										"<div>"+
											"<a href='/"+d[i].N_Author+"' class='user-small'>"+d[i].N_Author+"</a>";
										
										if((d[i].N_Article_Event_Title).length > 40)
											var tmptl = (d[i].N_Article_Event_Title).substr(0,40)+'...';
										else
											var tmptl = (d[i].N_Article_Event_Title); 
										if(d[i].N_Type == 'Article')
										{
											var tmp = (d[i].N_Content).split('your');
											str += "<div class='italicText'>"+tmp[0]+" <a href='"+d[i].N_Link+"'> your article</a></div>"+
													"<div class='content'><a href='"+d[i].N_Link+"'>"+tmptl+"</a></div>";
										}
										else if(d[i].N_Type == 'Comment')
										{
											str += "<div class='italicText'>"+d[i].N_Content+"</div><div class='content'><a href='"+d[i].N_Link+"'>"+
											d[i].N_Article_Event_Title+"</a></div>";
										}
										else if(d[i].N_Type == 'Event Notification')
										{
											str += "<div class='italicText'>sent you a message about</div><div class='content'><a href='"+d[i].N_Link+"'>"+
											d[i].N_Article_Event_Title+"</a></div>";
										}
										else
										{
											var tmp = (d[i].N_Content).split('you');
											switch($.trim(tmp[0]))
											{
											case 'attending':
											case 'not attending':
											case 'invited':
												str += "<div class='italicText'>"+d[i].N_Content+"</div><div class='content'><a href='"+d[i].N_Link+"'>"+tmptl+"</a></div>";
												break;
											case 'responded to' :
												str += "<div class='italicText'>"+tmp[0]+ " <a href='"+d[i].N_Link+"'> your event</a></div><div class='content'>"+
												"<a href=''>"+tmptl+"</a></div>";
												break;
											case 'mentioned':
												str += "<div class='italicText'>"+d[i].N_Content+"</div><div class='content'><a href='"+d[i].N_Link+"'>"+
												tmptl+"</a></div>";
											}
										}
										str +=	"</div><div class='clearfix'></div></li>";
									}
								}
							}
						},
						complete : function() {
							$('#usr-ntfy').find('img.loading').remove();
							if(str != '')
							{
								$('#usr-ntfy').append(str).slideDown(1000, function(){
									$('#usr-ntfy li:last').after("<li class='vw-mr'><a href='/"+usr+"/Notifications'>view more</a><div class='clearfix'></div></li>");
								});
							}
							loaded = true;
						}
					});
				}
			});
			/*
			 * Update timestamp every minute
			 */
			$('.tmsp').each(function(){
				$(this).updateTime({'ts':$(this).attr('tmsp')});
			});
			setInterval(function(){
				$('.tmsp').each(function(){
					$(this).updateTime({'ts':$(this).attr('tmsp')});
				});
			}, 60000);
              /*Main top Dropdown Sub Category hide on mouse/window scroll*/
               window.onscroll = function () {
            	   $('.ui-autocomplete').hide();
                };
               /*Dropdown Sub Category zIndex on top */   
                $('.ui-autocomplete').css('zIndex',3000);
		});