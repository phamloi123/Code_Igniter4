<footer>
    <div class="footer-wrapper gray-bg">
        <div class="footer-area footer-padding">

            <section class="subscribe-area">
                <div class="container">
                    <div class="row justify-content-between subscribe-padding">
                        <div class="col-xxl-3 col-xl-3 col-lg-4">
                            <div class="subscribe-caption">
                                <h3>Subscribe Newsletter</h3>
                                <p>Subscribe newsletter to get 5% on all products.</p>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="subscribe-caption">
                                <form action="index.html#">
                                    <input type="text" placeholder="Enter your email">
                                    <button class="subscribe-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-4">

                            <div class="footer-social">
                                <a href="https://www.facebook.com/loi.huus"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/digitique3/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UC5NjtbYoN5jQkcGcjET1QGA"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-20">

                                <div class="footer-logo mb-35">
                                    <a href="index.html"><img src="assets/user/img/logo/logo2_footer.png" alt></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $tam = 0 ?>
                    <?php foreach ($menu as $mn) : ?>
                        <?php if ($tam > 0 && $tam < 5) : ?>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4><?= $mn['name'] ?></h4>
                                        <ul>
                                            <?php foreach ($category as $cate) : ?>
                                                <?php if ($cate['parent'] == $mn['id']) : ?>
                                                    <li><a href="index.html#"><?= $cate['name'] ?></a></li>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php $tam = $tam + 1;
                        echo $tam ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> Sản phẩm Website bán hàng online <i class="fa fa-heart color-danger" aria-hidden="true"></i> by <a href="https://www.facebook.com/loi.huus" target="_blank" rel="nofollow noopener">Phạm Hữu Lợi</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="back-top">
    <a class="wrapper" title="Go to Top" href="index.html#">
        <div class="arrows-container">
            <div class="arrow arrow-one">
            </div>
            <div class="arrow arrow-two">
            </div>
        </div>
    </a>
</div>