$(document).ready(function(){
 function sendAjaxRequest(action, data, callback){
 	$.ajax({
 		url:'handler.php',
 		type:'POST',
 		data:{action:action,...data},
 		dataType:'json',
 		success:callback,
 		error:function(error){
 			console.log('Error',error)
 		}
 	})
 }

$('.deletebutton').click(function(){
	var id=$(this).data('id');
	
	if(confirm('Are you sure you want to delete this record?')){
		sendAjaxRequest('delete',{id:id},function(response){
			if(response.success){
				alert('Record deleted successully!');
				location.reload();
			}else{
				alert('Failed to delete record!');
			}
		})
	}
})


$('form[id^="editForm"]').submit(function(e){
  e.preventDefault();
  var formId=$(this).attr('id');
  var formData={};

  var listAll= $(this).serializeArray();
	 listAll.forEach(function(field){
	 	formData[field.name]=field.value;
	 })
	
 sendAjaxRequest('update',formData,function(response){
 	if(response.success){
 		alert("Record updated successully");
 		location.reload();
 	}else{
 		alert(response.message);
 	}
 });
})


$('form[id^="passwordForm"]').submit(function(e){
  e.preventDefault();
  var formId=$(this).attr('id');
  var formData={};

  var listAll= $(this).serializeArray();
	 listAll.forEach(function(field){
	 	formData[field.name]=field.value;
	 })
	
	if(formData['password'].length<6){
		alert("The password must be at least 6 characters long.");
		return false;
	}

	if(formData['password'] != formData['cpassword']){
		alert("The password and confirmation password do not match.");
		return false;
	}

 sendAjaxRequest('change_password',formData,function(response){
 	if(response.success){
 		alert("Password changed successully");
 		location.reload();
 	}else{
 		alert("Failed to update Password");
 	}
 });
})


$("#addForm").submit(function(e){
  e.preventDefault();

  var listAll= $(this).serializeArray();
  var formData={};
	 listAll.forEach(function(field){
	 	formData[field.name]=field.value;
	 })


 sendAjaxRequest('add',formData,function(response){
 	if(response.success){
 		alert("Record added successully");
 		location.reload();
 	}else{
 	 alert(response.message);
 	}
 });

});

 function fetchReords(){
   sendAjaxRequest('get',{},function(response){
   	console.log(response);
   })
 }


fetchReords();

})