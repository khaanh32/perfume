<?php

class authmodel extends DModel {
    
    public function __construct() {
        parent::__construct();
    }

    
    public function auto_login($username_or_email, $password) {
        
        if (strpos($username_or_email, '@') !== false) {
            
            return $this->check_customer_login($username_or_email, $password);
        } else {
            
            return $this->check_admin_login($username_or_email, $password);
        }
    }

    
    private function check_admin_login($username, $password) {
        $sql = "SELECT * FROM tbl_admin WHERE username = :username AND password = :password";
        $data = array(
            ':username' => $username,
            ':password' => $password
        );
        $result = $this->db->select($sql, $data);
        
        if (count($result) > 0) {
            
            $result[0]['user_type'] = 'admin';
            return $result[0];
        }
        return false;
    }

    
    private function check_customer_login($email, $password) {
        $sql = "SELECT * FROM tbl_customer WHERE customer_email = :email AND customer_password = :password";
        $data = array(
            ':email' => $email,
            ':password' => $password
        );
        $result = $this->db->select($sql, $data);
        
        if (count($result) > 0) {
            
            $result[0]['user_type'] = 'customer';
            return $result[0];
        }
        return false;
    }

    
    public function check_email_exists($email) {
        $sql = "SELECT * FROM tbl_customer WHERE customer_email = :email";
        $data = array(':email' => $email);
        $result = $this->db->select($sql, $data);
        
        return count($result) > 0;
    }

    
    public function insert_customer($table, $data) {
        return $this->db->insert($table, $data);
    }
}

?>