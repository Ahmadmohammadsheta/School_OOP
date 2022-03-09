
<div class="add_form"  style="margin: 30px;">
<?php
    require 'models/Model_students.php';
    $model  = new Model_schoolroom;
    $model->tables = 'schoolrooms';
    $insert = $model->insert();
?>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name"  class="form-control" id="exampleInputEmail1" placeholder="اسم الطالب">
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>