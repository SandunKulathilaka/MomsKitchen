<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_users = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_users->execute([$delete_id]);
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE user_id = ?");
   $delete_order->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart->execute([$delete_id]);
   header('location:users_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users Accounts</title>
   <link rel="icon" href="images/LYgjKqzpQb.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Bootstrap CSS CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body style="background-image: url('images/2016_09_29_12990_1475116504._large.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

<?php include '../components/admin_header.php' ?>

<!-- user accounts section starts  -->

<section class="accounts">

   <h1 class="heading">Users Account</h1>

   <div class="container">
      <div class="row justify-content-center">
         <div class="row-md-6">
            <!-- Search form -->
            <form action="#" method="GET" class="mb-3">
            <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" class="form-control" style="width:300px;height:50px;font-size:20px;" placeholder="Search users..." name="search">
            <button class="form-control" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>

            </form>
         </div>
      </div>

      <div class="box-container">
         <?php
            if(isset($_GET['search'])) {
               $search = $_GET['search'];
               $select_account = $conn->prepare("SELECT * FROM `users` WHERE name LIKE ?");
               $select_account->execute(["%$search%"]);
            } else {
               $select_account = $conn->prepare("SELECT * FROM `users`");
               $select_account->execute();
            }

            if($select_account->rowCount() > 0){
               while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){  
         ?>
            <div class="box">
               <p> User ID: <span><?= $fetch_accounts['id']; ?></span> </p>
               <p> Username: <span><?= $fetch_accounts['name']; ?></span> </p>
               <a href="users_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn" onclick="return confirm('Delete this account?');">Delete</a>
            </div>
         <?php
               }
            }else{
               echo '<p class="empty">No accounts available</p>';
            }
         ?>
      </div>
   </div>

</section>

<!-- user accounts section ends -->

<!-- Bootstrap JS CDN link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
