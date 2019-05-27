-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 06:17 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems4`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `schedule` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `duration` float NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_size` int(11) NOT NULL,
  `class_code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `status`, `schedule`, `time_start`, `duration`, `classroom_id`, `teacher_id`, `course_id`, `class_size`, `class_code`, `start_date`, `created_at`, `updated_at`) VALUES
(1, 'Thí nghiệm vật lí đại cương-203', 2, '3,4,', '00:22:00', 20, 1, 1, 1, 45, 'VL002', '2019-03-13', '2019-03-23 08:54:14', '2019-03-23 08:54:14'),
(2, 'IELTS Foundation', 2, '3,5,', '00:22:00', 20, 2, 1, 1, 30, 'IELTS12', '2019-03-20', '2019-03-12 00:01:07', NULL),
(3, 'Lop test', 2, '4,5,', '00:00:00', 20, 3, 1, 1, 50, '12345678', '2019-03-13', '2019-03-12 00:22:52', NULL),
(4, 'âásss', 2, '3,', '07:00:00', 10, 4, 1, 1, 20, 'aas', '2019-03-13', '2019-03-12 00:28:33', NULL),
(5, 'kkklslslsls', 1, '3,', '11:00:00', 2, 5, 1, 1, 30, 'abc', '2019-03-13', '2019-03-12 00:30:26', NULL),
(6, 'TOEIC cho người mất gốc', 0, '1,', '12:00:00', 2, 3, 1, 1, 30, '109822', '2019-06-24', '2019-03-23 01:43:19', NULL),
(9, 'test room', 0, '1,', '11:30:00', 1, 1, 1, 1, 22, 'vayne', '2019-04-29', '2019-03-23 09:21:05', NULL),
(14, 'Giải tích 3', 0, '4,5,', '13:01:00', 2, 1, 1, 1, 22, 'GT3', '2019-03-29', '2019-03-25 08:21:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`) VALUES
(1, 'D3-501'),
(2, 'D5-201'),
(3, 'D3-201'),
(4, 'D5-203'),
(5, 'D3-203');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` double(8,2) NOT NULL,
  `fee` double NOT NULL,
  `curriculum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `duration`, `fee`, `curriculum`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Lập trình C++', 'C123222', 22.00, 2000000, 'C cơ bản', 0, NULL, NULL),
(2, 'ssss1121234', 'aaaaqq', 12.00, 233333, 'aaaa', 0, NULL, NULL),
(3, 'ssss', 'ddd', 2.00, 12233455, 'ssss', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_day` datetime NOT NULL,
  `duration` double(8,2) NOT NULL,
  `note` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `start_day`, `duration`, `note`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 'Thi giữa kì 20191', '2019-06-05 14:00:00', 45.00, 'Cán bộ coi thi không giải thích gì thêm', 1, '2019-03-19 06:09:11', '2019-03-19 06:09:11'),
(2, 'Thi giua ki', '2019-04-25 15:00:00', 90.00, 'Giao vien khong giai thich gi th3m', 1, '2019-03-19 06:52:04', '2019-03-19 08:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) UNSIGNED NOT NULL,
  `holiday` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday`, `created_at`, `updated_at`) VALUES
(1, '2019-09-02', '2019-03-11 17:00:00', '2019-03-11 17:00:00'),
(2, '2019-04-30', '2019-03-11 17:00:00', '2019-03-11 17:00:00'),
(3, '2019-05-01', '2019-03-11 17:00:00', '2019-03-11 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_23_093030_create_students_table', 1),
(4, '2018_08_24_021708_create_examination_table', 1),
(5, '2018_08_24_022956_create_courses_table', 1),
(6, '2018_08_24_061520_add_nine_records_to_students_table', 1),
(7, '2018_08_31_012708_create_classes_table', 1),
(8, '2018_08_31_012752_create_student_classes_table', 1),
(9, '2018_09_07_030515_add_code_to_students_table', 1),
(10, '2018_09_07_094043_create_roll_calls_table', 1),
(11, '2018_09_07_095316_create_point_exam', 1),
(12, '2018_09_10_075832_create_teachers_table', 1),
(13, '2018_09_10_094405_add_class_code_change_schedule_type', 1),
(14, '2018_09_10_094726_add_student_id_timetable_id_to_rollcall', 1),
(15, '2018_09_10_095553_add_student_id_to_table_point_exams', 1),
(16, '2018_09_11_015945_rename_exam_table', 1),
(17, '2018_09_11_021625_add_start_date_to_table_classes', 1),
(18, '2018_09_11_023020_change_start_date_to_not_null', 1),
(19, '2018_09_12_072024_create_timetables_table', 1),
(20, '2018_09_12_081944_add_duration_to_classes_table', 1),
(21, '2018_09_18_075535_change_note_status_to_nullable', 1),
(22, '2018_09_21_062557_add_gender_to_teacher', 1),
(23, '2018_09_22_143924_create_holidays_table', 1),
(24, '2018_09_25_095222_create_staffs_table', 1),
(27, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(28, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(29, '2016_06_01_000004_create_oauth_clients_table', 3),
(30, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(32, '2014_10_12_000000_create_users_table', 5),
(33, '2016_06_01_000001_create_oauth_auth_codes_table', 6),
(34, '2019_03_14_092843_add_roles_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `point_exams`
--

CREATE TABLE `point_exams` (
  `id` int(11) UNSIGNED NOT NULL,
  `point` double(8,2) NOT NULL,
  `examination_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_exams`
--

INSERT INTO `point_exams` (`id`, `point`, `examination_id`, `created_at`, `updated_at`, `student_id`) VALUES
(1, 7.50, 2, '2019-03-19 07:02:28', '2019-03-19 07:03:19', 8),
(2, 8.00, 2, '2019-03-19 07:02:29', '2019-03-19 07:02:29', 7),
(3, 8.00, 2, '2019-03-19 07:02:29', '2019-03-19 07:02:29', 4),
(4, 4.00, 2, '2019-03-19 07:02:29', '2019-03-19 07:02:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roll_calls`
--

CREATE TABLE `roll_calls` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `time_call` time NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `timetable_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roll_calls`
--

INSERT INTO `roll_calls` (`id`, `status`, `time_call`, `note`, `created_at`, `updated_at`, `timetable_id`, `student_id`) VALUES
(1, 0, '15:34:00', 'abc', '2019-03-19 08:04:19', '2019-03-19 08:34:46', 4, 3),
(2, 1, '15:47:00', 'aaa', '2019-03-19 08:47:14', '2019-03-19 08:47:30', 6, 6),
(3, 1, '15:57:00', 'aaaa', '2019-03-19 08:57:55', '2019-03-19 08:57:55', 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `gender` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `user_id`, `mobile`, `birthday`, `address`, `gender`, `created_at`, `updated_at`, `student_code`) VALUES
(1, 'Lê Văn B', 'va21nb@gmail.com', 0, '0252354126', '1992-10-22', 'Hà Nam', 0, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(2, 'Nguyễn Văn A', 'ah21hah@gmail.com', 0, '0155622165', '2000-07-12', 'Quảng Ninh', 0, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(3, 'Trần Anh C', 'trananhh@gmail.com', 0, '0156232165', '2001-08-12', 'Lào Cai', 1, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(4, 'Lý Quang C', 'ah111hah@gmail.com', 0, '0156232165', '2001-08-12', 'Vĩnh Phúc', 1, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(5, 'Trần Văn D', 'rewr@gmail.com', 0, '0164332165', '2002-07-30', 'Nam Định', 1, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(6, 'Lại Văn Sâm', 'ahahahah@gmail.com', 0, '0432232165', '1998-02-22', 'Vĩnh Phúc', 0, '2018-08-24 06:02:33', '2018-08-24 06:02:30', '9999'),
(7, 'Lê Vân Anh', 'ahahahah@gmail.com', 0, '0155232165', '2002-09-10', 'Nam Định', 1, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(8, 'Lê Ngọc Anh', 'dsds@gmail.com', 0, '0156232231', '1994-01-11', 'Sài Gòn', 1, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(9, 'Trần Văn E', 'jjjjh@gmail.com', 0, '0156322165', '2002-08-11', 'Vĩnh Phúc', 0, '2018-08-24 06:02:33', '2018-08-24 06:02:30', ''),
(10, 'Phạm Văn B', 'vanb@gmail.com', 0, '0256354126', '1995-11-22', 'Hà Nam', 1, '2018-08-24 04:02:33', '2018-08-24 04:02:30', ''),
(11, 'Trần Văn C', 'ahahahah@gmail.com', 0, '0156232165', '2001-08-12', 'Vĩnh Phúc', 1, '2018-08-24 04:02:33', '2018-08-24 04:02:30', ''),
(12, 'Pham Bang', '20155119@gmail.com', 17, '09821121', '1997-02-02', 'HD', 1, '2019-03-20 17:00:00', '2019-03-20 17:00:00', '20155119'),
(13, 'Khổng Minh', '20155120@gmail.com', 18, '0223191111', '2019-03-21', 'Trung Quốc', 0, '2019-03-20 17:00:00', '2019-03-20 17:00:00', '20155120');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `student_id`, `class_id`, `created_at`, `updated_at`) VALUES
(2, 8, 2, '2019-03-12 17:00:00', '2019-03-12 17:00:00'),
(3, 1, 2, '2019-03-12 17:00:00', '2019-03-12 17:00:00'),
(4, 7, 2, '2019-03-12 17:00:00', '2019-03-12 17:00:00'),
(5, 4, 2, '2019-03-12 17:00:00', '2019-03-12 17:00:00'),
(6, 6, 5, '2019-03-17 17:00:00', '2019-03-17 17:00:00'),
(7, 10, 5, '2019-03-17 17:00:00', '2019-03-17 17:00:00'),
(8, 3, 4, '2019-03-17 17:00:00', '2019-03-17 17:00:00'),
(9, 5, 4, '2019-03-17 17:00:00', '2019-03-17 17:00:00'),
(10, 8, 1, '2019-03-18 17:00:00', '2019-03-18 17:00:00'),
(11, 7, 1, '2019-03-18 17:00:00', '2019-03-18 17:00:00'),
(12, 4, 1, '2019-03-18 17:00:00', '2019-03-18 17:00:00'),
(14, 13, 5, '2019-03-22 17:00:00', '2019-03-22 17:00:00'),
(15, 13, 6, '2019-03-22 17:00:00', '2019-03-22 17:00:00'),
(16, 13, 14, '2019-03-24 17:00:00', '2019-03-24 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(3) NOT NULL,
  `mobile` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `experience` int(3) NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `name`, `user_id`, `mobile`, `address`, `birthdate`, `experience`, `certificate`, `description`, `created_at`, `updated_at`, `gender`) VALUES
(1, 'sss@gmail.com', 'ssss', 3, '113', 'sss', '1987-02-05', 2, 'sss', 'sss', NULL, NULL, 1),
(2, 'ssa@gmail.com', 'ollaa', 19, '031231', 'hd', '1987-02-02', 2, 'aaaa', 'olaas', '2019-03-25 17:00:00', NULL, 1),
(3, 'ssa113@gmail.com', 'aak', 27, '12313', 'aaa', '2019-08-13', 1, 'ssadaâa', 'zzzx', '2019-03-25 17:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) UNSIGNED NOT NULL,
  `week_days` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `week_days`, `date`, `time`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2019-03-13', '00:22:00', 1, '2019-03-11 23:35:08', NULL),
(2, 3, '2019-03-20', '00:22:00', 2, '2019-03-12 00:01:07', NULL),
(3, 4, '2019-03-14', '00:00:00', 3, '2019-03-12 00:22:52', NULL),
(4, 3, '2019-03-13', '07:00:00', 4, '2019-03-12 00:28:33', NULL),
(5, 3, '2019-03-20', '07:00:00', 4, '2019-03-12 00:28:33', NULL),
(6, 3, '2019-03-13', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(7, 3, '2019-03-20', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(8, 3, '2019-03-27', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(9, 3, '2019-04-03', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(10, 3, '2019-04-10', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(11, 3, '2019-04-17', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(12, 3, '2019-04-24', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(13, 3, '2019-05-08', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(14, 3, '2019-05-15', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(15, 3, '2019-05-22', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(16, 3, '2019-05-29', '11:00:00', 5, '2019-03-12 00:30:26', NULL),
(17, 1, '2019-06-24', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(18, 1, '2019-07-01', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(19, 1, '2019-07-08', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(20, 1, '2019-07-15', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(21, 1, '2019-07-22', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(22, 1, '2019-07-29', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(23, 1, '2019-08-05', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(24, 1, '2019-08-12', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(25, 1, '2019-08-19', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(26, 1, '2019-08-26', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(27, 1, '2019-09-09', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(28, 1, '2019-09-16', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(29, 1, '2019-09-23', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(30, 1, '2019-09-30', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(31, 1, '2019-10-07', '12:00:00', 6, '2019-03-23 01:43:19', NULL),
(32, 1, '2019-04-29', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(33, 1, '2019-05-06', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(34, 1, '2019-05-13', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(35, 1, '2019-05-20', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(36, 1, '2019-05-27', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(37, 1, '2019-06-03', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(38, 1, '2019-06-10', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(39, 1, '2019-06-17', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(40, 1, '2019-06-24', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(41, 1, '2019-07-01', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(42, 1, '2019-07-08', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(43, 1, '2019-07-15', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(44, 1, '2019-07-22', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(45, 1, '2019-07-29', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(46, 1, '2019-08-05', '11:45:00', 7, '2019-03-23 08:24:29', NULL),
(62, 1, '2019-04-29', '11:30:00', 9, '2019-03-23 09:21:05', NULL),
(63, 1, '2019-05-06', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(64, 1, '2019-05-13', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(65, 1, '2019-05-20', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(66, 1, '2019-05-27', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(67, 1, '2019-06-03', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(68, 1, '2019-06-10', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(69, 1, '2019-06-17', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(70, 1, '2019-06-24', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(71, 1, '2019-07-01', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(72, 1, '2019-07-08', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(73, 1, '2019-07-15', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(74, 1, '2019-07-22', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(75, 1, '2019-07-29', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(76, 1, '2019-08-05', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(77, 1, '2019-08-12', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(78, 1, '2019-08-19', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(79, 1, '2019-08-26', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(80, 1, '2019-09-09', '11:30:00', 9, '2019-03-23 09:21:06', NULL),
(81, 1, '2019-09-16', '11:30:00', 9, '2019-03-23 09:21:07', NULL),
(82, 1, '2019-09-23', '11:30:00', 9, '2019-03-23 09:21:07', NULL),
(83, 1, '2019-09-30', '11:30:00', 9, '2019-03-23 09:21:07', NULL),
(106, 5, '2019-03-29', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(107, 4, '2019-04-04', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(108, 5, '2019-04-05', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(109, 4, '2019-04-11', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(110, 5, '2019-04-12', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(111, 4, '2019-04-18', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(112, 5, '2019-04-19', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(113, 4, '2019-04-25', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(114, 5, '2019-04-26', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(115, 4, '2019-05-02', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(116, 5, '2019-05-03', '13:01:00', 14, '2019-03-25 08:21:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(109) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `remember_token`, `updated_at`) VALUES
(1, 'Student5', 'student5@gmail.com', '$2y$10$Z32/7UtQd0S.0gcnLdm/W.j/cWdhI2HHeKF1yvD4MtXQcVoM7Xi.2', 3, '2019-03-14 08:00:40', NULL, '2019-03-14 08:00:40'),
(2, 'BangPS', 'bangps@gmail.com', '$2y$10$Ge821pXgLVX3LYfXZBzjje5e4wZK.GuH49RHJOIiXLUCqn1VXexge', 1, '2019-03-14 09:21:42', NULL, '2019-03-14 09:21:42'),
(3, 'Teacher1', 'teacher1@gmail.com', '$2y$10$pwXw3doU.4UeDekvcjDf0.opAWP.rVNgJQO4dLUiwTcBDA58Jss2C', 2, '2019-03-14 10:01:18', NULL, '2019-03-14 10:01:18'),
(4, 'Student2', 'student2@gmail.com', '$2y$10$9G05cCUoEDznYNsuoI.61uIJajiReyKIFM2MVKBul6b5BLN8sRHR2', 3, '2019-03-20 23:25:47', NULL, '2019-03-20 23:25:47'),
(17, 'Pham Bang', '20155119@gmail.com', '$2y$10$u1WkuIm/rHltcTRV9AtuNOHwjablnVd/VPZvxOl6Q6/xtHkioPzHm', 3, '2019-03-20 17:00:00', NULL, '2019-03-20 17:00:00'),
(18, 'Khổng Minh', '20155120@gmail.com', '$2y$10$Z2GcbGhy69bNM5b4T1sBfO2hy/TN5lkOBD3i6wUbn9AXox800TOnK', 3, '2019-03-20 17:00:00', NULL, '2019-03-20 17:00:00'),
(19, 'ollaa', 'ssa@gmail.com', '$2y$10$VcuwoRgHp5y3XNU.mGJDrOqnaxZAu9tEOYbPlBeT.a5B/6DoZkRpS', 2, '2019-03-25 17:00:00', NULL, NULL),
(27, 'aak', 'ssa113@gmail.com', '$2y$10$7ejSdGTKPUrIQbDsQZ7lxeqET31yK5CdilXBFvS0AiLEWJzm1LaVm', 2, '2019-03-25 17:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_exams`
--
ALTER TABLE `point_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roll_calls`
--
ALTER TABLE `roll_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `point_exams`
--
ALTER TABLE `point_exams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roll_calls`
--
ALTER TABLE `roll_calls`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
