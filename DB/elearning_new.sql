-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2024 pada 11.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nip_admin` varchar(30) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `alamat_admin` text NOT NULL,
  `jk_admin` enum('Laki-Laki','Perempuan') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nip_admin`, `nama_admin`, `alamat_admin`, `jk_admin`, `id_user`) VALUES
(6, '201198', 'Muhammad Gilang Pratama', 'Yogyakarta', 'Laki-Laki', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_course`
--

CREATE TABLE `tb_course` (
  `id_course` int(11) NOT NULL,
  `nama_course` varchar(50) NOT NULL,
  `enrolment_key` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_course`
--

INSERT INTO `tb_course` (`id_course`, `nama_course`, `enrolment_key`, `id_guru`, `id_mapel`) VALUES
(5, 'Fisika IX A', 'MTIzNDU2Nzg=', 6, 2),
(6, 'Fisika VIII A', 'MTIzNDU2Nzg=', 6, 2),
(8, 'Biologi VII A', 'MTIzNDU2Nzg=', 6, 3),
(9, 'Matematika 1', 'MTIzNDU2Nzg=', 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_course`
--

CREATE TABLE `tb_detail_course` (
  `id_detail_course` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_pelajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_course`
--

INSERT INTO `tb_detail_course` (`id_detail_course`, `id_course`, `id_pelajar`) VALUES
(19, 5, 4),
(20, 5, 5),
(21, 9, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_materi`
--

CREATE TABLE `tb_detail_materi` (
  `id_detail_materi` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_materi`
--

INSERT INTO `tb_detail_materi` (`id_detail_materi`, `id_materi`, `file`) VALUES
(20, 29, '2024-01-10_08-34-49_29_Literature Review Springer.pdf'),
(21, 29, '2024-01-10_08-39-08_29_484026_EEG Signal Analysis In Detecting Pornography Addiction SLR.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_tugas`
--

CREATE TABLE `tb_detail_tugas` (
  `id_detail_tugas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_pelajar` int(11) NOT NULL,
  `dokumen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_tugas`
--

INSERT INTO `tb_detail_tugas` (`id_detail_tugas`, `id_tugas`, `id_pelajar`, `dokumen`) VALUES
(19, 38, 4, '2024-01-10_02-55-00_4_Weather Forecasting using Artificial Neural Network to Improve Aviation Safety in Indonesia.doc'),
(20, 39, 4, '2024-01-17_06-21-49_4_DAH LENGKAP INI CEK TURNITIN.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_guru` varchar(25) NOT NULL,
  `alamat_guru` varchar(255) NOT NULL,
  `jenis_kelamin_guru` enum('Laki-Laki','Perempuan') NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `alamat_guru`, `jenis_kelamin_guru`, `id_user`) VALUES
(6, '2022 1228 198719 2 008', 'Idawati Pasama', 'Jayapura', 'Perempuan', 5),
(9, '198512072011042001', 'Elly Dora BR. Ginting', 'Mararena', 'Perempuan', NULL),
(10, '198004252005012012', 'Alexia Lefteuw', 'Kelapa Dua', 'Laki-Laki', NULL),
(11, '198010012009092001', 'Salomina Dabeduku', 'Kota Sarmi', 'Perempuan', NULL),
(12, '197403062015072001', 'Summi', 'Mararena', 'Perempuan', NULL),
(13, '2022 1228 198719 2 00711', 'Mommy', 'Jayapura', 'Perempuan', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'VII-A'),
(2, 'VII-B'),
(3, 'VII-C'),
(4, 'VII-D'),
(5, 'VII-E'),
(6, 'VII-F'),
(7, 'VII-G'),
(8, 'VIII-A'),
(9, 'VIII-B'),
(10, 'VIII-C'),
(11, 'VIII-D'),
(12, 'VIII-E'),
(13, 'VIII-F'),
(14, 'VIII-G'),
(15, 'IX-A'),
(16, 'IX-B'),
(17, 'IX-C'),
(18, 'IX-D'),
(19, 'IX-E'),
(20, 'IX-F'),
(21, 'IX-G');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Matematika'),
(2, 'Fisika'),
(3, 'Biologi'),
(4, 'Pendidikan Kewarganegaraan'),
(5, 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `isi_materi` text NOT NULL,
  `tanggal_upload_materi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_course`, `judul_materi`, `isi_materi`, `tanggal_upload_materi`) VALUES
(29, 5, 'Fluida Statis', 'Fluida', '2024-01-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_pelajar` int(11) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_tugas`, `id_pelajar`, `nilai`) VALUES
(4, 38, 4, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelajar`
--

CREATE TABLE `tb_pelajar` (
  `id_pelajar` int(11) NOT NULL,
  `nis` bigint(20) NOT NULL,
  `nama_pelajar` varchar(100) NOT NULL,
  `alamat_pelajar` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelajar`
--

INSERT INTO `tb_pelajar` (`id_pelajar`, `nis`, `nama_pelajar`, `alamat_pelajar`, `jenis_kelamin`, `tgl_lahir`, `id_kelas`, `id_user`) VALUES
(4, 20162011, 'Resthu Jaya Momole', 'Springerfield', 'Laki-Laki', '2000-10-10', 15, 4),
(5, 106138887, 'Eka Fitri Mambrasar', 'Sarmi', 'Perempuan', '2010-01-12', 15, 6),
(10, 112032058, 'Martho Alfian Raunsay', 'Mararena', 'Laki-Laki', '2011-02-21', 16, 13),
(11, 129270106, 'Sherly Grace Mince Numre', 'Kuma', 'Perempuan', '2012-09-28', 19, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int(11) NOT NULL,
  `judul_tugas` varchar(255) NOT NULL,
  `id_course` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `files` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `judul_tugas`, `id_course`, `deskripsi`, `tgl_mulai`, `tgl_akhir`, `files`) VALUES
(38, 'Fluida Statis 1', 5, 'Kerjakan buku paket halaman 80', '2024-01-05', '2024-01-12', '2024-01-10_11-02-37_38_FUAS PERVASIVE COMPUTING.docx'),
(39, 'Pemfaktoran 2', 9, 'Kerjakan dan kumpulkan dalam format pdf', '2024-01-17', '2024-01-18', '2024-01-17_06-18-45_D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('Petugas','Kepala Sekolah','Guru','Pelajar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(3, 'mmgpratama', 'MTIzNDU2Nzg=', 'Petugas'),
(4, 'resthujm', 'MTIzNDU2Nzg=', 'Pelajar'),
(5, 'idawatipsm', 'MTIzNDU2Nzg=', 'Guru'),
(6, 'mambrasar', 'MTIzNDU2Nzg=', 'Pelajar'),
(7, 'elladora', 'MTIzNDU2Nzg=\r\n', 'Guru'),
(11, 'mommy99', 'MTIzNDU2Nzg=', 'Guru'),
(12, 'johndoe77', 'MTIzNDU2Nzg=', 'Pelajar'),
(13, 'martho99', 'MTIzNDU2Nzg=', 'Pelajar'),
(14, 'grace12', 'MTIzNDU2Nzg=', 'Pelajar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `nip` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `tb_detail_course`
--
ALTER TABLE `tb_detail_course`
  ADD PRIMARY KEY (`id_detail_course`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_pelajar` (`id_pelajar`);

--
-- Indeks untuk tabel `tb_detail_materi`
--
ALTER TABLE `tb_detail_materi`
  ADD PRIMARY KEY (`id_detail_materi`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indeks untuk tabel `tb_detail_tugas`
--
ALTER TABLE `tb_detail_tugas`
  ADD PRIMARY KEY (`id_detail_tugas`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `id_pelajar` (`id_pelajar`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_course` (`id_course`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `id_pelajar` (`id_pelajar`);

--
-- Indeks untuk tabel `tb_pelajar`
--
ALTER TABLE `tb_pelajar`
  ADD PRIMARY KEY (`id_pelajar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_course` (`id_course`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_course`
--
ALTER TABLE `tb_detail_course`
  MODIFY `id_detail_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_materi`
--
ALTER TABLE `tb_detail_materi`
  MODIFY `id_detail_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_tugas`
--
ALTER TABLE `tb_detail_tugas`
  MODIFY `id_detail_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pelajar`
--
ALTER TABLE `tb_pelajar`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_course`
--
ALTER TABLE `tb_course`
  ADD CONSTRAINT `tb_course_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_course_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_course`
--
ALTER TABLE `tb_detail_course`
  ADD CONSTRAINT `tb_detail_course_ibfk_1` FOREIGN KEY (`id_pelajar`) REFERENCES `tb_pelajar` (`id_pelajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_course_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_materi`
--
ALTER TABLE `tb_detail_materi`
  ADD CONSTRAINT `tb_detail_materi_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_tugas`
--
ALTER TABLE `tb_detail_tugas`
  ADD CONSTRAINT `tb_detail_tugas_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tb_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_tugas_ibfk_2` FOREIGN KEY (`id_pelajar`) REFERENCES `tb_pelajar` (`id_pelajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `tb_guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tb_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`id_pelajar`) REFERENCES `tb_pelajar` (`id_pelajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pelajar`
--
ALTER TABLE `tb_pelajar`
  ADD CONSTRAINT `tb_pelajar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pelajar_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
