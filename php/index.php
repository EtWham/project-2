<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $pass); // password hashing using SHA256
		
			$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
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
		    color: lightgreen;
  		}

    </style>
</head>
<body>
	<nav class="nav" style="background: rgb(240,240,240);">
	  <div class="nav-left">
	    <a class="nav-item">
	 	 	<div class="heading">
		        <h1 class="title"><strong style="color:turquoise">THE STUDY CENTER</strong></h1>
		    </div>
		</a>
	  </div>

	  <div class="nav-center">
	    <a class="nav-item" href="/project-2/public/HomePage.html" target="_blank">
	      <span class="icon">
	        <i class="fa fa-github"></i>
	      </span>
	    Ethan</a>
	    <a class="nav-item" href="https://github.com/EtWham/project-2" target="_blank">
	      <span class="icon">
	        <i class="fa fa-github"></i>
	      </span>
	    Muneeb</a>
	    <a class="nav-item" href="https://github.com/abeeju" target="_blank">
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
	<div class="container">
	  <div class="heading">
	    <h2 class="subtitle is-info">
		  <a href="#what">What is it for?</a> <a href="#who">Who is it for?</a> and <a href="#how">How does it work?</a>
		</h2>
	  </div>
	</div>
	
    <section class="hero is-primary is-large has-text-centered container1">
	  <div class="container">                                                                   
	    <div class="columns">
	      <div class="column">
	        <br />
	        <h1 class="title is-1 is-danger">The Study Center</h1>
	        <h2 class="subtitle is-4 is-danger" style="color: turquoise">Smarter together!</h2>	      
	        <div class="column is-one-third login-form"> 
	          
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">  
          
			          <?php
						if ( isset($errMSG) ) {
							
							?>
							<div class="form-group">
			            	<div class="alert alert-danger">
							<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
			                </div>
			            	</div>
			                <?php
						}
						?>
            
		            <div class="form-group">
		            	<div class="input-group">
			              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
				           <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
				        </div>
			            <span class="text-danger"><?php echo $emailError; ?></span>
		            </div>
		            
		            <div class="form-group">
		            	<div class="input-group">
		                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
		            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
		                </div>
		                <span class="text-danger"><?php echo $passError; ?></span>
		            </div>
		            
		            <div class="form-group">
		            	<hr />
		            </div>
		            
		            <div class="form-group">
		              <p class="control has-text-centered">
				        <button type="submit" class="button is-info is-large" name="btn-login">
						  Login
				        </button>
					  </p>
		            </div>
		            
		            
		              <div class="form-group">
		              	
			            <h4 style="color: blue"><strong>Not a Member yet?</strong></h4>
			              <a href="register.php" class="button is-success is-left is-outlined is-medium" id="#"> Create an Account</a>
			                 <br />
			                 <br />
			                 <br />
			                 <br />
			                 <br />
			                 <br />
			                 <br />
			                 <br />
			             
			          </div>
            
                </form>    						
	          </div>
	        </div>
	    </div>
	 </section>

    
     <section class="hero is-info is-large has-text-centered">
	  	<div class="container">
	       <h1 id="what">WHAT IS <strong>THE STUDY CENTER</strong>?</h1>
 		        	<p>The Study Center is a website dedicated to the process of learning together; Here, users will be able to communicate with those interested in the same subjects and learn more together!</p>
			   		<br />
			        <br />
			        <br />
			        <br />
			        <a href="#top" style="color:yellow !important">RETURN TO TOP</a>
			      <hr>
			<h1 id="who">WHO IS <strong>THE STUDY CENTER</strong> FOR?</h1>
 		        	<p>The Study Center is for students, teachers, and anyone who wants to learn. </p>
			    	<br />
			        <br />
			        <br />
			        <a href="#top" style="color:yellow !important">RETURN TO TOP</a>
			      <hr>
			<h1 id="how">HOW IS <strong>THE STUDY CENTER</strong> USED?</h1>
 		        	<p>At Student Center we both create chatrooms for students in the same courses and pair students that need extra help in their courses with students that have strengths in those very same areas. Our users help each other in a certain subject or more by interacting with via the webchat functionality. Typically, the students will be communicating with everyone sharing in their experience and have the opportunity to work one-on-one with others should they so request it, receiving instruction in the area they need. This way we hope to provide our users the opportunity to learn and grow with together!</p>    
			        <br />
			        <br />
			        <br />
			        <a href="#top" style="color:yellow !important">RETURN TO TOP</a>
			               
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