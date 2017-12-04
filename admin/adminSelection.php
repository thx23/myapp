<?php
	
	/* adminSelection lists the options available to the admin 
		offered as buttons */
	
	function adminSelection()
	{
		echo "<p>adminSelection</p>";
		?>
	<h2 class="center"> TCW Administration </h2>
	<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],
		ENT_QUOTES) ?>">
		<fieldset class="center">
			<legend> adminSelection </legend>
			
			<!-- $_POST is gathering the 'name' data -->
			<input type="submit" id="createRoutine" name="createRoutine" 
				value="createRoutine">
			<br>	
			<input type="submit" id="createUsers" name="createUsers" 
				value="createUsers"> 
			<br>	
			<input type="submit" id="viewWorkouts" name="viewWorkouts" 
				value="viewWorkouts">
			<br>
			<input type="submit" id="logout" name="logout" value="logout">
			
		</fieldset>
	</form>
	<?php
	}


?>