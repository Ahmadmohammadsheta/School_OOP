<div class="container">
  <div class="row" style="margin: 5px;">

    <div class="col-md-4">
      <a href="students.php" class="btn btn-md btn-success">جميع الطلاب</a>
      <a href="students.php?action=add" class="btn btn-warning">طالب جديد</a>
      <a href="absences.php?day=<?= date('D(d-m-y)')?>" class="btn btn-danger">الغياب</a>

    </div>

    <div class="col-lg-4">
      <form method="get" class="form-inline ml-3">
        <div class="form-group">
          <input type="text" name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'] ; ?>" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary">بحث عام</button>
        </div>
      </form>
    </div>
    <div class="col-md-4">
      <form method="get" class="form-inline ml-3">
        <div class="form-group">
            <div class="form-group">
        <select name="schoolroom" class="form-control" id="exampleFormControlSelect1">
          <option value="<?php if(isset($_GET['schoolroom'])){echo $_GET['schoolroom'] ;} ?>" ><?php if(isset($_GET['schoolroom'])){echo $_GET['schoolroom'] ;} ?></option>
          <?php
            $model_schoolrooms         = new Model_schoolroom();
            $model_schoolrooms->tables = 'schoolrooms';
            $schoolrooms_student  = $model_schoolrooms->fetch();
            foreach($schoolrooms_student as $schoolroom){
          ?>                            
          <option value="<?= $schoolroom['schoolrooms_name'] ?>" ><?= $schoolroom['schoolrooms_name'] ?></option>
          <?php
            }
          ?>

        </select>
        </div>
            <button type="submit" name="submit_schoolroom" class="btn btn-info">بحث بالفصل</button>
        </div>
      </form>
    </div>
  </div>    
</div>

