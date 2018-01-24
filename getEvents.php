<!DOCTYPE html>
<html>
	<head>
		<title>View Bookings</title>
		
		<link rel="stylesheet" type="text/css" href="styles.css"> 
	</head>
	
	<body>
		<div id = 'menu'>
				<a href = "viewEvents.php">View Bookings</a>
				<a href = "timetable.php">View Court Timetable</a>
				<a href = "logout.php" class="logout">Log Out</a>
		</div>
		
		<?php
			//Start session
			session_start();
			echo "<h1>View Bookings</h1>";
			echo "<form method = 'post'>
					<p><label>Choose your date
					<input type = 'date' name = 'findDate'>
					<input type = 'submit' value = 'Find' formaction = 'getEvents.php' >
					</label></p>";
			
			$allowEdit = TRUE;
			
			//Get date
			$findDate = $_POST["findDate"];
			$findDate = date('Y-m-d', strToTime($findDate));
			
			//Get Staff ID from session variable
			$staffID = $_SESSION["staffID"];
			
			//Connect to database
			$mysqli = mysqli_connect("localhost", "root","", "myfutsal");
			
			if(!$mysqli){
				die("Could not connect to server: ".mysqli_connect_error());
			}
			
			$query = "SELECT * FROM events WHERE EventDate = '$findDate' ORDER BY Venue, Start";

			$result = mysqli_query($mysqli, $query);
			
			$findDate = date('j M Y', strToTime($findDate));
			echo "<br><p>Welcome $staffID! These are bookings for $findDate:</p>";
			
			//If there are rows fetched then print out in table
			if(mysqli_num_rows($result) > 0){
				echo "<table>";
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
			
			echo "<input type = 'submit' value = 'Add booking' class = 'formButton' formaction = 'addEvents.php'>";
			
			//If no existing records for the chosen date, cannot Edit and Delete records because there are no records
			if($allowEdit){
				echo "<input type = 'submit' value = 'Edit booking' class = 'formButton' formaction = 'editEvents.php'>";
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

