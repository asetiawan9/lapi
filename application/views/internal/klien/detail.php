
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Klien <?php echo $title ?><hr></h4>

                        <form class="form-material m-t-40 row">
                            <div class="form-group col-md-6 m-t-20">
                                <label>Nama Perusahaan:</label><br>
                                <?php echo $klien->nama; ?>
                                <hr>
                            

                                <p><label>Kontak Utama:</label><br>
                                <?php echo $klien->kontak_utama; ?></p>
                                <hr>


                                <p><label>Email:</label><br>
                                <?php echo $klien->email; ?></p>
                                <hr>

                                <p><label>Situs Web:</label><br>
                                <?php echo $klien->situs_web; ?></p>
                                <hr>

                                <p><label>Alamat:</label><br>
                                <?php echo $klien->alamat; ?></p>
                                <hr>

                            </div>

                            <div class="form-group col-md-6 m-t-20">
                                <label>No Telepon/HP:</label><br>
                                <?php echo $klien->telepon; ?>
                                <hr>

                                <p><label>Kode Pos:</label><br>
                                <?php echo $klien->kode_pos; ?></p>
                                <hr>

                                <p><label>Kabupaten:</label><br>
                                <?php echo $klien->kabupaten; ?></p>
                                <hr>

                                <p><label>Provinsi:</label><br>
                                <?php echo $klien->provinsi; ?></p>
                                <hr>
                            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>

                <div class="row">
            <div class="col-12">

<?php 

// notifikasi

if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success"<i class="fa fa-check"></i>';
  echo $this->session->flashdata('sukses');
  echo '</div>';
} ?>

            <?php include('tambah.php'); ?>
        </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
         <!-- row -->
                        <h4 class="card-title">List Klien</h4>
                        <div class="table-responsive">
                            <table class="table color-table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Kontak Utama</th>
                                        <th>Email</th>
                                        <th>Situs Web</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($klien1 as $klien1) { ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><a class="btn btn-outline-success btn-xs" href="<?php echo base_url('index.php/internal/klien/detail/'.$klien1->id_klien) ?>"><?php echo $klien1->nama ?></a></td>
                                        <td><?php echo $klien1->kontak_utama ?></td>
                                        <td><?php echo $klien1->email ?></td>
                                        <td><?php echo 'http://'.$klien1->situs_web ?></td>
                                        
                                        <td>
                                            
                                            <?php   include('edit.php');
                                                    include('delete.php'); ?></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

