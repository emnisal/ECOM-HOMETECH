<?php
	if(isset($_SESSION['userid'])){
		echo "<p align='right'>".$_SESSION['fname']." ".$_SESSION['sname']." / ".$_SESSION['usertype']." No: ".$_SESSION['userid'];
	}
?>			