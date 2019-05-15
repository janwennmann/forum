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
			cursor: pointer;
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
		.frage .ansehen{
			padding: 2%;
			margin-top: -2%;
			float: right;
			color: #2E2E2E;
			background-color: #A4A4A4;
		}
		.frage .ansehen:hover{
			background-color: #2E2E2E;
			color: #A4A4A4;
			cursor: pointer;
		}
	</style>
</HEAD>
<BODY>
<FORM ACTION="" METHOD="POST">
<?php
	get_questions_aus_query();
?>
</FORM>
</BODY>
</HTML>