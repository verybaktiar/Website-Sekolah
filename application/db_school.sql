-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2024 pada 06.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id`, `photo`) VALUES
(5, 'dc3c6237115ce2e3050ee1b1e79429fb.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `title`, `text`, `photo`) VALUES
(1, 'Belajar tidak akan pernah membuat lelah', '\"Pendidikan adalah bekal terbaik untuk perjalanan hidup.\" ', '261feb1a6d3dd22b7ce8e65a52b6aeb5.jpg'),
(2, 'Menuntut Ilmu Sedalam Mungkin', '\"Belajar memang melelahkan, namun akan lebih melelahkan lagi jika saat ini kamu tidak belajar.\"', 'e9f0e154d0e7bc5ba126983c8265b005.jpg'),
(3, 'Terus Maju', ' \"Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu.\"', '2fe30f923448bd85d4401210f5620694.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bg_majors`
--

CREATE TABLE `bg_majors` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bg_majors`
--

INSERT INTO `bg_majors` (`id`, `photo`) VALUES
(1, 'b33cf167c20cef419c93c4b9ee494b0a.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `photo`) VALUES
(3, 'Ruang Belajar', 'lab-komputer-20220825185508.jpg'),
(4, 'Perpustakaan', 'perpustakaan-20220825190131.png'),
(5, 'UKS', 'kantin-20240505153251.jpg'),
(6, 'Lapangan', 'lapangan-20220825190202.png'),
(9, 'Musholla', 'musholla-20200430120051.jpg'),
(11, 'Ruang Kantor', 'ruang-kantor-20240505153353.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `daftar_pelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jabatan`, `daftar_pelajaran`) VALUES
(1, 'ER', 'wali kelas XIII', 'b.INDO'),
(2, 'Dika S.pd', 'wali kelas XIII', 'Bahasa Arab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identity`
--

CREATE TABLE `identity` (
  `id` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identity`
--

INSERT INTO `identity` (`id`, `meta_title`, `meta_description`, `meta_keyword`, `photo`) VALUES
(1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus.', 'Madrasah Ibtidaiyah AL MUHAJIRIN', '18efe02e7fcc5c6a4ee8c619e501a7d9.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `hari` varchar(45) DEFAULT NULL,
  `matapelajaran` varchar(45) DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_pelajaran`, `hari`, `matapelajaran`, `kelas`) VALUES
(10, 'Senin', '1. BHS.INDONESIA\n2. BHS.INGGRIS\n3. BHS.ARAB\n', '5C'),
(12, 'Selasa', '1. B.indo\n2. B.ingris\n3. Agama\n', '6A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Pengaturan Web', '', 'fas fa-fw fa-cog', 'Y'),
(2, 2, 'Agenda', 'jadwal', 'fas fa-fw fa-users', 'Y'),
(3, 2, 'Manajemen Media', '', 'fas fa-fw fa-school', 'Y'),
(4, 2, 'Struktur Organisasi', 'struktur', 'fas fa-fw fa-sitemap', 'Y'),
(5, 1, 'Manajemen User', 'user', 'fas fa-fw fa-user', 'Y'),
(6, 2, 'Profile', '', 'fas fa-fw fa-home', 'Y'),
(7, 2, 'Progres', 'progres', 'fas fa-clipboard-list', 'Y'),
(8, 2, 'Prestasi Guru', 'prestasiguru', '	fas fa-user-tie', 'Y'),
(9, 4, 'Prestasi Siswa', 'prestasisiswanon\r\n', 'fas fa-user-graduate', 'Y'),
(10, 5, 'Jadwal Pelajaran', 'jadwalpelajaran', '	fas fa-calendar-day', 'Y'),
(11, 6, 'Siswa', 'siswa', '	fas fa-users', 'Y'),
(12, 7, 'Data Guru', 'guru', '	fas fa-chalkboard-teacher', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opening`
--

CREATE TABLE `opening` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `opening`
--

INSERT INTO `opening` (`id`, `content`, `photo`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel.', '92d81dcc1fc0dceb8b582fc271d48a76.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `seo_title`, `content`, `photo`, `is_active`, `date`) VALUES
(2, 'Sosialiasi Jasa Raharja', 'sosialiasi-jasa-raharja', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel. Nunc feugiat arcu vel urna lobortis mollis. Ut arcu augue, ullamcorper ut magna a, elementum aliquam nunc. Pellentesque sapien nibh, suscipit volutpat sem ut, vulputate efficitur arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean aliquet sagittis congue. Maecenas felis sem, interdum vel consectetur quis, vulputate in augue.</p>\r\n\r\n<p>Vestibulum massa dolor, sollicitudin eget nulla iaculis, tincidunt luctus lacus. Suspendisse nisi ligula, imperdiet eget tempor et, faucibus et orci. Pellentesque semper viverra metus, eget fermentum felis ornare at. In semper lacinia elit, eget consequat dolor blandit vitae. Aliquam erat volutpat. Aliquam et dictum erat. Etiam purus ipsum, convallis sit amet lorem eget, iaculis rhoncus arcu. Aliquam id fringilla magna, a euismod justo. Nam non urna feugiat ligula finibus blandit. Cras libero sapien, bibendum facilisis justo id, ultricies ullamcorper nisi.</p>\r\n\r\n<p>Maecenas condimentum aliquet pulvinar. Suspendisse quis malesuada nulla, eget eleifend tellus. Suspendisse pharetra enim in ante fermentum consectetur. Vivamus viverra, felis vitae condimentum tempus, libero ex consectetur dui, vel interdum nibh turpis in lectus. Suspendisse potenti. Nam sagittis, ligula id tempor tristique, enim eros facilisis purus, vitae elementum risus lectus sit amet ipsum. In nec sollicitudin massa, ut cursus purus. Proin eu tempor magna, non vestibulum diam.</p>', '-20220825184450.jpg', 'Y', '2022-08-25'),
(3, 'Upacara Memeringati Hari Pramuka', 'upacara-memeringati-hari-pramuka', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel. Nunc feugiat arcu vel urna lobortis mollis. Ut arcu augue, ullamcorper ut magna a, elementum aliquam nunc. Pellentesque sapien nibh, suscipit volutpat sem ut, vulputate efficitur arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean aliquet sagittis congue. Maecenas felis sem, interdum vel consectetur quis, vulputate in augue.</p>\r\n\r\n<p>Vestibulum massa dolor, sollicitudin eget nulla iaculis, tincidunt luctus lacus. Suspendisse nisi ligula, imperdiet eget tempor et, faucibus et orci. Pellentesque semper viverra metus, eget fermentum felis ornare at. In semper lacinia elit, eget consequat dolor blandit vitae. Aliquam erat volutpat. Aliquam et dictum erat. Etiam purus ipsum, convallis sit amet lorem eget, iaculis rhoncus arcu. Aliquam id fringilla magna, a euismod justo. Nam non urna feugiat ligula finibus blandit. Cras libero sapien, bibendum facilisis justo id, ultricies ullamcorper nisi.</p>\r\n\r\n<p>Maecenas condimentum aliquet pulvinar. Suspendisse quis malesuada nulla, eget eleifend tellus. Suspendisse pharetra enim in ante fermentum consectetur. Vivamus viverra, felis vitae condimentum tempus, libero ex consectetur dui, vel interdum nibh turpis in lectus. Suspendisse potenti. Nam sagittis, ligula id tempor tristique, enim eros facilisis purus, vitae elementum risus lectus sit amet ipsum. In nec sollicitudin massa, ut cursus purus. Proin eu tempor magna, non vestibulum diam.</p>', '-20220825184340.jpg', 'Y', '2022-08-25'),
(4, 'Bimbingan Teknis Implementasi Kurikulum Merdeka', 'bimbingan-teknis-implementasi-kurikulum-merdeka', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel. Nunc feugiat arcu vel urna lobortis mollis. Ut arcu augue, ullamcorper ut magna a, elementum aliquam nunc. Pellentesque sapien nibh, suscipit volutpat sem ut, vulputate efficitur arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean aliquet sagittis congue. Maecenas felis sem, interdum vel consectetur quis, vulputate in augue.</p>\r\n\r\n<p>Vestibulum massa dolor, sollicitudin eget nulla iaculis, tincidunt luctus lacus. Suspendisse nisi ligula, imperdiet eget tempor et, faucibus et orci. Pellentesque semper viverra metus, eget fermentum felis ornare at. In semper lacinia elit, eget consequat dolor blandit vitae. Aliquam erat volutpat. Aliquam et dictum erat. Etiam purus ipsum, convallis sit amet lorem eget, iaculis rhoncus arcu. Aliquam id fringilla magna, a euismod justo. Nam non urna feugiat ligula finibus blandit. Cras libero sapien, bibendum facilisis justo id, ultricies ullamcorper nisi.</p>\r\n\r\n<p>Maecenas condimentum aliquet pulvinar. Suspendisse quis malesuada nulla, eget eleifend tellus. Suspendisse pharetra enim in ante fermentum consectetur. Vivamus viverra, felis vitae condimentum tempus, libero ex consectetur dui, vel interdum nibh turpis in lectus. Suspendisse potenti. Nam sagittis, ligula id tempor tristique, enim eros facilisis purus, vitae elementum risus lectus sit amet ipsum. In nec sollicitudin massa, ut cursus purus. Proin eu tempor magna, non vestibulum diam.</p>', '-20220825184137.jpg', 'Y', '2022-08-25'),
(5, 'Latihan Dasar Kepemimpinan', 'latihan-dasar-kepemimpinan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel. Nunc feugiat arcu vel urna lobortis mollis. Ut arcu augue, ullamcorper ut magna a, elementum aliquam nunc. Pellentesque sapien nibh, suscipit volutpat sem ut, vulputate efficitur arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean aliquet sagittis congue. Maecenas felis sem, interdum vel consectetur quis, vulputate in augue.</p>\r\n\r\n<p>Vestibulum massa dolor, sollicitudin eget nulla iaculis, tincidunt luctus lacus. Suspendisse nisi ligula, imperdiet eget tempor et, faucibus et orci. Pellentesque semper viverra metus, eget fermentum felis ornare at. In semper lacinia elit, eget consequat dolor blandit vitae. Aliquam erat volutpat. Aliquam et dictum erat. Etiam purus ipsum, convallis sit amet lorem eget, iaculis rhoncus arcu. Aliquam id fringilla magna, a euismod justo. Nam non urna feugiat ligula finibus blandit. Cras libero sapien, bibendum facilisis justo id, ultricies ullamcorper nisi.</p>\r\n\r\n<p>Maecenas condimentum aliquet pulvinar. Suspendisse quis malesuada nulla, eget eleifend tellus. Suspendisse pharetra enim in ante fermentum consectetur. Vivamus viverra, felis vitae condimentum tempus, libero ex consectetur dui, vel interdum nibh turpis in lectus. Suspendisse potenti. Nam sagittis, ligula id tempor tristique, enim eros facilisis purus, vitae elementum risus lectus sit amet ipsum. In nec sollicitudin massa, ut cursus purus. Proin eu tempor magna, non vestibulum diam.</p>', '-20220825184811.jpg', 'Y', '2022-08-25'),
(6, 'Upacara Memeringati Hari Kemerdekaan', 'upacara-memeringati-hari-kemerdekaan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel. Nunc feugiat arcu vel urna lobortis mollis. Ut arcu augue, ullamcorper ut magna a, elementum aliquam nunc. Pellentesque sapien nibh, suscipit volutpat sem ut, vulputate efficitur arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean aliquet sagittis congue. Maecenas felis sem, interdum vel consectetur quis, vulputate in augue.</p>\r\n\r\n<p>Vestibulum massa dolor, sollicitudin eget nulla iaculis, tincidunt luctus lacus. Suspendisse nisi ligula, imperdiet eget tempor et, faucibus et orci. Pellentesque semper viverra metus, eget fermentum felis ornare at. In semper lacinia elit, eget consequat dolor blandit vitae. Aliquam erat volutpat. Aliquam et dictum erat. Etiam purus ipsum, convallis sit amet lorem eget, iaculis rhoncus arcu. Aliquam id fringilla magna, a euismod justo. Nam non urna feugiat ligula finibus blandit. Cras libero sapien, bibendum facilisis justo id, ultricies ullamcorper nisi.</p>\r\n\r\n<p>Maecenas condimentum aliquet pulvinar. Suspendisse quis malesuada nulla, eget eleifend tellus. Suspendisse pharetra enim in ante fermentum consectetur. Vivamus viverra, felis vitae condimentum tempus, libero ex consectetur dui, vel interdum nibh turpis in lectus. Suspendisse potenti. Nam sagittis, ligula id tempor tristique, enim eros facilisis purus, vitae elementum risus lectus sit amet ipsum. In nec sollicitudin massa, ut cursus purus. Proin eu tempor magna, non vestibulum diam.</p>', '-20220825184721.jpg', 'Y', '2022-08-25'),
(7, 'Upacara Ulang Janji Pramuka', 'upacara-ulang-janji-pramuka', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel. Nunc feugiat arcu vel urna lobortis mollis. Ut arcu augue, ullamcorper ut magna a, elementum aliquam nunc. Pellentesque sapien nibh, suscipit volutpat sem ut, vulputate efficitur arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean aliquet sagittis congue. Maecenas felis sem, interdum vel consectetur quis, vulputate in augue.</p>\r\n\r\n<p>Vestibulum massa dolor, sollicitudin eget nulla iaculis, tincidunt luctus lacus. Suspendisse nisi ligula, imperdiet eget tempor et, faucibus et orci. Pellentesque semper viverra metus, eget fermentum felis ornare at. In semper lacinia elit, eget consequat dolor blandit vitae. Aliquam erat volutpat. Aliquam et dictum erat. Etiam purus ipsum, convallis sit amet lorem eget, iaculis rhoncus arcu. Aliquam id fringilla magna, a euismod justo. Nam non urna feugiat ligula finibus blandit. Cras libero sapien, bibendum facilisis justo id, ultricies ullamcorper nisi.</p>\r\n\r\n<p>Maecenas condimentum aliquet pulvinar. Suspendisse quis malesuada nulla, eget eleifend tellus. Suspendisse pharetra enim in ante fermentum consectetur. Vivamus viverra, felis vitae condimentum tempus, libero ex consectetur dui, vel interdum nibh turpis in lectus. Suspendisse potenti. Nam sagittis, ligula id tempor tristique, enim eros facilisis purus, vitae elementum risus lectus sit amet ipsum. In nec sollicitudin massa, ut cursus purus. Proin eu tempor magna, non vestibulum diam.</p>', '-20220825183746.jpg', 'Y', '2022-08-25'),
(8, 'Bakti Sosial Peserta Didik ', 'bakti-sosial-peserta-didik', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed nisl ut metus molestie dignissim eu vitae nisi. Phasellus molestie ut quam eu accumsan. Mauris sit amet orci a ante suscipit pharetra. Integer sodales, augue vel volutpat faucibus, nunc lectus feugiat mi, in vestibulum ex arcu commodo purus. Donec in sagittis enim, ac dignissim neque. Aenean nec quam a enim volutpat tempus. Cras eget ex lacus. Mauris non dolor laoreet, efficitur ligula eget, suscipit ipsum. Praesent porttitor sollicitudin magna maximus pharetra. Nullam pretium vestibulum augue, sed viverra velit gravida vel. Nunc feugiat arcu vel urna lobortis mollis. Ut arcu augue, ullamcorper ut magna a, elementum aliquam nunc. Pellentesque sapien nibh, suscipit volutpat sem ut, vulputate efficitur arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean aliquet sagittis congue. Maecenas felis sem, interdum vel consectetur quis, vulputate in augue.</p>\r\n\r\n<p>Vestibulum massa dolor, sollicitudin eget nulla iaculis, tincidunt luctus lacus. Suspendisse nisi ligula, imperdiet eget tempor et, faucibus et orci. Pellentesque semper viverra metus, eget fermentum felis ornare at. In semper lacinia elit, eget consequat dolor blandit vitae. Aliquam erat volutpat. Aliquam et dictum erat. Etiam purus ipsum, convallis sit amet lorem eget, iaculis rhoncus arcu. Aliquam id fringilla magna, a euismod justo. Nam non urna feugiat ligula finibus blandit. Cras libero sapien, bibendum facilisis justo id, ultricies ullamcorper nisi.</p>\r\n\r\n<p>Maecenas condimentum aliquet pulvinar. Suspendisse quis malesuada nulla, eget eleifend tellus. Suspendisse pharetra enim in ante fermentum consectetur. Vivamus viverra, felis vitae condimentum tempus, libero ex consectetur dui, vel interdum nibh turpis in lectus. Suspendisse potenti. Nam sagittis, ligula id tempor tristique, enim eros facilisis purus, vitae elementum risus lectus sit amet ipsum. In nec sollicitudin massa, ut cursus purus. Proin eu tempor magna, non vestibulum diam.</p>', '-20220825183547.jpg', 'Y', '2022-08-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasiguru`
--

CREATE TABLE `prestasiguru` (
  `id_guru` int(11) NOT NULL,
  `namaguru` varchar(500) NOT NULL,
  `bidangkegiatan` varchar(500) NOT NULL,
  `namakegiatan` varchar(500) NOT NULL,
  `tingkatkegiatan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(500) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasiguru`
--

INSERT INTO `prestasiguru` (`id_guru`, `namaguru`, `bidangkegiatan`, `namakegiatan`, `tingkatkegiatan`, `tanggal`, `penyelenggara`, `keterangan`) VALUES
(1, 'Saeful Anuar, S.Pd.I', 'asfda', 'STQ ke XIII', 'Kampung Bungaraya ', '2024-04-30', 'rtyr', 'Hari Pancasila');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasisiswanon`
--

CREATE TABLE `prestasisiswanon` (
  `id_siswa` int(11) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `bidanglomba` varchar(100) NOT NULL,
  `namalomba` varchar(100) NOT NULL,
  `tingkatlomba` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `peringkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasisiswanon`
--

INSERT INTO `prestasisiswanon` (`id_siswa`, `namasiswa`, `bidanglomba`, `namalomba`, `tingkatlomba`, `tanggal`, `penyelenggara`, `peringkat`) VALUES
(1, 'yhdh', 'dfhdfh', 'dfhhdfh', 'dfhdf', '2024-05-05', 'dfhdfh', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasisiswa_akademik`
--

CREATE TABLE `prestasisiswa_akademik` (
  `id_siswa` int(11) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `bidanglomba` varchar(100) NOT NULL,
  `namalomba` varchar(100) NOT NULL,
  `tigkatlomba` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `peringkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `progres`
--

CREATE TABLE `progres` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `progres_hafalan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progres`
--

INSERT INTO `progres` (`id`, `nama_siswa`, `kelas`, `progres_hafalan`) VALUES
(1, 'DIKA', '8', 'Surat AL-FALA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(45) DEFAULT NULL,
  `kelas` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `kelas`) VALUES
(6, 'Dika', '1A'),
(7, 'Dika', '1C'),
(8, 'Dika', '1C'),
(9, 'Saputra', '1C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `structure`
--

INSERT INTO `structure` (`id`, `photo`) VALUES
(1, '48d1f9966ce4ff1a793d5d052e2651ce.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenus`
--

CREATE TABLE `submenus` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `sub_url` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `sub_title`, `sub_url`, `is_active`) VALUES
(1, 1, 'Identitas Web', 'identitas', 'Y'),
(2, 1, 'Sambutan', 'sambutan', 'Y'),
(3, 3, 'Banner', 'banner', 'Y'),
(4, 3, 'Fasilitas', 'fasilitas', 'Y'),
(5, 3, 'Berita', 'berita', 'Y'),
(6, 3, 'Background Jurusan', 'background', 'Y'),
(7, 9, 'Prestasi Siswa Non', 'prestasisiswanon', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$pfe4X24wUalRwJseC96pLOh2FshRtmYVNRhS8eLTKCSv9KVXRWxBy', 'admin@mail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1715741843, 1, 'Abid', 'Taufiqur R.', NULL, '081222332442');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(38, 1, 1),
(39, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bg_majors`
--
ALTER TABLE `bg_majors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`),
  ADD UNIQUE KEY `id_pelajaran_UNIQUE` (`id_pelajaran`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opening`
--
ALTER TABLE `opening`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasiguru`
--
ALTER TABLE `prestasiguru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `prestasisiswanon`
--
ALTER TABLE `prestasisiswanon`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `prestasisiswa_akademik`
--
ALTER TABLE `prestasisiswa_akademik`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `progres`
--
ALTER TABLE `progres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `id_siswa_UNIQUE` (`id_siswa`);

--
-- Indeks untuk tabel `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bg_majors`
--
ALTER TABLE `bg_majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `identity`
--
ALTER TABLE `identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `opening`
--
ALTER TABLE `opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `prestasiguru`
--
ALTER TABLE `prestasiguru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prestasisiswanon`
--
ALTER TABLE `prestasisiswanon`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prestasisiswa_akademik`
--
ALTER TABLE `prestasisiswa_akademik`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `progres`
--
ALTER TABLE `progres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
