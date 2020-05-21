<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" href="img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Contact Us | Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-kit.css" rel="stylesheet"/>
</head>

<body class="contact-page">

<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="blog.php">Creative TM</a>
        	</div>
        	<div class="collapse navbar-collapse" id="navigation-example"> 	
        		<ul class="nav navbar-nav navbar-right">
    				<li>
						<a href="admin\dashboard.php">
							<i class="material-icons">fingerprint</i> Login
						</a>
					</li>
					<li>
						<a href="admin/register.php" class="btn btn-white btn-simple">
							<i class="material-icons">person_add</i> Signup Page
						</a>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">arrow_downward</i>Downloads
							<b class="caret"></b>
						</a>
				<!-- 		<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="sections.html#headers">
									<i class="material-icons">dns</i> Headers
								</a>
							</li>
							<li>
								<a href="sections.html#features">
									<i class="material-icons">build</i> Features
								</a>
							</li>
							<li>
								<a href="sections.html#blogs">
									<i class="material-icons">list</i> Blogs
								</a>
							</li>
							<li>
								<a href="sections.html#teams">
									<i class="material-icons">people</i> Teams
								</a>
							</li>
							<li>
								<a href="sections.html#projects">
									<i class="material-icons">assignment</i> Projects
								</a>
							</li>
							<li>
								<a href="sections.html#pricing">
									<i class="material-icons">monetization_on</i> Pricing
								</a>
							</li>
							<li>
								<a href="sections.html#testimonials">
									<i class="material-icons">chat</i> Testimonials
								</a>
							</li>
							<li>
								<a href="sections.html#contactus">
									<i class="material-icons">call</i> Contacts
								</a>
							</li>

						</ul> -->
					</li>
					<li>
						<a href="about-us.php" target="_blank" class="btn btn-white btn-simple">
							<i class="material-icons">account_balance</i>About US
						</a>
					</li>
					<li>
						<a href="contact-us.php" target="_blank" class="btn btn-white btn-simple">
							<i class="material-icons">location_on</i> Contact US
						</a>
					</li>
        		</ul>
        	</div>
    	</div>
    </nav>
	<?php 
	include('admin/database/dbconfig.php');
	$sql  = "SELECT * FROM ct_blog WHERE PageType='contactus'";
	$result = $dbconfig->query($sql);
		if ($result->num_rows > 0) 
		{
		while($row = $result->fetch_assoc()) 
		{
		?>                    
    <div id="contactUsMap" class="big-map"></div>

	<div class="main main-raised">
		<div class="contact-content">
    		<div class="container">
            	<h2 class="title">Send us a message</h2>
				<div class="row">
					<div class="col-md-6">
						<p class="description">You can contact us with anything related to our Products. We'll get in touch with you as soon as possible.<br><br>
						</p>
						<form role="form" id="contact-form" method="post">
							<div class="form-group label-floating">
								<label class="control-label">Your name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Email address</label>
								<input type="email" name="email" class="form-control"/>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Phone</label>
								<input type="text" name="phone" class="form-control"/>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Your message</label>
								<textarea name="message" class="form-control" id="message" rows="6"></textarea>
							</div>
							<div class="submit text-center">
								<input type="submit" class="btn btn-primary btn-raised btn-round" value="Contact Us" />
							</div>
						</form>
					</div>
                	<div class="col-md-4 col-md-offset-2">
    		        	<div class="info info-horizontal">
    						<div class="icon icon-primary">
    							<i class="material-icons">pin_drop</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Find us at the office</h4>
    							<p> <?php  echo $row['PageDescription'];?>
    							</p>
    						</div>
    		        	</div>
                        <div class="info info-horizontal">
    						<div class="icon icon-primary">
    							<i class="material-icons">phone</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Give us a ring</h4>
    							<p> Creative TM<br>
								+1 <?php  echo $row['MobileNumber'];?><br>
								Email : <?php  echo $row['Email'];?><br>
								<?php  echo $row['Timing'];?>
    							</p>
    						</div>
    		        	</div>
    		        	<div class="info info-horizontal">
    						<div class="icon icon-primary">
    							<i class="material-icons">business_center</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">Legal Information</h4>
    							<!-- <p> Creative Tim Ltd.<br>
                                    VAT &middot; EN2341241<br>
                                    IBAN &middot; EN8732ENGB2300099123<br>
                                    Bank &middot; Great Britain Bank
    							</p> -->
    						</div>
    		        	</div>
				    </div>
               </div>
            </div>
		</div>
    </div>

	<?php
	}
}
$dbconfig->close();
?>
<footer class="footer">
        <div class="container">
            <nav class="pull-left">
				<ul>
					<li>
						<a href="###">
							Creative TM
						</a>
					</li>
					<li>
						<a href="about-us.php">
						   About Us
						</a>
					</li>
					<li>
						<a href="blog.php">
						   Blog
						</a>
					</li>
					<li>
						<a href="###">
							Licenses
						</a>
					</li>
				</ul>
            </nav>
            <div class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
            </div>
        </div>
    </footer>
</body>
    <!--   Core JS Files   -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/material.min.js"></script>

    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="js/nouislider.min.js" type="text/javascript"></script>

    <!--	Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!--	Plugin for Select Form control, full documentation here: https://github.com/FezVrasta/dropdown.js -->
    <script src="js/jquery.dropdown.js" type="text/javascript"></script>

    <!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
    <script src="js/jquery.tagsinput.js"></script>

    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="js/jasny-bootstrap.min.js"></script>

    <!-- Plugin For Google Maps -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript">
		$().ready(function(){
			// the body of this function is in material-kit.js
			materialKitDemo.initContactUsMap();
		});
	</script>

</html>
