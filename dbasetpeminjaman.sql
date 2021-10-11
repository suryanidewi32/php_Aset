-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 04:02 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbasetpeminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarinventaris`
--

CREATE TABLE `daftarinventaris` (
  `koded` int(5) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `kode_aset` varchar(10) NOT NULL,
  `NIK` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarinventaris`
--

INSERT INTO `daftarinventaris` (`koded`, `jns`, `merk`, `posisi`, `kode_aset`, `NIK`) VALUES
(11, 'DSLR', 'Canon', 'LG', 'CV/A.00001', '198208072006041001'),
(13, 'Handycam', 'Canon Vixia Hf G40', 'LG', 'CV/A.00006', '198208072006041001'),
(14, 'Handycam', 'Canon DV XA20', 'LG', 'CV/A.00007', '198208072006041001'),
(15, 'Komputer', '-', 'LG', 'CV/A.00014', '198208072006041001'),
(16, 'DSLR', 'Canon eos 750D', 'LG', 'CV/A.00008', '198208072006041001'),
(17, 'DSLR', 'canon', 'lantai 1', 'CV/A.00017', '198208072006041001');

-- --------------------------------------------------------

--
-- Table structure for table `tbaset`
--

CREATE TABLE `tbaset` (
  `kode_aset` varchar(10) NOT NULL,
  `tgl_input` date NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `kelompok_aset` varchar(30) NOT NULL,
  `lokasi_pembelian` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `kondisi_aset` varchar(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `penyedia_jasa` varchar(30) NOT NULL,
  `nama_aktiva` varchar(5) NOT NULL,
  `masa_perkiraan` varchar(10) NOT NULL,
  `stock` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `stock1` varchar(5) NOT NULL,
  `NIK` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbaset`
--

INSERT INTO `tbaset` (`kode_aset`, `tgl_input`, `nama_aset`, `kelompok_aset`, `lokasi_pembelian`, `tgl_beli`, `kondisi_aset`, `harga_beli`, `penyedia_jasa`, `nama_aktiva`, `masa_perkiraan`, `stock`, `status`, `stock1`, `NIK`) VALUES
('CV/A.00001', '2016-01-01', 'Kamera DSLR 2000', 'Elektronik', 'Jakarta Barat', '2016-01-01', 'Baru', 10000000, 'Bukalapak', '1', '4 tahun', 0, 'Tersedia', '2', '198010111998031001'),
('CV/A.00002', '2016-01-01', 'Meja', 'Barang', 'Ruko A 19', '2016-01-01', 'Baru', 50000000, 'BebeGrosir', '1', '4 tahun', 50, 'Tersedia', '50', '198010111998031001'),
('CV/A.00003', '2017-01-01', 'Mesin Penghancur Kertas', 'Mesin', 'Jalan. Buana 70', '2017-01-01', 'Baru', 100000000, 'Bursaka', '1', '4 tahun', 2, '', '2', '198010111998031001'),
('CV/A.00004', '2017-01-01', 'JUNIPER SRX300', 'It Equipment', 'Jakarta', '2016-12-31', 'Baru', 4046000, 'AKULAKU', '1', '4 tahun', 1, 'Tersedia', '1', '198010111998031001'),
('CV/A.00005', '2017-01-01', 'Ruang Rapat ', 'Gedung', '-', '2017-01-01', 'Baru', 0, '-', '4', '20 tahun', 1, 'Tersedia', '1', '198010111998031001'),
('CV/A.00006', '2017-01-01', 'Canon Vixia Hf G40', 'Elektronik', 'Toko B, Jakarta Selatan', '2017-01-01', 'Baru', 18624721, 'Ubuy Indonesia', '1', '4 tahun', 1, 'Tersedia', '2', '198010111998031001'),
('CV/A.00007', '2017-01-01', 'Canon Professional Camcorder Pro DV XA20', 'Gedung', 'Toko B, Jakarta Selatan', '2017-01-01', 'Baru', 35800000, 'Ubuy Indonesia', '1', '4 tahun', 1, '', '1', '198010111998031001'),
('CV/A.00008', '2017-01-01', 'Kamera Canon eos 750D', 'Elektronik', 'Toko B, Jakarta Selatan', '2017-01-01', 'Baru', 8500000, 'Ubuy Indonesia', '1', '4 tahun', 1, 'Tersedia', '1', '198010111998031001'),
('CV/A.00009', '2017-01-01', 'Ruang Rapat', 'Gedung', '-', '2017-01-01', 'Baru', 1000000000, '-', '4', '20 tahun', 0, 'Tersedia', '1', '198010111998031001'),
('CV/A.00010', '2017-01-01', 'AVANZA 1500S AT', 'Kendaraan', 'Jakarta', '2017-01-01', 'Baru', 200000000, 'Toyota', '1', '4 tahun', 1, 'Tersedia', '1', '198010111998031001'),
('CV/A.00011', '2014-01-01', 'kamera canon 60d kit 18-55 is ii', 'Elektronik', 'Jakarta', '2014-01-01', 'Baru', 7900000, 'Tokopedia', '1', '4 tahun', 1, 'Lelang', '1', '198010111998031001'),
('CV/A.00012', '1998-01-01', 'Ruang Rapat', 'Gedung', '-', '1998-01-01', 'Baru', 200000000, '-', '4', '20 tahun', 1, 'Tersedia', '1', '198010111998031001'),
('CV/A.00013', '2018-07-03', 'MESIN ABSEN SIDIK JARI', 'Mesin', 's', '2018-07-12', 'Baru', 1999900, 's', '2', '8 tahun', 1, '', '1', '198010111998031001'),
('CV/A.00014', '2018-07-08', 'COMPUTER CORE i5 4460 ', 'Elektronik', 'Jakarta Pusat', '2018-07-08', 'Baru', 6650000, 'PT ABC', '1', '4 tahun', 5, 'Tersedia', '5', '198010111998031001'),
('CV/A.00015', '2018-07-08', 'Meja Meeting', 'Barang', 'JAKARTA', '2018-07-08', 'Baru', 89800, 'PT ABC', '1', '4 tahun', 10, '', '10', '198010111998031001'),
('CV/A.00016', '2018-07-11', 'Asus A442UF Core i7 CoffeeLake 8550U', 'Elektronik', 'JAKARTA', '2018-07-10', 'Baru', 10799000, 'TOKO ABC', '1', '4 tahun', 1, '', '1', '198010111998031001'),
('CV/A.00017', '2018-07-12', 'canon v5', 'Elektronik', 'jakarta barat', '2018-07-12', 'Baru', 1000000, 'toko abc', '1', '4 tahun', 0, 'Tersedia', '1', '198010111998031001');

-- --------------------------------------------------------

--
-- Table structure for table `tbgedung`
--

CREATE TABLE `tbgedung` (
  `kodeg` int(5) NOT NULL,
  `luas_gedung` varchar(10) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `kode_aset` varchar(10) NOT NULL,
  `NIK` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbgedung`
--

INSERT INTO `tbgedung` (`kodeg`, `luas_gedung`, `posisi`, `kode_aset`, `NIK`) VALUES
(5, '20 M', 'LG', 'CV/A.00005', '198208072006041001');

-- --------------------------------------------------------

--
-- Table structure for table `tbkendaraan`
--

CREATE TABLE `tbkendaraan` (
  `kodek` int(5) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `no_kendaraan` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `thn_pembuatan` varchar(4) NOT NULL,
  `no_rangka` varchar(20) NOT NULL,
  `no_mesin` varchar(15) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `NIK` char(20) NOT NULL,
  `kode_aset` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkendaraan`
--

INSERT INTO `tbkendaraan` (`kodek`, `jns`, `no_kendaraan`, `merk`, `thn_pembuatan`, `no_rangka`, `no_mesin`, `posisi`, `NIK`, `kode_aset`) VALUES
(0, 'Mobil', 'B 1073 PQP', 'AVANZA', '2011', 'MHFG2CJ2JBKO23952', 'DCH9434', 'G', '198208072006041001', 'CV/A.00010');

-- --------------------------------------------------------

--
-- Table structure for table `tbpeminjaman`
--

CREATE TABLE `tbpeminjaman` (
  `kodep` int(6) NOT NULL,
  `kegiatan` varchar(30) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `jumlah_pesanan` int(5) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `statuspeminjaman` varchar(20) NOT NULL,
  `lokasi_kegiatan` varchar(30) NOT NULL,
  `keteranganmanajer` varchar(300) NOT NULL,
  `namapetugas` varchar(30) NOT NULL,
  `ttdpetugas` varchar(300) NOT NULL,
  `NIK` char(20) NOT NULL,
  `kode_aset` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpeminjaman`
--

INSERT INTO `tbpeminjaman` (`kodep`, `kegiatan`, `tgl_peminjaman`, `tgl_pengembalian`, `jumlah_pesanan`, `keterangan`, `statuspeminjaman`, `lokasi_kegiatan`, `keteranganmanajer`, `namapetugas`, `ttdpetugas`, `NIK`, `kode_aset`) VALUES
(200001, 'Dinas', '2018-05-31', '2018-05-31', 1, 'approve', 'Kembali', '', 'ttd.jpg', 'Ahmad Leman', 'ttd.jpg', '195601241988011001', 'CV/A.00006'),
(200002, 'Rapat', '2018-05-31', '2018-06-02', 1, '', 'Tidak', 'Ruang Rapat', '', '', '', '195601241988011001', 'CV/A.00007'),
(200003, 'Rapat', '2018-05-31', '2018-06-06', 1, '', 'Kembali', 'Ruang Rapat', '', '', '', '195601241988011001', 'CV/A.00009'),
(200004, 'Rapat', '2018-06-01', '2018-06-07', 1, 'Tidak di Setujui', 'Tidak', '', 'Karena', '', '', '195501301991031003', 'CV/A.00006'),
(200005, 'Rapat', '2018-07-19', '2018-07-21', 1, 'approve', 'Kembali', 'Ruang Rapat', 'ttd.jpg', 'Ahmad Leman', 'ttd.jpg', '195601241988011001', 'CV/A.00006'),
(200006, 'untuk meeting ', '2018-07-20', '2018-07-24', 1, 'approve', 'approve', 'Bogor', 'ttd.jpg', 'Ahmad Leman', 'ttdpetugas.jpg', '196372829291719273', 'CV/A.00010'),
(200007, 'Rapat', '2018-07-15', '2018-07-20', 1, 'approve', 'approve', 'Daerah Bandung', 'ttd.jpg', 'Ahmad Leman', 'ttdpetugas.jpg', '22222222222211111111', 'CV/A.00001'),
(200008, 'dokumentasi rapat', '2018-07-11', '2018-07-12', 1, 'approve', 'approve', 'jakarta', 'ttdpetugas.jpg', 'ahmad leman', 'ttd.jpg', '12345678901234567890', 'CV/A.00017'),
(200009, 'hhhhhhhhhhhhh', '2018-07-19', '2018-07-20', 1, 'Karena', 'Cancel', 'hhhhhhhhhhhhhhh', '', '', '', '195601241988011001', 'CV/A.00006');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengadaan`
--

CREATE TABLE `tbpengadaan` (
  `koder` int(6) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `kelompok_aset` varchar(30) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `stock1` varchar(5) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `keteranganakun` varchar(300) NOT NULL,
  `statusbarang` varchar(10) NOT NULL,
  `NIK` char(20) NOT NULL,
  `kode_aset` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengadaan`
--

INSERT INTO `tbpengadaan` (`koder`, `nama_aset`, `merk`, `kelompok_aset`, `tgl_pengajuan`, `tujuan`, `stock1`, `posisi`, `harga`, `status`, `keterangan`, `keteranganakun`, `statusbarang`, `NIK`, `kode_aset`) VALUES
(100001, 'Mesin Penghancur Kertas', 'xyz', 'Mesin', '2016-01-01', 'Untuk...', '2', 'LG', '5000000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00003'),
(100002, 'NOTEBOOK LENOVO THINKPAD E460', 'LENOVO', 'Elektronik', '2018-05-30', 'Untuk Acara Rapat', '5', 'LG', '9650000', 'Tidak', 'Karena', '', '', '195601241988011001', ''),
(100003, 'COMPUTER CORE i5 4460 ', '-', 'Elektonik', '2018-05-30', 'Untuk...', '5', 'LG', '6650000', 'Approved', 'aset.jpeg', 'aset.jpeg', 'Tersedia', '195601241988011001', 'CV/A.00014'),
(100004, 'Kulkas SAMSUNG RT 19M300BGS INVERTER 2 Pintu', 'SAMSUNG RT 19M300BGS', 'Elektronik', '2018-05-30', 'Untuk...', '2', 'LG', '3500000', 'Tidak', 'Karena...', '', '', '195601241988011001', ''),
(100005, 'CAMERA OUTDOOR TURBO HD HIKVISION 720 P', 'HIKVISION', 'Elektonik', '2018-05-30', 'Untuk', '3', 'Outdoor', '342000', 'Tidak', 'Barang Kosong', 'aset.jpeg', '', '195601241988011001', 'CV/A.00013'),
(100006, 'Meja Meeting', 'xyz', 'Elektronik', '2018-06-09', 'Untuk...', '10', 'Ruang Rapat', '89800', 'Approved', 'Approve Peminjaman.png', 'Laporan Aset.png', 'Tersedia', '195601241988011001', 'CV/A.00015'),
(100007, 'Kamera DSLR 2000', 'Canon', 'Elektronik', '2015-12-10', 'Untuk...', '2', 'LG', '10000000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00001'),
(100009, 'Canon Vixia Hf G40', 'Vixia Hf G40', 'Elektronik', '2016-05-10', 'Untuk Acara Rapat', '2', 'LG', '18624721', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00006'),
(100010, 'Canon Professional Camcorder Pro DV XA20', 'Canon', 'Elektronik', '2016-04-10', 'Untuk...', '1', 'LG', '35800000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00007'),
(100011, 'Ruang Rapat', 'Gedung', 'Gedung', '2016-05-10', 'Untuk Acara Rapat', '1', 'Ruang Rapat', '1000000000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00009'),
(100012, 'AVANZA 1500S AT', 'AVANZA', 'Kendaraan', '2016-05-10', 'Untuk', '1', 'G', '200000000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00010'),
(100013, 'kamera canon 60d kit 18-55 is ii', 'canon', 'Elektronik', '2013-05-10', 'Untuk', '1', 'LG', '7900000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00011'),
(100014, 'Ruang Rapat', '-', 'Gedung', '1997-05-10', 'Untuk', '1', 'LG', '200000000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00012'),
(100015, 'Meja', 'kinu', 'Barang', '2015-05-10', 'Untuk...', '50', 'LG', '50000000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00002'),
(100016, 'Ruang Rapat', '-', 'Gedung', '2016-05-10', 'Untuk...', '50', 'LG', '50000000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00005'),
(100017, 'JUNIPER SRX300', 'SRX300', 'It Equipment', '2016-07-04', 'Untuk...', '1', 'LG', '4046000', 'Approved', '', '', 'Tersedia', '195601241988011001', 'CV/A.00004'),
(100018, 'CISCO WS-C3750G 48PS WITH POE', 'WS-C3750G 48PS', 'Mesin', '2018-07-03', 'Untuk..', '1', 'LG', '15000000', 'Tidak', 'karena', '', '', '195601241988011001', ''),
(100019, 'Kamera Canon eos 750D', 'Canon eos 750D', 'Elektonik', '2016-05-14', 'Untuk...', '1', 'LG', '8500000', 'Approved', '', '', 'Tersedia', '195501301991031003', 'CV/A.00008'),
(100020, 'printer', 'canon', 'Elektronik', '2018-07-07', 'yang lama rusak', '1', 'Finance', '2000000', 'Approved', '', 'ttdpetugas.jpg', 'beli', '196372829291719273', ''),
(100021, 'Sony HXR-MC2500 AVCHD Camcorder', 'Sony HXR-MC2500 AVCH', 'Elektronik', '2018-07-08', 'Untuk Keperluan Rapat', '1', 'Lantai 2 HOMS', '10695000', 'Approved', 'ttd.jpg', 'ttdpetugas.jpg', 'beli', '22222222222211111111', ''),
(100022, 'BEAT SPORTY ESP CW', 'Honda', 'Kendaraan', '2018-07-08', 'Untuk Beli Barang', '1', 'Area Parking', '30460000', 'Approved', 'ttd.jpg', 'ttdpetugas.jpg', 'beli', '22222222222211111111', ''),
(100023, 'Asus A442UF Core i7 CoffeeLake 8550U', 'Asus A442UF', 'Elektronik', '2018-07-08', 'Untuk Keperluan Rapat', '1', 'Lantai HOMS', '10799000', 'Approved', 'ttd.jpg', 'ttdpetugas.jpg', 'Tersedia', '22222222222211111111', 'CV/A.00016'),
(100024, 'canon v5', 'canon', 'Elektronik', '2018-07-12', 'masa manfaat habis', '1', 'lantai 1', '1000000', 'Approved', 'ttd.jpg', 'ttdpetugas.jpg', 'Tersedia', '12345678901234567890', 'CV/A.00017'),
(100025, 'gdajhkjal', 'lg', 'Barang', '2018-07-19', 'hadkjh', '1', 'divisi keuangan', '788888', 'Approved', '-.jpg', '-.jpg', 'beli', '196372829291719273', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenghapusan`
--

CREATE TABLE `tbpenghapusan` (
  `kode_penghapusan` int(5) NOT NULL,
  `tgl_penghapusan` date NOT NULL,
  `metode_penghapusan` varchar(10) NOT NULL,
  `nilai_residu` varchar(10) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `kode_aset` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenghapusan`
--

INSERT INTO `tbpenghapusan` (`kode_penghapusan`, `tgl_penghapusan`, `metode_penghapusan`, `nilai_residu`, `nama_penerima`, `kode_aset`) VALUES
(1, '2018-06-05', 'Lelang', '6000000', 'ABCHJ', 'CV/A.00011');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `NIK` char(20) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Petugas_Keuangan','Petugas_Barang','Karyawan','Manajer_Keuangan','Manajer_BagUmum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`NIK`, `nama_user`, `jabatan`, `bagian`, `username`, `password`, `level`) VALUES
('12345678901234567890', 'fajar', 'staff', 'manajer', 'fajarmasya', '79f82d817582e3d9a2129fcca758515c', 'Karyawan'),
('195501301991031003', 'Agus', 'STAFF', 'BAGIAN KEUANGAN', 'Agus', '123agus', 'Karyawan'),
('195601241988011001', 'IRFAN', 'STAFF', 'KARYAWAN', 'Irfan', 'c17a22cd004d34a4218dec3aefa33216', 'Karyawan'),
('196372829291719273', 'Linda Miftahul', 'Karyawan', 'Keuangan', 'lindamiftahul', '3458b8c24cb24fedd3a4fd8d4e8569e3', 'Karyawan'),
('198010111998031001', 'ANANG KURNIA, SE', 'PETUGAS KEUANGAN', 'BAGIAN KEUANGAN', 'ANANGKURNIA', '913e4903239292274aea3dae8b978b09', 'Petugas_Keuangan'),
('198208072006041001', 'AHMAD LEMAN, SE', 'PETUGAS UMUM', 'BAGIAN UMUM', 'AHMADLEMAN', '3d76802c8b412944ce80eb31910eeae6', 'Petugas_Barang'),
('209611010198503100', 'ANDRY HERNANTO, SH', 'KEPALA BAGIAN UMUM', 'BAGIAN UMUM', 'ANDRYHERNANTO', '1add061214a8d7a8d2a76ffa9b0e766f', 'Manajer_BagUmum'),
('218508221988021009', 'MUHAMAD SAFARI, SE.', 'KEPALA BAGIAN KEUANGAN', 'BAGIAN KEUANGAN', 'MSAFARI', 'd19de68a8b34409023c1ef5f1fe97bea', 'Manajer_Keuangan'),
('22222222222211111111', 'Suryani Dewi', 'STAFF', 'Head of Managed Services', 'suryanid', 'e0bd4ff613fca12c2b0f364185fba3e7', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarinventaris`
--
ALTER TABLE `daftarinventaris`
  ADD PRIMARY KEY (`koded`),
  ADD KEY `kode_aset` (`kode_aset`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `tbaset`
--
ALTER TABLE `tbaset`
  ADD PRIMARY KEY (`kode_aset`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `NIK_2` (`NIK`);

--
-- Indexes for table `tbgedung`
--
ALTER TABLE `tbgedung`
  ADD PRIMARY KEY (`kodeg`),
  ADD UNIQUE KEY `posisi` (`posisi`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- Indexes for table `tbkendaraan`
--
ALTER TABLE `tbkendaraan`
  ADD PRIMARY KEY (`kodek`),
  ADD UNIQUE KEY `no_kendaraan` (`no_kendaraan`),
  ADD UNIQUE KEY `no_rangka` (`no_rangka`),
  ADD UNIQUE KEY `no_mesin` (`no_mesin`),
  ADD KEY `kode_aset` (`kode_aset`),
  ADD KEY `kode_aset_2` (`kode_aset`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `kode_aset_3` (`kode_aset`);

--
-- Indexes for table `tbpeminjaman`
--
ALTER TABLE `tbpeminjaman`
  ADD PRIMARY KEY (`kodep`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `NIK_2` (`NIK`),
  ADD KEY `NIK_3` (`NIK`),
  ADD KEY `kode_aset` (`kode_aset`),
  ADD KEY `NIK_4` (`NIK`),
  ADD KEY `kode_aset_2` (`kode_aset`);

--
-- Indexes for table `tbpengadaan`
--
ALTER TABLE `tbpengadaan`
  ADD PRIMARY KEY (`koder`),
  ADD KEY `Nik` (`NIK`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- Indexes for table `tbpenghapusan`
--
ALTER TABLE `tbpenghapusan`
  ADD PRIMARY KEY (`kode_penghapusan`),
  ADD KEY `kode_aset` (`kode_aset`),
  ADD KEY `kode_aset_2` (`kode_aset`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarinventaris`
--
ALTER TABLE `daftarinventaris`
  MODIFY `koded` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbgedung`
--
ALTER TABLE `tbgedung`
  MODIFY `kodeg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbpeminjaman`
--
ALTER TABLE `tbpeminjaman`
  MODIFY `kodep` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200010;
--
-- AUTO_INCREMENT for table `tbpengadaan`
--
ALTER TABLE `tbpengadaan`
  MODIFY `koder` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100026;
--
-- AUTO_INCREMENT for table `tbpenghapusan`
--
ALTER TABLE `tbpenghapusan`
  MODIFY `kode_penghapusan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftarinventaris`
--
ALTER TABLE `daftarinventaris`
  ADD CONSTRAINT `daftarinventaris_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tbuser` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftarinventaris_ibfk_2` FOREIGN KEY (`kode_aset`) REFERENCES `tbaset` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbaset`
--
ALTER TABLE `tbaset`
  ADD CONSTRAINT `tbaset_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tbuser` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbgedung`
--
ALTER TABLE `tbgedung`
  ADD CONSTRAINT `tbgedung_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tbuser` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbgedung_ibfk_2` FOREIGN KEY (`kode_aset`) REFERENCES `tbaset` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbkendaraan`
--
ALTER TABLE `tbkendaraan`
  ADD CONSTRAINT `tbkendaraan_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tbuser` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbkendaraan_ibfk_2` FOREIGN KEY (`kode_aset`) REFERENCES `tbaset` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpeminjaman`
--
ALTER TABLE `tbpeminjaman`
  ADD CONSTRAINT `tbpeminjaman_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tbuser` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpeminjaman_ibfk_2` FOREIGN KEY (`kode_aset`) REFERENCES `tbaset` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpengadaan`
--
ALTER TABLE `tbpengadaan`
  ADD CONSTRAINT `tbpengadaan_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tbuser` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpenghapusan`
--
ALTER TABLE `tbpenghapusan`
  ADD CONSTRAINT `tbpenghapusan_ibfk_1` FOREIGN KEY (`kode_aset`) REFERENCES `tbaset` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
