<p>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambahpekerjaan"><i class="fa fa-plus"></i> Tambah Pekerjaan</button>
</p>

<div class="modal fade" id="tambahpekerjaan" role="dialog">
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
        echo form_open(base_url('index.php/internal/projek/tambahpekerjaan/'.$id));
        ?>

        <div class="form-group">
            <label>Pekerjaan</label>
           <textarea type="text" class="form-control form-control-line" name="list_tugas" > </textarea></div>
        </div>

        <input type="hidden" name="id_projek" value="<?php echo $id ?>" >
        
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
