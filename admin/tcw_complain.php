<?php
	function tcw_complain($complaint)
	{
		?>
	<h2 class="center">
		Cannot Proceed: <?= strip_tags($complaint) ?>
	</h2>
	
	<form method="post" class="center"
        action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
            <input type="submit" value="Try Again" class="btn"/>
    </form>

    <?php
        session_destroy();
        exit;
    }
?>
	