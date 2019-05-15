<?php
	include 'forum1.php';
	include 'function.php';

	if($_POST['username'] AND $_POST['mail'] AND $_POST['passwd1'] AND $_POST['passwd2'])
	{
		if(!(preg_match('/[^a-z_]/', $_POST['username'])) AND strlen($_POST['username']) < 41 AND strlen($_POST['username']) > 3)
		{
			if(preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $_POST['passwd1']) AND $_POST['passwd1'] == $_POST['passwd2'])
			{
				create_acc_aus_query($_POST['username'], $_POST['mail'], $_POST['passwd1']);
				header('location: login.php');
				die;
			}
			else
			{
				echo '<div class="box">PASSWORT MUSS:<br><br>1. UEBEREINSTIMMEN.<br><br>2. MINDESTENS 8 ZEICHEN ENTHALTEN.<br><br>3. EINEN GROSSBUCHSTABEN ENTHALTEN.<br><br>4. EINE ZAHL ENTHALTEN.<br><br>5. EINES DIESER ZEICHEN ENTHALTEN !@#$%^&*- .</div>';
			}
			
		}
		else
		{
			echo '<div class="box">DER USERNAME BESTEHT AUS 4 BIS 40 ZEICHEN ENHAELT AUSSCHLIESSLICH KLEINE BUCHSTABEN UND OPTIONAL UNTERSTRICHE (BSP: "_").</div>';
		}
	}
	else
	{
		if($_POST['registrieren'])
		{
			echo '<div class="box">ALLE FELDER MUESSEN GESETZT SEIN.</div>';
		}
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
		<H2>REGISTRIEREN:</H2>
		<INPUT class="content" TYPE="text" NAME="username" PLACEHOLDER="USERNAME" VALUE="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"><br>
		<INPUT class="content" TYPE="email" NAME="mail" PLACEHOLDER="EMAIL" VALUE="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>"><br>
		<INPUT class="content" TYPE="password" NAME="passwd1" PLACEHOLDER="PASSWORT"><br>
		<INPUT class="content" TYPE="password" NAME="passwd2" PLACEHOLDER="PASSWORT"><br>
		<INPUT id="registrieren"class="content" TYPE="submit" VALUE="REGISTRIEREN" NAME="registrieren">
</DIV>
</FORM>
 </BODY>
</HTML>