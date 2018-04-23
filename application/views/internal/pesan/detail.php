 <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Email details</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Apps</li>
                        <li class="breadcrumb-item active">Email details</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
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
 <?php require_once('menu.php'); ?>
                                    
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="card-body">
                                                <?php if ($pesan->sub == "") { ?>

                                                <h3 class="card-title m-b-0"><small> Subjek : - </h3>
                                                    
                                               <?php  }else{ ?>
                                               
                                                <h3 class="card-title m-b-0"><small> Subjek : </small><?php echo $pesan->sub ?></h3>

                                                <?php } ?>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/images/user.png" alt="user" width="40" class="img-circle" /></a>
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0"><?php echo $pesan->nama_user ?></h4>
                                                        
                                                    </div>
                                                </div>
                                                <p><?php echo $pesan->isi_pesan ?></p>
                                                
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
    </div>
</div>
