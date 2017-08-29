@@include("../../_header.php", {"title": "قائمة الأخبار", "active": "news-app"})
<div class='page-wrapper' id='news-list'>
@@include("_toolbar.php", {"active": "list"})

<?php

$failed = false;
$checked_ids = array();

if (isset($_POST['save']) and $_POST['save'] == 1) {
	$insert_values = "";
	$first = true;
	foreach ($_POST as $k => $v) {
		if (substr($k, 0, 4) == 'post') {
			$checked = explode('-', $k)[1];
			$checked_ids[] = $checked;
			if (!$first) {
				$insert_values .= ", ";
			}
			$insert_values .= "($checked)";
			$first = false;
		}
	}
	$result = select("DELETE FROM `highlighted_news_post`;");
	$failed |= !$result;
	$result = select("INSERT INTO `highlighted_news_post` VALUES $insert_values;");
	$failed |= !$result;
} else {
	$result = select("SELECT * FROM `highlighted_news_post`;");
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$checked_ids[] = $row['post_id'];
		}
	}
}

function addPost($row) {
	global $checked_ids;
	$date = explode(" ", $row['date'])[0];
	$image_url = $row['header_image'];
	echo "<div style='background-image: url($image_url);' class='post-item'>";
	if ($row['published']) {
		echo "<input class='post-item-checkbox' type='checkbox' name='post-$row[id]' value='1'";

		if (in_array($row['id'], $checked_ids)) {
			echo " checked";
		}

		echo ">";
	}
	echo "<div class='post-item-actions'><div><a class='button' href='/apps/nms/edit.php?id=$row[id]'>تعديل</a><a class='button' href='/apps/nms/preview.php?id=$row[id]'>معاينة</a></div></div>";
	echo "<div class='post-item-title'>$row[title]</div>";
	echo "<div class='post-item-date'>$date</div>";
	echo "</div>";
}

$result = select("SELECT * FROM `news_post`;");
$posts_published = array();
$posts_unpublished = array();
if($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['published']) {
			$posts_published[] = $row;
		}
		if (!$row['published']) {
			$posts_unpublished[] = $row;
		}
	}
}
?>

<h4>أخبار لم تنشر</h4>
<div class="news-container">
<?php
$len = count($posts_unpublished);
if ($len == 0) {
	echo "<p>لا يوجد أخبار في هذه القائمة! قم بتحرير خبر جديد من <a href='/apps/nms/edit.php?id=new'>هنا</a>.</p>";
}
for ($i=0; $i < $len; $i++) {
	addPost($posts_unpublished[$i]);
}

?>
</div>
<hr>
<h4>أخبار تم تنشرها</h4>
<form action="" method="POST">
<div class="news-container">
<?php
$len = count($posts_published);
if ($len == 0) {
	echo "<p>لم يتم نشر أي خبر!</p>";
}
for ($i=0; $i < $len; $i++) {
	addPost($posts_published[$i]);
}
?>
</div>
<hr>
<div class="input-container u-cf">
	<button name='save' value='1' class='u-fl'>حفظ التغييرات</button>
	<div class="u-fr"><small>الأخبار المحددة هي ما سيتم عرضها في الصفحة الرئيسية للموقع</small></div>
</div>
</form>
</div>
@@include("../../_footer.php", {"scripts": []})