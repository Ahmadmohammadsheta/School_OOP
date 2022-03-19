<?php
  $model_absence          = new Model_absence();
  $model_absence->tables  = 'absence';
  $absences[]               = $model_absence->test_insert();


?>

<form action="" method="post">
    <?php
  $model_students            = new Model_students();
  $model_students->tables    = 'students';
  $rows                      = $model_students->fetch();
  $id                        =0;
  foreach ($rows as $row) {


?>
    <input type="text" value="" name="student_id[]">
    <!-- <input type="text" value="" name="schoolroom_id"> -->
    <!-- <input type="text" value="" name="status"> -->
    <input type="text" value="<?= date('D(d-m-y)') ?>" name="day[]">
    
    
    <?php
  }
  ?>
  <button type="submit">add</button>
</form>