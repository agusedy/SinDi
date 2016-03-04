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
            <?php $atrib = array('id' => 'SelectSiswa', 'class' => 'form-horizontal'); ?>
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
                                        <?php foreach ($wali->result_array() as $key): ?>
                                        	<input type="text" class="form-control" name="nip" value="<?php echo $key['nip'];?>" disabled>  
                                            <input type="hidden" name="nip" value="<?php echo $key['nip'];?>">    
                                        <?php endforeach ?>
                                    </div>
                                    <div class="form-group" id="nmaGuru">                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kelas</label>
                                            <?php foreach ($wali->result_array() as $key): ?>
                                            <input type="text" class="form-control" name="kelas" value="<?php echo $key['kelas']; ?>" disabled>
                                            <input type="hidden" name="kelas" value="<?php echo $key['kelas']; ?>">
                                            <?php endforeach ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ruang</label>
                                        <?php foreach ($wali->result_array() as $key): ?>
                                        <input type="text" id="ruang" class="form-control" name="ruang" value="<?php echo $key['ruang']; ?>" disabled>
                                        <input type="hidden" id="ruang" class="form-control" name="ruang" value="<?php echo $key['ruang']; ?>" >
                                        <?php endforeach ?>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label">Tahun Ajaran</label>
                                        <?php foreach ($wali->result_array() as $key): ?>
                                        <input type="text" id="thn_ajaran" class="form-control" name="thn_ajaran" value="<?php echo $key['thn_ajaran']; ?>" disabled>
                                        <input type="hidden" id="thn_ajaran" class="form-control" name="thn_ajaran" value="<?php echo $key['thn_ajaran']; ?>">
                                        <?php endforeach ?>
                                    </div>
                                </div>                                
                            </div><!-- /.col (LEFT) -->
                            <div class="col-md-9 col-sm-8">
                                <div class="box-header">
                                    <i class="fa fa-inbox"></i>
                                    <h3 class="box-title">Daftar Siswa</h3>
                                </div>
                                <div class="box-footer">
                                    <div  class="form-group">
                                        <label class="col-sm-3 control-label">Pilih Siswa</label>
                                        <div  class="col-sm-5 selectContainer">
                                            <select id="ListNamaSiswa" name="nisn[]" class="form-control" id="nisnSiswa" title="Pilih Siswa" data-size="30" multiple>
                                                <?php foreach ($siswa as $key): ?>
                                                    <option value="<?php echo $key['nisn']; ?>"><?php echo $key['nama_siswa']; ?></option>                                      
                                                <?php endforeach ?>                                       
                                            </select>
                                        </div>
                                    </div>
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
