<?php 
$this->pageTitle = "Contact Us";
?>

			<p>Suggestions for a BBQ Joint to be listed? Corrections on an existing BBQ Joint? Or even just to say hello, we read and appreciate all feedback.</p>
			<p class="note">All fields are required.</p>

<?php if (isset($success)) { ?>
    <p><?= $success?></p>
<?php } else {
	if (isset($error)) { ?>
		<p class="error"><?= $error?></p>
	<? } ?>
			<?php echo $form->create(null,array('action' => 'contact', 'enctype' => 'multipart/form-data')); ?>

			<div class="contactField">
				<?php echo $form->label('Page.name','Name',null); ?>
				
				<?php echo $form->text('Page.name', array('size' => '30'))?>
				
			</div>
			<div class="contactField">
				<?php echo $form->label('Page.email','E-mail',null); ?>
				
				<?php echo $form->text('Page.email', array('size' => '30'))?>
			
			</div>
			<div class="contactField">
				<?php echo $form->label('Page.message','Message',null); ?>
				
				<?php echo $form->textarea('Page.message', array('cols' => '80', 'rows' => '10'))?>
				
			</div>

			<?php echo $form->submit('Send')?>

			<?php echo $form->end();?>
<?php }?>