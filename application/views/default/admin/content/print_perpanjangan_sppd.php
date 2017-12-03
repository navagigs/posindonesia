<body onload="javascript:window.print()">
<style type="text/css">
.table {
	font-size: 16px;
    border-collapse: collapse;
    width: 100%;
}

.table, .table th, .table td {
	padding: 4px;
    border: 1px solid black;
}
.tb {
	border: 1px solid #ff;
}
</style>
<table width="100%" >
	<tr>
		<th><img src="<?php echo base_url();?>templates/default/admin/plugins/images/logo-pos.png" width="80"></th>
		<th><p align="right">Bandung, <?php $b = date("Y-m-d"); echo dateIndo1($b); ?></p>
</th>
	</tr>
</table>
<center><h3><u>NOTA PUSAT</u><br>
Nomor   : <?php echo $perpanjangan->nomor; ?></center>

<table width="100%" style="margin-left: 20px;">
	<tr>
		<td width="7%">Kepada</td>
		<td width="1%">:</td>
		<td>Direktur Teknologi</td>
	</tr>
	<tr>
		<td width="7%">Dari</td>
		<td width="1%">:</td>
		<td>VP Pengembangan Teknologi</td>
	</tr>
	<tr>
		<td width="7%">Perihal</td>
		<td width="1%">:</td>
		<td>Ijin Pelampauan Hari Perjalanan Dinas</td>
	</tr>
</table>
	<?php
	$query = $this->db->query("SELECT 
 							pegawai.nippos_pegawai AS nippos_pegawai,
 							pegawai.nama_pegawai AS nama_pegawai,
 							pegawai.jabatan_pegawai AS jabatan_pegawai,
                            pengajuan_sppd.id_sppd AS id_sppd,
                            pengajuan_sppd.tanggal_berangkat AS tanggal_berangkat,
                            pengajuan_sppd.tanggal_post AS tanggal_post,
                            pengajuan_sppd.nomor AS nomor
                            FROM pengajuan_sppd
                            LEFT JOIN pegawai ON pegawai.nippos_pegawai=pengajuan_sppd.nippos_pegawai  WHERE pengajuan_sppd.id_sppd =$perpanjangan->id_sppd");
    foreach ($query->result() as $pegawai){}
    ?>
<ol>
  <li>Menunjukan Keputusan Direksi No.36/DIRUT/0216 tanggal 4 Februari 2016 tentang Perjalanan Dinas Dalam Negeri Pasal 8 Ayat (3), dengan ini kami mengajukan permohonan izin melakukan perjalanan dinas lebih daro 9 hari kerja yaitu Saudara/i <b><?php echo $pegawai->nama_pegawai;?> - Nippos. <?php echo $pegawai->nippos_pegawai;?> </b>, jabatan <b><?php echo $pegawai->jabatan_pegawai;?>;</b></li><br>

  <li>Perjalanan dinas telah dilakukan yang bersangkutan dalam bulan <?php echo substr($pegawai->tanggal_berangkat, 3, 10);?> adalah sebagai berikut :</li>
  <table class="table">
  	<tr>
  		<th>No.</th>
  		<th>Keperluan Perjalanan Dinas</th>
  		<th>Kota Tujuan</th>
  		<th>Tanggal SPJ</th>
  		<th>Jumlah Hari</th>
  	</tr>
  	<?php
  	$no=1;
    $query = $this->db->query("SELECT * FROM pengajuan_sppd WHERE nippos_pegawai=$pegawai->nippos_pegawai AND id_sppd=$pegawai->id_sppd");
    foreach ($query->result() as $pengajuan_sppd){
    ?>
  	<tr>
  		<td align="center"><?php echo $no;?></td>
  		<td><?php echo $pengajuan_sppd->maksud_perjalanan_dinas;?></td>
  		<td  align="center"><?php echo $pengajuan_sppd->kantor_tujuan;?></td>
  		<td  align="center"><?php echo $pengajuan_sppd->tanggal_berangkat;?> s/d <?php echo $pengajuan_sppd->tanggal_kembali;?></td>
  		<td  align="center"><?php echo $pengajuan_sppd->lama_perjalanan_dinas;?></td>
  	</tr>
  	<?php $no++; } ?>
  	<tr>
  		<td colspan="4" align="right"><b>Jumlah</b></td>
  		<td align="center"><?php echo $pengajuan_sppd->lama_perjalanan_dinas;?></td>
  	</tr>
  </table><br>
  <li>Kelebihan Perjalanan dinas yang akan dijalani adalah sebagai berikut :</li>
    <table class="table">
  	<tr>
  		<th>No.</th>
  		<th>Keperluan Perjalanan Dinas</th>
  		<th>Kota Tujuan</th>
  		<th>Tanggal SPJ</th>
  		<th>Jumlah Hari</th>
  	</tr>
  	<?php
  	$no=1;
    $query = $this->db->query("SELECT * FROM perpanjangan WHERE id_sppd=$pegawai->id_sppd");
    foreach ($query->result() as $perpanjangan){
    ?>
  	<tr>
  		<td align="center"><?php echo $no;?></td>
  		<td><?php echo $perpanjangan->keperluan_perjalanan;?></td>
  		<td  align="center"><?php echo $perpanjangan->kantor_tujuan;?></td>
  		<td  align="center"><?php echo $perpanjangan->tanggal_mulai;?> s/d <?php echo $perpanjangan->tanggal_selesai;?></td>
  		<td  align="center"><?php echo $perpanjangan->jumlah_hari;?></td>
  	</tr>
  	<?php $no++; } ?>
  	<tr>
  		<td colspan="4" align="right"><b>Total Perjalanan Dinas bulan <?php echo substr($pegawai->tanggal_berangkat, 3, 10);?> </b></td>
  		<td align="center"><?php echo $pengajuan_sppd->lama_perjalanan_dinas + $perpanjangan->jumlah_hari;?></td>
  	</tr>
  </table><br>
  <li>Demikian kami sampaikan, atas perhatian dan persetujuan Saudara/i diucapkan terimakasih.</li>
</ol>

<table width="100%">
	<tr>
		<th></th>
		<th>Bandung, <?php echo dateIndo1($pengajuan_sppd->tanggal_post); ?></th>
		<th></th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php
    $query = $this->db->query("SELECT * FROM penanggung_jawab WHERE id_penanggungjawab=$pengajuan_sppd->id_penanggungjawab");
    foreach ($query->result() as $penanggungjawab){
      }
      ?>
	<?php
    $query = $this->db->query("SELECT * FROM penanggung_jawab WHERE id_penanggungjawab=$pengajuan_sppd->id_penanggungjawab2");
    foreach ($query->result() as $penanggungjawab2){
      }
      ?>
	<tr align="center">
		<td>Mengetahui,<br><?php echo  $penanggungjawab2->jabatan_penanggungjawab;?></td>
		<td></td>
		<td><?php echo  $penanggungjawab->jabatan_penanggungjawab;?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr align="center">
		<td><b><?php echo  $penanggungjawab2->nama_penanggungjawab;?></b></td>
		<td></td>
		<td><u><?php echo  $penanggungjawab->nama_penanggungjawab;?></u><br>Nippos.<?php echo  $penanggungjawab->nippos_penanggungjawab;?></td>
	</tr>
</table>

</body>