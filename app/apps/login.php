@@include("../_top.php", {"type": "site", "title": "خارطة الموقع"})
@@include("../_header.php", {"active": "login"})
<div class='page-wrapper' id='login'>
	<h1 class='page-title'>تسجيل الدخول إلى النظام</h1>

	<form id='login-form' class='box' method='POST'>
			<div><label for='username'>اسم المستخدم</label></div>
			<div><input name='username' type='text'></div>
			<div><label for='password'>كلمة المرور</label></div>
			<div><input name='password' type='password'></div>
			<div class='u-cf'><button name='submit' class='u-fl'>تسجيل الدخول</button></div>
	</form>
</div>
@@include("../_footer.php")
@@include("../_bottom.php")