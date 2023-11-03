<?php
session_start();
include("db.php"); 
$pagename="A smart buy for a smart home"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>"; 
echo "<body>";
include ("headfile.html"); 

echo "<h4>".$pagename."</h4>"; 

$prodid=$_GET['u_prod_id']; 
 
//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select prodId, prodName, prodPicNameLarge,prodDescripLong,prodPrice,prodQuantity from Product where prodId= $prodid";
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
echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200></a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p>".$arrayp['prodDescripLong']."</p>"; //display product description as contained in the array
echo "<p><b>£".$arrayp['prodPrice']."</b></p>"; //display product price as contained in the array
echo "<p><b>Number left in stock: ".$arrayp['prodQuantity']."</b></p>"; //display product quantity as contained in the array
echo "<p>Number to be purchased: "; 
 
echo "<form action=basket.php method=post>";
echo "<select name='p_quantity'>";
for ($x = 1; $x <= $arrayp['prodQuantity']; $x++) {
  echo "<option value=$x>$x</option>";
} 
echo "</select> ";
echo "<input type=submit value='ADD TO BASKET' name='addToBasket'>"; 
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>"; 
echo "</td>";

echo "</tr>";
}
echo "</table>";
include("footfile.html"); //include head layout
echo "</body>";
?>