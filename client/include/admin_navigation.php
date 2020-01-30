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
                            <a href="./profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="./changepass"><i class="fa fa-fw fa-user"></i> Change Password</a>
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
                        <a href="index"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#news_dropdwon"><i class="fas fa-balance-scale"></i> Production Related<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="news_dropdwon" class="collapse">
                        
                            <li>
                                <a href="addEntry"><i class="fa fa-briefcase"></i> Add Entry</a>
                            </li>
                            <!-- <li>
                                <a href="./news.php?source=current_news"><i class="fa fa-briefcase"></i>Entries</a>
                            </li> -->
                            <li>
                                <a href="./prodDetails"><i class="fa fa-briefcase"></i> Production Details</a>
                            </li>
                            <!-- <li>
                                <a href="./orders?source=quo"><i class="fa fa-briefcase"></i> Quotation</a>
                            </li> -->
                            <li>
                                <a href="./products"><i class="fas fa-list-ol"></i></i> Package List</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#quo"><i class="fas fa-sort-amount-up"></i> Quotation <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="quo" class="collapse">
                            <li>
                                <a href="./quotationmenu?source=quots1"><i class="fab fa-first-order-alt"></i> Site Measurement Sheet</a>
                            </li>
                            <li>
                                <a href="./quotationmenu?source=pend"><i class="fab fa-first-order-alt"></i> Pending orders</a>
                            </li>
                            <li>
                                <a href="./quotationmenu?source=aprov"><i class="fab fa-first-order-alt"></i> Approved</a>
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
                                <a href="./products"> <i class="fas fa-list-ol"></i> View Products</a>
                            </li>
                            <li>
                                <a href="./products?source=add_prod"><i class="fas fa-plus-square"></i> Add Products</a>
                            </li>

                            <li>
                                <a href="./orders?source=add_order"><i class="fas fa-plus-square"></i> Place Packing List Order</a>
                            </li>
                            <li>
                                <a href="./orders?source=quo"><i class="fa fa-briefcase"></i> Packing Order</a>
                            </li>

                        </ul>
                    </li>
                  <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Customers <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./customers"> <i class="fas fa-list-ol"></i> View Customers</a>
                            </li>
                            <li>
                                <a href="customers?source=add_cust"><i class="fa fa-fw fa-user"></i> Add Customers</a>
                            </li>
                            <li>
                                <a href="./customers?source=veiw_trans"> <i class="fas fa-list-ol"></i> View Transporter</a>
                            </li>
                            <li>
                                <a href="customers?source=add_trans"><i class="fa fa-fw fa-user"></i> Add Transporter</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="./users"> <i class="fas fa-list-ol"></i> View Users</a>
                            </li>
                            <li>
                                <a href="users?source=add_users"><i class="fa fa-fw fa-user"></i> Add User</a>
                            </li>

                            <li>
                                <a href="./users?source=lg"> <i class="fas fa-list-ol"></i> User Log</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./profile"><i class="fa fa-fw fa-wrench"></i> Profile </a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        