


	
	<?= $this->Form->create('Post'); ?>
	
	
	<?= $this->Form->input('title',array('class'=> 'form-control'));?>
	
	
	<?= $this->Form->input('body', array('rows' => '3', 'class'=> 'form-control'));?>
	
	<?php
	if ($this->action == 'edit'){
		echo $this->Form->input('id', array('type' => 'hidden'));
	}
	echo $this->Form->end('save post');
	?>
	<!--
	<div class="form-group">
	// $this->Form->submit('Save Post', array('class'=> 'btn btn-primary'));
	</div>
	-->
	

