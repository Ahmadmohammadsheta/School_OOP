<?php
  require_once "functions/connect.php";

?>
<!-- SEARCH FORM -->
<div class="container">
  <div class="row">
   <div class="col-md-3">
      <form method="get" class="form-inline ml-3">
            <div class="form-group">
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
              <button type="submit" class="btn btn-info">بحث بالفصل</button>
            </div>
      </form>
    </div>
  </div>

</div>
<br>
<div class="card-body">
                <table class="table table-bordered">
                  <thead>                                   
                    <tr>
                      <th style="width: 10px">id</th>
                    <form method="get" class="form-inline ml-3">
                      <th>
                        <div class="form-group">
                          <select name="status" id="" class="status_input">
                              <option value="">الحالة</option>
                              <option value="0">حاضر</option>
                              <option value="1">غائب</option>
                          </select>
                          
                      </th>
                      <th>
                        <label for="" class="text-center">الاسم</label>
                        <select name="students" class="form-control student_input" id="exampleFormControlSelect1">
                          <option value="<?php if(isset($_GET['students'])){echo $_GET['students'] ;} ?>" ><?php if(isset($_GET['students'])){echo $_GET['students'] ;} ?></option>
                          <option>الطالب</option>
<?php
  $selectStudents = "SELECT * FROM students";
  $queryStudents  = $connect -> query($selectStudents);
  foreach($queryStudents as $students){
?>                      
                            <option value="<?= $students['id'] ?>" ><?= $students['name'] ?></option>
<?php
  }
?>

                            </select>
                          </div>
                      </th>
                      <th class="date_th">
                        <label for="">From</label>
                        <input type="date" name="from_date" class="form-control date_input">
                        <label for="">To</label>
                        <input type="date" name="to_date" class="form-control date_input">
                      </th>
                      <th style="width: 200px">
                        <button type="submit" class="btn btn-info">بحث</button>
                      </th>
                    </form>

                    </tr>
                  </thead>
                  <tbody>

<?php

  if (isset($_GET['students'])) 
  {$selectJoinData = "SELECT absences.status, absences.time, students.name 
    FROM absences
    INNER JOIN students ON absences.student_id=students.id;";
    $queryJoinData  = $connect->query($selectJoinData);
    $id = 0;
    foreach ($queryJoinData as $row_date) {
      $status = $row_date['status'];

      // echo $row_date['name'];
      ?>
      <tr>
                <td ><?= ++$id ?></td>
                <td ><?= $status == 0 ? "حاضر" : "غائب" ?></td>
                <td ><?= $row_date['name'] ?></td>
                <td ><?= $row_date['time'] ?></td>
              </tr>
      <?php
      // print_r($row_date) ;
    }
    exit();
      $filteredData         = $_GET['students'];
      $selectFilteredSearch = "SELECT * FROM students WHERE CONCAT(name) LIKE '%$filteredData%' ";
      $queryFilteredSearch  = $connect->query($selectFilteredSearch);
      $num                  = mysqli_num_rows($queryFilteredSearch);
      if ($num > 0) 
      {
          $id = 0;
          foreach ($queryFilteredSearch as $row)
          {
              $student_id       = $row['id'];

              $selectAbsence    = "SELECT * FROM absences WHERE student_id = '$student_id' ";
              $queryAbsence     = $connect -> query($selectAbsence);
              foreach ($queryAbsence as $absenceFetch) {
                  $date          = $absenceFetch['date'];
                  $status        = $absenceFetch['status'];
            

                  $selectDate    = "SELECT * FROM days WHERE id = '$date' ";
                  $queryDate     = $connect -> query($selectDate);
                  $dateFetch     = $queryDate->fetch_assoc(); 
                  ?>
              <tr>
                <td ><?= ++$id ?></td>
                <td ><?= $status == 0 ? "حاضر" : "غائب" ?></td>
                <td ><?= $row['name'] ?></td>
                <td ><?= $dateFetch['date'] ?></td>
              </tr>
<?php
              }
          }
      }else 
?>
        <tr>
          <td colspan="4">No record found</td>
        </tr>
<?php
  } elseif (isset($_GET['schoolroom'])) 
  {
    
    $filteredData         = $_GET['schoolroom'];
    $selectFilteredSearch = "SELECT * FROM schoolrooms WHERE CONCAT(name) LIKE '%$filteredData%' ";
    $queryFilteredSearch  = $connect->query($selectFilteredSearch);
    $num                  = mysqli_num_rows($queryFilteredSearch);

    if ($num > 0)
     {
        $id = 0;
      foreach ($queryFilteredSearch as $row)
         {
          $schoolroom_id        = $row['id'];
  
          $selectStudent      = "SELECT * FROM students WHERE schoolroom = '$schoolroom_id' ";
          $queryStudent2      = $connect -> query($selectStudent);
          $numStudent         = mysqli_num_rows($queryStudent2);
          if ($numStudent > 0) 
          {
            foreach ($queryStudent2 as $resultStudent) {
              
            
            // $resultStudent      = $queryStudent2->fetch_assoc();
            $student_id       = $resultStudent['id'];

              $selectAbsence    = "SELECT * FROM absences WHERE student_id = '$student_id' ";
              $queryAbsence     = $connect -> query($selectAbsence);
              foreach ($queryAbsence as $absenceFetch) {
                  $date          = $absenceFetch['date'];
                  $status        = $absenceFetch['status'];
            

                  $selectDate    = "SELECT * FROM days WHERE id = '$date' ";
                  $queryDate     = $connect -> query($selectDate);
                  $dateFetch     = $queryDate->fetch_assoc();
  
                  // echo $resultStudent['name'];
            // exit();
              ?>
              <tr>
                <td ><?= ++$id ?></td>
                <td ><?= $status == 0 ? "حاضر" : "غائب" ?></td>
                <td><?= $resultStudent['name'] ?></td>
                <td ><?= $dateFetch['date'] ?></td>
                <td>لا يوجد</td>

              </tr>
               
<?php
            }
              }
          } else
          {
            ?>
            <tr>
              <td colspan="4">No record found</td>
            </tr>
            <?php
          }
             
      }
    }
  } elseif (isset($_GET['status'])) {
    $filteredData         = $_GET['status'];
      $selectFilteredSearch  = "SELECT * FROM absence WHERE CONCAT(status) LIKE '%$filteredData%' && ststus = '$filteredData' ";
      $queryFilteredSearch   = $connect->query($selectFilteredSearch);
      $num                  = mysqli_num_rows($queryFilteredSearch);
      if ($num > 0) {
          $id = 0;
          foreach ($queryFilteredSearch as $row) {
              echo 0 ? 'yes' : 'no';
          }
      }
  }
?>
                    
                  </tbody>


<?php
  if (isset($_GET['from_date']) && isset($_GET['to_date']) ) 
  {
    // $from_date = $_GET['from_date'];
    // $to_date   = $_GET['to_date'];
    // $select_filtered_date = "SELECT * FROM absences WHERE time BETWEEN '$from_date' AND '$to_date' ";
    // $query_filtered_date  = $connect->query($select_filtered_date);
    // foreach ($query_filtered_date as $row_date) {
    //   echo $row_date['date'];
    //   exit();
    // }
  }
  $selectJoinData = "SELECT absences.status, absences.time, students.name 
  FROM absences
  INNER JOIN students ON absences.id=students.name;";
  $queryJoinData  = $connect->query($selectJoinData);
  foreach ($queryJoinData as $row_date) {
    echo $row_date['status'];
    exit();
  }
?>