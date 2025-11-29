<?php
    

    class categorymodel extends DModel{
        public function __construct()
        {
            parent::__construct();
            
        } 
        public function category($table_category_product){
            $sql ="SELECT * FROM $table_category_product ";
            return $this->db->select($sql);
       
                       
           
        }
        public function categorybyid($table_category_product, $id){
                $sql = "SELECT * FROM $table_category_product WHERE id_category_product = :id";
                $data = array(':id' => $id);
                return $this->db->select($sql, $data);    
        }
        public function insertcategory($table_category_product,$data){
            return $this->db->insert($table_category_product, $data); 
        }
        public function updatecategory($table_category_product,$data,$cond){
            return $this->db->update($table_category_product, $data,$cond); 
        }
        public function deletecategory($table_category_product, $cond){
            
            return $this->db->delete($table_category_product, $cond);
        }
        public function brand($table_brand){
            $sql = "SELECT * FROM $table_brand";
            return $this->db->select($sql);
        }
        //product
        public function insertproduct($table,$data){
            return $this->db->insert($table, $data); 
        }
        public function product($table_product, $table_category){
         $sql = "SELECT * FROM $table_product,$table_category WHERE $table_product.id_category_product=$table_category.id_category_product
          ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
        }
        public function deleteproduct($table_product, $cond){
            
            return $this->db->delete($table_product, $cond);
        }
public function getRelatedVariants($title, $current_id) {
    // Tìm sản phẩm CÙNG TÊN, KHÁC ID
    // Cần thêm dấu nháy đơn '$title' vì tên là chuỗi ký tự
    $sql = "SELECT id_product, capacity, price_product 
            FROM tbl_product 
            WHERE title_product = '$title' 
            AND id_product != '$current_id' 
            ORDER BY price_product ASC";
            
    return $this->db->select($sql);
}

        public function updateproduct($table_product, $data, $cond){
         return $this->db->update($table_product, $data, $cond);
        }
public function productbyid($table, $cond){
    $sql = "SELECT * FROM $table WHERE $cond";
    return $this->db->select($sql);
}
        
public function list_product_index($table_product){
    // Chọn sản phẩm đại diện (thường là cái nhập trước - ID nhỏ nhất) cho mỗi Tên sản phẩm
    $sql = "SELECT * FROM $table_product 
            WHERE id_product IN (
                SELECT MIN(id_product) 
                FROM $table_product 
                GROUP BY title_product
            )
            ORDER BY id_product DESC 
            LIMIT 8";
            
    return $this->db->select($sql);
}

        
    }
?>