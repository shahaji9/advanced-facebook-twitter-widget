/*
    Frontend Javascript
    Created on : 23 December, 2016, 11:53:40 AM
    Author     : Shahaji Deshmukh
*/
(function ($) {
    
    $(document).ready(function () {
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.async = true;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=" + sdftvars.app_id;
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));                
    });

    // Facebook twitter feeds functionality works after page load
    $(window).load(function () {
        
        $('.widget-loader').hide();
        $('#fbtw-facebook-timeline, #fbtw-twitter-timeline').show();
    });
})(jQuery);
