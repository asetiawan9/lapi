<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Mailbox</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Apps</li>
                        <li class="breadcrumb-item active">mailbox</li>
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
                                            <div class="inbox-center table-responsive">
                                                <table class="table table-hover no-wrap">
                                                    <tbody>
                                                        <?php if ($id_konsultan == $user1) { ?>
                                                        
                                                        <?php  foreach ($pesan as $p) { ?>
                                                        <tr class="unread">
                                                            <td style="width:40px">
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox0" value="check">
                                                                    <label for="checkbox0"></label>
                                                                </div>
                                                            </td>
                                                            <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                            <td class="hidden-xs-down"><?php echo $p->nama_user ?></td>
                                                            <td class="max-texts"> <a href="<?php echo base_url('index.php/internal/pesan/detailpesan/'.$p->id_pesan) ?>" /> <?php echo $p->isi_pesan; ?></td>
                                                            
                                                            <td class="text-right"> <?php echo $date; ?> </td>
                                                        </tr>

                                                        <?php }
                                                                 }else{ ?>
                                                        
                                                        <center><p>Tidak ada pesan</p></center><br><br><br><br><br><br><br><br>

                                                        <?php } ?>
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
    </div>
</div>
