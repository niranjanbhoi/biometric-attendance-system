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
                        <i class="material-icons">people_alt</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Total-user-registered</h4>
                        <div class="toolbar">
                        <?php
                          if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                          {
                            echo '<h3 class ="text-info">'.$_SESSION['success'].'</h3>';
                            unset($_SESSION['success']);
                          }
                          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                          {
                            echo '<h3 class="text-danger">'.$_SESSION['status'].'</h3>';
                            unset($_SESSION['status']);
                          }
                        ?>
                        <div class="col-12 text-right">
                            <a href="student.php" class="btn btn btn-rose">Add User
                                <div class="ripple-container"></div>
                            </a>  
                        </div>                       
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Photo</th>
                                        <th>First</th>
                                        <th>Last</th>
                                        <th>email</th>
                                        <th>Contact</th>
                                        <th>Gender</th>
                                        <th>City</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <!-- Display divice Information -->
                                <?php
                                include('database/dbconfig.php');
                                $sql = "SELECT * FROM ct_register";
                                $result = $dbconfig->query($sql);
                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                ?> 
                                <tr class="odd">
                                <td>
                                  <div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                                  <?php echo'<img name="img" src="dataset/'.$row['firstname'].'/'.$row['images'].'" alt="" style="max-width: 100px;">'?>
                                  </div>
                                </td> 
                                    <td style="text-transform: uppercase;" ><?php echo $row['firstname']; ?> </td>
                                    <td style="text-transform: uppercase;"><?php echo $row['lastname']; ?> </td>
                                    <td ><?php echo $row['email']; ?> </td>    
                                    <td ><?php echo $row['smob']; ?> </td>
                                    <td style="text-transform: uppercase;"><?php echo $row['gender']; ?> </td> 
                                    <td style="text-transform: uppercase;"><?php echo $row['city']; ?> </td>  
                                    <td>
                                        <form action="function.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit"  name="register_user_profile" rel="tooltip" class="btn btn-danger btn-simple">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
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