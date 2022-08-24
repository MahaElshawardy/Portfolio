<?php 
$title = "A|Sh Architects";
include_once "layouts/header.php";
include_once "layouts/nav.php";
$breadcrumb = "Project Detail";
$breadcrumb1 = "Project Detail";
include_once "layouts/breadcrumb.php";
include_once "app/models/Project.php";

if ($_GET) {
    if (isset($_GET['Projects_ID'])) {
        if (is_numeric($_GET['Projects_ID'])) {
            // check if id exists in your db
            $projectObject = new project;
            $projectObject->setProjects_ID($_GET['Projects_ID']);
            $projectData = $projectObject->getProjectDetails();
            if ($projectData) {
              $projectResult = $projectData->fetch_object();
            //   print_r($projectResult);die;
            } else {
                header('location:layout/errors/404.php');
                die;
            }
        } else {
            header('location:layout/errors/404.php');
            die;
        }
    } else {
        header('location:layout/errors/404.php');
        die;
    }
  } else {
    header('location:layout/errors/404.php');
    die;
  }
?>

    <!--Project Detail Section-->
    <section class="project-details-section">
        <div class="project-detail">
            <div class="auto-container">
                <!-- Upper Box -->
                <div class="upper-box">
                    <!--Project Tabs-->
                    <div class="project-tabs tabs-box clearfix">
                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix">
                            <li data-tab="#tab-1" class="tab-btn active-btn"><img src="images/project/<?= $projectResult->name_image?>" alt=""></li>
                            <li data-tab="#tab-2" class="tab-btn"><img src="images/project/<?= $projectResult->Name2?>" alt=""></li>
                            <li data-tab="#tab-3" class="tab-btn"><img src="images/project/<?= $projectResult->Name3?>" alt=""></li>
                        </ul>
                        
                        <!--Tabs Container-->
                        <div class="tabs-content">
                            <!--Tab / Active Tab-->
                            <div class="tab active-tab" id="tab-1">
                                <figure class="image"><a href="images/resource/project-single-1.jpg" class="lightbox-image" data-fancybox="images"><img src="images/resource/project-single-1.jpg" alt=""></a></figure>
                            </div>

                            <!--Tab-->
                            <div class="tab" id="tab-2">
                                <figure class="image"><a href="images/resource/project-single-2.jpg" class="lightbox-image" data-fancybox="images"><img src="images/resource/project-single-2.jpg" alt=""></a></figure>
                            </div>

                            <!--Tab-->
                            <div class="tab" id="tab-3">
                                <figure class="image"><a href="images/resource/project-single-3.jpg" class="lightbox-image" data-fancybox="images"><img src="images/resource/project-single-3.jpg" alt=""></a></figure>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Lower Content-->
                <div class="lower-content"> 
                    <div class="row clearfix">
                        <!--Content Column-->
                        <div class="content-column col-lg-8 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>Project Descripation</h2>
                                <p><?= $projectResult->Desc?></p> 
                            </div>
                        </div>
                        
                        <!--Info Column-->
                        <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                            <div class="inner-column wow fadeInRight">
                                <h3>Project Information</h3>
                                <p><?= $projectResult->Information?></p>
                                <ul class="info-list">
                                    <li><strong>Client :</strong> <?= $projectResult->Clint?></li>
                                    <li><strong>Location :</strong> <?= $projectResult->Location?></li>
                                    <?php $projects = $projectResult->Surface_Area;?>
                                    <?php if($projects != '') echo "<li><strong>Surface Area :</strong>". $projects ."</li>";?>
                                    <li><strong>Year Completed :</strong> <?= $projectResult->Year_Completed?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Portfolio Details-->

<?php 
include_once "layouts/footer.php";
?>