$(document).ready(function() {
	var triggers = $("a[rel]").overlay({
		mask: {
			color: '#000',
			opacity: 0.6
		},
		top: 'center'
	});

	$('.close-modal').live("click", function(e) {
		e.preventDefault();
		triggers.eq(1).overlay().close();
	})

	$("#target").click(function(e) {
		e.preventDefault();
		var x = e.pageX+10;
		var y = e.pageY+10;

		var randomShot = Math.floor(Math.random() * (4 - 1 + 1)) + 1;
		var gunShot = $('<img src="/media/gunshot_'+randomShot+'.png?v=1">');
		gunShot.css({
			position: "absolute",
			left: x,
			top:  y,
		})
		$("body").append(gunShot);
	});

	$("#contact-form .button").click(function(e) {
		e.preventDefault();

		var form = $(this).parents("#contact-form");

		$.ajax({
			type: "POST",
			url: "/contact-chairman.php",
			data: form.serialize,
			success: function(data) {
				form.empty().html(data);
			}
		})
	})
});
