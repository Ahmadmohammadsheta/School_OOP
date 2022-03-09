
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
                  <th>الاسم</th>
                  <th>السن</th>
                  <th>الفصل</th>
                  <th>الام</th>
                  <th>الهاتف</th>
                  <th>دفع</th>
                  <th>اجراء</th>
                </tr>
              </thead>
              <tbody>
<?php
  require 'models/Model_students.php';
  $model  = new Model_students();
  $model->tables = 'students';
  $rows = $model->fetch();
  if (!empty($rows)) {
    foreach ($rows as $row) {

?>
                <tr>
                  <td><?= $row['id'] ?></td>
                  <td><a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a></td>
                  <td><?= $row['age'] ?></td>
                  <td><?= $row['schoolroom_id'] ?></td>
                  <td><?= $row['mother_name'] ?></td>
                  <td><?= $row['mother_phone'] ?></td>
                  <td></td>
                  <td>
                    <a href="subscriptions.php?action=subscription&id=<?=$row['id']?>" class="btn btn-sm btn-success">دفع</a>
                    <a href="subscriptions.php?action=edit&id=<?=$row['id']?>" class="btn btn-sm btn-info">تعديل</a>
                    <a href="models/Delete.class.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger">حذف</a>
                  </td>
                </tr>
<?php
    }
  }
?>                
              
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


              