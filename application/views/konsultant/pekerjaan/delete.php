<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#EditPekerjaan<?php echo $pekerjaan->id_pekerjaan ?>"><i class="fa fa-trash-o"></i> </button>

<div class="modal fade" id="EditPekerjaan<?php echo $pekerjaan->id_pekerjaan ?>" role="dialog">
	<div class="modal-dialog">    
		<!-- Modal content-->
		<div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title"><?php echo $pekerjaan->list_tugas; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p class="alert alert-danger"><i class="fa fa-warning"></i>Apakah anda ingin pekerjaan data ini? </p>
        </div>
        <div class="modal-footer">


          <a href="<?php echo base_url('index.php/konsultan/pekerjaan/delete/'.$pekerjaan->id_projek.'/'.$pekerjaan->id_pekerjaan) ?>" class="btn btn-danger"><i class="fa fa-trash-o"  ></i> Delete </a>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>

	</div>
</div>


