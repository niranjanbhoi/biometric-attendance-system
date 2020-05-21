<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" href="img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>About Us - Material Kit PRO by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-kit.css" rel="stylesheet"/>
</head>

<body class="about-us">
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


	<div class="page-header header-filter" data-parallax="active" style="background-image: url('img/bg9.jpg');">
		<div class="container">
    		<div class="row">
        		<div class="col-md-8 col-md-offset-2">
                    <h1 class="title">About Us</h1>
                        <h4>Meet the amazing team behind this project and find out more about how we work.</h4>
                </div>
            </div>
        </div>
	</div>

	<div class="main main-raised">
		<div class="container">
            <div class="about-description text-center">
                <div class="row">
    				<div class="col-md-8 col-md-offset-2">
    					
						<?php 
                                        include('admin/database/dbconfig.php');
                                        $sql  = "SELECT * FROM ct_blog WHERE PageType='aboutus'";
                                        $result = $dbconfig->query($sql);
                                        if ($result->num_rows > 0) 
                                            {
                                            while($row = $result->fetch_assoc()) 
                                            {
                                                ?>
												<h5 class="description"><?php echo $row['PageDescription'];?></h5>
                                            <?php
                                                }
                                            }
                                            $dbconfig->close();
                                            ?>
    				</div>
    			</div>
            </div>
            <div class="about-team team-1">
    			<div class="row">
    				<div class="col-md-8 col-md-offset-2 text-center">
    					<h2 class="title">We are nerd rockstars</h2>
    					<h5 class="description">This is the paragraph where you can write more details about your team. Keep you user engaged by providing meaningful information.</h5>
    				</div>
    			</div>

    			<div class="row">
    				<div class="col-md-4">
    					<div class="card card-profile card-plain">
    						<div class="card-avatar">
    							<a href="#pablo">
    								<img class="img" src="https://avatars3.githubusercontent.com/u/41339499?s=460&v=4" />
    							</a>
    						</div>

    						<div class="content">
    							<h4 class="card-title">Kalpesh</h4>
    							<h6 class="category text-muted">CEO / Co-Founder</h6>

    							<p class="card-description">
    								<!-- And I love you like Kanye loves Kanye. We need to restart the human foundation. -->
    							</p>
    							<div class="footer">
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-google"><i class="fa fa-google"></i></a>
    							</div>
    						</div>
    					</div>
    				</div>

    				<div class="col-md-4">
    					<div class="card card-profile card-plain">
    						<div class="card-avatar">
    							<a href="#pablo">
    								<img class="img" src="https://avatars1.githubusercontent.com/u/62830015?s=460&u=79678466d1b15b72cbdaa9b9c13d3281670a34b1&v=4" />
    							</a>
    						</div>

    						<div class="content">
    							<h4 class="card-title">Niranjan</h4>
    							<h6 class="category text-muted">Web Designer</h6>

    							<p class="card-description">
    								<!-- Don't be scared of the truth because we need to restart the human foundation. And I love you like Kanye loves Kanye. -->
    							</p>
    							<div class="footer">
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-linkedin"><i class="fa fa-linkedin"></i></a>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-4">
    					<div class="card card-profile card-plain">
    						<div class="card-avatar">
    							<!-- <a href="#pablo">
    								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<img class="img" src="data:image/jpeg;base64,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" />
    							</a> -->
    						</div>

    						<div class="content">
    							<h4 class="card-title">Vicky</h4>
    							<h6 class="category text-muted">Web Developer</h6>

    							<p class="card-description">
    								<!-- I love you like Kanye loves Kanye. Don't be scared of the truth because we need to restart the human foundation. -->
    							</p>
    							<div class="footer">
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
    								<a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
    							</div>
    						</div>
    					</div>
    				</div>

    			
    			</div>

            </div>
            <div class="about-services features-2">
                <div class="row">
    				<div class="col-md-8 col-md-offset-2 text-center">
    					<h2 class="title">We build awesome products</h2>
    					<h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information.</h5>
    				</div>
    			</div>

    			<div class="row">
    				<div class="col-md-4">
    		           	<div class="info info-horizontal">
    						<div class="icon icon-rose">
    							<i class="material-icons">gesture</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">1. Design</h4>
    							<p>The moment you use Material Kit, you know you’ve never felt anything like it. With a single use, this powerfull UI Kit lets you do more than ever before. </p>
    							<a href="#pablo">Find more...</a>
    						</div>
    		        	</div>

    		        </div>

    				<div class="col-md-4">
    					<div class="info info-horizontal">
    						<div class="icon icon-rose">
    							<i class="material-icons">build</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">2. Develop</h4>
    							<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
    							<a href="#pablo">Find more...</a>
    						</div>
    					</div>
    				</div>

    				<div class="col-md-4">
    					<div class="info info-horizontal">
    						<div class="icon icon-rose">
    							<i class="material-icons">mode_edit</i>
    						</div>
    						<div class="description">
    							<h4 class="info-title">3. Make Edits</h4>
    							<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
    							<a href="#pablo">Find more...</a>
    						</div>
    					</div>
    				</div>
    			</div>
            </div>
            <!-- <div class="about-office">
                <div class="row  text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Our office is our second home</h2>
                        <h4 class="description">Here are some pictures from our office. You can see the place looks like a palace and is fully equiped with everything you need to get the job done.</h4>
                    </div>
                </div>
            </div> -->
            <div class="about-contact">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">Want to work with us?</h2>
						<h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will get back to you in a couple of hours.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Your Name</label>
										<input type="email" class="form-control">
									</div>
                                </div>
                                <div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Your Email</label>
										<input type="email" class="form-control">
									</div>
                                </div>
                                <div class="col-md-4">
	                                <div class="form-group">
    	                                <label class="control-label">Speciality</label>
                	                    <select class="select form-control" placeholder="Speciality">
                                          <option value="1">I'm a Designer</option>
                                          <option value="2">I'm a Developer</option>
										  <option value="3">I'm a Hero</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-round">
										Let's talk
									</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

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


</html>
