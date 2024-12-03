<link rel="stylesheet" href="../public/style.css">
<?php include_once 'header.php'; ?>

<h1>Thêm Sản Phẩm Mới</h1>

<form action="index.php?action=add" method="POST">
    <div>
        <label for="sanpham">Tên Sản Phẩm:</label>
        <input type="text" id="sanpham" name="sanpham" required>
    </div>
    <div>
        <label for="gia">Giá:</label>
        <input type="text" id="gia" name="gia" required>
    </div>
    <div>
        <button type="submit">Thêm Sản Phẩm</button>
    </div>
</form>

<a href="index.php">Quay lại Danh Sách Sản Phẩm</a>

<?php include_once 'footer.php'; ?>
