<?php
	require('header.html');
?>
<style type="text/css">
#content {
	text-align: center;
}
</style>
<?php
	if (isset($_POST['submitted'])){
		if ((!empty($_POST['username'])) && (!empty($_POST['password'])))
		{
			if ((strtolower($_POST['username'] == 'admin')) && (($_POST['password']) == 'admin')){
				header("Location: Admin.php");
				exit();
			}
			else {
				print '<P>Incorrect Username or Password!</p>';
			}
		}
	}
?>
<div id="content">
	<form action="login.php" method="post">
		<p>Username: <input type="text" name="username" size="20" /></p>
		<p>Password: <input type="password" name="password" size="20" /></p>
		<input type="submit" value="Login" name="bookhBtn">
		<input type="hidden" name="submitted" value="true"/>
	</form>
</div>
</body>
</html>