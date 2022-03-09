

<form method="post" action="functions/f_add_absence.php">
<table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>الحالة</th>
                      <th>الطالب</th>
                      <th>
                      <form method="get" action="<?php $_SERVER['PHP_SELF'] ?>" class="form-inline ml-3">
                        <div class="form-group">
                          <input type="date" name="search_date">
                        </div>
                        <button type="submit">Enter</button>
                      </form>  
                      </th>

                      <th style="width: 200px">اجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php 
    
                        require_once "functions/connect.php";
                        $selectAbsence    = "SELECT * FROM absences";
                        $query           = $connect -> query($selectAbsence);

                        $id = 0 ;
                        foreach ($query as $absence) {
                            $student_id       = $absence['student_id'];
                            $selectStudent    = "SELECT * FROM students";
                            $queryStudent     = $connect -> query($selectStudent);
                            // $date             = date('d-m-y');
                        }
                            foreach($queryStudent as $students){
                    ?>
                    <tr>
                        <!-- id td -->
                      <td><?= ++$id ?></td>
                        <!-- end  id td -->

                        <input type="hidden" name='id' >

                        <!-- status td -->
                      <td>
                        <div class="form-group">
                        <select name="status[]" class="form-control">
                          <option value="0">حاضر</option>
                          <option value="1">غائب</option>

                        </div>

                        <!-- <div class="custom-control">

                        <input type="checkbox" name="status[]" class="custom-control-input"  id="customRadio2">
                        <label class="custom-control-label" for="customRadio2">غائب</label>
                        </div>
							 -->
                        <!-- <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="status" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">حاضر</label>
                        </div>
                        <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="status" value="1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">غائب</label>
                        </div> -->
                        
                      </td>
                        <!-- end status td -->

                        <!-- student_id td -->
                      <td>
                          <input type="text" name="" value="<?= $students['name'] ?>">
                          <input type="hidden" name="student_id[]" value="<?= $students['id'] ?>">
                          
                        </td>

                        <!-- end student_id td -->

                        <!-- date td -->
                        <td><input type="text" value="<?php 
                        if (isset($_GET['search_date'])) 
                        {
                          $date             = $_GET['search_date'];
                        } else 
                        {
                          echo 'no date';
                        }
                        ?>" name="date"></td>
                        <!-- end date td -->

                        <!-- edit absense td -->
                      <td>
                            <a href="students.php?action=edit&id=<?= $absence['id'] ?>" class="btn btn-sm btn-info" style='width: 50px'>تعديل</a>
                           
                      </td>
                      <!-- end edit absense td -->
                    </tr>
                      <?php
                        }
                      ?>  
                  </tbody>
                </table>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>