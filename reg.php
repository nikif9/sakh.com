<?php 
	require_once 'connect.php';
	$reg1 = "INSERT INTO `person` (`id`, `name`, `password`, `reg_date`, `money`) VALUES ('1', 'nikif', 'qwerty', '2019-03-25', '6000')";
	$reg2 = "INSERT INTO `person` (`id`, `name`, `password`, `reg_date`, `money`) VALUES ('2', 'alesha', 'qwerty', '2019-03-25', '6000')";
	$reg3 = "INSERT INTO `logs` (`id`) VALUES ('1')";
	$reg4 = "INSERT INTO `logs` (`id`) VALUES ('2')";
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link)); 
	mysqli_query($link, $reg1) or die("Ошибка " . mysqli_error($link)); 	
	mysqli_query($link, $reg2) or die("Ошибка " . mysqli_error($link));
	mysqli_query($link, $reg3) or die("Ошибка " . mysqli_error($link)); 	
	mysqli_query($link, $reg4) or die("Ошибка " . mysqli_error($link)); 	 	
	header ('Location: index.php');
 ?>