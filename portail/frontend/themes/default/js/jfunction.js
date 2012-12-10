$(document).ready(function(){
    
    $('#box #contact input').focus(function(){
	$(this).parent().parent().parent().parent().addClass('active');
    });
    $('#box #contact input').blur(function(){
	$(this).parent().parent().parent().parent().removeClass('active');
    });
});