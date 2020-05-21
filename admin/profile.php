<?php
include('asset/security.php'); 
include('asset/header.php'); 
include('asset/navbar.php'); 
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <?php
                          if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                          {
                            echo '<h3 class ="text-info">'.$_SESSION['success'].'</h3>';
                            unset($_SESSION['success']);
                          }
                          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                          {
                            echo '<h3 class="text-danger">'.$_SESSION['status'].'</h3>';
                            unset($_SESSION['status']);
                          }
                        ?>
                    <div class="card-content">
                        <h4 class="card-title">Edit Profile
                        </h4>
                        <?php 
                        include('database/dbconfig.php');
                        if(isset($_SESSION['username']))
                        {
                        $username = $_SESSION['username'];
                        $sql  = "SELECT * FROM ct_admin WHERE username='$username' ";
                        $result = $dbconfig->query($sql);
                        if ($result->num_rows > 0) 
                            {
                            while($row = $result->fetch_assoc()) 
                            {
                                // $_SESSION["images"] = $row['images'];
                                ?>
                    <form method="post" enctype="multipart/form-data" action="function.php" autocomplete="off" class="form-horizontal">
                        <div class="row">
                            <label class="col-sm-2 col-form-label" style="padding: 17px 5px 0 0;text-align: right;">Profile photo</label>
                            <div class="col-sm-7">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle">
                                <?php echo'<img name="img" src="img/imageDirectory/'.$row['images'].'">'?>
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
                            <label class="col-sm-2 col-form-label" style="padding: 17px 5px 0 0;text-align: right;" >Name</label>
                            <div class="col-sm-7">
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="name" id="input-name" type="text" placeholder="Name" value="<?php echo $row['username'];?>" required="true" aria-required="true">
                                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label" style="padding: 17px 5px 0 0;text-align: right;">Email</label>
                            <div class="col-sm-7">
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="email" id="input-email" type="email" placeholder="Email" value="<?php echo $row['email'];?>" required="">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                            <button type="submit" name="Update_admin_info" class="btn btn-rose pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                    </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">lock</i>
                    </div>
                    <div class="card-content">
                    <h4 class="card-title">Change password</h4>

                    <form method="post" action="function.php" class="form-horizontal">
                    <input type="hidden" name="_token" value="ef5VpKxWVWLNDxE3MoPz2y1NoNXWNpZcoYoqvxeH">              <input type="hidden" name="_method" value="put">
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-current-password">Current Password</label>
                        <div class="col-sm-7">
                        <div class="form-group bmd-form-group is-filled">
                            <input class="form-control" input="" type="password" name="old_password" id="input-current-password" placeholder="Current Password" value="" required="">
                                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-password">New Password</label>
                        <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            <input class="form-control" name="password" id="input-password" type="password" placeholder="New Password" value="" required="">
                                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="input-password-confirmation">Confirm New Password</label>
                        <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="Confirm New Password" value="" required="">
                        </div>
                        </div>
                    </div>
                    <button type="submit" name="Update_admin_password" class="btn btn-rose pull-right">Change password</button>
                    <div class="clearfix"></div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-content">
                      <div class="  XLK0Od"><div class="ahh38c"><div class="ugt2L iDdZmf"><div><div class="N5YmOc kJXJmd"><header class="mSUZQd"><div class="jbRlDc"><h2 class="fnfC4c">Delete a account service</h2><div class="ISnqu"><div></div></div></div><div class="CljqTd">You can permanently delete your Account and all your services.<div class="fxHFgc"><style nonce="">.HJOYVi5 {width: 96px; height: 96px;}</style>
                      <img class="YPzqGd" style="width : 100px" src="https://www.gstatic.com/identity/boq/accountsettingsmobile/deleteservicesoraccount_services_icon_96x96_b200c14fec37ac000a1b3f54905af6a8.png" srcset="https://www.gstatic.com/identity/boq/accountsettingsmobile/deleteservicesoraccount_services_icon_192x192_629d9e06f54db6bf8aba5517e8de5cb4.png 2x, https://www.gstatic.com/identity/boq/accountsettingsmobile/deleteservicesoraccount_services_icon_288x288_0a32d585595cf9cad47fc1495cc934ab.png 3x, https://www.gstatic.com/identity/boq/accountsettingsmobile/deleteservicesoraccount_services_icon_384x384_db679df99077dc42564f911797295265.png 4x" data-iml="795.8250000010594" data-atf="true"></div></div></header></div></div></div><div class="ugt2L ul8zCc aK2X8b t97Ap"><div class="cv2gi" role="presentation"><div class="Q5jTGb"></div></div><div class="VfPpkd-ksKsZd-XxIAqe" jscontroller="fjYfSd" jsaction="click:cOuCgd; mousedown:UX7yZ; mouseup:lbsD7e; mouseenter:tfO1Yc; mouseleave:JywGue; touchstart:p6p2H; touchmove:FwuNnf; touchend:yfqBxc; touchcancel:JMtRjd; focus:AHmuwe; blur:O22p3e; contextmenu:mg9Pef"><a href="deleteservices" class="VZLjze Wvetm I6g62c N5YmOc kJXJmd" data-rid="302"><div class="mtfBU"></div></a></div></div></div></div> 
               <!-- Button trigger modal -->
                        
                            <button type="button" class="btn btn-rose" data-toggle="modal" data-target="#exampleModal">
                            Delete a account
                            </button>
                        
                        <!-- Modal -->
                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete account services.</h5>
                            </div>
                            <?php
                            if(isset($_SESSION['status_del']) && $_SESSION['status_del'] !='')
                            {
                                echo '<h2 class="">'.$_SESSION['status_del'].'</h2>';
                                unset($_SESSION['status_del']);
                            }
                            ?>
                            <form method="post" action="function.php" class="form-horizontal">
                            <div class="modal-body">
                                <div class="form-group bmd-form-group is-filled">
                                    <input class="form-control"  type="password" name="password" id="input-current-password" placeholder="Enter your Password" value="" required="">
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Cancle</button>
                                <button type="submit" name="delete_admin_profile" class="btn btn-info">Delete</button>
                            </div>
                            </form>
                            </div>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('asset/footer.php');
include('asset/scripts.php');
?>