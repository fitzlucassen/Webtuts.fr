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
});