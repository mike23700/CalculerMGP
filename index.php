<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculateur MGP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>💖 Calculateur de MGP (notes sur 100)</h1>
        <form action="calcul.php" method="post">
            <p>Saisis tes notes sur 100 et les crédits pour chaque UE :</p>
            <table>
                <tr>
                    <th>UE</th>
                    <th>Note /100</th>
                    <th>Crédit</th>
                </tr>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                <tr>
                    <td><input type="text" name="ue[]" placeholder="Nom UE <?= $i ?>"></td>
                    <td><input type="number" step="0.01" name="note[]" required></td>
                    <td><input type="number" step="1" name="credit[]" required></td>
                </tr>
                <?php endfor; ?>
            </table>
            <button type="submit">Calculer MGP</button>
        </form>
    </div>
</body>
</html>

