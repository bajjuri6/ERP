$(document).ready(function(){	
	// For all event related
	var variables = {
			user : '',
			nxpg : 2,
			loading : false,
			prevNws : 7,
			prevCnt : 0,
			prevtp : 'All',
			prevTab : '',
			prevPst : 10,
			newTab : false
	};
	
	//For event related data in right pane
	function ldevt(data,to)
	{
		var ev = {
			auth : '',
			dt : '',
			mth : '',
			tm : '',
			lc : '',
			id : '',
			url : '',
			tag: '',
			tl : '',
			ctgy : '',
			tmsp : ''
		};
		var	content = $.parseJSON(data.QP_Content);
		var link = (data.QP_Url).split("/");
		var date = $(to).getDateTime(content.date);
		ev.auth = data.QP_User;
    ev.authFullName = data.QP_User_FullName;
		ev.url = data.QP_Url;
		var d = date.d.split(' ');
		ev.dt =  d[1];
		ev.mth = d[0].toUpperCase();
		ev.tm = date.t;	
		ev.lc = content.loc;
		ev.id = data.Article_Event_ID;
		ev.tmsp = data.QP_Timestamp;
		var btns = '';
		switch(data.QP_Tag)
		{
			case 'I':
				ev.tag = 'invited you to';
				btns = "<button type='button' class='btn btn-success yes accept span7 offset1'>Accept</button><button type='button' class='btn no decline span7'>Decline</button>";
				break;
			case 'A':
				ev.tag = 'is attending';
				btns = "<button type='button' class='btn btn-success yes join span8 offset4'>Join</button>";
				break;
			case 'C':
				ev.tag = 'created an event';
				btns = "<button type='button' class='btn btn-success yes join span8 offset4'>Join</button>";
        break;
      case 'CM':
				ev.tag = 'commented on event';
				btns = "<button type='button' class='btn btn-success yes join span8 offset4'>Join</button>";
        break;
      case 'CC':
				ev.tag = 'replied to your comment in';
				btns = "<button type='button' class='btn btn-success yes join span8 offset4'>Join</button>";
        break;
      case '@':
        ev.tag = 'mentioned you in event';
        break;
      case '@C':
        ev.tag = 'mentioned you in comment';
        break;
		}
    
    if( (to == 'context') && (data.QP_Tag == 'CC') ){
      return 0;
    }
    
    if( (to == 'stream') && (data.QP_Refer_To == '') && (data.QP_Tag == 'CC') && (variables.user == data.QP_Article_Event_Owner)){
      return 0;
    }
    
    if((to == 'reactions'  && data.QP_Tag == 'CM' ) || ((variables.user == data.QP_Article_Event_Owner) && (data.QP_Tag != 'CC') && (data.QP_Tag != 'C'))){
       
      ev.tag = 'commented on your event';
    }
    else if( to == 'stream' && data.QP_Refer_To == '' && data.QP_Tag == 'CC'){
      ev.tag = 'replied to comment';
    }
    
		
		ev.ctgy = link[2];
		
		if(data.E_Attending == null){
			ev.evtgng = 0;
		}
		else if(data.E_Attending.indexOf(',')){
			evtgngtmp = data.E_Attending.split(',');
			ev.evtgng = evtgngtmp.length;
		}
		else{
			ev.evtgng = 1;
		}
    
    var txt = content.ttl;
    if(to == 'reactions'){
      txt = content.cmnt;
    }
    
		switch(ev.ctgy)
		{
			case 'Politics':
			case 'Technology':
			case 'Sports':
			case 'Entertainment':
				cls = ev.ctgy; break;
			default:
				cls = 'Multiple'; break;
		}
    
    var ld = "<li class='list'><div class='happening event' data="+ev.url+">" +
					"<span class='tmsp italicText' tmsp='"+ev.tmsp+"'></span>"+
					"<p class='span16'>" +
					"<span class='thumb-holder cal span3'><span class='block mth "+cls+"'>"+ev.mth+"</span><span class='block number'>"+ev.dt+"</span></span>"+
						"<span class='pull-right content span12'>" +
							"<a href='/"+ev.auth+"' class='user-small'>"+ev.authFullName+"</a><br>"+
							"<span class='italicText'>"+ev.tag+"</span>"+
							"<span class='content'>"+txt+"</span>"+
						"</span>"+
						"<ul class='unfold span16'>" +
							"<li class='unfold-ul span4'><i class='icon-long-arrow-down'></i> unfold</li>";
						if(to != 'reactions')
							ld += "<li class='hideElement span4'><a class='know-more' href='"+ev.url+"'><i class='icon-chevron-right'></i>Know more</a></li>";
						
					ld +="</ul>"+
					"</p>"+
				 "<div class='clearfix'></div></div>" +
				 "<div class='response'><div class='response-holder'>" +
				 "<div class='response-content'  eventid='"+ev.id+"'>";
				if(to != 'reactions')
				{
					ld += "<p class='span16'><span class='thumb-holder span3'>" +
							 "<span class='num'>"+ev.evtgng+"</span> going</span><span class='pull-right content span12'>" +
							 "<span class='location'>"+ev.lc+"</span>" +
							 "<span class='date'>"+ev.mth + " "+ev.dt+", "+ ev.tm+"</span>" +
						  "</span></p>";
				}
				if(to == 'stream')
				{
					ld += btns;
				}
		ld +=	 "<div class='clearfix'></div>"+
				 "</div></div></div></li>";
		return ld;
	}
	
	// For published, vote up, and article related
	function ldpblsh(data,to)
	{
		var pb = {
				auth : '',
				img : '',
				id : '',
				url : '',
				tag: '',
				tl : '',
				rxn : '',
				rtg : '',
				tmsp : ''
		};
		pb.img = data.QP_Featured_Image;
			pb.auth = data.QP_User;
      pb.authFullName = data.QP_User_FullName;
			switch(data.QP_Tag)
			{
				case 'W':
					pb.tag = 'published an article';
					break;
				case 'CM':
					pb.tag = 'commented on article';
					break;
				case 'V' :
					pb.tag = 'voted up article';
					break;
				case 'CC':
					pb.tag = 'replied to your comment in';
					break;
        case '@':
					pb.tag = 'mentioned you in article';
					break;
        case '@C':
					pb.tag = 'mentioned you in comment';
					break;
			}
			
      var	content = $.parseJSON(data.QP_Content);
      pb.ttl = content.ttl;
			if(data.P_Reactions)
				pb.rxn = data.P_Reactions;
			else
				pb.rxn = 0;
			if(data.P_Rating)
				pb.rtg = data.P_Rating;
			else
				pb.rtg = 0;
			pb.url = data.QP_Url;
			pb.id = data.Article_Event_ID;
			pb.tmsp = data.QP_Timestamp;
      
      if( to == 'stream' && data.QP_Refer_To == '' && data.QP_Tag == 'CC' && (variables.user == data.QP_Article_Event_Owner)){
        return 0;
      }
      
      if( (to == 'stream') && (data.QP_Tag == 'V') && (variables.user == data.QP_Article_Event_Owner)){
        pb.tag = 'voted up your article';
      }
      
      if((to == 'reactions'  && data.QP_Tag == 'CM' ) || ((variables.user == data.QP_Article_Event_Owner) && (data.QP_Tag != 'CC') && (data.QP_Tag != 'W') && (data.QP_Tag != 'V'))){
        pb.tag = 'commented on your article';
      }
      else if( to == 'stream' && data.QP_Refer_To == '' && data.QP_Tag == 'CC'){
        pb.tag = 'replied to comment in';
      }
      
			var txt = content.ttl;
      if(to == 'reactions'){
        txt = content.cmnt;
      }
      
			var attrib = '{"ar_ev_id":"'+pb.id+'"}';
			var ld = "<li class='list'><div class='happening published' data ='"+attrib+"'>" +
					"<span class='tmsp italicText' tmsp='"+pb.tmsp+"'></span>"+
					"<p class='span16'>" +
					"<span class='thumb-holder span4 img-cnt'><img src='/public/Multimedia/Thumb_"+pb.img+"' /></span>"+
						"<span class='content span12'>" +
							"<a href='/"+pb.auth+"' class='user-small'>"+pb.authFullName+"</a><br>"+
							"<span class='italicText'>"+pb.tag+"</span>"+
							"<span class='content'>"+txt+"</span>"+
						"</span>"+
						"<ul class='unfold span16'>" +
							"<li class='unfold-ul span4'><i class='icon-long-arrow-down'></i> unfold</li>";
						if(to != 'reactions')
						{
							ld += "<li class='rct-display hideElement span4'>"+pb.rxn+" Reactions</li>" +
									"<li class='rct-display hideElement span4'>"+pb.rtg+" Votes</li>"; 
						}
						else
						{
							ld += "<li class='rct-btn hideElement'><a href='#'>React</a>"+"("+pb.rxn+")";
						}
					ld +="<li class='hideElement span4'><a href='"+pb.url+"' class='know-more'><i class='icon-chevron-right'></i>Read more</a></li>" +
							"</ul>"+
					"</p>"+
				 "<div class='clearfix'></div></div>" +
				 "<div class='response'>"+
					"<ul class='res-list'>" +
						"<li class='list'>" +
						"<form name='quickpost-form' class='quickpost-form'>" +
						"<textarea class='reaction span16' rows='1' placeholder='respond to "+pb.authFullName+"&#39;s reply'></textarea>" +
						"</form>" +
						"</li>"+
					"</ul>"+
				"</div>"+
				 "</li>";
		return ld;
	}
	
	// For all quickposts and reactions
	function ldqp(str,to)
	{
		var rating = 0;
		if(str.QP_Rating != null)
			rating = str.QP_Rating;
		var rxns = 0;
		if(str.P_Reactions != null)
			rxns = str.P_Reactions; 
		
		var ld = "<li class='list'><div class='happening posted'><span class='tmsp italicText' tmsp='"+str.QP_Timestamp+"'>few sec ago</span>";
					if(variables.user == str.QP_User)
					{
						ld += "<ul class='dropdown pst-stng hideElement'><a class='dropdown-toggle' data-toggle='dropdown' href='#'><i class='icon-cog'></i></a>" +
								"<ul class='dropdown-menu pull-right'><li><a href='#' class='delete_quickpost' qpid='"+str.QP_ID+"' qpuser='"+str.QP_User+"'>Delete</a></li></ul>"+
							  "</ul>";
					}	
				ld += 	"<p class='span16'>" +
							"<span class='thumb-holder span3'>" +
							"<span class='block'><a href='#' class='qp_rating' qpostid='"+str.QP_ID+"' qpnum='"+rating+"'><i class='icon-chevron-sign-up'></i></a></span>" +
							"<span class='block number'>"+rating+"</span><span class='block txt'>votes</span>"+
							"</span>"+
							"<span class='content span12'>" +
								"<a href='/"+str.QP_User+"' class='user-small'>"+str.QP_User_FullName+"</a><br>"+
								"<span class='italicText'>posted</span>"+
								"<span class='content'>"+str.QP_Content+"</span>"+
							"</span>"+
							"<ul class='unfold span16'>" +
								"<li class='unfold-ul span4'><i class='icon-long-arrow-down'></i> unfold</li>"+
								"<li class='rct-display span4'>"+rxns+" Reactions</li>"+
								"<li class='rct-btn hideElement span4'><a href='#'>React</a>("+rxns+")</li>"+
							"</ul>"+
						"</p>"+
					 "<div class='clearfix'></div></div>" +
					 	"<div class='response'><div class='response-holder'>"+
							"<ul class='res-list'>" +
								"<li>Coming Soon.. :D</li>"+
							"</ul>"+
						"</div></div></li>";
		return ld;
	}
	
	function isJSON(str)
	{
		try
		{
			JSON.parse(str);
		}
		catch(e)
		{
			return false;
		}
		return true;
	}
	
	function ldElem(parent,options)
	{
		var str = '';
		var reqPst = 5;
		newtab = false;
		if($('#user-nav .usrname').text())
		{
			if(variables.prevTab != options.tab)
			{
				variables.prevTab = options.tab;
				variables.prevPst = 0;
				if(options.tab == 'posts')
					reqPst = 5;
				else
					reqPst = 10;
				newtab = true;
			}
			else
			{
				reqPst = 5;
				variables.prevPst += reqPst;
			}
			
			var sendData = {'tab' : options.tab,'cnt':reqPst,'prevCnt':variables.prevPst};
			if(options.tab == 'context')
			{
				if(options.usr)
					sendData.usr = options.usr;
				
				sendData.htg = options.htg;
			}
			
			$.ajax({
				url : '/ajax/rightpane',
				async : true,
				data : sendData,
				dataType : 'json',
				type : 'post',
				beforeSend : function() {
				},
				success : function(data) {
					console.log(data);
					if(data.length)
					{
						for(var i = 0; i < data.length ; i++)
						{
							switch(data[i].QP_Type)
							{
								case 'E' :
					                var tmp = ldevt(data[i],options.tab);
					                if(tmp != 0 )
					                  str += tmp;
									break;
								case 'A' :
					                tmp = ldpblsh(data[i],options.tab);
					                if(tmp != 0 )
					                  str += tmp;
									break;
								case 'Q' :
									str += ldqp(data[i]);
									break;
							}
						}
					}
				},
				complete : function() {
					if(newtab && variables.prevTab != 'posts')
						variables.prevPst += 5;
					if(parent.find('ul.right-comments li').length == 1)
					{
						parent.find('ul.right-comments').append(str);
						parent.find('.tmsp').each(function(){$(this).updateTime({'ts': $(this).attr('tmsp')});});
						parent.jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false});
						parent.find('.jspVerticalBar').hide();
					}
					else
					{
						parent.find('ul.right-comments').append(str);
						parent.find('.tmsp').each(function(){$(this).updateTime({'ts': $(this).attr('tmsp')});});
						parent.jScrollPane({autoReinitialize:true,verticalGutter:5,showArrows:false});
					}
					if(variables.prevPst <= 10)
						$('.tab-content').find('.active .happening').animateElements();
				}
			});
			return true;
		}
	}
	
	$.fn.loadData = function(options) {
		variables.user = $('#user-nav .usrname').attr('href').substr(1);
		var loaded = ldElem($(this),options);
		return loaded;
	};
	$.fn.extend({
		addNews : function(options) {
			if(!variables.loading && $(this).find('.tile-holder').length)
			{
				variables.loading = true;
				var tb = Math.ceil(Math.random()*4);
				var pstcnt = 0;
				switch(tb)
				{
					case 1 : 
					case 4 :
						pstcnt = 3; break;
					case 2 : 
						pstcnt = 2; break;
					case 3 :
						pstcnt = 1; break;
				}
				if(variables.prevtp != options.cgry)
				{
					variables.prevtp = options.cgry;
					variables.prevNws = 7;
				}
				else
					variables.prevNws += variables.prevCnt;
				var tiles = '';
				if(options.cgry == 'Articles')
					$('#usr-pg').append("<img class='loading' src='/public/images/loading.gif' />");
				else
					$('#news-bar').append("<img class='loading' src='/public/images/loading.gif' />");
				$.ajax('/ajax/loadNewsTiles',{
					dataType : 'json',
					async : true,
					type : 'post',
					data : {"page":variables.nxpg,"category":options.cgry,'cnt':pstcnt, 'pc':variables.prevNws,'usr':options.usr},
					beforeSend : function() {
						if(options.cgry == 'Articles')
							$('#usr-pg').find('img.loading').positionElement({'parent': $('#usr-pg'), 'top': false});
						else
							$('#news-bar').find('img.loading').positionElement({'parent': $('#news-bar'), 'top': false});
					},
					success : function(posts){
						if(posts.length > 0)
						{
							switch(posts.length)
							{
								case 1 : tiles = gentile3(posts); break;
								case 2 : tiles = gentile2(posts); break;
								case 3 :
									var ts = Math.ceil(Math.random()*2);
									if(ts == 1)
										tiles = gentile1(posts);
									else
										tiles = gentile4(posts);
									break;
							}
						}
					},
					complete : function(){
						if(options.cgry == 'Articles')
						{
							$('#usr-pg').find('img.loading').remove();
							$('#usr-pg').append('<div id="page'+variables.nxpg+'">'+tiles+'</div>');
							scaleImages($('#usr-pg'));
						}
						else
						{
							$('#news-bar').find('img.loading').remove();
							$('#news-bar').append('<div id="page'+variables.nxpg+'">'+tiles+'</div>');
							scaleImages($('#news-bar'));
						}
					 	scaleImages($('#page'+variables.nxpg));
					 	variables.nxpg++;
					 	variables.prevCnt = pstcnt;
						variables.loading = false;
					}
				});		
			}
		},
		loadNews : function(options) {
			var tiles = '';
			var usr = options.usr;
			var tiles = '';
			if(/^[a-zA-Z0-9- ]*$/.test(options.cgry) == false) {
				options.cgry = '';
			}
			if(options.cgry == 'Articles')
				$('#usr-pg').append("<img class='loading' src='/public/images/loading.gif' />");
			else
				$('#news-bar').append("<img class='loading' src='/public/images/loading.gif' />");
			$.ajax('/ajax/loadNewsTiles',{
				data : {'page':1,'category':options.cgry,'cnt':7,'pc':0,'usr':usr},
				dataType : 'json',
				async : true,
				type : 'post',
				beforeSend : function() {
					if(options.cgry == 'Articles')
						$('#usr-pg').find('img.loading').positionElement({'parent': $('#usr-pg'), 'top': false});
					else
						$('#news-bar').find('img.loading').positionElement({'parent': $('#news-bar'), 'top': false});
				},
				success : function(data) {
					switch(data.length)
					{
						case 1:
							tiles = gentile3(data);
							break;
						case 2 :
							tiles = gentile2(data);
							break;
						case 3 :
							tiles = gentile1(data);
							break;
						case 4 : 
							tiles = gentile1(data.slice(0,3));
							tiles += gentile3(data.slice(3));
							break;
						case 5 :
							tiles = gentile1(data.slice(0,3));
							tiles += gentile2(data.slice(3));
							break;
						case 6 :
							tiles = gentile1(data.slice(0,3));
							tiles += gentile3(data.slice(3,4));
							tiles += gentile2(data.slice(4));
							break;
						case 7 :
							tiles = gentile1(data.slice(0,3));
							tiles += gentile3(data.slice(3,4));
							tiles += gentile4(data.slice(4));
							break;	
					}
				},
				complete : function() {
					if(options.cgry == 'Articles')
					{
						$('#usr-pg').find('img.loading').remove();
						$('#usr-pg').append(tiles);
						scaleImages($('#usr-pg'));
					}
					else
					{
						$('#news-bar').find('img.loading').remove();
						$('#news-bar').append(tiles);
						scaleImages($('#news-bar'));
					}
				}
			});
		},
		updateTime : function(options) {
			var tmsp = new Date((options.ts)*1000);
			var td = new Date();
			var diff = Math.floor((td.getTime()-tmsp.getTime())/1000);
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
			
			if(diff < 60)
				$(this).text(diff + 'sec ago');
			else if(diff >= 60 && diff < 3600)
			{
				var tmp = Math.floor(diff/60);
				if(tmp == 1)
					$(this).text('A min ago');
				else
					$(this).text(tmp + 'min ago');
			}
			else if(diff >= 3600 && diff < 86400)
			{
				var tmp = Math.floor(diff/(60*60))
				if(tmp == 1)
					$(this).text('An hr ago');
				else
					$(this).text(tmp+ 'hrs ago');
			}
			else if(diff >= 86400 && diff < 2592000)
			{
				var tmp = Math.floor(diff/(60*60*24));
				if(tmp == 1)
					$(this).text('A day ago');
				else
					$(this).text(tmp + 'days ago');
			}
			else
			{
				$(this).text(month[tmsp.getMonth()] + " " + tmsp.getDate() + ", " + tmsp.getFullYear());
			}
		}
	});
	function gentile1(posts)
	{
		var tiles = '<div class="tile-holder">';
		for(var t = 0; t <= 2 ; t++)
		{
			if(t == 1)
				tiles += genTile(1,posts[t],'admrgn');
			else
				tiles += genTile(1,posts[t]);
		}
		tiles += "<div class='clearfix'></div></div>";
		return tiles;
		
	}
	
	function gentile2(posts)
	{
		var tiles = "<div class='tile-holder'>";
		for(var t=0;t<=1;t++)
		{
			if(t == 0)
				tiles += genTile(2,posts[t]);
			else
				tiles += genTile(1, posts[t]);
		}
		tiles += "<div class='clearfix'></div></div>";
	 	return tiles;
	}
	
	function gentile3(posts)
	{
		var tiles = "<div class='tile-holder'>";
		tiles += genTile(3, posts[0]);
		tiles += "<div class='clearfix'></div></div>";
	 	return tiles;
	}
	
	function gentile4(posts)
	{
		var tiles = "<div class='tile-holder'>";
		for(var t = 0; t <= 2 ; t++)
		{
			if(t == 0)
				tiles += genTile(4, posts[t]);
			else
				tiles += genTile(1, posts[t]);
		}
		tiles += "<div class='clearfix'></div></div>";
	 	return tiles;
	}
	
	function genTile(tilenum,post,mrgn)
	{
		var pst = $.parseJSON(post);
		if(!mrgn)
			var mrgn = '';
		else
			mrgn = 'ad-mrgn';
		var tct = '';
		var tclr = '';
		switch(post.P_Category)
		{
			case 'Technology' :
				tct= 'Tech';
				tclr = 'Technology';
				break;
			case 'Entertainment' :
				tct = 'Page 3';
				tclr = 'Entertainment';
				break;
			case 'Sports':
			case 'Politics':
				tct = post.P_Category;
				tclr = post.P_Category;
				break;
			default :
				tct = post.P_Category;
				tclr= 'multiple';
				break;
		}
		var title = post.P_Title;
		var tile = '<div class="tile tile'+tilenum+' '+mrgn+'"><a href="/'+post.P_Category+'/'+post.P_SubCategory+
		'/'+post.P_Title_ID+'">'+
		'<img class="tile-image" src="/public/Multimedia/'+post.P_Feature_Image+'" />'+
		'<span class="shw-cgry '+tclr+'">'+tct+'</span>'+
		'<div class="heading"><div class="hvr-bg"></div>'+
			'<div class="title';
		if(title.length > 45 && tilenum == 1)
			tile += ' crpd';
		tile += '" ttl="'+post.P_Title+'">';
		if(title.length > 45 && tilenum == 1)
				title = title.substr(0,35) + '...';
		tile +=	title+'</div><div class="italicText"><a href="/'+post.P_Author+'" class="author"><i class="icon-circle '+tclr+'-i"></i> '+post.P_Author+'</a></div></div><div class="he-bg"></div></a>'+
			'<ul class="article-stats row-fluid">'+
			'<li class="pull-left"><a href="#"><i class="icon-comment-alt"></i><span class="num">'+post.P_Num_Comments;
		if(tilenum != 1)
			tile += ' Comments';
		tile += '</span></a></li>'+
				'<li class="pull-left"><a href="#"><i class="icon-calendar"></i><span class="num">'+post.P_Num_Events;
		if(tilenum != 1)
			tile += ' Events';
		tile += '</span></a></li>'+
				'<li class="pull-left"><a href="#"><i class="icon-book"></i> Read Later</a></li>'+
			'</ul>'+
	'</div>';
		return tile;
	}
	
	function scaleImages(parent)
	{
		parent.find('.tile-image').each(function(){
			$(this).load(function(){$(this).scaleImages({'dw':$(this).parents('div').width(),'dh':$(this).parents('div').height()});});
		});
	}
});