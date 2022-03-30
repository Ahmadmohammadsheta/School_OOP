
<div class="add_form"  style="margin: 30px;">
<?php
    $model  = new Model_students();
    $model->tables = 'students';
    $id     = $_REQUEST['id'];
    $table_id = 'id';
    $row    = $model->read($id, $table_id) ;
    $update = $model->update($id);

?>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" value="<?= $row['name'] ?>"  class="form-control" id="exampleInputEmail1" placeholder="اسم الطالب">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="text" name="age" value="<?= $row['age'] ?>"  class="form-control" id="exampleInputEmail1" placeholder="عمر الطالب">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Schoolroom</label>
            <select name="schoolroom_id" class="form-control" id="exampleFormControlSelect1">
            <option value="<?= $row['schoolroom_id'] ?>" >اختر الفصل</option>

<?php
    $model->tables      = 'schoolrooms';
    $rows_schoolrooms   = $model->fetch();
    if (!empty($rows_schoolrooms)) {
      foreach ($rows_schoolrooms as $row_schoolroom) {
          $schoolroom_id    = $row_schoolroom['schoolrooms_id'];
          $schoolroom_fetch = $row['schoolroom_id'];
  ?>
            <option 
            <?= 'selected value="<?= $schoolroom_id ?>"' ? '' : 'selected value="<?= $schoolroom_fetch ?>"'  ?>

            value="<?= $schoolroom_id ?>" ><?= $row_schoolroom['schoolrooms_name'] ?></option>
<?php
      }
    }
?>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mother</label>
            <input type="text" name="mother_name" value="<?= $row['mother_name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="اسم الام">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mother Phone</label>
            <input type="text" name="mother_phone" value="<?= $row['mother_phone'] ?>" class="form-control" id="exampleInputEmail1" placeholder="هاتف الام">
        </div>
        <br>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>