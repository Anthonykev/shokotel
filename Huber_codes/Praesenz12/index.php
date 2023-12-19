<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
	<div class="container">
		<div class="row">
			<h1 class="d-block d-sm-none">Das ist der Text statt dem Bild</h1>
			<img src="platz.jpg" alt="Das ist ein Platz" class="w-100 d-none d-sm-block" />
		</div>
		<div class="row">
			<div class="col"><a href="index.php?includepart=1">Seite mit Part 1</a></div>
			<div class="col"><a href="index.php?includepart=2">Seite mit Part 2</a></div>
			<div class="col"><a href="index.php?includepart">Seite ohne Part</a></div>
		</div>
		<div class="row">
			<div class="col">
				<form action="index.php" enctype="multipart/form-data" method="post">
					<input name="username" value="<?php if (isset($_POST["username"])) echo $_POST["username"]; ?>" />
					<input name="password" type="password"/>
					<input type="file" name="picture" accept="image/jpeg">
					<input type="submit" />
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-3">Das ist meine erste Spalte</div>
			<div class="col-12 col-sm-6">Das ist meine zweite Spalte</div>
			<div class="col-12 col-sm-3">Das ist meine dritte Spalte</div>
		</div>
		<?php
			session_start();

			if(isset($_FILES["picture"]))
			{
				if($_FILES["picture"]["type"] == "image/jpeg")
				{
					$destination = getcwd(). "\uploads\\" . uniqid() . "_" . $_FILES["picture"]["name"];
					move_uploaded_file($_FILES["picture"]["tmp_name"], $destination);
				} 
				else
				{
					echo "Der Dateityp wird nicht unterstützt.";
				}
			}

			if(isset($_POST["username"]) && isset($_POST["password"]))
			{
				if($_POST["username"] == $_POST["password"])
				{
					// Login erfolgreich
					$_SESSION["usernameSession"] = $_POST["username"];
				} 
				else 
				{
					// Login nicht erfolgreich
					echo "Schleich dich!";
				}
			}

			// Ausgabe von angemeldetem Benutzer immer, wenn dieser in der Session gesetzt ist
			if (isset($_SESSION["usernameSession"])){
				echo "Angemeldet als: " . $_SESSION["usernameSession"];
			}

			if (!isset($_GET["includepart"]) && isset($_COOKIE["includepartCookie"]))
			{
				$_GET["includepart"] = $_COOKIE["includepartCookie"];
			}

			if(isset($_GET["includepart"]))
			{
				setcookie("includepartCookie", $_GET["includepart"], time()+3600);

				if ($_GET["includepart"] == "1")
				{
					include("part1.php");
				} 
				else if ($_GET["includepart"] == "2")
				{
					include("part2.php");
				}
			}  
		?>
	</div>
  </body>
</html>