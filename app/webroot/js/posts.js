$(document).ready(function(){
	$('#PostIndexForm').find('input[type=submit]').on('submit',function(event){
		event.preventDefault;
		$.ajax(
		{
			async:true,
		 	data:$("#PostIndexForm").serialize(),
		  	dataType:"html",
		  	success:function (data, textStatus) {
		  		add_new_row(data);
		  	},
		  	type:"POST",
		  	url:"/posts/add"
		}); 

		$('#myPostModal').modal('hide');

		//return false;
		
	});

});

var add_new_row = function(data){
	console.log("esto funciona");
	$('#postsTable').append('<tr><td>'+ data.id +'</td><td>'+ data.title +'</td><td>'+ data.created +'</td><td>asads</td><td>asdas</td></tr>');
};

var send_post_request = function(){

	$('#PostIndexForm').submit(function( event ) {
  		console.log( $( this ).serializeArray() );
  		event.preventDefault();
	});
	


	
	$.ajax(
		{
			async:true,
		 	data:$("#PostIndexForm").serialize(),
		  	dataType:"html",
		  	success:function (data, textStatus) {
		  		$("#postsTable").html(data);
		  	},
		  	type:"POST",
		  	url:""
		}); 		
}


