<!-- SEARCH FORM -->
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <a href="?action=add" class="btn btn-md btn-success">اضافة طالب</a>
    </div>
    <div class="col-md-4">
      <form method="get" class="form-inline ml-3">
        <div class="form-group">
            <div class="form-group">
        <label for="exampleFormControlSelect1">Schoolroom</label>
        <select name="schoolroom" class="form-control" id="exampleFormControlSelect1">
          <option value="<?php if(isset($_GET['schoolroom'])){echo $_GET['schoolroom'] ;} ?>" ><?php if(isset($_GET['schoolroom'])){echo $_GET['schoolroom'] ;} ?></option>
          <?php
            $model_schoolrooms         = new Model_schoolroom();
            $model_schoolrooms->tables = 'schoolrooms';
            $schoolrooms_student  = $model_schoolrooms->fetch();
            foreach($schoolrooms_student as $schoolroom){
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

<br>
<div class="container"></div>
  <div class="row">
    <div class="col-lg-11">
    <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>الاسم</th>
                      <th>السن</th>
                      <th>الفصل</th>
                      <th>الام</th>
                      <th>الهاتف</th>
                      <th>الدفع</th>
                      <th style="width: 200px">اجراء</th>
                    </tr>
                  </thead>
                  <tbody>
<?php

if (isset($_GET['search'])) 
{
  $model          = new Model_for_all();
  $table   = $model->tables  = 'students';
  $search  = $model->search($table);
  $rows           = $model->fetch();  
    $filteredData         = $_GET['search'];
    $selectFilteredSearch = "SELECT * FROM students WHERE CONCAT(name,age,mother,phone,subscription) LIKE '%$filteredData%' ";
    $queryFilteredSearch  = $connect->query($selectFilteredSearch);
    $num                  = mysqli_num_rows($queryFilteredSearch);
    if ($num > 0) 
    {
        $id = 0;
        foreach ($queryFilteredSearch as $row) 
        {

?>
            <tr>
              <td><?= ++$id ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['age'] ?></td>
              
<?php
      $schoolroom       = $row['schoolroom'];
      $selectSchoolroom = "SELECT * FROM schoolrooms WHERE id ='$schoolroom' ";
      $querySchoolroom  = $connect -> query($selectSchoolroom);
      foreach($querySchoolroom as $schoolroom){
?>
                  <td><?= $schoolroom['name'] ?></td>
<?php
  }
?>
                
              <td><?= $row['mother'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['subscription'] ?></td>
              <td>لا يوجد</td>
            </tr>
<?php
        }
    }else 
    {
      ?>
      <tr>
        <td colspan="4">No record found</td>
      </tr>
<?php
    }
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
          // $resultStudent      = $queryStudent2->fetch_assoc();
          foreach ($queryStudent2 as $resultStudent) {

          

          
            ?>
            <tr>
                <td><?= ++$id ?></td>
                <td><?= $resultStudent['name'] ?></td>
                <td><?= $resultStudent['age'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $resultStudent['phone'] ?></td>
                <td><?= $resultStudent['mother'] ?></td>
                <td><?= $resultStudent['subscription'] ?></td>
                <td>لا يوجد</td>
            </tr> 
<?php
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
} else 
{
?>
                    
<?php
    
    $selectStudent    = "SELECT * FROM students";
    $query            = $connect -> query($selectStudent);

    $id = 0 ;
    foreach ($query as $student) {
?>
                    <tr>
                      <td><?= ++$id ?></td>
                      <td><?= $student['name'] ?></td>
                      <td><?= $student['age'] ?></td>
                      <td>
<?php
      $schoolroom       = $student['schoolroom'];
      $selectSchoolroom = "SELECT * FROM schoolrooms WHERE id ='$schoolroom' ";
      $querySchoolroom  = $connect -> query($selectSchoolroom);
        foreach ($querySchoolroom as $schoolroom) {
?>
                          <?= $schoolroom['name'] ?>
<?php
} 
?>
                        </td>
                      <td><?= $student['mother'] ?></td>
                      <td><?= $student['phone'] ?></td>
                      <td><?= $student['subscription'] ?></td>
                      <td>
                            <a href="" class="btn btn-sm btn-warning" style='width: 50px'>هاتف اخر</a>
                            <a href="students.php?action=edit&id=<?= $student['id'] ?>" class="btn btn-sm btn-info" style='width: 50px'>تعديل</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#e<?= $student['id'] ?>">
                              حذف
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="e<?= $student['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    هل تريد فعلا حذف الطالب <?= $student['id'] ?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="" type="button" class="btn btn-primary">Save changes</a>
                                  </div>
                                </div>
                              </div>
                            </div>                            
                      </td>
                    </tr>
                      <?php
    }
}