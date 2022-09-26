<?php
   include "connect.php";
   
   /*----------------SESSION/ DETERMIN --------------*/
   session_start();

   if(isset($_SESSION['email'])){
    echo "<script>    
    location.replace('main.php')                 
    </script>";
   }

   /*else{
     echo "<script>    
     </script>";
   }*/

   /*-------------------------------------------------------------------------*/

   /*----------------REGISTER --------------*/
   if(isset($_POST['btnsubmit'])){

     $_date = date("Y-m-d h:i:s");
     $_email = $_POST['email'];
     $_username = $_POST['username'];
     $_gender = $_POST['gender'];
     $_password = md5($_POST['password']);
     $_status = 1; 
     
     try {

        //INSERTING DATA TO DATABASE TABLE
        $sql = "INSERT INTO ws102_users (d_date, email, username, gender, d_password, d_status)
                            VALUES ('$_date', '$_email', '$_username', '$_gender', '$_password', '$_status')"; 

        // use exec() because no results are returned
        $conn->exec($sql);

        echo " 
        <script> 

        alert('You have been Registered!'); 
        
        location.replace('index.php')    
               
        </script> 
        ";

      } 
        catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }

   }

 /*-------------------------------------------------------------------------*/


 /*----------------------VALIDATION/FETCHING--------------------*/
   if(isset($_POST['log'])) {
     $_username = $_POST['username'];
     $_password = md5($_POST['password']);
     try {
      $stmt = $conn->prepare("SELECT * FROM ws102_users where username =  '$_username' and d_password =  '$_password' ");
      $stmt->execute();
      
      //RECORD
      $count = $stmt->rowCount();
      
      //IF RECORD ACTIVE GOOO 
      if($count > 0){

       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

       foreach($result as $row){
        echo $_SESSION['email'] = $row['email'];        
       }
        echo "<script>   
        location.replace('main.php')         
        </script> ";
      }else{
        echo "<script>   
        alert('Invalid')    
        location.replace('index.php')                 
        </script> ";
      }

 
      // set the resulting array to associative
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;



   }
/*-------------------------------------------------------------------------*/
  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>WS102ACT</title>
    <meta charset="UTF-8">
    <meta name="Author" content="Martin, Gebiertas">
    
    <link rel="stylesheet" href="style.css">
    <script src="js.js"></script>

</head>
<body id="body  ">
   
  <div class="container">

   <div class="row login" id="login">   
    <form action="#" method="POST">
        
        <input type="text" placeholder="Username" name="username" required>
        <input type="password" placeholder="Password" name="password" required>     
        <button type="submit" class="lgbtn" name="log">LOGIN</button>

    </form>

    <button type="submit" class="spbtn" onclick="signup()">SIGN UP</button>
   </div>


   <div class="row sign-up" id="sign-up">   
    <button type="button" class="spback" onclick="back()">BACK</button>

    <form action="index.php" method="POST">
        <input type="email" placeholder="Email" name="email" required>
        <input type="text" placeholder="Username" name="username" required>
        <select name="gender" required>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
        </select>
        <input type="password" placeholder="Password" name="password" required>
        <div>
        <button type="submit" class="spsubmit" name="btnsubmit">SUBMIT</button>
       </div>
    </form>


   </div>
  </div>
 

</body>
</html>