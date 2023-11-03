<?php
session_start();
include ("db.php"); //include db.php file to connect to DB
$pagename="View and Edit Product"; //create and populate variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if(isset($_POST['updated_prodid'])){
	$pridtobeupdated=$_POST['updated_prodid'];
	$newprice=$_POST['newprice'];
	$newqutoadd=$_POST['newquantity'];
	
	$SQL="Select prodQuantity from Product where prodId='$pridtobeupdated'";
	$runSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
	
	while ($arrayqu=mysqli_fetch_array($runSQL)){
		$newstock=0;
		if(isset($_POST['updateItem'])){
			$newstock=$newqutoadd+$arrayqu['prodQuantity'];
			if(!empty($newprice)){
			$SQL2="Update Product set prodPrice='$newprice',prodQuantity='$newstock' where prodId='$pridtobeupdated'";
			$runSQL2=mysqli_query($conn, $SQL2) or die (mysqli_error());
			}
			else{
			$SQL3="Update Product set prodQuantity='$newstock' where prodId='$pridtobeupdated'";
			$runSQL3=mysqli_query($conn, $SQL3) or die (mysqli_error());
			}
		}
		
	}
	
}


//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice,prodQuantity from Product";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200></a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p>".$arrayp['prodDescripShort']."</p>"; //display product description as contained in the array
echo "<div class=mainDivTag>";
echo "<div class=labelPrice><p>Current price: <b>".$arrayp['prodPrice']."</b></div>";
echo "<div class=newPrice><form action=editproduct.php method=post><label>New price: <input type=text name=newprice size=4></p></div>";
echo "<div class=labelStock><p>Current stock: <b>".$arrayp['prodQuantity']."</b><label></div>";
echo "<div class=newStock>Add number of items<select name='newquantity'></p><br>";
for ($x = 0; $x <= 100; $x++) {
  echo "<option value=$x>$x</option>";
} 
echo "</select><br></div>";
echo "</div>";
echo "<p style='float:left'><input type=submit value='Update' name='updateItem'>";
echo "<input type=hidden name=updated_prodid value=".$arrayp['prodId'].">";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
include("footfile.html"); //include head layout
echo "</body>";
?>