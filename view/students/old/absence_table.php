
<?php
  require_once "functions/connect.php";

?>
<!-- SEARCH FORM -->
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <a href="students.php" class="btn btn-sm btn-primary w-100">جميع الطلاب</a>

    </div>
    <div class="col-md-4">
      <form method="get" class="form-inline ml-3">
        <div class="form-group">
            <input type="search" name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'] ; ?>" class="form-control">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
       </form>
    </div>
    <div class="col-md-4">
      <form method="get" class="form-inline ml-3">
        <div class="form-group">
            <div class="form-group">
        <label for="exampleFormControlSelect1">Schoolroom</label>
        <select name="schoolroom" class="form-control" id="exampleFormControlSelect1">
          <option value="<?php if(isset($_GET['schoolroom'])){echo $_GET['schoolroom'] ;} ?>" ><?php if(isset($_GET['schoolroom'])){echo $_GET['schoolroom'] ;} ?></option>
        <?php
          $selectSchoolroom = "SELECT * FROM schoolrooms";
          $querySchoolroom  = $connect -> query($selectSchoolroom);
          foreach($querySchoolroom as $schoolroom){
        ?>
                              
                                
          <option value="<?= $schoolroom['name'] ?>" ><?= $schoolroom['name'] ?></option>
          <?php
            }
          ?>

        </select>
        </div>
            <button type="submit" class="btn btn-info">Search</button>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    <a href="?action=add" class="btn btn-sm btn-success">اضافة طالب</a>
    </div>
</div>
<br>

<div class="">
  <a href="?action=add" class="btn btn-sm btn-primary">اضافة غياب</a>
</div>
<br>
<div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>Status</th>
                      <th>Name</th>
                      <th>Date</th>
                      <tr>
                    </tr>
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>
                          <select name="status" id="">
                              <option value="">الحالة</option>
                              <option value="0">حاضر</option>
                              <option value="1">غائب</option>
                          </select>
                      </th>
                      <th>
                        <select name="student_id" id="">
                          <option value="">الطالب</option>
<?php
require_once "functions/connect.php";
$selectAbsence    = "SELECT * FROM absences";
$query            = $connect -> query($selectAbsence);
$result           = $query->fetch_assoc();

    $show_date        = $result['date'] ;
    $show_status      = $result['status'];
    $show_student     = $result['student_id'];
    $selectStudent    = "SELECT * FROM students";
    $queryStudent     = $connect -> query($selectStudent);
    foreach ($queryStudent as $students) {
?>                
    
                          <option value=""><?= $students['name'] ?></option>
<?php
}
?>
                        </select>
                      </th>
                      <th>
                        <select name="date" id="">
                          <option value="<?=date('y-m-d') ?>"><?=date('d-m-y') ?></option>
<?php
    $selectAlldays    = "SELECT * FROM days";
    $queryAlldays     = $connect -> query($selectAlldays );
    foreach ($queryAlldays  as $allDays) {
        $show_all_days = $allDays['date']; ?>
                          <option value="<?= $show_all_days ?>"><?= $show_all_days ?></option>
                        
<?php
    }

?>
                        </select>
                      </th>

                      <th style="width: 200px">اجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                    
<?php 
$id = 0;
foreach ($query as $absence) {
$show_date_all        = $absence['date'] ;
$student_id       = $absence['student_id'];
$selectStudent    = "SELECT * FROM students WHERE id = '$student_id' ";
$queryStudent     = $connect -> query($selectStudent);

foreach ($queryStudent as $students) {
?>
                    <tr>
                      <td><?= ++$id ?></td>
                      <td><?= $absence['status'] == 0 ? 'حاضر' : 'غائب' ?></td>
                      <td><?= $students['name'] ?></td>

<?php
}
?>
                        
<?php
$selectDayId    = "SELECT * FROM days WHERE id = '$show_date_all' ";
$queryDayId     = $connect -> query($selectDayId);
foreach($queryDayId as $dateId){
  $show_date_id = $dateId['date'];
?>
                        <td><?= $show_date_id ?></td>
<?php
}
?>                     
                      <td>
                            <a href="students.php?action=edit&id=<?= $absence['id'] ?>" class="btn btn-sm btn-info" style='width: 50px'>تعديل</a>
                         
                      </td>
                    </tr>
<?php
  } 
?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>