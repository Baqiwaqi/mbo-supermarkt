<?php
// connectie met de database
$conn = new mysqli("localhost", "root", "", "supermarkt");

// maak variabele aan
$totaal = 0;
$btw = 0;
$subtotaal = 0;

// maak begin van de table aan
echo '
    <table id="wwTable">
        <thead>
            <tr class="wwTableRow">
                <td class="wwPro"><h3>Product</h3></td>
                <td class="wwTot"><h3>Totaal</h3></td>
                <td class="wwAan"><h3>Aantal</h3></td>
            </tr>
        </thead>
        <tbody>';

//
foreach ($_SESSION["ProList"] as $key => $value) {
    $result = $conn->query("SELECT ProName, ProPrice, ProBTW FROM producten WHERE ProId='" . $key . "'");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ProName = $row["ProName"];
            $ProPrice = $row["ProPrice"];
            $ProBTW = $row["ProBTW"];
            if ($value !== 0) {
                $wwTot = ($value * $ProPrice);

                echo '
                    <tr>
                        <td class="wwPro"><h4> - ' . $ProName . '</h4></td>
                        <td class="wwTot"><h4> ' . $wwTot . '</h4></td>
                        <td class="wwAan"><h4> ' . $value . '</h4></td>
                    </tr>';

                $totaal += $wwTot;
                $btw += ($wwTot * ($ProBTW / 100));
                $subtotaal = ($totaal - $btw);
            }
        }
    }
}
echo'
        </tbody>
    </table>
    <table id="wwBottom">
        <tr>
            <td class="wwBottomT"><h3>Subtotaal = €</h3></td>
            <td class="wwBottomC"><h3>' . round($subtotaal, 2) . '</h3></td>
        </tr>
        <tr>
            <td class="wwBottomT"><h3>Waarvan BTW = €</h3></td>
            <td class="wwBottomC"><h3>' . round($btw, 2) . '</h3></td>
        </tr>
        <tr>
            <td class="wwBottomT"><h3>Totaal = €</h3></td>
            <td class="wwBottomC"><h3>' . round($totaal, 2) . '</h3></td>
        </tr>
    </table>';
if(isset($_COOKIE["user"]) || isset($_COOKIE["admin"])){
    echo '
    <form method="post" action="index-factuur.php" id="bestellenForm">
        <input type="submit" name="bestelling" value="Bestellen" id="bestellen">
    </form>';
} else {
    echo '<h3 style="text-align:center;">Log in om te bestellen.</h3>';
}
