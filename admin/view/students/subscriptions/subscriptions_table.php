
<!-- SEARCH FORM -->

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
                <form action="" method="post">
<?php
  $model  = new Model_for_all();
  $model->tables = 'students';
  $rows = $model->join1();
  $subscription = $model->subscription;
  $model_subs   = new Model_subscription();
  $model_subs->tables = 'subscriptions';
  $add[]  = $model_subs->insert_all_sub();


  $id           = 0;

  if (!empty($rows)) {
    foreach ($rows as $row) {

?>
                  <tr>
                    <td class="text-center"><?= ++$id ?>(<?= $row['id'] ?>)</td>
                    <td>
                    <input type="hidden" name="student_id[]" value="<?= $row['id'] ?>">
                      <a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a>
                    </td>
                    <td class="text-center"><?= $row['age'] ?></td>
                    <td class="text-center">
                    <input type="hidden" name="schoolrooms_id[]" value="<?= $row['schoolroom_id'] ?>">
                      <?= $row['schoolrooms_name'] ?>
                    </td>
                    <td class="text-center">
                    <input type="hidden" name="month[]" value="<?= date('m-y') ?>" style="width: 50px;">
                      <?= date('m-y') ?>
                    </td>
                    <td class="text-center">
                    <input class="text-center" type="text" name="value[]" value="<?= $subscription ?>" style="width: 50px;">
                    </td>
                    <td class="text-center"><?= $row['value'] ?></td>
                    <td class="text-center">
                      <a href="subscriptions.php?action=subscription&id=<?=$row['id']?>" class="btn btn-sm btn-success">دفع</a>
                      <a href="subscriptions.php?action=edit&id=<?=$row['id']?>" class="btn btn-sm btn-info">تعديل</a>
                      <a href="models/Delete.class.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger">حذف</a>
                    </td>
                  </tr>
<?php
    }
  }
?>              
                <button type="submit" name="submit_all" class="btn btn-success" style="margin-bottom: 5px;">دفع الكل</button>  
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


              