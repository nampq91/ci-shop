$(document).ready(function(){
    $(window).resize(function(){
        if($(window).width() >= 767){
            $(".side-nav").slideDown(150);
        }else{ 
            $(".side-nav").slideUp(150);
        }   
    });

    $('.iframe-btn').fancybox({
        'width': 880,
        'height': 570,
        'type': 'iframe',
        'autoScale': false
    });
    $('.autoNumber').autoNumeric('init');
    $('.form-chosen-select').chosen({width: '100%'});
    $('.form-cs-multiselect').chosen({width: '100%'});
    $('.tags-input').tagsinput({
        freeInput: true
    });

    $(".has_submenu > a").click(function(e){
        e.preventDefault();
        var menu_li = $(this).parent("li"), menu_ul = $(this).next("ul");
        if(menu_li.hasClass("open")){
            menu_ul.slideUp(150);
            menu_li.removeClass("open");
            $(this).find("span").removeClass("fa-caret-up").addClass("fa-caret-down");
        }else{
            $(".side-nav > li > ul").slideUp(150);
            $(".side-nav > li").removeClass("open");
            menu_ul.slideDown(150);
            menu_li.addClass("open");
            $(this).find("span").removeClass("fa-caret-down").addClass("fa-caret-up");
        }
    });
  
});

function CountDownText(field, max) {
    if (field.val().length > max) {
        field.val(field.val().substring(0, max));
    } else {
        jQuery("." + field.attr('id') + "_count").html((max - field.val().length));
    }
}

function CountUpText(field, max) {
    if (field.val().length > max) {
        field.val(field.val().substring(0, max));
    } else {
        jQuery("." + field.attr('id') + "_count").html((field.val().length));
    }
}


function responsive_filemanager_callback(field_id) {
    var url = jQuery('#' + field_id).val();
}