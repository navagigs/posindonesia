 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12" >
                        <h4 class="page-title">Perpanjangan SPPD</h4> </div>
                        </div>          
                    <!-- /.col-lg-12 --> 
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
                        <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                    <br> <a href="<?php echo site_url();?>home/perpanjangan/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Perpanjangan SPPD</button></a>
      
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR SPPD</th>
                                            <th>KANTOR TUJUAN</th>
                                            <th>TANGGAL MULAI</th>
                                            <th>TANGGAL SELESAI</th>
                                            <th>JUMLAH HARI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php                                           
                                            $i=1;
                                            $query = $this->db->query("SELECT 
                                            perpanjangan.id_perpanjangan AS id_perpanjangan,
                                            perpanjangan.id_sppd AS id_sppd,
                                            perpanjangan.kantor_tujuan AS kantor_tujuan,
                                            perpanjangan.tanggal_mulai AS tanggal_mulai,
                                            perpanjangan.tanggal_selesai AS tanggal_selesai,
                                            perpanjangan.jumlah_hari AS jumlah_hari,
                                            pengajuan_sppd.id_sppd AS id_sppd,
                                            pengajuan_sppd.nomor AS nomor
                                            FROM perpanjangan
                                            LEFT JOIN pengajuan_sppd ON pengajuan_sppd.id_sppd=perpanjangan.id_sppd");
                                            foreach ($query->result() as $row){ 
                                            ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->nomor; ?></td>
                                            <td><?php echo $row->kantor_tujuan; ?></td>
                                            <td><?php echo $row->tanggal_mulai; ?></td>
                                            <td><?php echo $row->tanggal_selesai; ?></td>
                                            <td><?php echo $row->jumlah_hari; ?> Hari</td>
                                            <td>
                                            <a href="<?php echo site_url();?>home/print_perpanjangan_sppd/<?php echo $row->id_perpanjangan; ?>"><button type="button" class="btn btn-primary" title="Print SPPD"><span class="glyphicon glyphicon-print"></span></button></a>
                                            <a href="<?php echo site_url();?>home/perpanjangan/hapus/<?php echo $row->id_perpanjangan; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" title="Hapus"></span></button></a>
                                            </td>
                                        </tr>
                                            </tr> 
                                            <?php
                                    $i++;
                                } 
                                ?>
                                    </tbody>
                                </table>
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

 <?php } elseif ($action == 'tambah') { ?>
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">PERPANJANGAN SPPD</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">                       
                            <h3 class="box-title">Tambah Perpanjangan SPPD</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/perpanjangan/tambah" method="post" id="exampleStandardForm" autocomplete="off">
									
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nomor SPPD</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM pengajuan_sppd", 'id_sppd', 'id_sppd', 'nomor', $id_sppd);?>
                                    </div>          
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Kantor Tujuan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kantor_pos", 'kantor_tujuan', 'nama_kantor_pos', 'nama_kantor_pos', $nama_kantor_pos);?>
                                    </div>    
   
                                                <link rel="stylesheet" href="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/css/bootstrap-datetimepicker.css"/>
                                                
                                                <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/bootstrap.min.js"></script>


                                                <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/moment-with-locales.js"></script>
                                                <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/jquery-1.11.3.min.js"></script>

                                                <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/bootstrap-datetimepicker.js"></script>
                                              <script>
                                            $(function() { 
                                              $('#tgl1').datetimepicker({
                                               locale:'id',
                                               format:'DD/MMMM/YYYY'
                                               });
                                               
                                              $('#tgl2').datetimepicker({
                                               useCurrent: false,
                                               locale:'id',
                                               format:'DD/MMMM/YYYY'
                                               });
                                               
                                               $('#tgl1').on("dp.change", function(e) {
                                                $('#tgl2').data("DateTimePicker").minDate(e.date);
                                              });
                                              
                                               $('#tgl2').on("dp.change", function(e) {
                                                $('#tgl1').data("DateTimePicker").maxDate(e.date);
                                                  CalcDiff()
                                               });
                                              
                                            });

                                            function CalcDiff(){
                                            var a=$('#tgl1').data("DateTimePicker").date();
                                            var b=$('#tgl2').data("DateTimePicker").date();
                                                var timeDiff=0
                                                 if (b) {
                                                        timeDiff = (b - a) / 1000;
                                                    }
                                                
                                                $('#selisih').val(Math.floor(timeDiff/(86400)))   
                                            }
                                            </script>

                            
                                            <div class="form-group form-material">
                                            <label class="control-label" for="inputText">Tanggal Mulai</label>
                                            <div class="input-group date" id="tgl1">
                                                <input type="text" class="form-control input-sm" name="tanggal_mulai" />  
                                                    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                            </div>
                                            </div>
                                            <div class="form-group form-material">
                                            <label class="control-label" for="inputText">Tanggal Selesai</label>
                                            <div class="input-group date" id="tgl2">
                                                <input type="text" class="form-control input-sm" name="tanggal_selesai"/>   
                                                    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                            </div>
                                            </div>
                                            <div class="form-group form-material">
                                            <label class="control-label" for="inputText">Lama Perjalanan</label>
                                                <input type="text" class="form-control input-sm" name="jumlah_hari" id="selisih"/>
                                            </div> 
                                    </div>	
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Keperluan Perjalanan</label>
                                        <textarea class="form-control input-sm" rows="4" cols="50"  name="keperluan_perjalanan" /></textarea>
                                    </div>    									
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/sppd'"/>
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
         
 <?php } elseif ($action == 'edit') { ?>

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">pengajaun sppd</h4> </div>
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
                            <h3 class="box-title">Edit pengajaun sppd</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/perpanjangan/edit" method="post" id="exampleStandardForm" autocomplete="off">
                      	      	
                            	<input type="hidden" name="id_sppd" value="<?php echo $id_sppd;?>" />
										<div class="form-group form-material">
										<label class="control-label" for="inputText">Nomor</label>
										<input type="text" class="form-control input-sm" id="nomor" name="nomor" value="<?php echo $nomor;?>" disabled/>
									</div>			
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NIP POS</label>
                                         <?php $this->ADM->combo_box("SELECT * FROM pegawai", 'nippos_pegawai', 'nippos_pegawai', 'nippos_pegawai', $nippos_pegawai);?>

                                    </div>       
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Kantor Asal</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kantor_pos", 'kantor_asal', 'nama_kantor_pos', 'nama_kantor_pos', $kantor_asal);?>
                                    </div>      
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Kantor Tujuan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kantor_pos", 'kantor_tujuan', 'nama_kantor_pos', 'nama_kantor_pos', $kantor_tujuan);?>
                                    </div>       
                                   
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tambah Perjalanan</label>
                                        <input type="number" class="form-control input-sm" id="tambah_perjalanan_dinas" name="tambah_perjalanan_dinas" value="<?php echo $tambah_perjalanan_dinas;?>" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Alat Transportasi</label>                                        
                                        <?php $this->ADM->combo_box("SELECT * FROM alat_transportasi", 'alat_transportasi', 'nama_alat_transportasi', 'nama_alat_transportasi', $alat_transportasi);?>
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jenis Fasilitas Dinas</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM jenis_fasilitas_perjalanan", 'jenis_fasilitas_dinas', 'jenis_fasilitas', 'jenis_fasilitas', $jenis_fasilitas_dinas);?>
                                    </div>                                      	
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Maksud Perjalanan</label>
                                        <textarea class="form-control input-sm" rows="4" cols="50"  name="maksud_perjalanan_dinas"/><?php echo $maksud_perjalanan_dinas;?></textarea>
                                    </div>  
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/sppd'"/>
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