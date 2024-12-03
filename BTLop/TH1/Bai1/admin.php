<?php
include 'Flower.php'; // Import dữ liệu hoa
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Hoa</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            color: red;
        }
        .add-button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
}

    </style>

</head>
<body>
    <h1 style="text-align: center;">Quản Lý Danh Sách Hoa</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="add.php">
                <button class="add-button">Thêm Loài Hoa Mới</button>
        </a>
        <a href="Client.php">
        <button class="add-button">Chuyển sang Client</button>
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Flower as $key => $flower): ?>
                <tr>
                    <td><?= $flower['Name'] ?></td>
                    <td><?= $flower['Content'] ?></td>
                    <td><img src="<?= $flower['Picture'] ?>" alt="<?= $flower['Name'] ?>" width="100"></td>
                    <td>
                        <a href="edit.php?id=<?= $key ?>" class="edit-icon">✏️ Sửa</a>
                        <a href="delete.php?id=<?= $key ?>" class="delete-icon" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">🗑️ Xóa</a>
</td>

                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
