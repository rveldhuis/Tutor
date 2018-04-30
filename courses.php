<?php
	session_start();
	ob_flush();
	include 'classes/database.php';
	$tutordb = new TutorDB();
	
	$query = isset($_POST['search']) ? $_POST['search'] : "";
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
				<form class="search-courses" role="form" action="courses.php" method="post">
					<div class="search col-sm wf"><input type="text" name="search" value="<?php echo $query; ?>" /></div>
				<button type="submit">Search</button>	
				</form>
			</div>
			<?php foreach($tutordb->getCourses($query) as $course): ?>
				<div class="course">
					<a href="courseview.php?cid=<?php echo $course->getId(); ?>"><img src="<?php echo $course->getImage(); ?>"></a>
					<a href="courseview.php?cid=<?php echo $course->getId(); ?>"><h4><?php echo $course->getName(); ?></h4></a>	
				</div>
			<?php endforeach; ?>
		</div>
		<?php include('footer.php'); ?>
	</div>
	</body>
</html>