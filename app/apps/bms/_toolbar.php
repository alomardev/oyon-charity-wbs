<div class='app-toolbar'>
	<ul>
		<li class='toolbar-title'>نظام إدارة المستفيدين</li>
		<li @@if (active == 'list') {class='active'}><a href="/apps/bms/list.php">قائمة المستفيدين</a></li>
		<li @@if (active == 'edit') {class='active'}><a href="/apps/bms/edit.php">تحرير معلومات مستفيد</a></li>
		<li @@if (active == 'reports') {class='active'}><a href="/apps/bms/reports.php">التقارير</a></li>
	</ul>
</div>