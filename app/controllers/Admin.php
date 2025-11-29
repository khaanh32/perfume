<?php
class Admin extends DController {
    public function __construct() {
        parent::__construct();
        
        $this->adminModel = $this->load->model('adminmodel');
    }

    public function index() {
        
        $data['customer_count'] = $this->adminModel->countCustomers();
        $data['product_count'] = $this->adminModel->countProducts();
        $data['order_count'] = $this->adminModel->countNewOrders();
       
        $data['revenue'] = '15.000.000đ'; 

        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/dashboard', $data); 
        $this->load->view('admin/footer');
    }
}
?>