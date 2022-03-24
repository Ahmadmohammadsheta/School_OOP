
<!-- SEARCH FORM -->

<br>
<div class="container">
  <div class="row">
    <div class="col-lg-11"  style="margin: 25px;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
            </div>
          </div>

            <table class="table table-bordered">
              <thead>                  
                <tr>
                  <th style="width: 10px;background-color: skyblue;">sql</th>
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
  $model= new Model_for_all();
  if (isset($_GET['submit']) || isset($_GET['submit_schoolroom'])) {
    // GLOBAL STUDENT SEARCH
    if ($search_data = $model->search_join()) {
      $id = 0;
      foreach ($search_data as $row_search) {
?>
                <tr>
                  <td style="background-color: skyblue;"><?=$row_search['id']?></td>
                  <td><?= ++$id ?></td>
                  <td><a href="students.php?action=read&id=<?=$row_search['id']?>"><?= $row_search['name'] ?></a></td>
                  <td><?= $row_search['age'] ?></td>           
                  <td><?= $row_search['schoolrooms_name'] ?></td>                  
                  <td><?= $row_search['mother_name'] ?></td>
                  <td><?= $row_search['mother_phone'] ?></td>
                  <td>
                    <a href="subscriptions.php?action=subscription&id=<?=$row_search['id']?>" class="btn btn-sm btn-success">دفع</a>
                    <a href="students.php?action=edit&id=<?=$row_search['id']?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="models/Delete.class.php?id=<?=$row_search['id']?>&table=students" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                
<?php
      }
      // SCHOOLROOM SEARCH
    } elseif ($search_schoolroom = $model->search_join_schoolroom()) {
      $id = 0;
      foreach ($search_schoolroom as $row_search) {
?>
                <tr>
                  <td style="background-color: skyblue;"><?=$row_search['id']?></td>
                  <td><?= ++$id ?></td>
                  <td><a href="students.php?action=read&id=<?=$row_search['id']?>"><?= $row_search['name'] ?></a></td>
                  <td><?= $row_search['age'] ?></td>           
                  <td><?= $row_search['schoolrooms_name'] ?></td>                  
                  <td><?= $row_search['mother_name'] ?></td>
                  <td><?= $row_search['mother_phone'] ?></td>
                  <td>
                    <a href="subscriptions.php?action=subscription&id=<?=$row_search['id']?>" class="btn btn-sm btn-success">دفع</a>
                    <a href="students.php?action=edit&id=<?=$row_search['id']?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="models/Delete.class.php?id=<?=$row_search['id']?>&table=students" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
<?php
      }
    } else {
  ?>
                <tr>
                  <td colspan="8" style="text-align: center; background-color:red;"><h1>No record found</h1></td>
                </tr>
<?php
    }
    // FETCH ALL STUDENTS
  } else {
    $model_students = new Model_students();
    $rows = $model_students->fetch_students_join();
    $id   =0;
    foreach ($rows as $row) {
?>   
                <tr>
                  <td style="background-color: skyblue;"><?=$row['id']?></td>
                  <td><?= ++$id ?></td>
                  <td><a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a></td>
                  <td><?= $row['age'] ?></td>           
                  <td><?= $row['schoolrooms_name'] ?></td>                  
                  <td><?= $row['mother_name'] ?></td>
                  <td><?= $row['mother_phone'] ?></td>
                  <td>
                    <a href="subscriptions.php?action=subscription&id=<?=$row['id']?>" class="btn btn-sm btn-success">دفع</a>
                    <a href="students.php?action=edit&id=<?=$row['id']?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="models/Delete.class.php?id=<?=$row['id']?>&table=students" class="btn btn-sm btn-danger">Delete</a>
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


              