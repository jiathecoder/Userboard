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
			<div class="col-md-12">
				<h3 id="user_name"><?=$first_name?> <?=$last_name?></h3>
				<p class="font-color"><span class="info" >User ID : </span><?=$id?></p>
				<p class="font-color"><span class="info">Email : </span><?=$email?></p>
				<p class="font-color"><span class="info">Joined on : </span><?=$created_at?></p>				
				
				
			</div> <!-- end of column -->
		</div> <!-- end of row -->
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
		 			<div class="panel-heading-green">
		    			<h1 class="panel-title">Your message for <?=$first_name?> <?=$last_name?></h1>
		  			</div> <!-- end of heading -->
		  			<div class="panel-body">
		    			<form action="/post_message/<?=$id?>" method="post">
							<div class="form-group"> 
								<textarea class="form-control" id="message" name="message" placeholder="Type your message"></textarea>
								<input type="hidden" name="owner_id" value="<?=$id?>">
							</div> 
							<button type="submit" class="btn btn-success pull-right">Post It</button>
						</form>
		  			</div> <!-- end of panel-body -->
				</div> <!-- end of panel -->
			</div> <!-- end of column -->
		</div> <!-- end of row -->
		
<?php  	if(!empty($messages))
		{
			foreach($messages AS $row)
			{?>
				<div class="row">
					<div class="col-md-10">
						<div class="panel panel-default">
		 					<div class="panel-heading-message">
		 						<div class="row panel-title">
		 							<div class="col-md-6">
										<strong><?=$row['name']?></strong> posted
									</div> <!-- end of column -->
									<div class="col-md-6">
										<div class="pull-right">on <?=$row['created_at']?></div>
									</div> <!-- end of column -->
								</div> <!-- end of panel-title -->
							</div> <!-- end of panel-heading -->
			  				<div class="panel-body">						
								<p class="post_message"><?=$row['message']?></p>
							</div> <!-- end of panel-body -->
						</div> <!-- end of panel -->
					</div> <!-- end of column -->
				</div> <!-- end of row -->
		
<?php 			foreach($row['comments'] AS $comment)
				{?>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-10">
							<div class="panel panel-default">
		 						<div class="panel-heading-comment">
		 							<div class="row panel-title">
		 								<div class="col-md-6">
											<strong><?=$comment['name']?></strong> left a comment
										</div> <!-- end of column -->
										<div class="col-md-6">
											<div class="pull-right"><?=$comment['created_at']?></div>
										</div> <!-- end of column -->
									</div> <!-- end of panel-title -->
								</div> <!-- end of panel-heading -->
								<div class="panel-body">
									<p class="post_comment"><?=$comment['comment']?></p>
								</div> <!-- end of panel-body -->
							</div> <!-- end of panel -->
						</div> <!-- end of column -->
					</div> <!-- end of row -->
<?php			}?>
				
				<div class = "row">
					<div class="col-md-6"></div>
					<div class="col-md-6">
						<div class="panel panel-default">
		 					<div class="panel-heading-green">
								<h1 class="panel-title">Your comment</h1>
							</div> <!-- end of panel-heading -->
							<div class="panel-body">
								<form action="/post_comment/<?=$id?>" method="post">
									<div class="form-group"> 
										<textarea class="form-control" id="comment" name="comment"></textarea>
										<input type="hidden" name="message_id" value="<?=$row['id']?>">
									</div> 
									<button type="submit" class="btn btn-success pull-right">Post It</button>
								</form>
							</div> <!-- end of panel-body -->
						</div> <!-- end of panel -->
					</div> <!-- end of column -->
				</div> <!-- end of row -->
<?php 		}
		} ?>
	</div> <!-- end of conainer -->

</body>
</html>
