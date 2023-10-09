-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for fls
CREATE DATABASE IF NOT EXISTS `fls` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fls`;

-- Dumping structure for table fls.account_link
CREATE TABLE IF NOT EXISTS `account_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facebook` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `twitter` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `linkedin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `youtube` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_details_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_account_link_user_details` (`user_details_id`),
  CONSTRAINT `FK_account_link_user_details` FOREIGN KEY (`user_details_id`) REFERENCES `user_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.account_link: ~6 rows (approximately)
/*!40000 ALTER TABLE `account_link` DISABLE KEYS */;
INSERT INTO `account_link` (`id`, `facebook`, `twitter`, `linkedin`, `youtube`, `user_details_id`) VALUES
	(1, NULL, NULL, NULL, NULL, 2),
	(2, 'http://localhost/FLS/userProfile.php#', 'tw', 'li', 'yt', 5),
	(3, NULL, NULL, NULL, NULL, 2),
	(5, '', '', '', '', 6),
	(6, '', '', '', '', 7),
	(9, '', '', '', '', 8),
	(10, '', '', '', '', 9);
/*!40000 ALTER TABLE `account_link` ENABLE KEYS */;

-- Dumping structure for table fls.administrator
CREATE TABLE IF NOT EXISTS `administrator` (
  `IDUser` bigint NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Location` text NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.administrator: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;

-- Dumping structure for table fls.admin_account
CREATE TABLE IF NOT EXISTS `admin_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.admin_account: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin_account` DISABLE KEYS */;
INSERT INTO `admin_account` (`id`, `name`, `email`, `phone`, `verification_code`) VALUES
	(1, 'Thanujitha', 'thanujithad@gmail.com', 76485394, '63bf8ff2e6697');
/*!40000 ALTER TABLE `admin_account` ENABLE KEYS */;

-- Dumping structure for table fls.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `category_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_brand_category` (`category_id`),
  CONSTRAINT `FK_brand_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.brand: ~31 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`, `category_id`) VALUES
	(1, 'Logo Design', 1),
	(3, 'Web Programing', 2),
	(4, 'Book Design', 1),
	(5, 'Game Art', 1),
	(7, 'grapkics for Strement', 1),
	(9, 'Resume Design', 1),
	(10, 'Poster Design', 1),
	(11, 'Flyer Design', 1),
	(13, 'Cover Design', 1),
	(14, 'Social Media Design', 1),
	(15, 'Menu Design', 1),
	(16, 'Tatoo Design', 1),
	(17, 'Translation', 5),
	(18, 'Website Content', 5),
	(19, 'Cover Letters', 5),
	(20, 'Email Copy', 5),
	(21, 'Voice Over', 4),
	(22, 'Sound Design', 4),
	(23, 'Audio Editing', 4),
	(24, 'DJ Mixing', 4),
	(25, 'Wordpress', 2),
	(26, 'Website Bulders', 2),
	(27, 'Game Development', 2),
	(28, 'Web Programing', 2),
	(29, 'Mobile Apps', 2),
	(30, 'Desktop Application', 2),
	(31, 'Video Editing', 3),
	(33, 'Logo Animation', 3),
	(34, 'Social Media Videos', 3),
	(35, 'Music Video', 3),
	(36, 'Animation', 3);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table fls.candidate
CREATE TABLE IF NOT EXISTS `candidate` (
  `IDUser` bigint NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Location` text NOT NULL,
  `Contacts` int NOT NULL,
  `Address` text NOT NULL,
  `Form` text NOT NULL,
  `CV` text NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Nationality` text NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.candidate: ~0 rows (approximately)
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;

-- Dumping structure for table fls.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Graphics Design'),
	(2, 'Programing'),
	(3, 'Video & Animation'),
	(4, 'Music & audio'),
	(5, 'Writing & Tranlation');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table fls.company
CREATE TABLE IF NOT EXISTS `company` (
  `IDUser` bigint NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Location` text NOT NULL,
  `Fundation` date NOT NULL,
  `Headquarters` text NOT NULL,
  `Subscription Invoice` varchar(500) NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.company: ~0 rows (approximately)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping structure for table fls.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gigid` int NOT NULL,
  `userid` int NOT NULL,
  `feedback` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__gig` (`gigid`),
  KEY `FK__user` (`userid`),
  CONSTRAINT `FK__gig` FOREIGN KEY (`gigid`) REFERENCES `gig` (`id`),
  CONSTRAINT `FK__user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.feedback: ~2 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id`, `gigid`, `userid`, `feedback`, `date`) VALUES
	(1, 6, 1, 'I love working with Haider like always.', '2023-01-11 00:00:00'),
	(2, 6, 1, 'good', '2023-01-11 02:05:08');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table fls.gig
CREATE TABLE IF NOT EXISTS `gig` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_details_id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `brand_id` int NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `gig_image_id` int NOT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_gig_user_details` (`user_details_id`),
  KEY `FK_gig_brand` (`brand_id`),
  KEY `FK_gig_gig_image` (`gig_image_id`),
  CONSTRAINT `FK_gig_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `FK_gig_gig_image` FOREIGN KEY (`gig_image_id`) REFERENCES `gig_image` (`id`),
  CONSTRAINT `FK_gig_user_details` FOREIGN KEY (`user_details_id`) REFERENCES `user_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.gig: ~21 rows (approximately)
/*!40000 ALTER TABLE `gig` DISABLE KEYS */;
INSERT INTO `gig` (`id`, `user_details_id`, `title`, `brand_id`, `price`, `description`, `gig_image_id`, `date_time`) VALUES
	(4, 5, 'I will do professional photoshop manipulation in a few hours', 1, 14, 'Looking for qualified help with Photoshop editing? I am here to assist! \r\n\r\nI can do anything including and not limited to:\r\n\r\nRemoving objects and background, putting objects on different backgrounds;\r\nAdjusting the horizon, angle, perspective, lens correction;\r\nColor correction and color matchup: adjusting brightness, contrast, white balance;\r\nSpecial effects and photo enhancements;\r\nPhoto retouching (smoothing the skin, removing imperfections, blemishes, fly-away hair, whitening teeth, etc.)\r\nWork with portraits (including children and pet portraits, landscapes, product photos (Amazon, Etsy, eBay, Shopify), Linkedin & dating app (Tinder, etc.) profile photos and avatars, before / after photo templates.\r\n', 17, '2022-10-09 21:35:46'),
	(5, 5, 'I will be your website designer and web developer', 3, 41, 'I have strong skills at:\r\n\r\n\r\n\r\n️FRONT END - Web Design - HTML5 / CSS3 /  Bootstrap / JavaScript / jQuery / Angular / AJAX / Bootstrap studio\r\n\r\n\r\n\r\n️BACK END - Web Development - PHP / Laravel / Codeigniter / Web API / MySQL / Nodejs / Cakephp / Wordpress Plugin & Themes / Shopify Themes\r\n\r\n\r\n\r\n️CMS - Wordpress / Woocommerce / Shopify\r\n\r\n\r\n\r\nGig Includes: \r\n\r\n\r\n\r\nHTML, Angularjs, CSS, & PHP, Nodejs, Laravel web application development\r\nWordpress website design & development \r\nE-commerce site development\r\nCustom web applications development\r\nWordpress themes & plugins customization \r\nCustom CMS development \r\nMobile-Friendly design', 19, '2022-10-09 21:54:20'),
	(6, 6, 'I will professionally retouch your photo in photoshop', 1, 52, 'Suitable for:\r\n\r\nEditorial & Beauty\r\nPortrait & Lifestyle\r\nFashion & Commercial\r\nSocial Media Content, Lookbooks, and Campaigns for Brands\r\nTop reason to hire me:\r\n\r\n10+ years of experience \r\n\r\nQuick Delivery time \r\n\r\nBig discount on Big orders.', 20, '2022-10-09 21:58:28'),
	(7, 5, 'I will do adobe photoshop picture editing and photo retouching', 1, 45, 'I hope you are fine and i am very happy to see you here in my gig. I am professional graphic designer and have more than 6 years experience in this field. I will edit pictures for you very professionaly for Websites , Social , Blogs and for personal uses. I will provide you unlimited revisions and premium quality services in my gig. \r\n\r\n\r\n\r\nWhat you will get from me :\r\n\r\n⇛ Any Photo Editing\r\n\r\n⇛ Pictures Editing for Websites or Blogs\r\n\r\n⇛ Pictures Editing for Social Media\r\n\r\n⇛ Photo Retouching\r\n\r\n⇛ Product Images Editing and Retouching\r\n\r\n⇛ Face Swapping\r\n\r\n⇛ Photo Enhancement\r\n\r\n⇛ Photo Manipulation\r\n\r\n⇛ Background Removing\r\n\r\n⇛ Background Changing\r\n\r\n⇛ Jewelry Picture Editing \r\n\r\n⇛ Adding Object in Image\r\n\r\n⇛ Photo Resizing\r\n\r\n⇛ Photo Restoration', 21, '2022-10-09 21:58:51'),
	(8, 5, 'I will be your front end web developer or do frontend web development', 3, 252, 'Hi there,\r\n\r\n\r\n\r\nMy-self Atikul Jaman a front end web developer based in Bangladesh. I can develop any type of responsive website for you. You can count on me to build you a responsive website so that it looks great on all screens, including small and wide ones. As a Fiverr seller, I primarily strive to deliver complete work of high quality to you. I have a rigorous amount of skills in HTML, CSS, Bootstrap, React Bootstrap, JavaScript, React JS, Node JS, Express JS, MongoDB, Firebase, etc. I can build you a website based on the technology that you want HTML/CSS/JS or React JS. I can convert PSD to HTML, Figma to HTML, or react js. And of course, my code is clean, maintainable, readable, and provides animations and transitions for your ideas. Please count on me to serve you well as your front end web developer.\r\n\r\n\r\n\r\nServices:\r\n\r\n\r\n\r\nFully-responsive design\r\nGood structure of code\r\nReact Js front end development\r\nHTML5, CSS3 code\r\nBootstrap latest version', 22, '2022-10-10 22:01:18'),
	(9, 5, 'I Will creative Photo editing ', 1, 55, 'I Will creative Photo editing I Will creative Photo editing \r\nI Will creative Photo editing I Will creative Photo editing I Will creative Photo editing \r\nI Will creative Photo editing \r\nI Will creative Photo editing \r\nI Will creative Photo editing \r\n\r\n\r\nI Will creative Photo editing I Will creative Photo editing ', 23, '2022-10-10 22:14:44'),
	(10, 5, 'I will develop, design or customize wordpress websites or web apps', 3, 45, 'I can help you with any kind of PHP or design styling issues. This may include server side error, fetching of data or any other kind of programming issue.LEAVE IT TO ME i will resolve it. I can create a whole website for you from scratch. \r\n\r\n\r\n\r\nI will assist you in creating a new website, catching and fixing the bugs. I have more than 5 years experience in simple and frameworks of PHP. I have done many projects.\r\n\r\n\r\n\r\nI am providing following service.\r\n\r\nDebug and fix PHP code.\r\nCreate new website from scratch\r\nInstallation of script\r\nFix any HTML / HTML5,Bootstrap or  CSS / CSS3 styling issue.\r\nFix any javascript/Jquery issue.\r\nWrite PHP code as per your requirement.\r\nAPI Integrations\r\nOr any other work related to PHP websites.\r\n\r\nPlease contact me first before making any order and explain in detail what you want me to do.', 28, '2022-10-11 23:32:57'),
	(11, 6, 'I will do website development, web design with wordpress      ', 3, 102, 'Description\r\nello & Welcome to my gig.\r\nWhy Me?\r\n\r\n\r\n\r\nI am very easy to work with because I am good at communication. I always dedicate myself completely to the task for 100% job satisfaction.\r\n\r\n\r\n\r\nI always understand the job requirement first. You will face so many questions from me related to your job. So be ready for that. \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nServices Offered:\r\n\r\n\r\n\r\nHighly Professional Design\r\n\r\n100% Unlimited revisions\r\n\r\nMobile Friendly websites\r\n\r\nE-commerce store\r\n\r\nWebsites for All professions\r\n\r\nReal Estate (IDX / MLS)\r\n\r\nSEO Friendly URLs\r\n\r\nSecure Websites\r\n\r\nEasy to use Admin Panel \r\n\r\nCustom Designing\r\n\r\nUser friendly and attractive layout\r\n\r\nNewsletter subscription, Mailing lists\r\n\r\nAnd much more\r\n\r\n\r\n\r\n\r\n\r\nWhy this gig?\r\n\r\n\r\n\r\nClean, Modern and Engaging Web Design\r\n\r\nWell Organized, w3C Validate and Clean Code\r\n\r\nSEO Optimized, SEO friendly URLs \r\n\r\nCross-Browser Compatibility\r\n\r\nBuild 100% Responsive Website\r\n\r\nLight, Fast and Performant\r\n\r\nEasy to use admin panel With no coding experience\r\n\r\nVideo tutorial for easy instructions\r\n\r\nOutstanding Support Service\r\n\r\nSocial Media Integration\r\n\r\nGoogle Maps\r\n\r\nContact Forms\r\n\r\n\r\n\r\n\r\n\r\nCustom & Mobile App Development:\r\n\r\n\r\n\r\nI also offer complete custom-coded websites and mobile apps in Nodejs, ReactJs, Gatsby, and React Native. \r\n\r\n\r\n\r\nThank you\r\n\r\nNauman', 29, '2022-10-11 23:42:10'),
	(12, 6, 'I will design awesome logo for sports team or events', 1, 50, 'Hello, I am a professional for any kind of logo for your sports team (Football, Soccer, Basketball, Baseball, Hockey, Volleyball), sports program, events, leagues, tournaments, etc.\r\n\r\n\r\n\r\nEMERALD Package :\r\n\r\n1 concept (2 colors only and no IMAGE) TEXTUAL LOGO ONLY.\r\n\r\nHigh-Quality Design\r\nHigh Resolutions (2000x2000px)\r\nPNG (Transparency File)\r\n\r\n\r\nSAPPHIRE Package :\r\n\r\n1 design with 2 concepts and 1 final design on delivery (max 3 colors with shading)\r\nHigh-Quality Design\r\nHigh Resolutions (2000x2000px)\r\nVector file (PDF)\r\nPNG (Transparency File)\r\n', 30, '2022-11-09 09:59:33'),
	(13, 6, 'I will do book cover design, book layout, and ebook design ', 4, 250, 'If youre looking to self-publish a book, this is the perfect gig for you!\r\n\r\n\r\n\r\nWhat do you get for each package offered?\r\n\r\n\r\n\r\nBASIC\r\n\r\nPrint-Ready Full Cover\r\nFront Cover\r\nSpine\r\nBack Cover\r\n3D Cover\r\n\r\n\r\nSTANDARD\r\n\r\nPrint-Ready Interior Formatting PDF (limitation: Plain Texts, up to 5 images, less than 50,000-word count)\r\n\r\n\r\nPREMIUM\r\n\r\nPrint-Ready Full Cover\r\nFront Cover\r\nSpine\r\nBack Cover\r\n3D Cover\r\nPrint-Ready Interior Formatting PDF (limitation: Plain Texts, up to 5 images, less than 50,000-word count)\r\neBook File (EPUB or MOBI)', 31, '2022-11-10 10:02:26'),
	(14, 7, 'I will do pixel art items, spells, skills and UI icons for your game', 5, 650, 'Thank you for contacting me before placing an order.\r\n\r\n\r\n\r\nMy pixel art icons are high detailed, cool looking, very creative and vibrant colored.\r\n\r\n\r\n\r\nWill do the best icons in any style and for the games of any genre. Perfect for adventures, RPG, platformers, shooter or action. Fantasy, cyber punk, medieval, modern, technological. Icons for UI; any item, weapon, armor, ingredient for shop or brewery, craft, witchcraft, potion bottle, scrolls; spells, magic skills and special abilities icons for any type of the character.\r\n\r\n\r\n\r\nWork comfortable with any size.', 34, '2022-11-10 10:08:42'),
	(15, 7, 'I will create game arts with 10 yrs experiences', 5, 252, 'I do art and design about Concept arts or Game Materials.\r\n\r\nKindly contact for questions.\r\n\r\n\r\n\r\nConcept Art\r\n\r\n- Game Character\r\n\r\n- Game Environment\r\n\r\n- Game visual\r\n\r\n- Story concept arts (Key frame)\r\n\r\n\r\n\r\nGame Material\r\n\r\n- Game Sprites\r\n\r\n- Game Item\r\n\r\n- Game Tiles\r\n\r\n- Game Map\r\n\r\n- Interface Design', 35, '2022-11-10 10:10:14'),
	(16, 7, 'I will draw for you 2d game art, icons ,objects, props', 5, 250, 'What can i draw for you?\r\n\r\ngame art, icons , objects, props.\r\n\r\n\r\nWhat to do for this?\r\n\r\nwrite me in advance\r\ndescribe the project . For example: icon / size 2000x2000px (ppi if you want) / round glass bottle / green liquid inside that glows / brown classic cork. he more detailed the better\r\n\r\n\r\n\r\n\r\n\r\n\r\nWhat will you get?\r\n\r\n100% original unique design.\r\nhigh quality of your project.\r\n\r\n\r\n', 36, '2022-11-10 10:11:39'),
	(17, 7, 'I will design business, corporate flyer', 11, 20, '***100% overall rating!!!\r\nVery helpful and responsive designer! Never let the customer down!\r\n\r\nI will design superb Corporate flyers and brochures for your interest! ORDER NOW and you will get a high quality design that really STANDS OUT!\r\n\r\nBasic Gig price ($30) is just for a single page flyer.\r\n\r\n*** 24 hours DELIVERY, PRINT ready PDF file and editable PSD file -------available with extra gigs below!\r\n\r\nNote: Revisions are included for 3 days after the order is delivered. Once the order is completed, you have to pay a gig to ask for revisions.\r\n\r\nUnlimited revisions until 100% satisfaction!\r\n\r\nFeel free to contact me for anything!', 37, '2022-11-10 10:12:43'),
	(18, 5, 'I will create your web or programming assignments', 3, 520, '\r\n✪✪✪✪✪✪✪✪ Limited 1st 10 buyers Offer: ✪✪✪✪✪✪✪✪\r\n\r\n✪ ✺ Free Assignment Title page ✪\r\n\r\n✪ ✺ Free proofreading  ✪\r\n\r\n✪ ✺ Unlimited Revisions ✪\r\n\r\n\r\n\r\nI will do your web or Programming assignments in following languages, (ask me if anything not listed here ):\r\n\r\n\r\n\r\nC++\r\nC#\r\nOOP\r\nJAVA\r\nHTML\r\nCSS\r\nMYSQL\r\nJAVASCRIPT\r\nBootstrap\r\nWEBSITE WITH CONTACT FORM', 38, '2022-11-10 10:15:02'),
	(19, 8, 'I will provide video editing using after effects and premiere pro', 33, 452, 'Please note: For Professional social media videos (Instagram/tiktok etc) Standard package is recommended. Basic package will not cover the needs for it.\r\n\r\nFor professional quality YouTube/Event/commercial videos my premium package is recommended.\r\n\r\nKindly Contact Before Placing Your Order, So That I Can Identify The Best Package For Your Video.\r\n\r\n\r\n\r\nI am a professional Video Editor and Post-Producer with more than 5 years of experience.\r\n\r\nI have done many projects for clients from all over the world with 100% success rate. \r\n\r\n\r\n\r\nCustomer Satisfaction is my Top Priority :)\r\n\r\n', 40, '2022-11-10 10:27:30'),
	(20, 8, 'I will professionally edit your video optimized for social media', 34, 520, 'I have been a video editor for the last seven years. I mostly have worked on my own youtube video for the past years and some client work. \r\n\r\n\r\n\r\nIf you been on an amazing trip for your holiday. You have a deep desire to educate people on Instagram, TikTok or Twitter or other social media. This is the right gig for you if you want help for your desired platform. \r\n\r\nI can assist with cutting the footage, color correction, color grading, adding subtitles, make your audio better, adding music, cut to the beat and add small graphics to your video as well.\r\n\r\nNo matter what type of video (social media, advertising, corporate, showreel) you are looking for, I am sure together we will find the right way for your story.\r\n\r\nAnd I will deliver in any format you need. (Youtube, Vimeo, Instagram (Story, Post, IGTV), Facebook, TikTok, LinkedIn …)', 41, '2022-11-10 10:29:08'),
	(21, 8, 'I will animate your still image into cinemagraph', 36, 120, 'I do animation of any kind of Artwork, NFTs, real-life images, product Photography, For Motion Poster, Food photography, Anime, cartoons, etc.\r\n\r\n\r\n\r\nAnimation nature types- Stop motion animation, Parallax animation, Product reveal or mechanism animation, Loop animation, etc.\r\n\r\n\r\n\r\n100% Satisfaction Guaranteed\r\n\r\nGIF/Mp4/Webm file also available\r\n\r\nImage to Video For Social media Advertisement.\r\n\r\nBoost Your Product Image to Next Level.\r\n\r\n', 42, '2022-11-10 10:30:14'),
	(22, 8, 'I will draw simple animation background or just bg illustration', 36, 520, 'Hi, i will draw background environment for your need, illustration can be done in bitmap format\r\n\r\n\r\n\r\nif u want some background painting for your portrait illustration or for bussines or for gift or maybe for youtube background video, etc. you can contact me :)\r\n\r\n\r\n\r\nyou will get high resolution image in a4 size or max 1920x1080 px in 300dpi with format .jpeg or .png format file even the raw format. the price exclude for animation and characters additional.', 43, '2022-11-10 10:31:20'),
	(23, 8, 'I will provide noise removal, audio editing and quantization', 23, 242, 'WHY HIRE ME\r\n\r\nI religiously believe in the accuracy of any service I offer my clients. Unlike many I-DO-IT-ALL producers who have limited time/budget in dealing with editing seriously enough, I invest all the time that a project really REQUIRES to be winning, regardless of the money involved\r\n\r\n\r\n\r\n• All my offers include: Unlimited Revisions\r\n\r\n• 1-day & 2-day turnarounds upon request\r\n\r\n• Track Comping, Gain-staging, Strip-silence and Music Feedback available in Gig Extras\r\n\r\n• Need Vocal Tuning? -> https://www.fiverr.com/share/xEZ9ZD\r\n\r\n\r\n\r\nABOUT\r\n\r\nMy name is Gianluca Magalotti and I am a dedicagted music professional at the service of art. I will edit and time-align your tracks by accurately preserving their human feel, unlike what quantization tools do', 44, '2022-11-10 10:32:50'),
	(24, 5, 'I will develop and design 2d games and nft games', 27, 520, '2D game expert, can create any sort of game as per your requirements. EXPERT in making Clones of popular games like flappy bird etc. I can create any 2D game as you need, just contact me discuss details and we will be ready to go. I can create hyper casual games, kids games and Education games as well.\r\n\r\nI do game art as well, including game ui/ux, character design etc.', 47, '2022-11-10 10:40:45'),
	(25, 5, 'I will rewrite and improve your website content', 18, 20, '\r\nSEO and updated website content is the key to driving website traffic, which ultimately results in online success. I will take your outdated, old, or boring website content and rewrite it to be polished, fresh, and user friendly. Or maybe you have new content that needs to be summarized or rewritten in a more succinct manner. I will make sure this is a collaborative process and will work with you each step of the way to ensure I am delivering exactly what you need and expect. My goal is to exceed the expectations of every client!\r\n\r\n', 48, '2022-11-10 10:42:28'),
	(26, 6, 'I will do professional youtube video editing', 34, 250, 'I am Aqib, an experienced video editor specializing YouTube, Vimeo video editing and all types of video editing.\r\n\r\n\r\n\r\n* Available 24/7\r\n\r\n* Editing for Personal and Commercial Use\r\n\r\n* Using Adobe Premier Pro & Adobe After Effects\r\n\r\n* High quality, professional service\r\n\r\n* YouTube, Vimeo, Kajabi and Dailymotion “ready” videos\r\n\r\n* Videos can be provided in almost any format', 49, '2022-11-10 10:44:36'),
	(27, 5, 'pohoto editing', 1, 50, 'gf ggr ggbgfgvfgnhn bbbbbbb bbbbgtrhtyhtyhytjjjhhhh jbighihggf ggr ggbgfgvfgnhn bbbbbbb bbbbgtrhtyhtyhytjjjhhhh jbighihgjttvgf ggr ggbgfgvfgnhn bbbbbbb bbbbgtrhtyhtyhytjjjhhhh jbighihgjttvgf ggr ggbgfgvfgnhn bbbbbbb bbbbgtrhtyhtyhytjjjhhhh jbighihgjttvgf ggr ggbgfgvfgnhn bbbbbbb bbbbgtrhtyhtyhytjjjhhhh jbighihgjttvgf ggr ggbgfgvfgnhn bbbbbbb bbbbgtrhtyhtyhytjjjhhhh jbighihgjttvjttv', 52, '2023-01-09 09:30:20');
/*!40000 ALTER TABLE `gig` ENABLE KEYS */;

-- Dumping structure for table fls.gig_image
CREATE TABLE IF NOT EXISTS `gig_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url1` varchar(50) DEFAULT NULL,
  `url2` varchar(50) DEFAULT NULL,
  `url3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.gig_image: ~45 rows (approximately)
/*!40000 ALTER TABLE `gig_image` DISABLE KEYS */;
INSERT INTO `gig_image` (`id`, `url1`, `url2`, `url3`) VALUES
	(1, 'resources//products//6348260ea31f5.jpeg', 'resources//products//6348260ef200f.jpeg', 'resources//products//6348260ef2655.jpeg'),
	(2, 'resources//products//63482661cca20.jpeg', 'resources//products//63482661ccf58.jpeg', 'resources//products//63482661cd3ee.jpeg'),
	(3, 'resources//products//63482b87d87e3.jpeg', '', ''),
	(4, 'resources//products//63482cdb24e45.jpeg', '', ''),
	(5, 'resources//products//63482dbe43bcd.jpeg', '', ''),
	(6, 'resources//products//63482ec9030ac.jpeg', '', ''),
	(7, 'resources//products//63482f33e4195.jpeg', '', ''),
	(8, 'resources//products//63482f631a7cf.jpeg', 'resources//products//63482f631ac6b.jpeg', 'resources//products//63482f631b125.jpeg'),
	(9, 'resources//products//63483179f30c7.jpeg', '', ''),
	(10, 'resources//products//634831e74f921.jpeg', '', ''),
	(11, 'resources//products//63483218da9b8.jpeg', '', ''),
	(12, 'resources//products//63483235e7153.jpeg', '', ''),
	(13, 'resources//products//634834e0d62b4.jpeg', '', ''),
	(14, 'resources//products//6348356a8d42d.jpeg', '', ''),
	(15, 'resources//products//634835c723500.jpeg', '', ''),
	(16, 'resources//products//635fd56481171.jpeg', 'http://localhost/FLS/resources/upload.png', 'http://localhost/FLS/resources/upload.png'),
	(17, 'resources//products//635fd591ab1c8.jpeg', 'http://localhost/FLS/resources/upload.png', 'http://localhost/FLS/resources/upload.png'),
	(18, 'resources//products//634adb37e7150.jpeg', '', ''),
	(19, 'resources//products//634adeb4d8d3e.jpeg', 'resources//products//634adeb4d8ef9.jpeg', 'resources//products//634adeb4d9021.jpeg'),
	(20, 'resources//products//635fd67058d2f.jpeg', 'resources//products//635fd67058eeb.jpeg', 'http://localhost/FLS/resources/upload.png'),
	(21, 'resources//products//635fd6b8281ee.jpeg', 'resources//products//635fd6b82888d.jpeg', 'http://localhost/FLS/resources/upload.png'),
	(22, 'resources//products//635fd6f6dc7c9.jpeg', 'resources//products//635fd6f6dc973.jpeg', 'http://localhost/FLS/resources/upload.png'),
	(23, 'resources//products//635fd866142da.jpeg', 'resources//products//635fd866144a4.jpeg', 'http://localhost/FLS/resources/upload.png'),
	(24, 'resources//products//634ae3ebacca1.jpeg', '', ''),
	(25, 'resources//products//63597592a4ee1.jpeg', 'resources//products//63597592a531c.jpeg', ''),
	(26, 'resources//products//635975d608589.jpeg', '', ''),
	(27, 'resources//products//6359762e9adf6.jpeg', '', ''),
	(28, 'resources//products//635fd7e120fde.jpeg', 'http://localhost/FLS/resources/upload.png', 'http://localhost/FLS/resources/upload.png'),
	(29, 'resources//products//635fd3e296b28.jpeg', 'resources//products//635fd3e296d16.jpeg', 'http://localhost/FLS/resources/upload.png'),
	(30, 'resources//products//6361f22d0a3e2.jpeg', 'resources//products//6361f22d0a76e.jpeg', 'resources//products//6361f22d0ae32.jpeg'),
	(31, 'resources//products//6361f2dac67a5.jpeg', 'resources//products//6361f2dac6ac6.jpeg', 'resources//products//6361f2dac6db2.jpeg'),
	(32, 'resources//products//6361f3af281dc.jpeg', 'resources//products//6361f3af28485.jpeg', 'resources//products//6361f3af28625.jpeg'),
	(33, 'resources//products//6361f3e22fed3.jpeg', 'resources//products//6361f3e230126.jpeg', 'resources//products//6361f3e230293.jpeg'),
	(34, 'resources//products//6361f4521972c.jpeg', 'resources//products//6361f4521990c.jpeg', ''),
	(35, 'resources//products//6361f4ae181fb.jpeg', 'resources//products//6361f4ae183a8.jpeg', ''),
	(36, 'resources//products//6361f503ddfa5.jpeg', 'resources//products//6361f503de16a.jpeg', 'resources//products//6361f503de28a.jpeg'),
	(37, 'resources//products//6361f543dd314.jpeg', 'resources//products//6361f543dd4d5.jpeg', ''),
	(38, 'resources//products//6361f5cebf43c.jpeg', 'resources//products//6361f5cebf764.jpeg', ''),
	(39, 'resources//products//6361f60fd9c0f.jpeg', 'resources//products//6361f60fd9dc3.jpeg', ''),
	(40, 'resources//products//6361f8ba9729c.jpeg', 'resources//products//6361f8ba97461.jpeg', ''),
	(41, 'resources//products//6361f91cc16f5.jpeg', 'resources//products//6361f91cc1896.jpeg', ''),
	(42, 'resources//products//6361f95e656ec.jpeg', 'resources//products//6361f95e65891.jpeg', ''),
	(43, 'resources//products//6361f9a0bfed9.jpeg', 'resources//products//6361f9a0c015e.jpeg', 'resources//products//6361f9a0c5809.jpeg'),
	(44, 'resources//products//6361f9fa5fe05.jpeg', '', ''),
	(45, 'resources//products//6361fb029b620.jpeg', 'resources//products//6361fb029b7bf.jpeg', ''),
	(46, 'resources//products//6361fb425266d.jpeg', 'resources//products//6361fb4252be2.jpeg', 'resources//products//6361fb4252cc3.jpeg'),
	(47, 'resources//products//6361fbd57b8fe.jpeg', 'resources//products//6361fbd57bae0.jpeg', 'resources//products//6361fbd57bc7c.jpeg'),
	(48, 'resources//products//6361fc3c61cd1.jpeg', '', ''),
	(49, 'resources//products//6361fcbc57a06.jpeg', 'resources//products//6361fcbc57bc8.jpeg', 'resources//products//6361fcbc57cc8.jpeg'),
	(50, 'resources//products//6361fcfcb4fd1.jpeg', '', ''),
	(51, 'resources//products//6361fd21f11fa.jpeg', 'resources//products//6361fd21f15b8.jpeg', ''),
	(52, 'resources//products//63bf85d4651bc.jpeg', 'resources//products//63bf85d48d37f.jpeg', 'resources//products//63bf85d48d9da.jpeg');
/*!40000 ALTER TABLE `gig_image` ENABLE KEYS */;

-- Dumping structure for table fls.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL DEFAULT '0',
  `Price` int NOT NULL DEFAULT '0',
  `bayerId` int DEFAULT NULL,
  `supplyerId` int DEFAULT NULL COMMENT 'gewu kena',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__order` (`order_id`),
  KEY `FK_pay_user` (`bayerId`),
  KEY `FK_pay_user_2` (`supplyerId`),
  CONSTRAINT `FK__order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `FK_pay_user` FOREIGN KEY (`bayerId`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_pay_user_2` FOREIGN KEY (`supplyerId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.invoice: ~5 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `order_id`, `Price`, `bayerId`, `supplyerId`, `date`) VALUES
	(27, 19, 46, 1, 7, '2023-01-09 23:45:19'),
	(72, 19, 46, 1, 7, '2023-01-09 23:45:57'),
	(73, 19, 46, 1, 7, '2023-01-09 23:45:58'),
	(74, 19, 46, 1, 7, '2023-01-09 23:45:58'),
	(165, 20, 51, 7, 1, '2023-01-10 01:07:50'),
	(166, 27, 53, 7, 1, '2023-01-12 09:33:29');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table fls.massage
CREATE TABLE IF NOT EXISTS `massage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL DEFAULT '0',
  `to_id` int NOT NULL DEFAULT '0',
  `message` text,
  `dateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_massage_user` (`sender_id`),
  KEY `FK_massage_user_2` (`to_id`),
  CONSTRAINT `FK_massage_user` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_massage_user_2` FOREIGN KEY (`to_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.massage: ~36 rows (approximately)
/*!40000 ALTER TABLE `massage` DISABLE KEYS */;
INSERT INTO `massage` (`id`, `sender_id`, `to_id`, `message`, `dateTime`) VALUES
	(1, 7, 1, 'cv', '2022-11-01 13:27:20'),
	(2, 7, 1, 'how are you', '2022-11-01 13:29:22'),
	(3, 7, 1, 'bro', '2022-11-01 13:29:26'),
	(4, 7, 1, 'hi', '2022-11-01 13:30:06'),
	(5, 7, 4, 'hi', '2022-11-01 13:33:15'),
	(6, 4, 7, 'hr', '2022-11-01 13:34:19'),
	(7, 7, 5, NULL, '2022-11-08 16:05:55'),
	(8, 1, 7, 'hi', '2022-11-12 13:27:02'),
	(9, 1, 7, 'jgc', '2022-11-09 21:12:27'),
	(10, 7, 1, 'ccvv', '2022-11-09 21:14:11'),
	(11, 7, 1, '12', '2022-11-15 21:15:42'),
	(12, 1, 7, 'th', '2022-11-09 21:16:52'),
	(13, 7, 1, 'abc', '2022-11-09 21:17:15'),
	(14, 7, 1, 's', '2022-11-09 21:25:25'),
	(15, 7, 1, 'hju', '2022-11-09 21:26:43'),
	(16, 7, 4, 'abcd', '2022-11-09 21:26:55'),
	(17, 7, 1, 'hallo', '2022-11-09 21:28:45'),
	(18, 7, 4, 'abc', '2022-11-09 21:29:28'),
	(19, 1, 7, 'abc', '2022-11-09 21:34:15'),
	(20, 7, 1, '125100535', '2022-11-15 21:36:46'),
	(21, 1, 7, 'dfdfgrg', '2022-11-09 21:44:07'),
	(22, 1, 7, 'dfdfgrg', '2022-11-09 21:44:13'),
	(23, 1, 7, 'dfdfgrg', '2022-11-09 21:44:13'),
	(24, 1, 7, 'dfdfgrg', '2022-11-09 21:44:13'),
	(25, 7, 1, 'dfdfgrg', '2022-11-09 21:44:13'),
	(26, 1, 7, '123', '2022-11-09 21:59:34'),
	(27, 1, 7, 's', '2022-11-10 22:00:32'),
	(28, 1, 7, 'scdbghkil gfngmnbnfg hku', '2022-11-10 22:01:21'),
	(29, 1, 7, '520263', '2022-11-10 22:03:04'),
	(30, 7, 1, '4', '2022-11-10 22:24:17'),
	(31, 1, 7, '4', '2022-11-10 22:24:37'),
	(32, 1, 7, '12', '2022-11-10 22:25:57'),
	(33, 7, 1, 'd', '2022-11-10 22:27:29'),
	(34, 1, 7, 'hallo sir,', '2022-11-15 23:32:26'),
	(35, 1, 4, 'hello sir', '2022-11-15 23:40:48'),
	(36, 1, 4, 'yes', '2022-11-16 00:01:31'),
	(37, 1, 4, 'hi', '2023-01-12 08:59:22');
/*!40000 ALTER TABLE `massage` ENABLE KEYS */;

-- Dumping structure for table fls.match
CREATE TABLE IF NOT EXISTS `match` (
  `IDMatch` int NOT NULL AUTO_INCREMENT,
  `IDUser` bigint NOT NULL,
  `IDVacancy` bigint NOT NULL,
  `Date` date NOT NULL,
  `Score` smallint NOT NULL,
  PRIMARY KEY (`IDMatch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.match: ~0 rows (approximately)
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
/*!40000 ALTER TABLE `match` ENABLE KEYS */;

-- Dumping structure for table fls.myfavorite
CREATE TABLE IF NOT EXISTS `myfavorite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gig_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_myfavorite_gig` (`gig_id`),
  KEY `FK_myfavorite_user` (`user_id`),
  CONSTRAINT `FK_myfavorite_gig` FOREIGN KEY (`gig_id`) REFERENCES `gig` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.myfavorite: ~21 rows (approximately)
/*!40000 ALTER TABLE `myfavorite` DISABLE KEYS */;
INSERT INTO `myfavorite` (`id`, `gig_id`, `user_id`) VALUES
	(1, 12, 5),
	(2, 13, 5),
	(3, 12, 1),
	(4, 14, 1),
	(5, 7, 7),
	(6, 9, 7),
	(7, 18, 7),
	(8, 8, 7),
	(9, 21, 7),
	(10, 23, 7),
	(11, 15, 7),
	(12, 24, 7),
	(13, 22, 7),
	(14, 4, 7),
	(15, 13, 1),
	(16, 21, 1),
	(17, 15, 1),
	(18, 11, 1),
	(19, 20, 1),
	(20, 23, 1),
	(21, 17, 1);
/*!40000 ALTER TABLE `myfavorite` ENABLE KEYS */;

-- Dumping structure for table fls.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `completOrderFile` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `plashOrderFile` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `gigId` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `date_Time` datetime DEFAULT NULL,
  `delivered_time` date DEFAULT NULL,
  `orderStatus_id` int DEFAULT NULL,
  `delever_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_gig` (`gigId`),
  KEY `FK_order_orderstatus` (`orderStatus_id`),
  KEY `FK_order_user` (`user_id`),
  CONSTRAINT `FK_order_gig` FOREIGN KEY (`gigId`) REFERENCES `gig` (`id`),
  CONSTRAINT `FK_order_orderstatus` FOREIGN KEY (`orderStatus_id`) REFERENCES `orderstatus` (`id`),
  CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.order: ~7 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`id`, `completOrderFile`, `plashOrderFile`, `message`, `gigId`, `user_id`, `date_Time`, `delivered_time`, `orderStatus_id`, `delever_date`) VALUES
	(19, 'resources//orderFile//637fa560ba528.zip', 'resources//orderFile//637f94437c49b.zip', '', 7, 7, '2022-11-24 21:26:51', '2022-12-10', 1, '2022-11-24 22:39:52'),
	(20, 'resources//orderFile//637fab8f9a47b.zip', 'resources//orderFile//637f98088fef2.zip', 'new', 12, 1, '2022-11-24 21:42:56', '2022-11-30', 1, '2022-11-24 23:06:15'),
	(21, NULL, 'resources//orderFile//637fbc366ef35.zip', '', 13, 1, '2022-11-25 00:17:18', '2022-12-10', 3, NULL),
	(22, NULL, 'resources//orderFile//63b851ba54f11.zip', '', 4, 7, '2023-01-06 22:22:10', '2023-01-18', 4, '2023-01-07 18:54:17'),
	(23, NULL, 'resources//orderFile//63b943d7dfee7.zip', '', 21, 7, '2023-01-07 15:35:11', '2023-01-11', 4, '2023-01-07 18:54:50'),
	(26, NULL, 'resources//orderFile//63b9723deeead.zip', '', 14, 7, '2023-01-07 18:53:09', '2023-01-17', 2, NULL),
	(27, 'resources//orderFile//63b97ba2ec7fd.zip', 'resources//orderFile//63b97b5e8d6d9.zip', '', 6, 1, '2023-01-10 19:32:06', '2023-01-18', 1, '2023-01-07 19:33:13'),
	(28, NULL, 'resources//orderFile//63bb14d56dbcd.zip', '', 10, 7, '2023-01-09 00:39:09', '2023-01-18', 2, NULL),
	(29, NULL, 'resources//orderFile//63bda31e5c80b.zip', 'fdv geg', 9, 7, '2023-01-10 23:10:46', '2023-01-18', 2, NULL),
	(30, NULL, 'resources//orderFile//63bf8649481b6.zip', '', 12, 1, '2023-01-12 09:32:17', '2023-01-25', 2, NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table fls.orderstatus
CREATE TABLE IF NOT EXISTS `orderstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.orderstatus: ~2 rows (approximately)
/*!40000 ALTER TABLE `orderstatus` DISABLE KEYS */;
INSERT INTO `orderstatus` (`id`, `name`) VALUES
	(1, 'Complete'),
	(2, 'Active Order'),
	(3, 'Delivary Time out'),
	(4, 'Cancel');
/*!40000 ALTER TABLE `orderstatus` ENABLE KEYS */;

-- Dumping structure for table fls.page_name
CREATE TABLE IF NOT EXISTS `page_name` (
  `name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.page_name: ~0 rows (approximately)
/*!40000 ALTER TABLE `page_name` DISABLE KEYS */;
INSERT INTO `page_name` (`name`) VALUES
	('MoneyLovers'),
	('v');
/*!40000 ALTER TABLE `page_name` ENABLE KEYS */;

-- Dumping structure for table fls.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(50) DEFAULT NULL,
  `user_details_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_profile_image_user_details` (`user_details_id`),
  CONSTRAINT `FK_profile_image_user_details` FOREIGN KEY (`user_details_id`) REFERENCES `user_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.profile_image: ~4 rows (approximately)
/*!40000 ALTER TABLE `profile_image` DISABLE KEYS */;
INSERT INTO `profile_image` (`id`, `url`, `user_details_id`) VALUES
	(1, 'resources//profileImage//63bd9e4637caf.jpeg', 5),
	(2, 'resources//profileImage//635975595e8ed.jpeg', 6),
	(3, 'resources//profileImage//6361f3670adf4.jpeg', 7),
	(4, 'resources//profileImage//6361f86bc4ad1.jpeg', 8);
/*!40000 ALTER TABLE `profile_image` ENABLE KEYS */;

-- Dumping structure for table fls.qualifications
CREATE TABLE IF NOT EXISTS `qualifications` (
  `IDUser` bigint NOT NULL,
  `ID` bigint NOT NULL,
  `Academic Degrees` varchar(100) NOT NULL,
  `qualifications_ibfk_1` varchar(100) NOT NULL,
  PRIMARY KEY (`IDUser`),
  CONSTRAINT `qualifications_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `candidate` (`IDUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.qualifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `qualifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `qualifications` ENABLE KEYS */;

-- Dumping structure for table fls.subscription
CREATE TABLE IF NOT EXISTS `subscription` (
  `IDSubscription` bigint NOT NULL,
  `IDUser` bigint NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `Start date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `End date` datetime NOT NULL,
  `State` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.subscription: ~0 rows (approximately)
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;

-- Dumping structure for table fls.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `joined_date` datetime NOT NULL,
  `verification_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cookie_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.user: ~8 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `password`, `joined_date`, `verification_code`, `cookie_id`) VALUES
	(1, 'thanujithad@gmail.com', '123456', '2022-08-26 22:01:18', '63bf877133247', '63bf87580730f1'),
	(2, 'thanujitha@gmail.com', '123456', '2022-08-26 22:24:31', NULL, NULL),
	(3, 'dilshan@gmail.com', '123456', '2022-08-26 22:26:30', '630e785697e80', NULL),
	(4, 'ruwan@gmail.com', '123456', '2022-08-26 22:27:39', NULL, NULL),
	(5, 'thanujit@gmail.com', '123456', '2022-09-01 23:05:45', NULL, NULL),
	(6, 'th@g.com', '123456', '2022-09-30 23:58:58', NULL, NULL),
	(7, 'abc@gmail.com', '123456789', '2022-10-26 23:18:58', NULL, '63ba618d8b0027'),
	(8, 'thanujitha123@gmail.com', '123456', '2022-11-02 10:34:07', NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table fls.userstatus
CREATE TABLE IF NOT EXISTS `userstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.userstatus: ~2 rows (approximately)
/*!40000 ALTER TABLE `userstatus` DISABLE KEYS */;
INSERT INTO `userstatus` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');
/*!40000 ALTER TABLE `userstatus` ENABLE KEYS */;

-- Dumping structure for table fls.user_details
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contact` int DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `education` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `profile` varchar(50) DEFAULT NULL,
  `userstatus_id` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_user_details_user` (`user_id`),
  KEY `FK_user_details_userstatus` (`userstatus_id`),
  CONSTRAINT `FK_user_details_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_user_details_userstatus` FOREIGN KEY (`userstatus_id`) REFERENCES `userstatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table fls.user_details: ~6 rows (approximately)
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` (`id`, `user_id`, `name`, `contact`, `about`, `education`, `profile`, `userstatus_id`) VALUES
	(2, 5, 'aaaa', 0, '', '', NULL, 1),
	(5, 1, 'Thanujitha Dilshan', 756485394, 'Hi! I’m I\'m Ukrainian professional photographer and\r\nProfessional Photo Retoucher. I work as a professional commercial fashion and portrait photographer, food photo and content creating for your business .\r\nI am also interested in a healthy lifestyle and healthy eating.', 'java', NULL, 1),
	(6, 7, 'Isuru Sadaruwan', 786485235, 'More than 5 Years of development experience using PHP and MySQL. Worked on Small Project to Large Scale Websites and Application. Having Experience to Customized PHP, Add New Features to already developed website or application. Experience of developing E-Commerce Projects. Good Project Organizing and Management Skills.\r\n\r\nI can use my skills with my pure dedication. Looking for challenging career which demands the best of ability to have career which help me to You.', '', NULL, 1),
	(7, 4, 'Ruwan Kumara', 714528564, 'I am professional book designer with over 15 years of experience in meeting the aesthetic requirements and marketing needs of the most demanding clients, I look forward to putting your hard work into print. Having earned rave reviews from new and seasoned authors of every conceivable genre, my unique talent is adapting your vision into eye-catching book covers, bleeding-edge designs, clean interior layouts and flawless eBook conversions.', '', NULL, 1),
	(8, 3, 'dilshan', 764885725, '', '', NULL, 1),
	(9, 8, 'Warnathilaka', 764853452, '', '', NULL, 1);
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
