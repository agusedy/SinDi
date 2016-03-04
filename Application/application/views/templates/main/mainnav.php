<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="../../index.html" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        Raport
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
            <?php 
                $user = $this->uri->segment(1); 
            ?>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="<?php echo site_url($user.'/logout');?>" class="dropdown-toggle">
                        <i class="glyphicon glyphicon-log-out"></i>
                        <span>
                        <?php
                            $stat = $this->uri->segment(1); 
                            if ($stat=='admin'){
                                $stat='guru';
                            }else{
                                $stat;
                            } 
                            if ($stat == 'wali') {
                                $stat = 'siswa';
                            }
                            echo $this->session->userdata('nama_'.$stat); 
                        ?>
                        </span>
                    </a>    
                </li>
            </ul>
        </div>
    </nav>
</header>