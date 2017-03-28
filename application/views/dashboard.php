<!doctype html>
<html lang="en">
<head>
    <title>MessageBoard</title>
<?php 
    include('partials/_html_header.php');?>
</head>
<body>
	<div class="container">
<?php 	include('partials/_dashboard_profile.php'); 
	    if(!empty($this->session->flashdata('success')))
        { ?>
            <div class="row" >
                <div class="col-md-4" id="success"> 
<?php               echo $this->session->flashdata('success'); ?>
                </div> <!-- end of column -->
            </div> <!-- end of row -->
<?php   } ?>
        <div class="row">
            <div class="col-md-12">
                <h4 id="admin_header">Users</h4>
            </div> <!-- end of column -->
        </div> <!-- end of row -->
        <div>
			<table id ="users_table" class="table table-hover">
  				<tr>
  					<th>UserID</th>
  					<th>Name</th>
  					<th>Email</th>
  					<th>Joined on</th>
  					
  				</tr>
<?php           if(isset($user_list))
                {    
                    foreach($user_list AS $row)
                    { ?>
                        <tr>
<?php                       include('partials/_user_table.php'); ?>
                        </tr>
<?php               }
                } ?>
            </table> 
        </div> <!-- end of div -->
	</div> <!-- end of conainer -->

</body>
</html>
