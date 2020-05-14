<?php


namespace App\Models;


class UserModel extends DBModel
{
    protected $table = "employee";
    protected $employeePhoneTable = "employee_phones";
    protected $phoneTable = "phones";

    public function create($fields, $tableName = "")
    {
        try {
            $this->db->getConnection()->beginTransaction();
            $phones = explode(",", $fields['phone']);
            unset($fields['phone']);
            $employeeID = parent::create($fields);

            foreach ($phones as $row) {
                $ph['num_sequence'] = trim($row);
                $phonesID[] = parent::create($ph, $this->phoneTable);
            }

            foreach ($phonesID as $phoneID) {
                $epd = array('e_id' => $employeeID, 'phone_id' => $phoneID);
                parent::create($epd, $this->employeePhoneTable);
            }
            $this->db->getConnection()->commit();
            header('Location: /employees');
        } catch (Exception $e) {
            $this->db->getConnection()->rollback();
            throw $e;
        }
    }

}