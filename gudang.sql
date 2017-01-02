-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 02. Januari 2017 jam 02:53
-- Versi Server: 5.0.27
-- Versi PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `idbarang` varchar(10) NOT NULL,
  `namabarang` varchar(50) default NULL,
  `hpp` int(11) default NULL,
  `het` int(11) default NULL,
  PRIMARY KEY  (`idbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `user` varchar(10) NOT NULL,
  `password` varchar(30) default NULL,
  `c_time` datetime default NULL,
  `m_time` datetime default NULL,
  `last_login` datetime default NULL,
  PRIMARY KEY  (`user`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`user`, `password`, `c_time`, `m_time`, `last_login`) VALUES
('kevin', 'terserah', '2016-12-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(11) NOT NULL auto_increment,
  `idbarang` varchar(10) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idbarang` (`idbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `pembelian`
--


--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`);
