0@@include("../../_header.php", {"title": "قائمة الأخبار", "active": "news-app"})

<?php

$reloaded = array();
$submit = isset($_POST['submit']);

if ($submit) {
	$values = "";
	$first = true;
	foreach ($_POST as $k => $v) {
		if (substr($k, 0, 2) == 'nt') {
			if (empty(trim($v))) {
				continue;
			}
			$segs = explode('-', $k);
			if (!$first) {
				$values .= ", ";
			}
			$first = false;
			$values .= "($segs[1], '$v')";
			$reloaded[] = $v;
		}
	}
	select("DELETE FROM `news_ticker;");
	$failed = !select("INSERT INTO `news_ticker` VALUES $values;");
} else {
	$result = select("SELECT * FROM `news_ticker` ORDER BY `id`");
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$reloaded[] = $row['content'];
		}
	}
}
$count = count($reloaded);
$count = $count < 3 ? 3 : $count;

?>

<div class='page-wrapper' id='news-ticker'>
@@include("_toolbar.php", {"active": "ticker"})
<form action="" method="POST">
	<div class="actions-container u-cf">
		<label class='u-fr'>العدد: <input min='3' type="number" name='count' value='<?php echo $count; ?>'></label>
		<input class='u-fl' type='submit' name='submit' value='حفظ'>
	</div>
	<hr>
	<div id="news-text-fields">
	</div>
</form>
</div>
<?php echo "<script>var loadedData = ".json_encode($reloaded).";</script>" ?>
@@include("../../_footer.php", {"scripts": ["/res/news-ticker.js"]})