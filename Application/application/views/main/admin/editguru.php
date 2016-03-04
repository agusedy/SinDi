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
                <h3 class="box-title"><?php echo $title; ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php foreach ($editguru as $row): ?>
                <!-- <form id="addSiswaForm" method="post" class="form-horizontal"> -->
                <?php $atrib = array('id' => 'editGuruForm', 'class' => 'form-horizontal'); ?>
                <?php echo form_open_multipart('admin/editguru',$atrib); ?>

                    <div class="form-group">
                        <div class="col-sm-2">
                        <label>NISN</label>
                            <input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>">
                            <!-- <input type="text" class="form-control" name="nip" value="<?php //echo $row['nip']; ?>" placeholder="NISN ..." disabled/> -->
                        </div>
                        <div class="col-sm-2">
                        <label>Nama</label>
                            <input type="text" class="form-control" name="nama_guru" value="<?php echo $row['nama_guru']; ?>" placeholder="Nama ..."/>
                        </div>
                        <div class="col-sm-3">
                        <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat_guru" value="<?php echo $row['alamat_guru']; ?>" placeholder="Alamat ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Golongan</label>
                            <input type="text" class="form-control" name="gol" value="<?php echo $row['gol']; ?>" placeholder="Golongan ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Password</label>
                            <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user; ?>" placeholder="Password ..."/>
                            <input type="password" class="form-control" name="pass_guru" placeholder="Isi Jika Diganti.."/>
                        </div>
                        <div class="col-sm-1"id="btnEdit">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
                <?php endforeach ?>
            </div><!-- /.box-body -->
           
        </div><!-- /.box -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<style type="text/css">
    div#btnEdit {
    position: relative;
    margin-top: 25px;
    left: -10px;
    }
</style>