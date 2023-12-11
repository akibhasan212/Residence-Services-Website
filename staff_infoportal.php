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
    
    $query = "SELECT * FROM POSTS"; // Replace 'your_table' with your table name
    $result = sqlsrv_query($conn, $query);
      if ($result) {
                // Display fetched data
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $Post_ID = $row['Post_ID'];
                
                   
                };
          $Post_ID = $Post_ID +1;
  
            } else {
                echo "Error fetching data: " . mysqli_error($connection);
            }
    
    $current_time = date("H:i:s");
}
    ?>
    <h1> Make an Event </h1>   
    
    <form action="make_post.php" method="post">
      <input type="hidden" value=<?php echo $Post_ID ?> id="Post_ID" name="Post_ID"><br>
      <input type="hidden" value=<?php echo $current_time ?> id="Time" name="Time"><br>
      <label for="Post">POST:</label><br>
      <input type="text" id="Post" name="Post" required><br><br>
      <input type="hidden" value=<?php echo $ID ?> id="Staff_SSN" name="Staff_SSN"><br><br>
    
 
          
      <input type="submit" value="Submit Request"><br>
    </form>
    
    
    
    
    
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
     $query = "SELECT * FROM POSTS"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query);;

           
            // Display table header
            echo "<table><tr><th>Post ID</th><th>Description</th></tr>";
            
            
            // Fetch and display each row of data
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
               
                
                echo "<tr><td>" . $row['Post_ID'] . "</td><td>" . $row['Description'] . "</td></tr>";
            }
     echo "</table>";
    ?>



</body>     
</html>