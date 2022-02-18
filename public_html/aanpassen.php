<!DOCTYPE html>
<html>
    <head>
        <title>Aanpassen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles2.css">
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div id="left">
                    <img src="images/logo.png" alt="X" id="logo">
                </div>
                <div class="navbar">
                    <h2>Aanpassen</h2>
                </div>
                <div id="right">
                    <a id="terug" href='javascript:history.back();'><h4>Terug</h4></a>
                </div>
            </div>
            <?php
            
            if(isset($_COOKIE["user_id"])){
                $id = $_COOKIE["user_id"];
            } elseif($_COOKIE["admin_id"]) {
                $id = $_COOKIE["admin_id"];
            } else {
                echo '<script>javascript:history.back();</script>';
            }
            
            $conn = new mysqli("localhost", "root", "", "supermarkt");
            
            // haal alle info over de ingelogde klant op
            $result = $conn->query("SELECT firstname, insertion, lastname, birthdate, phonenumber, address, zipcode, city, email1 FROM klanten WHERE id='" . $id . "'");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $info = array($row["firstname"], $row["insertion"], $row["lastname"], $row["birthdate"], "0".$row["phonenumber"], $row["address"], $row["zipcode"], $row["city"], $row["email1"]);
                    $firstname = $row['firstname'];
                    $insertion = $row['insertion'];
                    $lastname = $row['lastname'];
                    $birthdate = $row['birthdate'];
                    $phonenumber = $row['phonenumber'];
                    $address = $row['address'];
                    $zipcode = $row['zipcode'];
                    $city = $row['city'];
                }
            }
            
            // geef het form weer met de opgehaalde info
            echo '
            <div class="content">
                <form name="aanmeld_formulier" method="post" action="verwerken.php">
                    <fieldset>
                        <legend>Algemeen:</legend>
                        Voornaam:
                        <input type="text" name="firstname" value="'.$firstname.'" class="right" required><br>
                        Tussenvoegsel:
                        <input type="text" name="insertion" value="'.$insertion.'" class="right"><br>
                        Achternaam:
                        <input type="text" name="lastname" value="'.$lastname.'" class="right" required><br>
                        Geboortedatum:
                        <input type="date" name="birthdate" value="'.$birthdate.'" class="right" required><br>
                        Telefoonnummer:
                        <input type="tel" name="phonenumber" value="'.$phonenumber.'" class="right" required><br>
                        Adres:
                        <input type="text" name="address" value="'.$address.'" class="right" required><br>
                        Postcode:
                        <input type="text" name="zipcode" value="'.$zipcode.'" class="right" required><br>
                        Woonplaats:
                        <input type="text" name="city" value="'.$city.'" class="right" required><br>
                    </fieldset>
                    <br>
                    Accepteer de algemene voorwaarden. <input class="bottom" type="checkbox" name="voorwaarden" required>
                    <br>
                    <input id="knop" class="bottom" type="submit" value="Versturen">
                    <br>
                </form>
            </div>';
            
            // zet de nieuwe info in de database
            if(isset($_POST["submit"])){
                $firstname = filter_var($_POST['firstname']);
                $insertion = filter_var($_POST['insertion']);
                $lastname = filter_var($_POST['lastname']);
                $birthdate = filter_var($_POST['birthdate']);
                $phonenumber = filter_var($_POST['phonenumber']);
                $address = filter_var($_POST['address']);
                $zipcode = filter_var($_POST['zipcode']);
                $city = filter_var($_POST['city']);
                
                $db = new PDO('mysql:host=localhost;dbname=supermarkt', 'root', '');
                
                $query = "INSERT INTO klanten(firstname, insertion, lastname, birthdate, phonenumber, address, zipcode, city) WHERE id='".$id."' VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $db->prepare($query);
                $stmt->execute(array($firstname, $insertion, $lastname, $birthdate, $phonenumber, $address, $zipcode, $city));
            }
            
            ?>
                    
            <div class="footer">
                <h3>Gemaakt door Diederik Weits &copy;</h3>
            </div>
        </div>
    </body>
</html>
