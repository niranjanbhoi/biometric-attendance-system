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
                <?php 
                        include('database/dbconfig.php');
                        if(isset($_POST['update_role']))
                        {
                        $id = $_POST['id'];
                        $sql  = "SELECT * FROM ct_role WHERE id='$id' ";
                        //  echo $id;
                        $result = $dbconfig->query($sql);
                        if ($result->num_rows > 0) 
                            {
                            while($row = $result->fetch_assoc()) 
                            {
                                // $_SESSION["images"] = $row['images'];
                                ?>
                                <form id="TypeValidation" class="form-horizontal" action="function.php" method="post">
                                <input type="hidden" name = "edit_id" value="<?php echo $row['id'];?>">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Name</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" value="<?php echo $row['name'];?>" type="text" name="name" required="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Description</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <textarea cols="30" rows="10" name="description" id="pagedes" rows="5" class="form-control"><?php  echo $row['description'];?></textarea> </div>
                                                 </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="update_role" class="btn btn-rose btn-fill">Validate Inputs</button>
                                    </div>
                                </form>
                                <?php
                    }
                    } 
                    else 
                    {
                        echo "0 results";
                    }
                }
                $dbconfig->close();
                ?>
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