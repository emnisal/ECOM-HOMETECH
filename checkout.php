<?php
session_start();
include("db.php");
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$user=$_SESSION['userid'];
$currentdatetime=date('Y-m-d H:i:s');
$SQL="Insert into orders (userId,orderDateTime) values('$user','$currentdatetime')";
$runSQL=mysqli_query($conn,$SQL) or die (mysqli_error($conn));
$errorNo=mysqli_errno($conn);

if($errorNo==0){
	$SelectSQL="select max(orderNo) as orderNo from orders where userId='$user'";
	$runSQLSelect=mysqli_query($conn,$SelectSQL) or die (mysqli_error($conn));
	
	while($arrayord=mysqli_fetch_array($runSQLSelect)){
		$orderNum=$arrayord['orderNo'];
		echo "<p><b>Successful order</b> -	ORDER REFERENCE NO: ".$orderNum;
		echo "<table>";
		echo "<tr>";
		echo "<th>Name</th>";
		echo "<th>Price</th>";	
		echo "<th>Quantity</th>";
		echo "<th>Sub Total</th>";
		echo "</tr>";
	}
	$total=0.00;
	if(isset($_SESSION['basket'])){
		foreach($_SESSION['basket'] as $index => $value){
		$SQLStm="select prodId, prodName, prodPrice from Product where prodId='$index'";
		$exeSQLStm=mysqli_query($conn, $SQLStm) or die (mysqli_error());
			while ($arrayb=mysqli_fetch_array($exeSQLStm)) {
			$subtotal=$arrayb['prodPrice']*$value;
			$SQLInsert="Insert into order_line(orderNo,prodId,quantityOrdered,subTotal) values('$orderNum','$index','$value','$subtotal')";
			
			echo "<tr>";
			
			echo "<td>";
			echo "<p>".$arrayb['prodName']; 
			echo "</td>";
			
			echo "<td>";
			echo "<p>".$arrayb['prodPrice']; 
			echo "</td>";
			
			echo "<td>";
			echo "<p>".$value;
			echo "</td>";
			
			$subtotal=$arrayb['prodPrice']*$value;
			echo "<td>";
			echo "<p>£ ".$subtotal;
			echo "</td>";
			$total = $total+$subtotal;
			}
		}
	}
	echo "<tr>";
	echo "<th style='text-align:right' colspan='3'>";
	echo "<p>ORDER TOTAL</p>";
	echo "</th>";
	
	echo "<th>";
	echo "<p>£ ".$total;
	echo "</th>";
	echo "</tr>";
	echo "</table>";
	
	$SQLUpdateQuery="update orders set orderTotal='$total' where orderNo='$orderNum'";
	$exeSQLUpdate=mysqli_query($conn, $SQLUpdateQuery) or die (mysqli_error());
	 
	echo "<p>To logout and leave the system <a href='logout.php'>Logout</a>";
}
else{
	echo "<p>There has been an error in placing your order! Please try again.";
}
unset($_SESSION['basket']);
include("footfile.html"); //include head layout
echo "</body>";
?>