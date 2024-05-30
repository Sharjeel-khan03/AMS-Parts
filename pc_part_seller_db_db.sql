
--
-- Table structure for table `add_to_carts`
--

CREATE TABLE `add_to_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Electronic t', 'electronic-t', '2024-05-11 06:31:45', '2024-05-17 14:16:30'),
(2, 'Connectors', 'connectors', '2024-05-11 16:00:08', '2024-05-11 16:00:08'),
(3, 'Transistors', 'transistors', '2024-05-11 16:00:17', '2024-05-11 16:00:36'),
(4, 'Resistors', 'resistors', '2024-05-11 16:00:51', '2024-05-11 16:00:51'),
(5, 'Capacitors', 'capacitors', '2024-05-11 16:01:06', '2024-05-11 16:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `conversion_rate` double(8,2) NOT NULL,
  `active` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `conversion_rate`, `active`, `created_at`, `updated_at`) VALUES
(1, 'test', 23.45, 0.00, '2024-05-25 15:49:30', '2024-05-25 15:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `part_no` varchar(255) DEFAULT NULL,
  `on_hand_quantity` int(11) NOT NULL DEFAULT 0,
  `allocated_quantity` int(11) NOT NULL DEFAULT 0,
  `available_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `tax` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `payment_due_date` date NOT NULL,
  `total_amount_paid` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `upc` varchar(255) DEFAULT NULL,
  `part_no` varchar(255) NOT NULL,
  `unit_price` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `slug`, `description`, `sku`, `upc`, `part_no`, `unit_price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Core', 'core', 'testing', NULL, NULL, '897', '300', 1, '2024-05-14 14:32:34', '2024-05-14 16:25:39', NULL),
(2, 'With Image', 'with-image', 'Description', NULL, NULL, '1092', '250', 1, '2024-05-14 14:49:28', '2024-05-14 15:01:25', NULL),
(3, 'Demetrius Lowe', 'demetrius-lowe', 'Atque earum totam ne', NULL, NULL, 'Hic h', '941', 1, '2024-05-15 01:10:02', '2024-05-15 01:10:47', NULL),
(4, 'test', 'test', 'bvbcf', NULL, NULL, 'BDX-750Z370-S', '250', 1, '2024-05-15 01:11:30', '2024-05-15 01:11:30', NULL),
(5, 'Test', 'test', 'te', NULL, NULL, '89', '250', 1, '2024-05-17 16:01:26', '2024-05-17 16:01:26', NULL),
(6, 'Core Components', 'core-components', 'test', NULL, NULL, '897', '2345', 1, '2024-05-17 16:13:58', '2024-05-17 16:13:58', NULL),
(7, 'Core Components', 'core-components', 'test', NULL, NULL, '3434', '23.44', 1, '2024-05-17 16:31:33', '2024-05-17 16:31:33', NULL),
(8, '222', '222', 'ttestpogfedfs', NULL, NULL, 'item', '250', 1, '2024-05-18 06:45:50', '2024-05-18 06:53:40', NULL),
(9, 'dfsfd', 'dfsfd', 'erergdr', NULL, NULL, 'reger', '2500', 1, '2024-05-18 06:54:31', '2024-05-18 06:54:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `category_id`, `sub_category_id`, `item_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, '2024-05-11 06:33:22', '2024-05-11 06:50:01', '2024-05-11 06:50:01'),
(2, 1, 1, 2, '2024-05-11 06:55:05', '2024-05-11 06:56:13', '2024-05-11 06:56:13'),
(13, 1, 1, 1, '2024-05-14 14:32:34', '2024-05-14 14:32:34', NULL),
(14, 1, 2, 2, '2024-05-14 14:49:28', '2024-05-14 14:49:28', NULL),
(15, 1, 2, 3, '2024-05-15 01:10:02', '2024-05-15 01:10:02', NULL),
(16, 1, 1, 4, '2024-05-15 01:11:30', '2024-05-15 01:11:30', NULL),
(17, 1, 1, 5, '2024-05-17 16:01:26', '2024-05-17 16:01:26', NULL),
(18, 1, 1, 6, '2024-05-17 16:13:58', '2024-05-17 16:13:58', NULL),
(19, 1, 2, 7, '2024-05-17 16:31:33', '2024-05-17 16:31:33', NULL),
(20, 1, 2, 8, '2024-05-18 06:45:50', '2024-05-18 06:45:50', NULL),
(21, 1, 2, 9, '2024-05-18 06:54:31', '2024-05-18 06:54:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

CREATE TABLE `item_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_images`
--

INSERT INTO `item_images` (`id`, `image`, `item_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'http://localhost/Pc-Parts-Seller/uploads/itemimage\\6643c04886770.jpg', '2', '2024-05-14 14:49:28', '2024-05-14 14:49:28', NULL),
(2, 'item/1716033814.webp', '1', '2024-05-14 15:07:57', '2024-05-18 07:03:34', NULL),
(3, 'http://localhost/Pc-Parts-Seller/uploads/itemimage\\664451c672184.jpg', '3', '2024-05-15 01:10:14', '2024-05-15 01:10:14', NULL),
(4, 'http://localhost/Pc-Parts-Seller/uploads/itemimage\\6644521300d6e.jpg', '4', '2024-05-15 01:11:31', '2024-05-15 01:11:31', NULL),
(5, 'http://localhost/Pc-Parts-Seller/uploads/itemimage\\6647c5a663cb3.webp', '5', '2024-05-17 16:01:26', '2024-05-17 16:01:26', NULL),
(6, 'item/1716032750.jpg', '6', '2024-05-17 16:13:59', '2024-05-17 16:13:59', NULL),
(7, 'item/1716032750.jpg', '7', '2024-05-17 16:31:33', '2024-05-17 16:31:33', NULL),
(8, 'item/1716032750.jpg', '8', '2024-05-18 06:45:50', '2024-05-18 06:45:50', NULL),
(9, 'item/1716033428.webp', '9', '2024-05-18 06:57:08', '2024-05-18 06:57:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_quotes`
--

CREATE TABLE `item_quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `custome_price` varchar(255) NOT NULL,
  `company_offer` varchar(225) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1.Pending,2.Accpet,3.PlaceOrder,4.CancelQuote',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_quotes`
--

INSERT INTO `item_quotes` (`id`, `user_id`, `item_id`, `quantity`, `custome_price`, `company_offer`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '500', '200', NULL, '2', '2024-05-11 07:04:17', '2024-05-18 15:45:30'),
(2, 2, 4, '500', '250', NULL, '4', '2024-05-13 15:56:53', '2024-05-18 15:45:38'),
(3, 3, 1, '500', '200', NULL, '2', '2024-05-14 15:45:01', '2024-05-27 16:27:22'),
(4, 7, 1, '500', '150', '175', '1', '2024-05-15 14:05:15', '2024-05-15 15:27:29'),
(5, 2, 1, '45', '300', NULL, '1', '2024-05-24 17:35:29', '2024-05-24 17:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2024_04_15_190911_alter_users_table', 1),
(36, '2024_04_15_190947_drop_prev_tables', 1),
(37, '2024_04_15_193853_create_roles_table', 1),
(38, '2024_04_15_193940_create_purchase_requests_table', 1),
(39, '2024_04_15_194102_create_purchase_request_lines_table', 1),
(40, '2024_04_15_194229_create_purchase_orders_table', 1),
(41, '2024_04_15_194254_create_purchase_order_lines_table', 1),
(42, '2024_04_15_194428_create_orders_table', 1),
(43, '2024_04_15_194756_create_order_lines_table', 1),
(44, '2024_04_15_194816_create_items_table', 1),
(45, '2024_04_15_194835_create_categories_table', 1),
(46, '2024_04_15_194854_create_item_categories_table', 1),
(47, '2024_04_15_194916_create_inventories_table', 1),
(48, '2024_04_15_195631_create_invoices_table', 1),
(49, '2024_04_15_195700_create_invoice_items_table', 1),
(50, '2024_04_15_195814_create_currencies_table', 1),
(51, '2024_04_15_195919_create_organizations_table', 1),
(52, '2024_04_15_195938_create_organization_users_table', 1),
(53, '2024_04_15_200524_create_vendors_table', 1),
(54, '2024_04_23_195702_create_sub_categories_table', 1),
(55, '2024_04_24_200937_alter_columns_in_po_and_po_lines', 1),
(56, '2024_04_25_065354_create_ware_houses_table', 1),
(57, '2024_04_26_213353_create_item_images_table', 1),
(58, '2024_05_02_101208_create_item_quotes_table', 1),
(59, '2024_05_06_200730_create_add_to_carts_table', 1),
(60, '2024_05_10_195618_add_transport_cost_in_po', 1),
(61, '2024_05_14_065947_create_shipping_addresses_table', 2),
(62, '2024_05_13_191627_add_organization_and_file_in_users', 3),
(63, '2024_05_15_135650_add_file_to_users', 4),
(64, '2024_05_16_164446_add_comission_rate_in_organization_users', 4),
(65, '2024_05_21_170300_new_pass', 5),
(66, '2024_05_22_183945_add_columns_in_inventories', 5),
(67, '2024_05_22_193649_alter_items_table', 5),
(68, '2024_05_22_194642_alter_inventories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `order_notes` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1.Processing,2.Shipped,3.Cancel',
  `invoice_status` tinyint(1) DEFAULT NULL COMMENT '1.Unpaid,2.paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `order_notes`, `status`, `invoice_status`, `created_at`, `updated_at`) VALUES
(1, 10, 250.00, NULL, 3, NULL, '2024-05-14 15:57:05', '2024-05-17 16:54:45'),
(2, 10, 500.00, NULL, 2, NULL, '2024-05-14 16:04:24', '2024-05-17 15:44:17'),
(3, 2, 250.00, NULL, 2, NULL, '2024-05-15 13:50:47', '2024-05-18 08:42:32'),
(4, 9, 500.00, 'Need good packing', 1, NULL, '2024-05-18 08:53:26', '2024-05-18 08:53:26'),
(5, 2, 2750.00, NULL, 1, NULL, '2024-05-18 09:12:10', '2024-05-18 09:12:10'),
(6, 2, 309.00, NULL, 1, NULL, '2024-05-27 14:24:41', '2024-05-27 14:24:41'),
(7, 2, 566.50, NULL, 1, NULL, '2024-05-27 15:01:01', '2024-05-27 15:01:01'),
(8, 3, 100000.00, NULL, 1, NULL, '2024-05-27 16:27:46', '2024-05-27 16:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_lines`
--

CREATE TABLE `order_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `quote_id` int(119) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lines`
--

INSERT INTO `order_lines` (`id`, `order_id`, `quote_id`, `item_id`, `quantity`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 1, '2.00', '2024-05-14 15:57:05', '2024-05-14 15:57:05'),
(2, 1, NULL, 1, 2, '5.00', '2024-05-14 16:04:24', '2024-05-14 16:04:24'),
(3, 3, NULL, 1, 1, '2.00', '2024-05-15 13:50:47', '2024-05-15 13:50:47'),
(4, 4, NULL, 1, 2, '5.00', '2024-05-18 08:53:26', '2024-05-18 08:53:26'),
(5, 5, NULL, 9, 1, '2.00', '2024-05-18 09:12:10', '2024-05-18 09:12:10'),
(6, 5, NULL, 2, 1, '7.00', '2024-05-18 09:12:10', '2024-05-18 09:12:10'),
(7, 6, NULL, 1, 1, '3.00', '2024-05-27 14:24:41', '2024-05-27 14:24:41'),
(8, 7, NULL, 4, 1, '5', '2024-05-27 15:01:01', '2024-05-27 15:01:01'),
(9, 7, NULL, 1, 1, '6', '2024-05-27 15:01:01', '2024-05-27 15:01:01'),
(10, 8, 3, 1, 500, '100000', '2024-05-27 16:28:16', '2024-05-27 16:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `commission_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `commission_rate`, `created_at`, `updated_at`) VALUES
(1, 'Teste', 34.00, '2024-05-17 14:16:55', '2024-05-17 14:17:12'),
(2, 'New Organization', 3.00, '2024-05-19 05:26:20', '2024-05-19 05:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `organization_users`
--

CREATE TABLE `organization_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_users`
--

INSERT INTO `organization_users` (`id`, `organization_id`, `user_id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(56, 2, 2, 1, '', NULL, NULL),
(57, 2, 2, 2, '', NULL, NULL),
(58, 2, 2, 3, '', NULL, NULL),
(59, 2, 2, 1, '', NULL, NULL),
(60, 2, 2, 2, '', NULL, NULL),
(61, 2, 2, 3, '', NULL, NULL),
(62, 2, 2, 1, '', NULL, NULL),
(63, 2, 2, 2, '', NULL, NULL),
(64, 2, 2, 3, '', NULL, NULL),
(65, 2, 10, 1, '', NULL, NULL),
(66, 2, 10, 2, '', NULL, NULL),
(67, 2, 10, 3, '', NULL, NULL),
(74, 2, 5, 1, '', NULL, NULL),
(75, 2, 5, 2, '', NULL, NULL),
(76, 2, 5, 3, '', NULL, NULL),
(77, 2, 5, 1, '', NULL, NULL),
(78, 2, 5, 2, '', NULL, NULL),
(79, 2, 5, 3, '', NULL, NULL),
(80, 2, 5, 1, '', NULL, NULL),
(81, 2, 5, 2, '', NULL, NULL),
(82, 2, 5, 3, '', NULL, NULL),
(83, 2, 2, 1, '', NULL, NULL),
(84, 2, 2, 2, '', NULL, NULL),
(85, 2, 2, 3, '', NULL, NULL),
(86, 2, 2, 1, '', NULL, NULL),
(87, 2, 2, 2, '', NULL, NULL),
(88, 2, 2, 3, '', NULL, NULL),
(89, 2, 2, 1, '', NULL, NULL),
(90, 2, 2, 2, '', NULL, NULL),
(91, 2, 2, 3, '', NULL, NULL),
(92, 2, 10, 1, '', NULL, NULL),
(93, 2, 10, 2, '', NULL, NULL),
(94, 2, 10, 3, '', NULL, NULL),
(95, 2, 10, 1, '', NULL, NULL),
(96, 2, 10, 2, '', NULL, NULL),
(97, 2, 10, 3, '', NULL, NULL),
(98, 2, 10, 1, '', NULL, NULL),
(99, 2, 10, 2, '', NULL, NULL),
(100, 2, 10, 3, '', NULL, NULL),
(101, 2, 5, 1, '', NULL, NULL),
(102, 2, 5, 2, '', NULL, NULL),
(103, 2, 5, 3, '', NULL, NULL),
(104, 2, 5, 1, '', NULL, NULL),
(105, 2, 5, 2, '', NULL, NULL),
(106, 2, 5, 3, '', NULL, NULL),
(107, 2, 5, 1, '', NULL, NULL),
(108, 2, 5, 2, '', NULL, NULL),
(109, 2, 5, 3, '', NULL, NULL),
(110, 2, 2, 1, '', NULL, NULL),
(111, 2, 2, 2, '', NULL, NULL),
(112, 2, 2, 3, '', NULL, NULL),
(113, 2, 2, 1, '', NULL, NULL),
(114, 2, 2, 2, '', NULL, NULL),
(115, 2, 2, 3, '', NULL, NULL),
(116, 2, 2, 1, '', NULL, NULL),
(117, 2, 2, 2, '', NULL, NULL),
(118, 2, 2, 3, '', NULL, NULL),
(119, 2, 10, 1, '', NULL, NULL),
(120, 2, 10, 2, '', NULL, NULL),
(121, 2, 10, 3, '', NULL, NULL),
(122, 2, 10, 1, '', NULL, NULL),
(123, 2, 10, 2, '', NULL, NULL),
(124, 2, 10, 3, '', NULL, NULL),
(125, 2, 10, 1, '', NULL, NULL),
(126, 2, 10, 2, '', NULL, NULL),
(127, 2, 10, 3, '', NULL, NULL),
(128, 2, 5, 1, '', NULL, NULL),
(129, 2, 5, 2, '', NULL, NULL),
(130, 2, 5, 3, '', NULL, NULL),
(131, 2, 5, 1, '', NULL, NULL),
(132, 2, 5, 2, '', NULL, NULL),
(133, 2, 5, 3, '', NULL, NULL),
(134, 2, 5, 1, '', NULL, NULL),
(135, 2, 5, 2, '', NULL, NULL),
(136, 2, 5, 3, '', NULL, NULL),
(137, 2, 2, 1, '', NULL, NULL),
(138, 2, 2, 2, '', NULL, NULL),
(139, 2, 2, 3, '', NULL, NULL),
(140, 2, 2, 1, '', NULL, NULL),
(141, 2, 2, 2, '', NULL, NULL),
(142, 2, 2, 3, '', NULL, NULL),
(143, 2, 2, 1, '', NULL, NULL),
(144, 2, 2, 2, '', NULL, NULL),
(145, 2, 2, 3, '', NULL, NULL),
(146, 2, 10, 1, '', NULL, NULL),
(147, 2, 10, 2, '', NULL, NULL),
(148, 2, 10, 3, '', NULL, NULL),
(149, 2, 10, 1, '', NULL, NULL),
(150, 2, 10, 2, '', NULL, NULL),
(151, 2, 10, 3, '', NULL, NULL),
(152, 2, 10, 1, '', NULL, NULL),
(153, 2, 10, 2, '', NULL, NULL),
(154, 2, 10, 3, '', NULL, NULL),
(155, 2, 5, 1, '', NULL, NULL),
(156, 2, 5, 2, '', NULL, NULL),
(157, 2, 5, 3, '', NULL, NULL),
(158, 2, 5, 1, '', NULL, NULL),
(159, 2, 5, 2, '', NULL, NULL),
(160, 2, 5, 3, '', NULL, NULL),
(161, 2, 5, 1, '', NULL, NULL),
(162, 2, 5, 2, '', NULL, NULL),
(163, 2, 5, 3, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `ship_to` int(11) NOT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `requested_by` varchar(255) DEFAULT NULL,
  `ship_via` varchar(255) DEFAULT NULL,
  `terms` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `shipping_cost` varchar(255) DEFAULT NULL,
  `sales_tax` varchar(255) DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_lines`
--

CREATE TABLE `purchase_order_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_request_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `receive_qty` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `transportation_cost` int(11) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requests`
--

CREATE TABLE `purchase_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `ship_to` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request_lines`
--

CREATE TABLE `purchase_request_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_request_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-05-14 16:16:11', '2024-05-14 16:16:11'),
(2, 'WholeSeller', '2024-05-14 16:17:37', '2024-05-14 16:17:37'),
(3, 'Retailer', '2024-05-14 16:17:53', '2024-05-14 16:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(119) DEFAULT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_state` varchar(255) NOT NULL,
  `shipping_zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'LED\'S', 'leds', '2024-05-11 06:32:13', '2024-05-11 06:32:13'),
(2, 1, 'LED TCL', 'led-tcl', '2024-05-11 16:01:31', '2024-05-11 16:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `file` longtext DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `first_name`, `last_name`, `user_name`, `slug`, `contact`, `country`, `address`, `city`, `state`, `zipcode`, `status`, `profile`, `email_verified_at`, `password`, `file`, `organization`, `role_id`, `otp`, `remember_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@partsseller.com', 'admin', 'admin', 'admin', 'admin-admin', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$GsCfinaTM/7QzlNe/JlFpee1s.GZpwuDLa7tQL.EyhLhe.ppQLZRS', NULL, NULL, 0, '', NULL, NULL, NULL, NULL),
(2, 'user1 user1', 'user1@email.com', 'user1', 'user1', 'user1 user1', 'user-1', 2147483647, 'Select a country...', '93850 Daisha Alley', 'Wintheiserport', 'Maryland', '1234', 1, NULL, NULL, '$2y$10$GsCfinaTM/7QzlNe/JlFpee1s.GZpwuDLa7tQL.EyhLhe.ppQLZRS', NULL, NULL, 2, '', NULL, '2024-05-28 00:39:35', NULL, '2024-05-28 00:39:35'),
(3, 'user2', 'user2@email.com', 'user2', 'user2', 'user2', 'user-2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$GsCfinaTM/7QzlNe/JlFpee1s.GZpwuDLa7tQL.EyhLhe.ppQLZRS', NULL, NULL, 2, '', NULL, '2024-05-28 00:44:45', NULL, '2024-05-28 00:44:45'),
(4, 'Test Test', 'test@gmail.co', 'Test', 'Test', 'Test Test', NULL, 112332, 'Russia', 'test', 'test', 'test', '2323', 1, NULL, NULL, '$2y$10$G2BPFTwkdRQElu5Iv0xib.xVq9sGPe2VQ88fC7J74VLzhr7hz9L6e', NULL, NULL, 2, '', NULL, NULL, '2024-05-12 10:32:04', '2024-05-12 10:37:01'),
(5, 'uzair hyder', 'uzairhyde@gmail.com', 'uzair', 'hyder', 'uzair hyder', 'uzair- hyder', 2147483647, 'United States', '93850 Daisha Alley', 'Wintheiserport', 'Maryland', '1234', 1, NULL, NULL, '$2y$10$GsCfinaTM/7QzlNe/JlFpee1s.GZpwuDLa7tQL.EyhLhe.ppQLZRS', NULL, NULL, 2, '', NULL, NULL, '2024-05-12 10:47:20', '2024-05-12 10:47:20'),
(6, 'Yael Callahan', 'kexesulyna@mailinator.com', 'Yael', 'Callahan', 'Yael Callahan', NULL, 641, 'Select a country...', '37411 Mike Fort Apt. 305', 'Santafurt', 'Maryland', '98535-2756', 1, NULL, NULL, '$2y$10$GsCfinaTM/7QzlNe/JlFpee1s.GZpwuDLa7tQL.EyhLhe.ppQLZRS', NULL, NULL, 2, '', NULL, NULL, '2024-05-14 13:46:31', '2024-05-14 16:04:24'),
(7, 'Kaden Kramer', 'dyduzov@mailinator.com', 'Kaden', 'Kramer', 'Kaden Kramer', NULL, NULL, 'United States', 'test', 'karachi', 'IL', '123', 1, NULL, NULL, '$2y$10$fNihHDwH3DpIIsKNerJvA.RQ3pnTZ03ozTZtu5oCHtEN2KCGqaBuu', NULL, NULL, 2, '', NULL, NULL, '2024-05-15 13:50:47', '2024-05-15 13:50:47'),
(8, 'Bree Stone', 'wocy@mailinator.com', 'Bree', 'Stone', 'Bree Stone', 'Bree-Stone', NULL, NULL, 'Voluptas nulla alias', NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$TrRSdYLQblV1TfkbnKwmV.HGv.5msN171ywgk1PqJfjLMpqxLph/q', 'http://localhost/Pc-Parts-Seller/storage/documents/QZ2Fe4zqJtTbHLNtLIpJbaFUXS6chSiz4iCRofwu.jpg', 'Cook and Solomon Trading', 2, '', NULL, NULL, '2024-05-17 16:29:10', '2024-05-17 16:29:10'),
(9, 'Test test', 'test44@gmail.com', 'Test', 'test', 'Test test', NULL, NULL, 'Select a country...', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$Me8Ghk2GMzYNA3pu6z7OY.6wkpwfvjpIaLYje4kXgKBDS1NGr5o2a', NULL, NULL, 2, '', NULL, NULL, '2024-05-18 08:53:26', '2024-05-18 09:12:10'),
(10, 'Wynter Olson', 'user04@gmail.com', 'Wynter', 'Olson', 'Wynter Olson', 'Wynter-Olson', NULL, NULL, 'Test', NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$GsCfinaTM/7QzlNe/JlFpee1s.GZpwuDLa7tQL.EyhLhe.ppQLZRS', 'http://localhost/Pc-Parts-Seller/public/storage/documents/CxUdITZc7yQByH75WRuQTBJeCGWOJ3HkxneQJhqU.webp', 'New Organization', 2, '', NULL, '2024-05-23 23:55:51', '2024-05-19 05:31:11', '2024-05-23 23:55:51'),
(11, 'Joseph Rutledge', 'tyjyval@mailinator.com', 'Joseph', 'Rutledge', 'Joseph Rutledge', 'Joseph-Rutledge', NULL, NULL, 'Repellendus Eaque l', NULL, NULL, NULL, 0, NULL, NULL, '$2y$10$XuirXMhGvKUgzWkMARICuumr9aWw51asLwwPVVOYXL3TmSqRWxGM2', 'http://localhost/Pc-Parts-Seller/public/storage/documents/BnZrsGqtzdoqFy3zXZw4eH7XePtvQXpSslraisot.txt', 'Rutledge Deleon Traders', 2, '', NULL, NULL, '2024-05-20 15:08:37', '2024-05-20 15:08:37'),
(12, '', 'xokikikiho@mailinator.com', 'Quemby', 'Holland', 'juvaqo', NULL, 7, NULL, 'Cupidatat aliquam do', NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$PYG/PilJjIb4K4sUYJ47IOycygK0xJ03Grc6GUYZ/YMT3zuEplXnm', NULL, NULL, 3, '', NULL, NULL, '2024-05-25 15:54:10', '2024-05-25 15:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `company_name` varchar(225) DEFAULT NULL,
  `vendor_phone` varchar(225) DEFAULT NULL,
  `vendor_website` varchar(225) DEFAULT NULL,
  `vendor_net` varchar(225) DEFAULT NULL,
  `vendor_transport` varchar(225) DEFAULT NULL,
  `vendor_ect` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `location`, `company_name`, `vendor_phone`, `vendor_website`, `vendor_net`, `vendor_transport`, `vendor_ect`, `created_at`, `updated_at`) VALUES
(2, 'Chantale Fields', 'Exercitation ab vel', 'Nihil incididunt et', 'Wilkins and Grimes Inc', '58', 'https://www.gazerikotegykuq.co.uk', 'Aut nihil cupiditate', 'Impedit nulla labor', 'Ut enim sit soluta q', '2024-05-25 15:42:03', '2024-05-25 15:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `ware_houses`
--

CREATE TABLE `ware_houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `data_import` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ware_houses`
--

INSERT INTO `ware_houses` (`id`, `name`, `type`, `location`, `currency_id`, `data_import`, `created_at`, `updated_at`) VALUES
(1, 'test update', 're', 'fred location', 2, NULL, '2024-05-25 15:50:36', '2024-05-26 13:45:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_quotes`
--
ALTER TABLE `item_quotes`
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
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_users`
--
ALTER TABLE `organization_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_lines`
--
ALTER TABLE `purchase_order_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_request_lines`
--
ALTER TABLE `purchase_request_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ware_houses`
--
ALTER TABLE `ware_houses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `item_images`
--
ALTER TABLE `item_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item_quotes`
--
ALTER TABLE `item_quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organization_users`
--
ALTER TABLE `organization_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_lines`
--
ALTER TABLE `purchase_order_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_request_lines`
--
ALTER TABLE `purchase_request_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ware_houses`
--
ALTER TABLE `ware_houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;