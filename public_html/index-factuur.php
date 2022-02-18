<?php
session_start();

require("fpdf16/fpdf.php");

class PDF extends FPDF{
    
    function RoundedRect($x, $y, $w, $h, $r, $style = ''){
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }
    
    function _Arc($x1, $y1, $x2, $y2, $x3, $y3){
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
    
    function Header(){
        $this->Image("images/logo.png",10,8,51);
        $this->SetFont("Arial","B",16);
        $this->Cell(80);
        $this->Cell(30,10,"Factuur",1,0,"C");
        $this->Ln(20);
    }
    
    function Footer(){
        $this->SetY(-15);
        $this->SetFont("Arial","I",8);
        $this->Cell(0,10,"page ".$this->PageNo()."/{nb}",0,0,"C");
    }
    
    function SuperInfo(){
        $this->SetY(40);
        $this->Multicell(0,5,"Aldi Dingen\nBodemanstraat 9-B\n1216 AH Hilversum\nTel.: 0612345678");
    }
    
    function OrderDate($date){
        $r1 = $this->w - 80; //begin point X: width - Xoffset
        $r2 = $r1 + 30; //width of rectangle
        $y1 = 50; //begin point Y: Yoffset
        $y2 = 13; //height of rectangle
        $mid = $y1 + ($y2 / 2); //verticale middle
        $this->RoundedRect($r1, $y1, ($r2 - $r1), $y2, 3.5, "D");
        $this->Line($r1, $mid, $r2, $mid);
        $this->SetXY( $r1 + ($r2-$r1), $y1 );
        $this->SetX(-80);
        $this->Cell(30,6,"Datum",0,0,"C");
        $this->SetXY( $r1 + ($r2-$r1), $y1 + 6);
        $this->SetX(-80);
        $this->Cell(30,8,$date,0,0,"C");
    }
    
    function KlantId($id){
        $r1 = $this->w - 50; //begin point X: width - Xoffset
        $r2 = $r1 + 20; //width of rectangle
        $y1 = 50; //begin point Y: Yoffset
        $y2 = 13; //height of rectangle
        $mid = $y1 + ($y2 / 2); //verticale middle
        $this->RoundedRect($r1, $y1, ($r2 - $r1), $y2, 3.5, "D");
        $this->Line($r1, $mid, $r2, $mid);
        $this->SetXY( $r1 + ($r2-$r1), $y1 );
        $this->SetX(-50);
        $this->Cell(20,6,"Klantnr",0,0,"C");
        $this->SetXY( $r1 + ($r2-$r1), $y1 + 6);
        $this->SetX(-50);
        $this->Cell(20,8,$id,0,0,"C");
    }
    
    function OrderID($orderId){
        $r1 = $this->w - 80; //begin point X: width - Xoffset
        $r2 = $r1 + 50; //width of rectangle
        $y1 = 37; //begin point Y: Yoffset
        $y2 = 13; //height of rectangle
        $mid = $y1 + ($y2 / 2); //verticale middle
        $this->RoundedRect($r1, $y1, ($r2 - $r1), $y2, 3.5, "D");
        $this->Line($r1, $mid, $r2, $mid);
        $this->SetXY( $r1 + ($r2-$r1), $y1 );
        $this->SetX(-80);
        $this->Cell(50,6,"Ordernr",0,0,"C");
        $this->SetXY( $r1 + ($r2-$r1), $y1 + 6);
        $this->SetX(-80);
        $this->Cell(50,8,$orderId,0,0,"C");
    }
    
    function KlantInfo($firstname, $insertion, $lastname, $address, $zipcode, $city){
        $this->SetY(70);
        $this->SetX(-80);
        $this->Multicell(0,5,$firstname . " " . $insertion . " " . $lastname . "\n" . $address . "\n" . $zipcode . " " . $city);
        $this->Ln();
        $this->Ln();
    }

    function ProductTable($Title, $Name, $Amount, $Price){
        $this->SetX(25);
        $TotalAll = 0;
        $w = array(100,30,30);
        for($i=0;$i<count($Title);$i++){
            $this->Cell($w[$i],7,$Title[$i],1,0,"L"); //print the table titles
        }
        $this->Ln();
        for($i=0;$i<count($Name);$i++){
            $this->SetX(25);
            $this->Cell($w[0],6,"- ".$Name[$i],"LR"); //print the product name
            $this->Cell($w[1],6,$Amount[$i],"LR"); //print the amount
            $Total = $Amount[$i] * $Price[$i];
            $this->Cell($w[2],6,$Total,"LR"); //print the total price
            $this->Ln();
            $TotalAll += $Total;
        }
        $this->SetX(25);
        $this->Cell(array_sum($w),0,"","T");
        
        $BTW = round($TotalAll / 100 * 9, 2);
        $SubTotal = $TotalAll - $BTW;
        $name = array("","Subtotaal: ","Waarvan BTW: ","Totaal: ");
        $var = array("",$SubTotal, $BTW, $TotalAll);
        for($i=0;$i<4;$i++){
            $this->SetX(25);
            $this->Cell(80,6,"");
            $this->Cell(50,6,$name[$i],"TB",0);
            $this->Cell(30,6,$var[$i],"TB",0);
            $this->Ln();
        }
    }
    
}

// check voor session en welke
if(isset($_SESSION["SeeList"])){
    $ListOption = 2;
} elseif (isset($_SESSION["ProList"])){
    $ListOption = 1;
} else {
    echo '<script> window.location.href = "http://localhost/Supermarkt/public_html/index-home.php"; </script>';
}

// maak de connectie met de database op twee manieren
$conn = new mysqli("localhost", "root", "", "supermarkt");
$db = new PDO('mysql:host=localhost;dbname=supermarkt', 'root', '');

// maak variabele id aan met de id van de user
if(isset($_COOKIE["user_id"])){
    $id = $_COOKIE["user_id"];
} elseif(isset($_COOKIE["admin_id"])){
    $id = $_COOKIE["admin_id"];
} else {
    echo '<script> window.location.href = "http://localhost/Supermarkt/public_html/index-home.php"; </script>';
}

// vraag de info van de klant op
$result_klant = $conn->query("SELECT firstname, insertion, lastname, address, zipcode, city FROM klanten WHERE id='" . $id . "'");
if ($result_klant->num_rows > 0) {
    while ($row = $result_klant->fetch_assoc()) {
        $firstname = $row["firstname"];
        $insertion = $row["insertion"];
        $lastname = $row["lastname"];
        $address = $row["address"];
        $zipcode = $row["zipcode"];
        $city = $row["city"];
    }
}

// als vartiabele listOption 1 is is het winkelwagen, 2 is de factuur inzien
if($ListOption === 1){
    $orderId = (string)(substr($firstname, 0, 1) . "-" . substr($lastname, 0, 1) . "-" . $id . "-" . time());
    $dateStamp = date('Y-m-d H:i:s');
    
    $query1 = "INSERT INTO orders(klantId, orderId, orderDate) VALUES (?, ?, ?)";
    $stmt1 = $db->prepare($query1);
    $stmt1->execute(array( $id, $orderId, $dateStamp));

    function implodeArray($array){
        $keys = array_keys($array);
        $values = array_values($array);

        return (implode("*", $keys)."*".implode("*", $values));
    }
    
    $ProList = $_SESSION["ProList"];
    $ProArray = $_SESSION["ProList"];
    $ProArray = implodeArray($ProArray);
    
    $date = date("Y-m-d");
    
    // verwijder sessions na het opslaan in een variabel
    session_destroy();
} elseif($listOption === 2){
    $result = "SELECT orderId, orderDate FROM orders WHERE klantId='".$id."'";
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $orderId = $row["orderId"];
            $orderDate = $row["orderDate"];
        }
    }
    
    $result = "SELECT ProArray FROM besteld WHERE orderId='".$orderId."'";
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $ProArray = $row["ProArray"];
        }
    }
    
    function explodeArray($string){
        $array = explode("*", $string);

        $lengte = count($array);

        for($i=0;$i<$lengte/2;$i++){
            $ProList[$array[$i]] = $array[$i+($lengte/2)];
        }
        return($ProList);
    }
    $date = date("Y-m-d" ,$orderDate);
    $ProList = explodeArray($ProArray);
    
    // verwijder session na het opslaan in een variabel
    session_unset($_SESSION["SeeList"]);
}

// maak de tijdenlijke array's aan
$TableName = array();
$TableAmount = array();
$TablePrice = array();

// maak de tijdelijke variabelen aan
$totaal = 0;
$btw = 0;
$subtotaal = 0;

// haal de product info op en zet het in array op basis van catergoriën
foreach($ProList as $key => $value){
    $result = $conn->query("SELECT ProName, ProPrice, ProAmount, ProBTW FROM producten WHERE ProId='" . $key . "'");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $ProName = $row["ProName"];
            $ProPrice = $row["ProPrice"];
            $ProAmount = $row["ProAmount"];
            $ProBTW = $row["ProBTW"];
            
            $ProAmount = $ProAmount - $value;
            $result2 = $conn->query("UPDATE producten SET ProAmount='".$ProAmount."' WHERE id='".$key."'");
            
            array_push($TableName, $ProName);
            array_push($TableAmount, $value);
            array_push($TablePrice, $ProPrice);
            
            if($value !== 0){
                $wwTot = ($value * $ProPrice);
                $totaal += $wwTot;
                $btw += ($wwTot * ($ProBTW / 100));
                $subtotaal = ($totaal - $btw);
            }
        }
    }
}

// deze stopt de alle info in de 'besteld' database en is verplaatst tot na het uitrekenen van het totaalbedrag
if(isset($_SESSION["ProList"])){
    $query2 = "INSERT INTO besteld(orderId, ProTotaal, ProArray) VALUES (?, ?, ?)";
    $stmt2 = $db->prepare($query2);
    $stmt2->execute(array( $orderId, $totaal, $ProArray));
}

// array met tabelcategoriën
$TableTitle = array("Product","Aantal","Totaal");

// voet alle pdf functions uit
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Times","",12);

$pdf->SuperInfo();
$pdf->OrderId($orderId);
$pdf->OrderDate($date);
$pdf->KlantId($id);
$pdf->KlantInfo($firstname, $insertion, $lastname, $address, $zipcode, $city);

$pdf->ProductTable($TableTitle, $TableName, $TableAmount, $TablePrice);
$pdf->Output();
