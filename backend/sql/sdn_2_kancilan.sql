-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2026 at 03:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdn_2_kancilan`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `logo`, `banner`, `keterangan`, `alamat`) VALUES
(6, 'SDN 2 KANCILAN', '69ae4e71533f1_logo.png', '69948a694cc56_banner.png', 'SD Negeri 2 Kancilan merupakan salah satu sekolah dasar negeri yang berada di Desa Kancilan. Sekolah ini berperan penting dalam memberikan layanan pendidikan dasar bagi anak-anak di lingkungan sekitar.', 'desa kancilan'),
(7, 'SDN 2 KANCILAN', '69ae4e80c7199_logo.png', '69d224dc1b26b_banner.png', 'SD Negeri 2 Kancilan merupakan salah satu sekolah dasar negeri yang berada di Desa Kancilan. Sekolah ini berperan penting dalam memberikan layanan pendidikan dasar bagi anak-anak di lingkungan sekitar.', 'desa kancilan');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `nama`, `keterangan`, `tanggal`, `image`, `foto`) VALUES
(1, 'PESANTREN KILAT', 'Kancilan, 13 Maret 2026 – SDN 2 Kancilan melaksanakan kegiatan Pesantren Kilat yang diikuti oleh seluruh siswa pada hari Jumat (13/03/2026). Kegiatan ini merupakan bagian dari program sekolah dalam rangka membentuk karakter religius serta meningkatkan keimanan dan ketakwaan siswa sejak usia dini.\r\nKegiatan Pesantren Kilat ini dipimpin langsung oleh Kepala Sekolah, Sukin Pujiati, S.Pd.SD., M.Pd., serta didampingi oleh para guru. Dalam sambutannya, beliau menyampaikan bahwa kegiatan ini sangat penting untuk menanamkan nilai-nilai keagamaan kepada siswa agar dapat diterapkan dalam kehidupan sehari-hari.\r\nRangkaian kegiatan dimulai sejak pagi hari dengan pembacaan Asmaul Husna secara bersama-sama. Suasana khidmat dan penuh kekhusyukan terlihat ketika seluruh siswa melantunkan nama-nama Allah dengan penuh penghayatan.\r\nKegiatan kemudian dilanjutkan dengan membaca Juz Amma yang dibimbing oleh guru agama. Para siswa tampak antusias mengikuti kegiatan ini, sekaligus melatih kemampuan membaca Al-Qur’an dengan baik dan benar. Kegiatan ini juga bertujuan untuk menumbuhkan kecintaan siswa terhadap Al-Qur’an.\r\n\r\nSelanjutnya, seluruh siswa melaksanakan Sholat Dhuha secara berjamaah di lingkungan sekolah. Kegiatan ini menjadi salah satu bentuk pembiasaan ibadah yang diharapkan dapat terus dilakukan oleh siswa, baik di sekolah maupun di rumah.\r\nSelain kegiatan ibadah, siswa juga mendapatkan materi keagamaan mengenai puasa di bulan Ramadan. Dalam penyampaiannya, guru menjelaskan tentang pengertian puasa, syarat wajib, serta hal-hal yang dapat membatalkan puasa. Siswa juga diberikan pemahaman mengenai pentingnya menjaga sikap selama berpuasa.\r\nMateri disampaikan dengan cara yang menarik dan mudah dipahami oleh siswa, sehingga mereka tidak hanya memahami puasa sebagai menahan lapar dan haus, tetapi juga sebagai sarana melatih kesabaran dan meningkatkan keimanan.\r\nKhusus untuk siswa kelas 1, kegiatan diisi dengan pembelajaran kaligrafi. Selain melatih kreativitas, kegiatan ini juga menjadi pengenalan dasar tulisan Arab sejak dini.\r\nSelama kegiatan berlangsung, suasana kebersamaan dan kekeluargaan sangat terasa. Kepala sekolah berharap kegiatan ini dapat membentuk siswa yang disiplin, bertanggung jawab, dan berakhlak mulia.\r\nKegiatan berlangsung dengan lancar dan tertib. Diharapkan siswa menjadi generasi yang tidak hanya cerdas secara akademik, tetapi juga memiliki keimanan yang kuat serta kebiasaan baik dalam kehidupan sehari-hari.', '2026-03-13', '1775002766_image.jpg', '1775002766_foto.jpg'),
(3, 'BAGI-BAGI TAKJIL', 'Kancilan, 14 Maret 2026 – Dalam rangka menyemarakkan bulan suci Ramadhan, siswa bersama guru melaksanakan kegiatan berbagi takjil kepada masyarakat sekitar. Kegiatan ini dilaksanakan pada sore hari menjelang waktu berbuka puasa, dengan membagikan makanan dan minuman kepada para pengguna jalan, seperti pengendara motor, pejalan kaki, serta warga yang melintas di sekitar lingkungan sekolah. Kegiatan ini menjadi salah satu bentuk nyata kepedulian sosial sekaligus upaya menanamkan nilai-nilai kebaikan kepada siswa sejak dini.\r\nSebelum kegiatan dimulai, para siswa bersama guru terlebih dahulu melakukan persiapan dengan menyiapkan paket takjil yang akan dibagikan. Mereka bekerja sama dalam mengemas makanan dan minuman dengan rapi dan higienis. Suasana gotong royong terlihat sangat kental, di mana setiap siswa berperan aktif dalam proses persiapan. Hal ini tidak hanya melatih tanggung jawab, tetapi juga mempererat kebersamaan antar siswa.\r\nPada saat pelaksanaan, para siswa dengan penuh semangat turun langsung ke lokasi pembagian takjil. Mereka membagikan paket takjil kepada masyarakat dengan tertib dan sopan. Senyum dan sapaan hangat dari para siswa memberikan kesan positif bagi masyarakat yang menerima. Banyak di antara warga yang merasa senang dan terbantu dengan adanya kegiatan tersebut, terutama bagi mereka yang sedang dalam perjalanan menjelang waktu berbuka puasa.\r\nKegiatan berbagi takjil ini tidak hanya memberikan manfaat bagi masyarakat, tetapi juga menjadi sarana pembelajaran yang bermakna bagi siswa. Melalui kegiatan ini, siswa belajar untuk peduli terhadap sesama, memahami pentingnya berbagi, serta merasakan kebahagiaan dari memberi. Nilai-nilai seperti empati, keikhlasan, dan kebersamaan menjadi bagian penting yang ditanamkan dalam kegiatan ini.\r\n\r\nPara guru juga turut mendampingi dan memberikan arahan selama kegiatan berlangsung. Mereka memastikan kegiatan berjalan dengan lancar, aman, dan tertib. Selain itu, guru juga memberikan pemahaman kepada siswa tentang makna berbagi di bulan Ramadhan yang penuh berkah, sehingga siswa tidak hanya melakukan kegiatan, tetapi juga memahami nilai di baliknya.\r\nDengan terlaksananya kegiatan berbagi takjil ini, diharapkan siswa dapat terus menerapkan nilai-nilai kebaikan dalam kehidupan sehari-hari, tidak hanya di bulan Ramadhan tetapi juga di waktu lainnya. Kegiatan ini menjadi langkah kecil namun bermakna dalam membentuk generasi yang tidak hanya cerdas secara akademik, tetapi juga memiliki kepedulian sosial dan akhlak yang mulia.', '2026-03-14', '1775002870_image.jpg', '1775002870_foto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `image`, `link`, `keterangan`) VALUES
(4, '1775528620.png', 'https://www.instagram.com/reels/DVz1hurkry5/', 'instagram'),
(5, '1771690993.png', 'https://web.whatsapp.com/', 'WhatsApp'),
(6, '1775528396.png', 'https://www.tiktok.com/@esducil.yes/video/7417651671880191238', 'Tiktok'),
(7, '1775529048.png', 'https://mail.google.com/mail/u/0/#inbox', 'Gmail');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pembina` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id`, `nama`, `pembina`, `image`, `keterangan`) VALUES
(1, 'Drumband kids', 'pak bagas', '1771346865.png', 'Drumband Kids SDN 2 Kancilan adalah salah satu kegiatan ekstrakurikuler unggulan yang melatih siswa dalam seni musik perkusi sekaligus menanamkan nilai disiplin, kerja sama, dan rasa percaya diri.  Versi narasi'),
(2, 'Pencak Silat', 'pak bagus', '1771347312.png', 'Pencak Silat merupakan kegiatan ekstrakurikuler yang bertujuan untuk melatih kedisiplinan, keberanian, serta ketahanan fisik dan mental siswa. ');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `image`) VALUES
(1, 'perpustakaan', '1774416928.png');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`) VALUES
(1, '1771343666.png'),
(2, '1772513556.png'),
(3, '1772513671.png'),
(4, '1772962129.png'),
(5, '1772962390.png'),
(6, '1772962207.png');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `jabatan`, `image`) VALUES
(1, 'WAHYUNIANTO, S.Pd.Kor', 'GURU PJOK', '1775379424.png'),
(2, 'ENDRA SULIANNA, S.Pd SD', 'GURU KELAS 1', '1775378574.png'),
(3, 'SIGID SUPRIWANTO, S.Pd.SD', 'GURU KELAS VI', '1775378791.png'),
(4, 'NARTO ', 'PENJAGA SEKOLAH', '1775378942.png'),
(5, 'SUKIN PUJIATI, S.Pd.SD.M.Pd', 'KEPALA SEKOLAH', '1775379060.png');

-- --------------------------------------------------------

--
-- Table structure for table `headmaster`
--

CREATE TABLE `headmaster` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `headmaster`
--

INSERT INTO `headmaster` (`id`, `name`, `image`, `keterangan`) VALUES
(3, 'SUKIN PUJIATI, S.Pd.SD.M.Pd', '1775379503.png', 'Assalamu’alaikum warahmatullahi wabarakatuh, Salam sejahtera bagi kita semua.  Puji syukur ke hadirat Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya website sekolah ini dapat hadir sebagai media informasi dan komunikasi bagi seluruh warga sekolah dan masyarakat.  Website ini kami hadirkan sebagai sarana untuk menyampaikan informasi akademik, kegiatan sekolah, prestasi siswa, serta berbagai program yang sedang dan akan dilaksanakan. Kami berharap website ini dapat menjadi jendela informasi yang terbuka, transparan, dan mudah diakses oleh seluruh pihak.  Sekolah berkomitmen untuk terus meningkatkan mutu pendidikan, membentuk karakter peserta didik yang berakhlak mulia, berprestasi, serta siap menghadapi tantangan perkembangan zaman. Hal ini tentunya tidak terlepas dari kerja sama yang baik antara guru, tenaga kependidikan, peserta didik, orang tua, dan seluruh pemangku kepentingan.  Akhir kata, kami mengucapkan terima kasih kepada semua pihak yang telah berkontribusi dalam pengembangan dan kemajuan sekolah ini. Semoga website ini dapat memberikan manfaat dan menjadi sumber informasi yang berguna bagi kita semua.  Wassalamu’alaikum warahmatullahi wabarakatuh.');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `pesan`) VALUES
(2, 'aslamiyah aslamiyah', 'tarimatula@gmail.com', '082335645804', 'asla ngantuk');

-- --------------------------------------------------------

--
-- Table structure for table `pencapaian`
--

CREATE TABLE `pencapaian` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pencapaian`
--

INSERT INTO `pencapaian` (`id`, `nama`, `keterangan`, `image`) VALUES
(1, 'DANESHA AQUILA\r\nMECCA SHAQEENA AL MAGHFIRA', 'JUARA 2 KELAS H PUTRI USIA DINI 2\r\nJUARA 2 KELAS B PUTRI USIA DINI 1', '1775524515.png'),
(2, 'ANANTAVIRYA FAYOLLA HERMAWAN', 'JUARA 2 GAYA PUNGGUNG PUTRI 100M\r\nJUARA 3 GAYA BEBAS PUTRI 50M', '1772966529.png');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon`, `judul`, `link`) VALUES
(1, '1770481666.png', 'pencak silat', 'https://web.whatsapp.com/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','editor','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'asla', 'tarimatula@gmail.com', '$2y$10$04oUUh4jMZ94XQnxjGW4reXwtV1pgGh/KH0u/P0dxHwin5iTigJze', 'editor'),
(2, 'diana ', 'ndianaa645@gmail.com', '$2y$10$NmXOOdrYNGg1XKXiwLzI..Yci5Gv6vq3/A3yHmLUquWvExpWnIeRa', 'admin'),
(3, 'asla', 'aslamiyah@gmail.com', '$2y$10$ciK.o6KFUA3n9uekz5PGbegBwH1IL4amh8CfeC.FAR38n/Qhg/s/C', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int NOT NULL,
  `category` enum('visi','misi') DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `category`, `text`) VALUES
(1, 'visi', 'Terwujudnya peserta didik yang beriman dan bertakwa kepada Tuhan Yang Maha Esa serta berakhlak mulia.  \r\nTerbentuknya siswa yang cerdas, disiplin, dan berprestasi dalam bidang akademik maupun nonakademik.  \r\nTerciptanya lingkungan sekolah yang aman, nyaman, dan peduli terhadap kebersihan serta kelestarian lingkungan.'),
(2, 'misi', 'Menanamkan nilai keimanan dan ketakwaan kepada Tuhan Yang Maha Esa sejak dini. \r\nMembentuk karakter peserta didik yang berakhlak mulia, disiplin, dan bertanggung jawab. \r\nMenyelenggarakan proses pembelajaran yang aktif, kreatif, dan menyenangkan.  \r\nMengembangkan potensi akademik dan nonakademik siswa melalui kegiatan intrakurikuler dan ekstrakurikuler.  \r\nMenumbuhkan sikap peduli lingkungan serta budaya hidup bersih dan sehat di sekolah.  \r\nMenciptakan suasana sekolah yang aman, nyaman, dan kondusif untuk belajar.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headmaster`
--
ALTER TABLE `headmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencapaian`
--
ALTER TABLE `pencapaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `headmaster`
--
ALTER TABLE `headmaster`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pencapaian`
--
ALTER TABLE `pencapaian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
