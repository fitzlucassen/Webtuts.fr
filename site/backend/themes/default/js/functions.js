$("document").ready(function() {
	/*$(".itemlist").each(".descriptionitem", function() {
		this.css("height", "500px");
	});*/

	
		$($(".descriptionitem")).each(function() {
			if($(this).height()>$(this).parent().children(".titleitem").height()) {
				$(this).children(".borderitem").css("display", "block");
				$(this).css("height", $(this).parent().children(".titleitem").height()+15);
				$(this).css("marginBottom", "-15px");
			}
		});
		
		
		/*$(".comment").click(function(){
			var previous = $(this).parent().children(".commentopen");
			
			previous.children(".descriptionitem").children(".borderitem").css("display", "block");
			previous.children(".descriptionitem").css("height", previous.children(".titleitem").height()+15);
			previous.children(".descriptionitem").css("marginBottom", "-15px");
			previous.removeClass();
			previous.addClass("comment");
			
			previous.children(".titleitem").children("span").css("display", "none");
			
			if($(this).children(".descriptionitem").height()>$(this).children(".titleitem").height()) {
				$(this).children(".descriptionitem").children(".borderitem").css("display", "none");
				$(this).children(".descriptionitem").css("height", "auto");
				$(this).children(".descriptionitem").css("marginBottom", "0px");
				$(this).removeClass();
				$(this).addClass("commentopen");
			}
			
			$(this).children(".titleitem").children("span").css("display", "block");
			
		});*/
		
		$(".comment").click(function(){
			var previous = $(this).parent().children(".commentopen");
			
			previous.css("cursor", "pointer");
			previous.removeClass();
			previous.addClass("comment");
			previous.children(".descriptionitem").children(".textcomment").css("display", "none");
			previous.children(".titleitem").children("span").css("display", "none");
			previous.children(".descriptionitem").find("input").css("display", "none");
			
			$(this).css("cursor", "auto");
			$(this).removeClass();
			$(this).addClass("commentopen");
			$(this).children(".descriptionitem").children(".textcomment").css("display", "block");
			$(this).children(".titleitem").children("span").css("display", "block");
			$(this).children(".descriptionitem").find("input").css("display", "block");
		});
		
});