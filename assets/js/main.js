$(document).ready(function() {
	
	$("body").on("click", "div[data-delete]", function() {
		
		var todoID = $(this).attr('data-delete');
		
		$.post('index.php/delete', { todo: todoID }, function(data) {
			
			var result = JSON.parse(data);
			
			if(result['result'] == "success") {
				$.post('index.php/list', { }, function(todoHTML) {
					$('#todoList').html(todoHTML);
				});
			}
			else {
				alert("Unable to delete post!");
			}
			
		});
		
	});
	
	$('#btnPost').click(function() {
		
		$('#postErrors').hide();
		
		$.post('index.php/post', { message: $('#postMessage').val() }, function(data) {
			
			var result = JSON.parse(data);
			
			if(result['result'] == "success") {
				$('#postMessage').val("");
				$('#postMessage').html("");
				
				
				$.post('index.php/list', { }, function(todoHTML) {
					$('#todoList').html(todoHTML);
				});
				
				
			}
			else {
				
				$('#postErrors').html(result['errors']);
				$('#postErrors').show();
			}
			
		});
		
	});
	
});