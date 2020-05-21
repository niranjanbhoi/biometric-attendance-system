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
                     <form id="TypeValidation" class="form-horizontal" action="function.php" method="post">
                            <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Reports :</h4>
                            </div>
                            <div class="card-content">
                            <?php
                                if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                                {
                                echo '<h4 class ="">'.$_SESSION['success'].'</h4>';
                                unset($_SESSION['success']);
                                }

                                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                                {
                                echo '<h4 class="">'.$_SESSION['status'].'</h4>';
                                unset($_SESSION['status']);
                                }
                            ?>
                            <div class="col-12 text-right">
                            <input type="button" class="btn btn btn-rose" onclick="printDiv('printableArea')" value="Print Report" />
                                <!-- <a href="student.php" class="btn btn btn-rose">Add User
                                    <div class="ripple-container"></div>
                                </a>   -->
                            </div>
                            <?php
                            if(isset($_POST['bw_report'])){
                            ?>
                                <div class="row">
                                   <div class="col-md-" id="printableArea">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <tr ><td style=""><h4> Adarsh Institute of Technology(poly),Vita </h4></td></tr>
                                        <tr><td style=""><h4> CSE Department 2019-20</h4></td></tr>
                                        
                                    </table>
                                    <!-- Title of Report-->
                                    <h3 style="text-align: center;">Monthly Report</h3>
                                    <!-- Table_Start-->
                                    <table class="table table-bordered" style="text-align: center;">
                                        <tr>
                                            <td style="">Date : From <?php echo $_POST['fdate']; ?> TO <?php echo $_POST['tdate']; ?> </td>
                                            <td style="">Genrated by: <?php echo $_SESSION['username']; ?></td>
                                        </tr>
                                    </table>
                                    <Br></Br>
                                    <!-- Table_end -->
                                    <!-- Table_start -->
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Creation date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Display divice Information -->
                                            <?php
                                            include('database/dbconfig.php');
                                            
                                            $fdate=$_POST['fdate'];  
                                            $tdate=$_POST['tdate'];

                                            $ret=mysqli_query($dbconfig,"select * from ct_user_entry where date between '$fdate' and '$tdate'");
                                            $cnt=1;
                                        
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                            <tr class="odd">
                                            <td ><?php echo $cnt;?></td>  
                                            <td style="text-transform: uppercase;"><?php echo $row['name']; ?> </td>
                                            <td><?php echo $row['date']; ?> </td> 
                                            <td><?php echo $row['time']; ?> </td>    
                                            <td><?php echo $row['out_time']; ?> </td> 

                                            </tr>
                                            <?php 
                                            $cnt=$cnt+1;
                                            }
                                            ?>
                                        </tbody>			
                                    </table>
                                <?php
                            }
                            ?>
                            <?php
                            if(isset($_POST['date_wise'])){
                            ?>
                                <div class="row">
                                   <div class="col-md-" id="printableArea">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <tr ><td style=""><h4> Adarsh Institute of Technology(poly),Vita </h4></td></tr>
                                        <tr><td style=""><h4> CSE Department 2019-20</h4></td></tr>
                                        
                                    </table>
                                    <!-- Title of Report-->
                                    <h3 style="text-align: center;">Daily Report</h3>
                                    <!-- Table_Start-->
                                    <table class="table table-bordered" style="text-align: center;">
                                        <tr>
                                            <td style="">Date : <?php echo $_POST['fdate']; ?></td>
                                            <td style="">Genrated by: <?php echo $_SESSION['username']; ?></td>
                                        </tr>
                                    </table>
                                    <Br></Br>
                                    <!-- Table_end -->
                                    <!-- Table_start -->
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Creation date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Display divice Information -->
                                            <?php
                                            include('database/dbconfig.php');
                                            
                                            $date=$_POST['fdate'];  
                                          

                                            $ret=mysqli_query($dbconfig,"select * from ct_user_entry where date='$date'");
                                            $cnt=1;
                                        
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                            <tr class="odd">
                                            <td ><?php echo $cnt;?></td>  
                                            <td style="text-transform: uppercase;"><?php echo $row['name']; ?> </td>
                                            <td><?php echo $row['date']; ?> </td> 
                                            <td><?php echo $row['time']; ?> </td>    
                                            <td><?php echo $row['out_time']; ?> </td> 

                                            </tr>
                                            <?php 
                                            $cnt=$cnt+1;
                                            }
                                            ?>
                                        </tbody>			
                                    </table>
                                    <?php
                            }
                            ?>
                                    <!-- Table_end -->
                                    </div> 			 	
  
                                </div>  
                            </div>
                          <!--   <div class="card-footer text-center">
                                <input type="button" class="btn btn-rose btn-fill" onclick="printDiv('printableArea')" value="Print Report" />
                            </div> -->
                        </form>
                    </div>
                </div>
                <!-- end content-->
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
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
include('asset/scripts.php');
?>