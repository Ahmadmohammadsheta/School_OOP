

<br>
<div class="container">
  <div class="row">
    <div class="col-lg-11"  style="margin: 25px;">
        <div class="card-body">
          <!-- <a href="subscriptions.php?action=subscription" class="btn btn-info" style="margin-bottom: 10px;">Add Subsription</a> -->
            <table class="table table-bordered m-3">
              <thead>                  
                <tr>
                  <th style="width: 10px">id</th>
                  <th class="text-center">الاسم</th>
                  <th class="text-center">السن</th>
                  <th class="text-center">الفصل</th>
                  <th class="text-center">الشهر</th>
                  <th class="text-center">قيمة الاشتراك</th>
                  <th class="text-center">دفع</th>
                  <th class="text-center">اجراء</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="get">
                  <div class="row">
                    <div class="col-md-2">
                      <input type="month" name="month" class="input-group"  value="" style="width: 100px;">
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-success" style="margin-bottom: 5px;">شهر</button>  
                    </div>
                  </div>
                </form>
                <form action="" method="post">
<?php
  if (isset($_GET['month'])) {
    $month  = $_GET['month'];
  } else {
    $month  = date('m-Y');
  }
  $model  = new Model_for_all();
  // $rows = $model->join1();
  $model_students = new Model_students();
  $rows = $model_students->fetch_students_join();
  $subscription = $model->subscription;
  $model_subs   = new Model_subscription();
  $model_subs->tables = 'subscriptions';
  $add[]  = $model_subs->insert_all_sub();


  $id           = 0;

  if (!empty($rows)) {
    foreach ($rows as $row) {
      $student_id   = $row['id'];
      $row_sum_value = $model_subs->fetch_sum_value($student_id, $month);
      $month_once    = $row_sum_value['month'];


?>
                  <tr>
                    <td class="text-center"><?= ++$id ?>(<?= $row_sum_value['student_id'] ?>)</td>
                    <td>
                    <input type="hidden" name="student_id[]" value="<?= $row['id'] ?>">
                      <a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a>
                    </td>
                    <td class="text-center"><?= $row['age'] ?></td>
                    <td class="text-center">
                    <input type="hidden" name="schoolroom_id[]" value="<?= $row['schoolrooms_id'] ?>">
                      <?= $row['schoolrooms_name'] ?>
                    </td>
                    <td class="text-center">
                    <input type="hidden" name="month[]" value="<?= $month ?>" style="width: 50px;">
                      <?= isset($month) ? "$month" : "$month_once" ?>
                    </td>
                    <td class="text-center">
                    <input class="text-center" type="text" name="value[]" value="<?= $subscription ?>" style="width: 50px;">
                    </td>
                    <td class="text-center"><?= $row_sum_value['total'] ?></td>
                    <td class="text-center">
                      <a href="subscriptions.php?action=subscription&id=<?=$row['id']?>" class="btn btn-sm btn-success">دفع</a>
                      <a href="subscriptions.php?action=edit&id=<?=$row['id']?>" class="btn btn-sm btn-info">تعديل</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#d<?=$row['id']?>">
                      Delete
                      </button> 
                      <!-- Modal -->
                      <div class="modal fade" id="d<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">حذف</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete subscription of <span class="text-danger text-uppercase"><?= $row['name'] ?></span> ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="models/Delete.class.php?id=<?=$row['subscriptions_id']?>&table=subscriptions&table_id=subscriptions_id" class="btn btn-danger">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
<?php
    }
  }
?>              <div class="col-md-4">
                   <button type="submit" name="submit_all" class="btn btn-success" style="margin-bottom: 5px;">دفع الكل</button>  
                </div>
                </form>

              </tbody>
            </table>
        </div>
              <!-- /.card-body -->
    </div>
  </div>
  <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
  </div>
</div>


              