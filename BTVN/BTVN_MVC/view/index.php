<?php
include_once '../config/database.php';  // Include config để có đối tượng PDO
include_once '../controller/ProductController.php';  // Include Controller

$productController = new ProductController($pdo);  // Tạo đối tượng Controller

// Xử lý hành động từ URL
$action = $_GET['action'] ?? 'showProducts';  // Mặc định gọi showProducts

// Chọn phương thức controller để xử lý
if ($action == 'add') {
    $productController->addProduct();  // Gọi phương thức thêm sản phẩm
} elseif ($action == 'edit') {
    $id = $_GET['id'] ?? null;
    $productController->editProduct($id);  // Gọi phương thức sửa sản phẩm
} elseif ($action == 'delete') {
    $id = $_GET['id'] ?? null;
    $productController->deleteProduct($id);  // Gọi phương thức xóa sản phẩm
} else {
    $productController->showProducts();  // Gọi phương thức hiển thị sản phẩm
}
?>
