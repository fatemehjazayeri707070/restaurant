<?php
session_start();


/*
 * ZarinPal Advanced Class
 *
 * version 	: 1.0
 * link 	: https://vrl.ir/zpc
 *
 * author 	: milad maldar
 * e-mail 	: miladworkshop@gmail.com
 * website 	: https://miladworkshop.ir
*/

require_once("zarinpal_function.php");

$MerchantID 	= "129d3c92-d1d9-4ae8-9671-5b1659662cb2";
$Amount 		= $_SESSION['item_total'];
$ZarinGate 		= false;
$SandBox 		= true;

$zp 	= new zarinpal();
$result = $zp->verify($MerchantID, $Amount, $SandBox, $ZarinGate);


if (isset($result["Status"]) && $result["Status"] == 100)
{
	// Success
		echo "تراکنش با موفقیت انجام شد";
	echo "<br />مبلغ : ". $result["Amount"];
	echo "<br />کد پیگیری : ". $result["RefID"];
	echo "<br />Authority : ". $result["Authority"];

$Authority = $result["Authority"];
$user = $_SESSION ['email'];
$refid =  $result["RefID"];
include ('jdf.php');
$day_number = jdate('j');
$month_number = jdate('n');
$year_number = jdate('y');
$date= date("$year_number/$month_number/$day_number");


$amount =  $result["Amount"];

$items = $_SESSION ['cart_item'];


    
	require "connection.php";
    $conn-> set_charset("utf8");
    $query = "INSERT INTO sells (name , Authority, refid, date , amount) VALUES ('$user',  '$Authority' , 'پرداخت انجام شد' , '$date' , '$amount')";
    mysqli_query($conn, $query);
    
    $conn -> close();
    
    


foreach ($items as $item){

    $array = array($item ["quantity"], $item ["name"]);
    echo $array_data = implode("," , $array);
	require "connection.php";
    $conn-> set_charset("utf8");
    $query = "INSERT INTO sellsproduct (Authority,productinfo) VALUES ($Authority, '". $array_data."')";
    mysqli_query($conn, $query);
    echo "<script> location.href='success.php'; </script>";
    $conn -> close();
    
}




} else {
	// error
	echo "پرداخت ناموفق";
	echo "<br />کد خطا : ". $result["Status"];
	echo "<br />تفسیر و علت خطا : ". $result["Message"];
	
	







}

unset($_SESSION['cart_item']);
exit;
?>
