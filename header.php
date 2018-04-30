<div class="row wf header">
	<div id="menu-icon" class="menu-icon"></div>
	<h3 class="header-text">Tuber prototype.</h3>
</div>
<?php 
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
	if(isset($_SESSION['message']) && $_SESSION['message'] != ""):
?>
<div class="row wf message">
	<span><?php echo $_SESSION['message']; ?></span>
</div>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>
