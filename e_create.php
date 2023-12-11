
<?php

$Event_id = $_POST["Event_id"];
$Name = $_POST["Name"];
$Description = $_POST["Description"];
$Start_time = $_POST["Start_time"];
$End_time = $_POST["End_time"];
$Organiser_ID = $_POST["Organiser_ID"];



$database="Residence_Database";
$serverName="LAPTOP-IPKRRTGH";
$uid="";
$pass="";
// Create connection
$connection = ["Database"=>$database,
        "Uid"=> $uid,
        "PWD"=>$pass];
$conn= sqlsrv_connect($serverName,$connection);
//echo "Connected successfully";
if(!$conn)
    die(print_r(sqlsrv_errors(),true));
else
    echo 'connection established';
//
//// Check connection
//if (mysqli_connect_errno())
//  {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//  }
//  
$params = array($Event_id,$Name, $Description, $Start_time, $End_time, $Organiser_ID);
$sql = "INSERT INTO EVENTS (Event_ID,Name,Description, Start_time, End_time, Organiser_ID) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "New record created successfully";
}

sqlsrv_close($conn);
?>

