<?php
	session_start();
?>


<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
<!-- http://www2.humboldt.edu/thecompleteworkout/admin2/home.php -->
	
<head>
	<title>The Complete Workout</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="tcw_style.css" />

	<?php
		require_once("create_login.php");
		//require_once("tcw_conn_sess.php");
		/* fork from login */
		require_once("adminMenu.php");
		require_once("userMenu.php");
		/* fork from adminMenu */
		require_once("createRoutine.php");
		require_once("createUsers.php");
		require_once("viewWorkouts.php");
		require_once("adminSelection.php");
		require_once("processUsers.php");
		require_once("selectUser.php");
		/* fork from userMenu */
		/* <-stuff here-> */
		require_once("registerNewUser.php");
		/* misc. */
		require_once("tcw_complain.php");
	?>
</head>

<body>
	
	<h1 id = "app_title" class = "frame_bar" >
		Welcome to The Complete Workout
	</h1>
	
	<?php
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	/*~~~~~~~~~~~~~~~~~~~Login Area~~~~~~~~~~~~~~~~~~~~~~~~*/
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	$dbname = "TheCompleteWorko"; //$dbname = "TheCompleteWorko";
    $pw = "Complete459"; //$pw = "Complete459";
    $host = "localhost";
    $db = "TheCompleteWorko";
	
	$_SESSION['host'] = $host;
	$_SESSION['db'] = $db;
	$_SESSION['dbname'] = $dbname;
	$_SESSION['pw'] = $pw;
	  
	if(! array_key_exists("next_screen", $_SESSION))
	{
		/*if no previous session, start a session by logging in*/
		create_login();
		//pull new pwd and username from session array
		//$_SESSION['dbname'] = $dbname;		
		//$_SESSION['pw'] = $pw;
		$_SESSION['next_screen'] = 'choose_menu';
	}
	elseif($_SESSION['next_screen'] == 'choose_menu')
	{
		if((! array_key_exists('username', $_POST)) or
			(trim($_POST['username']) == "") or
			(! isset($_POST['username'])))
		{
			tcw_complain("Invalid credentials.");
		}
		if((! array_key_exists('password', $_POST)) or
			(trim($_POST['password']) == "") or
			(! isset($_POST['password'])))
		{
			tcw_complain("Invalid credentials.");
		}
		if(((! array_key_exists('password', $_POST)) 
			or (! array_key_exists('username', $_POST))) 
			and (array_key_exists('register', $_POST)))
		{
			registerNewUser();
		}
		
		/* sanitize user credentials */
		$username = strip_tags($_POST["username"]);
		$password = $_POST['password'];
		
		/* save the session variables for use on the server */
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		
		
		/* loginSelect is a radio option for either admin/user */
		$loginSelect = $_POST['loginSelect'];
		$_SESSION["loginSelect"] = $loginSelect;
		
		// was register chosen
		$registerNew = $_POST['register'];
		$_SESSION["registerNew"] = $registerNew;
		
		
		/*new user self-registration*/
		if($registerNew == 'register') 
		{
			$_SESSION['next_screen'] = 'register_new';
			registerNewUser();			
		}
		
		// Session control for whether they want to quit or not
		$_SESSION["exit"] = "no";
		
		/*loginSelect determines what page to go to next from the login page*/
		if ($loginSelect == 'Admin')
		{
			adminSelection();
		}
		else
		{
			userMenu();
		}
		/* personalScreen is used for both admin and user logins respectfully */
		$_SESSION['next_screen'] = 'personalScreen';
	}
	
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	/*~~~~~~~~~~~~~~~~~~~Admin Area~~~~~~~~~~~~~~~~~~~*/
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	elseif(($_SESSION['next_screen'] == 'personalScreen')
		&& ($_SESSION["loginSelect"] == 'Admin')
		&& ((array_key_exists('createUsers', $_POST))))
	{
		/* an admin should come here after successful login
			and selecting createUser*/
		//echo "<p>createUsers here</p>";
		$_SESSION['next_screen'] = 'process_users';
		createUsers();
	}
	elseif(($_SESSION['next_screen'] == 'process_users')
		&& ($_SESSION["loginSelect"] == 'Admin'))
	{
		/* an admin should come here after successful login
			and selecting processUsers*/
		//echo "<p>processUsers here</p>";
		$_SESSION['next_screen'] = 'is_user_done';
		$_SESSION['exit'] = 'logout';
		processUsers();
	}
	elseif(($_SESSION['next_screen'] == 'personalScreen')
		&& ($_SESSION["loginSelect"] == 'Admin')
		&& ((array_key_exists('createRoutine', $_POST))))
	{
		/* an admin should come here after successful login
			and selecting createRoutine*/
		//echo "<p>createRoutine here</p>";
		$_SESSION['next_screen'] = 'is_user_done';
		createRoutine();
	}
	elseif(($_SESSION['next_screen'] == 'personalScreen')
		&& ($_SESSION["loginSelect"] == 'Admin')
		&& ((array_key_exists('viewWorkouts', $_POST))))
	{
		/* an admin should come here after successful login
			and selecting viewWorkouts*/
		//echo "<p>viewWorkouts here</p>";
		$_SESSION['next_screen'] = 'is_user_done';
		viewWorkouts();
	}
	
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	/*~~~~~~~~~~~~~~~~~~User Area~~~~~~~~~~~~~~~~~~~~~~*/
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	elseif(($_SESSION['next_screen'] == 'personalScreen')
		&& ($_SESSION["loginSelect"] == 'User'))
	{
		/* an admin should come here after successful login
			and selecting createUser*/
		//echo "<p>createUsers here</p>";
		$_SESSION['next_screen'] = 'is_user_done';
		createUsers();
	}
	elseif(array_key_exists('registerNow', $_POST))
	{
		$_SESSION['next_screen'] = 'register_new';
		registerNewUser();
	}
	
	
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	/*~~~~~~~~~End / Restart Session Area~~~~~~~~~~~~~~*/
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/		
	elseif(($_SESSION['next_screen'] == 'is_user_done') &&
			($_SESSION['exit'] == "logout"))
	{
		/* user done and logout chosen -> kill the session */
		session_destroy();
		session_regenerate_id(TRUE);
		session_start();
		
		create_login();
		$_SESSION['next_screen'] = 'choose_menu';
	}
	elseif(($_SESSION['next_screen'] == 'is_user_done') &&
			(array_key_exists('logout', $_POST)))
	{
		/* user done and logout chosen -> kill the session */
		session_destroy();
		session_regenerate_id(TRUE);
		session_start();
		
		create_login();
		$_SESSION['next_screen'] = 'choose_menu';
	}
	/* otherwise restart the session and start fresh */
	else
	{
		create_login();		
		session_destroy();
		session_regenerate_id(TRUE);
		session_start();
		$_SESSION['next_screen'] = 'choose_menu';		
	}
	?>


<footer id="footer">
	<? require_once("tcw_footer.html"); ?>
</footer>

</body>
</html>