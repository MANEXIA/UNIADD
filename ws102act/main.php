
<?php 
  include "connect.php";

  session_start();
  if(isset($_SESSION['email'])){
    //echo " log ";
  }
  else{
    echo "<script>    
    location.replace('index.php')                 
    </script>";
  }

  $res =  $_SESSION['email'];
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>WS102ACT</title>
    <meta charset="UTF-8">
    <meta name="Author" content="Martin, Gebiertas">

    <script src="https://kit.fontawesome.com/13091db6b9.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="mainstyle.css">
    <script src="js.js"></script>

</head>
<body>
   
 <div class="container">
    <div class="row">

     <?php 
     
     try {
      
      $stmt = $conn->prepare("SELECT * FROM ws102_users where email = '$res'");
      $stmt->execute();
      
    
      $count = $stmt->rowCount();
      
      //IF RECORD ACTIVE GOOO 
      if($count > 0){

       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       foreach($result as $row){

        //echo $_SESSION['username'] = $row['username']; 
       
       }
        
      } 
      // set the resulting array to associative
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
       
     ?>


      <p>Username:</p> <h2 id="username"> <?php  echo $_SESSION['username'] = $row['username'];  ?>  </h2>
      <p>Email:</p> <h2 id="email"> <?php echo $_SESSION['email'] = $row['email']; ?> </h2>
      <p>Gender:</p> <h2 id="gender"> <?php  echo $_SESSION['gender'] = $row['gender'];  ?> </h2>
    
      <button type="button">EDIT</button>    
      <a href="logout.php"><button type="button">LOG OUT</button></a>
    </div>
 </div>

</body>
</html>