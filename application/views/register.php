<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
<?php 
    include('partials/_html_header.php');?>


</head>
<body>
<?php 	include('partials/_sign_nav.php'); ?>
	<div class="space"></div>
	<div class="container">
		<div class="row user-panel">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default-login-reg">
					<div class="panel-heading-green">
						<h2 class="header">Register</h2>
					</div> <!-- end of panel-heading -->
					<div class="panel-body">
<?php   				if(!empty($this->session->flashdata('errors')))
        				{   ?>
            			<div class="row">
                			<div class="errors">
<?php           			    echo $this->session->flashdata('errors'); ?>                   
                			</div>
            			</div>
<?php   				}?>
                		<form action="/register_process" method="post">
<?php               		include('partials/_form_add_register.php');?>
							<button id="register_button" type="submit" class="btn btn-success pull-right log-reg-link">Register</button>
						</form>
						<a href="/login">Log In</a>
					</div> <!-- end of panel-body -->
				</div> <!-- end of panel -->
			</div> <!-- end of column-->
		</div> <!-- end of row user-panel -->
	</div> <!-- end of conainer -->

</body>
</html>
