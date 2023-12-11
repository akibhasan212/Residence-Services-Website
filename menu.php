<html>

    <body>
        
        
        <p1>Hello</p1>
        <?php
        isset($_GET['name']) && isset($_GET['password']);
        $name = $_GET['name'];
        $password = $_GET['password'];
        echo "$name<br>";
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
            $query = "SELECT * FROM RESIDENT WHERE Username = ? AND Password = ?"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query, $params);;

            if ($result) {
                // Display fetched data
                echo "<h2>Displaying Data:</h2>";
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $dateString = $row['DOB']->format('Y-m-d');
                    echo "ID: " . $row['Student_ID'] . " - Name: " . $row['Name'] ."-DOB: ".$dateString."-Room".$row['Assigned_Room']. "<br>";
                    // Display other columns as needed
                }
            } else {
                echo "Error fetching data: " . mysqli_error($connection);
            }
        }

        // Check if the "Back" button is clicked
        if (isset($_POST['back'])) {
            // Clear any displayed data and redirect back to the main menu or do something else
            header("Location: menu.php?name=$name&password=$password");
            exit();
        }
        ?>
        
        <form method="post">
        <input type="submit" name="display_data" value="Display Data">
        <br><br>
        <!-- Back button to return to the main menu -->
        <input type="submit" name="back" value="Back to Menu">
        </form>
    
    
    </body>



</html>