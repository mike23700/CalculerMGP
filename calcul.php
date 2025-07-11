<?php
$notes = $_POST['note'];
$credits = $_POST['credit'];
$ues = $_POST['ue'];

$total_points = 0;
$total_credits = 0;
$has_echec = false;

// Fonction pour convertir note en point
function noteToPoint($note) {
    if ($note < 35) return 0.00;
    if ($note < 40) return 1.00;
    if ($note < 45) return 1.30;
    if ($note < 50) return 1.70;
    if ($note < 55) return 2.00;
    if ($note < 60) return 2.30;
    if ($note < 65) return 2.70;
    if ($note < 70) return 3.00;
    if ($note < 75) return 3.30;
    if ($note < 80) return 3.70;
    return 4.00;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat MGP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>📊 Résultats du calcul MGP</h1>
    <table>
        <tr>
            <th>UE</th>
            <th>Note</th>
            <th>Point</th>
            <th>Crédit</th>
            <th>Pondération</th>
        </tr>
        <?php
        for ($i = 0; $i < count($notes); $i++) {
            $note = floatval($notes[$i]);
            $credit = intval($credits[$i]);
            $point = noteToPoint($note);
            $pond = $point * $credit;

            if ($note < 35) $has_echec = true;

            $total_points += $pond;
            $total_credits += $credit;

            echo "<tr>
                <td>{$ues[$i]}</td>
                <td>$note</td>
                <td>$point</td>
                <td>$credit</td>
                <td>" . number_format($pond, 2) . "</td>
            </tr>";
        }

        $mgp = $total_points / $total_credits;
        $moyenne20 = $mgp * 5;
        ?>
    </table>

    <h3>Total Crédits : <?= $total_credits ?></h3>
    <h3>Total Points Pondérés : <?= number_format($total_points, 2) ?></h3>
    <h3>MGP : <?= number_format($mgp, 3) ?> / 4</h3>
    <h3>Moyenne sur 20 : <?= number_format($moyenne20, 2) ?> / 20</h3>


    <a href="index.php">🔙 Revenir</a>
</div>
</body>
</html>

