-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 07, 2021 lúc 03:29 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mercedes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `AtTime` int(11) NOT NULL,
  `Content` text NOT NULL,
  `ProductId` int(12) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`AtTime`, `Content`, `ProductId`, `UserID`) VALUES
(1622989199, 'good', 1, 1),
(1622997420, 'ok', 1, 1),
(1622998111, 'đẹp', 2, 2),
(1622998796, 'ngon', 2, 2),
(1622998946, 'đẹp', 3, 2),
(1622999024, 'ngon', 4, 2),
(1622999089, 'đẹp', 5, 2),
(1622999200, 'ngon', 6, 2),
(1622999332, 'ngon', 7, 2),
(1622999397, 'đẹp', 8, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `Address` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `PhoneNum` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Facebook` varchar(50) CHARACTER SET utf8 NOT NULL,
  `LastChangedBy` int(11) DEFAULT NULL,
  `Twitter` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Reddit` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Youtube` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Instagram` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Telegram` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(12) NOT NULL,
  `Fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Image` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Price` float NOT NULL,
  `Detail` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Operate` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `LastChangedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `Fullname`, `Image`, `Price`, `Detail`, `LastChangedBy`) VALUES
(1, 'a200', 'none', 2000000000, 'none', 1),
(2, 'a250', 'none', 2000000000, 'none', 1),
(3, 'c200', 'none', 2000000000, 'none', 1),
(4, 'c250', 'none', 2000000000, 'none', 1),
(5, 'c300', 'none', 2000000000, 'none', 1),
(6, 'e200', 'none', 2000000000, 'none', 1),
(7, 'e250', 'none', 2000000000, 'none', 1),
(8, 'e300', 'none', 2000000000, 'none', 1),
(9, 'g65', 'none', 2000000000, 'none', 1),
(10, 'glc200', 'none', 2000000000, 'none', 1),
(11, 'glc300c', 'none', 2000000000, 'none', 1),
(12, 'glc300m', 'none', 2000000000, 'none', 1),
(13, 'gle400', 'none', 2000000000, 'none', 1),
(14, 'gle450', 'none', 2000000000, 'none', 1),
(15, 'mb450', 'none', 2000000000, 'none', 1),
(16, 'mb450m', 'none', 2000000000, 'none', 1),
(17, 'mb560', 'none', 2000000000, 'none', 1),
(18, 's450', 'none', 2000000000, 'none', 1),
(19, 's500ca', 'none', 2000000000, 'none', 1),
(20, 's500co', 'none', 2000000000, 'none', 1),
(21, 'v250', 'none', 2000000000, 'none', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `PhoneNum` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Fullname`, `PhoneNum`, `Email`) VALUES
(1, 'admin', 'admin', 'Công Hòa', '03', 'conghoa@gmail.com'),
(2, 'hoa', 'hoa', 'Nguyễn Công Hòa', '0337322227', 'hoa@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `LastChangedBy` (`LastChangedBy`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`LastChangedBy`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
