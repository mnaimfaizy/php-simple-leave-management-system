
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Amania Group
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <?php  
								$currentDate = date('d-m-Y');
								$SelectQuery = "SELECT * FROM leave_record WHERE `Current_Date` = '" . $currentDate . "' ORDER BY Leave_Form_ID DESC LIMIT 5";
								$query = mysqli_query($con, $SelectQuery);
								$numRows = mysqli_num_rows($query);
								
								?>
                                <?php echo "<span class=\"label label-warning\">". $numRows . "</span>"; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <?php echo $numRows; ?> notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                        	<?php while($roows = mysqli_fetch_assoc($query)) { ?>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i>
                                                <b><?php echo $roows["Emp_Name"]; ?></b> Toke Leave For 
                                                <span class="badge bg-green">
												<?php
													$daylenght = 60*60*24;
													$date1 = date('d-m-Y');
													
													$date2 = $roows["Date_To"];
													echo $result = (strtotime($date2)-strtotime($date1))/$daylenght;
													if($result == 1) {
														echo " Day";
													} else {
														echo " Days";
													}
												 ?></span>
                                            </a>
                                            <?php } ?>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="footer"><a href="report.php">View all</a></li>
                            </ul>
                        </li>
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['username']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['username'] . " - Administrator"; ?>
                                        <small>Member since August. 2014</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>