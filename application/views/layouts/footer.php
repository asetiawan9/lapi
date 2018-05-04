
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2017 Admin Press Admin by themedesigner.in
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script> -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script> 
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

     <!-- This is data table -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


 <!-- Date picker-->

    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>



 <!-- Data table internal atau admin-->

<script type="text/javascript">
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

</script>

 <!-- Data table projek -->
 <script type="text/javascript">
        
        $('#projek').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'pdf', 'print'
        ]
    });

    </script>

 <!-- Data table klien -->

    <script type="text/javascript">
        
        $('#klien').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pdf', 'print'
        ]
    });

    </script>

 <!-- Data table konsultan atau projek manajer-->
    <script type="text/javascript">
        
        $('#data').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pdf', 'print'
        ]
    });

    </script> 

    
    <!-- Notifikasi Pesan -->
    <script type="text/javascript">
        $(document).ready(function(){
            function belumDibaca(view = '')
            {
                var url = '<?php echo base_url() ?>index.php/konsultan/pesan';


                //Baru
                $.ajax({

                  url:url,
                  method:"POST",
                  data:{view:view},
                  dataType:"json",
                  success:function(data)

                  {
                    // console.log(data);

                    $('#pesan').html(data.pesan);

                    if (data.notif != 'Y')
                    {
                        $("#notifikasi-pesan" ).removeClass("notify");
                        $('#count-pesan').html('Tidak ada Pesan');

                    } else {
                        $('#count-pesan').html(data.count + ' Pesan Baru');
                        $("#notifikasi-pesan" ).addClass("notify");
                    }

                    // if(data.unseen_notification > 0)
                    // {
                    //     $('.count').html(data.unseen_notification);
                    // }

                    }

                });
                //End of Baru




                // $.get(url, function(data){
                //     var myJson = JSON.parse(data);
                //     $.each(myJson, function(key, value){
                //         // console.log('key : ' + key + ' - value : ' + myJson[key]);

                        // var pesan = '<a href="#" class="child" id='+value['id_pesan']+'>';
                        // pesan += '<div class="btn btn-danger btn-circle" style="margin-right: 10px"><i class="fa fa-link"></i></div>';
                        // pesan += '<div class="mail-contnet">';
                        // pesan += '<h5>'+ value['pengirim'] +'</h5> <span class="mail-desc">'+ value['isi_pesan'] +'</span> <span class="time">'+ value['tanggal'] +'</span>' ;
                        // pesan += '</div>';
                        // pesan += '</a>';

                //         $('#pesan').append(pesan);

                //     });
                // });

            }
            belumDibaca();

            setInterval(function(){ 
                // $( ".child" ).remove();
                belumDibaca(); 
                // console.log('refresh');
            }, 5000);

        });
    </script>

    <!-- /Notifikasi Pesan -->
</body>

</html>
