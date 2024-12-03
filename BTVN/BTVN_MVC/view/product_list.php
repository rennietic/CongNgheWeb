<link rel="stylesheet" href="../public//style.css">
<?php include_once 'header.php'; ?>

<h1>Danh Sách Sản Phẩm</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['id']); ?></td>
                <td><?= htmlspecialchars($product['sanpham']); ?></td>
                <td><?= htmlspecialchars($product['gia']); ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $product['id']; ?>"><button class="edit-button">Sửa</button></a> |
                    <a href="index.php?action=delete&id=<?= $product['id']; ?>"><button class="delete-button">Xóa</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?action=add">
    <button class="add-button">Thêm mới</button>
</a>

<?php include_once 'footer.php'; ?>
