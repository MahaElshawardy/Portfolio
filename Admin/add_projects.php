<?php
$title = "Add Project";
include_once "include/include.php";
include_once "../app/middleware/auth.php";

spl_autoload_register(function($models){
    require '../app/models/' . $models .'.php';
});
$subcategoryObject = new Subcategory;

//-----------------subcategories-------------------
$subcategoryObject->setStatue(1);
$subresult = $subcategoryObject->read();
$subs = $subresult->fetch_all(MYSQLI_ASSOC);
?>

<div class="container-fluid row">
    <div class="card  col-md-6 offset-3">
        <div class="card-header">
            <h3 class="card-title"><b>Add</b></h3>
        </div>

        <!-- form start -->
        <form action="../app/post/add_project.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="Info">Name Of Project </label>
                    <input type="text" name="Name" value="<?php if(isset($_SESSION['Name'])){echo $_SESSION['Name'];} ?>"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Email">Description</label>
                    <input type="text" name="Description"
                        value="<?php if(isset($_SESSION['Description'])){echo $_SESSION['Description'];} ?>"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Phone_Number">Clint</label>
                    <input type="text" name="Clint" value="<?php if(isset($_SESSION['Clint'])){echo $_SESSION['Clint'];} ?>"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Info">Location</label>
                    <input type="text" name="Location"
                        value="<?php if(isset($_SESSION['Location'])){echo $_SESSION['Location'];} ?>" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <label for="Info">Surface Area</label>
                    <input type="text" name="Surface"
                        value="<?php if(isset($_SESSION['Surface'])){echo $_SESSION['Surface'];} ?>" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <label for="Info">Year Completed</label>
                    <input type="date" name="Year" value="<?php if(isset($_SESSION['Year'])){echo $_SESSION['Year'];} ?>"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sub">Subcategories</label>
                    <select name="sub" class="form-control custom-select"required>
                        <option selected disabled>Select one</option>
                        <?php foreach ($subs as $key => $sub) : ?>
                        <option value="<?= $sub['Subcategory_ID']?>"><?= $sub['Name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <?php
              if (!empty($_SESSION['errors']['name'])) {
                  foreach ($_SESSION['errors']['name'] as $key => $value) {
                      echo "<div class='alert alert-danger'>$value</div>";
                  }
              }
              if (!empty($_SESSION['errors']['description'])) {
                  foreach ($_SESSION['errors']['description'] as $key => $value) {
                      echo "<div class='alert alert-danger'>$value</div>";
                  }
              }
              if (!empty($_SESSION['errors']['clint'])) {
                foreach ($_SESSION['errors']['clint'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
              }
              if (!empty($_SESSION['errors']['location'])) {
                foreach ($_SESSION['errors']['location'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
              }
              if (!empty($_SESSION['errors']['surface'])) {
                foreach ($_SESSION['errors']['surface'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
              }
              if (!empty($_SESSION['errors']['year'])) {
                foreach ($_SESSION['errors']['year'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
              }
              if (!empty($_SESSION['errors']['subcategories'])) {
                foreach ($_SESSION['errors']['subcategories'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
              }
            ?>
            <div class="card-footer">
                <button type="submit" name="projects" class="btn btn-dark">Add</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>

<?php
unset($_SESSION);
include_once "layout/footer.php";