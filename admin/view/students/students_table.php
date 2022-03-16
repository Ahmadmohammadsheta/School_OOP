
<!-- SEARCH FORM -->

<br>
<div class="container">
  <div class="row">
    <div class="col-lg-11"  style="margin: 25px;">
        <div class="card-body">
          <a href="students.php?action=add" class="btn btn-info" style="margin-bottom: 10px;">Add Student</a>
            <table class="table table-bordered m-3">
              <thead>                  
                <tr>
                  <th style="width: 10px">id</th>
                  <th>الاسم</th>
                  <th>السن</th>
                  <th>الفصل</th>
                  <th>الام</th>
                  <th>الهاتف</th>
                  <th>اجراء</th>
                </tr>
              </thead>
              <tbody>
<?php
  $model          = new Model_students();
  $model->tables  = 'students';
  $rows           = $model->fetch();
  $id             =0;
  foreach ($rows as $row) {


?>
                <tr>
                  <td><?= ++$id ?></td>
                  <td><a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a></td>
                  <td><?= $row['age'] ?></td>
<?php
  $model_schoolrooms         = new Model_schoolroom();
  $model_schoolrooms->tables = 'schoolrooms';
  $schoolrooms_student  = $model_schoolrooms->read($row['schoolroom_id']);
  $row_schoolroom       = $schoolrooms_student['name']; 
?>                  
                  <td><?= $row_schoolroom ?></td>                  
                  <td><?= $row['mother_name'] ?></td>
                  <td><?= $row['mother_phone'] ?></td>
                  <td>
                    <a href="subscriptions.php?action=subscription&id=<?=$row['id']?>" class="btn btn-sm btn-success">دفع</a>
                    <a href="students.php?action=edit&id=<?=$row['id']?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="models/Delete.class.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
<?php
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


              