-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2019 at 07:40 PM
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
(17, 'Quản trị tài chính-655111', 1, '4,', '16:00:00', 2, 1, 6, 4, 30, '655111', '2019-04-04', '2019-04-03 01:44:13', NULL),
(18, 'Quản trị tài chính-655112', 1, '4,', '13:45:00', 2, 1, 6, 4, 40, '655112', '2019-04-04', '2019-04-03 01:49:31', NULL),
(19, 'Tin học văn phòng-655114', 1, '5,', '19:00:00', 2, 2, 4, 5, 10, '655114', '2019-04-05', '2019-04-03 01:54:00', NULL),
(21, 'Tin học văn phòng-655115', 1, '5,6,', '16:30:00', 2, 2, 6, 5, 10, '655115', '2019-04-05', '2019-04-03 07:13:41', NULL),
(22, 'Tin học văn phòng-655116', 1, '4,5,', '17:00:00', 1, 3, 4, 5, 15, '655116', '2019-04-05', '2019-04-03 08:15:57', NULL),
(23, 'Triết học Mác-655120', 2, '2,5,', '07:00:00', 2, 1, 6, 6, 20, '655120', '2019-03-05', '2019-04-04 01:42:56', NULL),
(24, 'Tư tưởng HCM-655130', 2, '2,5,', '09:30:00', 2, 1, 4, 7, 30, '655130', '2019-03-05', '2019-04-04 01:45:58', NULL),
(25, 'Triết học Mác-655221', 0, '4,5,', '15:00:00', 2, 4, 6, 6, 20, '655221', '2019-04-25', '2019-04-07 13:13:00', NULL),
(26, 'Tư tưởng HCM-655131', 2, '2,4,', '07:00:00', 2, 6, 4, 7, 30, '655131', '2019-03-07', '2019-04-07 16:33:48', NULL);

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
(5, 'D3-203'),
(6, 'D9-201');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `feedback_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(9, 11, 18, 'Tại sao học phí kì này tăng mạnh vậy?', '2019-04-06 09:09:24', NULL),
(10, 12, 17, 'Vào ngày hôm qua ,thấy Nguyễn Văn A nghỉ dạy trong khi không thông báo gì với lớp làm em mất công đến', '2019-04-06 09:11:31', NULL),
(11, 11, 2, 'Do xăng tăng giá,muối mắm mì chính các thứ cũng tăng theo.Trong khi các thầy cô đi dạy không uống  nước lọc để tồn tại được nên việc tăng học phí là điều hiển nhiên em ạ?', '2019-04-06 09:23:21', NULL),
(12, 13, 31, 'Thưa trung tâm,tại sao emi đã đăng kí học môn Triết 2 rồi mà vẫn chưa thấy có thời khóa biểu ạ?', '2019-04-06 09:33:44', NULL),
(15, 11, 18, 'Nhưng tại sao học phí tăng những tận 40% hơn cả lạm phát của thị trường cơ ạ?', '2019-04-06 15:41:34', NULL),
(16, 16, 18, 'Tại sao học phí tăng nhanh vậy ạ?', '2019-04-06 16:48:44', NULL),
(17, 17, 18, 'Giáo viên trung tâm dạy không nhiệt tình đề nghị trung tâm xem xét', '2019-04-06 16:50:08', NULL),
(18, 11, 2, 'Thế em ngồi học điều hòa sịn,trang thiết bị hiện đại,giáo viên giỏi thì như vậy là đúng rồi', '2019-04-06 18:31:32', NULL),
(23, 16, 2, 'Do lộ trình chung em ạ', '2019-04-06 19:35:00', NULL),
(24, 17, 2, 'Cảm ơn em đã phản ánh,trung tâm sẽ làm rõ vụ việc này', '2019-04-06 19:38:27', NULL),
(25, 11, 18, 'Nhưng em thấy số tiền bỏ ra vẫn không xứng với những tiện nghi mà chúng em được hưởng', '2019-04-07 09:45:07', NULL),
(41, 16, 18, 'Em cam on trung tam a', '2019-04-07 10:32:16', NULL),
(42, 17, 18, 'Mong là trung tâm sớm khắc phục tình trạng trên', '2019-04-07 13:08:55', NULL),
(43, 11, 18, 'Mong là trung tâm sớm khắc phục tình trạng trên', '2019-04-07 13:08:56', NULL),
(44, 16, 18, 'Mong là trung tâm sớm khắc phục tình trạng trên', '2019-04-07 13:08:56', NULL);

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
(4, 'Quản trị tài chính', 'KT002', 20.00, 3600000, 'Quản trị tài chính', 0, NULL, NULL),
(5, 'Tin học văn phòng cơ bản', 'W113', 10.00, 1500000, 'Word,Excel,PowerPoint', 0, NULL, NULL),
(6, 'Triết học Mác-Lênin', 'TH001', 10.00, 1000000, 'Triết học Mác Lê-nin cuốn 1', 0, NULL, NULL),
(7, 'Tư tưởng HCM', 'TT001', 10.00, 1200000, 'Tư tưởng HCM cuốn 1', 0, NULL, NULL);

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
(10, 'Kết thúc môn', '2019-06-07 05:00:00', 90.00, 'Cán bộ coi thi không giải thích gì thêm', 17, '2019-04-03 10:00:58', '2019-04-03 10:01:39'),
(11, 'Kết thúc học phần', '2019-04-20 07:00:00', 90.00, 'Cán bộ coi thi không giải thích gì thêm', 22, '2019-04-03 10:05:22', '2019-04-03 10:05:22'),
(14, 'Kết thúc môn', '2019-03-20 16:00:00', 90.00, 'Không được mang tài liệu', 23, '2019-04-04 02:19:53', '2019-04-04 02:19:53'),
(15, 'Kết thúc môn', '2019-04-01 15:00:00', 90.00, 'Giao vien khong giai thich gi th3m', 24, '2019-04-04 02:25:33', '2019-04-04 02:25:33'),
(16, 'Kết thúc khóa', '2019-03-22 12:00:00', 60.00, 'Giao vien khong giai thich gi th3m', 26, '2019-04-07 16:38:19', '2019-04-07 16:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 18, 2, '2019-04-06 09:09:24', '2019-04-07 13:08:56'),
(12, 17, 0, '2019-04-06 09:11:31', '2019-04-06 09:11:31'),
(13, 31, 0, '2019-04-06 09:33:44', '2019-04-06 09:33:44'),
(16, 18, 2, '2019-04-06 16:48:44', '2019-04-07 13:08:56'),
(17, 18, 2, '2019-04-06 16:50:08', '2019-04-07 13:08:55');

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
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_exams`
--

INSERT INTO `point_exams` (`id`, `point`, `examination_id`, `student_id`, `created_at`, `updated_at`) VALUES
(7, 9.00, 14, 12, '2019-04-04 02:27:08', '2019-04-04 02:27:08'),
(8, 2.00, 14, 13, '2019-04-04 02:27:08', '2019-04-04 02:27:08'),
(9, 7.00, 14, 14, '2019-04-04 02:27:08', '2019-04-04 02:27:08'),
(10, 7.00, 14, 15, '2019-04-04 02:27:08', '2019-04-04 02:27:08'),
(11, 7.00, 14, 16, '2019-04-04 02:27:08', '2019-04-04 02:27:08'),
(12, 5.00, 14, 17, '2019-04-04 02:27:08', '2019-04-04 02:27:08'),
(13, 8.00, 15, 12, '2019-04-04 02:30:24', '2019-04-04 02:30:24'),
(14, 6.00, 15, 13, '2019-04-04 02:30:24', '2019-04-04 02:30:24'),
(15, 4.00, 15, 14, '2019-04-04 02:30:24', '2019-04-04 02:30:24'),
(16, 7.00, 15, 15, '2019-04-04 02:30:24', '2019-04-04 02:30:24'),
(17, 3.50, 15, 16, '2019-04-04 02:30:25', '2019-04-04 02:30:25'),
(18, 6.00, 15, 17, '2019-04-04 02:30:25', '2019-04-04 02:30:25'),
(19, 8.00, 16, 18, '2019-04-07 16:39:32', '2019-04-07 16:39:32'),
(20, 4.00, 16, 19, '2019-04-07 16:39:32', '2019-04-07 16:39:32');

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
(83, 3, '15:12:00', NULL, '2019-04-03 08:12:39', '2019-04-03 08:12:39', 9, 13),
(84, 3, '15:12:00', NULL, '2019-04-03 08:12:42', '2019-04-03 08:12:42', 10, 13),
(85, 0, '16:20:00', NULL, '2019-04-04 09:20:42', '2019-04-04 09:20:42', 195, 14),
(86, 0, '16:20:00', NULL, '2019-04-04 09:20:43', '2019-04-04 09:20:43', 195, 15),
(87, 0, '16:20:00', NULL, '2019-04-04 09:20:43', '2019-04-04 09:20:43', 195, 16),
(88, 0, '16:20:00', NULL, '2019-04-04 09:20:44', '2019-04-04 09:20:44', 195, 17),
(89, 0, '16:20:00', NULL, '2019-04-04 09:20:45', '2019-04-04 09:20:45', 195, 12),
(90, 0, '16:20:00', NULL, '2019-04-04 09:20:45', '2019-04-04 09:20:45', 195, 13),
(91, 3, '16:20:00', NULL, '2019-04-04 09:20:52', '2019-04-04 09:20:52', 196, 14),
(92, 0, '16:20:00', NULL, '2019-04-04 09:20:54', '2019-04-04 09:20:54', 196, 15),
(93, 3, '16:20:00', NULL, '2019-04-04 09:20:54', '2019-04-04 09:20:54', 196, 16),
(94, 0, '16:20:00', NULL, '2019-04-04 09:20:55', '2019-04-04 09:20:55', 196, 17),
(95, 3, '16:20:00', NULL, '2019-04-04 09:20:56', '2019-04-04 09:20:56', 196, 12),
(96, 0, '16:20:00', NULL, '2019-04-04 09:20:57', '2019-04-04 09:20:57', 196, 13),
(97, 0, '16:21:00', NULL, '2019-04-04 09:21:02', '2019-04-04 09:21:02', 197, 14),
(98, 3, '16:21:00', NULL, '2019-04-04 09:21:02', '2019-04-04 09:21:02', 197, 15),
(99, 0, '16:21:00', NULL, '2019-04-04 09:21:04', '2019-04-04 09:21:04', 197, 16),
(100, 3, '16:21:00', NULL, '2019-04-04 09:21:08', '2019-04-04 09:21:08', 197, 17),
(101, 3, '16:21:00', NULL, '2019-04-04 09:21:10', '2019-04-04 09:21:10', 197, 12),
(102, 3, '16:21:00', NULL, '2019-04-04 09:21:12', '2019-04-04 09:21:12', 197, 13),
(103, 3, '16:21:00', NULL, '2019-04-04 09:21:15', '2019-04-04 09:21:15', 199, 14),
(104, 3, '16:21:00', NULL, '2019-04-04 09:21:16', '2019-04-04 09:21:16', 199, 15),
(105, 0, '16:21:00', NULL, '2019-04-04 09:21:17', '2019-04-04 09:21:17', 199, 16),
(106, 3, '16:21:00', NULL, '2019-04-04 09:21:17', '2019-04-04 09:21:17', 199, 17),
(107, 3, '16:21:00', NULL, '2019-04-04 09:21:18', '2019-04-04 09:21:18', 199, 12),
(108, 3, '16:21:00', NULL, '2019-04-04 09:21:19', '2019-04-04 09:21:19', 199, 13),
(109, 0, '16:30:00', NULL, '2019-04-04 09:30:44', '2019-04-04 09:30:49', 200, 14),
(110, 3, '16:31:00', NULL, '2019-04-04 09:30:50', '2019-04-04 09:31:05', 200, 15),
(111, 3, '16:31:00', NULL, '2019-04-04 09:30:51', '2019-04-04 09:31:07', 200, 16),
(112, 0, '16:30:00', NULL, '2019-04-04 09:30:51', '2019-04-04 09:30:51', 200, 17),
(113, 0, '16:30:00', NULL, '2019-04-04 09:30:52', '2019-04-04 09:30:52', 200, 12),
(114, 0, '16:30:00', NULL, '2019-04-04 09:30:52', '2019-04-04 09:30:52', 200, 13),
(115, 0, '16:31:00', NULL, '2019-04-04 09:31:14', '2019-04-04 09:31:14', 201, 14),
(116, 3, '16:31:00', NULL, '2019-04-04 09:31:14', '2019-04-04 09:31:14', 201, 15),
(117, 0, '16:31:00', NULL, '2019-04-04 09:31:16', '2019-04-04 09:31:16', 201, 16),
(118, 0, '16:31:00', NULL, '2019-04-04 09:31:17', '2019-04-04 09:31:17', 201, 17),
(119, 0, '16:31:00', NULL, '2019-04-04 09:31:17', '2019-04-04 09:31:17', 201, 12),
(120, 3, '16:31:00', NULL, '2019-04-04 09:31:18', '2019-04-04 09:31:18', 201, 13),
(121, 0, '16:31:00', NULL, '2019-04-04 09:31:21', '2019-04-04 09:31:21', 202, 14),
(122, 3, '16:31:00', NULL, '2019-04-04 09:31:21', '2019-04-04 09:31:21', 202, 15),
(123, 3, '16:31:00', NULL, '2019-04-04 09:31:22', '2019-04-04 09:31:22', 202, 16),
(124, 3, '16:31:00', NULL, '2019-04-04 09:31:22', '2019-04-04 09:31:22', 202, 17),
(125, 0, '16:31:00', NULL, '2019-04-04 09:31:23', '2019-04-04 09:31:23', 202, 12),
(126, 0, '16:31:00', NULL, '2019-04-04 09:31:24', '2019-04-04 09:31:24', 202, 13),
(127, 0, '16:31:00', NULL, '2019-04-04 09:31:27', '2019-04-04 09:31:27', 203, 14),
(128, 3, '16:31:00', NULL, '2019-04-04 09:31:28', '2019-04-04 09:31:28', 203, 15),
(129, 0, '16:31:00', NULL, '2019-04-04 09:31:28', '2019-04-04 09:31:28', 203, 16),
(130, 0, '16:31:00', NULL, '2019-04-04 09:31:29', '2019-04-04 09:31:29', 203, 17),
(131, 3, '16:31:00', NULL, '2019-04-04 09:31:30', '2019-04-04 09:31:30', 203, 12),
(132, 0, '16:31:00', NULL, '2019-04-04 09:31:31', '2019-04-04 09:31:31', 203, 13),
(133, 0, '23:38:00', NULL, '2019-04-07 16:38:53', '2019-04-07 16:38:53', 210, 18),
(134, 0, '23:38:00', NULL, '2019-04-07 16:38:53', '2019-04-07 16:38:53', 210, 19),
(135, 0, '23:38:00', NULL, '2019-04-07 16:38:56', '2019-04-07 16:38:56', 211, 18),
(136, 0, '23:38:00', NULL, '2019-04-07 16:38:56', '2019-04-07 16:38:56', 211, 19),
(137, 0, '23:38:00', NULL, '2019-04-07 16:38:59', '2019-04-07 16:38:59', 212, 18),
(138, 0, '23:39:00', NULL, '2019-04-07 16:39:00', '2019-04-07 16:39:00', 212, 19),
(139, 0, '23:39:00', NULL, '2019-04-07 16:39:04', '2019-04-07 16:39:04', 213, 18),
(140, 0, '23:39:00', NULL, '2019-04-07 16:39:04', '2019-04-07 16:39:04', 213, 19),
(141, 0, '23:39:00', NULL, '2019-04-07 16:39:10', '2019-04-07 16:39:10', 214, 18),
(142, 0, '23:39:00', NULL, '2019-04-07 16:39:10', '2019-04-07 16:39:10', 214, 19);

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
(12, 'Pham Bang', '20155119@gmail.com', 17, '09821121', '1997-02-02', 'HD', 1, '2019-03-20 17:00:00', '2019-03-20 17:00:00', '20155119'),
(13, 'Khổng Minh', '20155120@gmail.com', 18, '0223191111', '2019-03-21', 'Trung Quốc', 0, '2019-03-20 17:00:00', '2019-03-20 17:00:00', '20155120'),
(14, 'Lưu Bị', '20155110@gmail.com', 31, '0962622611', '1995-04-05', 'Hà Nội', 0, '2019-04-03 17:00:00', '2019-04-03 17:00:00', '20155110'),
(15, 'Tào Tháo', '20155111@gmail.com', 32, '083123129', '1996-05-08', 'Hà Nội', 0, '2019-04-03 17:00:00', '2019-04-03 17:00:00', '20155111'),
(16, 'Điêu Thuyền', '20155112@gmail.com', 33, '0731231312', '1997-11-18', 'Hà Nội', 1, '2019-04-03 17:00:00', '2019-04-03 17:00:00', '20155112'),
(17, 'Tư Mã Ý', '20155113@gmail.com', 34, '093123123', '1997-01-14', 'Hà Nội', 0, '2019-04-03 17:00:00', '2019-04-03 17:00:00', '20155113'),
(18, 'Chu Du', '20155114@gmail.com', 35, '092312312', '1982-02-09', 'Tây Sơn,Chùa Bộc', 0, '2019-04-06 17:00:00', '2019-04-06 17:00:00', '20155114'),
(19, 'Triệu Tử Long', '20155115@gmail.com', 36, '08312312231', '1984-03-08', 'Hà Nội', 0, '2019-04-06 17:00:00', '2019-04-06 17:00:00', '20155115');

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
(24, 12, 17, '2019-04-02 17:00:00', '2019-04-02 17:00:00'),
(25, 12, 19, '2019-04-02 17:00:00', '2019-04-02 17:00:00'),
(26, 13, 23, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(27, 14, 23, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(28, 12, 23, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(29, 15, 23, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(30, 17, 23, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(31, 16, 23, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(32, 13, 24, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(33, 14, 24, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(34, 12, 24, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(35, 15, 24, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(36, 16, 24, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(37, 17, 24, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(38, 13, 19, '2019-04-03 17:00:00', '2019-04-03 17:00:00'),
(39, 18, 26, '2019-04-06 17:00:00', '2019-04-06 17:00:00'),
(40, 19, 26, '2019-04-06 17:00:00', '2019-04-06 17:00:00');

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
(4, 'a.lv@gmail.com', 'Lê Văn A', 28, '0985671231', 'Hà Nội', '1990-04-10', 1, 'Đại học BKHN', 'Tốt nghiệp đại học BKHN năm 2014 ngành CNTT', '2019-04-02 17:00:00', NULL, 0),
(5, 'b.nt@gmail.com', 'Nguyễn Thị B', 29, '0342217896', 'Hà Nội', '1980-04-08', 1, 'Đại học KHTN', 'Tốt nghiệp đại học khoa học tự nhiên năm 2012', '2019-04-02 17:00:00', '2019-04-02 17:00:00', 1),
(6, 'c.tv@gmail.com', 'Trần Văn C', 30, '0975672131', 'Bắc Ninh', '1974-04-17', 3, 'Đại học KTQD', 'Tốt nghiệp chuyên ngành Tài chính đại học KTQD', '2019-04-02 17:00:00', '2019-04-03 17:00:00', 0);

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
(116, 5, '2019-05-03', '13:01:00', 14, '2019-03-25 08:21:24', NULL),
(119, 3, '2019-04-24', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(120, 3, '2019-05-08', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(121, 3, '2019-05-15', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(122, 3, '2019-05-22', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(123, 3, '2019-05-29', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(124, 3, '2019-06-05', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(125, 3, '2019-06-12', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(126, 3, '2019-06-19', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(127, 3, '2019-06-26', '14:00:00', 16, '2019-03-28 01:56:33', NULL),
(128, 3, '2019-07-03', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(129, 3, '2019-07-10', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(130, 3, '2019-07-17', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(131, 3, '2019-07-24', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(132, 3, '2019-07-31', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(133, 3, '2019-08-07', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(134, 3, '2019-08-14', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(135, 3, '2019-08-21', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(136, 3, '2019-08-28', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(137, 3, '2019-09-04', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(138, 3, '2019-09-11', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(139, 3, '2019-09-18', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(140, 3, '2019-09-25', '14:00:00', 16, '2019-03-28 01:56:34', NULL),
(141, 4, '2019-04-04', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(142, 4, '2019-04-11', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(143, 4, '2019-04-18', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(144, 4, '2019-04-25', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(145, 4, '2019-05-02', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(146, 4, '2019-05-09', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(147, 4, '2019-05-16', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(148, 4, '2019-05-23', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(149, 4, '2019-05-30', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(150, 4, '2019-06-06', '16:00:00', 17, '2019-04-03 01:44:13', NULL),
(151, 4, '2019-04-04', '13:45:00', 18, '2019-04-03 01:49:31', NULL),
(152, 4, '2019-04-11', '13:45:00', 18, '2019-04-03 01:49:31', NULL),
(153, 4, '2019-04-18', '13:45:00', 18, '2019-04-03 01:49:31', NULL),
(154, 4, '2019-04-25', '13:45:00', 18, '2019-04-03 01:49:32', NULL),
(155, 4, '2019-05-02', '13:45:00', 18, '2019-04-03 01:49:32', NULL),
(156, 4, '2019-05-09', '13:45:00', 18, '2019-04-03 01:49:32', NULL),
(157, 4, '2019-05-16', '13:45:00', 18, '2019-04-03 01:49:32', NULL),
(158, 4, '2019-05-23', '13:45:00', 18, '2019-04-03 01:49:32', NULL),
(159, 4, '2019-05-30', '13:45:00', 18, '2019-04-03 01:49:32', NULL),
(160, 4, '2019-06-06', '13:45:00', 18, '2019-04-03 01:49:32', NULL),
(161, 5, '2019-04-05', '19:00:00', 19, '2019-04-03 01:54:00', NULL),
(162, 5, '2019-04-12', '19:00:00', 19, '2019-04-03 01:54:00', NULL),
(163, 5, '2019-04-19', '19:00:00', 19, '2019-04-03 01:54:00', NULL),
(164, 5, '2019-04-26', '19:00:00', 19, '2019-04-03 01:54:00', NULL),
(165, 5, '2019-05-03', '19:00:00', 19, '2019-04-03 01:54:00', NULL),
(170, 5, '2019-04-05', '16:30:00', 21, '2019-04-03 07:13:41', NULL),
(171, 6, '2019-04-06', '16:30:00', 21, '2019-04-03 07:13:41', NULL),
(172, 5, '2019-04-12', '16:30:00', 21, '2019-04-03 07:13:41', NULL),
(173, 6, '2019-04-13', '16:30:00', 21, '2019-04-03 07:13:41', NULL),
(174, 5, '2019-04-19', '16:30:00', 21, '2019-04-03 07:13:41', NULL),
(175, 5, '2019-04-05', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(176, 4, '2019-04-11', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(177, 5, '2019-04-12', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(178, 4, '2019-04-18', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(179, 5, '2019-04-19', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(180, 4, '2019-04-25', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(181, 5, '2019-04-26', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(182, 4, '2019-05-02', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(183, 5, '2019-05-03', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(184, 4, '2019-05-09', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(185, 5, '2019-05-10', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(186, 4, '2019-05-16', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(187, 5, '2019-05-17', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(188, 4, '2019-05-23', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(189, 5, '2019-05-24', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(190, 4, '2019-05-30', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(191, 5, '2019-05-31', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(192, 4, '2019-06-06', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(193, 5, '2019-06-07', '17:00:00', 22, '2019-04-03 08:15:57', NULL),
(194, 4, '2019-06-13', '17:00:00', 22, '2019-04-03 08:15:58', NULL),
(195, 2, '2019-03-05', '07:00:00', 23, '2019-04-04 01:42:56', NULL),
(196, 5, '2019-03-08', '07:00:00', 23, '2019-04-04 01:42:56', NULL),
(197, 2, '2019-03-12', '07:00:00', 23, '2019-04-04 01:42:56', NULL),
(198, 5, '2019-03-15', '07:00:00', 23, '2019-04-04 01:42:56', NULL),
(199, 2, '2019-03-19', '07:00:00', 23, '2019-04-04 01:42:56', NULL),
(200, 2, '2019-03-05', '09:30:00', 24, '2019-04-04 01:45:58', NULL),
(201, 5, '2019-03-08', '09:30:00', 24, '2019-04-04 01:45:58', NULL),
(202, 2, '2019-03-12', '09:30:00', 24, '2019-04-04 01:45:58', NULL),
(203, 5, '2019-03-15', '09:30:00', 24, '2019-04-04 01:45:58', NULL),
(204, 2, '2019-03-19', '09:30:00', 24, '2019-04-04 01:45:58', NULL),
(205, 4, '2019-04-25', '15:00:00', 25, '2019-04-07 13:13:00', NULL),
(206, 5, '2019-04-26', '15:00:00', 25, '2019-04-07 13:13:01', NULL),
(207, 4, '2019-05-02', '15:00:00', 25, '2019-04-07 13:13:01', NULL),
(208, 5, '2019-05-03', '15:00:00', 25, '2019-04-07 13:13:01', NULL),
(209, 4, '2019-05-09', '15:00:00', 25, '2019-04-07 13:13:01', NULL),
(210, 4, '2019-03-07', '07:00:00', 26, '2019-04-07 16:33:48', NULL),
(211, 2, '2019-03-12', '07:00:00', 26, '2019-04-07 16:33:48', NULL),
(212, 4, '2019-03-14', '07:00:00', 26, '2019-04-07 16:33:48', NULL),
(213, 2, '2019-03-19', '07:00:00', 26, '2019-04-07 16:33:48', NULL),
(214, 4, '2019-03-21', '07:00:00', 26, '2019-04-07 16:33:48', NULL);

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
(2, 'Admin', 'bangps@gmail.com', '$2y$10$Ge821pXgLVX3LYfXZBzjje5e4wZK.GuH49RHJOIiXLUCqn1VXexge', 1, '2019-03-14 09:21:42', NULL, '2019-03-14 09:21:42'),
(17, 'Pham Bang', '20155119@gmail.com', '$2y$10$u1WkuIm/rHltcTRV9AtuNOHwjablnVd/VPZvxOl6Q6/xtHkioPzHm', 3, '2019-03-20 17:00:00', NULL, '2019-03-20 17:00:00'),
(18, 'Khổng Minh', '20155120@gmail.com', '$2y$10$Z2GcbGhy69bNM5b4T1sBfO2hy/TN5lkOBD3i6wUbn9AXox800TOnK', 3, '2019-03-20 17:00:00', NULL, '2019-03-20 17:00:00'),
(28, 'Lê Văn A', 'a.lv@gmail.com', '$2y$10$i.h1aN6596GT05gdabrnUO8az8yc5seb3PJdspl4V6LkcKL0wbq/K', 2, '2019-04-02 17:00:00', NULL, NULL),
(29, 'Nguyễn Thị B', 'b.nt@gmail.com', '$2y$10$u2VY2uMfpqvUQ5Jp/s1TauiRQMJIo3apVdUieB9/ZY6xAjBEqbjpG', 2, '2019-04-02 17:00:00', NULL, NULL),
(30, 'Trần Văn C', 'c.tv@gmail.com', '$2y$10$4.1ZClnB5LufdOO82YJiqe.6pvTC8CIqFBH2jlOH9UGuPCHL4wJSO', 2, '2019-04-02 17:00:00', NULL, NULL),
(31, 'Lưu Bị', '20155110@gmail.com', '$2y$10$RzgBN3Pj6lXjmkP4A3IiuugPfIPOTtNektYkMRryN2pR.7h2KFOu6', 3, '2019-04-03 17:00:00', NULL, '2019-04-03 17:00:00'),
(32, 'Tào Tháo', '20155111@gmail.com', '$2y$10$IN3Gj749wxre4hb696LvwuA4pLKECU8F1MI0FdOccXUMub6le9f/q', 3, '2019-04-03 17:00:00', NULL, '2019-04-03 17:00:00'),
(33, 'Điêu Thuyền', '20155112@gmail.com', '$2y$10$/tmmsMXL/OOxafiAS/EbTO901vPD/iEf8UhCXxGvAhvg7c4Shtt1W', 3, '2019-04-03 17:00:00', NULL, '2019-04-03 17:00:00'),
(34, 'Tư Mã Ý', '20155113@gmail.com', '$2y$10$DJyYTWluJFZ/rETVkRv0IuKnac4FstA03jQOyFAmfkER/r9tW50C.', 3, '2019-04-03 17:00:00', NULL, '2019-04-03 17:00:00'),
(35, 'Chu Du', '20155114@gmail.com', '$2y$10$9dvn2xeeWfBdTlp/LjKzhesBMGvHiJZRK1GXb1f37v/gnMbE9e3qW', 3, '2019-04-06 17:00:00', NULL, '2019-04-06 17:00:00'),
(36, 'Triệu Tử Long', '20155115@gmail.com', '$2y$10$XSTZgmWUnzhAv649Kc3Sh.SMvVXqPOL/Lbu234kz65ulhKWdvCQGu', 3, '2019-04-06 17:00:00', NULL, '2019-04-06 17:00:00');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roll_calls`
--
ALTER TABLE `roll_calls`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
