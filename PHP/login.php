<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $userdata = json_decode(file_get_contents('utenti.json'),true);
                $validUser = false;
                foreach($userdata['users'] as $user){
                    if($user['username'] === $username && $user['password'] === $password){
                        $validUser = true;
                        break;
                    }
                }
                if($validUser){
                    //salviamo la sessione
                    $_SESSION['username'] = $username;

                    header('Location: titolo.php');

                exit();
                }else{
                    $error = "Invalid username or password";
                }
            }
    ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <h1>Login</h1>
    <h3>Username <input type="text" name="username"> <br> </h3>
    <h3>Password: <input type="text" name="password"> <br> </h3>
    <input type="submit" value="Login">
    <a href="./register.php">
        <input type="button" value="Register">
    </a>
</body>
</html>