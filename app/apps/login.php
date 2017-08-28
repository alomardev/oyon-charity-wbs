@@include("../_header.php", {"title": "تسجيل الدخول", "active": "login"})
<div class='page-wrapper' id='login'>
	<h1 class='page-title'>تسجيل الدخول إلى النظام</h1>

	<form id='login-form' class='box' method='POST'>
			<div><label for='username'>اسم المستخدم</label></div>
			<div><bdo dir='ltr'><input class='center' name='username' type='text'></bdo></div>
			<div><label for='password'>كلمة المرور</label></div>
			<div><bdo dir='ltr'><input class='center' name='password' type='password'></bdo></div>
			<div class='u-cf'><button name='submit' class='u-fl'>تسجيل الدخول</button></div>
			<div id='message'></div>
	</form>
</div>
@@include("../_footer.php", {"scripts": ["/res/login.js"]})