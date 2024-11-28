<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa</title>
   
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
    include 'roles.php';

    // Phân biệt hiển thị theo vai trò
    if ($isAdmin) {
        include 'admin.php';
    } else {
        include 'Client.php';
    }
    ?>
    <?php include 'footer.php'; ?>
</body>
</html>
