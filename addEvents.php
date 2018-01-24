<html>

	<head>
		<title>Add Booking</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		
	</head>

	<body>
		<div id = 'menu'>
				<a href = "viewEvents.php">View Booking</a>
				<a href = "timetable.php">View Court Timetable</a>
				<a href = "logout.php" class="logout">Log Out</a>
		</div>
			<h1> Add New Booking </h1>
			<form action = 'addEventsScript.php' method = 'post' onsubmit="return validateForm(this);">
				<p><label>Booker: 
				<input type = 'text' name = 'booker' required>
				</label></p>
						
				<p><label>Booking Date:
				<input type = 'date' name = 'eventDate' required>
				</p></label>
						
				<p><label>Venue:
				<input type = 'text' name = 'venue' required>
				</label></p>
					
				<p><label>Start Time:
				<input type = 'time' name = 'start' id = 'start' required>
				</label></p>
						
				<p><label>End Time:
				<input type = 'time' name = 'end' id = 'end' required>
				</label></p>
						
				<p><label>Description:
				<input type = 'text' name = 'description' size = '50'>
				</label></p>
						
				<br>
				<p><input type = 'submit' value = 'Add' class = 'formButton'></p>		
			</form>
			
			<form action = 'viewEvents.php' method = 'post'>
				<input type = 'submit' value = 'Cancel' class = 'formButton' formaction = 'viewEvents.php'>
			</form>
			
			<script type="text/javascript">
				function validateForm(form){
					var startTime = document.getElementById('start').value;
					var endTime = document.getElementById('end').value;

					if(endTime < startTime){
						window.confirm("End Time must be after Start Time!");
						return false;
					}
					else{
						return true;
					}
				}
			</script>
	</body>
</html>
