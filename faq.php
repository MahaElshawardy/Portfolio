<?php 
$title = "A|Sh Architects";
include_once "layouts/header.php";
include_once "layouts/nav.php";
$breadcrumb = "Faquality Ask Question";
$breadcrumb1 = "FAQ's";
include_once "layouts/breadcrumb.php";
?>
    

    <!-- FAQ Section -->
    <section class="faq-section"> 
        <div class="auto-container">
            <div class="row">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/faq-img.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>

                <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text">some FAQ’s</span>
                            <h2>Frequality Asked Questions</h2>
                        </div>
                        <ul class="accordion-box">
                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active">Do you do the design and the execution yourselves? <div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text">We give a Contra for a Period of 5 years and promise to rectify any fault arising out of faulty workmanship at our cost. However the guarantee does not hold good for mishandling and breakable items.</div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block ">
                                <div class="acc-btn ">Do you give Contra and After sales service? <div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content ">
                                    <div class="content">
                                        <div class="text">We give a Contra for a Period of 5 years and promise to rectify any fault arising out of faulty workmanship at our cost. However the guarantee does not hold good for mishandling and breakable items.</div> 
                                    </div>
                                </div>
                            </li>
                            
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Will you be able to give a quote, if given the floor plan? <div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">We give a Contra for a Period of 5 years and promise to rectify any fault arising out of faulty workmanship at our cost. However the guarantee does not hold good for mishandling and breakable items.</div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">At what stage an interior designing work could be started?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">We give a Contra for a Period of 5 years and promise to rectify any fault arising out of faulty workmanship at our cost. However the guarantee does not hold good for mishandling and breakable items.</div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Do you charge for giving a Proposal?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">We give a Contra for a Period of 5 years and promise to rectify any fault arising out of faulty workmanship at our cost. However the guarantee does not hold good for mishandling and breakable items.</div> 
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End FAQ Section -->

    <!-- Faq Form Section -->
    <section class="faq-form-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Question</span>
                <h2>Your Question ?</h2>
            </div>


            <!-- Faq Form -->
            <div class="faq-form">
                <form method="post" action="#">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" name="username" placeholder="Name" required>
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-12">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <textarea name="message" placeholder="Massage"></textarea>
                        </div>
                        
                        <div class="form-group col-lg-12 col-md-12">
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--End Contact Section -->
<?php 
include_once "layouts/footer.php";
?>