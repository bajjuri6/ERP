function fetchform(heading, url){
    
/**
 * Fetch the form that was requested via an AJAX call
 * Populate popupbox with the fetched form
 */
var head = "<div class='popHead'>"+heading+"</div>";
$.post(url,
      { },
      function(data){
        if( data ){
          if(data == "login"){
            head = "<div class='popHead'>Login</div>";
            $.post('/Poplogin',
                   { },
                   function(data){
                      $("#popupbox").html(head + "<div class='popBody'>\n\
                                                 Your session has expired. \n\
                                                 Please login again to continue"+ 
                                                 data +"</div>");
            });

          }else{
            $("#popupbox").html(head + "<div class='popBody'>"+ data +"</div>");

          }

        }

        else
          $("#popupbox").html("Could not fetch requested form. <br /> \n\
                              Please check you internet connection and try again");
      });

popupPanel = $("#popupbox");

/**
 * Calculate the position of the popup
 */
var width = popupPanel.width();
var winWidth = $(window).width();
var left = (winWidth - width)/2;

/**
 * Fix the position of the pop-up relative to the window
 */
popupPanel.css('left',left);
popupPanel.css('top',120);
//popupPanel.css('height',320);

/**
 * Bring up the tansparent grey background and the popup
 */
$('#lightbox').fadeIn(250);
popupPanel.fadeIn(300);
return;
}


