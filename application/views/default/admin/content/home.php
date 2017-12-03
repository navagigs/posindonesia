 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Beranda</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Beranda</h3>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i>Selamat Datang di Sistem Informasi Pengelolaan Perjalanan Dinas PT.Pos Indonesia
                            </div>
                        </div>
                    </div>
                </div>


                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'STAF ADM') { ?> 
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pegawai</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><a href="<?php echo site_url();?>home/pegawai"><button type="button" class="btn btn-info"><i class="fa fa-arrow-circle-right fa-fw" aria-hidden="true"></i> Lihat Semua Data Pegawai</button></a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pengajuan SPPD</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><a href="<?php echo site_url();?>home/sppd"><button type="button" class="btn btn-danger"><i class="fa fa-arrow-circle-right fa-fw" aria-hidden="true"></i> Lihat Semua Pengajuan SPPD</button></a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Kantor POS</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><a href="<?php echo site_url();?>home/kantorpos"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-right fa-fw" aria-hidden="true"></i> Lihat Semua Kantor Pos</button></a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php } ?>
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
               
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
          
        </div>