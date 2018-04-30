<?php
	session_start();
	ob_flush();
	include 'classes/database.php';
	$tutordb = new TutorDB();
?>
<!DOCTYPE html>
<html>
	<?php include('head.php'); ?>
	<body>
	<div class="container">
		<?php include('menu.php'); ?>
		<?php include('header.php'); ?>
		<div class="wf content">
			<?php if(!isset($_SESSION['userid'])): ?>
				<div class="row wf">You must be logged in to view this page.</div>
			<?php elseif($_SESSION['usertype'] != 2): ?>
				<div class="row wf">You can only review students from a tutor account.</div>
			<?php else: ?>
				<?php $appointmentsToRate = $tutordb->getAvailableReviewsForTutor($_SESSION['userid']) ?>
				<?php if(count($appointmentsToRate) == 0): ?>
					<div class="row wf">There aren't any appointments available to rate right now.</div>
				<?php else: ?>
					<?php foreach($appointmentsToRate as $appointment): ?>
						<form class="form-review-student" role="form" action="actions/review-student.php" method="post">
						<div class="row wf">
							<?php $appointment = $appointment->load($appointment->getId()); ?>						
							<h3>Appointment from <?php echo $appointment->getStartTime() ?> with <?php echo $appointment->getStudent()->first_name; ?> <?php echo $appointment->getStudent()->surname; ?></h3>
							<div class="row wf content fw">
								<div class="col-sm-3">>listening:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="listening">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content"">
								<div class="col-sm-3">execution:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="execution">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content fw">
								<div class="col-sm-3">>communication:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="communication">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content fw">
								<div class="col-sm-3">>understandability:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="understandability">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content fw">
								<div class="col-sm-3">></div>
								<div class="col-sm-8"><button type="submit">Submit rating</button></div>
							</div>
						</div>
						<input type="hidden" name="appointment" value="<?php echo $appointment->getId(); ?>" />
						</form>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endif; ?>			
		</div>
		<?php include('footer.php'); ?>
	</div>
	</body>
</html>