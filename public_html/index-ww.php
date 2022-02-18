<!DOCTYPE html>
<?php session_start(); 
if (!isset($_SESSION["ProList"])) {
    $_SESSION["ProList"] = array();
}
?>
<html>
    <head>
        <title>Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles.css">
        <script type="text/javascript" src="javascript.js"></script>
        <style>
            #nav1{ color: #000000;}
            #nav2{ color: #000000;}
            #nav3{ color: #000000;}
            #nav4{ color: #000000;}
            #selectA{ display: none;}
        </style>
    </head>
    
    <body id="body" onload="changeWidth();" onresize="changeWidth()">
        <div id="main">
            <div class="header">
                <div class="left">
                    <img src="images/logo.png" alt="X" id="logo">
                </div>
                <div class="navbar">
                    <div class="linkbar">
                        <div id="selectA"></div>
                        <a id="nav1" href="index-home.php"><h3>Home</h3></a>
                        <a id="nav2" href="index-product.php"><h3>Producten</h3></a>
                        <a id="nav3" href="index-winkel.php"><h3>Winkels</h3></a>
                        <a id="nav4" href="index-service.php"><h3>Service</h3></a>
                    </div>
                    <div id="winkelwagenIconback">
                        <img id="winkelwagenIcon" onClick="wagenOpen()" src="images/cart.png" alt="X">
                    </div>
                </div>
                <div class="right">
                    <?php
                    if(isset($_COOKIE["user"])){
                        echo '
                        <a href="index-ww.php" id="Cname"><h4 id="klantnaam"> ' . $_COOKIE["user"] . ' </h4></a>
                        <a href="logout.php" id="logout"><h4>Uitloggen</h4></a>';
                    } else if (isset($_COOKIE["admin"])){
                        echo '
                        <a href="index-ww.php" id="Cname"><h4 id="klantnaam"> ' . $_COOKIE["admin"] . ' </h4></a>
                        <a href="logout.php" id="logout"><h4>Uitloggen</h4></a>';
                    } else {
                        echo'
                        <a href="aanmelden.html" id="aanmelden"><h4>Aanmelden</h4></a>
                        <a onclick="loginOpen()" id="login"><h4>Inloggen</h4></a>';
                    }
                    ?>
                </div>
            </div>
            
            <?php
            /*Check voor een user of admin sccount*/
            if(isset($_COOKIE["user"]) || isset($_COOKIE["admin"])){
                $conn = new mysqli("localhost", "root", "", "supermarkt");

                if(isset($_COOKIE["user_id"])){
                    $idKey = $_COOKIE["user_id"];
                } else {
                    $idKey = $_COOKIE["admin_id"];
                }
                
                /*Start de inhoud van de pagina*/
                echo '
                <div class="content">
                    <div id="page5">
                        <h1>Account</h1>
                        <h2>Persoonlijke gegevens</h2>
                        <a href="aanpassen.php" id="aanpassen" class="right"><h4>Change</h4></a>
                        <table id="gegevensTable">';

                /*Haal de info van de klant/admin op en laat die zien*/
                $result = $conn->query("SELECT firstname, insertion, lastname, birthdate, phonenumber, address, zipcode, city, email1 FROM klanten WHERE id='" . $idKey . "'");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $InfoTitle = array("Voornaam", "Tussenvoegsel", "Achternaam", "Geboortedatum", "Telefoonnummer", "Adres", "Postcode", "Woonplaats", "E-mail");
                        $InfoText = array($row["firstname"], $row["insertion"], $row["lastname"], $row["birthdate"], "0".$row["phonenumber"], $row["address"], $row["zipcode"], $row["city"], $row["email1"]);

                        for($i = 0; $i < count($InfoTitle); $i++){
                            echo '
                            <tr>
                                <td class="gegevensTitle">' . $InfoTitle[$i] . ': </td>
                                <td class="gegevensText">' . $InfoText[$i] . '</td>
                            </tr>';
                        }
                    }
                }
                echo '  </table>';
                
                /*Factuurlijst laten zien*/
                echo '  <h2>Uw facturen</h2>';
                $result2 = $conn->query("SELECT orderId, orderDate FROM orders WHERE klantId='".$idKey."'");
                if ($result2->num_rows > 0) {
                    echo '
                        <table id="besteldTable">
                            <tr>
                                <td><h4>Factuur id</h4></td>
                                <td><h4>Bedrag</h4></td>
                                <td><h4>Datum</h4></td>
                                <td><h4>Bekijken</h4></td>
                            </tr>
                    ';
                    while ($row = $result2->fetch_assoc()) {
                        $orderId = $row["orderId"];
                        $orderDate = $row["orderDate"];
                        
                        $subresult = $conn->query("SELECT ProTotaal, ProArray FROM besteld WHERE orderId='".$orderId."'");
                        if ($subresult->num_rows > 0) {
                            while ($row = $subresult->fetch_assoc()) {
                                $ProTotaal = $row["ProTotaal"];
                                $ProArray = $row["ProArray"];
                                
                                echo '
                                <tr>
                                    <td class="besteldLeft">'.$orderId.'</td>
                                    <td class="besteldCenter">'.$ProTotaal.'</td>
                                    <td class="besteldRight">'.$orderDate.'</td>
                                    <td class="besteldKnop>
                                        <form action="herzien.php" method="post">
                                            <input type="hidden" name="orderId" value="'.$orderId.'">
                                            <input type="submit" name="bekijken" value="Bekijken" id="besteldKnopId">
                                        </form>
                                    </td>
                                </tr>
                                ';
                            }
                        }
                    }
                } else {
                    echo '<h4>U heeft nog geen facturen.</h4>';
                }
                echo '  </table><br>';
                
                /*Extra check of het een admin is*/
                if (isset($_COOKIE["admin"])) {
                    echo '<hr>';
                    include_once 'admin_extention.php';
                }
            } else {
                /*Als er geen cookie is is er ook geen content*/
                echo '
                <div class="content">
                    <div id="page5">
                        <h1>Account</h1>
                        <h2>U bent niet ingelogd</h2>
                        <p>Log alstubieft in om uw gegevens te zien.</p>
                ';
            }
            
            /*Einde van .content en #page5*/
            echo '
                    </div>
                </div>
                ';
            ?>
            
            
            <div class="footer">
                <h3>Gemaakt door Diederik Weits &copy;</h3>
            </div>
        </div>
        
        <div id="loginBack">
            <div id="loginPanel">
                <a class="wagenClose" onclick="loginClose()">X</a>
                <h1>Login</h1>
                <hr>
                <form method="post" action="login.php">
                    E-mail:
                    <input type="text" name="email" class="right" value="" required> <br /><br />
                    Wachtwoord:
                    <input type="password" name="password" class="right" value="" required><br /><br />
                    <input type="hidden" name="link" value="http://localhost/Supermarkt/public_html/index-ww.php">
                    <input type="submit" value="Inloggen" id="knop">
                </form>
            </div>
        </div>
        
        <div id="wwBack">
            <div id="winkelwagen">
                <div class="wagenClose" onclick="wagenClose()">X</div>
                <form method="post" action="" id="wwDeleteForm">
                    <input type="submit" name="wwDelete" value="Leegmaken">
                </form>
                <h1>Winkelmandje</h1>
                <?php
                
                include_once 'extention.php';
                
                ?>
            </div>
        </div>
    </body>
</html>