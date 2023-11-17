$(function() {
	$("#feedback-tab").click(function() {
		$("#feedback-form").toggle("slide");
	});
	

	$("#feedback-form form").on('submit', function(event) {
		var $form = $(this);
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize(),
			success: function() {
				$("#feedback-form").toggle("slide").find("textarea").val('');
			}
		});
		event.preventDefault();
	});
	
	
	$("#feedback-tab1").click(function() {
		$("#feedback-form1").toggle("slide");
	});
	

	$("#feedback-form1 form1").on('submit', function(event) {
		var $form = $(this);
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize(),
			success: function() {
				$("#feedback-form1").toggle("slide").find("textarea").val('');
			}
		});
		event.preventDefault();
	});
});

