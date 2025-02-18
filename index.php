<?php
include 'conn.php';

$sql = "SELECT * FROM best_deals";
$stmt = $conn->prepare($sql);
$stmt->execute();
$best_deals = $stmt->fetchAll(PDO::FETCH_ASSOC);

$category = $_GET['category'] ?? null;

if ($category) {
    $sql2 = "SELECT * FROM products WHERE category = :category";
} else {
    $sql2 = "SELECT * FROM products";
}
$stmt2 = $conn->prepare($sql2);
$stmt2->execute(['category' => $category]);
$products = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM best_sellers";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
$best_sellers = $stmt3->fetchAll(PDO::FETCH_ASSOC);



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

<body id="homepage">
    <div class="cart">
        <h2 class="cart-title">Cart Items</h2>

        <!--content-->
        <div class="cart-content">

        </div>


        <!--total-->
        <div class="total">
            <div class="total-title">total</div>
            <div class="total-price">$0</div>
        </div>
        <!--buy botton-->
        <button type="button" class="btn-buy">Buy now</button>
        <!--cartclose-->
        <i class="fa-solid fa-xmark" id="close-cart"></i>

    </div>

    <a class="nav__menu-open" href="#" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
        <div class="shopping__cart " id="cart-icon">
            <h1 class="shopping__cart-count">0</h1>
            <i class=" fa-solid fa-basket-shopping"></i>
        </div>
    </a>
    <!--NAVBAR-->
    <!-- header start -->
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
                            <a href="/" data-toggle="nav__dropdown">Collection <i
                                    class="fa-solid fa-chevron-down"></i></a>
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
    <!-- header end -->

    <!--HERO SECTION-->

    <section class="hero">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <div class="hero__header-main">
                <h1>With an outstanding style, only for you</h1>
                <h1>Exclusively designed for you</h1>
            </div>
            <div class="hero__CTA">
                <div class="hero__card-wraper">
                    <a href="">
                        <img src="assets/Left.png" alt="">
                        <a class="hero__button" href="">For Her</a>
                    </a>
                </div>

                <div class="hero__card-wraper">
                    <a href="">
                        <img src="assets/Right.png" alt="">
                        <a class="hero__button" href="">For Him</a>
                    </a>

                </div>
            </div>
        </div>
    </section>


    <!--HERO SECTION-->


    <!--DEALS SECTION-->

    <section class="deals">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <h1 class="deals__header-main">
                Best Deals
            </h1>
            <div class="s1 swiper">
                <div class="swiper-wrapper">
                    <!-- <div class="swiper-slide ">
                        <img src="assets/Card.png">
                        <h1 class="slider__title">Flat Hill Slingback</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$299</span>&nbsp; $163</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/Card (1).png">
                        <h1 class="slider__title">Ocean Blue Ring</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$269</span>&nbsp; $245</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/Card (2).png">
                        <h1 class="slider__title">Brown Leathered Wallet</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$179</span>&nbsp; $144</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/Card (3).png">
                        <h1 class="slider__title">Silverside Wristwatch</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$379</span>&nbsp; $336</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div> -->
                    <?php foreach ($best_deals as $best_deal) {
                        ?>

                        <div class="swiper-slide ">
                            <img src="assets/<?php echo $best_deal['image']; ?>">
                            <h1 class="slider__title"><?php echo $best_deal['name']; ?></h1>
                            <p class="slider__new-price"><span
                                    class="slider__old-price">$<?php echo $best_deal['old_price']; ?></span>&nbsp;
                                $<?php echo $best_deal['new_price']; ?></p>
                            <i class="fa-solid fa-bag-shopping add-cart"></i>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div style="display: flex; align-items: center;">
                <button class="deals__button" type="button">View All</button>
            </div>
        </div>
    </section>

    <!--DEALS SECTION-->


    <!--COLLECTION SECTION-->

    <section class="collection">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <div class="collection__content">
                <div class="collection__content-item1">
                    <h1>
                        Exclusive collection 2021
                    </h1>
                    <h1>
                        Be exclusive
                    </h1>
                    <p>The best everyday option in a Super Saver range within a <br>reasonable price. It is our
                        responsibility to keep you <br>100 percent stylish. Be smart & trendy with us.</p>
                    <button class="collection__button" type="button">Explore</button>

                </div>
                <div class="collection__content-item2">
                    <a href="">
                        <img src="assets/collection1.png" alt="">
                    </a>
                </div>
            </div>
            <div class="collection__items">
                <div class="collection__content-item3">
                    <a href="">
                        <img src="assets/collection2.png" alt="">
                    </a>
                </div>
                <div class="collection__content-item4">
                    <a href="">
                        <img src="assets/collection3.png" alt="">
                    </a>
                </div>
                <div class="collection__content-item5">
                    <a href="">
                        <img src="assets/collection4.png" alt="">
                    </a>
                </div>


            </div>
        </div>
    </section>

    <!--ARRIVALS-->

    <section class="arrivals">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <h1 class="arrivals__main-title">
                Checkout New Arrivals
            </h1>
            <div class="s1 swiper">
                <div class="swiper-wrapper" style="position: relative;">
                    <div class="swiper-slide ">
                        <img src="assets/arrival1.png">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/arrival2.png">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/arrival3.png">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/arrival4.png">
                    </div>

                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>
    </section>

    <!--ARRIVALS-->


    <!--SHOP-->

    <section class="shop">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <h1 class="shop__main-title">Shop By Category</h1>
            <div class="shop__gender">
                <h1>For Women</h1>
                <h1>For Men</h1>
            </div>
            <div class="shop__filters">
                <a href="">T-Shirt</a>
                <a href="">Shirt</a>
                <a class="shop__current-item" href="">Shoes</a>
                <a href="">Watch</a>
                <a href="">Sunglasses</a>
                <a href="">Bagpacks</a>
            </div>
            <div class="s1 swiper">
                <div class="swiper-wrapper">
                    <!-- <div class="swiper-slide ">
                        <img src="assets/shoe1.png">
                        <h1 class="slider__title">Santiago Blood White</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$399</span>&nbsp; $360</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/shoe2.png">
                        <h1 class="slider__title">Salomon Lightning Blue</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$379</span>&nbsp; $324</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/shoe3.png">
                        <h1 class="slider__title">Snow Surfer White</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$289</span>&nbsp; $255</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/shoe4.png">
                        <h1 class="slider__title">Sky Lagoon Cyan</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$349</span>&nbsp; $310</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div> -->
                    <?php

                    foreach ($products as $product) {
                        ?>
                        <div class="swiper-slide ">
                            <img src="assets/<?php echo $product['image']; ?>">
                            <h1 class="slider__title"><?php echo $product['name']; ?></h1>
                            <p class="slider__new-price"><span
                                    class="slider__old-price">$<?php echo $product['old_price']; ?></span>&nbsp;
                                $<?php echo $product['price']; ?></p>
                            <i class="fa-solid fa-bag-shopping add-cart"></i>
                        </div>
                        <?php
                    }

                    ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div style="display: flex; align-items: center;">
                <button class="deals__button" type="button">View All</button>
            </div>

        </div>
    </section>

    <!--SHOP-->


    <!--COLLECTION SECTION-->


    <!--COLLECTION2 SECTION-->

    <section class="collection2">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <div class="collection2__content">
                <div class="collection2__content-item1">
                    <div>
                        <h1>Urban Stories</h1>
                        <p>Collection</p>
                    </div>
                    <img src="assets/collection2-1.png" alt="">
                </div>
                <div class="collection2__content-item2">
                    <div>
                        <h1>Country Lights</h1>
                        <p>Collection</p>
                    </div>
                    <img src="assets/collection2-2.png" alt="">
                </div>
            </div>
        </div>
    </section>


    <!--COLLECTION2 SECTION-->

    <!--BESTSELLERS SECTION-->

    <section class="bestsellers">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <h1 class="bestsellers__main-title">Best Sellers</h1>
            <div class="s1 swiper">
                <div class="swiper-wrapper">
                    <!-- <div class="swiper-slide ">
                        <img src="assets/best1.png">
                        <h1 class="slider__title">Marie Claire Handbag</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$399</span>&nbsp; $365</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/best2.png">
                        <h1 class="slider__title">Red Gem Earrings</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$489</span>&nbsp; $466</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/best3.png">
                        <h1 class="slider__title">Black Leathered Wristwatch</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$799</span>&nbsp; $745</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/best4.png">
                        <h1 class="slider__title">Red-White Stripped Tie</h1>
                        <p class="slider__new-price"><span class="slider__old-price">$299</span>&nbsp; $243</p>
                        <i class="fa-solid fa-bag-shopping add-cart"></i>
                    </div> -->
                    <?php foreach ($best_sellers as $best_seller) {
                        ?>

                        <div class="swiper-slide ">
                            <img src="assets/<?php echo $best_seller['image']; ?>">
                            <h1 class="slider__title"><?php echo $best_seller['name']; ?></h1>
                            <p class="slider__new-price"><span
                                    class="slider__old-price">$<?php echo $best_seller['old_price']; ?></span>&nbsp;
                                $<?php echo $best_seller['price']; ?></p>
                            <i class="fa-solid fa-bag-shopping add-cart"></i>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>
    </section>

    <!--BESTSELLERS SECTION-->

    <!--COLLECTION3 SECTION-->

    <section class="collection3">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <div class="collection3__content">
                <div class="collection3__content-item1">
                    <div>
                        <h1>Summer of ‘21</h1>
                        <a href=""><img src="assets/collection3-1.png" alt=""></a>
                    </div>
                </div>
                <div class="collection3__content-item2">
                    <div class="collection3__item2__first-quarter">
                        <h1>Sunglasses</h1>
                        <a href=""><img src="assets/collection3-2.png" alt=""></a>
                    </div>
                    <div class="collection3__item2__second-quarter">
                        <h1>Hat</h1>
                        <a href=""><img src="assets/collection3-4.png" alt=""></a>
                    </div>
                </div>
                <div class="collection3__content-item3">
                    <div class="collection3__item3__first-quarter">
                        <h1>Footwear</h1>
                        <a href=""><img src="assets/collection3-3.png" alt=""></a>
                    </div>
                    <div class="collection3__item3__second-quarter">
                        <h1>Watches</h1>
                        <a href=""><img src="assets/collection3-5.png" alt=""></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--COLLECTION3 SECTION-->


    <!--EXPLORE SECTION-->

    <section class="explore">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <div class="explore__content">
                <div class="explore__content-item1">
                    <h1>
                        Gentle Formal Looks
                    </h1>
                    <p>We provide the top formal apparel package to make your job look confident <br>and comfortable.
                        Stay connect.</p>
                    <button class="explore__button" type="button">Explore Collection</button>

                </div>
                <div class="explore__content-item2">
                    <a href="">
                        <img src="assets/explore.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--EXPLORE SECTION-->

    <!--BLOG SECTION-->
    <section class="container">
        <div class="blog" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <div class="blog__content">
                <div class="blog__content-item">
                    <img src="assets/blog1.png" alt="">
                    <div class="blog__content-item-info">
                        <h2>Kelly Hudson . <span>Fashion activist</span></h2>
                        <h1>How important are shoes <br>in your style?</h1>
                        <p>Is it possible to assess a person just on the basis of their footwear? Obviously, nobody
                            should criticize, but certainly, shoes say a lot about someone. It matters
                            for the outsiders that we meet every day...</p>
                        <a href="">Read More &nbsp;<i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
                <div class="blog__content-item">
                    <img src="assets/blog2.png" alt="">
                    <div class="blog__content-item-info">
                        <h2>Judy Garland . <span>Fashion activist</span></h2>
                        <h1>Fashion trend forecast for <br>Summer 2021</h1>
                        <p>While the fashion industry has had a calm year, this season has seen some beautiful pieces.
                            Over the previous several weeks, commanding coats, and
                            elegant face masks have ruled Fashion Weeks...</p>
                        <a href="">Read More &nbsp;<i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
                <div class="blog__content-item">
                    <img src="assets/blog3.png" alt="">
                    <div class="blog__content-item-info">
                        <h2>Rachel Green . <span>Fashion activist</span></h2>
                        <h1>Spring exclusive collection <br>for Men & Women</h1>
                        <p>Explore the first real-time photographic fashion
                            magazine NOWFASHION to broadcast exclusive
                            live fashion shows. Some of the most beautiful
                            spring collection i want to share. See the....</p>
                        <a href="">Read More &nbsp;<i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--BLOG SECTION-->

    <!--OUTLETS SECTION-->

    <section class="outlets">
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
            <div class="outlets__slider">
                <h1 class="outlets__main-header">Visit our outlets in</h1>
                <div class="swiper mySwiper ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">Berlin</div>
                        <div class="swiper-slide">California</div>
                        <div class="swiper-slide">Paris</div>
                        <div class="swiper-slide">Athens</div>
                        <div class="swiper-slide">Budapest</div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <a class="outlets__addresses" href="">See Addresses &nbsp;<i class="fa-solid fa-arrow-right-long"></i></a>

        </div>
        </div>
    </section>

    <footer>
        <div class="container" data-aos-easing="linear" data-aos-duration="1000" data-aos="fade-down">
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
            <div style="display:flex; gap:40px; justify-content: center; padding-bottom: 38px; margin-bottom: 17.5px; border-bottom: 1px solid #9E9E9E;"
                class="">
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
                <p>All rights Reserved &nbsp; <i class="fa-regular fa-copyright"></i><span> &nbsp; Your Company,
                        2024</span></p>
            </div>
        </div>
    </footer>

    <!--OUTLETS SECTION-->


    <script src="https://kit.fontawesome.com/9d667afad8.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="swiper.js"></script>
</body>

</html>