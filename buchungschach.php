<?php
function berechneTeilnahmegebühr($anzahlPersonen) {
    // Hier kannst du die Teilnahmegebühr pro Person definieren
    $gebührProPerson = 10.00;

    // Berechne die Gesamtgebühr
    $gesamtgebühr = $gebührProPerson * $anzahlPersonen;

    return $gesamtgebühr;
}

// Initialisiere $gesamtgebühr mit einem Standardwert
$gesamtgebühr = 0.00;

// Überprüfe, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anzahlPersonen = $_POST["anzahlPersonen"];

    // Berechne die Teilnahmegebühr
    $gesamtgebühr = berechneTeilnahmegebühr($anzahlPersonen);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Schachturnier Anmeldung</title>
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
                <h2>Chess Anmeldung</h2>
                <p class="lead">Melden Sie sich für unser Schachturnier an. Geben Sie einfach die Anzahl der teilnehmenden Personen und den gewünschten Tag ein.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <h4 class="mb-3" style="text-align: center;">Anmeldung</h4>
                    <form class="needs-validation" novalidate="" method="post" action="buchungschach.php">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="anzahlPersonen" class="form-label">Anzahl der Personen</label>
                                <select class="form-select" id="anzahlPersonen" name="anzahlPersonen" required="">
                                    <option value="">Wählen...</option>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 Personen</option>
                                    <option value="3">3 Personen</option>
                                    <option value="4">4 Personen</option>
                                </select>
                                <div class="invalid-feedback">
                                    Bitte wählen Sie eine gültige Anzahl aus.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="gewünschterTag" class="form-label">Gewünschter Tag</label>
                                <input type="date" class="form-control" id="gewünschterTag" name="gewünschterTag" required="">
                                <div class="invalid-feedback">
                                    Bitte wählen Sie einen gültigen Tag aus.
                                </div>
                            </div>
                            <!-- Hinzugefügtes Feld für die Teilnahmegebühr -->
                            <div class="col-md-12">
                                <label for="gesamtgebühr" class="form-label">Gesamtgebühr</label>
                                <input type="text" class="form-control" id="gesamtgebühr" name="gesamtgebühr" value="<?php echo isset($gesamtgebühr) ? number_format($gesamtgebühr, 2) : ''; ?>" readonly>
                                <div class="invalid-feedback">
                                    Bitte wählen Sie eine gültige Anzahl aus, um die Gesamtgebühr zu berechnen.
                                </div>
                            </div>
                            <hr class="my-2">
                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($gesamtgebühr)) { ?>
                                <div class="alert alert-success" role="alert">
                                    Die Gesamtgebühr für Ihre Anmeldung beträgt: <?php echo number_format($gesamtgebühr, 2); ?> Euro. Viel Spaß beim Schachturnier!
                                </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <button class="w-100 btn btn-light btn-lg btn-hover-dark" type="submit">Anmelden</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
