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
                            <h4 class="card-title">Month | Year Wise reports :</h4>
                            </div>
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
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Request Type</label>
                                    <div class="col-sm-10 checkbox-radios">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span> Month wise
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios"><span class="circle"></span><span class="check"></span> Year wise
                                            </label>
                                        </div>
                                    </div>
                                    <label class="col-sm-3 label-on-right">
                                    </label>
                                </div>  
                               <!--  <div class="form-group"> <label for="exampleInputPassword1">Request Type</label>
                                <input type="radio" name="requesttype" value="mtwise" checked="true">Month wise
                                  <input type="radio" name="requesttype" value="yrwise">Year wise </div> -->
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" name="create_role" class="btn btn-rose btn-fill">Submit</button>
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
