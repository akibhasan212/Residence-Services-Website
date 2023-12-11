<!DOCTYPE html>   
<html>   
<head>  
<title> Resident Directory </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #cedfd9;  
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
     <h1> Resident Directory</h1>   
    
     
      
    
       
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

// Replace this with your actual query
            $params = array($name, $password);
            $query = "SELECT * FROM RESIDENT"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query, $params);;

           
            // Display table header
            echo "<table><tr><th>Student ID</th><th>Name</th><th>DOB</th><th>Room #</th></tr>";
            
            
            // Fetch and display each row of data
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
             $dateString = $row['DOB']->format('Y-m-d');
                echo "<tr><td>" . $row['Student_ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $dateString . "</td><td>". $row['Assigned_Room'] ."</td></tr>";
            }

            echo "</table>";
      


?>