<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php echo $html->charset(); echo "\n" ?>
	<?php echo $html->css('styles'); echo "\n"  ?>
	<title>Kevin's BBQ Joints</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAA_iwTMO9zYpmDab6qmz5UzRTpJZEScOwrFi7gBYjoJDitheTOshQ6-RQZI3cQSkEikMuau0NH2wDXcg" type="text/javascript"></script> 

</head>

<body>

<div id="container">
	<div id="header-container">
		<div id="header"><?php echo $html->link('Kevin\'s BBQ Joints', '/') ?></div>
	</div>
	
	<div id="nav">
		<ul>
			<li><?php echo $html->link('BBQ Joints', '/joints') ?></li>
			<li><a href="#">BBQ Blogs</a></li>
			<li><a href="#">Meat Joints</a></li>
			<li><a href="#">Rubs & Sauces</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Kevin's Blog</a></li>
		</ul>
	</div>
	
	<div id="joint-search">
		<div id="joint-search-bar"></div>
	</div>
	
	<div id="content-container">
		
		<div id="content-top">
			<h2><?php echo $this->pageTitle; ?></h2>
		</div>

		<div id="content">
			
			<?php
			if ($session->check('Message.flash')) {
				$session->flash();
			}
			?>
			
			<?php echo $content_for_layout; ?>


		</div>
				
		<div id="content-footer"></div>
		
	</div>
	
	<div id="ad-right">Advertisement</div>

	<?php /*
	<div class="promote-box"></div>
	<div class="promote-box"></div>
	<div class="promote-box"></div>
	*/ ?>
	
	<div id="footer">
		<ul id="nav-footer">
			<li><a href="#">BBQ Joints</a></li>
			<li><a href="#">BBQ Blogs</a></li>
			<li><a href="#">Meat Joints</a></li>
			<li><a href="#">Rubs & Sauces</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Kevin's Blog</a></li>
		</ul>
		
		<div id="copyright">
			Copyright © 2009-<?php echo date('Y'); ?> Kevin's BBQ Joints
		</div>
	</div>

</div>

</body>
</html>
