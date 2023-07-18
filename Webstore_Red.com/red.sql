-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 19 2023 г., 11:06
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `red`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categoty`
--

CREATE TABLE `categoty` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `categoty`
--

INSERT INTO `categoty` (`id`, `name`) VALUES
(1, 'T-shirts'),
(3, 'Hoodies'),
(4, 'Bags'),
(8, 'Shoes');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(5) NOT NULL,
  `titlle` varchar(100) NOT NULL,
  `image_1` varchar(350) NOT NULL,
  `image_2` varchar(350) NOT NULL,
  `image_3` varchar(350) NOT NULL,
  `image_4` varchar(350) NOT NULL,
  `image_5` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `titlle`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`) VALUES
(1, 'Nike Air Jordan 1', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0557ffaf-5ff1-45b5-92ac-6283d9783f25/buciki-dla-niemowlat-jordan-1-JRPGSn.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ee0ffcfd-f647-47c1-b181-5d4ac4b61d6b/buciki-dla-niemowlat-jordan-1-JRPGSn.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/32e19158-cb58-46d9-b5ba-6df5cc11e2e7/buciki-dla-niemowlat-jordan-1-JRPGSn.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f8bc656a-bc79-4303-81f5-e2c83ce9b372/buciki-dla-niemowlat-jordan-1-JRPGSn.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/9ee4bda3-5d53-4b4c-b9b1-31971a6383f9/buciki-dla-niemowlat-jordan-1-JRPGSn.png'),
(2, 'Nike Blazer Mid \'77', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/7f2528f8-eca7-48d5-8ce1-ade41e06381b/buty-dla-duzych-blazer-mid-77-pLGz7q.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/da3f25e1-be66-4bd0-ab1f-eaa2408d3e25/buty-dla-duzych-blazer-mid-77-pLGz7q.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/fafcf9fa-3d1f-446d-ae30-d7bc350a61c4/buty-dla-duzych-blazer-mid-77-pLGz7q.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e66ce469-22e7-437f-a943-79fb661c72fb/buty-dla-duzych-blazer-mid-77-pLGz7q.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/2e575996-4cdd-42bb-aab1-878ce83e3b1e/buty-dla-duzych-blazer-mid-77-pLGz7q.png'),
(4, 'Nike Air Force 1 \'07', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f094af40-f82f-4fb9-a246-e031bf6fc411/buty-air-force-1-07-QxRXZV.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/4906dd0a-96d2-46d3-b70c-cd7c0227deef/buty-air-force-1-07-QxRXZV.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e4a3fabb-5cda-46cd-9a12-4f9cc3840ab5/buty-air-force-1-07-QxRXZV.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e5d1a7a2-6cc9-4e86-97a5-a28a9d893221/buty-air-force-1-07-QxRXZV.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/5dbeb615-bdee-4737-9a94-ab7c67bd9219/buty-air-force-1-07-QxRXZV.png'),
(5, 'Nike Air Max 270', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/pyyixbczj6u5kiwhpjik/buty-air-max-270-P0j2DN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/64a85a88-a74c-4446-b502-275456c3a0d2/buty-air-max-270-P0j2DN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/kwbianpnd3r0enjw7xq8/buty-air-max-270-P0j2DN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/4cc89daa-c394-4ad4-9214-262f9b1a065a/buty-air-max-270-P0j2DN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0f864ef9-9d52-4c47-a4b3-7754d92f00fc/buty-air-max-270-P0j2DN.png'),
(6, 'Nike Air Huarache', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/248af147-332f-4ab2-8af5-b345fe62fa2a/buty-meskie-air-huarache-73DRHQ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ba319844-b990-4421-8c7a-0db0e7ea8631/buty-meskie-air-huarache-73DRHQ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/451347e9-1ee5-400b-923c-35e76a006fa1/buty-meskie-air-huarache-73DRHQ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/63c62a54-86ea-42e1-a060-120c5f6d0eb7/buty-meskie-air-huarache-73DRHQ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/45c89fee-4920-4353-838c-fd728d476062/buty-meskie-air-huarache-73DRHQ.png'),
(7, 'Nike Dunk Low', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/779b9841-245f-476f-bcb1-b36a86e24330/buty-dunk-low-hbkBSL.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f67deed1-bcd7-4957-b11a-ad3d82380dfa/buty-dunk-low-hbkBSL.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b0a9c25c-3ffb-4dc3-befc-7a5ccef9cf05/buty-dunk-low-hbkBSL.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/126b4e5c-1007-475c-b796-cc8d2de69561/buty-dunk-low-hbkBSL.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6e659c08-6523-468a-a7b8-2290b175ce6c/buty-dunk-low-hbkBSL.png'),
(8, 'Nike Air Monarch IV', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f9a8deaa-87f2-4191-92b8-c7661aae48de/meskie-buty-treningowe-air-monarch-iv-t6VLxN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/2013aa36-3cf6-46a0-ad9a-cd5ff7927a11/meskie-buty-treningowe-air-monarch-iv-t6VLxN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/a3ce45dc-21a3-4b34-ad29-cc09ec142136/meskie-buty-treningowe-air-monarch-iv-t6VLxN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/05c4d7ab-961f-4047-9557-ad19db51b6f6/meskie-buty-treningowe-air-monarch-iv-t6VLxN.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/072a26c8-39e8-43d9-a9ef-d4b59fd27495/meskie-buty-treningowe-air-monarch-iv-t6VLxN.png'),
(28, 'Nike React Vision', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/cb46a855-3172-4d08-ba45-037812af7ce8/buty-meskie-react-vision-mz0d1n.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/545d1a1a-c41d-4604-8379-dd8379ec5c61/buty-meskie-react-vision-mz0d1n.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c05a2889-8dcd-428c-a5cc-36bb9555dc42/buty-meskie-react-vision-mz0d1n.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/58fbd315-744b-4231-a8c2-d0b2e42cd05e/buty-meskie-react-vision-mz0d1n.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/2ac7cbb5-b66b-49ff-892c-57dff433f5bb/buty-meskie-react-vision-mz0d1n.png'),
(29, 'Jordan Jumpman', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/913b311f-3ea0-408c-a99d-1a2381f21bce/meski-t-shirt-z-krotkim-rekawem-jordan-jumpman-0HL4s8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/11283699-b247-4deb-8baf-cf3a108840dd/meski-t-shirt-z-krotkim-rekawem-jordan-jumpman-0HL4s8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/be23f9b5-1477-4152-9fe3-e19def224930/meski-t-shirt-z-krotkim-rekawem-jordan-jumpman-0HL4s8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f4d6c50d-5e0e-4724-92e8-f350b2338a95/meski-t-shirt-z-krotkim-rekawem-jordan-jumpman-0HL4s8.png', ''),
(30, 'Nike Sportswear Air', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ca1a8016-dc22-44a6-9198-4bfbd28314c6/t-shirt-meski-sportswear-air-xST729.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b8cb2dda-869f-49c9-90d7-a8aaaad04572/t-shirt-meski-sportswear-air-xST729.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/62d975ec-2848-4770-8832-b0c3f113f8df/t-shirt-meski-sportswear-air-xST729.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/51cd80c1-ad62-4cb4-a795-0f37a7063632/t-shirt-meski-sportswear-air-xST729.png', ''),
(31, 'Jordan Dri-FIT Sport', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/95f70822-aac4-49f9-8b1f-d9e38c9256d0/meski-t-shirt-sportowy-jordan-dri-fit-f7XBmQ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/4e7c2e5c-d3a8-4c48-a4a1-8e4c75b5bde9/meski-t-shirt-sportowy-jordan-dri-fit-f7XBmQ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/a5510a25-9f21-46b7-9732-f4a46459f46a/meski-t-shirt-sportowy-jordan-dri-fit-f7XBmQ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b9d20f7b-f194-4fa1-a5ef-fd9ce3c63030/meski-t-shirt-sportowy-jordan-dri-fit-f7XBmQ.png', ''),
(32, 'Nike Sportswear Club', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/609f29f7-4ee6-49d2-989f-c68fd955a59d/t-shirt-meski-sportswear-club-G2qXCD.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/7e8042b8-5cb7-4cc8-80f7-04b4140ea793/t-shirt-meski-sportswear-club-G2qXCD.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c08f8ba2-ad98-40bf-b725-eeeffe1c6ee3/t-shirt-meski-sportswear-club-G2qXCD.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/619a156a-f0e8-4d24-a2f1-0a478d5aecd0/t-shirt-meski-sportswear-club-G2qXCD.png', ''),
(33, 'Nike Sportswear', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ffe7aa4b-ff88-4139-8807-ca801087a324/meska-dzianinowa-bluza-z-kapturem-sportswear-7GL21z.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/dc77fc55-f582-492e-b21c-f2c710db7003/meska-dzianinowa-bluza-z-kapturem-sportswear-7GL21z.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/885a3aa3-969e-4273-9cce-239f799f67b3/meska-dzianinowa-bluza-z-kapturem-sportswear-7GL21z.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/cc0f79ae-1f2a-41bf-a94c-4c90ae5a2327/meska-dzianinowa-bluza-z-kapturem-sportswear-7GL21z.png', ''),
(34, 'Jordan Essential Holiday', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/be61a6a8-bd94-4579-bba3-0f3ed2d35095/meska-bluza-z-dzianiny-jordan-essential-holiday-kkW92z.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/690f10d8-6ee7-472a-951c-4aa23109acdf/meska-bluza-z-dzianiny-jordan-essential-holiday-kkW92z.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0c630eee-458f-47b0-babe-ca2f2d821452/meska-bluza-z-dzianiny-jordan-essential-holiday-kkW92z.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/20d4bec0-5cda-47a3-a1ae-3877f442060a/meska-bluza-z-dzianiny-jordan-essential-holiday-kkW92z.png', ''),
(35, 'Nike Sportswear Club Fleece', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6e601618-6281-4975-9ac2-44e8330db933/bluza-z-kapturem-sportswear-club-fleece-tz1kGP.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b22ee77d-76d1-418f-a082-c41056089846/bluza-z-kapturem-sportswear-club-fleece-tz1kGP.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/9f214a7c-842d-4271-ab2b-6e585215ce7d/bluza-z-kapturem-sportswear-club-fleece-tz1kGP.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/dae13955-f5b5-49e7-b7db-373572d0d341/bluza-z-kapturem-sportswear-club-fleece-tz1kGP.png', ''),
(36, 'Nike Sportswear Standard Issue', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/08ed9875-e7af-411a-af89-5d00e5a2b54c/meska-dzianinowa-bluza-z-kapturem-sportswear-standard-issue-b9l7DW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/281789fe-546d-41f5-8c4d-4986c9926bbe/meska-dzianinowa-bluza-z-kapturem-sportswear-standard-issue-b9l7DW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/77aa2f66-f6c9-4674-b472-9152623a4a5e/meska-dzianinowa-bluza-z-kapturem-sportswear-standard-issue-b9l7DW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f4d469b6-9acd-443b-8fa4-bd7cd08d14da/meska-dzianinowa-bluza-z-kapturem-sportswear-standard-issue-b9l7DW.png', ''),
(37, 'Nike Sportswear Futura 365', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/59d52ed9-d7e6-470d-b760-f9855ee08532/plecak-mini-sportswear-futura-365-sptDp2.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e906ff71-869c-484a-bd06-4cec2e42327c/plecak-mini-sportswear-futura-365-sptDp2.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/8b5aeb29-4456-4050-82cd-77992a87a467/plecak-mini-sportswear-futura-365-sptDp2.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0f83e8c9-ec1f-4650-9677-44667dc8239d/plecak-mini-sportswear-futura-365-sptDp2.png', ''),
(38, 'Nike Heritage', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/8f549b00-122e-4102-b1d9-b48ff3ca6f27/plecak-z-nadrukiem-heritage-gbwf3H.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d5d8c7b3-851a-4144-bc37-77304f8c3266/plecak-z-nadrukiem-heritage-gbwf3H.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/724e12f3-dda7-4d08-a276-3465f8dac20e/plecak-z-nadrukiem-heritage-gbwf3H.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/53f68ffa-d34e-4301-8a03-eb590e901070/plecak-z-nadrukiem-heritage-gbwf3H.png', '');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_products` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `id_code` varchar(6) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_products`, `address`, `id_code`, `tel`, `price`) VALUES
(1, 0, '4', '', '', '', 899),
(20, 1, '4', '', '', '', 899),
(21, 1, '5', '', '', '', 1599),
(22, 1, '4', '0', '0', '123456789', 899);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(350) NOT NULL,
  `category` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `category`, `size`) VALUES
(2, 'Nike Blazer Mid \'77', 'Model Nike Blazer Mid \'77 z podeszwą środkową wykończoną w stylu retro przywodzi na myśl oldschoolowe koszykarskie fasony Nike.Jednak niech Cię nie zwiedzie klasyczny wygląd tych butów – dzięki zastosowaniu nowoczesnych materiałów są wygodne i świetnie sprawdzają się podczas różnych aktywności.', 689.00, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/7f2528f8-eca7-48d5-8ce1-ade41e06381b/buty-dla-duzych-blazer-mid-77-pLGz7q.png', 'Shoes', '37, 40, 41'),
(4, 'Nike Air Force 1 \'07', 'Buty Nike Air Force 1 \'07 to nowa odsłona kultowego modelu, która doda blasku każdej stylizacji. Trwała skóra nadaje sneakersom klasyczny wygląd, a zamszowe loga Swoosh, tkane wstawki boczne i nakrapiany nadruk pozwalają się wyróżniać. Oczywiście pewne rzeczy pozostały bez zmian – poduszki gazowe Nike Air nadal amortyzują każdy krok.', 449.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f094af40-f82f-4fb9-a246-e031bf6fc411/buty-air-force-1-07-QxRXZV.png', 'Shoes', '37, 38, 39, 40, 41, 43'),
(5, 'Nike Air Max 270', 'Pierwszy lifestylowe model Nike Air Max — Nike Air Max 270 — zapewnia wygodę oraz odznacza się wyjątkowym charakterem i stylem. Fason wzorowany na legendach linii Air Max wyróżnia się stylową gamą kolorów i dużym okienkiem, które ukazuje największą innowację Nike.', 799.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/pyyixbczj6u5kiwhpjik/buty-air-max-270-P0j2DN.png', 'Shoes', '38, 39'),
(6, 'Nike Air Huarache', 'Buty Nike Air Huarache to doskonały model do chodzenia na co dzień stworzony dla wygody Twoich stóp. Trwała skóra syntetyczna i siateczka w połączeniu z błyszczącym materiałem przypominającym neopren ułatwiają stylizację. Niskoprofilowy kołnierz i konstrukcja przypominająca skarpetę nadają stylowy wygląd, a kultowy zapiętek i nieliczne charakterystyczne detale marki nawiązują do lubianego stylu z lat 90.', 424.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/248af147-332f-4ab2-8af5-b345fe62fa2a/buty-meskie-air-huarache-73DRHQ.png', 'Shoes', '37, 38, 39, 41'),
(7, 'Nike Dunk Low', 'Ten model został stworzony z myślą o parkiecie, ale zawładnął też modą uliczną. Nowa odsłona ikony koszykówki z lat 80. powraca z połyskującymi powłokami i drużynowymi kolorami w klasycznym stylu. Nike Dunk Low z lat 80 wracają na ulice. Klasyczny krój inspirowany koszykówką oraz wyściełany, niski kołnierz zapewniają wygodę i stylowy wygląd w każdej sytuacji.', 699.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/779b9841-245f-476f-bcb1-b36a86e24330/buty-dunk-low-hbkBSL.png', 'Shoes', '36, 42'),
(8, 'Nike Air Monarch IV', 'Buty Nike Air Monarch IV mają cholewkę z trwałej skóry, która zapewnia wsparcie. Lekka pianka i amortyzacja Nike Air odpowiadają za wygodę na każdym kroku.', 349.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f9a8deaa-87f2-4191-92b8-c7661aae48de/meskie-buty-treningowe-air-monarch-iv-t6VLxN.png', 'Shoes', '37'),
(28, 'Nike React Vision', 'Kolekcja D/MS/X opowiada historię niebywałej wygody. Inspiracją do stworzenia tego wyjątkowego połączenia nietypowych kształtów, fakturowanych warstw i żywych kolorów była niesamowita kraina marzeń sennych. Pianka React i niewiarygodnie miękki język zapewniają niezrównany komfort. Wkrocz do swojego świata snów z Nike React Vision.', 444.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/cb46a855-3172-4d08-ba45-037812af7ce8/buty-meskie-react-vision-mz0d1n.png', 'Shoes', '40, 41, 42, 43'),
(29, 'Jordan Jumpman', 'Zabłyśnij w klasycznym T-shircie marki Jordan. Jest on wykonany z wygodnej miękkiej bawełny i ozdobiony klasycznym logo Jumpman wyszytym na klatce piersiowej.', 139.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/7f2528f8-eca7-48d5-8ce1-ade41e06381b/buty-dla-duzych-blazer-mid-77-pLGz7q.png', 'T-shirts', 'S, M, L'),
(30, 'Nike Sportswear Air', 'Ten lekki bawełniany T-shirt jest miękki i gładki w dotyku. Nadrukowane na klatce piersiowej grafiki Nike Air stanowią hołd dla naszego rewolucyjnego rozwiązania stosowanego w sneakersach.', 129.97, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ca1a8016-dc22-44a6-9198-4bfbd28314c6/t-shirt-meski-sportswear-air-xST729.png', 'T-shirts', 'S, M'),
(31, 'Jordan Dri-FIT Sport', 'Odprowadzający wilgoć T-shirt sprawdzi się zarówno na boisku, jak i na mieście. Luźny krój zapewnia swobodę ruchów, a technologia Dri-FIT pozwala zachować świeżość.', 144.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/95f70822-aac4-49f9-8b1f-d9e38c9256d0/meski-t-shirt-sportowy-jordan-dri-fit-f7XBmQ.png', 'T-shirts', 'XS, M, L'),
(32, 'Nike Sportswear Club', 'T-shirt Nike Sportswear Club jest wykonany z naszego bawełnianego materiału do noszenia na co dzień i zapewnia dobrze znane Ci uczucie wygody w klasycznym stylu od pierwszego założenia.Wyszyte logo Futura na klatce piersiowej podkreśla charakterystyczny styl Nike.', 99.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/609f29f7-4ee6-49d2-989f-c68fd955a59d/t-shirt-meski-sportswear-club-G2qXCD.png', 'T-shirts', 'XS, S, M, L, XL'),
(33, 'Nike Sportswear', 'Postaw na świetny styl. Ta bluza z kapturem jest wykonana z lekkiej dzianiny szczotkowanej po obu stronach, która zapewnia niezwykłą wygodę i ciepło oraz idealnie nadaje się do noszenia z innymi warstwami.', 184.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ffe7aa4b-ff88-4139-8807-ca801087a324/meska-dzianinowa-bluza-z-kapturem-sportswear-7GL21z.png', 'Hoodies', 'S, M'),
(34, 'Jordan Essential Holiday', 'Kto jest gotowy na święta? W tej wygodnej bluzie dresowej każdy jest. Została wykonana z miękkiej dzianiny dresowej i ozdobiona klasycznymi detalami w kratę, dzięki czemu nadaje całości nostalgiczny, sezonowy charakter i odwołuje się do dziedzictwa marki Jordan.', 184.97, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/be61a6a8-bd94-4579-bba3-0f3ed2d35095/meska-bluza-z-dzianiny-jordan-essential-holiday-kkW92z.png', 'Hoodies', 'XS, M, L, XL'),
(35, 'Nike Sportswear Club Fleece', 'Bluza z kapturem Nike Sportswear Club wykonana z dzianiny to jeden z obowiązkowych elementów garderoby. Łączy w sobie klasyczny krój z miękkością i wygodą dzianiny.\r\n\r\n', 279.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6e601618-6281-4975-9ac2-44e8330db933/bluza-z-kapturem-sportswear-club-fleece-tz1kGP.png', 'Hoodies', 'XS, S'),
(36, 'Nike Sportswear Standard Issue', 'Postaw na wygodę. Ta wygodna bluza z kapturem o luźnym kroju jest wykonana z miękkiej dzianiny ozdobionej minimalistycznym logo, dzięki czemu szybko stanie się Twoim ulubionym modelem.', 199.97, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/08ed9875-e7af-411a-af89-5d00e5a2b54c/meska-dzianinowa-bluza-z-kapturem-sportswear-standard-issue-b9l7DW.png', 'Hoodies', 'XS, S, M, L, XL'),
(37, 'Nike Sportswear Futura 365', 'Plecak Nike Sportswear Mini to nowa odsłona klasycznego ulubieńca wykonana przynajmniej w 55% z poliestru z recyklingu. Ma wyściełaną filcem kieszeń na drobne przedmioty oraz uchwyt i szelki z doskonałej jakości taśmy parcianej.', 159.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/59d52ed9-d7e6-470d-b760-f9855ee08532/plecak-mini-sportswear-futura-365-sptDp2.png', 'Bags', 'W JEDNYM ROZMIARZE'),
(38, 'Nike Heritage', 'Ten klasyczny plecak zdobi odświeżone logo Swoosh. Model ten idealnie nadaje się do przechowywania rzeczy po treningu na siłowni lub w drodze na zajęcia. Podwójna przegroda zapinana na zamek umożliwia przechowywanie sprzętu, a mniejsza przegroda z przodu pozwala trzymać niezbędne drobiazgi pod ręką.', 149.99, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/8f549b00-122e-4102-b1d9-b48ff3ca6f27/plecak-z-nadrukiem-heritage-gbwf3H.png', 'Bags', 'W JEDNYM ROZMIARZE'),
(42, 'Dima', '', 123.00, 'Wystąpił błąd podczas usuwania użytkownika:', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'Dima', 'admin@adm.in', '$argon2id$v=19$m=65536,t=4,p=1$Z3ZWQVN3U1N3dzZvb0h1dQ$6QW+MXyN7Do2ct4gzkPzuBq702W08nJLAYmrIw7kzs4', 'admin'),
(2, 'masha228COOOL@cdv.pl', 'masha228COOOL@cdv.pl', '$argon2id$v=19$m=65536,t=4,p=1$djJMaFRUWXhoWDRGUzNkcg$/SWgG6Usx4VJwCuLbyzwFykwfnQMJlA97GE5qvVSiJ0', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categoty`
--
ALTER TABLE `categoty`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categoty`
--
ALTER TABLE `categoty`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
