<div class="form-box" id="login-box" align="center">
    <div class="header">Sign In</div>
	<?php echo form_open_multipart('home/auth'); ?>
    <!-- <form action="../../index.html" method="post"> -->
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="user" class="form-control" placeholder="NISN / NIP"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div> 
        </div>
        <div class="footer">                                                               
            <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
            <br>
            <!-- <p><a href="#">I forgot my password</a></p>
            
            <a href="register.html" class="text-center">Register a new membership</a> -->
            <?php $flash = $this->session->flashdata('login'); ?>
				<?php if (!empty($flash)): ?>
					<div class="alert alert-warning alert-dismissable">
		                <i class="fa fa-warning"></i>
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <b>Alert!</b> <?php echo $flash; ?>.
		            </div>
				<?php endif; ?>
        </div>
    <!-- </form> -->
    <?php echo form_close(); ?>

    <!-- Button trigger modal -->

<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">
  ! Panduan !
</button>
</div>






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Username & Password SINDI</h4>
      </div>
      <div class="modal-body">
        <ul>
        <li>Daftar Username dan Password:<br>
            <ul>
                <li>
                    <strong>Wali Murid:</strong>
                    <ul>
                        <li>Username : <strong>9988776601</strong> | Password : <strong>99887766012014</strong></li>
                        <li>Username : <strong>9988776602</strong> | Password : <strong>99887766022014</strong></li>
                        <li>Username : <strong>9988776603</strong> | Password : <strong>99887766032015</strong></li>
                        <li>Username : <strong>9988776611</strong> | Password : <strong>99887766112015</strong></li>
                        <!-- <li>Username : <strong>9988776606</strong> | Password : <strong>99887766062013</strong></li>
                        <li>Username : <strong>9988776607</strong> | Password : <strong>99887766072013</strong></li> -->
                    </ul>
                </li>
                <li>
                    <strong>Guru:</strong>
                    <ul>
                        <li>Username : <strong>19720205200701101</strong> | Password : <strong>Guru1</strong></li>
                        <li>Username : <strong>918273645039476387</strong> | Password : <strong>Guru2</strong></li>
                    </ul>
                </li>
                <li>
                    <strong>Admin:</strong>
                    <ul>
                        <li>Username : <strong>123456789098765432</strong> | Password : <strong>Admin1</strong></li>
                    </ul>
                </li>
                </ul>
        </li>
    </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>