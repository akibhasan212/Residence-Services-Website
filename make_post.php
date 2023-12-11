
<?php

$Post_ID = $_POST["Post_ID"];
$Time = $_POST["Time"];
$Description = $_POST["Post"];
$Staff_SSN = $_POST["Staff_SSN"];



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
$params = array($Post_ID,$Time, $Staff_SSN, $Description);
$sql = "INSERT INTO POSTS (Post_ID,Time,Staff_SSN, Description) VALUES (?, ?, ?, ?)";
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "New record created successfully";
}

sqlsrv_close($conn);
?>

