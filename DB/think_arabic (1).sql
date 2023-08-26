-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 07:18 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `think_arabic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `employee_id`, `username`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `profile_image`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', NULL, NULL, 'admin@gmail.com', NULL, '$2y$10$e5D4Q5L954x3DeH0.CHqtu0AVXdOaYCtoHkTYBqgjRkxgn.Dm1AI2', NULL, '0', '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Break your communication barriers - Deepika Ganesan', 'Have you ever played the game of dumb charades? It\'s a game where one member in the group would show actions and others in the team should guess the word. If you had played dumb charades, you would know that sharing an idea that\'s clear in your head but no one has any clue about it is the toughest task. You do your best to bring out the right answer, yet your actions are misunderstood and your team ends up losing the game. Who is to be blamed here?\r\nSimilarly in professional life sometimes we face the challenge of getting the message right across the departments. What could make our communication clear and effective?\r\nThere are a few points that you could keep in mind to keep the organizational communication smooth and avoid misunderstanding.\r\nStyle of instructions\r\nEach one of us has our own style of communication. When you want to lead a team and give them a clear purpose, try understanding what\'s their style of communication. Some of them could be more intuitive, all you need to do is to paint a picture of what\'s expected out of them. And, some of them might be more detail-oriented. Only when you share enough details, you would get the work done. When it comes to our expertise, we can act on our own and decide things accordingly. When something is out of our scope, we would need more help and more details to accomplish the task.\r\nBefore giving away your instructions on projects, customer interactions, and vendor co-ordinations, think about the style of communication you need to use. Make it clear and concise. People would really appreciate it when you speak their language. At the end of the day, as a leader, you shall earn people\'s trust when you inspire them\r\n2. Complete the information\r\nInstant messaging and the internet have buried our planning skills in organizational communication. When I started my career as a trainer, companies used to send us a piece of complete information on the schedule, venue, and everything related. However, nowadays, we receive the location only in the mornings. Google maps aid us in a great way, and we don\'t look at the bright side of it.\r\nWhen you organize meetings, send out emails, discuss projects, and update reports, remember to check if your communication contains all the necessary information. Your information is going to support someone in taking decisions, finalizing the project, and comparing the competitors. So stay one step ahead, put yourself in the shoes of the listener, and be prepared with all the details you may have to provide.\r\nOrganizations lose more than 20% of their time due to incomplete information. Be a proactive leader and show your team that planned communication can help you avoid delays in decision-making.\r\n3. Avoid assumptions\r\n\"You had time to go for a coffee break, but you couldn\'t spare 5 minutes to send the mail\", said the manager. There is a lot of assumption here.\r\nFirst, he thinks that work is not a priority for the employee. Second, he thinks that coffee breaks are not important, and third, he thinks that his employee is not sincere. This tone of the manager would put off anyone and even if they would want to support, they will turn their back.\r\nHave you ever accused people instead of clarifying? If you have, it\'s high time that you introspect those situations and decide for yourself.\r\nWhat if you ask them to explain instead of assuming? Say, \"Rahul, could you explain why there is a delay in the dispatch\" rather than asking \"Rahul, what were you doing till the last minute? Can\'t you organize things well ahead of time?\". In both cases, you are trying to identify the cause of the delay. But the way you communicate makes a lot of difference.\r\nSo, ask questions, clarify doubts, and avoid assuming things. This is the biggest barrier of all. If you could master this, you will surely build a legacy of your own.\r\n\r\nNote: We are all in the learning process day in and day out. I would appreciate your comments on these articles to help me write better and more meaningful articles. #leadershiplessons #professionalcommunication #communicationhackers #confidencebuilding #corporatecommunication', '858589700.jpg', '0', '2023-03-09 04:27:02', '2023-03-13 05:46:01'),
(4, '5 elements of effective email communication', 'Is email communication a difficult task for you? Do you keep revisiting the typed content and getting approvals? Do you want to cut the clutter and keep it simple yet effective?\r\nHere are a few recommendations to help your mail communication be crisp and compelling.\r\nThink of the bigger picture\r\nComponent your mail into small parts\r\nAdd necessary information\r\nInclude pleasantries and better language\r\nFinish it with a Call for action\r\nThink of the bigger picture\r\nEvery mail communication has an objective. It could be informing, educating, marketing, co-ordinating, and many more. First, fix your purpose for the particular mail and start weaving the mail around your objective. For instance, if your purpose is to educate your customers about your new product launch, you will have to get their attention first, make them learn more about the new product, and eventually enroll in your promotional effort. So get it started by appreciating their loyalty so far and keep moving ahead with things.\r\nBreaking it into small parts\r\nYou may need to give more information in the mail and there are chances people might miss important things when they spend too much time reading. So, break your mail into small parts. Each part focuses on the important point and concludes it.\r\nHaving all the information in a single para not only distracts the readers but makes it difficult to remember.\r\nAdd necessary information\r\nPeople need the information to act upon your emails. Have a checklist of all the information you have to provide and add them all in order. After the composition of your emails, check if you have given everything that the other person needs to take a decision.\r\nSay, you are announcing an office meeting. You may need to inform the context, time, date, venue, people responsible, and if they have to be prepared on something in your mail. When you do the preparation before sending such important emails, you can avoid multiple loop emails and save everyones\' time.\r\nMake it sound nicer\r\nThe best part about writing emails is that you have the luxury of using google, Grammarly, and other tools to enhance your writing. An email with appropriate words and a concise message builds a good impression. Use the tools effectively, and find words that could convey the meaning in a simpler way.\r\nFor example - Instead of typing \"I am sorry that I sent the document by mistake to you. Ignore the mail\", you could write \"Document was sent erroneously to you, kindly ignore\". Sometimes the better choice of words brings more clarity.\r\nCall for Action\r\nWhat do you want your readers to do after reading your mail? Do you want them to subscribe to the newsletter or do you want them to respond to the meeting announcement? or do you want them to respond to your query?\r\nWhatever is your objective, it should reflect at the end of every mail. If you have sent an invoice to your client and left it there you may not know when your payment would be through. Only when you mention \"kindly acknowledge the invoice and inform us of possible date of the first installment\", your reader is pushed to do something about your emails.\r\nMention your call for action clearly at the end of the emails to get the desired response.\r\n\"Concise, clear, and well-constructed emails\" elevates your professional communication and help you win over people.', '447746070.jpg', '0', '2023-03-13 05:49:36', '2023-03-13 05:49:36'),
(5, 'Tales for Teachers', '\"Everyone is a teacher and a student at some point in their life. A teacher\'s word is verses from the bible for the children. Some of us might have argued with our parents that the teacher was right and our parents were wrong. Here are some tales from heartwarming teachers and lovely students from different walks of life. \r\n\r\n1. Talent springs from anywhere\r\n\r\nA friend of mine was a trainer for more than a decade and she shared some of her experiences now and then. This incident piqued my interest and stays in my memory. There was a student from an engineering college down south. He was excellent in his technical skills. However, he couldn\'t speak even a single sentence in English. After her training hours, she would talk to him over the phone and give him exercises to practice. He was a diligent student, a first-generation graduate who was hell-bent on securing a job at an MNC. With his sheer determination and her support, he got placed in one of the reputed MNCs. They still keep in touch and an extra nudge from this teacher has put his entire family in fourth gear.\r\n\r\n2. Light at the end of a dark tunnel \r\n\r\nEmpathy is second nature to most teachers. This is a story of a fragile child who was about to break. Rohit was a 10 years old boy who used to be quiet and reserved all the time. One day Ms. Bubbly asked him if he is okay. They had a short little break to discuss as the class was out for sports practice. Slowly and steadily she was trying to understand his problem. After a few days, finally, he came to her and started telling her his biggest problem.\"The divorce between his parents\". It has shattered him completely. He didn\'t want to go to school or talk to anyone, he felt unloved and everything was looking bad. He told Ms. Bubbly that he has plans to elope. He would go to a place where his parents can\'t find him. The teacher could feel his pain. She became his second mother and nurtured him. He is now in his college, doing extremely well as an individual. His parents\' broken marriage didn\'t ruin him. There was a hand to hold on and his life changed forever. \r\n\r\n\r\n3. A disciple to respect  \r\n\r\nMy first boss used to always mention that I should overtake her at some point and only then she has been an excellent boss. Not many of us feel this way. Some of my teachers got angry when the students asked smarter questions. Although children were curious about different things, only a teacher who challenges himself constantly can inspire the kids. Here is a story of a teacher who had the courage to push her limits. It was a maths period for teen kids. He had more than 10 years of experience in teaching maths. Someone who could speak comfortably in English but doesn\'t speak without errors. Some kids who wanted to intimidate him made fun of his grammar mistakes. He felt humiliated in front of the whole class. He wouldn\'t answer them or punish them as there was something else he has to do. He started studying hard, he told himself that I would speak better than the English teacher at school. He worked hard for 6 months and his students felt the difference. He showed what he could do with his actions.  He took the opportunity to work on his weakness and became an inspiration for the whole school. No one could tell him \" I can\'t do this\" or \"I am weak in this subject\". \r\n\r\nWhat\'s your heartwarming story?', '1008980784.jpg', '0', '2023-03-13 05:52:12', '2023-03-13 05:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `book_your_slots`
--

CREATE TABLE `book_your_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers_enquiries`
--

CREATE TABLE `careers_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_enquiries`
--

INSERT INTO `careers_enquiries` (`id`, `date`, `first_name`, `last_name`, `mobile`, `email`, `subject`, `message`, `upload_cv`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-04-19', 'Pooja', 'Mehta', '7829904125', 'poojabhavin@gmail.com', 'English', 'Hi, \r\n\r\nI\'m looking forward to exploring synergies with your org that\'s on a journey of shaping learners\' lives.', '1302882095.docx', '0', '2023-04-19 01:12:42', '2023-04-19 01:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Webinar', '0', '2022-12-28 16:46:59', '2022-12-29 11:03:24'),
(2, 'Group Coaching', '0', '2022-12-29 10:22:09', '2022-12-29 11:03:38'),
(3, 'Personal Coaching', '0', '2022-12-29 10:22:21', '2022-12-29 11:03:51'),
(4, 'English coaching', '0', '2022-12-30 11:08:30', '2022-12-30 11:09:09'),
(5, 'Munchkins', '1', '2023-01-03 12:59:16', '2023-01-03 13:00:25'),
(6, 'Tweens', '1', '2023-01-03 12:59:46', '2023-01-03 13:00:31'),
(7, 'maths', '0', '2023-01-22 13:50:01', '2023-01-22 13:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `date`, `certificate_type`, `certificate_name`, `tuitor_id`, `student_id`, `course_id`, `certificate_file`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '0', 'Munchkin', NULL, '1', NULL, '14556668411677407438.png', '0', '2023-02-26 10:30:39', '2023-02-26 10:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `date`, `user_type`, `first_name`, `last_name`, `mobile`, `email`, `subject`, `message`, `upload_cv`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-02-28', 'Professionals', 'Aravind', 'Kumar', '1234567890', 'aravind@lrbinfotech.com', 'test message', 'test message', NULL, '0', '2023-02-28 07:50:14', '2023-02-28 07:50:14'),
(2, '2023-03-10', 'Professionals', 'Irene', 'Zissel', '07539997536', 'siyacj.0927@gmail.com', 'uu', 'hhh', NULL, '0', '2023-03-10 06:41:16', '2023-03-10 06:41:16'),
(3, '2023-03-13', 'Professionals', 'Jai', 'K', '7708883344', 'jk@practills.com', 'Time', 'fsdass', NULL, '0', '2023-03-13 06:28:06', '2023-03-13 06:28:06'),
(4, '2023-03-13', 'Professionals', 'j', 'k', '7708883344', 'jk@practills.com', 'Time', 'sdasdsd', '1117456232.png', '0', '2023-03-13 06:28:45', '2023-03-13 06:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brochure_pdf` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `date`, `category`, `course_name`, `description`, `course_type`, `price`, `image`, `brochure_pdf`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '0', 'Learn Arabic for non-Arabic speaking children course', '<p>Learning Arabic can be a daunting task, especially for non-Arabic speaking children. But there are now several programs and resources available to make it fun and accessible to all. This Learn Arabic for non-Arabic speaking children course offered by Elmadrasah.com is a comprehensive and engaging learn arabic language online course designed to help children learn the Arabic language in a fun and interactive way. This course is perfect for parents who want to empower their children with the Arabic language from home or for schools seeking to teach Arabic to their students.</p>\r\n\r\n<p><strong>Advantages of Learn Arabic for non-Arabic speaking children course</strong></p>\r\n\r\n<ul>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-1.png\" />\r\n	<h3>100% online course</h3>\r\n\r\n	<p>Learning Arabic advanced level online course is Interactive one-on-one sessions anywhere, anytime.</p>\r\n	</li>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-16.png\" />\r\n	<h3>Course for all ages</h3>\r\n\r\n	<p>The course is available for all ages, children and adults.</p>\r\n	</li>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-iconN-1.png\" />\r\n	<h3>Flexible Time</h3>\r\n\r\n	<p>From us gives you the possibility to choose the appropriate time in the morning or evening.</p>\r\n	</li>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-4.png\" />\r\n	<h3>Experience tutors</h3>\r\n\r\n	<p>Offered by a group of tutors who have experience and skills to communicate with students who do not speak Arabic.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><small>Once you register, one of our representatives will contact you to set the appropriate study&nbsp;schedule for you with appointments (morning / evening) and follow-up 24/7</small></p>', 'One To One Classes', '100', '9393917881692777397.png', '1762543308.pdf', '0', '2023-08-23 07:56:37', '2023-08-23 07:56:37'),
(2, NULL, '2', 'Online chemistry course', '<h2>Online chemistry course</h2>\r\n\r\n<p>Chemistry is one of the important subjects that secondary school students study according to the educational curricula in the UAE. Elmadrasah.com provides online chemistry courses according to the curricula of education in the UAE for secondary grades</p>\r\n\r\n<p><strong>Advantages of an online chemistry course with Elmadrasah.com</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-1.png\" />\r\n	<p>&nbsp;</p>\r\n\r\n	<h3>Educational materials</h3>\r\n\r\n	<p>Providing all educational materials and explanations necessary to understand chemistry</p>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-2.png\" />\r\n	<p>&nbsp;</p>\r\n\r\n	<h3>Continuous training</h3>\r\n\r\n	<p>Samples of tests and exercises on chemistry after completing the lessons</p>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-3.png\" />\r\n	<p>&nbsp;</p>\r\n\r\n	<h3>Customized for you</h3>\r\n\r\n	<p>Periodic follow-up of the student&rsquo;s performance &ndash; and informing the guardian of the development of the children&rsquo;s level</p>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-4.png\" />\r\n	<p>&nbsp;</p>\r\n\r\n	<h3>Experienced teacher</h3>\r\n\r\n	<p>Teachers who are experienced in teaching chemistry, providing modern educational methods that suit the needs of the student</p>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li><img alt=\"icon\" src=\"https://en.elmadrasah.com/wp-content/uploads/2022/10/course-icon-5.png\" />\r\n	<p>&nbsp;</p>\r\n\r\n	<h3>Online individual courses</h3>\r\n\r\n	<p>Online training courses through Zoom with Flexibility of appointments (morning /evening) suits the guardian and the student</p>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><small>Once you register, one of our representatives will contact you to set the appropriate study&nbsp;schedule for you with appointments (morning / evening) and follow-up 24/7</small></p>', 'One To One Classes', '500', '20356698091692782775.png', '683947721.pdf', '0', '2023-08-23 09:26:15', '2023-08-23 09:26:15'),
(3, NULL, '1', 'Online Quran Classes', '<h2><strong>Learning Quran Online</strong></h2>\r\n\r\n<p>Online Quran classes bring a host of benefits to students looking to<a href=\"https://en.elmadrasah.com/en/product/new-muslims-course/\">&nbsp;learn the Quran</a>&nbsp;in a more convenient and accessible manner.&nbsp;</p>\r\n\r\n<h4><strong>Flexible time</strong></h4>\r\n\r\n<p>One of the greatest advantages of online Learn Quran with ease is flexible timing, which is particularly beneficial for busy adults who may not have the time to attend traditional classes.&nbsp;</p>\r\n\r\n<h3><strong>Online Quran classes offer</strong></h3>\r\n\r\n<p>This approach to&nbsp;<a href=\"https://en.elmadrasah.com/en/why-elmadrasah-is-the-best-quranic-institute/\">Quranic education</a>&nbsp;offers:</p>\r\n\r\n<h3><strong>Holistic approach to Quranic education</strong></h3>\r\n\r\n<p>This holistic approach enables students not only to develop their&nbsp;<a href=\"https://en.elmadrasah.com/en/product/quran-memorization-course/\">Quranic knowledge</a>&nbsp;but also to grow spiritually and emotionally. By providing a comprehensive approach to Quranic education, online Quran classes have revolutionized the way people learn about Islam, making it accessible to anyone regardless of their location or schedule.</p>\r\n\r\n<h3><strong>learn quran online with tajweed, and memorization&nbsp;</strong></h3>\r\n\r\n<p>One of the great advantages of online Quran classes is the ability for students to simultaneously Arabic Learn Quran with ease,&nbsp;<a href=\"https://en.elmadrasah.com/en/learn-quranic-arabic-online/\">learn quran online</a>&nbsp;with tajweed, and memorization.&nbsp;</p>\r\n\r\n<p>This comprehensive approach to Quranic education ensures that students not only understand the meaning of the Quran, but also are able to recite it properly and commit it to memory.&nbsp;</p>\r\n\r\n<p>In addition, online classes provide access to a variety of resources, such as videos and audio recordings, to enhance the learning experience. This all-in-one approach to Quranic education is a key factor in the increasing popularity of&nbsp;<a href=\"https://en.elmadrasah.com/en/product/learn-arabic-for-non-arabic-speaking-children-course/\">learn arabic</a>&nbsp;and<a href=\"https://en.elmadrasah.com/en/product/quran-tajweed-course/\">&nbsp;quran online classes</a>&nbsp;among Muslims worldwide.</p>', 'One To One Classes', '499', '14395232581692783009.png', NULL, '0', '2023-08-23 09:30:09', '2023-08-23 09:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `course_descriptions`
--

CREATE TABLE `course_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_descriptions`
--

INSERT INTO `course_descriptions` (`id`, `course_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Comprehend the significance of Arabic learning.', '0', '2023-08-23 07:56:37', '2023-08-23 07:56:37'),
(2, '1', 'Well-designed lessons, children can quickly develop a keen ear for the Arabic language, and proficiency in reading, writing, and speaking.', '0', '2023-08-23 07:56:37', '2023-08-23 07:56:37'),
(3, '1', 'Correct pronunciation of  Arabic letters.', '0', '2023-08-23 07:56:37', '2023-08-23 07:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title_1`, `title_2`, `title_3`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Orators Club – Every Thursday (excluding national holidays)', 'Event Details – Rs 500/month , 8pm to 9pm, Every Thursday, Speaking', 'Event Description', 'Orators club is an online event for college students and working professionals to sharpen their communication and public speaking skills. Practice is the key for making your communication skills better. We offer the platform to practice and connect with people from various industries so you can be confident about your communication.\r\n\r\nEvent Purpose- Building confidence, Improve clarity in speech , Ability to present without fear, Networking , and Consistent learning\r\n\r\nEvent Location – Zoom meetings', '0', '2023-03-09 04:37:59', '2023-03-09 04:37:59'),
(2, 'Creative Writing Workshop – Every Sunday (excluding national holidays)', 'Event Details – Rs 199/ participant, 10.30am to 12noon, Every Sunday, Writing', 'Event Description – Existing content is good. Please retain the same', 'Event Purpose – Create interest in writing, Score good marks in essay writing, Out of box thinking , Express thoughts clearly, and Write original content\r\n\r\nEvent Location – Zoom meetings', '0', '2023-03-09 04:38:29', '2023-03-09 04:38:29'),
(3, 'Email Writing for Professionals', NULL, 'Event Details – Price on request, 10am to 5pm, weekdays, Business Writing', 'Event Description - Existing content is good. Please retain the same\r\n\r\nEvent Purpose - Existing content is good. Please retain the same\r\n\r\nEvent Location - Zoom meetings', '0', '2023-03-09 04:38:51', '2023-03-09 04:38:51'),
(4, 'Book Mania – 30th April 2022', 'Event Details – Rs 250/ participant, 11am to 12 noon, 30th April2022, Competition', 'Event Description', 'Book Mania is a flagship event of Practills. It is conducted to improve the interest in reading among children. There are 3 levels to this event. The First level would happen during April\r\n\r\nEvent Purpose – Increase fluency spellcheck.. Retain others\r\nEvent Location – Online', '0', '2023-03-09 04:39:20', '2023-03-09 04:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchise_enquiries`
--

CREATE TABLE `franchise_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_reviews`
--

CREATE TABLE `google_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_reviews`
--

INSERT INTO `google_reviews` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Varsha Chenthilkumar', 'I am Varsha from KikaniMatric.hr.sec.school. Speakers lab is a magical word that changed my entire speaking skills. It was a journey of self-improvement and discovery. The fear that once kept me away from countless leadership and educational opportunities that I now pursue with every chance I am given. In simple words,  Practills Learning had made my life a lot better.', NULL, '0', '2023-03-09 04:33:06', '2023-03-09 04:33:06'),
(2, 'Siddharth', 'I am in Class XII and Practills Learning’s classes gave me an idea to engage in real life conversations. I was able to mingle with my football team members using the techniques I learnt from my public speaking sessions. Moreover, I could speak without fillers during any school presentation', NULL, '0', '2023-03-09 04:33:24', '2023-03-09 04:33:24'),
(3, 'Praveena Rajendran', 'This Class helped lot for my kid. She is 4.5 years old, now she able to understand and try to communicate in english. Most interesting part was she enjoyed the class.', NULL, '0', '2023-03-09 04:33:46', '2023-03-09 04:33:46'),
(4, 'Suji Kulandaiappan', 'Have opted with online classes for my kid of 6 yrs. Bharathi Ma’am does a great job in making the kids to actively converse along with creating a great space for them to speak and engage in the language. Before finding Practills , I have tried with many other options but none was as engaging and happier for the kids.', NULL, '0', '2023-03-09 04:34:05', '2023-03-09 04:34:05'),
(5, 'Ms. Latha – Principal – SBKV matric school, Coimbatore', 'We are working with this team for the last 5 years. I have found them to be dedicated and impressive. Most of our children were finding it difficult to speak confidently. The Public speaking and communication sessions helped them to build their confidence and now they host almost every other event at our school.', NULL, '0', '2023-03-09 04:34:24', '2023-03-09 04:34:24'),
(6, 'Mr. Kathiravan – Correspondent, VVMS Cbse School, Coimbatore', 'Our school belongs to a semi-urban geographical location and some of our children don’t have anyone at home to speak in English. The sessions conducted by Practills has helped them to improve their English communication as well as Public Speaking Skills. Our children are able to compete with urban children and win accolades due to the practice in Practills classes.', NULL, '0', '2023-03-09 04:34:46', '2023-03-09 04:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `level_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Emergent', '10', '0', NULL, '2023-02-28 14:45:21'),
(2, 'Conversationalist', '15', '0', '2022-12-29 10:46:43', '2023-02-28 14:48:13'),
(3, 'Eloquent', '20', '0', '2022-12-29 10:46:55', '2023-02-28 14:49:13'),
(4, 'Speak for Success', '200', '0', '2022-12-30 11:02:16', '2023-02-28 14:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `listenings`
--

CREATE TABLE `listenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listenings`
--

INSERT INTO `listenings` (`id`, `date`, `tuitor_id`, `student_ids`, `level`, `title`, `description`, `audio`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '1', 'An email: A famous person project', 'Read the email from your English friend, Robin.\r\nI’m doing a project on famous people. Tell me about a famous person you like. What is this person’s name? Why is this person famous? What do you like about this person?\r\nWrite an email to Robin and answer the questions.\r\nWrite your email in 25 words or more.', '15998033511673936737.mp3', '1', '2023-01-17 06:25:37', '2023-03-08 03:02:44'),
(2, NULL, NULL, NULL, '1', 'Audio Book', 'Answer the question by listening', '3040470791678245236.mp3', '0', '2023-03-08 03:13:56', '2023-03-08 03:13:56'),
(3, NULL, NULL, NULL, '2', 'Advanced Dictation', 'Figure of speech fast - Adverse', '1974346681678245576.mp3', '0', '2023-03-08 03:19:36', '2023-03-08 03:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `listening_exams`
--

CREATE TABLE `listening_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_corrrect_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_wrong_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listening_exam_answers`
--

CREATE TABLE `listening_exam_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listening_exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listening_question_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listening_questions`
--

CREATE TABLE `listening_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listening_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listening_questions`
--

INSERT INTO `listening_questions` (`id`, `listening_id`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Bob : “lets go to the canteen!’ Lina : “…….. I am hungry”', 'It’s a good idea', 'I hate it', 'It’s not good idea', 'I disagree', 'b', '0', '2023-01-17 06:25:37', '2023-01-17 06:25:37'),
(2, '1', '  Cow and goat are ……. But tigers and lion are carnivorous', ' Reptiles', 'Microbes', 'Herbivorous', ' Viruses', 'b', '0', '2023-01-17 06:25:37', '2023-01-17 06:25:37'),
(3, '1', '  Cow and goat are ……. But tigers and lion are carnivorous', ' Reptiles', 'Microbes', 'Herbivorous', ' Viruses', NULL, '0', '2023-01-17 06:25:37', '2023-01-17 06:25:37'),
(4, '2', 'who takes the stage ', 'marine ', 'madlin', 'marie', 'mariya', 'd', '0', '2023-03-08 03:13:57', '2023-03-08 03:13:57'),
(5, '2', 'whats the late husband name ', 'john ', 'raphine', 'ralph', 'randalop', 'c', '0', '2023-03-08 03:13:57', '2023-03-08 03:13:57'),
(6, '2', 'what the mentioned age in the auido book?', '87', '88', '89', '86', 'c', '0', '2023-03-08 03:13:57', '2023-03-08 03:13:57'),
(7, '2', 'how many years was the support lasted?', '9', '10', '11', '89', 'b', '0', '2023-03-08 03:13:57', '2023-03-08 03:13:57'),
(8, '2', 'why should everyone would stand up?', 'to appreciate ', 'to clap ', 'to Scold', 'To mock', 'a', '0', '2023-03-08 03:13:57', '2023-03-08 03:13:57'),
(9, '3', 'whats rights are we taking about in this audio book?', 'men ', 'child', 'kids', 'womens', 'd', '0', '2023-03-08 03:19:36', '2023-03-08 03:19:36'),
(10, '3', 'what kind of intelect the audio book mentions in figure of speach', 'kind ', 'admirable', 'admire', 'standard ', 'b', '0', '2023-03-08 03:19:36', '2023-03-08 03:19:36'),
(11, '3', 'who has mentioned about the figure of rights ', 'women', 'goverment ', 'admirable', 'city', 'b', '0', '2023-03-08 03:19:36', '2023-03-08 03:19:36'),
(12, '3', 'how many years the audio book mentions for a life ', '22', '23', '25', '24', 'c', '0', '2023-03-08 03:19:36', '2023-03-08 03:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `listening_students`
--

CREATE TABLE `listening_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listening_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_11_30_084810_create_admins_table', 1),
(5, '2022_11_30_084840_create_staff_table', 1),
(6, '2022_12_28_163329_create_categories_table', 2),
(7, '2022_12_28_165012_create_writings_table', 3),
(8, '2022_12_28_175230_create_writing_images_table', 4),
(9, '2022_12_28_185715_create_readings_table', 5),
(10, '2022_12_28_185743_create_reading_questions_table', 5),
(11, '2022_12_28_201153_create_listenings_table', 6),
(12, '2022_12_28_201209_create_listening_questions_table', 6),
(13, '2022_12_29_060943_create_courses_table', 7),
(14, '2022_12_29_103205_create_levels_table', 8),
(15, '2023_02_24_051155_create_packages_table', 9),
(16, '2023_02_24_051453_create_package_descriptions_table', 9),
(17, '2023_02_25_055545_create_used_packages_table', 10),
(18, '2023_02_25_071610_create_sessions_table', 11),
(19, '2023_02_26_093437_create_certificates_table', 12),
(20, '2023_02_26_132344_create_session_students_table', 13),
(21, '2023_02_28_055403_create_settings_table', 14),
(22, '2023_02_28_111640_create_student_chats_table', 15),
(23, '2023_02_28_131026_create_contact_enquiries_table', 16),
(24, '2023_03_08_022755_create_reading_exams_table', 17),
(25, '2023_03_08_022810_create_reading_exam_answers_table', 17),
(26, '2023_03_08_051927_create_listening_exams_table', 18),
(27, '2023_03_08_051932_create_listening_exam_answers_table', 18),
(28, '2023_03_08_140431_create_writing_exams_table', 19),
(29, '2023_03_08_140441_create_writing_exam_answers_table', 19),
(30, '2023_03_09_032646_create_blogs_table', 20),
(31, '2023_03_09_032854_create_google_reviews_table', 20),
(32, '2023_03_09_032938_create_who_we_ares_table', 20),
(33, '2023_03_09_033017_create_events_table', 20),
(34, '2023_03_09_051949_create_home_pages_table', 21),
(35, '2023_03_09_052005_create_about_pages_table', 21),
(36, '2023_03_09_073123_create_professionals_pages_table', 22),
(37, '2023_03_09_073138_create_corporates_pages_table', 22),
(38, '2023_03_09_090906_create_children_pages_table', 23),
(39, '2023_03_09_092256_create_school_pages_table', 24),
(40, '2023_03_13_123715_create_reading_students_table', 25),
(41, '2023_03_13_123819_create_writing_students_table', 25),
(42, '2023_03_13_123850_create_listening_students_table', 25),
(43, '2023_03_16_124205_create_careers_enquiries_table', 26),
(44, '2023_04_29_064208_create_franchise_enquiries_table', 27),
(45, '2023_04_29_181036_create_speakings_table', 28),
(46, '2023_04_30_143016_create_speaking_exams_table', 29),
(47, '2023_04_30_143110_create_speaking_exam_answers_table', 29),
(48, '2023_05_02_152548_create_speaking_students_table', 30),
(49, '2023_06_12_072659_create_session_datas_table', 31),
(50, '2023_07_06_055350_create_enquiries_table', 32),
(51, '2023_08_22_041807_create_courses_table', 33),
(52, '2023_08_22_041816_create_course_descriptions_table', 33),
(53, '2023_08_22_041825_create_used_courses_table', 33),
(55, '2023_08_23_080550_create_orders_table', 34),
(56, '2023_08_24_032955_create_book_your_slots_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `order_id`, `payment_id`, `student_id`, `sub_total`, `tax_percentage`, `tax_amount`, `total`, `payment_status`, `payment_type`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-08-23', NULL, NULL, '8', NULL, '5', '0', '0', '0', '1', '0', '2023-08-23 07:24:29', '2023-08-23 07:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aravind@lrbinfotech.com', '$2y$10$2lJs273jL2XypZfPNq8rieXnbCAIlMZ3e.ajQ7cUnf4/SnE.LLtOC', '2023-03-16 13:15:31'),
('saidarshasaidarsha@gmail.com', '$2y$10$1T9f2dn92P3g43V/kffR3OboYRpk0Jn9wQs/Uzxe47Mkf86qag8iW', '2023-05-04 08:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `professionals_pages`
--

CREATE TABLE `professionals_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brochure_pdf` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_iframe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionals_pages`
--

INSERT INTO `professionals_pages` (`id`, `image_1`, `image_youtube_url`, `title_1`, `description_1`, `title_2`, `point_1`, `point_2`, `point_3`, `title_3`, `description_2`, `title_4`, `description_3`, `title_5`, `description_4`, `title_6`, `description_5`, `brochure_pdf`, `youtube_iframe`, `status`, `created_at`, `updated_at`) VALUES
(1, '1380529174.mp4', 'https://youtu.be/kt-8XZ3Ilgk', 'English for Work', 'Effective communicators are the winners in the present-day world. Starting from landing in the right opportunity to giving a sleek presentation, we heavily depend on communication. Practills provides a no-nonsense approach that will give you the best results. The program is custom designed for every participant with a personal planner.', 'Become a confident communicator in English!', 'Live online classes anytime anywhere', 'A complete practice-oriented approach – strictly no theory classes', 'A customized curriculum to suit your professional needs', 'How do we make you a confident communicator?', 'Practills learning follows a 3-way approach to improve your communication skills.', '1. Speeches and Conversation practice', 'Sample task – “How would you explain about your work to your friends and family. Use appropriate words to explain what you do and how does it impact the people around you. Your coach will be your friend and discuss it in details for 15 minutes”.', '2. Warp Zone', 'An exclusive activity zone every day to help your learn English in a fun way Sample activity - ENQUIRE -EXPRESS – ENUMERATE You would be teamed as pairs for this activity. Each pair would choose a common topic to discuss. Say, music, books, cooking, and so on. Your coach also might act as your pair for this activity. Each pair would ask question to each other on the topic, answer and interact, and also add more points to the conversation. You would learn to ask interesting questions and most importantly engaging someone in the conversation. This activity has helped 1000s of our trainees to build better interaction at office and become better at their interpersonal communication.', '3. Reflection', 'Guided reflection session to progress in every session\r\nYour coach would listen actively during the session and share the improvement they witness and also recommend the areas of improvement after every session. This helps you to understand your progress and fasten your learning journey with our at –home exercises.', '1171095544.pdf', '<iframe style=\"width:100%;height:500px;\" src=\"https://www.youtube.com/embed/rH5fK1FE8bU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '0', NULL, '2023-04-27 09:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `readings`
--

CREATE TABLE `readings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `readings`
--

INSERT INTO `readings` (`id`, `date`, `tuitor_id`, `student_ids`, `level`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '1', 'My Pet Cat', '\"My Pet Cat\"\r\n This is my pet cat, Whiskers. Whiskers is a fluffy and playful cat with gray and white fur. She has bright green eyes that sparkle in the sunlight. Whiskers loves to chase after toy mice and play with balls of yarn.\r\nEvery day, I feed Whiskers her favorite cat food. She also enjoys drinking milk from a small bowl. When she is full, she likes to curl up in a cozy spot for a nap. Sometimes, she snoozes on the windowsill, enjoying the warm sun on her fur.\r\nWhiskers is a friendly cat. She likes to rub against my legs and purr when I pet her. We have fun playing together, and she often surprises me with her funny antics. She is the best pet I could ever ask for!', '0', '2022-12-29 05:32:28', '2023-05-25 10:56:30'),
(2, NULL, NULL, NULL, '1', 'Exploring Science Fiction', 'The Time Machine\r\n\r\n\"The Time Machine\" is a science fiction novel written by H.G. Wells and published in 1895. The story follows an unnamed Time Traveller who builds a machine that allows him to travel into the future. He embarks on a journey to the year 802,701 AD and discovers a world populated by two distinct species: the Eloi and the Morlocks.\r\n\r\nThe Eloi are a peaceful and childlike species that live on the surface and seem to have no worries or responsibilities. The Morlocks, on the other hand, are a more sinister species that live underground and prey on the Eloi. The Time Traveller realizes that the future world he encounters is a stark contrast to the civilization he knows.\r\n\r\nThrough his adventures, the Time Traveller explores themes of social class, the consequences of technological advancements, and the potential future of humanity. He grapples with the question of whether progress and technology will lead to a utopian or dystopian society.\r\n\r\nQuestions:\r\n\r\nWho is the author of \"The Time Machine\"?\r\nWhat does the Time Traveller encounter in the future?\r\nDescribe the characteristics of the Eloi and the Morlocks.\r\nWhat are some of the themes explored in \"The Time Machine\"?\r\nVocabulary:\r\n\r\nDefine the following words based on their usage in the passage:\r\n\r\nSpecies\r\nSinister\r\nStark\r\nUtopian\r\nDystopian\r\n\r\n\r\nIf you had a time machine, which era would you choose to travel to and why? Consider the potential consequences and implications of visiting the past or the future.', '0', '2022-12-29 05:32:38', '2023-05-25 11:17:20'),
(3, NULL, NULL, NULL, '1', 'An email: A famous person project', 'Read the email from your English friend, Robin.\r\nI’m doing a project on famous people. Tell me about a famous person you like. What is this person’s name? Why is this person famous? What do you like about this person?\r\nWrite an email to Robin and answer the questions.\r\nWrite your email in 25 words or more.', '0', '2022-12-29 05:34:33', '2022-12-29 05:34:33'),
(4, NULL, NULL, NULL, '2', 'Grammar Rules', 'You can do this quiz online or print it on paper. It tests what you learned on our basic grammar rules page.', '0', '2023-03-08 02:30:35', '2023-03-08 02:30:35'),
(5, NULL, NULL, NULL, '2', 'Conditionals Terms', 'You can do this grammar quiz online', '0', '2023-03-08 02:35:55', '2023-03-08 02:35:55'),
(6, NULL, NULL, NULL, '3', 'Athletics Comprehension', 'testing', '0', '2023-03-08 02:42:05', '2023-03-08 02:42:05'),
(7, NULL, NULL, NULL, '4', 'Greta Thunberg Quiz', 'You can do this quiz online or print it on paper. It tests comprehension of our page on climate activist Greta Thunberg, one of a series of EnglishClub readings on environmental and health issues.', '0', '2023-03-08 03:02:13', '2023-03-08 03:02:13'),
(8, '2023-03-14', '1', '1,7', '1', 'An email: A famous person project', 'Read the email from your English friend, Robin.\r\nI’m doing a project on famous people. Tell me about a famous person you like. What is this person’s name? Why is this person famous? What do you like about this person?\r\nWrite an email to Robin and answer the questions.\r\nWrite your email in 25 words or more.', '1', '2023-03-14 09:09:36', '2023-05-21 07:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `reading_exams`
--

CREATE TABLE `reading_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_corrrect_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_wrong_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reading_exam_answers`
--

CREATE TABLE `reading_exam_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reading_exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reading_question_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reading_questions`
--

CREATE TABLE `reading_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reading_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reading_questions`
--

INSERT INTO `reading_questions` (`id`, `reading_id`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`, `status`, `created_at`, `updated_at`) VALUES
(3, '3', 'Bob : “lets go to the canteen!’ Lina : “…….. I am hungry”', 'It’s a good idea', 'I hate it', 'It’s not good idea', 'I disagree', 'd', '0', '2022-12-29 08:48:27', '2022-12-29 08:48:27'),
(4, '3', '  Cow and goat are ……. But tigers and lion are carnivorous', ' Reptiles', 'Microbes', 'Herbivorous', ' Viruses', 'a', '0', '2022-12-29 08:48:27', '2022-12-29 08:48:27'),
(5, '3', '  Cow and goat are ……. But tigers and lion are carnivorous', ' Reptiles', 'Microbes', 'Herbivorous', ' Viruses', 'a', '0', '2022-12-29 08:48:27', '2022-12-29 08:48:27'),
(6, '4', 'The first letter of the first word in a sentence should be', 'a large letter ', 'a capital letter', 'a Single letter', 'a multiple Letter', 'b', '0', '2023-03-08 02:30:35', '2023-03-08 02:30:35'),
(7, '4', 'The order of a basic positive sentence is', 'Subject-Verb-Object', 'Verb-Object-Subject', 'Pro-verb-subject-object', 'object-verb-pro', 'b', '0', '2023-03-08 02:30:35', '2023-03-08 02:30:35'),
(8, '4', 'Every sentence must have a subject and', 'a verb ', 'an object', 'a singular verb ', 'a plural verb', 'b', '0', '2023-03-08 02:30:35', '2023-03-08 02:30:35'),
(9, '4', 'When two singular subjects are connected by or, use', 'a singular verb', 'a plural verb', 'before a noun', 'after a noun', 'b', '0', '2023-03-08 02:30:35', '2023-03-08 02:30:35'),
(10, '4', 'If an opinion-adjective and a fact-adjective are used before a noun, which comes first?', 'a fact-adjective ', 'an opinion-adjective', 'singular', 'plural', 'b', '0', '2023-03-08 02:30:35', '2023-03-08 02:30:35'),
(11, '5', 'What would you do if it ________ on your wedding day?', 'rained', 'will rain', 'would rain', 'has rain', 'c', '0', '2023-03-08 02:35:55', '2023-03-08 02:35:55'),
(12, '5', 'If she comes, I _____ call you.', 'will', ' would', 'would have', 'would be', 'a', '0', '2023-03-08 02:35:55', '2023-03-08 02:35:55'),
(13, '5', 'If I eat peanut butter, I ________ sick.', 'would have gotten', 'would get', 'get', 'got', 'c', '0', '2023-03-08 02:35:55', '2023-03-08 02:35:55'),
(14, '5', 'If they had not _____ the car, I would have driven you.', 'take', 'taken', 'would take', 'have take', 'b', '0', '2023-03-08 02:35:55', '2023-03-08 02:35:55'),
(15, '5', 'He would have gone with you if you had asked him.\" Which conditional is this?', 'first', 'second', 'thrid', 'fourth', 'b', '0', '2023-03-08 02:35:55', '2023-03-08 02:35:55'),
(16, '5', 'If I won a million dollars, I would buy my own airplane.\" Which conditional is this?', 'zero', 'first', 'second', 'thrid', 'a', '0', '2023-03-08 02:35:55', '2023-03-08 02:35:55'),
(17, '6', 'One of the events in the Olympic Games in ancient Greece was', ' discus', ' steeplechase', 'pole-vault', 'dancing', 'c', '0', '2023-03-08 02:42:05', '2023-03-08 02:42:05'),
(18, '6', 'Modern-style athletics competitions began in English schools in the', '18th century', '19th century', '20th century', '21th century', 'a', '0', '2023-03-08 02:42:05', '2023-03-08 02:42:05'),
(19, '6', 'The IAAF World Championships in Athletics have been held since', 'she was overweight', 'he was depressed', 'she was protesting', 'she is fine ', 'b', '0', '2023-03-08 02:42:05', '2023-03-08 02:42:05'),
(20, '7', 'Nearly everyone Greta knew said climate change was bad, but they made it worse by', 'saying all the right things', 'flying all over the world', 'riding bicycles everywhere', 'her school', 'b', '0', '2023-03-08 03:02:13', '2023-03-08 03:02:13'),
(21, '7', 'Who took the photo she posted on her Twitter account soon after starting her strike?', 'Greta', 'her father', 'a passer-by', 'the Swedish Parliament', 'b', '0', '2023-03-08 03:02:13', '2023-03-08 03:02:13'),
(22, '7', 'Who took the photo she posted on her Twitter account soon after starting her strike?', 'climate science', 'climate justice', 'biosphere', ' atmosphere', 'b', '0', '2023-03-08 03:02:13', '2023-03-08 03:02:13'),
(23, '7', 'Fair treatment and help for people badly affected by global warming is an example of', ' atmosphere', 'biosphere', 'environment', 'climate change', 'c', '0', '2023-03-08 03:02:13', '2023-03-08 03:02:13'),
(24, '7', 'Which word means all the places in which life can exist?', 'biosphere', 'atmosphere', 'environment', 'young', 'b', '0', '2023-03-08 03:02:13', '2023-03-08 03:02:13'),
(27, '8', 'Bob : “lets go to the canteen!’ Lina : “…….. I am hungry”', 'It’s a good idea', 'I hate it', 'It’s not good idea', 'I disagree', 'd', '0', '2023-03-14 09:13:32', '2023-03-14 09:13:32'),
(28, '8', '  Cow and goat are ……. But tigers and lion are carnivorous', ' Reptiles', 'Microbes', 'Herbivorous', ' Viruses', NULL, '0', '2023-03-14 09:13:32', '2023-03-14 09:13:32'),
(38, '1', 'What is the name of the pet cat? ', 'Mittens ', 'Whiskers ', 'Fluffy', 'None of the above', NULL, '0', '2023-05-25 09:34:12', '2023-05-25 09:34:12'),
(39, '1', 'What color is Whiskers\' fur? ', 'Brown and black ', 'Gray and white ', 'Orange and white', 'Gray and orange', NULL, '0', '2023-05-25 09:34:12', '2023-05-25 09:34:12'),
(40, '1', 'What does Whiskers like to chase after?', 'Birds ', 'Toy mice', 'Squirrels', 'Dog', NULL, '0', '2023-05-25 09:34:12', '2023-05-25 09:34:12'),
(41, '1', 'What does the pet cat enjoy drinking? ', 'Water ', 'Milk ', 'Juice', 'Coffee', NULL, '0', '2023-05-25 09:34:12', '2023-05-25 09:34:12'),
(42, '1', 'Where does Whiskers like to sleep? ', 'In a tree ', 'On the windowsill', ' Under the bed', 'On a pot', NULL, '0', '2023-05-25 09:34:13', '2023-05-25 09:34:13'),
(43, '1', 'How does Whiskers show she is happy? ', 'Barking ', 'Meowing ', 'Purring', 'Screaming', NULL, '0', '2023-05-25 09:34:13', '2023-05-25 09:34:13'),
(44, '1', 'How does the narrator feel about Whiskers? ', 'Angry ', 'Scared ', 'Happy', 'Frightened', NULL, '0', '2023-05-25 09:34:13', '2023-05-25 09:34:13'),
(45, '1', 'What does the narrator say about playing with Whiskers?', 'They don\'t play together', 'They have fun playing together ', 'They get bored playing together', 'None of the bove', NULL, '0', '2023-05-25 09:34:13', '2023-05-25 09:34:13'),
(46, '1', 'What does the narrator think of Whiskers? ', 'She is the worst pet ', 'She is an okay pet ', 'She is the best pet ever', 'Adorable pet', NULL, '0', '2023-05-25 09:34:13', '2023-05-25 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `reading_students`
--

CREATE TABLE `reading_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reading_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reading_students`
--

INSERT INTO `reading_students` (`id`, `reading_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(3, '8', '1', '0', '2023-03-14 09:13:32', '2023-03-14 09:13:32'),
(4, '8', '7', '0', '2023-03-14 09:13:32', '2023-03-14 09:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `school_pages`
--

CREATE TABLE `school_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_4` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_5` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_6` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_7` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_8` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_9` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_10` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brochure_pdf` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_iframe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_pages`
--

INSERT INTO `school_pages` (`id`, `section_1`, `section_2`, `section_3`, `section_4`, `section_5`, `section_6`, `section_7`, `section_8`, `section_9`, `section_10`, `brochure_pdf`, `youtube_iframe`, `status`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"bg-color-white rbt-admission-area rbt-section-gapTop\">\r\n<div class=\"container\">\r\n<div class=\"g-5 row\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"video-popup-wrapper\"><img class=\"rbt-radius w-100\" src=\"/website-assets/images/kindergarten-02-back.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"addmission-guide-content pl--50 pl_lg--0 pl_md--0 pl_sm--0\">\r\n<h3>Why should you try us?</h3>\r\n\r\n<p>1. If you are looking to improve the overall communication skills of all the children, including the back benchers</p>\r\n\r\n<p>2. If you want to bring out the confidence in each child</p>\r\n\r\n<p>3. If you want your children to use better choice of words and speak gracefully</p>\r\n\r\n<p>4. If you want your children to speak English ( notTanglish or Hinglish or any other ish..)</p>\r\n\r\n<p>5. If you know that a child&rsquo;s professional success depends more on their communication skills than technical skills</p>\r\n<!-- <h5>The goal should be more than money</h5>\r\n                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"bg-color-extra2 rbt-section-gapBottom rbt-testimonial-area\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12 mb--60\">\r\n<div class=\"section-title text-center\">\r\n<h2>Who we are?</h2>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"g-5 pt--60 row\"><!-- Start List Style  -->\r\n<div class=\"col-lg-6\">\r\n<div class=\"rbt-feature-wrapper\">\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Creation of training models</h6>\r\n<!-- <p class=\"feature-description\">It is a long established fact that a reader will be distracted by this on readable content of when looking at its layout.</p> --></div>\r\n</div>\r\n\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>3 Young professionals with a great passion to build confidence created a sustainable training model.</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Starting Point</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Started off with 3 institutions with 1000+ students</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>100% Growth</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Grew to 2000+ students</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Club Model</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-1 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Introduced a heterogeneous training model for children from 3rd grade onwards</h6>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- End List Style  --><!-- Start List Style  -->\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"rbt-feature-wrapper\">\r\n<div class=\"feature-style-2 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Expansion in new zones</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-2 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Expanded horizon and started training online outside India impacting over 25000+ trainees overall</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-2 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Era of E- learning</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-2 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Expansion of online learning model handling children from K-12</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-2 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Focus on LSRW Skills</h6>\r\n</div>\r\n</div>\r\n\r\n<div class=\"feature-style-2 rbt-feature\">\r\n<div class=\"bg-pink-opacity icon\">&nbsp;</div>\r\n\r\n<div class=\"feature-content\">\r\n<h6>Introduced Reading and Writing model along with the existing Stage Launcher model to make children learn holistically</h6>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- End List Style  --></div>\r\n</div>\r\n</div>', '<div class=\"bg-color-white pt--60 rbt-section-gapBottom rbt-shadow-box rbt-testimonial-area\">\r\n<div class=\"content\">\r\n<div class=\"section-title\">\r\n<h4>How do we differ from regular spoken English sessions?</h4>\r\n</div>\r\n\r\n<div class=\"mobile-table-750 rbt-dashboard-table table-responsive\">\r\n<table class=\"rbt-table table table-borderless\">\r\n	<thead>\r\n		<tr>\r\n			<th>Category</th>\r\n			<th>Practills&rsquo; Speaker&rsquo;s Lab</th>\r\n			<th>Spoken English</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th>Listening and Speaking</th>\r\n			<th>Speakers Lab enables each child to listen and speak clearly. Only a good listener can be a good speaker</th>\r\n			<th>Focus in more on templates and sentences rather than practice</th>\r\n		</tr>\r\n		<tr>\r\n			<th>Reading and Writing</th>\r\n			<th>Children are given opportunity to present their reading materials and write creative content on a periodical manner</th>\r\n			<th>Only emphasis on grammar than encouraging creative writing</th>\r\n		</tr>\r\n		<tr>\r\n			<th>Organizing skills</th>\r\n			<th>Children take up leadership roles and plan for their sessions. They learn soft skills such as teamwork, organizing skills, and interpersonal communication.</th>\r\n			<th>No importance given for organizing skills</th>\r\n		</tr>\r\n		<tr>\r\n			<th>Critical reasoning</th>\r\n			<th>Children are given challenging simulations to practice and it aids them to think on their feet and communicate effectively</th>\r\n			<th>No importance given for critical reasoning</th>\r\n		</tr>\r\n		<tr>\r\n			<th>Public Speaking</th>\r\n			<th>Children learn the nuances of public speaking such as choosing interesting topics, body language, voice modulation, and building impressive presentations</th>\r\n			<th>No public speaking opportunity</th>\r\n		</tr>\r\n		<tr>\r\n			<th>Boards curriculum</th>\r\n			<th>Speakers Lab is developed in line with central board curriculum of improving co-scholastic skills. So each task a child would result in building their personality</th>\r\n			<th>Follows generally established principles regardless of age and level</th>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"bg-gradient-1 rbt-counterup-area rbt-section-gapBottom\">\r\n<div class=\"container\">\r\n<div class=\"mb--60 row\">\r\n<div class=\"col-lg-12\">\r\n<div class=\"section-title text-center\"><!-- <span class=\"subtitle bg-primary-opacity\">Why Choose Us</span> -->\r\n<h2>Speaking Goals</h2>\r\n\r\n<p>Learn continually, there is always one more thing to learn - Steve jobs</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"g-5 hanger-line row\">\r\n<div class=\"col-12 col-lg-3 col-md-6 col-sm-6\">\r\n<div class=\"border-bottom-gradient rbt-counterup rbt-hover-03\">\r\n<div class=\"top-circle-shape\">&nbsp;</div>\r\n\r\n<div class=\"inner\">\r\n<div class=\"rbt-round-icon\"><img alt=\"Icons Images\" src=\"/website-assets/images/counter-02.png\" /></div>\r\n\r\n<div class=\"content\">\r\n<h6>Foundation</h6>\r\n\r\n<h4>Stage 1</h4>\r\nBuilding confidence to speak with people and make small speeches</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-lg-3 col-md-6 col-sm-6 mt--60 mt_md--30 mt_mobile--60 mt_sm--30\">\r\n<div class=\"border-bottom-gradient rbt-counterup rbt-hover-03\">\r\n<div class=\"top-circle-shape\">&nbsp;</div>\r\n\r\n<div class=\"inner\">\r\n<div class=\"rbt-round-icon\"><img alt=\"Icons Images\" src=\"/website-assets/images/counter-02.png\" /></div>\r\n\r\n<div class=\"content\">\r\n<h6>Foundation</h6>\r\n\r\n<h4>Stage 2</h4>\r\nSetting the fundamentals to speak in a prepared manner</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-lg-3 col-md-6 col-sm-6 mt--60 mt_md--30 mt_mobile--60 mt_sm--30\">\r\n<div class=\"border-bottom-gradient rbt-counterup rbt-hover-03\">\r\n<div class=\"top-circle-shape\">&nbsp;</div>\r\n\r\n<div class=\"inner\">\r\n<div class=\"rbt-round-icon\"><img alt=\"Icons Images\" src=\"/website-assets/images/counter-02.png\" /></div>\r\n\r\n<div class=\"content\">\r\n<h6>Intermediate</h6>\r\n\r\n<h4>Stage 3</h4>\r\nAbility to perform speeches, Debate and different speech styles</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-lg-3 col-md-6 col-sm-6 mt--60 mt_md--30 mt_mobile--60 mt_sm--30\">\r\n<div class=\"border-bottom-gradient rbt-counterup rbt-hover-03\">\r\n<div class=\"top-circle-shape\">&nbsp;</div>\r\n\r\n<div class=\"inner\">\r\n<div class=\"rbt-round-icon\"><img alt=\"Icons Images\" src=\"/website-assets/images/counter-02.png\" /></div>\r\n\r\n<div class=\"content\">\r\n<h6>Intermediate</h6>\r\n\r\n<h4>Stage 4</h4>\r\nUnderstanding the basics of public speaking</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-lg-3 col-md-6 col-sm-6 mt--60 mt_md--30 mt_mobile--60 mt_sm--30\">\r\n<div class=\"border-bottom-gradient rbt-counterup rbt-hover-03\">\r\n<div class=\"top-circle-shape\">&nbsp;</div>\r\n\r\n<div class=\"inner\">\r\n<div class=\"rbt-round-icon\"><img alt=\"Icons Images\" src=\"/website-assets/images/counter-02.png\" /></div>\r\n\r\n<div class=\"content\">\r\n<h6>Advanced</h6>\r\n\r\n<h4>Stage 5</h4>\r\nDeveloping specialized presentations</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-lg-3 col-md-6 col-sm-6 mt--60 mt_md--30 mt_mobile--60 mt_sm--30\">\r\n<div class=\"border-bottom-gradient rbt-counterup rbt-hover-03\">\r\n<div class=\"top-circle-shape\">&nbsp;</div>\r\n\r\n<div class=\"inner\">\r\n<div class=\"rbt-round-icon\"><img alt=\"Icons Images\" src=\"/website-assets/images/counter-02.png\" /></div>\r\n\r\n<div class=\"content\">\r\n<h6>Advanced</h6>\r\n\r\n<h4>Stage 6</h4>\r\nUnderstanding the nuances of public speaking and becoming a professional</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-lg-3 col-md-6 col-sm-6 mt--60 mt_md--30 mt_mobile--60 mt_sm--30\">\r\n<div class=\"border-bottom-gradient rbt-counterup rbt-hover-03\">\r\n<div class=\"top-circle-shape\">&nbsp;</div>\r\n\r\n<div class=\"inner\">\r\n<div class=\"rbt-round-icon\"><img alt=\"Icons Images\" src=\"/website-assets/images/counter-02.png\" /></div>\r\n\r\n<div class=\"content\">\r\n<h6>Advanced</h6>\r\n\r\n<h4>Stage 7</h4>\r\nAbility to deliver impressive speeches anytime and anywhere</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"about-style-1 bg-color-white rbt-about-area rbt-section-gap\">\r\n<div class=\"container\">\r\n<div class=\"align-items-center g-5 row\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"content\"><img alt=\"About Images\" class=\"radius-10 w-100\" src=\"/website-assets/images/bg-image-12.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"inner pl--50 pl_lg--0 pl_md--0 pl_sm--0\">\r\n<div class=\"section-title text-start\">\r\n<h2>Elements of a session</h2>\r\n\r\n<p><strong>Speeches</strong></p>\r\n\r\n<ul>\r\n	<li>Children would deliver speeches every week to practice their speaking skills. Practills&rsquo; manual serves as a guideline.</li>\r\n	<li>(include image of worksheets)</li>\r\n</ul>\r\n\r\n<p><strong>Warp Zone</strong></p>\r\n\r\n<ul>\r\n	<li>Activity will be done every session to improve their critical reasoning, vocab building, engaging people, and on different aspects of public speaking.</li>\r\n</ul>\r\n\r\n<p><strong>Reflection</strong></p>\r\n\r\n<ul>\r\n	<li>Feedback and inputs given to each child to address the area of improvement after every session</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"about-style-1 bg-color-white rbt-about-area rbt-section-gapBottom\">\r\n<div class=\"container\">\r\n<div class=\"align-items-center g-5 row\">\r\n<div class=\"col-lg-7 order-2 order-lg-1\">\r\n<div class=\"inner pl--50 pl_lg--0 pl_md--0 pl_sm--0\">\r\n<div class=\"section-title text-start\"><!-- <h2 class=\"title\">Sample Speech Tasks</h2> --><!-- <p class=\"description mt--20\"><strong>Histudy educational platform</strong> <br /> ipsum dolor sit amet consectetur adipisicing elit.</p> -->\r\n<h5>Sample Speech Tasks:</h5>\r\n\r\n<div class=\"plan-offer-list-wrapper\">\r\n<ul>\r\n	<li>Structuring the speech</li>\r\n	<li>Speak to influence</li>\r\n	<li>Vlog and online campaigns</li>\r\n	<li>Award Speech</li>\r\n	<li>Master of Ceremonies</li>\r\n	<li>Read to speak</li>\r\n	<li>Youtube speech</li>\r\n	<li>Debates</li>\r\n	<li>Questioning techniques</li>\r\n	<li>Simulated conversations</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-5 order-1 order-lg-2\">\r\n<div class=\"content\"><img alt=\"About Images\" class=\"radius-10 w-100\" src=\"/website-assets/images/blog-card-04.jpg\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"about-style-1 bg-color-white rbt-about-area rbt-section-gap\">\r\n<div class=\"container\">\r\n<div class=\"align-items-center g-5 row\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"content\"><img alt=\"About Images\" class=\"radius-10 w-100\" src=\"/website-assets/images/blog-card-02.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"inner pl--50 pl_lg--0 pl_md--0 pl_sm--0\">\r\n<div class=\"section-title text-start\">\r\n<h2>Warp zone in action</h2>\r\n\r\n<p><strong>Speeches</strong><br />\r\nChildren would deliver speeches every week to practice their speaking skills. Practills&rsquo; manual serves as a guideline.<br />\r\n(include image of worksheets)<br />\r\n<strong>Warp Zone</strong><br />\r\nActivity will be done every session to improve their critical reasoning, vocab building, engaging people, and on different aspects of public speaking.<br />\r\n<strong>Reflection</strong><br />\r\nFeedback and inputs given to each child to address the area of improvement after every session</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"about-style-1 bg-color-white rbt-about-area rbt-section-gapBottom\">\r\n<div class=\"container\">\r\n<div class=\"align-items-center g-5 row\">\r\n<div class=\"col-lg-7 order-2 order-lg-1\">\r\n<div class=\"inner pl--50 pl_lg--0 pl_md--0 pl_sm--0\">\r\n<div class=\"section-title text-start\">\r\n<h2>What we commit?</h2>\r\n\r\n<ul>\r\n	<li><strong>Speakers Lab</strong>- Every week 2 periods per class &ndash; June to March</li>\r\n	<li><strong>Public Speaking</strong> Inter and Intra School</li>\r\n	<li><strong>Recognition system</strong> to bring complete involvement</li>\r\n	<li><strong>our engagement rate</strong> is 82% in the classrooms as per the latest 360 degree feedback report &ndash; March 2020</li>\r\n	<li><strong>360 degree</strong> feedback mechanism</li>\r\n	<li><strong>School</strong>(quarterly feedback from the management and teachers) &ndash; Coaches (Quarterly assessment of coaches)&ndash; Children(Periodical feedback and self-assessment) &ndash; Parents( Parents interaction and feedback sharing on Ignite event day)</li>\r\n	<li><strong>No child should</strong> be left behind is the motto we abide by. We ensure equal opportunity for all the kids in the classroom</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-5 order-1 order-lg-2\">\r\n<div class=\"content\"><img alt=\"About Images\" class=\"radius-10 w-100\" src=\"/website-assets/images/bg-image-13.jpg\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<div class=\"about-style-1 bg-color-white rbt-about-area rbt-section-gapTop\">\r\n<div class=\"container\">\r\n<div class=\"align-items-center g-5 row\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"thumbnail-wrapper\">\r\n<div class=\"image-1 thumbnail\">&nbsp;</div>\r\n\r\n<div class=\"d-none d-xl-block image-2 thumbnail\">&nbsp;</div>\r\n\r\n<div class=\"d-md-block d-none image-3 thumbnail\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"inner pl--50 pl_md--0 pl_sm--0\">\r\n<div class=\"section-title text-start\"><!-- <span class=\"subtitle bg-coral-opacity\">Know About Us</span> -->\r\n<h2>Deliverables</h2>\r\n</div>\r\n\r\n<h5>COURSE MANUAL</h5>\r\n\r\n<p>Every child would be provided with a course manual to do the speakers&rsquo; lab session</p>\r\n\r\n<h5>PRACTICAL PROJECTS</h5>\r\n\r\n<p>Projects to enhance the kids real life interactions with people. Learning is fun only when we know the application of it.</p>\r\n\r\n<p>Children would apply the learning they have during the sessions by taking part in practical projects.</p>\r\n\r\n<p>1. Create a campaign &ndash; Children would promote a campaign they believe in and spread the noble message throughout the school &ndash; Save water campaign</p>\r\n\r\n<p>2. Contribute in school events &ndash; Children would participate, organize, and compete in schools events such as Independence day speech, Being an MC for annual day, Being an organizer for teachers day and so on</p>\r\n\r\n<p>3. Interact with experts &ndash; Children would be offered multiple opportunity to talk with experts and learn live (attach Helen poster and Jitesh poster)</p>\r\n\r\n<h5>ASSESSMENTS AND REPORTS</h5>\r\n\r\n<p>Periodical assessments and reports to the school to understand the growth.<br />\r\n(assessment report and qualitative inputs image)</p>\r\n\r\n<h5>CERTIFICATES</h5>\r\n\r\n<p>Certificates to all the children at the end of the academic year (add certificate images)</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, '1094682873.pdf', '<iframe style=\"width:100%;height:500px;\" src=\"https://www.youtube.com/embed/rH5fK1FE8bU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '0', NULL, '2023-06-06 16:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session_name`, `session_type`, `course_id`, `package_id`, `date`, `from_time`, `to_time`, `description`, `reference_pdf`, `reference_link`, `meeting_link`, `meeting_password`, `tuitor_id`, `student_ids`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Munchkins - Mrg Session', 'Group Classes', NULL, '1', '2023-06-26', '10:00', '11:00', NULL, NULL, NULL, 'https://meet.google.com/ncw-vmej-esv', NULL, '1', '1', '0', '2023-02-26 07:50:34', '2023-06-12 12:50:43'),
(2, 'Munchkins - Mrg Session', 'One To One Classes', NULL, '12', '2023-03-11', '10:00', '11:15', NULL, '1117982064.pdf', 'https://www.youtube.com/watch?v=UquHotD-f58&ab_channel=PractillsLearning', 'https://meet.google.com/zjj-zonj-qhc', NULL, '1', '7', '0', '2023-03-10 12:45:37', '2023-03-10 12:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `session_datas`
--

CREATE TABLE `session_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_datas`
--

INSERT INTO `session_datas` (`id`, `session_id`, `reference_pdf`, `reference_link`, `meeting_link`, `meeting_password`, `tuitor_id`, `student_ids`, `status`, `created_at`, `updated_at`) VALUES
(6, '1', '1087141981.pdf', 'https://www.youtube.com/watch?v=UquHotD-f58&ab_channel=PractillsLearning', 'https://meet.google.com/zjj-zonj-qhc', 'admin123', '2', '3,4,6,7', '0', '2023-06-12 13:05:08', '2023-06-12 13:05:08'),
(7, '1', '858115279.pdf', 'https://www.youtube.com/watch?v=UquHotD-f58&ab_channel=PractillsLearning', 'https://meet.google.com/zjj-zonj-qhc', 'admin123', '1', '2,8', '0', '2023-06-12 13:05:09', '2023-06-12 13:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `session_students`
--

CREATE TABLE `session_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_students`
--

INSERT INTO `session_students` (`id`, `session_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(19, '6', '3', '0', '2023-06-12 13:05:08', '2023-06-12 13:05:08'),
(20, '6', '4', '0', '2023-06-12 13:05:08', '2023-06-12 13:05:08'),
(21, '6', '6', '0', '2023-06-12 13:05:08', '2023-06-12 13:05:08'),
(22, '6', '7', '0', '2023-06-12 13:05:08', '2023-06-12 13:05:08'),
(23, '7', '2', '0', '2023-06-12 13:05:09', '2023-06-12 13:05:09'),
(24, '7', '8', '0', '2023-06-12 13:05:09', '2023-06-12 13:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_map` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `facebook_url`, `twitter_url`, `linkedin_url`, `instagram_url`, `youtube_url`, `mobile_1`, `mobile_2`, `landline`, `email_1`, `email_2`, `footer_description`, `address`, `iframe_map`, `logo`, `logo_footer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/thinkarabic', '#', 'https://www.linkedin.com/company/thinkarabic/mycompany/?viewAsMember=true', 'https://www.instagram.com/thinkarabic/', 'https://www.youtube.com/@thinkarabic', '123456789', '123456789', NULL, 'info@thinkarabic.com', 'info@thinkarabic.com', 'We’re always in search for talented and motivated people. Don’t be shy introduce yourself!', 'Abudhabi ,UAE', '<iframe class=\"w-200\" src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319\" height=\"800\" width=\"100%\" style=\"border:0\"></iframe>', '1697174687.jpg', '1487218683.jpg', '0', NULL, '2023-08-23 10:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `speakings`
--

CREATE TABLE `speakings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speakings`
--

INSERT INTO `speakings` (`id`, `date`, `tuitor_id`, `student_ids`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Interview your classmate.', 'Ask questions to your friend \r\nFor example \r\nWhat is your favorite food? \r\nWhat do you like to do during recess? \r\nDo you have any hobbies?', '0', '2023-04-29 18:22:57', '2023-06-13 04:25:38'),
(2, NULL, NULL, NULL, 'Impromptu speech', 'Choose any one topic and talk about the topic\r\nMy Favorite Hobby and Why I Love It\r\nThe Value of Friendship\r\nThe Role of Music in Our Lives\r\nThe Impact of Television on Children\r\nThe Power of Imagination', '0', '2023-04-29 18:23:14', '2023-06-13 04:25:30'),
(4, '2023-05-03', '1', '2,8', 'test speaking exam', 'test speaking exam', '0', '2023-05-03 09:13:32', '2023-05-03 09:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `speaking_exams`
--

CREATE TABLE `speaking_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_corrrect_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_wrong_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speaking_exam_answers`
--

CREATE TABLE `speaking_exam_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speaking_exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speaking_question_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_blob` longblob DEFAULT NULL,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speaking_students`
--

CREATE TABLE `speaking_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speaking_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speaking_students`
--

INSERT INTO `speaking_students` (`id`, `speaking_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(3, '4', '2', '0', '2023-05-03 09:13:38', '2023-05-03 09:13:38'),
(4, '4', '8', '0', '2023-05-03 09:13:38', '2023-05-03 09:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `employee_id`, `username`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `area`, `city`, `address`, `pincode`, `profile_image`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'staff', 'Staff', '1234567890', 'staff@gmail.com', NULL, '$2y$10$e5D4Q5L954x3DeH0.CHqtu0AVXdOaYCtoHkTYBqgjRkxgn.Dm1AI2', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, '2023-05-21 07:18:47'),
(2, NULL, NULL, 'Deepika', '8807098781', 'deepika@practills.com', NULL, '$2y$10$cdnHV6BOBP5ZGxey7sZOs.O4z4TN7TTG6U2zjb70/N/FIYmSa1Plu', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '2023-03-16 11:24:56', '2023-03-16 11:24:56'),
(3, NULL, NULL, 'Vedha', '7010805278', 'adv.chit@gmail.com', NULL, '$2y$10$qC.m0FXUp/Klef5AjQKNWeDAtwN0a5a5OliFLFOHEkrI5zrT0XlY.', NULL, NULL, NULL, NULL, NULL, '0', '1', NULL, '2023-03-18 09:39:00', '2023-03-18 09:39:17'),
(4, NULL, NULL, 'Hemalatha', '7402172538', 'hemalatha@practills.com', NULL, '$2y$10$dmCKauin0tlY0ACvlPIPee7ASrCEEokF2plXoRBBYRYy4TE3j1TJG', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '2023-05-19 05:38:24', '2023-05-19 05:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `student_chats`
--

CREATE TABLE `student_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `file_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_chats`
--

INSERT INTO `student_chats` (`id`, `date`, `sender_id`, `to_id`, `msg`, `chat_type`, `file_extension`, `file_name`, `upload_files`, `read_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-03-08', '1', '1', 'hi', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 16:21:04', '2023-03-08 16:24:20'),
(2, '2023-03-08', '1', '7', 'hi bro', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 16:21:48', '2023-03-08 16:25:20'),
(3, '2023-03-08', '1', '1', 'how r u?', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 16:24:25', '2023-03-08 16:24:25'),
(4, '2023-03-08', '7', '1', 'hi brother , How r u?', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 16:25:34', '2023-03-08 16:25:34'),
(5, '2023-03-08', '1', '7', 'im fine', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 16:25:42', '2023-03-08 16:25:43'),
(6, '2023-03-08', '7', '1', 'hello', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:25:20', '2023-03-08 17:25:44'),
(7, '2023-03-08', '7', '1', 'i am fine how are you', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:25:35', '2023-03-08 17:25:44'),
(8, '2023-03-08', '7', '1', 'aravind', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:25:55', '2023-03-08 17:25:56'),
(9, '2023-03-08', '1', '7', 'hi', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:26:12', '2023-03-08 17:26:13'),
(10, '2023-03-08', '7', '1', 'hhfhfhue hiefiehfbf', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:26:34', '2023-03-08 17:26:35'),
(11, '2023-03-08', '7', '1', 'fuiheifhwf', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:26:39', '2023-03-08 17:26:40'),
(12, '2023-03-08', '1', '7', 'kjhjgjgh', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:26:39', '2023-03-08 17:26:40'),
(13, '2023-03-08', '1', '7', 'kjhjghk', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:26:44', '2023-03-08 17:26:45'),
(14, '2023-03-08', '7', '1', 'jfufjejuieuehe', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:26:46', '2023-03-08 17:26:47'),
(15, '2023-03-08', '1', '7', 'kkjhh', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:26:50', '2023-03-08 17:26:51'),
(16, '2023-03-08', '7', '1', 'fine', '0', NULL, NULL, NULL, '1', '0', '2023-03-08 17:27:01', '2023-03-08 17:27:02'),
(17, '2023-03-10', '7', '9', 'hi', '0', NULL, NULL, NULL, '1', '0', '2023-03-10 12:02:02', '2023-03-10 12:02:03'),
(18, '2023-03-10', '9', '7', 'Hey!', '0', NULL, NULL, NULL, '1', '0', '2023-03-10 12:02:11', '2023-03-10 12:02:21'),
(19, '2023-03-10', '7', '9', 'madam', '0', NULL, NULL, NULL, '1', '0', '2023-03-10 12:03:12', '2023-03-10 12:03:13'),
(20, '2023-03-10', '7', '9', 'madam', '0', NULL, NULL, NULL, '1', '0', '2023-03-10 12:03:12', '2023-03-10 12:03:13'),
(21, '2023-03-10', '7', '9', 'madam', '0', NULL, NULL, NULL, '1', '0', '2023-03-10 12:03:12', '2023-03-10 12:03:13'),
(22, '2023-03-10', '7', '9', 'madam', '0', NULL, NULL, NULL, '1', '0', '2023-03-10 12:03:13', '2023-03-10 12:03:13'),
(23, '2023-04-04', '1', '7', 'hello', '0', NULL, NULL, NULL, '0', '0', '2023-04-04 17:57:34', '2023-04-04 17:57:34'),
(24, '2023-04-07', '1', '7', 'hello thowsif', '0', NULL, NULL, NULL, '0', '0', '2023-04-07 06:30:34', '2023-04-07 06:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `used_courses`
--

CREATE TABLE `used_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `used_courses`
--

INSERT INTO `used_courses` (`id`, `date`, `payment_id`, `order_id`, `student_id`, `package_id`, `package_name`, `course_id`, `course_name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-08-23', NULL, '1', '8', NULL, NULL, '1', 'Learn Arabic for non-Arabic speaking children course', '100', '0', '2023-08-23 07:24:29', '2023-08-23 07:24:29'),
(2, '2023-08-23', NULL, '1', '8', NULL, NULL, '3', 'Online Quran Classes', '499', '0', '2023-08-23 07:24:29', '2023-08-23 07:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `role_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `user_unique_id`, `username`, `class`, `first_name`, `last_name`, `mobile`, `email`, `skill`, `bio`, `firebase_key`, `password`, `area`, `city`, `address`, `pincode`, `profile_image`, `cover_image`, `tuitor_id`, `status`, `role_id`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '2023-02-24', '19855105741677257262', NULL, NULL, 'Prasanth', 'Ats', '123456789', 'prasanthats@gmail.com', NULL, NULL, NULL, '$2y$10$N7czLLXhrOwfnq9r3nE8j.DT7XkqoSI7g0gTkhS8VTOGcag.3BPva', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 'Student', '2', NULL, '2023-02-24 11:17:42', '2023-08-24 05:04:07'),
(8, '2023-03-08', '18714269401678284847', NULL, '12th Std', 'Aravind', 'Kumar', '1234567890', 'aravind@lrbinfotech.com', NULL, NULL, NULL, '$2y$10$7lhRqSgnJwNLvj4OdOLwL./tAo6/bZ.ASdIydWGPjqHlstkavoLOK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Parent', '8', 'r081no9gmT0E2p7b02XxveAq6GyRzkHI0dFtOZ92JS0Vt1wcVCh46tzzvbIz', '2023-03-08 14:14:07', '2023-05-04 11:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `who_we_ares`
--

CREATE TABLE `who_we_ares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `who_we_ares`
--

INSERT INTO `who_we_ares` (`id`, `date`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '2019', 'Expansion in new zones', 'Expanded horizon and started training online outside India impacting over 25000+ trainees overall', NULL, '0', '2023-03-09 04:28:19', '2023-03-13 05:55:03'),
(2, '2020', 'Era of E-learning', 'Expansion of online learning model handling children from K-12', NULL, '0', '2023-03-09 04:28:38', '2023-03-13 05:55:17'),
(3, '2021', 'Focus on LSRW Skills', 'Introduced Reading and Writing modelalong with the existing Stage Launcher model to make chi dren learn holistically', NULL, '0', '2023-03-09 04:29:01', '2023-03-13 05:55:33'),
(6, '2022', '100% Growth', 'Grew to 5000+ students after facing the aftermath of covid', NULL, '0', '2023-03-09 04:30:05', '2023-03-13 05:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `writings`
--

CREATE TABLE `writings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_enable` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writings`
--

INSERT INTO `writings` (`id`, `date`, `tuitor_id`, `student_ids`, `level`, `title`, `description`, `image_enable`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '1', 'Descriptive Writing', 'Look at the picture below. Use the nouns, adjectives, and verbs from the provided lists to write a descriptive paragraph about the scene. Remember to use complete sentences and include as much detail as possible.\r\n\r\nNoun List:\r\nBeach\r\nWater\r\nShore\r\nBeach umbrellas\r\nPeople\r\nSunshine\r\nBeach volleyball\r\nSandcastles\r\nSailboats\r\nSea\r\n\r\nAdjective List:\r\nBeautiful\r\nGolden\r\nColorful\r\nCalm\r\n\r\nVerb List:\r\nSwaying\r\nEnjoying\r\nPlaying\r\nBuilding\r\nSeen', 'on', NULL, '0', '2022-12-29 04:37:02', '2023-05-29 10:18:22'),
(2, NULL, NULL, NULL, '1', 'Story Starters', 'Choose one of the story starters below and continue the story. Write a paragraph or two to develop the plot and engage the reader. Be creative to make your story interesting.\r\n\r\nOnce upon a time, in a small village, there lived a mischievous talking squirrel named Sammy...\r\n\r\nEmily woke up one morning to find a magical key on her bedside table. Little did she know that it would unlock a hidden door to...\r\n\r\nIt was a rainy day, and the power went out in the entire neighborhood. The kids decided to have an adventure and explore...\r\n\r\nIn a faraway land, there was a mysterious forest filled with enchanted creatures. Mia, an adventurous girl, decided to venture into the forest and discover its secrets...', NULL, NULL, '0', '2022-12-29 05:04:15', '2023-05-29 10:18:42'),
(3, NULL, NULL, NULL, '1', 'Short Story', 'Choose a topic and write a short story about it. Include elements of mystery, suspense, and problem-solving.\r\nTopic\r\n Write a short story about a group of friends discovering a hidden treasure map and embarking on a treasure hunt filled with puzzles, secret passages, and unexpected challenges.\r\nThe Unexpected Journey:\r\nWrite a short story about a character who unexpectedly embarks on a journey to a faraway land or a different world. Describe their adventures, the strange beings they meet, and how they navigate unfamiliar surroundings.\r\nThe Courageous Hero:\r\nWrite a short story about a young protagonist who must face their fears and overcome challenges to save their loved ones or their community. Describe their journey, the obstacles they encounter, and the courage they demonstrate along the way.', NULL, NULL, '0', '2022-12-29 10:01:37', '2023-05-29 10:23:02'),
(4, NULL, NULL, NULL, '1', 'A story: A camping trip', 'Look at the three pictures.\r\nWrite the story shown in the pictures.\r\nWrite your story in 35 words or more.\r\nWrite your email in 25 words or more.', 'on', NULL, '1', '2022-12-29 10:02:47', '2022-12-30 10:59:12'),
(5, NULL, NULL, NULL, '1', 'test', 'test', NULL, NULL, '1', '2022-12-29 15:04:17', '2022-12-30 10:59:18'),
(6, NULL, NULL, NULL, '1', 'Irene Test', 'She is testing right now', NULL, NULL, '1', '2022-12-30 10:58:51', '2023-06-13 04:26:25'),
(7, NULL, NULL, NULL, '2', 'test', 'test', NULL, NULL, '1', '2023-01-17 15:37:31', '2023-06-13 04:26:36'),
(8, NULL, NULL, NULL, '1', 'tile', 'hdepsd', NULL, NULL, '1', '2023-02-01 18:14:37', '2023-06-13 04:26:43'),
(9, NULL, NULL, NULL, '1', 'Answer Up', 'Google LLC is an American multinational technology company focusing on online advertising, search engine technology, cloud computing, computer software, quantum computing, e-commerce, artificial intelligence, and consumer electronics', 'on', NULL, '0', '2023-03-08 02:18:35', '2023-03-08 02:18:35'),
(10, NULL, NULL, NULL, '2', 'Quest Book', 'A quest story takes the main character away from home and sends them on a journey searching for something. This type of story usually has a group of main characters that take on the quest together. This is usually centered around a hero but will also include at least one best friend, a sidekick, and sometimes a group of characters who will help but may not be named.\r\nIn a quest story, the main idea is the journey itself and what the characters learn on that journey. They will face several perils along the way, which keep the reader engaged with the tale. These perils also make it harder for the characters to complete the quest and can add to the character development along the way.', NULL, NULL, '0', '2023-03-08 02:19:42', '2023-03-08 02:19:42'),
(11, NULL, NULL, NULL, '2', 'The Call to Save the City', 'Another type of quest story is a call to save society or the city. This typically happens when some dire threat is bearing down on the community, and only the main character and their friends can find the solution. The threat can be anything from a big bad guy to a weather anomaly, and it is often the threat that builds the suspense and plot of the story.\r\nTo fulfill the quest narrative, the hero must go on a journey to save the community, and that journey must have some peril in it. Through the hero’s journey, they learn important lessons while also seeking to restore their community and protect it from the coming threat.', 'on', NULL, '0', '2023-03-08 02:20:34', '2023-03-08 02:20:34'),
(12, NULL, NULL, NULL, '2', 'A Hero Stumbles Upon a Quest', 'Sometimes, the best way to write a quest story is to make it a surprise to the main character. When the character doesn’t go out in search of a quest, but rather stumbles onto a problem or something magical that sends them onto a quest.\r\nThe surprise of this particular quest story is what makes it so engaging. Your character is going about their daily life and then suddenly is hit with a heroic quest they never saw coming. Build the surprise to a climax in the story for more impact.', NULL, NULL, '0', '2023-03-08 02:21:07', '2023-03-08 02:21:07'),
(13, NULL, NULL, NULL, '3', 'The Hero Must Save a Loved One from Certain Death', 'Another story arc that can turn into a quest story is having your main character find themselves in a quest to save a loved one from certain death. Perhaps the loved one is ill, or maybe they have fallen under a curse or been captured by an evil villain. The Mario Brothers video game series takes this path as the brothers try to save Princess Peach.\r\n\r\nTo be a believable quest story, it must have a serious problem to warrant a quest. In most of these stories, the loved one faces potential death due to the problem.', NULL, NULL, '0', '2023-03-08 02:21:31', '2023-03-08 02:21:31'),
(14, NULL, NULL, NULL, '3', 'Defeating a Big Bad Guy', 'Many quests involve defeating a big bad guy in some way. In Tolkien’s The Lord of the Rings books, the hobbits and their friends must defeat Sauron and his forces. In the Harry Potter series by J.K. Rowling, Harry and his friends are working to defeat Lord Voldemort. This sends the characters of both stories on an epic quest and in search of magical items, but the main goal is to defeat the big bad guy.\r\nMany quest stories will incorporate this storyline with other types of quests, like the quest to save a loved one or save the community. Still, you can make your primary goal to defeat a villain as you get your creative writing juices flowing and write your quest story.', NULL, NULL, '0', '2023-03-08 02:22:09', '2023-03-08 02:22:09'),
(15, NULL, NULL, NULL, '4', 'Mysterious Message Sparks a Daring Quest', 'In this twist on the quest story, the hero may not know why he is going on the quest. He receives a message that sparks the quest, and he goes on the journey, but the reason why gets revealed along the way.\r\n\r\nYou can weave some of the other quest ideas into this basic plan, but the item that starts the quest is a mystery message. Eventually, you will reveal to the reader why the hero must go on the quest, but leaving the mystery in place for a while makes the story more interesting and engaging.\r\n\r\nThe Da Vinci Code takes on this pattern. In the tale, the hero finds a series of hidden messages from Da Vinci that lead to potential treasure and fame.\r\n\r\nLearning how to tell stories isn’t always easy. If you’re looking for a course, check out our review of Neil Gaiman’s Masterclass.', NULL, NULL, '0', '2023-03-08 02:22:43', '2023-03-08 02:22:43'),
(16, NULL, NULL, NULL, '4', 'What Is Craft?', 'Founded by Balint Orosz in 2019 in Budapest, Craft is a notetaking, collaboration, and productivity tool. They won the Mac App of the Year at Apple’s App Store Best of 2021 Awards.\r\n\r\nSo if you’re running some errands and a creative idea pops up, simply jot it into Craft. It will sync across devices and wait for you at your desktop.\r\n\r\nYou can even use it to collaborate with your team. For example, if you’re writing a book or article, use Craft to send the first draft to your editor. You have complete control over the document and can accept and reject changes.\r\n\r\nThe weekly goals also let you set deadlines and assign people to specific tasks, which is helpful if you’re running a team.\r\n\r\nCraft Pricing\r\nCraft offers three pricing plans:\r\n\r\nFree plan\r\nThe personal plan costs $4 per month\r\nThe business plan costs $12 per month', NULL, NULL, '0', '2023-03-08 02:24:05', '2023-03-08 02:24:05'),
(17, NULL, '1', '1,2,7', '1', 'Answer Up', 'Google LLC is an American multinational technology company focusing on online advertising, search engine technology, cloud computing, computer software, quantum computing, e-commerce, artificial intelligence, and consumer electronics', 'on', NULL, '1', '2023-03-14 05:56:13', '2023-03-14 06:10:16'),
(18, NULL, '1', '1,3,7', '1', 'Answer Up', 'Google LLC is an American multinational technology company focusing on online advertising, search engine technology, cloud computing, computer software, quantum computing, e-commerce, artificial intelligence, and consumer electronics', 'on', NULL, '0', '2023-03-14 05:58:57', '2023-03-14 05:58:57'),
(19, '2023-05-21', '1', '7', '1', 'test', 'test', NULL, NULL, '0', '2023-05-21 07:22:13', '2023-05-21 07:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `writing_exams`
--

CREATE TABLE `writing_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_corrrect_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_wrong_answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `writing_exam_answers`
--

CREATE TABLE `writing_exam_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuitor_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writing_exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writing_question_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `writing_images`
--

CREATE TABLE `writing_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `writing_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writing_images`
--

INSERT INTO `writing_images` (`id`, `writing_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, '2', '8106120611672291348.png', '0', '2022-12-29 05:22:28', '2022-12-29 05:22:28'),
(3, '4', '4077957711672308167.png', '0', '2022-12-29 10:02:47', '2022-12-29 10:02:47'),
(4, '9', '923695321678241915.png', '0', '2023-03-08 02:18:35', '2023-03-08 02:18:35'),
(5, '11', '13589478611678242034.jpg', '0', '2023-03-08 02:20:35', '2023-03-08 02:20:35'),
(6, '17', '53706991678773373.jpg', '0', '2023-03-14 05:56:13', '2023-03-14 05:56:13'),
(7, '17', '2040109251678773373.jpg', '0', '2023-03-14 05:56:13', '2023-03-14 05:56:13'),
(8, '18', '13339539581678773537.jpg', '0', '2023-03-14 05:58:57', '2023-03-14 05:58:57'),
(9, '18', '14161634871678773537.jpg', '0', '2023-03-14 05:58:57', '2023-03-14 05:58:57'),
(10, '1', '8870732321685079235.jpg', '0', '2023-05-26 05:34:00', '2023-05-26 05:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `writing_students`
--

CREATE TABLE `writing_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `writing_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writing_students`
--

INSERT INTO `writing_students` (`id`, `writing_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '17', '1', '0', '2023-03-14 05:56:13', '2023-03-14 05:56:13'),
(2, '17', '2', '0', '2023-03-14 05:56:13', '2023-03-14 05:56:13'),
(3, '17', '7', '0', '2023-03-14 05:56:13', '2023-03-14 05:56:13'),
(7, '18', '1', '0', '2023-03-14 06:10:05', '2023-03-14 06:10:05'),
(8, '18', '3', '0', '2023-03-14 06:10:05', '2023-03-14 06:10:05'),
(9, '18', '7', '0', '2023-03-14 06:10:05', '2023-03-14 06:10:05'),
(10, '19', '7', '0', '2023-05-21 07:22:13', '2023-05-21 07:22:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_your_slots`
--
ALTER TABLE `book_your_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_enquiries`
--
ALTER TABLE `careers_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_descriptions`
--
ALTER TABLE `course_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `franchise_enquiries`
--
ALTER TABLE `franchise_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_reviews`
--
ALTER TABLE `google_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listenings`
--
ALTER TABLE `listenings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listening_exams`
--
ALTER TABLE `listening_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listening_exam_answers`
--
ALTER TABLE `listening_exam_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listening_questions`
--
ALTER TABLE `listening_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listening_students`
--
ALTER TABLE `listening_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `professionals_pages`
--
ALTER TABLE `professionals_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readings`
--
ALTER TABLE `readings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading_exams`
--
ALTER TABLE `reading_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading_exam_answers`
--
ALTER TABLE `reading_exam_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading_questions`
--
ALTER TABLE `reading_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading_students`
--
ALTER TABLE `reading_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_pages`
--
ALTER TABLE `school_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_datas`
--
ALTER TABLE `session_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_students`
--
ALTER TABLE `session_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakings`
--
ALTER TABLE `speakings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speaking_exams`
--
ALTER TABLE `speaking_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speaking_exam_answers`
--
ALTER TABLE `speaking_exam_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speaking_students`
--
ALTER TABLE `speaking_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indexes for table `student_chats`
--
ALTER TABLE `student_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_courses`
--
ALTER TABLE `used_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_we_ares`
--
ALTER TABLE `who_we_ares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writings`
--
ALTER TABLE `writings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writing_exams`
--
ALTER TABLE `writing_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writing_exam_answers`
--
ALTER TABLE `writing_exam_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writing_images`
--
ALTER TABLE `writing_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writing_students`
--
ALTER TABLE `writing_students`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_your_slots`
--
ALTER TABLE `book_your_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `careers_enquiries`
--
ALTER TABLE `careers_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_descriptions`
--
ALTER TABLE `course_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchise_enquiries`
--
ALTER TABLE `franchise_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_reviews`
--
ALTER TABLE `google_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listenings`
--
ALTER TABLE `listenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listening_exams`
--
ALTER TABLE `listening_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listening_exam_answers`
--
ALTER TABLE `listening_exam_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listening_questions`
--
ALTER TABLE `listening_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `listening_students`
--
ALTER TABLE `listening_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professionals_pages`
--
ALTER TABLE `professionals_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `readings`
--
ALTER TABLE `readings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reading_exams`
--
ALTER TABLE `reading_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reading_exam_answers`
--
ALTER TABLE `reading_exam_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reading_questions`
--
ALTER TABLE `reading_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `reading_students`
--
ALTER TABLE `reading_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_pages`
--
ALTER TABLE `school_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session_datas`
--
ALTER TABLE `session_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `session_students`
--
ALTER TABLE `session_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `speakings`
--
ALTER TABLE `speakings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `speaking_exams`
--
ALTER TABLE `speaking_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speaking_exam_answers`
--
ALTER TABLE `speaking_exam_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speaking_students`
--
ALTER TABLE `speaking_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_chats`
--
ALTER TABLE `student_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `used_courses`
--
ALTER TABLE `used_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `who_we_ares`
--
ALTER TABLE `who_we_ares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `writings`
--
ALTER TABLE `writings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `writing_exams`
--
ALTER TABLE `writing_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `writing_exam_answers`
--
ALTER TABLE `writing_exam_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `writing_images`
--
ALTER TABLE `writing_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `writing_students`
--
ALTER TABLE `writing_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
