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
                                <div class="row">
                                   <div class="col-md-" id="printableArea">
                                    <Br></Br>
                                    <!-- Table_end -->
                                    <!-- Table_start -->
                    
                                            <!-- Display divice Information -->
                                            <?php
                                            include('database/dbconfig.php');   
                                            $ret=mysqli_query($dbconfig,"select * from pass where id='7'");
                                            $cnt=1;
                                        
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                            <table class="" align="center" style="border: 1px solid black; text-align: center;">
                                            <tr ><td><h4> ADARSH BUS DEPATMENT</h4></td></tr>
                                            </table>
                                            <style>
                                            table, td, th {

                                            border: 1px solid black;
                                            padding-left: 22px;
                                            }

                                            table {
                                            border-collapse: collapse;
                                            width: 50%;
                                            }

                                            th {
                                            height: 60px;
                                            }
                                            </style>
                                            <br>
                                            <table align="center" style="border: 1px solid black;" >
                                            <tr>
                                                <th>No</th>
                                                <td><?php echo $row['id'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <td><?php echo $row['sname'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Class</th>
                                                <td><?php echo $row['class'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Branch</th>
                                                <td><?php echo $row['branch'];?></td>
                                            </tr>
                                            <tr>
                                                <th>From</th>
                                                <td><?php echo $row['vf'];?></td>
                                            </tr>
                                            <tr>
                                                <th>To</th>
                                                <td><?php echo $row['vt'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Route</th>
                                                <td><?php echo $row['rname'];?></td>
                                            </tr>
                                            <tr >
                                                <th>Pass Amount</th>
                                                <td><?php echo $row['fee'];?></td>
                                            </tr>
                                            </table>
                                            <?php 
                                            $cnt=$cnt+1;
                                            }
                                            ?>
                                        </tbody>			
                                    </table>
                                    <!-- Table_end -->
                                    </div> 			 	
  
                                </div>  
                            </div>
                            <div class="card-footer text-center">
                                <input type="button" class="btn btn-rose btn-fill" onclick="printDiv('printableArea')" value="Print Report" />
                            </div>
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
include('asset/footer.php');
?>