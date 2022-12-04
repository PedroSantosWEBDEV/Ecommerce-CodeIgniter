-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2022 às 13:27
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `shop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `active_pages`
--

CREATE TABLE `active_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `active_pages`
--

INSERT INTO `active_pages` (`id`, `name`, `enabled`) VALUES
(1, 'blog', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `bic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog_translations`
--

CREATE TABLE `blog_translations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirm_links`
--

CREATE TABLE `confirm_links` (
  `id` int(11) NOT NULL,
  `link` char(32) NOT NULL,
  `for_order` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cookie_law`
--

CREATE TABLE `cookie_law` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cookie_law`
--

INSERT INTO `cookie_law` (`id`, `link`, `theme`, `visibility`) VALUES
(1, '', 'light-top', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cookie_law_translations`
--

CREATE TABLE `cookie_law_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `button_text` varchar(50) NOT NULL,
  `learn_more` varchar(50) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cookie_law_translations`
--

INSERT INTO `cookie_law_translations` (`id`, `message`, `button_text`, `learn_more`, `abbr`, `for_id`) VALUES
(1, '', '', '', 'br', 1),
(2, '', '', '', 'en', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `valid_from_date` int(10) UNSIGNED NOT NULL,
  `valid_to_date` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-enabled, 0-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `history`
--

INSERT INTO `history` (`id`, `activity`, `username`, `time`) VALUES
(1, 'Go to home page', 'admin', 1669805647),
(2, 'Ir para o histórico', 'admin', 1669805656),
(3, 'Go to publish product', 'admin', 1669805661),
(4, 'Go to products', 'admin', 1669805663),
(5, 'Go to shop categories', 'admin', 1669805665),
(6, 'Go to languages', 'admin', 1669805700),
(7, 'Go to languages', 'admin', 1669805702),
(8, 'Go to shop categories', 'admin', 1669805730),
(9, 'Go to publish product', 'admin', 1669805822),
(10, 'Go to shop categories', 'admin', 1669806862),
(11, 'Go to publish product', 'admin', 1669806867),
(12, 'Go to products', 'admin', 1669806869),
(13, 'Go to shop categories', 'admin', 1669806873),
(14, 'Go to publish product', 'admin', 1669806881),
(15, 'Go to File Manager', 'admin', 1669806890),
(16, 'Go to Subscribed Emails', 'admin', 1669806898),
(17, 'Go to discounts page', 'admin', 1669806900),
(18, 'Go to Settings Page', 'admin', 1669806909),
(19, 'Brands visibility changed', 'admin', 1669806925),
(20, 'Go to Settings Page', 'admin', 1669806925),
(21, 'Go to brands page', 'admin', 1669806929),
(22, 'Go to Settings Page', 'admin', 1669806955),
(23, 'Brands visibility changed', 'admin', 1669806962),
(24, 'Go to Settings Page', 'admin', 1669806962),
(25, 'Go to Subscribed Emails', 'admin', 1669807483),
(26, 'Go to products', 'admin', 1669807486),
(27, 'Ir para a página de configurações', 'admin', 1669807490),
(28, 'Ir para a página de configurações', 'admin', 1669807853),
(29, 'User admin logged in', NULL, 1669807876),
(30, 'Go to home page', 'admin', 1669807876),
(31, 'Ir para a página de configurações', 'admin', 1669807883),
(32, 'Ir para a página de configurações', 'admin', 1669807901),
(33, 'Ir para a página de configurações', 'admin', 1669807945),
(34, 'Alterado para onde vão os e-mails do formulário de contato', 'admin', 1669808854),
(35, 'Ir para a página de configurações', 'admin', 1669808854),
(36, 'User admin logged in', NULL, 1669894192),
(37, 'Go to home page', 'admin', 1669894192),
(38, 'Go to languages', 'admin', 1669894384),
(39, 'Go to languages', 'admin', 1669894385),
(40, 'Go to languages', 'admin', 1669894410),
(41, 'Go to languages', 'admin', 1669894417),
(42, 'Go to languages', 'admin', 1669894456),
(43, 'Go to languages', 'admin', 1669895011),
(44, 'Go to languages', 'admin', 1669895144),
(45, 'Go to languages', 'admin', 1669895319),
(46, 'Go to Styling page', 'admin', 1669896411),
(47, 'Go to publish product', 'admin', 1669896420),
(48, 'Go to products', 'admin', 1669896674),
(49, 'Go to shop categories', 'admin', 1669896675),
(50, 'Go to products', 'admin', 1669896676),
(51, 'Go to orders page', 'admin', 1669896677),
(52, 'User admin logged in', NULL, 1669897223),
(53, 'Go to home page', 'admin', 1669897223),
(54, 'Go to Admin Users', 'admin', 1669897227),
(55, 'Ir para a página de configurações', 'admin', 1669897237),
(56, 'Alterado a visibilidade da quantidade pública', 'admin', 1669897250),
(57, 'Ir para a página de configurações', 'admin', 1669897250),
(58, 'Change public date added visibility', 'admin', 1669897258),
(59, 'Ir para a página de configurações', 'admin', 1669897258),
(60, 'Ir para a página de configurações', 'admin', 1669898153),
(61, 'User admin logged in', NULL, 1669898157),
(62, 'Go to home page', 'admin', 1669898157),
(63, 'Ir para a página de configurações', 'admin', 1669898162),
(64, 'Alterado a visibilidade da quantidade de dados públicos', 'admin', 1669898166),
(65, 'Ir para a página de configurações', 'admin', 1669898166),
(66, 'Alterado a visibilidade dos dados públicos', 'admin', 1669898169),
(67, 'Ir para a página de configurações', 'admin', 1669898169),
(68, 'Suporte a vários fornecedores alterado', 'admin', 1669898173),
(69, 'Ir para a página de configurações', 'admin', 1669898173),
(70, 'Alterar a visibilidade da página final de checkout', 'admin', 1669898180),
(71, 'Ir para a página de configurações', 'admin', 1669898180),
(72, 'A visibilidade dos botões de compra foi alterado para produtos fora de estoque', 'admin', 1669898187),
(73, 'Ir para a página de configurações', 'admin', 1669898187),
(74, 'Visibilidade das marcas alterado', 'admin', 1669898193),
(75, 'Ir para a página de configurações', 'admin', 1669898194),
(76, 'Alterar a visibilidade do botão Mais informações na lista de produtos', 'admin', 1669898198),
(77, 'Ir para a página de configurações', 'admin', 1669898198),
(78, 'A visibilidade dos produtos Slider foi alterado', 'admin', 1669898209),
(79, 'Ir para a página de configurações', 'admin', 1669898209),
(80, 'Informações sobre a lei de cookies alteradas', 'admin', 1669898222),
(81, 'Ir para a página de configurações', 'admin', 1669898222),
(82, 'Suporte a vários fornecedores alterado', 'admin', 1669898271),
(83, 'Ir para a página de configurações', 'admin', 1669898271),
(84, 'Suporte a vários fornecedores alterado', 'admin', 1669898292),
(85, 'Ir para a página de configurações', 'admin', 1669898292),
(86, 'Suporte a vários fornecedores alterado', 'admin', 1669898353),
(87, 'Ir para a página de configurações', 'admin', 1669898353),
(88, 'Alterar a visibilidade da página final de checkout', 'admin', 1669898356),
(89, 'Ir para a página de configurações', 'admin', 1669898356),
(90, 'Alterar a visibilidade da página final de checkout', 'admin', 1669898358),
(91, 'Ir para a página de configurações', 'admin', 1669898358),
(92, 'A visibilidade dos botões de compra foi alterado para produtos fora de estoque', 'admin', 1669898361),
(93, 'Ir para a página de configurações', 'admin', 1669898362),
(94, 'Informações sobre a lei de cookies alteradas', 'admin', 1669898371),
(95, 'Ir para a página de configurações', 'admin', 1669898371),
(96, 'Visibilidade das marcas alterado', 'admin', 1669898374),
(97, 'Ir para a página de configurações', 'admin', 1669898374),
(98, 'A visibilidade dos produtos Slider foi alterado', 'admin', 1669898377),
(99, 'Ir para a página de configurações', 'admin', 1669898377),
(100, 'Go to Subscribed Emails', 'admin', 1669898514),
(101, 'Ir para Gerenciar páginas', 'admin', 1669898636),
(102, 'Adicionar nova página com nome - tt', 'admin', 1669898673),
(103, 'Ir para Gerenciar páginas', 'admin', 1669898673),
(104, 'Excluir página', 'admin', 1669898701),
(105, 'Ir para Gerenciar páginas', 'admin', 1669898701);

-- --------------------------------------------------------

--
-- Estrutura da tabela `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `currencyKey` varchar(5) NOT NULL,
  `flag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `languages`
--

INSERT INTO `languages` (`id`, `abbr`, `name`, `currency`, `currencyKey`, `flag`) VALUES
(1, 'br', 'Brasil', '', 'BRL', 'br.png'),
(2, 'en', 'english', '$', 'USD', 'en.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'point to public_users ID',
  `products` text NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `clean_referrer` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `paypal_status` varchar(10) DEFAULT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT 0,
  `viewed` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'o status visualizado é alterado quando o status processado é alterado',
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `discount_code` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders_clients`
--

CREATE TABLE `orders_clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(500) NOT NULL,
  `post_code` varchar(500) NOT NULL,
  `notes` text NOT NULL,
  `for_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `folder` int(10) UNSIGNED DEFAULT NULL COMMENT 'folder with images',
  `image` varchar(255) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL COMMENT 'time created',
  `time_update` int(10) UNSIGNED NOT NULL COMMENT 'time updated',
  `visibility` tinyint(1) NOT NULL DEFAULT 1,
  `shop_categorie` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `procurement` int(10) UNSIGNED NOT NULL,
  `in_slider` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL,
  `virtual_products` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_id` int(5) DEFAULT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_translations`
--

CREATE TABLE `products_translations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `basic_description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `old_price` varchar(20) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seo_pages`
--

CREATE TABLE `seo_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `seo_pages`
--

INSERT INTO `seo_pages` (`id`, `name`) VALUES
(1, 'home'),
(2, 'checkout'),
(3, 'contacts'),
(4, 'blog');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seo_pages_translations`
--

CREATE TABLE `seo_pages_translations` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `page_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_for` int(11) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `shop_categories_translations`
--

CREATE TABLE `shop_categories_translations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subscribed`
--

CREATE TABLE `subscribed` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `textual_pages_tanslations`
--

CREATE TABLE `textual_pages_tanslations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'notifications by email',
  `last_login` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `notify`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'your@email.com', 0, 1669898157);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_public`
--

CREATE TABLE `users_public` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `value_store`
--

CREATE TABLE `value_store` (
  `id` int(10) UNSIGNED NOT NULL,
  `thekey` varchar(50) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `value_store`
--

INSERT INTO `value_store` (`id`, `thekey`, `value`) VALUES
(1, 'sitelogo', 'NewLogo.jpg'),
(2, 'navitext', ''),
(3, 'footercopyright', 'Powered by ECC FZE © All right reserved. '),
(4, 'contactspage', 'Hello dear client'),
(5, 'footerContactAddr', ''),
(6, 'footerContactEmail', 'support@shop.dev'),
(7, 'footerContactPhone', ''),
(8, 'googleMaps', '42.671840, 83.279163'),
(9, 'footerAboutUs', ''),
(10, 'footerSocialFacebook', ''),
(11, 'footerSocialTwitter', ''),
(12, 'footerSocialGooglePlus', ''),
(13, 'footerSocialPinterest', ''),
(14, 'footerSocialYoutube', ''),
(16, 'contactsEmailTo', 'pedrocf125@gmail.com'),
(17, 'shippingOrder', '1'),
(18, 'addJs', ''),
(19, 'publicQuantity', '0'),
(20, 'paypal_email', ''),
(21, 'paypal_sandbox', '0'),
(22, 'publicDateAdded', '0'),
(23, 'googleApi', ''),
(24, 'template', 'redlabel'),
(25, 'cashondelivery_visibility', '1'),
(26, 'showBrands', '0'),
(27, 'showInSlider', '0'),
(28, 'codeDiscounts', '1'),
(29, 'virtualProducts', '0'),
(30, 'multiVendor', '0'),
(31, 'outOfStock', '0'),
(32, 'hideBuyButtonsOfOutOfStock', '0'),
(33, 'moreInfoBtn', ''),
(34, 'refreshAfterAddToCart', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendors_orders`
--

CREATE TABLE `vendors_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `clean_referrer` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `paypal_status` varchar(10) DEFAULT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT 0,
  `viewed` tinyint(1) NOT NULL DEFAULT 0,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `discount_code` varchar(20) NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendors_orders_clients`
--

CREATE TABLE `vendors_orders_clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(500) NOT NULL,
  `post_code` varchar(500) NOT NULL,
  `notes` text NOT NULL,
  `for_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `active_pages`
--
ALTER TABLE `active_pages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `blog_translations`
--
ALTER TABLE `blog_translations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `confirm_links`
--
ALTER TABLE `confirm_links`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cookie_law`
--
ALTER TABLE `cookie_law`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cookie_law_translations`
--
ALTER TABLE `cookie_law_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`abbr`,`for_id`) USING BTREE;

--
-- Índices para tabela `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders_clients`
--
ALTER TABLE `orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products_translations`
--
ALTER TABLE `products_translations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `seo_pages`
--
ALTER TABLE `seo_pages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `seo_pages_translations`
--
ALTER TABLE `seo_pages_translations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `shop_categories_translations`
--
ALTER TABLE `shop_categories_translations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subscribed`
--
ALTER TABLE `subscribed`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `textual_pages_tanslations`
--
ALTER TABLE `textual_pages_tanslations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_public`
--
ALTER TABLE `users_public`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `value_store`
--
ALTER TABLE `value_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`thekey`);

--
-- Índices para tabela `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Índices para tabela `vendors_orders`
--
ALTER TABLE `vendors_orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendors_orders_clients`
--
ALTER TABLE `vendors_orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `active_pages`
--
ALTER TABLE `active_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `blog_translations`
--
ALTER TABLE `blog_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `confirm_links`
--
ALTER TABLE `confirm_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cookie_law`
--
ALTER TABLE `cookie_law`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cookie_law_translations`
--
ALTER TABLE `cookie_law_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de tabela `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orders_clients`
--
ALTER TABLE `orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products_translations`
--
ALTER TABLE `products_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seo_pages`
--
ALTER TABLE `seo_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `seo_pages_translations`
--
ALTER TABLE `seo_pages_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `shop_categories_translations`
--
ALTER TABLE `shop_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `subscribed`
--
ALTER TABLE `subscribed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `textual_pages_tanslations`
--
ALTER TABLE `textual_pages_tanslations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users_public`
--
ALTER TABLE `users_public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `value_store`
--
ALTER TABLE `value_store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendors_orders`
--
ALTER TABLE `vendors_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendors_orders_clients`
--
ALTER TABLE `vendors_orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
