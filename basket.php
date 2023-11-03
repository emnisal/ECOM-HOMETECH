<?php
session_start();
include("db.php");


$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file


echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if (isset($_POST['addToBasket'])){
	
	echo "<p>1 item added to the basket</p>";


$newprodid=$_POST['h_prodid'];
$reququantity=$_POST['p_quantity'];

$_SESSION['basket'][$newprodid]=$reququantity; 

}
else if (isset($_POST['removeItem'])){
	
	$delprodid=$_POST['h_del_prodid'];
	unset($_SESSION['basket'][$delprodid]);
	echo "<p> 1 item has been removed from the basket";
}

else {
	echo "<p> Current basket unchanged";
}

echo "<table>";
echo "<tr>";
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>Sub Total</th>";
echo "</tr>";
$total=0.00;
if(isset($_SESSION['basket'])){
	 
	 foreach($_SESSION['basket'] as $index => $value){
		
		$SQL="select prodId, prodName, prodPrice from Product where prodId='$index'";
		$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
		
		while ($arrayp=mysqli_fetch_array($exeSQL)) {
			echo "<tr>";
			
			echo "<td>";
			echo "<p>".$arrayp['prodName']; 
			echo "</td>";
			
			echo "<td>";
			echo "<p>".$arrayp['prodPrice']; 
			echo "</td>";
			
			echo "<td>";
			echo "<p>".$value;
			echo "</td>";
			
			$subtotal=$arrayp['prodPrice']*$value;
			echo "<td>";
			echo "<p>".$subtotal;
			echo "</td>";
			
			echo "<td>";
			echo "<form action=basket.php method=post>";
			echo "<input type=submit value='Remove' name='removeItem'>";
			echo "<input type=hidden name=h_del_prodid value=".$arrayp['prodId'].">";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
			
			$total = $total+$subtotal;
		}
	}
	
}

echo "<tr>";
	echo "<th style='text-align:right' colspan='3'>";
	echo "<p>TOTAL</p>";
	echo "</th>";
	
	echo "<th>";
	echo "<p>".$total;
	echo "</th>";
	echo "</tr>";
echo "</table>";
echo "<br><a href='clearbasket.php'>CLEAR BASKET</a>";

if(isset($_SESSION['userid'])){
	echo "<p>To finalise your order: <a href='checkout.php'>Checkout</a>";
}
else{
echo "<p>New hometeq customers: <a href='signup.php'>Sign up</a>";
echo "<p>Returning hometeq customers: <a href='login.php'>Login</a>";
}






include("footfile.html"); //include head layout
echo "</body>";
?>


