<!--
    myProfile page for students
-->

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
                    $dateString = $row['DOB']->format('Y-m-d');
                   $full_name = $row['Name'];
                    $Department = $row['Department'];
                    $Contact = $row['Contact'];
                    // Display other columns as needed
                }
            } else {
                echo "Error fetching data: " . mysqli_error($connection);
            }
}
?>


<!DOCTYPE html>   
<html>   
<head>  
<title> My Profile </title>  
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
         
 .infoBox{   
        padding: 20px ;   
        background-color: rgb(144, 194, 210);  
        border: 2px solid white; 
        width: 30%;   
        margin: 8px 0;  
 }  

p.big {
  line-height: 1.8;
}
</style>   
</head>    
<body>    
     <h1> My Profile</h1>  
     
     <div class="infoBox"> 

        <p class="big">
            <b> Name: </b>
            <?php echo $full_name; ?> </br>

            <b> Department </b>
            <?php echo $Department; ?> </br>

            <b> Date of Birth: </b>
            <?php echo $dateString; ?></br>

            <b> Contact: </b>
            <?php echo $Contact; ?> </br>

        </p>

     </div>
    
    
       
</body>     
</html>