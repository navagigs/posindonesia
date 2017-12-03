 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Pegawai</h4> </div>
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
                        <a href="<?php echo site_url();?>home/pegawai/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Pegawai</button></a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAMA</th>
                                            <th>NIPPOS</th>
                                            <th>GRADE</th>
                                            <th>JABATAN</th>
                                            <th>KELOMPOK JABATAN</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
       								$query = $this->db->query("SELECT * FROM pegawai");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->nama_pegawai; ?></td>
                                            <td><?php echo $row->nippos_pegawai; ?></td>
                                            <td><?php echo $row->grade_pegawai; ?></td>
                                            <td><?php echo $row->jabatan_pegawai; ?></td>
                                            <td><?php echo $row->kelompok_jabatan; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><a href="<?php echo site_url();?>home/pegawai/edit/<?php echo $row->id_pegawai; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/pegawai/hapus/<?php echo $row->id_pegawai; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                        </tr>
                                     <?php $no++; } ?>
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
                        <h4 class="page-title">Pegawai</h4> </div>
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
                            <h3 class="box-title">Tambah pegawai</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/pegawai/tambah" method="post" id="exampleStandardForm" autocomplete="off">
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Nama Pegawai</label>
										<input type="text" class="form-control input-sm" id="nama_pegawai" name="nama_pegawai" placeholder="Masukan Nama Pegawai" required/>
									</div>			
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NIP POS</label>
                                        <input type="text" class="form-control input-sm" id="nippos_pegawai" name="nippos_pegawai" placeholder="Masukan NIP POS" required/>
                                    </div>       
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Grade</label>
                                        <input type="text" class="form-control input-sm" id="grade_pegawai" name="grade_pegawai" placeholder="Masukan Grade" required/>
                                    </div>      					
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Jabatan</label>
										<div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="jabatan_pegawai" id="FUNGSIONAL PERUSAHAAN" class="icheck" value="FUNGSIONAL PERUSAHAAN"> FUNGSIONAL PERUSAHAAN
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="jabatan_pegawai" id="vice president" class="icheck" value="VICE PRESIDENT"> VICE PRESIDENT
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="jabatan_pegawai" id="manajer" class="icheck" value="MANAJER"> MANAJER
                                                </label> 
                                         </div>
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Kelompok Jabatan</label>
                                        <input type="text" class="form-control input-sm" id="kelompok_jabatan" name="kelompok_jabatan" placeholder="Masukan Kelompok Jabatan" required/>
                                    </div>                                                
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Status</label>
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="status" id="aktif" class="icheck" value="aktif"> Aktif
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="status" id="pensiun" class="icheck" value="pensiun"> Pensiun
                                                </label> 
                                         </div>
                                    </div>

                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Divisi</label>
                                        <input type="text" class="form-control input-sm" id="divisi" name="divisi" placeholder="Masukan Divisi" required/>
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Unit Bagian</label>
                                        <input type="text" class="form-control input-sm" id="unit_bagian" name="unit_bagian" placeholder="Masukan Unit Bagian" required/>
                                    </div>  
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/pegawai'"/>
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
                        <h4 class="page-title">pegawai</h4> </div>
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
                            <h3 class="box-title">Edit pegawai</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/pegawai/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai;?>" />
									<div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama Pegawai</label>
                                        <input type="text" class="form-control input-sm" id="nama_pegawai" name="nama_pegawai" placeholder="Masukan Nama Pegawai" value="<?php echo $nama_pegawai;?>" required/>
                                    </div>          
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NIP POS</label>
                                        <input type="text" class="form-control input-sm" id="nippos_pegawai" name="nippos_pegawai" placeholder="Masukan NIP POS" value="<?php echo $nippos_pegawai;?>" required/>
                                    </div>       
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Grade</label>
                                        <input type="text" class="form-control input-sm" id="grade_pegawai" name="grade_pegawai" placeholder="Masukan Greade" value="<?php echo $grade_pegawai;?>" required/>
                                    </div>  							
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Hak Akses</label>
										<div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $staf = ($jabatan_pegawai=='FUNGSIONAL PERUSAHAAN')?'checked':'';?> name="jabatan_pegawai" id="FUNGSIONAL PERUSAHAAN" class="icheck" value="FUNGSIONAL PERUSAHAAN"> FUNGSIONAL PERUSAHAAN
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  <?php echo $vice = ($jabatan_pegawai=='VICE PRESIDENT')?'checked':'';?> name="jabatan_pegawai" id="vice president" class="icheck" value="VICE PRESIDENT"> VICE PRESIDENT
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $manajer = ($jabatan_pegawai=='MANAJER')?'checked':'';?> name="jabatan_pegawai" id="manajer" class="icheck" value="MANAJER"> MANAJER
                                                </label> 
                                         </div>
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Kelompok Jabatan</label>
                                        <input type="text" class="form-control input-sm" id="kelompok_jabatan" name="kelompok_jabatan" placeholder="Masukan Kelompok Jabatan" value="<?php echo $kelompok_jabatan;?>" required/>
                                    </div>                                                
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Status</label>
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $aktif = ($status=='AKTIF')?'checked':'';?> name="status" id="aktif" class="icheck" value="aktif"> Aktif
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $pensiun = ($status=='PENSIUN')?'checked':'';?> name="status" id="pensiun" class="icheck" value="pensiun"> Pensiun
                                                </label> 
                                         </div>
                                    </div>

                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Divisi</label>
                                        <input type="text" class="form-control input-sm" id="divisi" name="divisi" placeholder="Masukan Divisi"  value="<?php echo $divisi;?>" required/>
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Unit Bagian</label>
                                        <input type="text" class="form-control input-sm" id="unit_bagian" name="unit_bagian" placeholder="Masukan Unit Bagian"  value="<?php echo $unit_bagian;?>" required/>
                                    </div>  
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/pegawai'"/>
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