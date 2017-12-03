 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4> </div>
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
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <div class="row">
                          <div class="col-sm-6"> <a href="<?php echo site_url();?>home/laporan/pengajuan"><button type="button" class="btn btn-info btn-block"><span class="glyphicon glyphicon-file"></span> Laporan Pengajuan</button></div>
                          <div class="col-sm-6">
                        <a href="<?php echo site_url();?>home/laporan/perpanjangan"><button type="button" class="btn btn-info btn-block"><span class="glyphicon glyphicon-file"></span> Laporan Perpanjangan</button></div>
                        </div>
                       
                            </div>
                        </div>
                    </div>
                </div>
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

  <?php } elseif ($action == 'pengajuan') { ?>

 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan Pengajuan</h4> </div>
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
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                    <br>
                            <div class="table-responsive">
                                 <form role="form" action="<?php echo base_url();?>home/laporan_pengajuan" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Dari Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="dari" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sampai Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="sampai" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info" name="buat" value="Buat Laporan Pengajuan">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/laporan'"/>
                                </div>
                                       
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
  <?php } elseif ($action == 'perpanjangan') { ?>

 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan Perpanjangan</h4> </div>
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
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                    <br>
                            <div class="table-responsive">
                                 <form role="form" action="<?php echo base_url();?>home/laporan_perpanjangan" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Dari Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="dari" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sampai Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="sampai" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info" name="buat" value="Buat Laporan Perpanjangan">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/laporan'"/>
                                </div>
                                       
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
 <?php } ?>