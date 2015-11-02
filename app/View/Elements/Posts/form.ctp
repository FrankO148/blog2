


	<div class="form-group">
	<?= $this->Form->create('Post'); ?>
	</div>
	<div class="form-group">
	<?= $this->Form->input('title',array('class'=> 'form-control'));?>
	</div>
	<div class="form-group">
	<?= $this->Form->input('body', array('rows' => '3', 'class'=> 'form-control'));?>
	</div>
	<?php
	if ($this->action == 'edit'){
		echo $this->Form->input('id', array('type' => 'hidden'));
	}
	?>
	<div class="form-group">
	<?= $this->Form->submit('Save Post', array('class'=> 'btn btn-primary'));?>
	</div>
	<?= $this->Form->end();?>

