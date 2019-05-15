<?php
	include 'forum1.php';
	include 'function.php';

	session_start();
?>
<HTML>
<HEAD>
	<style type="text/css">
		body{ 
			background-color: #848484;
		}
		.frage{
			background-color: #424242;
			padding: 5%;
			color: #BDBDBD;
			margin: 2%;
			margin-top: 5%;
		}
		.frage .options{
			padding: 2%;
			margin-top: -2%;
			float: right;
		}
		.frage .id{
			margin-left: 20%;
		}
		.antwort{
			background-color: #A4A4A4;
			color: #424242;
			margin: 2%;
			margin-top: 5%;
			padding: 5%;
		}
		.antwort .timestamp{
			float: right;
		}
		.antwort .id{
			margin-left: 20%;
		}
		.antwort a{
			line-height: 4em;
		}
	</style>
</HEAD>
<BODY>
<FORM ACTION="" METHOD="POST">
<?php
	if($_SESSION['benutzername'])
	{
		get_my_questions_aus_query($_SESSION['benutzername']);
	}
	else
	{
		header('location: login.php');
	}
?>
</FORM>
</BODY>
</HTML>