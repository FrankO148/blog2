<?php
echo $this->Html->tableCells(array(
		    array($created_post['Post']['id'], 
		    	$this->Html->link($created_post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $created_post['Post']['id'])),
		    	$created_post['Post']['created'],
		    	$this->Html->link('edit',array('controller'=>'posts','action'=>'edit',$created_post['Post']['id'])),
		    	$this->Form->postLink('delete',array('action'=>'delete',$created_post['Post']['id']),array('confirm'=>'Are you sure?'))
		    	)
	));
?>