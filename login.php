<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .error-message {
            color: red;
            margin-top: 5px;
        }

        body {
            height: 100vh;
            background-color: #f0f0f0;
        }

        .form-control::placeholder {
            color: #6c757d !important;
        }
    </style>
</head>

<body class="text-center">
    <?php require_once("nav.php"); ?>

    <?php
    $Username = $Passwort = "";
    $UsernameErr = $PasswortErr = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        if (empty($_POST["username"])) {
            $UsernameErr = "Pflichtfeld!";
        } else {
            $Username = test_input($_POST["username"]);

            require("db.php");
            $sql = "SELECT `Benutzername`, `Passwort` FROM profile WHERE `Benutzername` = ?";
            $stmt = $db_obj->prepare($sql);
            $stmt->bind_param("s", $Username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Benutzername existiert, überprüfe das Passwort
                $row = $result->fetch_assoc();
                $hashed_password = $row['Passwort'];

                if (password_verify($_POST['password'], $hashed_password)) {
                    $_SESSION['Username'] = $Username;
                    $_SESSION['username'] = $Username;
                    header("location: index.php");
                    exit(); // Wichtig, um nach dem Header-Aufruf weiteren Code zu verhindern
                } else {
                    $PasswortErr = " Passwort ungültig!";
                }
            } else {
                $UsernameErr = "User existiert nicht!";
            }

            $stmt->close();
            $db_obj->close();
        }
    }
    ?>



    <div class="container-sm">
        <form action="#" method="post">
            <h1 class="h3 mb-3 fw-normal">Anmeldung</h1>
            <div class="form-floating">
                <label for="username"></label>
                <input type="text" name="username" class="form-control" placeholder="Benutzername">
                <span class="error-message"><?php echo $UsernameErr; ?></span>
            </div>
            <div class="form-floating">
                <label for="password"></label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="error-message"><?php echo $PasswortErr; ?></span>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="keinRobo">
                    Kein Roboter
                </label>
            </div>
            <button type="submit" name="submit" class="w-100 btn btn-lg btn-secondary">Anmelden</button>
        </form>

    </div>

    <?php

    ob_end_flush();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
