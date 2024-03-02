-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 03:36 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbak`
--

CREATE TABLE `feedbak` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `feedbackdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbak`
--

INSERT INTO `feedbak` (`id`, `name`, `email`, `phno`, `subject`, `message`, `feedbackdate`) VALUES
(1, 'anshuman', 'bharatiyaa10@gmail.com', '7077514451', 'About Education', 'Why UGC not Declare the Exam....', '2020-07-28 18:30:00'),
(2, 'Anshuman Bharatiya', 'bharatiyaa6@gmail.com', '7077514451', 'About my problem', 'my message', '2020-07-29 13:58:39'),
(3, 'Aditya Kumar Saho', 'adityasahoo12@gmail.com', '9090876678', 'About The COVID-19', 'When the Covaxin released ', '2020-07-30 01:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(1, 'NPADMIN', '$2y$10$ZNzhqyX3JK6QIvnI6ubDBeXudpwgFhQf0f.UcvO7cafuXN2Cju6qu', 'bharatiyaa6@gmail.com', 1, '2020-06-24 13:55:40', '2020-07-24 06:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(7, 'Healthy & fit', 'Physical fitness is a state of health and well-being and, more specifically, the ability to perform aspects of sports, occupations and daily activities. Physical fitness is generally achieved through proper nutrition, moderate-vigorous physical exercise, and sufficient rest.', '2020-07-24 04:18:50', NULL, 1),
(8, 'Recent news', 'All the recent and latest news are updated every 24X7 hr.', '2020-07-24 04:47:26', NULL, 1),
(9, 'Entertainment', 'All About Movies, Games, TV Series, Bollywood, HollyWood', '2020-07-28 00:33:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(4, '10', 'Anshuman Bharatiya', 'bharatiyaa10@gmail.com', 'hii', '2020-06-24 14:03:18', 1),
(5, '12', 'Anshuman Bharatiya', 'bharatiyaa10@gmail.com', 'aaa', '2020-06-24 14:03:58', 1),
(6, '11', 'Anshuman Bharatiya', 'bharatiyaa10@gmail.com', 'it is a interesting story', '2020-07-22 14:26:21', 1),
(7, '14', 'Anshuman Bharatiya', 'bharatiyaa10@gmail.com', 'yes he have highest speed ', '2020-07-24 04:38:15', 1),
(8, '15', 'Raj kishore sahoo', 'rajkishore10@gmail.com', 'you is good for our body', '2020-07-24 04:44:34', 1),
(9, '18', 'Swagat Ranjan Sahoo', 'bharatiyaa10@gmail.com', 'Witing For the Movie', '2020-07-30 01:43:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `Description` longtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About News Portal', '<div id=\"team\" style=\"position: relative;\" class=\" border shadow-sm mb-5\">\r\n  <nav id=\"navbar-example\" class=\"navbar navbar-light bg-light\" style=\"box-shadow: none!important;\">\r\n    <a class=\"navbar-brand text-info\" href=\"\">Our Team</a>\r\n    <ul class=\"nav nav-pills\">\r\n      <li class=\"nav-item\">\r\n        <a class=\"nav-link\" href=\"#senior_editor\">Senior Editor</a>\r\n      </li>\r\n      <li class=\"nav-item dropdown\">\r\n        <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Sub Editor</a>\r\n        <div class=\"dropdown-menu\">\r\n          <a class=\"dropdown-item\" href=\"#sub_editor1\">Bikram Keshari Jena</a>\r\n          <a class=\"dropdown-item\" href=\"#sub_editor2\">Vikash Kumar Sharma</a>\r\n          <a class=\"dropdown-item\" href=\"#sub_editor3\">Pradeep Singh</a>\r\n          <a class=\"dropdown-item\" href=\"#sub_editor4\">Devbrat Patnaik</a>\r\n          <a class=\"dropdown-item\" href=\"#sub_editor5\">Rashmi Ranjan Mohanty</a>\r\n          <a class=\"dropdown-item\" href=\"#sub_editor6\">Sarmeeli Mallick</a>\r\n        </div>\r\n      </li>\r\n    </ul>\r\n  </nav>\r\n  <div data-spy=\"scroll\" data-target=\"#navbar-example\" data-offset=\"0\" class=\" p-4 border\" style=\"height: 300px; overflow-y: scroll;\">\r\n    <h4 id=\"senior_editor\">Kasturi Ray â€“ Senior Editor, Digital</h4>\r\n    <p class=\"text-justify mb-4\">Kasturi Ray is a mainstream journalist with a large body of work over the last two decades. Having been a print journalist for over 20 years as the Features Editor of the New Indian Express, she moved on to the fast paced and ever growing digital space to become the chief editor of bilingual web platform newsportalnp.com. She has written for several national media houses like Firstpost and the Quint prior to joining News Portal.</p>\r\n    <h4 id=\"sub_editor1\">Bikram Keshari Jena, Chief Sub Editor</h4>\r\n    <p class=\"text-justify mb-4\">Bikram Keshari Jena has more than seven years of experience in Journalism and Research. After completing his MBA-Finance, he gained rich exposure in business journalism while working as a Research Associate and subsequently as an Assistant Editor of leading business magazine â€“ Business &amp; Economy. In the field of research, he boasts of experience in Equity Research and Financial Modelling while working with Citigroup and a KPO. He has worked as a Senior Sub-Editor for The Political and Business Daily and was in the editorial team of a leading news portal. He has diverse editorial exposure spanning across print, digital, electronic &amp; new media.</p>\r\n    <h4 id=\"sub_editor2\">Vikash Kumar Sharma, Chief Sub Editor</h4>\r\n    <p class=\"text-justify mb-4\">Vikash Kumar Sharma has an experience of working in both print and electronic media for over 10 years. He has worked as senior reporter with The Telegraph and few tabloids. As freelancer also he has done few short stories and documentaries.</p>\r\n    <h4 id=\"sub_editor3\">Pradeep Singh, Senior Sub Editor</h4>\r\n    <p class=\"text-justify mb-4\">Pradeep began his professional career with The Pioneer. He has worked for several news organisations prior to working with Odishatv.in. He was with Contify as Copy Editor; he was also CE for Movie News Guide &amp; Tripped Media of Tune Media (IBTimes). He has been writing regularly on several topics ranging from politics and social issues to crime.</p>\r\n    <h4 id=\"sub_editor4\">Devbrat Patnaik, Senior Sub Editor</h4>\r\n    <p class=\"text-justify mb-4\">Devbrat Patnaik joined News Portal digital team as Content Writer for its online portal in February 2017. He has been developing content and reporting on various issues and current affairs. He began his career with the print medium as the Copy editor-cum-Reporter for Pioneer, Bhubaneswar. A Masters in JMC from Berhampur University, he is a passionate singer armed with a Bachelorâ€™s degree in Hindustani Classical vocal. He has received National Cultural Proficiency and various State-level championship awards. A basketball player, he has led Berhampur University team at the National level.</p>\r\n    <h4 id=\"sub_editor5\">Rashmi Ranjan Mohanty, Senior Sub Editor</h4>\r\n    <p class=\"text-justify mb-4\">With more than seven years of experience in the field of journalism, Rashmi, a Masters in Journalism and Mass Communication from Ravenshaw University, started his career as a city journalist with The Times of India in 2013. Later, he joined Contify and then odishatv.in before moving to Delhi to work with Zee Media Corporation Limited. Prior to his second innings with odishatv.in now, Rashmi worked with ETV Bharat in Hyderabad and was assigned with the task to look after the international desk. A dog lover and passionate cricket player, Rashmi has a keen interest in international affairs, politics and cricket.</p>\r\n    <h4 id=\"sub_editor6\">Sarmeeli Mallick, Sub Editor</h4>\r\n    <p class=\"text-justify mb-4\">Sarmeeli started her career with the â€˜Media Research and Development Studiesâ€™, Bhubaneswar where she wrote news contents for websites like Prameya News 7, News Odisha and Woman Odisha. An alumnus of the 2014-16 batch of Utkal University, she has also worked with the Assam Tribune, Guwahati and Naxatra News, Bhubaneswar as an intern.</p>\r\n  </div>\r\n</div>', '2020-06-30 18:01:03', '2020-08-01 01:34:32'),
(2, 'contactus', 'Contact Details', '        <div class=\"row\">\r\n          <div class=\"col-lg-7 col-md-6 col-12\">\r\n            <h3 class=\"mb-4\">News Portal 24/7 Helpline Number</h3><table class=\"table table-hover mb-5 table-striped table-responsive-md table-responsive-sm\">\r\n              \r\n              <thead>\r\n                <tr class=\"table-danger\">\r\n                  <th scope=\"col\">For All Queries</th>\r\n                  <th scope=\"col\"></th>\r\n                  <th scope=\"col\">+91-9938223312</th>\r\n                  <th scope=\"col\"></th>\r\n                </tr>\r\n              </thead>\r\n            </table>\r\n            <h3 class=\"mb-4\">For Advertisement kindly contact</h3><table class=\"table mb-5 table-hover table-striped table-responsive-md  table-responsive-sm\">\r\n              \r\n              <thead class=\" table-danger\">\r\n                <tr>  \r\n                  <th scope=\"col\">Name</th>\r\n                  <th scope=\"col\">Place</th>\r\n                  <th scope=\"col\">Email</th>\r\n                  <th scope=\"col\">Contact</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody class=\"table-info\">\r\n                <tr>\r\n                  <td scope=\"row\">Subodha Dask</td>\r\n                  <td>Odisha </td>\r\n                  <td>subodhdas@np.in</td>\r\n                  <td>+91-9937307714</td>\r\n                </tr>\r\n                <tr>\r\n                  <td scope=\"row\">Subodha Dask</td>\r\n                  <td>Odisha </td>\r\n                  <td>subodhdas@np.in</td>\r\n                  <td>+91-9937307714</td>\r\n                </tr>\r\n                <tr>\r\n                  <td scope=\"row\">Subodha Dask</td>\r\n                  <td>Odisha </td>\r\n                  <td>subodhdas@np.in</td>\r\n                  <td>+91-9937307714</td>\r\n                </tr>\r\n                <tr>\r\n                  <td scope=\"row\">Subodha Dask</td>\r\n                  <td>Odisha </td>\r\n                  <td>subodhdas@np.in</td>\r\n                  <td>+91-9937307714</td>\r\n                </tr>\r\n              </tbody>\r\n            </table>\r\n            <h3 class=\"mb-4\">For Website Advertisements contact</h3><table class=\"table mb-5 table-hover table-striped table-responsive-md  table-responsive-sm\">\r\n              \r\n              <thead class=\"table-danger\">\r\n                <tr>\r\n                  <th scope=\"col\">Name</th>\r\n                  <th scope=\"col\">Designation</th>\r\n                  <th scope=\"col\">Email</th>\r\n                  <th scope=\"col\">Contact</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody class=\"table-info\">\r\n                <tr>\r\n                  <th scope=\"row\">Nagesh Madastu</th>\r\n                  <td>Business DEV. Officer</td>\r\n                  <td>nagesh.madastu@np.in  </td>\r\n                  <td>+91-8919 366 367</td>\r\n                </tr>\r\n                <tr>\r\n                  <th scope=\"row\">P.V.K. Rao</th>\r\n                  <td>S/W DEV. Officer</td>\r\n                  <td>pvkrao@np.com</td>\r\n                  <td>+91-9840044996</td>\r\n                </tr>\r\n              </tbody>\r\n            </table>\r\n            <h3 class=\"mb-4\">For Distribution kindly contact</h3><table class=\"table table-hover table-striped table-responsive-md  table-responsive-sm\">\r\n              \r\n              <thead class=\"table-danger\">\r\n                <tr>\r\n                  <th scope=\"col\">Name</th>\r\n                  <th scope=\"col\">Designation</th>\r\n                  <th scope=\"col\">Email</th>\r\n                  <th scope=\"col\">Contact</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody class=\"table-info\">\r\n                <tr>\r\n                  <th scope=\"row\">Bibhuti Mishra</th>\r\n                  <td>Nodal Officer</td>\r\n                  <td>bibhuti@np.in</td>\r\n                  <td>+91-9777588990</td>\r\n                </tr>\r\n                <tr>\r\n                  <th scope=\"row\">Bibhuti Mishra</th>\r\n                  <td>Nodal Officer</td>\r\n                  <td>bibhuti@np.in</td>\r\n                  <td>+91-9777588990</td>\r\n                </tr>\r\n              </tbody>\r\n            </table>\r\n          </div>\r\n          <div class=\"col-lg-5 col-md-6 col-12\">  \r\n          <h3 class=\"text-danger mb-4\">Find Us:</h3>          \r\n              <iframe src=\"https://www.google.com/maps/d/embed?mid=1jT5L7YAkA1mSrMdzWi8-dRV-M4uP8PKL\" width=\"100%\" height=\"450\" class=\"embed-responsive-item\"></iframe>            \r\n          </div>\r\n        </div>\r\n', '2020-02-10 18:01:36', '2020-07-26 06:16:09'),
(3, 'coronavirus', 'Latest News on Coronavirus', '                                                                                                                        ', '2020-07-28 04:13:16', '2020-07-28 05:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext,
  `PostImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(13, '2 tips for healthy eating', 7, 11, '<h2 style=\"box-sizing: inherit; font-size: 2rem; line-height: 1.25; font-weight: 600; margin-top: 0px; margin-bottom: 24px; padding-top: 16px; color: rgb(33, 43, 50); font-family: &quot;Frutiger W01&quot;, Arial, sans-serif;\">1. Base&nbsp;your meals on higher fibre starchy carbohydrates.</h2><p style=\"box-sizing: inherit; font-size: 2rem; line-height: 1.25; font-weight: 600; margin-top: 0px; margin-bottom: 24px; padding-top: 16px; color: rgb(33, 43, 50); font-family: &quot;Frutiger W01&quot;, Arial, sans-serif;\"><span style=\"font-size: 19px; font-weight: 400; background-color: rgb(240, 244, 245);\">Choose higher fibre or wholegrain varieties, such as wholewheat pasta, brown rice or potatoes with their skins on.</span></p><h2 style=\"box-sizing: inherit; font-size: 2rem; line-height: 1.25; font-weight: 600; margin-top: 0px; margin-bottom: 24px; padding-top: 16px; color: rgb(33, 43, 50); font-family: &quot;Frutiger W01&quot;, Arial, sans-serif; background-color: rgb(240, 244, 245);\">2. Eat lots of fruit and veg</h2><p style=\"box-sizing: inherit; font-size: 2rem; line-height: 1.25; font-weight: 600; margin-top: 0px; margin-bottom: 24px; padding-top: 16px; color: rgb(33, 43, 50); font-family: &quot;Frutiger W01&quot;, Arial, sans-serif;\"><br></p>', '2020-07-24 04:25:43', '2020-07-24 04:34:10', 1, '2-tips-for-healthy-eating', '270ee74b40f629ca6e9cfb84a1d07b43.jpg'),
(14, 'jasprit bumrah highest bowling speed', 3, 4, '<blockquote><h3><b><u style=\"background-color: rgb(255, 214, 99);\">jasprit bumrah highest bowling speed</u></b></h3><p><b><u style=\"background-color: rgb(255, 214, 99);\"><br></u></b></p><ol><li><b style=\"background-color: rgb(255, 198, 156);\"><font face=\"Arial Black\"><span style=\"font-size: 16px;\">B</span>u</font>mrah is considered one of the fastest Indian bowlers with an average speed of 142 km/h, his fastest being 153.26 km/h, which he bowled during the first Test match of India Tour of Australia 2018, at the Adelaide Oval, outpacing the likes of even Mitchell Starc and Pat Cummins.</b></li></ol></blockquote>', '2020-07-24 04:36:36', '2020-07-24 04:37:45', 1, 'jasprit-bumrah-highest-bowling-speed', '0526f32a8aee6c351e54c289427f5da5.jpg'),
(15, 'About Yoga - Benefits, Types', 7, 10, '<p><b><u><font face=\"Arial Black\"><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">The term \"</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">Yoga</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">\" in the Western world often denotes a modern form of hatha&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">yoga</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">&nbsp;and&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">yoga</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">&nbsp;as exercise, consisting largely of the postures or asanas. ...&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">Yoga</span><span style=\"color: rgb(34, 34, 34); font-size: 16px;\">&nbsp;in Indian traditions, however, is more than physical exercise; it has a meditative and spiritual core.</span></font></u></b></p><h2 style=\"box-sizing: inherit; font-family: Merriweather, serif; font-weight: 900; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\"><a href=\"https://isha.sadhguru.org/yoga/new-to-yoga/what-is-yoga/\" title=\"What is Yoga?\" style=\"box-sizing: inherit; transition: all 0.15s ease-out 0s; outline-style: initial; outline-width: 0px; cursor: pointer; font-size: 37px; line-height: 40px; margin-bottom: 0px; margin-top: 0px; font-weight: 400; color: rgb(0, 0, 0) !important;\">What is Yoga?</a></h2><p style=\"box-sizing: inherit; line-height: 26px; margin-bottom: 12px; margin-top: 10px; font-family: Merriweather, serif; font-size: 16px;\">What is Yoga, exactly? Is it just an exercise form? Is it a religion, a philosophy, an ideology? Or is it something else entirely? The word \"Yoga\" literally means \"union\". In this article, Sadhguru offers the following Yoga definition; essentially, \"that which brings you to reality.\"</p><h2 style=\"box-sizing: inherit; font-family: Merriweather, serif; font-weight: 900; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\"><a href=\"https://isha.sadhguru.org/yoga/new-to-yoga/types-of-yoga/\" title=\"Types of Yoga\" style=\"box-sizing: inherit; transition: all 0.15s ease-out 0s; outline-style: initial; outline-width: 0px; cursor: pointer; font-size: 37px; line-height: 40px; margin-bottom: 0px; margin-top: 0px; font-weight: 400; color: rgb(0, 0, 0) !important;\">Types of Yoga</a></h2><p style=\"box-sizing: inherit; line-height: 26px; margin-bottom: 12px; margin-top: 10px; font-family: Merriweather, serif; font-size: 16px;\">Yogi and mystic, Sadhguru answers a question on the different types of yoga and explains that any yoga that you do comes under four essential paths.</p>', '2020-07-24 04:43:21', '2020-07-24 04:45:21', 1, 'About-Yoga---Benefits,-Types', 'abe62774042c929259339f062db49bb0.jpg'),
(16, 'corona', 8, 12, '<h3 style=\"text-align: justify; margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3; color: rgb(85, 85, 85);\"><b><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">he&nbsp;</span><span style=\"color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">coronavirus COVID</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">-19 is affecting 213 countries and territories around the world and 2 international ... Sources are provided under \"</span><span style=\"color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">Latest Updates</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">\".</span></b></h3><h1 style=\"margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3; color: rgb(85, 85, 85); text-align: center;\"><span style=\"background-color: rgb(231, 99, 99);\">Coronavirus Cases:</span></h1><div class=\"maincounter-number\" style=\"font-weight: 700; color: rgb(105, 105, 105); font-size: 54px; font-family: &quot;noto sans&quot;, sans-serif; text-align: center;\"><span style=\"color: rgb(170, 170, 170); background-color: rgb(206, 0, 0);\">15,655,547</span></div><div class=\"maincounter-number\" style=\"font-weight: 700; font-size: 54px; font-family: &quot;noto sans&quot;, sans-serif; text-align: center;\"><div id=\"maincounter-wrap\" style=\"margin: 15px auto auto; padding-top: 20px; font-size: 15px; font-weight: 400;\"><h1 style=\"color: rgb(85, 85, 85); margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3;\"><span style=\"background-color: rgb(231, 99, 99);\">Deaths:</span></h1><div class=\"maincounter-number\" style=\"font-weight: 700; font-size: 54px;\"><font color=\"#ff0000\" style=\"background-color: rgb(255, 255, 0);\">636,521</font></div></div><div id=\"maincounter-wrap\" style=\"margin: 15px auto auto; padding-top: 20px; font-size: 15px; font-weight: 400;\"><h1 style=\"color: rgb(85, 85, 85); margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3;\"><span style=\"background-color: rgb(231, 99, 99);\">Recovered:</span></h1><div class=\"maincounter-number\" style=\"font-weight: 700; font-size: 54px;\"><span style=\"background-color: rgb(231, 99, 99);\"><font color=\"#00ff00\">9,536,888</font></span></div></div></div>', '2020-07-24 04:53:27', NULL, 1, 'corona', 'cafb798561e675cce1e55a0f1a1ed611.jpg'),
(17, 'corona', 8, 12, '<h3 style=\"text-align: justify; margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3; color: rgb(85, 85, 85);\"><b><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">he&nbsp;</span><span style=\"color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">coronavirus COVID</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">-19 is affecting 213 countries and territories around the world and 2 international ... Sources are provided under \"</span><span style=\"color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">Latest Updates</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; text-align: left;\">\".</span></b></h3><h1 style=\"margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3; color: rgb(85, 85, 85); text-align: center;\"><span style=\"background-color: rgb(231, 99, 99);\">Coronavirus Cases:</span></h1><div class=\"maincounter-number\" style=\"font-weight: 700; color: rgb(105, 105, 105); font-size: 54px; font-family: &quot;noto sans&quot;, sans-serif; text-align: center;\"><span style=\"color: rgb(170, 170, 170); background-color: rgb(206, 0, 0);\">15,655,547</span></div><div class=\"maincounter-number\" style=\"font-weight: 700; font-size: 54px; font-family: &quot;noto sans&quot;, sans-serif; text-align: center;\"><div id=\"maincounter-wrap\" style=\"margin: 15px auto auto; padding-top: 20px; font-size: 15px; font-weight: 400;\"><h1 style=\"color: rgb(85, 85, 85); margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3;\"><span style=\"background-color: rgb(231, 99, 99);\">Deaths:</span></h1><div class=\"maincounter-number\" style=\"font-weight: 700; font-size: 54px;\"><font color=\"#ff0000\" style=\"background-color: rgb(255, 255, 0);\">636,521</font></div></div><div id=\"maincounter-wrap\" style=\"margin: 15px auto auto; padding-top: 20px; font-size: 15px; font-weight: 400;\"><h1 style=\"color: rgb(85, 85, 85); margin-top: 0px; margin-bottom: 0px; font-size: 40px; font-family: &quot;roboto condensed&quot;, sans-serif; line-height: 1.3;\"><span style=\"background-color: rgb(231, 99, 99);\">Recovered:</span></h1><div class=\"maincounter-number\" style=\"font-weight: 700; font-size: 54px;\"><span style=\"background-color: rgb(231, 99, 99);\"><font color=\"#00ff00\">9,536,888</font></span></div></div></div>', '2020-07-24 04:57:49', '2020-07-24 06:19:47', 0, 'corona', 'cafb798561e675cce1e55a0f1a1ed611.jpg'),
(18, 'Yaara - A ZEE5 Original - A Tale Of True Friendship', 9, 13, '<h3 class=\"H1u2de\" style=\"font-size: 20px; margin-top: 0px; margin-bottom: 0px; padding: 0px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.3; color: rgb(34, 34, 34); font-family: arial, sans-serif;\"><a href=\"https://www.youtube.com/watch?v=0MrtkU8twI8\" ping=\"/url?sa=t&amp;source=web&amp;rct=j&amp;url=https://www.youtube.com/watch%3Fv%3D0MrtkU8twI8&amp;ved=2ahUKEwjNzMn02u7qAhWWUn0KHbUNAqAQyCkwAHoECAwQBA\" style=\"color: rgb(102, 0, 153); cursor: pointer;\"></a></h3><h3 class=\"LC20lb MMgsKf\" style=\"font-size: 20px; font-weight: normal; margin: 0px 0px 3px; padding: 2px 0px 0px; display: inline-block; line-height: 1.3;\">Yaara | Official Trailer | A ZEE5 Original Film | Premieres 30th ...</h3><p><b><font color=\"#efc631\"><span style=\"font-family: arial, sans-serif;\">Hindi.&nbsp;</span><span style=\"font-family: arial, sans-serif;\">Yaara</span><span style=\"font-family: arial, sans-serif;\">&nbsp;( transl. Friend) is an upcoming Indian Hindi-language crime drama&nbsp;</span><span style=\"font-family: arial, sans-serif;\">film</span><span style=\"font-family: arial, sans-serif;\">&nbsp;directed by Tigmanshu Dhulia. The&nbsp;</span><span style=\"font-family: arial, sans-serif;\">film</span><span style=\"font-family: arial, sans-serif;\">&nbsp;stars Vidyut Jammwal, Shruti Haasan, Amit Sadh, Vijay Varma and Kenny Basumatary.</span></font></b><video controls=\"\" src=\"http://localhost:8181/newsportal/Yaara%20_%20Official%20Trailer%20_%20A%20ZEE5%20Original%20Film%20_%20Premieres%2030th%20July%20on%20ZEE5%20(%20480%20X%20854%20).mp4\" width=\"640\" height=\"360\" class=\"note-video-clip\"></video><br></p>', '2020-07-28 00:40:57', '2020-07-28 00:42:05', 1, 'Yaara---A-ZEE5-Original---A-Tale-Of-True-Friendship', 'e5fcb370cd77237feefd5ddb82cc2786.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(10, 7, 'yoga', 'à¤¯à¥‹à¤— à¤¸à¤¹à¥€ à¤¤à¤°à¤¹ à¤¸à¥‡ à¤œà¥€à¤¨à¥‡ à¤•à¤¾ à¤µà¤¿à¤œà¥à¤žà¤¾à¤¨ à¤¹à¥ˆ à¤”à¤° à¤‡à¤¸ à¤²à¤¿à¤ à¤‡à¤¸à¥‡ à¤¦à¥ˆà¤¨à¤¿à¤• à¤œà¥€à¤µà¤¨ à¤®à¥‡à¤‚ à¤¶à¤¾à¤®à¤¿à¤² à¤•à¤¿à¤¯à¤¾ à¤œà¤¾à¤¨à¤¾ à¤šà¤¾à¤¹à¤¿à¤à¥¤ à¤¯à¤¹ à¤¹à¤®à¤¾à¤°à¥‡ à¤œà¥€à¤µà¤¨ à¤¸à¥‡ à¤œà¥à¤¡à¤¼à¥‡ à¤­à¥Œà¤¤à¤¿à¤•, à¤®à¤¾à¤¨à¤¸à¤¿à¤•, à¤­à¤¾à¤µà¤¨à¤¾à¤¤à¥à¤®à¤•, à¤†à¤¤à¥à¤®à¤¿à¤• à¤”à¤° à¤†à¤§à¥à¤¯à¤¾à¤¤à¥à¤®à¤¿à¤•, à¤†à¤¦à¤¿ à¤¸à¤­à¥€ à¤ªà¤¹à¤²à¥à¤“à¤‚ à¤ªà¤° à¤•à¤¾à¤® à¤•à¤°à¤¤à¤¾ à¤¹à¥ˆà¥¤ à¤¯à¥‹à¤— à¤•à¤¾ à¤…à¤°à¥à¤¥ à¤à¤•à¤¤à¤¾ à¤¯à¤¾ à¤¬à¤¾à¤‚à¤§à¤¨à¤¾ à¤¹à¥ˆà¥¤ à¤‡à¤¸ à¤¶à¤¬à¥à¤¦ à¤•à¥€ à¤œà¤¡à¤¼ à¤¹à¥ˆ à¤¸à¤‚à¤¸à¥à¤•à¥ƒà¤¤ à¤¶à¤¬à¥à¤¦ à¤¯à¥à¤œ, à¤œà¤¿à¤¸à¤•à¤¾ à¤®à¤¤à¤²à¤¬ à¤¹à¥ˆ à¤œà¥à¤¡à¤¼à¤¨à¤¾à¥¤', '2020-07-24 04:19:40', NULL, 1),
(11, 7, 'food', 'Healthy eating means eating a variety of foods that give you the nutrients you need to maintain your health, feel good, and have energy. These nutrients include protein, carbohydrates, fat, water, vitamins, and minerals. Nutrition is important for everyone.', '2020-07-24 04:20:15', NULL, 1),
(12, 8, 'daily news ', 'all the latest news updated in every hour #daily_news', '2020-07-24 04:49:06', NULL, 1),
(13, 9, 'Bollywood', 'Hindi cinema, often known as Bollywood and formerly as Bombay cinema, is the Indian Hindi-language film industry based in Mumbai (formerly Bombay). The term is a portmanteau of \"Bombay\" and \"Hollywood\".', '2020-07-28 00:34:49', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `uid` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`uid`, `uname`, `email`, `phno`, `password`, `location`, `creationdate`, `update_date`, `token`, `status`) VALUES
(504696194, 'Anshuman Bharatiya', 'bharatiyaa10@gmail.com', '7077514451', '$2y$10$7SvUs4gjPWkMNLzJFDnTfulXiI5K9g6c6KZOIzaVohZAAoL6iVBui', 'aaa', '2020-07-31 14:31:32', '2020-07-31 02:31:32', '41a24ac3bae20b31705293ce298038', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbak`
--
ALTER TABLE `feedbak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbak`
--
ALTER TABLE `feedbak`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504696195;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
