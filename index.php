<html>
<head>
	<title>vasa</title>
	<!--FIREBASE INTEGRATION-->
<script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBnHRIU6rAd9dL6wLSfHM10jSV-LKHHLVg",
    authDomain: "lavis-d1fb0.firebaseapp.com",
    databaseURL: "https://lavis-d1fb0.firebaseio.com",
    projectId: "lavis-d1fb0",
    storageBucket: "",
    messagingSenderId: "532515607974"
  };
  firebase.initializeApp(config);
</script>
	<?php
		include 'dbconnect.php';
		include 'header.php';
	?>
</head>
<body>
	<?php
		if(isset($_GET['page'])){
			include $_GET['page'].".php";
		}
		else{
			?><script type="text/javascript">
				window.location = "http://localhost/hackathons/index.php?page=login";
			</script><?php
		}
	?>

	

</body>
</html>