<?php

include "pdo.php";

// $btn = $_POST["btn"];

function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

    $Sample = valid_donnees($_POST["Sample"]);
    $Sea = valid_donnees($_POST["Sea"]);
    $date = valid_donnees($_POST["date"]);
    $stratertime = valid_donnees($_POST["startertime"]);

    
    $sth = "INSERT INTO Sample_DATA VALUES (:Sample, :Sea, :Start_date, :Start_time)";
    // TODO: Remplir input
    $select = $dbh->prepare($sth);
    $select->bindParam(":Sample", $Sample);
    $select->bindParam(":Sea", $Sea);
    $select->bindParam(":Start_date", $date);
    $select->bindParam(":Start_time", $stratertime);
    $select->execute();

    $sth2 = "INSERT INTO Gps VALUES (:Sample, :Sea, :Start_date, :Start_time)";
    // TODO: Remplir input
    $select = $dbh->prepare($sth);
    $select->bindParam(":Sample", $Sample);
    $select->bindParam(":Sea", $Sea);
    $select->bindParam(":Start_date", $date);
    $select->bindParam(":Start_time", $stratertime);
    $select->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <label for="">Name</label>
        <input type="text" name="name">
        <button name="btn" type="submit">Envoyer</button>

    </form>
</body>

</html>