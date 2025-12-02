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
public function get_random_products($table_product, $limit = 3){
    // Lấy ngẫu nhiên 3 sản phẩm
    $sql = "SELECT * FROM $table_product ORDER BY RAND() LIMIT $limit";
    return $this->db->select($sql);
}

public function get_filtered_products($filters = [], $limit = 15, $offset = 0) {
    $sql = "SELECT * FROM tbl_product WHERE 1=1"; 
    $params = [];

    // --- LOGIC LỌC (Giữ nguyên như cũ) ---
    if (!empty($filters['category'])) {
        if (is_array($filters['category'])) {
            $placeholders = implode(',', array_fill(0, count($filters['category']), '?'));
            $sql .= " AND id_category_product IN ($placeholders)";
            $params = array_merge($params, $filters['category']);
        } else {
            $sql .= " AND id_category_product = ?";
            $params[] = $filters['category'];
        }
    }
    if (!empty($filters['gender'])) {
        $sql .= " AND gender = ?";
        $params[] = $filters['gender'];
    }
    if (!empty($filters['price_range'])) {
        $range = explode('-', $filters['price_range']);
        if (count($range) == 2) {
            $sql .= " AND price_product >= ? AND price_product <= ?";
            $params[] = (int)$range[0];
            $params[] = (int)$range[1];
        } elseif ($range[0] == '3000000+') {
             $sql .= " AND price_product >= ?";
             $params[] = 3000000;
        }
    }
    // --- KẾT THÚC LOGIC LỌC ---

    // Sắp xếp
    $sort = $filters['sort'] ?? 'default';
    switch ($sort) {
        case 'price_asc': $sql .= " ORDER BY price_product ASC"; break;
        case 'price_desc': $sql .= " ORDER BY price_product DESC"; break;
        case 'newest': $sql .= " ORDER BY id_product DESC"; break;
        default: $sql .= " ORDER BY id_product DESC"; break;
    }

    // THÊM: Phân trang
    $sql .= " LIMIT $limit OFFSET $offset";

    return $this->db->select($sql, $params);
}
// đếm số lương sản phẩm để phân trang nếu limit ở controller product = 15 thì 1 trang nó 15 sp sau đó chuyển trang
// nếu xóa nó thì nó k phân trang nua chỉ lướt từ trên xuống để xem sản phẩm
public function count_filtered_products($filters = []) {
    $sql = "SELECT COUNT(*) as total FROM tbl_product WHERE 1=1"; 
    $params = [];

    // (Copy y hệt logic lọc ở trên để đếm cho chính xác)
    if (!empty($filters['category'])) {
        if (is_array($filters['category'])) {
            $placeholders = implode(',', array_fill(0, count($filters['category']), '?'));
            $sql .= " AND id_category_product IN ($placeholders)";
            $params = array_merge($params, $filters['category']);
        } else {
            $sql .= " AND id_category_product = ?";
            $params[] = $filters['category'];
        }
    }
    if (!empty($filters['gender'])) {
        $sql .= " AND gender = ?";
        $params[] = $filters['gender'];
    }
    if (!empty($filters['price_range'])) {
        $range = explode('-', $filters['price_range']);
        if (count($range) == 2) {
            $sql .= " AND price_product >= ? AND price_product <= ?";
            $params[] = (int)$range[0];
            $params[] = (int)$range[1];
        } elseif ($range[0] == '3000000+') {
             $sql .= " AND price_product >= ?";
             $params[] = 3000000;
        }
    }

    $result = $this->db->select($sql, $params);
    return isset($result[0]['total']) ? $result[0]['total'] : 0;
}
    }
?> 