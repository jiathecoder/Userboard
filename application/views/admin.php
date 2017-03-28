<!doctype html>
<html lang="en">
<head>
    <title>Admin MessageBoard</title>
<?php 
    include('partials/_html_header.php');?>
</head>

<body>
	<div class="container">
<?php 	include('partials/_dashboard_profile.php'); ?>
		<div class="row">
			<div class="col-md-10">
				<h4 id="admin_header">Users</h4>
			</div>
			<div class="col-md-2" >
				<a href="/new"><button class="btn btn-success pull-right">Add new</button></a>
			</div>		
		</div>
    	<div>
            <table id ="admin_table" class="table table-bordered">
        		<tr>
        			<th>ID</th>
        			<th>Name</th>
        			<th>Email</th> 
                    <th>Joined on</th>   
        			<th>Action</th>
        		</tr>
<?php           if(isset($user_list))
                {    
                    foreach($user_list AS $row) 
                    { ?>
                        <tr>  
<?php                       include('partials/_user_table.php'); ?>
                            <td><a href="edit/<?=$row['id']?>">Edit</a> / <a data-toggle = "modal" data-target ="#myModal_<?=$row['id']?>">Delete</a>
                                <div class="modal fade" id="myModal_<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title alert" id="myModalLabel">ALERT !!</h4>
                                            </div>
                                            <div class="modal-body">
                                                Just making sure! 
                                                Do you really want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <a href="/admin"><button type="button" class="btn btn-success" data-dismiss="modal">Back</button></a>
                                                <a href="/delete/<?=$row['id']?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                            </div>
                                        </div> <!-- end of model-content -->  
                                    </div> <!-- end of model-dialog -->  
                                </div> <!-- end of modal fade -->               
                            </td>
                        </tr>
<?php               }
                } ?>          
			</table>
		</div> <!-- end of div -->  
	</div> <!-- end of container -->  

</body>
</html>
