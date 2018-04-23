<?php var_dump($pekerjaan1); ?>
<button type="button" class="btn btn-outline btn-rounded btn-warning btn-sm" data-toggle="modal" data-target="#tambahpekerjaan"><i class="fa fa-edit"></i></i></button>


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
