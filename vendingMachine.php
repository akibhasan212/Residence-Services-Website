<!DOCTYPE html>   
<html>   
<head>  
<title> Vending Machines </title>  
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
    <h1>Vending Machine Status</h1>

    <h2>Machine Status</h2>
    <div id="machine-status">
    </div>

    <h2>Request Refill</h2>
    <form action="submit_refill.php" method="post">
        <label for="vm_number">Vending Machine Number:</label><br>
        <input type="text" id="vm_number" name="vm_number"><br>
        <label for="refiller_id">Refiller ID:</label><br>
        <input type="text" id="refiller_id" name="refiller_id"><br><br>
        <input type="submit" value="Request Refill">
    </form>
</body>
</html>