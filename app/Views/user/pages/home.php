<main>

    <section class="slider-area ">
        <div class="slider-active">

            <div class="single-slider slider-bg1 slider-height d-flex align-items-center">
                <div class="container">
                    <div class="rowr">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8  col-sm-10">
                            <div class="hero-caption text-center">
                                <span>Fashion Sale</span>
                                <h1 data-animation="bounceIn" data-delay="0.2s">Minimal Menz Style</h1>
                                <p data-animation="fadeInUp" data-delay="0.4s">Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
                                <a href="shopping" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-slider slider-bg2 slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8 col-sm-10">
                            <div class="hero-caption text-center">
                                <span>Fashion Sale</span>
                                <h1 data-animation="bounceIn" data-delay="0.2s">Minimal Menz Style</h1>
                                <p data-animation="fadeInUp" data-delay="0.4s">Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
                                <a href="shopping" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="items-product1 pt-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-items mb-20">
                        <div class="items-img">
                            <img src="assets/user/img/gallery/items1.jpg" alt>
                        </div>
                        <div class="items-details">
                            <h4><a href="pro-details.html">Bán chạy</a></h4>
                            <a href="pro-details.html" class="browse-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-items mb-20">
                        <div class="items-img">
                            <img src="assets/user/img/gallery/items2.jpg" alt>
                        </div>
                        <div class="items-details">
                            <h4><a href="pro-details.html">Yêu thích</a></h4>
                            <a href="pro-details.html" class="browse-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-items mb-20">
                        <div class="items-img">
                            <img src="assets/user/img/gallery/items3.jpg" alt>
                        </div>
                        <div class="items-details">
                            <h4><a href="pro-details.html">Trending</a></h4>
                            <a href="pro-details.html" class="browse-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="latest-items section-padding fix">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-12">
                    <div class="nav-button">

                        <nav>
                            <div class="nav-tittle">
                                <h2>Trending This Week</h2>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

                    <div class="latest-items-active">
                        <?php foreach ($proByDate as $pro) : ?>
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a class="img-pro-home" href="pro-details.html">
                                            <img src="<?= $pro['meta'] ?>" alt>
                                            <?php if ($pro['sale'] > 0) : ?>
                                                <span class="sale-tag">-<?= ceil((1 - $pro['sale'] / $pro['price']) * 100) ?>%</span>
                                            <?php endif ?>
                                        </a>
                                        <div class="socal_icon">
                                            <a href="/"><i class="ti-shopping-cart"></i></a>
                                            <a href="/"><i class="ti-heart"></i></a>
                                            <a href="/"><i class="ti-zoom-in"></i></a>
                                        </div>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="pro-details.html"><?= $pro['name'] ?></a></h3>
                                        <div class="properties-footer">
                                            <div class="price">
                                                <?php if ($pro['sale'] > 0) : ?>
                                                    <span><?= number_format($pro['sale']) ?> VNĐ<span><?= number_format($pro['price']) ?> VNĐ</span></span>
                                                <?php else : ?>
                                                    <span><?= number_format($pro['price']) ?> VNĐ</span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-11">
                    <div class="h1-testimonial-active">

                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <h2>Customer Testimonial</h2>
                                    <p>Everybody is different, which is why we offer styles for every body. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
                                </div>

                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="assets/user/img/gallery/founder-img.png" alt>
                                    </div>
                                    <div class="founder-text">
                                        <span>Petey Cruiser</span>
                                        <p>Designer at Colorlib</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <h2>Customer Testimonial</h2>
                                    <p>Everybody is different, which is why we offer styles for every body. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
                                </div>

                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="assets/user/img/gallery/founder-img.png" alt>
                                    </div>
                                    <div class="founder-text">
                                        <span>Petey Cruiser</span>
                                        <p>Designer at Colorlib</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="latest-items section-padding fix">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle text-center mb-40">
                    <h2>You May Like</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="latest-items-active">
                <?php foreach ($proBySold as $pro) : ?>
                    <div class="properties pb-30">
                        <div class="properties-card">
                            <div class="properties-img">
                                <a href="pro-details.html">
                                    <img src="<?= $pro['meta'] ?>" alt>
                                    <?php if ($pro['sale'] > 0) : ?>
                                        <span class="sale-tag">-<?= ceil((1 - $pro['sale'] / $pro['price']) * 100) ?>%</span>
                                    <?php endif ?>
                                </a>
                                <div class="socal_icon">
                                    <a href="/"><i class="ti-shopping-cart"></i></a>
                                    <a href="/"><i class="ti-heart"></i></a>
                                    <a href="/"><i class="ti-zoom-in"></i></a>
                                </div>
                            </div>
                            <div class="properties-caption properties-caption2">
                                <h3><a href="pro-details.html"><?= $pro['name'] ?></a></h3>
                                <div class="properties-footer">
                                    <div class="price">
                                        <?php if ($pro['sale'] > 0) : ?>
                                            <span><?= number_format($pro['sale']) ?> VNĐ<span><?= number_format($pro['price']) ?> VNĐ</span></span>
                                        <?php else : ?>
                                            <span><?= number_format($pro['price']) ?> VNĐ</span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>


    <section class="home-blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">

                    <div class="section-tittle text-center mb-40">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.html"><img src="assets/user/img/gallery/blog1.jpg" alt></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.html">What Curling Irons Are The Best Ones</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
                            <a href="pro-details.html" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.html"><img src="assets/user/img/gallery/blog2.jpg" alt></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.html">Vogue's Ultimate Guide To Autumn/
                                    Winter 2019 Shoes</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
                            <a href="pro-details.html" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.html"><img src="assets/user/img/gallery/blog3.jpg" alt></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.html">What Curling Irons Are The Best Ones</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
                            <a href="pro-details.html" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="categories-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="assets/user/img/icon/services1.svg" alt>
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="assets/user/img/icon/services2.svg" alt>
                        </div>
                        <div class="cat-cap">
                            <h5>Secure Payment</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="cat-icon">
                            <img src="assets/user/img/icon/services3.svg" alt>
                        </div>
                        <div class="cat-cap">
                            <h5>Money Back Guarantee</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="cat-icon">
                            <img src="assets/user/img/icon/services4.svg" alt>
                        </div>
                        <div class="cat-cap">
                            <h5>Online Support</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>