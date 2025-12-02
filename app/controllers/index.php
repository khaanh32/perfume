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
        // lấy 3 sp ngẫu nhiên , cái này nó nằm ở home  cái sp nổi bật
        $data['random_products'] = $categorymodel->get_random_products($table_product, 3);
        $this->load->view('header', $data); 
        $this->load->view('home', $data);
        $this->load->view('footer');
    }
    
}
?>