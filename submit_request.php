
<?php

$id = $_POST["requester_id"];
$type = $_POST["req_type"];
$room = $_POST["room_no"];
$status = "In progress";

$currentDate = date("Y-m-d");


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
$params = array($id,$currentDate, $status, $type, $room);
$sql = "INSERT INTO MAINTENANCE_REQUEST (Req_ID,Req_Date,Status, Req_Type, Room_no) VALUES (?, ?, ?, ?, ?)";
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "New record created successfully";
}

sqlsrv_close($conn);
?>

