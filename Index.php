<!DOCTYPE html>   
<html>   
<head>  
<title> Login Page </title>  
<style>   
    /* Your CSS styles */
    
    Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #cedfd9;  
}  
button {   
       background-color: #929885e5;   
       width: 12%;  
        color: black;   
        padding: 15px;   
        margin: 10px 0px;   
        border: 2px solid #575b4f; 
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 30%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        border: 2px solid black;   
    }   
        
     
 .loginBox{   
        padding: 20px ;   
        background-color: rgb(144, 194, 210);  
    }   

</style>   
</head>    
<body>    
    <center> 
        <h1> Login Form </h1> 
        <form action="add.php" method="post">  
            <div class="loginBox">   
                <label>Username : </label>   
                <input type="text" placeholder="Enter Username" name="username" required>  <br>
              
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password" required>  <br>

                
                <button type="submit">Student Login</button>
            </div>  
        </form>

        <form action="staff_login.php" method="post">  
            <div class="loginBox">   
                <label>Username : </label>   
                <input type="text" placeholder="Enter Username" name="username1" required>  <br>
              
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password1" required>  <br>

                
                <button type="submit">Staff Login</button>
            </div>  
        </form> 
    </center>    
</body>     
</html>
