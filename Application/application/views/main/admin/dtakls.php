<!--Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $theader ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $ttable; ?></h3>
                <div class="box-tools" align="right"> 
                	<a href="<?php echo site_url('admin/walikls/0');?>">Kembali</a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tahun Masuk</th>
                        <th>Action</th>
                    </tr>

                    <?php $no=0; foreach ($dtkls as $row): $no++;?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nisn']; ?></td>
                            <td><?php echo $row['nama_siswa']; ?></td>
                            <td><?php echo $row['thn_masuk']; ?></td>
                            <td><a href="<?php echo site_url('admin/delsiswadikelas/'.$row['id_nilai'].'/'.$row['id_kelas']);?>" >Hapus</a></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
            <?php //echo $pagination ?>
            </div>
        </div><!-- /.box -->

    </section><!-- /.content -->
</aside><!-- /.right-side