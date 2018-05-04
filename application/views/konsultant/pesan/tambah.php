<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Compose</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Inbox</li>
                        <li class="breadcrumb-item active">Compose</li>
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
                 
                                
                                    <div class="card-body">
                                                <?php 

                                                //notip input error
                                                echo validation_errors('<div class="alert alert-danger"<i class="fa fa-warning"></i>','</div>');

                                                //open form
                                                echo form_open(base_url('index.php/internal/pesan/buatPesan'));
                                                ?>
                                        <h3 class="card-title">Compose New Message</h3>
                                        
                                        <div class="form-group">
                                            <select name="id_user" class="select2 form-control custom-select">
                                                <option value="" ></option>
                                                <?php foreach ($user as $konsultant) { ?>

                                                <option value="<?php echo $konsultant->id_user ?>"> <?php echo $konsultant->nama_user ?></option>
                                                    
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id_pengirim" value="<?php echo $this->session->userdata('id_user'); ?>">

                                        <div class="form-group"> 
                                            <input name="sub" class="form-control" placeholder="Subject:">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="isi_pesan" class="textarea_editor form-control" rows="15" placeholder="Enter text ..."></textarea>
                                        </div>

                                        <input type="hidden" name="status" value="inbox">
                                        
                                        <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> Send</button>
                                        <button class="btn btn-inverse m-t-20"><i class="fa fa-times"></i> Discard</button>
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
                <!-- End Page Content -->
        </div>
    </div>          <!-- ============================================================== -->
</div>




