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
                            <h4 class="card-title">Between dates reports :</h4>
                            </div>
                            <?php
                            if(isset($_SESSION['success_del']) && $_SESSION['success_del'] !='')
                            {
                                echo '<h4 class ="">'.$_SESSION['success_del'].'</h4>';
                                unset($_SESSION['success_del']);
                            }
                            if(isset($_SESSION['status_del']) && $_SESSION['status_del'] !='')
                            {
                                echo '<h4 class="">'.$_SESSION['status_del'].'</h4>';
                                unset($_SESSION['status_del']);
                            }
                            ?>
                            <div class="card-content">
                            
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">From Date</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'> 
                                        </div>
                                    </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">To Date</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>                                                
                                        </div>
                                    </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>  
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" name="btw_date" class="btn btn-rose btn-fill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if(isset($_POST["btw_date"]))
                {
                $fdate=$_POST['fromdate'];  
                $tdate=$_POST['todate'];
                ?>
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Between dates reports :</h4>
                        <div class="toolbar">
                        
                        <div class="col-12 text-right">
                        <form action="report.php" method="post">
                        <input type="hidden" value="<?php echo $fdate; ?>" name="fdate">
                        <input type="hidden" value="<?php echo $tdate; ?>" name="tdate">
                        <input type="submit" class="btn btn btn-rose" name="bw_report" value="Genrate Report" />
                                <div class="ripple-container">
                                </form>
                                </div>
                            </a>  
                        </div>                       
                        </div>
                        <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <th>Name</th>
                                        <th>Creation date</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                    </tr>
                                </thead>
                                <!-- Display divice Information -->
                                <?php
                                include('database/dbconfig.php');
                                $ret=mysqli_query($dbconfig,"select * from ct_user_entry where date between '$fdate' and '$tdate'");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                                ?>
                                <tr class="odd">
                                <th ><?php echo $cnt;?></th>  
                                  <td style="text-transform: uppercase;"><?php echo $row['name'];?> </td>
                                  <td ><?php echo $row['date']; ?> </td>    
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
                <!-- end content-->
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
<script>
        new WOW().init();
</script>
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
include('asset/footer.php');
include('asset/scripts.php');
?>
