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
		<div class="wf content">
			<form class="form-register-student" role="form" action="actions/register-student.php" method="post">
				<div class="row wf content">
					<div class="col-sm-3">Email:</div>
					<div class="col-sm-8"><input type="text" name="mail" placeholder="Email Address" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">First Name:</div>
					<div class="col-sm-8"><input type="text" name="firstname" placeholder="First Name" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">Surname:</div>
					<div class="col-sm-8"><input type="text" name="surname" placeholder="Surname" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">Street:</div>
					<div class="col-sm-8"><input type="text" name="street" placeholder="Street" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">Postal code:</div>
					<div class="col-sm-8"><input type="text" name="postal_code" placeholder="Postal code" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">City:</div>
					<div class="col-sm-8"><input type="text" name="city" placeholder="City" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">Mobile phone number:</div>
					<div class="col-sm-8"><input type="text" name="mobile" placeholder="Mobile" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">College:</div>
					<div class="col-sm-8"><input type="text" name="college" placeholder="College" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">Password:</div>
					<div class="col-sm-8"><input type="password" name="password" placeholder="Password" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3">Verify password:</div>
					<div class="col-sm-8"><input type="password" name="passwordc" placeholder="Password" /></div>
				</div>
				<div class="row wf content">
					<div class="col-sm-3"></div>
					<div class="col-sm-8"><button type="submit">Register</button></div>
				</div>
			</form>
		</div>
		<?php include('footer.php'); ?>
	</div>
	</body>
</html>