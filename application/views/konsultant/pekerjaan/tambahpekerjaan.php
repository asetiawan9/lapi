
 <!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><?php echo $title ?></h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">pages</li>
                <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
        </div>
        
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
<?php 

$id = ($this->uri->segment(4))?$this->uri->segment(4):0;
// notifikasi

if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success"<i class="fa fa-check"></i>';
  echo $this->session->flashdata('sukses');
  echo '</div>';
} ?>

        </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
     <!-- row -->
                    <h4 class="card-title"><?php echo $title ?></h4>

        <?php echo form_open(base_url('index.php/konsultan/pekerjaan/tambahpekerjaan/'.$id));
        ?>

        <div class="form-group row">
          <label for="example-text-input" class="col-md-2 col-form-label">Judul Pekerjaan</label>
          <div class="col-md-10">
            <textarea rows="4" cols="50" placeholder="Masukan Pekerjaan" class="form-control form-control-line" name="list_tugas"></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="example-text-input" class="col-md-2 col-form-label">Selesai Pekerjaan</label>
          <div class="col-md-10">
            <input class="form-control" id="single-input" name="durasi" placeholder="Selesai Pada Jam"> <span class="input-group-btn">
          </div>
        </div>

                 
        <input type="hidden" name="id_projek" value="<?php echo $id ?>" >
        
          <input type="submit" name="submit" class="btn btn-info" value="Simpan Data">
          

        <?php 
        //form close
        echo form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
