<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<style type="text/css">
			.btn{
				padding: 15px;
				border-radius: 4px;
				box-shadow: 1px 1px 5px #cfcfcf;
				border: 1px solid #cfcfcf;
			}
			a:link{
				color:black;
				text-decoration: none;
			}
			a:active{
				color:black;
				text-decoration: none;
			}
			a:visited{
				color:black;
				text-decoration: none;
			}
		</style>
		<h3>Բարև ձեզ {{$user->first_name." ".$user->last_name}}</h3>
			<p>Խնդրում ենք հաստատեք ձեր ել հասցեն</p>
		<a class='btn' href="{{URL::action('UsersController@confirmUser' , $user->email_confirmation_code)}}">հաստատել</a><br><hr>
		<p>test mail...</p>
	</body>
</html>