<?php 
$title = "A|Sh Architects";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/models/Service.php";
include_once "app/models/Banner.php";
include_once "app/models/Project.php";
include_once "app/models/Visitor.php";
include_once "app/requests/Validation.php";
$serviceObject = new Service;
$serviceResult = $serviceObject->read();

//--------------banner---------------------
$bannerObject = new Banner;
$bannerResult = $bannerObject->read();

//-------------project---------------------
$projectObject = new Project;
$projectObject->setStatue(1);
$projcetResult = $projectObject->projectByStatue();

//---------------visitor------------------------

    $visitorValidation = new Validation('Ip_Adresses',$_SERVER['REMOTE_ADDR']);
    $visitorRequiredResult = $visitorValidation->required();
    if(empty($visitorRequiredResult)){
            $visitorUniqueResult = $visitorValidation->unique('visitors');
            if(!empty($visitorUniqueResult)){  
                $_SESSION['errors']['visitor']['unique'] = $visitorUniqueResult;
            }
    }else{
        $_SESSION['errors']['visitor']['required'] = $visitorRequiredResult;
    }

    $visitorValidation = new Validation('Server_Name',$_SERVER['SERVER_NAME']);
    $visitorRequiredResult = $visitorValidation->required();
    if(empty($visitorRequiredResult)){
            $visitorUniqueResult = $visitorValidation->unique('visitors');
            if(!empty($visitorUniqueResult)){  
                $_SESSION['errors']['visitor']['unique'] = $visitorUniqueResult;
            }
    }else{
        $_SESSION['errors']['visitor']['required'] = $visitorRequiredResult;
    }

    $visitorValidation = new Validation('User_Agent',$_SERVER['HTTP_USER_AGENT']);
    $visitorRequiredResult = $visitorValidation->required();
    if(empty($visitorRequiredResult)){
            $visitorUniqueResult = $visitorValidation->unique('visitors');
            if(!empty($visitorUniqueResult)){  
                $_SESSION['errors']['visitor']['unique'] = $visitorUniqueResult;
            }
    }else{
        $_SESSION['errors']['visitor']['required'] = $visitorRequiredResult;
    }
    $visitorValidation = new Validation('User_Agent',$_SERVER['SERVER_SIGNATURE']);
    $visitorRequiredResult = $visitorValidation->required();
    if(empty($visitorRequiredResult)){
            $visitorUniqueResult = $visitorValidation->unique('visitors');
            if(!empty($visitorUniqueResult)){  
                $_SESSION['errors']['visitor']['unique'] = $visitorUniqueResult;
            }
    }else{
        $_SESSION['errors']['visitor']['required'] = $visitorRequiredResult;
    }
    if(empty($_SESSION['errors'])){
        $visitorObject = new Visitor;
        $visitorObject->setIp_Adresses($_SERVER['REMOTE_ADDR']);
        $visitorObject->setServer_Name($_SERVER['SERVER_NAME']);
        $visitorObject->setUser_Agent($_SERVER['HTTP_USER_AGENT']);
        $visitorObject->setSignature($_SERVER['SERVER_SIGNATURE']);
        $result = $visitorObject->create();
    }
?>
    
    <!-- Bnner Section -->
    <section class="banner-section-five full-screen">
        <div class="banner-carousel owl-carousel owl-theme">

            <!-- Slide Item -->
            <?php if($bannerResult) : ?>
            <?php $banners = $bannerResult->fetch_all(MYSQLI_ASSOC); ?>
            <?php foreach ($banners as $key => $banner) :?>
            <div class="slide-item" style="background-image: url(images/main-slider/<?= $banner['Image']?>);">
                <div class="auto-container">
                    <div class="content-box">
                        <span class="title">Residence</span>
                        <h2><?= $banner['Info']?> <br><?= $banner['Info2']?></h2>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>

        </div>

        <div class="social-links">
            <ul class="social-icon-three">
                <li><a href="https://www.instagram.com/ash_architects/"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.facebook.com/ash.architects1?notif_id=1653226491153637&notif_t=page_invite_accept&ref=notif"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://wa.me/message/3VDFGGHW35EDD1"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- End Bnner Section -->

    <!-- Specialize Section -->
    <section class="specialize-section active" id="Services">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Services</span>
                <h2>Our Services</h2>
            </div>

            <div class="services-carousel-two owl-carousel owl-theme">
                <!-- Service Block -->
                <?php if($serviceResult): ?>
                <?php $services = $serviceResult->fetch_all(MYSQLI_ASSOC); //print_r($services);die;?>
                <?php foreach ($services as $key => $service) :?>
                <div class="service-block-two">
                    <div class="inner-box">
                        <div class="image-box"><figure class="image"><img src="images/resource/<?= $service['Image']?>" alt=""></figure></div>
                        <div class="caption-box">
                            <h3><?= $service['Name']?></h3>
                            <div class="link-box">
                                <p><?= $service['Desc']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!-- Projects Section Two -->
    <section class="projects-section-two">
        <div class="auto-container">
            <div class="upper-box clearfix">
                <div class="sec-title">
                    <span class="float-text">Project</span>
                    <h2>Latest Work</h2>
                </div>
                <div class="link-box"><a href="projects.php">All Project <i class="fa fa-long-arrow-right"></i></a></div>
            </div>
            <div class="projects-carousel-two owl-carousel owl-theme">
                <?php if($projcetResult) :?>
                <?php $projects = $projcetResult->fetch_all(MYSQLI_ASSOC); //print_r($projects);die; ?>
                <?php foreach ($projects as $key => $project) : ?>
                <!-- Project Block -->
                <div class="project-block-two">
                    <div class="image-box">
                        <figure class="image"><img src="images/project/<?= $project['name_image']?>" alt=""></figure>
                    </div>
                    <div class="info-box">
                        <div class="inner-box">
                            <span class="title">RESIDENTAL</span>  
                            <h3><?= $project['Name']?></h3>
                            <div class="text"><?= $project['Desc']?></div>
                            <div class="link-box"><a href="project-detail.php">View Project</a></div>
                        </div> 
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--End Projects Section Two -->


    <!-- Main Footer -->
<?php 
include_once "layouts/footer.php";
?>