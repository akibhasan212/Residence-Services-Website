<!DOCTYPE html>   
<html>   
<head>  
<title> Information Portal </title>  
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
     <h1> Information Portal </h1> 
    
    
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