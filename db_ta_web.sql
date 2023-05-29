/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_ta_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ta_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_ta_web`;

/*Table structure for table `tbl_brg` */

DROP TABLE IF EXISTS `tbl_brg`;

CREATE TABLE `tbl_brg` (
  `id_brg` int(11) NOT NULL AUTO_INCREMENT,
  `nama_brg` varchar(255) NOT NULL,
  `jum_ketersediaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_brg` */

insert  into `tbl_brg`(`id_brg`,`nama_brg`,`jum_ketersediaan`) values 
(1,'Kamera','3'),
(2,'Kamera Handycam','1'),
(3,'Tripod Kamera','2'),
(4,'Mircophone Kamera','1'),
(5,'Lighting','4'),
(6,'Stabilizer','1'),
(7,'Mic Wireless','4 Set'),
(8,'Proyektor','3'),
(9,'Stand Mic','3'),
(10,'Mic Kabel','2'),
(11,'Speaker Portable','1'),
(12,'Terminal','5'),
(13,'Mic Podium','2'),
(14,'TV','3'),
(15,'Sound System','1 Set');

/*Table structure for table `tbl_peminjaman` */

DROP TABLE IF EXISTS `tbl_peminjaman`;

CREATE TABLE `tbl_peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_brg` int(11) DEFAULT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  `lama_pinjam` varchar(255) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `npm` varchar(8) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_brg` (`id_brg`),
  KEY `id_ruangan` (`id_ruangan`),
  CONSTRAINT `tbl_peminjaman_ibfk_2` FOREIGN KEY (`id_brg`) REFERENCES `tbl_brg` (`id_brg`),
  CONSTRAINT `tbl_peminjaman_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_peminjaman` */

insert  into `tbl_peminjaman`(`id`,`id_ruangan`,`id_brg`,`no_tlp`,`lama_pinjam`,`alasan`,`date`,`nama`,`npm`,`prodi`,`time`) values 
(12,1,3,'089152716121','Aula','Kegiatan Mengajar\r\n','2023-06-01','Akhfee Lauki Mahfuda','21312109','Informatika',NULL),
(14,3,3,'08918276912','2 Hari','Kegiatan Hima','2023-06-10','Raldho Alyanrus','21312115','Sastra Inggris','0000-00-00 00:00:00'),
(15,2,5,'089268263822','3 Hari','Kegiatan Kampus\r\n','2023-06-02','Raldho Alyanrus','21312115','Informatika','0000-00-00 00:00:00');

/*Table structure for table `tbl_ruangan` */

DROP TABLE IF EXISTS `tbl_ruangan`;

CREATE TABLE `tbl_ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(255) DEFAULT NULL,
  `kap_ruangan` varchar(255) DEFAULT NULL,
  `ged` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_ruangan` */

insert  into `tbl_ruangan`(`id`,`nama_ruangan`,`kap_ruangan`,`ged`) values 
(1,'201 B','50 Orang','Ged B (FSIP)'),
(2,'202 B','50 Orang','Ged B (FSIP)'),
(3,'203 B','40 Orang','Ged B (FSIP)'),
(4,'204 B','50 Orang','Ged B (FSIP)'),
(5,'301 B','50 Orang','Ged B (FSIP)'),
(6,'302 B','50 Orang','Ged B (FSIP)'),
(7,'303 B','50 Orang','Ged B (FSIP)'),
(8,'304 B','40 Orang','Ged B (FSIP)'),
(9,'Aula A','100 Orang','Ged A (FEB)'),
(10,'401 A','80 Orang','Ged A (FEB)'),
(11,'402 A','80 Orang','Ged A (FEB)'),
(12,'209','45 Orang','Ged A (FEB)'),
(13,'Lab 1 A','50 Orang','Ged A (FEB)'),
(14,'Lab 2 A','40 Orang','Ged A (FEB)'),
(15,'Lab Bahasa','40 Orang','Ged A (FEB)'),
(16,'Gelanggang Indoor','1000 Orang','Ged GSG'),
(17,'Lab 4 GSG','40 Orang  ','Ged GSG'),
(18,'Lab 1 GSG','40 Orang','Ged GSG'),
(19,'Lab 2 GSG','40 Orang','Ged GSG'),
(20,'Lab 3 GSG','40 Orang','Ged GSG'),
(21,'301 ICT A','50 Orang','Ged ICT'),
(22,'301 ICT B','100 Orang','Ged ICT');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `npm` varchar(8) NOT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `no_tlp` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`npm`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`nama`,`password`,`npm`,`prodi`,`no_tlp`,`alamat`) values 
(15,'akhfee lauki mahfuda','$2y$10$00GRUkCU8nUep27Qq1SvO.NR/zNwKqNBzURU3PitrPSC.iYBd3gOi','21312109','Informatika','0895704245825','Blora Indah'),
(17,'raldho alyanrus','$2y$10$Yf0.dVntkfqciYYv/n3sF.ab.sLpVeBa6PNChXti2a5pZYS4VOEUO','21312115','Informatika','08916275182712','Kemiling');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
