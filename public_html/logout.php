<!DOCTYPE html>
<?php

setcookie("user", $_COOKIE["user"], time() - 3600, "/");
setcookie("user", $_COOKIE["user_id"], time() - 3600, "/");

setcookie("admin", $_COOKIE["admin"], time() - 3600, "/");
setcookie("admin", $_COOKIE["admin_id"], time() - 3600, "/");

header('Location: http://localhost/Supermarkt/public_html/index-home.php');

?>
<html>
    <head>
        <title>Uitloggen</title>
    </head>
    <body>
        
    </body>
</html>