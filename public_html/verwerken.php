<html>
    <head>
        <title>Aanmelding verwerken</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles3.css">
    </head>
    <body>
        <?php
            
        $firstname = filter_var($_POST['firstname']);
        $insertion = filter_var($_POST['insertion']);
        $lastname = filter_var($_POST['lastname']);
        $birthdate = filter_var($_POST['birthdate']);
        $phonenumber = filter_var($_POST['phonenumber']);
        $address = filter_var($_POST['address']);
        $zipcode = filter_var($_POST['zipcode']);
        $city = filter_var($_POST['city']);
        $email1 = filter_var($_POST['email1']);
        $email2 = filter_var($_POST['email2']);
        $password1 = filter_var($_POST['password1']);
        $password2 = filter_var($_POST['password2']);
            
        $db = new PDO('mysql:host=localhost;dbname=supermarkt', 'root', '');
            
        $query = "SELECT id FROM klanten WHERE firstname = ? AND insertion = ? AND lastname = ? AND"
            . " birthdate = ? AND phonenumber = ? AND address = ? AND zipcode = ? AND city = ? AND"
            . " email1 = ? AND email2 = ?";
        $stmt = $db->prepare($query);
        $stmt->execute(array( $firstname, $insertion, $lastname, $birthdate, $phonenumber, $address, $zipcode, $city, $email1, $email2, $password1, $password2));
            
        $query = "INSERT INTO klanten(firstname, insertion, lastname, birthdate, phonenumber, address, zipcode, city, email1, email2, password1, password2, reg_date) VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute(array( $firstname, $insertion, $lastname, $birthdate, $phonenumber, $address, $zipcode, $city, $email1, $email2, $password1, $password2, date('Y-m-d H:i:s')));
            
        echo "<div id='main'><div id='melding'><h1>U heeft succesvol aangemeld.</h1>
            <h3>U kunt nu inloggen op de website</h3><a href='index-home.php'>Terug naar de website.</a></div></div>";
        
        ?>
        
        
        
    </body>
</html>
