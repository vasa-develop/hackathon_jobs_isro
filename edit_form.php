<?php 

if($_SESSION['hash']){

$query1 = mysqli_query($dbconnect , "Select * from `hackathon_isro_db1` where `hash`='".$_SESSION['hash']."'");
$result1 = mysqli_fetch_assoc($query1);

if(isset($_POST['edit'])){
?><br><br><br><?php
		if(!isset($_SESSION['reload'])){

			$hash = hash('sha256', sha1($_POST['password']).$_FILES['dob_proof']['tmp_name'].$_FILES['cat_cert']['tmp_name'].$_FILES['ed_qual']['tmp_name'].date("Y/m/d").date("h:i:sa"));
			
			$_SESSION['reload'] = "reload";
			$_SESSION['hash'] = $hash;


			

			include 'upload.php';

			
		
	}


	mysqli_query($dbconnect , "UPDATE `hackathon_isro_db1` set `password` = '".mysqli_real_escape_string($dbconnect,sha1($_POST['password']))."',`hash`= '".mysqli_real_escape_string($dbconnect,$_SESSION['hash'])."' where `username` = '".$_SESSION['username']."'");

	?><div class="card container"><?php	
		echo "<center><strong>THIS IS YOUR ALL IN ONE KEY: <font color='#00ff00'>".$_SESSION['hash']."</font><strong><br><br>";
		echo "<u>USE THIS KEY</u> :<br>";
		echo "1. IN YOUR ALL THE NEXT GOVERNMENT JOB RECRUITMENT FORMS.<br>";
		echo "2. TO UPDATE YOUR INFORMATION.<br><br>";
		echo "<a href='index.php?page=account'>You can view and edit your uploaded information here.</a></div>";
		

}
else if(!isset($_POST['edit'])){
?>
<center>
	<br>
	<h3><font color="#0000ff">Edit Infromation</font></h3>
	<div class="card container">
		<form name="form" method="post" action="index.php?page=account&action=edit" enctype="multipart/form-data">
			<strong>Password:</strong> <input type="password" name="password" required/><br>
			<strong>D.O.B proof:</strong> <input type="file" name="dob_proof" required/><br>
			<strong>category certificate:</strong> <input type="file" name="cat_cert" required/><br>
			<strong>educational qualification:</strong> <input type="file" name="ed_qual" required/><br>
			<input type="submit" name="edit"/><br>
		</form>
	</div>
</center>	
<?php
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