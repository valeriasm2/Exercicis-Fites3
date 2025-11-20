<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Botiga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }
        form {
            background: #fff;
            padding: 25px 30px;
            max-width: 400px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        }
        h1 {
            text-align: center;
            color: #2176ae;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type=text] {
            width: 98%;
            margin-bottom: 15px;
            padding: 7px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .productes-list {
            margin-bottom: 15px;
        }
        .missatge {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
            color: #2176ae;
        }
        input[type=submit] {
            padding: 8px 18px;
            background: #2176ae;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 5px;
        }
        input[type=submit]:hover {
            background: #3a97d4;
        }
    </style>
</head>
<body>
<?php
$input = "productes.txt";
$output = "comandes.txt";
if (!file_exists($input)) {
    echo "<div class='missatge'>Falta fitxer de productes!</div>";
    exit;
}
$lines = file($input, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['user'] ?? "");
    $prods = $_POST['productes'] ?? [];
    if ($nom == "") $msg = "Introdueix un nom.";
    elseif (empty($prods)) $msg = "Tria almenys un producte.";
    else {
        file_put_contents($output, $nom . "," . implode(",", $prods) . "\n", FILE_APPEND);
        $msg = "Comanda feta!";
    }
}
?>
    <h1>Botiga</h1>
    <form method="post">
        <label for="user">Nom:</label>
        <input type="text" name="user" id="user">
        <label>Productes:</label>
        <div class="productes-list">
        <?php foreach($lines as $p): ?>
            <input type="checkbox" name="productes[]" value="<?= htmlspecialchars($p) ?>"> <?= htmlspecialchars($p) ?><br>
        <?php endforeach; ?>
        </div>
        <input type="submit" value="Enviar">
    </form>
    <?php if ($msg): ?>
        <div class="missatge"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
</body>
</html>