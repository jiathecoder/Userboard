<!doctype html>
<html lang="en">
<head>
    <title>New User</title>
<?php 
    include('partials/_html_header.php');?>
</head>

<body id = "background">
	<div class="container">
<?php 	include('partials/_dashboard_profile.php'); ?>
		<div class="row">
			<div class="col-md-10">
				<h4 id="new_header">Add new user</h4>
			</div> <!-- end of column -->
			<div class="col-md-2" >
				<a href="/admin"><button class="btn btn-success navbar-right">Back</button></a>
			</div> <!-- end of column -->		
		</div> <!-- end of row -->
		<div class="row">
			<div class="col-md-4 add-user-admin">
                <form action="/register_process" method="post">
<?php               include('partials/_form_add_register.php'); ?>
				    <button id="create_button" type="submit" class="btn btn-success navbar-right" >Add</button>
				</form>
			</div> <!-- end of column -->
		</div> <!-- end of row -->
	</div> <!-- end of conainer -->

</body>
</html>
