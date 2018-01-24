<?php
	session_start();
	
	if(isset($_SESSION['eventsArray']) && !empty($_SESSION['eventsArray'])){
		unset($_SESSION['eventsArray']);
	}
	
	if(isset($_SESSION['staffID']) && !empty($_SESSION['staffID'])){
		unset($_SESSION['staffID']);
	}
	
	header('location:index.php');
	exit;
?>