-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-04-2024 a las 23:41:58
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blogs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_category`
--

CREATE TABLE `blog_category` (
  `n_category_id` int(11) NOT NULL,
  `v_category_title` varchar(75) NOT NULL,
  `v_category_meta_title` varchar(100) NOT NULL,
  `v_category_path` varchar(100) NOT NULL,
  `d_date_created` date NOT NULL,
  `d_time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog_category`
--

INSERT INTO `blog_category` (`n_category_id`, `v_category_title`, `v_category_meta_title`, `v_category_path`, `d_date_created`, `d_time_created`) VALUES
(1, 'Artwork', 'artwork', 'artwork', '2024-03-27', '22:33:28'),
(2, 'Photograpy', 'phtograpy', 'photograpy', '2024-03-27', '22:33:40'),
(3, 'Technology', 'technology', 'technology', '2024-03-29', '19:57:32'),
(4, 'Home Design', 'home design', 'homedesign', '2024-03-29', '19:58:07'),
(5, 'Education', 'education', 'education', '2024-03-29', '19:58:32'),
(6, 'Lifestyle', 'lifestyle', 'lifestyle', '2024-03-29', '19:58:51'),
(7, 'Food', 'food', 'food', '2024-03-29', '19:59:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_comments`
--

CREATE TABLE `blog_comments` (
  `n_blog_comment_id` int(11) NOT NULL,
  `n_blog_comment_parent_id` int(11) NOT NULL,
  `n_blog_post_id` int(11) NOT NULL,
  `v_comment_author` varchar(50) NOT NULL,
  `v_comment_author_email` varchar(50) NOT NULL,
  `v_comment` varchar(500) NOT NULL,
  `d_date_created` date NOT NULL,
  `d_time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog_comments`
--

INSERT INTO `blog_comments` (`n_blog_comment_id`, `n_blog_comment_parent_id`, `n_blog_post_id`, `v_comment_author`, `v_comment_author_email`, `v_comment`, `d_date_created`, `d_time_created`) VALUES
(1, 0, 4, 'Jack', 'jack@gmail.com', 'Nice blog', '2024-04-03', '18:57:13'),
(2, 1, 4, 'Joe', 'joe@gmail.com', 'Yeah, right!', '2024-04-03', '19:21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_post`
--

CREATE TABLE `blog_post` (
  `n_blog_post_id` int(11) NOT NULL,
  `n_category_id` int(11) NOT NULL,
  `v_post_title` varchar(75) NOT NULL,
  `v_post_meta_title` varchar(100) NOT NULL,
  `v_post_path` varchar(100) NOT NULL,
  `v_post_summary` text NOT NULL,
  `v_post_content` longtext NOT NULL,
  `v_main_image_url` varchar(255) NOT NULL,
  `v_alt_image_url` varchar(255) NOT NULL,
  `n_blog_post_views` int(11) NOT NULL,
  `n_home_page_placement` int(1) NOT NULL,
  `f_post_status` int(1) NOT NULL COMMENT '0 - Inactive | 1 - Active | 2 - Deleted',
  `d_date_created` date NOT NULL,
  `d_time_created` time NOT NULL,
  `d_date_updated` date NOT NULL,
  `d_time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog_post`
--

INSERT INTO `blog_post` (`n_blog_post_id`, `n_category_id`, `v_post_title`, `v_post_meta_title`, `v_post_path`, `v_post_summary`, `v_post_content`, `v_main_image_url`, `v_alt_image_url`, `n_blog_post_views`, `n_home_page_placement`, `f_post_status`, `d_date_created`, `d_time_created`, `d_date_updated`, `d_time_updated`) VALUES
(4, 2, 'The future of cameras', 'cameras', 'photograpy', 'The future of cameras', '<div><br></div><div><div id=\"bannerR\" style=\"margin: 0px -300px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 300px; height: 10px; float: right; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\"><div align=\"center\" data-freestar-ad=\"__300x600\" id=\"lipsumcom_right_siderail\" style=\"margin: 0px; padding: 0px; display: inline-flex; align-items: center; justify-content: center; flex-direction: column; min-height: calc(var(--height) + var(--fsAddBuffer)); width: 300px; --height: 600px;\"></div></div><div class=\"boxed\" style=\"margin: 10px 28.7969px; padding: 0px; clear: both; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: center;\"><div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify;\"><p style=\"margin-bottom: 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed aliquet est. Donec erat felis, vehicula sed consequat et, dignissim quis tortor. Integer vitae velit eget purus sodales condimentum aliquam vitae enim. Sed congue tempor mauris at mollis. Proin finibus, orci non pharetra vulputate, risus leo euismod diam, ac facilisis lacus lorem a arcu. Suspendisse mattis lobortis cursus. Maecenas mi sem, imperdiet nec gravida at, tincidunt non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed accumsan gravida ligula, ut commodo nisi aliquet sed. Ut blandit, dolor nec elementum vestibulum, lectus augue ullamcorper neque, et ullamcorper odio nunc vitae diam. Aliquam venenatis dictum urna ut tempor. Quisque et elit nisl. Donec mauris felis, auctor ut mollis sed, malesuada id lacus. Aenean vel iaculis lacus, venenatis semper lorem.</p></div></div></div>', 'http://localhost/blog/admin/images/blog-images/961291_1711739512.jpg', 'http://localhost/blog/admin/images/blog-images/608222_1711739512.jpg', 0, 1, 1, '2024-03-28', '21:44:21', '2024-03-29', '20:11:52'),
(5, 3, 'Are laptops no longer needed?', 'laptops', 'technology', 'Are laptops no longer needed?', '<div><br></div><div><div id=\"bannerR\" style=\"margin: 0px -300px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 300px; height: 10px; float: right; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\"><div align=\"center\" data-freestar-ad=\"__300x600\" id=\"lipsumcom_right_siderail\" style=\"margin: 0px; padding: 0px; display: inline-flex; align-items: center; justify-content: center; flex-direction: column; min-height: calc(var(--height) + var(--fsAddBuffer)); width: 300px; --height: 600px;\"></div></div><div class=\"boxed\" style=\"margin: 10px 28.7969px; padding: 0px; clear: both; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: center;\"><div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify;\"><p style=\"margin-bottom: 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed aliquet est. Donec erat felis, vehicula sed consequat et, dignissim quis tortor. Integer vitae velit eget purus sodales condimentum aliquam vitae enim. Sed congue tempor mauris at mollis. Proin finibus, orci non pharetra vulputate, risus leo euismod diam, ac facilisis lacus lorem a arcu. Suspendisse mattis lobortis cursus. Maecenas mi sem, imperdiet nec gravida at, tincidunt non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed accumsan gravida ligula, ut commodo nisi aliquet sed. Ut blandit, dolor nec elementum vestibulum, lectus augue ullamcorper neque, et ullamcorper odio nunc vitae diam. Aliquam venenatis dictum urna ut tempor. Quisque et elit nisl. Donec mauris felis, auctor ut mollis sed, malesuada id lacus. Aenean vel iaculis lacus, venenatis semper lorem.</p></div></div></div>', 'http://localhost/blog/admin/images/blog-images/751450_1711739451.png', 'http://localhost/blog/admin/images/blog-images/159509_1711739451.png', 0, 2, 1, '2024-03-28', '22:12:45', '2024-03-29', '20:10:51'),
(6, 4, 'Best home interior designs', 'home design', 'homedesign', 'Best home interior designs', '<p><br></p><div id=\"bannerR\" style=\"margin: 0px -300px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 300px; height: 10px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><div align=\"center\" data-freestar-ad=\"__300x600\" id=\"lipsumcom_right_siderail\" style=\"margin: 0px; padding: 0px; display: inline-flex; align-items: center; justify-content: center; flex-direction: column; min-height: calc(var(--height) + var(--fsAddBuffer)); width: 300px; --height: 600px;\"></div></div><div class=\"boxed\" style=\"margin: 10px 28.7969px; padding: 0px; clear: both; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify;\"><p style=\"margin-bottom: 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed aliquet est. Donec erat felis, vehicula sed consequat et, dignissim quis tortor. Integer vitae velit eget purus sodales condimentum aliquam vitae enim. Sed congue tempor mauris at mollis. Proin finibus, orci non pharetra vulputate, risus leo euismod diam, ac facilisis lacus lorem a arcu. Suspendisse mattis lobortis cursus. Maecenas mi sem, imperdiet nec gravida at, tincidunt non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed accumsan gravida ligula, ut commodo nisi aliquet sed. Ut blandit, dolor nec elementum vestibulum, lectus augue ullamcorper neque, et ullamcorper odio nunc vitae diam. Aliquam venenatis dictum urna ut tempor. Quisque et elit nisl. Donec mauris felis, auctor ut mollis sed, malesuada id lacus. Aenean vel iaculis lacus, venenatis semper lorem.</p></div></div>', 'http://localhost/blog/admin/images/blog-images/336872_1711739122.jpg', 'http://localhost/blog/admin/images/blog-images/93066_1711739122.jpg', 0, 0, 1, '2024-03-29', '20:05:22', '0000-00-00', '00:00:00'),
(7, 5, 'How is online schoolling affect students?', 'online-schoolling', 'schoolling', 'How is online schoolling affect students?', '<p><br></p><div id=\"bannerR\" style=\"margin: 0px -300px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 300px; height: 10px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><div align=\"center\" data-freestar-ad=\"__300x600\" id=\"lipsumcom_right_siderail\" style=\"margin: 0px; padding: 0px; display: inline-flex; align-items: center; justify-content: center; flex-direction: column; min-height: calc(var(--height) + var(--fsAddBuffer)); width: 300px; --height: 600px;\"></div></div><div class=\"boxed\" style=\"margin: 10px 28.7969px; padding: 0px; clear: both; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify;\"><p style=\"margin-bottom: 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed aliquet est. Donec erat felis, vehicula sed consequat et, dignissim quis tortor. Integer vitae velit eget purus sodales condimentum aliquam vitae enim. Sed congue tempor mauris at mollis. Proin finibus, orci non pharetra vulputate, risus leo euismod diam, ac facilisis lacus lorem a arcu. Suspendisse mattis lobortis cursus. Maecenas mi sem, imperdiet nec gravida at, tincidunt non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed accumsan gravida ligula, ut commodo nisi aliquet sed. Ut blandit, dolor nec elementum vestibulum, lectus augue ullamcorper neque, et ullamcorper odio nunc vitae diam. Aliquam venenatis dictum urna ut tempor. Quisque et elit nisl. Donec mauris felis, auctor ut mollis sed, malesuada id lacus. Aenean vel iaculis lacus, venenatis semper lorem.</p></div></div>', 'http://localhost/blog/admin/images/blog-images/967126_1711739311.jpg', 'http://localhost/blog/admin/images/blog-images/723410_1711739311.jpg', 0, 3, 1, '2024-03-29', '20:08:31', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_tags`
--

CREATE TABLE `blog_tags` (
  `n_tag_id` int(11) NOT NULL,
  `n_blog_post_id` int(11) NOT NULL,
  `v_tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog_tags`
--

INSERT INTO `blog_tags` (`n_tag_id`, `n_blog_post_id`, `v_tag`) VALUES
(1, 1, 'photograpy'),
(2, 2, 'artwork'),
(3, 1, 'photograpy'),
(4, 1, 'photograpy'),
(5, 1, 'photograpy'),
(6, 2, 'rape'),
(7, 3, 'girlfriend'),
(8, 4, 'photograpy'),
(9, 5, 'technology'),
(10, 6, 'homedesign'),
(11, 7, 'schoolling');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`n_category_id`);

--
-- Indices de la tabla `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`n_blog_comment_id`);

--
-- Indices de la tabla `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`n_blog_post_id`);

--
-- Indices de la tabla `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`n_tag_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `n_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `n_blog_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `n_blog_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `n_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
