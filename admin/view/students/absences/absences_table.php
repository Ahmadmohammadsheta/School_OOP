
<!-- SEARCH FORM -->

<br>
<div class="container">
  <div class="row">
    <div class="col-lg-11"  style="margin: 25px;">
        <div class="card-body">
          <a href="students.php?action=add" class="btn btn-info" style="margin-bottom: 10px;">Add Absence</a>
            <table class="table table-bordered m-3">
              <thead>                  
                <tr>
                  <th style="width: 10px">id</th>
                  <th>الاسم</th>
                  <th>الفصل</th>
                  <th>الغياب</th>
                  <th>اجراء</th>
                </tr>
              </thead>
              <tbody>
<?php
  $model_students            = new Model_students();
  $model_students->tables    = 'students';
  $rows                      = $model_students->fetch();
  $id                        =0;
  foreach ($rows as $row) {


?>
                <tr>
                  <td><?= ++$id ?></td>
                  <td><a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a></td>
<?php
  $model_schoolrooms         = new Model_schoolroom();
  $model_schoolrooms->tables = 'schoolrooms';
  $schoolrooms_student  = $model_schoolrooms->read($row['schoolroom_id']);
  $row_schoolroom       = $schoolrooms_student['name']; 
?>                  
                  <td><?= $row_schoolroom ?></td>
                  <td>
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                    <label class="custom-control-label" for="customSwitch1">حاضر</label>
                    </div>
                    <!-- <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                      <label class="custom-control-label" for="customSwitch2"></label>
                    </div> -->
                  </td>

                  <td>
                      
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


              