<?php
session_start();
include("db.php");
$pagename="New Product Confirmation"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	
	if(!empty($_POST['productName']) || !empty($_POST['smallPicName']) || !empty($_POST['largePicName']) || !empty($_POST['shortDescription']) || !empty($_POST['longDescription']) || !empty($_POST['price']) || !empty($_POST['quantity'])) {
		$productName=$_POST['productName'];
		$smallPicName=$_POST['smallPicName'];
		$largePicName=$_POST['largePicName'];
		$shortDescription=$_POST['shortDescription'];
		$longDescription=$_POST['longDescription'];
		$price=$_POST['price'];
		$quantity=$_POST['quantity'];
		
		
			$SQL="Insert into product (prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) values('$productName','$smallPicName','$largePicName','$shortDescription','$longDescription','$price','$quantity')";
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
			$errorNo=mysqli_errno($conn);
			
				
				if ($errorNo==0){
					echo "<p>The product has been added!";
					echo "<p>Name of the small picture: ".$smallPicName;
					echo "<p>Name of the small picture: ".$largePicName;
					echo "<p>Short Description: ".$shortDescription;
					echo "<p>Long Description: ".$longDescription;
					echo "<p>Price: £".$price;
					echo "<p>Initial Quantity: ".$quantity;
				}
				else {
					if($errorNo==1062){
						echo "<p>Product has already been inserted";
						echo "<p> Go back to <a href='addproduct.php'>add new product</a>";
					}
					if ($errorNo==1064) {
						echo "<p>Invalid characters such as ' and \ have been entered.";
						echo "<p> Go back to <a href='addproduct.php'>add new product</a>";
					}
					if($errorNo==1052){
						echo "<p>Ilegal characters have been entered in the fields that are expecting numerical values.";
						echo "<p> Go back to <a href='addproduct.php'>add new product</a>";
					}

				}
			
		
	}
	else {
		echo "<p> All mandatory fields need to be filled in";
		echo "<p> Go back to <a href='addproduct.php'>add new product</a>";
	}
include("footfile.html"); //include head layout
echo "</body>";
?>