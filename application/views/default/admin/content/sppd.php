 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12" >
                        <h4 class="page-title">Pengajuan SPPD</h4> </div>
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
                    <br>
                    <div class="row">

  <div class="col-xs-6">. <a href="<?php echo site_url();?>home/sppd/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Pengajuan SPPD</button></a></div>
  <div class="col-xs-6"><form action="" method="post" id="form">
                                                    <div class='row'>
                                                        <div class='col-md-6 col-sm-12'>
                                                            <div class='button-search'><?php array_pilihan('cari', $berdasarkan, $cari);?></div>
                                                        </div>
                                                        <div class='col-md-6 col-sm-12 select-search'>
                                                            <div class="input-group">
                                                                <input type="text" name="q" class="form-control" value="<?php echo $q;?>"/>
                                                                <span class="input-group-btn">
                                                                    <button type="submit" name="kirim" class="btn btn-primary" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class='btn-navigation'> 
                                                        <div class='pull-right'>
                                                        </div>
                                                    </div> 
                                            </form></div></div>       
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR SPPD</th>
                                            <th>NIP POS PEGAWAI</th>
                                            <th>KANTOR ASAL</th>
                                            <th>KANTOR TUJUAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                            $i  = $page+1;
                                            $like_pengajuan_sppd[$cari]    = $q;
                                        if ($jml_data > 0){
                                            foreach ($this->ADM->grid_all_pengajuan_sppd('', 'nomor', 'DESC', $batas, $page, '', $like_pengajuan_sppd) as $row){
                                            ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->nomor; ?></td>
                                            <td><?php echo $row->nippos_pegawai; ?></td>
                                            <td><?php echo $row->kantor_asal; ?></td>
                                            <td><?php echo $row->kantor_tujuan; ?></td>
                                            <td>
                                            <a href="<?php echo site_url();?>home/print_sppd/<?php echo $row->id_sppd; ?>"><button type="button" class="btn btn-primary" title="Print SPPD"><span class="glyphicon glyphicon-print"></span></button></a>
                                            <a href="<?php echo site_url();?>home/sppd/edit/<?php echo $row->id_sppd; ?>"><button type="button" class="btn btn-info" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/sppd/hapus/<?php echo $row->id_sppd; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" title="Hapus"></span></button></a> 
                                            </td>
                                        </tr>
                                            </tr> 
                                            <?php
                                    $i++;
                                } 
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">Belum ada data!.</td>
                                </tr>
                            <?php } ?>
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
                        <h4 class="page-title">PENGAJUAN SPPD</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
               		<?php
       				$query = $this->db->query("SELECT max(nomor) as idMaks FROM pengajuan_sppd");
       				foreach ($query->result() as $row3){ }
					$nomor = $row3->idMaks;	
					//mengatur 6 karakter sebagai jumalh karakter yang tetap
					//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
					$noUrut = (int) substr($row3->idMaks, 0, 3);
					$noUrut++;	
					//menjadikan 201353 sebagai 6 karakter yang tetap
					$char = "";
					//%03s untuk mengatur 3 karakter di belakang 2014
					$app =  sprintf("%03s", $noUrut);
					$bulan = date('m');
					$tahun = substr(date('Y'),2);
                    ?>	
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">                       
                            <h3 class="box-title">Tambah Pengajuan SPPD</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/sppd/tambah" method="post" id="exampleStandardForm" autocomplete="off">
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Nomor</label>
										<input type="text" class="form-control input-sm" id="nomor" value="<?php echo $app; ?>/SPJ/Divtek/<?php echo $bulan; ?><?php echo $tahun; ?>" name="nomor" placeholder="Masukan Nomor SPPD" required/>
									</div>			
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NIP POS</label>
                                         <?php $this->ADM->combo_box("SELECT * FROM pegawai", 'nippos_pegawai', 'nippos_pegawai', 'nippos_pegawai', $nippos_pegawai);?>
                                    </div>       
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Kantor Asal</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kantor_pos", 'kantor_asal', 'nama_kantor_pos', 'nama_kantor_pos', $nama_kantor_pos);?>
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
                                            <label class="control-label" for="inputText">Tanggal Berangkat</label>
                                            <div class="input-group date" id="tgl1">
                                                <input type="text" class="form-control input-sm" name="tanggal_berangkat" />  
                                                    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                            </div>
                                            </div>
                                            <div class="form-group form-material">
                                            <label class="control-label" for="inputText">Tanggal Kembali</label>
                                            <div class="input-group date" id="tgl2">
                                                <input type="text" class="form-control input-sm" name="tanggal_kembali"/>   
                                                    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                            </div>
                                            </div>
                                            <div class="form-group form-material">
                                            <label class="control-label" for="inputText">Lama Perjalanan</label>
                                                <input type="text" class="form-control input-sm" name="lama_perjalanan_dinas" id="selisih"/>
                                            </div> 
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Alat Transportasi</label>                                        
                                        <?php $this->ADM->combo_box("SELECT * FROM alat_transportasi", 'alat_transportasi', 'nama_alat_transportasi', 'nama_alat_transportasi', $nama_alat_transportasi);?>
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jenis Fasilitas Dinas</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM jenis_fasilitas_perjalanan", 'jenis_fasilitas_dinas', 'jenis_fasilitas', 'jenis_fasilitas', $jenis_fasilitas);?>
                                    </div>   	
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Maksud Perjalanan</label>
                                        <textarea class="form-control input-sm" rows="4" cols="50"  name="maksud_perjalanan_dinas" /></textarea>
                                    </div>    
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Yang Mengajukan</label>                                        
                                        <?php $this->ADM->combo_box("SELECT * FROM penanggung_jawab", 'id_penanggungjawab', 'id_penanggungjawab', 'nama_penanggungjawab', $id_penanggungjawab);?>
                                    </div>
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Yang Memberi Perintah</label>                                        
                                        <?php $this->ADM->combo_box("SELECT * FROM penanggung_jawab", 'id_penanggungjawab2', 'id_penanggungjawab', 'nama_penanggungjawab', $id_penanggungjawab2);?>
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
                            	<form action="<?php echo site_url();?>home/sppd/edit" method="post" id="exampleStandardForm" autocomplete="off">
                      	      	
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
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Yang Mengajukan</label>                                        
                                        <?php $this->ADM->combo_box("SELECT * FROM penanggung_jawab", 'id_penanggungjawab', 'id_penanggungjawab', 'nama_penanggungjawab', $id_penanggungjawab);?>
                                    </div>
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Yang Memberi Perintah</label>                                        
                                        <?php $this->ADM->combo_box("SELECT * FROM penanggung_jawab", 'id_penanggungjawab2', 'id_penanggungjawab', 'nama_penanggungjawab', $id_penanggungjawab2);?>
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