<?php 
# Start Session
session_start();

include('../config/connection.php'); 


if($_POST){
	$q = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]')";
	//$q = "SELECT * FROM users";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) == 1){
		$_SESSION['username'] = $_POST['email'];
		
		header('Location: index.php');
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include ('./config/css.php'); ?>
		<?php include ('./config/js.php'); ?>
	</head>
	
	<body>
		
		<div id="wrap">
			<?php //include('.//' . D_TEMPLATE . '/navigation.php');?>
			<div class="container">
				
				<div class="row">
					
					<div class="cod-md-4 col-md-offset-4" >
						<div class="panel panel-info">
								
							<div class="panel-heading">
								<strong>Login</strong>		
							</div> <!-- END panel-heading -->
							
							<div class="panel-body">

								<form action="login.php" role="form" method="post">
								  <div class="form-group">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
								  </div>
								  
								  <div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								  </div>
								  <!--
								  <div class="form-group">
									<label for="exampleInputFile">File input</label>
									<input type="file" id="exampleInputFile">
								  </div>
								  -->
								  <button type="submit" class="btn btn-default">Submit</button>
								</form>	
									
							</div> <!-- END panel-body -->
					
						</div> <!-- panel-info -->
					
					</div><!-- END cod-md-4 -->
					
				</div>  <!-- END row -->
				
			</div> <!-- END container -->
		</div> <!-- END wrap  -->
		
		<?php //include('.//' . D_TEMPLATE . '/footer.php');?>

		<!-- Setup debug -->
		<?php //if($debug == 1) { include('./widgets/debug.php'); } ?>
	</body>
</html>