<?php
session_start();
if(isset($_GET['action'])){
	if($_GET['action']=="logout"){
		unset($_SESSION['hash']);
		unset($_SESSION['reload']);
		unset($_SESSION['username']);
	}
}

if(!isset($_SESSION['hash'])){
	?>
		<script type="text/javascript">
			window.location = "http://localhost/hackathons/index.php?page=login";
		</script>
	<?php
}

else if(isset($_SESSION['hash'])){

$query = mysqli_query($dbconnect , "Select * from `hackathon_isro_db1` where `hash`='".$_SESSION['hash']."'");
$result = mysqli_fetch_assoc($query);
?>
<center>
	<p>Welcome <?php echo("<strong>".$_SESSION['username']."</strong><br>");?></p>
	<div class="card container">
		<a href="index.php?page=account&action=view">View uploaded information</a><br>
		<a href="index.php?page=account&action=edit">Edit uploaded information</a>
	</div>
</center>
<?php

if(isset($_GET['action'])){
	if($_GET['action']=="view"){
		?>
			<center>
				
				<div class="card container">
					<strong>D.O.B Proof : </strong><a href="uploads/<?php echo $result['dob_proof']; ?>" target="_blank">view file</a></p><br>
					<strong>Category Certificate : </strong><a href="uploads/<?php echo $result['cat_cert']; ?>" target="_blank">view file</a></p><br>
					<strong>Education Qualification : </strong><a href="uploads/<?php echo $result['ed_qual']; ?>" target="_blank">view file</a></p><br>
				</div>
			</center>
		<?php
	}if($_GET['action']=="edit"){
		include 'edit_info.php';
	}
	
}

include 'footer.php';
}
?>