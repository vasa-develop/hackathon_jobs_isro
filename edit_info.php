<?php

if(isset($_SESSION['hash'])){

if(isset($_POST['submit'])){
	$query = mysqli_query($dbconnect , "Select * from `hackathon_isro_db1` where `username`='".$_POST['username']."' and `password`='".sha1($_POST['password'])."'");
	$result = mysqli_fetch_assoc($query);
	if(mysqli_num_rows($query)>0){
		unset($_SESSION['reload']);
		include 'edit_form.php';
	}
	else{
		?>
		<center>
			<h4><font color="#0000ff">Enter your credentials to edit information</font></h4>
		<div class="card container">
			<form name = "login" method="post" action = "index.php?page=account&action=edit">
				Username: <input type="text" name="username"/><br>
				Password: <input type="password" name="password"/><br>	
				<input type="submit" name="submit"/>
			</form>
		</div>
		</center>
		<?php
		echo "<center><font color='#ff0000'>Your credentials didn't match</font></center>";
	}

}
else if((!isset($_POST['submit'])) and (!isset($_POST['edit']))){
?>

<center>
			<h4><font color="#0000ff">Enter your credentials to edit information</font></h4>
		<div class="card container">
			<form name = "login" method="post" action = "index.php?page=account&action=edit">
				Username: <input type="text" name="username"/><br>
				Password: <input type="password" name="password"/><br>	
				<input type="submit" name="submit"/>
			</form>
		</div>
		</center>
<?php
}
if(isset($_POST['edit'])){
	include 'edit_form.php';
}
}
else{
	?>
		<script type="text/javascript">
			window.location = "http://localhost/hackathons/index.php?page=login";
		</script>
	<?php
}
?>		