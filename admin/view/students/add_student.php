
<div class="add_form"  style="margin: 30px;">
<?php
    $model  = new Model_students();
    $model->tables = 'students';
    $insert = $model->insert();
?>
    <form method="post" action="">
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
            <select name="schoolroom_id" class="form-control" id="exampleFormControlSelect1">
            <option value="" >اختر الفصل</option>

<?php
    $model->tables      = 'schoolrooms';
    $rows_schoolrooms   = $model->fetch();
    if (!empty($rows_schoolrooms)) {
      foreach ($rows_schoolrooms as $row_schoolroom) {
  ?>
          
            <option value="<?= $row_schoolroom['schoolrooms_id'] ?>" ><?= $row_schoolroom['schoolrooms_name'] ?></option>
<?php
      }
    }
?>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mother</label>
            <input type="text" name="mother_name" value="" class="form-control" id="exampleInputEmail1" placeholder="اسم الام">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mother Phone</label>
            <input type="text" name="mother_phone" value="" class="form-control" id="exampleInputEmail1" placeholder="هاتف الام">
        </div>
        <br>


        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </form>
</div>