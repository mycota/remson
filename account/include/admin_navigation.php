        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="#"></a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="./changepass.php"><i class="fa fa-fw fa-user"></i> Change Password</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#news_dropdwon"><i class="fas fa-balance-scale"></i> Production Related<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="news_dropdwon" class="collapse">
                            <li>
                                <a href="addEntry.php"><i class="fa fa-briefcase"></i> Add Entry</a>
                            </li>
                            <!-- <li>
                                <a href="./news.php?source=current_news"><i class="fa fa-briefcase"></i>Entries</a>
                            </li> -->
                            <li>
                                <a href="./prodDetails.php"><i class="fa fa-briefcase"></i> Production Details</a>
                            </li>
                            <!-- <li>
                                <a href="./orders?source=quo"><i class="fa fa-briefcase"></i> Quotation</a>
                            </li> -->
                            <li>
                                <a href="./products.php"><i class="fas fa-list-ol"></i></i> Package List</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="./comments.php"><i class="fa fa-briefcase"></i> Comments </a>
                    </li> -->
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#prod"><i class="fab fa-product-hunt"></i> Products <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="prod" class="collapse">
                            <li>
                                <a href="./products.php"> <i class="fas fa-list-ol"></i> View Products</a>
                            </li>
                            <li>
                                <a href="./products.php?source=add_prod"><i class="fas fa-plus-square"></i> Add Products</a>
                            </li>

                            <li>
                                <a href="./orders.php?source=add_order"><i class="fas fa-plus-square"></i> Place Packing List Order</a>
                            </li>
                            <li>
                                <a href="./orders.php?source=quo"><i class="fa fa-briefcase"></i> Packing Order</a>
                            </li>

                        </ul>
                    </li>
                  <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Customers <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./customers.php"> <i class="fas fa-list-ol"></i> View Customers</a>
                            </li>
                            <li>
                                <a href="customers.php?source=add_cust"><i class="fa fa-fw fa-user"></i> Add Customers</a>
                            </li>
                            <li>
                                <a href="./customers.php?source=veiw_trans"> <i class="fas fa-list-ol"></i> View Transporter</a>
                            </li>
                            <li>
                                <a href="customers.php?source=add_trans"><i class="fa fa-fw fa-user"></i> Add Transporter</a>
                            </li>
                        </ul>
                    </li>
                    
                                        <li>
                        <a href="./profile.php"><i class="fa fa-fw fa-wrench"></i> Profile </a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        