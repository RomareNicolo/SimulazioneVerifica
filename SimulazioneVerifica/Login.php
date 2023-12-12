<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php 
        session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['fUsername'];
            $password = $_POST['fPassword'];

            $userData = json_decode(file_get_contents('utenti.json'), true);

            $validUser = false;
            foreach ($userData['users'] as $user) {
                if ($user['username'] === $username && $user['password'] === $password) {
                    $validUser = true;
                    break;
                }
            }
            if ($validUser) {
                // Set session variables
                $_SESSION['username'] = $username;

                // Redirect to the home page
                header('Location: Casi.php');
                exit();
            } else {
                $error = "Invalid username or password";
            }
        }
    ?>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label>Username: <input type="text" name="fUsername" required></label> <br><br>
        <label>Password: <input type="text" name="fPassword" required></label><br><br>
        <button type="submit">Login</button>  
    </form>
    <form action="Register.php" method="post">
        <button type="submit">Registrati</button>  
    </form>
</body>
</html>