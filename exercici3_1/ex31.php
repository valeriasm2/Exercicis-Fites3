<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arxius 3.1</title>
    <style>
        h1 {
            text-align: center;
            color: #4a90e2;
            margin-bottom: 30px;
        }

        table {
            width: 70%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px 20px;
            text-align: left;
        }

        th {
            background-color: #4a90e2;
            color: white;
        }

        p {
            text-align: center;
            color: #4a90e2;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

	<h1>Procesando Contactos</h1>

	<?php 
	$input = "contactos31.txt";
	$output = "contactos31b.txt";

	if (!file_exists($input)) exit("No está el fichero!");

	$lines = file($input);

	echo "<table><tr><th>Nom</th><th>Cognom1</th><th>Cognom2</th><th>Telèfon</th></tr>";

	$newLines = [];
	foreach ($lines as $line) {
	    $parts = explode(",", $line);
	    echo "<tr>";
	    foreach ($parts as $p) echo "<td>".htmlspecialchars($p)."</td>";
	    echo "</tr>";
	    $newLines[] = implode("#", $parts);
	}
	echo "</table>";

	file_put_contents($output, implode("\n", $newLines));
	?>

</body>
</html>
