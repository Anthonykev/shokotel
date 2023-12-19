<p>Das kommt aus dem Teil 2!</p>

<?php
    require("db.php");

    $sql = "INSERT INTO `person` (`Vorname`, `Nachname`) VALUES (?, ?)";
    $stmt = $db_obj->prepare($sql);
    $stmt-> bind_param("ss", $vorname, $nachname);
	
    $vorname = "Sheldon"; $nachname = "Cooper";
    $stmt->execute();
    $vorname = "aaaa"; $nachname = "bbbb";
    $stmt->execute();
?>