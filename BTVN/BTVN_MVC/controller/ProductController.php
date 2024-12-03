<?php include_once '../model/products.php';

class ProductController {
    private $productModel;

    // Khởi tạo với kết nối PDO và mô hình Product
    public function __construct($pdo) {
        $this->productModel = new Product($pdo);
    }
     // Hàm hiển thị danh sách sản phẩm
     public function showProducts() {
        $products = $this->productModel->getAllProducts(); // Lấy tất cả sản phẩm
        include '../view//product_list.php'; // Gọi View để hiển thị sản phẩm
    }
    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sanpham = $_POST['sanpham'];
            $gia = $_POST['gia'];
            $this->productModel->addProduct($sanpham, $gia); // Thêm sản phẩm vào DB
        }
        include '../view/create.php'; // Gọi View thêm sản phẩm
    }

    // Hàm sửa sản phẩm
    public function editProduct($id)
{
    // Lấy thông tin sản phẩm theo ID
    $product = $this->productModel->getProductById($id);
    
    // Kiểm tra nếu sản phẩm tồn tại
    if ($product === false) {
        // Nếu sản phẩm không tồn tại, bạn có thể hiển thị thông báo lỗi hoặc chuyển hướng về danh sách sản phẩm
        header('Location: index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sanpham = $_POST['sanpham'];
        $gia = $_POST['gia'];
        
        $this->productModel->updateProducts($id, $sanpham, $gia);
        header('Location: index.php');
        exit();
    }

    // Nếu không phải yêu cầu POST, hiển thị form sửa sản phẩm
    include_once '../view//edit.php';  // Hiển thị form sửa sản phẩm
}


    // Hàm xóa sản phẩm
    public function deleteProduct($id) {
        $this->productModel->deleteProduct($id); // Xóa sản phẩm khỏi DB
        header('Location: index.php?action=showProducts'); // Chuyển hướng về trang danh sách
    }
}
?>