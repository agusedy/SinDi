<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $theader ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?php echo $tform; ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            <?php foreach ($pros as $row): ?>
                <!-- <form id="addSiswaForm" method="post" class="form-horizontal"> -->
                <?php $atrib = array('id' => 'prosentase'/*, 'class' => 'form-horizontal'*/); ?>
                <?php echo form_open_multipart('admin/prosentase',$atrib); ?>
                        <input type="hidden" name="id_pros" value="<?php echo $row['id_pros']; ?>">
                        <div class="form-group">
                        <label>Sikap</label>
                            <input type="text" class="form-control" name="sikap" value="<?php echo $row['sikap']; ?>" placeholder="Sikap ..."/>
                        </div>
                        <div class="form-group">
                        <label>Pengetahuan</label>
                            <input type="text" class="form-control" name="pengetahuan" value="<?php echo $row['pengetahuan']; ?>" placeholder="Pengetahuan ..."/>
                        </div>
                        <div class="form-group">
                        <label>Ketrampilan</label>
                            <input type="text" class="form-control" name="ketrampilan" value="<?php echo $row['ketrampilan']; ?>" placeholder="ketrampilan ..."/>
                        </div>
                        <!-- <div class="form-group">
                        <label>lulus</label>
                            <input type="text" class="form-control" name="lulus" placeholder="lulus ..."/>
                        </div> -->
                        <div class="form-group" >
                            <button id="btnAdd" type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                <?php echo form_close(); ?>
            <?php endforeach ?>
            </div><!-- /.box-body -->
           
        </div><!-- /.box -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->