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
		<div class="row wf content">
			<div class="col-sm wf">Account</div>
			<div class="col-md wf">Right</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	</body>
</html>