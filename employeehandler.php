<?php
class EmployeeHandler {
	private $host= "localhost";
	private $db_password = "user_pass";
	private $db_user = "user"; 
	private $db_name = "employees";
	private $db_connection;
	private static $instance = null;	

	//Make __construct and __clone methods blocked
	private function __construct(){}
	private function __clone(){}

	// Singleton pattern implementation
	public static function getInstance(){
		if(self::$instance === null){
			self::$instance = new self();
			self::$instance->mysqlConnectionCreator();			
		}
		return self::$instance;
	} 

	private function mysqlConnectionCreator(){		
		self::$instance->db_connection = new mysqli(self::$instance->host, self::$instance->db_user, self::$instance->db_password, self::$instance->db_name);
		if(self::$instance->db_connection->connect_errno){
			die("Соединение с базой данных не удалось. Выполнение скрипта прервано");
		}			
	}

	private function implementQuery($query){		
		return self::$instance->db_connection->query($query);

	}
	private function getPhones(){
		$queryphones = "SELECT * FROM phones";
		$phones = self::$instance->implementQuery($queryphones);
		$phonesArr = Array();
		if($phones->num_rows !== 0){
			while($row = $phones->fetch_assoc()){
				$phonesArr[$row['id']] = $row['num_sequence'];
			}
		}
		return $phonesArr;
	}

	private function getEmails(){
		$query = "SELECT id, email FROM employee";
		$emails = self::$instance->implementQuery($query);
		$emailsArr = Array();
		if($emails->num_rows !== 0){
			while($row = $emails->fetch_assoc()){
				$emailsArr[$row['id']] = $row['email'];
			}
		}
		return $emailsArr;
	}

	public function showEmployees(){		
		$phonesArr = self::$instance->getPhones();

		$queryEmpPhones = "SELECT * FROM employee_phones";
		$emloyeePhones = self::$instance->implementQuery($queryEmpPhones);
		$emloyeePhonesArr = Array();
		if($emloyeePhones->num_rows !== 0){
			while($row = $emloyeePhones->fetch_assoc()){
				if(!$emloyeePhonesArr[$row['e_id']])
					$emloyeePhonesArr[$row['e_id']] = $phonesArr[$row['phone_id']];
				else
					$emloyeePhonesArr[$row['e_id']] = $emloyeePhonesArr[$row['e_id']].", ".$phonesArr[$row['phone_id']];
			}
		}		

		$queryemp = "SELECT * FROM employee";
		$result = self::$instance->implementQuery($queryemp);		
		if($result->num_rows !== 0){
			echo "<h1>Список сотрудников</h1>";
			echo "<table class=\"table\">";
			echo "<tr><th>ФИО</th><th>EMAIL</th><th>№ ПОМЕЩЕНИЯ</th><th>ТЕЛЕФОН</th></tr>";
			while($row = $result->fetch_assoc()){
				echo"<tr>";
				echo "<td>".$row['last_name']." ".$row['first_name']." ".$row['patronymic']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['room']."</td>";
				echo "<td>".$emloyeePhonesArr[$row['id']]."</td>";
				echo"</tr>";
			}
			echo "</table>";
		} else {
			echo "Список сотрудников пуст";
		}				
	}

	public function addEmployee($postArray){
		$postArray = self::$instance->getCheckedData($postArray);
		$emailsArr = self::$instance->getEmails();
		if(in_array($postArray['email'], $emailsArr)){
			echo "<script type=\"text/javascript\">
				alert(\"Введенный Вами email уже существует. Пожалуйста, введите другой.\");
				history.go(-1);
			</script>";
			die();
		} else if (!preg_match("/@bnb.by$/", $postArray['email'])){
			echo "<script type=\"text/javascript\">
				alert(\"email не соответствует шаблону email@bnb.by\");
				history.go(-1);
			</script>";
			die();
		}
		$queryEmp = "INSERT INTO employee VALUES ('', '".$postArray['first-name']."', '".$postArray['patronymic']."', '".$postArray['last-name']."', '".$postArray['email']."', '".$postArray['room']."')";			
		$resultEmp = self::$instance->db_connection->query($queryEmp);		
		$e_id = self::$instance->db_connection->insert_id;

		$phonesArr = self::$instance->getPhones();
		$postArray['phone'] = explode(',', $postArray['phone']);
		
		foreach($postArray['phone'] as $phone){
			$phone = trim($phone);			
			if(in_array($phone, $phonesArr)){
				$p_id = array_search($phone, $phonesArr);			
			} else {
				$queryPhone = "INSERT INTO phones VALUES ('', '".$phone."')";
				$resultPhone = self::$instance->db_connection->query($queryPhone);			
				$p_id = self::$instance->db_connection->insert_id;
			}

			if($e_id && $p_id){
				$queryEP = "INSERT INTO employee_phones VALUES ('', '".$e_id."', '".$p_id."')";
				$resultEP = self::$instance->db_connection->query($queryEP);
			}
		}
		
		self::$instance->checkEmployeeAdding($resultEmp, $resultPhone, $resultEP);
		echo "<script type=\"text/javascript\">
		alert(\"Сотрудник".$postArray['last-name']." успешно добавлен\");
		window.location = \"http://employees/\";</script>";
	}

	private function checkEmployeeAdding($resultEmp, $resultPhone, $resultEP){
		$resultEmpMsg = "Ошибка при добавлении пользователя.";
		$resultPhoneMsg = "Ошибка при добавлении телефона.";
		$resultEPMsg = "Ошибка при добавлении в таблицу employee_phones.";
		$errorMsg = "";
		if($resultEmp === false){
			$errorMsg .= " ".$resultEmpMsg;
		}
		if($resultPhone === false){
			$errorMsg .= " ".$resultPhoneMsg;
		}
		if($resultEP === false){
			$errorMsg .= " ".$resultEPMsg;
		}
		if(!empty($errorMsg)){
			die($errorMsg." Выполнение скрипта прервано");
		} 		
	}

	private function getCheckedData($postArray){
		foreach ($postArray as &$post) {
			if(!empty(trim($post))){
				$post = trim($post);
			} else {
				die("В форму передано пустое значение или значение, состоящее из пробелов. Скрипт завершен");
			}
		}
		return $postArray;
	}



}
?>