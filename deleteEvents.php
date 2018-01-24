<!DOCTYPE html>
<html>
	<head>
		<title>Delete Booking</title>
		<link rel="stylesheet" type="text/css" href="styles.css"> 
	</head>
	<body onload="changeValues()">
			<div id = 'menu'>
				<a href = "viewEvents.php">View Booking</a>
				<a href = "timetable.php">View Court Timetable</a>
				<a href = "logout.php" class="logout">Log Out</a>
			</div>
			
			<h1>Delete Booking</h1>
			<form method = "post" action = 'deleteEventsScript.php' name = "deleteForm">
				<p>Select the Booking:
				<select name = 'event' id = 'event' onChange = 'changeValues()'>
				<?php
					session_start();
					$eventsArray = $_SESSION['eventsArray'];
					foreach($eventsArray as $row) { 
						if(isset($row["Booker"])){
							echo '<option value="' . $row['EventID'] . '">' . $row['Booker'] . '</option>';
						}
					} 		
					//unset($_SESSION['eventsArray']);
				?>
				</select> 
				</p>
				<?php
					//Hidden inputs to store the PHP array data in the HTML form
					foreach($eventsArray as $row) { 
						if(isset($row["EventID"])){
							echo "<input type='hidden' value = '" . $row['Venue'] . "' id = 'a" . $row['EventID'] . "'>" ;
							echo "<input type='hidden' value = '" . $row['Start'] . "' id = 'b" . $row['EventID'] . "'>" ;
							echo "<input type='hidden' value = '" . $row['End'] . "' id = 'c" . $row['EventID'] . "'>" ;
							echo "<input type='hidden' value = '" . $row['Description'] . "' id = 'd" . $row['EventID'] . "'>" ;
							echo "<input type='hidden' value = '" . $row['EventDate'] . "' id = 'e" . $row['EventID'] . "'>" ;
							echo "<input type='hidden' value = '" . $row['Booker'] . "' id = 'f" . $row['EventID'] . "'>" ;
							echo "<input type='hidden' value = '" . $row['EventID'] . "' id = 'g" . $row['EventID'] . "'>" ;
						}
					} 
				?>
				
				<p><label>Booker:
				<input type = 'text' name = 'Booker' id = 'Booker' disabled>
				</p></label>
				
				<p><label>Booking Date:
				<input type = 'date' name = 'eventDate' id = 'eventDate' disabled>
				</p></label>
						
				<p><label>Venue:
				<input type = 'text' name = 'venue' id = 'venue' disabled>
				</label></p>
					
				<p><label>Start Time:
				<input type = 'time' name = 'start' id = 'start' disabled>
				</label></p>
						
				<p><label>End Time:
				<input type = 'time' name = 'end' id = 'end' disabled>
				</label></p>
						
				<p><label>Description:
				<input type = 'text' name = 'description' id = 'description' size = '50' disabled>
				</label></p>
				
				<input type = 'hidden' name = 'eventID' id = 'eventID'>
						
				<br>
				
				<p><input type = 'submit' value = 'Delete' class = 'formButton'></p>
			</form>
			
			<form action = 'viewEvents.php' method = 'post'>
				<input type = 'submit' value = 'Cancel' class = 'formButton' formaction = 'viewEvents.php'>
			</form>
			
			<script>
				function changeValues(){
					//Uses the hidden inputs to populate the textboxes based on the user's selection from the drop down list
					var id = document.deleteForm.event.value;
					
					document.getElementById("venue").value = document.getElementById("a"+id).value;
					document.getElementById("start").value = document.getElementById("b"+id).value;
					document.getElementById("end").value = document.getElementById("c"+id).value;
					document.getElementById("description").value = document.getElementById("d"+id).value;
					document.getElementById("eventDate").value = document.getElementById("e"+id).value;
					document.getElementById("Booker").value = document.getElementById("f"+id).value;
					document.getElementById("eventID").value = document.getElementById("g"+id).value;
				}
			</script>
	</body>
</html>