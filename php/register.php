<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($name);
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>The Study Center</title>
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="./assets/bulma-0.3.1/css/bulma.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <style>
    	.container1 {
    		background-image: url(https://i.kinja-img.com/gawker-media/image/upload/t_original/v6hrwheghmw8bu8ojnon.jpg);
    	}
    	h1, h2 {
		    font-family: Shrikhand;
		    color: blue;
  		}

    </style>
</head>
<body>
	<nav class="nav" style="background: rgb(240,240,240);">
	  <div class="nav-left">
	    <a class="nav-item">
	 	 	<div class="heading">
		        <h1 class="title"><strong>THE STUDY CENTER</strong></h1>
		    </div>
		</a>
	  </div>

	  <div class="nav-center">
	    <a class="nav-item">
	      <span class="icon">
	        <i class="fa fa-github"></i>
	      </span>
	    Ethan</a>
	    <a class="nav-item">
	      <span class="icon">
	        <i class="fa fa-github"></i>
	      </span>
	    Muneeb</a>
	    <a class="nav-item">
	      <span class="icon">
	        <i class="fa fa-github"></i>
	      </span>
	    Abel</a>
	    <a class="nav-item">
	      <span class="icon">
	        <i class="fa fa-twitter"></i>
	      </span>
	    Ethan</a>
	    <a class="nav-item">
	      <span class="icon">
	        <i class="fa fa-twitter"></i>
	      </span>
	    Muneeb</a>
	    <a class="nav-item">
	      <span class="icon is-primary">
	        <i class="fa fa-twitter is-primary"></i>
	      </span>
	    Abel</a>
	  </div>

	  <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
	  <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
	  <span class="nav-toggle">
	    <span></span>
	    <span></span>
	    <span></span>
	  </span>

	  <!-- This "nav-menu" is hidden on mobile -->
	  <!-- Add the modifier "is-active" to display it on mobile -->
	  <div class="nav-right nav-menu">
	    <a class="nav-item">
	      Home
	    </a>
	    <div class="nav-item">
	      <div class="field is-grouped">
	        <p class="control">
	          <a class="button is-info is-outlined" >
	            <span class="icon">
	              <i class="fa fa-twitter"></i>
	            </span>
	            <span>Tweet</span>
	          </a>
	        </p>
	      </div>
	    </div>
	  </div>
	</nav>
	<hr>
	
	<section class="hero is-primary is-large has-text-centered container1">
		<div class="container">                                                                   
	    <div class="columns">
	      <div class="column">
	        <br />
	        <h1 class="title is-1">The Study Center</h1>
	        <h2 class="subtitle is-4">Smarter together!</h2>	      
	        <div class="column is-one-third login-form"> 
	    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
	    
	    	
	            
	            <?php
				if ( isset($errMSG) ) {
					
					?>
					<div class="form-group">
	            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
					<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
	                </div>
	            	</div>
	                <?php
				}
				?>
	            
	            <div class="form-group">
	            	<div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
	            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
	                </div>
	                <span class="text-danger"><?php echo $nameError; ?></span>
	            </div>
	            
	            <div class="form-group">
	            	<div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
	            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
	                </div>
	                <span class="text-danger"><?php echo $emailError; ?></span>
	            </div>
	            
	            <div class="form-group">
	            	<div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
	            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
	                </div>
	                <span class="text-danger"><?php echo $passError; ?></span>
	            </div>
	            
	            <div class="form-group">
	            	<hr />
	            </div>
	            
	            <div class="form-group">
	            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
	            </div>
	            
	            <div class="form-group">
	            	<hr />
	            </div>
	            
	             <div class="form-group">
			            <h4>Already Have an Account?</h4>
			            <br />
			            <a href="index.php" class="button is-info is-outlined is-medium" id="#"> LogIn</a>
			                 <br />
			                 <br />
			                 <br />
			                 <br />
			    </div>
	            
	        
	        
	   
	    </form>
	    	</div>
	    </div>
	   </div>
	   </div>	
	</section>

	<div class="content has-text-centered">   	
	           <p><strong>The Studey Center</strong> is a project by Ethan, Muneeb and Abel for GWU Coding Bootcamp</p>
	           		<a class="button" href="https://github.com/EtWham/project-2" target="_blank">
				    	<span class="icon"><i class="fa fa-github"></i></span>
						    <span>GitHub</span>
					</a>   
	 </div>

</body>
</html>
<?php ob_end_flush(); ?>