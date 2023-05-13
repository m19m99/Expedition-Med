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
$startertime = valid_donnees($_POST["startertime"]);


$sth = "INSERT INTO Sample_DATA VALUES (:Sample, :Sea, :Start_date, :Start_time)";
// 
$select = $dbh->prepare($sth);
$select->bindParam(":Sample", $Sample);
$select->bindParam(":Sea", $Sea);
$select->bindParam(":Start_date", $date);
$select->bindParam(":Start_time", $startertime);
$select->execute();


// $Sample = valid_donnees($_POST["Sample"]);
$st_laltitude = valid_donnees($_POST["stlatitude"]);
$st_longitude = valid_donnees($_POST["stlongitude"]);
$md_laltitude = valid_donnees($_POST["mdlatitude"]);
$md_longitude = valid_donnees($_POST["mdlongitude"]);
$end_laltitude = valid_donnees($_POST["endlatitude"]);
$end_longitude = valid_donnees($_POST["endlongitude"]);


$sth2 = "INSERT INTO Gps (start_latitude, start_longitude, mid_latitude, mid_longitude, end_latitude, end_longitude, Sample) VALUES  (:start_latitude, :start_longitude, :mid_latitude, :mid_longitude, :end_latitude, :end_longitude, :Sample)";


    $select = $dbh->prepare($sth2);
    $select->bindParam(":start_latitude", $st_laltitude);
    $select->bindParam(":start_longitude", $st_longitude);
    $select->bindParam(":mid_latitude", $md_laltitude);
    $select->bindParam(":mid_longitude", $md_longitude);
    $select->bindParam(":end_latitude", $end_laltitude);
    $select->bindParam(":end_longitude", $end_longitude);
    $select->bindParam(":Sample", $Sample);
    $select->execute();


    $sth2 = "INSERT INTO Gps (start_latitude, start_longitude, mid_latitude, mid_longitude, end_latitude, end_longitude, Sample) VALUES  (:start_latitude, :start_longitude, :mid_latitude, :mid_longitude, :end_latitude, :end_longitude, :Sample)";


    $select = $dbh->prepare($sth2);
    $select->bindParam(":start_latitude", $st_laltitude);
    $select->bindParam(":start_longitude", $st_longitude);
    $select->bindParam(":mid_latitude", $md_laltitude);
    $select->bindParam(":mid_longitude", $md_longitude);
    $select->bindParam(":end_latitude", $end_laltitude);
    $select->bindParam(":end_longitude", $end_longitude);
    $select->bindParam(":Sample", $Sample);
    $select->execute();

    $windforce = valid_donnees($_POST["Windforce"]);
    $winddirection = valid_donnees($_POST["winddirection"]);
    $winspeed = valid_donnees($_POST["winspeed"]);
    $Seastate = valid_donnees($_POST["Seastate"]);
    $watertemperature = valid_donnees($_POST["watertemperature"]);


    $sth3 = "INSERT INTO Navigation (wind_force, wind_direction, wind_speed, sea_state, water_temperature, Sample) VALUES  (:wind_force, :wind_direction, :wind_speed, :sea_state, :water_temperature, :Sample)";

    

    $select = $dbh->prepare($sth3);
    $select->bindParam(":wind_force", $windforce);
    $select->bindParam(":wind_direction", $winddirection);
    $select->bindParam(":wind_speed", $winspeed);
    $select->bindParam(":sea_state", $Seastate);
    $select->bindParam(":water_temperature", $watertemperature);
    $select->bindParam(":Sample", $Sample);
    $select->execute();


    //STH4

    $boatspeed = valid_donnees($_POST["boatspeed"]);
    $Startflowmeter = valid_donnees($_POST["Startflowmeter"]);
    $Endflowmeter = valid_donnees($_POST["Endflowmeter"]);
    $Filteredvolume = valid_donnees($_POST["Filteredvolume"]);
    $Filtereddistance = valid_donnees($_POST["Filtereddistance"]);
    $Filteredsurface = valid_donnees($_POST["Filteredsurface"]);
    $Comment = valid_donnees($_POST["Comment"]);


    $sth4 = "INSERT INTO Surface (boat_speed, start_flowmeter, end_flowmeter, filtered_volume, filtered_distance, filtered_surface, comments, Sample) VALUES  (:boat_speed, :start_flowmeter, :end_flowmeter, :filtered_volume, :filtered_distance, :filtered_surface, :comments, :Sample)";

    

    $select = $dbh->prepare($sth4);
    $select->bindParam(":boat_speed", $boatspeed);
    $select->bindParam(":start_flowmeter", $Startflowmeter);
    $select->bindParam(":end_flowmeter", $Endflowmeter);
    $select->bindParam(":filtered_volume", $Filteredvolume);
    $select->bindParam(":filtered_distance", $Filtereddistance);
    $select->bindParam(":filtered_surface", $Filteredsurface);
    $select->bindParam(":comments", $Comment);
    $select->bindParam(":Sample", $Sample);
    $select->execute();  
    
    //STH5

    $size = valid_donnees($_POST["size"]);
    $type = valid_donnees($_POST["type"]);
    $color = valid_donnees($_POST["color"]);
    $number = valid_donnees($_POST["number"]);


    $sth5 = "INSERT INTO Tri (size, type, color, number, Sample) VALUES (:size, :type, :color, :number, :Sample)";



    $select = $dbh->prepare($sth5);
    $select->bindParam(":size", $size);
    $select->bindParam(":type", $type);
    $select->bindParam(":color", $color);
    $select->bindParam(":number", $number);
    $select->bindParam(":Sample", $Sample);
    $select->execute();  

    header("location: /index.html");
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