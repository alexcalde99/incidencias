<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Calm breeze login screen</title>
    
    
    
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/style.css">

    
    
    
  </head>

  <body>

    <div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		
                <form action="<?php echo site_url('backoffice/validate_user')?>" method="POST">
                    <input type="text" placeholder="Username" name="username">
			<input type="password" placeholder="Password" name="password">                        
                        <button type="submit" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="<?php echo base_url();?>assets/login/js/index.js"></script>

    
    
    
  </body>
</html>
