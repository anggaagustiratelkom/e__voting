-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Nov 2021 pada 19.03
-- Versi server: 10.2.40-MariaDB-cll-lve
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_calon`
--

CREATE TABLE `tb_calon` (
  `id_calon` varchar(2) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `foto_calon` varchar(200) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_calon`
--

INSERT INTO `tb_calon` (`id_calon`, `nama_calon`, `foto_calon`, `visi`, `misi`) VALUES
('01', 'YANUAR RIZKY HARJOYUDANTO', 'Foto Cakahim Humanistik 1.png', 'Mewujudkan Humanistik sebagai organisasi mahasiswa yang aktif, responsif dan profesional guna mengembangkan sinergitas civitas akademika Politeknik STIA LAN Bandung.', '1. Mampu Meningkatkan Solidaritas Dan Kebersamaan Mahasiswa Administrasi Bisnis Sektor Publik.\r\n2. Mampu Mengawal Dan Mengawasi Kebijakan Internal Dan Eksternal Yang Berkaitan Dengan Pengembangan Mahasiswa Administrasi Bisnis Sektor Publik.\r\n3. Membangun Relasi, Pengembangan Bakat Akademik Dan Non Akademik Mahasiswa Di Lingukngan Program Studi Administrasi Bisnis Sektor Publik.\r\n4. Mampu Membuat dan Melaksanakan Program HIMA Yang Bermanfaat Secara Luas.'),
('02', 'NURIFTAH FITRIYANI QOLBIAH', 'Foto Cakahim Humanistik 2.png', 'Mewujudkan himpunan yang solid, aktif dan inovatif sebagai suatu wadah aspirasi dari mahasiswa Prodi Administrasi Bisnis Sektor Publik Politeknik STIA LAN Bandung.', '1. Menciptakan lingkungan organisasi yang sehat.\r\n2. Mengoptimalkan solidaritas dan pengembangan diri anggota humanistik serta mahasiswa ABSP.\r\n3. Merangkul dan mewadahi saran serta gagasan mahasiswa ABSP.\r\n4. Meningkatkan kinerja humanistik sebagai organisasi yang kompeten dan unggul.');

-- --------------------------------------------------------

CREATE TABLE `tb_calondpm` (
  `id_calondpm` varchar(2) NOT NULL,
  `nama_calondpm` varchar(100) NOT NULL,
  `foto_calondpm` varchar(200) NOT NULL,
  `prodi` varchar(40) NOT NULL,
  `angkatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_calondpm`
--

INSERT INTO `tb_calondpm` (`id_calondpm`, `nama_calondpm`, `foto_calondpm`, `prodi`, `angkatan`) VALUES
('01', 'YANUAR RIZKY HARJOYUDANTO DPM', 'Foto Cakahim Humanistik 1.png', 'Administrasi Pembangunan Negara', '2019'),
('02', 'NURIFTAH FITRIYANI QOLBIAH DPM', 'Foto Cakahim Humanistik 2.png', 'Administrasi Bisnis Sektor Publik', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `npm` bigint(16) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nohp` bigint(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `prodi` varchar(40) NOT NULL,
  `kelas` varchar(40) NOT NULL,
  `jeniskelas` varchar(40) NOT NULL,
  `angkatan` varchar(40) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `level` enum('Administrator','Petugas','Pemilih') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `statusdpm` enum('1','0') NOT NULL,
  `jenis` enum('PAN','PST') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `npm`, `nama_pengguna`, `password`, `nohp`, `email`, `prodi`, `kelas`,`angkatan`, `jeniskelas`, `date`, `level`, `status`, `statusdpm`, `jenis`) VALUES
(1, 17081945, 'Tim KPUM Politeknik STIA LAN Bandung', 'timkpum2021', 8888888888, 'kpumpoliteknikstialanbdg@gmail.com', '', '', '', '', '2021-02-20 12:47:17', 'Administrator', '0', '0', 'PAN'),
(2, 1301174308, 'dangga', 'angga010899', 8888888888, 'kpumpolitekanbdg@gmail.com', 'Administrasi Pembangunan Negara', '', '2019', '', '2021-02-20 12:47:17', 'Pemilih', '1', '1', 'PST'),
(3, 1301174309, 'Angga', 'angga010899', 8888888888, 'eknikstialanbdg@gmail.com', 'Administrasi Bisnis Sektor Publik', '', '2020', '', '2021-02-20 12:47:17', 'Pemilih', '1', '1', 'PST');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(11) NOT NULL,
  `id_calon` varchar(2) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_vote`
--

-- INSERT INTO `tb_vote` (`id_vote`, `id_calon`, `id_pemilih`, `date`) VALUES
-- (1481, '01', 1246, '2021-05-24 09:02:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_votedpm`
--

CREATE TABLE `tb_votedpm` (
  `id_votedpm` int(11) NOT NULL,
  `id_calondpm` varchar(2) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_votedpm`
--

-- INSERT INTO `tb_votedpm` (`id_votedpm`, `id_calondpm`, `id_pemilih`, `date`) VALUES
-- (1481, '01', 1246, '2021-05-24 09:02:41');


--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_calon`
--
ALTER TABLE `tb_calon`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indeks untuk tabel `tb_calondpm`
--
ALTER TABLE `tb_calondpm`
  ADD PRIMARY KEY (`id_calondpm`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_calon` (`id_calon`);

--
-- Indeks untuk tabel `tb_votedpm`
--
ALTER TABLE `tb_votedpm`
  ADD PRIMARY KEY (`id_votedpm`),
  ADD KEY `id_calon` (`id_calondpm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT untuk tabel `tb_votedpm`
--
ALTER TABLE `tb_votedpm`
  MODIFY `id_votedpm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD CONSTRAINT `tb_vote_ibfk_1` FOREIGN KEY (`id_calon`) REFERENCES `tb_calon` (`id_calon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_votedpm`
--
ALTER TABLE `tb_votedpm`
  ADD CONSTRAINT `tb_vote_ibfk_2` FOREIGN KEY (`id_calondpm`) REFERENCES `tb_calondpm` (`id_calondpm`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
