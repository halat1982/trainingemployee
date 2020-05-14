<?php

namespace App\Controllers;

use App\Models\UserModel;
use Framework\Requests\EmployeeRequest;

class UserController extends Controller
{
    private $employee;

    public function __construct()
    {
        $this->employee = new UserModel();
    }

    public function index()
    {
        $data = $this->employee->getAll(['id', 'last_name', 'first_name', 'patronymic', 'email', 'room'])
            ->leftJoin('id', 'employee_phones', 'e_id')
            ->leftJoin('phone_id', 'phones', 'id', array(), 'employee_phones')
            ->concat('num_sequence', 'phones', 'phone_numbers')
            ->groupBy('id')
            ->get();
        return $this->view('employees/index.php', ['user' => $data]);
    }

    public function add()
    {
        return $this->view('employees/add.php', []);
    }

    public function put()
    {
        $rq = new EmployeeRequest();
        if ($data = $rq->checkFormData()) {
            $this->employee->create($data);
        }

        return $this->view('employees/add.php', []);
    }
} 
