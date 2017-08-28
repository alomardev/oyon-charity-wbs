@@include("../_header.php", {"title": "الخدمات", "active": "login"})
<div class='page-wrapper' id='apps-list'>
<h1 class='page-title'>الخدمات</h1>
<ul>
	<?php $apps_ids = getUser()['apps'];
	for ($i = 0; $i < count($apps_ids); $i++) {
		$app_info = getAppInfo($apps_ids[$i]);
		echo "<li><a href='/apps/$app_info[dir]'>$app_info[title]</a></li>";
	}
	?>
</ul>
</div>
@@include("../_footer.php", {"scripts": []})