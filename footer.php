<?php
if(isset($_SESSION['hash'])){
?>
<center><strong><a href="index.php?page=account&action=logout">Logout</a></strong></center>
<?php
}
else{
	?>
		<script type="text/javascript">
			window.location = "http://localhost/hackathons/index.php?page=login";
		</script>
	<?php
}
?>