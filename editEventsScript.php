<html>
	<body>
		<?php
			//Retrieve data from POST and from SESSION
			session_start();
			$eventID = $_POST['eventID'];
			$Booker = $_POST['Booker'];
			$eventDate = $_POST['eventDate'];
			$venue = $_POST['venue'];
			$startTime = (string)$_POST['start'].':00';
			$endTime = (string)$_POST['end'].':00';
			$description = $_POST['description'];
			
			//Connect to database
			$mysqli = mysqli_connect("localhost", "root","", "myfutsal");
			
			if(!$mysqli){
				die("Could not connect to server: ".mysqli_connect_error());
			}
			
			//Inserting data into table
			$sql = "UPDATE events SET Booker = '$Booker', Venue = '$venue', Start = '$startTime', End = '$endTime', Description = '$description', EventDate = '$eventDate' WHERE
			EventID = $eventID";
			
			if(mysqli_query($mysqli, $sql)){
				$_SESSION['message'] = "Data updated successfully!";
			}
			else{
				$_SESSION['message'] = "Error updating data: ".mysqli_error($mysqli);
			}
			
			//Close connection and unset eventsArray
			mysqli_close($mysqli);
			unset($_SESSION['eventsArray']);
			header('location:viewEvents.php');
		?>
	</body>
</html>