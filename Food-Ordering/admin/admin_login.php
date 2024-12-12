<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   
   if($select_admin->rowCount() > 0){
      $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
      $_SESSION['admin_id'] = $fetch_admin_id['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'Incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin login</title>
   <link rel="icon" href="images/LYgjKqzpQb.ico" type="image/x-icon">

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body style="background-image: url('images/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- Admin login form section starts  -->

<section class="form-container">

   <div class="form-box">
   <h1 style="color:white;font-size:35px;text-align:center;margin:10px;">Login Now</h1>
      <form action="" method="POST">
         <div class="input-group">
            <input type="text" name="name" maxlength="20" required placeholder="Enter your username" class="box">
         </div>
         <div class="input-group">
            <input type="password" name="pass" maxlength="20" required placeholder="Enter your password" class="box">
         </div>
         <button type="submit" name="submit" class="btn">Login Now</button>
      </form>
   </div>
</section>

<!-- Admin login form section ends -->

</body>
</html>
