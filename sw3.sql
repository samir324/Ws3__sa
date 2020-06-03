-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 10:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sw3`
--

-- --------------------------------------------------------

--
-- Table structure for table `benevole`
--

CREATE TABLE `benevole` (
  `idbenevole` int(11) NOT NULL,
  `nombenevole` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenombenevole` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mailbenevole` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordbenevole` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benevole`
--

INSERT INTO `benevole` (`idbenevole`, `nombenevole`, `prenombenevole`, `mailbenevole`, `passwordbenevole`) VALUES
(4, 'b', 'd', 'b@b.b', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `idcours` int(11) NOT NULL,
  `nomcours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idmatiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`idcours`, `nomcours`, `idmatiere`) VALUES
(1, 'الحال', 1),
(2, 'التمييز', 1),
(3, ' العدد ', 1),
(4, ' الاستفهام ', 1),
(5, ' الأمر والنهي ', 1),
(6, ' التمني', 1),
(7, ' النداء', 1),
(8, 'المجزوءة الأولى: أنواع الخطاب', 1),
(9, 'المجزوءة الثانية: قضايا معاصرة', 1),
(10, ' الممنوع من الصرف', 1),
(11, ' المصادر ', 1),
(12, ' النسبة', 1),
(13, ' الإيجاز والإطناب ', 1),
(14, ' الطباق والمقابلة', 1),
(15, ' ‫الاستعارة ', 1),
(16, 'المجزوءة الأولى: مفاهيم', 1),
(18, 'المجزوءة الثانية: الشعر والقيم', 1),
(19, ' مهارة الربط بين الأفكار', 1),
(20, ' مهارة المقارنة والإستنتاج ', 1),
(21, ' Les champs lexicaux ', 2),
(22, ' Les registres de langue ', 2),
(23, ' La focalisation ou point de vue', 2),
(24, ' L\'énonciation', 2),
(25, ' Les figures de style', 2),
(26, ' Les niveaux de langue ', 2),
(27, 'Récit et discours ', 2),
(28, 'Le discours rapporté ', 2),
(29, ' Étude du discours rapporté ', 2),
(30, 'La Boite à Merveilles (Roman autobiographique) ', 2),
(31, 'La Planète des singes (Roman de science fiction) ', 2),
(32, 'Le dernier jour d\'un condamné (Roman à thèse)', 2),
(33, 'Antigone (Théâtre) ', 2),
(34, ' تقديم عام لبرنامج التاريخ: التحولات الكبرى للعالم الرأسمالي وانعكاساتها خلال القرنين 19م و20م ', 3),
(35, ' التحولات الاقتصادية والمالية والاجتماعية والفكرية في العالم في القرن 19م ', 3),
(36, ' التنافس الامبريالي واندلاع الحرب العالمية الأولى ', 3),
(37, ' اليقظة الفكرية بالمشرق العربي ', 3),
(38, ' الضغوط الاستعمارية على المغرب ومحاولات الإصلاح ', 3),
(39, ' أوروبا من نهاية الحرب العالمية الأولى إلى أزمة 1929م ', 3),
(40, ' الحرب العالمية الثانية – الأسباب والنتائج ', 3),
(41, ' نظام الحماية بالمغرب والاستغلال الاستعماري ', 3),
(42, ' نضال المغرب من أجل تحقيق الاستقلال واستكمال الوحدة الترابية ', 3),
(43, ' ملف العولمة والتحديات الراهنة ', 3),
(44, ' مفهوم التنمية – تعدد المقاربات، التقسيمات الكبرى للعالم – خريطة التنمية ', 3),
(45, ' المجال المغربي – الموارد الطبيعية والبشرية', 3),
(46, ' الاختيارات الكبرى لسياسة إعداد التراب الوطني', 3),
(47, ' التهيئة الحضرية والريفية – أزمة المدينة والريف وأشكال التدخل', 3),
(48, ' العالم العربي – مشكل الماء وظاهرة التصحر', 3),
(49, ' الولايات المتحدة الأمريكية قوة اقتصادية عظمى', 3),
(50, ' الاتحاد الأوربي نحو اندماج شامل ', 3),
(51, ' الصين قوة اقتصادية صاعدة', 3),
(52, ' ملف الشراكة بين المغرب والاتحاد الأوروبي ', 3),
(53, 'مدخل التزكية (القرآن الكريم) ', 4),
(54, 'مدخل التزكية (العقيدة) ', 4),
(55, 'مدخل الإقتداء ', 4),
(56, 'مدخل الإستجابة ', 4),
(57, 'مدخل القسط ', 4),
(58, 'مدخل الـحكمة ', 4),
(59, 'الحال\r\n ', 5),
(60, ' التمييز ', 5),
(61, ' العدد ', 5),
(62, ' الاستفهام ', 5),
(63, ' الأمر والنهي ', 5),
(64, ' التمني ', 5),
(65, ' الممنوع من الصرف', 5),
(66, ' المصادر', 5),
(67, ' النسبة ', 5),
(68, ' الإيجاز والإطناب', 5),
(69, ' الطباق والمقابلة ', 5),
(70, ' ‫الاستعارة ‬‎ ', 5),
(71, 'المجزوءة الأولى: أنواع الخطاب', 5),
(72, 'المجزوءة الثانية: قضايا معاصرة', 5),
(73, 'المجزوءة الأولى: مفاهيم', 5),
(74, 'مجزوءة الثانية: الشعر والقيم', 5),
(75, ' مهارة الربط بين الأفكار', 5),
(76, ' مهارة المقارنة والإستنتاج ', 5),
(77, ' Les champs lexicaux ', 6),
(78, ' Les registres de langue ', 6),
(79, ' La focalisation ou point de vue ', 6),
(80, ' L\'énonciation ', 6),
(81, ' Les figures de style', 6),
(82, '\r\nLes niveaux de langue\r\n', 6),
(83, ' Récit et discours ', 6),
(84, ' Le discours rapporté ', 6),
(85, ' La focalisation Interne, externe et zéro', 6),
(86, 'La Boite à Merveilles (Roman autobiographique) ', 6),
(87, 'La Planète des singes (Roman de science fiction) ', 6),
(88, 'Le dernier jour d\'un condamné (Roman à thèse) ', 6),
(89, 'Antigone (Théâtre) ', 6),
(90, ' تقديم عام لبرنامج التاريخ: التحولات الكبرى للعالم الرأسمالي وانعكاساتها خلال القرنين 19م و20م ', 7),
(91, ' التحولات الاقتصادية والمالية والاجتماعية والفكرية في العالم في القرن 19م ', 7),
(92, ' التنافس الامبريالي واندلاع الحرب العالمية الأولى', 7),
(93, ' اليقظة الفكرية بالمشرق العربي', 7),
(94, ' الضغوط الاستعمارية على المغرب ومحاولات الإصلاح', 7),
(95, ' أوروبا من نهاية الحرب العالمية الأولى إلى أزمة 1929م', 7),
(96, ' الحرب العالمية الثانية – الأسباب والنتائج ', 7),
(97, ' نظام الحماية بالمغرب والاستغلال الاستعماري ', 7),
(98, ' نضال المغرب من أجل تحقيق الاستقلال واستكمال الوحدة الترابية ', 7),
(99, ' ملف العولمة والتحديات الراهنة ', 7),
(100, ' مفهوم التنمية – تعدد المقاربات، التقسيمات الكبرى للعالم – خريطة التنمية ', 7),
(101, ' المجال المغربي – الموارد الطبيعية والبشرية ', 7),
(102, ' الاختيارات الكبرى لسياسة إعداد التراب الوطني ', 7),
(103, ' التهيئة الحضرية والريفية – أزمة المدينة والريف وأشكال التدخل', 7),
(104, ' العالم العربي – مشكل الماء وظاهرة التصحر ', 7),
(105, ' الولايات المتحدة الأمريكية قوة اقتصادية عظمى', 7),
(106, ' الاتحاد الأوربي نحو اندماج شامل ', 7),
(107, ' الصين قوة اقتصادية صاعدة ', 7),
(108, ' ملف الشراكة بين المغرب والاتحاد الأوروبي ', 7),
(109, ' تقديم عام لبرنامج التاريخ: التحولات الكبرى للعالم الرأسمالي وانعكاساتها خلال القرنين 19م و20م ', 7),
(110, ' التحولات الاقتصادية والمالية والاجتماعية والفكرية في العالم في القرن 19م ', 7),
(111, ' التنافس الامبريالي واندلاع الحرب العالمية الأولى', 7),
(112, ' اليقظة الفكرية بالمشرق العربي', 7),
(113, ' الضغوط الاستعمارية على المغرب ومحاولات الإصلاح', 7),
(114, ' أوروبا من نهاية الحرب العالمية الأولى إلى أزمة 1929م', 7),
(115, ' الحرب العالمية الثانية – الأسباب والنتائج ', 7),
(116, ' نظام الحماية بالمغرب والاستغلال الاستعماري ', 7),
(117, ' نضال المغرب من أجل تحقيق الاستقلال واستكمال الوحدة الترابية ', 7),
(118, ' ملف العولمة والتحديات الراهنة ', 7),
(119, ' مفهوم التنمية – تعدد المقاربات، التقسيمات الكبرى للعالم – خريطة التنمية ', 7),
(120, ' المجال المغربي – الموارد الطبيعية والبشرية ', 7),
(121, ' الاختيارات الكبرى لسياسة إعداد التراب الوطني ', 7),
(122, ' التهيئة الحضرية والريفية – أزمة المدينة والريف وأشكال التدخل', 7),
(123, ' العالم العربي – مشكل الماء وظاهرة التصحر ', 7),
(124, ' الولايات المتحدة الأمريكية قوة اقتصادية عظمى', 7),
(125, ' الاتحاد الأوربي نحو اندماج شامل ', 7),
(126, ' الصين قوة اقتصادية صاعدة ', 7),
(127, ' ملف الشراكة بين المغرب والاتحاد الأوروبي ', 7),
(128, 'مدخل التزكية (القرآن الكريم)', 8),
(129, 'مدخل التزكية (العقيدة) ', 8),
(130, 'مدخل الإقتداء ', 8),
(131, 'مدخل الإستجابة ', 8),
(132, 'مدخل القسط ', 8),
(133, 'مدخل الـحكمة ', 8),
(134, 'مبادئ في المنطق ', 9),
(135, 'الحساب العددي والتناسبية ', 9),
(136, 'عموميات حول الدوال العددية ', 9),
(137, 'المتتاليات العددية ', 9),
(138, 'التعداد ', 9),
(139, 'نهاية دالة عددية ', 9),
(140, 'الاشتقاق ', 9),
(141, 'دراسة الدوال وتمثيلها ', 9),
(142, ' Les champs lexicaux ', 10),
(143, ' Les registres de langue', 10),
(144, ' La focalisation ou point de vue ', 10),
(145, ' Les figures de style ', 10),
(146, ' Les niveaux de langue ', 10),
(147, ' Récit et discours ', 10),
(148, ' Le discours rapporté', 10),
(149, ' Étude du discours rapporté ', 10),
(150, ' La focalisation Interne, externe et zéro', 10),
(151, 'La Boite à Merveilles (Roman autobiographique) ', 10),
(152, 'La Planète des singes (Roman de science fiction) ', 10),
(153, 'Le dernier jour d\'un condamné (Roman à thèse) ', 10),
(154, 'Antigone (Théâtre) ', 10),
(155, 'جذاذات علوم الحياة والارض للأولى باك آداب وعلوم إنسانية', 11),
(156, 'تعضي وفيزيولوجية الجهاز التناسلي عند الرجل ', 11),
(157, 'تعضي وفيزيولوجية الجهاز التناسلي عند المرأة ', 11),
(158, 'الحمل والولادة ', 11),
(159, 'ملفات للبحث والاستقصاء ', 11),
(160, 'دور كل من الانقسام الاختزالي والاخصاب في التوالد الجنسي', 11),
(161, 'انتقال الصفات الوراثية عبر الأجيال ', 11),
(162, 'انتقال بعض الأمراض الوراثية ', 11),
(163, 'انتقال بعض حالات الشذوذ الصبغي والطفرات ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `iddemande` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `idetudiantc` int(11) DEFAULT NULL,
  `cours` int(11) NOT NULL,
  `reponce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`iddemande`, `description`, `idetudiantc`, `cours`, `reponce`) VALUES
(90, 'aaaaaaaaa', 21, 3, 0),
(91, 'xwxwxxqdqdqs sdfsdfxwxwxxqdqdqs sdfsdfxwxwxxqdqdqs sdfsdfxwxwxxqdqdqs sdfsdfxwxwxxqdqdqs sdfsdfxwxwxxqdqdqs sdfsdfxwxwxxqdqdqs sdfsdfxwxwxxqdqdqs sdfsdf', 21, 22, 0),
(92, 'wwwwww\r\nwwwwww', 21, 23, 0),
(93, 'sdssd', 21, 34, 0),
(94, 'aaassssqx', 22, 3, 0),
(95, '', 22, 22, 0),
(97, 'vv', 22, 1, 0),
(98, '  2  ', 22, 2, 0),
(99, 'Aucune desciption !', 22, 35, 0),
(100, 'Aucune desciption !', 21, 21, 0),
(102, 'mm', 21, 58, 0);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `idetudiant` int(11) NOT NULL,
  `nometudiant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenometudiant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niveauscolaire` int(11) NOT NULL,
  `filiere` int(11) DEFAULT NULL,
  `mailetudiant` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordetudiant` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`idetudiant`, `nometudiant`, `prenometudiant`, `niveauscolaire`, `filiere`, `mailetudiant`, `passwordetudiant`) VALUES
(19, 'a', 'b', 2, 6, 'a@a.a', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb'),
(20, 'e', 'e', 2, 4, 'e@e.e', '3f79bb7b435b05321651daefd374cdc681dc06faa65e374e38337b88ca046dea'),
(21, 'z', 'e', 1, 1, 'z@z.z', '594e519ae499312b29433b7dd8a97ff068defcba9755b6d5d00e84c524d67b06'),
(22, 'y', 'x', 1, 1, 'x@x.x', '2d711642b726b04401627ca9fbac32f5c8530fb1903cc4db02258717921a4881');

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `idfiliere` int(11) NOT NULL,
  `namfiliere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idniveau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`idfiliere`, `namfiliere`, `idniveau`) VALUES
(1, 'Sciences Mathématiques', 1),
(2, 'Sciences Expérimentales', 1),
(3, 'Lettres et Sciences Humaines', 1),
(4, 'Sciences Mathématiques', 2),
(5, 'Sciences Physiques', 2),
(6, 'Sciences de la Vie et de la Terre (SVT)', 2),
(7, 'Sciences Économiques', 2),
(8, 'Sciences de Gestion Comptable (SGC)', 2),
(9, 'Lettres', 2);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `idmatiere` int(11) NOT NULL,
  `nommatiere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idfiliere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`idmatiere`, `nommatiere`, `idfiliere`) VALUES
(1, 'Arabe', 1),
(2, 'Français', 1),
(3, 'Histoire Géographie', 1),
(4, 'Education Islamique', 1),
(5, 'Arabe', 2),
(6, 'Français', 2),
(7, 'Histoire Géographie', 2),
(8, 'Education Islamique', 2),
(9, 'Mathématiques', 3),
(10, 'Français', 3),
(11, 'Sciences de la Vie et de la Terre (SVT)', 3),
(12, 'Mathématiques', 4),
(13, 'Physique et Chimie', 4),
(14, 'Sciences de la Vie et de la Terre (SVT)', 4),
(15, 'Sciences de l\'ingénieur', 4),
(16, 'Anglais', 4),
(17, 'Philosophie', 4),
(18, 'Mathématiques', 5),
(19, 'Physique et Chimie', 5),
(20, 'Sciences de la Vie et de la Terre (SVT)', 5),
(21, 'Anglais', 5),
(22, 'Philosophie', 5),
(23, 'Mathématiques', 6),
(24, 'Physique et Chimie', 6),
(25, 'Sciences de la Vie et de la Terre (SVT)', 6),
(26, 'Anglais', 6),
(27, 'Philosophie', 6),
(28, 'Mathématiques', 7),
(29, 'Economie et Organisation Administrative des Entreprises', 7),
(30, 'Comptabilité et Mathématiques financières', 7),
(31, 'Anglais', 7),
(32, 'Philosophie', 7),
(33, 'Economie générale et Statistiques', 7),
(34, 'Droit', 7),
(35, 'Comptabilité et Mathématiques financières', 8),
(36, 'Anglais', 8),
(37, 'Mathématiques', 8),
(38, 'Philosophie', 8),
(39, 'Economie générale et Statistiques', 8),
(40, 'Economie et Organisation Administrative des Entreprises', 8);

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `idniveau` int(11) NOT NULL,
  `niveau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`idniveau`, `niveau`) VALUES
(1, '1er année Bac'),
(2, '2éme année Bac');

-- --------------------------------------------------------

--
-- Table structure for table `reponce`
--

CREATE TABLE `reponce` (
  `idetudiant` int(11) NOT NULL,
  `idevent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theevanets`
--

CREATE TABLE `theevanets` (
  `eventID` int(11) NOT NULL,
  `coursID` int(11) NOT NULL,
  `ProfID` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theDate` date DEFAULT NULL,
  `delay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theevanets`
--

INSERT INTO `theevanets` (`eventID`, `coursID`, `ProfID`, `message`, `lien`, `hours`, `theDate`, `delay`) VALUES
(18, 58, 4, 'aaaaa', 'aaa', '22:10', '2020-06-06', '2020-06-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benevole`
--
ALTER TABLE `benevole`
  ADD PRIMARY KEY (`idbenevole`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idcours`),
  ADD KEY `idmatier` (`idmatiere`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`iddemande`),
  ADD KEY `idetudiant` (`idetudiantc`),
  ADD KEY `idcours` (`cours`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idetudiant`),
  ADD KEY `filiere` (`filiere`),
  ADD KEY `niveau` (`niveauscolaire`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`idfiliere`),
  ADD KEY `idnv` (`idniveau`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`idmatiere`),
  ADD KEY `idfiliere` (`idfiliere`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`idniveau`);

--
-- Indexes for table `reponce`
--
ALTER TABLE `reponce`
  ADD KEY `idevent` (`idevent`);

--
-- Indexes for table `theevanets`
--
ALTER TABLE `theevanets`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `coursID` (`coursID`),
  ADD KEY `ProfID` (`ProfID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benevole`
--
ALTER TABLE `benevole`
  MODIFY `idbenevole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `idcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `iddemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idetudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `idfiliere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `idmatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `idniveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `theevanets`
--
ALTER TABLE `theevanets`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `idmatier` FOREIGN KEY (`idmatiere`) REFERENCES `matiere` (`idmatiere`);

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `idcours` FOREIGN KEY (`cours`) REFERENCES `cours` (`idcours`),
  ADD CONSTRAINT `idetudiant` FOREIGN KEY (`idetudiantc`) REFERENCES `etudiant` (`idetudiant`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `filiere` FOREIGN KEY (`filiere`) REFERENCES `filiere` (`idfiliere`),
  ADD CONSTRAINT `niveau` FOREIGN KEY (`niveauscolaire`) REFERENCES `niveau` (`idniveau`);

--
-- Constraints for table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `idnv` FOREIGN KEY (`idniveau`) REFERENCES `niveau` (`idniveau`);

--
-- Constraints for table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `idfiliere` FOREIGN KEY (`idfiliere`) REFERENCES `filiere` (`idfiliere`);

--
-- Constraints for table `theevanets`
--
ALTER TABLE `theevanets`
  ADD CONSTRAINT `theevanets_ibfk_1` FOREIGN KEY (`coursID`) REFERENCES `cours` (`idcours`),
  ADD CONSTRAINT `theevanets_ibfk_2` FOREIGN KEY (`ProfID`) REFERENCES `benevole` (`idbenevole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
