<?php
	session_start();
	unset($_SESSION['login_admin']);
	session_destroy();
?>
<script>location.href='../../login.php'</script>