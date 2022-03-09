
<form method="post" action="functions/f_add_student.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputEmail1" placeholder="اسم الطالب">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Age</label>
    <input type="text" name="age"  class="form-control" id="exampleInputEmail1" placeholder="عمر الطالب">
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
    <input type="text" name="mother" value="" class="form-control" id="exampleInputEmail1" placeholder="اسم الام">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" name="phone" value="" class="form-control" id="exampleInputEmail1" placeholder="هاتف الام">
  </div>
  <br>



  <div class="form-group">
    <label for="exampleInputEmail1">subscription</label>
    <input type="text" name="subscription" value="" class="form-control" id="exampleInputEmail1" placeholder="فيمة ما تم دفعه">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>