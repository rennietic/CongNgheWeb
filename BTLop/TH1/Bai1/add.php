<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hoa Mới</title>
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
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="form-container">
        <h1>Thêm Loài Hoa Mới</h1>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <label for="Name">Tên Hoa:</label>
            <input type="text" name="Name" placeholder="Nhập tên hoa" required>
            
            <label for="Content">Mô tả:</label>
            <input type="text" name="Content" placeholder="Nhập mô tả" required>
            
            <label for="Picture">Chọn Hình:</label>
            <input type="file" name="Picture" accept="image/*" required>
            
            <button type="submit">Thêm Hoa</button>
        </form>
    </div>
    <?php include 'footer.php';?>

</body>
</html>
