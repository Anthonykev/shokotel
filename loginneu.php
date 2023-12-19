<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--Fehlende Höheneigenschaft für den Body height: 100vh;100% der Bildschirmhöhe einnimmt-->
    <style>
        body {
            height: 100vh;
            background-color: #f0f0f0;
        }
    </style>
</head>
  <body class="text-center d-flex justify-content-center align-items-center"> 
    <div class="container mx-auto">
        <main class="form-signin">
            <form action="login.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Anmeldung</h1>
                <div class="form-floating">
                    <input type="text" id="username" class="form-control" placeholder="Benutzername">
                    <label for="username">Benutzername</label>
                </div>
                <div class="form-floating">
                    <input type="password" id="password" class="form-control" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="keinRobo">
                        Kein Roboter
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-secondary" type="submit">Anmelden</button>
            </form>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
