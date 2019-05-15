<?php
	$GLOBALS['srv']='localhost';
	$GLOBALS['db']='forum';
	$GLOBALS['usr']='user';
	$GLOBALS['pwd']='asdfg';

	session_start();


	function frage_aus_query($id)
	{	
		$query = "SELECT benutzer.benutzername, thema.id, thema.datum, thema.bez, thema.umschreibung FROM benutzer JOIN thema ON benutzername=benutzername_fid WHERE thema.id = ".$id.";";
		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}

		while($tupel=mysqli_fetch_row($res))
		{
			echo '<DIV class="frage">';
			echo '<a id="info" class="info"> username: '.$tupel[0].'</a>';
			echo '<a id="info" class="id">ID: '.$tupel[1].'</a>';
			echo '<a id="info" class="options">options</a>';
			echo '<h4>'.$tupel[3].'</h4>';
			echo '<h5>'.$tupel[4].'</h5>';
			echo '</DIV>';

		}
		mysqli_close($link);
	}
	function antwort_aus_query($id)
	{	
		$query = "SELECT beitrag.benutzer_fid, beitrag.id, beitrag.datum, beitrag.inhalt FROM beitrag WHERE thema_fid = ".$id.";";
		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}

		while($tupel=mysqli_fetch_row($res))
		{
			echo '<DIV class="antwort">';
			echo '<a id="info" class="info"> username: '.$tupel[0].'</a>';
			echo '<a id="info" class="id">ID: '.$tupel[1].'</a>';
			echo '<a id="info" class="timestamp">'.$tupel[2].'</a><br>-';
			echo '<a>'.$tupel[3].'</a>';
			echo '</DIV>';
		}
		mysqli_close($link);
	}
	function inhalt_aus_query($username, $thema, $inhalt)
	{	
		$query = 'INSERT INTO beitrag(benutzer_fid, thema_fid, inhalt) VALUES ("'.$username.'", '.$thema.', "'.$inhalt.'");';
		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}
		mysqli_close($link);
	}
	function login_aus_query($mail, $passwd)
	{	
		$query = 'SELECT passwd FROM benutzer WHERE mail = "'.$mail.'";';
		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}
		$tupel = mysqli_fetch_row($res);

		if($tupel[0] == $passwd)
		{
			$query = 'SELECT benutzername, mail FROM benutzer WHERE mail = "'.$mail.'";';
			if(!$res=@mysqli_query($link, $query))
			{
				echo "<br>Fehler in der Query.<br> die Query war:".$query;
				exit;
			}
			$tupel=mysqli_fetch_row($res);
			$_SESSION['benutzername'] = $tupel[0];
			$_SESSION['mail'] = $tupel[1];
			mysqli_close();
			return 1;
		}
		else
		{
			mysqli_close();
			session_destroy();
		}
	}
	function create_acc_aus_query($username, $mail, $passwd)
	{
		$query='INSERT INTO benutzer VALUES ("'.$username.'", "'.$mail.'", "'.$passwd.'", 1);';


		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}
		mysqli_close($link);
	}
	function get_my_questions_aus_query($username)
	{
		$query='SELECT benutzer.benutzername, thema.id, thema.datum, thema.bez, thema.umschreibung FROM benutzer JOIN thema ON benutzername=benutzername_fid WHERE thema.benutzername_fid = "'.$username.'" ORDER BY thema.datum DESC LIMIT 10;';

		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}

		while($tupel=mysqli_fetch_row($res))
		{
			echo '<DIV name="div" class="frage" name ="ansehen" onclick="location.href='."'beitrag.php?id=".$tupel[1]."'".';">';
			echo '<a id="info" class="info"> username: '.$tupel[0].'</a>';
			echo '<a id="info" name="id" value="'.$tupel[1].'" class="id">ID: '.$tupel[1].'</a>';
			echo '<a id="info" class="options">'.$tupel[2].'</a>';
			echo '<h4>'.$tupel[3].'</h4>';
			echo '<h5>'.$tupel[4].'</h5>';
			echo '</DIV>';
			$_POST['id']=$tupel[1];
		}
		mysqli_close($link);
	}

	function get_questions_aus_query()
	{
		$query='SELECT benutzername_fid, id, datum, bez, umschreibung FROM thema ORDER BY datum DESC LIMIT 10;';

		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}
		while($tupel=mysqli_fetch_row($res))
		{
			echo '<DIV name="div" class="frage" name ="ansehen" onclick="location.href='."'beitrag.php?id=".$tupel[1]."'".';">';
			echo '<a id="info" class="info"> username: '.$tupel[0].'</a>';
			echo '<a id="info" name="id" value="'.$tupel[1].'" class="id">ID: '.$tupel[1].'</a>';
			echo '<a id="info" class="options">'.$tupel[2].'</a>';
			echo '<h4>'.$tupel[3].'</h4>';
			echo '<h5>'.$tupel[4].'</h5>';
			echo '</DIV>';
			$_POST['id']=$tupel[1];
		}
		mysqli_close($link);
	}
	function thema_anlegen($bez, $umschreibung, $benutzername)
	{
		$query='INSERT INTO thema(bez, umschreibung, benutzername_fid) VALUES ("'.$bez.'", "'.$umschreibung.'", "'.$benutzername.'");';

		if(!$link=@mysqli_connect($GLOBALS['srv'], $GLOBALS['usr'], $GLOBALS['pwd'], $GLOBALS['db']))
		{
			die("Verbindung gescheitert; Fehler: <br>die Query war:".mysqli_connect_errno());
		}
		if(!$res=@mysqli_query($link, $query))
		{
			echo "<br>Fehler in der Query.<br> die Query war:".$query;
			exit;
		}
	}
?>
