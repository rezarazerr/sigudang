<?php

	session_start();
	$_SESSION['is_login'] = false;

	// remove all session variables
	session_unset();

	// destroy the session

	session_destroy();

	echo "<script>
		window.location.replace('login.php');
	</script>";
?>