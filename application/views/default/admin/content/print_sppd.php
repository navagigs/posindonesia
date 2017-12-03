<body onload="javascript:window.print()">
<style type="text/css">
.table {
	font-size: 12px;
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
		<th><p align="right">LAMPIRAN VIII KEPUTUSAN DIREKSI PT.POS INDONESIA (PERSERO)<br>NOMOR : KD.36/DIRUT/0216<br>TANGGAL : 4 FEBRUARI 2016</p>
</th>
	</tr>
</table>
<center><h3><u>SURAT PERINTAH PERJALANAN DINAS (SPPD)</u><br>
Nomor   : <?php echo $pengajuan_sppd->nomor; ?></center>
<p> Diberikan Kepada : </p>
<table class="table">
<tr>
	<th align="left">Nama / Nippos</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->nama_pegawai; ?> / <?php echo $pengajuan_sppd->nippos_pegawai; ?></th>
</tr>
<tr>
	<th align="left">Grade/Jabatan/Kelompok Jabatan</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->grade_pegawai; ?> / <?php echo $pengajuan_sppd->jabatan_pegawai; ?> / <?php echo $pengajuan_sppd->kelompok_jabatan; ?></th>
</tr>
<tr>
	<th align="left">Divisi/Bagian/Unit</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->divisi; ?> / <?php echo $pengajuan_sppd->unit_bagian; ?></th>
</tr>
<tr>
	<th align="left">Kantor Asal</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->kantor_asal; ?></th>
</tr>
<tr>
	<th align="left">Kantor Tujuan</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->kantor_tujuan; ?></th>
</tr>
<tr>
	<th align="left">Lama Perjalanan Dinas</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->lama_perjalanan_dinas; ?></th>
</tr>
<tr>
	<th align="left">Tanggal Berangkat</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->tanggal_berangkat; ?></th>
</tr>
<tr>
	<th align="left">Tanggal Kembali</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->tanggal_kembali; ?></th>
</tr>
<tr>
	<th align="left">Alat Transportasi</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->alat_transportasi; ?></th>
</tr>
<tr>
	<th align="left">Jenis Fasilitas Perjalanan Dinas</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->jenis_fasilitas_dinas; ?></th>
</tr>
<tr>
	<th align="left">Maksud Perjalanan Dinas</th>
	<th>:</th>
	<th align="left"><?php echo $pengajuan_sppd->maksud_perjalanan_dinas; ?></th>
</tr>
<tr>
	<th align="left" rowspan="3">
	Catatan :<br>
	<?php
    $query = $this->db->query("SELECT * FROM perpanjangan WHERE id_sppd=$pengajuan_sppd->id_sppd");
    foreach ($query->result() as $row){}
    ?>
	Perjalanan bulan <?php echo substr($pengajuan_sppd->tanggal_berangkat, 3, 10); ?> : <?php echo $pengajuan_sppd->lama_perjalanan_dinas; ?> Hari<br>
	<?php error_reporting(0); if($row->jumlah_hari == ''){ ?>
	Perjalanan ini : <?php echo $pengajuan_sppd->lama_perjalanan_dinas; ?> Hari <br>
	<?php }  else {?>

	Perjalanan ini : <?php echo $row->jumlah_hari; ?> Hari <br>

	<?php }?>
	Total Perjalanan bulan <?php echo substr($pengajuan_sppd->tanggal_berangkat, 3, 10); ?> : <?php echo $row->jumlah_hari + $pengajuan_sppd->lama_perjalanan_dinas; ?> Hari
	<th colspan="2">Bandung, <?php echo dateIndo4($pengajuan_sppd->tanggal_post); ?><br>
		Yang Mengajukan<br>
		<?php echo $pengajuan_sppd->jabatan_penanggungjawab; ?>,<br><br><br><br><br><br><br>
		<b><u><?php echo $pengajuan_sppd->nama_penanggungjawab; ?></u></b><br>
		NIPPOS. <?php echo $pengajuan_sppd->nippos_penanggungjawab; ?>
	</th>
<tr>
<tr>
	<?php
    $query = $this->db->query("SELECT * FROM penanggung_jawab WHERE id_penanggungjawab=$pengajuan_sppd->id_penanggungjawab2");
    foreach ($query->result() as $penanggungjawab2){
      }
    ?>
	<th colspan="2">Yang memberi perintah<br> <?php echo  $penanggungjawab2->jabatan_penanggungjawab;?>,<br><br><br><br><br><br><br>

		<b><u><?php echo  $penanggungjawab2->nama_penanggungjawab; ?></u></b><br>
		NIPPOS. <?php echo  $penanggungjawab2->nippos_penanggungjawab; ?></th>
</tr>

</table>
</body>