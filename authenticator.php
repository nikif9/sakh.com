<?php 
	require_once 'connect.php';
	require_once 'index.php';
 	$login = $_POST['login'];
 	$login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
	$pass = $_POST['password'];
	$pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);
    $password = trim($password);
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link)); 
	$query = "SELECT * FROM person WHERE name ='$login'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	$myrow = mysqli_fetch_array($result);
	if (!empty($myrow['password']))
    {
    	if ($myrow['password'] == $pass) {
	    	$_SESSION['name'] = $myrow['name']; 
	    	$_SESSION['id'] = $myrow['id'];
	    	$_SESSION['money'] = $myrow['money'];
	    	$_SESSION['remember'] = $_POST['remember-me'];
	    	header ('Location: display.php');
	    } else{echo "<div class=form-signin>неверный пароль</div>";}} else {echo "<div class=form-signin>неверный логин</div>" ;}
 ?>