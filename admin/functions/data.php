<?php

function data_setting_value ($dbc, $id){
	$query = "SELECT * FROM settings WHERE id = '$id'";
	$result = mysqli_query($dbc, $query);
	$data= mysqli_fetch_assoc($result);
	
	return $data['value'];
}

function data_user($dbc, $id){
	if(is_numeric($id)){
		$q = "SELECT * FROM users WHERE id = '$id'";
	}else{
		$q = "SELECT * FROM users WHERE email = '$id'";
	}
	
	$r = mysqli_query($dbc, $q);
	
	$data = mysqli_fetch_assoc($r);
	
	$data['fullname'] = $data['firstname']. '  ' . $data['lastname'];
	$data['fullname_reverse'] = $data['lastname']. ', '.$data['firstname'];
	return $data;
}


// get the data return with an array
function data_page($dbc, $id){
	# Page Setup query
	$query = "SELECT * FROM pages WHERE id = $id ";
	
	$result = mysqli_query($dbc, $query);
	$data = mysqli_fetch_assoc($result);
	
	$data['body_nohtml'] = strip_tags($data['body']);
	if($data['body_nohtml'] == $data['body']){
		$data['body_formatted'] = '<p>'.$data['body'] .'</p>';	
	}else{
		$data['body_formatted'] = $data['body'];
	}
	
	return $data;
	}
?>