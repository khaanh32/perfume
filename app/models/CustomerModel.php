<?php
class CustomerModel extends DModel {
    
    public function checkLogin($email, $password) {
        $sql = "SELECT * FROM tbl_customer WHERE customer_email = :email AND customer_password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function getCustomerById($id) {
     
        $sql = "SELECT * FROM tbl_customer WHERE customer_id = :id"; 
        $data = array(':id' => $id);
        $result = $this->db->select($sql, $data);
        return isset($result[0]) ? $result[0] : false;
    }

    public function updateCustomer($data, $id) {
        $table = "tbl_customer";
      
        $cond = "customer_id = $id"; 
        return $this->db->update($table, $data, $cond);
    }
}
?>