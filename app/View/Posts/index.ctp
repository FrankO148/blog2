<h1>Blog posts</h1>
<table class="table" id="postsTable">
	<?php
		echo $this->Html->tableHeaders(array('Id', 'Title', 'Created','','')); 
	?>
	
<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($posts as $post): ?>
	<?php
		echo $this->Html->tableCells(array(
		    array($post['Post']['id'], 
		    	$this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])),
		    	$post['Post']['created'],
		    	$this->Html->link('edit',array('controller'=>'posts','action'=>'edit',$post['Post']['id'])),
		    	$this->Form->postLink('delete',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'Are you sure?'))
		    	),
		));
	?>
	
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myPostModal">
  Add Post
</button>

<?php /* echo $this->Html->link(
'Add Post',
array('controller' => 'posts', 'action' => 'add')
); */

echo $this->element('Modals/new_post_modal');

$postAddUrl = Router::url(array('controller' => 'posts', 'action' => 'add'));

$postViewUrl = Router::url(array('controller' => 'posts', 'action' => 'view'));


$scriptJS = $this->Html->scriptBlock(
<<<JS
	$(document).ready(function(){
		$('#PostIndexForm').on('submit',function(event){
			event.preventDefault();
			$.ajax(
			{
				async:true,
			 	data:$('#PostIndexForm').serialize(),
			  	dataType:'html',
			  	success:function (data, textStatus) {
			  		add_new_row(data);
			  	},
			  	type:'POST',
			  	url:"$postAddUrl"
			  }); 

			$('#myPostModal').modal('hide');

			//return false;
			
		});

	});

	var add_new_row = function(data){
		console.log(data);
		$('#postsTable').append('<tr><td>'+ data.Post['id'] +'</td><td>'+ data.Post.title +'</td><td>'+ data.Post.created +'</td><td>asads</td><td>asdas</td></tr>');
	};
JS
);
?>
<?=$scriptJS?>
