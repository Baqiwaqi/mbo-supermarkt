<?php

$lijst = array("Groente, Fruit, Aardappel", "Vlees, Kip, Vis", "Kaas, Zuivel, Eieren", "Bakkerij, Zoetigheid", "Dranken");
echo '
    <h2>Voorraad</h2>
    <div id="productCountDiv">';

/* Laat de voorraad van alle producten zien */
for ($i = 1; $i < 6; $i++) {
    echo '
        <table id="productCountTable">
        <tr><td colspan="2">' . $lijst[($i - 1)] . '</td></tr>';
    for ($j = 1; $j < 7; $j++) {
        $IdQuery = (string )('P' . $i . '_0' . $j);
        $result = $conn->query($query = "SELECT ProName, ProAmount FROM producten WHERE ProId='" . $IdQuery . "'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ProName = $row["ProName"];
                $ProAmount = $row["ProAmount"];

                echo '
                    <tr>
                        <td class="PCT_left">' . $ProName . '</td>
                        <td class="PCT_right">' . $ProAmount . '</td>
                    </tr>';
            }
        }
    }
    echo '</table>';
}
echo '
    </div>';

/* Laat het formulier zien om de voorraad bij te vullen */
echo '
    <h2>Voorraad aanvullen</h2>
    <form name="aanvul_formulier" method="post" action="proaanvullen.php">
        <fieldset>
        Product: <select name="proname" value="" class="invoegInput2">';
for ($i = 1; $i < 6; $i++) {
    echo '  <optgroup label="'.$lijst[($i - 1)].'">';
    for ($j = 1; $j < 7; $j++) {
        $IdQuery = (string )('P' . $i . '_0' . $j);
        $result = $conn->query($query = "SELECT ProName, ProAmount FROM producten WHERE ProId='" . $IdQuery . "'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                $ProName = $row["ProName"];
                echo '<option value="">'.$ProName.'</option>';
            }
        }
    }
    echo '  </optgroup>';
}
echo '  </select><br>
        Aantal: <input type="number" name="amount" value="" step="1" min="0" max="100" class="invoegInput" required><br>
        Plus: <input type="radio" name="operator" value="plus" class="invoegInput3" checked><br>
        Min: <input type="radio" name="operator" value="min" class="invoegInput3"><br>
        <input type="submit" name="aanvullen" value="Aanvullen">
        </fieldset>
    </form>
    ';

/* Laat het formulier zien om producten toe te voegen */
echo '
    <h2>Product toevoegen</h2>
    <form name="invoeg_formulier" method="post" action="proverwerken.php">
        <fieldset>
        Categorie: <select name="ProCategory" class="invoegInput2" required>
            <option value="P1">Groente, Fruit, Aardappel</option>
            <option value="P2">Vlees, Kip, Vis</option>
            <option value="P3">Kaas, Zuivel, Eieren</option>
            <option value="P4">Bakkerij, Zoetigheid</option>
            <option value="P5">Dranken</option>
        </select><br>
        Naam: <input type="text" name="name" value="" class="invoegInput" required><br>
        Prijs: <input type="number" name="price" value="" step="0.01" min="0.01" max="100.00" class="invoegInput" required><br>
        Info: <input type="text" name="info" value="" class="invoegInput" required><br>
        Aantal: <input type="number" name="amount" value="" step="1" min="0" max="100" class="invoegInput" required><br>
        <input type="submit" name="toevoegen" value="Toevoegen">
        </fieldset>
    </form>';

echo '
    <h2>Product verwijderen</h2>
    <form name="verwijder_formulier" method="post" action="proverwijderen.php">
        <fieldset>
        Product: <select name="ProName" class="invoegInput2">';
for ($i = 1; $i < 6; $i++) {
    echo '  <optgroup label="'.$lijst[($i - 1)].'">';
    for ($j = 1; $j < 7; $j++) {
        $IdQuery = (string )('P' . $i . '_0' . $j);
        $result = $conn->query($query = "SELECT ProName, ProAmount FROM producten WHERE ProId='" . $IdQuery . "'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                $ProName = $row["ProName"];
                echo '<option value="">'.$ProName.'</option>';
            }
        }
    }
    echo '  </optgroup>';
}
echo '  </select><br>
    <input type="submit" name="verwijderen" value="Verwijderen">
    </form>';