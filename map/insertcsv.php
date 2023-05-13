<?php

function csv()
{
    include "pdo.php";
    $csvFile = fopen("Data_2022.csv", "r");
    $lineCount = 0;

    while (($data = fgetcsv($csvFile, 10240, ",")) !== FALSE) {
        

        if ($lineCount > 1) {


            $explodedate = explode('/', $data[2]);
            for ($i=0; $i < count($explodedate); $i++) { 
                $newDate = $explodedate[2] . "-" . $explodedate[1] . "-" . $explodedate[0];
            }
            // Insérer les données de l'échantillon
            $env = $dbh->prepare("INSERT INTO Sample_DATA VALUES (:Sample, :Sea, :Start_Date, :Start_Time)");
            $env->bindParam(":Sample", $data[0]);
            $env->bindParam(":Sea", $data[1]);
            $env->bindParam(":Start_Date", $newDate);
            $env->bindParam(":Start_Time", $data[3]);
            $env->execute();

            // Insérer les données GPS
            $envGps = $dbh->prepare("INSERT INTO Gps VALUES (:start_latitude, :start_longitude, :mid_latitude, :mid_longitude, :end_latitude, :end_longitude, :Sample)");
            $envGps->bindParam(":start_latitude", $data[4]);
            $envGps->bindParam(":start_longitude", $data[5]);
            $envGps->bindParam(":mid_latitude", $data[6]);
            $envGps->bindParam(":mid_longitude", $data[7]);
            $envGps->bindParam(":end_latitude", $data[8]);
            $envGps->bindParam(":end_longitude", $data[9]);
            $envGps->bindParam(":Sample", $data[0]);
            $envGps->execute();
            
            // Insérer les données de navigation
            $envNav = $dbh->prepare("INSERT INTO Navigation VALUES ( :wind_force,  :wind_direction, :wind_speed, :sea_state, :water_temperature, :Sample)");
            $envNav->bindParam(":wind_force", $data[10]);
            $envNav->bindParam(":wind_direction", $data[12]);
            $envNav->bindParam(":wind_speed", $data[11]);
            $envNav->bindParam(":sea_state", $data[13]);
            $envNav->bindParam(":water_temperature", $data[14]);
            $envNav->bindParam(":Sample", $data[0]);
            $envNav->execute();


            // Insérer les données de surface
            $envSur = $dbh->prepare("INSERT INTO Surface VALUES ( :boat_speed, :start_flowmeter, :end_flowmeter, :filtered_volume, :filtered_distance, :filtered_surface,:filtered_surface, fil :comments, :Sample)");
            $envSur->bindParam(":boat_speed", $data[15]);
            $envSur->bindParam(":start_flowmeter", $data[16]);
            $envSur->bindParam(":end_flowmeter", $data[17]);
            $envSur->bindParam(":filtered_volume", $data[18]);
            $envSur->bindParam(":filtered_distance", $data[19]);
            $envSur->bindParam(":filtered_surface", $data[20]);
            $envSur->bindParam(":comments", $data[21]);
            $envSur->bindParam(":Sample", $data[0]);
            $envSur->execute();
        }
        $lineCount++;
    }

    fclose($csvFile);

    $csvFileTri = fopen("Data_2022_tri.csv", "r");
    $lineCount1 = 0;

    while (($data1 = fgetcsv($csvFileTri, 10240, ",")) !== FALSE) {
        $lineCount1++;

        if ($lineCount1 > 1) {

            $lineCount1 = 0;
            $csvFileTri = fopen("tri.csv", "r");
            while (($data1 = fgetcsv($csvFileTri, 10240, ",")) !== FALSE) {
                $lineCount1++;
        
                if ($lineCount1 > 1) {
        
                    $envSur = $dbh->prepare("INSERT INTO Tri VALUES ( :size, :type, :color, :number, :Sample");
                    $envSur->bindParam(":size", $data1[1]);
                    $envSur->bindParam(":type", $data1[2]);
                    $envSur->bindParam(":color", $data1[3]);
                    $envSur->bindParam(":number", $data1[4]);
                    $envSur->bindParam(":Sample", $data1[0]);
                    $envSur->execute();
                }
            }
        }

    }

    fclose($csvFileTri);


}

csv();

?>

