
<button type="button" class="btn btn-rounded btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $projek->id_projek ?>"><i class="fa fa-trash-o"></i></button>
<div class="modal fade" id="Delete<?php echo $projek->id_projek ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Hapus projek : <?php echo $projek->nama_projek; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p class="alert alert-danger"><i class="fa fa-warning"></i>Apakah anda ingin menghapus data ini? </p>
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('index.php/internal/projek/delete/'.$projek->id_projek) ?>" class="btn btn-danger"><i class="fa fa-trash-o"  ></i> Delete </a>
<!--           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>