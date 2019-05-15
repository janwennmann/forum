<?php
	include 'function.php';
	include 'forum1.php';
	session_start();

	if($_POST['login'])
	{
		login_aus_query($_POST['mail'], $_POST['passwd']);
	}
	
	if($_SESSION['mail'])
	{
		unset($_POST['mail']);
		unset($_POST['passwd']);
		unset($check);
		header('location: account.php');
		die();
	}
?>
<HTML>
<HEAD>
<STYLE>
	body
	{
		background-color: #848484;
		align-items: center;
		color: black;
	}
	.box
	{
		background-color: #424242;
		border-radius: 5px;
		color: #BDBDBD;
		margin: 20% auto;
		width: 50%;
		padding-top: 5%;
		padding-bottom: 5%;
	}
	.box .content
	{
		margin-bottom: 10%;
		border-style: outset;
		border-color: #0B4C5F;
		background-color: #A4A4A4;
		color: #424242;
		width: 50%;
		height: 5%;
		font-size: 120%;
	}
	.box .content#registrieren
	{
		background-color: #088A08;
		color: #2E2E2E;
	}
</STYLE>
</HEAD>
<BODY>
<FORM ACTION="" METHOD="POST">
<DIV class="box" align="center">
		<H2>LOGIN:</H2>
		<INPUT class="content" TYPE="email" NAME="mail" PLACEHOLDER="EMAIL" VALUE="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>"><br>
		<INPUT class="content" TYPE="password" NAME="passwd" PLACEHOLDER="PASSWORT"><br>
		<INPUT name="login"class ="content" TYPE="submit" VALUE="EINLOGGEN">
		<INPUT id="registrieren"class="content" TYPE="submit" VALUE="REGISTRIEREN" NAME="registrieren">
</DIV>
</FORM>
 </BODY>
</HTML>
<?php
	if(isset($_POST['registrieren']))
	{
		header('location: create_account.php');
	}
?>
