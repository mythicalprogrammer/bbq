<h3>Add Joint</h3>
<?php
echo $form->create('Joint');
echo $form->input('name');
echo $form->input('address');
echo $form->input('address2');
echo $form->input('city');
echo $form->input('state');
echo $form->input('zip');
echo $form->input('country');
echo $form->input('phone');
echo $form->input('url');
echo $form->end('Save Post');
?>