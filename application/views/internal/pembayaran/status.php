<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#Ubah<?php echo $pembayaran->id_pembayaran ?>"><?php echo $pembayaran->status ?></button>
<div class="modal fade" id="Ubah<?php echo $pembayaran->id_pembayaran ?>" role="dialog">
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
		echo form_open(base_url('index.php/internal/pembayaran/editstatus/'.$pembayaran->id_pembayaran));
		?>


	    <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
	            <option> - </option>
	            <option value="Belum Dibayar" <?php if($pembayaran->status == "Belum Dibayar") {echo "selected";} ?> >Belum Dibayar</option>
	            <option value="Sebagian Dibayar" <?php if($pembayaran->status == "Sebagian Dibayar") {echo "selected";} ?>>Sebagian Dibayar</option>
	            <option value="Lunas" <?php if($pembayaran->status == "Lunas") {echo "selected";} ?>>Lunas</option> 
	        </select>	     
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


