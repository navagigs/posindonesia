 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">User</h4> </div>
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
                        <a href="<?php echo site_url();?>home/user/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah User</button></a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>USERNAME</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
       								$query = $this->db->query("SELECT * FROM user");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><a href="<?php echo site_url();?>home/user/edit/<?php echo $row->username; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/user/hapus/<?php echo $row->id_user; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                        <h4 class="page-title">User</h4> </div>
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
                            <h3 class="box-title">Tambah User</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/user/tambah" method="post" id="exampleStandardForm" autocomplete="off">
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Username</label>
										<input type="text" class="form-control input-sm" id="username" name="username" placeholder="Masukan Username" required/>
									</div>
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Password</label>
										<input type="password" class="form-control input-sm" id="password" name="password" placeholder="Masukan Password" required/>
									</div>									
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Hak Akses</label>
										<div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="hak_akses" id="staf adm" class="icheck" value="STAF ADM"> ADMIN
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="hak_akses" id="vice president" class="icheck" value="VICE PRESIDENT"> VICE PRESIDENT
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="hak_akses" id="manajer" class="icheck" value="MANAJER"> MANAJER
                                                </label> 
                                         </div>
									</div>
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/user'"/>
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
                        <h4 class="page-title">User</h4> </div>
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
                            <h3 class="box-title">Edit User</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/user/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="username" value="<?php echo $username;?>" />
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Username</label>
										<input type="text" class="form-control input-sm" id="username" disabled name="username" value="<?php echo $username;?>"/>
									</div>
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Password</label>
										<input type="password" class="form-control input-sm" name="password" /> *Kosongkan bila tidak diedit.
									</div>									
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Hak Akses</label>
										<div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $staf = ($hak_akses=='STAF ADM')?'checked':'';?> name="hak_akses" id="staf adm" class="icheck" value="STAF ADM"> ADMIN
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  <?php echo $vice = ($hak_akses=='VICE PRESIDENT')?'checked':'';?> name="hak_akses" id="vice president" class="icheck" value="VICE PRESIDENT"> VICE PRESIDENT
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $manajer = ($hak_akses=='MANAJER')?'checked':'';?> name="hak_akses" id="manajer" class="icheck" value="MANAJER"> MANAJER
                                                </label> 
                                         </div>
									</div>
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/user'"/>
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