<?php
$title = "Mailbox";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
$contactObject = new Contact;

//-------------------massege-----------------------
$massageResult = $contactObject->read();
$massages = $massageResult->fetch_all(MYSQLI_ASSOC);
?>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php foreach ($massages as $key => $massage) :?>
                  <tr>
                    <td>
                    <td class="mailbox-name"><?= $massage['Name']?></td>
                    <td class="mailbox-subject"><b><?= $massage['Email']?></b> - <?= $massage['Massage']?>
                    </td>
                    <td class="mailbox-subject"><b><?= $massage['Phone']?></b>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?= $massage['Created_at']?></td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php
include_once "layout/footer.php";

