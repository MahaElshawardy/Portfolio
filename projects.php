<?php
$title ="A|Sh Architects";
include_once "layouts/header.php";
include_once "layouts/nav.php";
$breadcrumb = "Projects";
$breadcrumb1 = "Projects";
include_once "layouts/breadcrumb.php";
include_once "app/models/Subcategory.php";
include_once "app/models/Project.php";

$subcategoriesObject = new Subcategory;
$subcategoriesObject->setStatue(1);
$subcategoriesResult = $subcategoriesObject->read();
//-------------project---------------------
$projectObject = new Project;
$projectObject->setStatue(1);
$projcetResult = $projectObject->projectByStatue();

$projectBySub =$projectObject->getProjectBySub();
?>
    <!-- Projects Section -->
    <section class="projects-section alternate">
        <div class="auto-container">
             <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters text-center clearfix">                     
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All</li>
                        <?php if($subcategoriesResult): ?>
                        <?php $subcategories = $subcategoriesResult->fetch_all(MYSQLI_ASSOC); ?>
                        <?php foreach ($subcategories as $key => $subcategory) :?>
                        <li class="filter" data-role="button" data-filter=".<?= $subcategory['Name']?>"><?= $subcategory['Name']?></li>
                        <?php endforeach ?>
                        <?php endif ?>
                    </ul>                                                  
                </div>

                <div class="filter-list row">
                    <!-- Project Block -->
                    <?php if($projectBySub) :?>
                        <?php $projectBySubs= $projectBySub->fetch_all(MYSQLI_ASSOC);//print_r($projectBySubs);die?>
                        <?php foreach ($projectBySubs as $key => $projectBySub) :?>
                    <div class="project-block all mix <?= $projectBySub['name_sub']?>  col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/project/<?= $projectBySub['name_image']?>" alt=""></figure>
                            <div class="overlay-box">
                                <h4><a href="project-detail.php?Projects_ID=<?= $projectBySub['Projects_ID']?>"><?= $projectBySub['Name']?><br>Project</a></h4>
                                <div class="btn-box">
                                    <a href="project-detail.php?Projects_ID=<?= $projectBySub['Projects_ID']?>"><i class="fa fa-external-link"></i></a>
                                </div>
                                <span class="tag"><?= $projectBySub['name_sub']?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </section>

    <!--End Contact Section -->

<?php
include_once "layouts/footer.php";
?>