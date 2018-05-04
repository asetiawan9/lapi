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
<div class="col-md-12">
<?php 
 
// notifikasi

if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success"<i class="fa fa-check"></i>';
  echo $this->session->flashdata('sukses');
  echo '</div>';
} ?>

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

            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">


                    <div class="card-body">

                        <h4 class="card-title">Detail Projek <?php echo $title ?><hr></h4>

                        <form class="form-material m-t-40 row">
                            <div class="form-group col-md-12 m-t-20">
                                <label>No Projek:</label><br>
                                <?php echo $projek->no_bukti; ?>
                                <hr>
                            
                                <p><label>Nama Projek:</label><br>
                                <?php echo $projek->nama_projek; ?></p>
                                <hr>


                                <p><label>Tanggal Pembuatan:</label><br>
                                <?php echo $projek->tanggal_mulai; ?></p>
                                <hr>

                                <p><label>Batas Tanggal:</label><br>
                                <?php echo $projek->batas_waktu; ?></p>
                                <hr>

                                <p><label>Ketua Tim Pelaksana:</label><br>
                                <?php echo $projek->nama_user; ?></p>
                                <hr>

                                <p><label>Kontak Pelakasana:</label><br>
                                <i class="fa fa-phone"> </i> <?php echo $projek->telepon_user; ?>
                                <br>
                                    <i class="ti ti-email"> </i><?php echo $projek->email_user; ?></p>
                                <hr>

                                <p><label>Nama Kien:</label><br>
                                <?php echo $projek->kontak_utama; ?></p>
                                <hr>

                                 <p><label>Kontak Klien:</label><br>
                                <i class="fa fa-phone"> </i> <?php echo $projek->telepon; ?>
                                <br>
                                    <i class="ti ti-email"> </i><?php echo $projek->email; ?></p>
                                <hr>

                                <p><label>Alamat Klien:</label><br>
                                <?php echo $projek->alamat; ?></p>
                                <hr>

                            </div>                
                        </form>
                    </div>
                </div>
            </div>

	        <div class="col-lg-8 col-xlg-9 col-md-7">
	            <div class="card">
	                <div class="card-body">
		                	<h4>Progres Pekerjaan</h4>
	                	<div class="col-12">
	                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i> 25%</h2>
	                        <h6 class="card-subtitle">Progres Pekerjaan <?php echo $projek->nama_projek;  ?></h6></div>
	                    <div class="col-12">
	                        <div class="progress">
	                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	                        </div>
	                    </div>
                    </div>

                </div>

            <div class="col-lg-12 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                    
		 <!-- row --><?php include('tambahpekerjaan.php'); ?>
		                <h4 class="card-title"><?php echo $titlepekerjaan ?></h4>
		                <div class="table-responsive">
		                    <table class="table color-table info-table">
		                        <thead>
		                            <tr>
		                                <th>No</th>
		                              	<th>Tugas</th>
		                                <th width="200">Bukti</th>
                                        <th>Komentar</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<?php $i = 1; foreach ($pekerjaan as $pekerjaan) { ?>
		                            <tr>
		                                <td><?php echo $i ?></td>
		                                <td><?php echo $pekerjaan->list_tugas ?></td>
                                        <?php if ($pekerjaan->bukti != "") {?>
                                        <td><a target=\"_blank\" href="<?php echo base_url('assets/images/buktipekerjaan/'. $pekerjaan->bukti) ?>"><img width="200" src="<?php echo base_url('assets/images/buktipekerjaan/'. $pekerjaan->bukti) ?>"></a>  </td>
                                        <?php }else{ ?>
                                        <td > Belum Selesai </td>
                                        <?php } ?>
                                        <td><?php include('komentar.php'); ?></td>
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
</div>


