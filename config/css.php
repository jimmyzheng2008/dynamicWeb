<?php
// css file
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- jQuery css -->
<link rel ="stylesheet" href="//code.jquery.com/ui/q.10.4/thermes/smoothness/jquery-ui.css">

<!-- font awesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>
	html,body{
		height: 100%
	}
	
	/* Wrapper for page content to push down footer */
	#wrap {
		min-height: 100%;
		height: auto;
		/* Negative indent footer by its height */
		margin: 0 auto -60px;
		/* Pad bottom by footer height */
		padding: 0 0 60px;
	}
	/* Set the fixed height of the footer here */
	#footer {
		height: 60px;
		background-color: #f5f5f5;
	}
	#btn-debug {
		position:absolute;
	}
	
	#console-debug {
		position: absolute;
		top:50px;
		left:0px;
		width:30%;
		height:700px;
		overflow-y: scroll;
		background-color: #ffffff;
		box-shadow: 2px 2px 5px #cccccc;
	}
	
	#console-debug pre {
		height: 700px;
		
	}
</style>
