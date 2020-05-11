<!DOCTYPE html>
 <head> 	
  <meta charset="utf-8">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <title>Добавление сотрудников</title>  
 </head>
 <body>
 	<?php if($_SERVER['REQUEST_METHOD'] == "GET"){?> 	
 	<h1>Заполните данные сотрудника</h1>
  <div class="col-md-5">
  	<form method="POST">	  
	  <div class="form-group">
	    <label for="last-name">Фамилия</label>	    
	    <input class="form-control" type="text" id="last-name" name="last-name" required="">
	  </div>
	  <div class="form-group">
	    <label for="first-name">Имя</label>	    
	    <input class="form-control" type="text" id="first-name" name="first-name" required="">
	  </div>
	  <div class="form-group">
	    <label for="patronymic">Отчество</label>	    
	    <input class="form-control" type="text" id="patronymic" name="patronymic" required="">
	  </div>	  
	  <div class="form-group">
	    <label for="email">Email</label>
	    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email должен соответствовать шаблону email@bnb.by" name="email" required="">	    
	  </div>
	  <div class="form-group">
	    <label for="room">Помещение</label>	    
	    <input class="form-control" type="number" id="room" name="room" required="">
	  </div>  
	  <div class="form-group">
	    <label for="phone">Телефон</label>	    
	    <input class="form-control" type="tel" id="phone" placeholder="Несколько номеров добавляйте через запятую" name="phone" required="">
	  </div>
	  <button type="submit" class="btn btn-primary">Внести в базу</button>
	</form>
  </div>
  <?php } else {
  		require("employeehandler.php");
  		$handlerObj = EmployeeHandler::getInstance();
		$handlerObj->addEmployee($_POST);  		 		
	}?>
 </body>
</html>