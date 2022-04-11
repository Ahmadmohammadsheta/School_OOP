
<div class="add_form"  style="margin: 30px;">
<?php
    $model  = new Model_teachers();
    $insert = $model->insert_teacher();
?>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="teachername"  class="form-control" id="exampleInputEmail1" placeholder="اسم ">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="text" name="age"  class="form-control" id="exampleInputEmail1" placeholder="عمر ">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">الهاتف</label>
            <input type="text" name="phone" value="" class="form-control" id="exampleInputEmail1" placeholder="الهاتف">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">البريد الاكتروني</label>
            <input type="text" name="email" value="" class="form-control" id="exampleInputEmail1" placeholder="البريد الاكتروني">
        </div>
        <br>


        <button type="submit" name="new_teacher" value="submit" class="btn btn-primary">Submit</button>
    </form>
</div>