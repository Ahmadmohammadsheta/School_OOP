<?php

    $model = new Model_students();
    $id    = $_REQUEST['id'];
    $model->tables = 'students';
    $table_id = 'id';
    $row  = $model->read($id, $table_id);
    //Schoolrooms
    $schoolroom_id      = $row['schoolroom_id'];
    $model->tables      = 'schoolrooms';
    $table_id = 'schoolrooms_id';
    $row_schoolroom     = $model->read($schoolroom_id, $table_id);
    //Subscriptions
    $model_subscription = new Model_subscription();
    $insert_subscription= $model_subscription->insert_subscription_test();


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
                            <div class="col-md-3">
                                <h3>تسجيل الدفع</h3><br>
                                <h5 class="text-danger"> ------------------------------</h5>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الاشتراك</label>
                                        <input type="text" name="value"  class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="القيمة المدفوعة">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الشهر</label>
                                        <input type="month" name="month" value="" class="form-control" id="exampleInputEmail1" style="width: 200px;" placeholder="الشهر">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="hidden" name="student_id" value="<?=$row['id']?>" class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="الاسم">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="hidden" name="schoolroom_id" value="<?=$row_schoolroom['schoolrooms_id']?>" class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="الفصل ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"></label>
                                        <input type="hidden" name="residual" value="1" class="form-control" id="exampleInputEmail1" style="width: 150px;" placeholder="القيمة المدفوعة">
                                    </div>
                                    <br>
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <h3>بيانات الطالب</h3><br>
                                <h5 class="text-danger"> ------------------------------</h5>

                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <td class="text-danger text-bold"><?= $row['id'] ?></td>
                                        </tr>
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
                                            <td class="text-danger text-bold"><?= $row_schoolroom['schoolrooms_name'] ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col">Residual is : </th>
                                            <td class="text-danger text-bold"><?= $row_schoolroom['schoolrooms_name'] ?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3">
                                <h3>مدفوعات الطالب</h3><br>
                                <h5 class="text-danger"> ------------------------------</h5>
                                <table class="table">
                                    <thead class="thead-dark">
<?php
    $model_subscription->tables      = 'subscriptions';
    $row_subscriptions  = $model_subscription->fetch_where($id);
    if (!empty($row_subscriptions)) {
        foreach ($row_subscriptions as $row_subscription) {
?>        
                                        <tr>
                                            <td class="text-danger text-bold"><?= $row['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col"><?= $row_subscription['month'] ?></th>
                                            <td class="text-danger text-bold"><?= $row_subscription['value'] ?></td>
                                        </tr>
                                      
<?php
        }
    } else {
        echo '<tr><td class="text-danger text-bold"><h3>لم يدفع بعد</h3></td></tr>';
    }
?>
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


