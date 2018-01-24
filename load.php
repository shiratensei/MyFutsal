<script>
	function loadEntry(id, content){
	var activecell = document.getElementById(id);
	activecell.innerHTML = content;
	return;
}
</script>
<?php
	$staffID = $_SESSION['staffID'];

	//connect to server
	$link = mysqli_connect("localhost", "root","");
	if(!$link){
		die("Connection failed!" . mysqli_connect_error());
	}
	//select the database
	$db_selected = mysqli_select_db($link, "myfutsal");

	$sql = "SELECT Position, Description FROM timetable_entry";
    $retval = mysqli_query($link, $sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error($link));
   }
   $front = 1;
   $back = 1;  
   while($row = mysqli_fetch_array($retval, 'mysql_num_rows')) {

      /*echo "POSITION :{$row[0]}  <br> ".
      "Description : {$row[1]} <br> ".
      "--------------------------------<br>";*/
      if($back % 7 != 0){
      	$arg = (float) $front.'.'.$back;
		echo "<script> loadEntry($arg,'{$row[1]}'); </script>";    	
      }
      else{
      	$back = 1;
      	$front++;
      	$arg = (float) $front.'.'.$back;
		echo "<script> loadEntry($arg,'{$row[1]}'); </script>";
      }
      $back++;
   }

   mysqli_free_result($retval);
   echo "Fetched data successfully\n";
   
   mysqli_close($link);
?>


