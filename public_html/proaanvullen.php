<?php

$conn = new mysqli("localhost", "root", "", "supermarkt");

if(isset($_POST["verwijderen"])){
    $Name = $_POST["proname"];

    $result = $conn->query("SELECT ProAmount FROM producten WHERE ProId='" . $Name . "'");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $ProAmount = $row["ProAmount"];
        }

        if($Operator == "plus"){
            $ProAmount = $ProAmount + $Amount;
        } else {
            $ProAmount = $ProAmount - $Amount;
        }

        $query = "UPDATE producten SET ProAmount='".$ProAmount."' WHERE ProName='".$Name."'";
        $stmt = $db->prepare($query);
        $stmt->execute();

        echo '<script>window.location.href = "http://localhost/Supermarkt/public_html/index-ww.php";</script>';
    } else {
        echo '<script>
            alert("Verkeerde product id!");
            window.location.href = "http://localhost/Supermarkt/public_html/index-ww.php";</script>';
    }
}