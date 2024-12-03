

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Loài Hoa</title>
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
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Thêm Loài Hoa Mới</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="Name">Tên Hoa:</label>
            <input type="text" name="Name" placeholder="Nhập tên hoa" required>

            <label for="Content">Mô tả:</label>
            <input type="text" name="Content" placeholder="Nhập mô tả" required>

            <label for="Picture">Chọn Hình Ảnh:</label>
            <input type="file" name="Picture" accept="image/*" required>

            <button type="submit">Thêm Hoa</button>
        </form>
    </div>
</body>
</html>
<?php
// Import dữ liệu hoa từ Flower.php
include 'Flower.php';

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFlower = [
        "Name" => $_POST['Name'], // Lấy tên hoa từ form
        "Content" => $_POST['Content'], // Lấy mô tả từ form
        "Picture" => "" // Mặc định ảnh để trống
    ];

    // Xử lý ảnh (nếu người dùng tải ảnh lên)
    if (!empty($_FILES['Picture']['name'])) {
        $targetDir = "images/";
        $targetFile = $targetDir . basename($_FILES['Picture']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra định dạng ảnh hợp lệ
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'webp'])) {
            if (move_uploaded_file($_FILES['Picture']['tmp_name'], $targetFile)) {
                $newFlower['Picture'] = $targetFile;
            } else {
                echo "Lỗi khi tải ảnh lên!";
            }
        } else {
            echo "Chỉ chấp nhận định dạng JPG, JPEG, PNG, hoặc WEBP.";
        }
    }

    // Thêm loài hoa mới vào danh sách $Flower
    $Flower[] = $newFlower;

    // Lưu danh sách hoa vào file Flower.php
    file_put_contents('Flower.php', '<?php $Flower = ' . var_export($Flower, true) . ';');

    // Chuyển hướng về trang admin sau khi thêm
    header('Location: admin.php');
    exit;
}
?>
