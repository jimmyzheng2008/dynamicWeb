<?php

function data_setting_value ($dbc, $id){
	$query = "SELECT * FROM settings WHERE id = '$id'";
	$result = mysqli_query($dbc, $query);
	$data= mysqli_fetch_assoc($result);
	
	return $data['value'];
}


// get the data return with an array
function data_page($dbc, $id){
	# Page Setup query
	if(is_numeric($id)){
		$query = "SELECT * FROM pages WHERE id = $id ";
	}else{
		$query = "SELECT * FROM pages WHERE slug = '$id' ";
	}
	
	
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