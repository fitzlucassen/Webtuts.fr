$(document).ready(function(){
    
    $('.check-langage').change(function(){
	if($(this).attr('checked')){
	    if($('#hidden-langage').val() == ""){
		$('#hidden-langage').val($(this).val());
	    }
	    else {
		$('#hidden-langage').val($('#hidden-langage').val() + ',' + $(this).val());
	    }
	}
	else {
	    var temp = $('#hidden-langage').val().split(',');
	    var i;
	    for(i = 0; i < temp.length; i++){
		if(temp[i] == $(this).val()){
		    delete temp[i];
		}
	    }
	    var newVal = '';
	    var cpt = 0;
	    for(i = 0; i < temp.length; i++){
		if(temp[i] != undefined){
		    if(newVal == '')
			newVal += temp[i];
		    else
			newVal += ',' + temp[i];
		    cpt++;
		}
	    }
	    $('#hidden-langage').val(newVal);
	}
    });
    
    
    $('#send-comment').click(function(){
	var pseudo = $('#pseudo-text').text();
	var message = $('#message-text').val();
	var article = $("#article-comment-value").val();
	
	$.ajax({
	    type : "post",
	    url : "/site/frontend/themes/default/postComment.php",
	    data : {'pseudo':pseudo, 'message':message, 'article':article},
	    success:function(response){
		$(".article-comments").append(response);
	    }
	});
    });
});