                    

                    <!-- Modal -->
                    <div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    
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

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="models/Delete.class.php?id=<?=$row['id']?>&table=students" class="btn btn-danger">Delete</a>
                             </div>
                            </div>
                        </div>
                    </div>