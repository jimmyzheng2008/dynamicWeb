<nav class="navbar navbar-default" role="navigation">
	

		
	<ul class="nav navbar-nav">
		<?php  //nav_main($dbc, $pageid); ?>

		<li><a href="#">Dashboard</a></li>
		<li><a href="#">Pages</a></li>
		<li><a href="#">Users</a></li>
		<li><a href="#">Setting</a></li>
				
	</ul>
	
	<div class="pull-right">
		<!--
		<ul class="nav navbar-nav navbar-right">
		-->
		<ul class="nav navbar-nav">
			<li>
			<?php if($debug == 1){ ?>
				<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
			<?php } ?>	
			</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">DropDown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="logout.php">Logout</a></li>		
				</ul>
				
			</li>
			
		</ul>
	</div>

</nav> <!-- End nav -->