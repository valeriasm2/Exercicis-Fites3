<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex33</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 600px;
            background: #fff;
            margin: 40px auto 20px auto;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0px 2px 12px rgba(0,0,0,0.11);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        textarea {
            resize: vertical;
            min-height: 70px;
            max-height: 280px;
            font-size: 1rem;
            padding: 8px;
            border: 1px solid #bbb;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 120px;
            padding: 8px 0;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background: #217dbb;
        }
        .txt {
            max-width: 600px;
            margin: 12px auto;
            background: #fafafa;
            border: 1px solid #dedede;
            border-radius: 8px;
            padding: 18px 21px;
            box-shadow: 0px 1px 7px rgba(0,0,0,0.07);
        }
        .txt h3 {
            font-size: 1.12rem;
            color: #222;
            margin-top: 0;
        }
        .txt pre {
            font-size: 1rem;
            font-family: 'Fira Mono', 'Consolas', monospace;
            color: #343434;
            margin: 9px 0 0 0;
            white-space: pre-wrap;
            word-break: break-word;
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <textarea name="txt" required></textarea>
        <input type="submit" value="Enviar">
    </form>

    <?php
    $file = 'ex33.txt';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $txt = isset($_POST['txt']) ? trim($_POST['txt']) : '';

        if ($txt !== '') {
            file_put_contents($file, $txt . "\n", FILE_APPEND);

            echo "<div class='txt'>";
            echo "<h3>Text desat:</h3>";
            echo "<pre>" . htmlspecialchars($txt) . "</pre>";
            echo "</div>";
        }
    }

    if (file_exists($file)) {
        $contingut = file_get_contents($file);
        echo "<div class='txt'>";
        echo "<h3>Comentaris guardats:</h3>";
        echo "<pre>" . htmlspecialchars($contingut) . "</pre>";
        echo "</div>";
    }
    ?>
    
</body>
</html>