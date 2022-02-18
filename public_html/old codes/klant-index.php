<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles.css">
        <script type="text/javascript" src="javascript.js"></script>
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
                        <a id="nav1" onclick="nav1()"><h3>Home</h3></a>
                        <a id="nav2" onclick="nav2()"><h3>Producten</h3></a>
                        <a id="nav3" onclick="nav3()"><h3>Winkels</h3></a>
                        <a id="nav4" onclick="nav4()"><h3>Service</h3></a>
                    </div>
                    <div id="winkelwagenIconback">
                        <img id="winkelwagenIcon" onClick="wagenOpen()" src="images/cart.png" alt="X">
                    </div>
                </div>
                <div class="right">
                    <a href="aanmelden.html"><h4 id="aanmelden">Aanmelden</h4></a>
                    <div id="Cname">
                        <?php function cookieName($cname){
                            echo('<h4 id="klantnaam"> ' . $cname . ' </h4>');
                        } ?>
                    </div>
                    <a onclick="loginOpen()"><h4 id="login">Inloggen</h4></a>
                    <a onclick="<?php setcookie("user", "", time() - 3600); ?>"><h4 id="logout">Uitloggen</h4></a>
                </div>
            </div>
            <div id="productNavBack">
                <div id="productNav">
                    <a href="#section1"><h4>Groente, Fruit, Aardappels</h4></a>
                    <a href="#section2"><h4>Vlees, Kip, Vis</h4></a>
                    <a href="#section3"><h4>Kaas, Zuivel, Eieren</h4></a>
                    <a href="#section4"><h4>Bakkerij</h4></a>
                    <a href="#section5"><h4>Dranken</h4></a>
                </div>
            </div>
            
            <div class="content">
                <div id="page1">
                    <h1>Home</h1>
                    <table id="actieTable">
                        <tr>
                            <td><img src="images/actie1.png" alt="X" class="actie" id="actie1"></td>
                            <td><img src="images/actie2.png" alt="X" class="actie" id="actie2"></td>
                            <td><img src="images/actie3.png" alt="X" class="actie" id="actie3"></td>
                            <td><img src="images/actie4.png" alt="X" class="actie" id="actie4"></td>
                            <td><img src="images/actie5.png" alt="X" class="actie" id="actie5"></td>
                        </tr>
                    </table>
                </div>
                
                <div id="page2">
                    <h1>Producten</h1>
                    
                </div>
                
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
                    <img src="images/winkel.png" alt="X" class="winkelImg">
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
                    <img src="images/winkel2.png" alt="X" class="winkelImg">
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
                
                <div id="page4">
                    <h1>Service</h1>
                    <p>
                        Welkom op de website van Aldi Dingen. Op deze website kunt u uw boodschappen bestellen. Het is zo simpel al op 'toevoegen' te klikken als u een product ziet en het is aan uw winkelmandje toegevoegd. als u alles heeft kunt u de keuze maken of u de producten te laten bezorgen of ze bij de winkel kom ophalen op een gewenste tijd. 
                    </p>
                    <h3>Contact</h3>
                    <p>
                        
                    </p>
                </div>
            </div>
            
            <div class="footer">
                <h3>Gemaakt door Diederik Weits &copy;</h3>
            </div>
        </div>
        
        <div id="winkelwagenBack">
            <div id="winkelwagen">
                <a class="wagenClose" onclick="wagenClose()">X</a>
                <h1>Winkelmandje</h1>
                <hr>
                <table id="wwTable">
                    <thead>
                        <tr>
                            <td class="wwPro"><h3>Product</h3></td>
                            <td class="wwAan"><h3>Aantal</h3></td>
                            <td class="wwTot"><h3>Totaal</h3></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="wwPro"><h4>Aardappels</h4></td>
                            <td class="wwAan"><h4>2</h4></td>
                            <td class="wwTot"><h4>8.00</h4></td>
                        </tr>
                    </tbody>
                </table>
                <div id="wwBottom">
                    <table>
                        <tr>
                            <td class="wwBottomT"><h3>Subtotaal = €</h3></td>
                            <td class="wwBottomC"><h3 id="wwBotC"></h3></td>
                        </tr>
                        <tr>
                            <td class="wwBottomT"><h3>Waarvan BTW = €</h3></td>
                            <td class="wwBottomC"><h3></h3></td>
                        </tr>
                        <tr>
                            <td class="wwBottomT"><h3>Korting = €</h3></td>
                            <td class="wwBottomC"><h3></h3></td>
                        </tr>
                        <tr>
                            <td class="wwBottomT"><h3>Totaal = €</h3></td>
                            <td class="wwBottomC"><h3></h3></td>
                        </tr>
                    </table>
                    <button id="bestellen" onclick="">Bestellen</button>
                </div>
            </div>
        </div>
        
        <div id="loginBack">
            <div id="loginPanel">
                <a class="wagenClose" onclick="loginClose()">X</a>
                <h1>Login</h1>
                <hr>
                <form method="post" action="login.php">
                    E-mail:
                    <input type="text" name="email" id="right" value="" required> <br />
                    Wachtwoord:
                    <input type="password" name="password" id="right" value="" required><br /><br />
                    <input type="submit" value="Inloggen" id="knop">
                </form>
            </div>
        </div>
<?php

if(filter_input(INPUT_COOKIE, "user") !== ""){
    $cname = filter_input(INPUT_COOKIE, "user");
    cookieName($cname);
    logout();
}
else if(filter_input(INPUT_COOKIE, "admin") !== ""){
    $cname = filter_input(INPUT_COOKIE, "admin");
    cookieName($cname);
    logout();
}
else{
    login();
}

function logout(){
    echo '<script type="text/javascript">'
        . 'document.getElementById("login").style.display = "none";'
        . 'document.getElementById("aanmelden").style.display = "none";'
        . 'document.getElementById("logout").style.display = "block";'
        . 'document.getElementById("Cname").style.display = "block";'
        . '</script>';
}
function login(){
    echo '<script type="text/javascript">'
        . 'document.getElementById("login").style.display = "block";'
        . 'document.getElementById("aanmelden").style.display = "block";'
        . 'document.getElementById("logout").style.display = "none;'
        . 'document.getElementById("Cname").style.display = "none";'
        . '</script>';
}


?>
    </body>
</html>
