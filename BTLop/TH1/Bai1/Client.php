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
      
       
    </style>

</head>
<body>
    <h1 style="text-align: center;">Trang Client</h1>
    
    <table>
        <thead>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Flower as $key => $flower): ?>
                <tr>
                    <td><?= $flower['Name'] ?></td>
                    <td><?= $flower['Content'] ?></td>
                    <td><img src="<?= $flower['Picture'] ?>" alt="<?= $flower['Name'] ?>" width="100"></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
