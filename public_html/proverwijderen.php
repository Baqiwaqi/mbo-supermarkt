<!DOCTYPE html>
<html>
    <head>
        <title>Aanmelden</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles2.css">
    </head>
    <body>
        <div class="main">
            <?php

            $conn = new mysqli("localhost", "root", "", "supermarkt");
            $db = new PDO('mysql:host=localhost;dbname=supermarkt', 'root', '');

            if(isset($_POST["verwijderen"])){
                $Name = $_POST["ProName"];

                echo '
                    <form action="" method="post" class="zekerheid">
                    Wilt u dit product zeker verwijderen?<br>
                        Nee: <input type="radio" name="operator" value="nee" class="invoegInput3" checked><br>
                        Ja: <input type="radio" name="operator" value="ja" class="invoegInput3"><br>
                        <input type="submit" name="submit" value="Submit" id="knop">
                    </form>
                ';
            }
            
            if(isset($_POST["submit"])){
                $uSure = $_POST["operator"];

                if($uSure == "ja"){
                    $result = $conn->query("DELETE FROM producten WHERE ProName='".$Name."'");
                    echo '<script>window.location.href = "http://localhost/Supermarkt/public_html/index-ww.php";</script>';
                } else {
                    echo '<script>window.location.href = "http://localhost/Supermarkt/public_html/index-ww.php";</script>';
                }
            }
            ?>
        </div>
    </body>
</html>