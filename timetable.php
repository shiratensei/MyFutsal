<!DOCTYPE html>
<html>
    <head>
        <title>Timetable</title>
        <link rel="stylesheet" type="text/css" href="styles.css"> 
    </head>

    <body>
		<?php session_start(); ?>
		
		<div id = 'menu'>
				<a href = "viewEvents.php">View Bookings</a>
				<a href = "timetable.php">View Court Timetable</a>
				<a href = "logout.php" class="logout">Log Out</a>
		</div>
		
		<br>
		<h1>Timetable</h1>
		<form>
			<h4>Select the desired Court:</h4>
			<input type="radio" name="venue" value="FC01" checked>Court 01  
			<input type="radio" name="venue" value="FC02" >Court 02  <br>
			<input type="radio" name="venue" value="FC03" >Court 03  
			<input type="radio" name="venue" value="FC04" >Court 04  <br>
			<input type="radio" name="venue" value="FC05" >Court 05  
			<input type="radio" name="venue" value="FC06" >Court 06  <br>
			<input type="submit" value="Go to selected court">  <br>
		</form>
		<br>
            <table width ="100%" align="center">
                <div id="head_nav">
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
                </div>  

                <tr>
                    <th>10:00 - 11:00</th>
                    
                        <td class = "timetable" id = "1.1" onclick = "editEntry(1.1)">-</td>
                        <td class = "timetable" id = "1.2" onclick = "editEntry(1.2)">-</td>
                        <td class = "timetable" id = "1.3" onclick = "editEntry(1.3)">-</td>
                        <td class = "timetable" id = "1.4" onclick = "editEntry(1.4)">-</td>
                        <td class = "timetable" id = "1.5" onclick = "editEntry(1.5)">-</td>
                        <td class = "timetable" id = "1.6" onclick = "editEntry(1.6)">-</td>
                </tr>

                <tr>
                    <th>11:00 - 12:00</td>
                    
                        <td class = "timetable" id = "2.1" onclick = "editEntry(2.1)">-</td>
                        <td class = "timetable" id = "2.2" onclick = "editEntry(2.2)">-</td>
                        <td class = "timetable" id = "2.3" onclick = "editEntry(2.3)">-</td>
                        <td class = "timetable" id = "2.4" onclick = "editEntry(2.4)">-</td>
                        <td class = "timetable" id = "2.5" onclick = "editEntry(2.5)">-</td>
                        <td class = "timetable" id = "2.6" onclick = "editEntry(2.6)">-</td>
                </tr>

                <tr>
                    <th>12:00 - 01:00</td>
                    
                        <td class = "timetable" id = "3.1" onclick = "editEntry(3.1)">-</td>
                        <td class = "timetable" id = "3.2" onclick = "editEntry(3.2)">-</td>
                        <td class = "timetable" id = "3.3" onclick = "editEntry(3.3)">-</td>
                        <td class = "timetable" id = "3.4" onclick = "editEntry(3.4)">-</td>
                        <td class = "timetable" id = "3.5" onclick = "editEntry(3.5)">-</td>
                        <td class = "timetable" id = "3.6" onclick = "editEntry(3.6)">-</td>
                </tr>

                <tr>
                    <th>01:00 - 02:00</td>
                    
                        <td class = "timetable" id = "4.1" onclick = "editEntry(4.1)">-</td>
                        <td class = "timetable" id = "4.2" onclick = "editEntry(4.2)">-</td>
                        <td class = "timetable" id = "4.3" onclick = "editEntry(4.3)">-</td>
                        <td class = "timetable" id = "4.4" onclick = "editEntry(4.4)">-</td>
                        <td class = "timetable" id = "4.5" onclick = "editEntry(4.5)">-</td>
                        <td class = "timetable" id = "4.6" onclick = "editEntry(4.6)">-</td>
                </tr>

                <tr>
                    <th>02:00 - 03:00</td>
                    
                        <td class = "timetable" id = "5.1" onclick = "editEntry(5.1)">-</td>
                        <td class = "timetable" id = "5.2" onclick = "editEntry(5.2)">-</td>
                        <td class = "timetable" id = "5.3" onclick = "editEntry(5.3)">-</td>
                        <td class = "timetable" id = "5.4" onclick = "editEntry(5.4)">-</td>
                        <td class = "timetable" id = "5.5" onclick = "editEntry(5.5)">-</td>
                        <td class = "timetable" id = "5.6" onclick = "editEntry(5.6)">-</td>
                </tr>

                <tr>
                    <th>03:00 - 04:00</td>
                    
                        <td class = "timetable" id = "6.1" onclick = "editEntry(6.1)">-</td>
                        <td class = "timetable" id = "6.2" onclick = "editEntry(6.2)">-</td>
                        <td class = "timetable" id = "6.3" onclick = "editEntry(6.3)">-</td>
                        <td class = "timetable" id = "6.4" onclick = "editEntry(6.4)">-</td>
                        <td class = "timetable" id = "6.5" onclick = "editEntry(6.5)">-</td>
                        <td class = "timetable" id = "6.6" onclick = "editEntry(6.6)">-</td>
                </tr>

                <tr>
                    <th>04:00 - 05:00</td>
                    
                        <td class = "timetable" id = "7.1" onclick = "editEntry(7.1)">-</td>
                        <td class = "timetable" id = "7.2" onclick = "editEntry(7.2)">-</td>
                        <td class = "timetable" id = "7.3" onclick = "editEntry(7.3)">-</td>
                        <td class = "timetable" id = "7.4" onclick = "editEntry(7.4)">-</td>
                        <td class = "timetable" id = "7.5" onclick = "editEntry(7.5)">-</td>
                        <td class = "timetable" id = "7.6" onclick = "editEntry(7.6)">-</td>
                </tr>
            </table>
            <br><br>
            <?php include "load.php";?>
            <div id = "editor" style = "display:none;"> 
                <h4>Choose Your Operation To This Slot: </h4>
                <button id = "remove" onclick = "deleteEntry()">Remove Entry</button>
                <button id = "edit" onclick = "editEvent()">Edit Entry</button>
            </div>

            <div id = "editor2" style = "display:none;"> 
                <h4>Edit Timeslot:</h4>
                Input Event: <input id = "agenda" type = "text" onclick="this.select()"/>
                <button id = "add" onclick = "addEvent()">Add Event</button>
            </div>

        <form id = "form" method = "post" action = "save.php">
            <script>
                for(var i = 1; i <= 42; i++){
                    var el = document.createElement("input");
                    el.type = "hidden";
                    el.name = "a" + i;
                    el.id = "a" + i;
                    el.value = "";
                    var cont = document.getElementById('form');
                    cont.appendChild(el); 
                }
            </script>     
            <p><input type = "submit" value = "Save" onclick = "setEntry()"></p>
        </form>
        <script src = "script.js"></script>
    </body>
</html>    