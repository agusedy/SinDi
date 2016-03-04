<!--Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $theader; ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><?php echo $tform; ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php $atrib = array('id' => 'addNilaiSiswaForm', 'class' => 'form-horizontal'); ?>
                <?php echo form_open_multipart('guru/updatenilai',$atrib); ?>
                <div class="form-group">
                    <div class="col-sm-2">
                    <label>NISN / Nama</label>
                    </div>
                    <div class="col-sm-1">
                    <label>Observa</label>
                    </div>
                    <div class="col-sm-1">
                    <label>P.Diri</label>
                    </div>
                    <div class="col-sm-1">
                    <label>P.Teman</label>
                    </div>
                    <div class="col-sm-1">
                    <label>Ct.Guru</label>
                    </div>
                    <div class="col-sm-1">
                    <label>N.Tulis</label>
                    </div>
                    <div class="col-sm-1">
                    <label>N.Lisan</label>
                    </div>
                    <div class="col-sm-1">
                    <label>Penguasaan</label>
                    </div>
                    <div class="col-sm-1">
                    <label>Kinerja</label>
                    </div>
                    <div class="col-sm-1">
                    <label>Project</label>
                    </div>
                    <div class="col-sm-1">
                    <label>P.Folio</label>
                    </div>
                </div>
                <?php 
                if ($unilai == NULL) {
                    $unilai= NULL;
                }else{
                    
                 ?>
                <?php foreach ($unilai as $row): ?>
                    <input type="hidden" name="id_kelas" value="<?php echo $this->uri->segment(3); ?>">
                    <input type="hidden" name="id_nilai[]" value="<?php echo $row['id_nilai']; ?>">
                <div class="form-group">
                    <div class="col-sm-2">
                    <label><?php echo $row['nisn']; ?></label>
                    <br>
                    <label><?php echo $row['nama_siswa']; ?></label>
                    </div>
                    <div class="col-sm-1">
                    <select name="observa[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['observa'];?>"><?php $al=$row['observa']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="pdiri[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['pdiri'];?>"><?php $al=$row['pdiri']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="pteman[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['pteman'];?>"><?php $al=$row['pteman']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="cttnguru[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['cttnguru'];?>"><?php $al=$row['cttnguru']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="ntulis[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['ntulis'];?>"><?php $al=$row['ntulis']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="nlisan[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['nlisan'];?>"><?php $al=$row['nlisan']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="pnguasaan[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['pnguasaan'];?>"><?php $al=$row['pnguasaan']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="kinerja[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['kinerja'];?>"><?php $al=$row['kinerja']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="project[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['project'];?>"><?php $al=$row['project']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-sm-1">
                    <select name="pfolio[]" type="text" class="form-control" >
                        <?php $alf = array('E','D','C','B','A');?>
                        <option value="<?php echo $row['pfolio'];?>"><?php $al=$row['pfolio']; echo $alf[$al-1];?></option>
                        <?php
                        for($n=5; $n >= 1; $n--){ ?>
                            <option value="<?php echo $n;?>"><?php echo $alf[$n-1];?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>
                  <!-- <input name="nisn" value="" type="text" class="form-control" /> -->
                   
                    
                    
                <?php endforeach ?>  
                <button id="btnAdd" type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <?php } ?>
                <?php echo form_close(); ?>
                
            </div><!-- /.box-body -->
           
        </div><!-- /.box -->

    </section><!-- /.content -->
</aside><!-- /.right-side-->