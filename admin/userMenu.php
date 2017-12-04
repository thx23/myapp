<?php
	function userMenu()
	{
		echo "<p>userMenu()</p>";
	?>
	<h2>userMenu</h2>
	<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'],
		ENT_QUOTES) ?>">
		<fieldset>
			<legend> What next? </legend>
			<div class = "center">
				<input type="submit" name="logout" value="Logout"/>
			</div>
		</fieldset>
	</form>
	<?php
	}
	?>