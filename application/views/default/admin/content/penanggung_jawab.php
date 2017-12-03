 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Penanggung Jawab</h4> </div>
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
                        <a href="<?php echo site_url();?>home/penanggung_jawab/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Penanggung Jawab</button></a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAMA</th>
                                            <th>JABATAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
       								$query = $this->db->query("SELECT * FROM penanggung_jawab");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->nama_penanggungjawab; ?></td>
                                            <td><?php echo $row->jabatan_penanggungjawab; ?></td>
                                            <td><a href="<?php echo site_url();?>home/penanggung_jawab/edit/<?php echo $row->id_penanggungjawab; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/penanggung_jawab/hapus/<?php echo $row->id_penanggungjawab; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                        <h4 class="page-title">Penanggung Jawab</h4> </div>
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
                            <h3 class="box-title">Tambah Penanggung Jawab</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/penanggung_jawab/tambah" method="post" id="exampleStandardForm" autocomplete="off">
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Nama</label>
										<input type="text" class="form-control input-sm" id="nama_penanggungjawab" name="nama_penanggungjawab" placeholder="Masukan Nama" required/>
									</div>
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Jabatan</label>
										<input type="jabatan_penanggungjawab" class="form-control input-sm" id="jabatan_penanggungjawab" name="jabatan_penanggungjawab" placeholder="Masukan Jabatan" required/>
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NIP POS</label>
                                        <input type="nippos_penanggungjawab" class="form-control input-sm" id="nippos_penanggungjawab" name="nippos_penanggungjawab" placeholder="Masukan NIP POS" />
                                    </div>		
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/penanggung_jawab'"/>
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
                        <h4 class="page-title">Penanggung Jawab</h4> </div>
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
                            <h3 class="box-title">Edit Penanggung Jawab</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/penanggung_jawab/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="id_penanggungjawab" value="<?php echo $id_penanggungjawab;?>" />
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Nama</label>
										<input type="text" class="form-control input-sm" id="nama_penanggungjawab" name="nama_penanggungjawab" value="<?php echo $nama_penanggungjawab;?>"/>
									</div>
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Jabatan</label>
										<input type="jabatan_penanggungjawab" class="form-control input-sm" name="jabatan_penanggungjawab" value="<?php echo $jabatan_penanggungjawab;?>" />
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NIP POS</label>
                                        <input type="nippos_penanggungjawab" class="form-control input-sm" name="nippos_penanggungjawab" value="<?php echo $nippos_penanggungjawab;?>" />
                                    </div>  
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/penanggung_jawab'"/>
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