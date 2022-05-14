<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function Insert_User($user_detail)
    {
        try {
            $table_name = "User_List";
            $instance = \Config\Database::connect();
            $confirmation = $instance->table($table_name)->insert($user_detail);
            return $confirmation;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
