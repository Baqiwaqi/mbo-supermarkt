<!DOCTYPE html>
<html>
    <head>
        <title>Inloggen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles4.css">
    </head>
    <body>
        <?php
        
        $email = filter_var($_POST['email']);
        $password = filter_var($_POST['password']);
        $link = $_POST['link'];
        
        $conn = new mysqli("localhost", "root", "", "supermarkt");
        
        $result = $conn->query("SELECT id, firstname FROM klanten WHERE email1='".$email."' AND password1='".$password."'");
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $klant_naam = $row['firstname'];
                $klant_id = $row['id'];
                
                if($klant_id < 10){
                    $cookie_name = "admin";
                    $cookie_id = "admin_id";
                } else {
                    $cookie_name = "user";
                    $cookie_id = "user_id";
                }
                
                
                setcookie($cookie_name, $klant_naam, time() + (86400 * 2), "/");
                setcookie($cookie_id, $klant_id, time() + (86400 * 2), "/");
                
                header('Location: '.$link);
            }
        }else{
            echo "<div id='foutmelding'><h3>Verkeerde E-mail en/of wachtwoord</h3><a href='javascript:history.back();'>Terug</a></div>";
        }
        
        ?>
    </body>
</html>