
<?php 
    $id_get = $_GET['id'];
    require_once "functions/connect.php";
    $selectStudent    = "SELECT * FROM students WHERE id = '$id_get' ";
    $query            = $connect -> query($selectStudent);

    $id = 0 ;
    foreach ($query as $student) {
?>


<form method="post" action="functions/f_update_student.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="hidden" name="id" value="<?= $student['id'] ?>"  class="form-control" id="exampleInputEmail1" placeholder="اسم الطالب">
    <input type="text" name="name" value="<?= $student['name'] ?>"  class="form-control" id="exampleInputEmail1" placeholder="اسم الطالب">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Age</label>
    <input type="text" name="age" value="<?= $student['age'] ?>"  class="form-control" id="exampleInputEmail1" placeholder="عمر الطالب">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Schoolroom</label>
    <select name="schoolroom" class="form-control" id="exampleFormControlSelect1">
      <option value="" >اختر الفصل</option>

    <?php
      require_once "functions/connect.php";

      $selectSchoolroom = "SELECT * FROM schoolrooms";
      $querySchoolroom  = $connect -> query($selectSchoolroom);
      foreach($querySchoolroom as $schoolroom){
    ?>
                          
                            
      <option value="<?= $schoolroom['id'] ?>" ><?= $schoolroom['name'] ?></option>
      <?php
        }
      ?>

    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Mother</label>
    <input type="text" name="mother" value="<?= $student['mother'] ?>" class="form-control" id="exampleInputEmail1" placeholder="اسم الام">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" name="phone" value="<?= $student['phone'] ?>" class="form-control" id="exampleInputEmail1" placeholder="هاتف الام">
  </div>
  <br>



  <div class="form-group">
    <label for="exampleInputEmail1">subscription</label>
    <input type="text" name="subscription" value="<?= $student['subscription'] ?>" class="form-control" id="exampleInputEmail1" placeholder="فيمة ما تم دفعه">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
<?php
    }
?>
</form>