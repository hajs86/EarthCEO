-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 17 Lip 2014, 22:16
-- Wersja serwera: 5.5.36-MariaDB
-- Wersja PHP: 5.5.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `taxes_mb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tax`
--

CREATE TABLE IF NOT EXISTS `Tax` (
  `internalId` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taxesPIT` double DEFAULT NULL,
  `taxesCIT` double DEFAULT NULL,
  `taxesVAT` double DEFAULT NULL,
  `taxesOther` double DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `mayorName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mayorEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`internalId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1281 ;

--
-- Zrzut danych tabeli `Tax`
--

INSERT INTO `Tax` (`internalId`, `id`, `city`, `country`, `taxesPIT`, `taxesCIT`, `taxesVAT`, `taxesOther`, `population`, `mayorName`, `mayorEmail`, `updateDate`, `position`) VALUES
(1241, '4', 'Mount Isa', 'Uzbekistan', 148955, 194232, 384950, 129148, 813420, 'Donna R. Parrish', 'ornare@vestibulum.edu', '2013-05-27', 0),
(1242, '5', 'Vienna', 'Bermuda', 105913, 244864, 417631, 170634, 517707, 'Shelby U. Dennis', 'volutpat.Nulla.facilisis@Sedeunibh.net', '2013-08-01', 0),
(1243, '6', 'Middelburg', 'Guam', 160151, 296474, 360436, 110649, 1697070, 'Amos C. Cox', 'mauris@nonummyut.co.uk', '2014-08-29', 0),
(1244, '7', 'Vienna', 'Uzbekistan', 102509, 158649, 385201, 199937, 681798, 'Melvin W. Cobb', 'quam@hymenaeos.edu', '2013-10-13', 0),
(1245, '8', 'Andenne', 'Moldova', 167198, 255804, 449648, 189876, 607701, 'Jessamine T. Cooke', 'interdum.ligula@ullamcorper.edu', '2015-04-18', 0),
(1246, '15', 'Harderwijk', 'Afghanistan', 193394, 200654, 230617, 176509, 691857, 'Reuben H. Garza', 'pharetra.felis@elitpede.ca', '2014-08-30', 0),
(1247, '16', 'Shawinigan', 'Malaysia', 185462, 147173, 323724, 112673, 876202, 'Theodore Levy', 'convallis.convallis.dolor@magna.com', '2013-05-19', 0),
(1248, '17', 'Berlin', 'Pakistan', 110825, 167097, 449975, 191116, 963006, 'Quin Chambers', 'libero@mattis.org', '2015-01-06', 0),
(1249, '18', 'Puntarenas', 'Guyana', 192470, 102164, 473436, 127348, 413732, 'Cairo E. Duffy', 'Donec@nonlaciniaat.net', '2013-07-27', 0),
(1250, '19', 'Colorado Springs', 'Timor-Leste', 122351, 331811, 437563, 167583, 870718, 'Gretchen K. Shaw', 'ultrices.Vivamus@velarcueu.edu', '2014-05-31', 0),
(1251, '27', 'Picton', 'Puerto Rico', 159381, 214580, 368840, 171166, 917731, 'September G. Fry', 'ultrices.mauris.ipsum@justosit.net', '2015-04-04', 0),
(1252, '28', 'San Nicols', 'Singapore', 116834, 289416, 288692, 148635, 993506, 'Levi Reed', 'Mauris.nulla.Integer@malesuada.org', '2014-04-11', 0),
(1253, '29', 'Chtelet', 'Antarctica', 113188, 142479, 480058, 151864, 354506, 'Adrian D. Craft', 'scelerisque.neque.sed@telluseuaugue.edu', '2014-05-26', 0),
(1254, '30', 'Vienna', 'Uzbekistan', 153655, 304028, 424321, 122062, 441413, 'Aubrey E. Randall', 'Proin.sed.turpis@Duis.org', '2014-05-27', 0),
(1255, '31', 'Satara', 'Malta', 183376, 199152, 235330, 126021, 979590, 'Jana Langley', 'Cras.eget+test@leoVivamus.ca', '2014-12-07', 0),
(1256, '32', 'Zierikzee', 'Portugal', 169573, 260499, 386719, 186031, 935497, 'David Turner', 'Fusce.fermentum@mattisCraseget.com', '2013-09-12', 0),
(1257, '33', 'Cochin', 'Guyana', 133019, 126016, 488608, 161188, 768434, 'Adrienne Q. Cortez', 'at.lacus@lectusjusto.ca', '2013-11-13', 0),
(1258, '34', 'Penrith', 'Bermuda', 116099, 190331, 393110, 110964, 559508, 'Raja Terrell', 'pharetra.Nam.ac@Crasdictumultricies.co.uk', '2014-10-15', 0),
(1259, '35', 'Doel', 'American Samoa', 101485, 303835, 417379, 179204, 138146, 'Quon W. Conway', 'fermentum.arcu.Vestibulum@nunc.com', '2013-06-27', 0),
(1260, '36', 'Heredia', 'Brunei', 120443, 268654, 260152, 191192, 926041, 'Thaddeus Copeland', 'vehicula@facilisisegetipsum.com', '2015-04-29', 0),
(1261, '37', 'Hamburg', 'Dominica', 132920, 263543, 251670, 146368, 275035, 'Blaine Carroll', 'molestie.dapibus.ligula@Cras.co.uk', '2015-03-10', 0),
(1262, '38', 'Paranagu', 'Estonia', 180982, 102341, 268726, 193771, 979429, 'Ori T. Rasmussen', 'metus.eu.erat@vulputate.org', '2014-03-06', 0),
(1263, '39', 'San Nicols', 'Czech Republic', 191584, 312954, 461709, 130274, 895722, 'Abigail R. Dennis', 'Nulla.eget@dignissim.net', '2014-04-28', 0),
(1264, '40', 'Len', 'Tanzania', 195557, 289253, 465561, 141207, 212288, 'Jenna Preston', 'Phasellus.elit@Fuscefeugiat.co.uk', '2013-07-22', 0),
(1265, '41', 'Springfield', 'San Marino', 162512, 255281, 487081, 118956, 870009, 'Tarik Landry', 'nec.mollis.vitae@Duisgravida.edu', '2014-11-08', 0),
(1266, '42', 'Knighton', 'Cocos (Keeling) Islands', 121257, 156839, 452139, 100912, 828857, 'Vincent Cotton', 'Nam.ac.nulla@pellentesque.ca', '2014-04-21', 0),
(1267, '43', 'Portland', 'Honduras', 108218, 130392, 217898, 122441, 888716, 'Quinn Gilmore', 'sed.leo.Cras@justo.net', '2014-01-18', 0),
(1268, '44', 'Winterswijk', 'France', 122855, 332797, 394957, 124427, 614007, 'Ava Whitaker', 'Cras.eu@Vivamussitamet.net', '2014-09-22', 0),
(1269, '45', 'Motueka', 'Faroe Islands', 193589, 337441, 343958, 190986, 567806, 'Daniel Lucas', 'quis.tristique.ac@vestibulum.net', '2014-04-10', 0),
(1270, '46', 'Dannevirke', 'Heard Island and Mcdonald Islands', 141077, 108720, 200452, 146433, 708443, 'Dorian E. Dickerson', '', '2014-05-31', 0),
(1271, '59', 'Vienna', 'China', 111446, 116056, 425011, 198605, 247628, 'Claire Cain', 'Donec.at.arcu@aliquamiaculis.net', '2014-03-27', 0),
(1272, '70', 'Covington', 'Colombia', 133211, 152364, 206246, 124427, 788671, 'Cheryl Hutchinson', 'eu@arcuMorbi.org', '2013-11-13', 0),
(1273, '71', 'Blois', 'Sri Lanka', 131409, 179279, 317580, 160614, 305528, 'Talon Garza', 'amet@nibh.com', '2014-12-17', 0),
(1274, '72', 'Zierikzee', 'Niger', 145740, 207870, 228929, 163859, 357176, 'Jordan Q. Strickland', 'tellus.Aenean@inmagnaPhasellus.ca', '2013-12-20', 0),
(1275, '77', 'Provost', 'Togo', 139363, 325712, 376449, 194904, 187066, 'Jesse B. Santos', 'In.at@euenim.co.uk', '2014-10-28', 0),
(1276, '78', 'Cortil-Noirmont', 'China', 198632, 328754, 208110, 179118, 441727, 'Nicole P. Slater', 'Nunc.sollicitudin@acfeugiat.ca', '2013-09-14', 0),
(1277, '79', 'Gianico', 'Mexico', 181471, 155796, 499185, 115419, 581598, 'Briar N. Hodge', 'cursus.vestibulum.Mauris@duinec.net', '2014-03-13', 0),
(1278, '80', 'Hoogeveen', 'United Kingdom (Great Britain)', 108997, 169780, 427754, 127587, 302667, 'Vance N. Vance', 'eu@risusMorbimetus.edu', '2013-05-20', 0),
(1279, '90', 'Dindigul', 'FALSE', 121879, 184108, 303425, 188579, 317775, 'Pearl O. White', 'Proin.velit.Sed@Aenean.net', '2015-01-28', 0),
(1280, '91', 'Sierning', 'Saint Vincent and The Grenadines', 110135, 210596, 448723, 165593, 332479, 'Zelda Sheppard', 'mollis.vitae.posuere@mauris.co.uk', '2013-07-16', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
