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
        <!-- MAILBOX BEGIN -->
        <div class="mailbox row">
            <div class="col-xs-12">
            <?php $atrib = array('id' => 'BuatKelas', 'class' => 'form-horizontal'); ?>
            <?php echo form_open_multipart('admin/addwalikls',$atrib); ?>
                <div class="box box-solid">
                    <div class="box-body">
                                <div class="box-header">
                                    <i class="fa fa-inbox"></i>
                                    <h3 class="box-title"><?php echo $tform; ?></h3>
                                </div>
                                <div class="box-footer">
                                    <div  class="form-group">
                                        <br>
                                        <table class="table table-bordered" width="100%">
                                            <tr>
                                                <th>#</th>
                                                <!-- <th>Nip</th> -->
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>Th. Ajaran</th>
                                                <th>Menu</th>
                                                <th>Peringkat</th>
                                            </tr>
                                            <?php $no=0; foreach ($tajar as $row): $no++;?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <!-- <td><?php //echo $row['nip']; ?></td> -->
                                                    <td><?php echo $row['kelas']; ?></td>
                                                    <td><?php echo $row['ruang']; ?></td>
                                                    <td><?php echo $row['thn_ajaran']; ?></td>
                                                    <td><a href="<?php echo site_url('guru/addnilai/'.$row['id_kelas']);?>" >Add Nilai</a></td>
                                                    <td>
                                                        <a href="<?php echo site_url('guru/rankkelas/'.$row['id_kelas']);?>" >Kelas </a>|
                                                        <a href="<?php echo site_url('guru/rankpararel/'.$row['thn_ajaran']);?>" > Pararel</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                    </div>  
                                     <?php // echo $pagination ?>
                                </div>
                            
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            <?php echo form_close(); ?>
            </div><!-- /.col (MAIN) -->
        </div>
        <!-- MAILBOX END -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<style type="text/css">
    button#btnAdd {
    margin-top: 25px;
    }
</style>
