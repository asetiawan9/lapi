
<button type="button" class="btn btn-rounded btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $pembayaran->id_pembayaran ?>"><i class="fa fa-edit"></i></button>
<div class="modal fade" id="Edit<?php echo $pembayaran->id_pembayaran ?>" role="dialog">
    <div class="modal-dialog modal-lg">    
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
		echo form_open(base_url('index.php/internal/pembayaran/edit/'.$pembayaran->id_pembayaran));
		?>

		<div class="form-group">
            <label>No Bukti</label>
            <input type="text" class="form-control form-control-line" name="no_bukti" placeholder="No Bukti" value="<?php echo $pembayaran->no_bukti ?>"> </div>

        <div class="form-group">
            <label>Klien</label>
                <select name="id_klien" class="form-control">
                    <option value="" class="form-control"> - </option>
                    <?php foreach ($klien1 as $klien) { ?>
                    <option value="<?php echo $klien->id_klien ?>" <?php if ($pembayaran->id_klien==$klien->id_klien){
                        echo "selected";
                    } ?>><?php echo $klien->nama ?></option>
                    <?php } ?>
                </select>      
        </div>

        <div class="form-group">
            <label>List Projek</label>
                <select name="id_projek" class="form-control">
                    <option value="" class="form-control"> - </option>
                    <?php foreach ($projek1 as $projek) { ?>
                    <option value="<?php echo $projek->id_projek ?>" <?php if ($pembayaran->id_projek==$projek->id_projek){
                        echo "selected";
                    } ?>><?php echo $projek->nama_projek ?></option>
                    <?php } ?>
                </select>      
        </div>

        <div class="form-group">
            <label>Tangal Pembuatan</label>
	            <input type="date" name="tanggal_pembuatan" class="form-control " id="mdate" value="<?php echo $pembayaran->tanggal_pembuatan ?>"> </div>
	    <div class="form-group">
            <label>Batas Tanggal Akhir</label>
	            <input type="date" name="batas_tanggal" class="form-control" id="mdate" value="<?php echo $pembayaran->batas_tanggal ?>"> </div>
	    <div class="form-group">
            <label>Mata Uang</label>
	            <input type="text" name="harga" class="form-control"  value="<?php echo $pembayaran->harga ?>"> </div>
	    <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
	            <option> - </option>
	            <option value="Belum Dibayar" <?php if($pembayaran->status == "Belum Dibayar") {echo "selected";} ?> >Belum Dibayar</option>
	            <option value="Sebagian Dibayar" <?php if($pembayaran->status == "Sebagian Dibayar") {echo "selected";} ?>>Sebagian Dibayar</option>
	            <option value="Lunas" <?php if($pembayaran->status == "Lunas") {echo "selected";} ?>>Lunas</option> 
	        </select>	     
        </div>
	    <div class="form-group">
            <label>Persaratan</label>
	            <textarea type="text" name="persaratan" class="form-control" ><?php echo $pembayaran->persaratan ?></textarea> </div>

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
</div>


