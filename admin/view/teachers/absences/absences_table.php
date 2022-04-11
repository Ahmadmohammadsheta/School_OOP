
<?php
  $model_absence          = new Model_absence();
  $model_absence->tables  = 'absence';
  $absences[]             = $model_absence->insert_absence();


?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-11"  style="margin: 25px;">
        <div class="card-body">
            <table class="table table-bordered m-3">
              <thead>                  
                <tr>
                  <th style="width: 10px">id</th>
                  <th>الاسم</th>
                  <th>الفصل</th>
                  <th>الغياب</th>
                  <th>اليوم</th>
                </tr>
              </thead>
              <tbody>
              <form action="" method="post">
<?php
  $model_absence            = new Model_absence();
  $rows                      = $model_absence->fetch_absence_join();
  $id                        =0;
  foreach ($rows as $row) {


?>
                <tr>
                  <td><?= ++$id ?>(<?=$row['id']?>)</td>
                  <td>
                    <a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a>
                    <input type="hidden" name="student_id[]" value="<?= $row['id'] ?>">
                  </td>                 
                  <td>
                    <input type="hidden" name="schoolroom_id[]" value="<?= $row['schoolrooms_id'] ?>">
                    <?= $row['schoolrooms_name'] ?>
                  </td>
                  <td>
                  <select name="status[]" class="custom-select" >
                    <option value="1" class="bg-success" selected>حاضر</option>
                    <option value="0" class="text-danger">غائب</option>
                  </select>
                        <!-- <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="status[]" <?= "checked" ? 'value="1"' : 'value="0"' ?>  class="custom-control-input" id="<?=$row['id']?>" >
                          <label class="custom-control-label" for="<?=$row['id']?>">حاضر</label>
                        </div> -->
                  </td>

                  <td><input type="text" name="day[]" value="<?= date('D(d-m-y)'); ?>"></td>
                </tr>
              
<?php
  }
?>         
              <button type="submit" name="submit"  class="btn btn-danger" style="margin-bottom: 10px;">تسجيل الغياب</button>
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


              