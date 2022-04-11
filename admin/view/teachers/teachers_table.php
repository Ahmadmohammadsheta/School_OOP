
<!-- SEARCH FORM -->

<br>
<div class="container">
  <div class="row">
    <div class="col-lg-11"  style="margin: 25px;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
            </div>
          </div>
          <a href="teachers.php?action=add" class="btn btn-sm btn-info">مدرس جديد</a>

            <table class="table table-bordered">
              <thead>                  
                <tr>
                  <th style="width: 10px;background-color: skyblue;">sql</th>
                  <th style="width: 10px">id</th>
                  <th>الاسم</th>
                  <th>الفصل</th>
                  <th>الهاتف</th>
                  <th>السن</th>
                  <th>اجراء</th>
                </tr>
              </thead>
              <tbody>
<?php
    $model_teachers  = new Model_teachers();
    $rows         = $model_teachers->teacher_join();
    $id = 0;
    foreach ($rows as $row) {
?>
              <tr>
                  <td style="background-color: skyblue;"><?=$row['teachers_id']?></td>
                  <td><?= ++$id ?></td>
                  <td><a href="teachers.php?action=read&id=<?=$row['teachers_id']?>"><?= $row['teachername'] ?></a></td>
                  <td><?= $row['schoolrooms_name'] ?></td>           
                  <td><?= $row['phone'] ?></td>           
                  <td><?= $row['age'] ?></td>           
                  <td>
                    <a href="teachers.php?action=edit&id=<?=$row['teachers_id']?>" class="btn btn-sm btn-info">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#d<?=$row['teachers_id']?>">
                      Delete
                    </button> 
                    <!-- Modal -->
                    <div class="modal fade" id="d<?=$row['teachers_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete <span class="text-danger text-uppercase"><?= $row['teachername'] ?></span> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="models/Delete.class.php?id=<?=$row['teachers_id']?>&table=teachers&table_id=teachers_id" class="btn btn-danger">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
<?php
    }
?>
              </tbody>
            </table>
        </div>
              <!-- /.card-body -->
    </div>
  </div>
  <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
  </div>
</div>


              