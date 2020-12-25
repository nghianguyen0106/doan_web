<?php 
if (!isset($_SESSION["admin"])) session_start();
unset($_SESSION['admin']);
?>
<script>
	window.location='index.php';
</script><?php ?>
