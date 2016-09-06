$(function(){
	deleteUsingAjax();

});


function deleteUsingAjax(){
	$('.btn-del').click(function(event) {
		event.preventDefault();

		var row = $(this).parents('tr');
		var form = $('#myForm');

		$.ajax({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
			url: form.attr('action').replace(':ID', row.data('id')),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'html',
			success: function(result){
				row.fadeOut();
				printSuccessMessage(result);
			},
			error: function(){
				console.log('Error');
			}
		});
	});
}


function printSuccessMessage(message){

	$("#success_message").append(
	'<div id="myAlert" class="alert alert-success">'+
		'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>'+
	'</button>'+
	'<div id="message">'+ jQuery.parseJSON(message).message +'</div>'+
'</div>'
	);
	$("#myAlert").delay(3000).fadeOut();
}

