
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
		                <h4 class="card-title"><?php echo $title ?></h4>
		                <div class="table-responsive">
		                    <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="klien">
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
		                        	<?php $i = 1; foreach ($klien as $klien) { ?>
		                            <tr>
		                                <td><?php echo $i ?></td>
		                                <td><a class="btn btn-outline-success btn-xs" href="<?php echo base_url('index.php/internal/klien/detail/'.$klien->id_klien) ?>"><?php echo $klien->nama ?></a></td>
		                                <td><?php echo $klien->kontak_utama ?></td>
		                                <td><?php echo $klien->email ?></td>
		                                <td><?php echo 'http://'.$klien->situs_web ?></td>
		                                
		                                <td>
		                                	
		                                	<?php 	include('edit.php');
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

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
