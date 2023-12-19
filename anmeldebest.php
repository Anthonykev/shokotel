<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfe, ob alle erforderlichen Felder gesetzt sind
    if (
        isset($_POST["username"]) &&
        isset($_POST["password"]) &&
        isset($_POST["anrede"]) &&
        isset($_POST["vorname"]) &&
        isset($_POST["nachname"]) &&
        isset($_POST["email"]) &&
        isset($_POST["birthdate"])
    ) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $anrede = $_POST["anrede"];
        $vorname = $_POST["vorname"];
        $nachname = $_POST["nachname"];
        $email = $_POST["email"];
        $birthdate = $_POST["birthdate"];

        // Speichere die Daten in einer einfachen Datenstruktur (Array).
        $userData = [
            'username' => $username,
            'password' => $password,
            'anrede' => $anrede,
            'vorname' => $vorname,
            'nachname' => $nachname,
            'email' => $email,
            'birthdate' => $birthdate,
        ];

        // Hier Setze ich die Benutzerdaten in die Session.
        $_SESSION['userData'] = $userData;

        echo "Registrierung erfolgreich! Benutzerdaten gespeichert.";
    } else {
        echo "Fehler bei der Registrierung. Stelle sicher, dass alle erforderlichen Felder ausgefüllt sind.";
    }
} else {
    echo "Ungültige Anfrage-Methode.";
}
?>
