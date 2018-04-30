<?php
	session_start();
	ob_flush();
	include 'classes/database.php';
	$tutordb = new TutorDB();
	
	$courseid = isset($_GET['cid']) && is_int((int) $_GET['cid']) ? (int) $_GET['cid'] : 1;
	$sql = "SELECT * FROM tb_courses WHERE id = $courseid";
	$course = $tutordb->query($sql)->fetch_object("Course");
?>
<!DOCTYPE html>
<html>
	<?php include('head.php'); ?>
	<body>
	<div class="container">
		<?php include('menu.php'); ?>
		<?php include('header.php'); ?>
		<div class="row wf content">
			<div class="col-sm-12 wf">
				<div class="col-sm-12 wf"><img class="courseview-image" src="<?php echo $course->getImage(); ?>" /></div>
				<h3><?php echo $course->getName(); ?></h3>
				<div><?php echo $course->getDescription(); ?></div>
			</div>
			<div class="col-sm-12 wf">
				<h3>Available tutors</h3>
				<?php foreach($tutordb->getTutorsForCourse($courseid) as $tutor): ?>
					<div class="courseview-tutor wf">
						<h5><?php echo $tutor->getFirstName(); ?> <?php echo $tutor->getSurname(); ?></h5>
						<div class="col-md-7">
							<?php $tutorRatings = $tutordb->getRatingsForUser($tutor->getId()); ?>
							<?php if(count($tutorRatings) == 0): ?>
								<div><b>This tutor hasn't been rated yet.</b></div>
							<?php else: ?>
								<div><b>Ratings:</b> </div>
								<?php foreach($tutorRatings as $rating): ?>
									<div><?php echo $rating['type']; ?>: <?php echo $rating['average']; ?>/10</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<div class="col-md-4">
							<form class="form-tutor-appointment" role="form" action="actions/make-appointment.php" method="post">
								<span>From:</span>
								<input name="from" type="datetime-local" />
								<span>To:</span>
								<input name="to" type="datetime-local" />
								<button type="submit">Make appointment</button>
								<input type="hidden" name="tutor" value="<?php echo $tutor->getId(); ?>" />
							</form>
						</div>	
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	</body>
</html>