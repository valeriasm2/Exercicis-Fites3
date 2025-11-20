<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex34</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
            color: #333;
        }
        .comentari {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0px 1px 7px rgba(0,0,0,0.09);
        }
        .comentari h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    
    <?php
    $file = "ex34.txt";

    if (file_exists($file)) {
        $contingut = file_get_contents($file);
        // Reemplaza líneas que empiezan con "##" por <h1>...</h1>
        $contingut = preg_replace('/^##\s?(.*)$/m', '<h1>$1</h1>', $contingut);
        echo "<div class='comentari'>";
        echo "<h3>Comentaris guardats:</h3>";

        // Mostramos el contenido tal cual, con los encabezados procesados y saltos de línea simples
        $contingut = preg_replace('/^##\s?(.*)$/m', '<h1>$1</h1>', $contingut);
        $contingut = nl2br($contingut);
        echo $contingut;

        echo "</div>";
    } else {
        echo "<div class='comentari'><strong>No s'ha trobat el fitxer ex34.txt.</strong></div>";
    }
    ?>
</body>
</html>