-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2024 pada 04.56
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `pesan`) VALUES
(1, 'budi', 'yulia@gmail.com', 'lbb savira jaya'),
(2, 'angel', 'hadipusaka5@gmail.com', 'bismillah bisa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `judul_website` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `judul_website`, `alamat`, `email`, `telp`) VALUES
(1, 'LEMBAGA BIMBINGAN BELAJAR SAVIRA  REGENCY ', 'Jalan Citarum, Savira Regency', 'lbbsavira@gmail.com', '0895379906042');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `judul_informasi` varchar(50) NOT NULL,
  `isi_informasi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `icon`, `judul_informasi`, `isi_informasi`) VALUES
(1, 'fa-solid fa-calculator', 'PRISMA KALKULATOR TANGAN', 'merupakan sebuah program unggulan dari lbb savira yang memudahkan anak untuk berhitung'),
(2, 'fa-solid fa-book', 'CALISTUNG', 'Merupakan Program Anak TK maupun SD yang susah untuk berhitung , membaca maupun menulis'),
(3, 'fa-solid fa-hands-praying', 'MENGAJI', 'merupakan program mengaji yang memiliki perencanaan yang matang agar anak bisa mudah memahami huruf arab bahkan bisa menulsi dan membaca dengan cepat'),
(4, 'fa-solid fa-graduation-cap', 'MATA PELAJARAN', 'merupakan program unggulan yang dimiliki oleh savira bukan dan telah mencetak generasi yang berprestasi dan cerdas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelolatutor`
--

CREATE TABLE `kelolatutor` (
  `id_tutor` int(11) NOT NULL,
  `kode_tutor` varchar(20) NOT NULL,
  `nama_tutor` varchar(30) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelolatutor`
--

INSERT INTO `kelolatutor` (`id_tutor`, `kode_tutor`, `nama_tutor`, `nama_unit`, `catatan`) VALUES
(17, 'KML', 'KAMIL', 'MASTRIP', 'EVALUASI 1 DAN 2'),
(18, 'YLA', 'YULIA', 'MASTRIP', 'EVALUASI 3 DAN 4'),
(19, 'SLS', 'SALSA', 'MASTRIP', 'EVAL MTK'),
(20, 'CSM', 'COSIMA', 'KETAPANG', 'EVAL BIG'),
(21, 'ADL', 'ADELLA', 'CITARUM', 'EVAL IPA'),
(22, 'LTF', 'LATIFA', 'DRINGU', 'EVAL 1VIDEO'),
(23, 'ALB', 'ALBARA', 'A.YANI', 'EVAL 5 DAN 6'),
(24, 'DS', 'DESI', 'SUMBER WETAN', 'EVAL IPA KELAS 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krpp`
--

CREATE TABLE `krpp` (
  `id_krpp` int(11) NOT NULL,
  `id_thn_ajaran` int(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kode_matapelajaran` varchar(10) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krpp`
--

INSERT INTO `krpp` (`id_krpp`, `id_thn_ajaran`, `nis`, `kode_matapelajaran`, `nilai`) VALUES
(52, 11, '1101', 'PKN5', ''),
(54, 11, '1101', 'BIN4', ''),
(56, 11, '1101', 'BIN4', '100'),
(57, 11, '1101', 'SBDP3', ''),
(60, 11, '1101', 'MTK6', ''),
(61, 11, '1102', 'IPS7', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `kode_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(256) NOT NULL,
  `jumlah_jam` varchar(10) NOT NULL,
  `nama_tutor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matapelajaran`
--

INSERT INTO `matapelajaran` (`kode_matapelajaran`, `nama_matapelajaran`, `jumlah_jam`, `nama_tutor`) VALUES
('MTK2', 'MATEMATIKA KLS 2', '3', 'KAMIL'),
('BG7', 'BAHASA INGGRIS KLS 7', '4', 'SALSA'),
('SBDP3', 'SENI BUDAYA DAN RUPA KLS 3', '5', 'COSIMA'),
('PKN5', 'PENDIDIKAN KEWARGANEGARAN KLS 5', '3', 'ADELLA'),
('BIN4', 'BAHASA INDO KLS 4', '6', 'LATIFA'),
('MTK6', 'MATEMATIKA KLS 6', '4', 'ALBARA'),
('MTK9', 'MATEMATIKA KLS 9', '3', 'ALBARA'),
('IPS7', 'ILMU PENGETAHUAN SOSIAL KLS 7', '4', 'DESI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nama_tutor` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama_tutor`, `tgl_pinjam`, `catatan`) VALUES
(5, 'KAMIL', '2024-05-24', '1 BUKU BACA'),
(6, 'NABILA', '2024-05-31', 'pinjam buku prisma'),
(8, 'SALSA', '2024-05-01', 'pinjam 2 buku bahasa inggris'),
(9, 'YULIA', '2024-03-13', 'pinjam 3 buku english brainly'),
(10, 'NABILA', '2024-01-17', 'pinjam 2 matematika'),
(11, 'YULIA', '2024-05-19', 'pinjam buku ips kelas 2'),
(12, 'SALSABILA', '2024-04-30', 'buku perpus 1'),
(13, 'KAMIL', '2024-04-29', '2 buku ipas kelas 5 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `jam_msk` time NOT NULL,
  `jam_klr` time NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `nama_siswa`, `nama_unit`, `tgl`, `jam_msk`, `jam_klr`, `ket`) VALUES
(32, 'IKE', 'CITARUM', '2024-06-01', '17:00:00', '19:00:00', 'Ijin'),
(33, 'PUTRI', 'MASTRIP', '2024-05-31', '18:00:00', '18:10:00', 'Ijin'),
(34, 'NISA', 'CITARUM', '2024-06-02', '18:00:00', '18:30:00', 'Sakit'),
(35, 'INAYA', 'MASTRIP', '2024-05-29', '19:00:00', '19:00:00', 'Alpha'),
(36, 'IKE', 'CITARUM', '2024-06-12', '19:00:00', '20:00:00', 'Hadir'),
(37, 'YUSRA', 'SUMBER WETAN', '2024-05-29', '16:00:00', '17:00:00', 'Ijin'),
(38, 'RENDI', 'SUMBER WETAN', '2024-05-27', '16:30:00', '17:00:00', 'Hadir'),
(39, 'RAINA', 'A.YANI', '2024-06-06', '17:00:00', '17:30:00', 'Sakit'),
(40, 'RENA', 'CITARUM', '2024-05-28', '19:00:00', '20:00:00', 'Hadir'),
(41, 'RENA', 'CITARUM', '2024-06-20', '13:00:00', '14:00:00', 'Ijin'),
(42, 'RENA', 'CITARUM', '2024-06-20', '13:00:00', '14:00:00', 'Ijin'),
(43, 'RENDI', 'SUMBER WETAN', '2024-06-02', '14:00:00', '16:00:00', 'Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` int(10) NOT NULL,
  `jenis_kelamin` varchar(120) NOT NULL,
  `program` varchar(120) NOT NULL,
  `nama_unit` varchar(120) NOT NULL,
  `nama_tutor` varchar(120) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `alamat`, `kelas`, `jenis_kelamin`, `program`, `nama_unit`, `nama_tutor`, `foto`) VALUES
(7, '1101', 'CLARA', 'Jl.Mastrip', 3, 'Laki-Laki', 'MAPEL', 'MASTRIP', 'KAMIL', 'WhatsApp_Image_2024-05-09_at_08_13_26_(1).jpeg'),
(11, '1103', 'PUTRI', 'JL.KEDUPOK', 3, 'Laki-Laki', 'MAPEL', 'MASTRIP', 'KAMIL', 'WhatsApp_Image_2024-05-09_at_08_13_25_(1).jpeg'),
(15, '1102', 'NISA', 'JL.SAVIRA', 2, 'Laki-Laki', 'SMBP', 'CITARUM', 'KAMIL', 'WhatsApp_Image_2024-05-16_at_12_55_191.jpeg'),
(16, '1104', 'INAYA', 'JL.BESUKI', 3, 'Perempuan', 'MAPEL', 'MASTRIP', 'ALBARA', '1.jpeg'),
(17, '1105', 'IKE', 'JL.IKAN KERAPU', 4, 'Perempuan', 'BAHASA INGGRIS', 'CITARUM', 'ADELLA', '2.jpeg'),
(18, '1106', 'YUSRA', 'JL.MERAPI', 6, 'Perempuan', 'MATEMATIKA', 'SUMBER WETAN', 'COSIMA', '3.jpeg'),
(19, '1107', 'RENA', 'JL.MERABU', 4, 'Perempuan', 'BAHASA INGGRIS', 'CITARUM', 'ALBARA', '4.jpeg'),
(20, '1108', 'RENDI', 'JL.BANDUNG', 7, 'Laki-Laki', 'AGAMA', 'SUMBER WETAN', 'SALSA', '5.jpeg'),
(21, '1109', 'RAINA', 'JL.WANDI', 1, 'Perempuan', 'MATEMATIKA', 'A.YANI', 'SALSA', '8.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_thn_ajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_thn_ajaran`, `tahun_ajaran`, `semester`) VALUES
(11, '2023/2024', 'Ganjil'),
(12, '2023/2024', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_savira`
--

CREATE TABLE `tentang_savira` (
  `id` int(11) NOT NULL,
  `pengertian` longtext NOT NULL,
  `visi` varchar(250) NOT NULL,
  `misi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang_savira`
--

INSERT INTO `tentang_savira` (`id`, `pengertian`, `visi`, `misi`) VALUES
(1, 'Lembaga bimbingan belajar merupakan salah satu lembaga pendidikan non-formal sebagai tempat pelayanan pendidikan siswa-siswi yang dilakukan di luar jam sekolah. Lembaga bimbingan belajar tentunya sangat memperhatikan kebutuhan dari siswa-siswi dalam belajar. Lembaga bimbingan belajar sendiri bertujuan untuk membantu kesulitan yang dihadapi siswa-siswi atau untuk pembelajaran tambahan yang disesuaikan dengan kebutuhan siswa-siswanya. Apalagi di zaman sekarang ini, dimana semua pembelajaran di alihkan ke pembelajaran daring (online) sehingga pemahaman materi pun berkurang.  Nah, di sini kami sebagai LBB Savira yaitu lembaga bimbingan privat (les privat) yang bergerak di bidang pendidikan menyediakan dan menerima Bimbingan Belajar mulai dari jenjang PAUD, TK, SD dan SMP. Di LBB Savira, tenaga pengajar kami tentunya sudah professional, pengajar menguasai materi dan telaten, terdapat laporan hasil belajar kepada orang tua, biaya terjangkau dan berkualitas', 'Menjadikan LBB SAVIRA sebagai bimbingan dan klinik belajar yang dapat mencetak Sumber Daya Insani yang Cerdas dan berkarakter positif, berprestasi guna kemajuan bangsa dan negara .', 'Berkarya dan berkhidmat pada kebaikan dan kemajuan dalam dunia pendidikan. Sebagai tempat pengembangan potensi peserta didik ataupun para tentor dan tenaga professional i’M SMART dalam rangka mencetak sumber daya insani yang cerdas dan matang. Turut ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `kode_unit` varchar(10) NOT NULL,
  `nama_unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `kode_unit`, `nama_unit`) VALUES
(17, 'MTP', 'MASTRIP'),
(18, 'CTM', 'CITARUM'),
(19, 'KTP', 'KETAPANG'),
(20, 'SBW', 'SUMBER WETAN'),
(21, 'AYN', 'A.YANI'),
(22, 'DRG', 'DRINGU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` enum('admin','walmur','pemilik','tutor') NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `id_session`) VALUES
(6, 'nabila', '652d3266220e0aacb047d3aa6f51f1b0', 'nabila@gmail.com', 'admin', ''),
(9, 'arik', 'b772852a7859d9e776b7f4254fe97d7e', 'arik12@gmail.com', 'walmur', 'd41d8cd98f00b204e9800998ecf8427e'),
(10, 'buwiwik', 'f0b8334ca0a546be1c213b4fe7bed816', 'pemilik34@gmail.com', 'pemilik', 'd41d8cd98f00b204e9800998ecf8427e'),
(13, 'kamil', '11d462a4a1b14b00580d8020d6f64998', 'kamil12@gmail.com', 'tutor', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `kelolatutor`
--
ALTER TABLE `kelolatutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- Indeks untuk tabel `krpp`
--
ALTER TABLE `krpp`
  ADD PRIMARY KEY (`id_krpp`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_thn_ajaran`);

--
-- Indeks untuk tabel `tentang_savira`
--
ALTER TABLE `tentang_savira`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelolatutor`
--
ALTER TABLE `kelolatutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `krpp`
--
ALTER TABLE `krpp`
  MODIFY `id_krpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_thn_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tentang_savira`
--
ALTER TABLE `tentang_savira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
