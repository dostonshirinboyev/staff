<?php

/* @var $this \yii\web\View */
/* @var $content string */

use ssuv\assets\AppAuthAsset;
use yii\helpers\Html;

AppAuthAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<!-- Mirrored from themes.lunartechit.com/dataxo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 05:29:06 GMT -->
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="assets/img/favicon.png">

    <title><?= Html::encode($this->title) ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;0,700;0,900;1,500;1,700&amp;display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--<div class="preeloader">-->
<!--    <div class="loader">-->
<!--        <div></div><div></div><div></div><div></div><div></div><div></div><div></div>-->
<!--    </div>-->
<!--</div>-->


<header class="header header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-12">

                <div class="logo">
                    <a href="index-2.html" class="logo-1"><img src="img/logo.png" alt="#"></a>
                    <a href="index-2.html" class="logo-2"><img src="img/logo-2.png" alt="#"></a>
                </div>
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-7 col-md-9 col-12">
                <div class="menu-top">

                    <div class="main-menu">
                        <div class="navbar">
                            <div class="nav-item">

                                <ul class="nav-menu mobile-menu navigation">
                                    <li class="active"><a href="index-2.html">Home<i class="far fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li class="active"><a href="index-2.html">Home One</a></li>
                                            <li><a href="index-3.html">Home Two</a></li>
                                            <li><a href="index-4.html">Home Three</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="#">Services<i class="far fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="service-1.html">Service One</a></li>
                                            <li><a href="service-2.html">Service Two</a></li>
                                            <li><a href="service-details.html">Service Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages<i class="far fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="#">Team<i class="far fa-angle-right"></i></a>
                                                <ul class="sub-menu-2">
                                                    <li><a href="team-1.html">Team One</a></li>
                                                    <li><a href="team-2.html">Team Two</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pricing<i class="far fa-angle-right"></i></a>
                                                <ul class="sub-menu-2">
                                                    <li><a href="pricing-1.html">Pricing One</a></li>
                                                    <li><a href="pricing-2.html">Pricing Two</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="portfolio.html">Project<i class="far fa-angle-right"></i></a>
                                                <ul class="sub-menu-2">
                                                    <li><a href="portfolio.html">Project</a></li>
                                                    <li><a href="portfolio-details.html">Project Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="mail-success.html">Mail Success</a></li>
                                            <li><a href="404.html">404 Eror</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog<i class="far fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="blog-details-sidebar.html">Blog Details Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-12">

                <div class="menu-right-btn">
                    <a href="contact.html" class="theme-btn">Get A Quote<i class="far fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="breadcrumbs">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumb-content">
                    <p>We keep safe & secure your data</p>
                    <h3>Contact Us</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumb-menu">
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="contact-details">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-c-details">
                                <div class="contact-d-icon">
                                    <i class="far fa-envelope-open"></i>
                                </div>
                                <div class="contact-d-content">
                                    <h3>Sent Us Email</h3>
                                    <ul>
                                        <li><a href="https://themes.lunartechit.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a3cacdc5cce3c6dbc2ced3cfc68dc0ccce">[email&#160;protected]</a></li>
                                        <li><a href="https://themes.lunartechit.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ddaebcb1b8ae9db8a5bcb0adb1b8f3beb2b0">[email&#160;protected]</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-c-details active">
                                <div class="contact-d-icon">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="contact-d-content">
                                    <h3>Phone Number</h3>
                                    <ul>
                                        <li>+1 123 456 7894</li>
                                        <li>+1 123 456 7895</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-c-details">
                                <div class="contact-d-icon">
                                    <i class="far fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-d-content">
                                    <h3>Office Address</h3>
                                    <ul>
                                        <li>2191 Railroad Street,</li>
                                        <li>New York, USA</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="contact-inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">

                            <div class="contact-map">
                                <iframe id="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96708.34194156103!2d-74.03927096447748!3d40.759040329405195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a01c8df6fb3cb8!2sSolomon%20R.%20Guggenheim%20Museum!5e0!3m2!1sen!2sbd!4v1619410634508!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>

                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="contact-inner-box">
                                <div class="contact-c-title">
                                    <p>Get In Touch</p>
                                    <h3>Send Your Message</h3>
                                </div>
                                <form method="post" action="https://themes.lunartechit.com/24news/assets/php/contact.php" id="contact-form">

                                    <div class="contact-form">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Full name *</label>
                                                    <input type="text" name="Name" placeholder="Enter your name" required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Email Address *</label>
                                                    <input type="email" name="Email" placeholder="Enter your email" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Subject *</label>
                                                    <input type="text" name="Subject" placeholder="Enter your subject" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Message *</label>
                                                    <textarea name="message" placeholder="Enter your message" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="contact-btn">
                                                    <button class="button theme-btn primary" type="submit">Send Message</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-2">
                                                <div class="form-messege text-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-top-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="footer-about-widget">
                                <div class="footer-logo">
                                    <a class="logo" href="index-2.html">
                                        <img src="assets/img/logo.png" alt="#">
                                    </a>
                                </div>
                                <p>We vel ex eu diam aliquam fermentum. Maecenas leo tellus tincidunt auctor massa nec sagittis scelerisque nunc. Cras nisi tellus luctus at nisi venenatis lacinia.</p>
                                <ul class="footer-social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-widget">
                                <h3 class="widget-title">Important Link</h3>
                                <div class="widget-footer-info">
                                    <a href="#"><i class="far fa-angle-double-right"></i>About Us</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Faq</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Our Blog</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Terms & Conditions</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Our Services</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Team Members</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Our Pricing</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-widget f-contact-widget">
                                <h3 class="widget-title">Contact Info</h3>
                                <ul class="f-contact-inner">
                                    <li><i class="far fa-map-marker-alt"></i>2191 Railroad Street, <br />New York, USA</li>
                                    <li><i class="far fa-phone"></i>+1 123 456 7894<br />+1 123 456 7895</li>
                                    <li><i class="far fa-envelope-open"></i><a href="https://themes.lunartechit.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="87eee9e1e8c7e2ffe6eaf7ebe2a9e4e8ea">[email&#160;protected]</a><br /><a href="https://themes.lunartechit.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e192808d8492a18499808c918d84cf828e8c">[email&#160;protected]</a></li>
                                    <li><i class="far fa-clock"></i>Fri-Mon<br />08:00pm - 06:00pm </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-widget f-latest-post">
                                <h3 class="widget-title">Latest Posts</h3>
                                <div class="f-latest-post-inner">
                                    <div class="single-f-post">
                                        <div class="f-post-img">
                                            <img src="assets/img/blog/4.jpg" alt="#">
                                        </div>
                                        <div class="f-post-content">
                                            <h5><a href="blog-details-sidebar.html">Aenean venenatis lorem massa nec rutrum</a></h5>
                                            <span class="f-post-date"><i class="far fa-calendar-alt"></i> June 27, 2021</span>
                                        </div>
                                    </div>
                                    <div class="single-f-post">
                                        <div class="f-post-img">
                                            <img src="assets/img/blog/5.jpg" alt="#">
                                        </div>
                                        <div class="f-post-content">
                                            <h5><a href="blog-details-sidebar.html">Etiam nisi odio malesuada non pretium ut</a></h5>
                                            <span class="f-post-date"><i class="far fa-calendar-alt"></i> June 27, 2021</span>
                                        </div>
                                    </div>
                                    <div class="single-f-post">
                                        <div class="f-post-img">
                                            <img src="assets/img/blog/6.jpg" alt="#">
                                        </div>
                                        <div class="f-post-content">
                                            <h5><a href="blog-details-sidebar.html">Ociosqu ad litora torquent perlo conubia</a></h5>
                                            <span class="f-post-date"><i class="far fa-calendar-alt"></i> June 27, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-inner">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="copyright-text">&copy;Copyright 2021 <a href="#">DATAXO</a> All Rights Reserved.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="footer-bottom-right">
                                    <a href="#">Support</a>
                                    <a href="#">Privacy Policy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<a href="#" class="scrollToTop"><i class="far fa-long-arrow-up"></i></a>
<?php $this->endBody() ?>
</body>

<!-- Mirrored from themes.lunartechit.com/dataxo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 05:29:06 GMT -->
</html>
<?php $this->endPage();