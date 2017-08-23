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
				<li><a href='/'>الرئيسية</a></li>
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
				<li @@if (active == 'login') {class='active'}><a href="/apps/login.php">تسجيل الدخول</a></li>
			</ul>
		</nav>
		<section id='main-section'>