<?php
session_start();
$pagename="Add a new product"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); 
echo "<h4>".$pagename."</h4>";
echo "<table >";
echo "<form method=post action= addproduct_conf.php>";

echo "<tr>";
echo "<td>";
echo "<label>*Product Name</label>";
echo "</td>";
echo "<td>";
echo "<input type=text name='productName'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<label>*Small Picture Name</label>";
echo "</td>";
echo "<td>";
echo "<input type=text name='smallPicName'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<label>*Large Picture Name</label>";
echo "</td>";
echo "<td>";
echo "<input type=text name='largePicName'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<label>*Short Description</label>";
echo "</td>";
echo "<td>";
echo "<input type=text name='shortDescription'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<label>*Long Description</label>";
echo "</td>";
echo "<td>";
echo "<input type=text name='longDescription'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<label>*Price</label>";
echo "</td>";
echo "<td>";
echo "<input type=text name='price'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<label>*Initial Quantity</label>";
echo "</td>";
echo "<td>";
echo "<input type=number name='quantity'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "<input type=submit name='addProduct' value='Add Product'>";
echo "</td>";
echo "<td>";
echo "<input type=reset name='clearForm' value='Clear Form'>";
echo "</td>";
echo "</tr>";

echo "</form>";
echo "</table>";

include("footfile.html"); //include head layout
echo "</body>";
?>