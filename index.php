<?php

include "pdo.php";

$btn = $_POST["btn"];

if (isset($btn)) {
    
    $sth = "SELECT * FROM sample WHERE name = :name";
    // TODO: Remplir input
    $select = $dbh->prepare($sth);
    $select->bindParam(":name", $valid_donnees($_POST["name"]));
    $select->execute();
}
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