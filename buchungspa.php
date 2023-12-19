<?php
function berechneZimmerPreis($spaTyp, $anzahlPersonen) {
    // Hier kannst du die Preise für die verschiedenen Zimmertypen definieren
    $standardspa = 100.00;
    $deluxeSpa = 200.00;
    $shokotelSpa = 300.00;
   

    // Wähle den entsprechenden Preis basierend auf dem ausgewählten Zimmertyp
    switch ($spaTyp) {
        case "standard":
            $spaPreis = $standardspa;
            break;
        case "deluxe":
            $spaPreis = $deluxeSpa;
            break;
        case "shokotel":
            $spaPreis = $shokotelSpa;
            break;
        
        default:
            $spaPreis = 0.00; // Setze einen Standardpreis für den Fall, dass kein gültiger Zimmertyp ausgewählt wurde
            break;
    }

    // Multipliziere den Zimmerpreis mit der Anzahl der Personen
    $spaPreis *= $anzahlPersonen;

    return $spaPreis;
}

// Initialisiere $zimmerPreis mit einem Standardwert
$spaPreis = 0.00;

// Überprüfe, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spaTyp = $_POST["spaTyp"];
    $anzahlPersonen = $_POST["anzahlPersonen"];

    // Berechne den Zimmerpreis
    $spaPreis = berechneZimmerPreis($spaTyp, $anzahlPersonen);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Spa Suite Buchungsformular</title>
    <style>
        .brown-background {
            background-color: #8B4513;
            /* Braun als Hintergrundfarbe */
            color: white;
            /* Textfarbe für den Kontrast */
        }

        .custom-background {
            background-color: #e0d5d5;
            /* Andere Hintergrundfarbe */
            color: #000000;
            /* Passende Textfarbe */
        }
    </style>
</head>

<body>
    <?php include("nav.php") ?>
    <div class="container mt-1 d-flex" style="background-color: #666; color: #fff; box-shadow: 0px 0px 10px 0px #000;">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src=# alt="" width="72" height="57">
                <h2>Spa Suite Buchungsformular</h2>
                <p class="lead">Vielen Dank, dass Sie sich entschieden haben, unsere luxuriöse Spa Suite zu buchen. Im Anschluss finden Sie das Buchungsformular. Sollten beim Buchen Probleme auftreten, zögern Sie bitte nicht, uns zu kontaktieren.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <h4 class="mb-3">Informationen</h4>
                    <form class="needs-validation" novalidate="" method="post" action="buchungspa.php">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Vorname</label>
                                <input type="text" class="form-control" id="firstName" placeholder="firstname" value="" required="">
                                <div class="invalid-feedback">
                                    Ein gültiger Vorname wird benötigt.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Nachname</label>
                                <input type="text" class="form-control" id="lastName" placeholder="lastname" value="" required="">
                                <div class="invalid-feedback">
                                    Ein gültiger Nachname wird benötigt.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="username" class="form-label">Benutzername</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                    <div class="invalid-feedback">
                                        Ihr Benutzername wird benötigt.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">E-mail <span class="text-body-secondary">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="Sie@example.com">
                                <div class="invalid-feedback">
                                    Bitte geben Sie eine gültige E-Mail-Adresse ein.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                                <div class="invalid-feedback">
                                    Bitte geben Sie Ihre Wohnadresse ein.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                            </div>
                            <div class="col-md-6">
                                <label for="country" class="form-label">Land</label>
                                <input type="text" class="form-control" id="country">
                                <div class="invalid-feedback">
                                    Bitte wählen Sie ein gültiges Land aus.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="state" class="form-label">Stadt</label>
                                <input type="text" class="form-control" id="state">
                                <div class="invalid-feedback">
                                    Bitte wählen Sie ein gültiges stadt aus.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="spaTyp" class="form-label">Spatyp</label>
                                <select class="form-select" id="spaTyp" name="spaTyp" required="">
                                    <option value="">Auswahl...</option>
                                    <option value="standard">Standardspa</option>
                                    <option value="deluxe">Deluxespa</option>
                                    <option value="shokotel">Shokotelspa</option>
                                </select>
                                <div class="invalid-feedback">
                                    Bitte wählen Sie ein gültiges Spaangebot aus.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="anzahlPersonen" class="form-label">Anzahl der Personen</label>
                                <select class="form-select" id="anzahlPersonen" name="anzahlPersonen" required="">
                                    <option value="">Choose...</option>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 Personen</option>
                                    <option value="3">3 Personen</option>
                                    <option value="4">4 Personen</option>
                                </select>
                                <div class="invalid-feedback">
                                    Bitte wählen Sie eine gültige Anzahl aus.
                                </div>
                            </div>
                            <!-- Hinzugefügtes Feld für den Zimmerpreis -->
                            <div class="col-md-4">
                                <label for="spaPreis" class="form-label">Spapreis</label>
                                <input type="text" class="form-control" id="spaPreis" name="spaPreis" value="<?php echo isset($spaPreis) ? number_format($spaPreis, 2) : ''; ?>" readonly>
                                <div class="invalid-feedback">
                                    Bitte wählen Sie einen gültigen Spapreis aus.
                                </div>
                            </div>
                           
                            <hr class="my-2">
                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($spaPreis)) { ?>
                                <div class="alert alert-success" role="alert">
                                    Der Betrag Ihrer Buchung beläuft sich auf: <?php echo number_format($spaPreis, 2); ?> Euro. Vielen Dank für Ihre Buchung!
                                </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <label for="zahlungsmethode" class="form-label">Zahlungsmethode</label>
                                <select class="form-select" id="zahlungsmethode" name="zahlungsmethode" required="">
                                    <option value="">Auswahl...</option>
                                    <option value="credit">Credit card</option>
                                    <option value="debit">Debit card</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                                <div class="invalid-feedback">
                                    Bitte wählen Sie eine gültige Zahlungsmethode aus.
                                </div>
                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg btn-hover-dark" type="submit">Bestätigen & Buchen</button>
                        </div>
                    </form>
                </div>
                <footer class="my-5 pt-5 text-body-secondary text-center text-small">
                    <p class="mb-1">© 2017–2023 Shokotel</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="index.php">Startseite</a></li>
                        <li class="list-inline-item"><a href="impressum.php">Bedingungen</a></li>
                        <li class="list-inline-item"><a href="hilfeSeite.php">Hilfe</a></li>
                    </ul>
                </footer>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
