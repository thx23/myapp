<?php

	/*
		adminMenu() offers further branching logic to guide an admin level
			user.
	*/

	function adminMenu()
	{
		//adminChoose is the fieldset of options for the admin to choose...
		//adminSelection();
		//$_SESSION['admin_screen'] = "admin_choice";
		
		/* adminSelect is a radio option for either admin next option */
		//$adminSelect = $_POST['adminSelect'];
		/*$adminSelect determines where admin goes after choosing next step*/
		//$_SESSION["adminSelect"] = $adminSelect;
		
		//main_menu is equivalent to admin menu choice form
		if(($_SESSION['loginSelect'] == 'Admin') or 
			(array_key_exists('main_menu', $_POST)))
		{
			//echo "<p>in adminMenu -> adminSelection</p>";
			/* adminSelection holds the list of choices */
			adminSelection();
			$_SESSION['next_screen'] = "admin_choice";
		}
		elseif(($_SESSION['admin_screen'] == "admin_choice") && 
			($_POST['logout'] == "logout"))
		{
			//echo "<p>in adminMenu -> logout</p>";
			/* should send user back to main branch in home.php and log them out aka end session */
			$logout = $_POST['logout'];
			$_SESSION['exit'] = $logout;
			$_SESSION['next_screen'] = "is_user_done";
		}
		elseif(($_SESSION['next_screen'] == "admin_choice") && 
			(array_key_exists('createUsers', $_POST)))
		{
			//echo "<p>in adminMenu -> createUsers</p>";
			//in admin branch, wants to create a user
			createUsers();			
			$_SESSION['admin_screen'] = "processUsers"; 
		}
		elseif(($_SESSION['admin_screen'] == "processUsers"))
		{
			//echo "<p>in adminMenu -> processUsers</p>";
			//sends new user data to the database and confirms this was done
			processUsers();			
			$_SESSION['admin_screen'] = "main_menu"; 
		}
		elseif(($_SESSION['admin_screen'] == "admin_choice") && (array_key_exists('selectUser', $_POST)))
		{
			//echo "<p>in adminMenu -> selectUser</p>";
			/* Admin can select a user and a date so that they can view that individual's specific workouts */
			selectUser();
			$_SESSION['admin_screen'] = "viewWorkouts"; 
		}
		elseif(($_SESSION['admin_screen'] == "viewWorkouts"))
		{
			//echo "<p>in adminMenu -> viewWorkouts</p>";
			/* connects to DB and generates the query results */
			viewWorkouts();
			$_SESSION['admin_screen'] = "main_menu"; 
		}
		
		// shouldn't be able to reach here (hopefully, but just in case)
		else
		{
			//echo "<p>in adminMenu -> adminChoose</p>";
			adminChoose();
			$_SESSION['admin_screen'] = "admin_choice";
			
		}
		
	//$_SESSION['next_screen'] = "is_user_done";
	}
?>