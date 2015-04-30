// JavaScript Document

$('#username').keyup(function()
{
	var username = $('#username').val();
	$('#userstatus').html('<img src="images/username_loader.gif">');
	
	if(username !='')
	{
		$.post('core/check-user.php',{postusername:username},
		function(data)
		{
			$('#userstatus').html(data)
		});
	}
	else
	{
		$('#userstatus').html('');
	}
});

$('#password').keyup(function()
{
	$('#passstatus').html("<img src='images/greentick.jpg'>");
});

$('#password1').keyup(function()
{
	var password = $('#password').val();
	var password2 = $('#password1').val();
	
	if(password==password2)
	{
		$('#pass1status').html("<img src='images/greentick.jpg'>");
	}
	
	if(password!=password2)
	{
		$('#pass1status').html("<img src='images/redcross.jpg'>");
	}
});