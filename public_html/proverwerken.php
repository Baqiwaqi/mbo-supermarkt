<html>
    <head>
        <title>Product verwerken</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styles3.css">
    </head>
    <body>
        <?php
        
        if(isset($_POST["toevoegen"])){
            $ProCat = filter_var($_POST['cat']);
            $ProName = filter_var($_POST['name']);
            $ProPrice = filter_var($_POST['price']);
            $ProInfo = filter_var($_POST['info']);
            $ProAmount = filter_var($_POST['amount']);

            //Check how many products are in the given category
            $conn = new mysqli("localhost", "root", "", "supermarkt");

            $ProCount = 1;
            $result = $conn->query("SELECT ProId FROM producten WHERE ProId='" . $ProCat . "_0" . $ProCount . "'");
            if ($result->num_rows > 0) {
                $ProCount += 1;
                $result = $conn->query("SELECT ProId FROM producten WHERE ProId='" . $ProCat . "_0" . $ProCount . "'");
            }
            $ProId = ($ProCat . "_0" . $ProCount);

            //Insert into DB
            $db = new PDO('mysql:host=localhost;dbname=supermarkt', 'root', '');

            $query = "INSERT INTO producten(ProID, ProName, ProPrice, ProInfo, ProAmount) VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute(array( $ProID, $ProName, $ProPrice, $ProInfo, $ProAmount));

            echo "<div id='main'><div id='melding'><h1>U heeft het product succesvol toegevoegd.</h1>
                <a href='javascript:history.back();'>Terug naar de website.</a></div></div>";
        }
        
        ?>
    </body>
</html>
