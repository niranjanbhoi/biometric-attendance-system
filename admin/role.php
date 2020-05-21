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
                        <h4 class="card-title">Roles</h4>
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
                            <a href="create_role.php" class="btn btn btn-rose">Add role
                                <div class="ripple-container"></div>
                            </a>  
                        </div>                       
                        </div>
                        <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Creation date</th>
                                                    <th>Edit</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                <!-- Display divice Information -->
                                <?php
                                include('database/dbconfig.php');
                                $sql = "SELECT id,name, description, creation_date FROM  ct_role";
                                $result = $dbconfig->query($sql);
                                $sr=1;
                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                ?> 
                                <tr class="odd">
                                <td ><?php echo $sr; ?> </td>  
                                  <td ><?php echo $row['name']; ?> </td>
                                  <td><?php echo $row['description']; ?> </td>
                                  <td><?php echo $row['creation_date']; ?> </td>    
                                  <td>
                                        <form action="edit_role.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="update_role" rel="tooltip" class="btn btn-info btn-simple">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="function.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit"  name="delete_role" rel="tooltip" class="btn btn-danger btn-simple">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php  
                                $sr += 1;
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