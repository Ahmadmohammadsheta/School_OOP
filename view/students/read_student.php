<?php

    $model = new Model_students();
    $id    = $_REQUEST['id'];
    $model->tables = 'students';
    $row  = $model->read($id);

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-bolder">
                    <h1 class="text-danger"><?= $row['name'] ?></h1>
                </div>
                <div class="card-body">
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
<?php
    $schoolroom_id      = $row['schoolroom_id'];
    $model->tables      = 'schoolrooms';
    $row_schoolroom     = $model->read($schoolroom_id);
?>
                        <tr>
                            <th scope="col">Schoolroom is : </th>
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
