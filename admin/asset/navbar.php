
    <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="../blog.php" class="simple-text">
                    Creative TM
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="blog.php" class="simple-text">
                    Ct
                </a>
            </div>

            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                    <?php 
                        include('database/dbconfig.php');
                        if(isset($_SESSION['username']))
                        {
                        $user = $_SESSION['username'];
                        $sql  = "SELECT images FROM ct_admin WHERE username='$user' ";
                        $result = $dbconfig->query($sql);
                        if ($result->num_rows > 0) 
                            {
                            while($row = $result->fetch_assoc()) 
                            {
                                $_SESSION["images"] = $row['images'];
                                 echo'<img name="img" src="img/imageDirectory/'.$_SESSION["images"].'">';
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
                    <div class="user-info">
                      <a data-toggle="collapse" href="#collapseExample" class="username">
                        <span>
                        <?php echo $_SESSION['username']; ?>
                          <b class="caret"></b>
                        </span>
                      </a>
                      <div class="collapse" id="collapseExample">
                        <ul class="nav">
                          <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                              <span class="sidebar-mini"> MP </span>
                              <span class="sidebar-normal"> My Profile </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                              <span class="sidebar-mini"> EP </span>
                              <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> S </span>
                              <span class="sidebar-normal"> Settings </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="asset/logout.php">
                              <span class="sidebar-mini"> L </span>
                              <span class="sidebar-normal"> Logout </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php
                    if($_SESSION["usertype"]==1 || $_SESSION["usertype"]!=2)
                    {
                    ?>
                    <li class="nav-item  active">
                        <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
                        <i class="material-icons">group_add</i>
                          <p>User Management
                            <b class="caret"></b>
                          </p>
                        </a>
                        <div class="collapse" id="laravelExample" style="###">
                          <ul class="nav">
                            <li class="nav-item">
                              <a class="nav-link" href="profile.php">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal">User profile </span>
                              </a>
                            </li>
                                          <li class="nav-item">
                                <a class="nav-link" href="role.php">
                                  <span class="sidebar-mini"> RM </span>
                                  <span class="sidebar-normal"> Role Management </span>
                                </a>
                              </li>
                                                      <li class="nav-item">
                                <a class="nav-link" href="user.php">
                                  <span class="sidebar-mini"> UM </span>
                                  <span class="sidebar-normal"> User Management </span>
                                </a>
                              </li>
                            </ul>
                        </div>
                      </li>
                      <?php
                    }
                    ?>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">people_outline</i>
                            <p>Activity
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="device.php">Add Device</a>
                                </li>
                                <li>
                                    <a href="student.php">User-Registration</a>
                                </li>
                                <li>
                                    <a href="user_list.php">User-Info</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#formsExamples">
                            <i class="material-icons">content_paste</i>
                            <p>Reports
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="btw_date.php"> B/w dates</a>
                                </li>
                                <li>
                                    <a href="date_wise.php">Date wise</a>
                                </li>
                                <!-- <li>
                                    <a href="monthly_report.php">Monthly Report</a>
                                </li> -->
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">content_paste</i>
                            <p>Pages
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="about_us.php">About Us</a>
                                </li>
                                <li>
                                    <a href="contact_us.php">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="calendar.php">
                            <i class="material-icons">date_range</i>
                            <p>Calendar</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="dashbord.php"> Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="dashbord.php" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                              <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a> -->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li >
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    </li>
                                    <li>
                                    <a class="dropdown-item" href="#">Settings<div class="ripple-container"></div></a>
                                    <div class="dropdown-divider" style="height: 0;margin: 0.5rem 0;overflow: hidden;border-top: 1px solid #e9ecef;"></div>
                                    </li>
                                    <li>
                                    <a class="dropdown-item" href="asset/logout.php">Log out</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        
                        <!-- <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form> -->
                    </div>
                </div>
            </nav>