<?php
	session_start();
?>
<HTML>
<HEAD>
<STYLE>
	.topnav{
		background-color: #333;
		overflow: hidden;
		align-content: center;
	}
	.topnav a {
		float:left;
		color: #f2f2f2;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
	}
	.topnav a:hover{
		background-color: #6E6E6E;
		color: black;
	}
	.topnav a.active{
		background-color: #4CAF50;
		color: white;
	}
	.topnav a.active:hover{
		background-color: #088A08;
		color: #2E2E2E;
	}
	.topnav a.login{
		background-color: #0B4C5F;
	}
	.topnav a.login:hover{
		background-color: #084B8A;
		color: #2E2E2E;
	}
	.topnav a.logout{
		background-color: #610B0B;
	}
	.topnav a.logout:hover{
		background-color: #B40404;
	}
</STYLE>
</HEAD>
<BODY>
<DIV class="topnav">
	<a class="active" href="index.php">HOME</a>
	<a href="account.php">MEIN PROFIL</a>
	<a href="my_questions.php">MEINE FRAGEN</a>
	<a href="new_beitrag.php">NEUE FRAGE</a>
	<a href="#genre">GENRE</a>
	<a href="#suche">SUCHE</a>
	<?php
		if($_SESSION['mail'])
		{
			echo '<a class="logout" href="logout.php">LOGOUT</a>';
		}
		else
		{
			echo'<a class="login" href="login.php">LOGIN</a>';
		}
	?>
</DIV>
</BODY>
</HTML>