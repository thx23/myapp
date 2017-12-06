<?php
	
	/* adminSelection lists the options available to the admin 
		offered as buttons */
	
	function adminSelection()
	{
		//echo "<p>adminSelection</p>";
		?>
	<!-- <h2 class="center"> TCW Administration </h2> -->
	<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],
		ENT_QUOTES) ?>">
		<fieldset class="center">
			<legend> TCW Administration </legend>
			
			<!-- $_POST is gathering the 'name' data -->
			<input type="submit" id="createRoutine" name="createRoutine" 
				class="btn" value="Create a New Routine">
			<br>	
			<input type="submit" id="createUsers" name="createUsers" 
				class="btn" value="Create a New User"> 
			<br>	
			<input type="submit" id="viewWorkouts" name="viewWorkouts" 
				class="btn" value="View Completed Workouts">
			
		</fieldset>
	</form>
	<?php
	}


?>