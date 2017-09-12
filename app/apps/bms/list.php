0@@include("../../_header.php", {"title": "قائمة المستفيدين", "active": "news-app"})

<?php

?>

<div class='page-wrapper' id='bms-list'>
@@include("_toolbar.php", {"active": "list"})
<div class="inputs-container">
	<div class='input fill-width inputs-container'>
		<label class='input label' for="title">البحث:</label>
		<input class='input fill-width' type="text" name='title' placeholder="كلمات وأرقام">
	</div>
</div>
<hr>
<div class="u-cf">
	<div class='u-fl' id="list-container">
		<div class="selected list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
		<div class="list-item u-cf"><span class='u-fr'>الاسم</span><span class='u-fl'>أشياء أخرى</span></div>
	</div>
	<div class='u-fr' id="item-info">
		<div data-role='tac'>
			<input type="text">
			<ul>
				<li>ألف</li>
				<li>باء</li>
				<li>تاء</li>
			</ul>
		</div>
		<br>
		<br>
		<br>
		<div data-role='tac'>
			<input type="text">
			<ul>
				<li>بسم الله الرحمن الرحيم</li>
				<li>باء</li>
				<li>تاء</li>
			</ul>
		</div>
	</div>
</div>
<hr>

@@include("../../_footer.php", {"scripts": []})