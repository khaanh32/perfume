<?php
class CustomerModel extends DModel {
    public function checkLogin($email, $password) {
        $sql = "SELECT * FROM tbl_customer WHERE customer_email = :email AND customer_password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
}
?>