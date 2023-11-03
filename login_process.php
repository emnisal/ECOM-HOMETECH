<?php
session_start();
include("db.php");
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if(!empty($_POST['email']) || !empty($_POST['password'])){
	$tempEmail=$_POST['email'];
	$SQLQuery="select userId, userType, userFName, userSName, userEmail, userPassword from Users where userEmail='$tempEmail'";
	$runSQL=mysqli_query($conn,$SQLQuery) or die(mysqli_error($conn));
	
	while ($arrayu=mysqli_fetch_array($runSQL)) {
		if(($arrayu['userEmail'] != $_POST['email'])){
			echo "<b>Login failed!</b>";
			echo "The email you entered was not recognized";
			echo "Go back to <a href='login.php'>login</a>";
		}
		else {
			if(($arrayu['userPassword']) != ($_POST['password'])){
			echo "<b>Login failed!</b>";
			echo "The password you entered is not valid";
			echo "Go back to <a href='login.php'>login</a>";
			}
			else {
				$_SESSION['fname']=$arrayu['userFName'];
				$_SESSION['sname']=$arrayu['userSName'];
				$_SESSION['userid']=$arrayu['userId'];
				$_SESSION['usertype']=$arrayu['userType'];
				
				echo "<b>Login success!</b>";
				echo "<p>Hello ".$_SESSION['fname']." ".$_SESSION['sname'];
				
				if($_SESSION['usertype']=='a'){
					$_SESSION['usertype']='Administrator';
					echo "<p>You have successfully logged in as a hometeq ".$_SESSION['usertype'];
					echo "<p>Continue to the home page <a href='index.php'>Home Tech</a>";
				} 
				else{
					$_SESSION['usertype']='Customer';
					echo "<p>You have successfully logged in as a hometeq ".$_SESSION['usertype'];
					echo "<p>Continue shopping for <a href='index.php'>Home Tech</a>";
					echo "<p>View your <a href='basket.php'>Smart Basket</a>";
				}
				
				
		
			}
		}
	}
}
else{
	echo "<b>Login failed!</b>";
	echo "Your login form is incomplete<br>Make sure you provide all the required details.";
	echo "Go back to <a href='login.php'>login</a>";
}
include("footfile.html"); //include head layout
echo "</body>";
?>