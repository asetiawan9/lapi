
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
                        <h4 class="card-title">Detail Pembayaran <?php echo $title ?><hr></h4>

                        <form class="form-material m-t-40 row">
                            <div class="form-group col-md-6 m-t-20">
                                <label>No Pembayaran:</label><br>
                                <?php echo $pembayaran->no_bukti; ?>
                                <hr>
                            

                                <p><label>Status:</label><br>
                                <?php echo $pembayaran->status; ?></p>
                                <hr>


                                <p><label>Tanggal Pembuatan:</label><br>
                                <?php echo $pembayaran->tanggal_pembuatan; ?></p>
                                <hr>

                                <p><label>Batas Tanggal:</label><br>
                                <?php echo $pembayaran->batas_tanggal; ?></p>
                                <hr>

                                <p><label>Nama Projek:</label><br>
                                <?php echo $pembayaran->nama_projek; ?></p>
                                <hr>

                            </div>

                            <div class="form-group col-md-6 m-t-20">
                                <label>Klien/Perusahaan:</label><br>
                                <?php echo $pembayaran->nama; ?>
                                <hr>

                                <p><label>Kontak/Hp:</label><br>
                                <?php echo $pembayaran->telepon; ?></p>
                                <hr>

                                <p><label>Kabupaten:</label><br>
                                <?php echo $pembayaran->kode_pos. ",".$pembayaran->kabupaten; ?></p>
                                <hr>

                                <p><label>Provinsi:</label><br>
                                <?php echo $pembayaran->provinsi; ?></p>
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
		                <h4 class="card-title"><?php echo $title ?></h4>
		                <div class="table-responsive">
		                    <table class="table color-table info-table">
		                        <thead>
		                            <tr>
		                                <th>No</th>
		                                <th>No Bukti</th>
		                              	<th>Klien</th>
		                                <th>Tanggal Pembuatan</th>
		                                <th>Batas Tanggal Terakhir</th>
		                                <th>Nilai</th>
		                                <th>Status</th>
		                                <th width="90" >Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<?php $i = 1; foreach ($pembayaran1 as $pembayaran) { ?>
		                            <tr>
		                                <td><?php echo $i ?></td>
		                                <td><?php echo $pembayaran->no_bukti ?></td>
		                                <td><a class="btn btn-outline-success btn-sm" href="<?php echo base_url('index.php/internal/pembayaran/detail/'.$pembayaran->id_pembayaran) ?>"><?php echo $pembayaran->nama ?></a>
		                                	</td>
		                                <td><?php echo $pembayaran->tanggal_pembuatan ?></td>
		                                <td><?php echo $pembayaran->batas_tanggal?></td>
		                                <td>Rp. <?php echo $pembayaran->harga ?></td>
		                                <td><?php include('status.php'); ?></td>
		                                <td>
		                                	<?php 	include('edit.php'); ?>
                                            <?php   include('delete.php'); ?>   </td>
		                                	
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

