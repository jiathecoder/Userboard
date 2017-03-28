<!doctype html>
<html lang="en">
<head>
    <title>Edit User</title>
<?php 
    include('partials/_html_header.php');?>
</head>
<body>
	<div class="container">
<?php 	include('partials/_dashboard_profile.php'); ?>
		<div class="row">
			<div class="col-md-10">
				<h3 id="admin_header">Edit User with ID- <?=$id?></h3>
			</div>
			<div class="col-md-2">
				<a href="/admin"><button type="button" class="btn btn-success navbar-right">Back</button></a>
			</div>
		</div>
<?php	if(!empty($this->session->flashdata('errors')))
		{   ?>
			<div class="errors">
<?php			echo $this->session->flashdata('errors'); ?>
			</div>
<?php	}?>
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-10 col-md-offset-1">
					<h4 class="sub-heading">Edit Details</h4>
					<form action="/admin_edit_information/<?=$id?>" method="post">
						<div class="form-group">
							<label for="email=" class="user-edit-label">Email address </label>
							<input type="email" class="form-control" name="email" value="<?=$email?>">
						</div>
						<div class="form-group">
							<label for="first_name" class="user-edit-label">First Name  </label>
							<input type="text" class="form-control" name="first_name" value="<?=$first_name?>">
						</div>
						<div class="form-group">
							<label for="last_name" class="user-edit-label">Last Name  </label>
							<input type="text" class="form-control" name="last_name" value="<?=$last_name?>">
						</div>
							<div class="form-group">
							<label class="user-edit-label">User Type </label>
							<select name = "user_level" class="form-control">
								<option>Normal</option>
								<option>Admin</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success pull-right">Save</button>
					</form>
				</div> <!-- end of column -->
			</div> <!-- end of column -->
			
		</div> <!-- end of row -->
	</div> <!-- end of conainer -->

</body>
</html>
