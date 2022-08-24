<?php 
$title = "A|Sh Architects";
include_once "layouts/header.php";
include_once "layouts/nav.php";
$breadcrumb = "Contact Us";
$info = "The Interior speak for themselves";
$breadcrumb1 = "Contact Us";
include_once "layouts/breadcrumb.php";
?>


        <!-- Contact Page Section -->
        <section class="contact-page-section">
            <div class="auto-container">
                <div class="row">
                    <!-- Form Column -->
                    <div class="form-column col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="float-text">Contact</span>
                                <h2><?= $breadcrumb ?></h2>
                            </div>
                            <div class="contact-form1">
                                <div class="">
                                    <div class="contact-form col-lg-8 col-md-12 col-sm-12">
                                        <!--  id="contact-form" -->
                                        <form method="post" action="app/post/contact.php">
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                    <input type="text" name="username" placeholder="Name" required>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                    <input type="text" name="phone" placeholder="Phone" required>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                    <input type="email" name="email" placeholder="Email" required>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                    <textarea name="message" placeholder="Massage" required></textarea>
                                                </div>
                                                <?php
                                                    if (!empty($_SESSION['errors']['name'])) {
                                                        foreach ($_SESSION['errors']['name'] as $key => $value) {
                                                            echo "<div class='alert alert-danger'>$value</div>";
                                                        }
                                                    }
                                                    if (!empty($_SESSION['errors']['phone'])) {
                                                        foreach ($_SESSION['errors']['phone'] as $key => $value) {
                                                            echo "<div class='alert alert-danger'>$value</div>";
                                                        }
                                                    }
                                                    if (!empty($_SESSION['errors']['email'])) {
                                                        foreach ($_SESSION['errors']['email'] as $key => $value) {
                                                            echo "<div class='alert alert-danger'>$value</div>";
                                                        }
                                                    }
                                                    if (!empty($_SESSION['errors']['message'])) {
                                                        foreach ($_SESSION['errors']['message'] as $key => $value) {
                                                            echo "<div class='alert alert-danger'>$value</div>";
                                                        }
                                                    }
                                                    if (isset($_SESSION['massage'])) {
                                                        $session = $_SESSION['massage'];
                                                        echo "<script type='text/javascript'>alert('$session');</script>";
                                                    }
                                                    ?>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                    <button class="theme-btn btn-style-one" type="submit"
                                                        name="contact">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                                <div class="contact-info col-lg-4 col-md-12 col-sm-12">
                                    <div class="">
                                        <div class="info-block col-lg-12 col-md-4 col-sm-12">
                                            <div class="inner">
                                                <h4>Location</h4>
                                                <p>Complax interprice company, 882 street Latrobe, PA 15786</p>
                                            </div>
                                        </div>

                                        <div class="info-block col-lg-12 col-md-4 col-sm-12">
                                            <div class="inner">
                                                <h4>Call Us</h4>
                                                <p>+88 169 787 5256</p>
                                                <p>+88 165 358 5678</p>
                                            </div>

                                        </div>

                                        <div class="info-block col-lg-12 col-md-4 col-sm-12">
                                            <div class="inner">
                                                <h4>Email</h4>
                                                <p><a href="#">support@info.com</a></p>
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
    </section>
    <!--End Contact Page Section -->

<?php 
include_once "layouts/footer.php";
?>