<!DOCTYPE html>
<?php session_start(); 
if (!isset($_SESSION["ProList"])) {
    $_SESSION["ProList"] = array();
}
?>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles.css">
        <script type="text/javascript" src="javascript.js"></script>
        <style>
            #nav1{ color: #ffffff;}
            #nav2{ color: #000000;}
            #nav3{ color: #000000;}
            #nav4{ color: #000000;}
            #selectA{ left: 0px;}
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
                        <a id="nav1" onmouseout="nav1();" onmouseover="nav1()" href="index-home.php"><h3>Home</h3></a>
                        <a id="nav2" onmouseout="nav1();" onmouseover="nav2()" href="index-product.php"><h3>Producten</h3></a>
                        <a id="nav3" onmouseout="nav1();" onmouseover="nav3()" href="index-winkel.php"><h3>Winkels</h3></a>
                        <a id="nav4" onmouseout="nav1();" onmouseover="nav4()" href="index-service.php"><h3>Service</h3></a>
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
                <div id="page1">
                    <h1>Home</h1>
                    <table id="actieTable">
                        <tr>
                            <td><img src="images/actie1.png" alt="X" class="actie" id="actie1" onclick="goto()"></td>
                            <td><img src="images/actie2.png" alt="X" class="actie" id="actie2" onclick="goto()"></td>
                            <td><img src="images/actie3.png" alt="X" class="actie" id="actie3" onclick="goto()"></td>
                            <td><img src="images/actie4.png" alt="X" class="actie" id="actie4" onclick="goto()"></td>
                            <td><img src="images/actie5.png" alt="X" class="actie" id="actie5" onclick="goto()"></td>
                        </tr>
                    </table>
                    
                    <p>
                        Om de admin ervaring te krijgen moet u inloggen met het e-mailadres "admin@admin.nl" en het wachtwoord "admin".
                    </p>
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
                    <input type="hidden" name="link" value="http://localhost/Supermarkt/public_html/index-home.php">
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
