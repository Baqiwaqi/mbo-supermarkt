<?php
session_start();

$_SESSION["SeeList"] = array();
$conn = new mysqli("localhost", "root", "", "supermarkt");

if(isset($_POST["bekijken"])){
    
    $orderId = $_POST["orderId"];
    
    $result = $conn->query("SELECT ProArray FROM besteld WHERE orderId='".$orderId."'");
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $ProArray = $row["ProArray"];
            $_SESSION["SeeList"] = $ProArray;
            header("Location: index-factuur.php");
        }
    } else {
        header("Location: index-ww.php");
    }
}