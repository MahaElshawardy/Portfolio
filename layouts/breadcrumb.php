<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/10.jpg);">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="title-box">
                        <h1><?= $breadcrumb ?></h1>
                        <span class="title"><?php if(isset($info)){echo $info;} ?></span>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li><?= $breadcrumb1 ?></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->