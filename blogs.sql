-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-03-2024 a las 05:47:04
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
  `v_category_,metatitle` varchar(100) NOT NULL,
  `v_category_path` varchar(100) NOT NULL,
  `d_date_created` date NOT NULL,
  `d_time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `n_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `n_blog_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `n_blog_post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `n_tag_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
