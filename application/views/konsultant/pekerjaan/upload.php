<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#Edit<?php echo $pekerjaan->id_pekerjaan ?>"> Upload </button>
<div class="modal fade" id="Edit<?php echo $pekerjaan->id_pekerjaan ?>" role="dialog">
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
		
		echo form_open_multipart(base_url('index.php/konsultan/pekerjaan/uploadbukti/'.$pekerjaan->id_pekerjaan));
		?>
	     <div class="form-group">
           <input type="hidden" name="id_projek" value="<?php echo $pekerjaan->id_projek ?>">
            <input type="file" name="bukti">
	            </div>

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


