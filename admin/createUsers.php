<?php
	function createUsers()
	{
		//echo "<p>createUsers()</p>";
	?>
	<!-- <h2> TCW - Create New Users </h2> -->
	<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],
		ENT_QUOTES) ?>" class="center">
		<fieldset>
			<legend> TCW - Create New Users </legend>
			<input type="text" id="last_name" required="required"
				name = "lastName" placeholder = "Last Name" />
				
			<input type="text" id="first_name" required="required"
				name = "firstName" placeholder = "First Name" />
				
			<input type="text" id="user_entry" required="required"
				name = "userName" placeholder = "Username" />
				
			<input type="text" id="pwd_entry" required="required"
				name = "pwd" placeholder = "Password" />
				
			<select name="userType">
				<option value="standard">Standard User</option>
				<option value="admin">Admin User</option>
			</select>
			
			<select name="classChoice">
				<option value="none">No class entry</option>
				<option value="pe 157">PE157</option>
				<option value="pe 158">PE158</option>
			</select>
			
			<select name="sportsChoice">
				<option value="none">No team</option>
				<option value="basketball">Basketball</option>
				<option value="crosscountry">Cross Country</option>
				<option value="football">Football</option>
				<option value="rowing">Rowing</option>
				<option value="soccer">Soccer</option>				
				<option value="softball">Softball</option>				
				<option value="track and field">Track and field</option>
				<option value="volleyball">Volleyball</option>
			</select>
			
			<br><br>
			
			<input type="submit" name="userNext" value="Create User Now" class="btn" />
		</fieldset>
	</form>
	<?php
	}
?>