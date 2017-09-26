0@@include("../../_header.php", {"title": "قائمة المستفيدين", "active": "news-app"})

<?php
$data = getBeneficiary();
$script = !$data ? "null" : json_encode($data);
echo "<script>var data = $script;</script>";
?>

<div class='page-wrapper' id='bms-list'>
@@include("_toolbar.php", {"active": "list"})
<div class="inputs-container">
	<div class='input fill-width inputs-container'>
		<label class='input label' for="query">البحث:</label>
		<input class='input fill-width' type="text" name='query' placeholder="ابحث عن طريق الاسم، رقم الهوية، أو رقم الملف">
	</div>
</div>
<hr>
<div class="u-cf">
	<div class='u-fl' id="list-container">
		<?php foreach ($data as $v) { ?>
		<div data-fid="<?php echo $v['file_id']; ?>" class="list-item u-cf"><span class='u-fr'><?php echo $v['full_name']; ?></span><span class='u-fl'><?php echo $v['file_id']; ?></span></div>
		<?php } ?>
	</div>
	<div id="item-info">
		<div class='non-empty'>
			<table>
				<tr>
					<td class='width-fill'><h3 id="item-info-fullname">فاضي</h3></td>
					<td class='width-content'><bdo dir="ltr"><h3 class='u-fl' id="item-info-fileid">#9878</h3></bdo></td>
				</tr>
				<tr><td colspan="2">
					<h4 class='u-fr'>رقم الحاسب: <span id="item-info-govid"></span></h4>
				</td></tr>
				<tr><td colspan="2">
					<div class="row">
						<div class="col-2">الجنس: <span id="item-info-gender"></span></div>
						<div class="col-2">تاريخ الميلاد: <bdo dir='ltr'><span id="item-info-birthdate"></span></bdo></div>
					</div>
				</td></tr>
				<tr><td colspan="2">
					<div class="row">
						<div class="col-2">عدد الأفراد: <span id="item-info-mcount"></span></div>
						<div class="col-2">عدد التابعين: <span id="item-info-dcount"></span></div>
					</div>
				</td></tr>
			</tbody></table>

			<div class="align-bottom row">
				<div class="col-3">هاتف المنزل: <span id="item-info-phone1"></span></div>
				<div class="col-3">الجوال: <span id="item-info-phone2"></span></div>
				<div class="col-3">آخر: <span id="item-info-phone3"></span></div>
				<div class="actions-container u-cf">
					<a id='edit-button' class='u-fl button'>تعديل</a>
				</div>
			</div>
		</div>
		<div class="empty-notation">اختر المستفيد من القائمة الجانبية.</div>
	</div>
</div>
<hr>

@@include("../../_footer.php", {"scripts": ["/res/bms-list.js"]})