<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left info">
                    <p>Hello, 
                        <?php
                            $stat = $this->uri->segment(1); 
                            if ($stat=='admin'){
                                $stat='guru';
                            }else{
                                $stat;
                            } 
                            echo $this->session->userdata('nama_'.$stat); 
                        ?>
                    </p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="<?php echo site_url('admin/siswa/0');?>">
                        <i class="fa fa-edit"></i> <span>Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/guru/0');?>">
                        <i class="fa fa-group"></i> <span>Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/walikls/0');?>">
                        <i class="fa fa-bar-chart-o"></i> <span>Data Wali Kelas</span>
                    </a>
                </li>
                <!-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Data Wali Kelas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php //echo site_url('admin/walikls/0');?>"><i class="fa fa-angle-double-right"></i> Wali Kelas</a></li>
                        <li><a href="<?php //echo site_url('admin/dtakls');?>"><i class="fa fa-angle-double-right"></i> Data Kelas</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="<?php echo site_url('admin/prosentase');?>">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Prosentase</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
