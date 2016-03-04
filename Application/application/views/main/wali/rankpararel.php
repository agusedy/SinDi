<!--Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $htitle; ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $btitle; ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Sikap</th>
                        <th>Pengetahuan</th>
                        <th>Ketrampilan</th>
                        <th>Total</th>
                        <th>Peringkat</th>
                    </tr>
                    <?php /*$no=0;*/ foreach ($rprl as $row): ++$no; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['nisn']; ?></td>
                        <td><?php echo $row['nama_siswa']; ?></td>
                        <td><?php echo $row['sikp']; ?></td>
                        <td><?php echo $row['ptauan']; ?></td>
                        <td><?php echo $row['trampilan']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['rankpar'];?></td>
                    </tr>
                    <?php endforeach ?>         
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
            <?php echo $pagination; ?>
            </div>
        </div><!-- /.box -->
    </section><!-- /.content -->
</aside><!-- /.right-side-->