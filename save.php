<?php
	//$staffID = $_POST["staffID"];
	//testing code
	session_start();
	$staffID = $_SESSION['staffID'];
//connect to server
	$link = mysqli_connect("localhost", "root","");
	if(!$link){
		die("Connection failed!" . mysqli_connect_error());
	}
	//select the database
	$db_selected = mysqli_select_db($link, "myfutsal");
	
	if(!$db_selected)
	{	
		//create a database: my_db
		$sql = "CREATE DATABASE my_db";
		if(mysqli_query($link,$sql))
		{
			echo "Database Created Successfully.";
			//select the database
			$db_selected = mysqli_select_db($link, "my_db");
		}
		else
		{
			echo "Error creating database:" . mysqli_error($link);
		}
	}

/*
	//Create table "guests"
	$sql = "CREATE TABLE timetable_entry (ID INT(10), Position VARCHAR(4), Description VARCHAR(20))";
	if(mysqli_query($link,$sql))
	{
		echo "Table timetable_entry created";
	}
	else{
		echo "Error creating table:". mysqli_error($link);
	}
*/

//Populating table. Check if record exist or not first.
	//mysqli_query($link,"DELETE FROM timetable_entry WHERE ID = 1 OR ID = 2");

	$sql = "SELECT * FROM timetable_entry ";  /*WHERE ID = $stuID*/ 
	if(!mysqli_num_rows(mysqli_query($link,$sql)) > 0)
	{
		for($i = 1; $i <= 42; $i++){
			$id = 'a'. $i;
			$desc = $_POST[$id];
			$sql = "INSERT INTO timetable_entry (ID, Position, Description) VALUES ($staffID, '$id', '$desc')";
			mysqli_query($link,$sql);
		}	
	}
	else
	{
		for($i = 1; $i <= 42; $i++){
			$id = 'a'. $i;
			$desc = $_POST[$id];
			$sql = "UPDATE timetable_entry SET Description = '$desc' WHERE Position = '$id'"; //ID = $stuID AND 
			mysqli_query($link,$sql);
		}				
	}
	header('location:timetable.php');
	mysqli_close($link);
?>



