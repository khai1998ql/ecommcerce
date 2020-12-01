-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2020 lúc 03:06 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `admin_avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0123456789', NULL, '$2y$10$yofCR07fJ1F.oUPx8wytYOpuNN3TPEF0gnrpSvw6I4Bb7s96D2eSK', 'public/media/avatar/admin/admin.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_category`
--

CREATE TABLE `blog_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_name_tosub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_category_name`, `blog_category_name_tosub`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức về Shop', 'tin-tuc-ve-shop', NULL, NULL),
(3, 'Ưu đãi liên kết', 'uu-dai-lien-ket', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_post`
--

CREATE TABLE `blog_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_id` int(11) DEFAULT NULL,
  `blog_name_tosub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_author_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_post`
--

INSERT INTO `blog_post` (`id`, `blog_name`, `blog_category_id`, `blog_name_tosub`, `blog_content`, `blog_image`, `post_author_id`, `created_at`, `updated_at`) VALUES
(1, 'BLACK FRIDAY - ĐẠI TIỆC MUA SẮM SALE UP TO 50% CHÍNH THỨC BÙNG NỔ', 1, 'black-friday---dai-tiec-mua-sam-sale-up-to-50-chinh-thuc-bung-no', '<div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Từ 25 - 29/11, Aristino SALE UP TO 50% toàn bộ sản phẩm thời trang nam cao cấp. Các tín đồ thời trang đã sẵn sàng nhập tiệc Black Friday siêu khủng từ Aristino?</p></div></div></div><div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><img alt=\"\" src=\"https://aristino.com/Data/upload/images/900x525-01.png\" style=\"box-sizing: border-box; border-width: initial; border-color: initial; border-image: initial; max-width: 100%; height: auto; display: block; margin: 0px auto;\"></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">NỘI DUNG CHƯƠNG TRÌNH</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">🎁&nbsp;<span style=\"box-sizing: border-box; color: rgb(255, 0, 0);\"><span style=\"box-sizing: border-box; font-weight: 700;\">SALE UP TO&nbsp;50%</span></span>&nbsp;toàn bộ&nbsp;sản phẩm thời trang cao cấp được yêu thích</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">🕓 Thời gian áp dụng: từ&nbsp;<span style=\"box-sizing: border-box; color: rgb(255, 0, 0);\">25/11 - 29/11</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">🔰 Danh mục sản phẩm sale đa dạng:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Áo sơ mi | Áo T.shirt dài tay&nbsp;| Áo len&nbsp;| Áo sweat shirt&nbsp;| Áo giữ nhiệt | Áo khoác&nbsp;| Áo Blazer&nbsp;| Áo Polo&nbsp;|&nbsp;Áo T.shirt&nbsp;|&nbsp;Áo tanktop</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Quần shorts&nbsp;| Quần dài&nbsp;| Quần Khaki | Quần âu</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Suit &amp; Blazer&nbsp;| Bộ đồ...</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">🔰&nbsp;</span>Lưu ý</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Chương trình không áp dụng đồng thời với các CTKM khác, ngoại trừ voucher tiền mặt và điểm tích lũy thành viên do công ty phát hành.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Hàng đã mua trong chương trình áp dụng theo chính sách bảo hành đổi hàng&nbsp;đã ban hành.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Ưu đãi áp dụng cho đến khi hết hàng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">🔰 Áp dụng khi mua sắm online và trực tiếp tại showroom</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; color: rgb(255, 0, 0);\">- Mua sắm online tại:&nbsp;</span><a href=\"https://aristino.com/black-friday-2020.html\" style=\"box-sizing: border-box; color: rgb(51, 51, 51);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">https://aristino.com/black-friday-2020.html</span></a></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">+ Danh mục&nbsp;</span><a href=\"https://aristino.com/outlet-mien-bac.html\" style=\"box-sizing: border-box; color: rgb(51, 51, 51);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">Miền Bắc</span></a><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">&nbsp;(từ Quảng Ngãi trở ra)</span><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">&nbsp;</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">+ Danh mục&nbsp;</span><a href=\"https://aristino.com/outlet-mien-nam.html\" style=\"box-sizing: border-box; color: rgb(51, 51, 51);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">Miền Nam</span></a><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">&nbsp;(từ Lâm Đồng trở vào)</span><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">&nbsp;</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; color: rgb(255, 0, 0);\">- Mua sắm trực tiếp tại showroom &amp; đại lý:&nbsp;</span><span style=\"box-sizing: border-box; color: rgb(0, 0, 0);\">(danh sách đính kèm)</span></p></div></div></div>', 'public/media/post/1684441359146267.png', 1, NULL, NULL),
(2, 'TẶNG MÃ 200K KHI MUA SẮM TẠI SHOWROOM ARISTINO 404 LÝ BÔN, THÁI BÌNH', 3, 'tang-ma-200k-khi-mua-sam-tai-showroom-aristino-404-ly-bon-thai-binh', '<div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Dành tặng cho khách hàng Aristino Thái Bình, Aristino dành tặng mã giảm giá 200K khi mua sắm. Đừng bỏ lỡ!</p></div></div></div><div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">NỘI DUNG ƯU ĐÃI</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">- Tặng E-voucher&nbsp;GIẢM 200K cho đơn hàng từ 1 triệu đồng​ (dành cho các khách hàng nhận được tin nhắn)</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Mã&nbsp;E-voucher được gửi tự động qua SMS.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">ĐIỀU KIỆN SỬ DỤNG E-VOUCHER</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Điều kiện sử dụng E-voucher:</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Voucher chỉ áp dụng 1 lần duy nhất&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Hạn sử dụng voucher: 30/10 - 15/11/2020</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Chỉ áp dụng cho mua hàng tại showroom&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\">Aristino 404 Lý Bôn, Thái Bình.</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Áp dụng cho đơn hàng từ 1 triệu đồng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Không áp dụng đồng thời với CTKM khác.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Kính mời quý khách hàng đến tham quan và trải nghiệm không gian mua sắm đẳng cấp tại showroom Aristino 404 Lý Bôn, Thái Bình.</p></div></div></div>', 'public/media/post/1684441541081905.png', 1, NULL, NULL),
(3, 'WEEKLY DEAL - ĐIỂM ĐẾN VÀNG, NGÀN ƯU ĐÃI', 1, 'weekly-deal---diem-den-vang-ngan-uu-dai', '<div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Chào tháng mới, Aristino dành tặng quý khách hàng nhiều ưu đãi hấp dẫn khi mua sắm. Mua sắm ngay đừng bỏ lỡ!</p></div></div></div><div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; text-align: center;\"><img alt=\"\" src=\"https://aristino.com/Data/upload/images/uyguygu.jpg\" style=\"box-sizing: border-box; border-width: initial; border-color: initial; border-image: initial; max-width: 100%; height: 536px; display: block; margin: 0px auto; width: 800px;\"></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">NỘI DUNG ƯU ĐÃI</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">1. Ưu đãi cho KH hội viên:&nbsp;</span>&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Aristino dành tặng ưu đãi mua hàng mới theo hạng hội viên như sau:</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Platinum: giảm 25% khi mua hàng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Gold: giảm 20%&nbsp;khi mua hàng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Silver: giảm 15%&nbsp;khi mua hàng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Member: giảm 10%&nbsp;khi mua hàng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">2. Sale up to 50%</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">-&nbsp;</span><span style=\"box-sizing: border-box; color: rgb(178, 34, 34);\">Sale up to 50%</span>&nbsp;hàng trăm sản phẩm thời trang nam cao cấp Aristino</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Không áp dụng đồng thời với CTKM khác&nbsp;<br style=\"box-sizing: border-box;\"><br style=\"box-sizing: border-box;\">3.&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\">Tặng E-voucher mua sắm&nbsp;trị giá 300k&nbsp;</span>&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Đối tượng nhận evoucher: khách hàng có&nbsp;<span style=\"box-sizing: border-box; color: rgb(178, 34, 34);\">hóa đơn mua hàng từ&nbsp;1,000,000</span>&nbsp;khi mua sắm tại 10 showroom bên dưới (<em style=\"box-sizing: border-box;\">danh sách kèm theo</em>)</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Điều kiện sử dụng voucher:</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Voucher chỉ áp dụng 1 lần duy nhất&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Hạn sử dụng voucher: 15/10/2020&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Chỉ áp dụng cho mua hàng tại&nbsp;showroom&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Áp dụng với đơn hàng nguyên giá.&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Không áp dụng đồng thời với CTKM khác&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">DANH SÁCH SHOWROOM ÁP DỤNG</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">1.&nbsp;Showroom Aristino Số 225 đuờng Quang Trung, P. Tân Quang, TP. Tuyên Quang</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">2.&nbsp;Showroom Aristino 180 Hoàng Văn Thụ, TP. Bắc Giang, tỉnh Bắc Giang</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">3.&nbsp;Showroom Aristino Lô 1-2, 404 Lý Bôn, TP. Thái Bình, tỉnh Thái Bình</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">4.&nbsp;Showroom Aristino - Số 305 đường Trần Phú, P. Đông Ngàn, thị xã Từ Sơn, Bắc Ninh</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">5.&nbsp;Showroom Aristino 134 Nguyễn Văn Cừ, Tp. Vinh, tỉnh Nghệ An</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">6.&nbsp;Showroom Aristino 84 Nguyễn Trãi, Quận 5, TP. Hồ Chí Minh</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">7.&nbsp;Showroom Aristino 465 Lê Văn Sỹ, Quận 3, TP. Hồ Chí Minh</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">8.&nbsp;Showroom Aristino 400 Hai Bà Trưng, Quận 1, TP. Hồ Chí Minh</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">9.&nbsp;Showroom Aristino L1-02A, Tầng L1, TTTM Vincom Plaza Bảo Lộc, 83 Lê Hồng Phong, Lâm Đồng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">10.&nbsp;Showroom Aristino L1 - 13 Tầng 1 - TTTM Vincom Biên Hòa, 1096 đường Phạm Văn Thuận, Đồng Nai&nbsp;</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Kính mời quý khách hàng đến tham quan và trải nghiệm không gian mua sắm đẳng cấp của Aristino.</p></div></div></div>', 'public/media/post/1684441714364527.png', 1, NULL, NULL),
(4, 'SỞ HỮU THIẾT KẾ SƠ MI WHITE LOTUS MỚI NHẤT CHỈ VỚI 499K', 1, 'so-huu-thiet-ke-so-mi-white-lotus-moi-nhat-chi-voi-499k', '<div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Đồng hành cùng đàn ông Việt, Aristino dành tặng chiếc áo sơ mi White Lotus mới nhất với giá trải nghiệm cực hấp dẫn.</p></div></div></div><div class=\"container\" style=\"box-sizing: border-box; width: 1170px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><div class=\"ars-row\" style=\"box-sizing: border-box; margin-bottom: 30px; overflow: hidden;\"><div class=\"post-excerpt\" style=\"box-sizing: border-box; font-size: 15px; line-height: 22px;\"><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SỞ HỮU ÁO SƠ MI WHITE LOTUS CHỈ VỚI 499K</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Aristino kết hợp cùng nhà thiết kế Ý - Michele Gaudiomonte mang đến sản phẩm áo sơ mi White Lotus.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Trên nền chất liệu Modal mềm nhẹ, bền chắc, White Lotus được dệt họa tiết jacquard cầu kì và tinh tế, tái hiện những đường nét sống động của cánh sen trắng thanh lịch. Phần cổ áo được tinh chỉnh đứng dáng, mang đến vô vàn lựa chọn kết hợp trang phục.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Hơn cả một chiếc áo sơ mi trắng, White Lotus còn mang trên mình dáng hình của văn hóa và truyền thống vô giá, là sự hiện diện của bản lĩnh đàn ông – trưởng thành và sâu sắc qua diện mạo thanh lịch và chỉn chu.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; text-align: center;\"><img alt=\"\" src=\"https://aristino.com/Data/upload/images/oihidjfiog.png\" style=\"box-sizing: border-box; border-width: initial; border-color: initial; border-image: initial; max-width: 100%; height: 419px; display: block; margin: 0px auto; width: 800px;\"></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">Đặc biệt, Aristino dành tặng quý ông cơ hội đặc biệt:</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">-&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\">Mua áo sơ mi White Lotus&nbsp;với giá chỉ</span>&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\">499K</span>&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\">(giá gốc 750K)</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Sơ mi dài tay White Lotus Slim Fit&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\"><a href=\"https://aristino.com/ao-so-mi-nam-dai-tay-aristino-alsr10.html\" style=\"box-sizing: border-box; color: rgb(51, 51, 51);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">ALSR10</span></a></span>&nbsp;giá 499K (giá gốc 750K).&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\"><a href=\"https://aristino.com/ao-so-mi-nam-dai-tay-aristino-alsr10.html\" style=\"box-sizing: border-box; color: rgb(51, 51, 51);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">Xem&nbsp;ngay!</span></a></span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">+ Sơ mi dài tay&nbsp;White Lotus Regular Fit&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\"><a href=\"https://aristino.com/ao-so-mi-dai-tay-nam-aristino-alsr11.html\" style=\"box-sizing: border-box; color: rgb(51, 51, 51);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">ALSR11</span></a></span>&nbsp;giá 499K (giá gốc 750K).&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\"><a href=\"https://aristino.com/ao-so-mi-dai-tay-nam-aristino-alsr11.html\" style=\"box-sizing: border-box; color: rgb(51, 51, 51);\"><span style=\"box-sizing: border-box; color: rgb(0, 0, 205);\">Xem ngay!</span></a></span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">- Thời gian áp dụng: từ&nbsp;<span style=\"box-sizing: border-box; font-weight: 700;\">22/09/2020</span></p></div></div></div>', 'public/media/post/1684441766748503.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_tosub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_tosub`, `brand_logo`, `created_at`, `updated_at`) VALUES
(10, 'Canifa', 'canifa', 'public/media/brand_logo/1683835673933321.png', NULL, NULL),
(11, 'The Blue Exchange', 'the-blue-exchange', 'public/media/brand_logo/1683835690689926.jpg', NULL, NULL),
(12, 'M2', 'm2', 'public/media/brand_logo/1683835701166973.jpg', NULL, NULL),
(13, 'Elise', 'elise', 'public/media/brand_logo/1683835713425023.jpg', NULL, NULL),
(14, 'Ivy Moda', 'lvy-moda', 'public/media/brand_logo/1683835725742811.png', NULL, NULL),
(15, 'Aristino', 'artistino', 'public/media/brand_logo/1683836653221008.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_tosub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_tosub`, `category_status`, `created_at`, `updated_at`) VALUES
(9, 'Áo', 'ao', 1, NULL, NULL),
(10, 'Quần', 'quan', 1, NULL, NULL),
(11, 'Đồ lót', 'do-lot', 1, NULL, NULL),
(12, 'Phụ kiện', 'phu-kien', 1, NULL, NULL),
(13, 'Combo', 'combo', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  `coupon_type_id` int(11) DEFAULT NULL COMMENT '1:Theo phần trăm, 2: Theo giá trị',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_code`, `coupon_discount`, `coupon_type_id`, `created_at`, `updated_at`) VALUES
(4, 'Lễ độc thân', 'FANUMBER1', 300000, 2, NULL, NULL),
(8, 'Lễ cầu mưa', 'FANUMBER2', 50, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon_type`
--

CREATE TABLE `coupon_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon_type`
--

INSERT INTO `coupon_type` (`id`, `coupon_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Giảm theo phần trăm', NULL, NULL),
(2, 'Giảm theo giá trị', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_fee` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `delivery`
--

INSERT INTO `delivery` (`id`, `delivery_name`, `delivery_fee`, `created_at`, `updated_at`) VALUES
(1, 'Vận chuyển miễn phí', 0, NULL, NULL),
(2, 'Giao hàng nhanh', 15000, NULL, NULL),
(3, 'Giao hàng tiết kiệm', 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_15_234407_create_admins_table', 2),
(8, '2020_11_16_090019_create_categories_table', 3),
(9, '2020_11_16_090119_create_subcategories_table', 3),
(10, '2020_11_16_090156_create_brands_table', 3),
(11, '2020_11_17_134837_create_coupons_table', 4),
(12, '2020_11_17_140519_create_coupon_type_table', 5),
(15, '2020_11_18_080544_create_products_table', 6),
(16, '2020_11_18_080701_create_product_detail_table', 6),
(22, '2020_11_22_150135_create_orders_table', 7),
(23, '2020_11_22_150334_create_shipping_table', 7),
(24, '2020_11_23_014153_create_orders_details_table', 8),
(25, '2020_11_23_065939_create_delivery_table', 9),
(26, '2020_11_26_101209_create_blogs_table', 10),
(27, '2020_11_26_101604_create_blog_category_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_type` int(11) DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL,
  `coupon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_type`, `order_code`, `payment_type`, `payment_id`, `subtotal`, `sale`, `delivery`, `coupon`, `total`, `order_status`, `created_at`, `updated_at`) VALUES
(25, NULL, 0, '3318686', 'stripe', 'card_1HtVxgGuw3rAuQaWmW9xJ3Gg', 18000000, 9000000, 10000, 0, 9010000, '3', '2020-12-01 10:19:57', '2020-12-01 10:34:32'),
(26, NULL, 0, '8838886', 'stripe', 'card_1HtW1YGuw3rAuQaWBFbh0EfQ', 2400000, 90000, 10000, 300000, 2020000, '3', '2020-12-01 10:23:57', '2020-12-01 10:34:36'),
(27, NULL, 0, '1464789', 'stripe', 'card_1HtW2FGuw3rAuQaWtqRwXGLt', 600000, 60000, 10000, 270000, 280000, '3', '2020-12-01 10:24:41', '2020-12-01 10:34:42'),
(28, NULL, 0, '6080311', 'stripe', 'card_1HtW3JGuw3rAuQaWIXb6FEDW', 1800000, 0, 10000, 900000, 910000, '3', '2020-12-01 10:25:47', '2020-12-01 10:34:47'),
(29, NULL, 0, '9893944', 'stripe', 'card_1HtW42Guw3rAuQaW2m5xQTfB', 1500000, 0, 10000, 0, 1510000, '3', '2020-12-01 10:26:32', '2020-12-01 10:34:53'),
(30, NULL, 0, '7952277', 'stripe', 'card_1HtW4bGuw3rAuQaW08JO2Vi9', 1800000, 900000, 10000, 0, 910000, '1', '2020-12-01 10:27:06', '2020-12-01 10:32:58'),
(31, NULL, 0, '7131602', 'stripe', 'card_1HtW5MGuw3rAuQaWyPcsO1eh', 1200000, 0, 10000, 0, 1210000, '3', '2020-12-01 10:27:54', '2020-12-01 10:34:58'),
(32, NULL, 0, '8054450', 'stripe', 'card_1HtW6mGuw3rAuQaWa4iLXNsd', 2400000, 900000, 10000, 750000, 760000, '3', '2020-12-01 10:29:21', '2020-12-01 10:35:04'),
(33, NULL, 0, '4103345', 'stripe', 'card_1HtW7sGuw3rAuQaWXUDvUC38', 600000, 60000, 10000, 300000, 250000, '2', '2020-12-01 10:30:30', '2020-12-01 10:34:20'),
(34, NULL, 0, '6185411', 'stripe', 'card_1HtW9BGuw3rAuQaWWyLVaxv1', 1800000, 0, 10000, 900000, 910000, '0', '2020-12-01 10:31:51', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `singleprice` int(11) DEFAULT NULL,
  `singlesale` int(11) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `singlesale`, `totalprice`, `created_at`, `updated_at`) VALUES
(62, 25, 55, 'ÁO POLO ARISTINO APS073S9', 'Xám', 42, 30, 600000, 30000000, 9000000, NULL, NULL),
(63, 26, 53, 'ÁO POLO NAM ARISTINO APSG02S9', 'Cam', 38, 3, 300000, 3000000, 810000, NULL, NULL),
(64, 26, 51, 'ÁO POLO NAM ARISTINO APS038S9', 'Đen', 39, 3, 300000, 0, 900000, NULL, NULL),
(65, 26, 51, 'ÁO POLO NAM ARISTINO APS038S9', 'Đỏ', 39, 2, 300000, 0, 600000, NULL, NULL),
(66, 27, 53, 'ÁO POLO NAM ARISTINO APSG02S9', 'Trắng', 38, 2, 300000, 3000000, 540000, NULL, NULL),
(67, 28, 48, 'ÁO POLO NAM ARISTINO APS008S9', 'Xanh tím than', 38, 6, 300000, 0, 1800000, NULL, NULL),
(68, 29, 51, 'ÁO POLO NAM ARISTINO APS038S9', 'Xanh tím than', 38, 3, 300000, 0, 900000, NULL, NULL),
(69, 29, 47, 'ÁO POLO NAM ARISTINO APS021S9', 'Xanh tím than', 39, 3, 200000, 0, 600000, NULL, NULL),
(70, 30, 54, 'ÁO POLO ARISTINO APS040S9', 'Xám', 39, 3, 600000, 30000000, 900000, NULL, NULL),
(71, 31, 49, 'ÁO POLO NAM ARISTINO APS012S8', 'Xanh biển', 39, 4, 300000, 0, 1200000, NULL, NULL),
(72, 32, 52, 'ÁO POLO NAM ARISTINO APS067S9', 'Trắng', 39, 3, 600000, 30000000, 900000, NULL, NULL),
(73, 32, 48, 'ÁO POLO NAM ARISTINO APS008S9', 'Xanh tím than', 38, 2, 300000, 0, 600000, NULL, NULL),
(74, 33, 53, 'ÁO POLO NAM ARISTINO APSG02S9', 'Trắng', 39, 2, 300000, 3000000, 540000, NULL, NULL),
(75, 34, 48, 'ÁO POLO NAM ARISTINO APS008S9', 'Xanh tím than', 38, 6, 300000, 0, 1800000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_tosub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `product_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_view` int(11) DEFAULT 0,
  `product_sold` int(11) DEFAULT 0,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_rated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_new` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyone_getone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_one_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_four_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_tosub`, `product_code`, `category_id`, `subcategory_id`, `brand_id`, `selling_price`, `discount_price`, `status`, `product_content`, `product_view`, `product_sold`, `video_link`, `hot_deal`, `best_rated`, `hot_new`, `buyone_getone`, `trend`, `avatar`, `image_one`, `image_two`, `image_three`, `image_four`, `image_one_small`, `image_two_small`, `image_three_small`, `image_four_small`, `created_at`, `updated_at`) VALUES
(32, 'ÁO SƠ MI NAM DÀI TAY ARISTINO ALS26109', 'ao-so-mi-nam-dai-tay-aristino-als26109', '123', 9, 11, 15, 600000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG: </span>SLIM FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi lịch sự, chỉn chu phom dáng Slim Fit không sợ bị lỗi mốt.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo được thiết kế đơn giản không túi và phần cổ áo gọn gàng. Tà lượn thời trang dễ dàng sơ vin hay phối cùng các trang phục khác. Họa tiết in tạo điểm nhấn trên nền vải xanh sược trắng trẻ trung tinh tế.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sử dụng chất liệu Bamboo từ sợi tre thiên nhiên giúp bề mặt vải mềm nhẹ, thoáng mát, thấm hút tốt tạo cảm giác dễ chịu cho người mặc. Kết hợp Polyspun có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu. Với 2% thành phần Spandex, áo có khả năng co giãn nhẹ mang đến sự thoải mái cho người mặc ngay cả khi sơ vin.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC: </span>Xanh sược trắng in họa tiết</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE: </span> 38 – 39 – 40 – 41 – 42 – 43</p>', 9, 0, NULL, '1', '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683885575972491.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683885576213370.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683885576522250.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683885576790875.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683885577053899.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683885577313050.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683885577577399.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683885577794384.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683885578064087.jpg', NULL, NULL),
(33, 'ÁO SƠ MI DÀI TAY NAM ARISTINO ALS17509', 'ao-so-mi-dai-tay-nam-aristino-als17509', 'ALS17509', 9, 11, 15, 600000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span> SLIM FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay phom Slim fit có độ ôm vừa vặn cơ thể, tôn dáng người mặc mà vẫn giữ được sự thoải mái cần thiết.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế tà lượn thời trang, không túi ngực. Phần măng set tay được thêu thêm chữ ký cách điệu từ logo Aristino vô cùng tinh tế. Áo dệt hoạ tiết kẻ caro nhiều sắc độ trên nền xanh tím than, mang đến cho người mặc vẻ ngoài ấn tượng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- 50% Modal giúp áo có độ mềm mại, mịn màng cùng độ thoáng khí tuyệt vời. Kết hợp thêm với 50% Polyspun, áo có khả năng đàn hồi tự nhiên, hạn chế sự nhăn co, giảm tối đa thời gian là ủi hàng ngày.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC: </span>Xanh tím than sọc sắc màu</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE: </span>38 – 39 – 40 – 41 – 42 – 43</p>', 3, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683929632863662.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683929633553004.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683929633796607.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683929634034069.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683929634273798.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683929634561846.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683929634813674.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683929635013000.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683929635216173.jpg', NULL, NULL),
(34, 'ÁO SƠ MI NAM CÔNG SỞ ARISTINO ALS17609', 'ao-so-mi-nam-cong-so-aristino-als17609', 'ALS17609', 9, 11, 15, 600000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;REGULAR FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay phom Regular fit đem tới cho áo độ suông vừa, giúp các anh thoải mái hơn nhưng đồng thời vẫn đảm bảo vừa vặn số đo hình thể.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cơ bản với phần tà cắt lượn thời trang, phần túi trước ngực tiện lợi. Phần măng set tay áo cũng được thêu thêm chữ ký cách điệu logo Aristino đầy tinh tế. Áo sử dụng công nghệ dệt yarn dyed tạo họa tiết caro trắng xám trên nền xanh đậm.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Với sự kết hợp của Modal và Polyspun, áo đem tới cảm nhận tuyệt vời trên da nhờ độ mịn màng, mềm mại và độ thoáng khí. Áo còn giúp giảm tối đa thời gian cho việc là ủi hằng ngày nhờ khả năng đàn hồi tự nhiên và ít nhăn co sau quá trình sử dụng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh tím đậm ca-rô</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;38 – 39 – 40 – 41 – 42 – 43</p>', 1, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683934842595570.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683934842861157.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683934843099028.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683934843344651.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683934843584919.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683934843867913.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683934844079727.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683934844281844.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683934844480609.jpg', NULL, NULL),
(35, 'ÁO SƠ MI NAM CÔNG SỞ ARISTINO ALS176091', 'ao-so-mi-nam-cong-so-aristino-als176091', 'ALS176091', 9, 11, 15, 500000, 10, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;REGULAR FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay phom Regular fit đem tới cho áo độ suông vừa, giúp các anh thoải mái hơn nhưng đồng thời vẫn đảm bảo vừa vặn số đo hình thể.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cơ bản với phần tà cắt lượn thời trang, phần túi trước ngực tiện lợi. Phần măng set tay áo cũng được thêu thêm chữ ký cách điệu logo Aristino đầy tinh tế. Áo sử dụng công nghệ dệt yarn dyed tạo họa tiết caro trắng xám trên nền xanh đậm.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Với sự kết hợp của Modal và Polyspun, áo đem tới cảm nhận tuyệt vời trên da nhờ độ mịn màng, mềm mại và độ thoáng khí. Áo còn giúp giảm tối đa thời gian cho việc là ủi hằng ngày nhờ khả năng đàn hồi tự nhiên và ít nhăn co sau quá trình sử dụng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh tím đậm ca-rô</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;38 – 39 – 40 – 41 – 42 – 43</p>', 3, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683938913054301.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683938913370408.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683938913613459.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683938913853018.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683938914091174.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683938914380131.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683938914601088.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683938914806015.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683938915011837.jpg', NULL, NULL),
(36, 'ÁO SƠ MI NAM ARISTINO ALS24609', 'ao-so-mi-nam-aristino-als24609', 'ALS24609', 9, 11, 15, 450000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;REGULAR FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay phom dáng Regular Fit suông nhẹ vừa phải mà vẫn đảm bảo vừa vặn số đo hình thể.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo có túi ngực tiện lợi và tà lượn thời trang giúp các anh sơ vin dễ dàng. Cổ áo đứng gọn gàng tôn lên nét chỉn chu cho người mặc. Đặc biệt, trên nền vải xanh lam nam tính là họa tiết dệt jacquard sược mờ tạo chiều sâu và mang đến diện mạo tinh tế.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Sự kết hợp giữa Modal và Polyspun mang đến cho bề mặt vải độ mềm mại, mịn màng, thoáng khí và thoát ẩm tốt. Cùng với 3% Spandex, áo có khả năng đàn hồi nhẹ, hạn chế nhăn nhàu và giảm thời gian là ủi hàng ngày.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh lam sược mờ</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>&nbsp;38 – 39 – 40 – 41 – 42 – 43</p>', 1, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683942419018029.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942419234984.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942419472382.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942419760030.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942420001410.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942420241041.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942420463522.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942420687577.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942420940796.jpg', NULL, NULL),
(37, 'ÁO SƠ MI DÀI TAY NAM ARISTINO ALS25209', 'ao-so-mi-dai-tay-nam-aristino-als25209', 'ALS25209', 9, 11, 15, 800000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG: </span>REGULAR FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chiếc áo sơ mi được thiết kế theo phom Regular Fit có độ suông rộng, vừa phải đảm bảo sự thoải mái vận động ngay cả khi sơ vin.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Cổ áo nhọn và đứng dáng, tà áo cắt lượn thời trang, trước ngực áo may thêm túi tiện lợi. Trên măng set tay áo còn được thêu thêm chữ ký Aristino độc đáo và duy nhất. Áo sử dụng công nghệ in kỹ thuật số tạo hoạ tiết trừu tượng trên nền trắng vô cùng nổi bật.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sử dụng 50% sợi Modal, áo mềm mại, mịn màng ngay từ khi chạm tay vào, thoáng khí, dễ chịu suốt cả ngày dài. Bổ sung thêm 50% Polyspun, ALS25209 có khả năng đàn hồi tuyệt vời, giúp áo ít nhăn co, giảm tối đa thời gian là ủi hằng ngày.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC: </span>Trắng in họa tiết trừu tượng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span> 38 – 39 – 40 – 41 – 42 – 43</p>', 1, 0, NULL, '1', '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683942611385995.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942611666642.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942611931899.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942612173795.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942612416366.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942612713669.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942612935627.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942613138901.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942613348663.jpg', NULL, NULL),
(38, 'ÁO SƠ MI DÀI TAY NAM ARISTINO ALS14809', 'ao-so-mi-dai-tay-nam-aristino-als14809', 'ALS14809', 9, 11, 15, 600000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;SLIM FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay phom Slim Fit ôm nhẹ gọn gàng và tôn lên đường nét nam tính của cơ thể.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cổ đứng chỉn chu, không túi ngực và tà lượn thời trang. Họa tiết in loang trên nền vải xanh mang đến diện mạo trẻ trung và ấn tượng cho người mặc.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thành phần Modal kết hợp Polyspun mang đến những ưu điểm tuyệt vời dành cho mọi mùa trong năm. Bề mặt vải mềm mại, mịn màng, thoáng khí và thoát ẩm tốt, đem tới sự dễ chịu cho người mặc. Áo còn có khả năng đàn hồi tự nhiên, hạn chế nhăn nhàu và giảm thời gian là ủi hàng ngày.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh in họa tiết loang</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>38 – 39 – 40 – 41 – 42 – 43</p>', 1, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683942789687652.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942789986528.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942790233844.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942790482935.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942790717395.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942791011081.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942791239986.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942791445501.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942791646416.jpg', NULL, NULL),
(39, 'ÁO SƠ MI DÀI TAY NAM ARISTINO ALS16909', 'ao-so-mi-dai-tay-nam-aristino-als16909', 'ALS16909', 9, 11, 15, 600000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;REGULAR FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay phom Regular Fit có độ suông vừa đủ, che đi toàn bộ nhược điểm và đồng thời sẽ giúp các anh thoải mái trong từng cử động.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cơ bản với tà lượn, túi ngực. Áo tạo nên dấu ấn với chữ ký cách điệu từ logo Aristino được thêu ở măng set tay hay hoạ tiết cả kẻ caro đen mờ với kỹ thuật dệt Yarn Dye trên nền xanh tím than.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thành phần chính từ sợi tre thiên nhiên Bamboo đem tới cho mặt vải độ mềm mại, mướt nhẹ, khả năng kháng khuẩn tự nhiên, thoáng khí tối đa.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo được pha thêm sợi Polyspun đem tới độ đàn hồi tự nhiên tuyệt vời, giúp áo ít nhăn co và giảm tối đa thời gian là ủi mỗi ngày.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- 2% sợi Spandex đem lại độ co giãn nhẹ, phù hợp với mọi dáng người</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh tím than caro đen mờ</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;38 - 39 - 40 - 41 - 42 - 43</p>', 1, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1683942936068165.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942936298742.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942936549680.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942936844835.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1683942937118007.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942937375786.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942937606120.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942937867244.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1683942938092724.jpg', NULL, NULL),
(40, 'ÁO SƠ MI DÀI TAY NAM ARISTINO ALS14409', 'ao-so-mi-dai-tay-nam-aristino-als14409', 'ALS14409', 9, 11, 15, 700000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;REGULAR FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay phom phom Regular Fit suông nhẹ, đảm bảo sự thoải mái, mà vẫn vừa vặn số đo hình thể, phù hợp với nhiều dáng người.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cơ bản với túi ngực tiện lợi, tà lượn trẻ trung. Áo dệt hiệu ứng kẻ caro nhỏ là sự pha trộn của 2 khối sắc đậm nhạt của màu xanh tím than, mang đến vẻ ngoài trẻ trung, mà vẫn đầy tinh tế, lịch lãm.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- 2 chất liệu cao cấp Modal và Polyester mang những ưu điểm tuyệt vời: mềm mại ngay từ khi chạm tay vào, mịn màng, thân thiện với làn da, ít nhăn nhàu và dễ dàng là phẳng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh biển ca-rô sược</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>&nbsp;38 – 39 – 40 – 41 – 42 – 43</p>', 1, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684223593744639.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684223594604504.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684223594850029.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684223595103080.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684223595476548.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684223595758464.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684223596002713.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684223596268877.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684223596581697.jpg', NULL, NULL),
(41, 'ÁO SƠ MI DÀI TAY NAM ARISTINO ALS13009', 'ao-so-mi-dai-tay-nam-aristino-als13009', 'ALS13009', 9, 11, 15, 300000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:&nbsp;</span>SLIM FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay ALS13009 phom Slim Fit ôm nhẹ gọn gàng và vừa vặn với từng số đo cơ thể.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế basic, không túi ngực và tà lượn thời trang. Họa tiết dệt yarn dye kẻ caro xám - trắng mang đến diện mạo trẻ trung cho người mặc.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thành phần Modal kết hợp Polyspun mang đến những ưu điểm tuyệt vời dành cho mọi mùa trong năm. Bề mặt vải mềm mại, mịn màng, thoáng khí và thoát ẩm tốt, đem tới sự dễ chịu cho người mặc. Áo còn có khả năng đàn hồi tự nhiên, hạn chế nhăn nhàu và giảm thời gian là ủi hàng ngày.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xám ca-rô trắng</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>&nbsp;38 – 39 – 40 – 41 – 42 – 43</p>', 1, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684224997210373.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684224997488860.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684224997728986.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684224997993607.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684224998228569.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684224998516040.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684224998724038.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684224998931547.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684224999129865.jpg', NULL, NULL),
(42, 'ÁO SƠ MI DÀI TAY NAM ARISTINO ALS20209', 'ao-so-mi-dai-tay-nam-aristino-als20209', 'ALS20209', 9, 11, 15, 200000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:&nbsp;</span>SLIM FIT - TÀ LƯỢN</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo sơ mi dài tay ALS20209 phom Slim Fit ôm nhẹ và tôn dáng gọn gàng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế basci, không túi ngực và tà lượn thời trang.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Họa tiết in lá xanh trên nền vải trắng thanh lịch mang đến cảm hứng thiên nhiên nhẹ nhàng và thư giãn.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu từ 100% sợi cotton tự nhiên cao cấp mang đến bề mặt vải mềm mại, thoáng mát, xốp nhẹ và ít nhăn nhàu. Khả năng thấm hút mồ hôi và thoát ẩm tốt, giúp người mặc luôn thoải mái dù ở mùa nào trong năm.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Trắng in lá xanh</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;38 – 39 – 40 – 41 – 42 – 43</p>', 6, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684225106014400.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684225106240178.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684225106551013.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684225106789135.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684225107032066.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684225107276125.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684225107530780.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684225107737727.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684225107941837.jpg', NULL, NULL),
(43, 'ÁO POLO NAM ARISTINO APS010S9', 'ao-polo-nam-aristino-aps010s9', 'APS010S9', 9, 12, 15, 400000, 30, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:&nbsp;</span>SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim fit ôm vừa vặn, tôn dáng người mặc.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cổ đức 2 khuy chỉn chu và gấu xẻ năng động. Áo in họa tiết hoa hồng trẻ trung và tươi mới, màu sắc trung tính, có thể kết hợp với nhiều trang phục khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">-Chất liệu Cotton từ sợi bông cho bề mặt mịn và mát, thấm hút mồ hôi tốt, thoáng khí.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Kết hợp cùng 5% Spandex mang đến sự co giãn thoải mái trong mọi hoạt động.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Đen 9in, Trắng 6in</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>S - M - L - XL - XXL</p>', 0, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684226220830077.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226221024976.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226221171531.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226221346240.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226221487261.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226221651221.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226221758262.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226221862922.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226221971299.jpg', NULL, NULL),
(44, 'ÁO POLO ARISTINO APS084S9', 'ao-polo-aristino-aps084s9', 'APS084S9', 9, 12, 15, 300000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:&nbsp;</span>SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim fit ôm vừa vặn cơ thể, trẻ trung và tôn dán.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cơ bản, cổ và gấu tay áo dệt rib tạo họa tiết mới lạ. Áo có màu sắc cơ bản, có thể kết hợp với nhiều trang phục khác nhau trong nhiều hoàn cảnh khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU</span>:</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu Cupro cao cấp từ sợi xơ hạt bông quý hiếm, kết hợp Polycool cho sản phẩm tăng cường độ mềm mại, đứng dáng và thoáng mát gấp 2,5 lần so với sợi thường.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo co giãn nhờ kết hợp sợi Spandex.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh biển 79</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;S – M – L – XL – XXL</p>', 0, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684226560537424.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226560651462.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226560878150.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226561069170.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226561216151.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226561367938.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226561493955.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226561601465.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226561745030.jpg', NULL, NULL),
(45, 'ÁO POLO NAM ARISTINO APS014S9', 'ao-polo-nam-aristino-aps014s9', 'APS014S9', 9, 12, 15, 300000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:&nbsp;</span>SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:&nbsp;</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim Fit ôm vừa vặn, trẻ trung và tôn dáng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế cơ bản, dệt tạo hiệu ứng màu melange độc đáo, màu sắc áo đa dạng, có thể kết hợp với nhiều loại trang phục khác nhau trong nhiều hoàn cảnh khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu Askin Polyester siêu mỏng nhẹ, với khả năng thấm hút, khả năng giữ form, giữ màu vượt trội, dành riêng cho các quý ông ưa vận động. Kết hợp Spandex giúp áo có khả năng co giãn thoải mái.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh tím than 12MF, Xanh biển 58MF, Hồng 10MF, Cam 78MF</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>&nbsp;S – M – L – XL – XXL</p>', 0, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684226789260011.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226789422973.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226789569829.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226789705392.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684226789838985.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226789975747.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226790082814.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226790190531.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684226790295525.jpg', NULL, NULL);
INSERT INTO `products` (`id`, `product_name`, `product_tosub`, `product_code`, `category_id`, `subcategory_id`, `brand_id`, `selling_price`, `discount_price`, `status`, `product_content`, `product_view`, `product_sold`, `video_link`, `hot_deal`, `best_rated`, `hot_new`, `buyone_getone`, `trend`, `avatar`, `image_one`, `image_two`, `image_three`, `image_four`, `image_one_small`, `image_two_small`, `image_three_small`, `image_four_small`, `created_at`, `updated_at`) VALUES
(46, 'ÁO POLO NAM ARISTINO APS082S9', 'ao-polo-nam-aristino-aps082s9', 'APS082S9', 9, 12, 15, 300000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:&nbsp;</span>SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:&nbsp;</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\">- Áo Polo phom dáng Slim fit ôm vừa vặn cơ thể, tôn dáng người mặc.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\">- Thiết kế cơ bản, cổ và gấu tay áo dệt rib tạo họa tiết xương cá độc đáo, phía sau cổ áo còn được thêu logo thương hiệu đầy tinh tế. Áo có màu sắc cơ bản, có thể kết hợp với nhiều trang phục khác nhau trong nhiều hoàn cảnh khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\">- Chất liệu Cupro cao cấp từ sợi xơ hạt bông quý hiếm, kết hợp Polycool cho sản phẩm tăng cường độ mềm mại, đứng dáng và thoáng mát gấp 2,5 lần so với sợi thường. Áo co giãn nhờ kết hợp sợi Spandex.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Xanh biển 79</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px; text-align: justify;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>&nbsp;S – M – L – XL – XXL</p>', 0, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684227311311475.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227311449721.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227311633323.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227311767781.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227311900612.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227312036713.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227312144179.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227312248712.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227312351947.jpg', NULL, NULL),
(47, 'ÁO POLO NAM ARISTINO APS021S9', 'ao-polo-nam-aristino-aps021s9', 'APS021S9', 9, 12, 13, 200000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">•Áo Polo phom dáng Slim Fit ôm vừa vặn, trẻ trung và tôn dáng người mặc.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">•Cổ áo 2 khuy và tay áo dệt borib phối 3 đường line khác màu tạo điểm nhấn ấn tượng. Màu sắc nam tính kết hợp kiểu dệt mắt chim phối màu xanh - đen mang đến diện mạo thu hút cho nam giới.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">•Chất liệu Cupro cao cấp từ sợi xơ hạt bông quý hiếm, kết hợp Polycool cho sản phẩm tăng cường độ mềm mại và thoáng mát gấp 2,5 lần so với sợi thường. Áo đứng dáng, đàn hồi và hạn chế bai dão nhờ bổ sung sợi Spandex.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Đỏ 44, Xanh cổ vịt 25, Xanh biển&nbsp;38, Xanh tím than 2</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>S – M – L – XL – XXL</p>', 1, 3, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684227445020194.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227445137154.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227445273393.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227445408774.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227445563375.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227445696981.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227445851394.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227445959821.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227446064110.jpg', NULL, NULL),
(48, 'ÁO POLO NAM ARISTINO APS008S9', 'ao-polo-nam-aristino-aps008s9', 'APS008S9', 9, 12, 11, 300000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:&nbsp;</span>SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim Fit ôm gọn gàng và tôn dáng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo cổ dệt 2 khuy và tay áo bo viền lịch sự. Hiệu ứng màu melange mang đến diện mạo thu hút cho phái mạnh. Thiết kế basic giúp áo dễ kết hợp với nhiều trang phục và phong cách khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:&nbsp;</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu CVC cao cấp là sự kết hợp ưu điểm của sợi cotton tự nhiên mềm mại, thoáng mát, xốp nhẹ. Đồng thời có độ bền chắc, màu sắc sắc nét của sợi polyester. Áo có độ co giãn thoải mái khi vận động nhờ 5% spandex.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:</span>&nbsp;Xanh tím than 25MF</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>S – M – L – XL – XXL</p>', 0, 14, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684227575027782.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227575154612.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227575292414.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227575449838.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227575583726.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227575716286.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227575870145.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227575980021.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227576094191.jpg', NULL, NULL),
(49, 'ÁO POLO NAM ARISTINO APS012S8', 'ao-polo-nam-aristino-aps012s8', 'APS012S8', 9, 12, 13, 300000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;REGULAR FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo hè phom dáng Regular fit suông nhẹ, thoải mái.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Mặt vải dệt lacoste (piqué) cho sản phẩm có kết cấu thoáng mát dễ chịu. Kết hợp hiệu ứng màu melange trẻ trung, dễ kết hợp với nhiều trang phục trong nhiều hoàn cảnh khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu Cotton thiên nhiên mềm mại, dễ chịu khi tiếp xúc với da. Vải xốp nhẹ và thoáng mát, thấm hút mồ hôi và thoát ẩm tốt, mang lại cảm giác thoải mái trong mùa hè.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo đàn hồi tốt nhờ bổ sung sợi Spandex.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:</span>&nbsp;Đỏ 52M, Xanh biển 158, Xám 158M, Xanh tím than 102M</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>S - M - L - XL - XXL</p>', 0, 4, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684227704819965.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227704955770.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227705094606.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227705244933.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227705393821.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227705542574.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227705674249.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227705852317.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227705966145.jpg', NULL, NULL),
(50, 'ÁO POLO NAM ARISTINO APS012S8', 'ao-polo-nam-aristino-aps012s8', 'APS012S8', 9, 12, 13, 300000, 0, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;REGULAR FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo hè phom dáng Regular fit suông nhẹ, thoải mái.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Mặt vải dệt lacoste (piqué) cho sản phẩm có kết cấu thoáng mát dễ chịu. Kết hợp hiệu ứng màu melange trẻ trung, dễ kết hợp với nhiều trang phục trong nhiều hoàn cảnh khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu Cotton thiên nhiên mềm mại, dễ chịu khi tiếp xúc với da. Vải xốp nhẹ và thoáng mát, thấm hút mồ hôi và thoát ẩm tốt, mang lại cảm giác thoải mái trong mùa hè.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo đàn hồi tốt nhờ bổ sung sợi Spandex.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:</span>&nbsp;Đỏ 52M, Xanh biển 158, Xám 158M, Xanh tím than 102M</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:&nbsp;</span>S - M - L - XL - XXL</p>', 0, 0, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684227704924254.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227705041961.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227705187138.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227705335318.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227705485715.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227705652728.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227705822738.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227705935551.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227706047112.jpg', NULL, NULL),
(51, 'ÁO POLO NAM ARISTINO APS038S9', 'ao-polo-nam-aristino-aps038s9', 'APS038S9', 9, 12, 13, 300000, 0, 1, '<p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;SLIM FIT</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim Fit ôm vừa vặn, trẻ trung và tôn dáng.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế nam tính, cổ áo kéo khóa tiện lợi, cổ và tay áo dệt rib, có viền khác màu tạo điểm nhấn. Áo màu sắc cơ bản, có thể kết hợp với nhiều loại trang phục khác nhau trong nhiều hoàn cảnh khác nhau.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu CVC cao cấp là sự kết hợp ưu điểm của cotton tự nhiên mềm mại, thoáng mát, xốp nhẹ và độ bền chắc, màu sắc sắc nét của sợi nhân tạo. Áo co giãn thoải mái nhờ sợi spandex.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:</span>&nbsp;Trắng 6, Đỏ 5, Đen 9</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;S - M - L - XL - XXL</p>', 0, 8, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684227854944909.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227855062254.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227855197101.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227855331174.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227855465284.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227855604089.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227855759430.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227855866913.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227855997058.jpg', NULL, NULL),
(52, 'ÁO POLO NAM ARISTINO APS067S9', 'ao-polo-nam-aristino-aps067s9', 'APS067S9', 9, 12, 10, 600000, 50, 1, '<p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;SLIM FIT</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim Fit ôm vừa vặn và tôn dáng.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Cổ áo 2 khuy dệt chạy kim tuyến độc đáo và ấn tượng. Thiết kế basic, màu sắc nam tính dễ kết hợp với các loại trang phục khác nhau trong nhiều hoàn cảnh khác nhau.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu 100% Cotton Organic từ sợi bông hữu cơ được nuôi trồng, thu hoạch và kéo sợi theo quy trình \"sạch\" thuần khiết, không hóa chất để bảo vệ làn da và môi trường. Áo có khả năng thấm hút vượt trội, mềm mại, mịn màng và kháng khuẩn tự nhiên.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:</span>&nbsp;Đỏ 20, Trắng 6, Xanh tím than 8, Đen 9</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;S - M - L - XL - XXL</p>', 0, 3, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684227947116700.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227947233640.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227947372590.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227947702429.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684227947840749.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227948026457.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227948131354.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227948240866.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684227948346261.jpg', NULL, NULL),
(53, 'ÁO POLO NAM ARISTINO APSG02S9', 'ao-polo-nam-aristino-apsg02s9', 'APSG02S9', 9, 12, 13, 300000, 10, 1, '<p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;GOLF FIT</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHI TIẾT:</span></p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Golf Fit dành riêng cho các quý ông đam mê golf và yêu thích vận động.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế tối giản với cổ áo 2 khuy và tay áo bo viền lịch sự nhưng vẫn toát lên vẻ ngoài khỏe khoắn, nam tính. Màu sắc đa dạng cho các quý ông nhiều lựa chọn. Áo dễ kết hợp với các loại quần golf, quần shorts trong các hoạt động thể thao.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu Polyester tuyệt vời cho mùa hè nóng ẩm ở Việt Nam. Sợi PE được xử lý với công nghệ tiên tiến Moisture Wicking anti UV tạo nên mặt cắt đặc biệt có các khoang rỗng trong sợi. Nhờ đó gia tăng khả năng thấm hút mồ hôi, thoáng khí, nhẹ hơn và khô nhanh hơn gấp 2 lần so với cotton, mang lại cảm giác mềm mượt, mát lạnh, dễ chịu cho cả ngày hoạt động. Áo có khả năng chống năng, kháng tia UV, giúp bảo vệ làn da khi hoạt động ngoài trời.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo đảm bảo độ co giãn thoải mái khi vận động nhờ 10% spandex.</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:</span>&nbsp;Cam 2, Trắng 6, Xanh biển 70</p><p data-mce-style=\"text-align: justify;\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">SIZE:</span>&nbsp;S - M - L - XL - XXL</p>', 0, 7, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684228083559886.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228083712901.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228083891278.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228084025305.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228084160507.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228084357322.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228084482140.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228084592706.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228084704083.jpg', NULL, NULL),
(54, 'ÁO POLO ARISTINO APS040S9', 'ao-polo-aristino-aps040s9', 'APS040S9', 9, 12, 12, 600000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim Fit ôm nhẹ và tôn dáng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế basic với cổ 2 khuy chỉn chu. Họa tiết kẻ ngang dệt Yarn dye kết hợp đục lỗ nhỏ tinh tế mang đến cảm giác thoáng mát cho người mặc. Màu sắc nam tính, dễ kết hợp trang phục và phù hợp trong nhiều hoàn cảnh.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu Polyester Cool tuyệt vời cho mùa hè nóng ẩm ở Việt Nam. Sợi PE được xử lý với công nghệ tiên tiến Moisture Wicking tạo nên mặt cắt đặc biệt có các khoang rỗng trong sợi. Nhờ đó gia tăng khả năng thấm hút mồ hôi, thoáng khí, nhẹ hơn và khô nhanh hơn gấp 2 lần so với cotton, mang lại cảm giác mềm mượt, mát lạnh, dễ chịu cho cả ngày hoạt động.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo có thể co giãn nhờ kết hợp Spandex.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:</span>&nbsp;Xanh biển kẻ 56, Xanh lá 37 kẻ, Xám 63 kẻ, Đỏ 73 kẻ</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Size:</span>&nbsp;S – M – L – XL – XXL</p>', 2, 3, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684228214847681.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228214980442.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228215113649.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228215248353.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228215430329.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228215566414.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228215674031.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228215781981.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228215887351.jpg', NULL, NULL),
(55, 'ÁO POLO ARISTINO APS073S9', 'ao-polo-aristino-aps073s9', 'APS073S9', 9, 12, 13, 600000, 50, 1, '<p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">KIỂU DÁNG:</span>&nbsp;SLIM FIT</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Áo Polo phom dáng Slim Fit ôm gọn gàng và tôn dáng.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Thiết kế basic với gấu xẻ năng động nhưng vẫn rất lịch sự với cổ áo 2 khuy chỉn chu. Hiệu ứng Mesh tạo nên bề mặt vải độc đáo với hiệu ứng màu melange bên ngoài và họa tiết kẻ bên trong. Bề mặt lưới, xốp và nhẹ giúp áo thoáng mát và thấm hút mồ hôi vượt trội đồng thời không bị giãn khi kéo mạnh hay co lại khi giặt.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Màu sắc cơ bản giúp áo dễ dàng kết hợp với nhiều trang phục và phong cách khác nhau.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">CHẤT LIỆU:</span></p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\">- Chất liệu 100% Polyester Cool tuyệt vời cho mùa hè nóng ẩm ở Việt Nam. Sợi PE được xử lý với công nghệ tiên tiến Moisture Wicking tạo nên mặt cắt đặc biệt có các khoang rỗng trong sợi. Nhờ đó gia tăng khả năng thấm hút mồ hôi, thoáng khí, nhẹ hơn và khô nhanh hơn gấp 2 lần so với cotton, mang lại cảm giác mềm mượt, mát lạnh, dễ chịu cho cả ngày hoạt động.</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">MÀU SẮC:&nbsp;</span>Booc đô 17 Mesh, Xanh aqua 1 Mesh, Xanh tím than 57 Mesh, Xám 9 Mesh</p><p style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Size:</span>&nbsp;S – M – L – XL – XXL</p>', 3, 30, NULL, NULL, '1', '1', '1', '1', 'http://localhost/ecommerce/public/media/product/avatar/1684228303528781.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228303641415.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228303776808.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228303916301.jpg', 'http://localhost/ecommerce/public/media/product/product_big/1684228304081864.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228304218353.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228304329938.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228304450456.jpg', 'http://localhost/ecommerce/public/media/product/product_small/1684228304612738.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_detail_sold` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `product_color`, `product_size`, `product_quantity`, `product_detail_sold`, `created_at`, `updated_at`) VALUES
(60, 32, 'Đen', 38, 107, 0, NULL, NULL),
(61, 32, 'Đen', 39, 77, 0, NULL, NULL),
(62, 32, 'Đen', 40, 118, 0, NULL, NULL),
(63, 32, 'Đen', 41, 86, 0, NULL, NULL),
(64, 32, 'Trắng', 38, 32, 0, NULL, NULL),
(65, 32, 'Trắng', 39, 46, 0, NULL, NULL),
(66, 33, 'Đen', 38, 71, 0, NULL, NULL),
(67, 33, 'Đen', 39, 50, 0, NULL, NULL),
(68, 33, 'Đen', 40, 65, 0, NULL, NULL),
(69, 33, 'Đen', 41, 119, 0, NULL, NULL),
(70, 33, 'Đen', 42, 112, 0, NULL, NULL),
(71, 34, 'Vàng', 38, 60, 0, NULL, NULL),
(72, 34, 'Vàng', 39, 80, 0, NULL, NULL),
(73, 34, 'Vàng', 40, 97, 0, NULL, NULL),
(74, 34, 'Vàng', 41, 91, 0, NULL, NULL),
(75, 34, 'Xanh đậm', 38, 39, 0, NULL, NULL),
(76, 34, 'Xanh đậm', 49, 82, 0, NULL, NULL),
(77, 34, 'Xanh đậm', 40, 99, 0, NULL, NULL),
(78, 34, 'Xanh đậm', 41, 51, 0, NULL, NULL),
(79, 34, 'Xanh đậm', 42, 51, 0, NULL, NULL),
(80, 34, 'Xanh da trời', 38, 65, 0, NULL, NULL),
(81, 34, 'Xanh da trời', 39, 83, 0, NULL, NULL),
(82, 34, 'Xanh da trời', 45, 42, 0, NULL, NULL),
(83, 35, 'Xanh', 38, 74, 0, NULL, NULL),
(84, 35, 'Xanh', 39, 107, 0, NULL, NULL),
(85, 35, 'Xanh', 40, 95, 0, NULL, NULL),
(86, 35, 'Xanh', 41, 38, 0, NULL, NULL),
(87, 35, 'Đỏ', 45, 60, 0, NULL, NULL),
(88, 35, 'Đỏ', 46, 56, 0, NULL, NULL),
(89, 35, 'Đỏ', 42, 85, 0, NULL, NULL),
(90, 35, 'Đỏ', 43, 111, 0, NULL, NULL),
(91, 35, 'Vàng', 38, 56, 0, NULL, NULL),
(92, 35, 'Vàng', 39, 111, 0, NULL, NULL),
(93, 35, 'Vàng', 40, 77, 0, NULL, NULL),
(94, 35, 'Vàng', 41, 78, 0, NULL, NULL),
(95, 35, 'Hồng', 39, 92, 0, NULL, NULL),
(96, 35, 'Hồng', 40, 62, 0, NULL, NULL),
(97, 35, 'Hồng', 41, 50, 0, NULL, NULL),
(98, 35, 'Hồng', 42, 65, 0, NULL, NULL),
(99, 36, 'Vàng', 39, 87, 0, NULL, NULL),
(100, 36, 'Vàng', 40, 82, 0, NULL, NULL),
(101, 36, 'Vàng', 41, 95, 0, NULL, NULL),
(102, 36, 'Vàng', 42, 48, 0, NULL, NULL),
(103, 37, 'Cam', 39, 78, 0, NULL, NULL),
(104, 37, 'Cam', 40, 46, 0, NULL, NULL),
(105, 37, 'Cam', 41, 61, 0, NULL, NULL),
(106, 37, 'Cam', 4, 44, 0, NULL, NULL),
(119, 38, 'Vàng', 38, 70, 0, NULL, NULL),
(120, 38, 'Vàng', 39, 80, 0, NULL, NULL),
(121, 38, 'Vàng', 40, 88, 0, NULL, NULL),
(122, 38, 'Vàng', 41, 55, 0, NULL, NULL),
(123, 38, 'Trắng', 38, 75, 0, NULL, NULL),
(124, 38, 'Trắng', 39, 71, 0, NULL, NULL),
(125, 38, 'Trắng', 40, 94, 0, NULL, NULL),
(126, 38, 'Trắng', 41, 36, 0, NULL, NULL),
(127, 38, 'Xám', 38, 54, 0, NULL, NULL),
(128, 38, 'Xám', 39, 42, 0, NULL, NULL),
(129, 38, 'Xám', 40, 120, 0, NULL, NULL),
(130, 38, 'Xám', 41, 35, 0, NULL, NULL),
(131, 38, 'Tím', 38, 74, 0, NULL, NULL),
(132, 38, 'Tím', 39, 57, 0, NULL, NULL),
(133, 38, 'Tím', 40, 87, 0, NULL, NULL),
(134, 38, 'Tím', 41, 98, 0, NULL, NULL),
(135, 39, 'Trắng', 40, 101, 0, NULL, NULL),
(136, 39, 'Trắng', 41, 52, 0, NULL, NULL),
(137, 39, 'Trắng', 42, 88, 0, NULL, NULL),
(138, 39, 'Trắng', 43, 101, 0, NULL, NULL),
(139, 39, 'Đen', 40, 44, 0, NULL, NULL),
(140, 39, 'Đen', 41, 110, 0, NULL, NULL),
(141, 39, 'Đen', 42, 89, 0, NULL, NULL),
(142, 39, 'Đen', 43, 65, 0, NULL, NULL),
(143, 39, 'Hồng', 39, 48, 0, NULL, NULL),
(144, 39, 'Hồng', 40, 99, 0, NULL, NULL),
(145, 39, 'Hồng', 41, 58, 0, NULL, NULL),
(146, 39, 'Hồng', 42, 67, 0, NULL, NULL),
(147, 39, 'Tím', 39, 84, 0, NULL, NULL),
(148, 39, 'Tím', 40, 73, 0, NULL, NULL),
(149, 39, 'Tím', 41, 46, 0, NULL, NULL),
(150, 39, 'Tím', 42, 101, 0, NULL, NULL),
(151, 40, 'Xanh biển', 38, 32, 0, NULL, NULL),
(152, 40, 'Xanh biển', 39, 70, 0, NULL, NULL),
(153, 40, 'Xanh biển', 40, 60, 0, NULL, NULL),
(154, 40, 'Xanh biển', 41, 45, 0, NULL, NULL),
(155, 41, 'Xám', 38, 84, 0, NULL, NULL),
(156, 41, 'Xám', 39, 92, 0, NULL, NULL),
(157, 41, 'Xám', 40, 75, 0, NULL, NULL),
(158, 41, 'Xám', 41, 60, 0, NULL, NULL),
(159, 41, 'Xám', 42, 91, 0, NULL, NULL),
(160, 41, 'Xám', 43, 71, 0, NULL, NULL),
(161, 42, 'Trắng', 38, 55, 0, NULL, NULL),
(162, 42, 'Trắng', 39, 101, 0, NULL, NULL),
(163, 42, 'Trắng', 40, 49, 0, NULL, NULL),
(164, 42, 'Trắng', 41, 102, 0, NULL, NULL),
(165, 42, 'Trắng', 42, 99, 0, NULL, NULL),
(166, 42, 'Trắng', 43, 44, 0, NULL, NULL),
(167, 43, 'Đen', 38, 67, 0, NULL, NULL),
(168, 43, 'Đen', 39, 51, 0, NULL, NULL),
(169, 43, 'Đen', 40, 90, 0, NULL, NULL),
(170, 43, 'Đen', 41, 80, 0, NULL, NULL),
(171, 43, 'Đen', 42, 85, 0, NULL, NULL),
(172, 43, 'Trắng', 38, 98, 0, NULL, NULL),
(173, 43, 'Trắng', 39, 34, 0, NULL, NULL),
(174, 44, 'Trắng', 38, 81, 0, NULL, NULL),
(175, 44, 'Trắng', 39, 46, 0, NULL, NULL),
(176, 44, 'Trắng', 40, 65, 0, NULL, NULL),
(177, 44, 'Trắng', 41, 86, 0, NULL, NULL),
(178, 44, 'Trắng', 42, 85, 0, NULL, NULL),
(179, 44, 'Đen', 38, 113, 0, NULL, NULL),
(180, 44, 'Đen', 39, 34, 0, NULL, NULL),
(181, 44, 'Đen', 40, 48, 0, NULL, NULL),
(182, 44, 'Đen', 41, 118, 0, NULL, NULL),
(183, 44, 'Đen', 42, 34, 0, NULL, NULL),
(184, 44, 'Xanh biển', 38, 106, 0, NULL, NULL),
(185, 44, 'Xanh biển', 39, 112, 0, NULL, NULL),
(186, 44, 'Xanh biển', 40, 60, 0, NULL, NULL),
(187, 44, 'Xanh biển', 41, 56, 0, NULL, NULL),
(188, 44, 'Xanh biển', 42, 58, 0, NULL, NULL),
(189, 45, 'Xanh tím than', 38, 77, 0, NULL, NULL),
(190, 45, 'Xanh tím than', 39, 104, 0, NULL, NULL),
(191, 45, 'Xanh tím than', 40, 78, 0, NULL, NULL),
(192, 45, 'Xanh tím than', 41, 114, 0, NULL, NULL),
(193, 45, 'Xanh tím than', 42, 48, 0, NULL, NULL),
(194, 45, 'Xanh biển', 38, 82, 0, NULL, NULL),
(195, 45, 'Xanh biển', 39, 51, 0, NULL, NULL),
(196, 45, 'Xanh biển', 40, 68, 0, NULL, NULL),
(197, 45, 'Xanh biển', 41, 75, 0, NULL, NULL),
(198, 45, 'Xanh biển', 42, 81, 0, NULL, NULL),
(199, 45, 'Hồng', 38, 116, 0, NULL, NULL),
(200, 45, 'Hồng', 39, 55, 0, NULL, NULL),
(201, 45, 'Hồng', 40, 117, 0, NULL, NULL),
(202, 45, 'Hồng', 41, 93, 0, NULL, NULL),
(203, 45, 'Hồng', 42, 102, 0, NULL, NULL),
(204, 46, 'Xanh biển', 38, 91, 0, NULL, NULL),
(205, 46, 'Xanh biển', 39, 78, 0, NULL, NULL),
(206, 46, 'Xanh biển', 40, 113, 0, NULL, NULL),
(207, 46, 'Xanh biển', 41, 102, 0, NULL, NULL),
(208, 46, 'Xanh biển', 42, 120, 0, NULL, NULL),
(209, 47, 'Đỏ', 38, 119, 0, NULL, NULL),
(210, 47, 'Đỏ', 39, 73, 0, NULL, NULL),
(211, 47, 'Đỏ', 40, 58, 0, NULL, NULL),
(212, 47, 'Đỏ', 41, 103, 0, NULL, NULL),
(213, 47, 'Đỏ', 42, 47, 0, NULL, NULL),
(214, 47, 'Xanh tím than', 38, 111, 0, NULL, NULL),
(215, 47, 'Xanh tím than', 39, 107, 3, NULL, NULL),
(216, 47, 'Xanh tím than', 40, 63, 0, NULL, NULL),
(217, 47, 'Xanh tím than', 41, 49, 0, NULL, NULL),
(218, 47, 'Xanh tím than', 42, 93, 0, NULL, NULL),
(219, 48, 'Xanh tím than', 38, 51, 14, NULL, NULL),
(220, 48, 'Xanh tím than', 39, 84, 0, NULL, NULL),
(221, 48, 'Xanh tím than', 40, 92, 0, NULL, NULL),
(222, 48, 'Xanh tím than', 41, 30, 0, NULL, NULL),
(223, 48, 'Xanh tím than', 42, 39, 0, NULL, NULL),
(224, 49, 'Đỏ', 38, 83, 0, NULL, NULL),
(225, 49, 'Đỏ', 39, 94, 0, NULL, NULL),
(226, 49, 'Đỏ', 40, 112, 0, NULL, NULL),
(227, 50, 'Đỏ', 38, 42, 0, NULL, NULL),
(228, 49, 'Đỏ', 41, 52, 0, NULL, NULL),
(229, 50, 'Đỏ', 39, 55, 0, NULL, NULL),
(230, 49, 'Đỏ', 42, 34, 0, NULL, NULL),
(231, 50, 'Đỏ', 40, 101, 0, NULL, NULL),
(232, 49, 'Xanh biển', 38, 68, 0, NULL, NULL),
(233, 50, 'Đỏ', 41, 78, 0, NULL, NULL),
(234, 49, 'Xanh biển', 39, 107, 4, NULL, NULL),
(235, 50, 'Đỏ', 42, 46, 0, NULL, NULL),
(236, 49, 'Xanh biển', 40, 46, 0, NULL, NULL),
(237, 50, 'Xanh biển', 38, 80, 0, NULL, NULL),
(238, 49, 'Xanh biển', 41, 96, 0, NULL, NULL),
(239, 50, 'Xanh biển', 39, 95, 0, NULL, NULL),
(240, 49, 'Xanh biển', 42, 88, 0, NULL, NULL),
(241, 50, 'Xanh biển', 40, 39, 0, NULL, NULL),
(242, 49, 'Xanh tím than', 38, 118, 0, NULL, NULL),
(243, 50, 'Xanh biển', 41, 55, 0, NULL, NULL),
(244, 49, 'Xanh tím than', 39, 116, 0, NULL, NULL),
(245, 50, 'Xanh biển', 42, 43, 0, NULL, NULL),
(246, 49, 'Xanh tím than', 40, 66, 0, NULL, NULL),
(247, 50, 'Xanh tím than', 38, 115, 0, NULL, NULL),
(248, 49, 'Xanh tím than', 41, 89, 0, NULL, NULL),
(249, 50, 'Xanh tím than', 39, 64, 0, NULL, NULL),
(250, 49, 'Xanh tím than', 42, 63, 0, NULL, NULL),
(251, 50, 'Xanh tím than', 40, 75, 0, NULL, NULL),
(252, 50, 'Xanh tím than', 41, 113, 0, NULL, NULL),
(253, 50, 'Xanh tím than', 42, 74, 0, NULL, NULL),
(254, 51, 'Trắng', 38, 61, 0, NULL, NULL),
(255, 51, 'Trắng', 39, 75, 0, NULL, NULL),
(256, 51, 'Trắng', 40, 99, 0, NULL, NULL),
(257, 51, 'Trắng', 41, 114, 0, NULL, NULL),
(258, 51, 'Trắng', 42, 63, 0, NULL, NULL),
(259, 51, 'Đen', 38, 47, 0, NULL, NULL),
(260, 51, 'Đen', 39, 68, 3, NULL, NULL),
(261, 51, 'Đen', 40, 86, 0, NULL, NULL),
(262, 51, 'Đen', 41, 102, 0, NULL, NULL),
(263, 51, 'Đen', 42, 102, 0, NULL, NULL),
(264, 51, 'Đỏ', 38, 108, 0, NULL, NULL),
(265, 51, 'Đỏ', 39, 29, 2, NULL, NULL),
(266, 51, 'Đỏ', 40, 33, 0, NULL, NULL),
(267, 51, 'Đỏ', 41, 88, 0, NULL, NULL),
(268, 51, 'Đỏ', 42, 110, 0, NULL, NULL),
(269, 51, 'Xanh tím than', 38, 77, 3, NULL, NULL),
(270, 51, 'Xanh tím than', 39, 45, 0, NULL, NULL),
(271, 51, 'Xanh tím than', 40, 51, 0, NULL, NULL),
(272, 51, 'Xanh tím than', 41, 38, 0, NULL, NULL),
(273, 51, 'Xanh tím than', 42, 98, 0, NULL, NULL),
(274, 52, 'Đỏ', 38, 69, 0, NULL, NULL),
(275, 52, 'Đỏ', 39, 83, 0, NULL, NULL),
(276, 52, 'Đỏ', 40, 100, 0, NULL, NULL),
(277, 52, 'Đỏ', 41, 34, 0, NULL, NULL),
(278, 52, 'Đỏ', 42, 50, 0, NULL, NULL),
(279, 52, 'Trắng', 38, 94, 0, NULL, NULL),
(280, 52, 'Trắng', 39, 49, 3, NULL, NULL),
(281, 52, 'Trắng', 40, 56, 0, NULL, NULL),
(282, 52, 'Trắng', 41, 101, 0, NULL, NULL),
(283, 52, 'Trắng', 42, 69, 0, NULL, NULL),
(284, 53, 'Cam', 38, 116, 3, NULL, NULL),
(285, 53, 'Cam', 39, 40, 0, NULL, NULL),
(286, 53, 'Cam', 40, 46, 0, NULL, NULL),
(287, 53, 'Cam', 41, 95, 0, NULL, NULL),
(288, 53, 'Cam', 42, 47, 0, NULL, NULL),
(289, 53, 'Trắng', 38, 78, 2, NULL, NULL),
(290, 53, 'Trắng', 39, 29, 2, NULL, NULL),
(291, 53, 'Trắng', 40, 89, 0, NULL, NULL),
(292, 53, 'Trắng', 41, 102, 0, NULL, NULL),
(293, 53, 'Trắng', 42, 48, 0, NULL, NULL),
(294, 54, 'Xanh biển', 38, 50, 0, NULL, NULL),
(295, 54, 'Xanh biển', 39, 90, 0, NULL, NULL),
(296, 54, 'Xanh biển', 40, 110, 0, NULL, NULL),
(297, 54, 'Xanh biển', 41, 98, 0, NULL, NULL),
(298, 54, 'Xanh biển', 42, 99, 0, NULL, NULL),
(299, 54, 'Xám', 38, 117, 0, NULL, NULL),
(300, 54, 'Xám', 39, 74, 3, NULL, NULL),
(301, 54, 'Xám', 39, 41, 3, NULL, NULL),
(302, 54, 'Xám', 41, 40, 0, NULL, NULL),
(303, 54, 'Xám', 42, 56, 0, NULL, NULL),
(304, 54, 'Đỏ', 38, 116, 0, NULL, NULL),
(305, 54, 'Đỏ', 39, 71, 0, NULL, NULL),
(306, 54, 'Đỏ', 40, 51, 0, NULL, NULL),
(307, 54, 'Đỏ', 41, 48, 0, NULL, NULL),
(308, 54, 'Đỏ', 42, 51, 0, NULL, NULL),
(309, 55, 'Xanh tím than', 38, 76, 0, NULL, NULL),
(310, 55, 'Xanh tím than', 39, 48, 0, NULL, NULL),
(311, 55, 'Xanh tím than', 40, 92, 0, NULL, NULL),
(312, 55, 'Xanh tím than', 41, 119, 0, NULL, NULL),
(313, 55, 'Xanh tím than', 42, 30, 0, NULL, NULL),
(314, 55, 'Xám', 38, 47, 0, NULL, NULL),
(315, 55, 'Xám', 39, 65, 0, NULL, NULL),
(316, 55, 'Xám', 39, 88, 0, NULL, NULL),
(317, 55, 'Xám', 41, 57, 0, NULL, NULL),
(318, 55, 'Xám', 42, 45, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_email`, `ship_phone`, `ship_address`, `ship_note`, `created_at`, `updated_at`) VALUES
(25, 25, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', 'Giao tận nơi', NULL, NULL),
(26, 26, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '1111', NULL, NULL),
(27, 27, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '111111', NULL, NULL),
(28, 28, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '11111', NULL, NULL),
(29, 29, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '11111', NULL, NULL),
(30, 30, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '1111', NULL, NULL),
(31, 31, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '111', NULL, NULL),
(32, 32, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '11111', NULL, NULL),
(33, 33, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '111', NULL, NULL),
(34, 34, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'HA NOI', '1111', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_tosub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_tosub`, `subcategory_status`, `created_at`, `updated_at`) VALUES
(11, 9, 'Áo sơ mi', 'ao-so-mi', 1, NULL, NULL),
(12, 9, 'Áo polo', 'ao-polo', 1, NULL, NULL),
(13, 9, 'Áo T-Shirt', 'ao-t-shirt', 1, NULL, NULL),
(14, 9, 'Áo Tank-top', 'ao-tank-top', 1, NULL, NULL),
(15, 9, 'Áo thun dài tay', 'ao-thun-dai-tay', 1, NULL, NULL),
(16, 9, 'Áo len', 'ao-len', 1, NULL, NULL),
(17, 9, 'Áo khoác', 'ao-khoac', 1, NULL, NULL),
(18, 9, 'Áo blazer', 'ao-blazer', 1, NULL, NULL),
(19, 10, 'Quần âu', 'quan-au', 1, NULL, NULL),
(20, 10, 'Quần kaki', 'quan-kaki', 1, NULL, NULL),
(21, 10, 'Quần Short', 'quan-short', 1, NULL, NULL),
(22, 10, 'Quần thể thao', 'quan-the-thao', 1, NULL, NULL),
(23, 10, 'Quần jeans', 'quan-jeans', 1, NULL, NULL),
(24, 11, 'Boxer', 'boxer', 1, NULL, NULL),
(25, 11, 'Brief', 'brief', 1, NULL, NULL),
(26, 12, 'Thắt lưng', 'that-lung', 1, NULL, NULL),
(27, 12, 'Ví nam', 'vi-nam', 1, NULL, NULL),
(28, 12, 'Cà vạt', 'ca-vat', 1, NULL, NULL),
(29, 12, 'Cặp da', 'cap-da', 1, NULL, NULL),
(30, 12, 'Giày da', 'giay-da', 1, NULL, NULL),
(31, 12, 'Khác', 'khac', 1, NULL, NULL),
(32, 13, 'Bộ đồ', 'bo-do', 1, NULL, NULL),
(33, 13, 'Bộ suit', 'bo-suit', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Sy Khai', 'khainguyensi.1998@gmail.com', '0355123450', 'Khương Đình, Thanh Xuân, Hà Nội', NULL, '$2y$10$yofCR07fJ1F.oUPx8wytYOpuNN3TPEF0gnrpSvw6I4Bb7s96D2eSK', NULL, '2020-11-15 05:31:24', '2020-11-15 05:31:24'),
(2, 'Nguyen Sy Khai', 'khainguyensi.19981@gmail.com', '03551234501', 'Khương Đình, Thanh Xuân, Hà Nội', NULL, '$2y$10$vKCRlCe35SyZ/9sDvMopcukcoZFAqcKpJ9yt2rc5R7XtOLkrc1KzW', NULL, '2020-11-15 16:00:42', '2020-11-15 16:00:42');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon_type`
--
ALTER TABLE `coupon_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `coupon_type`
--
ALTER TABLE `coupon_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
