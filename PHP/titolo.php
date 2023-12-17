<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titolo</title>
    <?php
        session_start();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $titolo = $_POST['titolo'];
            $_SESSION['titolo'] = $titolo;
            header('Location: sospettati.php');
            exit();
        }
    ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h1>Titolo dell'indagine</h1>
        <h3>Titolo: <input type="text" name="titolo" required><br></h3>
        <input type="submit" value="Suspect">   
    </form>
</body>
</html>