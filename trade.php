<?php 
	require_once 'display.php';
	$name = $_POST['name'];
	$name = stripslashes($name;
    $name = htmlspecialchars($name);
    $name = trim($name);
	$money = $_POST['sum'];
	$query = "SELECT * FROM person WHERE name ='$name'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	$myrow = mysqli_fetch_array($result);
	$balance = $_SESSION['money'] - $money ;
	if (!empty($myrow['name']) && $myrow['id'] != $id){
		if ($balance >= 0 && $money > 0) {
			$logs = $log['logs']."".date('Y-m-d G-i-s').": вы успешно передали ".$money." валюты этому человеку ".$name."<br/>";
			$money += $myrow['money'];
			mysqli_query($link, "UPDATE person SET money = '$money' WHERE name = '$name'");
			mysqli_query($link, "UPDATE person SET money = '$balance' WHERE id = '$id'");
			mysqli_query($link, "UPDATE logs SET logs = '$logs' WHERE id = '$id'");
			$_SESSION['money'] = $balance;
			header ('Location: display.php');

		} else{
			$logs = $log['logs']."".date('Y-m-d G-i-s')."недостаточно средств<br/>";
			mysqli_query($link, "UPDATE logs SET logs = '$logs' WHERE id = '$id'");
			header ('Location: display.php');
		}
	}else{
		$logs = $log['logs']."".date('Y-m-d G-i-s')."неправильное имя<br/>";
			mysqli_query($link, "UPDATE logs SET logs = '$logs' WHERE id = '$id'");
		header ('Location: display.php');
	}
	
 ?>	