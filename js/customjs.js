$(function() {
 // $("button#btn_login").click(function() {
	var username = $("#username").val();
	alert(username);
	if (username == "") {
	   $('.errormess').html('Please Insert Your Username');	
       return false;
    }
	var password = $("#password").val();
	if (password == "") {
	   $('.errormess').html('Please Insert Your Password');	
       return false;
    }
	var dataString = 'username='+ username + 'password=' + password;
	alert(dataString);
/*ajax({
      type: "POST",
      url: 'loginprocess.php',
      data: dataString,
	  dataType: "html",
      success: function(data) {
	  if (data == 0) {
	  $('.errormess').html('Wrong Login Data');
		} else {
			$('.errormess').html('<b style="color:green;">you are logged. wait for redirection</b>');	
			document.location.href = 'about.html';	
		}
      }
     });
    return false;
	});*/
});