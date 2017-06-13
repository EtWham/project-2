<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" />

<link rel="stylesheet" href="style.css" type="text/css" />
<style>
	h1 {
    font-family: Shrikhand;
    color: turquoise;
    
     }
     h1, p {
     	text-align: center;
     }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar, .navbar-header {
      margin-bottom: 0;
      border-radius: 0;
      background-color: turquoise: 
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">The Study Center</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Take Survey 1</a></li>
            <li><a href="#">Take Survey 2</a></li>
         </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Welcome <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<div id="wrapper">

	<div class="container">
    
    	
        
       
    
    </div>
    
    </div>
    <div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <p>To get started click on the following links to take the survey!</p>
      <p><a href="#">Coding 101</a></p>
      <p><a href="#">Algebra</a></p>
      <p><a href="#">Calculus</a></p>
      <p><a href="#">Physics</a></p>
      <p><a href="#">History</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome to The study Center</h1>
      <br />
      <hr />
      <p>At The study Center we pair students that need extra help in certain course topics with other students that have strengths in those very same areas. Our tutors help students in a certain subject or more than one subject by interacting with their students via the webchat. Typically, you will work one-on-one with students, tutoring them in the area they need. You may also find online tutoring positions that allow you to offer instructions or lessons to a group of students online. </p>
      <hr>
      <h3></h3>
      <p></p>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>The Study Center</p>
  <div class="content has-text-centered">
	    <p><strong>The Studey Center</strong> is a project by Ethan, Muneeb and Abel for GWU Coding Bootcamp</p>
	        <a class="button" href="https://github.com/EtWham/project-2" target="_blank">
			<span class="icon"><i class="fa fa-github" aria-hidden="true"></i></span>
			<span>GitHub</span>
		    </a>
	</div>
</footer>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>