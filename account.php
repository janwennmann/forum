<?php
	include 'forum1.php';
	session_start();

	if(!$_SESSION['mail'])
	{
		header('location: login.php');
		die;
	}
?>
<HTML>
<HEAD>
<STYLE>
	body
	{ 
		background-color: #848484;
	}
	.account_div
	{
		background-color: #424242;
		padding: 5%;
		color: #BDBDBD;
		margin: 2%;
		margin-top: 5%;
		line-height: 4em;
	}
	.account .h4
	{
		border-bottom:  5px solid red;
	}
</STYLE>
</HEAD>
<BODY>
<FORM ACTION="" METHOD="POST">
<DIV class="account_div">
	<H4 class="h4">MEIN PROFIL</H4>
	<A>Benutzername: <?php echo $_SESSION['benutzername']; ?></A><br>
	<A>Email-Adresse: <?php echo $_SESSION['mail']; ?></A>
</DIV>	
</FORM>
</BODY>
</HTML>