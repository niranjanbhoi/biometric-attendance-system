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
                            <h4 class="card-title">Contact Us :</h4>
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
                            <?php
                                include('database/dbconfig.php');
                                $ret=mysqli_query($dbconfig,"select * from  ct_blog where PageType='contactus'");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                                ?>
                                <div class="row">       
                                    <label class="col-sm-2 label-on-left">Page Title</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="pagetitle" id="pagetitle" value="<?php  echo $row['PageTitle'];?>" required="true">                                    </div>
                                            </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Email</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="email" id="email" value="<?php  echo $row['Email'];?>" required="true">                                        </div>
                                        </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Mobile Number</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="mobnumber" id="mobnumber" value="<?php  echo $row['MobileNumber'];?>" required="true">                                        </div>
                                    </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Timing</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="timing" id="timing" value="<?php  echo $row['Timing'];?>" required="true">                                        </div>
                                    </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Page Description</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <textarea name="pagedes" id="pagedes" rows="5" class="form-control"><?php  echo $row['PageDescription'];?></textarea>                                                
                                        </div>
                                    </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>  
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" name="update_contact-us" class="btn btn-rose btn-fill">Submit</button>
                            </div>
                            <?php 
                            }
                            ?>
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
<?php
include('asset/footer.php');
include('asset/scripts.php');
?>
