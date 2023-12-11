<!DOCTYPE html>   
<html>   
<head>  
<title> Staff Page </title>  
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
    
    
    
        <?php
        isset($_GET['name']) && isset($_GET['password']);
        $name = $_GET['name'];
        $password = $_GET['password'];
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
            $query = "SELECT * FROM STAFF WHERE Username = ? AND Password = ?"; // Replace 'your_table' with your table name
            $result = sqlsrv_query($conn, $query, $params);;

            if ($result) {
                // Display fetched data
                echo "<h2>Displaying Data:</h2>";
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $dateString = $row['DOB']->format('Y-m-d');
                    echo "ID: " . $row['SSN'] . " - Name: " . $row['Name'] ."-DOB: ".$dateString."-Department".$row['Department']. "<br>";
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
    
    <script>
        function Open_Profile() {
            var name = "<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>";
            var password = "<?php echo isset($_GET['password']) ? $_GET['password'] : ''; ?>";

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "Staff_Profile.php");

            var inputName = document.createElement("input");
            inputName.setAttribute("type", "hidden");
            inputName.setAttribute("name", "name");
            inputName.setAttribute("value", name);
            form.appendChild(inputName);

            var inputPassword = document.createElement("input");
            inputPassword.setAttribute("type", "hidden");
            inputPassword.setAttribute("name", "password");
            inputPassword.setAttribute("value", password);
            form.appendChild(inputPassword);

            document.body.appendChild(form);
            form.submit();

            // Open otherPage.php in a new tab/window
      
        }
        
        function room_book(){
             var name = "<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>";
            var password = "<?php echo isset($_GET['password']) ? $_GET['password'] : ''; ?>";

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "Room_Booking.php");

            var inputName = document.createElement("input");
            inputName.setAttribute("type", "hidden");
            inputName.setAttribute("name", "name");
            inputName.setAttribute("value", name);
            form.appendChild(inputName);

            var inputPassword = document.createElement("input");
            inputPassword.setAttribute("type", "hidden");
            inputPassword.setAttribute("name", "password");
            inputPassword.setAttribute("value", password);
            form.appendChild(inputPassword);

            document.body.appendChild(form);
            form.submit();
  
        }
        
         function resident(){
             var name = "<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>";
            var password = "<?php echo isset($_GET['password']) ? $_GET['password'] : ''; ?>";

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "res_dir.php");

            var inputName = document.createElement("input");
            inputName.setAttribute("type", "hidden");
            inputName.setAttribute("name", "name");
            inputName.setAttribute("value", name);
            form.appendChild(inputName);

            var inputPassword = document.createElement("input");
            inputPassword.setAttribute("type", "hidden");
            inputPassword.setAttribute("name", "password");
            inputPassword.setAttribute("value", password);
            form.appendChild(inputPassword);

            document.body.appendChild(form);
            form.submit();
           
        }
        
        function event_make(){
             var name = "<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>";
            var password = "<?php echo isset($_GET['password']) ? $_GET['password'] : ''; ?>";

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "make_event.php");

            var inputName = document.createElement("input");
            inputName.setAttribute("type", "hidden");
            inputName.setAttribute("name", "name");
            inputName.setAttribute("value", name);
            form.appendChild(inputName);

            var inputPassword = document.createElement("input");
            inputPassword.setAttribute("type", "hidden");
            inputPassword.setAttribute("name", "password");
            inputPassword.setAttribute("value", password);
            form.appendChild(inputPassword);

            document.body.appendChild(form);
            form.submit();
        
        }
        function vend(){
             var name = "<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>";
            var password = "<?php echo isset($_GET['password']) ? $_GET['password'] : ''; ?>";

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "vendingMachine.php");

            var inputName = document.createElement("input");
            inputName.setAttribute("type", "hidden");
            inputName.setAttribute("name", "name");
            inputName.setAttribute("value", name);
            form.appendChild(inputName);

            var inputPassword = document.createElement("input");
            inputPassword.setAttribute("type", "hidden");
            inputPassword.setAttribute("name", "password");
            inputPassword.setAttribute("value", password);
            form.appendChild(inputPassword);

            document.body.appendChild(form);
            form.submit();
        }
        
        function portal_req(){
             var name = "<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>";
            var password = "<?php echo isset($_GET['password']) ? $_GET['password'] : ''; ?>";

            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "staff_infoportal.php");

            var inputName = document.createElement("input");
            inputName.setAttribute("type", "hidden");
            inputName.setAttribute("name", "name");
            inputName.setAttribute("value", name);
            form.appendChild(inputName);

            var inputPassword = document.createElement("input");
            inputPassword.setAttribute("type", "hidden");
            inputPassword.setAttribute("name", "password");
            inputPassword.setAttribute("value", password);
            form.appendChild(inputPassword);

            document.body.appendChild(form);
            form.submit();
        }
        
    </script>
    
    
        
     <h1> Hello,<?php echo $name; ?>! </h1>   
    
        <div class="options">   
        
            <button onclick="Open_Profile()">Profile</button>   <br> 
            
            <button onclick="resident()">Resident Directory</button>   <br></a>

      
            <button onclick="room_book()" >Room Booking</button>   <br></a>

    
            <button onclick="event_make()">Events</button>  <br></a>

        
            <button onclick="portal_req()">Information Portal</button>   <br></a>

            
            <button onclick="vend()">Vending Machine</button> <br>  </a>
                
          
        </div>   
    
    
    

       
</body>     
</html>