<?php

function nav_main($dbc,$pageid){
	$query = "SELECT * FROM pages";
		$result = mysqli_query($dbc, $query);
		while($nav = mysqli_fetch_assoc($result)){?>
		<li<?php if($pageid==$nav['slug']){echo ' class="active"';}?>><a href="index.php?page=<?php echo $nav['slug']?>"><?php echo $nav['label']?></a></li>
	<?php }	
}

?>