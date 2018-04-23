
<button type="button" class="btn btn-rounded btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $klien->id_klien ?>"><i class="fa fa-edit"></i></button>
<div class="modal fade" id="Edit<?php echo $klien->id_klien ?>" role="dialog">
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
		echo form_open(base_url('index.php/internal/klien/edit/'.$klien->id_klien));
		?>

		<div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" class="form-control form-control-line" name="nama" value="<?php echo $klien->nama ?>" required> </div>

        <div class="form-group">
            <label for="text">Kontak Utama</label>
            <input type="text" name="kontak_utama" class="form-control" value="<?php echo $klien->kontak_utama ?>" required> </div>

        <div class="form-group">
            <label>Email</label>
	            <input type="email" name="email" class="form-control " value="<?php echo $klien->email ?>" required> </div>
	    <div class="form-group">
            <label>Situs Web</label>
	            <input type="text" name="situs_web" class="form-control" value="<?php echo $klien->situs_web ?>" > </div>
	    <div class="form-group">
            <label>Telepon</label>
	            <input type="text" name="telepon" class="form-control" value="<?php echo $klien->telepon ?>" > </div>
	    <div class="form-group">
            <label>Alamat</label>
	            <textarea type="text" name="alamat" class="form-control" > <?php echo $klien->alamat ?> </textarea></div>
	    <div class="form-group">
            <label>Kode Pos</label>
	            <input type="text" name="kode_pos" class="form-control" value="<?php echo $klien->kode_pos ?>"> </div>
	    <div class="form-group">
            <label>Kabupaten</label>
	            <input type="text" name="kabupaten" class="form-control" value="<?php echo $klien->kabupaten ?>"> </div>
	    <div class="form-group">
            <label>Provonsi</label>
	            <input type="text" name="provinsi" class="form-control" value="<?php echo $klien->provinsi ?>"> </div>
	            
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

