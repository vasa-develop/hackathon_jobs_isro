<center>
	<h3>LOGIN FORM</h3>
<div class="card container">
	<form name = "login" method="post" action = "index.php?page=login">
		KEY: <input type="password" name="key"/><br>
		<input type="submit" name="submit"/>
	</form>
	<a href="index.php?page=forgot">forgot your key?</a><br>
	<p><a href="index.php?page=signup">Create a new key</a></p></center>

</div>
</center>

<?php
	if(isset($_POST['submit'])){
		$query = mysqli_query($dbconnect , "SELECT * from `hackathon_isro_db1` where `hash`='".$_POST['key']."'");
		$res = mysqli_fetch_assoc($query);
		if(mysqli_num_rows($query)){
			session_start();
			$_SESSION['hash'] = $_POST['key'];
			$_SESSION['username'] = $res['username'];
			?><script type="text/javascript">
				window.location = "http://localhost/hackathons/index.php?page=account";
			</script><?php
		}
		else{
			?><center><p>Your key didn't matched with any of the existing keys.</p>
				<p><a href="index.php?page=signup">Create a new key</a></p></center><?php
		}
			
	}
		

?>