<!DOCTYPE html>   
<html>   
<head>  
<title> Maintanence Requests </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #cedfd9;  
}  
button {   
       background-color: #929885e5;   
       width: 12%;  
        color: black;   
        padding: 15px;   
        margin: 10px 20px;   
        border: 2px solid #575b4f; 
         }   
 
    

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

</style>   
</head>    
<body>    
    <h1> Maintanence Requests </h1>   
    
    <h2>Create a Maintanence Request</h2>
    <form action="submit_request.php" method="post">
      <label for="requester_id">Requester ID:</label><br>
      <input type="text" id="requester_id" name="requester_id" required><br>
      <label for="req_type">Request Type:</label><br>
      <input type="text" id="req_type" name="req_type" required><br>
      <label for="room_no">Room Number:</label><br>
      <input type="text" id="room_no" name="room_no" required><br><br>
      <input type="submit" value="Submit Request">
    </form>

    <h2>Existing Requests and Status</h2>
    
    <?php
    
$database="Residence_Database";
$serverName="LAPTOP-IPKRRTGH";
$uid="";
$pass="";
// Create connection
$connection = ["Database"=>$database,
        "Uid"=> $uid,
        "PWD"=>$pass];
$conn= sqlsrv_connect($serverName,$connection);
     $query = "SELECT * FROM MAINTENANCE_REQUEST"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query);;

           
            // Display table header
            echo "<table><tr><th>Request ID</th><th>Status</th><th>Room#</th></tr>";
            
            
            // Fetch and display each row of data
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
               
                
                echo "<tr><td>" . $row['Req_ID'] . "</td><td>" . $row['Status'] . "</td><td>" . $row['Room_no'] . "</td></tr>";
            }
     echo "</table>";
    ?>
          
    <div id="request-status">
    </div>
</body>     
</html>