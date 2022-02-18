<!DOCTYPE html>
<?php session_start(); 
if (!isset($_SESSION["ProList"])) {
    $_SESSION["ProList"] = array();
}
?>
<html>
    <head>
        <title>Service</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles.css">
        <script type="text/javascript" src="javascript.js"></script>
        <style>
            #nav1{ color: #000000;}
            #nav2{ color: #000000;}
            #nav3{ color: #000000;}
            #nav4{ color: #ffffff;}
            #selectA{ left: 360px;}
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
                        <a id="nav1" onmouseout="nav4()" onmouseover="nav1()" href="index-home.php"><h3>Home</h3></a>
                        <a id="nav2" onmouseout="nav4()" onmouseover="nav2()" href="index-product.php"><h3>Producten</h3></a>
                        <a id="nav3" onmouseout="nav4()" onmouseover="nav3()" href="index-winkel.php"><h3>Winkels</h3></a>
                        <a id="nav4" onmouseout="nav4()" onmouseover="nav4()" href="index-service.php"><h3>Service</h3></a>
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
            
            <div class="content">
                <div id="page4">
                    <h1>Service</h1>
                    <h3>Over ons</h3>
                    <p>
                        Welkom op de website van Aldi Dingen. Op deze website kunt u uw boodschappen bestellen. Het is zo simpel al op 'toevoegen' te klikken als u een product ziet en het is aan uw winkelmandje toegevoegd. als u alles heeft kunt u de keuze maken of u de producten te laten bezorgen of ze bij de winkel kom ophalen op een gewenste tijd. 
                    </p>
                    <h3>Contact</h3>
                    <form method="post" action="vraagVerwerken.php" id="contactForm">
                        <textarea name="vraag" rows="6">Typ hier uw vraag...</textarea><br>
                        <?php
                        if(!isset($_COOKIE["user_id"]) || !isset($_COOKIE["admin_id"])){
                            echo '<h3>Log in om een vraag te stellen.</h3>';
                        } else {
                            $conn = new mysqli("localhost", "root", "", "supermarkt");
                            $result = $conn->query('SELECT email1 FROM klanten WHERE id="'.$_COOKIE["user_id"].'"');
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()) {
                                    $mail = $row['email1'];
                                }
                            }
                            
                            echo 'De reactie wordt naar uw mail toe gestuurd.<br>
                            <input type="hidden" name="mail" value="'.$mail.'">
                            <input class="right" type="submit" value="Submit"><br>';
                        }
                        
                        ?>
                    </form>
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
                    <input type="hidden" name="link" value="http://localhost/Supermarkt/public_html/index-service.php">
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