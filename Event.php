<!DOCTYPE html>   
<html>   
<head>  
<title> Events </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #cedfd9;  
}  
button {   
  background-color: #929885e5;   
  width: 75%;  
  color: black;   
  padding: 15px;   
  margin: 10px 20px;   
  border: 2px solid #575b4f; 
}

table, th, td {
  border: 1px solid #575b4f;
  text-align: center;
}
 
</style>   
</head>    
<body>    
     <h1> Events </h1>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    


</body>     
</html>

<?php 



            $name = $_POST['name'];
    $password = $_POST['password'];

        $database="Residence_Database";
        $serverName="LAPTOP-IPKRRTGH";
        $uid="";
        $pass="";
        // Create connection
        $connection = ["Database"=>$database,
                "Uid"=> $uid,
                "PWD"=>$pass];
        $conn= sqlsrv_connect($serverName,$connection);

        $params = array($name, $password);
        $query = "SELECT * FROM RESIDENT WHERE Username = ? AND Password = ?"; // Replace 'your_table' with your table name
        $result = sqlsrv_query($conn, $query, $params);;
          if ($result) {
                    // Display fetched data
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        $UCID = $row['Student_ID'];
                        // Display other columns as needed
                    }
                }

// Replace this with your actual query
           
            $query = "SELECT * FROM EVENTS"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query, $params);;

           
            // Display table header
            echo "<table><tr><th>Name</th><th>Description</th><th>Start Time</th><th>End Time</th><th>Registration</th></tr>";
            
            
            // Fetch and display each row of data
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                 $dateString = $row['Start_time']->format('H:i:s');
                $dateString2 = $row['End_time']->format('H:i:s');
                $eid = $row['Event_ID'];
                $uniqueID = 'registerButton_' . $eid;
             
                echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Description'] . "</td><td>" . $dateString . "</td><td>".$dateString2."</td><td><button id='$uniqueID' onclick='registerEvent(\"$eid\", $UCID)'>Register!</button></td></tr>";
            }

            echo "</table>";



    
      


?>

<script>
    function registerEvent(eid, UCID) {
        // Send the EventID to Register.php using AJAX
        $.ajax({
            type: "POST",
            url: "Register.php", // PHP script handling the database operation
            data: { EventID:eid, UCID: UCID}, // Data to be sent to the PHP script
            success: function(response) {
                console.log(response); // Log the response from the PHP script
                alert("Data added successfully!"); // Show an alert on success
            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors
                alert("Error occurred while adding data."); // Show an alert on error
            }
        });
    }
</script>
