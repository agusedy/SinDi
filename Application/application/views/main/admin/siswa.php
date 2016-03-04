 <!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $theader; ?>
            <!-- <small>it all starts here</small> -->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?php echo $tform; ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <!-- <form id="addSiswaForm" method="post" class="form-horizontal"> -->
                <?php $atrib = array('id' => 'addSiswaForm', 'class' => 'form-horizontal'); ?>
                <?php echo form_open_multipart('admin/addsiswa',$atrib); ?>
                    <div class="form-group">
                        <div class="col-sm-2">
                        <label>NISN</label>
                            <input type="text" class="form-control" name="nisn" placeholder="NISN ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Nama</label>
                            <input type="text" class="form-control" name="nama_siswa" placeholder="Nama ..."/>
                        </div>
                        <div class="col-sm-3">
                        <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat_siswa" placeholder="Alamat ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Ortu</label>
                            <input type="text" class="form-control" name="ortu" placeholder="Nama Ortu..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Th Masuk</label>
                            <input type="text" class="form-control" name="thn_masuk" placeholder="Tahun Masuk ..."/>
                        </div>
                        <div class="col-sm-1" >
                            <button id="btnAdd" type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div><!-- /.box-body -->
           
        </div><!-- /.box -->


        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $ttable; ?></h3>
                <div class="box-tools">
                    <?php $atrib = array('class' => 'form-horizontal'); ?>
                    <?php echo form_open_multipart('admin/carisiswa',$atrib); ?>
                    <div class="input-group">
                        <input type="text" id="carisiswa" name="carisiswa" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" id="tablesiswa">
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nama Ortu</th>
                        <th>Thn Masuk</th>
                        <th style="width: 80px">Action</th>
                    </tr>


                    <?php foreach ($siswa as $row): ++$no;?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nisn']; ?></td>
                            <td><?php echo $row['nama_siswa']; ?></td>
                            <td><?php echo $row['alamat_siswa']; ?></td>
                            <td><?php echo $row['ortu']; ?></td>
                            <td><?php echo $row['thn_masuk']; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/editsiswa/'.$row['nisn']);?>" >Edit  </a>
                                <a href="<?php echo site_url('admin/deluser/'.$row['id_user'].'/siswa');?>" > <i class="fa fa-trash-o fa-lg"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
            <?php echo $pagination ?>
            </div>
        </div><!-- /.box -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<style type="text/css">
    button#btnAdd {
    margin-top: 25px;
    }
</style>