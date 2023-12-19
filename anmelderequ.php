<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierungsformular</title>
    <link rel="stylesheet" href="formato.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
include("nav.php")
?>

<body>

    <?php
    /*
        $anrede = $nachname = $vorname = $email = $geburtstag = $benutzername = $password = $passwordconfirm = "";
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        */

    $Anrede = $Vorname = $Nachname = $Email = $Telefonnummer = $Benutzername = $Passwort = $Passwortconfirm = $date = $file = $gender = "";
    $VornameErr = $NachnameErr = $EmailErr = $UsernameErr = $PasswortErr = $Passwort2Err = $imgErr = "";




    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $Anrede = test_input($_POST["anrede"]);

            if (empty($_POST["vorname"])) {
                $VornameErr = '<p style="color: red;">Pflichtfeld!</p>';

            } else {
                $Vorname = test_input($_POST["vorname"]);
                if (!preg_match("/^[a-zA-Z-']*$/", $Vorname)) {
                    $VornameErr = '<p style="color: red;">Keine Zeichen!</p>';

                }
            }
            if (empty($_POST["nachname"])) {
                $NachnameErr = "Pflichtfeld!";
            } else {
                $Nachname = test_input($_POST["nachname"]);
                if (!preg_match("/^[a-zA-Z-']*$/", $Vorname)) {
                    $NachnameErr ='<p style="color: red;">Keine Zeichen!</p>';
                }
            }

            if (empty($_POST["email"])) {
                $EmailErr = "Pflichtfeld!";
            } else {
                $Email = test_input($_POST["email"]);
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $EmailErr = '<p style="color: red;">E-Mail nicht korrekt!</p>';

                }
            }
            $Telefonnummer = test_input($_POST["telefonnummer"]);

            if (empty($_POST["username"])) {
                $UsernameErr ='<p style="color: red;">Pflichtfeld!</p>';

            } else {
                $Username = test_input($_POST["username"]);
            }
            if (empty($_POST["password"])) {
                $PasswortErr = '<p style="color: red;">Pflichtfeld!</p>';
            } else {
                $Passwort = test_input($_POST["password"]);
            }
            if (empty($_POST["password_repeat"])) {
                $Passwort2Err = '<p style="color: red;">Pflichtfeld!</p>';
            } else {
                $Passwortconfirm = test_input($_POST["password_repeat"]);
            }

            $date = test_input($_POST["birthdate"]);

            if (!empty($_POST["anrede"])) {
                $gender = test_input($_POST["geschlecht"]);
            }

            if ($Passwort != $Passwortconfirm and $Passwortconfirm > 0 and $Passwort > 0) {
                $Passwort2Err = '<p style="color: red;">Inkorrekt!</p>';

            }

            require("db.php");

            $sql = "SELECT `Benutzername`, `E-Mail` FROM profile";
            $result = $db_obj->query($sql);

            while ($row = $result->fetch_array()) {
                if ($row['Benutzername'] == $Username) {
                    $UsernameErr = '<p style="color: red;">User besetzt!</p>';

                }
                if ($row['E-Mail'] == $Email) {
                    $EmailErr = '<p style="color: red;">Mail besetzt!</p>';

                }
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" and $VornameErr == "" and $NachnameErr == "" and $EmailErr == "" and $UsernameErr == "" and $PasswortErr == "" and $Passwort2Err == "" and $imgErr == "") {
        $enc_password = password_hash($Passwort, PASSWORD_DEFAULT);

        require("db.php");

        $sql = "INSERT INTO `profile` (`Vorname`, `Nachname`, `Benutzername`, `Passwort`,`Geburtsdatum`, `E-Mail`, `Telefonnummer`,`Geschlecht`,`Anrede` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db_obj->prepare($sql);

        $stmt->execute([$Vorname, $Nachname, $Username, $enc_password, $date, $Email, $Telefonnummer,  $gender, $Anrede]);
    }
    ?>

    <div class="header">
        <h1>Anmeldungsformular</h1>
    </div>

    <form action="anmelderequ.php" method="POST">
        <div class="container">
        <div class="menu">
            <label for="anrede">Anrede</label>
            <select name="anrede" id="anrede">
                <option value=" "></option>
                <option value="herr">Herr</option>
                <option value="frau">Frau</option>
                <option value="div">Div</option>
            </select>
        </div>
        <div class="menu">
            <label for="geschlecht">Geschlecht</label>
            <select name="geschlecht" id="geschlecht">
                <option value=" "></option>
                <option value="Mann"> männlich</option>
                <option value="Frau">weiblich</option>
                <option value="Geschlechtsneutral">Geschlechtsneutral</option>
            </select>
        </div>

        <div class="menu">
            <label for="vorname">Vorname</label>
            <input type="text" id="vorname" name="vorname">
            <span class="error"> <?php echo $VornameErr; ?></span>
        </div>

        <div class="menu">
            <label for="nachname">Nachname</label>
            <input type="text" id="nachname" name="nachname">
            <span class="error"> <?php echo $NachnameErr; ?></span>
        </div>

        <div class="menu">
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email">
            <span class="error"> <?php echo $EmailErr; ?></span>
        </div>

        <div class="menu">
            <label for="birthdate">Geburtsdatum:</label>
            <input type="date" id="birthdate" name="birthdate" required>
        </div>

        <div class="menu">
            <label for="telefonnummer">Telefonnummer:</label>
            <input type="tel" id="telefonnummer" name="telefonnummer" required>
        </div>

        <div class="menu">
            <label for="username">Benutzername:</label>
            <input type="text" id="username" name="username" placeholder="Username*" required>
            <span class="error"> <?php echo $UsernameErr; ?></span>
        </div>

        <div class="menu">
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
            <span class="error"> <?php echo $PasswortErr; ?></span>
        </div>

        <div class="menu">
            <label for="password_repeat">Passwort wiederholen:</label>
            <input type="password" id="password_repeat" name="password_repeat" required>
            <span class="error"> <?php echo $Passwort2Err; ?></span>
        </div>

        <div>
            <button type="submit" name="submit" class="btn btn-primary btn-sm">Registrieren</button>
        </div>




    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
