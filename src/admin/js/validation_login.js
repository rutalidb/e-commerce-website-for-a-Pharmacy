$(document).ready(function(){
	$('#login').submit(function(){

	
	//prevent form from submitting
	event.preventDefault();
	
	$('#emailspan').hide();
	$('#passwordspan').hide();
	
	//name validation
	var passwords = $('#pwd_login').val()
	var email = $('#email_login').val()
	var email_flag = false;
	var password_flag = false;
	
	//password validation
	if(passwords == ''){
		$('#passwordspan').text("Password is required");
		$('#passwordspan').addClass("error");
		$('#passwordspan').show();
		password_flag = false;
	}
	
	else if(passwords != ''){
		$('#passwordspan').removeClass("error");
		$('#passwordspan').hide();
		password_flag = true;
	}
	
	//email validation
	if(email == ''){
		$('#emailspan').text("Email is required");
		$('#emailspan').addClass("error");
		$('#emailspan').show();
		email_flag = false;
	}
	else if(email != ''){
		$('#emailspan').removeClass("error");
		$('#emailspan').hide();
		email_flag = true;
	}
	
	if(password_flag && email_flag) {
	//setup variables
	var form = $(this),
	formData = form.serialize(),
	formUrl = "login.php",
	formMethod = form.attr('method')

	//send data to server
	$.ajax({
		url: formUrl,
		type: formMethod,
		data: formData,
		success:function(data){
				if(data === "success"){
					window.location.href="shop.php";
				}
				else alert(data);
			}
		});
		
	$('#login')[0].reset();
	//closeForm();
	}
	
	return false;
	
	})
})