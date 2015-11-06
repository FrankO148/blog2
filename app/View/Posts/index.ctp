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

$postEditUrl = Router::url(array('controller' => 'posts', 'action' => 'edit'));

$postDeleteUrl = Router::url(array('controller' => 'posts', 'action' => 'delete'));


$scriptJS = $this->Html->scriptBlock(
<<<JS
	$(document).ready(function(){
		$('#PostIndexForm').on('submit',function(event){
			event.preventDefault();
			var title = $('#PostIndexForm').find('input[type=text]').val();
			var content = $('#PostIndexForm').find('textarea').val();
			var post = { Post: { title: title, body:content }}
			console.log(post);
			$.ajax(
			{
				async:true,
				contentType: "application/json",
			 	data:JSON.stringify(post),
			  	dataType:'html',
			  	success:function (data, textStatus) {
			  		add_new_row(data);
			  	},
			  	type:'POST',
			  	url:"$postAddUrl.json"
			  }); 

			$('#myPostModal').modal('hide');

			//return false;
			
		});

	});

	var add_new_row = function(data){
		response = JSON.parse(data);
		$('#postsTable').append('<tr><td>'+ response.Post.id +'</td><td>'+ '<a href="$postViewUrl/' + response.Post.id + '">' + response.Post.title + '</a>' +'</td><td>'+ response.Post.created +'</td><td><a href="$postEditUrl/'+ response.Post.id +'">edit</a></td><td></td></tr>');
	};

	var add_delete_link = function(id_post ){
		var post_name = 'post_' + id_post; 
		console.log(post_name);
		return '<form action="$postDeleteUrl/ '+ id_post +'" name="' + post_name +'" id="' + post_name + '" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form><a href="#" onclick="if (confirm(&quot;Are you sure?&quot;)) { $('#' + post_name).submit(); } event.returnValue = false; return false;">delete</a>'
	}
JS
);
?>
<?=$scriptJS?>
