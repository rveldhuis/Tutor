<?php
	session_start();
	ob_flush();
?>
<!DOCTYPE html>
<html>
	<?php include('head.php'); ?>
	<body>
	<div class="container">			
		<?php include('menu.php'); ?>
		<?php include('header.php'); ?>
		<form class="form-signin" role="form" action="requestlogin.php" method="post">
			<div class="row wf content">
				<div class="col-sm-3">Email:</div>
				<div class="col-sm-8 f"><input type="text" name="email" placeholder="email address" /></div>
			</div>
			<div class="row wf content">
				<div class="col-sm-3">Password:</div>
				<div class="col-sm-8"><input type="password" name="password" placeholder="emailaddress" /></div>
			</div>
			<div class="row wf content">
				<div class="col-sm-3"></div>
				<div class="col-sm-8"><button type="submit">Log in</button></div>
			</div>
		</form>
		<?php include('footer.php'); ?>
	</div>
	</body>
</html>