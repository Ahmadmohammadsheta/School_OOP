
<form method="post" action="functions/f_add_subscription.php">
  <div class="form-group">
      <label for="exampleFormControlSelect2">Name</label>
      <select name="student_id" class="form-control" id="exampleFormControlSelect2">
          <option value="">الطالب</option>
            <?php
            require_once 'functions/connect.php';
            $selectStudent    = "SELECT * FROM students";
            $queryStudent     = $connect -> query($selectStudent);
            foreach ($queryStudent as $students) {
            $student_name = $students['name']; 
            $student_id   = $students['id'];
            ?>
            <option value="<?= $student_id?> "><?= $student_name ?></option>
            <?php
                }
            $date = date('Y');
            ?>
      </select>
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Month</label>
    <select name="month" class="form-control" id="exampleFormControlSelect1">
      <option value="" >اختر الشهر</option>
      <option value="1-2022" >يناير</option>
      <option value="2-2022" >فبراير</option>
      <option value="3-2022" >مارس</option>
      <option value="4-2022" >أبريل</option>
      <option value="5-2022" >مايو</option>
      <option value="6-2022" >يونيو</option>
      <option value="7-2022" >يوليو</option>
      <option value="8-2022" >أغسطس</option>
      <option value="9-2022" >سبتمبر</option>
      <option value="10-2022" >أوكتوبر</option>
      <option value="11-2022" >نوفمبر</option>
      <option value="12-2022" >ديسمبر</option>
    </select>
  </div>




  <div class="form-group">
    <label for="exampleInputEmail1">subscription</label>
    <input type="text" name="subscription" value="" class="form-control" id="exampleInputEmail1" placeholder="فيمة ما تم دفعه">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>