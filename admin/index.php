<?php 

# Start the session:
session_start();

if(!isset($_SESSION['username'])){
	header('Location: login.php');
}
	
?>

<?php 	include('./config/setup.php'); ?>
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
			<h1>Admin Board</h1>
		</div> <!-- End div  -->
		
		<?php include('.//' . D_TEMPLATE . '/footer.php');?>

		<!-- Setup debug -->
		<?php if($debug == 1) { include('./widgets/debug.php'); } ?>
	</body>
</html>