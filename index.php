<!DOCTYPE html>
 <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <title>Список сотрудников</title>  
 </head>
 <body>
  <?php
  	require("employeehandler.php");
  	$handlerObj = EmployeeHandler::getInstance();
	$handlerObj->showEmployees();		
  ?>
  <button type="button" class="btn btn-secondary" onclick="location.href='addingform.php'">Добавить сотрудника</button>
 </body>
</html>