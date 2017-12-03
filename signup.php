<script type="text/javascript">
	function check_username(cb){
		<?php
		$q = mysqli_query($dbconnect , "Select * from `hackathon_isro_db1` where `username` = '".."'");
		?>
	}
</script>
<?php
	//print_r($_FILES['image']);
session_start();

	if(isset($_POST['submit'])){
		?><br><br><br><?php
		if(!isset($_SESSION['reload'])){
		$hash = hash('sha256', $_POST['username'].sha1($_POST['password']).$_FILES['dob_proof']['tmp_name'].$_FILES['cat_cert']['tmp_name'].$_FILES['ed_qual']['tmp_name'].date("Y/m/d").date("h:i:sa"));
		$_SESSION['reload'] = "reload";
		$_SESSION['hash'] = $hash;
		$_SESSION['username'] = $_POST['username'];
	}
	?><div class="card container"><?php	
		echo "<center><strong>THIS IS YOUR ALL IN ONE KEY: <font color='#00ff00'>".$_SESSION['hash']."</font><strong><br><br>";
		echo "<u>USE THIS KEY</u> :<br>";
		echo "1. IN YOUR ALL THE NEXT GOVERNMENT JOB RECRUITMENT FORMS.<br>";
		echo "2. TO UPDATE YOUR INFORMATION.<br><br>";
		echo "Please save your username and password which will be used in case you want to change the information or if you lose the key.<br><br>";
		echo "<a href='index.php?page=account'>You can view and edit your uploaded information here.</a></div>";
		
		
		

		mysqli_query($dbconnect , "INSERT INTO `hackathon_isro_db1` (`username`,`password`,`dob_proof`,`cat_cert`,`ed_qual`,`hash`) values 
			('".mysqli_real_escape_string($dbconnect,$_POST['username'])."' ,'".mysqli_real_escape_string($dbconnect,sha1($_POST['password']))."'
			,'','','','".mysqli_real_escape_string($dbconnect,$_SESSION['hash'])."')");

		include 'upload.php';	
	}
	else{
	?>


<center>
	<br><br><br>
	<h2><font color="#0000ff">SIGNUP FORM</font></h2>
	<div class="card container">
		<form name="form" method="post" action="index.php?page=signup" enctype="multipart/form-data">
			<strong>Username: </strong> <input type="text" name="username" onkeyup="check_username(this)" required/><br>
			<strong>Password: </strong> <input type="password" name="password" required/><br>
			<strong>D.O.B proof: </strong> <input type="file" name="dob_proof" required/><br>
			<strong>category certificate: </strong> <input type="file" name="cat_cert" required/><br>
			<strong>educational qualification: </strong> <input type="file" name="ed_qual" required/><br>
			<input type="submit" name="submit"/><br>
		</form>
	</div>
	<?php
}
	?>
</center>
