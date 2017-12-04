<?php
	
	/* adminSelection brings the admin full circle back 
		to choosing what their next action is */
	
	function adminSelection()
	{
		?>
	<h2 class="center"> TCW Management </h2>
	<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],
		ENT_QUOTES) ?>">
		<fieldset class="center">
			<legend> adminMenu </legend>
			<input type="submit" id="createRoutine" name="createRoutine" value="createRoutine"> 
				<!-- <label for="createRoutine">Create a Routine</label><br> -->
				
			<input type="submit" id="createUsers" name="createUsers" value="createUsers"> 
				<!-- <label for="createUsers">Create Users</label><br> -->
				
			<input type="submit" id="viewWorkouts" name="viewWorkouts" value="viewWorkouts">
				<!-- <label for="viewWorkouts">View Completed Workouts</label><br> -->
			<br>
			<input type="submit" name="adminNext" value="Go" />
		</fieldset>
	</form>
	<?php
	}


?>
</body>
</html>