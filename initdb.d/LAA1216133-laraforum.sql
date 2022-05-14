-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- ホスト: mysql147.phy.lolipop.lan
-- 生成日時: 2022 年 5 月 14 日 20:51
-- サーバのバージョン: 5.6.23-log
-- PHP のバージョン: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `LAA1216133-laraforum`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `channels`
--

CREATE TABLE IF NOT EXISTS `channels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `channels_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- テーブルのデータのダンプ `channels`
--

INSERT INTO `channels` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'laravel', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(2, 'PHP', 'php', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(3, 'JavaScript', 'javascript', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(4, 'Node js', 'node-js', '2020-11-02 10:29:39', '2020-11-02 10:29:39'),
(5, 'HTML/CSS', 'html-css', '2020-11-01 15:00:00', '2020-11-01 15:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `discussions`
--

CREATE TABLE IF NOT EXISTS `discussions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `discussions_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `discussions`
--

INSERT INTO `discussions` (`id`, `user_id`, `title`, `content`, `reply_id`, `slug`, `channel_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'ララベルのバージョン指定の方法', '<div>古いバージョンのララベルのインストール方法を教えて下さい</div>', 2, '', 1, '2020-11-02 11:17:50', '2020-11-02 12:22:19'),
(2, 4, 'Laravel　プロジェクトの画像表示がされない問題', '<div>ローカルにて正常な動作を確認していたにも関わらず、レンタルサーバーにデプロイ後、画像がうまく表示されません。<br>どのような原因が考えられるでしょうか。</div>', 3, 'laravel', 1, '2020-11-03 04:58:47', '2020-11-03 05:19:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=29 ;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2020_10_23_101636_create_discussions_table', 1),
(25, '2020_10_23_101906_create_channels_table', 1),
(26, '2020_10_23_182351_create_replies_table', 1),
(27, '2020_10_24_082916_create_notifications_table', 1),
(28, '2020_10_25_061712_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('355da2dc-cff5-4628-90c0-18e4a2390168', 'LaravelForum\\Notifications\\NewReplyAdded', 'LaravelForum\\User', 4, '{"discussion":{"id":2,"user_id":4,"title":"Laravel\\u3000\\u30d7\\u30ed\\u30b8\\u30a7\\u30af\\u30c8\\u306e\\u753b\\u50cf\\u8868\\u793a\\u304c\\u3055\\u308c\\u306a\\u3044\\u554f\\u984c","content":"<div>\\u30ed\\u30fc\\u30ab\\u30eb\\u306b\\u3066\\u6b63\\u5e38\\u306a\\u52d5\\u4f5c\\u3092\\u78ba\\u8a8d\\u3057\\u3066\\u3044\\u305f\\u306b\\u3082\\u95a2\\u308f\\u3089\\u305a\\u3001\\u30ec\\u30f3\\u30bf\\u30eb\\u30b5\\u30fc\\u30d0\\u30fc\\u306b\\u30c7\\u30d7\\u30ed\\u30a4\\u5f8c\\u3001\\u753b\\u50cf\\u304c\\u3046\\u307e\\u304f\\u8868\\u793a\\u3055\\u308c\\u307e\\u305b\\u3093\\u3002<br>\\u3069\\u306e\\u3088\\u3046\\u306a\\u539f\\u56e0\\u304c\\u8003\\u3048\\u3089\\u308c\\u308b\\u3067\\u3057\\u3087\\u3046\\u304b\\u3002<\\/div>","reply_id":null,"slug":"laravel","channel_id":1,"created_at":"2020-11-03 13:58:47","updated_at":"2020-11-03 13:59:09","author":{"id":4,"name":"AnonymousUser","email":"super_sonic_rainbow@yahoo.co.jp","email_verified_at":"2020-11-03 13:55:26","created_at":"2020-11-03 13:52:53","updated_at":"2020-11-03 13:55:26"}}}', '2020-11-03 05:12:33', '2020-11-03 05:11:05', '2020-11-03 05:12:33'),
('49079434-6f53-4efb-b36a-2b1cfba3e890', 'LaravelForum\\Notifications\\ReplyMarkedAsBestReply', 'LaravelForum\\User', 1, '{"discussion":{"id":2,"user_id":4,"title":"Laravel\\u3000\\u30d7\\u30ed\\u30b8\\u30a7\\u30af\\u30c8\\u306e\\u753b\\u50cf\\u8868\\u793a\\u304c\\u3055\\u308c\\u306a\\u3044\\u554f\\u984c","content":"<div>\\u30ed\\u30fc\\u30ab\\u30eb\\u306b\\u3066\\u6b63\\u5e38\\u306a\\u52d5\\u4f5c\\u3092\\u78ba\\u8a8d\\u3057\\u3066\\u3044\\u305f\\u306b\\u3082\\u95a2\\u308f\\u3089\\u305a\\u3001\\u30ec\\u30f3\\u30bf\\u30eb\\u30b5\\u30fc\\u30d0\\u30fc\\u306b\\u30c7\\u30d7\\u30ed\\u30a4\\u5f8c\\u3001\\u753b\\u50cf\\u304c\\u3046\\u307e\\u304f\\u8868\\u793a\\u3055\\u308c\\u307e\\u305b\\u3093\\u3002<br>\\u3069\\u306e\\u3088\\u3046\\u306a\\u539f\\u56e0\\u304c\\u8003\\u3048\\u3089\\u308c\\u308b\\u3067\\u3057\\u3087\\u3046\\u304b\\u3002<\\/div>","reply_id":3,"slug":"laravel","channel_id":1,"created_at":"2020-11-03 13:58:47","updated_at":"2020-11-03 14:19:01"}}', '2020-11-03 05:19:21', '2020-11-03 05:19:04', '2020-11-03 05:19:21'),
('4ecd3a36-f063-45c0-87bc-fa020f4c1de9', 'LaravelForum\\Notifications\\NewReplyAdded', 'LaravelForum\\User', 1, '{"discussion":{"id":1,"user_id":1,"title":"\\u30e9\\u30e9\\u30d9\\u30eb\\u306e\\u30d0\\u30fc\\u30b8\\u30e7\\u30f3\\u6307\\u5b9a\\u306e\\u65b9\\u6cd5","content":"<div>\\u53e4\\u3044\\u30d0\\u30fc\\u30b8\\u30e7\\u30f3\\u306e\\u30e9\\u30e9\\u30d9\\u30eb\\u306e\\u30a4\\u30f3\\u30b9\\u30c8\\u30fc\\u30eb\\u65b9\\u6cd5\\u3092\\u6559\\u3048\\u3066\\u4e0b\\u3055\\u3044<\\/div>","reply_id":2,"slug":"","channel_id":1,"created_at":"2020-11-02 20:17:50","updated_at":"2020-11-02 21:22:19","author":{"id":1,"name":"ShotaroMatsuya","email":"matsuya@h01.itscom.net","email_verified_at":"2020-11-02 20:14:52","created_at":"2020-11-02 19:55:12","updated_at":"2020-11-02 20:14:52"}}}', '2020-11-03 05:30:43', '2020-11-03 05:30:03', '2020-11-03 05:30:43'),
('921b5a6a-785e-4cbb-a5db-845b8e92e874', 'LaravelForum\\Notifications\\ReplyMarkedAsBestReply', 'LaravelForum\\User', 1, '{"discussion":{"id":2,"user_id":4,"title":"Laravel\\u3000\\u30d7\\u30ed\\u30b8\\u30a7\\u30af\\u30c8\\u306e\\u753b\\u50cf\\u8868\\u793a\\u304c\\u3055\\u308c\\u306a\\u3044\\u554f\\u984c","content":"<div>\\u30ed\\u30fc\\u30ab\\u30eb\\u306b\\u3066\\u6b63\\u5e38\\u306a\\u52d5\\u4f5c\\u3092\\u78ba\\u8a8d\\u3057\\u3066\\u3044\\u305f\\u306b\\u3082\\u95a2\\u308f\\u3089\\u305a\\u3001\\u30ec\\u30f3\\u30bf\\u30eb\\u30b5\\u30fc\\u30d0\\u30fc\\u306b\\u30c7\\u30d7\\u30ed\\u30a4\\u5f8c\\u3001\\u753b\\u50cf\\u304c\\u3046\\u307e\\u304f\\u8868\\u793a\\u3055\\u308c\\u307e\\u305b\\u3093\\u3002<br>\\u3069\\u306e\\u3088\\u3046\\u306a\\u539f\\u56e0\\u304c\\u8003\\u3048\\u3089\\u308c\\u308b\\u3067\\u3057\\u3087\\u3046\\u304b\\u3002<\\/div>","reply_id":3,"slug":"laravel","channel_id":1,"created_at":"2020-11-03 13:58:47","updated_at":"2020-11-03 14:12:27"}}', '2020-11-03 05:19:21', '2020-11-03 05:12:29', '2020-11-03 05:19:21'),
('b4db6d88-b1b0-45b9-8f4a-11852f2fd390', 'LaravelForum\\Notifications\\NewReplyAdded', 'LaravelForum\\User', 4, '{"discussion":{"id":2,"user_id":4,"title":"Laravel\\u3000\\u30d7\\u30ed\\u30b8\\u30a7\\u30af\\u30c8\\u306e\\u753b\\u50cf\\u8868\\u793a\\u304c\\u3055\\u308c\\u306a\\u3044\\u554f\\u984c","content":"<div>\\u30ed\\u30fc\\u30ab\\u30eb\\u306b\\u3066\\u6b63\\u5e38\\u306a\\u52d5\\u4f5c\\u3092\\u78ba\\u8a8d\\u3057\\u3066\\u3044\\u305f\\u306b\\u3082\\u95a2\\u308f\\u3089\\u305a\\u3001\\u30ec\\u30f3\\u30bf\\u30eb\\u30b5\\u30fc\\u30d0\\u30fc\\u306b\\u30c7\\u30d7\\u30ed\\u30a4\\u5f8c\\u3001\\u753b\\u50cf\\u304c\\u3046\\u307e\\u304f\\u8868\\u793a\\u3055\\u308c\\u307e\\u305b\\u3093\\u3002<br>\\u3069\\u306e\\u3088\\u3046\\u306a\\u539f\\u56e0\\u304c\\u8003\\u3048\\u3089\\u308c\\u308b\\u3067\\u3057\\u3087\\u3046\\u304b\\u3002<\\/div>","reply_id":3,"slug":"laravel","channel_id":1,"created_at":"2020-11-03 13:58:47","updated_at":"2020-11-03 14:19:01","author":{"id":4,"name":"AnonymousUser","email":"super_sonic_rainbow@yahoo.co.jp","email_verified_at":"2020-11-03 13:55:26","created_at":"2020-11-03 13:52:53","updated_at":"2020-11-03 13:55:26"}}}', NULL, '2020-11-03 05:30:03', '2020-11-03 05:30:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- テーブルのデータのダンプ `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `discussion_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '<div>助けてください！！！！！！</div>', '2020-11-02 12:11:38', '2020-11-02 12:11:38'),
(2, 2, 1, '<div>例えばバージョン5.1.~で指定したい場合は以下のコマンドを打てばうまくインストールできますよ<br><br></div><pre>composer create-project "laravel/laravel=5.1.*" sampleproject　</pre><div>sampleprojectには任意のアプリケーションの名前が入ります</div>', '2020-11-02 12:16:59', '2020-11-02 12:16:59'),
(3, 1, 2, '<div>app/publicフォルダ内で画像が管理されている必要があります。<br>Laravelではstorageフォルダ内に保管されたメディアファイルを使用するためには、publicフォルダ内でstorageフォルダのシンボリックリンクを作成しなければなりません。<br>おそらくデプロイ時にそのリンクが切れているか、pathが異なったものが指定されている可能性があります。<br>デプロイ先のレンタルサーバーのssh接続により、app/publicフォルダ内にstorageフォルダのシンボリックリンクが生成されていることを確認してみてください。<br>リンクがなければ、以下のコマンドでリンクを生成↓<br><br></div><pre>app$ php artisan storage:link</pre><div><br>もし、Linkが確認できたら、一度linkを削除したあとに再生成↓<br><br></div><pre>public$ unlink storage\r\napp$ php artisan storage:link</pre>', '2020-11-03 05:11:04', '2020-11-03 05:11:04'),
(4, 4, 2, '<div>うまくいきました<br>ありがとう！！</div>', '2020-11-03 05:12:25', '2020-11-03 05:12:25'),
(5, 2, 2, '<div>good jobs!!!</div>', '2020-11-03 05:27:11', '2020-11-03 05:27:11'),
(6, 2, 1, '<div>Does it work???</div>', '2020-11-03 05:27:58', '2020-11-03 05:27:58'),
(7, 1, 1, '<div>yes! I''m successful!&nbsp;<br>I owe you.<br>thanks!</div>', '2020-11-03 05:30:29', '2020-11-03 05:30:29');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=14 ;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ShotaroMatsuya', 'matsuya@h01.itscom.net', '2020-11-02 11:14:52', '$2y$10$Xf0fZ1I7zt58M9RgmQO/LOdciYAopJSbzeOmGCW5yjyrtkH3g.xfy', 'hSCc202zmIgpcSqYfhT8C25U9DssPNCpvWLt7cIXPdXuD6b4VnjP3zFLLT3d', '2020-11-02 10:55:12', '2020-11-02 11:14:52'),
(2, '通りすがり', 'unsonicrainbow@gmail.com', '2021-01-14 18:25:17', '$2y$10$1AcOff5d1WrOMB3KirNVy.t2EVNuCea7rBBB6BGfunsbwua/.mnka', 'ngoyPREgIHOeKLmwbXKintqHkrLhBPYlbkgiPiaP1uTqah9tC7U2IkayRoT3', '2020-11-02 12:14:28', '2021-01-14 18:25:17'),
(4, 'AnonymousUser', 'super_sonic_rainbow@yahoo.co.jp', '2020-11-03 04:55:26', '$2y$10$ALv3d7PfENPPumzEBejEmuED7Z.r2dm59mdDZ/co6.WJiJjDoE7Ze', NULL, '2020-11-03 04:52:53', '2020-11-03 04:55:26'),
(5, 'Davidvop', 'roilugneutine@mail.com', NULL, '$2y$10$yeJ6HVrEls9tuDkACkvkNuC4h5t7Wqbz33j8jkRytE4BjuKIMkBH2', NULL, '2021-08-19 02:42:25', '2021-08-19 02:42:25'),
(6, 'RichardDep', 'kensawerlernmi@mail.com', '2021-08-20 01:20:06', '$2y$10$TU8R0oSzDl9DCzYrL9.lgOFLdL6oE8drin3vnSFmSopJO75fxwBMK', NULL, '2021-08-20 00:56:32', '2021-08-20 01:20:06'),
(7, 'Jessedub', 'liolectpirocard@mail.com', '2021-08-20 06:23:41', '$2y$10$h0mv0AJhzcAeZMIHOM1q3.AP2KeUEaYdjaA6VLWZx3QDYFqVlmzVS', NULL, '2021-08-20 05:48:01', '2021-08-20 06:23:41'),
(8, 'Anthonyuphon', 'theilaropjobspop@mail.com', '2021-08-23 21:49:28', '$2y$10$zh69hfBMbPdMCmfwqiUQEOSI5q7TX.uMCq3g.QnKNtrWOLkehnms6', NULL, '2021-08-23 21:25:08', '2021-08-23 21:49:28'),
(9, 'smat710.com vnndighidfjsmfoehwjfehfkdghedjfwijfojdojgdmkcsdogejdowsfdegejjfwskfegeodfjijhsbjhsbhcgfdhsfdhhdgdhthd', 'sofiyasamylkin1987911be1+7q@bk.ru', NULL, '$2y$10$cC.rfzdshXwhcndV6tgNCeWJF2Dn8xt9Eya3nFKAZiIb6CPqnTglm', NULL, '2021-10-20 22:34:02', '2021-10-20 22:34:02'),
(10, 'Wir empfehlen Ihnen Wem:smat710.com https://audi.com', 'everodo2@mail.ru', NULL, '$2y$10$aozbCIhZa6syV2neZeR66OLCr/62Jw34yH5K80ymF07Sm4HYg797i', NULL, '2022-02-10 13:36:08', '2022-02-10 13:36:08'),
(11, 'smat710.com bbbdnwkdowifhrdokpwoeiyutrieowsowddfbvksodkasofjgiekwskfieghrhjkfejfegigofwkdkbhbgiejfwokdd', 'dimafokin199506780tx+w133@inbox.ru', NULL, '$2y$10$ei8PYXPR.0mEMyXnakdhe.5KLlVSFIYjona16M0XvxgWRlmCwsM7e', NULL, '2022-02-11 13:45:13', '2022-02-11 13:45:13'),
(12, 'hichaelseisa', 'istonlavernascha@gmail.com', NULL, '$2y$10$bDiuOyOB3LaONyUt2IYMV.VC481P6a0MNY6m/pW2nhY2NOLI3mS9m', NULL, '2022-02-27 07:30:14', '2022-02-27 07:30:14'),
(13, 'smat710.com ugrfeiohofidsksmvnjdbvsijf94t9u5t0i4r94ijgrjght9y84r49t64rkowf0ereiuguejdkwdiweofuehdskodjjdgofjsoddggfsidj', 'KsenofontMaidanov+1s3g@mail.ru', NULL, '$2y$10$w6pziBqaxsNbAaysXcS4n.pZwknksHu1cGJBhyr07ywBRXGOfNEkS', NULL, '2022-04-21 21:25:10', '2022-04-21 21:25:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
