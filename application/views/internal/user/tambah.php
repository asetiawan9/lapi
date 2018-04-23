
<p><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Tambah"><i class="fa fa-plus"></i> Tambah</button>
</p>


<div class="modal fade" id="Tambah" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?php echo $title ?></h4>
           		<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<?php 

		//notip input error
		echo validation_errors('<div class="alert alert-danger"<i class="fa fa-warning"></i>','</div>');

		//open form
		echo form_open(base_url('index.php/internal/user/tambah'));
		?>

        <div class="form-group">
            <label for="text">Nama User</label>
            <input type="text" id="nama_user" name="nama_user" class="form-control"> </div>

        <div class="form-group">
            <label for="text">Username</label>
            <input type="text" id="username" name="username" class="form-control"> </div>

         <div class="form-group">
            <label>Password</label>
	            <input type="Password" name="password" class="form-control"> </div>

    	<div class="form-group">
            <label>Akses Level</label>
            <select name="akses_level" class="form-control">
	            <option> - </option>
	            <option value="konsultant" >Konsultan</option>
	            <option value="internal" >Internal</option>
	            
	        </select>	     
        </div>

        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-info" value="Simpan Data">
          <button type="button" class="btn btn-warning" data-dismiss="modal"> Close </button>
<!--           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		</div>

		<?php 
		//form close
		echo form_close() ?>
		      </div>
		      
		    </div>
		  </div>
