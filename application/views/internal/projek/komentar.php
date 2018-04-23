<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#Ubah<?php echo $pekerjaan->id_pekerjaan ?>"> Komentar </button>
<div class="modal fade" id="Ubah<?php echo $pekerjaan->id_pekerjaan ?>" role="dialog">
    <div class="modal-dialog ">    
      <!-- Modal content-->
      <div class="modal-content "> 
        <div class="modal-header">
          <h4 class="modal-title"><?php echo $title ?></h4>
           		<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<?php 

		//notip input error
		echo validation_errors('<div class="alert alert-danger"<i class="fa fa-warning"></i>','</div>');

		//open form
		echo form_open(base_url('index.php/internal/projek/editkomentar/'.$pekerjaan->id_pekerjaan));
		?>
	     <div class="form-group">
            <label>Komentar</label>
	            <textarea type="text" name="komentar" class="form-control" value="<?php echo $pekerjaan->komentar ?>"><?php echo $pekerjaan->komentar ?></textarea> </div>

        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-info" value="Simpan Data">
<!--           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		</div>

		<?php 
		//form close
		echo form_close() ?>
		</div>
	</div>
</div>
</div>


