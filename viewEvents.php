<!DOCTYPE html>
<html>
	<head>
		<title>View Bookings</title>
		<link rel="stylesheet" type="text/css" href="styles.css"> 
		
	</head>
		
	<body>
		<div id = 'menu'>
				<a href = "getEvents.php">View Bookings</a>
				<a href = "timetable.php">View Court Timetable</a>
				<a href = "logout.php" class="logout">Log Out</a>
		</div>
		
		<br>
		
		<?php
			//For testing, set student ID = 1151303086
			//For later on I will use session to store student ID.
			session_start();
			//$_SESSION['staffID'] = $staffID; The login file will be initializing the staffID.
			$staffID = $_SESSION['staffID'];
			
			echo "<h1>View Bookings</h1>";
			
			//For Add + Edit + Delete - Display message to user
			if(isset($_SESSION['message'])){
				$message = $_SESSION['message'];
				echo "<p style='color:red'>$message</p>";
				unset($_SESSION['message']);
			}
			
			echo "<form method = 'post'>
					<p><label>Choose your date
					<input type = 'date' name = 'findDate'>
					<input type = 'submit' value = 'Find' formaction='getEvents.php'>
					<label></p>";
			
			$allowEdit = TRUE;
			
			//Get current date
			date_default_timezone_set('Asia/Kuala_Lumpur');
			$date = date('j M Y', time());
			
			//Connect to database
			$mysqli = mysqli_connect("localhost", "root","", "myfutsal");
			
			if(!$mysqli){
				die("Could not connect to server: ".mysqli_connect_error());
			}	
			
			$query = "SELECT * FROM events WHERE DATE(EventDate) = DATE(NOW()) ORDER BY Venue, Start";

			$result = mysqli_query($mysqli, $query);
			
			$findDate = date('j M Y', strToTime($date));
			echo "<br><p>Welcome $staffID! These are bookings for $findDate:</p>";
			
			//If there are rows fetched then print out in table
			if(mysqli_num_rows($result) > 0){
				echo "<table border = '1'>";
				echo "<tr><th>Booker</th><th>Venue</th><th>Start Time</th><th>End Time</th><th>Description</th></tr>";
				
				//$eventsArray[] = mysqli_fetch_all($result, MYSQLI_ASSOC);
				
				while($eventsArray[] = mysqli_fetch_assoc($result));
				
				foreach($eventsArray as $row){
					if(isset($row["Booker"])){
						echo "<tr><td>" . $row["Booker"] . 
						"</td><td>" . $row['Venue'] .
						"</td><td>" .substr($row['Start'],0,5). 
						"</td><td>" .substr($row['End'],0,5).
						"</td><td>" . $row['Description'] . "</td></tr>";
					}	
				}
				
				//echo var_export($eventsArray);
				//echo json_encode(array('cases' => $eventsArray));

				echo "</table><br>";
				
				//Initialise eventsArray in session to be used in editEvents and deleteEvents
				$_SESSION['eventsArray'] = $eventsArray;
			}
			else{
				echo "<p>No booking found for this date</p> <br>";
				$allowEdit = FALSE;
			}
			
			//Close connection to database
			$mysqli->close();
			
			echo "<input type = 'submit' value = 'Add Booking' class = 'formButton' formaction = 'addEvents.php'>";
			
			//If no existing records for the chosen date, cannot Edit and Delete records because there are no records
			if($allowEdit){
				echo "<input type = 'submit' value = 'Edit Booking' class = 'formButton' formaction = 'editEvents.php'>";
				echo "<input type = 'submit' value = 'Delete booking' class = 'formButton' formaction = 'deleteEvents.php'>";
			}
			else{
				echo "<input type = 'submit' value = 'Edit booking' class = 'formButton' formaction = 'editEvents.php' disabled>";
				echo "<input type = 'submit' value = 'Delete booking' class = 'formButton' formaction = 'deleteEvents.php' disabled>";
			}
			echo "</form>";
		?>
	</body>
</html>