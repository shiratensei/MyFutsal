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
	
	$IDErr = $PasswordErr  = "";
	$ID = $Password = "";
	
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
	}
	
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// check connection
	if (!$conn) {
		die("Connection unsuccessful. Error: " . mysqli_connect_error() );
	}
	
	$sql = "SELECT staffID, Password FROM staff WHERE staffID = " . $ID ;
	// To store result fetched by the sql
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0 ) { //if record exist
		$row = mysqli_fetch_assoc($result);
		$check_ID = $row["staffID"];
		$check_Password = $row["Password"];
		
		if ($check_ID==$ID and $check_Password==$Password){
			//if login successful, set session variables
			$_SESSION["staffID"] = $ID;
			mysqli_close($conn);
			header("location:viewEvents.php"); 
			exit;
		}
		else{
			echo "Unsuccessful login. Incorrect Password. <br>";
			$reg_link = "<mark><a href='register.php'> here </a></mark>";
			echo "Not yet Registered? Register " . $reg_link . ". <br>";
		}
	}
	else{
		echo "Unsuccessful login. Username does not exist. <br>";
		$reg_link = "<mark><a href='register.php'> here </a></mark>";
		echo "Not yet Registered? Register " . $reg_link . ". <br>";
	}
	
	mysqli_close($conn);
	
	?>
	</body>
</html>