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
		echo form_open(base_url('index.php/internal/projek/tambah'));
		?>

		<div class="form-group">
            <label>No Bukti</label>
            <input type="text" class="form-control form-control-line" name="no_bukti" placeholder="No Bukti"> </div>

        <div class="form-group">
            <label for="text">Nama Projek</label>
            <input type="text" id="nama_projek" name="nama_projek" class="form-control" placeholder="Nama Projek"> </div>

        <div class="form-group">
            <label for="text">Bidang Pekerjaan</label>
            <input type="text" id="bidang_pekerjaan" name="bidang_pekerjaan" class="form-control" placeholder="Bidang Pekerjaan"> </div>

        <div class="form-group">
            <label>Klien</label>
                <select name="id_klien" class="form-control">
                    <option value="" class="form-control"> - </option>
                    <?php foreach ($klien as $klien) { ?>
                    <option value="<?php echo $klien->id_klien ?>" ><?php echo $klien->nama ?></option>
                    <?php } ?>
                </select>      
        </div>

        <div class="form-group">
            <label>Tangal Mulai</label>
	            <input type="date" name="tanggal_mulai" class="form-control " placeholder="2017-06-04" id="mdate"> </div>
	    <div class="form-group">
            <label>Batas Waktu</label>
	            <input type="date" name="batas_waktu" class="form-control" placeholder="2017-06-04" id="mdate"> </div>
        <div class="form-group">
            <label>Ditugaskan Untuk</label>
                <select name="id_user" class="form-control">
                    <option value="" class="form-control"> - </option>
                    <?php foreach ($user as $user) { ?>
                    <option value="<?php echo $user->id_user ?>" ><?php echo $user->nama_user ?></option>
                    <?php } ?>
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

