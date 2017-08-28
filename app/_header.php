<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once("phps/app.php");

/* authentication */

if (inPath('apps/login.php')) {
	if (getUser()) {
		header('Location: /apps');
		exit;
	}
} elseif (inPath('apps')) {
	if (!getUser()) {
		header('Location: /apps/login.php');
		exit;
	}
}
if (inPath('apps/nms')) {
	if (!authorized(APP_NMS)) {
		header('Location: /apps/login.php');
		exit;
	}
}
if (inPath('apps/bms')) {
	if (!authorized(APP_BMS)) {
		header('Location: /apps/login.php');
		exit;
	}
}

?>

<!DOCTYPE html>
<html dir='rtl'>
<head>
	<meta charset='UTF-8'>
	<!-- <meta name='viewport' content='width=device-width, initial-scale=1.0'> -->
	<link rel='stylesheet' href='/res/main.css'>
	<title>جمعية العيون الخيرية - @@title</title>
</head>
<body>
<header>
	<div class='container'>
		<a id='header-main-logo' class='u-cf' href='/' class='u-cf'>
			<img class='u-fr' src='/res/charity-logo.png' width='96' height='86'>
			<img class='u-fr' src='/res/charity-title.png' width='317' height='86'>
		</a>
		<a class='u-fl' target="_blank" href='http://vision2030.gov.sa'><img src='/res/vision-logo.png' width='108' height='86'></a>
		<a class='u-fl' target="_blank" href='https://mlsd.gov.sa'><img src='/res/mlsd-logo.png' width='108' height='86'></a>
	</div>
</header>
<div id='main-wrapper'>
	<div class='container'>
		<nav id='main-nav'>
			<ul>
				<li @@if (active == 'home') {class='active'}><a href='/'>الرئيسية</a></li>
				<li class='dropdown-nav'>
					<div>الإدارة</div>
					<ul>
						<li @@if (active == 'orgchart') {class='active'}><a href="/orgchart.php">الهيكل الإداري</a></li>
						<li @@if (active == 'content') {class='active'}><a href="/content.php">الصفحة الإدارية</a></li>
					</ul>
				<li class='dropdown-nav'>
					<div>تعرف علينا</div>
					<ul>
						<li @@if (active == 'committees') {class='active'}><a href="/committees.php">اللجان العاملة</a></li>
						<li @@if (active == 'partners') {class='active'}><a href="/partners.php">شركاؤنا</a></li>
						<li @@if (active == 'about') {class='active'}><a href="/about.php">من نحن</a></li>
					</ul>
				</li>
				<li @@if (active == 'contact') {class='active'}><a href="/contact.php">تواصل معنا</a></li>
			<?php if ($user = getUser()) { ?><li class='dropdown-nav'>
					<div><?php echo $user['nickname']; ?></div>
					<ul>
						<li><a href="/apps">الخدمات</a></li>
						<li><a href="/apps/logout.php">تسجيل الخروج</a></li>
					</ul>
				</li>
			<?php } else { ?>
				<li @@if (active == 'login') {class='active'}><a href="/apps/login.php">تسجيل الدخول</a></li>
			<?php } ?>
			</ul>
		</nav>
		<section id='main-section'>