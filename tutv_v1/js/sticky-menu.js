jQuery(document).ready(function($) {
  var TopFixMenu = $("#sticky-menu");
    $(window).scroll(function(){
        if($(this).scrollTop()>150 && $(window).width()>700) {
        TopFixMenu.show();
        }else{
            TopFixMenu.hide();
        }}
    )
})