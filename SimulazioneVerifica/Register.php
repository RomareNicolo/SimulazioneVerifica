<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['fUsername'];
        $password = $_POST['fPassword'];
        $successfulInsert = false;

        $data = array('username' => $username,
                        'password' => $password);
        $filename = 'utenti.json';
        $userData = file_exists($filename) ? 
                    json_decode(file_get_contents($filename), true) : array();
        if($userData === null) $userData = array();
        function insert(&$userData, $newData) {
            if(!isset($userData['users'])) {
                $userData['users'] = array();
            }
            $userData['users'][] = $newData;
        }
        insert($userData, $data);
        file_put_contents($filename, json_encode($userData, JSON_PRETTY_PRINT));

        $_SESSION['username'] = $username;
        header('Location: Casi.php');
        exit();
    }
    ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Registrati<br></h1>
        <label>Username <input type="text" name="username"></label> <br><br>
        <label>Password <input type="text" name="password"></label> <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>