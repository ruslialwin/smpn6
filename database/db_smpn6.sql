-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 05:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smpn6`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_akun_admin` (IN `iddel` INT)   begin
    delete from akun_admin
    WHERE admin_id = iddel;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_akun_guru` (IN `iddel` INT)   BEGIN
 	DELETE
FROM
    akun_guru
WHERE
    id = iddel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_asal_mula` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    asal_mula
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_ekskul` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    ekstrakurikuler
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_fasilitas` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    fasilitas
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_guru` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    guru
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kegiatan` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    kegiatan
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kelas` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    kelas
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kelas_siswa` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    pengaturan_kelas_siswa
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_kepala_sekolah` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    kepala_sekolah
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_nilai_siswa` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    nilai_siswa
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_ortu` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    ortu
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pelajaran` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    mata_pelajaran
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pelajaran_guru` (IN `iddel` INT)   BEGIN 
DELETE FROM pelajaran_guru WHERE id = iddel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pengaturan_kelas` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    pengaturan_kelas
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_prestasi` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    prestasi
WHERE
    id =iddel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_profil_sekolah` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    profil_sekolah
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_siswa` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    siswa
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_tahun_pelajaran` (IN `iddel` INT)   BEGIN
    DELETE
FROM
    tahun_pelajaran
WHERE
    id = iddel ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_akun_admin` (IN `username` VARCHAR(15), IN `nama_lengkap` VARCHAR(50), IN `password` VARCHAR(60))   begin
    insert into akun_admin (username,nama_lengkap,PASSWORD)
    VALUES (username,nama_lengkap,PASSWORD);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_akun_guru` (IN `id_guru` INT, IN `username` VARCHAR(18), IN `PASSWORD` VARCHAR(60))   BEGIN
INSERT INTO akun_guru (id_guru, username, PASSWORD) VALUES (id_guru, username, PASSWORD);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_asal_mula` (IN `id_siswa` INT, IN `nama_sd` VARCHAR(35), IN `alamat_sd` TEXT, IN `diterima_sd` DATE, IN `tamat_sd` DATE)   begin
    insert into asal_mula (id_siswa,nama_sd,alamat_sd,diterima_sd,tamat_sd)
    VALUES (id_siswa,nama_sd,alamat_sd,diterima_sd,tamat_sd);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_ekskul` (IN `id_guru` INT, IN `nama` VARCHAR(35), IN `keterangan` TEXT)   begin
    insert into ekstrakurikuler (id_guru,nama,keterangan)
    VALUES (id_guru,nama,keterangan);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_fasilitas` (IN `judul` TEXT, IN `deskripsi` TEXT, IN `gambar` VARCHAR(25))   begin
    insert into  fasilitas (judul,deskripsi,gambar)
    VALUES (judul,deskripsi,gambar);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_guru` (IN `nip` CHAR(18), IN `nama_lengkap` VARCHAR(50), IN `jenis_kelamin` ENUM('L','P'), IN `tempat_lahir` VARCHAR(25), IN `tanggal_lahir` DATE, IN `agama` ENUM('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu'), IN `golongan_darah` ENUM('A','B','AB','O'), IN `jenjang` VARCHAR(3), IN `no_hp` CHAR(15), IN `foto` VARCHAR(30))   BEGIN 
    insert into guru(nip,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,golongan_darah,jenjang,no_hp,foto)
    VALUES (nip,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,golongan_darah,jenjang,no_hp,foto);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_kegiatan` (IN `judul` TEXT, IN `deskripsi` TEXT, IN `tanggal` DATE, IN `gambar` VARCHAR(25))   BEGIN 
    insert into kegiatan(judul,deskripsi,tanggal,gambar)
    VALUES (judul,deskripsi,tanggal,gambar);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_kepala_sekolah` (IN `nama_lengkap` VARCHAR(50), IN `nip` CHAR(18), IN `jenis_kelamin` ENUM('L','P'), IN `tempat_lahir` VARCHAR(25), IN `tanggal_lahir` DATE, IN `agama` ENUM('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu'), IN `jenjang` VARCHAR(3), IN `masa_jabatan` TEXT, IN `foto` VARCHAR(30))   BEGIN 
    insert into kepala_sekolah(nama_lengkap,nip,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,jenjang,masa_jabatan,foto)
    VALUES (nama_lengkap,nip,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,jenjang,masa_jabatan,foto);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_mata_pelajaran` (IN `nama` VARCHAR(50), IN `kelompok` ENUM('A','B'))   BEGIN 
    insert into mata_pelajaran(nama,kelompok)
    VALUES (nama,kelompok);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_nilai_siswa` (IN `id_siswa` INT, IN `id_mapel` INT, IN `id_tahunajar` INT, IN `nilai_pengetahuan` INT, IN `nilai_keterampilan` INT)   BEGIN 
    insert into nilai_siswa(id_siswa,id_mapel,id_tahunajar,nilai_pengetahuan, nilai_keterampilan)
    VALUES (id_siswa,id_mapel,id_tahunajar,nilai_pengetahuan, nilai_keterampilan);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_ortu` (IN `id_siswa` INT(11), IN `nama_ayah` VARCHAR(50), IN `nama_ibu` VARCHAR(50), IN `pendidikan_ayah` VARCHAR(3), IN `pendidikan_ibu` VARCHAR(3), IN `tempat_lahir_ayah` VARCHAR(35), IN `tempat_lahir_ibu` VARCHAR(35), IN `tgl_lhr_ayah` DATE, IN `tgl_lhr_ibu` DATE, IN `pekerjaan_ayah` VARCHAR(20), IN `pekerjaan_ibu` VARCHAR(20), IN `nama_wali` VARCHAR(50), IN `pendidikan_wali` VARCHAR(3), IN `hub_thd_siswa` VARCHAR(20), IN `pekerjaan_wali` VARCHAR(20), IN `no_hp` CHAR(15))   BEGIN 
        insert into ortu(id_siswa,nama_ayah,nama_ibu,pendidikan_ayah,pendidikan_ibu,tempat_lahir_ayah,tempat_lahir_ibu,tgl_lahir_ayah,tgl_lahir_ibu,pekerjaan_ayah,pekerjaan_ibu,nama_wali,hub_thd_siswa,pekerjaan_wali,no_hp)
        VALUES (id_siswa,nama_ayah,nama_ibu,pendidikan_ayah,pendidikan_ibu,tempat_lahir_ayah,tempat_lahir_ibu,tgl_lhr_ayah,tgl_lhr_ibu,pekerjaan_ayah,pekerjaan_ibu,nama_wali,hub_thd_siswa,pekerjaan_wali,no_hp);
        end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pelajaran_guru` (IN `id_guru` INT, IN `id_mapel` INT)   BEGIN
    INSERT INTO pelajaran_guru (id_guru,id_mapel)
VALUES(id_guru,id_mapel) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pengaturan_kelas` (IN `nama_kelas` CHAR(3), IN `id_tahun_pelajaran` INT, IN `id_guru` INT)   BEGIN 
insert into pengaturan_kelas(nama,id_tahun_pelajaran,id_guru)
VALUES (nama_kelas,id_tahun_pelajaran,id_guru);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pengaturan_kelas_siswa` (IN `id_pengaturan_kelas` INT(11), IN `id_siswa` INT(11))   BEGIN 
insert into pengaturan_kelas_siswa(id_pengaturan_kelas,id_siswa)
VALUES (id_pengaturan_kelas,id_siswa);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_prestasi` (IN `judul` TEXT, IN `deskripsi` TEXT, IN `penyelenggara` VARCHAR(30), IN `gambar` VARCHAR(25))   begin
    insert into prestasi(judul,deskrispi,penyelenggara,gambar)
    VALUES (judul,deskripsi,penyelenggara,gambar);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_profil_sekolah` (IN `nama` VARCHAR(30), IN `npsn` CHAR(8), IN `alamat` TEXT, IN `kode_pos` CHAR(5), IN `status` CHAR(6), IN `jenjang_pendidikan` CHAR(3), IN `akreditasi` ENUM('A','B','C'), IN `email` VARCHAR(35), IN `visi` TEXT, IN `misi` TEXT)   BEGIN 
insert into profil_sekolah(nama,npsn,alamat,kode_pos,status,jenjang_pendidikan,akreditasi,email,visi,misi)
VALUES (nama,npsn,alamat,kode_pos,status,jenjang_pendidikan,akreditasi,email,visi,misi);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_siswa` (IN `nis` CHAR(5), IN `nisn` CHAR(10), IN `nama_lengkap` VARCHAR(50), IN `jenis_kelamin` ENUM('L','P'), IN `tempat_lahir` VARCHAR(50), IN `tanggal_lahir` DATE, IN `agama` ENUM('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu'), IN `anak_ke` INT(11), IN `jumlah_saudara` INT(11), IN `berat_badan` INT(11), IN `tinggi_badan` INT(11), IN `gol_darah` ENUM('O','A','B','AB'), IN `no_hp` CHAR(15), IN `alamat` TEXT, IN `status` ENUM('AKTIF','LULUS','PINDAH'), IN `foto` VARCHAR(15))   BEGIN
    INSERT INTO siswa (nis,nisn,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,anak_ke,jumlah_saudara,berat_badan,tinggi_badan,gol_darah,no_hp,alamat,status,foto  
    )
VALUES(nis,nisn,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,anak_ke,jumlah_saudara,berat_badan,tinggi_badan,gol_darah,no_hp,alamat,status,foto  
    ) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_tahun_pelajaran` (IN `tahun_pelajaran` VARCHAR(9), IN `semester` ENUM('GENAP','GANJIL'))   BEGIN
    INSERT INTO tahun_pelajaran (tahun_pelajaran,semester)
VALUES(tahun_pelajaran,semester) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_ekskul` ()   begin 
SELECT count(id) as 'jumlah ekstrakulikuler' from ekstrakurikuler;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_fasilitas` ()   begin 
SELECT count(id) as 'jumlah fasilitas' from fasilitas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_guru` ()   BEGIN
select count(id) as 'jumlah guru' from guru ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_kegiatan` ()   begin 
SELECT count(id) as 'jumlah kegiatan' from kegiatan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_kelas` ()   begin 
SELECT count(id) as 'jumlah kelas' from pengaturan_kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_prestasi` ()   begin 
SELECT count(id) as 'jumlah prestasi' from prestasi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_siswa` ()   BEGIN
SELECT COUNT(id) AS 'Jumlah Siswa' FROM siswa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lulus` (IN `id_kelas_lulus` INT)   BEGIN
    UPDATE siswa 
    SET status = 'Lulus'
	WHERE id IN (SELECT id_siswa FROM pengaturan_kelas_siswa WHERE id_pengaturan_kelas = id_kelas_lulus);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `naik_kelas` (IN `id_kelas_naik` INT, IN `id_kelas_sekarang` INT)   BEGIN
    UPDATE pengaturan_kelas_siswa 
    SET id_pengaturan_kelas = id_kelas_naik 
    WHERE id_siswa IN (SELECT id FROM siswa WHERE status = 'aktif') AND id_pengaturan_kelas = id_kelas_sekarang ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `restore_akun_guru` (IN `aid` INT, IN `gid` INT, IN `usernamepro` VARCHAR(15), IN `passwordpro` VARCHAR(50), IN `idlog` INT)   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
RESIGNAL;
END;

START TRANSACTION;

INSERT INTO akun_guru SET id = aid, id_guru = gid, username = usernamepro, password = passwordpro;
DELETE FROM log_akun_guru WHERE id_log = idlog;

COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `restore_kegiatan` (IN `kid` INT, IN `judulpro` TEXT, `deskripsipro` TEXT, `tanggalpro` DATE, `gambarpro` VARCHAR(25), IN `idlog` INT)   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
RESIGNAL;
END;

START TRANSACTION;

INSERT INTO kegiatan SET id = kid, judul = judulpro, deskripsi=deskripsipro, tanggal = tanggalpro, gambar = gambarpro;
DELETE FROM log_kegiatan WHERE id_log = idlog;

COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `restore_pengaturan_kelas` (IN `pid` INT, IN `namapro` CHAR(3), IN `tid` INT, IN `gid` INT, IN `idlog` INT)   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
RESIGNAL;
END;

START TRANSACTION;

INSERT INTO pengaturan_kelas SET id = pid, nama = namapro, id_tahun_pelajaran = tid, id_guru = gid;
DELETE FROM log_pengaturan_kelas WHERE id_log = idlog;

COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `restore_pengaturan_kelas_siswa` (IN `pksid` INT, IN `pkid` INT, IN `sid` INT, IN `idlog` INT)   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
RESIGNAL;
END;

START TRANSACTION;

INSERT INTO pengaturan_kelas_siswa SET id = pksid, id_pengaturan_kelas = pkid, id_siswa = sid;
DELETE FROM log_pengaturan_kelas_siswa WHERE id_log = idlog;

COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `restore_prestasi` (IN `pid` INT, IN `judulpro` TEXT, IN `deskripsipro` TEXT, IN `penyelenggarapro` VARCHAR(30), IN `gambarpro` VARCHAR(25), IN `idlog` INT)   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
RESIGNAL;
END;

START TRANSACTION;

INSERT INTO prestasi SET id = pid, judul = judulpro, deskripsi=deskripsipro, penyelenggara = penyelenggarapro, gambar = gambarpro;
DELETE FROM log_prestasi WHERE id_log = idlog;

COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `restore_siswa` (IN `sid` INT, IN `nispro` CHAR(4), IN `nisnpro` CHAR(10), IN `namapro` VARCHAR(50), IN `jk` ENUM('L','P'), IN `tpt` VARCHAR(50), IN `tgl` DATE, IN `agamapro` ENUM('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu'), IN `ke` INT, IN `jsaudara` INT, IN `bb` INT, IN `tb` INT, IN `goldar` ENUM('O','A','B','AB'), `hp` CHAR(15), IN `alamatpro` TEXT, IN `statuspro` ENUM('Aktif','Lulus','Pindah'), IN `fotopro` VARCHAR(15), IN `idlog` INT)   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
RESIGNAL;
END;

START TRANSACTION;

INSERT INTO siswa SET id = sid, nis = nispro, nisn=nisnpro, nama_lengkap = namapro, jenis_kelamin = jk, tempat_lahir = tpt, tanggal_lahir = tgl, agama = agamapro, anak_ke = ke, jumlah_saudara = jsaudara, berat_badan = bb, tinggi_badan = tb, gol_darah = goldar, no_hp = hp, alamat = alamatpro, status = statuspro, foto = fotopro;
DELETE FROM log_siswa WHERE id_log = idlog;

COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_siswa` (IN `siswa` VARCHAR(50))   BEGIN 
 SELECT id as 'ID',
 nama_lengkap AS 'Nama lengkap',
 nis as NIS, nisn as NISN,(
     SELECT
     MAX(pengaturan_kelas.nama)
     from 
     (
         (pengaturan_kelas_siswa JOIN
         siswa
          )
         JOIN pengaturan_kelas
         )
     WHERE 	siswa.id =
     pengaturan_kelas_siswa.id_siswa
     AND
     pengaturan_kelas.id =
     pengaturan_kelas_siswa.id_pengaturan_kelas
 	)
     AS 'Nama Kelas',
     if (jenis_kelamin = 'L','Laki-Laki','Perempuan') AS 'Jenis Kelamin' FROM siswa
     WHERE nama_lengkap like CONCAT ('%', siswa , '%') ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_akun_admin` (IN `idpro` INT(11), IN `usernamepro` VARCHAR(15), IN `nama_lengkappro` VARCHAR(50), IN `passwordpro` VARCHAR(60))   begin
    update  akun_admin set username=usernamepro,nama_lengkap=nama_lengkappro,PASSWORD=passwordpro
	where admin_id = idpro;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_akun_guru` (IN `idpro` INT, IN `id_gurupro` INT, IN `usernamepro` VARCHAR(18), IN `passwordpro` VARCHAR(60))   begin
    update  akun_guru set id_guru=id_gurupro, username=usernamepro,PASSWORD=passwordpro
	where id = idpro;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_asal_mula` (IN `idpro` INT, IN `id_siswapro` INT, IN `nama_sdpro` VARCHAR(35), IN `alamat_sdpro` TEXT, IN `diterima_sdpro` DATE, IN `tamat_sdpro` DATE)   begin
    update  asal_mula set id_siswa=id_siswapro ,nama_sd=nama_sdpro ,alamat_sd=alamat_sdpro ,diterima_sd=diterima_sdpro ,tamat_sd=tamat_sdpro
	where id = idpro;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_ekskul` (IN `idpro` INT, IN `id_gurupro` INT, IN `namapro` VARCHAR(35), IN `keteranganpro` TEXT)   begin
    update  ekstrakurikuler set id_guru=id_gurupro ,nama=namapro ,keterangan=keteranganpro
	where id = idpro;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_fasilitas` (IN `idpro` INT, IN `judulpro` TEXT, IN `deskripsipro` TEXT, IN `gambarpro` VARCHAR(25))   begin
    update  fasilitas set judul=judulpro,deskripsi=deskripsipro,gambar=gambarpro
	where id = idpro;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_guru` (IN `idpro` INT, IN `nippro` CHAR(18), IN `nama_lengkappro` VARCHAR(50), IN `jenis_kelaminpro` ENUM('L','P'), IN `tempat_lahirpro` VARCHAR(25), IN `tanggal_lahirpro` DATE, IN `agamapro` ENUM('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu'), IN `golongan_darahpro` ENUM('A','B','AB','O'), IN `jenjangpro` VARCHAR(3), IN `no_hppro` CHAR(15), IN `fotopro` VARCHAR(30))   BEGIN
    UPDATE
        guru
    SET
        nip = nippro,
        nama_lengkap = nama_lengkappro,
        jenis_kelamin = jenis_kelaminpro,
        tempat_lahir = tempat_lahirpro,
        tanggal_lahir = tanggal_lahirpro,
        agama = agamapro,
        golongan_darah = golongan_darahpro,
        jenjang = jenjangpro,
        no_hp = no_hppro,
        foto = fotopro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kegiatan` (IN `idpro` INT, IN `judulpro` TEXT, IN `deskripsipro` TEXT, IN `tanggalpro` DATE, IN `gambarpro` VARCHAR(25))   BEGIN
    UPDATE
        kegiatan
    SET
        judul = judulpro,
        deskripsi = deskripsipro,
        tanggal = tanggalpro,
        gambar = gambarpro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kelas` (IN `idpro` INT, IN `namapro` VARCHAR(3))   BEGIN
    UPDATE kelas SET nama = namapro WHERE id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kepala_sekolah` (IN `idpro` INT, IN `nama_lengkappro` VARCHAR(50), IN `nippro` CHAR(18), IN `jenis_kelaminpro` ENUM('L','P'), IN `tempat_lahirpro` VARCHAR(25), IN `tanggal_lahirpro` DATE, IN `agamapro` ENUM('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu'), IN `jenjangpro` VARCHAR(3), IN `masa_jabatanpro` TEXT, IN `fotopro` VARCHAR(30))   BEGIN
    UPDATE
        kepala_sekolah
    SET
        nama_lengkap = nama_lengkappro,
        nip = nippro,
        jenis_kelamin = jenis_kelaminpro,
        tempat_lahir = tempat_lahirpro,
        tanggal_lahir = tanggal_lahirpro,
        agama = agamapro,
        jenjang = jenjangpro,
        masa_jabatan = masa_jabatanpro,
        foto = fotopro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_mata_pelajaran` (IN `idpro` INT, IN `namapro` VARCHAR(50), IN `kelompokpro` ENUM('A','B'))   BEGIN
    UPDATE
        mata_pelajaran
    SET
        nama = namapro,
        kelompok = kelompokpro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_nilai_siswa` (IN `idpro` INT, IN `id_siswapro` INT, IN `id_mapelpro` INT, IN `id_tahunajarpro` INT, IN `nilaippro` INT, IN `nilaikpro` INT)   BEGIN
    UPDATE
        nilai_siswa
    SET
        id_siswa = id_siswapro,
        id_mapel = id_mapelpro,
        id_tahunajar = id_tahunajarpro,
        nilai_pengetahuan = nilaippro,
        nilai_keterampilan = nilaikpro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_ortu` (IN `idpro` INT, IN `id_siswapro` INT(11), IN `nama_ayahpro` VARCHAR(50), IN `nama_ibupro` VARCHAR(50), IN `pendidikan_ayahpro` VARCHAR(3), IN `pendidikan_ibupro` VARCHAR(3), IN `tempat_lahir_ayahpro` VARCHAR(35), IN `tempat_lahir_ibupro` VARCHAR(35), IN `tgl_lhr_ayahpro` DATE, IN `tgl_lhr_ibupro` DATE, IN `pekerjaan_ayahpro` VARCHAR(20), IN `pekerjaan_ibupro` VARCHAR(20), IN `nama_walipro` VARCHAR(50), IN `pendidikan_walipro` VARCHAR(3), IN `hub_thd_siswapro` VARCHAR(20), IN `pekerjaan_walipro` VARCHAR(20), IN `no_hppro` CHAR(15))   BEGIN
    UPDATE
        ortu
    SET
        id_siswa = id_siswapro,
        nama_ayah = nama_ayahpro,
        nama_ibu = nama_ibupro,
        pendidikan_ayah = pendidikan_ayahpro,
        pendidikan_ibu = pendidikan_ibupro,
        tempat_lahir_ayah = tempat_lahir_ayahpro,
        tempat_lahir_ibu = tempat_lahir_ibupro,
        tgl_lhr_ayah = tgl_lhr_ayahpro,
        tgl_lhr_ibu = tgl_lhr_ibupro,
        pekerjaan_ayah = pekerjaan_ayahpro,
        pekerjaan_ibu = pekerjaan_ibupro,
        nama_wali = nama_walipro,
        pendidikan_wali = pendidikan_walipro,
        hub_thd_siswa = hub_thd_siswapro,
        pekerjaan_wali = pekerjaan_walipro,
        no_hp = no_hppro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pelajaran_guru` (IN `idpro` INT, IN `idgurupro` INT, IN `idmapelpro` INT)   BEGIN
UPDATE pelajaran_guru SET id_guru = idgurupro, id_mapel = idmapelpro WHERE id = idpro;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pengaturan_kelas` (IN `idpro` INT, IN `nama_kelaspro` CHAR(3), IN `id_tahun_pelajaranpro` INT, IN `id_gurupro` INT)   BEGIN
    UPDATE
        pengaturan_kelas
    SET
        nama = nama_kelaspro,
        id_tahun_pelajaran = id_tahun_pelajaranpro,
        id_guru = id_gurupro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pengaturan_kelas_siswa` (IN `idpro` INT, IN `id_kelaspro` INT(11), IN `id_siswapro` INT(11))   BEGIN
    UPDATE
        pengaturan_kelas_siswa
    SET
        id_pengaturan_kelas = id_kelaspro,
        id_siswa = id_siswapro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_prestasi` (IN `idpro` INT, IN `judulpro` TEXT, IN `deskripsipro` TEXT, IN `penyelenggarapro` VARCHAR(30), IN `gambarpro` VARCHAR(25))   BEGIN
    UPDATE
        prestasi
    SET
        judul = judulpro,
        deskripsi = deskripsipro,
        penyelenggara = penyelenggarapro,
        gambar = gambarpro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profil_sekolah` (IN `idpro` INT, IN `nama` VARCHAR(30), IN `npsnpro` CHAR(8), IN `alamatpro` TEXT, IN `kode_pospro` CHAR(5), IN `statuspro` CHAR(6), IN `jenjang_pendidikanpro` CHAR(3), IN `akreditasipro` ENUM('A','B','C'), IN `emailpro` VARCHAR(35), IN `visipro` TEXT, IN `misipro` TEXT)   BEGIN
    UPDATE
        profil_sekolah
    SET
        nama = namapro ,
        npsn = npsnpro,
        alamat = alamatpro,
        kode_pos = kode_pospro,
        status = statuspro,
        jenjang_pendidikan = jenjang_pendidikanpro,
        akreditasi = akreditasipro,
        email = emailpro,
        visi = visipro,
        misi = misipro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_siswa` (IN `idpro` INT, IN `nispro` CHAR(5), IN `nisnpro` CHAR(10), IN `nama_lengkappro` VARCHAR(50), IN `jenis_kelaminpro` ENUM('L','P'), IN `tempat_lahirpro` VARCHAR(50), IN `tanggal_lahirpro` DATE, IN `agamapro` ENUM('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu'), IN `anak_kepro` INT(11), IN `jumlah_saudarapro` INT(11), IN `berat_badanpro` INT(11), IN `tinggi_badanpro` INT(11), IN `gol_darahpro` ENUM('O','A','B','AB'), IN `no_hppro` CHAR(15), IN `alamatpro` TEXT, IN `statuspro` ENUM('AKTIF','LULUS','PINDAH'), IN `fotopro` VARCHAR(15))   BEGIN
    UPDATE
        siswa
    SET
        nis = nispro ,
        nisn = nisnpro,
        nama_lengkap = nama_lengkappro,
        jenis_kelamin = jenis_kelaminpro,
        tempat_lahir = tempat_lahirpro,
        agama = agamapro,
        anak_ke = anak_kepro,
        jumlah_saudara = jumlah_saudarapro,
        berat_badan = berat_badanpro,
        tinggi_badan = tinggi_badanpro,
        gol_darah = gol_darahpro,
        no_hp = no_hppro,
        alamat = alamatpro,
        status = statuspro,
        foto = fotopro
    WHERE
        id = idpro ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_tahun_pelajaran` (IN `idpro` INT, IN `tahun_pelajaranpro` VARCHAR(9), IN `semesterpro` ENUM('GENAP','GANJIL'))   BEGIN
    UPDATE
        tahun_pelajaran
    SET
        tahun_pelajaran = tahun_pelajaranpro ,
    	semester = semesterpro
    WHERE
        id = idpro ;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cari_nip_guru` (`nama_guru` VARCHAR(50)) RETURNS CHAR(18) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE nip_guru CHAR(18);
SELECT nip INTO nip_guru FROM guru WHERE nama_lengkap = nama_guru;
RETURN nip_guru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cari_nip_kepsek` (`nama_kepsek` VARCHAR(50)) RETURNS CHAR(18) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE nip_kepsek CHAR(18);
SELECT nip INTO nip_kepsek FROM kepala_sekolah WHERE nama_lengkap = nama_kepsek;
RETURN nip_kepsek;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cari_nis` (`nama_siswa` VARCHAR(50)) RETURNS CHAR(4) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE nis_siswa CHAR(4);
SELECT nis INTO nis_siswa FROM siswa WHERE nama_lengkap = nama_siswa;
RETURN nis_siswa;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cari_nisn` (`nama_siswa` VARCHAR(50)) RETURNS CHAR(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE nisn_siswa CHAR(10);
SELECT nisn INTO nisn_siswa FROM siswa WHERE nama_lengkap = nama_siswa;
RETURN nisn_siswa;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jenis_kelamin_siswa` (`jk` ENUM('L','P')) RETURNS INT(11)  BEGIN
DECLARE jumlah INT;

SELECT COUNT(jenis_kelamin) INTO jumlah FROM siswa WHERE jenis_kelamin = jk AND status = 'aktif';

RETURN jumlah;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `konversi_nilai` (`nilai` INT) RETURNS ENUM('A','B','C','D') CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
RETURN CASE
WHEN nilai > 85 && nilai <= 100 then 'A'
WHEN nilai <= 85 && nilai > 71 then 'B'
WHEN nilai <=71 && nilai >= 60 then 'C'
else 'D'
END;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `nilai_mapel` (`nis_siswa` CHAR(4), `nama_mapel` VARCHAR(50), `tahun_ajar` CHAR(9), `sem` ENUM('Ganjil','Genap')) RETURNS INT(11)  BEGIN
DECLARE nilaii, s_id, m_id, t_id INT;

SELECT id INTO s_id FROM siswa WHERE nis = nis_siswa;
SELECT id INTO m_id FROM mata_pelajaran WHERE nama = nama_mapel;
SELECT id INTO t_id FROM tahun_pelajaran WHERE tahun_pelajaran = tahun_ajar AND semester = sem;

SELECT n.nilai INTO nilaii FROM nilai_siswa n JOIN siswa s ON s.id = s_id JOIN mata_pelajaran m ON m.id = m_id JOIN tahun_pelajaran t ON t.id = t_id;
RETURN nilaii;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `perhitungan_umur` (`tgl_lahir` DATE) RETURNS INT(11)  BEGIN
DECLARE tahun_ini, tahun_lahir INT;
SET tahun_ini = YEAR(now());
SET tahun_lahir = YEAR(tgl_lahir);
RETURN tahun_ini - tahun_lahir;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `tahun_pelajaran_siswa` (`tp` VARCHAR(9)) RETURNS INT(11)  BEGIN
DECLARE jumlah INT;

SELECT COUNT(DISTINCT nis) INTO jumlah FROM view_kelas_siswa WHERE tahun_pelajaran = tp;

RETURN jumlah;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`admin_id`, `username`, `nama_lengkap`, `password`) VALUES
(1, 'admin_budi', 'Budi', 'fcea920f7412b5da7be0cf42b8c93759');

--
-- Triggers `akun_admin`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_akun_admin` BEFORE UPDATE ON `akun_admin` FOR EACH ROW BEGIN 
IF NEW.admin_id <> OLD.admin_id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_akun_admin` BEFORE DELETE ON `akun_admin` FOR EACH ROW BEGIN
INSERT INTO log_akun_admin(waktu, aksi, who, id_akun_admin, old_username, new_username, old_nama_lengkap, new_nama_lengkap, old_password, new_password)
VALUES(NOW(), 'delete', USER(), OLD.admin_id, OLD.username, '-', OLD.nama_lengkap, '-', OLD.password, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_akun_admin` AFTER INSERT ON `akun_admin` FOR EACH ROW BEGIN
INSERT INTO log_akun_admin(waktu, aksi, who, id_akun_admin, old_username, new_username, old_nama_lengkap, new_nama_lengkap, old_password, new_password)
VALUES (NOW(), 'insert', USER(), new.admin_id, '-', NEW.username, '-', NEW.nama_lengkap, '-', new.password);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_akun_admin` BEFORE UPDATE ON `akun_admin` FOR EACH ROW BEGIN 
INSERT INTO log_akun_admin(waktu, aksi, who, id_akun_admin, old_username, new_username, old_nama_lengkap, new_nama_lengkap, old_password, new_password)
VALUES (NOW(), 'update', USER(), OLD.admin_id, OLD.username, NEW.username, OLD.nama_lengkap, NEW.nama_lengkap, OLD.password, NEW.password);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akun_guru`
--

CREATE TABLE `akun_guru` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_guru`
--

INSERT INTO `akun_guru` (`id`, `id_guru`, `username`, `password`) VALUES
(3, 4, 'guru_ade', 'fcea920f7412b5da7be0cf42b8c93759'),
(4, 8, '200002272005012005', '455a3e8540f09fc90ac403196f97e7f4');

--
-- Triggers `akun_guru`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_akun_guru` BEFORE UPDATE ON `akun_guru` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_akun_guru` BEFORE DELETE ON `akun_guru` FOR EACH ROW BEGIN 
INSERT INTO log_akun_guru
(waktu, aksi, who, id_akun_guru, id_guru, old_username, new_username, old_password, new_password) 
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.id_guru, OLD.username, '-', OLD.password, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_akun_guru` AFTER INSERT ON `akun_guru` FOR EACH ROW BEGIN 
INSERT INTO log_akun_guru
(waktu, aksi, who, id_akun_guru, id_guru, old_username, new_username, old_password, new_password) 
VALUES 
(NOW(), 'insert', USER(), NEW.id, NEW.id_guru, '-', NEW.username, '-', NEW.password);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_akun_guru` BEFORE UPDATE ON `akun_guru` FOR EACH ROW BEGIN 
INSERT INTO log_akun_guru
(waktu, aksi, who, id_akun_guru, id_guru, old_username, new_username, old_password, new_password) 
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.id_guru, OLD.username, NEW.username, OLD.password, NEW.password);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akun_kepsek`
--

CREATE TABLE `akun_kepsek` (
  `id` int(11) NOT NULL,
  `id_kepsek` int(11) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_kepsek`
--

INSERT INTO `akun_kepsek` (`id`, `id_kepsek`, `username`, `password`) VALUES
(0, 5, '98765432123456789', '9156490232e4e8029188a72697a6985d');

-- --------------------------------------------------------

--
-- Table structure for table `asal_mula`
--

CREATE TABLE `asal_mula` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_sd` varchar(35) NOT NULL,
  `alamat_sd` text NOT NULL,
  `diterima_sd` date NOT NULL,
  `tamat_sd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asal_mula`
--

INSERT INTO `asal_mula` (`id`, `id_siswa`, `nama_sd`, `alamat_sd`, `diterima_sd`, `tamat_sd`) VALUES
(2, 1, 'SDN 102088', 'Emplasmen Pabatu Dusun 1 Desa Kedai Damar', '2016-06-27', '2022-07-04');

--
-- Triggers `asal_mula`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_asal_mula` BEFORE UPDATE ON `asal_mula` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_asal_mula` BEFORE DELETE ON `asal_mula` FOR EACH ROW BEGIN 
INSERT INTO log_asal_mula(waktu, aksi, who, id_asal_mula, id_siswa, old_nama_sd, new_nama_sd, old_diterima_sd, new_diterima_sd, old_tamat_sd, new_tamat_sd)
VALUES (NOW(), 'delete', USER(), OLD.id, OLD.id_siswa, OLD.nama_sd, '-', OLD.diterima_sd, '-', OLD.tamat_sd, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_asal_mula` AFTER INSERT ON `asal_mula` FOR EACH ROW BEGIN 
INSERT INTO log_asal_mula(waktu, aksi, who, id_asal_mula, id_siswa, old_nama_sd, new_nama_sd, old_diterima_sd, new_diterima_sd, old_tamat_sd, new_tamat_sd)
VALUES (NOW(), 'insert', USER(), NEW.id, '-', NEW.id_siswa, NEW.nama_sd, '-', NEW.diterima_sd, '-', NEW.tamat_sd); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_asal_mula` BEFORE UPDATE ON `asal_mula` FOR EACH ROW BEGIN
INSERT INTO log_asal_mula(waktu, aksi, who, id_asal_mula, id_siswa, old_nama_sd, new_nama_sd, old_diterima_sd, new_diterima_sd, old_tamat_sd, new_tamat_sd)
VALUES (NOW(), 'update', USER(), OLD.id, OLD.id_siswa, OLD.nama_sd, NEW.nama_sd, OLD.diterima_sd, NEW.diterima_sd, OLD.tamat_sd, NEW.tamat_sd);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `id_guru`, `nama`, `keterangan`) VALUES
(1, 4, 'Paskibra', 'Kegiatan ekstrakurikuler paskibra dapat meningkatkan nilai penting dalam diri siswa, contohnya : kedisiplinan, cinta tanah air, patriotisme, dan tanggung jawab.'),
(3, 8, 'Palang Merah Remaja (PMR)', 'Ekstrakurikuler ini bertujuan untuk melatih dan membentuk jiwa kemanusiaan para anggota agar memiliki kepedulian yang tinggi terhadap kemanusiaan sejak usia dini, menjadi individu yang lebih mampu berempati dengan individu lainnya.'),
(4, 9, 'Sepak Bola', 'Ekstrakurikuler ini berfungsi sebagai wadah siswa siswi untuk mengembangkan bakat dan minatnya dalam bidang olahraga sepak bola.'),
(5, 11, 'Dojo', 'Ekstrakurikuler ini dapat berfungsi sebagai wadah siswa untuk menyalurkan bakat, hobi, sekaligus melatih keterampilan di bidang olahraga. Selain itu, juga untuk melatih mentalitas dan kedisiplinan diri.'),
(6, 6, 'Pramuka', 'Ekstrakurikuler ini berfungsi sebagai salah satu wahana pengembangan bagi generasi muda Indonesia termasuk siswa-siswi. Gerakan pramuka ini dapat membentuk generasi yang tangguh, berbudi luhur dengan mengedepankan semangat persatuan dan kesatuan serta cinta tanah air.'),
(7, 10, 'Voli', 'Ekstrakurikuler ini berfungsi sebagai salah satu wadah penyaluran minat dan bakat siswa siswi dalam bidang olahraga');

--
-- Triggers `ekstrakurikuler`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_ekskul` BEFORE UPDATE ON `ekstrakurikuler` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_ekstrakurikuler` BEFORE DELETE ON `ekstrakurikuler` FOR EACH ROW BEGIN 
INSERT INTO log_ekstrakurikuler(waktu, aksi, who, id_ekskul, old_nama_ekskul, new_nama_ekskul, id_guru, old_keterangan, new_keterangan)
VALUES(NOW(), 'delete', USER(), OLD.id, OLD.nama, '-', OLD.id_guru, OLD.keterangan, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_ekstrakurikuler` AFTER INSERT ON `ekstrakurikuler` FOR EACH ROW BEGIN 
INSERT INTO log_ekstrakurikuler(waktu, aksi, who, id_ekskul, old_nama_ekskul, new_nama_ekskul, id_guru, old_keterangan, new_keterangan)
VALUES(NOW(), 'insert', USER(), NEW.id, '-', NEW.nama, NEW.id_guru,'-', NEW.keterangan);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_ekstrakurikuler` BEFORE UPDATE ON `ekstrakurikuler` FOR EACH ROW BEGIN
INSERT INTO log_ekstrakurikuler(waktu, aksi, who, id_ekskul, old_nama_ekskul, new_nama_ekskul, id_guru, old_keterangan, new_keterangan)
VALUES (NOW(), 'update', USER(), OLD.id, OLD.nama, NEW.nama, OLD.id_guru, OLD.keterangan, NEW.keterangan);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'Lab Komputer', 'Kami mempunyai 2 ruangan laboratorium yaitu lab komputer', 'fasilitas1671708231.jpg'),
(8, 'Lapangan Voli', 'Terdapat sebuah lapangan voli di halaman belakang sekolah', 'fasilitas1671708127.jpg'),
(9, 'Perpustakaan', 'Kami mempunyai banyak koleksi buku di perpustakaan', 'fasilitas1671708013.jpg');

--
-- Triggers `fasilitas`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_fasilitas` BEFORE UPDATE ON `fasilitas` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_fasilitas` BEFORE DELETE ON `fasilitas` FOR EACH ROW BEGIN 
INSERT INTO log_fasilitas(waktu, aksi, who, id_fasilitas, old_judul, new_judul, old_deskripsi, new_deskripsi, old_gambar, new_gambar)
VALUES(NOW(), 'delete', USER(), OLD.id, OLD.judul, '-', OLD.deskripsi, '-', OLD.gambar, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_fasilitas` AFTER INSERT ON `fasilitas` FOR EACH ROW BEGIN 
INSERT INTO log_fasilitas(waktu, aksi, who, id_fasilitas, old_judul, new_judul, old_deskripsi, new_deskripsi, old_gambar, new_gambar)
VALUES (NOW(), 'insert', USER(), NEW.id, '-', NEW.judul, '-', NEW.deskripsi, '-', NEW.gambar);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_fasilitas` BEFORE UPDATE ON `fasilitas` FOR EACH ROW BEGIN 
INSERT INTO log_fasilitas(waktu, aksi, who, id_fasilitas, old_judul, new_judul, old_deskripsi, new_deskripsi, old_gambar, new_gambar)
VALUES(NOW(), 'update', USER(), OLD.id, OLD.judul, NEW.judul, OLD.deskripsi, NEW.deskripsi, OLD.gambar, NEW.gambar);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` char(18) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu') NOT NULL,
  `golongan_darah` enum('O','A','B','AB') NOT NULL,
  `jenjang` varchar(3) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `golongan_darah`, `jenjang`, `no_hp`, `foto`) VALUES
(1, '196312241989032006', 'Sri Harmini', 'P', 'Tebing Tinggi', '1963-12-24', 'Islam', 'A', 'S1', '086387477488', NULL),
(2, '197106082005012005', 'Debora Napitupulu', 'P', 'Pematang Siantar', '1971-06-08', 'Katolik', 'B', 'S1', '08146584895', NULL),
(4, '123456789181881918', 'Ade Bunga', 'P', 'Pabatu', '2012-12-06', 'Islam', 'O', 'S1', '082089998332', ''),
(6, '913243546789878675', 'Teresia', 'P', 'Pabatu', '2013-12-18', 'Islam', 'O', 'S1', '081356678976', ''),
(8, '200002272005012005', 'Alwin Rusli', 'L', 'Medan', '2000-02-27', 'Islam', 'A', 'S1', '086547778287', NULL),
(9, '199905201989032006', 'Rafael Daniel', 'L', 'Medan', '1999-05-20', 'Islam', 'B', 'S1', '0812633647485', NULL),
(10, '199009301989032006', 'Garuda', 'L', 'Medan', '1990-09-30', 'Islam', 'AB', 'S1', '082235565587', NULL),
(11, '199808221989032006', 'Gilang', 'L', 'Medan', '1998-08-22', 'Islam', 'A', 'S1', '0851455656567', NULL);

--
-- Triggers `guru`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_guru` BEFORE UPDATE ON `guru` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_guru` BEFORE DELETE ON `guru` FOR EACH ROW BEGIN 
INSERT INTO log_guru 
(waktu, aksi, who, id_guru, old_nip, new_nip, old_nama_lengkap, new_nama_lengkap, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_gol_darah, new_gol_darah, old_jenjang, new_jenjang, old_no_hp, new_no_hp, old_foto, new_foto)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.nip, '-', OLD.nama_lengkap, '-', OLD.jenis_kelamin, '-', OLD.tempat_lahir, '-', OLD.tanggal_lahir, '-', OLD.agama, '-', OLD.golongan_darah, '-', OLD.jenjang, '-', OLD.no_hp, '-', OLD.foto, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_guru` AFTER INSERT ON `guru` FOR EACH ROW BEGIN 
INSERT INTO log_guru 
(waktu, aksi, who, id_guru, old_nip, new_nip, old_nama_lengkap, new_nama_lengkap, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_gol_darah, new_gol_darah, old_jenjang, new_jenjang, old_no_hp, new_no_hp, old_foto, new_foto)
VALUES 
(NOW(), 'insert', USER(), NEW.id, '-', NEW.nip, '-', NEW.nama_lengkap, '-', NEW.jenis_kelamin, '-', NEW.tempat_lahir, '-', NEW.tanggal_lahir, '-', NEW.agama, '-', NEW.golongan_darah, '-', NEW.jenjang, '-', NEW.no_hp, '-', NEW.foto);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_guru` BEFORE UPDATE ON `guru` FOR EACH ROW BEGIN 
INSERT INTO log_guru 
(waktu, aksi, who, id_guru, old_nip, new_nip, old_nama_lengkap, new_nama_lengkap, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_gol_darah, new_gol_darah, old_jenjang, new_jenjang, old_no_hp, new_no_hp, old_foto, new_foto)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.nip, NEW.nip, OLD.nama_lengkap, NEW.nama_lengkap, OLD.jenis_kelamin, NEW.jenis_kelamin, OLD.tempat_lahir, NEW.tempat_lahir, OLD.tanggal_lahir, NEW.tanggal_lahir, OLD.agama, NEW.agama, OLD.golongan_darah, NEW.golongan_darah, OLD.jenjang, NEW.jenjang, OLD.no_hp, NEW.no_hp, OLD.foto, NEW.foto);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_agama_guru` BEFORE INSERT ON `guru` FOR EACH ROW BEGIN
IF
(new.agama = 'Islam' OR
new.agama = 'Katolik' OR
new.agama = 'Protestan' OR
new.agama = 'Buddha' OR
new.agama = 'Konghucu' OR
new.agama = 'Hindu')
THEN
SET new.agama=new.agama;
ELSEIF
(new.agama != 'Islam' OR
new.agama != 'Katolik' OR
new.agama != 'Protestan' OR
new.agama != 'Buddha' OR
new.agama != 'Konghucu' OR
new.agama != 'Hindu')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Agama guru yang diinput tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_jenis_kelamin_guru` BEFORE INSERT ON `guru` FOR EACH ROW BEGIN
IF
(new.jenis_kelamin = 'P' OR
new.jenis_kelamin = 'L')
THEN
SET new.jenis_kelamin = new.jenis_kelamin;
ELSEIF
(new.jenis_kelamin != 'P' OR
new.jenis_kelamin != 'L')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Jenis kelamin guru yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_agama_guru` BEFORE UPDATE ON `guru` FOR EACH ROW BEGIN
IF
(new.agama = 'Islam' OR
new.agama = 'Katolik' OR
new.agama = 'Protestan' OR
new.agama = 'Buddha' OR
new.agama = 'Konghucu' OR
new.agama = 'Hindu')
THEN
SET new.agama=new.agama;
ELSEIF
(new.agama != 'Islam' OR
new.agama != 'Katolik' OR
new.agama != 'Protestan' OR
new.agama != 'Buddha' OR
new.agama != 'Konghucu' OR
new.agama != 'Hindu')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Agama guru yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_jenis_kelamin_guru` BEFORE UPDATE ON `guru` FOR EACH ROW BEGIN
IF
(new.jenis_kelamin = 'P' OR
new.jenis_kelamin = 'L')
THEN
SET new.jenis_kelamin = new.jenis_kelamin;
ELSEIF
(new.jenis_kelamin != 'P' OR
new.jenis_kelamin != 'L')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Jenis kelamin guru yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `deskripsi`, `tanggal`, `gambar`) VALUES
(1, 'Kegiatan Dokter Remaja SMP Negeri 6 Tebing Tinggi', 'Membahas pentingnya untuk mencegah anemia pada remaja dengan konsumsi obat/ tablet tambah darah (TTD)', '2022-08-02', 'kegiatan1672154565.jpg');

--
-- Triggers `kegiatan`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_kegiatan` BEFORE UPDATE ON `kegiatan` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_kegiatan` BEFORE DELETE ON `kegiatan` FOR EACH ROW BEGIN 
INSERT INTO log_kegiatan 
(waktu, aksi, who, id_kegiatan, old_judul, new_judul, old_deskripsi, new_deskripsi, old_tanggal, new_tanggal, old_gambar, new_gambar)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.judul, '-', OLD.deskripsi, '-', OLD.tanggal, '-', OLD.gambar, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_kegiatan` AFTER INSERT ON `kegiatan` FOR EACH ROW BEGIN 
INSERT INTO log_kegiatan
(waktu, aksi, who, id_kegiatan, old_judul, new_judul, old_deskripsi, new_deskripsi, old_tanggal, new_tanggal, old_gambar, new_gambar)
VALUES 
(NOW(), 'insert', USER(), NEW.id, '-', NEW.judul, '-', NEW.deskripsi, '-', NEW.tanggal, '-', NEW.gambar);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_kegiatan` BEFORE UPDATE ON `kegiatan` FOR EACH ROW BEGIN 
INSERT INTO log_kegiatan
(waktu, aksi, who, id_kegiatan, old_judul, new_judul, old_deskripsi, new_deskripsi, old_tanggal, new_tanggal, old_gambar, new_gambar)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.judul, NEW.judul, OLD.deskripsi, NEW.deskripsi, OLD.tanggal, NEW.tanggal, OLD.gambar, NEW.gambar);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolah`
--

CREATE TABLE `kepala_sekolah` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nip` char(18) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu') NOT NULL,
  `jenjang` char(3) NOT NULL,
  `masa_jabatan` text NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`id`, `nama_lengkap`, `nip`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenjang`, `masa_jabatan`, `foto`) VALUES
(5, 'Gilang Akbar', '98765432123456789', 'L', 'Medan', '2012-12-12', 'Buddha', 'S1', '5 tahun', '');

--
-- Triggers `kepala_sekolah`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_kepsek` BEFORE UPDATE ON `kepala_sekolah` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_kepala_sekolah` BEFORE DELETE ON `kepala_sekolah` FOR EACH ROW BEGIN 
INSERT INTO log_kepala_sekolah
(waktu, aksi, who, id_kepala_sekolah, old_nama_lengkap, new_nama_lengkap, old_nip, new_nip, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_jenjang, new_jenjang, old_masa_jabatan, new_masa_jabatan, old_foto, new_foto)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.nama_lengkap, '-', OLD.nip, '-', OLD.jenis_kelamin, '-', OLD.tempat_lahir, '-', OLD.tanggal_lahir, '-', OLD.agama, '-', OLD.jenjang, '-', OLD.masa_jabatan, '-', OLD.foto, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_kepala_sekolah` AFTER INSERT ON `kepala_sekolah` FOR EACH ROW BEGIN 
INSERT INTO log_kepala_sekolah
(waktu, aksi, who, id_kepala_sekolah, old_nama_lengkap, new_nama_lengkap, old_nip, new_nip, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_jenjang, new_jenjang, old_masa_jabatan, new_masa_jabatan, old_foto, new_foto)
VALUES 
(NOW(), 'insert', USER(), NEW.id, '-', NEW.nama_lengkap, '-', NEW.nip, '-', NEW.jenis_kelamin, '-', NEW.tempat_lahir, '-', NEW.tanggal_lahir, '-', NEW.agama, '-', NEW.jenjang, '-', NEW.masa_jabatan, '-', NEW.foto);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_kepala_sekolah` BEFORE UPDATE ON `kepala_sekolah` FOR EACH ROW BEGIN 
INSERT INTO log_kepala_sekolah
(waktu, aksi, who, id_kepala_sekolah, old_nama_lengkap, new_nama_lengkap, old_nip, new_nip, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_jenjang, new_jenjang, old_masa_jabatan, new_masa_jabatan, old_foto, new_foto)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.nama_lengkap, NEW.nama_lengkap, OLD.nip, NEW.nip, OLD.jenis_kelamin, NEW.jenis_kelamin, OLD.tempat_lahir, NEW.tempat_lahir, OLD.tanggal_lahir, NEW.tanggal_lahir, OLD.agama, NEW.agama, OLD.jenjang, NEW.jenjang, OLD.masa_jabatan, NEW.masa_jabatan, OLD.foto, NEW.foto);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_agama_kepala_sekolah` BEFORE INSERT ON `kepala_sekolah` FOR EACH ROW BEGIN
IF
(new.agama = 'Islam' OR
new.agama = 'Katolik' OR
new.agama = 'Protestan' OR
new.agama = 'Buddha' OR
new.agama = 'Konghucu' OR
new.agama = 'Hindu')
THEN
SET new.agama=new.agama;
ELSEIF
(new.agama != 'Islam' OR
new.agama != 'Katolik' OR
new.agama != 'Protestan' OR
new.agama != 'Buddha' OR
new.agama != 'Konghucu' OR
new.agama != 'Hindu')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Agama kepala sekolah yang diinput tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_jenis_kelamin_kepala_sekolah` BEFORE INSERT ON `kepala_sekolah` FOR EACH ROW BEGIN
IF
(new.jenis_kelamin = 'P' OR
new.jenis_kelamin = 'L')
THEN
SET new.jenis_kelamin = new.jenis_kelamin;
ELSEIF
(new.jenis_kelamin != 'P' OR
new.jenis_kelamin != 'L')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Jenis kelamin kepala sekolah yang diinput tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_agama_kepala_sekolah` BEFORE UPDATE ON `kepala_sekolah` FOR EACH ROW BEGIN
IF
(new.agama = 'Islam' OR
new.agama = 'Katolik' OR
new.agama = 'Protestan' OR
new.agama = 'Buddha' OR
new.agama = 'Konghucu' OR
new.agama = 'Hindu')
THEN
SET new.agama=new.agama;
ELSEIF
(new.agama != 'Islam' OR
new.agama != 'Katolik' OR
new.agama != 'Protestan' OR
new.agama != 'Buddha' OR
new.agama != 'Konghucu' OR
new.agama != 'Hindu')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Agama kepala sekolah yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_jenis_kelamin_kepala_sekolah` BEFORE UPDATE ON `kepala_sekolah` FOR EACH ROW BEGIN
IF
(new.jenis_kelamin = 'P' OR
new.jenis_kelamin = 'L')
THEN
SET new.jenis_kelamin = new.jenis_kelamin;
ELSEIF
(new.jenis_kelamin != 'P' OR
new.jenis_kelamin != 'L')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Jenis kelamin kepala sekolah yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_akun_admin`
--

CREATE TABLE `log_akun_admin` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_akun_admin` int(11) NOT NULL,
  `old_username` varchar(15) NOT NULL,
  `new_username` varchar(15) NOT NULL,
  `old_nama_lengkap` varchar(50) NOT NULL,
  `new_nama_lengkap` varchar(50) NOT NULL,
  `old_password` varchar(60) NOT NULL,
  `new_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_akun_admin`
--

INSERT INTO `log_akun_admin` (`id_log`, `waktu`, `aksi`, `who`, `id_akun_admin`, `old_username`, `new_username`, `old_nama_lengkap`, `new_nama_lengkap`, `old_password`, `new_password`) VALUES
(1, '2022-12-09 17:16:43', 'update', 'root@localhost', 1, 'admin_budi', 'admin_budi', 'Budi', 'Budi', '1234567', '1234567'),
(2, '2022-12-09 17:16:58', 'update', 'root@localhost', 2, 'admin_budi', 'admin_budi', 'Budi', 'Budi', '1234567', '1234567'),
(4, '2022-12-13 17:09:39', 'insert', 'root@localhost', 4, '-', 'admin_bunga', '-', 'Ade Bunga Dwi Setiayu', '-', '12345678'),
(5, '2022-12-13 17:13:17', 'update', 'root@localhost', 4, 'admin_bunga', 'admin_ade', 'Ade Bunga Dwi Setiayu', 'Ade Bunga Dwi Setiayu', '12345678', '250403'),
(6, '2022-12-13 17:15:20', 'delete', 'root@localhost', 4, 'admin_ade', '-', 'Ade Bunga Dwi Setiayu', '-', '250403', '-'),
(8, '2023-01-06 11:29:08', 'update', 'root@localhost', 1, 'admin_budi', 'admin_budi', 'Budi', 'Budi', '1234567', 'fcea920f7412b5da7be0cf42b8c93759'),
(9, '2023-01-06 11:30:09', 'update', 'root@localhost', 1, 'admin_budi', 'admin_budi', 'Budi', 'Budi', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759'),
(10, '2023-01-13 05:45:48', 'update', 'root@localhost', 1, 'admin_budi', 'admin_budi', 'Budi', 'Budi', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759'),
(11, '2023-01-13 05:55:02', 'update', 'admin_smpn6@localhost', 1, 'admin_budi', 'admin_budi', 'Budi', 'Budi', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759'),
(12, '2023-01-13 13:08:49', 'update', 'admin_smpn6@localhost', 1, 'admin_budi', 'admin_budi', 'Budi', 'Budi', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759');

--
-- Triggers `log_akun_admin`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_akun_admin` BEFORE DELETE ON `log_akun_admin` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_akun_admin` BEFORE UPDATE ON `log_akun_admin` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_akun_guru`
--

CREATE TABLE `log_akun_guru` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_akun_guru` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `old_username` varchar(15) NOT NULL,
  `new_username` varchar(15) NOT NULL,
  `old_password` varchar(50) NOT NULL,
  `new_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_akun_guru`
--

INSERT INTO `log_akun_guru` (`id_log`, `waktu`, `aksi`, `who`, `id_akun_guru`, `id_guru`, `old_username`, `new_username`, `old_password`, `new_password`) VALUES
(1, '2022-12-09 17:26:01', 'insert', 'root@localhost', 1, 1, '-', 'admin2', '-', '12345678'),
(4, '2022-12-13 17:24:21', 'insert', 'root@localhost', 2, 2, '-', 'debora', '-', '12345678'),
(5, '2022-12-13 17:26:41', 'update', 'root@localhost', 2, 2, 'debora', 'deboranap', '12345678', '12345678'),
(6, '2022-12-13 17:29:14', 'delete', 'root@localhost', 2, 2, 'deboranap', '-', '12345678', '-'),
(8, '2022-12-31 11:06:10', 'insert', 'root@localhost', 3, 4, '-', '123456789181881', '-', '123456789181881918'),
(9, '2022-12-31 11:43:34', 'update', 'root@localhost', 3, 4, '123456789181881', '123456789181881', '123456789181881918', 'adebunga'),
(10, '2022-12-31 11:43:46', 'update', 'root@localhost', 3, 4, '123456789181881', '123456789181881', 'adebunga', '123456789181881918'),
(11, '2023-01-03 11:19:16', 'insert', 'root@localhost', 4, 8, '-', '200002272005012', '-', '200002272005012005'),
(12, '2023-01-03 11:42:22', 'update', 'root@localhost', 3, 4, '123456789181881', 'guru_ade', '123456789181881918', '123456789181881918'),
(13, '2023-01-03 11:43:10', 'update', 'root@localhost', 3, 4, 'guru_ade', 'guru_ade', '123456789181881918', '1234567'),
(14, '2023-01-06 11:13:59', 'update', 'root@localhost', 3, 4, 'guru_ade', 'guru_ade', '1234567', 'fcea920f7412b5da7be0cf42b8c93759'),
(15, '2023-01-06 11:14:04', 'update', 'root@localhost', 4, 8, '200002272005012', '200002272005012', '200002272005012005', '455a3e8540f09fc90ac403196f97e7f4'),
(16, '2023-01-06 11:16:48', 'update', 'root@localhost', 3, 4, 'guru_ade', 'guru_ade', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759'),
(17, '2023-01-06 11:17:58', 'update', 'root@localhost', 3, 4, 'guru_ade', 'guru_ade', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759'),
(22, '2023-01-07 03:42:10', 'insert', 'root@localhost', 1, 1, '-', 'admin2', '-', '12345678'),
(24, '2023-01-13 05:45:01', 'update', 'guru_smpn6@localhost', 3, 4, 'guru_ade', 'guru_ade', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759');

--
-- Triggers `log_akun_guru`
--
DELIMITER $$
CREATE TRIGGER `cant_update_log_akun_guru` BEFORE UPDATE ON `log_akun_guru` FOR EACH ROW BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_asal_mula`
--

CREATE TABLE `log_asal_mula` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_asal_mula` int(11) NOT NULL,
  `id_siswa` char(5) NOT NULL,
  `old_nama_sd` varchar(35) NOT NULL,
  `new_nama_sd` varchar(35) NOT NULL,
  `old_diterima_sd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `new_diterima_sd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `old_tamat_sd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `new_tamat_sd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_asal_mula`
--

INSERT INTO `log_asal_mula` (`id_log`, `waktu`, `aksi`, `who`, `id_asal_mula`, `id_siswa`, `old_nama_sd`, `new_nama_sd`, `old_diterima_sd`, `new_diterima_sd`, `old_tamat_sd`, `new_tamat_sd`) VALUES
(1, '2022-12-13 17:37:59', 'insert', 'root@localhost', 2, '-', '1', 'SDN 102088', '0000-00-00 00:00:00', '2016-06-26 17:00:00', '0000-00-00 00:00:00', '2022-07-03 17:00:00'),
(2, '2022-12-13 17:43:49', 'update', 'root@localhost', 2, '1', 'SDN 102088', 'SDN 102088', '2016-06-26 17:00:00', '2016-06-26 17:00:00', '2022-07-03 17:00:00', '2022-07-03 17:00:00'),
(3, '2022-12-14 01:26:48', 'delete', 'root@localhost', 1, '3', 'SD Negeri 168234 Tebingtinggi', '-', '2014-06-09 17:00:00', '0000-00-00 00:00:00', '2020-07-16 17:00:00', '0000-00-00 00:00:00');

--
-- Triggers `log_asal_mula`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_asal_mula` BEFORE DELETE ON `log_asal_mula` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_asal_mula` BEFORE UPDATE ON `log_asal_mula` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_ekstrakurikuler`
--

CREATE TABLE `log_ekstrakurikuler` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_ekskul` int(11) NOT NULL,
  `old_nama_ekskul` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `new_nama_ekskul` varchar(35) NOT NULL,
  `id_guru` int(8) NOT NULL,
  `old_keterangan` text NOT NULL,
  `new_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_ekstrakurikuler`
--

INSERT INTO `log_ekstrakurikuler` (`id_log`, `waktu`, `aksi`, `who`, `id_ekskul`, `old_nama_ekskul`, `new_nama_ekskul`, `id_guru`, `old_keterangan`, `new_keterangan`) VALUES
(1, '2022-12-14 01:36:09', 'insert', 'root@localhost', 2, '-', 'Paskibraka', 2, '-', 'PASKIBRA bertugas dalam kegiatan upacara bendera. PASKIBRA umumnya ada di setiap sekolah umum baik negeri maupun swasta. Sehingga PASKIBRA dapat diartikan sebagai sekelompok peserta didik yang bertugas untuk mengibarkan bendera merah putih pada hari Senin atau hari-hari besar.'),
(2, '2022-12-14 01:38:37', 'delete', 'root@localhost', 2, 'Paskibraka', '-', 2, 'PASKIBRA bertugas dalam kegiatan upacara bendera. PASKIBRA umumnya ada di setiap sekolah umum baik negeri maupun swasta. Sehingga PASKIBRA dapat diartikan sebagai sekelompok peserta didik yang bertugas untuk mengibarkan bendera merah putih pada hari Senin atau hari-hari besar.', '-'),
(3, '2022-12-14 01:45:49', 'update', 'root@localhost', 1, 'Paskibra', 'Paskibra', 1, 'Kegiatan ekstrakurikuler paskibra dapat meningkatkan nilai penting dalam diri siswa, contohnya : kedisiplinan, cinta tanah air, patriotisme, dan tanggung jawab.', 'Kegiatan ekstrakurikuler paskibra dapat meningkatkan nilai penting dalam diri siswa, contohnya : kedisiplinan, cinta tanah air, patriotisme, dan tanggung jawab.'),
(4, '2022-12-27 08:17:07', 'insert', 'root@localhost', 3, '-', 'Palang Merah Reamaja(PMR)', 8, '-', 'Ekstrakurikuler ini bertujuan untuk melatih dan membentuk jiwa kemanusiaan para anggota agar memiliki kepedulian yang tinggi terhadap kemanusiaan sejak usia dini, menjadi individu yang lebih mampu berempati dengan individu lainnya.'),
(5, '2022-12-27 08:17:20', 'update', 'root@localhost', 3, 'Palang Merah Reamaja(PMR)', 'Palang Merah Remaja(PMR)', 8, 'Ekstrakurikuler ini bertujuan untuk melatih dan membentuk jiwa kemanusiaan para anggota agar memiliki kepedulian yang tinggi terhadap kemanusiaan sejak usia dini, menjadi individu yang lebih mampu berempati dengan individu lainnya.', 'Ekstrakurikuler ini bertujuan untuk melatih dan membentuk jiwa kemanusiaan para anggota agar memiliki kepedulian yang tinggi terhadap kemanusiaan sejak usia dini, menjadi individu yang lebih mampu berempati dengan individu lainnya.'),
(6, '2022-12-27 08:17:30', 'update', 'root@localhost', 3, 'Palang Merah Remaja(PMR)', 'Palang Merah Remaja (PMR)', 8, 'Ekstrakurikuler ini bertujuan untuk melatih dan membentuk jiwa kemanusiaan para anggota agar memiliki kepedulian yang tinggi terhadap kemanusiaan sejak usia dini, menjadi individu yang lebih mampu berempati dengan individu lainnya.', 'Ekstrakurikuler ini bertujuan untuk melatih dan membentuk jiwa kemanusiaan para anggota agar memiliki kepedulian yang tinggi terhadap kemanusiaan sejak usia dini, menjadi individu yang lebih mampu berempati dengan individu lainnya.'),
(7, '2022-12-27 14:47:25', 'insert', 'root@localhost', 4, '-', 'Sepak Bola', 9, '-', 'Ekstrakurikuler ini berfungsi sebagai wadah siswa siswi untuk mengembangkan bakat dan minatnya dalam bidang olahraga sepak bola.'),
(8, '2022-12-27 14:54:49', 'insert', 'root@localhost', 5, '-', 'Dojo', 10, '-', 'Ekstrakurikuler ini dapat berfungsi sebagai wadah siswa untuk menyalurkan bakat, hobi, sekaligus melatih keterampilan di bidang olahraga. Selain itu, juga untuk melatih mentalitas dan kedisiplinan diri.'),
(9, '2022-12-27 14:55:40', 'update', 'root@localhost', 1, 'Paskibra', 'Paskibra', 2, 'Kegiatan ekstrakurikuler paskibra dapat meningkatkan nilai penting dalam diri siswa, contohnya : kedisiplinan, cinta tanah air, patriotisme, dan tanggung jawab.', 'Kegiatan ekstrakurikuler paskibra dapat meningkatkan nilai penting dalam diri siswa, contohnya : kedisiplinan, cinta tanah air, patriotisme, dan tanggung jawab.'),
(10, '2022-12-27 15:01:59', 'insert', 'root@localhost', 6, '-', 'Pramuka', 6, '-', 'Ekstrakurikuler ini berfungsi sebagai salah satu wahana pengembangan bagi generasi muda Indonesia termasuk siswa-siswi. Gerakan pramuka ini dapat membentuk generasi yang tangguh, berbudi luhur dengan mengedepankan semangat persatuan dan kesatuan serta cinta tanah air.'),
(11, '2022-12-27 15:08:20', 'insert', 'root@localhost', 7, '-', 'Voli', 10, '-', 'Ekstrakurikuler ini berfungsi sebagai salah satu wadah penyaluran minat dan bakat siswa siswi dalam bidang olahraga'),
(12, '2022-12-27 15:08:31', 'update', 'root@localhost', 5, 'Dojo', 'Dojo', 10, 'Ekstrakurikuler ini dapat berfungsi sebagai wadah siswa untuk menyalurkan bakat, hobi, sekaligus melatih keterampilan di bidang olahraga. Selain itu, juga untuk melatih mentalitas dan kedisiplinan diri.', 'Ekstrakurikuler ini dapat berfungsi sebagai wadah siswa untuk menyalurkan bakat, hobi, sekaligus melatih keterampilan di bidang olahraga. Selain itu, juga untuk melatih mentalitas dan kedisiplinan diri.');

--
-- Triggers `log_ekstrakurikuler`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_ekstrakurikuler` BEFORE DELETE ON `log_ekstrakurikuler` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_ekstrakurikuler` BEFORE UPDATE ON `log_ekstrakurikuler` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_fasilitas`
--

CREATE TABLE `log_fasilitas` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `old_judul` varchar(30) NOT NULL,
  `new_judul` varchar(30) NOT NULL,
  `old_deskripsi` text NOT NULL,
  `new_deskripsi` text NOT NULL,
  `old_gambar` varchar(25) DEFAULT NULL,
  `new_gambar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_fasilitas`
--

INSERT INTO `log_fasilitas` (`id_log`, `waktu`, `aksi`, `who`, `id_fasilitas`, `old_judul`, `new_judul`, `old_deskripsi`, `new_deskripsi`, `old_gambar`, `new_gambar`) VALUES
(1, '2022-12-07 01:27:26', 'insert', 'root@localhost', 3, '-', 'Lapangan', '-', 'Kami mempunyai lapangan yang bisa digunakan untuk berbagai kegiatan', '-', 'NULL'),
(2, '2022-12-14 02:07:34', 'insert', 'root@localhost', 6, '-', 'Kolam Renang', '-', 'Kolam Renang di SMPN 6 adalah salah satu fasilitas unggulan, karena tidak semua sekolah memiliki fasilitas ini. ', '-', 'NULL'),
(3, '2022-12-14 02:12:54', 'update', 'root@localhost', 6, 'Kolam Renang', 'Kolam Renang Sekolah', 'Kolam Renang di SMPN 6 adalah salah satu fasilitas unggulan, karena tidak semua sekolah memiliki fasilitas ini. ', 'Kolam Renang di SMPN 6 adalah salah satu fasilitas unggulan, karena tidak semua sekolah memiliki fasilitas ini. ', 'NULL', 'NULL'),
(4, '2022-12-14 02:14:48', 'delete', 'root@localhost', 6, 'Kolam Renang Sekolah', '-', 'Kolam Renang di SMPN 6 adalah salah satu fasilitas unggulan, karena tidak semua sekolah memiliki fasilitas ini. ', '-', 'NULL', '-'),
(5, '2022-12-22 02:08:50', 'update', 'root@localhost', 3, 'Lapangan', 'Lapangan', 'Kami mempunyai lapangan yang bisa digunakan untuk berbagai kegiatan', 'Kami mempunyai lapangan yang bisa digunakan untuk berbagai kegiatan sekolah', 'NULL', 'NULL'),
(6, '2022-12-22 02:14:27', 'insert', 'root@localhost', 8, '-', 'Lapangan Voli', '-', 'Terdapat sebuah lapangan voli di halaman bagian belakang sekolah', '-', ''),
(7, '2022-12-22 02:16:08', 'update', 'root@localhost', 8, 'Lapangan Voli', 'Lapangan Voli', 'Terdapat sebuah lapangan voli di halaman bagian belakang sekolah', 'Terdapat sebuah lapangan voli di halaman belakang sekolah', '', 'NULL'),
(8, '2022-12-22 10:45:10', 'update', 'root@localhost', 3, 'Lapangan', 'Lapangan', 'Kami mempunyai lapangan yang bisa digunakan untuk berbagai kegiatan sekolah', 'Kami mempunyai lapangan yang bisa digunakan untuk berbagai kegiatan sekolah', 'NULL', ''),
(9, '2022-12-22 10:45:29', 'update', 'root@localhost', 8, 'Lapangan Voli', 'Lapangan Voli', 'Terdapat sebuah lapangan voli di halaman belakang sekolah', 'Terdapat sebuah lapangan voli di halaman belakang sekolah', 'NULL', ''),
(10, '2022-12-22 11:18:44', 'insert', 'root@localhost', 9, '-', 'Perpustakaan', '-', 'Kami mempunyai banyak koleksi buku di perpustakaan', '-', 'kegiatan1671707924.jpg'),
(11, '2022-12-22 11:20:02', 'update', 'root@localhost', 9, 'Perpustakaan', 'Perpustakaan', 'Kami mempunyai banyak koleksi buku di perpustakaan', 'Kami mempunyai banyak koleksi buku di perpustakaan', 'kegiatan1671707924.jpg', 'fasilitas1671708002.jpg'),
(12, '2022-12-22 11:20:13', 'update', 'root@localhost', 9, 'Perpustakaan', 'Perpustakaan', 'Kami mempunyai banyak koleksi buku di perpustakaan', 'Kami mempunyai banyak koleksi buku di perpustakaan', 'fasilitas1671708002.jpg', 'fasilitas1671708013.jpg'),
(13, '2022-12-22 11:22:07', 'update', 'root@localhost', 8, 'Lapangan Voli', 'Lapangan Voli', 'Terdapat sebuah lapangan voli di halaman belakang sekolah', 'Terdapat sebuah lapangan voli di halaman belakang sekolah', '', 'fasilitas1671708127.jpg'),
(14, '2022-12-22 11:23:51', 'update', 'root@localhost', 1, 'Perpustakaan', 'Lab Komputer', 'Kami mempunyai perpustakaan yang mengoleksi banyak buku.', 'Kami mempunyai 2 ruangan laboratorium yaitu lab komputer', NULL, 'fasilitas1671708231.jpg'),
(15, '2022-12-22 11:23:58', 'delete', 'root@localhost', 3, 'Lapangan', '-', 'Kami mempunyai lapangan yang bisa digunakan untuk berbagai kegiatan sekolah', '-', '', '-');

--
-- Triggers `log_fasilitas`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_fasilitas` BEFORE DELETE ON `log_fasilitas` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_fasilitas` BEFORE UPDATE ON `log_fasilitas` FOR EACH ROW BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_guru`
--

CREATE TABLE `log_guru` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `old_nip` char(18) NOT NULL,
  `new_nip` char(18) NOT NULL,
  `old_nama_lengkap` varchar(50) NOT NULL,
  `new_nama_lengkap` varchar(50) NOT NULL,
  `old_jk` enum('L','P') NOT NULL,
  `new_jk` enum('L','P') NOT NULL,
  `old_tempat_lahir` varchar(20) NOT NULL,
  `new_tempat_lahir` varchar(20) NOT NULL,
  `old_tanggal_lahir` date NOT NULL,
  `new_tanggal_lahir` date NOT NULL,
  `old_agama` enum('Islam','Katolik','Protestan','Budha','Konghucu','Hindu') NOT NULL,
  `new_agama` enum('Islam','Katolik','Protestan','Budha','Konghucu','Hindu') NOT NULL,
  `old_gol_darah` enum('O','A','B','AB') NOT NULL,
  `new_gol_darah` enum('O','A','B','AB') NOT NULL,
  `old_jenjang` varchar(3) NOT NULL,
  `new_jenjang` varchar(3) NOT NULL,
  `old_no_hp` char(15) NOT NULL,
  `new_no_hp` char(15) NOT NULL,
  `old_foto` varchar(30) DEFAULT NULL,
  `new_foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_guru`
--

INSERT INTO `log_guru` (`id_log`, `waktu`, `aksi`, `who`, `id_guru`, `old_nip`, `new_nip`, `old_nama_lengkap`, `new_nama_lengkap`, `old_jk`, `new_jk`, `old_tempat_lahir`, `new_tempat_lahir`, `old_tanggal_lahir`, `new_tanggal_lahir`, `old_agama`, `new_agama`, `old_gol_darah`, `new_gol_darah`, `old_jenjang`, `new_jenjang`, `old_no_hp`, `new_no_hp`, `old_foto`, `new_foto`) VALUES
(1, '2022-12-13 12:46:54', 'insert', 'root@localhost', 4, '-', '123456789181881918', '-', 'Ade Bunga', '', 'P', '-', 'Pabatu', '0000-00-00', '2012-12-06', '', 'Islam', '', 'O', '-', 'S1', '-', '020089998332', '-', 'NULL'),
(2, '2022-12-15 11:43:49', 'insert', 'root@localhost', 5, '-', '123456789101234567', '-', 'Teresia Tabita', '', 'P', '-', 'Medan', '0000-00-00', '2012-12-12', '', 'Protestan', '', 'O', '-', 'S1', '-', '082230756678', '-', 'NULL'),
(3, '2022-12-15 12:02:45', 'update', 'root@localhost', 5, '123456789101234567', '123456789101234567', 'Teresia Tabita', 'Teresia Tabita Lumbantoruan', 'P', 'P', 'Medan', 'Medan', '2012-12-12', '2012-12-12', 'Protestan', 'Protestan', 'O', 'O', 'S1', 'S1', '082230756678', '082230756678', 'NULL', 'NULL'),
(4, '2022-12-15 12:04:06', 'delete', 'root@localhost', 5, '123456789101234567', '-', 'Teresia Tabita Lumbantoruan', '-', 'P', '', 'Medan', '-', '2012-12-12', '0000-00-00', 'Protestan', '', 'O', '', 'S1', '-', '082230756678', '-', 'NULL', '-'),
(5, '2022-12-17 11:17:04', 'insert', 'root@localhost', 6, '-', '913243546789878675', '-', 'Teresia', '', 'P', '-', 'Pabatu', '0000-00-00', '2013-12-18', '', 'Islam', '', 'O', '-', 'S1', '-', '083156678976', '-', 'NULL'),
(6, '2022-12-27 08:12:14', 'insert', 'root@localhost', 8, '-', '200002272005012005', '-', 'Alwin Rusli', '', 'L', '-', 'Medan', '0000-00-00', '2000-02-27', '', '', '', 'O', '-', 'S1', '-', '086547778287', '-', NULL),
(7, '2022-12-27 14:43:15', 'insert', 'root@localhost', 9, '-', '199905201989032006', '-', 'Rafael Daniel', '', 'L', '-', 'Medan', '0000-00-00', '1999-05-20', '', 'Islam', '', 'B', '-', 'S1', '-', '0812633647485', '-', NULL),
(8, '2022-12-27 14:43:37', 'update', 'root@localhost', 8, '200002272005012005', '200002272005012005', 'Alwin Rusli', 'Alwin Rusli', 'L', 'L', 'Medan', 'Medan', '2000-02-27', '2000-02-27', '', 'Islam', 'O', 'O', 'S1', 'S1', '086547778287', '086547778287', NULL, NULL),
(9, '2022-12-27 14:43:53', 'update', 'root@localhost', 8, '200002272005012005', '200002272005012005', 'Alwin Rusli', 'Alwin Rusli', 'L', 'L', 'Medan', 'Medan', '2000-02-27', '2000-02-27', 'Islam', 'Islam', 'O', 'A', 'S1', 'S1', '086547778287', '086547778287', NULL, NULL),
(10, '2022-12-27 14:52:44', 'insert', 'root@localhost', 10, '-', '199009301989032006', '-', 'Garuda', '', 'L', '-', 'Medan', '0000-00-00', '1990-09-30', '', 'Islam', '', 'AB', '-', 'S1', '-', '082235565587', '-', NULL),
(11, '2022-12-27 15:06:25', 'insert', 'root@localhost', 11, '-', '199808221989032006', '-', 'Gilang', '', 'L', '-', 'Medan', '0000-00-00', '1998-08-22', '', 'Islam', '', 'A', '-', 'S1', '-', '0851455656567', '-', NULL),
(12, '2022-12-28 02:21:17', 'update', 'root@localhost', 4, '123456789181881918', '123456789181881918', 'Ade Bunga', 'Ade Bunga', 'P', 'P', 'Pabatu', 'Pabatu', '2012-12-06', '2012-12-06', 'Islam', 'Islam', 'O', 'O', 'S1', 'S1', '020089998332', '020089998332', 'NULL', ''),
(13, '2022-12-28 02:21:39', 'update', 'root@localhost', 6, '913243546789878675', '913243546789878675', 'Teresia', 'Teresia', 'P', 'P', 'Pabatu', 'Pabatu', '2013-12-18', '2013-12-18', 'Islam', 'Islam', 'O', 'O', 'S1', 'S1', '083156678976', '081356678976', 'NULL', ''),
(14, '2022-12-28 02:21:54', 'update', 'root@localhost', 4, '123456789181881918', '123456789181881918', 'Ade Bunga', 'Ade Bunga', 'P', 'P', 'Pabatu', 'Pabatu', '2012-12-06', '2012-12-06', 'Islam', 'Islam', 'O', 'O', 'S1', 'S1', '020089998332', '082089998332', '', '');

--
-- Triggers `log_guru`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_guru` BEFORE DELETE ON `log_guru` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_guru` BEFORE UPDATE ON `log_guru` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_kegiatan`
--

CREATE TABLE `log_kegiatan` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `old_judul` text NOT NULL,
  `new_judul` text NOT NULL,
  `old_deskripsi` text NOT NULL,
  `new_deskripsi` text NOT NULL,
  `old_tanggal` date NOT NULL,
  `new_tanggal` date NOT NULL,
  `old_gambar` varchar(25) DEFAULT NULL,
  `new_gambar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_kegiatan`
--

INSERT INTO `log_kegiatan` (`id_log`, `waktu`, `aksi`, `who`, `id_kegiatan`, `old_judul`, `new_judul`, `old_deskripsi`, `new_deskripsi`, `old_tanggal`, `new_tanggal`, `old_gambar`, `new_gambar`) VALUES
(1, '2022-12-15 12:07:42', 'insert', 'root@localhost', 10, '-', 'Upacara Bendera', '-', 'Upacara Bendera rutin diadakan setiap hari senin. \r\nUntuk upacara senin, 14 November 2022, pembina upacara adalah Bapak Sayuti.', '0000-00-00', '2022-11-14', '-', 'NULL'),
(2, '2022-12-15 12:10:17', 'update', 'root@localhost', 10, 'Upacara Bendera', 'Upacara Bendera Rutin\r\n', 'Upacara Bendera rutin diadakan setiap hari senin. \r\nUntuk upacara senin, 14 November 2022, pembina upacara adalah Bapak Sayuti.', 'Upacara Bendera rutin diadakan setiap hari senin. \r\nUntuk upacara senin, 14 November 2022, pembina upacara adalah Bapak Sayuti.', '2022-11-14', '2022-11-14', 'NULL', 'NULL'),
(3, '2022-12-15 12:11:41', 'delete', 'root@localhost', 10, 'Upacara Bendera Rutin\r\n', '-', 'Upacara Bendera rutin diadakan setiap hari senin. \r\nUntuk upacara senin, 14 November 2022, pembina upacara adalah Bapak Sayuti.', '-', '2022-11-14', '0000-00-00', 'NULL', '-'),
(4, '2022-12-27 15:22:45', 'update', 'root@localhost', 1, 'Pendaftaran Siswa Baru SMP Negeri 6 Tebing tinggi ', 'Kegiatan Dokter Remaja SMP Negeri 6 Tebing Tinggi', 'Pendaftaran Siswa Baru SMP Negeri 6 Tebing tinggi T.P. 2022/2023 dibuka mulai tanggal 23 Mei - 08 Juni 2022.', 'Membahas pentingnya untuk mencegah anemia pada remaja dengan konsumsi obat/ tablet tambah darah (TTD)', '2022-03-05', '2022-08-02', NULL, 'kegiatan1672154565.jpg'),
(10, '2023-01-07 06:30:10', 'insert', 'root@localhost', 12, '-', 'Kegiatan1', '-', 'Kegiatan siswa', '0000-00-00', '2022-08-09', '-', NULL),
(12, '2023-01-07 06:30:38', 'insert', 'root@localhost', 12, '-', 'Kegiatan1', '-', 'Kegiatan siswa', '0000-00-00', '2022-08-09', '-', '');

--
-- Triggers `log_kegiatan`
--
DELIMITER $$
CREATE TRIGGER `cant_update_log_kegiatan` BEFORE UPDATE ON `log_kegiatan` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_kepala_sekolah`
--

CREATE TABLE `log_kepala_sekolah` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_kepala_sekolah` int(11) NOT NULL,
  `old_nama_lengkap` varchar(50) NOT NULL,
  `new_nama_lengkap` varchar(50) NOT NULL,
  `old_nip` char(18) NOT NULL,
  `new_nip` char(18) NOT NULL,
  `old_jk` enum('L','P') NOT NULL,
  `new_jk` enum('L','P') NOT NULL,
  `old_tempat_lahir` text NOT NULL,
  `new_tempat_lahir` text NOT NULL,
  `old_tanggal_lahir` date NOT NULL,
  `new_tanggal_lahir` date NOT NULL,
  `old_agama` enum('Islam','Katolik','Protestan','Budha','Konghucu','Hindu') NOT NULL,
  `new_agama` enum('Islam','Katolik','Protestan','Budha','Konghucu','Hindu') NOT NULL,
  `old_jenjang` char(3) NOT NULL,
  `new_jenjang` char(3) NOT NULL,
  `old_masa_jabatan` text NOT NULL,
  `new_masa_jabatan` text NOT NULL,
  `old_foto` varchar(30) DEFAULT NULL,
  `new_foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_kepala_sekolah`
--

INSERT INTO `log_kepala_sekolah` (`id_log`, `waktu`, `aksi`, `who`, `id_kepala_sekolah`, `old_nama_lengkap`, `new_nama_lengkap`, `old_nip`, `new_nip`, `old_jk`, `new_jk`, `old_tempat_lahir`, `new_tempat_lahir`, `old_tanggal_lahir`, `new_tanggal_lahir`, `old_agama`, `new_agama`, `old_jenjang`, `new_jenjang`, `old_masa_jabatan`, `new_masa_jabatan`, `old_foto`, `new_foto`) VALUES
(1, '2022-12-15 13:04:51', 'insert', 'root@localhost', 4, '-', 'Alwin Rusli', '-', '', '', 'L', '-', 'Medan', '0000-00-00', '2012-12-06', '', '', '-', 'S2', '-', '5 tahun', '-', 'NULL'),
(2, '2022-12-15 13:09:47', 'update', 'root@localhost', 4, 'Alwin Rusli', 'Alwin Rusli', '', '123456789101234567', 'L', 'L', 'Medan', 'Tebing Tinggi', '2012-12-06', '2012-12-06', '', '', 'S2', 'S2', '5 tahun', '5 tahun', 'NULL', 'NULL'),
(3, '2022-12-15 13:14:42', 'delete', 'root@localhost', 4, 'Alwin Rusli', '-', '123456789101234567', '-', 'L', '', 'Tebing Tinggi', '-', '2012-12-06', '0000-00-00', '', '', 'S2', '-', '5 tahun', '-', 'NULL', '-'),
(4, '2022-12-18 02:49:43', 'insert', 'root@localhost', 5, '-', 'Gilang Akbar', '-', '98765432123456789', '', 'L', '-', 'Medan', '0000-00-00', '2012-12-12', '', '', '-', 'S1', '-', '5 tahun', '-', ''),
(5, '2022-12-28 02:28:34', 'update', 'root@localhost', 5, 'Gilang Akbar', 'Gilang Akbar', '98765432123456789', '98765432123456789', 'L', 'L', 'Medan', 'Medan', '2012-12-12', '2012-12-12', '', '', 'S1', 'S1', '5 tahun', '5 tahun', '', '');

--
-- Triggers `log_kepala_sekolah`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_kepala_sekolah` BEFORE DELETE ON `log_kepala_sekolah` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_kepala_sekolah` BEFORE UPDATE ON `log_kepala_sekolah` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_mata_pelajaran`
--

CREATE TABLE `log_mata_pelajaran` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `old_nama_mapel` varchar(25) NOT NULL,
  `new_nama_mapel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_mata_pelajaran`
--

INSERT INTO `log_mata_pelajaran` (`id_log`, `waktu`, `aksi`, `who`, `id_mapel`, `old_nama_mapel`, `new_nama_mapel`) VALUES
(2, '2022-12-15 13:18:57', 'insert', 'root@localhost', 2, '-', 'Seni Budaya'),
(3, '2022-12-15 13:20:30', 'update', 'root@localhost', 2, 'Seni Budaya', 'Matematika'),
(4, '2022-12-15 13:21:10', 'delete', 'root@localhost', 2, 'Matematika', '-'),
(5, '2022-12-24 10:40:06', 'update', 'root@localhost', 1, 'Bahasa Indonesia', 'Pendidikan Agama dan Budi'),
(6, '2022-12-24 10:43:01', 'insert', 'root@localhost', 3, '-', 'Pendidikan Pancasila dan '),
(7, '2022-12-24 10:44:13', 'insert', 'root@localhost', 4, '-', 'Bahasa Indonesia'),
(8, '2022-12-25 09:52:44', 'insert', 'root@localhost', 5, '-', 'Matematika'),
(9, '2022-12-25 09:56:03', 'insert', 'root@localhost', 6, '-', 'Ilmu Pengetahuan Alam'),
(10, '2022-12-25 10:34:32', 'insert', 'root@localhost', 7, '-', 'Ilmu Pengetahuan Sosial'),
(11, '2022-12-25 10:34:50', 'insert', 'root@localhost', 8, '-', 'Bahasa Inggris'),
(12, '2022-12-25 10:35:38', 'insert', 'root@localhost', 9, '-', 'Seni Budaya'),
(13, '2022-12-25 10:43:13', 'update', 'root@localhost', 9, 'Seni Budaya', 'Seni Budaya'),
(14, '2022-12-25 10:43:52', 'insert', 'root@localhost', 10, '-', 'Penjas'),
(15, '2022-12-25 10:51:25', 'update', 'root@localhost', 10, 'Penjas', 'Pendidikan Jasmani, Olah '),
(16, '2022-12-25 10:56:09', 'insert', 'root@localhost', 11, '-', 'Prakarya');

--
-- Triggers `log_mata_pelajaran`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_mapel` BEFORE DELETE ON `log_mata_pelajaran` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_mapel` BEFORE UPDATE ON `log_mata_pelajaran` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_nilai_siswa`
--

CREATE TABLE `log_nilai_siswa` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_nilai_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_tahunajar` int(11) NOT NULL,
  `old_nilai_pengetahuan` int(11) NOT NULL,
  `new_nilai_pengetahuan` int(11) NOT NULL,
  `old_nilai_keterampilan` int(11) NOT NULL,
  `new_nilai_keterampilan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_nilai_siswa`
--

INSERT INTO `log_nilai_siswa` (`id_log`, `waktu`, `aksi`, `who`, `id_nilai_siswa`, `id_siswa`, `id_mapel`, `id_tahunajar`, `old_nilai_pengetahuan`, `new_nilai_pengetahuan`, `old_nilai_keterampilan`, `new_nilai_keterampilan`) VALUES
(1, '2022-12-09 17:44:06', 'insert', 'root@localhost', 1, 1, 1, 6, 0, 80, 0, 0),
(2, '2022-12-09 17:44:10', 'insert', 'root@localhost', 2, 1, 1, 6, 0, 80, 0, 0),
(3, '2022-12-15 13:31:14', 'insert', 'root@localhost', 3, 1, 1, 6, 0, 70, 0, 0),
(4, '2022-12-15 13:32:50', 'delete', 'root@localhost', 3, 1, 1, 6, 70, 0, 0, 0),
(5, '2022-12-20 00:18:42', 'update', 'root@localhost', 1, 1, 1, 7, 80, 80, 0, 82),
(6, '2022-12-20 00:18:51', 'update', 'root@localhost', 2, 1, 1, 6, 80, 80, 0, 88),
(7, '2022-12-20 00:49:18', 'update', 'root@localhost', 1, 1, 1, 7, 80, 80, 82, 83),
(8, '2022-12-26 10:28:21', 'insert', 'root@localhost', 4, 1, 3, 6, 0, 90, 0, 79),
(9, '2022-12-31 10:06:25', 'insert', 'root@localhost', 5, 1, 8, 6, 0, 80, 0, 84),
(10, '2022-12-31 10:07:21', 'insert', 'root@localhost', 6, 1, 4, 6, 0, 89, 0, 70),
(11, '2022-12-31 10:07:42', 'insert', 'root@localhost', 7, 1, 6, 6, 0, 98, 0, 90),
(12, '2022-12-31 10:08:06', 'insert', 'root@localhost', 8, 1, 7, 6, 0, 88, 0, 83),
(13, '2022-12-31 10:08:23', 'insert', 'root@localhost', 9, 1, 5, 6, 0, 77, 0, 70),
(14, '2022-12-31 10:09:03', 'insert', 'root@localhost', 10, 1, 10, 6, 0, 95, 0, 95),
(15, '2022-12-31 10:09:58', 'insert', 'root@localhost', 11, 1, 11, 6, 0, 79, 0, 77),
(16, '2022-12-31 10:10:16', 'insert', 'root@localhost', 12, 1, 9, 6, 0, 85, 0, 80),
(17, '2023-01-07 11:50:45', 'update', 'root@localhost', 2, 1, 1, 6, 80, 80, 88, 87),
(18, '2023-01-07 11:54:24', 'delete', 'root@localhost', 1, 1, 1, 7, 80, 0, 83, 0),
(19, '2023-01-08 14:01:05', 'insert', 'root@localhost', 19, 1, 10, 10, 0, 80, 0, 85),
(20, '2023-01-08 14:09:33', 'update', 'root@localhost', 19, 1, 10, 10, 80, 85, 85, 90),
(21, '2023-01-08 14:11:24', 'delete', 'root@localhost', 19, 1, 10, 10, 85, 0, 90, 0);

--
-- Triggers `log_nilai_siswa`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_nilai_siswa` BEFORE DELETE ON `log_nilai_siswa` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_nilai_siswa` BEFORE UPDATE ON `log_nilai_siswa` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_orang_tua`
--

CREATE TABLE `log_orang_tua` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_ortu` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `old_nama_ayah` varchar(50) NOT NULL,
  `new_nama_ayah` varchar(50) NOT NULL,
  `old_nama_ibu` varchar(50) NOT NULL,
  `new_nama_ibu` varchar(50) NOT NULL,
  `old_pendidikan_ayah` varchar(3) NOT NULL,
  `new_pendidikan_ayah` varchar(3) NOT NULL,
  `old_pendidikan_ibu` varchar(3) NOT NULL,
  `new_pendidikan_ibu` varchar(3) NOT NULL,
  `old_tempat_lahir_ayah` varchar(35) NOT NULL,
  `new_tempat_lahir_ayah` varchar(35) NOT NULL,
  `old_tempat_lahir_ibu` varchar(35) NOT NULL,
  `new_tempat_lahir_ibu` varchar(35) NOT NULL,
  `old_tgl_lahir_ayah` date NOT NULL,
  `new_tgl_lahir_ayah` date NOT NULL,
  `old_tgl_lahir_ibu` date NOT NULL,
  `new_tgl_lahir_ibu` date NOT NULL,
  `old_pekerjaan_ayah` varchar(20) NOT NULL,
  `new_pekerjaan_ayah` varchar(20) NOT NULL,
  `old_pekerjaan_ibu` varchar(20) NOT NULL,
  `new_pekerjaan_ibu` varchar(20) NOT NULL,
  `old_nama_wali` varchar(50) DEFAULT NULL,
  `new_nama_wali` varchar(50) DEFAULT NULL,
  `old_pendidikan_wali` varchar(3) DEFAULT NULL,
  `new_pendidikan_wali` varchar(3) DEFAULT NULL,
  `old_hub_thd_siswa` varchar(20) DEFAULT NULL,
  `new_hub_thd_siswa` varchar(20) DEFAULT NULL,
  `old_pekerjaan_wali` varchar(20) DEFAULT NULL,
  `new_pekerjaan_wali` varchar(20) DEFAULT NULL,
  `old_no_hp` char(15) NOT NULL,
  `new_no_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_orang_tua`
--

INSERT INTO `log_orang_tua` (`id_log`, `waktu`, `aksi`, `who`, `id_ortu`, `id_siswa`, `old_nama_ayah`, `new_nama_ayah`, `old_nama_ibu`, `new_nama_ibu`, `old_pendidikan_ayah`, `new_pendidikan_ayah`, `old_pendidikan_ibu`, `new_pendidikan_ibu`, `old_tempat_lahir_ayah`, `new_tempat_lahir_ayah`, `old_tempat_lahir_ibu`, `new_tempat_lahir_ibu`, `old_tgl_lahir_ayah`, `new_tgl_lahir_ayah`, `old_tgl_lahir_ibu`, `new_tgl_lahir_ibu`, `old_pekerjaan_ayah`, `new_pekerjaan_ayah`, `old_pekerjaan_ibu`, `new_pekerjaan_ibu`, `old_nama_wali`, `new_nama_wali`, `old_pendidikan_wali`, `new_pendidikan_wali`, `old_hub_thd_siswa`, `new_hub_thd_siswa`, `old_pekerjaan_wali`, `new_pekerjaan_wali`, `old_no_hp`, `new_no_hp`) VALUES
(1, '2022-12-15 13:39:34', 'insert', 'root@localhost', 3, 4, '-', 'Junaidi', '-', 'Juni', '-', 'SMA', '-', 'SMA', '-', 'Binjai', '-', 'Binjai', '0000-00-00', '1980-12-01', '0000-00-00', '0000-00-00', '-', 'PNS', '-', 'PNS', '-', '-', '-', '-', '-', '-', '-', '-', '-', '083156678976'),
(2, '2022-12-15 13:41:43', 'update', 'root@localhost', 3, 4, 'Junaidi', 'Junaidi Siregar', 'Juni', 'Juni', 'SMA', 'SMA', '', 'SMA', 'Binjai', 'Binjai', 'Binjai', 'Binjai', '1980-12-01', '1980-12-01', '0000-00-00', '1980-12-01', 'PNS', 'PNS', 'PNS', 'PNS', '-', '-', '-', '-', '-', '-', '-', '-', '083156678976', '083156678976'),
(3, '2022-12-15 13:42:48', 'delete', 'root@localhost', 1, 3, 'Yasimadi', '-', 'Rinia', '-', 'S1', '-', '', '-', 'Tebing tinggi', '-', 'Pematangsiantar', '-', '1980-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 'Wiraswasta', '-', 'Ibu rumah tangga', '-', '', '-', '', '-', '', '-', '', '-', '081345342319', '-'),
(4, '2023-01-07 11:28:34', 'insert', 'root@localhost', 5, 1, '-', 'Susanto', '-', 'Siti Marwiyah', '-', 'S1', '-', 'S1', '-', 'Medan', '-', 'Medan', '0000-00-00', '1970-07-09', '0000-00-00', '1975-08-08', '-', 'Karyawan BUMN', '-', 'Ibu Rumah Tangga', '-', '', '-', NULL, '-', '', '-', '', '-', '0812556567677');

--
-- Triggers `log_orang_tua`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_ortu` BEFORE DELETE ON `log_orang_tua` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_ortu` BEFORE UPDATE ON `log_orang_tua` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_pelajaran_guru`
--

CREATE TABLE `log_pelajaran_guru` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_pelajaran_guru` int(11) NOT NULL,
  `old_id_guru` char(11) NOT NULL,
  `new_id_guru` char(11) NOT NULL,
  `old_id_mapel` char(11) NOT NULL,
  `new_id_mapel` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_pelajaran_guru`
--

INSERT INTO `log_pelajaran_guru` (`id_log`, `waktu`, `aksi`, `who`, `id_pelajaran_guru`, `old_id_guru`, `new_id_guru`, `old_id_mapel`, `new_id_mapel`) VALUES
(1, '2022-12-20 01:16:07', 'insert', 'root@localhost', 1, '-', '1', '-', '1'),
(2, '2022-12-27 08:21:33', 'insert', 'root@localhost', 2, '-', '4', '-', '4'),
(3, '2022-12-27 08:21:46', 'insert', 'root@localhost', 3, '-', '6', '-', '1'),
(4, '2022-12-27 08:21:56', 'insert', 'root@localhost', 4, '-', '8', '-', '10'),
(5, '2022-12-27 14:44:16', 'insert', 'root@localhost', 5, '-', '9', '-', '10'),
(6, '2023-01-08 06:53:54', 'insert', 'root@localhost', 10, '-', '2', '-', '11'),
(7, '2023-01-08 12:59:23', 'update', 'root@localhost', 10, '2', '2', '11', '10'),
(8, '2023-01-08 13:07:42', 'delete', 'root@localhost', 10, '2', '-', '10', '-');

--
-- Triggers `log_pelajaran_guru`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_pelajaran_guru` BEFORE DELETE ON `log_pelajaran_guru` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_pelajaran_guru` BEFORE UPDATE ON `log_pelajaran_guru` FOR EACH ROW BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_pengaturan_kelas`
--

CREATE TABLE `log_pengaturan_kelas` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_pengaturan_kelas` int(11) NOT NULL,
  `old_nama_kelas` char(3) NOT NULL,
  `new_nama_kelas` char(3) NOT NULL,
  `old_id_tahun_pelajaran` char(11) NOT NULL,
  `new_id_tahun_pelajaran` char(11) NOT NULL,
  `old_id_guru` char(11) NOT NULL,
  `new_id_guru` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_pengaturan_kelas`
--

INSERT INTO `log_pengaturan_kelas` (`id_log`, `waktu`, `aksi`, `who`, `id_pengaturan_kelas`, `old_nama_kelas`, `new_nama_kelas`, `old_id_tahun_pelajaran`, `new_id_tahun_pelajaran`, `old_id_guru`, `new_id_guru`) VALUES
(1, '2022-12-18 14:52:48', 'insert', 'root@localhost', 1, '-', '1', '-', '7', '-', '4'),
(3, '2022-12-18 14:52:48', 'insert', 'root@localhost', 2, '-', '1', '-', '7', '-', '4'),
(4, '2022-12-18 14:53:09', 'update', 'root@localhost', 2, '1', '1', '7', '7', '4', '2'),
(5, '2022-12-20 00:58:32', 'update', 'root@localhost', 2, '1', '1', '7', '7', '2', '1'),
(6, '2022-12-20 00:58:57', 'insert', 'root@localhost', 3, '-', '1', '-', '6', '-', '1'),
(7, '2022-12-25 13:19:58', 'update', 'root@localhost', 3, '7-1', '5', '6', '6', '1', '1'),
(8, '2022-12-25 13:20:25', 'update', 'root@localhost', 3, '5', '7-2', '6', '6', '1', '1'),
(9, '2022-12-25 13:20:31', 'update', 'root@localhost', 3, '7-2', '7-1', '6', '6', '1', '1'),
(10, '2022-12-25 13:25:45', 'insert', 'root@localhost', 4, '-', '5', '-', '6', '-', '2'),
(11, '2022-12-25 13:26:08', 'update', 'root@localhost', 4, '5', '7-2', '6', '6', '2', '2'),
(12, '2022-12-25 13:26:39', 'insert', 'root@localhost', 5, '-', '7-2', '-', '7', '-', '2'),
(13, '2023-01-01 06:35:12', 'insert', 'root@localhost', 6, '-', '7-3', '-', '6', '-', '4'),
(14, '2023-01-01 06:35:43', 'insert', 'root@localhost', 7, '-', '7-3', '-', '7', '-', '4'),
(15, '2023-01-06 09:29:55', 'insert', 'root@localhost', 8, '-', '7-1', '-', '9', '-', '8'),
(16, '2023-01-06 09:30:15', 'insert', 'root@localhost', 9, '-', '7-1', '-', '10', '-', '8'),
(17, '2023-01-07 04:39:04', 'insert', 'root@localhost', 10, '-', '8-1', '-', '9', '-', '9'),
(18, '2023-01-07 05:00:43', 'insert', 'root@localhost', 11, '-', '9-1', '-', '11', '-', '10'),
(19, '2023-01-07 05:01:40', 'insert', 'root@localhost', 12, '-', '9-1', '-', '12', '-', '4'),
(20, '2023-01-07 05:01:50', 'update', 'root@localhost', 11, '9-1', '9-1', '11', '11', '10', '4'),
(22, '2023-01-07 08:20:24', 'insert', 'root@localhost', 1, '-', '1', '-', '7', '-', '4'),
(23, '2023-01-07 08:20:42', 'delete', 'root@localhost', 1, '1', '-', '7', '-', '4', '-'),
(24, '2023-01-07 08:21:47', 'insert', 'root@localhost', 13, '-', '7-1', '-', '12', '-', '11'),
(26, '2023-01-07 17:06:51', 'insert', 'root@localhost', 14, '-', '9-3', '-', '11', '-', '9'),
(27, '2023-01-07 17:10:15', 'insert', 'root@localhost', 15, '-', '9-3', '-', '12', '-', '1'),
(28, '2023-01-08 13:45:17', 'insert', 'root@localhost', 21, '-', '8-3', '-', '10', '-', '10'),
(29, '2023-01-08 13:50:43', 'update', 'root@localhost', 21, '8-3', '8-2', '10', '10', '10', '11'),
(30, '2023-01-08 13:53:18', 'delete', 'root@localhost', 21, '8-2', '-', '10', '-', '11', '-');

--
-- Triggers `log_pengaturan_kelas`
--
DELIMITER $$
CREATE TRIGGER `cant_update_log_pengaturan_kelas` BEFORE UPDATE ON `log_pengaturan_kelas` FOR EACH ROW BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_pengaturan_kelas_siswa`
--

CREATE TABLE `log_pengaturan_kelas_siswa` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_pengaturan_kelas_siswa` int(11) NOT NULL,
  `old_id_pengaturan_kelas` char(11) NOT NULL,
  `new_id_pengaturan_kelas` char(11) NOT NULL,
  `old_id_siswa` char(11) NOT NULL,
  `new_id_siswa` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_pengaturan_kelas_siswa`
--

INSERT INTO `log_pengaturan_kelas_siswa` (`id_log`, `waktu`, `aksi`, `who`, `id_pengaturan_kelas_siswa`, `old_id_pengaturan_kelas`, `new_id_pengaturan_kelas`, `old_id_siswa`, `new_id_siswa`) VALUES
(1, '2022-12-18 15:58:45', 'insert', 'root@localhost', 1, '-', '2', '-', '4'),
(2, '2022-12-18 15:59:09', 'delete', 'root@localhost', 1, '2', '-', '4', '-'),
(3, '2022-12-20 01:06:59', 'insert', 'root@localhost', 2, '-', '2', '-', '1'),
(4, '2022-12-20 01:07:12', 'insert', 'root@localhost', 3, '-', '2', '-', '3'),
(5, '2022-12-21 11:37:25', 'insert', 'root@localhost', 4, '-', '3', '-', '4'),
(6, '2022-12-26 03:47:04', 'insert', 'root@localhost', 5, '-', '2', '-', '4'),
(7, '2022-12-26 03:48:07', 'insert', 'root@localhost', 6, '-', '4', '-', '4'),
(8, '2022-12-26 03:48:25', 'delete', 'root@localhost', 6, '4', '-', '4', '-'),
(9, '2022-12-26 04:35:32', 'insert', 'root@localhost', 7, '-', '5', '-', '1'),
(10, '2022-12-26 04:35:40', 'delete', 'root@localhost', 7, '5', '-', '1', '-'),
(11, '2022-12-26 04:36:09', 'insert', 'root@localhost', 8, '-', '4', '-', '4'),
(12, '2022-12-26 04:36:14', 'delete', 'root@localhost', 8, '4', '-', '4', '-'),
(13, '2022-12-26 05:26:48', 'insert', 'root@localhost', 9, '-', '4', '-', '1'),
(14, '2022-12-26 05:27:03', 'delete', 'root@localhost', 9, '4', '-', '1', '-'),
(15, '2022-12-26 05:32:41', 'insert', 'root@localhost', 10, '-', '3', '-', '1'),
(17, '2022-12-26 05:33:07', 'insert', 'root@localhost', 11, '-', '5', '-', '1'),
(18, '2022-12-26 05:33:14', 'delete', 'root@localhost', 11, '5', '-', '1', '-'),
(19, '2022-12-26 05:34:36', 'insert', 'root@localhost', 12, '-', '5', '-', '1'),
(20, '2022-12-26 05:34:47', 'delete', 'root@localhost', 12, '5', '-', '1', '-'),
(21, '2022-12-26 05:49:04', 'insert', 'root@localhost', 13, '-', '3', '-', '1'),
(22, '2022-12-26 05:49:10', 'delete', 'root@localhost', 13, '3', '-', '1', '-'),
(23, '2022-12-26 05:49:16', 'insert', 'root@localhost', 14, '-', '5', '-', '1'),
(24, '2022-12-26 05:49:32', 'delete', 'root@localhost', 14, '5', '-', '1', '-'),
(25, '2022-12-26 06:03:13', 'insert', 'root@localhost', 15, '-', '3', '-', '1'),
(26, '2022-12-26 06:03:18', 'delete', 'root@localhost', 15, '3', '-', '1', '-'),
(27, '2022-12-26 09:24:07', 'update', 'root@localhost', 3, '2', '5', '3', '3'),
(28, '2022-12-26 09:24:27', 'update', 'root@localhost', 3, '5', '5', '3', '1'),
(29, '2022-12-26 09:24:34', 'update', 'root@localhost', 3, '5', '5', '1', '3'),
(30, '2022-12-26 09:35:32', 'update', 'root@localhost', 3, '5', '5', '3', '1'),
(31, '2022-12-26 09:35:40', 'update', 'root@localhost', 3, '5', '5', '1', '3'),
(32, '2022-12-26 09:58:43', 'update', 'root@localhost', 3, '5', '2', '3', '3'),
(33, '2022-12-26 09:58:53', 'update', 'root@localhost', 3, '2', '5', '3', '3'),
(34, '2022-12-26 09:59:58', 'update', 'root@localhost', 2, '2', '5', '1', '1'),
(35, '2022-12-26 10:00:07', 'update', 'root@localhost', 2, '5', '2', '1', '1'),
(36, '2022-12-26 10:02:02', 'update', 'root@localhost', 3, '5', '2', '3', '3'),
(37, '2022-12-26 10:02:08', 'update', 'root@localhost', 3, '2', '5', '3', '3'),
(38, '2022-12-26 10:02:22', 'update', 'root@localhost', 3, '5', '5', '3', '1'),
(39, '2022-12-26 10:02:27', 'update', 'root@localhost', 3, '5', '5', '1', '3'),
(40, '2022-12-26 10:05:47', 'update', 'root@localhost', 3, '5', '2', '3', '3'),
(41, '2022-12-26 10:05:56', 'update', 'root@localhost', 3, '2', '5', '3', '3'),
(42, '2022-12-26 10:12:02', 'insert', 'root@localhost', 16, '-', '3', '-', '1'),
(43, '2023-01-05 12:02:35', 'update', 'root@localhost', 2, '2', '4', '1', '1'),
(44, '2023-01-05 12:03:03', 'update', 'root@localhost', 2, '4', '2', '1', '1'),
(45, '2023-01-05 12:10:14', 'update', 'root@localhost', 4, '3', '4', '4', '4'),
(46, '2023-01-05 12:10:14', 'update', 'root@localhost', 16, '3', '4', '1', '1'),
(47, '2023-01-05 12:11:04', 'update', 'root@localhost', 16, '4', '3', '1', '1'),
(48, '2023-01-05 12:11:16', 'update', 'root@localhost', 4, '4', '3', '4', '4'),
(49, '2023-01-05 12:14:14', 'update', 'root@localhost', 4, '3', '5', '4', '4'),
(50, '2023-01-05 12:18:02', 'update', 'root@localhost', 4, '5', '3', '4', '4'),
(51, '2023-01-06 09:30:41', 'insert', 'root@localhost', 17, '-', '8', '-', '1'),
(52, '2023-01-06 09:30:54', 'insert', 'root@localhost', 18, '-', '9', '-', '1'),
(53, '2023-01-07 04:39:48', 'update', 'root@localhost', 4, '3', '10', '4', '4'),
(54, '2023-01-07 04:39:48', 'update', 'root@localhost', 16, '3', '10', '1', '1'),
(55, '2023-01-07 04:41:20', 'update', 'root@localhost', 4, '10', '3', '4', '4'),
(56, '2023-01-07 04:41:20', 'update', 'root@localhost', 16, '10', '3', '1', '1'),
(58, '2023-01-07 04:47:41', 'update', 'root@localhost', 4, '3', '10', '4', '4'),
(59, '2023-01-07 04:47:41', 'update', 'root@localhost', 16, '3', '10', '1', '1'),
(60, '2023-01-07 04:48:08', 'update', 'root@localhost', 4, '10', '3', '4', '4'),
(61, '2023-01-07 04:48:08', 'update', 'root@localhost', 16, '10', '3', '1', '1'),
(62, '2023-01-07 05:04:33', 'update', 'root@localhost', 4, '3', '10', '4', '4'),
(63, '2023-01-07 05:04:33', 'update', 'root@localhost', 16, '3', '10', '1', '1'),
(64, '2023-01-07 05:05:03', 'update', 'root@localhost', 4, '10', '12', '4', '4'),
(65, '2023-01-07 05:05:03', 'update', 'root@localhost', 16, '10', '12', '1', '1'),
(67, '2023-01-07 09:00:41', 'insert', 'root@localhost', 17, '-', '8', '-', '1'),
(68, '2023-01-07 09:01:29', 'delete', 'root@localhost', 18, '9', '-', '1', '-'),
(69, '2023-01-07 11:52:47', 'insert', 'root@localhost', 19, '-', '3', '-', '1'),
(70, '2023-01-07 12:52:03', 'insert', 'root@localhost', 20, '-', '6', '-', '4'),
(71, '2023-01-07 12:52:11', 'insert', 'root@localhost', 21, '-', '6', '-', '5'),
(72, '2023-01-07 12:53:12', 'insert', 'root@localhost', 22, '-', '6', '-', '3'),
(73, '2023-01-07 17:07:38', 'update', 'root@localhost', 20, '6', '14', '4', '4'),
(74, '2023-01-07 17:07:38', 'update', 'root@localhost', 21, '6', '14', '5', '5'),
(75, '2023-01-07 17:07:38', 'update', 'root@localhost', 22, '6', '14', '3', '3'),
(76, '2023-01-07 17:11:14', 'update', 'root@localhost', 21, '14', '6', '5', '5'),
(77, '2023-01-07 17:11:14', 'update', 'root@localhost', 22, '14', '6', '3', '3'),
(78, '2023-01-07 17:12:37', 'update', 'root@localhost', 21, '6', '15', '5', '5'),
(79, '2023-01-07 17:12:37', 'update', 'root@localhost', 22, '6', '15', '3', '3'),
(80, '2023-01-07 17:17:00', 'update', 'root@localhost', 21, '15', '6', '5', '5'),
(81, '2023-01-07 17:17:00', 'update', 'root@localhost', 22, '15', '6', '3', '3'),
(82, '2023-01-07 17:17:31', 'update', 'root@localhost', 4, '12', '6', '4', '4'),
(83, '2023-01-07 17:19:10', 'update', 'root@localhost', 4, '6', '15', '4', '4'),
(84, '2023-01-07 17:19:10', 'update', 'root@localhost', 21, '6', '15', '5', '5'),
(85, '2023-01-07 17:19:10', 'update', 'root@localhost', 22, '6', '15', '3', '3');

--
-- Triggers `log_pengaturan_kelas_siswa`
--
DELIMITER $$
CREATE TRIGGER `cant_update_log_pengaturan_kelas_siswa` BEFORE UPDATE ON `log_pengaturan_kelas_siswa` FOR EACH ROW BEGIN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_prestasi`
--

CREATE TABLE `log_prestasi` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `who` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_prestasi` int(11) NOT NULL,
  `old_judul_prestasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `new_judul_prestasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `old_deskripsi_prestasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `new_deskripsi_prestasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `old_penyelenggara` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `new_penyelenggara` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `old_gambar` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `new_gambar` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_prestasi`
--

INSERT INTO `log_prestasi` (`id_log`, `waktu`, `aksi`, `who`, `id_prestasi`, `old_judul_prestasi`, `new_judul_prestasi`, `old_deskripsi_prestasi`, `new_deskripsi_prestasi`, `old_penyelenggara`, `new_penyelenggara`, `old_gambar`, `new_gambar`) VALUES
(1, '2022-12-15 14:19:30', 'insert', 'root@localhost', 2, '-', 'Adiwiyata 2020', '-', 'Adiwiyata, secara internasional disebut pula dengan Green School adalah salah satu program Kementerian Lingkungan Hidup dalam rangka mendorong terciptanya pengetahuan dan kesadaran warga sekolah dalam upaya pelestarian lingkungan hidup.', '-', 'Kementrian Lingkungan Hidup', '-', 'NULL'),
(2, '2022-12-15 14:21:57', 'update', 'root@localhost', 2, 'Adiwiyata 2020', 'Adiwiyata 2021\r\n', 'Adiwiyata, secara internasional disebut pula dengan Green School adalah salah satu program Kementerian Lingkungan Hidup dalam rangka mendorong terciptanya pengetahuan dan kesadaran warga sekolah dalam upaya pelestarian lingkungan hidup.', 'Adiwiyata, secara internasional disebut pula dengan Green School adalah salah satu program Kementerian Lingkungan Hidup dalam rangka mendorong terciptanya pengetahuan dan kesadaran warga sekolah dalam upaya pelestarian lingkungan hidup.', 'Kementrian Lingkungan Hidup', 'Kementrian Lingkungan Hidup', 'NULL', 'NULL'),
(3, '2022-12-15 14:24:00', 'delete', 'root@localhost', 2, 'Adiwiyata 2021\r\n', '-', 'Adiwiyata, secara internasional disebut pula dengan Green School adalah salah satu program Kementerian Lingkungan Hidup dalam rangka mendorong terciptanya pengetahuan dan kesadaran warga sekolah dalam upaya pelestarian lingkungan hidup.', '-', 'Kementrian Lingkungan Hidup', '-', 'NULL', '-'),
(4, '2022-12-22 11:41:05', 'update', 'root@localhost', 1, 'Juara 1 Futsal', 'Juara 1 Futsal', 'Pada tahun 2020, sekolah kami mendapatkan Juara 1 Futsal tingkat se-kota Tebing Tinggi yang diselenggarakan oleh Mulia Pratama Competition', 'Pada tahun 2020, sekolah kami mendapatkan Juara 1 Futsal tingkat se-kota Tebing Tinggi yang diselenggarakan oleh Mulia Pratama Competition', 'Mulia Pratama Competition', 'Mulia Pratama Competition', NULL, 'prestasi1671709265.png'),
(14, '2023-01-07 06:35:40', 'insert', 'root@localhost', 3, '-', 'Prestasi', '-', 'Prestasi Siswa..', '-', 'Pemerintah', '-', ''),
(16, '2023-01-07 17:14:18', 'insert', 'root@localhost', 6, '-', 'Judul', '-', 'Prestasi', '-', 'Penyelenggara', '-', NULL),
(17, '2023-01-07 17:20:46', 'insert', 'root@localhost', 7, '-', 'Berita', '-', 'Prestasi siswa', '-', 'Penyelenggara', '-', NULL),
(18, '2023-01-13 05:56:52', 'insert', 'admin_smpn6@localhost', 8, '-', 'wdbudbu', '-', 'dqlwndiqwf', '-', 'wdnqwlkd', '-', NULL),
(19, '2023-01-13 05:57:00', 'update', 'admin_smpn6@localhost', 8, 'wdbudbu', 'wdbudbuwdieoqjdf', 'dqlwndiqwf', 'dqlwndiqwf', 'wdnqwlkd', 'wdnqwlkd', NULL, 'prestasi1673589420.'),
(21, '2023-01-13 05:57:28', 'insert', 'admin_smpn6@localhost', 8, '-', 'wdbudbuwdieoqjdf', '-', 'dqlwndiqwf', '-', 'wdnqwlkd', '-', 'prestasi1673589420.');

--
-- Triggers `log_prestasi`
--
DELIMITER $$
CREATE TRIGGER `cant_update_log_prestasi` BEFORE UPDATE ON `log_prestasi` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_profil_sekolah`
--

CREATE TABLE `log_profil_sekolah` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_profil_sekolah` int(11) NOT NULL,
  `old_nama_sekolah` varchar(30) NOT NULL,
  `new_nama_sekolah` varchar(30) NOT NULL,
  `old_npsn` char(8) NOT NULL,
  `new_npsn` char(8) NOT NULL,
  `old_alamat` text NOT NULL,
  `new_alamat` text NOT NULL,
  `old_kode_pos` char(5) NOT NULL,
  `new_kode_pos` char(5) NOT NULL,
  `old_status` char(6) NOT NULL,
  `new_status` char(6) NOT NULL,
  `old_jenjang_pendidikan` char(3) NOT NULL,
  `new_jenjang_pendidikan` char(3) NOT NULL,
  `old_akreditasi` enum('A','B','C') NOT NULL,
  `new_akreditasi` enum('A','B','C') NOT NULL,
  `old_email` varchar(35) NOT NULL,
  `new_email` varchar(35) NOT NULL,
  `old_visi` text NOT NULL,
  `new_visi` text NOT NULL,
  `old_misi` text NOT NULL,
  `new_misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_profil_sekolah`
--

INSERT INTO `log_profil_sekolah` (`id_log`, `waktu`, `aksi`, `who`, `id_profil_sekolah`, `old_nama_sekolah`, `new_nama_sekolah`, `old_npsn`, `new_npsn`, `old_alamat`, `new_alamat`, `old_kode_pos`, `new_kode_pos`, `old_status`, `new_status`, `old_jenjang_pendidikan`, `new_jenjang_pendidikan`, `old_akreditasi`, `new_akreditasi`, `old_email`, `new_email`, `old_visi`, `new_visi`, `old_misi`, `new_misi`) VALUES
(1, '2022-12-15 14:40:48', 'insert', 'root@localhost', 3, '-', 'SMP Negeri 6 Tebing Tinggi', '-', '10211580', '-', 'Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi', '-', '20623', '-', 'Negeri', '-', '', '', 'A', '-', 'enamsmpnegeri@yahoo.co.id', '-', '..', '-', '..'),
(2, '2022-12-15 14:42:24', 'update', 'root@localhost', 3, 'SMP Negeri 6 Tebing Tinggi', 'SMP Negeri 6 Tebing Tinggi', '10211580', '10211570', 'Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi', 'Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi', '20623', '20623', 'Negeri', 'Negeri', '', '', 'A', 'A', 'enamsmpnegeri@yahoo.co.id', 'enamsmpnegeri@yahoo.co.id', '..', '..', '..', '..'),
(3, '2022-12-15 14:45:03', 'delete', 'root@localhost', 3, 'SMP Negeri 6 Tebing Tinggi', '-', '10211570', '-', 'Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi', '-', '20623', '-', 'Negeri', '-', '', '-', 'A', '', 'enamsmpnegeri@yahoo.co.id', '-', '..', '-', '..', '-'),
(4, '2022-12-27 12:34:46', 'update', 'root@localhost', 1, 'SMP Negeri 6 Tebing Tinggi', 'SMP Negeri 6 Tebing Tinggi', '10211580', '10211580', 'Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi, Sumatera Utara ', 'Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi, Sumatera Utara ', '20623', '20623', 'negeri', 'negeri', 'SMP', 'SMP', 'B', 'B', 'enamsmpnegeri@yahoo.co.id', 'enamsmpnegeri@yahoo.co.id', 'Terwujudnya peserta didik yang beriman, bertaqwa, cerdas, terampil, berprestasi, dan berwawasan lingkungan serta mampu melaksanakan pelestarian, pencegahan dan pengendalian lingkungan hidup.', 'Terwujudnya peserta didik yang beriman, bertaqwa, cerdas, terampil, berprestasi, dan berwawasan lingkungan serta mampu melaksanakan pelestarian, pencegahan dan pengendalian lingkungan hidup.', '1. Meningkatkan keimanan dan ketaqwaan terhadap Tuhan Yang Maha Esa \r\n2. Menciptakan lingkungan sekolah yang asri, hijau, dan ramah lingkungan \r\n3. Menciptakan lingkungan sekolah yang aman, nyaman, rapi, bersih dan menyenangkan \r\n4. Menumbuhkan kedisiplinan Peserta Didik dan Warga Sekolah\r\n5. Mengembangkan kemampuan Peserta Didik melalui pengenalan ilmu pengetahuan, teknologi dan seni\r\n6. Mengembangkan kreatifitas peserta didik agar menjadi terampil dan mandiri', '1. Meningkatkan keimanan dan ketaqwaan terhadap Tuhan Yang Maha Esa \r\n2. Menciptakan lingkungan sekolah yang asri, hijau, dan ramah lingkungan \r\n3. Menciptakan lingkungan sekolah yang aman, nyaman, rapi, bersih dan menyenangkan \r\n4. Menumbuhkan kedisiplinan Peserta Didik dan Warga Sekolah\r\n5. Mengembangkan kemampuan Peserta Didik melalui pengenalan ilmu pengetahuan, teknologi dan seni\r\n6. Mengembangkan kreatifitas peserta didik agar menjadi terampil dan mandiri');

--
-- Triggers `log_profil_sekolah`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_profil_sekolah` BEFORE DELETE ON `log_profil_sekolah` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_profil_sekolah` BEFORE UPDATE ON `log_profil_sekolah` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_siswa`
--

CREATE TABLE `log_siswa` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') NOT NULL,
  `who` varchar(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `old_nis` char(5) NOT NULL,
  `new_nis` char(5) NOT NULL,
  `old_nisn` char(10) NOT NULL,
  `new_nisn` char(10) NOT NULL,
  `old_nama_lengkap` varchar(50) NOT NULL,
  `new_nama_lengkap` varchar(50) NOT NULL,
  `old_jk` enum('L','P') NOT NULL,
  `new_jk` enum('L','P') NOT NULL,
  `old_tempat_lahir` varchar(50) NOT NULL,
  `new_tempat_lahir` varchar(50) NOT NULL,
  `old_tanggal_lahir` date NOT NULL,
  `new_tanggal_lahir` date NOT NULL,
  `old_agama` enum('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu') NOT NULL,
  `new_agama` enum('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu') NOT NULL,
  `old_anak_ke` int(11) NOT NULL,
  `new_anak_ke` int(11) NOT NULL,
  `old_jlh_saudara` int(11) NOT NULL,
  `new_jlh_saudara` int(11) NOT NULL,
  `old_berat_badan` int(11) NOT NULL,
  `new_berat_badan` int(11) NOT NULL,
  `old_tinggi_badan` int(11) NOT NULL,
  `new_tinggi_badan` int(11) NOT NULL,
  `old_gol_darah` enum('O','A','B','AB') NOT NULL,
  `new_gol_darah` enum('O','A','B','AB') NOT NULL,
  `old_no_hp` char(15) NOT NULL,
  `new_no_hp` char(15) NOT NULL,
  `old_alamat` text NOT NULL,
  `new_alamat` text NOT NULL,
  `old_status` enum('Aktif','Lulus','Pindah') NOT NULL,
  `new_status` enum('Aktif','Lulus','Pindah') NOT NULL,
  `old_foto` varchar(15) DEFAULT NULL,
  `new_foto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_siswa`
--

INSERT INTO `log_siswa` (`id_log`, `waktu`, `aksi`, `who`, `id_siswa`, `old_nis`, `new_nis`, `old_nisn`, `new_nisn`, `old_nama_lengkap`, `new_nama_lengkap`, `old_jk`, `new_jk`, `old_tempat_lahir`, `new_tempat_lahir`, `old_tanggal_lahir`, `new_tanggal_lahir`, `old_agama`, `new_agama`, `old_anak_ke`, `new_anak_ke`, `old_jlh_saudara`, `new_jlh_saudara`, `old_berat_badan`, `new_berat_badan`, `old_tinggi_badan`, `new_tinggi_badan`, `old_gol_darah`, `new_gol_darah`, `old_no_hp`, `new_no_hp`, `old_alamat`, `new_alamat`, `old_status`, `new_status`, `old_foto`, `new_foto`) VALUES
(4, '2023-01-06 10:47:14', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'Budie', 'Budie', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '087899765687', '087899765687', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Aktif', 'Pindah', NULL, NULL),
(5, '2023-01-06 10:47:22', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'Budie', 'Budie', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '087899765687', '087899765687', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Pindah', 'Aktif', NULL, NULL),
(12, '2023-01-07 05:03:44', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'Budi B', 'Budi B', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Aktif', 'Lulus', NULL, NULL),
(13, '2023-01-07 05:03:53', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'Budi B', 'Budi B', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Lulus', 'Aktif', NULL, NULL),
(14, '2023-01-07 05:13:56', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'Budie', 'Budie', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '087899765687', '087899765687', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Aktif', 'Lulus', NULL, NULL),
(15, '2023-01-07 05:13:56', 'update', 'root@localhost', 4, '3244', '3244', '2344533421', '2344533421', 'Budi', 'Budi', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2006-02-28', '2006-02-28', 'Protestan', 'Protestan', 2, 2, 4, 4, 70, 70, 170, 170, 'B', 'B', '08478843849', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Jl. Rahmad No 8 Tebing Tinggi', 'Aktif', 'Lulus', NULL, NULL),
(16, '2023-01-07 05:14:12', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'Budie', 'Budie', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '087899765687', '087899765687', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Lulus', 'Aktif', NULL, NULL),
(17, '2023-01-07 05:14:20', 'update', 'root@localhost', 4, '3244', '3244', '2344533421', '2344533421', 'Budi', 'Budi', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2006-02-28', '2006-02-28', 'Protestan', 'Protestan', 2, 2, 4, 4, 70, 70, 170, 170, 'B', 'B', '08478843849', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Jl. Rahmad No 8 Tebing Tinggi', 'Lulus', 'Aktif', NULL, NULL),
(18, '2023-01-07 06:51:18', 'insert', 'root@localhost', 12, '-', '1234', '-', '1234567890', '-', 'Budi', '', 'L', '-', 'Medan', '0000-00-00', '2000-06-09', '', 'Islam', 0, 1, 0, 2, 0, 70, 0, 165, '', 'O', '-', '08719827983', '-', 'Medan', '', 'Aktif', '-', NULL),
(20, '2023-01-07 06:55:10', 'insert', 'root@localhost', 12, '-', '1234', '-', '1234567890', '-', 'Budi', '', 'L', '-', 'Medan', '0000-00-00', '2000-06-09', '', 'Islam', 0, 1, 0, 2, 0, 70, 0, 165, '', 'O', '-', '08719827983', '-', 'Medan', '', 'Aktif', '-', ''),
(22, '2023-01-07 11:48:31', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'Budie', 'alwin', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '087899765687', '0837838374', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Aktif', 'Aktif', NULL, ''),
(23, '2023-01-07 11:49:00', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'Budi B', 'ade', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Aktif', 'Aktif', NULL, ''),
(24, '2023-01-07 11:49:16', 'update', 'root@localhost', 4, '3244', '3244', '2344533421', '2344533421', 'Budi', 'fael', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2006-02-28', '2006-02-28', 'Protestan', 'Protestan', 2, 2, 4, 4, 70, 70, 170, 170, 'B', 'B', '08478843849', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Jl. Rahmad No 8 Tebing Tinggi', 'Aktif', 'Aktif', NULL, ''),
(25, '2023-01-07 11:49:36', 'update', 'root@localhost', 3, '3454', '3454', '1023456890', '1023456890', 'Ani', 'ade', 'P', 'P', 'Tebing Tinggi', 'Tebing Tinggi', '2006-12-06', '2006-12-06', 'Katolik', 'Katolik', 1, 1, 2, 2, 50, 50, 167, 167, 'A', 'A', '08367389344', '08367389344', 'Tebing Tinggi', 'Tebing Tinggi', 'Aktif', 'Aktif', NULL, ''),
(26, '2023-01-07 11:49:57', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'ade', 'tere', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Aktif', 'Aktif', '', ''),
(27, '2023-01-07 11:51:33', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'alwin', 'Budie', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '0837838374', '0837838374', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Aktif', 'Aktif', '', ''),
(28, '2023-01-07 11:51:55', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'tere', 'alwin', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Aktif', 'Aktif', '', ''),
(29, '2023-01-07 12:52:37', 'update', 'root@localhost', 3, '3454', '3454', '1023456890', '1023456890', 'ade', 'gilang', 'P', 'P', 'Tebing Tinggi', 'Tebing Tinggi', '2006-12-06', '2006-12-06', 'Katolik', 'Katolik', 1, 1, 2, 2, 50, 50, 167, 167, 'A', 'A', '08367389344', '08367389344', 'Tebing Tinggi', 'Tebing Tinggi', 'Aktif', 'Aktif', '', ''),
(30, '2023-01-07 12:52:50', 'update', 'root@localhost', 3, '3454', '3454', '1023456890', '1023456890', 'gilang', 'tere', 'P', 'P', 'Tebing Tinggi', 'Tebing Tinggi', '2006-12-06', '2006-12-06', 'Katolik', 'Katolik', 1, 1, 2, 2, 50, 50, 167, 167, 'A', 'A', '08367389344', '08367389344', 'Tebing Tinggi', 'Tebing Tinggi', 'Aktif', 'Aktif', '', ''),
(31, '2023-01-07 17:08:34', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'Budie', 'Budie', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '0837838374', '0837838374', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Aktif', 'Lulus', '', ''),
(32, '2023-01-07 17:08:34', 'update', 'root@localhost', 4, '3244', '3244', '2344533421', '2344533421', 'fael', 'fael', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2006-02-28', '2006-02-28', 'Protestan', 'Protestan', 2, 2, 4, 4, 70, 70, 170, 170, 'B', 'B', '08478843849', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Jl. Rahmad No 8 Tebing Tinggi', 'Aktif', 'Lulus', '', ''),
(33, '2023-01-07 17:13:40', 'update', 'root@localhost', 3, '3454', '3454', '1023456890', '1023456890', 'tere', 'tere', 'P', 'P', 'Tebing Tinggi', 'Tebing Tinggi', '2006-12-06', '2006-12-06', 'Katolik', 'Katolik', 1, 1, 2, 2, 50, 50, 167, 167, 'A', 'A', '08367389344', '08367389344', 'Tebing Tinggi', 'Tebing Tinggi', 'Aktif', 'Lulus', '', ''),
(34, '2023-01-07 17:13:40', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'alwin', 'alwin', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Aktif', 'Lulus', '', ''),
(35, '2023-01-07 17:16:17', 'update', 'root@localhost', 4, '3244', '3244', '2344533421', '2344533421', 'fael', 'fael', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2006-02-28', '2006-02-28', 'Protestan', 'Protestan', 2, 2, 4, 4, 70, 70, 170, 170, 'B', 'B', '08478843849', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Jl. Rahmad No 8 Tebing Tinggi', 'Lulus', 'Aktif', '', ''),
(36, '2023-01-07 17:16:25', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'alwin', 'alwin', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Lulus', 'Aktif', '', ''),
(37, '2023-01-07 17:16:36', 'update', 'root@localhost', 3, '3454', '3454', '1023456890', '1023456890', 'tere', 'tere', 'P', 'P', 'Tebing Tinggi', 'Tebing Tinggi', '2006-12-06', '2006-12-06', 'Katolik', 'Katolik', 1, 1, 2, 2, 50, 50, 167, 167, 'A', 'A', '08367389344', '08367389344', 'Tebing Tinggi', 'Tebing Tinggi', 'Lulus', 'Aktif', '', ''),
(38, '2023-01-07 17:20:00', 'update', 'root@localhost', 3, '3454', '3454', '1023456890', '1023456890', 'tere', 'tere', 'P', 'P', 'Tebing Tinggi', 'Tebing Tinggi', '2006-12-06', '2006-12-06', 'Katolik', 'Katolik', 1, 1, 2, 2, 50, 50, 167, 167, 'A', 'A', '08367389344', '08367389344', 'Tebing Tinggi', 'Tebing Tinggi', 'Aktif', 'Lulus', '', ''),
(39, '2023-01-07 17:20:00', 'update', 'root@localhost', 4, '3244', '3244', '2344533421', '2344533421', 'fael', 'fael', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2006-02-28', '2006-02-28', 'Protestan', 'Protestan', 2, 2, 4, 4, 70, 70, 170, 170, 'B', 'B', '08478843849', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Jl. Rahmad No 8 Tebing Tinggi', 'Aktif', 'Lulus', '', ''),
(40, '2023-01-07 17:20:00', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'alwin', 'alwin', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Aktif', 'Lulus', '', ''),
(41, '2023-01-08 14:38:48', 'update', 'root@localhost', 1, '3456', '3456', '2345678990', '2345678990', 'Budie', 'Budie', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2004-01-08', '2004-01-08', 'Buddha', 'Buddha', 5, 5, 9, 9, 65, 65, 168, 168, 'B', 'B', '0837838374', '0837838374', 'Jl. Roa No 12 Tebing Tinggi', 'Jl. Roa No 12 Tebing Tinggi', 'Lulus', 'Aktif', '', ''),
(42, '2023-01-08 14:38:58', 'update', 'root@localhost', 3, '3454', '3454', '1023456890', '1023456890', 'tere', 'tere', 'P', 'P', 'Tebing Tinggi', 'Tebing Tinggi', '2006-12-06', '2006-12-06', 'Katolik', 'Katolik', 1, 1, 2, 2, 50, 50, 167, 167, 'A', 'A', '08367389344', '08367389344', 'Tebing Tinggi', 'Tebing Tinggi', 'Lulus', 'Aktif', '', ''),
(43, '2023-01-08 14:39:04', 'update', 'root@localhost', 5, '3464', '3464', '1092736735', '1092736735', 'alwin', 'alwin', 'L', 'L', 'Medan', 'Medan', '2008-03-13', '2008-03-13', 'Katolik', 'Katolik', 1, 1, 2, 2, 65, 65, 166, 166, 'A', 'A', '0837676747784', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Lulus', 'Aktif', '', ''),
(44, '2023-01-08 14:39:10', 'update', 'root@localhost', 4, '3244', '3244', '2344533421', '2344533421', 'fael', 'fael', 'L', 'L', 'Tebing Tinggi', 'Tebing Tinggi', '2006-02-28', '2006-02-28', 'Protestan', 'Protestan', 2, 2, 4, 4, 70, 70, 170, 170, 'B', 'B', '08478843849', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Jl. Rahmad No 8 Tebing Tinggi', 'Lulus', 'Aktif', '', ''),
(45, '2023-01-08 16:58:04', 'insert', 'root@localhost', 14, '-', '1234', '-', '1234567899', '-', 'alwin', '', 'L', '-', 'medan', '0000-00-00', '2000-08-08', '', 'Islam', 0, 1, 0, 2, 0, 70, 0, 170, '', 'O', '-', '0837838374', '-', 'Medan', '', 'Aktif', '-', NULL),
(46, '2023-01-08 16:58:54', 'delete', 'root@localhost', 14, '1234', '-', '1234567899', '-', 'alwin', '-', 'L', '', 'medan', '-', '2000-08-08', '0000-00-00', 'Islam', '', 1, 0, 2, 0, 70, 0, 170, 0, 'O', '', '0837838374', '-', 'Medan', '-', 'Aktif', '', NULL, '-');

--
-- Triggers `log_siswa`
--
DELIMITER $$
CREATE TRIGGER `cant_update_log_siswa` BEFORE UPDATE ON `log_siswa` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_tahun_pelajaran`
--

CREATE TABLE `log_tahun_pelajaran` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aksi` enum('insert','update','delete') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `who` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_thn_pelajaran` int(9) NOT NULL,
  `old_tahun_pelajaran` varchar(9) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `new_tahun_pelajaran` varchar(9) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `old_semester` enum('ganjil','genap') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `new_semester` enum('ganjil','genap') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_tahun_pelajaran`
--

INSERT INTO `log_tahun_pelajaran` (`id_log`, `waktu`, `aksi`, `who`, `id_thn_pelajaran`, `old_tahun_pelajaran`, `new_tahun_pelajaran`, `old_semester`, `new_semester`) VALUES
(1, '2022-12-15 14:48:28', 'insert', 'root@localhost', 8, '-', '2021/2022', '', 'ganjil'),
(2, '2022-12-15 14:49:38', 'update', 'root@localhost', 8, '2021/2022', '2021/2022', 'ganjil', 'genap'),
(3, '2022-12-15 14:50:28', 'delete', 'root@localhost', 8, '2021/2022', '-', 'genap', ''),
(4, '2023-01-06 08:56:13', 'insert', 'root@localhost', 9, '-', '2021/2022', '', 'ganjil'),
(5, '2023-01-06 08:56:29', 'insert', 'root@localhost', 10, '-', '2021/2022', '', 'genap'),
(6, '2023-01-06 08:56:40', 'insert', 'root@localhost', 11, '-', '2022/2023', '', 'ganjil'),
(7, '2023-01-06 08:56:56', 'insert', 'root@localhost', 12, '-', '2022/2023', '', 'genap');

--
-- Triggers `log_tahun_pelajaran`
--
DELIMITER $$
CREATE TRIGGER `cant_delete_log_tahun_pelajaran` BEFORE DELETE ON `log_tahun_pelajaran` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIHAPUS.';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cant_update_log_tahun_pelajaran` BEFORE UPDATE ON `log_tahun_pelajaran` FOR EACH ROW BEGIN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DATA LOG TIDAK DAPAT DIUBAH.';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelompok` enum('A','B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama`, `kelompok`) VALUES
(1, 'Pendidikan Agama dan Budi Pekerti', 'A'),
(3, 'Pendidikan Pancasila dan Kewarganegaraan', 'A'),
(4, 'Bahasa Indonesia', 'A'),
(5, 'Matematika', 'A'),
(6, 'Ilmu Pengetahuan Alam', 'A'),
(7, 'Ilmu Pengetahuan Sosial', 'A'),
(8, 'Bahasa Inggris', 'A'),
(9, 'Seni Budaya', 'B'),
(10, 'Pendidikan Jasmani, Olah Raga dan Kesehatan', 'B'),
(11, 'Prakarya', 'B');

--
-- Triggers `mata_pelajaran`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_mapel` BEFORE UPDATE ON `mata_pelajaran` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_mata_pelajaran` BEFORE DELETE ON `mata_pelajaran` FOR EACH ROW BEGIN 
INSERT INTO log_mata_pelajaran
(waktu, aksi, who, id_mapel, old_nama_mapel, new_nama_mapel) 
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.nama, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_mata_pelajaran` AFTER INSERT ON `mata_pelajaran` FOR EACH ROW BEGIN 
INSERT INTO log_mata_pelajaran
(waktu, aksi, who, id_mapel, old_nama_mapel, new_nama_mapel) 
VALUES 
(NOW(), 'insert', USER(), NEW.id, '-', NEW.nama);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_mata_pelajaran` BEFORE UPDATE ON `mata_pelajaran` FOR EACH ROW BEGIN 
INSERT INTO log_mata_pelajaran
(waktu, aksi, who, id_mapel, old_nama_mapel, new_nama_mapel) 
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.nama, NEW.nama);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_tahunajar` int(11) NOT NULL,
  `nilai_pengetahuan` int(11) NOT NULL,
  `nilai_keterampilan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `id_siswa`, `id_mapel`, `id_tahunajar`, `nilai_pengetahuan`, `nilai_keterampilan`) VALUES
(2, 1, 1, 6, 80, 87),
(4, 1, 3, 6, 90, 79),
(5, 1, 8, 6, 80, 84),
(6, 1, 4, 6, 89, 70),
(7, 1, 6, 6, 98, 90),
(8, 1, 7, 6, 88, 83),
(9, 1, 5, 6, 77, 70),
(10, 1, 10, 6, 95, 95),
(11, 1, 11, 6, 79, 77),
(12, 1, 9, 6, 85, 80);

--
-- Triggers `nilai_siswa`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_nilai_siswa` BEFORE UPDATE ON `nilai_siswa` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_nilai_siswa` BEFORE DELETE ON `nilai_siswa` FOR EACH ROW BEGIN 
INSERT INTO log_nilai_siswa
(waktu, aksi, who, id_nilai_siswa, id_siswa, id_mapel, id_tahunajar, old_nilai_pengetahuan, new_nilai_pengetahuan, old_nilai_keterampilan, new_nilai_keterampilan)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.id_siswa, OLD.id_mapel, OLD.id_tahunajar, OLD.nilai_pengetahuan, '-', OLD.nilai_keterampilan, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_nilai_siswa` AFTER INSERT ON `nilai_siswa` FOR EACH ROW BEGIN 
INSERT INTO log_nilai_siswa
(waktu, aksi, who, id_nilai_siswa, id_siswa, id_mapel, id_tahunajar, old_nilai_pengetahuan, new_nilai_pengetahuan, old_nilai_keterampilan, new_nilai_keterampilan)
VALUES 
(NOW(), 'insert', USER(), NEW.id, NEW.id_siswa, NEW.id_mapel, NEW.id_tahunajar, '-', NEW.nilai_pengetahuan, '-', NEW.nilai_keterampilan);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_nilai_siswa` AFTER UPDATE ON `nilai_siswa` FOR EACH ROW BEGIN 
INSERT INTO log_nilai_siswa
(waktu, aksi, who, id_nilai_siswa, id_siswa, id_mapel, id_tahunajar, old_nilai_pengetahuan, new_nilai_pengetahuan, old_nilai_keterampilan, new_nilai_keterampilan)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.id_siswa, OLD.id_mapel, OLD.id_tahunajar, OLD.nilai_pengetahuan, NEW.nilai_pengetahuan, OLD.nilai_keterampilan, NEW.nilai_keterampilan);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_insert_nilaisiswa` BEFORE INSERT ON `nilai_siswa` FOR EACH ROW BEGIN
DECLARE m_id INT;
DECLARE t_id INT;
DECLARE s_id INT;
SELECT NEW.id_siswa INTO s_id;
SELECT NEW.id_mapel INTO m_id;
SELECT NEW.id_tahunajar INTO t_id;
IF EXISTS (SELECT id FROM nilai_siswa WHERE id_siswa = s_id AND id_mapel = m_id AND id_tahunajar = t_id) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data nilai siswa sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_update_nilaisiswa` BEFORE UPDATE ON `nilai_siswa` FOR EACH ROW BEGIN
DECLARE m_id INT; DECLARE t_id INT; DECLARE s_id INT; DECLARE np INT; DECLARE nk INT;
SELECT NEW.id_siswa INTO s_id;
SELECT NEW.id_mapel INTO m_id;
SELECT NEW.id_tahunajar INTO t_id;
SELECT NEW.nilai_pengetahuan INTO np;
SELECT NEW.nilai_keterampilan INTO nk;
IF EXISTS (SELECT id FROM nilai_siswa WHERE id_siswa = s_id AND id_mapel = m_id AND id_tahunajar = t_id AND nilai_pengetahuan = np AND nilai_keterampilan = nk) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data nilai siswa sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pendidikan_ayah` varchar(3) NOT NULL,
  `pendidikan_ibu` varchar(3) NOT NULL,
  `tempat_lahir_ayah` varchar(35) NOT NULL,
  `tempat_lahir_ibu` varchar(35) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pendidikan_wali` varchar(3) DEFAULT NULL,
  `hub_thd_siswa` varchar(20) DEFAULT NULL,
  `pekerjaan_wali` varchar(20) DEFAULT NULL,
  `no_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id`, `id_siswa`, `nama_ayah`, `nama_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `tempat_lahir_ayah`, `tempat_lahir_ibu`, `tgl_lahir_ayah`, `tgl_lahir_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `pendidikan_wali`, `hub_thd_siswa`, `pekerjaan_wali`, `no_hp`) VALUES
(3, 4, 'Junaidi Siregar', 'Juni', 'SMA', 'SMA', 'Binjai', 'Binjai', '1980-12-01', '1980-12-01', 'PNS', 'PNS', '-', '-', '-', '-', '083156678976'),
(5, 1, 'Susanto', 'Siti Marwiyah', 'S1', 'S1', 'Medan', 'Medan', '1970-07-09', '1975-08-08', 'Karyawan BUMN', 'Ibu Rumah Tangga', '', NULL, '', '', '0812556567677');

--
-- Triggers `ortu`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_ortu` BEFORE UPDATE ON `ortu` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_orang_tua` BEFORE DELETE ON `ortu` FOR EACH ROW BEGIN 
INSERT INTO log_orang_tua
(waktu, aksi, who, id_ortu, id_siswa, old_nama_ayah, new_nama_ayah, old_nama_ibu, new_nama_ibu, old_pendidikan_ayah, new_pendidikan_ayah, old_pendidikan_ibu, new_pendidikan_ibu, old_tempat_lahir_ayah, new_tempat_lahir_ayah, old_tempat_lahir_ibu, new_tempat_lahir_ibu, old_tgl_lahir_ayah, new_tgl_lahir_ayah, old_tgl_lahir_ibu, new_tgl_lahir_ibu, old_pekerjaan_ayah, new_pekerjaan_ayah, old_pekerjaan_ibu, new_pekerjaan_ibu, old_nama_wali, new_nama_wali, old_pendidikan_wali, new_pendidikan_wali, old_hub_thd_siswa, new_hub_thd_siswa, old_pekerjaan_wali, new_pekerjaan_wali, old_no_hp, new_no_hp)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.id_siswa, OLD.nama_ayah, '-', OLD.nama_ibu, '-', OLD.pendidikan_ayah, '-', OLD_pendidikan_ibu, '-', OLD.tempat_lahir_ayah, '-', OLD.tempat_lahir_ibu, '-', OLD.tgl_lahir_ayah, '-', OLD_tgl_lahir_ibu, '-', OLD.pekerjaan_ayah, '-', OLD.pekerjaan_ibu, '-', OLD.nama_wali, '-', OLD.pendidikan_wali, '-', OLD.hub_thd_siswa, '-', OLD.pekerjaan_wali, '-', OLD.no_hp, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_orang_tua` AFTER INSERT ON `ortu` FOR EACH ROW BEGIN 
INSERT INTO log_orang_tua
(waktu, aksi, who, id_ortu, id_siswa, old_nama_ayah, new_nama_ayah, old_nama_ibu, new_nama_ibu, old_pendidikan_ayah, new_pendidikan_ayah, old_pendidikan_ibu, new_pendidikan_ibu, old_tempat_lahir_ayah, new_tempat_lahir_ayah, old_tempat_lahir_ibu, new_tempat_lahir_ibu, old_tgl_lahir_ayah, new_tgl_lahir_ayah, old_tgl_lahir_ibu, new_tgl_lahir_ibu, old_pekerjaan_ayah, new_pekerjaan_ayah, old_pekerjaan_ibu, new_pekerjaan_ibu, old_nama_wali, new_nama_wali, old_pendidikan_wali, new_pendidikan_wali, old_hub_thd_siswa, new_hub_thd_siswa, old_pekerjaan_wali, new_pekerjaan_wali, old_no_hp, new_no_hp)
VALUES
(NOW(), 'insert', USER(), NEW.id, NEW.id_siswa, '-', NEW.nama_ayah, '-', NEW.nama_ibu, '-', NEW.pendidikan_ayah, '-', NEW.pendidikan_ibu, '-', NEW.tempat_lahir_ayah, '-', NEW.tempat_lahir_ibu, '-', NEW.tgl_lahir_ayah, '-', NEW.tgl_lahir_ibu, '-', NEW.pekerjaan_ayah, '-', NEW.pekerjaan_ibu, '-', NEW.nama_wali, '-', NEW.pendidikan_wali, '-', NEW.hub_thd_siswa, '-', NEW.pekerjaan_wali, '-', NEW.no_hp);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_orang_tua` BEFORE UPDATE ON `ortu` FOR EACH ROW BEGIN 
INSERT INTO log_orang_tua
(waktu, aksi, who, id_ortu, id_siswa, old_nama_ayah, new_nama_ayah, old_nama_ibu, new_nama_ibu, old_pendidikan_ayah, new_pendidikan_ayah, old_pendidikan_ibu, new_pendidikan_ibu, old_tempat_lahir_ayah, new_tempat_lahir_ayah, old_tempat_lahir_ibu, new_tempat_lahir_ibu, old_tgl_lahir_ayah, new_tgl_lahir_ayah, old_tgl_lahir_ibu, new_tgl_lahir_ibu, old_pekerjaan_ayah, new_pekerjaan_ayah, old_pekerjaan_ibu, new_pekerjaan_ibu, old_nama_wali, new_nama_wali, old_pendidikan_wali, new_pendidikan_wali, old_hub_thd_siswa, new_hub_thd_siswa, old_pekerjaan_wali, new_pekerjaan_wali, old_no_hp, new_no_hp)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.id_siswa, OLD.nama_ayah, NEW.nama_ayah, OLD.nama_ibu, NEW.nama_ibu, OLD.pendidikan_ayah, NEW.pendidikan_ayah, OLD_pendidikan_ibu, NEW.pendidikan_ibu, OLD.tempat_lahir_ayah, NEW.tempat_lahir_ayah, OLD.tempat_lahir_ibu, NEW.tempat_lahir_ibu, OLD.tgl_lahir_ayah, NEW.tgl_lahir_ayah, OLD_tgl_lahir_ibu, NEW.tgl_lahir_ibu, OLD.pekerjaan_ayah, NEW.pekerjaan_ayah, OLD.pekerjaan_ibu, NEW.pekerjaan_ibu, OLD.nama_wali, NEW.nama_wali, OLD.pendidikan_wali, NEW.pendidikan_wali, OLD.hub_thd_siswa, NEW.hub_thd_siswa, OLD.pekerjaan_wali, NEW.pekerjaan_wali, OLD.no_hp, NEW.no_hp);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran_guru`
--

CREATE TABLE `pelajaran_guru` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelajaran_guru`
--

INSERT INTO `pelajaran_guru` (`id`, `id_guru`, `id_mapel`) VALUES
(1, 1, 1),
(2, 4, 4),
(3, 6, 1),
(4, 8, 10),
(5, 9, 10);

--
-- Triggers `pelajaran_guru`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_pelajaran_guru` BEFORE UPDATE ON `pelajaran_guru` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_pelajaran_guru` AFTER DELETE ON `pelajaran_guru` FOR EACH ROW BEGIN 
INSERT INTO log_pelajaran_guru
(waktu, aksi, who, id_pelajaran_guru, old_id_guru, new_id_guru, old_id_mapel, new_id_mapel)
VALUES
(NOW(), 'delete', USER(), OLD.id, OLD.id_guru, '-', OLD.id_mapel, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pelajaran_guru` AFTER INSERT ON `pelajaran_guru` FOR EACH ROW BEGIN 
INSERT INTO log_pelajaran_guru
(waktu, aksi, who, id_pelajaran_guru, old_id_guru, new_id_guru, old_id_mapel, new_id_mapel)
VALUES
(NOW(), 'insert', USER(), NEW.id, '-', NEW.id_guru, '-', NEW.id_mapel);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pelajaran_guru` AFTER UPDATE ON `pelajaran_guru` FOR EACH ROW BEGIN 
INSERT INTO log_pelajaran_guru
(waktu, aksi, who, id_pelajaran_guru, old_id_guru, new_id_guru, old_id_mapel, new_id_mapel)
VALUES
(NOW(), 'update', USER(), OLD.id, OLD.id_guru, NEW.id_guru, OLD.id_mapel, NEW.id_mapel);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_insert_pelajaranguru` BEFORE INSERT ON `pelajaran_guru` FOR EACH ROW BEGIN
DECLARE g_id INT;
DECLARE m_id INT;
SELECT NEW.id_guru INTO g_id;
SELECT NEW.id_mapel INTO m_id;
IF EXISTS (SELECT id FROM pelajaran_guru WHERE id_guru = g_id AND id_mapel = m_id) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data pelajaran guru sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_update_pelajaranguru` BEFORE UPDATE ON `pelajaran_guru` FOR EACH ROW BEGIN
DECLARE g_id INT;
DECLARE m_id INT;
SELECT NEW.id_guru INTO g_id;
SELECT NEW.id_mapel INTO m_id;
IF EXISTS (SELECT id FROM pelajaran_guru WHERE id_guru = g_id AND id_mapel = m_id) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data pelajaran guru sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_kelas`
--

CREATE TABLE `pengaturan_kelas` (
  `id` int(11) NOT NULL,
  `nama` char(3) NOT NULL,
  `id_tahun_pelajaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan_kelas`
--

INSERT INTO `pengaturan_kelas` (`id`, `nama`, `id_tahun_pelajaran`, `id_guru`) VALUES
(2, '7-1', 7, 1),
(3, '7-1', 6, 1),
(4, '7-2', 6, 2),
(5, '7-2', 7, 2),
(6, '7-3', 6, 4),
(7, '7-3', 7, 4),
(8, '7-1', 9, 8),
(9, '7-1', 10, 8),
(10, '8-1', 9, 9),
(11, '9-1', 11, 4),
(12, '9-1', 12, 4),
(14, '9-3', 11, 9),
(15, '9-3', 12, 1);

--
-- Triggers `pengaturan_kelas`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_pengaturan_kls` BEFORE UPDATE ON `pengaturan_kelas` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_pengaturan_kelas` AFTER DELETE ON `pengaturan_kelas` FOR EACH ROW BEGIN
INSERT INTO log_pengaturan_kelas
(waktu, aksi, who, id_pengaturan_kelas, old_nama_kelas, new_nama_kelas, old_id_tahun_pelajaran, new_id_tahun_pelajaran, old_id_guru, new_id_guru)
VALUES
(NOW(), 'delete', USER(), OLD.id, OLD.nama, '-', OLD.id_tahun_pelajaran, '-', OLD.id_guru, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pengaturan_kelas` AFTER INSERT ON `pengaturan_kelas` FOR EACH ROW BEGIN
INSERT INTO log_pengaturan_kelas
(waktu, aksi, who, id_pengaturan_kelas, old_nama_kelas, new_nama_kelas, old_id_tahun_pelajaran, new_id_tahun_pelajaran, old_id_guru, new_id_guru)
VALUES
(NOW(), 'insert', USER(), NEW.id, '-', NEW.nama, '-', NEW.id_tahun_pelajaran, '-', NEW.id_guru);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pengaturan_kelas` AFTER UPDATE ON `pengaturan_kelas` FOR EACH ROW BEGIN
INSERT INTO log_pengaturan_kelas
(waktu, aksi, who, id_pengaturan_kelas, old_nama_kelas, new_nama_kelas, old_id_tahun_pelajaran, new_id_tahun_pelajaran, old_id_guru, new_id_guru)
VALUES
(NOW(), 'update', USER(), NEW.id, OLD.nama, NEW.nama, OLD.id_tahun_pelajaran, NEW.id_tahun_pelajaran, OLD.id_guru, NEW.id_guru);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_insert_pengaturankelas` BEFORE INSERT ON `pengaturan_kelas` FOR EACH ROW BEGIN
DECLARE n CHAR(3);
DECLARE t_id INT;
SELECT NEW.nama INTO n;
SELECT NEW.id_tahun_pelajaran INTO t_id;
IF EXISTS (SELECT id FROM pengaturan_kelas WHERE nama = n AND id_tahun_pelajaran = t_id) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data pengaturan kelas sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_update_pengaturankelas` BEFORE UPDATE ON `pengaturan_kelas` FOR EACH ROW BEGIN
DECLARE n CHAR(3);
DECLARE t_id INT;
DECLARE g_id INT;
SELECT NEW.nama INTO n;
SELECT NEW.id_tahun_pelajaran INTO t_id;
SELECT NEW.id_guru INTO g_id;
IF EXISTS (SELECT id FROM pengaturan_kelas WHERE nama =n AND id_tahun_pelajaran = t_id AND id_guru = g_id) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data pengaturan kelas sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_kelas_siswa`
--

CREATE TABLE `pengaturan_kelas_siswa` (
  `id` int(11) NOT NULL,
  `id_pengaturan_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan_kelas_siswa`
--

INSERT INTO `pengaturan_kelas_siswa` (`id`, `id_pengaturan_kelas`, `id_siswa`) VALUES
(2, 2, 1),
(3, 5, 3),
(4, 15, 4),
(5, 2, 4),
(16, 12, 1),
(17, 8, 1),
(19, 3, 1),
(20, 14, 4),
(21, 15, 5),
(22, 15, 3);

--
-- Triggers `pengaturan_kelas_siswa`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_pengaturan_kls_siswa` BEFORE UPDATE ON `pengaturan_kelas_siswa` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_pengaturan_kelas_siswa` BEFORE DELETE ON `pengaturan_kelas_siswa` FOR EACH ROW BEGIN 
INSERT INTO log_pengaturan_kelas_siswa
(waktu, aksi, who, id_pengaturan_kelas_siswa, old_id_pengaturan_kelas, new_id_pengaturan_kelas, old_id_siswa, new_id_siswa)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.id_pengaturan_kelas, '-', OLD.id_siswa, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pengaturan_kelas_siswa` AFTER INSERT ON `pengaturan_kelas_siswa` FOR EACH ROW BEGIN 
INSERT INTO log_pengaturan_kelas_siswa
(waktu, aksi, who, id_pengaturan_kelas_siswa, old_id_pengaturan_kelas, new_id_pengaturan_kelas, old_id_siswa, new_id_siswa)
VALUES 
(NOW(), 'insert', USER(), NEW.id, '-', NEW.id_pengaturan_kelas, '-', NEW.id_siswa);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pengaturan_kelas_siswa` AFTER UPDATE ON `pengaturan_kelas_siswa` FOR EACH ROW BEGIN 
INSERT INTO log_pengaturan_kelas_siswa
(waktu, aksi, who, id_pengaturan_kelas_siswa, old_id_pengaturan_kelas, new_id_pengaturan_kelas, old_id_siswa, new_id_siswa)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.id_pengaturan_kelas, NEW.id_pengaturan_kelas, OLD.id_siswa, NEW.id_siswa);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_insert_pengaturankelassiswa` BEFORE INSERT ON `pengaturan_kelas_siswa` FOR EACH ROW BEGIN
DECLARE pk_id INT;
DECLARE s_nis CHAR(4);
DECLARE tahun CHAR(9);
DECLARE sem ENUM('Ganjil', 'Genap');
SELECT NEW.id_pengaturan_kelas INTO pk_id;
SELECT nis FROM siswa WHERE id = NEW.id_siswa INTO s_nis;
SELECT tahun_pelajaran FROM view_walikelas WHERE id_atur = pk_id INTO tahun;
SELECT semester FROM view_walikelas WHERE id_atur = pk_id INTO sem;
IF EXISTS (SELECT id_atur_ks FROM view_kelas_siswa WHERE nis = s_nis AND tahun_pelajaran = tahun AND semester = sem) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data pengaturan kelas siswa sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_update_pengaturankelassiswa` BEFORE UPDATE ON `pengaturan_kelas_siswa` FOR EACH ROW BEGIN
DECLARE pk_id INT;
DECLARE s_nis CHAR(4);
DECLARE tahun CHAR(9);
DECLARE sem ENUM('Ganjil', 'Genap');
DECLARE s_kelas CHAR(3);
SELECT NEW.id_pengaturan_kelas INTO pk_id;
SELECT nis FROM siswa WHERE id = NEW.id_siswa INTO s_nis;
SELECT tahun_pelajaran FROM view_walikelas WHERE id_atur = pk_id INTO tahun;
SELECT semester FROM view_walikelas WHERE id_atur = pk_id INTO sem;
SELECT kelas FROM view_walikelas WHERE id_atur = pk_id INTO s_kelas;
IF EXISTS (SELECT id_atur_ks FROM view_kelas_siswa WHERE nis = s_nis AND tahun_pelajaran = tahun AND semester = sem AND kelas = s_kelas) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf, data pengaturan kelas siswa sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `penyelenggara` varchar(30) NOT NULL,
  `gambar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `judul`, `deskripsi`, `penyelenggara`, `gambar`) VALUES
(1, 'Juara 1 Futsal', 'Pada tahun 2020, sekolah kami mendapatkan Juara 1 Futsal tingkat se-kota Tebing Tinggi yang diselenggarakan oleh Mulia Pratama Competition', 'Mulia Pratama Competition', 'prestasi1671709265.png'),
(6, 'Judul', 'Prestasi', 'Penyelenggara', NULL),
(7, 'Berita', 'Prestasi siswa', 'Penyelenggara', NULL);

--
-- Triggers `prestasi`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_prestasi` BEFORE UPDATE ON `prestasi` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_prestasi` BEFORE DELETE ON `prestasi` FOR EACH ROW BEGIN 
INSERT INTO log_prestasi(waktu, aksi, who, id_prestasi, old_judul_prestasi, new_judul_prestasi, old_deskripsi_prestasi, new_deskripsi_prestasi, old_penyelenggara, new_penyelenggara, old_gambar, new_gambar)
VALUES(NOW(), 'delete', USER(), OLD.id, OLD.judul, '-', OLD.deskripsi, '-', OLD.penyelenggara, '-', OLD.gambar, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_prestasi` AFTER INSERT ON `prestasi` FOR EACH ROW BEGIN 
INSERT INTO log_prestasi(waktu, aksi, who, id_prestasi, old_judul_prestasi, new_judul_prestasi, old_deskripsi_prestasi, new_deskripsi_prestasi, old_penyelenggara, new_penyelenggara, old_gambar, new_gambar)
VALUES(NOW(), 'insert', USER(), NEW.id, '-', NEW.judul, '-', NEW.deskripsi, '-', NEW.penyelenggara, '-', NEW.gambar);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_prestasi` BEFORE UPDATE ON `prestasi` FOR EACH ROW BEGIN 
INSERT INTO log_prestasi(waktu, aksi, who, id_prestasi, old_judul_prestasi, new_judul_prestasi, old_deskripsi_prestasi, new_deskripsi_prestasi, old_penyelenggara, new_penyelenggara, old_gambar, new_gambar)
VALUES(NOW(), 'update', USER(), OLD.id, OLD.judul, NEW.judul, OLD.deskripsi, NEW.deskripsi, OLD.penyelenggara, NEW.penyelenggara, OLD.gambar, NEW.gambar);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `npsn` char(8) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` char(5) NOT NULL,
  `status` char(6) NOT NULL,
  `jenjang_pendidikan` char(3) NOT NULL,
  `akreditasi` enum('A','B','C') NOT NULL,
  `email` varchar(35) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `nama`, `npsn`, `alamat`, `kode_pos`, `status`, `jenjang_pendidikan`, `akreditasi`, `email`, `visi`, `misi`) VALUES
(1, 'SMP Negeri 6 Tebing Tinggi', '10211580', 'Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi, Sumatera Utara ', '20623', 'negeri', 'SMP', 'B', 'enamsmpnegeri@yahoo.co.id', 'Terwujudnya peserta didik yang beriman, bertaqwa, cerdas, terampil, berprestasi, dan berwawasan lingkungan serta mampu melaksanakan pelestarian, pencegahan dan pengendalian lingkungan hidup.', '1. Meningkatkan keimanan dan ketaqwaan terhadap Tuhan Yang Maha Esa \r\n2. Menciptakan lingkungan sekolah yang asri, hijau, dan ramah lingkungan \r\n3. Menciptakan lingkungan sekolah yang aman, nyaman, rapi, bersih dan menyenangkan \r\n4. Menumbuhkan kedisiplinan Peserta Didik dan Warga Sekolah\r\n5. Mengembangkan kemampuan Peserta Didik melalui pengenalan ilmu pengetahuan, teknologi dan seni\r\n6. Mengembangkan kreatifitas peserta didik agar menjadi terampil dan mandiri');

--
-- Triggers `profil_sekolah`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_profil` BEFORE UPDATE ON `profil_sekolah` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_profil_sekolah` BEFORE DELETE ON `profil_sekolah` FOR EACH ROW BEGIN 
INSERT INTO log_profil_sekolah
(waktu, aksi, who, id_profil_sekolah, old_nama_sekolah, new_nama_sekolah, old_npsn, new_npsn, old_alamat, new_alamat, old_kode_pos, new_kode_pos, old_status, new_status, old_jenjang_pendidikan, new_jenjang_pendidikan, old_akreditasi, new_akreditasi, old_email, new_email, old_visi, new_visi, old_misi, new_misi)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.nama, '-', OLD.npsn, '-', OLD.alamat, '-', OLD.kode_pos, '-', OLD.status, '-', OLD.jenjang_pendidikan, '-', OLD.akreditasi, '-', OLD.email, '-', OLD.visi, '-', OLD.misi, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_profil_sekolah` AFTER INSERT ON `profil_sekolah` FOR EACH ROW BEGIN 
INSERT INTO log_profil_sekolah
(waktu, aksi, who, id_profil_sekolah, old_nama_sekolah, new_nama_sekolah, old_npsn, new_npsn, old_alamat, new_alamat, old_kode_pos, new_kode_pos, old_status, new_status, old_jenjang_pendidikan, new_jenjang_pendidikan, old_akreditasi, new_akreditasi, old_email, new_email, old_visi, new_visi, old_misi, new_misi)
VALUES 
(NOW(), 'insert', USER(), NEW.id, '-', NEW.nama, '-', NEW.npsn, '-', NEW.alamat, '-', NEW.kode_pos, '-', NEW.status, '-', NEW.jenjang_pendidikan, '-', NEW.akreditasi, '-', NEW.email, '-', NEW.visi, '-', NEW.misi);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_profil_sekolah` AFTER UPDATE ON `profil_sekolah` FOR EACH ROW BEGIN 
INSERT INTO log_profil_sekolah
(waktu, aksi, who, id_profil_sekolah, old_nama_sekolah, new_nama_sekolah, old_npsn, new_npsn, old_alamat, new_alamat, old_kode_pos, new_kode_pos, old_status, new_status, old_jenjang_pendidikan, new_jenjang_pendidikan, old_akreditasi, new_akreditasi, old_email, new_email, old_visi, new_visi, old_misi, new_misi)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.nama, NEW.nama, OLD.npsn, NEW.npsn, OLD.alamat, NEW.alamat, OLD.kode_pos, NEW.kode_pos, OLD.status, NEW.status, OLD.jenjang_pendidikan, NEW.jenjang_pendidikan, OLD.akreditasi, NEW.akreditasi, OLD.email, NEW.email, OLD.visi, NEW.visi, OLD.misi, NEW.misi);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_akreditasi_sekolah` BEFORE INSERT ON `profil_sekolah` FOR EACH ROW BEGIN
IF
(new.akreditasi = 'A' OR
new.akreditasi = 'B' OR
new.akreditasi = 'C')
THEN
SET new.akreditasi = new.akreditasi;
ELSEIF
(new.akreditasi != 'A' OR
new.akreditasi != 'B' OR
new.akreditasi != 'C')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Input akreditasi sekolah tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_jenjang_pendidikan` BEFORE INSERT ON `profil_sekolah` FOR EACH ROW BEGIN
IF
(new.jenjang_pendidikan = 'SD' OR
new.jenjang_pendidikan = 'SMP' OR
new.jenjang_pendidikan = 'SMA')
THEN
SET new.jenjang_pendidikan = new.jenjang_pendidikan;
ELSEIF
(new.jenjang_pendidikan != 'SD' OR
new.jenjang_pendidikan != 'SMP' OR
new.jenjang_pendidikan != 'SMA')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Jenjang Pendidikan yang diinput tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_status_sekolah` BEFORE INSERT ON `profil_sekolah` FOR EACH ROW BEGIN
IF
(new.status = 'Negeri' OR
new.status = 'Swasta')
THEN
SET new.status = new.status;
ELSEIF
(new.status != 'Negeri' OR
new.status != 'Swasta')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Status sekolah yang diinput tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_akreditasi_sekolah` BEFORE UPDATE ON `profil_sekolah` FOR EACH ROW BEGIN
IF
(new.akreditasi = 'A' OR
new.akreditasi = 'B' OR
new.akreditasi = 'C')
THEN
SET new.akreditasi = new.akreditasi;
ELSEIF
(new.akreditasi != 'A' OR
new.akreditasi != 'B' OR
new.akreditasi != 'C')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Akreditasi sekolah yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_jenjang_pendidikan` BEFORE UPDATE ON `profil_sekolah` FOR EACH ROW BEGIN
IF
(new.jenjang_pendidikan = 'SD' OR
new.jenjang_pendidikan = 'SMP' OR
new.jenjang_pendidikan = 'SMA')
THEN
SET new.jenjang_pendidikan = new.jenjang_pendidikan;
ELSEIF
(new.jenjang_pendidikan != 'SD' OR
new.jenjang_pendidikan != 'SMP' OR
new.jenjang_pendidikan != 'SMA')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Jenjang Pendidikan yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_status_sekolah` BEFORE UPDATE ON `profil_sekolah` FOR EACH ROW BEGIN
IF
(new.status = 'Negeri' OR
new.status = 'Swasta')
THEN
SET new.status = new.status;
ELSEIF
(new.status != 'Negeri' OR
new.status != 'Swasta')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Status sekolah yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` char(4) NOT NULL,
  `nisn` char(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Buddha','Konghucu','Hindu') NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jumlah_saudara` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `gol_darah` enum('O','A','B','AB') NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Aktif','Lulus','Pindah') NOT NULL,
  `foto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `anak_ke`, `jumlah_saudara`, `berat_badan`, `tinggi_badan`, `gol_darah`, `no_hp`, `alamat`, `status`, `foto`) VALUES
(1, '3456', '2345678990', 'Budie', 'L', 'Tebing Tinggi', '2004-01-08', 'Buddha', 5, 9, 65, 168, 'B', '0837838374', 'Jl. Roa No 12 Tebing Tinggi', 'Aktif', ''),
(3, '3454', '1023456890', 'tere', 'P', 'Tebing Tinggi', '2006-12-06', 'Katolik', 1, 2, 50, 167, 'A', '08367389344', 'Tebing Tinggi', 'Aktif', ''),
(4, '3244', '2344533421', 'fael', 'L', 'Tebing Tinggi', '2006-02-28', 'Protestan', 2, 4, 70, 170, 'B', '08478843849', 'Jl. Rahmad No 8 Tebing Tinggi', 'Aktif', ''),
(5, '3464', '1092736735', 'alwin', 'L', 'Medan', '2008-03-13', 'Katolik', 1, 2, 65, 166, 'A', '0837676747784', 'Jl. Sei Cuka No. 5 Tebing Tinggi', 'Aktif', '');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_siswa` BEFORE UPDATE ON `siswa` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_siswa` BEFORE DELETE ON `siswa` FOR EACH ROW BEGIN 
INSERT INTO log_siswa
(waktu, aksi, who, id_siswa, old_nis, new_nis, old_nisn, new_nisn, old_nama_lengkap, new_nama_lengkap, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_anak_ke, new_anak_ke, old_jlh_saudara, new_jlh_saudara, old_berat_badan, new_berat_badan, old_tinggi_badan, new_tinggi_badan, old_gol_darah, new_gol_darah, old_no_hp, new_no_hp, old_alamat, new_alamat, old_status, new_status, old_foto, new_foto)
VALUES 
(NOW(), 'delete', USER(), OLD.id, OLD.nis, '-', OLD.nisn, '-', OLD.nama_lengkap, '-', OLD.jenis_kelamin, '-', OLD.tempat_lahir, '-', OLD.tanggal_lahir, '-', OLD.agama, '-', OLD.anak_ke, '-', OLD.jumlah_saudara, '-', OLD.berat_badan, '-', OLD.tinggi_badan, '-', OLD.gol_darah, '-', OLD.no_hp, '-', OLD.alamat, '-', OLD.status, '-', OLD.foto, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_siswa` AFTER INSERT ON `siswa` FOR EACH ROW BEGIN 
INSERT INTO log_siswa
(waktu, aksi, who, id_siswa, old_nis, new_nis, old_nisn, new_nisn, old_nama_lengkap, new_nama_lengkap, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_anak_ke, new_anak_ke, old_jlh_saudara, new_jlh_saudara, old_berat_badan, new_berat_badan, old_tinggi_badan, new_tinggi_badan, old_gol_darah, new_gol_darah, old_no_hp, new_no_hp, old_alamat, new_alamat, old_status, new_status, old_foto, new_foto)
VALUES 
(NOW(), 'insert', USER(), NEW.id, '-', NEW.nis, '-', NEW.nisn, '-', NEW.nama_lengkap, '-', NEW.jenis_kelamin, '-', NEW.tempat_lahir, '-', NEW.tanggal_lahir, '-', NEW.agama, '-', NEW.anak_ke, '-', NEW.jumlah_saudara, '-', NEW.berat_badan, '-', NEW.tinggi_badan, '-', NEW.gol_darah, '-', NEW.no_hp, '-', NEW.alamat, '-', NEW.status, '-', NEW.foto);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_siswa` BEFORE UPDATE ON `siswa` FOR EACH ROW BEGIN 
INSERT INTO log_siswa
(waktu, aksi, who, id_siswa, old_nis, new_nis, old_nisn, new_nisn, old_nama_lengkap, new_nama_lengkap, old_jk, new_jk, old_tempat_lahir, new_tempat_lahir, old_tanggal_lahir, new_tanggal_lahir, old_agama, new_agama, old_anak_ke, new_anak_ke, old_jlh_saudara, new_jlh_saudara, old_berat_badan, new_berat_badan, old_tinggi_badan, new_tinggi_badan, old_gol_darah, new_gol_darah, old_no_hp, new_no_hp, old_alamat, new_alamat, old_status, new_status, old_foto, new_foto)
VALUES 
(NOW(), 'update', USER(), OLD.id, OLD.nis, NEW.nis, OLD.nisn, NEW.nisn, OLD.nama_lengkap, NEW.nama_lengkap, OLD.jenis_kelamin, NEW.jenis_kelamin, OLD.tempat_lahir, NEW.tempat_lahir, OLD.tanggal_lahir, NEW.tanggal_lahir, OLD.agama, NEW.agama, OLD.anak_ke, NEW.anak_ke, OLD.jumlah_saudara, NEW.jumlah_saudara, OLD.berat_badan, NEW.berat_badan, OLD.tinggi_badan, NEW.tinggi_badan, OLD.gol_darah, NEW.gol_darah, OLD.no_hp, NEW.no_hp, OLD.alamat, NEW.alamat, OLD.status, NEW.status, OLD.foto, NEW.foto);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_jenis_kelamin_siswa` BEFORE INSERT ON `siswa` FOR EACH ROW BEGIN
IF
(new.jenis_kelamin = 'L' OR new.jenis_kelamin = 'P')
THEN
SET new.jenis_kelamin = new.jenis_kelamin;
ELSEIF
(new.jenis_kelamin != 'L' OR new.jenis_kelamin != 'P')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Input jenis kelamin siswa tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_status_siswa` BEFORE INSERT ON `siswa` FOR EACH ROW BEGIN
IF
(new.status = 'Lulus' OR
new.status = 'Aktif' OR
new.status = 'Pindah')
THEN
SET new.status = new.status;
ELSEIF
(new.status != 'Lulus' OR
new.status != 'Aktif' OR
new.status != 'Pindah')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Input status siswa tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_jenis_kelamin_siswa` BEFORE UPDATE ON `siswa` FOR EACH ROW BEGIN
IF
(new.jenis_kelamin = 'L' OR new.jenis_kelamin = 'P')
THEN
SET new.jenis_kelamin = new.jenis_kelamin;
ELSEIF
(new.jenis_kelamin != 'L' OR new.jenis_kelamin != 'P')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Jenis kelamin siswa yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_status_siswa` BEFORE UPDATE ON `siswa` FOR EACH ROW BEGIN
IF
(new.status = 'Lulus' OR new.status = 'Aktif' OR new.status = 'Pindah')
THEN
SET new.status = new.status;
ELSEIF
(new.status != 'Lulus' OR new.status != 'Aktif' OR new.status != 'Pindah')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Status siswa yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id` int(11) NOT NULL,
  `tahun_pelajaran` varchar(9) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id`, `tahun_pelajaran`, `semester`) VALUES
(6, '2020/2021', 'Ganjil'),
(7, '2020/2021', 'Genap'),
(9, '2021/2022', 'Ganjil'),
(10, '2021/2022', 'Genap'),
(11, '2022/2023', 'Ganjil'),
(12, '2022/2023', 'Genap');

--
-- Triggers `tahun_pelajaran`
--
DELIMITER $$
CREATE TRIGGER `cant_update_id_tahun_pelajaran` BEFORE UPDATE ON `tahun_pelajaran` FOR EACH ROW BEGIN 
IF NEW.id <> OLD.id THEN 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID TIDAK DAPAT DIUBAH !';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_tahun_pelajaran` BEFORE DELETE ON `tahun_pelajaran` FOR EACH ROW BEGIN 
INSERT INTO log_tahun_pelajaran(waktu, aksi, who, id_thn_pelajaran, old_tahun_pelajaran, new_tahun_pelajaran, old_semester, new_semester)
VALUES(NOW(), 'delete', USER(), OLD.id, OLD.tahun_pelajaran, '-', OLD.semester, '-');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tahun_pelajaran` AFTER INSERT ON `tahun_pelajaran` FOR EACH ROW BEGIN
INSERT INTO log_tahun_pelajaran(waktu, aksi, who, id_thn_pelajaran, old_tahun_pelajaran, new_tahun_pelajaran, old_semester, new_semester)
VALUES(NOW(), 'insert', USER(), NEW.id, '-', NEW.tahun_pelajaran, '-', NEW.semester);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_tahun_pelajaran` BEFORE UPDATE ON `tahun_pelajaran` FOR EACH ROW BEGIN 
INSERT INTO log_tahun_pelajaran(waktu, aksi, who, id_thn_pelajaran, old_tahun_pelajaran, new_tahun_pelajaran, old_semester, new_semester)
VALUES(NOW(), 'update', USER(), OLD.id, OLD.tahun_pelajaran, NEW.tahun_pelajaran, OLD.semester, NEW.semester);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_insert_tahunpelajaran` BEFORE INSERT ON `tahun_pelajaran` FOR EACH ROW BEGIN
DECLARE thn CHAR(9);
DECLARE sem ENUM('Ganjil','Genap');
SELECT NEW.tahun_pelajaran INTO thn;
SELECT NEW.semester INTO sem;
IF EXISTS (SELECT id FROM tahun_pelajaran WHERE tahun_pelajaran = thn AND semester = sem) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf data tahun pelajaran yang ingin diinsert sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_before_update_tahunpelajaran` BEFORE UPDATE ON `tahun_pelajaran` FOR EACH ROW BEGIN
DECLARE thn CHAR(9);
DECLARE sem ENUM('Ganjil','Genap');
SELECT NEW.tahun_pelajaran INTO thn;
SELECT NEW.semester INTO sem;
IF EXISTS (SELECT id FROM tahun_pelajaran WHERE tahun_pelajaran = thn AND semester = sem) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Maaf data tahun pelajaran yang ingin diupdate sudah ada pada tabel';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_input_semester` BEFORE INSERT ON `tahun_pelajaran` FOR EACH ROW BEGIN
IF
(new.semester = 'Ganjil' OR new.semester = 'Genap')
THEN
SET new.semester = new.semester;
ELSEIF
(new.semester != 'Ganjil' OR new.semester !=n'Genap')
THEN
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Input semester tidak valid!';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_update_semester` BEFORE UPDATE ON `tahun_pelajaran` FOR EACH ROW BEGIN
IF
(new.semester = 'Ganjil' OR new.semester = 'Genap')
THEN
SET new.semester = new.semester;
ELSEIF
(new.semester != 'Ganjil' OR new.semester != 'Genap')
THEN
SIGNAL SQLSTATE
'45000'
SET MESSAGE_TEXT = 'Semester yang diupdate tidak valid!';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ekstrakurikuler`
-- (See below for the actual view)
--
CREATE TABLE `view_ekstrakurikuler` (
`id` int(11)
,`ekstrakurikuler` varchar(35)
,`keterangan` text
,`guru_pembina` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kelas_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_kelas_siswa` (
`id_atur_ks` int(11)
,`nis` char(4)
,`nama_siswa` varchar(50)
,`kelas` char(3)
,`tahun_pelajaran` varchar(9)
,`semester` enum('Ganjil','Genap')
,`walikelas` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rapor`
-- (See below for the actual view)
--
CREATE TABLE `view_rapor` (
`id_siswa` int(11)
,`id_mapel` int(11)
,`id_tahunajar` int(11)
,`nilai_pengetahuan` int(11)
,`hurufnp` enum('A','B','C','D')
,`nilai_keterampilan` int(11)
,`hurufnk` enum('A','B','C','D')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_status_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_status_siswa` (
`nis` char(4)
,`nama` varchar(50)
,`status` enum('Aktif','Lulus','Pindah')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_walikelas`
-- (See below for the actual view)
--
CREATE TABLE `view_walikelas` (
`id_atur` int(11)
,`kelas` char(3)
,`tahun_pelajaran` varchar(9)
,`semester` enum('Ganjil','Genap')
,`walikelas` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_ekstrakurikuler`
--
DROP TABLE IF EXISTS `view_ekstrakurikuler`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ekstrakurikuler`  AS SELECT `ekstrakurikuler`.`id` AS `id`, `ekstrakurikuler`.`nama` AS `ekstrakurikuler`, `ekstrakurikuler`.`keterangan` AS `keterangan`, `guru`.`nama_lengkap` AS `guru_pembina` FROM (`ekstrakurikuler` join `guru` on(`guru`.`id` = `ekstrakurikuler`.`id_guru`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_kelas_siswa`
--
DROP TABLE IF EXISTS `view_kelas_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas_siswa`  AS SELECT `pk`.`id` AS `id_atur_ks`, `s`.`nis` AS `nis`, `s`.`nama_lengkap` AS `nama_siswa`, `p`.`nama` AS `kelas`, `t`.`tahun_pelajaran` AS `tahun_pelajaran`, `t`.`semester` AS `semester`, `g`.`nama_lengkap` AS `walikelas` FROM ((((`pengaturan_kelas_siswa` `pk` join `pengaturan_kelas` `p` on(`p`.`id` = `pk`.`id_pengaturan_kelas`)) join `tahun_pelajaran` `t` on(`t`.`id` = `p`.`id_tahun_pelajaran`)) join `guru` `g` on(`g`.`id` = `p`.`id_guru`)) join `siswa` `s` on(`s`.`id` = `pk`.`id_siswa`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_rapor`
--
DROP TABLE IF EXISTS `view_rapor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rapor`  AS SELECT `nilai_siswa`.`id_siswa` AS `id_siswa`, `nilai_siswa`.`id_mapel` AS `id_mapel`, `nilai_siswa`.`id_tahunajar` AS `id_tahunajar`, `nilai_siswa`.`nilai_pengetahuan` AS `nilai_pengetahuan`, `konversi_nilai`(`nilai_siswa`.`nilai_pengetahuan`) AS `hurufnp`, `nilai_siswa`.`nilai_keterampilan` AS `nilai_keterampilan`, `konversi_nilai`(`nilai_siswa`.`nilai_keterampilan`) AS `hurufnk` FROM `nilai_siswa``nilai_siswa`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_status_siswa`
--
DROP TABLE IF EXISTS `view_status_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_status_siswa`  AS SELECT `siswa`.`nis` AS `nis`, `siswa`.`nama_lengkap` AS `nama`, `siswa`.`status` AS `status` FROM `siswa``siswa`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_walikelas`
--
DROP TABLE IF EXISTS `view_walikelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_walikelas`  AS SELECT `p`.`id` AS `id_atur`, `p`.`nama` AS `kelas`, `t`.`tahun_pelajaran` AS `tahun_pelajaran`, `t`.`semester` AS `semester`, `g`.`nama_lengkap` AS `walikelas` FROM ((`pengaturan_kelas` `p` join `tahun_pelajaran` `t` on(`t`.`id` = `p`.`id_tahun_pelajaran`)) join `guru` `g` on(`g`.`id` = `p`.`id_guru`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `akun_guru`
--
ALTER TABLE `akun_guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_idguru` (`id_guru`);

--
-- Indexes for table `akun_kepsek`
--
ALTER TABLE `akun_kepsek`
  ADD KEY `fk_kepsek` (`id_kepsek`);

--
-- Indexes for table `asal_mula`
--
ALTER TABLE `asal_mula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idsiswa_asal` (`id_siswa`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_guru` (`id_guru`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `log_akun_admin`
--
ALTER TABLE `log_akun_admin`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_akun_guru`
--
ALTER TABLE `log_akun_guru`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_asal_mula`
--
ALTER TABLE `log_asal_mula`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_ekstrakurikuler`
--
ALTER TABLE `log_ekstrakurikuler`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_fasilitas`
--
ALTER TABLE `log_fasilitas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_guru`
--
ALTER TABLE `log_guru`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_kegiatan`
--
ALTER TABLE `log_kegiatan`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_kepala_sekolah`
--
ALTER TABLE `log_kepala_sekolah`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_mata_pelajaran`
--
ALTER TABLE `log_mata_pelajaran`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_nilai_siswa`
--
ALTER TABLE `log_nilai_siswa`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_idsiswa_lognilai` (`id_siswa`),
  ADD KEY `fk_idmapel_lognilai` (`id_mapel`),
  ADD KEY `fk_idtp_lognilai` (`id_tahunajar`);

--
-- Indexes for table `log_orang_tua`
--
ALTER TABLE `log_orang_tua`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_pelajaran_guru`
--
ALTER TABLE `log_pelajaran_guru`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_pengaturan_kelas`
--
ALTER TABLE `log_pengaturan_kelas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_pengaturan_kelas_siswa`
--
ALTER TABLE `log_pengaturan_kelas_siswa`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_prestasi`
--
ALTER TABLE `log_prestasi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_profil_sekolah`
--
ALTER TABLE `log_profil_sekolah`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_siswa`
--
ALTER TABLE `log_siswa`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_tahun_pelajaran`
--
ALTER TABLE `log_tahun_pelajaran`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_mapel` (`id_mapel`),
  ADD KEY `fk_id_thnpelajaran` (`id_tahunajar`),
  ADD KEY `fk_id_siswa_nilai` (`id_siswa`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idsiswa_ortu` (`id_siswa`);

--
-- Indexes for table `pelajaran_guru`
--
ALTER TABLE `pelajaran_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idg` (`id_guru`),
  ADD KEY `fk_idm` (`id_mapel`);

--
-- Indexes for table `pengaturan_kelas`
--
ALTER TABLE `pengaturan_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_tahunajar` (`id_tahun_pelajaran`),
  ADD KEY `fk_id_walikelas` (`id_guru`);

--
-- Indexes for table `pengaturan_kelas_siswa`
--
ALTER TABLE `pengaturan_kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idsiswa_pengaturan` (`id_siswa`),
  ADD KEY `fk_idkelas_pengaturan` (`id_pengaturan_kelas`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`) USING BTREE;

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akun_guru`
--
ALTER TABLE `akun_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asal_mula`
--
ALTER TABLE `asal_mula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_akun_admin`
--
ALTER TABLE `log_akun_admin`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_akun_guru`
--
ALTER TABLE `log_akun_guru`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `log_asal_mula`
--
ALTER TABLE `log_asal_mula`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_ekstrakurikuler`
--
ALTER TABLE `log_ekstrakurikuler`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_fasilitas`
--
ALTER TABLE `log_fasilitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log_guru`
--
ALTER TABLE `log_guru`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `log_kegiatan`
--
ALTER TABLE `log_kegiatan`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `log_kepala_sekolah`
--
ALTER TABLE `log_kepala_sekolah`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_mata_pelajaran`
--
ALTER TABLE `log_mata_pelajaran`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log_nilai_siswa`
--
ALTER TABLE `log_nilai_siswa`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `log_orang_tua`
--
ALTER TABLE `log_orang_tua`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_pelajaran_guru`
--
ALTER TABLE `log_pelajaran_guru`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_pengaturan_kelas`
--
ALTER TABLE `log_pengaturan_kelas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `log_pengaturan_kelas_siswa`
--
ALTER TABLE `log_pengaturan_kelas_siswa`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `log_prestasi`
--
ALTER TABLE `log_prestasi`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `log_profil_sekolah`
--
ALTER TABLE `log_profil_sekolah`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_siswa`
--
ALTER TABLE `log_siswa`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `log_tahun_pelajaran`
--
ALTER TABLE `log_tahun_pelajaran`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelajaran_guru`
--
ALTER TABLE `pelajaran_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengaturan_kelas`
--
ALTER TABLE `pengaturan_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengaturan_kelas_siswa`
--
ALTER TABLE `pengaturan_kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_guru`
--
ALTER TABLE `akun_guru`
  ADD CONSTRAINT `fk_idguru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `akun_kepsek`
--
ALTER TABLE `akun_kepsek`
  ADD CONSTRAINT `fk_kepsek` FOREIGN KEY (`id_kepsek`) REFERENCES `kepala_sekolah` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `asal_mula`
--
ALTER TABLE `asal_mula`
  ADD CONSTRAINT `fk_idsiswa_asal` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD CONSTRAINT `fk_id_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `fk_id_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_siswa_nilai` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_thnpelajaran` FOREIGN KEY (`id_tahunajar`) REFERENCES `tahun_pelajaran` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ortu`
--
ALTER TABLE `ortu`
  ADD CONSTRAINT `fk_idsiswa_ortu` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pelajaran_guru`
--
ALTER TABLE `pelajaran_guru`
  ADD CONSTRAINT `fk_idg` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idm` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengaturan_kelas`
--
ALTER TABLE `pengaturan_kelas`
  ADD CONSTRAINT `fk_id_tahunajar` FOREIGN KEY (`id_tahun_pelajaran`) REFERENCES `tahun_pelajaran` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_walikelas` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengaturan_kelas_siswa`
--
ALTER TABLE `pengaturan_kelas_siswa`
  ADD CONSTRAINT `fk_idkelas_pengaturan` FOREIGN KEY (`id_pengaturan_kelas`) REFERENCES `pengaturan_kelas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idsiswa_pengaturan` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
