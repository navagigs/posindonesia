-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 06:45 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perjalanandinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_transportasi`
--

CREATE TABLE `alat_transportasi` (
  `id_alat_transportasi` int(11) NOT NULL,
  `nama_alat_transportasi` varchar(50) NOT NULL,
  `jenis_alat_transportasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat_transportasi`
--

INSERT INTO `alat_transportasi` (`id_alat_transportasi`, `nama_alat_transportasi`, `jenis_alat_transportasi`) VALUES
(1, 'Kereta', 'Kendaraan Umum'),
(2, 'Mobil1', 'Kendaraan Dinas1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_fasilitas_perjalanan`
--

CREATE TABLE `jenis_fasilitas_perjalanan` (
  `id_jenis_fasilitas` int(11) NOT NULL,
  `jenis_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_fasilitas_perjalanan`
--

INSERT INTO `jenis_fasilitas_perjalanan` (`id_jenis_fasilitas`, `jenis_fasilitas`) VALUES
(1, 'Perjalanan Dinas Biasa'),
(2, 'Perjalanan Dinas Luar Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `kantor_pos`
--

CREATE TABLE `kantor_pos` (
  `kode_kantor_pos` int(11) NOT NULL,
  `nama_kantor_pos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kantor_pos`
--

INSERT INTO `kantor_pos` (`kode_kantor_pos`, `nama_kantor_pos`) VALUES
(41283, 'Cianjur1'),
(41284, 'Padalarang');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nippos_pegawai` varchar(50) NOT NULL,
  `grade_pegawai` varchar(50) NOT NULL,
  `jabatan_pegawai` enum('FUNGSIONAL PERUSAHAAN','MANAJER','VICE PRESIDENT') NOT NULL DEFAULT 'FUNGSIONAL PERUSAHAAN',
  `kelompok_jabatan` varchar(50) NOT NULL,
  `status` enum('AKTIF','PENSIUN') NOT NULL DEFAULT 'AKTIF',
  `divisi` varchar(50) NOT NULL,
  `unit_bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nippos_pegawai`, `grade_pegawai`, `jabatan_pegawai`, `kelompok_jabatan`, `status`, `divisi`, `unit_bagian`) VALUES
(1, 'Nava Gia Ginasta', '1144096', '9', 'FUNGSIONAL PERUSAHAAN', 'DIREKTUR', 'AKTIF', 'Pengembangan Teknologi', 'Arsitektur Aplikasi dan Basis Data Bisnis'),
(2, 'Farhan Fauzan', '2143063', '9', 'MANAJER', 'Manajer Madya ', 'AKTIF', 'Pengembangan Teknologi', 'Arsitektur Aplikasi Basis Data Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `penanggung_jawab`
--

CREATE TABLE `penanggung_jawab` (
  `id_penanggungjawab` int(5) NOT NULL,
  `nama_penanggungjawab` varchar(50) NOT NULL,
  `jabatan_penanggungjawab` varchar(100) NOT NULL,
  `nippos_penanggungjawab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanggung_jawab`
--

INSERT INTO `penanggung_jawab` (`id_penanggungjawab`, `nama_penanggungjawab`, `jabatan_penanggungjawab`, `nippos_penanggungjawab`) VALUES
(1, 'CHARLES SITORUS', 'Direktur Teknologi', ''),
(2, 'Fikri Subhan1', 'VP Operasi dan Layanan Teknologi1', '9733646091');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_sppd`
--

CREATE TABLE `pengajuan_sppd` (
  `id_sppd` int(5) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `nippos_pegawai` varchar(50) NOT NULL,
  `kantor_asal` varchar(50) NOT NULL,
  `kantor_tujuan` varchar(50) NOT NULL,
  `lama_perjalanan_dinas` int(5) NOT NULL,
  `tanggal_berangkat` varchar(20) NOT NULL,
  `tanggal_kembali` varchar(20) NOT NULL,
  `alat_transportasi` varchar(50) NOT NULL,
  `jenis_fasilitas_dinas` varchar(50) NOT NULL,
  `maksud_perjalanan_dinas` text NOT NULL,
  `id_penanggungjawab` int(5) NOT NULL,
  `id_penanggungjawab2` int(5) NOT NULL,
  `tanggal_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengajuan_sppd`
--

INSERT INTO `pengajuan_sppd` (`id_sppd`, `nomor`, `nippos_pegawai`, `kantor_asal`, `kantor_tujuan`, `lama_perjalanan_dinas`, `tanggal_berangkat`, `tanggal_kembali`, `alat_transportasi`, `jenis_fasilitas_dinas`, `maksud_perjalanan_dinas`, `id_penanggungjawab`, `id_penanggungjawab2`, `tanggal_post`) VALUES
(17, '001/SPJ/Divtek/0717', '2143063', 'Pos Bojongpicung', 'Pos Padalarang', 22, '06/Juli/2017', '28/Juli/2017', 'Mobil', 'Perjalanan Dinas Biasa', 'B', 2, 1, '2017-07-06'),
(18, '002/SPJ/Divtek/0717', '2143063', 'Padalarang', 'Cianjur', 8, '14/Juli/2017', '22/Juli/2017', 'Kereta', 'Perjalanan Dinas Biasa', '1', 1, 1, '2017-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `pengawasan`
--

CREATE TABLE `pengawasan` (
  `id_pengawasan` int(5) NOT NULL,
  `nippos_pegawai` varchar(50) NOT NULL,
  `lama_perjalanan_dinas` varchar(50) NOT NULL,
  `jumlah_perjalanan_dinas` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perpanjangan`
--

CREATE TABLE `perpanjangan` (
  `id_perpanjangan` int(5) NOT NULL,
  `id_sppd` int(5) NOT NULL,
  `keperluan_perjalanan` varchar(50) NOT NULL,
  `kantor_tujuan` varchar(50) NOT NULL,
  `tanggal_mulai` varchar(20) NOT NULL,
  `tanggal_selesai` varchar(20) NOT NULL,
  `jumlah_hari` int(5) NOT NULL,
  `perpanjangan_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpanjangan`
--

INSERT INTO `perpanjangan` (`id_perpanjangan`, `id_sppd`, `keperluan_perjalanan`, `kantor_tujuan`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_hari`, `perpanjangan_post`) VALUES
(7, 17, 'b', 'Cianjur1', '18/Juli/2017', '01/Agustus/2017', 14, '2017-07-18'),
(8, 18, 'w', 'Cianjur1', '18/Juli/2017', '01/Agustus/2017', 14, '2017-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('29c29fea74b4ecb538bbfed2d704023a', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 1491493158, 'a:3:{s:9:\"user_data\";s:0:\"\";s:10:\"admin_nama\";s:13:\"Administrator\";s:17:\"flash:old:warning\";s:29:\"NIP dan Password tidak cocok!\";}');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` enum('STAF ADM','VICE PRESIDENT','MANAJER') NOT NULL DEFAULT 'STAF ADM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'STAF ADM'),
(7, 'nava', '533078acd91fffef2a525239de4a3dc9', 'MANAJER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_transportasi`
--
ALTER TABLE `alat_transportasi`
  ADD PRIMARY KEY (`id_alat_transportasi`);

--
-- Indexes for table `jenis_fasilitas_perjalanan`
--
ALTER TABLE `jenis_fasilitas_perjalanan`
  ADD PRIMARY KEY (`id_jenis_fasilitas`);

--
-- Indexes for table `kantor_pos`
--
ALTER TABLE `kantor_pos`
  ADD PRIMARY KEY (`kode_kantor_pos`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  ADD PRIMARY KEY (`id_penanggungjawab`);

--
-- Indexes for table `pengajuan_sppd`
--
ALTER TABLE `pengajuan_sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indexes for table `pengawasan`
--
ALTER TABLE `pengawasan`
  ADD PRIMARY KEY (`id_pengawasan`);

--
-- Indexes for table `perpanjangan`
--
ALTER TABLE `perpanjangan`
  ADD PRIMARY KEY (`id_perpanjangan`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_transportasi`
--
ALTER TABLE `alat_transportasi`
  MODIFY `id_alat_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_fasilitas_perjalanan`
--
ALTER TABLE `jenis_fasilitas_perjalanan`
  MODIFY `id_jenis_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `id_penanggungjawab` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengajuan_sppd`
--
ALTER TABLE `pengajuan_sppd`
  MODIFY `id_sppd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pengawasan`
--
ALTER TABLE `pengawasan`
  MODIFY `id_pengawasan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perpanjangan`
--
ALTER TABLE `perpanjangan`
  MODIFY `id_perpanjangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
