<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titolo = $_POST['titolo'];
            $_SESSION['titolo'] = $titolo;
            header('Location: Casi.php');
            exit();
        }
    ?>
</head>
<body>
    
</body>
</html>