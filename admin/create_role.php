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
                                    <i class="material-icons">assignment</i>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Name</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" placeholder="Name" type="text" name="name" required="true" />
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
                                                    <textarea cols="30" rows="10" class="form-control" name="description" id="input-description" type="text" placeholder="Description" required="true" aria-required="true"></textarea>                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="create_role" class="btn btn-rose btn-fill">Validate Inputs</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- end content--
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