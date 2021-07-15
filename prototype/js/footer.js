
$(document).ready(function(){
    $('#footer').css('margin-top', $(document).height() - ( $('body').height() + $('#footer').height()) - 50 );
});

$(document).resize(function(){
    $('#footer').css('margin-top', $(document).height() - ( $('body').height() + $('#footer').height()) - 50 );
});