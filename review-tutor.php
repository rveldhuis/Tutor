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
			<?php elseif($_SESSION['usertype'] != 1): ?>
				<div class="row wf">You can only review tutors from a student account.</div>
			<?php else: ?>
				<?php $appointmentsToRate = $tutordb->getAvailableReviewsForStudent($_SESSION['userid']) ?>
				<?php if(count($appointmentsToRate) == 0): ?>
					<div class="row wf">There aren't any appointments available to rate right now.</div>
				<?php else: ?>
					<?php foreach($appointmentsToRate as $appointment): ?>
						<form class="form-review-tutor" role="form" action="actions/review-tutor.php" method="post">
						<div class="row wf">
							<?php $appointment = $appointment->load($appointment->getId()); ?>						
							<h3>Appointment from <?php echo $appointment->getStartTime() ?> with <?php echo $appointment->getTutor()->first_name; ?> <?php echo $appointment->getTutor()->surname; ?></h3>
							<div class="row wf content fw">
								<div class="col-sm-3">Knowledge:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="knowledge">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content fw">
								<div class="col-sm-3">Explanation:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="explanation">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content fw">
								<div class="col-sm-3">Helpfulness:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="helpfulness">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content fw">
								<div class="col-sm-3">Communication:</div>
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
								<div class="col-sm-3">Understandability:</div>
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
								<div class="col-sm-3">General:</div>
								<div class="col-sm-8">
									<select class="rate-select" name="general">
										<option value="none">No rating</option>
										<?php for($i = 1; $i <= 10; $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="row wf content fw">
								<div class="col-sm-3"></div>
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