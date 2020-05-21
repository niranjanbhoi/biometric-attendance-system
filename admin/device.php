<?php
session_start();
include('asset/header.php'); 
include('asset/navbar.php'); 
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">devices</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Device-Information</h4>
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
                        <form action="function.php" method="post">
                          <input type="text" name="device_ip" placeholder="Enter devive IP... " class="form-control input">
                          <input type="submit" value ="Add..."class="btn btn-rose btn-fill" name="add_device">
                        </form>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Sr. no</th>
                                        <th>Device</th>
                                        <th>IP</th>
                                        <th>MAC</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>
                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                            <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                                </tbody> -->
                                <tbody>
                                <!-- Display divice Information -->
                                <?php
                                include('database/dbconfig.php');
                                $sql = "SELECT * FROM  ct_device_info";
                                $result = $dbconfig->query($sql);
                                if ($result->num_rows > 0) {
                                  $sr=1;
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                ?> 
                                <tr>
                                  <td><?php echo $sr; ?> </td>
                                  <td><?php echo $row['device_name']; ?> </td>
                                  <td><?php echo $row['device_ip']; ?> </td>
                                  <td><?php echo $row['device_mac']; ?> </td>    
                                  <td>
                                        <form action="function.php" method="post">
                                       
                                          <input type="hidden" name="device_id" value=" <?php echo $row['id']; ?>">
                                          <button type="submit" name="remove_device" rel="tooltip" class="btn btn-danger btn-simple">
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
include('asset/scripts.php');
include('asset/footer.php');
?>