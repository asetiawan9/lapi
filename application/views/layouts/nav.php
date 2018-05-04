<?php $id_konsultan = $this->session->userdata('id_user');  ?>
      <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url() ?>assets/images/user.png" alt="user" /> 
                             <!-- this is blinking heartbit-->
                            <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <h5>Internal</h5>                       
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li class="nav-devider"></li>
                        <li class="nav-small-cap">PERSONAL</li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>index.php/internal/dashboard" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>index.php/internal/projek" aria-expanded="false"><i class="fa fa-handshake-o"></i><span class="hide-menu">List Projek </span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>index.php/internal/klien" aria-expanded="false"><i class="fa fa-user-circle"></i><span class="hide-menu">List Klien </span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>index.php/internal/pembayaran" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Pembayaran </span></a>
                        </li>
                        
                        
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/internal/pesan/index/'.$id_konsultan) ?>" aria-expanded="false"><i class="fa fa-envelope-open"></i><span class="hide-menu">Pesan </span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url() ?>index.php/internal/user" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">User </span></a>
                        </li>

                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->