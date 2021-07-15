$(document).ready(function(){
    $('footer').css('margin-top', $(document).height() - ( $('body').height() + $('footer').height()));
});

$(document).resize(function(){
    $('footer').css('margin-top', $(document).height() - ( $('body').height() + $('footer').height()));
});