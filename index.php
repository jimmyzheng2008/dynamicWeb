<?php 

	include('./config/setup.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page['header'].' | ' . $page['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include ('./config/css.php'); ?>
		<?php include ('./config/js.php'); ?>
	</head>
	
	<body>
		
		<div id="wrap">
			<?php include('.//' . D_TEMPLATE . '/navigation.php');?>
			
			<div class="container">
				<h1><?php echo $page['header']?></h1>
				<?php echo $page['body_formatted']?>
				
			</div>
		</div> <!-- End div  -->
		
		<?php include('.//' . D_TEMPLATE . '/footer.php');?>

		<!-- Setup debug -->
		<?php if($debug == 1) { include('./widgets/debug.php'); } ?>
	</body>
</html>