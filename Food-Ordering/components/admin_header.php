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

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Admin<span>Panel</span></a>
      <img src="images/logo.png" width="100" height="100"></a>

      <nav class="navbar">
         <a href="dashboard.php">Home</a>
         <a href="products.php">Products</a>
         <a href="placed_orders.php">Orders</a>
         <a href="admin_accounts.php">Admins</a>
         <a href="users_accounts.php">Users</a>
         <a href="messages.php">Messages</a>
      </nav>
      
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <nav class="navbar">
      <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         
         <div id="user-btn" class="fas fa-user" style="font-size: 1.6em;  cursor: pointer;">
    <?= $fetch_profile['name']; ?>
</div>

      </nav>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">Update Profile</a>
         <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">Login</a>
            <a href="register_admin.php" class="option-btn">Register</a>
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">Logout</a>
      </div>

   </section>

</header>