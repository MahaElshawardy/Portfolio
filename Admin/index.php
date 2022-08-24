<?php
$title = "Dashboard";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
if (empty($_SESSION['user'])) {
    header('location:login.php');
    die;
}
spl_autoload_register(function($models){
    require '../app/models/' . $models .'.php';
});
$AdminObject = new User;
$visitorObject = new Visitor;

//-------------------get Admin ------------
$AdminObject->setUser_ID($_SESSION['user']->User_ID);
$result = $AdminObject->getAdminById();
$Admin = $result->fetch_object();
//-------------------All Admins-------------
$AdminResult = $AdminObject->read();
$admin = $AdminResult->fetch_all(MYSQLI_ASSOC);
//-----------------permissions---------------
$Position = $Admin->Position;
//-------------------visitor -----------------------
$visitorsResult = $visitorObject->read();
$visitors = $visitorsResult->fetch_object();

?>
<div class="row">
    <?php if($Position == 'Admin'): ?>
    <div class="col-md-8">
        <!-- TABLE: MEMBERS -->
        <div class="card">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Admin</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0" data-page-length='3'>
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admin as $key => $value) :?>
                                <tr>
                                    <td> <?= $value['User_ID']?> </td>
                                    <td> <?= $value['Name']?> </td>
                                    <td> <?= $value['Email']?> </td>
                                    <td> <?= $value['Position']?> </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="add_Admin.php" class="btn btn-sm btn-info float-left">New Admin</a>
                    <a href="data_admin.php" class="btn btn-sm btn-secondary float-right">View All Admin</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- TABLE: MEMBERS -->
    </div>
    <div class="col-md-4">
        <!-- Info Right col -->
        <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">All Visitors</span>
                <span class="info-box-number"><?= $visitors->visitor ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <?php else: ?>

    <div class="col-md-12">
        <!-- TABLE: MEMBERS -->
        <div class="card">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Projects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0" data-page-length='3'>
                            <thead>
                                <tr>
                                    <th>Projects ID </th>
                                    <th>Name</th>
                                    <th>Desc</th>
                                    <th>Clint</th>
                                    <th>Location</th>
                                    <th>Surface Area</th>
                                    <th>Year Completed</th>
                                    <th>User Name</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects as $key => $Project) :?>
                                <tr>
                                    <td><a href="#"><?= $Project['Projects_ID'] ?></a></td>
                                    <td><?= $Project['Name'] ?></td>
                                    <td><?= $Project['Desc'] ?></td>
                                    <td><?= $Project['Clint'] ?></td>
                                    <td><?= $Project['Location'] ?></td>
                                    <td><?= $Project['Surface_Area'] ?></td>
                                    <td><?= $Project['Year_Completed'] ?></td>
                                    <td><?= $Project['User_ID'] ?></td>
                                    <td><?= $Project['Created_at'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="add_projects.php" class="btn btn-sm btn-info float-left">New Project</a>
                    <a href="data_projects.php" class="btn btn-sm btn-secondary float-right">View All Projects</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- TABLE: MEMBERS -->
    </div>
    <?php endif ?>
</div>

<?php
include_once "layout/footer.php";