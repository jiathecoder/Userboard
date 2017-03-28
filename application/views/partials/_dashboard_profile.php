<nav class="navbar navbar-inverse navbar-fixed-top">
 	<div id="nav" class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="#">POST IT</a>
    	</div>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	 
	    	<ul class="nav navbar-nav navbar-right">
				<li id = "log_off" role="presentation"><a class = "header_nav" href="/logoff">Logout</a></li>
	      	</ul>    
	      	<ul class="nav navbar-nav navbar-right">
<?php 			if($this->session->userdata['logged_user']['user_level'] === 'Normal')
				{ ?>
					<li role="presentation"><a class = "header_nav" href="/dashboard">Message Board</a></li>
					<li role="presentation"><a class = "header_nav" href="/users_edit">Profile</a></li>
<?php			}
				if($this->session->userdata['logged_user']['user_level'] === 'Admin')
				{ ?>
					<li role="presentation"><a class = "header_nav" href="/admin">Manage Users</a></li>
					<li role="presentation"><a class = "header_nav" href="/users_edit">Profile</a></li>
<?php 			} ?>
	      	</ul>
	      	
	    </div><!-- .navbar-collapse -->
  	</div><!-- .container-fluid -->
</nav>
<div class="pad"></div>