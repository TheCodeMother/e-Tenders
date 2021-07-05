-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 16 Μάη 2021 στις 17:38:35
-- Έκδοση διακομιστή: 10.4.13-MariaDB
-- Έκδοση PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `etenders`
--
CREATE DATABASE IF NOT EXISTS `etenders` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `etenders`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `closed_micro_supply`
--

CREATE TABLE `closed_micro_supply` (
  `id_cls_mcr_spl` int(255) NOT NULL,
  `adequacy` varchar(30) NOT NULL,
  `contracting_authority` varchar(40) NOT NULL,
  `deadline` datetime NOT NULL,
  `executive_date` datetime NOT NULL,
  `nmb_cls_mcr_spl` varchar(40) NOT NULL,
  `who_started_cls_mcr_spl` int(255) NOT NULL,
  `who_end_cls_mcr_spl` int(255) NOT NULL,
  `dtm_start_cls_mcr_spl` datetime NOT NULL,
  `dtm_end_cls_mcr_cls` datetime NOT NULL,
  `supply_cls_mcr_cls` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `closed_micro_supply`
--

INSERT INTO `closed_micro_supply` (`id_cls_mcr_spl`, `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_cls_mcr_spl`, `who_started_cls_mcr_spl`, `who_end_cls_mcr_spl`, `dtm_start_cls_mcr_spl`, `dtm_end_cls_mcr_cls`, `supply_cls_mcr_cls`) VALUES
(1, 'YES', 'Γ.Ν.ΕΛΠΙΣ', '2020-12-12 15:00:00', '2020-12-13 11:57:18', '20/12', 3, 3, '2020-12-08 10:57:18', '2020-12-10 14:57:18', 'ΦΥΛΑΞΗ'),
(2, 'ΝΟ', 'ΕΚΠΑ', '2020-12-21 21:57:18', '2020-12-22 21:57:18', '12/21', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ΚΑΘΑΡΙΟΤΗΤΑ'),
(3, 'YES', 'ΓΕΑ', '2021-01-08 22:10:50', '2021-01-11 22:10:50', '32/21', 7, 9, '2021-01-04 22:10:50', '2021-01-06 22:10:50', 'ΑΠΟΛΥΜΑΝΣΗ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `closed_tender`
--

CREATE TABLE `closed_tender` (
  `id_closed_tender` int(255) NOT NULL,
  `adequacy` varchar(30) NOT NULL,
  `contracting_authority` varchar(40) NOT NULL,
  `deadline` datetime NOT NULL,
  `executive_date` datetime NOT NULL,
  `nmb_cls_tnd` varchar(20) NOT NULL,
  `who_started_cls_tnd` int(255) NOT NULL,
  `who_end_cls_tnd` int(255) NOT NULL,
  `dtm_start_cls_tnd` datetime NOT NULL,
  `dtm_end_cls_tnd` datetime NOT NULL,
  `sypply_cls_tnd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `closed_tender`
--

INSERT INTO `closed_tender` (`id_closed_tender`, `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_cls_tnd`, `who_started_cls_tnd`, `who_end_cls_tnd`, `dtm_start_cls_tnd`, `dtm_end_cls_tnd`, `sypply_cls_tnd`) VALUES
(1, 'YES', 'ΑΣΠΑΙΤΕ', '2020-12-14 22:16:17', '2020-12-15 22:16:17', '12/20', 5, 5, '2020-12-08 22:16:17', '2020-12-10 22:16:17', 'ΦΥΛΑΞΗ'),
(2, 'YES', 'ΠΟΛΕΜΙΚΗ ΑΕΡΟΠΟΡΙΑ', '2021-01-20 22:16:17', '2021-01-21 22:16:17', '1234.20.11.20221', 7, 7, '2021-01-17 22:16:17', '2021-01-19 22:16:17', 'ΑΠΟΛΥΜΑΝΣΗ'),
(3, 'YES', 'ΠΑΝ, ΚΡΗΤΗΣ', '2020-12-31 22:19:49', '2021-01-05 22:19:49', '23/21', 9, 9, '2020-12-27 22:19:49', '2020-12-29 22:19:49', 'ΚΑΘΑΡΙΟΤΗΤΑ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `department`
--

CREATE TABLE `department` (
  `id_dpt` int(255) NOT NULL,
  `manager` int(255) NOT NULL,
  `dpt_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `department`
--

INSERT INTO `department` (`id_dpt`, `manager`, `dpt_name`) VALUES
(1, 2, 'Διοίκηση'),
(2, 3, 'Διαγωνισμοί');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `el_micro_supply`
--

CREATE TABLE `el_micro_supply` (
  `id_el_mcr_spl` int(255) NOT NULL,
  `adequacy` varchar(30) NOT NULL,
  `contracting_authority` varchar(40) NOT NULL,
  `deadline` datetime NOT NULL,
  `executive_date` datetime NOT NULL,
  `nmb_el_mcr_spl` varchar(40) NOT NULL,
  `nmb_system` int(20) NOT NULL,
  `who_started_el_mcr_spl` int(255) NOT NULL,
  `who_end_el_mcr_spl` int(255) NOT NULL,
  `dtm_start_el_mcr_spl` datetime NOT NULL,
  `dtm_end_el_mcr_spl` datetime NOT NULL,
  `sypply_el_mcr_spl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `el_micro_supply`
--

INSERT INTO `el_micro_supply` (`id_el_mcr_spl`, `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_el_mcr_spl`, `nmb_system`, `who_started_el_mcr_spl`, `who_end_el_mcr_spl`, `dtm_start_el_mcr_spl`, `dtm_end_el_mcr_spl`, `sypply_el_mcr_spl`) VALUES
(3, 'YES', 'Γ.Ν.ΕΥΑΓΓΕΛΙΣΜΟΣ', '2021-01-22 18:25:46', '2021-01-25 18:25:46', '2345/21', 12345, 9, 9, '2021-01-12 18:25:46', '2021-01-18 18:25:46', 'ΦΥΛΑΞΗ'),
(5, 'ΝΟ', 'ΟΣΕ', '2020-12-24 18:40:50', '2020-12-29 18:40:50', '43/2021', 23456, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ΑΠΟΛΥΜΑΝΣΗ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `el_tender`
--

CREATE TABLE `el_tender` (
  `id_el_tender` int(255) NOT NULL,
  `adequacy` varchar(30) NOT NULL,
  `contracting_authority` varchar(30) NOT NULL,
  `deadline` datetime NOT NULL,
  `executive_date` datetime NOT NULL,
  `nmb_el_tnd` varchar(40) NOT NULL,
  `nmb_system` int(10) NOT NULL,
  `who_started_el_tnd` int(255) NOT NULL,
  `who_end_el_tnd` int(255) NOT NULL,
  `dtm_start_el_tnd` datetime NOT NULL,
  `dtm_end_el_tnd` datetime NOT NULL,
  `supply_el_tnd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `el_tender`
--

INSERT INTO `el_tender` (`id_el_tender`, `adequacy`, `contracting_authority`, `deadline`, `executive_date`, `nmb_el_tnd`, `nmb_system`, `who_started_el_tnd`, `who_end_el_tnd`, `dtm_start_el_tnd`, `dtm_end_el_tnd`, `supply_el_tnd`) VALUES
(1, 'YES', 'ΕΥΔΑΠ', '2021-02-18 18:43:19', '2021-02-24 18:43:19', '54/2021', 67890, 7, 9, '2021-01-28 18:43:19', '2021-02-04 18:43:19', 'ΦΥΛΑΞΗ'),
(2, 'ΝΟ', 'ΟΤΕ', '2020-12-18 18:43:19', '2020-12-22 18:43:19', '67/2021', 12345, 4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ΥΠΗΡΕΣΙΑ ΔΙΟΙΚΗΤΙΚΟΥ ΠΡΟΣΩΠΙΚΟΥ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee`
--

CREATE TABLE `employee` (
  `id_emp` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `department` int(255) NOT NULL,
  `user_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `employee`
--

INSERT INTO `employee` (`id_emp`, `username`, `password`, `firstname`, `surname`, `status`, `department`, `user_type`) VALUES
(2, 'voula.mousiou', 'voula.mousiou', 'Παρασκευή', 'Μούσιου', 'ACTIVE', 1, 11),
(3, 'antonis.thodos', 'antonis.thodos', 'Αντώνης', 'Θώδος', 'ACTIVE', 2, 11),
(4, 'lousy.laxanidou', 'lousy.laxanidou', 'Λούσυ', 'Λαχανίδου', 'ACTIVE', 1, 20),
(5, 'george.papadopoulos', 'george.papadopoulos', 'Γιώργος', 'Παπαδόπουλος', 'ACTIVE', 2, 40),
(6, 'stavroula.poluxroni', 'stavroula.poluxroni', 'Σταυρούλα', 'Πολυχρόνη', 'INACTIVE', 1, 20),
(7, 'maria.sardeli', 'maria.sardeli', 'Μαρία', 'Σαρδελή', 'ACTIVE', 2, 30),
(8, 'nikoleta.agapiou', 'nikoleta.agapiou', 'Νικολέτα', 'Αγαπίου', 'INACTIVE', 1, 20),
(9, 'mantalena.ntokou', 'mantalena.ntokou', 'Μανταλένα', 'Ντόκου', 'ACTIVE', 2, 40);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_types`
--

CREATE TABLE `user_types` (
  `user_type_id` int(10) NOT NULL,
  `user_type_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type_desc`) VALUES
(11, 'Administrator'),
(20, 'Διοίκηση'),
(30, 'Διευθυντής Τμήματος'),
(40, 'Συντάκτες');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `closed_micro_supply`
--
ALTER TABLE `closed_micro_supply`
  ADD PRIMARY KEY (`id_cls_mcr_spl`),
  ADD KEY `who_started_cls_mcr_spl` (`who_started_cls_mcr_spl`),
  ADD KEY `who_end_cls_mcr_spl` (`who_end_cls_mcr_spl`);

--
-- Ευρετήρια για πίνακα `closed_tender`
--
ALTER TABLE `closed_tender`
  ADD PRIMARY KEY (`id_closed_tender`),
  ADD KEY `who_started_cls_tnd` (`who_started_cls_tnd`),
  ADD KEY `who_end_cls_tnd` (`who_end_cls_tnd`);

--
-- Ευρετήρια για πίνακα `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_dpt`),
  ADD KEY `manager` (`manager`);

--
-- Ευρετήρια για πίνακα `el_micro_supply`
--
ALTER TABLE `el_micro_supply`
  ADD PRIMARY KEY (`id_el_mcr_spl`),
  ADD KEY `who_started_el_mcr_spl` (`who_started_el_mcr_spl`),
  ADD KEY `who_end_el_mcr_spl` (`who_end_el_mcr_spl`);

--
-- Ευρετήρια για πίνακα `el_tender`
--
ALTER TABLE `el_tender`
  ADD PRIMARY KEY (`id_el_tender`),
  ADD KEY `who_started_el_tnd` (`who_started_el_tnd`),
  ADD KEY `who_end_el_tnd` (`who_end_el_tnd`);

--
-- Ευρετήρια για πίνακα `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_emp`),
  ADD KEY `department` (`department`),
  ADD KEY `user_type` (`user_type`);

--
-- Ευρετήρια για πίνακα `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `closed_micro_supply`
--
ALTER TABLE `closed_micro_supply`
  MODIFY `id_cls_mcr_spl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `closed_tender`
--
ALTER TABLE `closed_tender`
  MODIFY `id_closed_tender` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `el_micro_supply`
--
ALTER TABLE `el_micro_supply`
  MODIFY `id_el_mcr_spl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `el_tender`
--
ALTER TABLE `el_tender`
  MODIFY `id_el_tender` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `employee`
--
ALTER TABLE `employee`
  MODIFY `id_emp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `closed_micro_supply`
--
ALTER TABLE `closed_micro_supply`
  ADD CONSTRAINT `closed_micro_supply_ibfk_1` FOREIGN KEY (`who_started_cls_mcr_spl`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `closed_micro_supply_ibfk_2` FOREIGN KEY (`who_end_cls_mcr_spl`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `closed_tender`
--
ALTER TABLE `closed_tender`
  ADD CONSTRAINT `closed_tender_ibfk_1` FOREIGN KEY (`who_started_cls_tnd`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `closed_tender_ibfk_2` FOREIGN KEY (`who_end_cls_tnd`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `el_micro_supply`
--
ALTER TABLE `el_micro_supply`
  ADD CONSTRAINT `el_micro_supply_ibfk_1` FOREIGN KEY (`who_started_el_mcr_spl`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `el_micro_supply_ibfk_2` FOREIGN KEY (`who_end_el_mcr_spl`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `el_tender`
--
ALTER TABLE `el_tender`
  ADD CONSTRAINT `el_tender_ibfk_1` FOREIGN KEY (`who_started_el_tnd`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `el_tender_ibfk_2` FOREIGN KEY (`who_end_el_tnd`) REFERENCES `employee` (`id_emp`) ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`id_dpt`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`user_type_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
