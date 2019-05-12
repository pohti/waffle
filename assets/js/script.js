$(document).ready(function(){
	
	$(".result").on("click", function(){
		
		var id = $(this).attr("data-linkId");
		var url = $(this).attr("href");
		
		increaseLinkClicks(id, url);
		
		return false;
	});
	
});

function increaseLinkClicks(linkId, url) {
	$.post("ajax/updateClicks.php", {linkId : linkId})
	.done(function(result){
		if(result != "") {
			alert(result);
			return;
		}
		
		window.location.href = url;
	});
}