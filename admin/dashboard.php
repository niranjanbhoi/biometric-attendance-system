<?php
include('asset/security.php'); 
include('asset/header.php'); 
include('asset/navbar.php'); 
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Strength</p>
                            <?php
                            require 'database/dbconfig.php';

                            $sql="SELECT id FROM ct_register ORDER BY id" ;

                            if ($result=mysqli_query($dbconfig,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            echo '<h3 herf="device.php" class="card-title">'.$rowcount.'</h3>';
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                            <!-- <h3 class="card-title">184</h3> -->
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="rose">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Device</p>
                            <?php
                            require 'database/dbconfig.php';

                            $sql="SELECT id FROM ct_device_info ORDER BY id" ;

                            if ($result=mysqli_query($dbconfig,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            echo '<h3 class="card-title">'.$rowcount.'</h3>';
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                            <!-- <h3 class="card-title">75.521</h3> -->
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">import_export</i>
                        </div>
                        <div class="card-content">
                            <p class="category">IN</p>
                            <?php
                            require 'database/dbconfig.php';
                            date_default_timezone_set('Asia/Kolkata');
                            // echo "The time is " . date('H:i:s');
                            $date =  date('Y-m-d');
                            // $time = date('H:i:s');
                            // echo $date;
                            //$date = date("Y-m-d H:i:s");

                            $sql="SELECT id FROM ct_user_entry  where ct_io_status ='1' and date = '$date' ORDER BY id" ;

                            if ($result=mysqli_query($dbconfig,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            echo '<h3 class="card-title">'.$rowcount.'</h3>';
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="material-icons">import_export</i> 
                        </div>
                        <div class="card-content">
                            <p class="category">OUT</p>
                            <?php
                            require 'database/dbconfig.php';
                            include('database/dbconfig.php');
                                
                            date_default_timezone_set('Asia/Kolkata');
                            // echo "The time is " . date('H:i:s');
                            $date =  date('Y-m-d');
                            // $time = date('H:i:s');
                            // echo $date;
                            //$date = date("Y-m-d H:i:s");

                            $sql="SELECT id FROM ct_user_entry where L_E_entey ='0' and date = '$date' ORDER BY id " ;

                            if ($result=mysqli_query($dbconfig,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            echo '<h3 class="card-title">'.$rowcount.'</h3>';
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Todays Entries :</h4>
                        <div class="toolbar">
                        
                        <div class="col-12 text-right">
<!--                         <input type="button" class="btn btn btn-rose" onclick="printDiv('printableArea')" value="Print Report" />
 -->                                <div class="ripple-container"></div>
                            </a>  
                        </div>                       
                        </div>
                        <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Device Ip</th>
                                                    <th>Creation date</th>
                                                    <th>IN Time</th>
                                                    <th>Out Time</th>
                                                    <!-- <th>Remove</th> -->
                                                </tr>
                                             </thead>
                                             <tbody>
                                <!-- Display divice Information -->
                                <?php
                                include('database/dbconfig.php');
                                
                                date_default_timezone_set('Asia/Kolkata');
                                // echo "The time is " . date('H:i:s');
                                $date =  date('Y-m-d');
                                // $time = date('H:i:s');
                                // echo $date;
                                //$date = date("Y-m-d H:i:s");
                                $ret=mysqli_query($dbconfig,"select * from ct_user_entry where date = '$date'");
                                $cnt=1;
                              
                                while ($row=mysqli_fetch_array($ret)) {
                                ?>
                                <tr class="odd">
                                    <td ><?php echo $cnt;?></td>  
                                    <td style="text-transform: uppercase;"><?php echo $row['name']; ?> </td>
                                    <td><?php echo $row['device_ip']; ?> </td>
                                    <td><?php echo $row['date']; ?> </td>    
                                    <td><?php echo $row['time']; ?> </td>
                                    <td><?php echo $row['out_time']; ?> </td>
                                    <!-- <td>
                                    <form action="function.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php /* echo $row['id']; */ ?>">
                                            <button type="submit"  name="delete_role" rel="tooltip" class="btn btn-danger btn-simple">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td> -->
                                </tr>
                                <?php 
                                $cnt=$cnt+1;
                                }
                                ?>
                              </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
            </div> 
        </div>
    </div>
<?php
include('asset/scripts.php');
include('asset/footer.php');
?>
<script language="javascript">
setTimeout(function(){
   window.location.reload(1);
},30000);
</script>