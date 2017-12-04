<?php

	function create_login()
	{
		echo "<p>create_login()</p>";
		?>
		
		<form method="post" 
			action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
			
		<?php 
			require("tcw_login_field.html");
		?>
		
		<div class="center">
			<input type="submit" value="Login" />
		</div>
		</form>
		
	<?php
	}
?>