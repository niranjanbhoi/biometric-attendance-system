<?php
//session_start();
include('asset/security.php'); 
include('asset/header.php'); 
include('asset/navbar.php'); 
?>
<div class="content">
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="rose" id="wizardProfile">
                    <form method="post" enctype="multipart/form-data" action="function.php">
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                                Build Your Profile
                            </h3>
                            <h5>This information will let us know more about you.</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">About</a>
                                </li>
                                <li>
                                    <a href="#account" data-toggle="tab">Personal_info</a>
                                </li>
                                <li>
                                    <a href="#address" data-toggle="tab">Address</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <div class="row">
                                    <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                <input  type="file" name="photo" value="$_SESSION["images"]" id="wizard-picture">
                                            </div>
                                            <h6>Choose Picture</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">First Name
                                                    <small>(required)</small>
                                                </label>
                                                <input name="firstname" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">record_voice_over</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Last Name
                                                    <small>(required)</small>
                                                </label>
                                                <input name="lastname" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email
                                                    <small>(required)</small>
                                                </label>
                                                <input name="email" type="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Enter DOB and other ditails. </h4>
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="col-sm-10 col-sm-offset-1">
                                        
                                          <div class="form-group label-floating">
                                            <label for=""><small>(required)</small></label>
                                              <input type="date" name="date" class="form-control datepicker" style="">
                                              <span class="material-input"></span>
                                          </div>
                                      </div>
                                      
                                    
                                     
                                        <div class="col-sm-10 col-sm-offset-1">
                                          <div class="form-group label-floating">
                                              <label class="control-label">Gender</label>
                                              <select name="gender" class="form-control">
                                                <option value="Male"> Male </option>
                                                <option value="Female"> Female </option>
                                            </select>
                                          </div>
                                      
                                      </div> 
                                      <div class="col-sm-5 col-sm-offset-1">
                                          <div class="form-group label-floating">
                                              <label class="control-label">Contact no</label>
                                              <input type="text" name="smob" maxlength="10" class="form-control">
                                          </div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="form-group label-floating">
                                              <label class="control-label">Parent_contact no</label>
                                              <input type="text" name="pmob" maxlength="10" class="form-control">
                                          </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Are you living in a nice area? </h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pin code</label>
                                            <input type="text" name="pin" maxlength="6" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group label-floating">
                                            <label class="control-label">City</label>
                                            <input type="text" name="city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">State</label>
                                            <select name="state" class="form-control">
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                    <h4 class="info-text"> Enter Device ip... </h4>
                                        <div class="form-group label-floating">
                                            <select name="device_ip" class="form-control">
                                            <?php 
                                            include('database/dbconfig.php');
                                            $sql  = "SELECT * FROM ct_device_info";
                                            $result = $dbconfig->query($sql);
                                            if ($result->num_rows > 0) 
                                                {
                                                while($row = $result->fetch_assoc()) 
                                                {
                                                    ?>
                                                <option value="<?php echo $row['device_ip'];?>"><?php echo $row['device_ip'];?></option>
                                                <!-- <input type="text" name="device_ip" placeholder="eg.127.0.0.1" class="form-control"> -->
                                                <?php
                                                    }
                                                }
                                            $dbconfig->close();
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' />
                            </div>
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
</div>
<script>
function reset() {
  document.getElementById("reset").reset();
}
</script>
<?php
include('asset/scripts.php');
include('asset/footer.php');
?>