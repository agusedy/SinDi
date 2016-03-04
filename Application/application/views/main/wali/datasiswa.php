<!--Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Raport Siswa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php 
    if ($rpt == NULL) {
        $rpt == NULL;
    }else{
 ?>
<?php foreach ($rpt as $row):;
    $alf = array('E','D','C','B','A');
    // print_r($rpt);
?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['thn_ajaran']; ?>" aria-expanded="true" aria-controls="collapseOne">
          Tahun Ajaran <?php echo $row['thn_ajaran']; ?>
        </a>
      </h4>
    </div>
    <div id="<?php echo $row['thn_ajaran']; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <table class="table">
                        <caption>Data Kelas</caption>
                        <tbody>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?php echo $row['kelas']; ?></td>
                            </tr>
                            <tr>
                                <td>Ruang</td>
                                <td>:</td>
                                <td><?php echo $row['ruang']; ?></td>
                            </tr>
                            <tr>
                                <td>NIP Wali Kelas</td>
                                <td>:</td>
                                <td><?php echo $row['nip']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <caption>Data Siswa</caption>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?php echo $row['nama_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>:</td>
                                <td><?php echo $row['nisn']; ?></td>
                            </tr>
                            <tr>
                                <td>Wali Murid</td>
                                <td>:</td>
                                <td><?php echo $row['ortu']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo $row['alamat_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Masuk</td>
                                <td>:</td>
                                <td><?php echo $row['thn_masuk']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <caption>Prestasi</caption>
                        <tbody>
                            <tr>
                                <td>Peringkat Kelas</td>
                                <td>:</td>
                                <td><?php echo $row['rankkls'];?></td>
                            </tr>
                            <tr>
                                <td>Peringkat Pararel</td>
                                <td>:</td>
                                <td><?php echo $row['rankpar']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-sm-8">
                    <table class="table">
                        <caption>Data Nilai</caption>
                        <tbody>
                            <tr>
                                <td>Observasi</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['observa']-1];?></td>
                            </tr>
                            <tr>
                                <td>Penilaian Diri</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['pdiri']-1]; ?></td>
                            </tr>
                            <tr>
                                <td>Penilaian Teman</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['pteman']-1]; ?></td>
                            </tr>
                            <tr>
                                <td>Catatan Guru</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['cttnguru']-1]; ?></td>
                            </tr>
                            <tr>
                                <td>Nilai Tulis</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['ntulis']-1]; ?></td>
                            </tr>
                            <tr>
                                <td>Nilai Lisan</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['nlisan']-1]; ?></td>
                            </tr>        
                            <tr>
                                <td>Penguasaan</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['pnguasaan']-1]; ?></td>
                            </tr>    
                            <tr>
                                <td>Kinerja</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['kinerja']-1]; ?></td>
                            </tr>    
                            <tr>
                                <td>Project</td>
                                <td>:</td>
                                <td><?php echo $alf[$row['project']-1]; ?></td>
                            </tr>
                            <tr>
                                <td>Sikap</td>
                                <td>:</td>
                                <td><?php echo $row['sikp']; ?></td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td>:</td>
                                <td><?php echo $row['ptauan']; ?></td>
                            </tr>
                            <tr>
                                <td>Ketrampilan</td>
                                <td>:</td>
                                <td><?php echo $row['trampilan']; ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td><?php echo $row['total']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ;
}
?>
</div>
    </section><!-- /.content -->
</aside><!-- /.right-side-->