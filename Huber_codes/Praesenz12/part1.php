<p>Das kommt aus dem Teil 1!</p>

<?php
    require("db.php");

    $sql = "SELECT Vorname, Nachname FROM person";
    $result = $db_obj->query($sql);

    echo "<ul>";

    while ($row = $result->fetch_array()) 
    { 
        echo "<li>" . $row['Vorname'] . " " . $row['Nachname'] . "</li>";
    }

    echo "</ul>";
?>