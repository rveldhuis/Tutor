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
			<h2>Currently missing features</h2>
			<ul>
				
				<li>Checkout; since students will pay for their tutoring in advance, a payment gateway should be integrated into the system.</li>
				<li>Account; wasn't a high priority in the prototype, but users should be able to change their own address</li>
				<li>Tutor overview per course; if a user has found a course of interest, a more specific course view page should show tutors that are qualified.</li>
				<li>Availability; Tutors should be able to set the hours they're gonna be available at. This should also be implemented as a filtering feature for the course view page which is mentioned in the previous bullet point.</li>
				<li>Advanced appointment making; Students and tutors should be able to discuss a location to meet and which time suits best for them before the appointment is registered.</li>
				<li>Adding courses and course approval; Tutors should be able to add their skills to their accounts. Once these skills are validated, they'll be activated. The tutor will then be shown in the corresponding course.</li>
			</ul>
			
			<h2>Frontend</h2>
			<ul>
				<li>The menu should change based on whether the user is logged in and whether they are a student or a tutor.</li>
				<li>The design is great to hand over to an actual designer since accidental implication of how the design should look are left out, but obviously this version shouldn't ever meet a production environment, ever.</li>
			</ul>
			
			<h2>Framework</h2>
			<ul>
				<li>There's a good seperation in classes, but the actual page HTML is placed in the root. Implementing the current codebase into an existing framework such as Laravel or CodeIgniter would be a good idea.</li>
				<li>File locations are currently static. These should also be changed once integrated into a new framework.</li>
			</ul>
		</div>
		<?php include('footer.php'); ?>
	</div>
	</body>
</html>