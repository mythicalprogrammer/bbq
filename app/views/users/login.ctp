<?php $this->pageTitle = "Login"; ?>
<div class="login">
				<?php echo $form->create('User',array('action'=>'login')) . "\n";?>
				<fieldset>
					<?php
					echo $form->input('username');
					echo $form->input('password');
					?>
					<div class="input submit">
						<button type="submit" name="data[User][login]" value="login">Login</button>
					</div>
				</fieldset>
			<?php echo $form->end();?>
			</div>
