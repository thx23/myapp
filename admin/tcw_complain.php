<?php
	function tcw_complain($complaint)
	{
		?>
	<h2>
		Cannot Proceed: <?= strip_tags($complaint) ?>
	</h2>
	
	<form method="post"
        action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
            <input type="submit" value="try again" />
    </form>

    <?php
        require_once('tcw_footer.html');
    ?>
</body>
</html>
    <?php
        session_destroy();
        exit;
    }
?>
	