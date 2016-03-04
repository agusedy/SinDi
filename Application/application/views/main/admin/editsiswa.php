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
                <?php foreach ($edtsiswa as $row): ?>
                <!-- <form id="addSiswaForm" method="post" class="form-horizontal"> -->
                <?php $atrib = array('id' => 'editSiswaForm', 'class' => 'form-horizontal'); ?>
                <?php echo form_open_multipart('admin/editsiswa',$atrib); ?>

                    <div class="form-group">
                        <div class="col-sm-2">
                        <label>NISN</label>
                            <input type="text" class="form-control" name="nisn" value="<?php echo $row['nisn']; ?>" placeholder="NISN ..." />
                        </div>
                        <div class="col-sm-2">
                        <label>Nama</label>
                            <input type="text" class="form-control" name="nama_siswa" value="<?php echo $row['nama_siswa']; ?>" placeholder="Nama ..."/>
                        </div>
                        <div class="col-sm-3">
                        <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat_siswa" value="<?php echo $row['alamat_siswa']; ?>" placeholder="Alamat ..."/>
                        </div>
                        <div class="col-sm-2">
                        <label>Ortu</label>
                            <input type="text" class="form-control" name="ortu" value="<?php echo $row['ortu']; ?>" placeholder="Wali/Ortu ..."/>
                        </div>
                        <div class="col-sm-2"id="btnEdit">
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
    }
</style>