<html>

	<head>
	
		<title>To Do List - <?php echo $pageTitle; ?></title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel='stylesheet' type='text/css' href='<?php echo asset_url(); ?>css/todo.css'>
		<script type='text/javascript' src='<?php echo asset_url(); ?>js/jquery-1.11.1.min.js'></script>
		<script type='text/javascript' src='<?php echo asset_url(); ?>js/main.js'></script> 
	
	</head>

	<body>
		<div class='container header'>
			To Do App
		</div>

		<div class='createFormDiv'>
			<span class='title'>Post a To Do:</span>
			<textarea class='textBox' id='postMessage'></textarea>
			<input type='button' class='submitButton' value='Post' id='btnPost'>
			<div class='clear'></div>
			<div id='postErrors' class='errorDiv'></div>
		</div>


		<div class='container todoList'>
		<span class='title'>To Do List:</span>
			<div id='todoList'>