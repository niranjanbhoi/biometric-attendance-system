<?php
include('asset/security.php'); 
include('asset/header.php'); 
include('asset/navbar.php'); 
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Users</h4>
                        <div class="toolbar">
                        <?php
                          if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                          {
                            echo '<h2 class ="">'.$_SESSION['success'].'</h2>';
                            unset($_SESSION['success']);
                          }
                          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                          {
                            echo '<h2 class="">'.$_SESSION['status'].'</h2>';
                            unset($_SESSION['status']);
                          }
                        ?>
                        <div class="col-12 text-right">
                            <a href="create_user.php" class="btn btn btn-rose">Add User
                                <div class="ripple-container"></div>
                            </a>  
                        </div>                       
                        </div>
                        <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Creation date</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                <!-- Display divice Information -->
                                <?php
                                include('database/dbconfig.php');
                                $sql = "SELECT * FROM  ct_admin";
                                $result = $dbconfig->query($sql);
                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {

                                    if(1 == $row['user_type'])
                                    {
                                      $user_type="Admin";
                                    }
                                    if(2 == $row['user_type'])
                                    {
                                      $user_type="Member";
                                    }
                                    if(3 == $row['user_type'])
                                    {
                                      $user_type="Creater";
                                    }
                                ?> 
                                <tr class="odd">
                                <td>
                                  <div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                                  <?php echo'<img name="img" src="img/imageDirectory/'.$row['images'].'" alt="" style="max-width: 100px;">'?>
                                  </div>
                                </td> 
                                  <td><?php echo $row['username']; ?> </td>
                                  <td><?php echo $row['email']; ?> </td>
                                  <td><?php echo $user_type; ?> </td>  
                                  <td><?php echo $row['date']; ?> </td>  
                                </tr>
                                <?php  
                                  }
                              } else 
                              {
                                  echo "0 results";
                              }
                              $dbconfig->close();
                              ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
<?php
include('asset/footer.php');
include('asset/scripts.php');
?>