<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 3.2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
            color: #333;
        }
        h2 {
            color: #0073e6;
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea, input[type=text] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            padding: 8px 16px;
            background-color: #0073e6;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #005bb5;
        }
        .comentari, pre {
            max-width: 500px;
            margin: 10px auto;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .comentari h3 {
            margin: 0 0 5px 0;
            color: #0073e6;
        }
    </style>
</head>
<body>

<h2>INTRODUEIX DADES</h2>

<form method="POST" action="">
    <label>Comentari:</label>
    <textarea name="comentari" required></textarea>

    <label>Separador:</label>
    <input type="text" name="separador" value="_" required>

    <input type="submit" value="Enviar">
</form>

<?php
$file = "comentaris.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comentari = $_POST['comentari'];
    $separador = $_POST['separador'];

    // Reemplazar espacios por el separador
    $comentari = str_replace(" ", $separador, $comentari);

    // Guardar en el archivo (crea si no existe)
    file_put_contents($file, $comentari . "\n", FILE_APPEND);

    echo "<div class='comentari'>";
    echo "<h3>Comentari desat:</h3>";
    echo "<pre>" . htmlspecialchars($comentari) . "</pre>";
    echo "</div>";
}

// Mostrar el contenido del archivo
if (file_exists($file)) {
    $contingut = file_get_contents($file);
    echo "<div class='comentari'>";
    echo "<h3>Comentaris guardats:</h3>";
    echo "<pre>" . htmlspecialchars($contingut) . "</pre>";
    echo "</div>";
}
?>

</body>
</html>
