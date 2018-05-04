
<p><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Tambah"><i class="fa fa-plus"></i> Tambah</button>
</p>
<div class="modal fade" id="Tambah" role="dialog">
    <div class="modal-dialog modal-lg">    
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
		echo form_open_multipart(base_url('index.php/internal/klien/tambah'));
		?>

		<div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" class="form-control form-control-line" name="nama" placeholder="Nama Perusahaan" required> </div>

        <div class="form-group">
            <label for="text">Kontak Utama</label>
            <input type="text" name="kontak_utama" class="form-control" placeholder="Nama Projek" required> </div>

        <div class="form-group">
            <label>Email</label>
	            <input type="email" name="email" class="form-control " placeholder="Email" required> </div>
	    <div class="form-group">
            <label>Situs Web</label>
	            <input type="text" name="situs_web" class="form-control" placeholder="Situs Web" > </div>
	    <div class="form-group">
            <label>Telepon</label>
	            <input type="text" name="telepon" class="form-control" placeholder="Telepon" > </div>
	    <div class="form-group">
            <label>Alamat</label>
	            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat"> </textarea></div>
	    <div class="form-group">
            <label>Kode Pos</label>
	            <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos"> </div>
	    <div class="form-group">
            <label>Kabupaten</label>
	            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten"> </div>
	    <div class="form-group">
            <label>Provonsi</label>
	            <input type="text" name="provinsi" class="form-control" placeholder="Provonsi"> </div>
	    <div class="form-group">
            <label>Akte Perusahaan</label>
	            <input type="file" name="akte_perusahaan" class="form-control" placeholder="Provonsi"> </div>

	    <div class="form-group">
            <label>SIUP</label>
	            <input type="file" name="siup" class="form-control" placeholder="Provonsi"> </div>
	    


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

