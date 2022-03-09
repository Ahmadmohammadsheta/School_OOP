<!-- SEARCH FORM -->
<div class="container">
  <div class="row">
    <div class="col-md-4">
    <a href="?action=add" class="btn btn-sm btn-primary">دفع الاشتراك</a>
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
</div>

<div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>الاسم</th>
                      <th>الشهر</th>
                      <th>الاشتراك</th>
                      <th>تاريخ الدفع</th>
                      <th>المتبقي</th>

                      <th style="width: 200px">اجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                    
<?php 

    require_once "functions/connect.php";
    $selectMonths  = "SELECT * FROM subscriptions  ";
    $queryMonths   = $connect->query($selectMonths); 
?>
    
<form method="post" action="<?= $_SERVER['PHP_SELF'] ; ?>">
  <div class="form-group">
      <label for="exampleFormControlSelect2">Name</label>
      <select name="month" class="form-control" id="exampleFormControlSelect2">
        <option value="">الشهر</option>
<?php
  foreach ($queryMonths as $monthForSearch) {
      $oneMonth = $monthForSearch['month']; ?>
          <option value="<?= $oneMonth ?>"><?= $oneMonth ?></option>
<?php
  } ?>
      </select>
  </div>    
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php

$selectStudent    = "SELECT * FROM students";
    $query            = $connect -> query($selectStudent);

    $id = 0 ;
    foreach ($query as $student) {
        $student_id = $student['id']; ?>
                    <tr>
                      <td><?= ++$id ?></td>
                      <td><?= $student['name'] ?></td>
<?php
if(isset($_POST['submit'])) {
  $postSearch = $_POST['month'];

        $selectMonthsSearch  = "SELECT * FROM subscriptions WHERE month = '$postSearch' ";
        $queryMonthsSearch   = $connect->query($selectMonthsSearch);
        $fetchMonthsSearch   = $queryMonthsSearch->fetch_assoc();
        $oneMonthSearch      = $fetchMonthsSearch['month'];
        $dateOnce          = $fetchMonthsSearch['date'];


        
        // $selectSubsc = "SELECT * FROM  subscriptions  ";
        // $querySubsc  = $connect -> query($selectSubsc);
        // $resultMonthsOnce  = $querySubsc->fetch_assoc();
        // $monthsOnce        = $resultMonthsOnce['month'];
        // $dateOnce          = $resultMonthsOnce['date'];

        foreach ($queryMonthsSearch as $monthsId) {
            $months        = $monthsId['month'];
        } ?>
                      <td>
                          
                          <?= $months ?>

                        </td>
<?php
$selectSubsc = "SELECT SUM(subscription) AS all_subscriptions FROM subscriptions WHERE student_id ='$student_id'  && month ='$months'";
        $querySubsc  = $connect -> query($selectSubsc);
        foreach ($querySubsc as $result) {
            $allSubscriptions = $result['all_subscriptions']; ?>

                      <td><?= $allSubscriptions ?></td>

<?php
        } ?>

                      <td><?= $dateOnce ?></td>
  

                      <td><?= 200-$allSubscriptions ?></td>
                    </tr>
<?php
    }
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