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
                                <form id="TypeValidation" enctype="multipart/form-data" class="form-horizontal" action="function.php" method="post">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                    <i class="material-icons">person_add</i>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label" style="padding: 17px 5px 0 0;text-align: right;">Profile photo</label>
                                            <div class="col-sm-7">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                <img name="img" src="../assets/img/default-avatar.png">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                <span class="btn btn-rose btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="photo" value="$_SESSION["images"]" id="input-picture">
                                                </span>
                                                    <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Username</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control"  type="text" name="username" required="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Email</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input name="email" class="form-control"  type="text" name="name" required="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Role</label>
                                            <div class="col-sm-7">
                                                <select class="selectpicker" style="display:inline-block" name="user_type" data-style="select-with-transition" title="" data-size="100">
                                                <?php 
                                                include('database/dbconfig.php');
                                                $sql  = "SELECT * FROM ct_role";
                                                $result = $dbconfig->query($sql);
                                                if ($result->num_rows > 0) 
                                                    {
                                                    $cnt=1;    
                                                    while($row = $result->fetch_assoc()) 
                                                    {
                                                        ?>
                                                            <option value="<?php echo $cnt;?>" ><?php echo $row['name'];?></option>
                                                        <?php
                                                        $cnt=$cnt+1;
                                                    }
                                                }
                                                $dbconfig->close();
                                                ?>
                                                </select>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Password</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control"  type="password" name="password" required="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Confirm Password</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control"  type="password" name="password_confirmation" required="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="create_user" class="btn btn-rose btn-fill">Submit</button>
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
<?php
include('asset/footer.php');
include('asset/scripts.php');
?>