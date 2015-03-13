<?php
	//Constants:
	DEFINE('D_TEMPLATE', "template");
	
	DEFINE('HOST', 'localhost');
	DEFINE('USER', 'dev');
	DEFINE('PASSWORD', 'password1234');
	DEFINE('DB', 'atom');
	
	# Database Connection 
	$dbc = mysqli_connect(HOST, USER, PASSWORD, DB);

?>