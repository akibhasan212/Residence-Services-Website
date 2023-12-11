

<!DOCTYPE html>   
<html>   
<head>  

    
   <title>Display Data</title>
    <style>
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
    
    

 
</style>   
</head>    
<body>    
     <h1> Room Bookings </h1>   
   
    
    
       
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
        
        
        if (isset($_POST['display_data'])) {
            // Code to fetch data from the database
            // Replace this with your actual query
            $params = array($name, $password);
            $query = "SELECT * FROM BOOKING"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query, $params);;

            if ($result->rowCount() > 0) {
            // Display table header
            echo "<table><tr><th>Booking ID</th><th>Start</th><th>End</th><th>Student ID</th><th>Staff ID</th><th>Room#</th></tr>";
            
            
            // Fetch and display each row of data
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                echo "<tr><td>" . $row['Booking#'] . "</td><td>" . $row['Start_time'] . "</td><td>" . $row['End_time'] . "</td><td>" . $row['StudentID'] . "</td><td>" . $row['StaffID'] . "</td><td>" . $row['Room#'] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "No records found";
        }
        }

        // Check if the "Back" button is clicked
        if (isset($_POST['back'])) {
            // Clear any displayed data and redirect back to the main menu or do something else
            header("Location: menu.php?name=$name&password=$password");
            exit();
        }
        ?>
<?php 


// Replace this with your actual query
            $params = array($name, $password);
            $query = "SELECT * FROM BOOKING"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query, $params);;

           
            // Display table header
            echo "<table><tr><th>Booking ID</th><th>Start</th><th>End</th><th>Student ID</th><th>Staff ID</th><th>Room#</th></tr>";
            
            
            // Fetch and display each row of data
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $dateString = $row['Start_time']->format('H:i:s');
                $dateString2 = $row['End_time']->format('H:i:s');
                
                echo "<tr><td>" . $row['Booking#'] . "</td><td>" . $dateString . "</td><td>" . $dateString2 . "</td><td>" . $row['StudentID'] . "</td><td>" . $row['StaffID'] . "</td><td>" . $row['Room#'] . "</td></tr>";
            }

            echo "</table>";
      


?>

