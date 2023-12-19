
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzerprofil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php require_once("nav.php") ?>

    <h1>Herzlich Willkommen, <?php echo $_SESSION["username"]; ?></h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-container">
            <div class="menu">
                <label for="address">Adresse:</label>
                <input type="text" name="address" id="address">
            </div>

            <div class="menu">
                <label for="destinations">Reiseziele:</label>
                <input type="destinations" name="destinations" id="destinations">
            </div>

        
            <button type="submit">Profil aktualisieren</button>
        </div>
    </form>

    <div class="form-container">
        <h2>Passwort ändern: </h2>
        <form action="" method="post">
            <div class="menu">
                <label for="password">Passwort:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="menu">
                <label for="password_repeat">Passwort wiederholen:</label>
                <input type="password" id="password_repeat" name="password_repeat" required>
            </div>

            <button type="submit" name="p_submit" id="p_submit">Passwort ändern</button>

            <?PHP
            $password = $passwordconfirm = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $password = $_POST["password"];
                $passwordconfirm = $_POST["password_repeat"];
            }
            if (isset($_POST["p_submit"])) {
                if ($password != $passwordconfirm) {
                    echo '<p style="color: red;">Die Passwörter stimmen nicht überein. Bitte überprüfen Sie Ihre Eingabe.</p>';
                }
                if ($password == $passwordconfirm) {
                    echo '<p style="color: red;">Passwort wurde erfolgreich geändert.</p>';
                }
            }
            ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>