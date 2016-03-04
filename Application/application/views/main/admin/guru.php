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
                <?php $atrib = array('id' => 'addGuruForm', 'class' => 'form-horizontal'); ?>
                <?php echo form_open_multipart('admin/addguru',$atrib); ?>
                    <div class="form-group">
                        <div class="col-sm-2">
                        <label>NIP</label>
                            <input type="text" class="form-control" name="nip" placeholder="NIP ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Nama</label>
                            <input type="text" class="form-control" name="nama_guru" placeholder="Nama ..."/>
                        </div>
                        <div class="col-sm-3">
                        <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat_guru" placeholder="Alamat ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Golongan</label>
                            <input type="text" class="form-control" name="gol" placeholder="Golongan ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Password</label>
                            <input type="password" class="form-control" name="pass_guru" placeholder="Password ..."/>
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
                    <?php echo form_open_multipart('admin/cariguru',$atrib); ?>
                    <div class="input-group">
                        <input type="text" id="cariguru" name="cariguru" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Alamat Guru</th>
                        <th>Gol</th>
                        <th style="width: 80px">Label</th>
                    </tr>


                    <?php foreach ($guru as $row): ++$no;?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nip']; ?></td>
                            <td><?php echo $row['nama_guru']; ?></td>
                            <td><?php echo $row['alamat_guru']; ?></td>
                            <td><?php echo $row['gol']; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/editguru/'.$row['nip']).'/'.$row['id_user'];?>" >Edit </a>
                                <a href="<?php echo site_url('admin/deluser/'.$row['id_user'].'/guru');?>" > <i class="fa fa-trash-o fa-lg"></i></a>
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