-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2022 lúc 11:17 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giupviec`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'admin', 346662923, 'tester1@gmail.com', 'admin', '2019-07-25 06:21:50'),
(2, 'admintest', 'admintest', 7898799798, 'admintest@gmail.com', 'Test@123', '2022-06-10 15:10:30'),
(3, 'admintest1', 'admintest1', 3213213213, 'admintest1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-06-10 15:13:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `review_id` int(11) NOT NULL,
  `tennd` varchar(200) DEFAULT NULL,
  `user_rating` int(1) DEFAULT NULL,
  `user_review` varchar(500) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`review_id`, `tennd`, `user_rating`, `user_review`, `datetime`) VALUES
(23, 'võ thanh thoại', 5, 'Mình không phải khách hàng thường xuyên của JupViec, chỉ thi thoảng bận bịu quá không dọn được nhà thì mới nhấc điện thoại lên đặt buổi lẻ. Nhận xét về dịch vụ này thì khá ổn,có bạn gọi nhận lịch sau mấy tiếng gì đó. Khoản thanh toán qua cổng online thì tiện. Bạn dọn dẹp nhà mình làm cũng OK. Tóm lại là dùng được, có thể recommend cho những người khác. Thanks!', 1655678775),
(24, 'thanhvu', 5, 'Dịch vụ JupViec.vn là hợp lý nhất cho gia đình bạn, sau mấy giờ nhân viên JupViec.vn như cô Tấm thời xưa sẽ làm hết công việc một cách chuyên nghiệp, và luôn cố gắng từng ngày. Chỉ có điều cô Tấm đến từ Công ty và các bạn phải trả tiền cho dịch vụ hiện đại này :))', 1655678831),
(25, 'Nguyễn Thị Loan', 5, 'Dịch vụ khá linh động phù hợp với những gia đình bận rộn như nhà mình, giá cả hợp lý.... mình có nhiều thời gian hơn để dành cho gia đình và công việc. Mình đã giới thiệu với nhiều bạn bè mình và mọi người cũng thấy rất hài lòng. Chúc quý công ty ngày càng phục vụ được nhiều Khách hàng hơn.', 1655678913),
(27, 'Võ Thanh Thoại', 5, 'nhân viên làm việc tốt', 1656133768);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `ID` int(10) NOT NULL,
  `tendv` varchar(120) DEFAULT NULL,
  `chitiet` varchar(500) DEFAULT NULL,
  `gia` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`ID`, `tendv`, `chitiet`, `gia`) VALUES
(1, 'Giúp việc theo giờ', 'Giúp việc nhà theo giờ làm theo khung giờ Khách hàng đăng ký khi phát sinh nhu cầu. Công việc gồm: Dọn nhà, nấu ăn, rửa bát và hỗ trợ chăm sóc trẻ', 100000),
(2, 'Dịch vụ vệ sinh nhà', 'Giúp việc nhà sáng đến tồi về làm việc 8 - 9 tiếng tại nhà Khách hàng (không ở lại) vào những ngày và khung giờ Khách hàng đăng ký. Công việc gồm: Dọn nhà, nấu ăn, rửa bát, chăm sóc trẻ và một số yêu cầu khác.', 100000),
(3, 'Giúp việc trông trẻ', 'Với sự hỗ trợ của người giúp việc, những bà mẹ sẽ được san sẻ gánh nặng công việc gia đình, giúp xóa tan những mệt mỏi không đáng có. Như vậy, các bà mẹ sẽ có thêm khoảng thời gian để cân bằng nếp sinh hoạt sau những giờ làm việc mệt nhọc tại cơ quan.', 100000),
(4, 'Chăm sóc người già', 'Nói chuyện, chăm sóc, tâm sự chia sẻ với người già, giúp họ vơi bớt đi những trống trải của tuổi già. Đi chợ, lựa chọn thực phẩm dành cho người cao tuổi, nấu những món ăn người cao tuổi thích.', 150000),
(5, 'Tổng vệ sinh nhà cửa', 'Dọn dẹp toàn bộ nhà cửa kĩ càng các phòng bếp, khách, ngủ, nhà vệ sinh hoặc tổng vệ sinh dọn dẹp nhà cửa theo nhu cầu của Khách hàng.', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondatdichvu`
--

CREATE TABLE `dondatdichvu` (
  `ID` int(10) NOT NULL,
  `madondat` varchar(80) DEFAULT NULL,
  `ma_kh` int(11) NOT NULL,
  `tennd` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `diachi` varchar(80) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `ngaydat` varchar(120) DEFAULT NULL,
  `thoigian` varchar(120) DEFAULT NULL,
  `tennv` varchar(200) NOT NULL,
  `ID_dv` int(10) NOT NULL,
  `tendv` varchar(120) NOT NULL,
  `ghichu_kh` varchar(500) NOT NULL,
  `gia` varchar(50) NOT NULL,
  `hinhthucthanhtoan` varchar(50) NOT NULL,
  `ngaythuchien` timestamp NOT NULL DEFAULT current_timestamp(),
  `ghichu` varchar(500) NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dondatdichvu`
--

INSERT INTO `dondatdichvu` (`ID`, `madondat`, `ma_kh`, `tennd`, `email`, `diachi`, `sdt`, `ngaydat`, `thoigian`, `tennv`, `ID_dv`, `tendv`, `ghichu_kh`, `gia`, `hinhthucthanhtoan`, `ngaythuchien`, `ghichu`, `trangthai`) VALUES
(1, '462670674', 1, 'Võ Thanh Thoại', 'thoai@gmail.com', 'Đà Nẵng - Quận Hải Châu - 405 lê Duẩn', 346662923, '6/29/2022', '9:30am', 'Nguyễn Thị Lan', 5, 'Tổng vệ sinh nhà cửa', '', '200000', 'tien mat', '2022-06-24 14:45:36', 'Chúng tôi sẽ liên lạc với bạn sớm nhất.', '1'),
(2, '579697415', 1, 'Võ Thanh Thoại', 'thoai@gmail.com', 'Đà Nẵng - Quận Hải Châu - 405 lê Duẩn', 346662923, '6/30/2022', '10:00am', '', 3, 'Giúp việc trông trẻ', '', '100000', 'vnpay', '2022-06-24 14:46:50', 'Xin lỗi khách hàng.', '2'),
(3, '896949444', 1, 'Võ Thanh Thoại', 'thoai@gmail.com', 'Đà Nẵng - Quận Hải Châu - 405 lê Duẩn', 346662923, '7/1/2022', '8:00am', 'Chị Hoa', 4, 'Chăm sóc người già', 'Nhân viên cần đến sớm hơn 15 phút', '150000', 'tien mat', '2022-06-24 14:48:14', 'Chúng tôi sẽ liên lạc sớm', '1'),
(4, '880572393', 3, 'thanhvu', 'vu@gmail.com', 'Đà Nẵng - Quận Hải Châu - 89 Lý Thái Tổ', 346662923, '6/26/2022', '9:30am', '', 1, 'Giúp việc theo giờ', '', '100000', 'vnpay', '2022-06-24 14:50:07', '', ''),
(5, '522137613', 4, 'Nguyễn Bằng', 'bang@gmail.com', 'Đà Nẵng - Quận Hải Châu', 974765864, '7/1/2022', '10:00am', 'Cô Tư', 4, 'Chăm sóc người già', '', '150000', 'tien mat', '2022-06-24 14:52:35', 'chúng tôi sẽ liên hệ với bạn sớm nhất.', '1'),
(6, '802822796', 4, 'Nguyễn Bằng', 'bang@gmail.com', 'Đà Nẵng - Quận Hải Châu', 974765864, '6/25/2022', '11:00am', '', 5, 'Tổng vệ sinh nhà cửa', '', '200000', 'vnpay', '2022-06-24 14:53:49', '', ''),
(7, '129236346', 4, 'Nguyễn Bằng', 'bang@gmail.com', 'Đà Nẵng - Quận Hải Châu', 974765864, '6/30/2022', '1:30am', '', 4, 'Chăm sóc người già', '', '150000', 'vnpay', '2022-06-24 16:01:39', '', ''),
(8, '448412644', 2, 'Nguyễn Thị Loan', 'loan@gmail.com', 'Đà Nẵng - Quận Thanh Khê', 986409672, '6/30/2022', '11:00am', '', 4, 'Chăm sóc người già', '', '150000', 'vnpay', '2022-06-24 17:17:29', '', ''),
(11, '504824583', 1, 'Võ Thanh Thoại', 'thoai@gmail.com', 'Đà Nẵng - Quận Hải Châu - 405 lê Duẩn', 346662923, '7/1/2022', '1:30am', '', 5, 'Tổng vệ sinh nhà cửa', '', '200000', 'tien mat', '2022-06-25 03:49:12', '', ''),
(12, '604895133', 1, 'Võ Thanh Thoại', 'thoai@gmail.com', 'Đà Nẵng - Quận Hải Châu - 405 lê Duẩn', 346662923, '6/30/2022', '8:00am', '', 4, 'Chăm sóc người già', '', '150000', 'tien mat', '2022-06-25 05:07:24', '', ''),
(13, '989015068', 1, 'Võ Thanh Thoại', 'thoai@gmail.com', 'Đà Nẵng - Quận Hải Châu - 405 lê Duẩn', 346662923, '6/29/2022', '5:30am', '', 4, 'Chăm sóc người già', '', '150000', 'vnpay', '2022-06-25 05:08:07', 'chúng tôi sẽ liên lạc sớm', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` int(10) NOT NULL,
  `tennd` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `diachi` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `gioitinh` enum('Nam','Nữ') DEFAULT NULL,
  `sdt` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID`, `tennd`, `email`, `diachi`, `password`, `gioitinh`, `sdt`) VALUES
(1, 'Võ Thanh Thoại', 'thoai@gmail.com', 'Đà Nẵng - Quận Hải Châu - 405 lê Duẩn', '123', 'Nam', 346662923),
(2, 'Nguyễn Thị Loan', 'loan@gmail.com', 'Đà Nẵng - Quận Thanh Khê', '123', 'Nữ', 986409672),
(3, 'thanhvu', 'vu@gmail.com', 'Đà Nẵng - Quận Hải Châu - 89 Lý Thái Tổ', '123', 'Nam', 346662923),
(4, 'Nguyễn Bằng', 'bang@gmail.com', 'Đà Nẵng - Quận Hải Châu', '123', 'Nam', 974765864);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ID` int(11) NOT NULL,
  `manv` int(10) DEFAULT NULL,
  `tennv` varchar(50) DEFAULT NULL,
  `namsinh` varchar(50) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `kinhnghiem` varchar(10) DEFAULT NULL,
  `chitiet` varchar(250) DEFAULT NULL,
  `avt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`ID`, `manv`, `tennv`, `namsinh`, `sdt`, `kinhnghiem`, `chitiet`, `avt`) VALUES
(1, 1, 'Nguyễn Thị Lan', '1989', 97474748, '3 nam', 'giúp việc gia đình,nấu ăn ngon phù hợp khẩu vị từng gia đình,trong quá trình làm việc chị không ngại việc,thật thà chịu khó. Quá trình làm việc: không vướng bận gia đình,xác định đi làm lâu dài', 'nv1.jpg'),
(2, 2, 'Chị Mai', '1986', 98768323, '4 nam', 'Chăm trẻ sơ sinh rất mát tay - 4 năm chăm trẻ và giúp việc gia đình. Quá trình làm việc: - thật thà,chịu khó trong công việc - Không ngại việc,không vướng bận gia đình Mức lương hiện tại', 'nv2.jpg'),
(4, 4, 'Cô Tư', '1984', 96573836, '2 năm', 'giúp việc nhà và chăm bé từ sơ sinh đến 13 tháng Quá trình làm việc: Chăm bé khéo, mát tay, hiền lành, không ngại việc. Nấu ăn ngon. Các con đã lớn, không vướng bận gia đình. Có lý lịch rõ ràng.', 'nv3.jpg'),
(5, 5, 'Co Giao', '1982', 956739219, '4 năm', ' làm nghề giúp việc gia đình, và làm tốt ở các công việc nội trợ - Chị nấu ăn khá ngon và sử dụng các vật dụng hiện đại trong gia đình tốt như lò vi sóng, máy giặt, bàn là,..', 'nv4.jpg'),
(6, 6, 'Chị Hoa', '1990', 956739219, '4 năm', 'Có kinh nghiệm chăm bé sơ sinh,chăm sóc từ sơ sinh đến khi đi lớp được. - Có kinh nghiệm nấu ăn những món ăn dân dã,hợp khẩu vị gia đình. - Có kinh nghiệm giúp việc nhà,lau dọn nhà cửa sạch sẽ gọn gàng.', 'nv5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang`
--

CREATE TABLE `trang` (
  `ID` int(10) NOT NULL,
  `tentrang` varchar(200) NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `chitiet` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trang`
--

INSERT INTO `trang` (`ID`, `tentrang`, `tieude`, `chitiet`, `email`, `sdt`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '        Đến với JupViec, quý khách sẽ có được sự đảm bảo về dịch vụ, đảm bảo về yếu tố con người cũng như chi phí. Bất cứ khi nào có nhu cầu tìm người giúp việc, hãy liên hệ nay với chúng tôi để được ', '', 7778492, ''),
(2, 'contactus', 'Contact US', '        408 Lê Duẩn, Đà Nẵng', 'jupviec@gmail.com', 7778492, '8:00 am - 7:30 pm ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay_payment`
--

CREATE TABLE `vnpay_payment` (
  `vnpay_id` int(11) NOT NULL,
  `madondat` int(11) NOT NULL,
  `vnpay_gia` varchar(50) NOT NULL,
  `vnpay_nganhang` varchar(50) NOT NULL,
  `vnpay_loaithe` varchar(50) NOT NULL,
  `vnpay_thongtin` varchar(50) NOT NULL,
  `vnpay_ngay` varchar(50) NOT NULL,
  `vnpay_ma` varchar(50) NOT NULL,
  `vnpay_sogiaodich` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vnpay_payment`
--

INSERT INTO `vnpay_payment` (`vnpay_id`, `madondat`, `vnpay_gia`, `vnpay_nganhang`, `vnpay_loaithe`, `vnpay_thongtin`, `vnpay_ngay`, `vnpay_ma`, `vnpay_sogiaodich`) VALUES
(1, 579697415, '10000000', 'NCB', 'ATM', 'Thanh toán dịch vụ tại JupViec', '20220624215013', 'UD2KZW06', '13781651'),
(2, 880572393, '10000000', 'NCB', 'ATM', 'Thanh toán dịch vụ tại JupViec', '20220624215320', 'UD2KZW06', '13781653'),
(3, 802822796, '20000000', 'NCB', 'ATM', 'Thanh toán dịch vụ tại JupViec', '20220624215706', 'UD2KZW06', '13781654'),
(4, 129236346, '15000000', 'NCB', 'ATM', 'Thanh toán dịch vụ tại JupViec', '20220624230503', 'UD2KZW06', '13781697'),
(5, 448412644, '15000000', 'NCB', 'ATM', 'Thanh toán dịch vụ tại JupViec', '20220625002050', 'UD2KZW06', '13781733'),
(6, 330488997, '20000000', 'NCB', 'ATM', 'Thanh toán dịch vụ tại JupViec', '20220625081954', 'UD2KZW06', '13781760');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`review_id`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `dondatdichvu`
--
ALTER TABLE `dondatdichvu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `trang`
--
ALTER TABLE `trang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `vnpay_payment`
--
ALTER TABLE `vnpay_payment`
  ADD PRIMARY KEY (`vnpay_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dondatdichvu`
--
ALTER TABLE `dondatdichvu`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `trang`
--
ALTER TABLE `trang`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vnpay_payment`
--
ALTER TABLE `vnpay_payment`
  MODIFY `vnpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
