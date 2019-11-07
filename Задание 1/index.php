<?php require_once "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

	$mysqli = new mysqli($host,$user,$pass,$dbname);

	if (!$mysqli->query('SELECT * FROM users LIMIT 1')) {
		$query = 'CREATE Table users (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Name VARCHAR(255) NOT NULL,
		Age INT NOT NULL,
		Phone VARCHAR(255) NOT NULL,
		Email VARCHAR(255) NOT NULL,
		Status INT NOT NULL)';

		if ($mysqli->query($query))
		{
			echo "Таблица создана</br>";
		}
		else echo $mysqli->error;
	}
	$value = 1;
	$value2 = "9999999999";

	$result = $mysqli->query ("SELECT * FROM users WHERE `Status`=".$value." AND `Phone`=".$value2.""); //запрос на поиск по полям Статус и Телефон
	echo "поиск по полям Статус и Телефон Число строк ".$mysqli->affected_rows."</br>";

	$value = 33;
	$result = $mysqli->query ("SELECT * FROM users WHERE `Age`=".$value); //запрос на поиск по полю Возраст
	echo "поиск по пол Возраст Число строк ".$mysqli->affected_rows."</br>";

	$value = "email@email.com";
	$value2 = "9999999999";
	$result = $mysqli->query ("SELECT * FROM users WHERE `Email`=".$value." AND `Phone`=".$value2.""); //запрос на поиск по полям Email и Телефон
	echo "поиск по полям Email и Телефон Число строк ".$mysqli->affected_rows."</br>";

	$result = $mysqli->query ("SELECT * FROM users ORDER BY `Name`"); //поиск всех записей с сортировкой по полю Name

	while ($data=$result->fetch_array()) {
		echo $data['Name']."</br>";
	}

	$mysqli->close();
?>