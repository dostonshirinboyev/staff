<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $userPersonalData UserPersonalDataRepository */

use pf\assets\AppAsset;
use settings\repositories\user\UserPersonalDataRepository;
use yii\helpers\Html;
$userPersonalData = (new UserPersonalDataRepository())->get(Yii::$app->user->id);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v3.8.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<!-- Loader -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div> -->
<!-- Loader -->

<!-- Navbar STart -->
<?= $this->render(
    'header',
    ['userPersonalData' => $userPersonalData]
); ?>
<!-- Navbar End -->

<!-- Hero Start -->
<section class="bg-half-170 d-table w-100">
    <div class="container">
        <div class="row mt-5 align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="title-heading me-lg-4">
                    <h1 class="heading mb-3">Our Creativity Is Your <span class="text-primary">Success</span> </h1>
                    <p class="para-desc text-muted">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                    <div class="mt-4">
                        <a href="page-contact-one.html" class="btn btn-primary mt-2 me-2"><i class="uil uil-envelope"></i> Get Started</a>
                        <a href="documentation.html" class="btn btn-outline-primary mt-2"><i class="uil uil-book-alt"></i> Documentation</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <img src="images/illustrator/Startup_SVG.svg" alt="">
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Partners start -->
<section class="py-4 border-bottom border-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="images/client/amazon.svg" class="avatar avatar-ex-sm" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="images/client/google.svg" class="avatar avatar-ex-sm" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="images/client/lenovo.svg" class="avatar avatar-ex-sm" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="images/client/paypal.svg" class="avatar avatar-ex-sm" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="images/client/shopify.svg" class="avatar avatar-ex-sm" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="images/client/spotify.svg" class="avatar avatar-ex-sm" alt="">
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Partners End -->

<!-- How It Work Start -->
<section class="section bg-light border-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">How It Work ?</h4>
                    <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 mt-4 pt-2">
                <img src="images/illustrator/SEO_SVG.svg" alt="">
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 pt-2">
                <div class="section-title ms-lg-5">
                    <h4 class="title mb-4">Change the way you build websites</h4>
                    <p class="text-muted">You can combine all the Landrick templates into a single one, you can take a component from the Application theme and use it in the Website.</p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                    </ul>
                    <a href="javascript:void(0)" class="mt-3 h6 text-primary">Find Out More <i class="uil uil-angle-right-b align-middle"></i></a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title">
                    <h4 class="title mb-4">Speed up your development <br> with <span class="text-primary">Landrick.</span></h4>
                    <p class="text-muted">Using Landrick to build your site means never worrying about designing another page or cross browser compatibility. Our ever-growing library of components and pre-designed layouts will make your life easier.</p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                    </ul>
                    <a href="javascript:void(0)" class="mt-3 h6 text-primary">Find Out More <i class="uil uil-angle-right-b align-middle"></i></a>
                </div>
            </div><!--end col-->

            <div class="col-lg-5 col-md-6 order-1 order-md-2">
                <div class="card rounded border-0 shadow ms-lg-5">
                    <div class="card-body">
                        <img src="images/illustrator/Mobile_notification_SVG.svg" alt="">

                        <div class="content mt-4 pt-2">
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Name : <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control ps-5" placeholder="Name" name="name" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email : <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control ps-5" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Password : <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="form-control ps-5" placeholder="Password" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12 mt-2 mb-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Download</button>
                                        </div>
                                    </div><!--end col-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- How It Work End -->

<!-- Testi Start -->
<section class="section pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h6>We believe in building each other and hence</h6>
                    <h4 class="title mb-4">Work with some amazing partners</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12 mt-4">
                <div class="tiny-three-item">
                    <div class="tiny-slide text-center">
                        <div class="client-testi rounded shadow m-2 p-4">
                            <img src="images/client/amazon.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt="">
                            <p class="text-muted mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. "</p>
                            <h6 class="text-primary">- Thomas Israel</h6>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="client-testi rounded shadow m-2 p-4">
                            <img src="images/client/google.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt="">
                            <p class="text-muted mt-4">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <h6 class="text-primary">- Carl Oliver</h6>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="client-testi rounded shadow m-2 p-4">
                            <img src="images/client/lenovo.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt="">
                            <p class="text-muted mt-4">" One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others. "</p>
                            <h6 class="text-primary">- Barbara McIntosh</h6>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="client-testi rounded shadow m-2 p-4">
                            <img src="images/client/paypal.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt="">
                            <p class="text-muted mt-4">" Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts. "</p>
                            <h6 class="text-primary">- Jill Webb</h6>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="client-testi rounded shadow m-2 p-4">
                            <img src="images/client/shopify.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt="">
                            <p class="text-muted mt-4">" There is now an abundance of readable dummy texts. These are usually used when a text is required. "</p>
                            <h6 class="text-primary">- Dean Tolle</h6>
                        </div>
                    </div>

                    <div class="tiny-slide text-center">
                        <div class="client-testi rounded shadow m-2 p-4">
                            <img src="images/client/spotify.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt="">
                            <p class="text-muted mt-4">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero. "</p>
                            <h6 class="text-primary">- Christa Smith</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Testi End -->

<!-- Pricing Start -->
<section class="section">
    <div class="container">
        <div class="row mt-lg-4 align-items-center">
            <div class="col-lg-5 col-md-12 text-center text-lg-start">
                <div class="section-title mb-4 mb-lg-0 pb-2 pb-lg-0">
                    <h4 class="title mb-4">Our Comfortable Rates</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                    <a href="https://1.envato.market/4n73n" target="_blank" class="btn btn-primary mt-4">Buy Now <span class="badge rounded-pill bg-danger ms-2">v3.8</span></a>
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="ms-lg-5">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12 px-md-0">
                            <div class="card pricing-rates starter-plan shadow rounded border-0">
                                <div class="card-body py-5">
                                    <h6 class="title fw-bold text-uppercase text-primary mb-4">Starter</h6>
                                    <div class="d-flex mb-4">
                                        <span class="h4 mb-0 mt-2">$</span>
                                        <span class="price h1 mb-0">39</span>
                                        <span class="h4 align-self-end mb-1">/mo</span>
                                    </div>

                                    <ul class="list-unstyled mb-0 ps-0">
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Free Appointments</li>
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Enhanced Security</li>
                                    </ul>
                                    <a href="javascript:void(0)" class="btn btn-primary mt-4">Get Started</a>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-md-6 col-12 mt-4 pt-2 pt-sm-0 mt-sm-0 px-md-0">
                            <div class="card pricing-rates bg-light shadow rounded border-0">
                                <div class="card-body py-5">
                                    <h6 class="title fw-bold text-uppercase text-primary mb-4">Professional</h6>
                                    <div class="d-flex mb-4">
                                        <span class="h4 mb-0 mt-2">$</span>
                                        <span class="price h1 mb-0">59</span>
                                        <span class="h4 align-self-end mb-1">/mo</span>
                                    </div>

                                    <ul class="list-unstyled mb-0 ps-0">
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Free Appointments</li>
                                        <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Enhanced Security</li>
                                    </ul>
                                    <a href="javascript:void(0)" class="btn btn-primary mt-4">Try it now</a>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-light">
        <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Pricing End -->

<!-- FAQ n Contact Start -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="d-flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                    <div class="flex-1">
                        <h5 class="mt-0">How our <span class="text-primary">Landrick</span> work ?</h5>
                        <p class="answer text-muted mb-0">Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="d-flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                    <div class="flex-1">
                        <h5 class="mt-0"> What is the main process open account ?</h5>
                        <p class="answer text-muted mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making a neutral judgement on the visual impact</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-6 col-12 mt-4 pt-2">
                <div class="d-flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                    <div class="flex-1">
                        <h5 class="mt-0"> How to make unlimited data entry ?</h5>
                        <p class="answer text-muted mb-0">Furthermore, it is advantageous when the dummy text is relatively realistic so that the layout impression of the final publication is not compromised.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-6 col-12 mt-4 pt-2">
                <div class="d-flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                    <div class="flex-1">
                        <h5 class="mt-0"> Is <span class="text-primary">Landrick</span> safer to use with my account ?</h5>
                        <p class="answer text-muted mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin.</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row my-md-5 pt-md-3 my-4 pt-2 pb-lg-4 justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title mb-4">Have Question ? Get in touch!</h4>
                    <p class="text-muted para-desc mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                    <a href="page-contact-two.html" class="btn btn-primary mt-4"><i class="uil uil-phone"></i> Contact us</a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-footer">
        <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- FAQ n Contact End -->

<!-- Footer Start -->
<?= $this->render(
    'footer',
    ['userPersonalData' => $userPersonalData]
); ?>
<!-- Footer End -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header p-4 border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="images/logo-dark.png" height="24" class="light-version" alt="">
            <img src="images/logo-light.png" height="24" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
    </div>
    <div class="offcanvas-body p-4">
        <div class="row">
            <div class="col-12">
                <img src="images/contact.svg" class="img-fluid d-block mx-auto" style="max-width: 256px;" alt="">
                <div class="card border-0 mt-5" style="z-index: 1">
                    <div class="card-body p-0">
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <p id="error-msg" class="mb-0"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="book" class="fea icon-sm icons"></i>
                                            <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comments <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                            <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>

    <div class="offcanvas-footer p-4 border-top text-center">
        <ul class="list-unstyled social-icon social mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/4n73n" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
        </ul><!--end icon-->
    </div>
</div>
<!-- Offcanvas End -->

<!-- Cookies Start -->
<div class="cookie-popup bg-white shadow rounded py-3 px-4">
    <p class="text-muted mb-0">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="https://shreethemes.in" target="_blank" class="text-success h6">use of cookies</a></p>
    <div class="cookie-popup-actions text-end">
        <button><i class="uil uil-times text-dark fs-4"></i></button>
    </div>
</div><!--Note: Cookies Js including in plugins.init.js (path like; js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
<!-- Cookies End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
<!-- Back to top -->

<!-- Style switcher -->
<div id="style-switcher" class="bg-light border p-3 pt-2 pb-2" onclick="toggleSwitcher()">
    <div>
        <h6 class="title text-center">Select Your Color</h6>
        <ul class="pattern">
            <li class="list-inline-item">
                <a class="color1" href="javascript: void(0);" onclick="setColor('default')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color2" href="javascript: void(0);" onclick="setColor('green')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color3" href="javascript: void(0);" onclick="setColor('purple')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color4" href="javascript: void(0);" onclick="setColor('red')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color5" href="javascript: void(0);" onclick="setColor('skyblue')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color6" href="javascript: void(0);" onclick="setColor('skobleoff')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color7" href="javascript: void(0);" onclick="setColor('cyan')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color8" href="javascript: void(0);" onclick="setColor('slateblue')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color9" href="javascript: void(0);" onclick="setColor('yellow')"></a>
            </li>
        </ul>

        <h6 class="title text-center pt-3 mb-0 border-top">Theme Option</h6>
        <ul class="text-center list-unstyled">
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary rtl-version t-rtl-light mt-2" onclick="setTheme('style-rtl')">RTL</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary ltr-version t-ltr-light mt-2" onclick="setTheme('style')">LTR</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-rtl-version t-rtl-dark mt-2" onclick="setTheme('style-dark-rtl')">RTL</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-ltr-version t-ltr-dark mt-2" onclick="setTheme('style-dark')">LTR</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark dark-version t-dark mt-2" onclick="setTheme('style-dark')">Dark</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark light-version t-light mt-2" onclick="setTheme('style')">Light</a></li>
        </ul>

        <h6 class="title text-center pt-3 mb-0 border-top">Admin</h6>
        <ul class="text-center list-unstyled mb-0">
            <li><a href="javascript:void(0)" target="_blank" class="btn btn-sm btn-block btn-success mt-2">Admin Dashboard</a></li>
        </ul>
    </div>
    <div class="bottom">
        <a href="javascript: void(0);" class="settings bg-white title-bg-dark shadow d-block"><i class="mdi mdi-cog ms-1 mdi-24px position-absolute mdi-spin text-primary"></i></a>
    </div>
</div>
<!-- end Style switcher -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();