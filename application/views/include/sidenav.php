
    <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a <?php echo $page=="home"?'class="active-menu"':null; ?> href="<?= base_url('Home/productList'); ?>"><i class="fa fa-desktop"></i> Dashboard</a>
                    </li>
                    <?php if($this->session->userdata('login_type') == "admin"){
                        ?>
                        
                        <li>
                            <a <?php echo $page=="report"?'class="active-menu"':null; ?> ><i class="fa fa-sitemap"></i>Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a <?php echo $page=="report"?'class="active-menu"':null; ?> href="<?= base_url('Home/userReports'); ?>">User Reports</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }?>
                </ul>

            </div>

        </nav>
    
    
<div id="snackbar"></div>
        <!-- /. NAV SIDE  -->