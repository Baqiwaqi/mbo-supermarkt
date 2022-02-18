<!DOCTYPE html>
<?php session_start(); 
if (!isset($_SESSION["ProList"])) {
    $_SESSION["ProList"] = array();
}
?>
<html>
    <head>
        <title>Winkel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles.css">
        <script type="text/javascript" src="javascript.js"></script>
        <style>
            #nav1{ color: #000000;}
            #nav2{ color: #000000;}
            #nav3{ color: #ffffff;}
            #nav4{ color: #000000;}
            #selectA{ left: 240px;}
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
                        <a id="nav1" onmouseout="nav3()" onmouseover="nav1()" href="index-home.php"><h3>Home</h3></a>
                        <a id="nav2" onmouseout="nav3()" onmouseover="nav2()" href="index-product.php"><h3>Producten</h3></a>
                        <a id="nav3" onmouseout="nav3()" onmouseover="nav3()" href="index-winkel.php"><h3>Winkels</h3></a>
                        <a id="nav4" onmouseout="nav3()" onmouseover="nav4()" href="index-service.php"><h3>Service</h3></a>
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
                <div id="page3">
                    <h1>Winkels</h1>
                    <table class="winkelTable1">
                        <tr>
                            <td><h2>Winkel te Hilversum</h2></td>
                        </tr>
                        <tr>
                            <td><h4>Bodemanstraat 9-B</h4></td>
                        </tr>
                        <tr>
                            <td><h4>1216 AH Hilversum</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Tel.: 0612345678</h4></td>
                        </tr>
                    </table>
                    <div class="winkelImgBorder">
                        <img src="images/winkel.png" alt="X" class="winkelImg">
                    </div>
                    <table class="winkelTable2">
                        <tr>
                            <td><h4>Maandag</h4></td>
                            <td><h4>10:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Dinsdag</h4></td>
                            <td><h4>08:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Woensdag</h4></td>
                            <td><h4>08:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Donderdag</h4></td>
                            <td><h4>08:00 - 21:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Vrijdag</h4></td>
                            <td><h4>08:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Zaterdag</h4></td>
                            <td><h4>08:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Zondag</h4></td>
                            <td><h4><i>gesloten</i></h4></td>
                        </tr>
                    </table>
                    <br><br><br>
                    <table class="winkelTable1">
                        <tr>
                            <td><h2>Winkel te Vreeland</h2></td>
                        </tr>
                        <tr>
                            <td><h4>Voorstraat 15</h4></td>
                        </tr>
                        <tr>
                            <td><h4>3633 BB Vreeland</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Tel.: 0612345678</h4></td>
                        </tr>
                    </table>
                    <div class="winkelImgBorder">
                        <img src="images/winkel2.png" alt="X" class="winkelImg">
                    </div>
                    <table class="winkelTable2">
                        <tr>
                            <td><h4>Maandag</h4></td>
                            <td><h4>10:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Dinsdag</h4></td>
                            <td><h4>08:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Woensdag</h4></td>
                            <td><h4>08:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Donderdag</h4></td>
                            <td><h4>08:00 - 20:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Vrijdag</h4></td>
                            <td><h4>08:00 - 21:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Zaterdag</h4></td>
                            <td><h4>08:00 - 18:00</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Zondag</h4></td>
                            <td><h4><i>gesloten</i></h4></td>
                        </tr>
                    </table>
                    <br><br>
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
                    <input type="hidden" name="link" value="http://localhost/Supermarkt/public_html/index-winkel.php">
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