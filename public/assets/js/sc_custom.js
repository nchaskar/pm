$(".popout .btn").on("click",function() {
	$(this).toggleClass("active");
	$(this).closest(".popout").find(".panel").toggleClass("active");
});

$(document).on("click",function() {
	$(".popout .panel").removeClass("active");
	$(".popout .btn").removeClass("active");
});

$(".popout .panel").on("click",function(event) {
	event.stopPropagation();
});

$(".popout .btn").on("click",function(event) {
	event.stopPropagation();
});
