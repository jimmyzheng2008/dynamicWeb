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
			<h1>Admin Dashboard</h1>
			
			<div class="row">
				<div class="col-md-3">
					

					<?php
						if(isset($_POST['submitted']) == 1){
							$slug = mysqli_escape_string($dbc, $_POST['slug']);
							$title = mysqli_escape_string($dbc, $_POST['title']);
							$label = mysqli_escape_string($dbc,$_POST['label']);
							$header = mysqli_escape_string($dbc, $_POST['header']);
							$body = mysqli_escape_string($dbc,$_POST['body']);
														
							$q = "INSERT INTO pages (user_id, slug, title, label, header, body) VALUES ($_POST[user_id],'$slug','$title','$label','$header','$body')";
							$r = mysqli_query($dbc, $q);
							
							if($r){
								$message = '<p>Page was add </p>';
							}else{
								$message = '<p>Page could not be added because: ' . mysqli_error($dbc);
								$message .= '<p>'. $q .'</p>';
							}
						}				 
					?>
					
					<div class="list-group">
					<a class="list-group-item" href="index.php">
						<h4 class="list-group-item-heading"><i class="fa fa-plus"></i>New page</h4>
						
					</a>
										
					<?php
						$q = "SELECT * FROM pages ORDER BY title ASC";
						$r = mysqli_query($dbc, $q);
						
						foreach($r as $r1){
							$blurb = substr(strip_tags($r1['body']), 0, 160);
							 ?>
							
							<a class="list-group-item" href="index.php?id=<?php echo $r1['id'];?>">
								<h4 class="list-group-item-heading"><?php echo $r1['title']; ?></h4>
								<p class="list-group-item-text"><?php echo $blurb; ?></p>
							</a>	
							
							
					<?php	} ?>
					
					</div>
				</div>

				<div class="col-md-9">
					<?php if(isset($message)){echo $message;} ?>
					
					<?php
					if(isset($_GET['id'])){
						$q = "SELECT * FROM pages WHERE id = $_GET[id]";
						$r = mysqli_query($dbc, $q);
					
						$opened = mysqli_fetch_assoc($r);
					
					} ?>
					
					<form action="index.php" method="post" role="form">
						
						<div class="form-group">
							<label for="title">Title:</label>
							<input type="text"  class="form-control" name="title" id="title" value="<?php echo $opened['title']; ?>"  placeholder="Page Title">
						</div>

						<div class="form-group">
							<label for="user_id">User:</label>
							
							<select name="user_id" id="user_id" value="<?php echo $opened['user_id']; ?>" class="form-control">
								<option value="0">no user</option>
								<?php
									$q = "SELECT id FROM users ORDER BY firstname ASC";
									$r = mysqli_query($dbc, $q);

					//				while ($r1 = mysqli_fetch_assoc($r)) {
									foreach($r as $r1){ 
										$user_data = data_user($dbc, $r1['id']);
										?>
										<option value="<?php echo $user_data['id']; ?>" 
											<?php
												if(isset($_GET['id'])) {
													if($user_data['id'] == $opened['user_id']){echo 'selected'; } 	
												}else{
													if($user_data['id'] == $user['id']){echo 'selected'; } 
												}
												
											
											?> ><?php echo $user_data['fullname']; ?></option>		
								<?php } ?>
								
							</select>
						</div>

						<div class="form-group">
							<label for="slug">Slug:</label>
							<input type="text"  class="form-control" name="slug" id="slug" value="<?php echo $opened['slug']; ?>"  placeholder="Page Slug">
						</div>

						<div class="form-group">
							<label for="label">Label:</label>
							<input type="text"  class="form-control" name="label" id="label" value="<?php echo $opened['label']; ?>"  placeholder="Page Label">
						</div>

						<div class="form-group">
							<label for="header">Header:</label>
							<input type="text"  class="form-control" name="header" id="header" value="<?php echo $opened['header']; ?>"  placeholder="Page Header">
						</div>
																		
						<div class="form-group">
							<label for="body">Body:</label>
							<textarea class="form-control" name="body" id="body" rows= "8" ><?php echo $opened['body']; ?></textarea>
						</div>
						
						<button type="submit" class="btn btn-default">Save</button>
						<input type="hidden" name="submitted" value="1">
					</form>
					
				</div>
				
			</div>
			
			
			
		</div> <!-- End div  -->
		
		<?php include('.//' . D_TEMPLATE . '/footer.php');?>

		<!-- Setup debug -->
		<?php if($debug == 1) { include('./widgets/debug.php'); } ?>
	</body>
</html>