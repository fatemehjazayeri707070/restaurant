<?php
//MYSQL Object_Oridented
$severname="localhost";
$username="root";
$password="";
$dbname="restaurant";

//creat connection
$conn=new mysqli($severname,$username,$password,$dbname);

//check connection
if($conn->connect_error){
    die("connection failed" .$conn->connect_error);
}
?>