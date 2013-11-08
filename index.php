<?php
// STEP 1. Start the PHP session.
// should be the first to start, to prevent 'headers already sent' errors
session_start();

// STEP 2. Check if a user is NOT YET logged in by checking the session value
if(empty($_SESSION['logged_in'])){

	// if the session value is empty, he is not yet logged in
	// redirect him to login page
	header('Location: login.php?action=not_yet_logged_in');
}
?>
<html>
	<head>
	<title>Sucessful Login</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	</head>
<body>

<?php
// STEP 2. get and check the action
// action determines whether to logout or show the message that the user is already logged in

$action = $_GET['action'];

// executed when user clicked on "Logout?" link
if($action=='logout'){

	// destroy session, it will remove ALL session settings
	session_destroy();
	
	//redirect to login page
	header('Location: login.php');
}

else if($action=='already_logged_in'){
	echo "<div id='infoMesssage'>You cannot go to login page because you are already logged in.</div>";
}
?>

<!-- some contents on our index page -->
<div id='successMessage'>You are logged in. :)</div>
<div id='actions'>
	<a href='index.php?action=logout'>Logout?</a> | <a href='login.php'>Go to login page</a>
</div>

</body>
</html>