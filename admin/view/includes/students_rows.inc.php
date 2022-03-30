                    
                <tr>
                  <td style="background-color: skyblue;"><?=$row['id']?></td>
                  <td><?= ++$id ?></td>
                  <td><a href="students.php?action=read&id=<?=$row['id']?>"><?= $row['name'] ?></a></td>
                  <td><?= $row['age'] ?></td>           
                  <td><?= $row['schoolrooms_name'] ?></td>                  
                  <td><?= $row['mother_name'] ?></td>
                  <td><?= $row['mother_phone'] ?></td>
                  <td>
                    <a href="subscriptions.php?action=subscription&id=<?=$row['id']?>" class="btn btn-sm btn-success">دفع</a>
                    <a href="students.php?action=edit&id=<?=$row['id']?>" class="btn btn-sm btn-info">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#d<?=$row['id']?>">
                      Delete
                    </button> 
                    <!-- Modal -->
                    <div class="modal fade" id="d<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete <span class="text-danger text-uppercase"><?= $row['name'] ?></span> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="models/Delete.class.php?id=<?=$row['id']?>&table=students&table_id=id" class="btn btn-danger">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                    