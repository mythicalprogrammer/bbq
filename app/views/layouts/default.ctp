<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php echo $html->charset() . "\n"; ?>
	<?php echo $html->css('styles') . "\n";  ?>
	<?php echo $javascript->link('jquery-1.4.2.min.js') . "\n"; ?>
	<?php echo $javascript->link('bbq.js') . "\n"; ?>
	<title>Kevin's BBQ Joints - <?php echo strip_tags($this->pageTitle); ?></title>
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
			<?php foreach($pages as $page) {
				echo "<li><a href=\"". $page["Pages"]['slug'] ."\">".$page["Pages"]['title']."</li>\n";
			} ?>
			<li><a href="http://www.kevinsbbqjoints.com/blog">Kevin's Blog</a></li>
			<li><?php echo $html->link('Contact', '/contact') ?></li>
		</ul>
	</div>
	
	<div id="joint-search">
		<div id="joint-search-bar">
			<?php  
			    echo $form->create("Search",array('action' => 'SearchByDistance')); 
			    echo $form->input("q", array('label' => 'Search for', 'value' => 'Street Address, City, State, or Zip'));
			    echo $form->end("Search"); 
			?>
		</div>
	</div>
	
	<div id="content-container">
		
		<div id="content-top">
			<h2><?php echo $this->pageTitle; ?></h2>
		</div>

		<div id="content">
						
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
		<!--- <ul id="nav-footer">
			<li><a href="#">BBQ Joints</a></li>
			<li><a href="#">BBQ Blogs</a></li>
			<li><a href="#">Meat Joints</a></li>
			<li><a href="#">Rubs & Sauces</a></li>
			<li><a href="#">About</a></li>
			<li><a href="http://www.kevinsbbqjoints.com/blog">Kevin's Blog</a></li>
		</ul> --->
		
		<div id="copyright">
			Copyright © 2009-<?php echo date('Y'); ?> Kevin's BBQ Joints
		</div>
	</div>

</div>

</body>
</html>
