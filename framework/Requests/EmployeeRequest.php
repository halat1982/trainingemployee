<?php


namespace Framework\Requests;


class EmployeeRequest extends \Framework\Routing\Request
{
    public function checkFormData()
    {
        return $this->getPostParams();
    }

}