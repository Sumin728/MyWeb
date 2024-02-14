-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 24-02-05 23:57
-- 서버 버전: 5.7.30-0ubuntu0.16.04.1-log
-- PHP 버전: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `Board`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `idx` int(11) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `views` int(255) DEFAULT '0',
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`idx`, `writer`, `id`, `title`, `content`, `views`, `regdate`, `file`) VALUES
(1, 'qwe', '', '첫 글', '안녕', 0, '2023-11-17 11:18:15', ''),
(2, 'qwe', '', '두번째', '안녕', 1, '2023-11-17 12:25:20', ''),
(3, 'sumin', '', 'qwe', 'qwe', 1, '2023-11-18 10:55:16', ''),
(4, 'sumin', '', 'eee', 'eee', 0, '2023-11-18 11:24:54', ''),
(5, 'sumin', '', 'aaa', 'aaa', 1, '2023-11-18 11:26:17', ''),
(9, 'qwe', '', '예시입니다', '1. 배고파\r\n2. 졸려\r\n3. 하기싫어\r\n4. 귀찮아', 0, '2023-11-19 12:41:35', ''),
(11, 'qwe', '', 'ee', 'ee', 0, '2023-11-19 13:00:23', ''),
(12, 'qwe', '', 'll', 'll', 0, '2023-11-19 13:01:28', ''),
(13, 'qwe', 'qwe', 'll', 'aa', 3, '2023-11-19 13:02:07', ''),
(15, 'qwe', '', 'll', 'qq', 4, '2023-11-19 13:23:47', ''),
(30, 'qwe', 'qwe', 'ㅎㅎ', 'ㅅㅈ', 1, '2023-11-20 13:46:46', ''),
(34, 'qwe', 'qwe', 'ㅂㅈㄷ', 'ggggggggggggggggggggggggggggggggggggggggggg', 22, '2023-11-20 14:08:32', ''),
(35, 'qwe', 'qwe', 'ㅁㅁ', 'dfgdfdgfg', 1, '2023-11-20 17:13:25', ''),
(36, 'sumin', 'admin', '안녕안녕', 'ㅎㅇㅎㅇ', 2, '2023-11-24 14:10:56', ''),
(37, 'sumin', 'admin', 'ㅎㅇㅎㅇ', 'ㅎㅇㅎㅇ', 1, '2023-11-24 14:11:03', ''),
(38, 'qwe', 'qwe', '엔터엔터', 'g\r\ng\r\ng\r\ng', 1, '2023-12-19 08:40:26', ''),
(41, 'qwe', 'qwe', 'scriptscriptscriptscscriptscriptscript', '123', 3, '2024-01-04 08:46:03', ''),
(43, '배고파', 'hungry', 'ㄴㅇㄹ', 'ㄴㅇㄹ', 1, '2024-01-06 09:58:47', ''),
(44, '배고파', 'hungry', '<>', ',>', 3, '2024-01-06 09:58:55', ''),
(46, 'Alphabet', 'abcd', '글쓰기', '입니다', 11, '2024-01-08 18:41:16', ''),
(47, 'qweqweqwe', 'qwe', 'aa', 'a', 5, '2024-01-08 18:48:00', ''),
(48, 'jiji', 'jiji123', '11', '11', 33, '2024-01-15 11:13:01', ''),
(49, 'iphone', 'iphone123', '게시글', '게시글입니다ㅏㅏ', 13, '2024-01-15 15:34:55', ''),
(50, 'qweqweqwe', 'qwe', '파일 업로드', '테스트입니다.', 12, '2024-01-29 09:51:16', 'test.txt'),
(53, 'qweqweqwe', 'qwe', 'file2', 'f', 19, '2024-01-29 10:23:43', 'moon.png'),
(54, 'qweqweqwe', 'qwe', 'gg', 'g', 28, '2024-01-29 10:25:53', ''),
(55, 'qweqweqwe', 'qwe', 'abc', 'abc', 29, '2024-01-29 11:10:25', ''),
(56, 'jiji', 'jiji123', 'so', 'hard :(', 443, '2024-01-29 11:18:49', 'test.txt'),
(58, 'jiji', 'jiji123', 'ㅇㄹㅇㄹㅇㄹ', 'ㅇㄹㅇㄹㅇㄹ', 59, '2024-02-05 01:26:15', 'test.txt'),
(59, 'jiji', 'jiji123', '작성작성', '123123123', 1, '2024-02-05 21:06:53', ''),
(60, 'jiji', 'jiji123', '댓글', '1. \r\n2.\r\n3.\r\n4.ㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇ', 3, '2024-02-05 21:07:21', ''),
(61, 'jiji', 'jiji123', '1111', '111111', 0, '2024-02-05 21:10:12', ''),
(62, 'jiji', 'jiji123', '22222', '222222', 0, '2024-02-05 21:10:17', ''),
(63, 'jiji', 'jiji123', '3333333', '3333333', 0, '2024-02-05 21:10:51', ''),
(64, 'jiji', 'jiji123', '4444444', '4444', 0, '2024-02-05 21:10:57', ''),
(65, 'jiji', 'jiji123', 'pdf', '파일', 0, '2024-02-05 21:12:16', 'sky.png'),
(66, 'jiji', 'jiji123', '55555', '555555', 0, '2024-02-05 21:12:22', ''),
(67, 'jiji', 'jiji123', '66666666', '6666666', 0, '2024-02-05 21:12:28', ''),
(68, 'jiji', 'jiji123', '7777777', '7777777', 0, '2024-02-05 21:12:37', ''),
(69, 'jiji', 'jiji123', '888888888', '88888888', 2, '2024-02-05 21:12:44', ''),
(70, 'jiji', 'jiji123', '9999999999', '9999999999', 0, '2024-02-05 21:12:50', ''),
(71, 'jiji', 'jiji123', '123', '456', 0, '2024-02-05 21:13:03', ''),
(72, 'jiji', 'jiji123', '321123', '321123', 0, '2024-02-05 21:13:23', ''),
(73, 'jiji', 'jiji123', '00000000', '0000000', 0, '2024-02-05 21:13:36', ''),
(74, 'jiji', 'jiji123', 'LOL', 'haha', 0, '2024-02-05 21:13:52', ''),
(75, 'jiji', 'jiji123', 'Dos 공격이란', '서비스를 불가하게 만드는 공격으로 3가지의 유형이 있다.\r\n\r\n1. 애플리케이션 취약점\r\n가용성 침해\r\n\r\n2. 서비스 리소스 소모 \r\n저장공간, CPU 등\r\n\r\n3. 네트워크 대역폭 소모 \r\n다량의 트래픽을 유발', 1, '2024-02-05 21:15:47', ''),
(76, 'jiji', 'jiji123', 'TCP / UDP', 'TCP \r\n데이터를 안전하게 보냄\r\nhow? 데이터를 주고 받기 전 3 way handshake를 통해 논리적인 연결을 먼저 실시\r\n\r\nUDP\r\n연결 없이 데이터를 보냄\r\n', 0, '2024-02-05 21:17:45', ''),
(77, '수민', 'sumin', '가입했습니다', 'ㅎㅇㅎㅇ', 3, '2024-02-05 21:22:32', ''),
(78, '숨숨', 'sumin', 'CSRF', '피해자가 서버로 임의의 요청을 보내게 만드는 공격\r\n\r\n근본적인 방어 방법으로는 사용자가 요청을 보낼 때 인증정보를 함께 입력하도록 구현하여 공격자가 요청 정보를 조작할 수 없게 해야함', 0, '2024-02-05 21:25:55', ''),
(79, 'qweqweqwe', 'qwe', '확인', '11', 0, '2024-02-05 23:09:02', ''),
(81, 'qweqweqwe', 'qwe', 'javascript', 'js', 0, '2024-02-05 23:43:40', ''),
(82, 'qweqweqwe', 'qwe', '33333', '3333', 0, '2024-02-05 23:43:49', ''),
(83, 'qweqweqwe', 'qwe', '1111111', '11111111', 0, '2024-02-05 23:44:00', ''),
(84, 'jiji', 'jiji123', 'db test', 'test', 2, '2024-02-05 23:56:13', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `userpw` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userphone` varchar(11) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `username`, `userid`, `userpw`, `useremail`, `userphone`, `regdate`) VALUES
(1, 'sumin', 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'sm123@naver.com', '1012341234', '2023-11-04 20:36:49'),
(11, 'jiji', 'jiji', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'jiji@hihi.com', '1034563456', '2023-11-13 12:57:47'),
(13, '정숨숨', 'sdf', 'sdf', 'sdf@naver.com', '1012341234', '2023-12-25 19:59:19'),
(14, 'fdsfds', 'fds', 'fds', 'fds@naver.com', '1032146541', '2023-12-25 20:04:32'),
(15, 'abc', 'abc', 'abc', 'abc@naver.com', '1078947894', '2023-12-25 20:45:07'),
(16, '배고파', 'hungry', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'hg123@naver.com', '1011112222', '2023-12-26 23:10:14'),
(17, 'qweqweqwe', 'qwe', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'qwe@naver.com', '01023231252', '2023-12-26 23:14:43'),
(18, 'kk', 'asd', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'sdf@naver.com', '1012345678', '2024-01-06 10:36:18'),
(19, 'aaaa', 'hihi', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'hi@naver.com', '1012345678', '2024-01-06 10:39:11'),
(20, 'Alphabet', 'abcd', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'abcd@naver.com', '1056899856', '2024-01-08 18:26:25'),
(24, 'jiji', 'jiji123', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'jiji@g.c', '1012333211', '2024-01-15 10:37:53'),
(25, 'new123', 'new123', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'new123@naver.com', '1012345678', '2024-01-15 15:31:14'),
(26, 'iphone', 'iphone123', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'iphone@gmail.com', '01012112222', '2024-01-15 15:33:05'),
(27, 'new123', 'new123', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'new123@naver.com', '01012345678', '2024-01-15 15:31:14'),
(28, '숨숨', 'sumin', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'sumin@gmail.com', '01012341212', '2024-02-05 21:22:17'),
(29, '조인', 'join123', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'join@naver.com', '12312312312', '2024-02-05 23:55:19');

-- --------------------------------------------------------

--
-- 테이블 구조 `reply`
--

CREATE TABLE `reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `reply`
--

INSERT INTO `reply` (`idx`, `con_num`, `name`, `id`, `content`, `regdate`) VALUES
(9, 56, 'jiji', 'jiji123', 'ㅎㅇ', '2024-02-04 23:09:29'),
(11, 56, 'jiji', 'jiji123', 'ㅎㅇㅎㅇ', '2024-02-04 23:33:34'),
(12, 56, 'qweqweqwe', 'qwe', 'ㅎㅇ', '2024-02-04 23:34:00'),
(13, 56, 'qweqweqwe', 'qwe', 'ㅇㅇㅇㅇ', '2024-02-04 23:34:44'),
(14, 55, 'qweqweqwe', 'qwe', 'ㅎㅎ', '2024-02-05 01:17:40'),
(15, 58, 'jiji', 'jiji123', 'ㅎㅇ', '2024-02-05 01:34:58'),
(16, 48, 'jiji', 'jiji123', 'ㅇㅇㅇㅇㅇ', '2024-02-05 02:30:43'),
(17, 48, 'jiji', 'jiji123', 'ㅇㅇㅇ', '2024-02-05 02:31:18'),
(18, 77, '수민', 'sumin', '안녕하세요', '2024-02-05 21:22:46'),
(19, 77, '수민', 'sumin', 'ㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇ', '2024-02-05 21:22:53'),
(20, 69, 'qweqweqwe', 'qwe', 'ㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁㅁ', '2024-02-05 21:26:44'),
(22, 84, 'jiji', 'jiji123', 'test2', '2024-02-05 23:56:56');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 테이블의 AUTO_INCREMENT `reply`
--
ALTER TABLE `reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
