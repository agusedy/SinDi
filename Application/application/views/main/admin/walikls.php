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
                        <div class="row">
                            <div class="col-md-3 col-sm-4" id="validWaliKel">
                                <!-- BOXES are complex enough to move the .box-header around.
                                     This is an example of having the box header within the box body -->
                                <div class="box-header">
                                    <i class="fa fa-inbox"></i>
                                    <h3 class="box-title">Data Wali Kelas</h3>
                                </div>

                                <div class="box-footer" >
                                    <div id="WaliSudahAda">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">NIP</label>
                                        <select name="nip" id="selectGuru" class="form-control" title="Pilih Siswa">
                                            <option value="">NIP Guru</option>    
                                            <?php foreach ($nip as $key): ?>
                                                <option value="<?php echo $key['nip']; ?>"><?php echo $key['nip']; ?></option>    
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="nmaGuru">                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kelas</label>
                                        <select name="kelas" id="kelas" class="form-control" title="Pilih Siswa">
                                            <?php for($i=1; $i<7; $i++){ ?>
                                            <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ruang</label>
                                        <input type="text" id="ruang" class="form-control" name="ruang" value="" placeholder="A / B / C / D">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label">Tahun Ajaran</label>
                                        <input type="text" id="thn_ajaran" class="form-control" name="thn_ajaran" value="" placeholder="2014">
                                    </div>
                                </div>                                
                            </div><!-- /.col (LEFT) -->
                            <div class="col-md-9 col-sm-8">
                                <div class="box-header">
                                    <i class="fa fa-inbox"></i>
                                    <h3 class="box-title">Daftar Wali Kelas</h3>
                                </div>
                                <div class="box-footer">
                                    <div  class="form-group">

                                        <br>
                                        <table class="table table-bordered" width="100%">
                                            <tr>
                                                <th>#</th>
                                                <th>Nip</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>Th. Ajaran</th>
                                                <th>Menu</th>
                                            </tr>


                                            <?php foreach ($dtwalikel as $row): ++$no;?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['nip']; ?></td>
                                                    <td><?php echo $row['kelas']; ?></td>
                                                    <td><?php echo $row['ruang']; ?></td>
                                                    <td><?php echo $row['thn_ajaran']; ?></td>
                                                    <td>
                                                    <a href="<?php echo site_url('admin/addlistsiswa/'.$row['id_kelas']);?>" >Add Siswa | </a>
                                                    <a href="<?php echo site_url('admin/delkls/'.$row['id_kelas']);?>" >Delete Kelas | </a>
                                                    <a href="<?php echo site_url('admin/dtkls/'.$row['id_kelas']);?>" >Lihat</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                    </div>  
                                     <?php echo $pagination ?>
                                </div>
                                
                                <!-- </form> -->
                            </div><!-- /.col (RIGHT) -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="form-group">
                            <div class="col-sm-5 col-sm-offset-3">
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </div>
                        </div>  
                    </div><!-- box-footer -->
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
