<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Fehlende Höheneigenschaft für den Body height: 100vh;100% der Bildschirmhöhe einnimmt-->
    <style>
        body {
            height: 100vh;
            background-color: #f0f0f0;
        }
        div{
          padding-top: 0px;
        }
    </style>
  </head>
</head>
<body>
<!-- stellt sicher dass die Datei nur einmal eingefügt wird selbst wenn der Befehl mehrmals aufgerufen wird.-->
<?php require_once("nav.php") ?>

<div class="container mt-1 d-flex justify-content-center align-items-center" style=" padding-top: 0px; background-color: #666; color: #fff; box-shadow: 0px 0px 10px 0px #000;">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="text-center">
                <h2 class="display-4">Willkommen bei Shokotel</h2>
                <p class="lead">Entspannen Sie sich und genießen Sie Ihren Aufenthalt in unserem shokotelösen Hotel. Mit erstklassigen Annehmlichkeiten und einem atemberaubenden Blick bieten wir Ihnen eine unvergessliche Erfahrung.</p>
                <a href="buchungzimmer.php" class="btn btn-light btn-lg btn-hover-dark">Jetzt buchen</a>
            </div>
        </div>
    </div>
</div>


<div class="container mt-0 d-flex justify-content-center align-items-center" style="min-height: 100vh; max-width: 1000px;">
<div class="row">
    <div class="col-md-12 col-xs-12">
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="hotel2.jpg" class="d-block w-100" alt="hotel1foto">
    </div>
    <div class="carousel-item">
    <img src="hotel3.jpg" class="d-block w-100" alt="hotel1foto">
</div>
    <div class="carousel-item">
    <img src="hotel4.jpg" class="d-block w-100" alt="hotel1foto">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>
</div>

<div class="container d-flex justify-content-center align-items-center">
  
    
    <h1>Meet Shokotel</h1>
   
  </div>
  
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
    <div class="card text-center h-100" >
  <img src="aBildzimmer.jpg" class="card-img-top" alt="Zimmerbild">
  <div class="card-body">
    <h5 class="card-title">Zimmer & Suiten</h5>
    <p class="card-text">Entdecken Sie Luxus und Komfort in unseren einladenden Zimmern und Suiten. Buchen Sie Ihren Aufenthalt und erleben Sie erstklassige Annehmlichkeiten, stilvolles Design und herzlichen Service. Genießen Sie unvergessliche Momente in unseren exquisiten Unterkünften für einen unvergesslichen Aufenthalt.</p>
    <a href="buchungzimmer.php" class="btn btn-primary">Mehr Info!</a>
  </div>
</div>
    </div>
    <div class="col"> 
    <div class="card text-center h-100" >
  <img src="aBildspa.jpg" class="card-img-top" alt="Spabild">
  <div class="card-body">
    <h5 class="card-title">Boutique Spa</h5>
    <p class="card-text">Genießen Sie ultimative Entspannung und Wohlbefinden. Buchen Sie eine Spa-Behandlung und erleben Sie revitalisierende Verwöhnung für Körper und Geist.</p>
    <a href="buchungspa.php" class="btn btn-primary">Mehr Info!</a>
  </div>
</div>
    </div>
    <div class="col"> 
    <div class="card text-center h-100" >
  <img src="aBildschach.jpg" class="card-img-top" alt="Schachbild">
  <div class="card-body">
    <h5 class="card-title">Events</h5>
    <p class="card-text">Tauchen Sie ein in aufregende Veranstaltungen! Erleben Sie unvergessliche Momente bei unseren Events, einschließlich spannender Schachturniere für alle Schachbegeisterten.</p>
    <a href="buchungschach.php" class="btn btn-primary">Mehr Info!</a>
  </div>
</div>
</div>
    
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
