<html>
	<head>
		<title>Database Manipulation</title>
	</head>
	
	<body>
		<?php
		
		//Connect to server
		$link = mysqli_connect("localhost", "root", "");
		if(!$link){
			die("Could not connect to server: ".mysqli_connect_error());
		}
		
		//Select the database
		$db_selected = mysqli_select_db($link, "myfutsal");
		
		echo "<p>";
		//If cannot select the database
		if(!$db_selected){
			//SQL to create database
			$sql = "CREATE DATABASE myfutsal";
			
			//If database is successfully created, connect to the database
			if(mysqli_query($link, $sql)){
				echo "Database myfutsal successfully created!";
				$db_selected = mysqli_select_db($link, "myfutsal");
			}
			else{
				echo "Error creating database: ".mysqli_error($link);
			}
		}
		
		echo "</p><p>";
		//Create table "staff"
		//add these after timetable and events
		$sql = "CREATE TABLE staff (staffID INT(10) NOT NULL PRIMARY KEY, Password varchar(50), Name varchar(100), Email varchar(50))";
		if(mysqli_query($link,$sql))
		{
			echo "Table staff created";
		}
		else{
			echo "Error creating table:". mysqli_error($link);
		}
		
		echo "</p><p>";
		//Create table "timetable_entry"
		$sql = "CREATE TABLE timetable_entry (ID INT(10), Position VARCHAR(4), Description VARCHAR(20))";
		if(mysqli_query($link,$sql))
		{
			echo "Table timetable_entry created";
		}
		else{
			echo "Error creating table:". mysqli_error($link);
		}
		
		echo "</p><p>";
		//Create table "events"
		$sql = "CREATE TABLE events (eventID INT(10) NOT NULL AUTO_INCREMENT, staffID INT(10) NOT NULL, Booker TEXT NOT NULL , Venue TEXT NOT NULL , Start TIME NOT NULL , End TIME NOT NULL , Description TEXT , EventDate DATE NOT NULL , PRIMARY KEY (eventID));";

		if(mysqli_query($link,$sql))
		{
			echo "Table events created";
		}
		else{
			echo "Error creating table:". mysqli_error($link);
		}
		echo "</p>";
		mysqli_close($link);
		?>
	</body>
</html>