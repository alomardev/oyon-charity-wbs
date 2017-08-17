@@include("_top.php", {"title": "جمعية العيون الخيرية"})
@@include("_header.php", {"active": "home"})
<div class='page-wrapper' id='home'>
<div class='slide-show'>
	<div class='slide-show-pager'></div>
	<div class='slide-show-next-btn icon-slide-show-next'></div>
	<div class='slide-show-prev-btn icon-slide-show-prev'></div>
	<div class='slide-show-image'></div>
</div>
<div class="top-section">
	<div id="clock-container">
		<div id='clock'>
			<div class='digital'>00:00:00 صباحا</div>
			<div class='date'>0505050</div>
		</div>
	</div>
	<div id='services'>
		<h2>برامجنا</h2>
		<div class="services-row u-cf">
			<div>توزيع الزكاة</div>
			<div>مساعدات سداد إيجار</div>
			<div>كفالة أيتام وأسر</div>
		</div>
	</div>
</div>
<div id='cards' class='u-cf'>
	<div class="cards-col u-fr">
		<div id='card-donation' class='card'>
			<div class='subject'><h3>كيف تتبرع</h3></div>
			<div class='content-box'>
				<strong>يمكنك أخي/أختي التبرع عن طريق:</strong>
				<ol>
					<li>الاستقطاع الشهري: ويتم عن طريق زيارة مقر الجمعية أو أحد فروع البنوك بتعبئة استمارة الاستقطاع الشهري</li>
					<li>الصراف الآلي: ويتم عن طريق التحويل من حسابكم إلى حسابات الجمعية</li>
					<li>إسعادنا بزيارة <a href="/contact.php">مقر الجمعية</a> لتسليم التبرعات النقدية والعينية (غذائية، أجهزة، أثاث)</li>
					<li>عمل شيك باسم (جمعية العيون الخيرية للخدمات الاجتماعية) والتفضل بتسليمه في مقر الجمعية أو <a href="/contact.php">الاتصال بنا</a></li>
				</ol>
			</div>
		</div>
		<div id='card-ibans' class='card'>
			<div class='subject'><h3>الحسابات البنكية</h3></div>
			<div class='content-box'>
				<div class='loading-medium'></div>
			</div>
		</div>
		<!-- <div class='card'>
			<div class='subject'><h3>روابط تهمك</h3></div>
			<div id='content-box-links' class='content-box'>
				<ul>
					<li><a href='#'>رابط ١</a></li>
					<li><a href='#'>رابط ٢</a></li>
					<li><a href='#'>رابط ٣</a></li>
					<li><a href='#'>رابط ٤</a></li>
					<li><a href='#'>رابط ٥</a></li>
				</ul>
			</div>
		</div> -->
	</div>
	<div class='cards-col u-fr'>
		<div id='card-news' class='card'>
			<div class='subject'><h3>أحدث الأخبار</h3></div>
			<div class='content-box'>
						<a href='#' class='news-item'>
							<img><div class='news-text'>خبر جديد<span>محتوى قصير</span></div>
						</a>
						<a href='#' class='news-item'>
							<img><div class='news-text'>خبر جديد<span>محتوى قصير</span></div>
						</a>
						<a href='#' class='news-item'>
							<img><div class='news-text'>خبر جديد<span>محتوى قصير</span></div>
						</a>
			</div>
		</div>
		<div id="card-twitter" class="card">
			<div class="subject"><h3>تويتر</h3></div>
			<div class="content-box">
				<a class="twitter-timeline" data-lang="ar" data-height="400" href="https://twitter.com/gmaloyon">Tweets by gmaloyon</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
	</div>
</div>
</div>
@@include("_footer.php")
@@include("_bottom.php")