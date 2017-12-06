<?php
	
	/* processUsers commits the entered values to add a
			new user to the database */
	
	function processUsers()
	{
	//echo "processUsers";
	
	/*establish connection*/
	$dbname = "TheCompleteWorko";
    $pw = "Complete459";
    $host = "localhost";
    $db = "TheCompleteWorko";
	
	$conn = mysql_connect($host, $dbname, $pw, $db) or die("processUsers connection failed");
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
	
	$insert_new_user = 
		"INSERT INTO User
		(username,password,type,class,team,f_name,l_name)
		VALUES('$username','$password','$type','$class','$team','$f_name','$l_name');";
	
	//Inserting new user to the database
	mysql_query($insert_new_user) or (trigger_error(mysql_error()." in ".$insert_new_user)
		&& (mysql_close($conn)));
	?>
	<p class="c">
		New user inserted.
	</p>
	<?php
	//create a select statement
	$new_user_query = 
		"SELECT COUNT(*)". 
		"FROM 'User'".
		"WHERE 'username' = '$username'".
		"AND 'password' = '$password'";
		
	/*$sampleQuery = 
		"SELECT `User`.`f_name`".
		"FROM `User`".
		"WHERE `username` = 'ddb14'";*/
		
	/*$exercise_query = 
		"SELECT `Exercise`.`exrcise_name`".
		"FROM `Exercise`".
		"WHERE `exrcise_type` = 'WARMUP'";
		*/
	
	/*$result=$mysqli->query($sampleQuery);
	$numRows=$mysqli->mysqli_num_rows($result);
	$i=0;
	while($i < $numRows)
	{
		$field1=mysql_result($result,$i,"field1");
		echo "$field1<br>";
		$i++;
	}*/
	//query the database with the select
	//$result = mysqli_query($conn, $sampleQuery) 
		/*or die("Bad query: $sampleQuery")*/;
	//echo "after result connection";
	
	/*while($row = mysqli_fetch_array($result))
	{
		echo  $row['f_name'];
	}*/
	
	
	
	//free the results
	mysql_free_result($result);
	
	//close the connection
	mysql_close($conn);
	
	//confirmNewUser($username, $password);
	?>
	
	<div class="center">
		<input type="submit" name="logout" value="logout"
				class="btn">
	</div>
	
	<?php
	}
?>