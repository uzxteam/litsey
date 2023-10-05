-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2023 at 05:30 PM
-- Server version: 5.7.39
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@uzxteam.uz', 'admin', NULL, '651ec7a73a8851696516007.png', '$2y$10$8.4F3mNbpu/J4BxIeLP6deXQspWkR9xAkQ4RK0z5HB4kZ8cSHwYNG', 'vsPMItyR8zFAnXbzGPCpv6pocXV7V0ag47rRrJGoG4fzmBsb7zlVC2uO9RCP', NULL, '2023-10-05 16:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `click_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission_logs`
--

CREATE TABLE `commission_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `plan_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `method_code` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `method_currency` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `rate` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `final_amo` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `detail` text COLLATE utf8mb4_unicode_ci,
  `btc_amo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel',
  `from_api` tinyint(1) NOT NULL DEFAULT '0',
  `admin_feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci,
  `shortcode` text COLLATE utf8mb4_unicode_ci COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>enable, 2=>disable',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Live Chat(Tawk.to)', 'Key location is shown bellow', 'chat-png.png', '<script>\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n                        (function(){\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\n                        s1.async=true;\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\n                        s1.charset=\"UTF-8\";\n                        s1.setAttribute(\"crossorigin\",\"*\");\n                        s0.parentNode.insertBefore(s1,s0);\n                        })();\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------\"}}', 'twak.png', 0, NULL, '2019-10-18 23:16:05', '2023-04-03 01:49:14'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha2.png', '\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\n<div class=\"g-recaptcha\" data-sitekey=\"{{site_key}}\" data-callback=\"verifyCaptcha\"></div>\n<div id=\"g-recaptcha-error\"></div>', '{\"site_key\":{\"title\":\"Site Key\",\"value\":\"6LdPC88fAAAAADQlUf_DV6Hrvgm-pZuLJFSLDOWV\"},\"secret_key\":{\"title\":\"Secret Key\",\"value\":\"6LdPC88fAAAAAG5SVaRYDnV2NpCrptLg2XLYKRKB\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2022-05-08 04:01:36'),
(7, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google_analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\n                <script>\n                  window.dataLayer = window.dataLayer || [];\n                  function gtag(){dataLayer.push(arguments);}\n                  gtag(\"js\", new Date());\n                \n                  gtag(\"config\", \"{{app_key}}\");\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"G-JGB5GZ3G69\"}}', 'ganalytics.png', 1, NULL, '2019-10-18 23:16:05', '2023-08-28 09:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `act`, `form_data`, `created_at`, `updated_at`) VALUES
(2, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"nid_number_22\":{\"name\":\"NID Number 22\",\"label\":\"nid_number_22\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"textarea\"},\"sadfg\":{\"name\":\"sadfg\",\"label\":\"sadfg\",\"is_required\":\"optional\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"asdf\":{\"name\":\"asdf\",\"label\":\"asdf\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Test\",\"Test2\",\"Test3\"],\"type\":\"select\"},\"nid_number_226985\":{\"name\":\"NID Number 226985\",\"label\":\"nid_number_226985\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Test\",\"Test 2\",\"Test 3\"],\"type\":\"checkbox\"},\"nid_number_3333\":{\"name\":\"NID Number 3333\",\"label\":\"nid_number_3333\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Test\",\"asdf\"],\"type\":\"radio\"},\"nid_number_3333587\":{\"name\":\"NID Number 3333587\",\"label\":\"nid_number_3333587\",\"is_required\":\"optional\",\"extensions\":\"jpg,bmp,png,pdf\",\"options\":[],\"type\":\"file\"}}', '2022-03-16 01:09:49', '2022-03-17 00:02:54'),
(3, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"nid_number_226985\":{\"name\":\"NID Number 226985\",\"label\":\"nid_number_226985\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-16 04:32:29', '2022-03-16 04:35:32'),
(5, 'withdraw_method', '{\"nid_number_33\":{\"name\":\"NID Number 33\",\"label\":\"nid_number_33\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-17 00:45:35', '2022-03-17 00:53:17'),
(6, 'withdraw_method', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-17 00:47:04', '2022-03-17 00:47:04'),
(7, 'kyc', '{\"full_name\":{\"name\":\"Full Name\",\"label\":\"full_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"gender\":{\"name\":\"Gender\",\"label\":\"gender\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Male\",\"Female\",\"Others\"],\"type\":\"select\"},\"you_hobby\":{\"name\":\"You Hobby\",\"label\":\"you_hobby\",\"is_required\":\"required\",\"extensions\":null,\"options\":[\"Programming\",\"Gardening\",\"Traveling\",\"Others\"],\"type\":\"checkbox\"},\"nid_photo\":{\"name\":\"NID Photo\",\"label\":\"nid_photo\",\"is_required\":\"required\",\"extensions\":\"jpg,png\",\"options\":[],\"type\":\"file\"}}', '2022-03-17 02:56:14', '2022-04-11 03:23:40'),
(8, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"}}', '2022-03-21 07:53:25', '2022-03-21 07:53:25'),
(9, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"}}', '2022-03-21 07:54:15', '2022-03-21 07:54:15'),
(10, 'manual_deposit', '{\"nid_number\":{\"name\":\"NID Number\",\"label\":\"nid_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"textarea\"}}', '2022-03-21 07:55:15', '2022-03-21 07:55:22'),
(11, 'withdraw_method', '{\"nid_number_2658\":{\"name\":\"NID Number 2658\",\"label\":\"nid_number_2658\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[\"asdf\"],\"type\":\"checkbox\"}}', '2022-03-22 00:14:09', '2022-03-22 00:14:18'),
(12, 'withdraw_method', '[]', '2022-03-30 09:03:12', '2022-03-30 09:03:12'),
(13, 'withdraw_method', '{\"bank_name\":{\"name\":\"Bank Name\",\"label\":\"bank_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"account_name\":{\"name\":\"Account Name\",\"label\":\"account_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"account_number\":{\"name\":\"Account Number\",\"label\":\"account_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2022-03-30 09:09:11', '2022-09-28 04:05:20'),
(14, 'withdraw_method', '{\"mobile_number\":{\"name\":\"Mobile Number\",\"label\":\"mobile_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2022-03-30 09:10:12', '2022-09-29 09:55:20'),
(15, 'manual_deposit', '{\"send_from_number\":{\"name\":\"Send From Number\",\"label\":\"send_from_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"},\"transaction_number\":{\"name\":\"Transaction Number\",\"label\":\"transaction_number\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"},\"screenshot\":{\"name\":\"Screenshot\",\"label\":\"screenshot\",\"is_required\":\"required\",\"extensions\":\"jpg,jpeg,png\",\"options\":[],\"type\":\"file\"}}', '2022-03-30 09:15:27', '2022-03-30 09:15:27'),
(16, 'manual_deposit', '{\"transaction_number\":{\"name\":\"Transaction Number\",\"label\":\"transaction_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"screenshot\":{\"name\":\"Screenshot\",\"label\":\"screenshot\",\"is_required\":\"required\",\"extensions\":\"jpg,pdf,docx\",\"options\":[],\"type\":\"file\"}}', '2022-03-30 09:16:43', '2022-04-11 03:19:54'),
(17, 'manual_deposit', '[]', '2022-03-30 09:21:19', '2022-03-30 09:21:19'),
(18, 'manual_deposit', '{\"asdfasddf\":{\"name\":\"asdfasddf\",\"label\":\"asdfasddf\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"}}', '2022-09-28 04:50:55', '2022-09-28 04:50:55'),
(19, 'manual_deposit', '{\"sadf\":{\"name\":\"sadf\",\"label\":\"sadf\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"textarea\"}}', '2022-09-28 05:13:04', '2022-09-28 05:13:59'),
(20, 'manual_deposit', '{\"mobile_account\":{\"name\":\"Mobile Account\",\"label\":\"mobile_account\",\"is_required\":\"optional\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"}}', '2023-03-30 02:46:46', '2023-03-30 02:46:46'),
(21, 'manual_deposit', '{\"mobile_no\":{\"name\":\"Mobile No\",\"label\":\"mobile_no\",\"is_required\":\"optional\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2023-07-27 07:24:45', '2023-08-27 09:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_values` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"andmi\",\"litsey\"],\"description\":\"Andijon Mashinasozlik instituti akademik litsey\",\"social_title\":\"Andijon Mashinasozlik instituti akademik litsey\",\"social_description\":\"Andijon Mashinasozlik instituti akademik litsey\",\"image\":\"651e980c941151696503820.jpg\"}', '2020-07-04 23:42:52', '2023-10-05 13:03:40'),
(24, 'about.content', '{\"has_image\":\"1\",\"top_heading\":\"About Us\",\"heading\":\"What\'s So Special About Agency?\",\"description\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\\r\\n\\r\\nDispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75%.\",\"experience\":\"15\",\"about_btn_icon\":\"<i class=\\\"fas fa-arrow-right\\\"><\\/i>\",\"about_btn\":\"View More\",\"about_image_1\":\"643517f4c3e7e1681201140.jpg\",\"about_image_2\":\"643517f4ce5f61681201140.png\"}', '2020-10-28 00:51:20', '2023-04-11 05:49:00'),
(25, 'blog.content', '{\"top_heading\":\"Yangiliklar\",\"heading\":\"So\'ngi yangiliklar\",\"sub_heading\":\"Eng so\'nggi yangiliklar\"}', '2020-10-28 00:51:34', '2023-10-05 13:20:32'),
(27, 'contact_us.content', '{\"has_image\":\"1\",\"title\":\"Aloqa\",\"short_description\":\"Andijon Mashinasozlik instituti akademik litsey\",\"email_address\":\"Al.amiq.2al@markaz.uz\",\"contact_details\":\"Andijon shaxri  Amir Temur ko\'chasi 5-uy\",\"contact_number\":\"+998 93-440-22-13\",\"latitude\":\"40.740229\",\"longitude\":\"72.323970\",\"website_footer\":\"<p>Copyright AndMI 2023. All rights reserved.<\\/p>\",\"contact_image\":\"651e995176cf61696504145.png\"}', '2020-10-28 00:59:19', '2023-10-05 13:19:44'),
(28, 'counter.content', '{\"top_heading\":\"Biz haqimizda\",\"heading\":\"Yutuqlar raqamlarda\"}', '2020-10-28 01:04:02', '2023-10-05 13:31:46'),
(31, 'social_icon.element', '{\"title\":\"Facebook\",\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/\"}', '2020-11-12 04:07:30', '2023-03-27 05:30:25'),
(33, 'feature.content', '{\"heading\":\"asdf\",\"sub_heading\":\"asdf\"}', '2021-01-03 23:40:54', '2021-01-03 23:40:55'),
(34, 'feature.element', '{\"title\":\"asdf\",\"description\":\"asdf\",\"feature_icon\":\"asdf\"}', '2021-01-03 23:41:02', '2021-01-03 23:41:02'),
(35, 'service.element', '{\"service_icon\":\"<i class=\\\"fas fa-desktop\\\"><\\/i>\",\"title\":\"Mobile Developments\",\"description\":\"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus odit beatae illo labore harum eaque neque quasi a similique qui!\",\"service_btn\":\"Read More\"}', '2021-03-06 01:12:10', '2023-03-27 07:25:03'),
(36, 'service.content', '{\"top_heading\":\"What We Do\",\"heading\":\"Our Creative Services\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age just 10 nations have facilitated .\"}', '2021-03-06 01:27:34', '2023-03-27 07:23:15'),
(39, 'banner.content', '{\"has_image\":\"1\",\"top_heading\":\"A trusted Digital agency\",\"heading\":\"WELCOME TO CREATIVE DIGITAL AGENCY\",\"sub_heading\":\"Transform your ideas into reality with our expert software development services. From concept to deployment, we deliver custom solutions that meet your unique business needs.\",\"banner_btn_1\":\"Get Started\",\"banner_btn_2\":\"Contact Us\",\"banner_image\":\"64351ff45a3851681203188.png\"}', '2021-05-02 06:09:30', '2023-04-11 06:23:08'),
(41, 'cookie.data', '{\"short_desc\":\"We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking \\\"Accept\\\", you consent to our use of cookies.\",\"description\":\"<h4>GDPR, cookies, and compliance&nbsp;<\\/h4><p>natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.<\\/p><ul><li>Natus error sit voluptatem accusantium doloremque<\\/li><li>Architecto beatae accusantium doloremque<\\/li><li>Voluptatem accusantium doloremque<\\/li><li>Sed quia consequuntur magni doloremque<\\/li><\\/ul><p>natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.<\\/p><p>&nbsp;<\\/p><p>consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.<\\/p>\",\"status\":0}', '2020-07-04 23:42:52', '2023-04-24 07:29:49'),
(42, 'policy_pages.element', '{\"title\":\"Maxfiylik siyosati\",\"details\":\"<p><strong>Maxfiylik siyosati<\\/strong><\\/p>\"}', '2021-06-09 08:50:42', '2023-10-05 13:45:45'),
(43, 'policy_pages.element', '{\"title\":\"Foydalanish shartlari\",\"details\":\"<p><strong>Foydalanish shartlari<\\/strong><\\/p>\"}', '2021-06-09 08:51:18', '2023-10-05 13:46:10'),
(44, 'maintenance.data', '{\"description\":\"<div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"text-align: center; font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"text-align: center; margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div>\"}', '2020-07-04 23:42:52', '2022-05-11 03:57:17'),
(45, 'feature.element', '{\"title\":\"sytry\",\"description\":\"ertyerty\",\"feature_icon\":\"<i class=\\\"fas fa-address-book\\\"><\\/i>\"}', '2022-10-17 10:23:22', '2022-10-17 10:23:22'),
(46, 'feature.element', '{\"title\":\"sytry\",\"description\":\"ertyerty\",\"feature_icon\":\"<i class=\\\"fas fa-address-book\\\"><\\/i>\"}', '2022-10-17 10:23:22', '2022-10-17 10:23:22'),
(52, 'footer_company_links.element', '{\"title\":\"Bosh sahifa\",\"url\":\"\\/\"}', '2023-03-22 08:21:07', '2023-10-05 15:36:48'),
(53, 'faq.content', '{\"has_image\":\"1\",\"top_heading\":\"FAQ\",\"heading\":\"Frequently Asked Question.\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age just 10 nations have facilitated .\",\"faq_image\":\"6435197486d9a1681201524.jpg\"}', '2023-03-22 08:21:28', '2023-04-11 05:55:24'),
(56, 'social_icon.element', '{\"title\":\"telegram\",\"social_icon\":\"<i class=\\\"fab fa-telegram-plane\\\"><\\/i>\",\"url\":\"https:\\/\\/t.me\\/\"}', '2023-03-27 05:30:56', '2023-10-05 15:39:18'),
(57, 'social_icon.element', '{\"title\":\"Instagram\",\"social_icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"url\":\"https:\\/\\/www.instagram.com\\/\"}', '2023-03-27 05:31:32', '2023-03-27 05:31:32'),
(59, 'about.element', '{\"content_list\":\"Clients Focused\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt quo\"}', '2023-03-27 06:48:37', '2023-04-11 05:58:51'),
(60, 'about.element', '{\"content_list\":\"After Sales support.\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt quo\"}', '2023-03-27 06:48:43', '2023-04-11 05:59:26'),
(61, 'about.element', '{\"content_list\":\"We Can Save Your Money.\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt quo\"}', '2023-03-27 06:48:50', '2023-04-11 05:59:35'),
(62, 'service.element', '{\"service_icon\":\"<i class=\\\"fas fa-mobile-alt\\\"><\\/i>\",\"title\":\"Product Managements\",\"description\":\"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus odit beatae illo labore harum eaque neque quasi a similique qui!\",\"service_btn\":\"Read More\"}', '2023-03-27 07:25:57', '2023-03-27 07:25:57'),
(63, 'service.element', '{\"service_icon\":\"<i class=\\\"fas fa-pen-nib\\\"><\\/i>\",\"title\":\"UI\\/UX Design\",\"description\":\"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus odit beatae illo labore harum eaque neque quasi a similique qui!\",\"service_btn\":\"Read More\"}', '2023-03-27 07:26:30', '2023-03-27 07:26:30'),
(64, 'service.element', '{\"service_icon\":\"<i class=\\\"fas fa-laptop\\\"><\\/i>\",\"title\":\"Social Marketing\",\"description\":\"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus odit beatae illo labore harum eaque neque quasi a similique qui!\",\"service_btn\":\"Read More\"}', '2023-03-27 07:27:19', '2023-03-27 07:27:19'),
(65, 'service.element', '{\"service_icon\":\"<i class=\\\"fas fa-landmark\\\"><\\/i>\",\"title\":\"Digital Marketing\",\"description\":\"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus odit beatae illo labore harum eaque neque quasi a similique qui!\",\"service_btn\":\"Read More\"}', '2023-03-27 07:28:10', '2023-03-27 07:28:10'),
(66, 'service.element', '{\"service_icon\":\"<i class=\\\"fas fa-headset\\\"><\\/i>\",\"title\":\"Content Writing\",\"description\":\"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus odit beatae illo labore harum eaque neque quasi a similique qui!\",\"service_btn\":\"Read More\"}', '2023-03-27 07:28:37', '2023-03-27 07:28:37'),
(67, 'choose_us.content', '{\"has_image\":\"1\",\"top_heading\":\"Why Choose Us\",\"heading\":\"Our Digital Agency Delivers Extraordinary Business Value.\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\",\"top_heading_2\":\"Experienced digital agency in Rejon. Innovative solutions for business success.\",\"sub_heading_2\":\"Rather than focusing solely on technology platforms, it is important to also prioritize leadership skills and the seamless integration of wireless bandwidth to achieve optimal results. This approach allows for efficient and effective communication without any obstacles or barriers.\",\"url\":\"https:\\/\\/www.youtube.com\\/watch?v=LXb3EKWsInQ\",\"choose_image\":\"643518fa1c34c1681201402.png\"}', '2023-03-27 07:45:16', '2023-04-11 05:53:22'),
(68, 'choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"Fresh Business Thinking\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-03-27 07:55:53', '2023-03-27 07:55:53'),
(69, 'choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"Risk-Free Satisfaction\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-03-27 07:56:15', '2023-03-27 07:56:15'),
(70, 'choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"24\\/7 Helpdesk Availability\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-03-27 07:56:39', '2023-03-27 07:56:39'),
(71, 'counter.element', '{\"title\":\"O\'qituvchilar\",\"counter_digit\":\"12\"}', '2023-03-28 00:55:16', '2023-10-05 13:30:21'),
(72, 'counter.element', '{\"title\":\"Yo\'nalish\",\"counter_digit\":\"6\"}', '2023-03-28 00:55:31', '2023-10-05 13:30:14'),
(73, 'counter.element', '{\"title\":\"To\'garaklar\",\"counter_digit\":\"10\"}', '2023-03-28 00:55:56', '2023-10-05 13:30:40'),
(74, 'counter.element', '{\"title\":\"Jami o\'quvchilar soni\",\"counter_digit\":\"90\"}', '2023-03-28 00:56:07', '2023-10-05 13:30:48'),
(75, 'plan.content', '{\"top_heading\":\"Our Pricing Plan\",\"heading\":\"Pricing We\'re Offering\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age just 10 nations have facilitated .\"}', '2023-03-28 00:58:41', '2023-03-28 00:58:41'),
(76, 'portfolio.content', '{\"top_heading\":\"Our Portfolio\",\"heading\":\"Let\\u2019s See Our Best Work\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\"}', '2023-03-28 01:18:17', '2023-03-28 01:37:00'),
(82, 'team_member.content', '{\"top_heading\":\"MA\'MURIYAT\",\"heading\":\"Litsey ma\'muriyati\",\"subheading\":\"ma\'muriyat haqida qisqacha\"}', '2023-03-28 02:01:43', '2023-10-05 15:21:14'),
(87, 'testimonial.content', '{\"top_heading\":\"Fikrlar\",\"heading\":\"O\'quvchilar fikri\",\"subheading\":\"O\'quvchilarimizning bizga bildirgan fikrlari\"}', '2023-03-28 02:22:21', '2023-10-05 15:33:41'),
(92, 'subscribe.content', '{\"has_image\":\"1\",\"top_heading\":\"News Letter\",\"heading\":\"Subscribe Our Newsletter\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age just.\",\"subscribe_image\":\"6422a391e4a451679991697.jpg\"}', '2023-03-28 05:47:20', '2023-03-28 05:51:37'),
(104, 'footer_company_links.element', '{\"title\":\"Litsey haqida\",\"url\":\"\\/about\"}', '2023-03-28 07:21:50', '2023-10-05 15:37:00'),
(105, 'footer_company_links.element', '{\"title\":\"Cookie\",\"url\":\"\\/cookie-policy\"}', '2023-03-28 07:22:20', '2023-10-05 15:37:08'),
(108, 'theme_two_banner.content', '{\"top_heading\":\"A trusted Digital agency\",\"heading\":\"WELCOME TO CREATIVE DIGITAL AGENCY\",\"sub_heading\":\"Transform your ideas into reality with our expert software development services. From concept to deployment, we deliver custom solutions that meet your unique business needs.\",\"banner_btn_1\":\"Get Started\",\"banner_btn_2\":\"Contact Us\"}', '2023-04-11 06:28:31', '2023-04-11 06:28:31'),
(109, 'theme_two_about.content', '{\"has_image\":\"1\",\"top_heading\":\"About Us\",\"heading\":\"What\'s So Special About Agency?\",\"description\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\\r\\n\\r\\nDispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75%.\",\"experience\":\"15\",\"about_btn_icon\":\"<i class=\\\"fas fa-arrow-right\\\"><\\/i>\",\"about_btn\":\"View More\",\"about_image_1\":\"6435247663b8f1681204342.jpg\",\"about_image_2\":\"643524766c1151681204342.png\"}', '2023-04-11 06:35:47', '2023-04-11 06:42:22'),
(110, 'theme_two_about.element', '{\"content_list\":\"Clients Focused\"}', '2023-04-11 06:35:59', '2023-04-11 06:35:59'),
(111, 'theme_two_about.element', '{\"content_list\":\"After Sales support.\"}', '2023-04-11 06:36:07', '2023-04-11 06:36:07'),
(112, 'theme_two_about.element', '{\"content_list\":\"We Can Save Your Money.\"}', '2023-04-11 06:36:13', '2023-04-11 06:36:13'),
(113, 'theme_two_choose_us.content', '{\"has_image\":\"1\",\"top_heading\":\"Why Choose Us\",\"heading\":\"Our Digital Agency Delivers Extraordinary Business Value.\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\",\"top_heading_2\":\"Experienced digital agency in Rejon. Innovative solutions for business success.\",\"sub_heading_2\":\"Rather than focusing solely on technology platforms, it is important to also prioritize leadership skills and the seamless integration of wireless bandwidth to achieve optimal results. This approach allows for efficient and effective communication without any obstacles or barriers.\",\"url\":\"https:\\/\\/www.youtube.com\\/watch?v=l-jBcewRW70\",\"choose_image\":\"643525f6166fc1681204726.png\"}', '2023-04-11 06:48:32', '2023-04-11 06:48:46'),
(114, 'theme_two_choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"Fresh Business Thinking\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-04-11 06:49:11', '2023-04-11 06:49:11'),
(115, 'theme_two_choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"Risk-Free Satisfaction\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-04-11 06:49:29', '2023-04-11 06:49:29'),
(116, 'theme_two_choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"24\\/7 Helpdesk Availability\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-04-11 06:50:02', '2023-04-11 06:50:02'),
(117, 'theme_two_portfolio.content', '{\"top_heading\":\"Our Portfolio\",\"heading\":\"Let\\u2019s See Our Best Work\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\"}', '2023-04-11 06:53:02', '2023-04-11 06:53:02'),
(124, 'theme_three_banner.content', '{\"has_image\":\"1\",\"top_heading\":\"Hush kelibsiz\",\"heading\":\"Andijon Mashinasozlik instituti qoshidagi akademik litsey\",\"sub_heading\":\"Rasmiy web sahifa\",\"experience\":\"15\",\"banner_btn_1\":\"yyy\",\"banner_btn_2\":\"Aloqa\",\"banner_image\":\"651ea0105946b1696505872.jpg\"}', '2023-04-11 07:02:53', '2023-10-05 13:40:30'),
(125, 'theme_three_about.content', '{\"has_image\":\"1\",\"top_heading\":\"Litsey haqida\",\"heading\":\"Andijon Mashinasozlik instituti qoshidagi akademik litsey\",\"about_btn\":\"Ko\'proq o\'qish\",\"about_image\":\"651eb7fbbf8881696511995.png\"}', '2023-04-11 07:06:36', '2023-10-05 15:19:56'),
(126, 'theme_three_about.element', '{\"content_list\":\"Tashkil etilgan yili\",\"description\":\"2005 yil 18 avgust \\u2116 196\"}', '2023-04-11 07:06:48', '2023-10-05 15:03:47'),
(127, 'theme_three_about.element', '{\"content_list\":\"Akademik litsey direktori\",\"description\":\"Abdulazizov Abdumajid Abdukarimovich\"}', '2023-04-11 07:06:59', '2023-10-05 15:04:08'),
(130, 'theme_three_choose_us.content', '{\"has_image\":\"1\",\"top_heading\":\"Why Choose Us\",\"heading\":\"Our Digital Agency Delivers Extraordinary Business Value.\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\",\"url\":\"https:\\/\\/www.youtube.com\\/watch?v=EQOarcurXfY\",\"choose_image\":\"64352b731796d1681206131.png\"}', '2023-04-11 07:12:11', '2023-04-11 07:12:11'),
(131, 'theme_three_choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"Fresh Business Thinking\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-04-11 07:12:31', '2023-04-11 07:12:31'),
(132, 'theme_three_choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"Risk-Free Satisfaction\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-04-11 07:12:58', '2023-04-11 07:12:58'),
(133, 'theme_three_choose_us.element', '{\"service_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"24\\/7 Helpdesk Availability\",\"description\":\"Revamp your business strategy with fresh thinking that drives innovation.\"}', '2023-04-11 07:13:22', '2023-04-11 07:13:22'),
(134, 'theme_three_portfolio.content', '{\"top_heading\":\"Our Portfolio\",\"heading\":\"Let\\u2019s See Our Best Work\",\"sub_heading\":\"Data transfer capacity has generally been inconsistent dispersed around the world, with expanding focus in the advanced age. Generally just 10 nations have facilitated 70-75% of the worldwide telecom limit.\"}', '2023-04-11 07:15:33', '2023-04-11 07:15:33'),
(141, 'footer_important_links.element', '{\"title\":\"Xizmatlar\",\"url\":\"\\/services\"}', '2023-05-18 05:05:05', '2023-10-05 13:34:23'),
(142, 'footer_important_links.element', '{\"title\":\"Aloqa\",\"url\":\"\\/contact\"}', '2023-05-18 05:05:28', '2023-10-05 13:34:28'),
(143, 'footer_important_links.element', '{\"title\":\"Yangiliklar\",\"url\":\"\\/blog\"}', '2023-05-18 05:06:37', '2023-10-05 13:34:52'),
(144, 'team_member.element', '{\"has_image\":\"1\",\"title\":\"Abdulazizov Abdumajid Abdukarimovich\",\"email\":\"Al.amiq.2al@markaz.uz\",\"description\":\"Yoshlar bilan ishlash bo\'yicha direktor o\'rinbosari\",\"facebook_icon\":\"<i class=\\\"fab fa-500px\\\"><\\/i>\",\"facebook_link\":\"Al.amiq.2al@markaz.uz\",\"instagram_icon\":\"<i class=\\\"fab fa-accessible-icon\\\"><\\/i>\",\"instagram_link\":\"Al.amiq.2al@markaz.uz\",\"twitter_icon\":\"<i class=\\\"fab fa-accessible-icon\\\"><\\/i>\",\"twitter_link\":\"Al.amiq.2al@markaz.uz\",\"agent_image\":\"651eb8b73e25e1696512183.jpg\"}', '2023-10-05 15:23:03', '2023-10-05 15:23:03'),
(145, 'testimonial.element', '{\"has_image\":\"1\",\"title\":\"Temurmalik Mamurov\",\"designation\":\"O\'quvchi\",\"description\":\"Malakali mutaxasislar jamlangan ajoyib jamoa Malakali mutaxasislar jamlangan ajoyib jamoa Malakali mutaxasislar jamlangan ajoyib jamoa Malakali mutaxasislar jamlangan ajoyib jamoa Malakali mutaxasislar jamlangan ajoyib jamoa\",\"star_count\":\"5\",\"testimonial_image\":\"651ebb246f2861696512804.png\"}', '2023-10-05 15:27:08', '2023-10-05 15:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `code` int(10) DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>enable, 2=>disable',
  `gateway_parameters` text COLLATE utf8mb4_unicode_ci,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci,
  `crypto` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `form_id`, `code`, `name`, `alias`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 101, 'Paypal', 'Paypal', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"sb-58ira22618401@business.example.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 08:03:45'),
(2, 0, 102, 'Perfect Money', 'PerfectMoney', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"---------------------\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 07:50:01'),
(3, 0, 105, 'PayTM', 'Paytm', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"-----------\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"--------------------\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"example.com\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 08:10:37'),
(4, 0, 107, 'PayStack', 'Paystack', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"--------\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"----------------\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.Paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.Paystack\"}}\r\n', NULL, '2019-09-14 13:14:22', '2022-11-26 07:49:18'),
(5, 0, 108, 'VoguePay', 'Voguepay', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"-------------------\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 07:50:14'),
(6, 0, 109, 'Flutterwave', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"----------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"-----------------------\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"------------------\"}}', '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2021-06-05 11:37:45'),
(7, 0, 110, 'RazorPay', 'Razorpay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"------------\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"--------\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2021-05-21 02:51:32'),
(8, 0, 112, 'Instamojo', 'Instamojo', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"------------\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"---------\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"-------\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2022-11-26 08:00:15'),
(9, 0, 503, 'CoinPayments', 'Coinpayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"---------------\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"------------\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"----------------\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"USDT.BEP20\":\"Tether USD (BSC Chain)\",\"USDT.ERC20\":\"Tether USD (ERC20)\",\"USDT.TRC20\":\"Tether USD (Tron/TRC20)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, '2019-09-14 13:14:22', '2022-10-29 07:29:51'),
(10, 0, 506, 'Coinbase Commerce', 'CoinbaseCommerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"---------\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"----------------\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.CoinbaseCommerce\"}}', NULL, '2019-09-14 13:14:22', '2022-10-29 07:29:48'),
(11, 0, 113, 'Paypal Express', 'PaypalSdk', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"------------\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"-----------\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2021-05-20 23:01:08'),
(12, 0, 114, 'Stripe Checkout', 'StripeV3', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51M8Ks2CL65BWuH7eCBcWsLP2yPfWaLtfJVxG3zfii7cCWJE1izM4jkhucmBSm6izmVtSGZyp0JDYYCVmx9E4WmQY004gfnctzD\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51M8Ks2CL65BWuH7eju6khGxJMpeeFuw2Rwrjr8UYCz6ZnQ3PiFxb1gVu1i1dBto9MQrnjkBimHkFJgNcqsrJHTak0010kCY41h\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"abcd\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.StripeV3\"}}', NULL, '2019-09-14 13:14:22', '2022-12-18 08:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_code` int(10) DEFAULT NULL,
  `gateway_alias` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `max_amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `percent_charge` decimal(5,2) NOT NULL DEFAULT '0.00',
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `rate` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci,
  `sms_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_two_base_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_two_secondary_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_three_base_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_three_secondary_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci COMMENT 'email configuration',
  `sms_config` text COLLATE utf8mb4_unicode_ci,
  `global_shortcodes` text COLLATE utf8mb4_unicode_ci,
  `kv` tinyint(1) NOT NULL DEFAULT '0',
  `ev` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'mobile verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'sms notification, 0 - dont send, 1 - send',
  `force_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT '0',
  `secure_password` tinyint(1) NOT NULL DEFAULT '0',
  `agree` tinyint(1) NOT NULL DEFAULT '0',
  `registration` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Off	, 1: On',
  `active_template` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_body`, `sms_from`, `base_color`, `secondary_color`, `theme_two_base_color`, `theme_two_secondary_color`, `theme_three_base_color`, `theme_three_secondary_color`, `mail_config`, `sms_config`, `global_shortcodes`, `kv`, `ev`, `en`, `sv`, `sn`, `force_ssl`, `maintenance_mode`, `secure_password`, `agree`, `registration`, `active_template`, `system_info`, `created_at`, `updated_at`) VALUES
(1, 'Andmi Litsey', 'USD', '$', 'info@example.com', '<p>Hi {{fullname}} ({{username}}),&nbsp;</p><p>{{message}}</p>', 'hi {{fullname}} ({{username}}), {{message}}', 'FinBiz', '673de6', '673de6', 'fab700', 'fab700', 'ca46f6', '6a54f8', '{\"name\":\"smtp\",\"host\":\"smtp.mailtrap.io\",\"port\":\"2525\",\"enc\":\"ssl\",\"username\":\"bcbcc6239f7a0e\",\"password\":\"c5d10803bef9b1\"}', '{\"name\":\"messageBird\",\"clickatell\":{\"api_key\":\"----------------\"},\"infobip\":{\"username\":\"------------8888888\",\"password\":\"-----------------\"},\"message_bird\":{\"api_key\":\"-------------------\"},\"nexmo\":{\"api_key\":\"----------------------\",\"api_secret\":\"----------------------\"},\"sms_broadcast\":{\"username\":\"----------------------\",\"password\":\"-----------------------------\"},\"twilio\":{\"account_sid\":\"-----------------------\",\"auth_token\":\"---------------------------\",\"from\":\"----------------------\"},\"text_magic\":{\"username\":\"-----------------------\",\"apiv2_key\":\"-------------------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\"],\"value\":[\"test_api 555\"]},\"body\":{\"name\":[\"from_number\"],\"value\":[\"5657545757\"]}}}', '{\n    \"site_name\":\"Name of your site\",\n    \"site_currency\":\"Currency of your site\",\n    \"currency_symbol\":\"Symbol of currency\"\n}', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'themesThree', '[]', NULL, '2023-10-05 16:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Uzbekcha', 'en', '5f15968db08911595250317.png', 0, 1, '2020-07-06 03:47:55', '2023-10-05 13:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sender` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_from` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_to` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `notification_type` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci,
  `sms_body` text COLLATE utf8mb4_unicode_ci,
  `shortcodes` text COLLATE utf8mb4_unicode_ci,
  `email_status` tinyint(1) NOT NULL DEFAULT '1',
  `sms_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'BAL_ADD', 'Balance - Added', 'Your Account has been Credited', '<div><div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been added to your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}&nbsp;</span></font><br></div><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin note:&nbsp;<span style=\"color: rgb(33, 37, 41); font-size: 12px; font-weight: 600; white-space: nowrap; text-align: var(--bs-body-text-align);\">{{remark}}</span></div>', '{{amount}} {{site_currency}} credited in your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin note is \"{{remark}}\"', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 0, '2021-11-03 12:00:00', '2022-09-21 13:04:13'),
(2, 'BAL_SUB', 'Balance - Subtracted', 'Your Account has been Debited', '<div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been subtracted from your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}</span></font><br><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin Note: {{remark}}</div>', '{{amount}} {{site_currency}} debited from your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin Note is {{remark}}', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:24:11'),
(3, 'DEPOSIT_COMPLETE', 'Deposit - Automated - Successful', 'Deposit Completed Successfully', '<div>Your deposit of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been completed Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div><br></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#000000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div>Received : {{method_amount}} {{method_currency}}<br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{amount}} {{site_currency}} Deposit successfully by {{method_name}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:25:43'),
(4, 'DEPOSIT_APPROVE', 'Deposit - Manual - Approved', 'Your Deposit is Approved', '<div style=\"font-family: Montserrat, sans-serif;\">Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>is Approved .<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Paid via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div>', 'Admin Approve Your {{amount}} {{site_currency}} payment request by {{method_name}} transaction : {{trx}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:26:07'),
(5, 'DEPOSIT_REJECT', 'Deposit - Manual - Rejected', 'Your Deposit Request is Rejected', '<div style=\"font-family: Montserrat, sans-serif;\">Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}} has been rejected</span>.<span style=\"font-weight: bolder;\"><br></span></div><div><br></div><div><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Paid via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge: {{charge}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number was : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">if you have any queries, feel free to contact us.<br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><br><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">{{rejection_message}}</span><br>', 'Admin Rejected Your {{amount}} {{site_currency}} payment request by {{method_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"rejection_message\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:45:27'),
(6, 'DEPOSIT_REQUEST', 'Deposit - Manual - Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>submitted successfully<span style=\"font-weight: bolder;\">&nbsp;.<br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div><br></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}}<br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{amount}} {{site_currency}} Deposit requested by {{method_name}}. Charge: {{charge}} . Trx: {{trx}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:29:19'),
(7, 'PASS_RESET_CODE', 'Password - Reset - Code', 'Password Reset', '<div style=\"font-family: Montserrat, sans-serif;\">We have received a request to reset the password for your account on&nbsp;<span style=\"font-weight: bolder;\">{{time}} .<br></span></div><div style=\"font-family: Montserrat, sans-serif;\">Requested From IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><div>Your account recovery code is:&nbsp;&nbsp;&nbsp;<font size=\"6\"><span style=\"font-weight: bolder;\">{{code}}</span></font></div><div><br></div></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><div><font size=\"4\" color=\"#CC0000\"><br></font></div>', 'Your account recovery code is: {{code}}', '{\"code\":\"Verification code for password reset\",\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 0, '2021-11-03 12:00:00', '2022-03-20 20:47:05'),
(8, 'PASS_RESET_DONE', 'Password - Reset - Confirmation', 'You have reset your password', '<p style=\"font-family: Montserrat, sans-serif;\">You have successfully reset your password.</p><p style=\"font-family: Montserrat, sans-serif;\">You changed from&nbsp; IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{time}}</span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><font color=\"#ff0000\">If you did not change that, please contact us as soon as possible.</font></span></p>', 'Your password has been changed successfully', '{\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:46:35'),
(9, 'ADMIN_SUPPORT_REPLY', 'Support - Reply', 'Reply Support Ticket', '<div><p><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\">A member from our support team has replied to the following ticket:</span></span></p><p><span style=\"font-weight: bolder;\"><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\"><br></span></span></span></p><p><span style=\"font-weight: bolder;\">[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</span></p><p>----------------------------------------------</p><p>Here is the reply :<br></p><p>{{reply}}<br></p></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', 'Your Ticket#{{ticket_id}} :  {{ticket_subject}} has been replied.', '{\"ticket_id\":\"ID of the support ticket\",\"ticket_subject\":\"Subject  of the support ticket\",\"reply\":\"Reply made by the admin\",\"link\":\"URL to view the support ticket\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:47:51'),
(10, 'EVER_CODE', 'Verification - Email', 'Please verify your email address', '<br><div><div style=\"font-family: Montserrat, sans-serif;\">Thanks For joining us.<br></div><div style=\"font-family: Montserrat, sans-serif;\">Please use the below code to verify your email address.<br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your email verification code is:<font size=\"6\"><span style=\"font-weight: bolder;\">&nbsp;{{code}}</span></font></div></div>', '---', '{\"code\":\"Email verification code\"}', 1, 0, '2021-11-03 12:00:00', '2022-04-03 02:32:07'),
(11, 'SVER_CODE', 'Verification - SMS', 'Verify Your Mobile Number', '---', 'Your phone verification code is: {{code}}', '{\"code\":\"SMS Verification Code\"}', 0, 1, '2021-11-03 12:00:00', '2022-03-20 19:24:37'),
(12, 'WITHDRAW_APPROVE', 'Withdraw - Approved', 'Withdraw Request has been Processed and your money is sent', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Processed Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Processed Payment :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div>', 'Admin Approve Your {{amount}} {{site_currency}} withdraw request by {{method_name}}. Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"admin_details\":\"Details provided by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:50:16'),
(13, 'WITHDRAW_REJECT', 'Withdraw - Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Rejected.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You should get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">----</div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\"><br></font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\">{{amount}} {{currency}} has been&nbsp;<span style=\"font-weight: bolder;\">refunded&nbsp;</span>to your account and your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}}</span><span style=\"font-weight: bolder;\">&nbsp;{{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Rejection :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br><br><br></div><div></div><div></div>', 'Admin Rejected Your {{amount}} {{site_currency}} withdraw request. Your Main Balance {{post_balance}}  {{method_name}} , Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this action\",\"admin_details\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:57:46'),
(14, 'WITHDRAW_REQUEST', 'Withdraw - Requested', 'Withdraw Request Submitted Successfully', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been submitted Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br></div>', '{{amount}} {{site_currency}} withdraw requested by {{method_name}}. You will get {{method_amount}} {{method_currency}} Trx: {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-21 04:39:03'),
(15, 'DEFAULT', 'Default Template', '{{subject}}', '{{message}}', '{{message}}', '{\"subject\":\"Subject\",\"message\":\"Message\"}', 1, 1, '2019-09-14 13:14:22', '2021-11-04 09:38:55'),
(16, 'PLAN SUBSCRIBE', 'Subscribed Plan', 'You\'ve subscribed successfully', '<p>You\'ve subscribed to <strong>{{plan_name}}</strong> plan. The price <strong>{{amount}} {{currency}}</strong>. The transaction number is #<strong>{{trx}}</strong>. Your current is<strong> {{post_balance}} {{currency}}</strong></p>', 'You\'ve subscribed to {{plan_name}} plan. The price {{amount}} {{currency}}. The transaction number is #{{trx}}. Your current is {{post_balance}} {{currency}}', '{\"amount\":\"Price of the plan\",\"plan_name\":\"Name of plan\",\"trx\":\"Transaction number\",\"post_balance\":\"Balance after transactions\"}', 1, 1, '2023-03-30 05:06:32', '2023-03-30 05:06:32'),
(18, 'ORDER PLACE', 'order place', 'You\'ve order place successfully', '<p>Order Placement Details:</p>\r\n<p>Order Number: <strong>{{order_number}}</strong></p>\r\n<p>Price: <strong>{{amount}} {{currency}}</strong></p>\r\n<p>Transaction Number: #<strong>{{trx}}</strong></p>\r\n<p>Your Current Balance: <strong>{{post_balance}} {{currency}}</strong></p>', '<p>Order Placement Details:</p>\r\n<p>Order Number: <strong>{{order_number}}</strong></p>\r\n<p>Price: <strong>{{amount}} {{currency}}</strong></p>\r\n<p>Transaction Number: #<strong>{{trx}}</strong></p>\r\n<p>Your Current Balance: <strong>{{post_balance}} {{currency}}</strong></p>', '{\"amount\":\"Price of the product\",\"order_number\":\"Order number\",\"trx\":\"Transaction number\",\"post_balance\":\"Balance after transactions\"}', 1, 1, '2023-03-30 05:06:32', '2023-03-30 05:06:32'),
(19, 'ORDER REQUEST', 'order request', 'You\'ve order request successfully', '<p>Order Placement Details:</p>\r\n<p>Order Number: <strong>{{order_number}}</strong></p>\r\n<p>Price: <strong>{{amount}} {{currency}}</strong></p>\r\n<p>Transaction Number: #<strong>{{trx}}</strong></p>\r\n<p>Your Current Balance: <strong>{{post_balance}} {{currency}}</strong></p>', '<p>Order Placement Details:</p>\r\n<p>Order Number: <strong>{{order_number}}</strong></p>\r\n<p>Price: <strong>{{amount}} {{currency}}</strong></p>\r\n<p>Transaction Number: #<strong>{{trx}}</strong></p>\r\n<p>Your Current Balance: <strong>{{post_balance}} {{currency}}</strong></p>', '{\"amount\":\"Price of the product\",\"order_number\":\"Order number\",\"trx\":\"Transaction number\",\"post_balance\":\"Balance after transactions\"}', 1, 1, '2023-03-30 05:06:32', '2023-03-30 05:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `service_price` decimal(28,8) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0= pending, 1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'template name',
  `secs` text COLLATE utf8mb4_unicode_ci,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 'presets.default.', '[\"about\",\"service\",\"choose_us\",\"counter\",\"plan\",\"portfolio\",\"team_member\",\"testimonial\",\"subscribe\",\"faq\",\"blog\",\"brand\"]', 1, '2020-07-11 06:23:58', '2023-03-27 05:06:43'),
(4, 'Plan', 'plan', 'presets.default.', '[\"service\"]', 1, '2020-10-22 01:14:43', '2023-04-01 04:03:31'),
(5, 'Services', 'services', 'presets.default.', '[\"plan\"]', 1, '2020-10-22 01:14:53', '2020-10-22 01:14:53'),
(19, 'Blog', 'blog', 'presets.default.', '[\"faq\",\"subscribe\"]', 0, '2023-03-27 05:49:41', '2023-04-01 04:02:58'),
(20, 'About', 'about', 'presets.default.', '[\"about\",\"faq\",\"subscribe\"]', 0, '2023-03-30 07:34:41', '2023-04-01 04:03:59'),
(21, 'Contact', 'contact', 'presets.default.', NULL, 0, '2023-04-01 01:09:56', '2023-04-01 01:10:16'),
(22, 'Home', '/', 'presets.themesTwo.', '[\"about\",\"service\",\"choose_us\",\"counter\",\"plan\",\"portfolio\",\"team_member\",\"testimonial\",\"subscribe\",\"faq\",\"blog\",\"brand\"]', 1, '2023-04-06 02:44:34', '2023-04-08 06:24:17'),
(23, 'Plan', 'plan', 'presets.themesTwo.', '[\"service\"]', 0, '2023-04-08 01:25:57', '2023-04-08 01:26:15'),
(24, 'Services', 'services', 'presets.themesTwo.', '[\"plan\"]', 0, '2023-04-08 01:28:49', '2023-04-08 01:31:28'),
(25, 'Blog', 'blog', 'presets.themesTwo.', NULL, 0, '2023-04-08 01:29:05', '2023-04-08 01:29:05'),
(26, 'About', 'about', 'presets.themesTwo.', '[\"about\",\"faq\",\"subscribe\"]', 0, '2023-04-08 01:29:15', '2023-04-08 01:34:45'),
(27, 'Contact', 'contact', 'presets.themesTwo.', NULL, 0, '2023-04-08 01:29:25', '2023-04-08 01:29:25'),
(28, 'Home', '/', 'presets.themesThree.', '[\"about\",\"service\",\"choose_us\",\"counter\",\"plan\",\"portfolio\",\"subscribe\",\"team_member\",\"testimonial\",\"faq\",\"blog\",\"brand\"]', 1, '2023-04-11 01:52:59', '2023-04-11 04:37:58'),
(31, 'Yangiliklar', 'blog', 'presets.themesThree.', NULL, 0, '2023-04-11 04:13:15', '2023-10-05 13:42:39'),
(32, 'Biz Haqimizda', 'about', 'presets.themesThree.', '[\"about\",\"faq\",\"subscribe\"]', 0, '2023-04-11 04:13:27', '2023-10-05 13:43:16'),
(33, 'Aloqa', 'contact', 'presets.themesThree.', NULL, 0, '2023-04-11 04:13:44', '2023-10-05 13:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` decimal(28,8) NOT NULL,
  `content` text,
  `type` int(11) NOT NULL COMMENT '0= month, 1= year',
  `month` varchar(40) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `price` decimal(28,8) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'uxtemurmalik@gmail.com', '2023-10-05 13:24:33', '2023-10-05 13:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `amount` decimal(28,8) DEFAULT '0.00000000',
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT '0',
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `post_balance` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `trx_type` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `balance` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: banned, 1: active',
  `kyc_data` text COLLATE utf8mb4_unicode_ci,
  `kv` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: KYC Unverified, 2: KYC pending, 1: KYC verified',
  `ev` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: mobile unverified, 1: mobile verified',
  `reg_step` tinyint(1) NOT NULL DEFAULT '0',
  `ver_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `city`, `country`, `country_code`, `longitude`, `latitude`, `browser`, `os`, `created_at`, `updated_at`) VALUES
(1, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-22 04:09:56', '2023-03-22 04:09:56'),
(2, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-22 07:35:33', '2023-03-22 07:35:33'),
(3, 33, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 'Chrome', 'Windows 10', '2023-03-29 06:07:49', '2023-03-29 06:07:49'),
(4, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-29 06:29:39', '2023-03-29 06:29:39'),
(5, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-29 07:16:59', '2023-03-29 07:16:59'),
(6, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-29 07:17:14', '2023-03-29 07:17:14'),
(7, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-29 07:55:08', '2023-03-29 07:55:08'),
(8, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-30 01:02:54', '2023-03-30 01:02:54'),
(9, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-30 02:05:40', '2023-03-30 02:05:40'),
(10, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-30 04:45:33', '2023-03-30 04:45:33'),
(11, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-30 05:48:04', '2023-03-30 05:48:04'),
(12, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-03-30 06:36:31', '2023-03-30 06:36:31'),
(13, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-01 01:49:10', '2023-04-01 01:49:10'),
(14, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-01 03:43:19', '2023-04-01 03:43:19'),
(15, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-01 03:57:49', '2023-04-01 03:57:49'),
(16, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-01 05:55:34', '2023-04-01 05:55:34'),
(17, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-01 07:33:25', '2023-04-01 07:33:25'),
(18, 34, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 'Chrome', 'Windows 10', '2023-04-02 00:49:40', '2023-04-02 00:49:40'),
(19, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-02 00:54:43', '2023-04-02 00:54:43'),
(20, 34, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-02 01:13:20', '2023-04-02 01:13:20'),
(21, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-02 01:28:39', '2023-04-02 01:28:39'),
(22, 33, '127.0.0.1', '', '', '', '', '', 'Firefox', 'Windows 10', '2023-04-02 01:35:20', '2023-04-02 01:35:20'),
(23, 34, '127.0.0.1', '', '', '', '', '', 'Firefox', 'Windows 10', '2023-04-02 01:56:05', '2023-04-02 01:56:05'),
(24, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-02 03:20:05', '2023-04-02 03:20:05'),
(25, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-02 06:20:20', '2023-04-02 06:20:20'),
(26, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-03 01:16:08', '2023-04-03 01:16:08'),
(27, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-03 02:51:38', '2023-04-03 02:51:38'),
(28, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-06 06:12:38', '2023-04-06 06:12:38'),
(29, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-06 06:38:41', '2023-04-06 06:38:41'),
(30, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-08 01:18:38', '2023-04-08 01:18:38'),
(31, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-08 01:54:36', '2023-04-08 01:54:36'),
(32, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-08 02:08:28', '2023-04-08 02:08:28'),
(33, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-08 03:09:29', '2023-04-08 03:09:29'),
(34, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-09 01:03:19', '2023-04-09 01:03:19'),
(35, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-11 04:06:25', '2023-04-11 04:06:25'),
(36, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-11 05:03:09', '2023-04-11 05:03:09'),
(37, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-11 07:24:00', '2023-04-11 07:24:00'),
(38, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-11 07:27:07', '2023-04-11 07:27:07'),
(39, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-11 07:28:58', '2023-04-11 07:28:58'),
(40, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-12 06:29:20', '2023-04-12 06:29:20'),
(41, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-12 07:51:55', '2023-04-12 07:51:55'),
(42, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-13 01:48:19', '2023-04-13 01:48:19'),
(43, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-13 06:30:31', '2023-04-13 06:30:31'),
(44, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-13 06:37:18', '2023-04-13 06:37:18'),
(45, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-13 06:37:54', '2023-04-13 06:37:54'),
(46, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-13 06:41:23', '2023-04-13 06:41:23'),
(47, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-13 07:19:41', '2023-04-13 07:19:41'),
(48, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-15 03:18:24', '2023-04-15 03:18:24'),
(49, 33, '127.0.0.1', '', '', '', '', '', 'Firefox', 'Windows 10', '2023-04-15 04:46:30', '2023-04-15 04:46:30'),
(50, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-15 06:05:34', '2023-04-15 06:05:34'),
(51, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-15 08:08:39', '2023-04-15 08:08:39'),
(52, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-16 01:32:15', '2023-04-16 01:32:15'),
(53, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-16 07:07:41', '2023-04-16 07:07:41'),
(54, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-16 07:12:49', '2023-04-16 07:12:49'),
(55, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-16 07:15:23', '2023-04-16 07:15:23'),
(56, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-17 02:01:54', '2023-04-17 02:01:54'),
(57, 33, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-04-21 12:09:25', '2023-04-21 12:09:25'),
(58, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-05-24 06:19:11', '2023-05-24 06:19:11'),
(59, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-05-24 07:33:51', '2023-05-24 07:33:51'),
(60, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-05-24 08:44:30', '2023-05-24 08:44:30'),
(61, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-05-24 09:08:56', '2023-05-24 09:08:56'),
(62, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-05-24 09:58:39', '2023-05-24 09:58:39'),
(63, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-26 08:09:45', '2023-07-26 08:09:45'),
(64, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-26 08:10:32', '2023-07-26 08:10:32'),
(65, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-26 08:55:29', '2023-07-26 08:55:29'),
(66, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-26 09:02:25', '2023-07-26 09:02:25'),
(67, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-27 06:15:53', '2023-07-27 06:15:53'),
(68, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-27 06:28:00', '2023-07-27 06:28:00'),
(69, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-27 06:36:38', '2023-07-27 06:36:38'),
(70, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-27 07:20:39', '2023-07-27 07:20:39'),
(71, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-27 08:23:09', '2023-07-27 08:23:09'),
(72, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-27 08:23:34', '2023-07-27 08:23:34'),
(73, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-07-27 08:37:12', '2023-07-27 08:37:12'),
(74, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-08-27 08:51:42', '2023-08-27 08:51:42'),
(75, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-08-28 02:12:09', '2023-08-28 02:12:09'),
(76, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-08-28 02:29:52', '2023-08-28 02:29:52'),
(77, 32, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-08-28 03:28:23', '2023-08-28 03:28:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
