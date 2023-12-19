<?php
 function berechneZimmerPreis($zimmerTyp, $anzahlPersonen) {
    // Hier kannst du die Preise für die verschiedenen Zimmertypen definieren
    $standardPreis = 100.00;
    $deluxePreis = 200.00;
    $suitePreis = 300.00;

    // Wähle den entsprechenden Preis basierend auf dem ausgewählten Zimmertyp
    switch ($zimmerTyp) {
        case "standard":
            $zimmerPreis = $standardPreis;
            break;
        case "deluxe":
            $zimmerPreis = $deluxePreis;
            break;
        case "suite":
            $zimmerPreis = $suitePreis;
            break;
        default:
            $zimmerPreis = 0.00; // Setze einen Standardpreis für den Fall, dass kein gültiger Zimmertyp ausgewählt wurde
            break;
    }

    // Multipliziere den Zimmerpreis mit der Anzahl der Personen
    $zimmerPreis *= $anzahlPersonen;

    return $zimmerPreis;
}

function berechneGesamtBetrag($zimmerPreis, $mitFruehstueck, $mitParkplatz, $mitTier) {
    $fruehstueckPreis = $mitFruehstueck ? 30.00 : 0.00;
    $parkplatzpreis = $mitParkplatz ? 20.00 : 0.00;
    $mitTierPreis = $mitTier ? 30.00 : 0.00;

    $gesamtBetrag = $zimmerPreis + $fruehstueckPreis + $parkplatzpreis + $mitTierPreis;

    return number_format($gesamtBetrag, 2);
}

// Initialisiere $zimmerPreis mit einem Standardwert
$zimmerPreis = 0.00;
$mitFruehstueck = false;
$mitParkplatz = false;
$mitTier = false;
$fehlermeldung = ""; // Neue Variable für die Fehlermeldung

// Überprüfe, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $zimmerTyp = $_POST["zimmerTyp"];
    $anzahlPersonen = $_POST["anzahlPersonen"];

    // Überprüfe An- und Abreisedatum
    $anreiseDatum = strtotime($_POST["anreiseDatum"]);
    $abreiseDatum = strtotime($_POST["abreiseDatum"]);

    if ($abreiseDatum <= $anreiseDatum) {
        // Fehler: Abreisedatum darf nicht kleiner oder gleich dem Anreisedatum sein
        $fehlermeldung = "Fehler: Das Abreisedatum muss nach dem Anreisedatum liegen.";
    } else {
        // Berechne den Zimmerpreis nur wenn keine Fehlermeldung vorliegt
        $zimmerPreis = berechneZimmerPreis($zimmerTyp, $anzahlPersonen);

        // Überprüfe, ob die Checkboxen ausgewählt wurden
        $mitFruehstueck = isset($_POST["mitFruehstueck"]);
        $mitParkplatz = isset($_POST["mitParkplatz"]);
        $mitTier = isset($_POST["mitTier"]);

        // Berechne den Gesamtbetrag
        $gesamtBetrag = berechneGesamtBetrag($zimmerPreis, $mitFruehstueck, $mitParkplatz, $mitTier);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
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
                <h2>Zimmer & Suiten Buchungsformular</h2>
                <p class="lead">Vielen Dank, dass Sie sich entschieden haben, bei uns zu buchen. Im Anschluss finden Sie das Buchungsformular. Sollten beim Buchen Probleme auftreten, zögern Sie bitte nicht, uns zu kontaktieren.</p>
            </div>


            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <h4 class="mb-3">Informationen</h4>


                    <form class="needs-validation" novalidate="" method="post" action="buchungzimmer.php">
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
                                <input type="email" class="form-control" id="email" placeholder="user@example.com">
                                <div class="invalid-feedback">
                                    Bitte geben Sie eine gültige E-Mail-Adresse ein.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="address" placeholder="Adressestraße 12" required="">
                                <div class="invalid-feedback">
                                    Bitte geben Sie Ihre Wohnadresse ein.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Stige/Türnummer">
                            </div>

                            <div class="col-md-5">
                                <label for="country" class="form-label">Land</label>
                                <input type="text" class="form-control" id="country">
                                <div class="invalid-feedback">
                                    Bitte wählen Sie ein gültiges Land aus.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">Stadt</label>
                                <input type="text" class="form-control" id="state">
                                <div class="invalid-feedback">
                                    Bitte wählen Sie ein gültiges stadt aus.
                                </div>
                            </div>

                            <div class="col-md-4">
        <label for="zimmerTyp" class="form-label">Zimmertyp</label>
        <select class="form-select" id="zimmerTyp" name="zimmerTyp" required="">
            <option value="">Auswahl...</option>
            <option value="standard">Standardzimmer</option>
            <option value="deluxe">Deluxe-Zimmer</option>
            <option value="suite">Suite</option>
        </select>
        <div class="invalid-feedback">
            Bitte wählen Sie ein gültiges Zimmer aus.
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
        <label for="zimmerPreis" class="form-label">Zimmerpreis</label>
        <input type="text" class="form-control" id="zimmerPreis" name="zimmerPreis" value="<?php echo isset($zimmerPreis) ? number_format($zimmerPreis, 2) : ''; ?>" readonly>
        <div class="invalid-feedback">
            Bitte wählen Sie einen gültigen Zimmerpreis aus.
        </div>
    </div>
    <div class="col-md-6">
    <label for="anreiseDatum" class="form-label">Anreisedatum</label>
    <input type="date" class="form-control" id="anreiseDatum" name="anreiseDatum" required="">
    <div class="invalid-feedback">
        Bitte geben Sie das Anreisedatum ein.
    </div>
</div>

<div class="col-md-6">
    <label for="abreiseDatum" class="form-label">Abreisedatum</label>
    <input type="date" class="form-control" id="abreiseDatum" name="abreiseDatum" required="">
    <div class="invalid-feedback">
        Bitte geben Sie das Abreisedatum ein.
    </div>
    </div>
    <?php
    if (!empty($fehlermeldung)) {
        // Zeige die Fehlermeldung in rot an
        echo '<div class="alert alert-danger">' . $fehlermeldung . '</div>';
    }
    ?>
    <hr class="my-2">

    <div class="col-md-4">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="mitFruehstueck" name="mitFruehstueck">
            <label class="form-check-label" for="mitFruehstueck">Mit Frühstück (+30€)</label>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="mitParkplatz" name="mitParkplatz">
            <label class="form-check-label" for="mitParkplatz">Mit Parkplatz (+20€)</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="mitTier" name="mitTier">
            <label class="form-check-label" for="mitTier">Mit Tier (+30€)</label>
        </div>
    </div>
</div>

<hr class="my-2">

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="save-info">
    <label class="form-check-label" for="save-info">Speichern Sie diese Informationen für das nächste Mal.</label>
</div>

<hr class="my-2">
</div>
<div class="container">


<div class="col-md-12">
<label for="gesamtBetrag" class="form-label">Gesamtbetrag</label>
<textarea class="form-control" id="gesamtBetrag" name="gesamtBetrag" readonly rows="5"><?php echo isset($gesamtBetrag) ? $gesamtBetrag : ''; ?></textarea>
</div>
<hr class="my-2">
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($gesamtBetrag)) { ?>
    <div class="alert alert-success" role="alert">
        Sie haben diese Anzahl an Personen ausgewählt: <?php echo $anzahlPersonen; ?> 
        <br> Daher ist der Preis für Ihre Zimmerauswahl: <?php echo $zimmerPreis; ?> Euro 

        <?php
        // Überprüfe, ob die Checkboxen ausgewählt wurden und füge den Text hinzu
        if ($mitFruehstueck) {
            echo "Mit Frühstück für 30 Euro. ";
        }

        if ($mitParkplatz) {
            echo "Mit Parkplatz für 20 Euro. "; 
        }

        if ($mitTier) {
            echo "Mit Tier für 30 Euro. ";
        }
        ?>

        <br>Der Betrag Ihrer Buchung/Tag beläuft sich auf: <?php echo $gesamtBetrag; ?> Euro. Vielen Dank für Ihre Buchung!
    </div>
<?php } ?>

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="save-info">
    <label class="form-check-label" for="save-info">Speichern Sie diese Informationen für das nächste Mal.</label>
</div>

<hr class="my-2">

<div class="col-md-12">
    <label for="zahlungsmethode" class="form-label">Zahlungsmethode</label>
    <select class="form-select" id="zahlungsmethode" name="zahlungsmethode" required="">
        <option value="">Auswahl...</option>
        <option value="credit">Kreditkarte</option>
        <option value="debit">Bankomat</option>
        <option value="paypal">PayPal</option>
    </select>
    <div class="invalid-feedback">
        Bitte wählen Sie eine gültige Zahlungsmethode aus.
    </div>
</div>
    <button class="w-100 btn btn-light btn-lg btn-hover-dark" type="submit">Buchen</button>
</form>
                      


                        
                    </form>
                </div>


                <footer class="my-5 pt-5 text-body-secondary text-center text-small">
                    <p class="mb-1">© 2017–2023 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Datenschutz</a></li>
                        <li class="list-inline-item"><a href="#">Bedingungen</a></li>
                        <li class="list-inline-item"><a href="hilfeSeite.php">Hilfe</a></li>
                    </ul>
                </footer>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
