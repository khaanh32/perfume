<?php
class Index extends DController {
    public function __construct() {
        parent::__construct();
    }

    public function index(): void {
        
        $categorymodel = $this->load->model('categorymodel');
        
        // loaii
        $table_category_product = 'tbl_category_product';
        $data['categories'] = $categorymodel->category($table_category_product);
        // san pham
        $table_product = 'tbl_product';
        $data['product_home'] = $categorymodel->list_product_index($table_product);
        
        $this->load->view('header', $data); 
        $this->load->view('home', $data);
        $this->load->view('footer');
    }
}
?>