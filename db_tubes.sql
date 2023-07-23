CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk`, `jumlah_barang`) VALUES
(5, 22, 2, 1),
(6, 22, 3, 1),
(7, 21, 1, 4),
(8, 21, 2, 2),
(9, 22, 1, 3),
(10, 21, 3, 2),
(11, 20, 1, 1),
(12, 20, 3, 3),
(13, 19, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `id_dompet` int(11) NOT NULL,
  `id_penjual` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`id_dompet`, `id_penjual`, `saldo`) VALUES
(1, 1, 550),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0),
(11, 11, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bibit Tanaman'),
(2, 'Bayi Hewan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `status_toko` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `deskripsi_toko` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `id_user`, `nama_toko`, `status_toko`, `deskripsi_toko`) VALUES
(1, 11, 'Rizfan', 'Aktif', 'panucitata'),
(2, 10, 'jifotirefi', 'Aktif', 'povitohale'),
(3, 9, 'famenivifa', 'Aktif', 'ducapodoga'),
(4, 8, 'taxipavude', 'Aktif', 'banesojuji'),
(5, 7, 'lutuwinofi', 'Aktif', 'xosimuvudu'),
(6, 6, 'bojamajaxu', 'Aktif', 'pajuyiyumo'),
(7, 5, 'bodemixajo', 'Aktif', 'royazikeyi'),
(8, 4, 'momomadexo', 'Aktif', 'yohobixawa'),
(9, 3, 'duzupozoza', 'Aktif', 'renarohope'),
(10, 2, 'pozokumifa', 'Aktif', 'repinemuju'),
(11, 1, 'Rizfan', 'Aktif', 'zatiretolu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_penjual` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi_produk` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `status_produk` varchar(30) DEFAULT NULL,
  `link_foto_produk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_penjual`, `id_kategori`, `nama_produk`, `deskripsi_produk`, `harga`, `stok`, `status_produk`, `link_foto_produk`) VALUES
(1, 11, 1, 'Cemara', 'bibit cemara', 2000, 20, 'Aktif', '112193035_20200213_103459.jpg'),
(2, 11, 2, 'Bayi Kambing', 'dsasaddsa', 1000000, 3, 'Aktif', '970023143_a616eb31ad51329e2687368ffe3d914e.jpg_720x720q8.png'),
(3, 11, 1, 'dsasatfvgjh', 'dusjkm,', 21321, 23, 'Aktif', '27163977_20200213_103459.jpg'),
(4, 11, 1, 'dsasaaas', 'dusjkm,', 21321, 23, 'Aktif', '398188727_20200213_103459.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_dompet`
--

CREATE TABLE `riwayat_dompet` (
  `id_riwayat_dompet` int(11) NOT NULL,
  `id_dompet` int(11) DEFAULT NULL,
  `saldo_ditarik` int(11) DEFAULT NULL,
  `tanggal_ditarik` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_penjual` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `total_harga_pembelian` int(11) DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT NULL,
  `status_transaksi` enum('Selesai','Proses','Batal') DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_penjual`, `id_user`, `total_harga_pembelian`, `status_pembayaran`, `status_transaksi`, `tanggal_transaksi`, `tanggal_pembayaran`) VALUES
(1, NULL, 11, 150672137, 'Belum Lunas', 'Proses', '2023-07-23 10:04:12', NULL),
(2, NULL, 10, 821950009, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(3, NULL, 9, 828802728, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(4, NULL, 8, 211269398, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(5, NULL, 7, 491716755, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(6, NULL, 6, 795754878, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(7, NULL, 5, 277707462, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(8, NULL, 4, 736346570, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(9, NULL, 3, 281951837, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(10, NULL, 2, 660411518, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(11, NULL, 1, 810038560, 'Belum Lunas', 'Proses', '2023-07-23 10:04:13', NULL),
(12, NULL, 11, 312517414, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(13, NULL, 10, 652201660, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(14, NULL, 9, 679627769, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(15, NULL, 8, 455153715, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(16, NULL, 7, 677637009, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(17, NULL, 6, 873685170, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(18, NULL, 5, NULL, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(19, NULL, 4, 4000, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(20, NULL, 3, 65963, 'Belum Lunas', 'Proses', '2023-07-23 10:04:18', NULL),
(21, NULL, 2, 2050642, 'Lunas', 'Selesai', '2023-07-23 10:04:18', '2023-07-23 10:28:40'),
(22, NULL, 1, 1027321, 'Belum Lunas', 'Selesai', '2023-07-23 10:04:18', '2023-07-23 10:38:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `link_foto_user` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  `alamat_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama`, `no_hp`, `link_foto_user`, `tanggal_lahir`, `role`, `alamat_user`) VALUES
(1, 'cosisopuha', 'Tidak Ak', 'luwikokeyo@gmail.com', 'cosisopuha', '08578323725', '', '0000-00-00', 'User', NULL),
(2, 'pesemosuko', 'jidayevu', 'segiwewopa@gmail.com', 'dobusizubega', '08578323725', '', '0000-00-00', 'User', NULL),
(3, 'gagozetopi', 'wisotuno', 'reragotabi@gmail.com', 'sizegatexoxi', '08603496806', '', '0000-00-00', 'User', NULL),
(4, 'moharodina', 'lofipawu', 'yuvisuruza@gmail.com', 'casupopacefa', '08955366719', '', '0000-00-00', 'User', NULL),
(5, 'loriwonade', 'canirudo', 'puyexuxumo@gmail.com', 'ropafijeruya', '08608460776', '', '0000-00-00', 'User', NULL),
(6, 'vodajedehi', 'takunete', 'covajaboko@gmail.com', 'wasalapecuya', '08719075824', '', '0000-00-00', 'User', NULL),
(7, 'vakomateri', 'satobidi', 'zurawojato@gmail.com', 'xiroturupiro', '08769126574', '', '0000-00-00', 'User', NULL),
(8, 'duceleviwi', 'geriniva', 'faxotemadi@gmail.com', 'gevivayuguto', '08204051139', '', '0000-00-00', 'User', NULL),
(9, 'dakutasaye', 'wafazavi', 'bimukubuja@gmail.com', 'cusacocuwadi', '08925621089', '', '0000-00-00', 'User', NULL),
(10, 'rutufepipi', 'wegayeke', 'rapocuxale@gmail.com', 'yefohujihoye', '08425506252', '', '0000-00-00', 'Admin', NULL),
(11, 'rizfanherlaya', 'qweqwe12', 'rispanherlaya@gmail.com', 'Rizfan', '088888888', '', '0000-00-00', 'Admin', 'Bekasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id_dompet`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `riwayat_dompet`
--
ALTER TABLE `riwayat_dompet`
  ADD PRIMARY KEY (`id_riwayat_dompet`),
  ADD KEY `id_dompet` (`id_dompet`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id_dompet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `riwayat_dompet`
--
ALTER TABLE `riwayat_dompet`
  MODIFY `id_riwayat_dompet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `dompet_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);

--
-- Ketidakleluasaan untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD CONSTRAINT `penjual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `riwayat_dompet`
--
ALTER TABLE `riwayat_dompet`
  ADD CONSTRAINT `riwayat_dompet_ibfk_1` FOREIGN KEY (`id_dompet`) REFERENCES `dompet` (`id_dompet`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;