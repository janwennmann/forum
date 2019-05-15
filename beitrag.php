<?php
	include 'forum1.php';
	include 'function.php';
	if($_POST['inhalt']!=NULL AND $_POST['inhalt'] != $inhalt_alt AND $_SESSION['mail'])
	{
		inhalt_aus_query($_SESSION['benutzername'], $_SESSION['id'], $_POST['inhalt']);
	}

	session_start();
	$_SESSION['id'] = $_GET['id'];
	$img='<img src="erd.png">';
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
		.img
		{
			width: 80%;
		}
	</style>
</HEAD>
<BODY>
<FORM ACTION="" METHOD="POST">
<?php
	frage_aus_query($_SESSION['id']);
	antwort_aus_query($_SESSION['id']);
	if($_SESSION['id'] == 7) echo '<div class="frage"><h1>Mein ERD</h1><img class="img" src="erd.png"></div>';
?>
<INPUT TYPE="text" class="text" NAME="inhalt" placeholder="HIER IST PLATZ FUER DEINEN KOMMENTAR...">
<INPUT TYPE="submit" class="submit" value="antworten" NAME="submit">
</FORM>
</BODY>
</HTML>
<?php
	$inhalt_alt = $_POST['inhalt'];
?>
