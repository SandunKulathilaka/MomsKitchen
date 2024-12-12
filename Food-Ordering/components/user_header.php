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

<header class="header" style="background: linear-gradient(to right, #222222, #222222);">

   <section class="flex">
   <h3 style="color:white;margin:0px;font-size:20px;">Mom's Kitchen</h3>

   <a href="home.php" class="logo">
   <img src="images/logo.png" alt="Yum-Yum Logo" width="100" height="100"></a>

      <nav class="navbar">
         <a href="home.php" style="color:white;">Home</a>
         <a href="about.php" style="color:white;">About</a>
         <a href="menu.php" style="color:white;">Menu</a>
         <a href="orders.php" style="color:white;">Orders</a>
         <a href="contact.php" style="color:white;">Contact Us</a>
         <a href="admin/admin_login.php" style="color:white;">Admin Portal</a>
         <a id="user-btn" href="login.php" style="color: white;">Profile</a>
      </nav>

      <div class="icons">
    <?php
    $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    $count_cart_items->execute([$user_id]);
    $total_cart_items = $count_cart_items->rowCount();
    ?>
    <a href="cart.php" style="color: white;"><i class="fas fa-shopping-cart"></i><span><?= $total_cart_items; ?></span></a>
    <div id="menu-btn" class="fas fa-bars" style="color: white;"></div>
</div>


      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn">login</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

