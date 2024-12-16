<?php
session_start();
include 'conn.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch();

 
    if($user){
       $_SESSION['id'] = $user['id'];
       header('Location: index.php');
       exit();
    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCDS - E-Commerce</title>
    <link rel="stylesheet" href="normalization.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="sw.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="nav">
        <div class="container">
           <div class="nav__main">
              <div>
                 <a href="/">
                  <img src="assets/Logo.svg" alt="">
                 </a>
              </div>
              <div class="nav__buttons-mobile">
                  <a href="/"><img src="assets/Contact.png" alt=""></a>
                  <a href="/"><img src="assets/Cart.png" alt=""></a>
                  <a href="/"><img src="assets/Search.png" alt=""></a>
                  <a href="login.php"><img src="assets/Login.png" alt=""></a>
                  <a href="/"><img src="assets/Like.png" alt=""></a>
              </div>
      
              <div class="nav__menu-open">
                 <span></span>
              </div>
              <div class="nav__menu-overlay">
              </div>
              
              <!-- navigation menu start -->
              
              <nav class="nav__menu">
                <div class="nav__menu-close">
                   <img src="assets/close.png" alt="close">
                </div>
                <ul class="nav__list">
                   <li class="nav__item">
                      <a href="/">Women</a>
                   </li>
                   <li class="nav__item">
                      <a href="/">Men</a>
                   </li>
                   <li class="nav__item nav__item-child">
                      <a href="/" data-toggle="nav__dropdown">Collection <i class="fa-solid fa-chevron-down"></i></a>
                      <ul class="nav__dropdown" style="z-index:9999;">
                          <li class="nav__item"><a href="#">Winter</a></li>
                          <li class="nav__item"><a href="#">Spring</a></li>
                          <li class="nav__item"><a href="#">Summer</a></li>
                          <li class="nav__item"><a href="#">Autumn</a></li>
                      </ul>
                   </li>
      
                   <li class="nav__item" style="margin-right:0px !important;">
                      <a href="/">Outlet</a>
                   </li>
                </ul>
              </nav>
              <!-- navigation menu end -->
              <div class="nav__buttons">
                  <a href="/"><img src="assets/Contact.png" alt=""></a>
                  <a href="/"><img src="assets/Cart.png" alt=""></a>
                  <a href="/"><img src="assets/Search.png" alt=""></a>
                  <a href="login.php"><img src="assets/Login.png" alt=""></a>
                  <a href="/"><img src="assets/Like.png" alt=""></a>
              </div>
           </div>
        </div>
      </header>
      
    <div class="form__wrapper">
        <div class="form" method="post">
            <h1>Login</h1>
            <form method="post">
              <div class="txt_field">
                <input type="text" required name="username">
                <span></span>
                <label>Username</label>
              </div>
              <div class="txt_field">
                <input type="password" required name="password">
                <span></span>
                <label>Password</label>
              </div>
              <input type="submit" value="Login" name="submit">
              <div class="signup_link">
                Not a member? <a href="/signup.html">Signup</a>
              </div>
            </form>
            <?php 
                if(isset($_POST['submit'])){
                    if(!$user){
                       ?>
                        <div class="alert alert-danger" role="alert" style="padding:20px;text-align:center;">
                            Invalid username or password
                        </div>
                       <?php
                    }
                }
            ?>
          </div>
    
    </div>
  
      <footer>
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <div class="">
                        <h1 class="footer__header">Company Info</h1>
                        <ul>
                            <li class="footer__item"><a href="">About Us</a></li>
                            <li class="footer__item"><a href="">Affliate</a></li>
                            <li class="footer__item"><a href="">Fashion Blogger</a></li>
                        </ul>
                    </div>
                    <div class="">
                        <h1 class="footer__header">Help & Support</h1>
                        <ul>
                            <li class="footer__item"><a href="">Shipping Info</a></li>
                            <li class="footer__item"><a href="">Refunds</a></li>
                            <li class="footer__item"><a href="">How to Order</a></li>
                            <li class="footer__item"><a href="">How to Track</a></li>
                            <li class="footer__item"><a href="">Size Guides</a></li>
            
                        </ul>
                    </div>
                    <div class="">
                        <h1 class="footer__header">Customer Care</h1>
                        <ul>
                            <li class="footer__item"><a href="">Contact Us</a></li>
                            <li class="footer__item"><a href="">Payment Methods</a></li>
                            <li class="footer__item"><a href="">Bonus Point</a></li>
                        </ul>
                    </div>
            
                </div>
                <div class="col-2">
                    <h1 class="footer__header">Signup For The Latest News</h1>
                    <form class="footer__form" action="">
                        <input type="email" placeholder="Enter Email">
                        <i class="fa-solid fa-arrow-right"></i>
                    </form>
                    <div class="footer__contact">
                        <img src="assets/Mail.png" alt="">
                        <h1>something@email.com</h1>
                    </div>
                    <div style="margin-bottom: 0 !important;" class="footer__contact">
                        <img src="assets/Phone.png" alt="">
                        <h1>+2321354524</h1>
                    </div>
        
                </div>
            </div>
            <div style="display:flex; gap:40px; justify-content: center; padding-bottom: 38px; margin-bottom: 17.5px; border-bottom: 1px solid #9E9E9E;" class="">
                <div>
                    <img src="assets/facebook 1.png" alt="">
                </div>
                <div>
                    <img src="assets/instagram 1.png" alt="">
                </div>
                <div>
                    <img src="assets/youtube 1.png" alt="">
                </div>
                <div>
                    <img src="assets/twitter 1.png" alt="">
                </div>
        
            </div>
            <div class="footer__bottom">
                <p>All rights Reserved  &nbsp; <i class="fa-regular fa-copyright"></i><span> &nbsp; Your Company, 2024</span></p>
                <p>Made with ❤️ by<span> &nbsp;Zeyad Tharwat & Ahmed Maged</span></p>
            </div>
        </div>
        </footer>
        <script src="https://kit.fontawesome.com/9d667afad8.js" crossorigin="anonymous"></script>  

<script src="app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>
</html>