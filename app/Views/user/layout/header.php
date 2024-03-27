<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/user/img/icon/loder.png" alt="loder">
            </div>
        </div>
    </div>
</div>

<header>
    <div class="header-area">
        <div class="header-top d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><a href="index.html#">About Us</a></li>
                                    <li><a href="index.html#">Privacy</a></li>
                                    <li><a href="index.html#">FAQ</a></li>
                                    <li><a href="index.html#">Careers</a></li>
                                </ul>
                            </div>
                            <div class="header-info-right d-flex">
                                <ul class="order-list">
                                    <li><a href="index.html#">My Wishlist</a></li>
                                    <li><a href="index.html#">Track Your Order</a></li>
                                </ul>
                                <ul class="header-social">
                                    <li><a href="https://www.facebook.com/loi.huus"><i class="fab fa-facebook"></i></a></li>
                                    <li> <a href="https://www.instagram.com/digitique3/"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/l%E1%BB%A3i-ph%E1%BA%A1m-h%E1%BB%AFu-6851842a7/"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li> <a href="https://www.youtube.com/channel/UC5NjtbYoN5jQkcGcjET1QGA"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid header-sticky">
            <div class="container">
                <div class="menu-wrapper">

                    <div class="logo">
                        <a href="index.html"><img src="assets/user/img/logo/logo.png" alt></a>
                    </div>

                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <?php foreach ($menu as $me) : ?>
                                    <?php
                                    // Biến flag để kiểm tra xem submenu có cần phải hiển thị hay không
                                    $hasSubmenu = false;
                                    ?>
                                    <li>
                                        <a href="<?= $me['meta'] ?>"><?= $me['name'] ?></a>
                                        <?php foreach ($category as $cate) : ?>
                                            <?php if ($me['id'] === $cate['parent']) : ?>
                                                <?php
                                                // Nếu có ít nhất một category khớp với parent của menu, set $hasSubmenu thành true
                                                $hasSubmenu = true;
                                                ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <?php if ($hasSubmenu) : ?>
                                            <!-- Chỉ hiển thị submenu nếu có ít nhất một category khớp với parent của menu -->
                                            <ul class="submenu">
                                                <?php foreach ($category as $cate) : ?>
                                                    <?php if ($me['id'] === $cate['parent']) : ?>
                                                        <li><a href="login.html"><?= $cate['name'] ?></a></li>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </ul>
                                        <?php endif ?>
                                    </li>
                                <?php endforeach ?>

                            </ul>
                        </nav>
                    </div>

                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch hearer_icon">
                                    <a id="search_1" href="javascript:void(0)">
                                        <span class="flaticon-search"></span>
                                    </a>
                                </div>
                            </li>
                            <li style="display: flex; align-items: center; font-size: 18px;">
                                <a href="login.html" style="color:black">
                                    <?= session()->get('user_login') ? session()->get('user_login')['name'] : '<span class="flaticon-user">' ?>
                                </a>
                            </li>
                            <li class="cart"><a href="cart.html"><span class="flaticon-shopping-cart"></span></a> </li>
                        </ul>
                    </div>
                </div>

                <div class="search_input" id="search_input_box">
                    <form class="search-inner d-flex justify-content-between ">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>

                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <div class="header-bottom text-center">
            <p>Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer <a href="index.html#" class="browse-btn">Shop Now</a></p>
        </div>
    </div>
</header>