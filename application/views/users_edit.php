<!doctype html>
<html lang="en">
<head>
    <title>Edit Profile</title>
<?php 
    include('partials/_html_header.php');?>

</head>
<body id = "background">
	<div class="container">
<?php 	include('partials/_dashboard_profile.php'); 
		if(!empty($this->session->flashdata('errors')))
		{
			echo $this->session->flashdata('errors');
		}
?>
		<div class="row">
			<div class="col-md-12">
				<h3 id="admin_header">Edit Profile</h3>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-10 col-md-offset-1">
					<h4 class="sub-heading">Edit Details</h4>
					<form action="/user_edit_information" method="post">
						<div class="form-group">
							<label  for="email" class="user-edit-label">Email </label>
							<input type="email" class="form-control" name="email" value="<?=$this->session->userdata['logged_user']['email']?>">
						</div>
						<div class="form-group">
							<label for="first_name" class="user-edit-label">First Name</label>
							<input type="text" class="form-control" name="first_name" value="<?=$this->session->userdata['logged_user']['first_name']?>">
						</div>
						<div class="form-group">
							<label for="last_name" class="user-edit-label">Last Name</label>
							<input type="text" class="form-control" name="last_name" value="<?=$this->session->userdata['logged_user']['last_name']?>">
						</div>
						<button type="submit" class="btn btn-success pull-right">Save</button>
					</form>
				</div> <!-- end of column -->
			</div> <!-- end of column -->
			<div class="col-md-6">
				<div class="col-md-10 col-md-offset-1">
					<h4 class="sub-heading" >Change Password</h4>
					<form action="/user_edit_password" method="post">
<?php 	 				include('partials/_change_password.php'); ?>
					</form>
				</div> <!-- end of column -->
			</div> <!-- end of column -->
		</div> <!-- end of row -->		
	</div> <!-- end of conainer -->

</body>
</html>
