<?php
include_once __DIR__."\..\..\app\middleware\auth.php";
if (empty($_SESSION['user'])) {
    header('location:login.php');
    die;
}
require "../app/models/User.php";
$AdminObject = new User;

//-------------------get Admin ------------
$AdminObject->setUser_ID($_SESSION['user']->User_ID);
$result = $AdminObject->getAdminById();
$Admin = $result->fetch_object();
$Position = $Admin->Position;
$imageDefault = $Admin->Image;
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: black;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="background: black;">
        <img src="../images/Logo_Black.png" alt="GYM" class=" brand-text font-weight-light" style="opacity: .8;height: 46px;margin-left: 65px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 pt-3 mb-3 d-flex">
            <div class="image">
                <?php if($imageDefault == NULL) :?>
                    <img src="dist/img/Admin/default.jpg" class="img-circle elevation-2" alt="Amdin Image">
                <?php else: ?>
                    <img src="dist/img/Admin/<?= $Admin->Image ?>" class="img-circle elevation-2" alt="Amdin Image">
                <?php endif ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=
             $Admin->Name;
            // print_r($_SESSION['user']);
             ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar " style="background: black;" type="search"
                    placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-dark">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if($Position == "Admin"): ?>
                    <li class="nav-item menu-open">
                        <a href="index.php" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="data_admin.php" class="nav-link">
                            <i class="fa fa-user nav-icon"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="data_services.php" class="nav-link">
                        <i class="fas fa-user-cog" style="margin-left: 3px;padding-right: 7px;"></i>
                            <p>Services</p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="data_banners.php" class="nav-link">
                            <i class="fas fa-file-alt" style="margin-left: 8px;padding-right: 7px;"></i>
                            <p>Banners</p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="data_projects.php" class="nav-link">
                            
                        <i class="fas fa-tasks"  style="margin-left: 8px;padding-right: 7px;"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="data_images.php" class="nav-link">
                        <i class="fas fa-image" style="margin-left: 8px;padding-right: 7px;"></i>
                            <p>Images</p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="mailbox.php" class="nav-link">
                        <i class="fas fa-inbox" style="margin-left: 8px;padding-right: 7px;"></i>
                            <p>Massage</p>
                        </a>
                    </li>
                <?php else :?>
                    <li class="nav-item menu-open">
                        <a href="data_projects.php" class="nav-link">
                        <i class="fas fa-tasks"  style="margin-left: 8px;padding-right: 7px;"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="data_images.php" class="nav-link">
                        <i class="fas fa-image" style="margin-left: 8px;padding-right: 7px;"></i>
                            <p>Images</p>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?> <span><?php if(isset($icon)){echo $icon;} ?></span></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
