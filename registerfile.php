<!DOCTYPE html>

<html>
	<head> <link rel = "stylesheet" type = "text/css" href = "styles.css"> </head>

	<body> 
	<?php
	
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myfutsal";
	
	$IDErr = "";
	$ID = $Password = $Name = $Email = "";
	
	//define the func test_input()
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data); //htmlspecialchars() function converts special characters to HTML entities //prevent XSS attack
		return $data;
	}
	
	//sanitize input data using func test_input()  //data validation
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$subject = test_input($_POST["subject"]);
		$ID = test_input($_POST["ID"]);
		$Password = test_input($_POST["Password"]);
		$Name = test_input($_POST["Name"]);
		$Email = test_input($_POST["Email"]);
	}
	
	if (!preg_match("/^[0-9]*$/",$ID)) {
		$IDErr = "Only numbers are allowed"; 
		echo "Username Error: " . $IDErr ;
		$reg_link = "<mark><a href='register.php'> here </a></mark>";
		echo "<br>Back to Registration Page " . $reg_link . ". <br>";
		exit;
	}
	
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// check connection
	if (!$conn) {
		die("Connection unsuccessful. Error: " . mysqli_connect_error() );
	}
	
	$sql = "SELECT staffID FROM staff WHERE staffID = " . $ID;
	// To store result fetched by the sql
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0 ) { //if record exist (ID already exist!)
		$row = mysqli_fetch_assoc($result);
		$check_ID = $row["staffID"];
		
		if ($check_ID==$ID) {  //if ID already exist, notify user
			$login_link = "<mark><a href='index.php'> here </a></mark>";
			$reg_link = "<mark><a href='register.php'> here </a></mark>";
			echo "The ID is already in use in database. Registration is unsuccessful. <br>";
			echo "To go to login page, click " . $login_link . ". <br>" ;
			echo "To do the registration again, click " . $reg_link . ". <br>" ;
		}
	}else{
		$sql2 = "INSERT INTO staff (staffID, Password, Name, Email) VALUES ($ID, '$Password', '$Name', '$Email')" ;
		if (mysqli_query($conn, $sql2)) {
			echo "New record created successfully. <br>";
			$login_link = "<mark><a href='index.php'> here </a></mark>";
			echo "You may now log in by clicking " . $login_link . " <br>";
		} 
		else {
			echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
			echo "Error with the link to the database. You may need to register again later.";
		}
	}
	
	mysqli_close($conn);
	
	?>
	</body>
</html>