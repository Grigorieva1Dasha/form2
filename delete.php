<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
error_reporting(0);
function check($arrayfiles)
{
	$files = file_get_contents("formfile/all.txt");
	$files = explode("\n", $files);
	$i = 0;
	foreach ($arrayfiles as $k)
	{
		foreach ($files as $key => $value)
		{
			$string = explode("||", $value);
			if ($string[7] == $k)
			{
				$string[9] = "YesDelete";
				$files[$key] = implode("||", $string);
				$i++;
				break;
			}
		}
	}
	$files = implode("\n", $files);
	file_put_contents("formfile/all.txt", $files);
	if ($i === count($arrayfiles))
		return true;
	return false;	
}

if(empty($_POST['file']))
{
	echo "Ничего не выбрано";
}
else
{
	$arrayfiles = $_POST['file'];
	$count = count($arrayfiles);
	for ($i=0; $i < $count; $i++)
	{
		str_replace([":", "/"], ["", ""], $arrayfiles[$i]);
		echo $arrayfiles[$i] . "...идёт удаление...\n";
	}
	if(check($arrayfiles))
	{
		echo "<p><b>Файлы удалены.</b></p>";
	}
	else
	{
		echo "<p><b>Некоторые файлы не удалось удалить.</b></p>";
	}
}
?>
<form action="admin.php">
	<p><input type="submit" value="Назад"></p>
</form>
</body>
</html>
