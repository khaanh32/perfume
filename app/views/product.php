<div class="product-page-wrapper">
    
    <div class="collection-header">
        <div class="container">
            <div class="breadcrumb-nav">
                <a href="<?php echo BASE_URL; ?>/">Trang chủ</a> /<span>Bộ sưu tập nước hoa</span>
            </div>
            <h1 class="collection-title">Bộ Sưu Tập Nước Hoa</h1>
        </div>
    </div>

    <div class="container">
        <div class="collection-layout">
            
            <aside class="filters-sidebar">
                <form id="filterForm" action="<?php echo BASE_URL; ?>/product/collection" method="GET">
                    
                    <div class="filter-section">
                        <div class="filter-title js-toggle">
                            <span>Danh mục</span>
                            <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                        </div>
                        <div class="filter-options" style="display: none;"> <?php if(isset($categories) && is_array($categories)): ?>
                                <?php foreach($categories as $cat): ?>
                                    <div class="filter-option">
                                        <input type="checkbox" name="category[]" 
                                               value="<?php echo $cat['id_category_product']; ?>" 
                                               id="cat-<?php echo $cat['id_category_product']; ?>"
                                               <?php 
                                                    if(isset($filters['category']) && (
                                                        (is_array($filters['category']) && in_array($cat['id_category_product'], $filters['category'])) ||
                                                        $filters['category'] == $cat['id_category_product']
                                                    )) echo 'checked'; 
                                               ?>
                                        >
                                        <label for="cat-<?php echo $cat['id_category_product']; ?>">
                                            <?php echo $cat['title_category']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="filter-section">
                        <div class="filter-title js-toggle">
                            <span>Thương hiệu</span>
                            <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                        </div>
                        <div class="filter-options" style="display: none;">
                            <div class="filter-option">
                                <input type="checkbox" name="brand[]" value="chanel" id="br-1">
                                <label for="br-1">Chanel</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" name="brand[]" value="dior" id="br-2">
                                <label for="br-2">Dior</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" name="brand[]" value="gucci" id="br-3">
                                <label for="br-3">Gucci</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" name="brand[]" value="ysl" id="br-4">
                                <label for="br-4">Yves Saint Laurent</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" name="brand[]" value="tomford" id="br-5">
                                <label for="br-5">Tom Ford</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter-section">
                        <div class="filter-title js-toggle">
                            <span>Nhóm hương</span>
                            <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                        </div>
                        <div class="filter-options" style="display: none;">
                            <div class="filter-option">
                                <input type="checkbox" name="scent[]" value="floral" id="sc-1">
                                <label for="sc-1">Hương Hoa Cỏ (Floral)</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" name="scent[]" value="woody" id="sc-2">
                                <label for="sc-2">Hương Gỗ (Woody)</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" name="scent[]" value="fresh" id="sc-3">
                                <label for="sc-3">Hương Tươi Mát (Fresh)</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" name="scent[]" value="oriental" id="sc-4">
                                <label for="sc-4">Hương Phương Đông</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter-section">
                        <div class="filter-title js-toggle">
                            <span>Giới tính</span>
                            <i class="fas fa-chevron-up" style="font-size: 12px;"></i> </div>
                        <div class="filter-options">
                            
                            <div class="filter-option">
                                <input type="radio" name="gender" value="Nam" id="g-nam" 
                                    <?php if(isset($filters['gender']) && $filters['gender'] == 'Nam') echo 'checked'; ?>>
                                <label for="g-nam">Nam</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" name="gender" value="Nữ" id="g-nu" 
                                    <?php if(isset($filters['gender']) && $filters['gender'] == 'Nữ') echo 'checked'; ?>>
                                <label for="g-nu">Nữ</label>
                            </div>
                           
                        </div>
                    </div>

                    <div class="filter-section">
                        <div class="filter-title"> <span>Khoảng Giá</span>
                        </div>
                        
                        <div class="slider-container">
                            <div class="slider-track" id="sliderTrack"></div>
                            <div class="slider-input">
                                <input type="range" class="range-min" min="0" max="20000000" value="0" step="100000">
                                <input type="range" class="range-max" min="0" max="20000000" value="20000000" step="100000">
                            </div>
                        </div>
                        
                        <div class="price-values">
                            <span id="minPriceDisplay">0 đ</span>
                            <span style="margin: 0 5px;">-</span>
                            <span id="maxPriceDisplay">20.000.000 đ</span>
                        </div>

                        <input type="hidden" name="price" id="priceRangeInput">

                        <div class="filter-actions">
                            <button type="button" class="btn-filter btn-apply" onclick="applyFilter()">Lọc</button>
                            <a href="<?php echo BASE_URL; ?>/product/collection" class="btn-filter btn-reset">Đặt lại</a>
                        </div>
                    </div>

                </form>
            </aside>

            <main>
                <div class="products-toolbar">
                    <div class="result-count" style="font-size: 14px; font-weight: 600;">
                        Hiển thị <?php echo isset($products) ? count($products) : 0; ?> kết quả
                    </div>
                    
                    <div class="sort-wrapper">
                        <span style="font-size: 14px; font-weight: 600; margin-right: 10px;">Sắp xếp:</span>
                        <select name="sort" class="sort-select" form="filterForm" onchange="applyFilter()">
                            <option value="default">Mặc định</option>
                            <option value="price_asc" <?php if(isset($filters['sort']) && $filters['sort'] == 'price_asc') echo 'selected'; ?>>Giá tăng dần</option>
                            <option value="price_desc" <?php if(isset($filters['sort']) && $filters['sort'] == 'price_desc') echo 'selected'; ?>>Giá giảm dần</option>
                            <option value="newest" <?php if(isset($filters['sort']) && $filters['sort'] == 'newest') echo 'selected'; ?>>Mới nhất</option>
                        </select>
                    </div>
                </div>

                <?php if (isset($products) && !empty($products)): ?>
                    <div class="products-grid">
                        <?php foreach($products as $pro): ?>
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    <span class="brand-badge">KD PERFUME</span>
                                    
                                    <img src="<?php echo BASE_URL ?>/img/<?php echo $pro['image'] ?>" 
                                         alt="<?php echo $pro['title_product'] ?>" 
                                         class="product-image">
                                    
                                    <div class="overlay-actions">
                                        <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $pro['id_product'] ?>" class="btn-quick-view">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name">
                                        <a href="<?php echo BASE_URL ?>/product/detail/<?php echo $pro['id_product'] ?>">
                                            <?php echo $pro['title_product'] ?>
                                        </a>
                                    </h3>
                                    <?php if($pro['price_product'] > 0): ?>
                                        <span class="product-price"><?php echo number_format($pro['price_product'], 0, ',', '.') ?> ₫</span>
                                    <?php else: ?>
                                        <span class="product-price">Liên hệ</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <h3>Không tìm thấy sản phẩm</h3>
                        <p>Vui lòng thử thay đổi bộ lọc hoặc từ khóa tìm kiếm.</p>
                        <a href="<?php echo BASE_URL; ?>/product/collection" class="btn-filter btn-apply" style="display: inline-block; padding: 10px 30px; text-decoration: none; margin-top: 15px;">Xem tất cả</a>
                    </div>
                <?php endif; ?>

            <?php if (isset($totalPages) && $totalPages > 1): ?>
                    <div class="pagination-container">
                        <?php
                            // Hàm hỗ trợ tạo URL giữ nguyên các bộ lọc
                            function getPageUrl($page) {
                                $params = $_GET;
                                $params['page'] = $page;
                                return '?' . http_build_query($params);
                            }

                            $range = 2; // Số trang hiển thị xung quanh trang hiện tại
                        ?>

                        <?php if ($currentPage > 1): ?>
                            <a href="<?php echo getPageUrl($currentPage - 1); ?>" class="pagination-link">
                                <i class="fas fa-chevron-left pagination-icon"></i>
                            </a>
                        <?php endif; ?>

                        <a href="<?php echo getPageUrl(1); ?>" class="pagination-link <?php echo ($currentPage == 1) ? 'active' : ''; ?>">1</a>

                        <?php if ($currentPage > ($range + 2)): ?>
                            <span class="pagination-dots">...</span>
                        <?php endif; ?>

                        <?php for ($i = 2; $i < $totalPages; $i++): ?>
                            <?php if ($i >= ($currentPage - $range) && $i <= ($currentPage + $range)): ?>
                                <a href="<?php echo getPageUrl($i); ?>" class="pagination-link <?php echo ($currentPage == $i) ? 'active' : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($currentPage < ($totalPages - $range - 1)): ?>
                            <span class="pagination-dots">...</span>
                        <?php endif; ?>

                        <a href="<?php echo getPageUrl($totalPages); ?>" class="pagination-link <?php echo ($currentPage == $totalPages) ? 'active' : ''; ?>">
                            <?php echo $totalPages; ?>
                        </a>

                        <?php if ($currentPage < $totalPages): ?>
                            <a href="<?php echo getPageUrl($currentPage + 1); ?>" class="pagination-link">
                                <i class="fas fa-chevron-right pagination-icon"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>
</div>

<script>
    // --- PRICE SLIDER LOGIC ---
    const rangeMin = document.querySelector('.range-min');
    const rangeMax = document.querySelector('.range-max');
    const sliderTrack = document.getElementById('sliderTrack');
    const minDisplay = document.getElementById('minPriceDisplay');
    const maxDisplay = document.getElementById('maxPriceDisplay');
    const priceInput = document.getElementById('priceRangeInput');
    const priceGap = 500000; 

    function updateSlider() {
        let minVal = parseInt(rangeMin.value);
        let maxVal = parseInt(rangeMax.value);

        if ((maxVal - minVal) < priceGap) {
            if (this.className === 'range-min') {
                rangeMin.value = maxVal - priceGap;
            } else {
                rangeMax.value = minVal + priceGap;
            }
        } else {
            minDisplay.textContent = minVal.toLocaleString('vi-VN') + ' đ';
            maxDisplay.textContent = maxVal.toLocaleString('vi-VN') + ' đ';

            const maxRange = parseInt(rangeMin.max);
            sliderTrack.style.left = (minVal / maxRange) * 100 + "%";
            sliderTrack.style.right = (100 - (maxVal / maxRange) * 100) + "%";
        }
    }

    rangeMin.addEventListener('input', updateSlider);
    rangeMax.addEventListener('input', updateSlider);

    // --- MAIN FILTER FUNCTION ---
    function applyFilter() {
        let minVal = rangeMin.value;
        let maxVal = rangeMax.value;
        priceInput.value = `${minVal}-${maxVal}`;
        document.getElementById('filterForm').submit();
    }

    updateSlider();

    // --- ACCORDION LOGIC (FIX ICON) ---
    document.querySelectorAll('.filter-title.js-toggle').forEach(title => {
        title.addEventListener('click', function() {
            const options = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            if (options.style.display === 'none') {
                options.style.display = 'flex';
                // Đổi icon thành mũi tên lên
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                options.style.display = 'none';
                // Đổi icon thành mũi tên xuống
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
    });
</script>