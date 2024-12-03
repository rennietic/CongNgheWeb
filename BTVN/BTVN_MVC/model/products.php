<?php
class Product {
    private $pdo;
    
    // Hàm khởi tạo sửa lại
    public function __construct($pdo)
    {
        $this->pdo = $pdo;  // Sửa lại: dùng $this->pdo thay vì this->$pdo
    }

    public function getAllProducts()
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProducts($sanpham, $gia)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (sanpham, gia) VALUES (?, ?)");
        return $stmt->execute([$sanpham, $gia]);
    }

    public function updateProducts($id, $sanpham, $gia)
    {
        $stmt = $this->pdo->prepare("UPDATE products SET sanpham = ?, gia = ? WHERE id = ?");
        return $stmt->execute([$sanpham, $gia, $id]);  
    }

    public function deleteProduct($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);  // Xóa sản phẩm theo ID
    }
    public function getProductById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
