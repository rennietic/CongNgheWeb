<link rel="stylesheet" href="../public/style.css">
<?php include_once 'header.php'; ?>

<h1>Sửa Sản Phẩm</h1>

<form action="index.php?action=edit&id=<?= htmlspecialchars($product['id']); ?>" method="POST">
    <div>
        <label for="sanpham">Tên Sản Phẩm:</label>
        <input type="text" id="sanpham" name="sanpham" value="<?= htmlspecialchars($product['sanpham']); ?>" required>
    </div>
    <div>
        <label for="gia">Giá:</label>
        <input type="text" id="gia" name="gia" value="<?= htmlspecialchars($product['gia']); ?>" required>
    </div>
    <div>
        <button type="submit">Cập Nhật</button>
    </div>
</form>

<a href="index.php">Quay lại Danh Sách Sản Phẩm</a>

<?php include_once 'footer.php'; ?>
