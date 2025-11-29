<?php
class AdminModel extends DModel {

    
    public function checkLogin($username, $password) {
        $sql = "SELECT * FROM tbl_admin WHERE username = :username AND password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

   
    public function countCustomers() {
        $sql = "SELECT COUNT(*) as total FROM tbl_customer";
        $result = $this->db->select($sql);
        return $result[0]['total'];
    }

    
    public function countProducts() {
        $sql = "SELECT COUNT(*) as total FROM tbl_product";
        $result = $this->db->select($sql);
        return $result[0]['total'];
    }

    
    public function countNewOrders() {
        $sql = "SELECT COUNT(*) as total FROM tbl_order WHERE order_status = 0";
        $result = $this->db->select($sql);
        return $result[0]['total'];
    }
}
?>