<button type="button" class="btn btn-outline btn-rounded btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $user->id_user ?>"><i class="fa fa-edit"></i></i></button>


<div class="modal fade" id="Edit<?php echo $user->id_user ?>" role="dialog">
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
		echo form_open(base_url('index.php/internal/user/edit/'.$user->id_user));
		?>


        <div class="form-group">
            <label for="text">Nama User</label>
            <input type="text" id="nama_user" name="nama_user" class="form-control" value="<?php echo $user->nama_user ?>"> </div>

        <div class="form-group">
            <label for="text">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="<?php echo $user->username ?>"> </div>

         <div class="form-group">
            <label>Password</label>
	            <input type="Password" name="password" class="form-control"> </div>

    	<div class="form-group">
            <label>Akses Level</label>
            <select name="akses_level" class="form-control">
	            <option> - </option>
	            <option value="konsultant" <?php if($user->akses_level == "konsultant") {echo "selected";} ?> >Konsultan</option>
	            <option value="internal" <?php if($user->akses_level == "internal") {echo "selected";} ?>>Internal</option>
	            
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
