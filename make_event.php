<!DOCTYPE html>   
<html>   
<head>  
<title> Make Event </title>  
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
    
    
    <?php
if(isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Process the data or perform any actions needed with $name and $password
    // For example:
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
    
    //
    //// Check connection
    //if (mysqli_connect_errno())
    //  {
    //  echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //  }
    //  
    $params = array($name, $password);
    $query = "SELECT * FROM STAFF WHERE Username = ? AND Password = ?"; // Replace 'your_table' with your table name
    $result = sqlsrv_query($conn, $query, $params);;
      if ($result) {
                // Display fetched data
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $ID = $row['SSN'];
                
                   
                }
            } else {
                echo "Error fetching data: " . mysqli_error($connection);
            }
    $query = "SELECT * FROM EVENTS"; // Replace 'your_table' with your table name
    $result = sqlsrv_query($conn, $query);
      if ($result) {
                // Display fetched data
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $Event_ID = $row['Event_ID'];
                
                   
                    
                };
                $Event_ID = $Event_ID+1;
            } else {
                echo "Error fetching data: " . mysqli_error($connection);
            }
}

    ?>
    <h1> Make an Event </h1>   
    
    <form action="e_create.php" method="post">
      <input type="hidden" value="<?php echo $Event_ID ?>" id="Event_id" name="Event_id" ><br>
      <label for="Name">Name:</label><br>
      <input type="text" id="Name" name="Name" required><br>
      <label for="Description">Description:</label><br>
      <input type="text" id="Description" name="Description" required><br><br>
      <label for="Start_time">Start:</label><br>
      <input type="time" id="Start_time" name="Start_time" required><br><br>
      <label for="End_time">End:</label><br>
      <input type="time" id="End_time" name="End_time" required><br><br>
      <input type="hidden" value=<?php echo $ID?> id="Organiser_ID" name="Organiser_ID" ><br>
          
      <input type="submit" value="Submit Request"><br>
    </form>



</body>     
</html>