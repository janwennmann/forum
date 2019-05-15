<?php
	include 'forum1.php';
	include 'function.php';
	session_start();

	if($_SESSION['mail'] AND $_POST['bez'] AND $_POST['umschreibung'])
	{
		thema_anlegen($_POST['bez'], $_POST['umschreibung'], $_SESSION['benutzername']);
	}
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
			color: #2E2E2E;
			background-color: #A4A4A4;
		}
		.frage .options:hover{
			background-color: #2E2E2E;
			color: #A4A4A4;
			cursor: pointer;
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
		.text
		{
			width: 75%;
			margin: 2%;
			height: 20%;
		}
		<?php if($_SESSION['mail'])
		{
			echo '
			.submit
			{
				width: 15%;
				height: 10%;
				font-size: 100%;
			}
			';
		}
		else
		{
			echo
			'
			.submit
			{
				width: 15%;
				height: 10%;
				font-size: 100%;
				border-style: inset;
				color:  #2E2E2E;
			}
			';
		}
		?>
	</style>
</HEAD>
<BODY>
<FORM ACTION="" METHOD="POST">
<DIV class="frage">
<INPUT TYPE="text" class="text" NAME="bez" placeholder="UEBER WELCHES THEMA MOECHTEST DU SPRECHEN?">
<INPUT TYPE="text" class="text" NAME="umschreibung" placeholder="BESCHREIBE DAS THEMA GENAUER.">
<INPUT TYPE="submit" class="submit" value="erstellen" NAME="submit">
</DIV>
</FORM>
</BODY>
</HTML>
