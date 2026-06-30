<?php
if (isset($message)) {
   foreach ($message as $msg) {
      echo '<div class="alert-msg"><span>' . htmlspecialchars($msg) . '</span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>';
   }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<header class="header">
   <div class="header-top">
      <!-- LOGO — pure text, no image -->
      <a href="home.php" class="site-logo">
         <span class="logo-icon">⚡</span>
         <span class="logo-text">Tony <em>Electronics</em></span>
      </a>

      <!-- NAV -->
      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="shop.php">Shop</a>
         <a href="about.php">About</a>
         <a href="orders.php">Orders</a>
         <a href="contact.php">Contact</a>
      </nav>

      <!-- AUTH -->
      <div class="header-auth">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
            <span class="auth-name"><?= htmlspecialchars($fetch_profile["name"]); ?></span>
            <a href="update_user.php" class="btn-outline">Profile</a>
            <a href="components/user_logout.php" class="btn-fill" onclick="return confirm('Logout?');">Logout</a>
         <?php } else { ?>
            <span class="auth-name">Please login or register</span>
            <a href="user_register.php" class="btn-outline">Register</a>
            <a href="user_login.php" class="btn-fill">Login</a>
         <?php } ?>
      </div>
   </div>

   <!-- ICON BAR -->
   <div class="header-icons">
      <?php
      $count_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
      $count_wishlist->execute([$user_id]);
      $wc = $count_wishlist->rowCount();

      $count_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $count_cart->execute([$user_id]);
      $cc = $count_cart->rowCount();
      ?>
      <a href="search_page.php" class="icon-link"><i class="fas fa-search"></i></a>
      <a href="wishlist.php" class="icon-link">
         <i class="fas fa-heart"></i>
         <?php if($wc > 0): ?><span class="icon-badge"><?= $wc ?></span><?php endif; ?>
      </a>
      <a href="cart.php" class="icon-link">
         <i class="fas fa-shopping-bag"></i>
         <?php if($cc > 0): ?><span class="icon-badge"><?= $cc ?></span><?php endif; ?>
      </a>
   </div>
</header>
