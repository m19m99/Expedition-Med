<?php
include 'pdo.php';

$sth = "SELECT mid_latitude, mid_longitude FROM Gps";
// 
$select = $dbh->prepare($sth);
$select->execute();

$datas = $select->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datas, true);

?>