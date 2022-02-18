<?php

$vraag = $_POST['vraag'];
$email = filter_var($_POST['email']);

$vraag = wordwrap($vraag, 70);

mail($email, "Klantenvraag", $vraag);

header('Location: http://localhost/Supermarkt/public_html/index-service.php');
