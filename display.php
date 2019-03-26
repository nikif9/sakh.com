<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>test</title>
	    <link href="css/bootstrap.css" rel="stylesheet">
	    <link rel="stylesheet" href="css/menu.css">
  	</head>
	<body>
		<div class="container">
		    <div class="page-header">
		    	<form action="display.php" role="form" method="post">
		    		<button class="btn" name="button" value="true" required>quit</button>
		    	</form>
		    	<h1>
		    		<?php 
		    			require_once 'connect.php';
		    			session_start();
		    			echo "вы залогинины как: ".$_SESSION['name']." ";
		    			if (!empty($_POST["button"])) {
			    				$_SESSION = array();
			    				header ('Location: index.php');
		    				}	
		    		?>	
		    	</h1>
		    </div>
		    <?php 
		    	echo "<p class=lead>количество валюты ".$_SESSION['money']."</p>";
		    ?>	
		    <form action="trade.php" role="form" method="post">
		    		 <input type="text" class="form-control" placeholder="имя" name="name" required >
		    		 <input type="number" class="form-control" placeholder="количество" name="sum" required >
		    		 <button class="btn btn-lg btn-primary" type="submit">Отправить</button>
		    </form>
		    <?php 
		    	$id = $_SESSION['id'];
		    	$link = mysqli_connect($host, $user, $password, $database) 
					or die("Ошибка " . mysqli_error($link)); 
				$log_query = "SELECT * FROM logs WHERE id ='$id'";
				$log_result = mysqli_query($link, $log_query) or die("Ошибка " . mysqli_error($link)); 
				$log = mysqli_fetch_array($log_result);
				echo "log: ".$log['logs'];
		     ?>
		</div>
		<div id="footer">
		    <div class="container">
		    	<p class="text-muted">Place sticky footer content here.</p>
			</div>
	    </div>
		
	</body>
</html>