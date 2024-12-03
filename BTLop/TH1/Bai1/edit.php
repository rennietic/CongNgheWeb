<?php
// Import dữ liệu hoa
include 'Flower.php';

// Kiểm tra xem ID có được truyền qua URL không
if (!isset($_GET['id']) || !isset($Flower[$_GET['id']])) {
    echo "Loài hoa không tồn tại!";
    exit;
}

// Lấy thông tin hoa cần chỉnh sửa
$id = $_GET['id'];
$flower = $Flower[$id];

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Flower[$id]['Name'] = $_POST['Name'];
    $Flower[$id]['Content'] = $_POST['Content'];

    // Xử lý ảnh nếu người dùng chọn ảnh mới
    if (!empty($_FILES['Picture']['name'])) {
        $targetDir = "images/";
        $targetFile = $targetDir . basename($_FILES['Picture']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra định dạng ảnh hợp lệ
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'webp'])) {
            if (move_uploaded_file($_FILES['Picture']['tmp_name'], $targetFile)) {
                $Flower[$id]['Picture'] = $targetFile;
            } else {
                echo "Lỗi khi tải ảnh lên!";
            }
        } else {
            echo "Chỉ chấp nhận định dạng JPG, JPEG, PNG, hoặc WEBP.";
        }
    }

    // Lưu thay đổi vào file Flower.php
    file_put_contents('Flower.php', '<?php $Flower = ' . var_export($Flower, true) . ';');

    // Chuyển hướng về trang admin sau khi lưu
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Loài Hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Sửa Loài Hoa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="Name">Tên Hoa:</label>
            <input type="text" name="Name" value="<?= htmlspecialchars($flower['Name']) ?>" required>

            <label for="Content">Mô tả:</label>
            <input type="text" name="Content" value="<?= htmlspecialchars($flower['Content']) ?>" required>

            <label for="Picture">Hình Ảnh (Hiện tại):</label>
            <img src="<?= $flower['Picture'] ?>" alt="<?= $flower['Name'] ?>" width="100">
            <br>
            <input type="file" name="Picture" accept="image/*">

            <button type="submit">Lưu Thay Đổi</button>
        </form>
    </div>
</body>
</html>
