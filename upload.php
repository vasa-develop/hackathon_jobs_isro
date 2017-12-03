<?php
if(isset($_SESSION['hash'])){
//Uploading the upload
	session_start();
	
if((isset($_FILES['dob_proof'])) and (isset($_FILES['cat_cert'])) and (isset($_FILES['ed_qual']))){
	$file1 = $_FILES['dob_proof'];
	$file2 = $_FILES['cat_cert'];
	$file3 = $_FILES['ed_qual'];
	
	//File properties
	$file1_name = $_FILES['dob_proof']['name'];
	$file1_tmp = $_FILES['dob_proof']['tmp_name'];
	$file1_size = $_FILES['dob_proof']['size'];
	$file1_error = $_FILES['dob_proof']['error'];
	
	$file2_name = $_FILES['cat_cert']['name'];
	$file2_tmp = $_FILES['cat_cert']['tmp_name'];
	$file2_size = $_FILES['cat_cert']['size'];
	$file2_error = $_FILES['cat_cert']['error'];
	
	$file3_name = $_FILES['ed_qual']['name'];
	$file3_tmp = $_FILES['ed_qual']['tmp_name'];
	$file3_size = $_FILES['ed_qual']['size'];
	$file3_error = $_FILES['ed_qual']['error'];
	
	//Filtering the file extensions
	$file1_ext = explode('.',$file1_name);
	$file1_ext = strtolower(end($file1_ext));

	$file2_ext = explode('.',$file2_name);
	$file2_ext = strtolower(end($file2_ext));

	$file3_ext = explode('.',$file3_name);
	$file3_ext = strtolower(end($file3_ext));
	
	
	
	
		if(($file1_error === 0) and ($file2_error === 0) and ($file3_error === 0)){
			if(($file1_size <= 2097152) and ($file2_size <= 2097152) and ($file3_size <= 2097152)){
				
				$file1_name_new = uniqid('',true).'.'.$file1_ext;
				$file1_destination = 'uploads/'.$file1_name_new;

				$file2_name_new = uniqid('',true).'.'.$file2_ext;
				$file2_destination = 'uploads/'.$file2_name_new;

				$file3_name_new = uniqid('',true).'.'.$file3_ext;
				$file3_destination = 'uploads/'.$file3_name_new;
				//move_uploaded_file($file_tmp , $file_destination)
				if((!move_uploaded_file($file1_tmp , $file1_destination)) or (!move_uploaded_file($file2_tmp , $file2_destination))
				 or (!move_uploaded_file($file3_tmp , $file3_destination))){
					echo '<strong>There was some problem in uploading the upload.</strong>';
				}
				else{
					mysqli_query($dbconnect , "UPDATE `hackathon_isro_db1` SET `dob_proof`= '".mysqli_real_escape_string($dbconnect, $file1_name_new)."',
						`cat_cert` = '".mysqli_real_escape_string($dbconnect, $file2_name_new)."', '".mysqli_real_escape_string($dbconnect, $file3_name_new)."' where `username`='".$_SESSION['username']."'");
					}

			}
			else{
				echo 'file size is too large.';
			}
		}
		else{
			echo 'An error occured.';
		}
	
	
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
