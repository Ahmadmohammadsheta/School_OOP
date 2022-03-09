<?php
    require 'models/Model_students.php';
    require 'models/Model_subscription.php';
    require 'models/Model_for_all.php';
    $model = new Model_students();
    $id    = $_REQUEST['id'];
    $model->tables = 'students';
    $row  = $model->read($id);
    //Schoolrooms
    $schoolroom_id      = $row['schoolroom_id'];
    $model->tables      = 'schoolrooms';
    $row_schoolroom     = $model->read($schoolroom_id);
    //Subscriptions
    $sub_model         = new Model_subscription();
    $sub_model->tables = 'subscriptions';
    $row_residual      = $sub_model->sub_read($id);
    $insert            = $sub_model->sub_insert();
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-bolder">
                    <h1 class="text-danger"><?= $row['name'] ?></h1>
                    <br>
                    
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>تسجيل الدفع</h3><br>
                                <h5 class="text-danger"> ------------------------------</h5>
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاشتراك</label>
                                    <input type="text" name="vlaue"  class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="القيمة المدفوعة">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الشهر</label>
                                    <input type="month" name="month" value="" class="form-control" id="exampleInputEmail1" style="width: 200px;" placeholder="الشهر">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم</label>
                                    <input type="text" name="student_id" value="<?=$row['id']?>" class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="الاسم">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الفصل</label>
                                    <input type="text" name="schoolroom_id" value="<?=$row_schoolroom['id']?>" class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="الفصل ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"></label>
                                    <input type="hidden" name="residual" value="250-" class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="القيمة المدفوعة">
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                            <div class="col-md-4">
                                <h3>بيانات الطالب</h3><br>
                                <h5 class="text-danger"> ------------------------------</h5>

                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STUDENT NAME is : </th>
                                        <td class="text-danger text-bold"><?= $row['name'] ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="col">STUDENT AGE is : </th>
                                        <td class="text-danger text-bold"><?= $row['age'] ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="col">STUDENT MOTHER is</th>
                                        <td class="text-danger text-bold"><?= $row['mother_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="col">STUDENT Mother phone is : </th>
                                        <td class="text-danger text-bold"><?= $row['mother_phone'] ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Schoolroom is : </th>
                                        <td class="text-danger text-bold"><?= $row_schoolroom['name'] ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="col">Residual is : </th>
                                        <td class="text-danger text-bold"><?= $row_schoolroom['name'] ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


