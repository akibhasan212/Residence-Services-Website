<?php
// Assuming you have a database connection established
$database="Residence_Database";
        $serverName="LAPTOP-IPKRRTGH";
        $uid="";
        $pass="";
        // Create connection
        $connection = ["Database"=>$database,
                "Uid"=> $uid,
                "PWD"=>$pass];
        $conn= sqlsrv_connect($serverName,$connection);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data sent via AJAX
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $UCID = $_POST['UCID'];
    $EventID = $_POST['EventID'];

    // SQL query to insert data
    $sql = "INSERT INTO EVENT_ATTENDER (AttendeeID, EID) VALUES (?, ?)";
    $params = array($UCID, $EventID);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Data added successfully!";
    }

    sqlsrv_free_stmt($stmt);
}

// Close connection
sqlsrv_close($conn);
?>
