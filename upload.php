<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>

<body>

    <?php require_once("nav.php") ?>

    <div class="container mt-1 d-flex justify-content-center align-items-center" style=" padding-top: 0px; background-color: #666; color: #fff; box-shadow: 0px 0px 10px 0px #000;">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="text-center">
                <h2 class="display-4">Upload</h2>
                <p class="lead">Hier können sie Ihre Bilderuploaden </p>
                <a href="index.php" class="btn btn-light btn-lg btn-hover-dark">Zurück zur Startseite!</a>
            </div>
        </div>
    </div>
</div>

<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="container mt-1 d-flex justify-content-center align-items-center" style=" padding-top: 0px; background-color: #666; color: #fff; box-shadow: 0px 0px 10px 0px #000;">
        
            <div class="menu">
            <label for="fileUpload">Wählen Sie ein Bild aus(dateiname.jpg):</label>
            <input type="file" id="fileUpload" name="fileUpload">
            </div>
            
            <button class="btn btn-light btn-sm btn-hover-dark" type="submit" name="submit" value="Upload">Upload</button>
        </div>

    </form>

    
<?php 
    if(isset($_POST["submit"])){
        $targetDirectory ='uploads/';
        $fileName = basename($_FILES["fileUpload"]["name"]);
        $targetPath = $targetDirectory . $fileName;
        $uploadValid = 0;
        
        $imgProps = getimagesize($_FILES["fileUpload"]["tmp_name"]);
        if($imgProps != false){
            echo "Die Datei ist ein Bild: " . $imgProps["mime"];
            $uploadValid = 1;
        }else{
            echo "Die Datei ist kein Bild";
            $uploadValid = 0;
        }
        echo "<br>";

        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if($fileType != "jpg" ){
            echo"Es sind nur JPG Datein zugelassen!!!";
            echo "<br>";
            $uploadValid=0;
        }
        
        if($uploadValid == 0){
            echo "Ihre Datei konnte leider nicht hochgeladen werden";
        }else{
            if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetPath)){
                echo "Die Datei ". htmlspecialchars( $fileName). " wurde erfolgreich hochgeladen!";
            }else{
                echo "Es tut uns leid, es gab ein Problem bei dem Hochladen Ihrer Datei!";
            }
        }
        echo "<br>";
        
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>