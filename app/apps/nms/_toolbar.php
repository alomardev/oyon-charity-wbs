<div class='app-toolbar'>
	<ul>
		<li class='toolbar-title'>نظام تحرير الأخبار</li>
		<li @@if (active == 'list') {class='active'}><a href="/apps/nms/list.php">قائمة الأخبار</a></li>
		<li @@if (active == 'edit') {class='active'}><a href="/apps/nms/edit.php?id=new">تحرير خبر</a></li>
		<li @@if (active == 'ticker') {class='active'}><a href="/apps/nms/ticker.php">الشريط الإخباري</a></li>
	</ul>
</div>