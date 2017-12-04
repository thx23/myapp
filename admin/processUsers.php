<?php
	
	/* processUsers commits the entered values to add abs
			new user to the database */
	
	function processUsers()
	{
		?>	
		<p>
			processUsers
		</p>
		
	<?php
	
	/*establish connection*/
	/*$host = $_SESSION['host'];
	$dbname = $_SESSION['dbname'];
	$db = $_SESSION['db'];
	$pw = $_SESSION['pw'];*/
	$dbname = "TheCompleteWorko";
    $pw = "Complete459";
    $host = "localhost";
    $db = "TheCompleteWorko";
	
	$conn = mysql_connect($host, $dbname, $pw, $db) or die("connection failed");
    $db = mysql_select_db($db);
	
	
	/* mysqli... tosses out special characters */
	$username = $_POST['userName'];
	$username = strip_tags($username);
	$password = $_POST['pwd'];
	$password = strip_tags($password);
	$type = $_POST['userType'];
	$type = strip_tags($type);
	$class = $_POST['classChoice'];
	$class = strip_tags($class);
	$team = $_POST['sportsChoice'];
	$team = strip_tags($team);
	$f_name = $_POST['firstName'];
	$f_name = strip_tags($f_name);
	$l_name = $_POST['lastName'];
	$l_name = strip_tags($l_name);
	
	$new_user = "INSERT INTO User
			(username,password,type,class,team,f_name,l_name)
		VALUES('$username','$password','$type','$class','$team','$f_name','$l_name');";
	?>
	<p> variables:<?= $username?></p>
	<?php	
	//Inserting new user to the database
	mysql_query($new_user) or trigger_error(mysql_error()." in ".$new_user);
	
	//create a select statement
	$created_user = "SELECT username FROM User;";
	//query the database with the select
	$result = mysql_query($created_user);
	//print the query to the screen that a user has actually been created
	$result2 = mysql_fetch_assoc($result);
	echo ("New user ".$result2." has been created.");
	//close the connection
	mysql_close($conn);
	}


?>