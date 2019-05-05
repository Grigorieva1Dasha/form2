<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
<?php
$files = file_get_contents("formfile/all.txt");
$files = explode("\n", $files);
?>
<form action="delete.php" method="POST">
	<?php
	foreach ($files as $file)
	{
		$string = explode("||", trim($file));
		if (!empty($string[0]))
			if (strcasecmp($string[9], "NoDelete") === 0)
				echo "<input type = 'checkbox' name = 'file[]'>". $string[0] . " " . $string[1] . " " . $string[7] . "<br>";	
	}
	?>
	<p><input type="submit" value="Удалить"></p>
</form>
<p><a href="/ls/form">Вернутся к форме</a></p>
</body>
</html>
