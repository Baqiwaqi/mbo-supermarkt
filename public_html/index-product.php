<!DOCTYPE html>
<?php session_start(); 
if(!isset($_SESSION["ProList"])){
    $_SESSION["ProList"] = array();
}
?>
<html>
    <head>
        <title>Producten</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles.css">
        <script type="text/javascript" src="javascript.js"></script>
        <style>
            #nav1{ color: #000000;}
            #nav2{ color: #ffffff;}
            #nav3{ color: #000000;}
            #nav4{ color: #000000;}
            #selectA{ left: 120px;}
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
                        <a id="nav1" onmouseout="nav2()" onmouseover="nav1()" href="index-home.php"><h3>Home</h3></a>
                        <a id="nav2" onmouseout="nav2()" onmouseover="nav2()" href="index-product.php"><h3>Producten</h3></a>
                        <a id="nav3" onmouseout="nav2()" onmouseover="nav3()" href="index-winkel.php"><h3>Winkels</h3></a>
                        <a id="nav4" onmouseout="nav2()" onmouseover="nav4()" href="index-service.php"><h3>Service</h3></a>
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
            
            <div id="productNavBack">
                <div id="productNav">
                    <a href="#section1"><h4>Groente, Fruit, Aardappel</h4></a>
                    <a href="#section2"><h4>Vlees, Kip, Vis</h4></a>
                    <a href="#section3"><h4>Kaas, Zuivel, Eieren</h4></a>
                    <a href="#section4"><h4>Bakkerij, Zoetigheid</h4></a>
                    <a href="#section5"><h4>Dranken</h4></a>
                </div>
            </div>
            
            <div class="content">
                <div id="page2">
                    <h1>Producten</h1>
                    
                    <?php
                    // lijst met productcategoriën
                    $lijst = array("Groente, Fruit, Aardappel", "Vlees, Kip, Vis", "Kaas, Zuivel, Eieren", "Bakkerij, Zoetigheid", "Dranken");
                    
                    // connectie met de database
                    $conn = new mysqli("localhost", "root", "", "supermarkt");
                    
                    // draait een dubbele for-loop om door de producten te gaan
                    for($i = 1; $i < 6; $i++){
                        echo '<h2 class="productTitle" id="section'.$i.'">'. $lijst[($i-1)] .'</h2>';
                        echo '<table class="productTable"><tr>';
                        for($j = 1; $j < 7; $j++){
                            $IdQuery = 'P'.$i.'_0'.$j;
                            $result = $conn->query("SELECT ProId, ProName, ProPrice, ProInfo, ProAmount FROM producten WHERE ProId='" . $IdQuery . "'");
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()) {
                                    $ProId = $row["ProId"];
                                    $ProName = $row["ProName"];
                                    $ProPrice = $row["ProPrice"];
                                    $ProInfo = $row["ProInfo"];
                                    $ProAmount = $row["ProAmount"];
                                }
                            }
                            echo '<td>';
                            echo '<img src="images/product/'. $ProId .'.JPG" alt="x">';
                            echo '<h3>'. $ProName .'</h3>';
                            echo '<p class="left" id="productInfoText">'. $ProInfo .'</p>';
                            echo '<p class="right" id="productPriceText">'. $ProPrice .'</p>';
                            echo '<form action="" method="post">';
                            echo '<input type="hidden" name="proid" value="'.$ProId.'">';
                            if ($ProAmount == 0){
                                echo "Uitverkocht";
                            } else {
                                echo '<input type="number" class="productAantal" name="aantal" min="1" max="'.$ProAmount.'">';
                                echo '<input type="submit" name="submit" value="Add" class="productButton">';
                            }
                            echo '</form>';
                            echo '</td>';
                        }
                        echo '</tr></table><br><br>';
                    }
                    
                    // de submit voor een product komt binnen
                    if(isset($_POST["submit"])){
                        $proid = $_POST["proid"];
                        $procount = $_POST["aantal"];
                        $newPro = array($proid=>$procount);
                        
                        // voegt het nieuwe product met de bestaande array
                        $_SESSION["ProList"] = array_merge($_SESSION["ProList"], $newPro);
                    }
                    
                    ?>
                </div>
            </div>
            
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
                    <input type="hidden" name="link" value="http://localhost/Supermarkt/public_html/index-product.php">
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