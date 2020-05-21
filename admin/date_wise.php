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
                     <div class="col-md-12">
                        <form id="TypeValidation" class="form-horizontal" action="" method="post">
                            <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Date wise :</h4>
                            </div>
                            <div class="card-content">
                            
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Select Date</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'> 
                                        </div>
                                    </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>  
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" name="date_wise" class="btn btn-rose btn-fill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end content-->
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <?php
              if(isset($_POST["date_wise"]))
              {
                $fdate=$_POST['fromdate'];  
                ?>
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Date wise :</h4>
                        <div class="toolbar">
                        
                        <div class="col-12 text-right">
                        <form action="report.php" method="post">
                        <input type="hidden" value="<?php echo $fdate; ?>" name="fdate">
                        <input type="submit" class="btn btn btn-rose" name="date_wise" value="Genrate Report" />
                                <div class="ripple-container"></div>
                            </a>  
                        </div>     
                        </form>                  
                        </div>
                        <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Creation date</th>
                                                    <th>In Time</th>
                                                    <th>Out Time</th>
                                                </tr>
                                             </thead>
                                <!-- Display divice Information -->
                                <?php
                                include('database/dbconfig.php');
                                $ret=mysqli_query($dbconfig,"select * from ct_user_entry where date='$fdate'");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                                ?>
                                <tr class="odd">
                                  <td><?php echo $cnt;?></td>  
                                  <td><?php echo $row['name']; ?> </td>
                                  <td><?php echo $row['date']; ?> </td>    
                                  <td><?php echo $row['time']; ?> </td>    
                                  <td><?php echo $row['out_time']; ?> </td>    
                                </tr>
                                <?php 
                                $cnt=$cnt+1;
                                }
                                }
                                ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
        <!-- end row -->
    </div>
</div>
<?php
include('asset/footer.php');
include('asset/scripts.php');
?>
