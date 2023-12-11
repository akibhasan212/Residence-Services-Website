
<?php

$name = $_POST["username"];
$email = $_POST["password"];

echo $name. "<br>". $email. "<br>";

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
$params = array($name, $email);

$tsql = "SELECT * FROM Student_users WHERE Name = ? AND Password = ?";
$stmt = sqlsrv_query($conn, $tsql, $params);

if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Check if the query returned any rows
    if (sqlsrv_has_rows($stmt)) {
        // If login credentials are correct, redirect to a new page
        header("Location: StudentPage.php?name=$name&password=$email");
        exit();
    } else {
        // If login credentials are incorrect, display an error message
        echo "Invalid username or password";
    }

sqlsrv_free_stmt($stmt);


sqlsrv_close($conn);
?>

